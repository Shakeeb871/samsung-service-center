<?php
/**
 * Favicon diagnostic.
 *
 * "Google still is not showing the icon" has about six possible causes and
 * they cannot be told apart by looking at the site in a browser. This
 * separates them, from the one place that can: the server itself, fetching
 * its own public URLs over the real network the way Googlebot does.
 *
 * It answers, for each icon file:
 *
 *   Is the file on this server at all?          — did the deploy land
 *   Do the served bytes match the file on disk? — is an old copy still live
 *   What status and Content-Type come back?     — 200 and an image type,
 *                                                 or the HTML 404 page
 *   Is robots.txt blocking it?                  — a blocked icon is never
 *                                                 fetched, silently
 *   What does the homepage actually declare?    — the tags as served, not
 *                                                 as written
 *
 * Visit https://<domain>/icon-check.php and read the table. Delete the
 * file when the icon is showing.
 */

require_once __DIR__ . '/inc/config.php';
require_once __DIR__ . '/inc/media.php';

header('Content-Type: text/html; charset=utf-8');
header('Cache-Control: no-store');
header('X-Robots-Tag: noindex, nofollow');

$root = __DIR__;
$base = 'https://' . LIVE_HOST . BASE;

/**
 * Fetch a URL as Googlebot-Image and report what came back.
 *
 * cURL where it exists, streams otherwise — shared hosting has one or the
 * other and rarely both.
 */
function fetch_as_googlebot(string $url): array
{
    $ua = 'Mozilla/5.0 (compatible; Googlebot-Image/1.0; +http://www.google.com/bot.html)';

    if (function_exists('curl_init')) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS      => 5,
            CURLOPT_TIMEOUT        => 15,
            CURLOPT_USERAGENT      => $ua,
            CURLOPT_HEADER         => false,
        ]);
        $body   = curl_exec($ch);
        $status = (int) curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        $type   = (string) curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
        $final  = (string) curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
        $err    = curl_error($ch);
        curl_close($ch);

        return ['ok' => $body !== false, 'status' => $status, 'type' => $type,
                'body' => (string) $body, 'final' => $final, 'error' => $err];
    }

    $ctx  = stream_context_create(['http' => [
        'header'        => "User-Agent: $ua\r\n",
        'timeout'       => 15,
        'ignore_errors' => true,
    ]]);
    $body = @file_get_contents($url, false, $ctx);
    $status = 0;
    $type   = '';
    foreach ($http_response_header ?? [] as $h) {
        if (preg_match('#^HTTP/\S+\s+(\d{3})#', $h, $m))          { $status = (int) $m[1]; }
        if (stripos($h, 'content-type:') === 0)                    { $type = trim(substr($h, 13)); }
    }

    return ['ok' => $body !== false, 'status' => $status, 'type' => $type,
            'body' => (string) $body, 'final' => $url, 'error' => $body === false ? 'fetch failed' : ''];
}

/** What the first bytes say the file really is, whatever the header claims. */
function sniff(string $bytes): string
{
    if (strncmp($bytes, "\x00\x00\x01\x00", 4) === 0)     return 'ICO';
    if (strncmp($bytes, "\x89PNG\r\n\x1a\n", 8) === 0)    return 'PNG';
    if (strncmp($bytes, "\xFF\xD8\xFF", 3) === 0)         return 'JPEG';
    if (strncmp($bytes, 'GIF8', 4) === 0)                 return 'GIF';
    if (strncmp($bytes, 'RIFF', 4) === 0)                 return 'WEBP (Google does not accept this as a favicon)';
    if (stripos(substr($bytes, 0, 400), '<html') !== false
     || stripos(substr($bytes, 0, 400), '<!doctype') !== false) return 'HTML — this is a web page, not an icon';
    if (strncmp($bytes, '{', 1) === 0)                    return 'JSON';
    return 'unrecognised';
}

/* The files the page points at, plus the two paths Google requests by
   name whatever the page says. */
$targets = [
    '/favicon.ico'                   => 'The icon Google fetches by path',
    '/assets/img/favicon-96.png'     => 'The PNG declared beside it',
    '/assets/img/apple-touch-icon.png' => 'iOS home screen',
    '/site.webmanifest'              => 'Android icons live here',
];

$robots = fetch_as_googlebot($base . '/robots.txt');
$home   = fetch_as_googlebot($base . '/');

/** Is $path disallowed by the robots.txt just fetched? */
function blocked_by_robots(string $robotsTxt, string $path): bool
{
    $applies = false;
    foreach (preg_split('/\R/', $robotsTxt) as $line) {
        $line = trim(preg_replace('/#.*$/', '', $line));
        if ($line === '') continue;
        if (preg_match('/^user-agent:\s*(.+)$/i', $line, $m)) {
            $applies = trim($m[1]) === '*';
            continue;
        }
        if ($applies && preg_match('/^disallow:\s*(.*)$/i', $line, $m)) {
            $rule = trim($m[1]);
            if ($rule !== '' && strpos($path, $rule) === 0) return true;
        }
    }
    return false;
}

$rows = [];
foreach ($targets as $path => $why) {
    $disk    = $root . $path;
    $onDisk  = is_file($disk);
    $res     = fetch_as_googlebot($base . $path);
    $served  = strlen($res['body']);
    $matches = $onDisk && $res['body'] === file_get_contents($disk);

    $problems = [];
    if (!$onDisk) $problems[] = 'not on the server — the deploy has not landed';

    /* A failed fetch and a 404 are completely different answers and look
       identical if they are not separated. Some shared hosts block PHP
       from making outbound requests at all, and reporting that as "the
       icon is unreachable" would send someone off fixing a file that was
       never broken. */
    if (!$res['ok'] || $res['status'] === 0) {
        $problems[] = 'this server could not make the request at all'
                    . ($res['error'] ? ' (' . $res['error'] . ')' : '')
                    . ' — outbound HTTP is probably blocked for PHP here. '
                    . 'That says nothing about whether Google can reach the file; '
                    . 'use the Search Console test below instead.';
    } elseif ($res['status'] !== 200) {
        $problems[] = 'HTTP ' . $res['status'] . ', not 200';
    }

    if ($onDisk && $res['status'] === 200 && !$matches) {
        $problems[] = 'served bytes differ from the file on disk — an old copy is still being served';
    }
    if (stripos($res['type'], 'text/html') !== false) {
        $problems[] = 'served as HTML — the request is falling through to a page';
    }
    if (blocked_by_robots($robots['body'], $path)) $problems[] = 'blocked by robots.txt';

    $rows[] = [
        'path' => $path, 'why' => $why, 'onDisk' => $onDisk,
        'diskSize' => $onDisk ? filesize($disk) : 0,
        'status' => $res['status'], 'type' => $res['type'] ?: '—',
        'served' => $served, 'sniff' => $served ? sniff($res['body']) : '—',
        'problems' => $problems,
    ];
}

/* The tags on the homepage as served — which is not necessarily the tags
   in the file, if the deploy is behind. */
preg_match_all('#<link[^>]+rel="(?:icon|apple-touch-icon|manifest)"[^>]*>#i', $home['body'], $tags);
preg_match('#<!-- build ([^>]+) -->#', $home['body'], $build);

$allClear = true;
foreach ($rows as $r) { if ($r['problems']) $allClear = false; }
?>
<!doctype html>
<title>Favicon check</title>
<meta name="robots" content="noindex, nofollow">
<style>
  body { font: 15px/1.6 system-ui, sans-serif; margin: 0; padding: 32px; color: #232333; background: #f7f7f9; }
  .wrap { max-width: 900px; margin: 0 auto; }
  h1 { font-size: 1.4rem; margin: 0 0 4px; }
  .sub { color: #56566b; margin: 0 0 28px; }
  .verdict { padding: 16px 20px; border-radius: 7px; font-weight: 600; margin-bottom: 26px; }
  .good { background: #e7f6ed; color: #0a5c33; }
  .bad  { background: #fdecec; color: #8c1d1d; }
  table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 7px; overflow: hidden; margin-bottom: 26px; }
  th, td { text-align: left; padding: 11px 14px; border-bottom: 1px solid #e7e7ee; font-size: .88rem; vertical-align: top; }
  th { background: #f4f8ff; font-weight: 600; }
  code { font-family: ui-monospace, Menlo, monospace; font-size: .85em; background: #f4f8ff; padding: 1px 5px; border-radius: 4px; }
  .prob { color: #8c1d1d; display: block; }
  .ok { color: #0a5c33; }
  h2 { font-size: 1rem; margin: 26px 0 10px; }
  pre { background: #fff; padding: 14px; border-radius: 7px; overflow-x: auto; font-size: .82rem; margin: 0 0 20px; }
</style>
<div class="wrap">

<h1>Favicon check</h1>
<p class="sub">
  Fetched from this server, over the public network, identifying as
  Googlebot-Image. Base: <code><?= htmlspecialchars($base) ?></code>
  <?php if ($build): ?> &middot; build <code><?= htmlspecialchars($build[1]) ?></code><?php endif; ?>
</p>

<div class="verdict <?= $allClear ? 'good' : 'bad' ?>">
  <?= $allClear
      ? 'Every icon is on the server, reachable, correctly typed and not blocked. Nothing here is stopping Google — see the note at the foot.'
      : 'Something below is wrong. The Problem column says what.' ?>
</div>

<table>
  <tr><th>Path</th><th>Served</th><th>Content-Type</th><th>Actually is</th><th>Problem</th></tr>
  <?php foreach ($rows as $r): ?>
  <tr>
    <td><code><?= htmlspecialchars($r['path']) ?></code><br><span style="color:#7c7c90"><?= htmlspecialchars($r['why']) ?></span></td>
    <td><?= (int) $r['status'] ?><br><span style="color:#7c7c90"><?= number_format($r['served']) ?> bytes<?php
        if ($r['onDisk']) echo ', disk ' . number_format($r['diskSize']); ?></span></td>
    <td><code><?= htmlspecialchars($r['type']) ?></code></td>
    <td><?= htmlspecialchars($r['sniff']) ?></td>
    <td><?php if ($r['problems']): foreach ($r['problems'] as $p): ?>
        <span class="prob"><?= htmlspecialchars($p) ?></span>
        <?php endforeach; else: ?><span class="ok">none</span><?php endif; ?></td>
  </tr>
  <?php endforeach; ?>
</table>

<h2>What the homepage declares, as served</h2>
<pre><?= $tags[0] ? htmlspecialchars(implode("\n", $tags[0])) : 'No icon tags found — the homepage did not fetch, or the deploy is behind.' ?></pre>

<h2>robots.txt, as served</h2>
<pre><?= htmlspecialchars(trim($robots['body']) ?: 'Did not fetch.') ?></pre>

<h2>If every row above is clear</h2>
<p>
  Then nothing on this server is the problem, and the remaining causes are
  all on Google&rsquo;s side:
</p>
<ul>
  <li><strong>Time.</strong> Google refetches favicons rarely &mdash; weeks,
      not days, and it will not refetch at all until it recrawls the
      homepage.</li>
  <li><strong>The homepage has to be indexed first.</strong> No indexed
      homepage, no favicon. Check it in Search Console.</li>
  <li><strong>An old icon may be cached</strong> from whatever was on this
      domain before.</li>
</ul>
<p>
  The one authoritative test: Search Console &rarr; URL Inspection &rarr;
  paste <code><?= htmlspecialchars($base) ?>/favicon.ico</code> &rarr;
  <strong>Test Live URL</strong>. That is Google telling you directly
  whether it can fetch the file.
</p>

<p style="color:#7c7c90;font-size:.85rem;margin-top:30px">
  Delete this file once the icon is showing.
</p>
</div>
