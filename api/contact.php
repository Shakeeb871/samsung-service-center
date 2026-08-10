<?php
/**
 * Contact form handler.
 *
 * Answers JSON so assets/js/main.js can show a result without a page
 * reload, and falls back to a plain redirect for anyone with JS off.
 *
 * mail() delivers through the server's local MTA. That works on cPanel out
 * of the box, but messages sent this way land in spam more often than not
 * because the From address is not authenticated for the domain. Once the
 * site is on its real domain, switch this to SMTP through a real mailbox —
 * the rest of the file does not need to change.
 */

require_once __DIR__ . '/../inc/config.php';

$wants_json = isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false;

/** Send the result and stop. */
function respond(bool $ok, string $message, bool $json): void
{
    if ($json) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['ok' => $ok, 'message' => $message]);
    } else {
        header('Location: /contact/?sent=' . ($ok ? '1' : '0'));
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    respond(false, 'Method not allowed.', $wants_json);
}

// Bots fill every field they find, including the one nobody can see.
// Answer as though it worked so the sender does not adapt and retry.
if (!empty($_POST['website'])) {
    respond(true, 'Thanks — your message has been sent.', $wants_json);
}

/** Trim, cap the length, and strip control characters. */
function clean(string $key, int $max): string
{
    $v = trim((string)($_POST[$key] ?? ''));
    $v = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $v);
    return mb_substr($v, 0, $max);
}

$name      = clean('name', 80);
$phone     = clean('phone', 30);
$email     = clean('email', 120);
$appliance = clean('appliance', 60);
$model     = clean('model', 60);
$area      = clean('area', 60);
$message   = clean('message', 2000);

if ($name === '' || $phone === '' || $message === '') {
    http_response_code(422);
    respond(false, 'Please fill in your name, a phone number and a description of the fault.', $wants_json);
}

if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(422);
    respond(false, 'That email address does not look right.', $wants_json);
}

// A newline in a header field lets an attacker append headers of their own,
// so anything that reaches a header is checked for one.
foreach ([$name, $phone, $email] as $header_candidate) {
    if (preg_match('/[\r\n]/', $header_candidate)) {
        http_response_code(400);
        respond(false, 'Invalid input.', $wants_json);
    }
}

$subject = sprintf('Repair enquiry — %s%s', $appliance ?: 'appliance', $area !== '' ? ', ' . $area : '');

$body = "New enquiry from " . SITE_URL . "\n\n"
      . "Name:      $name\n"
      . "Phone:     $phone\n"
      . "Email:     " . ($email !== '' ? $email : '—') . "\n"
      . "Appliance: " . ($appliance !== '' ? $appliance : '—') . "\n"
      . "Model:     " . ($model !== '' ? $model : '—') . "\n"
      . "Area:      " . ($area !== '' ? $area : '—') . "\n\n"
      . "Message:\n$message\n\n"
      . "---\n"
      . "Sent: " . date('Y-m-d H:i:s') . "\n"
      . "IP:   " . ($_SERVER['REMOTE_ADDR'] ?? 'unknown') . "\n";

// From must be an address on this domain, or the server's own MTA is the
// first thing to reject it. The visitor's address goes in Reply-To.
$domain  = parse_url(SITE_URL, PHP_URL_HOST) ?: 'localhost';
$headers = [
    'From: ' . BIZ_NAME . ' <no-reply@' . $domain . '>',
    'Content-Type: text/plain; charset=utf-8',
    'X-Mailer: PHP/' . phpversion(),
];
if ($email !== '') {
    $headers[] = 'Reply-To: ' . $email;
}

$sent = @mail(BIZ_EMAIL, $subject, $body, implode("\r\n", $headers));

if ($sent) {
    respond(true, 'Thanks — your enquiry is in. You will get a reply shortly.', $wants_json);
}

http_response_code(500);
respond(false, 'The message could not be sent. Please call or WhatsApp us instead.', $wants_json);
