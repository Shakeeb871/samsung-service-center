<?php
require_once __DIR__ . '/config.php';

/**
 * Each page sets $page_title, $page_desc and $page_path before including
 * this file. $page_path is the canonical path with a leading slash, e.g.
 * '/services/samsung-refrigerator-repair'.
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

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/style.css">
<link rel="icon" href="/assets/img/favicon.png" sizes="any">
</head>
<body>

<a class="skip" href="#main">Skip to content</a>

<header class="site-head">
  <div class="wrap head-inner">
    <a class="brand" href="/">
      <span class="brand-mark">S</span>
      <span class="brand-text">
        <strong><?= htmlspecialchars(BIZ_NAME) ?></strong>
        <small><?= htmlspecialchars(BIZ_TAGLINE) ?></small>
      </span>
    </a>

    <button class="nav-toggle" aria-expanded="false" aria-controls="nav" aria-label="Menu">
      <span></span><span></span><span></span>
    </button>

    <nav id="nav" class="nav">
      <a href="/">Home</a>
      <a href="/services/">Services</a>
      <a href="/about/">About</a>
      <a href="/contact/">Contact</a>
      <a class="btn btn-sm" href="tel:<?= BIZ_PHONE_LINK ?>">Call <?= htmlspecialchars(BIZ_PHONE) ?></a>
    </nav>
  </div>
</header>

<main id="main">
