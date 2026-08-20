<?php
$page_title = 'Samsung Appliance Repair Services in the UAE';
$page_desc  = 'Every Samsung appliance repair covered — washing machines, refrigerators, dishwashers, tumble dryers, cookers, hoods and air conditioners. 24/7 support and a specialist at your door within 1 hour.';
$page_path  = '/services/';

/* A hub whose subject is the pages under it, so it carries the ItemList
   and a full Service node for each of the seven — the cards on this page
   print every title, photograph and description those nodes contain, so
   the markup describes the page rather than adding to it. */
$page_schema = 'CollectionPage';
require_once __DIR__ . '/../inc/config.php';
require_once __DIR__ . '/../inc/media.php';
require_once __DIR__ . '/../inc/schema.php';
$page_schema_extra = array_merge([schema_service_list()], schema_all_services());

require __DIR__ . '/../inc/header.php';
?>

<?php page_hero(
  'Samsung appliance repair services',
  'Seven appliances, one manufacturer, repaired at your home across the UAE.',
  ['Home' => '/', 'Services' => '/services/']
); ?>

<section class="section">
  <div class="wrap">
    <div class="section-head center">
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
          <?= service_photo($slug, $s) ?>
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

<?php require __DIR__ . '/../inc/footer.php'; ?>
