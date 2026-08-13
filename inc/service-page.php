<?php
/**
 * Shared layout for the six service pages.
 *
 * Each page in /services/ builds a $svc array and includes this file. The
 * copy lives in the page; only the structure lives here, so a change to the
 * layout does not mean editing six files.
 *
 * $svc keys:
 *   slug, h1, intro[], symptoms[[label, text]], checks[[h3, p]],
 *   notes_h2, notes[], faqs[[q, a]]
 */

require_once __DIR__ . '/config.php';
require __DIR__ . '/header.php';
?>

<div class="wrap crumbs">
  <a href="<?= url('/') ?>">Home</a> &rsaquo; <a href="<?= url('/services/') ?>">Services</a> &rsaquo; <?= $svc['short'] ?>
</div>

<section class="section">
  <div class="wrap" style="max-width:860px">
    <h1><?= htmlspecialchars($svc['h1']) ?></h1>
    <?php foreach ($svc['intro'] as $p): ?>
    <p><?= $p ?></p>
    <?php endforeach; ?>

    <p>
      <a class="btn" href="tel:<?= BIZ_PHONE_LINK ?>">Call <?= htmlspecialchars(BIZ_PHONE) ?></a>
      <a class="btn btn-dark" href="https://wa.me/<?= BIZ_WHATSAPP ?>" rel="noopener">WhatsApp the model number</a>
    </p>
  </div>
</section>

<section class="section section-tint">
  <div class="wrap grid grid-2">
    <div>
      <h2>What people call about</h2>
      <p>
        If one of these matches what your appliance is doing, mention it when you get in
        touch. The symptom narrows the likely cause enough to bring the right part along.
      </p>
    </div>
    <div>
      <ul class="symptoms">
        <?php foreach ($svc['symptoms'] as $s): ?>
        <li><strong><?= htmlspecialchars($s[0]) ?></strong> <?= $s[1] ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="section-head">
      <h2>What gets checked, and in what order</h2>
      <p>
        Working through the cheap and likely causes before the expensive ones is what
        keeps a repair bill sensible. This is the order the technician follows.
      </p>
    </div>
    <div class="grid grid-3">
      <?php foreach ($svc['checks'] as $i => $c): ?>
      <div class="card">
        <div class="num"><?= $i + 1 ?></div>
        <h3><?= htmlspecialchars($c[0]) ?></h3>
        <p><?= $c[1] ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section-grey">
  <div class="wrap" style="max-width:820px">
    <h2><?= htmlspecialchars($svc['notes_h2']) ?></h2>
    <?php foreach ($svc['notes'] as $p): ?>
    <p><?= $p ?></p>
    <?php endforeach; ?>
  </div>
</section>

<section class="section">
  <div class="wrap" style="max-width:800px">
    <div class="section-head">
      <h2>About this repair</h2>
    </div>
    <?php foreach ($svc['faqs'] as $f): ?>
    <div class="faq-item">
      <button class="faq-q" type="button"><?= htmlspecialchars($f[0]) ?></button>
      <div class="faq-a"><p><?= $f[1] ?></p></div>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<section class="section section-tint">
  <div class="wrap">
    <div class="section-head">
      <h2>Other Samsung repairs</h2>
    </div>
    <div class="grid grid-3">
      <?php foreach ($SERVICES as $slug => $s): ?>
        <?php if ($slug === $svc['slug']) continue; ?>
        <div class="card">
          <?= icon($s['icon'], 40) ?>
          <h3><?= $s['title'] ?></h3>
          <a class="card-link" href="<?= url('/services/' . $slug . '/') ?>">Read more <?= icon('arrow', 16) ?></a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php require __DIR__ . '/footer.php'; ?>
