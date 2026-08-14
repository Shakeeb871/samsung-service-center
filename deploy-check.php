<?php
/**
 * Deployment check.
 *
 * Answers one question: is the build on this server the current one?
 * "The site looks old" has several possible causes — the deploy never
 * pulled, it landed in the wrong document root, or the browser is holding
 * a cached stylesheet — and they need separating before anything is fixed.
 *
 * Deliberately prints no absolute paths, no configuration values and no
 * server internals. Delete this file before launch.
 */

require_once __DIR__ . '/inc/config.php';

header('Cache-Control: no-store, no-cache, must-revalidate');

$root = __DIR__;

$expect = [
  'index.php'                                    => 'Homepage',
  'inc/config.php'                               => 'Config',
  'inc/icons.php'                                => 'Icons',
  'inc/logo.php'                                 => 'Logo',
  'inc/media.php'                                => 'Image lookup',
  'inc/service-page.php'                         => 'Service page layout',
  'assets/css/style.css'                         => 'Stylesheet',
  'assets/js/main.js'                            => 'Script',
  'services/index.php'                           => 'Services hub',
  'services/samsung-hood-repair/index.php'       => 'Hood page',
  'services/samsung-cooker-repair/index.php'     => 'Cooker page',
  'about/index.php'                              => 'About',
  'contact/index.php'                            => 'Contact',
  'api/contact.php'                              => 'Form handler',
  '.htaccess'                                    => 'Clean URLs and caching',
  'robots.txt'                                   => 'Robots',
  'sitemap.xml'                                  => 'Sitemap',
];

$css      = $root . '/assets/css/style.css';
$css_body = is_file($css) ? file_get_contents($css) : '';

// The palette has changed three times. Whichever marker the deployed
// stylesheet carries tells you exactly which build is on the server.
$palettes = [
  '#2d8cff' => 'Current — blue #2d8cff on white',
  '#1428A0' => 'Older — Samsung blue #1428A0',
  '#0d9a9e' => 'Oldest — teal',
];
$palette = 'No stylesheet found';
foreach ($palettes as $marker => $label) {
  if ($css_body !== '' && stripos($css_body, $marker) !== false) { $palette = $label; break; }
}

$stale_index_html = is_file($root . '/index.html');

// Which artwork the server has found. "I uploaded it" and "the site can
// see it" are different statements, and this is the one that matters.
require_once __DIR__ . '/inc/media.php';
$images = [
  'Hero background'   => ['/assets/img', [HERO_IMAGE, 'hero']],
  'Site icon'         => ['/assets/img', [SITE_ICON, 'site-icon', 'favicon']],
  'About section'     => ['/assets/img', [ABOUT_IMAGE, 'about']],
  'Logo'              => ['/assets/img', ['logo']],
  'Call band'         => ['/assets/img', [CTA_IMAGE, 'cta']],
];
foreach ($SERVICES as $slug => $svc) {
  $images['Service — ' . $slug] = ['/assets/img', [$svc['image'] ?? '', $slug]];
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>Deployment check</title>
<style>
  body { font: 15px/1.7 system-ui, sans-serif; margin: 0; padding: 40px 20px; background: #fff; color: #747487; }
  .box { max-width: 720px; margin: 0 auto; }
  h1 { font-size: 1.4rem; color: #232333; margin: 0 0 6px; }
  h2 { font-size: 1rem; color: #232333; margin: 32px 0 10px; }
  table { width: 100%; border-collapse: collapse; font-size: .9rem; }
  td { padding: 8px 10px; border-bottom: 1px solid #e7e7ee; }
  td:last-child { text-align: right; white-space: nowrap; }
  .ok { color: #0a7b3f; font-weight: 600; }
  .no { color: #c02626; font-weight: 600; }
  .big { background: #eef5ff; border: 1px solid #cfe2ff; border-radius: 8px; padding: 18px 20px; margin: 18px 0; color: #232333; }
  .warn { background: #fff5f5; border-color: #f2c9c9; }
  code { background: #f4f4f8; padding: 2px 6px; border-radius: 4px; font-size: .86rem; }
</style>
</head>
<body>
<div class="box">

  <h1>Deployment check</h1>
  <p>Delete this file before launch.</p>

  <div class="big">
    <strong>Stylesheet on this server:</strong> <?= htmlspecialchars($palette) ?><br>
    <strong>Build stamp:</strong> <?= htmlspecialchars(build_id()) ?><br>
    <strong>PHP:</strong> <?= htmlspecialchars(PHP_VERSION) ?>
  </div>

  <?php if ($stale_index_html): ?>
  <div class="big warn">
    <strong>An old <code>index.html</code> is still in this folder.</strong>
    It is left over from the first deploy and the deploy script never removes
    files. <code>.htaccess</code> now lists only <code>index.php</code> as the
    directory index, so it should be harmless — but delete it in File Manager
    to be sure.
  </div>
  <?php endif; ?>

  <h2>Images</h2>
  <table>
    <?php foreach ($images as $label => [$dir, $name]): $f = find_image($dir, $name); ?>
    <tr>
      <td><?= htmlspecialchars($label) ?><br><span style="font-size:.82rem"><code><?= htmlspecialchars(ltrim($dir,'/') . '/' . ((array) $name)[0]) ?></code></span></td>
      <td class="<?= $f ? 'ok' : 'no' ?>"><?= $f ? htmlspecialchars(basename($f)) : 'not uploaded' ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
  <p class="small">
    Any extension works — jpg, jpeg, png, webp, avif — and the name is not
    case sensitive, so <code>Hero.JPG</code> is found just as <code>hero.jpg</code> is.
  </p>

  <h2>Files</h2>
  <table>
    <?php foreach ($expect as $rel => $label): $there = file_exists($root . '/' . $rel); ?>
    <tr>
      <td><code><?= htmlspecialchars($rel) ?></code><br><span style="font-size:.82rem"><?= htmlspecialchars($label) ?></span></td>
      <td class="<?= $there ? 'ok' : 'no' ?>"><?= $there ? 'present' : 'MISSING' ?></td>
    </tr>
    <?php endforeach; ?>
  </table>

  <h2>Reading this</h2>
  <p>
    If the stylesheet says <strong>Current</strong> and nothing is missing, the
    site on this server is up to date. A page that still looks old then means
    your browser is holding a cached copy — open it in a private window, or
    press Ctrl and Shift and R together.
  </p>
  <p>
    If the stylesheet says <strong>Older</strong>, or files are missing, the
    pull did not bring the latest commit. In cPanel open Git&trade; Version
    Control and press <strong>Update from Remote</strong>. The repository is
    cloned into the folder this subdomain serves, so that pull is the whole
    deployment — there is no second step.
  </p>
  <p>
    If a picture shows <strong>not uploaded</strong> above, the server cannot
    see that file. Upload it into the folder named beside it. The name is not
    case sensitive and any common image extension works, so the usual causes
    are the wrong folder, or the upload not having finished.
  </p>
  <p>
    If this page is not found at <code>/deploy-check.php</code> at all, the
    files are going somewhere other than the folder this subdomain serves.
  </p>

</div>
</body>
</html>
