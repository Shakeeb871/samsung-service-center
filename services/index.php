<?php
$page_title = 'Samsung Appliance Repair Services in the UAE';
$page_desc  = 'Every Samsung appliance repair covered — washing machines, refrigerators, dishwashers, tumble dryers, cookers, hoods and air conditioners. 24/7 support and a specialist at your door within 1 hour.';
$page_path  = '/services/';
require __DIR__ . '/../inc/header.php';
?>

<div class="wrap crumbs"><a href="<?= url('/') ?>">Home</a> &rsaquo; Services</div>

<section class="section">
  <div class="wrap">
    <div class="section-head">
      <h1>Samsung appliance repair services</h1>
      <p>
        A failing appliance can cause endless hassle when technicians cannot diagnose the issue
        correctly. Our qualified technicians find the true root cause of the fault across all
        Samsung devices instead of doing quick guesswork. Each page below covers one appliance:
        what usually fails on it, what gets checked first, and what the repair involves.
      </p>
    </div>

    <div class="svc-grid">
      <?php foreach ($SERVICES as $slug => $s): ?>
      <article class="svc-card">
        <div class="svc-media">
          <?= photo('/assets/img/services', $slug, strip_tags(html_entity_decode($s['title'])), '') ?>
        </div>
        <div class="svc-body">
          <h3><a href="<?= url('/services/' . $slug . '/') ?>"><?= $s['title'] ?></a></h3>
          <p><?= $s['body'] ?></p>
          <a class="btn btn-block" href="tel:<?= BIZ_PHONE_LINK ?>"><?= icon('phone', 16) ?>Call Us Now!</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="cta-band">
  <div class="wrap cta-inner">
    <h2>Call Our Experts Now for Fast, Affordable, and Professional Support in the UAE</h2>
    <p>24/7 customer service, a 1 hour response on emergency call-outs, and a 90 day warranty on repairing.</p>
    <a class="cta-phone" href="tel:<?= BIZ_PHONE_LINK ?>"><?= icon('phone', 30) ?><?= htmlspecialchars(BIZ_PHONE) ?></a>
    <div class="cta-actions">
      <a class="btn btn-white" href="tel:<?= BIZ_PHONE_LINK ?>"><?= icon('phone', 15) ?>Call Now</a>
      <a class="btn btn-outline" href="https://wa.me/<?= BIZ_WHATSAPP ?>" rel="noopener">WhatsApp</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../inc/footer.php'; ?>
