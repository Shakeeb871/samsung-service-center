<?php
$page_title = 'About Us | Samsung Service Center';
$page_desc  = 'A Samsung appliance repair team covering every emirate in the UAE, with 24/7 customer support, a 1 hour emergency response and a 90 day warranty on repairing.';
$page_path  = '/about/';
require __DIR__ . '/../inc/header.php';
?>

<div class="wrap crumbs"><a href="<?= url('/') ?>">Home</a> &rsaquo; About Us</div>

<section class="section">
  <div class="wrap prose">
    <span class="eyebrow">About us</span>
    <h1>About our Samsung service center</h1>

    <p>
      We repair Samsung home appliances across the United Arab Emirates — washing machines,
      refrigerators, dishwashers, tumble dryers, cookers, hoods and air conditioners. Our call
      centre runs 24/7, and we aim to reach emergency call-outs within an hour.
    </p>

    <h2>How we work</h2>
    <p>
      Every job starts with a diagnosis at your home rather than an appliance disappearing into a
      workshop. Our technicians tell you the right fault, give a proper report, and complete the
      job on time. Every repair carries an upfront quote and a full 90 day warranty on repairing,
      so the price is agreed before the work begins and the work is backed after it ends.
    </p>

    <h2>Where we cover</h2>
    <p>
      We cover every state in the UAE: <?= htmlspecialchars(implode(', ', $EMIRATES)) ?>. Our
      experts have 10+ years experienced in the UAE and know the main roads very well, which is
      what makes a one hour response realistic rather than a promise on a page.
    </p>

    <h2>Getting in touch</h2>
    <p>
      The fastest route is a call or a WhatsApp message with the model number and a line about
      what the appliance is doing. The model number is on a sticker — inside the refrigerator door
      frame, behind the washing machine door seal, or on the side panel of an AC indoor unit. With
      that in hand, most faults can be narrowed down before the visit is booked.
    </p>

    <p>
      <a class="btn" href="tel:<?= BIZ_PHONE_LINK ?>"><?= icon('phone', 18) ?>Call <?= htmlspecialchars(BIZ_PHONE) ?></a>
      <a class="btn btn-dark" href="<?= url('/contact/') ?>">Contact page</a>
    </p>
  </div>
</section>

<section class="stat-strip" style="padding:0">
  <div class="wrap stats">
      <div class="stat"><?= icon('clock', 40) ?><b>24/7</b><span>Customer service, day or night</span></div>
      <div class="stat"><?= icon('bolt', 40) ?><b>1 Hour</b><span>Emergency call-out response</span></div>
      <div class="stat"><?= icon('shield', 40) ?><b>90 Day</b><span>Warranty on repairing</span></div>
      <div class="stat"><?= icon('pin', 40) ?><b>7</b><span>Emirates covered</span></div>
  </div>
</section>

<?php require __DIR__ . '/../inc/footer.php'; ?>
