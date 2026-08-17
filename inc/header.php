<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/icons.php';
require_once __DIR__ . '/logo.php';
require_once __DIR__ . '/media.php';
require_once __DIR__ . '/page-hero.php';

/**
 * Pages set $page_title, $page_desc and $page_path before including this.
 * $page_path is the canonical path with a leading slash.
 */
$page_title = $page_title ?? BIZ_NAME;
$page_desc  = $page_desc  ?? BIZ_TAGLINE;
$page_path  = $page_path  ?? '/';
$canonical  = SITE_URL . $page_path;
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars($page_title) ?></title>
<meta name="description" content="<?= htmlspecialchars($page_desc) ?>">
<link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">
<?php if (IS_STAGING): ?>
<meta name="robots" content="noindex, nofollow">
<?php endif; ?>

<meta property="og:type" content="website">
<meta property="og:title" content="<?= htmlspecialchars($page_title) ?>">
<meta property="og:description" content="<?= htmlspecialchars($page_desc) ?>">
<meta property="og:url" content="<?= htmlspecialchars($canonical) ?>">
<meta property="og:site_name" content="<?= htmlspecialchars(BIZ_NAME) ?>">
<meta property="og:locale" content="en_AE">
<?php if ($og = social_image()): ?>
<meta property="og:image" content="<?= htmlspecialchars($og) ?>">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="<?= htmlspecialchars(BIZ_NAME) ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:image" content="<?= htmlspecialchars($og) ?>">
<?php endif; ?>
<meta name="theme-color" content="#2d8cff">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<?= site_icon_tags() ?>
<link rel="stylesheet" href="<?= asset('/assets/css/style.css') ?>">

<?php /* Ownership proofs for Search Console and Ahrefs. Both are only
         read on the live domain, but they cost nothing on any other host
         and removing them by accident means re-verifying from scratch. */ ?>
<meta name="google-site-verification" content="hEQA4aFrGiP4SnvUOcxb9uXtik_TFaYHJja5Hpmvw2o">
<meta name="ahrefs-site-verification" content="6c2c62e6a56a85308447df139442f5fa77929f1323546085ffd413ca2fb1c878">

<?php if (!IS_STAGING): ?>
<?php /* Live only. On the staging subdomain this would report preview and
         test traffic into the same figures as real visitors, and there is
         no way to separate them again afterwards. */ ?>
<script src="https://analytics.ahrefs.com/analytics.js" data-key="BZr4ZQue83Ra1wOouZBk/w" async></script>
<?php endif; ?>
</head>
<body>
<!-- build <?= build_id() ?> -->


<a class="skip" href="#main">Skip to content</a>

<div class="topbar">
  <div class="wrap topbar-inner">
    <a class="t-mail" href="mailto:<?= BIZ_EMAIL ?>"><?= icon('mail', 16) ?><?= htmlspecialchars(BIZ_EMAIL) ?></a>
    <a href="tel:<?= BIZ_PHONE_LINK ?>"><?= icon('phone', 16) ?><?= htmlspecialchars(BIZ_PHONE) ?></a>
  </div>
</div>

<header class="site-head">
  <div class="wrap head-inner">
    <a class="brand" href="<?= url('/') ?>" aria-label="<?= htmlspecialchars(BIZ_NAME) ?> — home">
      <?= logo() ?>
    </a>

    <button class="nav-toggle" aria-expanded="false" aria-controls="nav" aria-label="Menu">
      <span></span><span></span><span></span>
    </button>

    <nav id="nav" class="nav" aria-label="Main">
      <a href="<?= url('/') ?>">Home</a>

      <div class="nav-item has-sub">
        <a href="<?= url('/services/') ?>">Services</a>
        <?php /* Separate control, so the parent link still goes to the hub
                 rather than being swallowed by the menu it opens. */ ?>
        <button class="sub-toggle" type="button" aria-expanded="false" aria-controls="services-menu"
                aria-label="Show services">
          <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor"
               stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="m6 9 6 6 6-6"/>
          </svg>
        </button>

        <ul class="sub" id="services-menu">
          <?php foreach ($SERVICES as $slug => $s): ?>
          <li><a href="<?= url('/services/' . $slug . '/') ?>"><?= $s['title'] ?></a></li>
          <?php endforeach; ?>
          <li class="sub-all"><a href="<?= url('/services/') ?>">All services</a></li>
        </ul>
      </div>

      <a href="<?= url('/about/') ?>">About Us</a>
      <a href="<?= url('/contact/') ?>">Contact Us</a>
      <a class="btn btn-sm" href="tel:<?= BIZ_PHONE_LINK ?>"><?= icon('phone', 16) ?>Call Now</a>
    </nav>
  </div>
</header>

<main id="main">
