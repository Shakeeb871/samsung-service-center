<?php
/**
 * robots.txt, generated so the Sitemap line carries whichever domain is
 * serving the site. A robots file pointing at a staging subdomain after
 * launch sends Google to the wrong sitemap.
 *
 * .htaccess serves this at /robots.txt.
 *
 * Nothing under /assets/ is disallowed, and that is deliberate: a
 * favicon Googlebot cannot fetch is a favicon that never appears in
 * search results, and the same is true of every photograph on the site.
 */
require_once __DIR__ . '/inc/config.php';
header('Content-Type: text/plain; charset=utf-8');
?>
<?php if (IS_STAGING): ?>
# This site is on a staging subdomain. Every page sends noindex, and
# crawling is deliberately left open so crawlers can read that noindex —
# "Disallow: /" would block the crawl and the noindex would never be seen.
<?php endif; ?>
User-agent: *
Allow: /
Disallow: /api/
Disallow: /inc/
Disallow: /deploy-check.php
Disallow: /icon-check.php

Sitemap: <?= SITE_URL ?>/sitemap.xml
