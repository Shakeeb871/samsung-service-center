<?php
/**
 * Sitemap, generated rather than hand-kept.
 *
 * Two reasons it is not a static file any more. The URLs have to carry
 * whichever domain is actually serving the site — a sitemap listing a
 * staging subdomain after launch is worse than no sitemap. And every page
 * is listed from $SERVICES, so adding a service cannot leave the sitemap
 * behind.
 *
 * Image entries are included because Google Images will not index a photo
 * it has not been pointed at, and this site's photographs are the only
 * thing on it that is not text.
 *
 * .htaccess serves this at /sitemap.xml, which is where robots.txt and
 * Search Console both expect to find it.
 */

require_once __DIR__ . '/inc/config.php';
require_once __DIR__ . '/inc/media.php';

header('Content-Type: application/xml; charset=utf-8');

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

// path => [image URL, caption] ...
$pages = [];

$home_images = array_filter([
    img_loc([HERO_IMAGE, 'hero']),
    img_loc([ABOUT_IMAGE, 'about']),
    img_loc([CTA_IMAGE, 'cta']),
]);
$pages['/'] = $home_images;

$pages['/services/'] = [];
foreach ($SERVICES as $slug => $svc) {
    $names = array_values(array_filter([$svc['image'] ?? null, $slug]));
    $one   = img_loc($names, '/assets/img/services') ?? img_loc($names);
    if ($one !== null) {
        $pages['/services/'][] = $one;
    }
    $pages['/services/' . $slug . '/'] = $one !== null ? [$one] : [];
}

$pages['/about/']   = [];
$pages['/contact/'] = [];

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
<?php foreach ($pages as $path => $images): ?>
  <url>
    <loc><?= htmlspecialchars(loc($path), ENT_XML1) ?></loc>
<?php foreach ($images as $src): ?>
    <image:image><image:loc><?= htmlspecialchars($src, ENT_XML1) ?></image:loc></image:image>
<?php endforeach; ?>
  </url>
<?php endforeach; ?>
</urlset>
