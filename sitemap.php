<?php
/**
 * Sitemap, generated rather than hand-kept.
 *
 * Two reasons it is not a static file. The URLs have to carry whichever
 * domain is actually serving the site — a sitemap listing a staging
 * subdomain after launch is worse than no sitemap. And every page is
 * listed from $SERVICES, so adding a service cannot leave the sitemap
 * behind.
 *
 * WHAT IS IN IT
 *
 * loc, lastmod, and image entries with titles. That is the whole of what
 * Google reads.
 *
 * changefreq and priority are not here and are not an oversight. Google
 * has stated plainly that it ignores both — priority in particular, since
 * a site declaring every one of its own pages a 1.0 tells a crawler
 * nothing. Writing them anyway is markup that has to be maintained and
 * changes nothing.
 *
 * lastmod IS read, but only while it looks trustworthy: a file where
 * every page claims to have changed on the same day, every deploy, is one
 * Google stops believing. So the date comes from git — the commit that
 * last touched that page's own source — and falls back to the file's
 * timestamp only where git cannot be reached. On a cPanel deploy the
 * clone is right there in public_html, so git is normally available and
 * the dates are the real ones.
 *
 * No sitemap index. That is for sets above 50,000 URLs or 50MB; this is
 * eleven pages and splitting it would only add a file to fetch.
 *
 * .htaccess serves this at /sitemap.xml, which is where robots.txt and
 * Search Console both expect it.
 */

require_once __DIR__ . '/inc/config.php';
require_once __DIR__ . '/inc/media.php';

header('Content-Type: application/xml; charset=utf-8');

$root = __DIR__;

/** Absolute URL for a site-relative path. */
function loc(string $path): string
{
    return SITE_URL . $path;
}

/** Absolute URL for an image file, or null. */
function img_loc($names, string $dir = '/assets/img'): ?string
{
    $found = find_image($dir, $names);
    if ($found === null) {
        return null;
    }
    // asset() adds the cache-busting query, which a sitemap should not
    // carry — the canonical URL of the file is the one without it.
    $enc = implode('/', array_map('rawurlencode', explode('/', ltrim($found, '/'))));
    return SITE_URL . '/' . $enc;
}

/**
 * Whether git can be asked anything at all.
 *
 * Shared hosts routinely disable exec(), and there is no git binary at
 * all on a static build. Worked out once rather than per page, because
 * the answer cannot change halfway through a request.
 */
function git_available(string $root): bool
{
    static $ok = null;
    if ($ok !== null) {
        return $ok;
    }

    $disabled = array_map('trim', explode(',', (string) ini_get('disable_functions')));
    if (in_array('exec', $disabled, true) || !function_exists('exec')) {
        return $ok = false;
    }
    if (!is_dir($root . '/.git')) {
        return $ok = false;
    }

    exec('git -C ' . escapeshellarg($root) . ' rev-parse --git-dir 2>/dev/null', $out, $status);
    return $ok = ($status === 0);
}

/**
 * The date a page last actually changed, as W3C datetime.
 *
 * Asks git for the commit that last touched the page's own source. That
 * is the honest answer: a fresh clone gives every file on disk the same
 * timestamp — the moment of the deploy — and a sitemap built from those
 * says all eleven pages changed together, every single deploy, which is
 * exactly the pattern that gets lastmod ignored.
 *
 * Falls back to the file's timestamp where git cannot answer. Imperfect,
 * but a rough date beats no date, and the alternative is omitting lastmod
 * on hosts where exec() is off.
 */
function lastmod(string $root, string $path): ?string
{
    $file = $root . $path;
    if (!is_file($file)) {
        return null;
    }

    if (git_available($root)) {
        $cmd = 'git -C ' . escapeshellarg($root)
             . ' log -1 --format=%cI -- ' . escapeshellarg(ltrim($path, '/')) . ' 2>/dev/null';
        exec($cmd, $out, $status);
        $date = trim(implode('', $out));
        if ($status === 0 && $date !== '') {
            return $date;
        }
    }

    return date('c', filemtime($file));
}

/* path => ['file' => source file, 'images' => [[url, title], …]]
   The source file is what lastmod is read from, so each entry names its
   own rather than the path being guessed back into one. */
$pages = [];

$pages['/'] = [
    'file'   => '/index.php',
    'images' => array_values(array_filter([
        img_pair([HERO_IMAGE, 'hero'],   'Samsung service center in the UAE'),
        img_pair([ABOUT_IMAGE, 'about'], 'Samsung appliance repair across the UAE'),
        img_pair([CTA_IMAGE, 'cta'],     'Call a Samsung specialist in the UAE'),
    ])),
];

/** [url, title] for an image, or null if the file is not there. */
function img_pair($names, string $title, string $dir = '/assets/img'): ?array
{
    $url = img_loc($names, $dir);
    return $url === null ? null : [$url, $title];
}

$hub = [];
foreach ($SERVICES as $slug => $svc) {
    $names = array_values(array_filter([$svc['image'] ?? null, $slug]));
    $title = html_entity_decode(strip_tags($svc['title']), ENT_QUOTES, 'UTF-8');
    $one   = img_loc($names, '/assets/img/services') ?? img_loc($names);

    if ($one !== null) {
        $hub[] = [$one, $title];
    }
    $pages['/services/' . $slug . '/'] = [
        'file'   => '/services/' . $slug . '/index.php',
        'images' => $one !== null ? [[$one, $title]] : [],
    ];
}

/* The hub carries all seven photographs, so it is inserted ahead of the
   pages it links to rather than appended after them — a sitemap reads
   better in the order the site is structured. */
$pages = array_merge(
    ['/' => $pages['/'], '/services/' => ['file' => '/services/index.php', 'images' => $hub]],
    array_diff_key($pages, ['/' => 0])
);

$pages['/about/']   = ['file' => '/about/index.php',   'images' => []];
$pages['/contact/'] = ['file' => '/contact/index.php', 'images' => []];

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
<?php foreach ($pages as $path => $page): $mod = lastmod($root, $page['file']); ?>
  <url>
    <loc><?= htmlspecialchars(loc($path), ENT_XML1) ?></loc>
<?php if ($mod !== null): ?>
    <lastmod><?= htmlspecialchars($mod, ENT_XML1) ?></lastmod>
<?php endif; ?>
<?php foreach ($page['images'] as list($src, $title)): ?>
    <image:image>
      <image:loc><?= htmlspecialchars($src, ENT_XML1) ?></image:loc>
      <image:title><?= htmlspecialchars($title, ENT_XML1) ?></image:title>
    </image:image>
<?php endforeach; ?>
  </url>
<?php endforeach; ?>
</urlset>
