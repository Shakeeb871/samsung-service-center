<?php
/**
 * Static build.
 *
 * GitHub Pages serves files; it does not run PHP. This renders every page
 * once and writes the result as plain HTML into dist/, which is what gets
 * published.
 *
 * Pages are rendered by asking PHP's own built-in server for them rather
 * than by including the files here. Two reasons: every page defines
 * constants, so a second include in the same process would fatal; and
 * fetching over HTTP is the same path a visitor takes, so what lands in
 * dist/ is exactly what the site serves today — no separate rendering
 * path to drift out of sync.
 *
 *   php build.php
 *
 * Environment:
 *   LIVE_HOST      overrides the host baked into canonicals and sitemap
 *   FORM_ENDPOINT  a Formspree (or similar) URL for the enquiry forms;
 *                  with none set the forms are replaced by the call and
 *                  WhatsApp panel rather than posting into nothing
 */

$root = __DIR__;
$dist = $root . '/dist';
$port = 8123;

require_once $root . '/inc/config.php';   // for $SERVICES and LIVE_HOST
$host = getenv('LIVE_HOST') ?: LIVE_HOST;

/* Every page on the site. Anything not listed here does not get built,
   which is the point — the list is short and reviewable. */
$routes = ['/', '/about/', '/contact/', '/services/'];
foreach ($SERVICES as $slug => $_) {
    $routes[] = '/services/' . $slug . '/';
}

/* Generated files that are PHP on the server and plain files here. */
$generated = [
    '/robots.php'  => 'robots.txt',
    '/sitemap.php' => 'sitemap.xml',
    '/404.php'     => '404.html',
];

echo "Building for https://$host\n";

// --- clean ------------------------------------------------------------
if (is_dir($dist)) {
    rrmdir($dist);
}
mkdir($dist, 0755, true);

// --- start the renderer ----------------------------------------------
$env = 'STATIC_BUILD=1';
$formEndpoint = getenv('FORM_ENDPOINT');
if ($formEndpoint) {
    $env .= ' FORM_ENDPOINT=' . escapeshellarg($formEndpoint);
    echo "Forms post to $formEndpoint\n";
} else {
    echo "No FORM_ENDPOINT set — forms replaced by the call/WhatsApp panel\n";
}

$cmd = sprintf('%s php -S 127.0.0.1:%d -t %s', $env, $port, escapeshellarg($root));
$server = proc_open($cmd, [1 => ['file', '/dev/null', 'w'], 2 => ['file', '/dev/null', 'w']], $pipes);
if (!is_resource($server)) {
    fwrite(STDERR, "Could not start the PHP server\n");
    exit(1);
}
register_shutdown_function(function () use ($server) {
    if (is_resource($server)) {
        proc_terminate($server);
        proc_close($server);
    }
});

// Wait for it rather than sleeping a guessed number of seconds.
$up = false;
for ($i = 0; $i < 100; $i++) {
    if (@fsockopen('127.0.0.1', $port, $e, $s, 0.2)) { $up = true; break; }
    usleep(100000);
}
if (!$up) {
    fwrite(STDERR, "PHP server did not come up on port $port\n");
    exit(1);
}

// --- render -----------------------------------------------------------
$written = 0;
$failed  = [];

foreach ($routes as $route) {
    $html = fetch($route, $port, $host);
    if ($html === null) { $failed[] = $route; continue; }

    // '/' becomes dist/index.html, '/about/' becomes dist/about/index.html
    $target = $dist . rtrim($route, '/') . '/index.html';
    write_file($target, $html);
    printf("  %-46s %6.1f KB\n", $route, strlen($html) / 1024);
    $written++;
}

foreach ($generated as $route => $name) {
    $body = fetch($route, $port, $host);
    if ($body === null) { $failed[] = $route; continue; }
    write_file($dist . '/' . $name, $body);
    printf("  %-46s %6.1f KB\n", $route . ' -> ' . $name, strlen($body) / 1024);
    $written++;
}

// --- static files -----------------------------------------------------
copy_tree($root . '/assets', $dist . '/assets');
echo "  assets/ copied\n";

/* Google asks for /favicon.ico by that exact path, so it has to be a real
   file at the root of the build too, not only inside assets/. */
if (is_file($root . '/favicon.ico')) {
    copy($root . '/favicon.ico', $dist . '/favicon.ico');
    echo "  favicon.ico copied\n";
}

/* GitHub Pages reads the custom domain out of this file, and would
   otherwise drop the domain every time the branch is republished. */
write_file($dist . '/CNAME', $host . "\n");

/* Without it, Pages runs the output through Jekyll, which quietly drops
   any file or folder whose name starts with an underscore. */
write_file($dist . '/.nojekyll', '');

echo "\n$written pages written to dist/\n";

if ($failed) {
    fwrite(STDERR, "FAILED: " . implode(', ', $failed) . "\n");
    exit(1);
}

/* A build that silently ships a page still saying noindex would be
   invisible in Google and nobody would notice for weeks. */
$home = file_get_contents($dist . '/index.html');
if (strpos($home, 'noindex') !== false) {
    fwrite(STDERR, "FAILED: pages built with noindex — LIVE_HOST does not match the build host\n");
    exit(1);
}
if (strpos($home, '<?php') !== false) {
    fwrite(STDERR, "FAILED: raw PHP in the output\n");
    exit(1);
}
echo "Checked: indexable, no PHP left in the output.\n";


// ---------------------------------------------------------------------

/** One page, rendered by the built-in server as the live host. */
function fetch(string $route, int $port, string $host): ?string
{
    $ctx = stream_context_create(['http' => [
        'header'        => "Host: $host\r\nX-Forwarded-Proto: https\r\n",
        'ignore_errors' => true,
        'timeout'       => 30,
    ]]);
    $body = @file_get_contents('http://127.0.0.1:' . $port . $route, false, $ctx);
    if ($body === false) {
        return null;
    }
    // 404.php answers with a 404 status by design; everything else must be 200.
    $status = isset($http_response_header[0]) ? $http_response_header[0] : '';
    if ($route !== '/404.php' && strpos($status, '200') === false) {
        fwrite(STDERR, "  $route -> $status\n");
        return null;
    }
    return $body;
}

function write_file(string $path, string $body): void
{
    $dir = dirname($path);
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    file_put_contents($path, $body);
}

function copy_tree(string $from, string $to): void
{
    if (!is_dir($from)) {
        return;
    }
    if (!is_dir($to)) {
        mkdir($to, 0755, true);
    }
    foreach (scandir($from) as $entry) {
        if ($entry === '.' || $entry === '..') {
            continue;
        }
        $src = $from . '/' . $entry;
        $dst = $to . '/' . $entry;
        is_dir($src) ? copy_tree($src, $dst) : copy($src, $dst);
    }
}

function rrmdir(string $dir): void
{
    foreach (scandir($dir) as $entry) {
        if ($entry === '.' || $entry === '..') {
            continue;
        }
        $path = $dir . '/' . $entry;
        is_dir($path) ? rrmdir($path) : unlink($path);
    }
    rmdir($dir);
}
