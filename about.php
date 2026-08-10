<?php
$page_title = 'About | Samsung Service Center Dubai';
$page_desc  = 'An independent repair service working only on Samsung home appliances in Dubai. How the work is done, what is quoted, and what is not claimed.';
$page_path  = '/about/';
require __DIR__ . '/inc/header.php';
?>

<div class="wrap crumbs"><a href="/">Home</a> &rsaquo; About</div>

<section class="section">
  <div class="wrap" style="max-width:820px">
    <h1>About this service</h1>

    <p>
      This is an independent appliance repair business in Dubai that works on one
      manufacturer's products: Samsung. Refrigerators, washing machines, air
      conditioners, dryers, dishwashers, ovens and microwaves.
    </p>

    <h2>Why the narrow focus</h2>
    <p>
      Appliance repair rewards repetition. Samsung designs its own inverter
      compressors, its own main control boards and its own fault-code system, and none
      of it maps neatly onto other manufacturers. A technician who sees those boards
      every working day recognises a failure pattern that someone meeting it twice a
      year has to reason out from first principles.
    </p>
    <p>
      The practical effect is on your afternoon rather than on any technical
      abstraction. Fewer visits end without a repair, because the part that usually
      fails on your model is already in the van. Fewer bills include a component that
      turned out not to be the problem.
    </p>

    <h2>How pricing works</h2>
    <p>
      A call-out carries a diagnosis charge, and you are told that figure on the phone
      before anyone is sent. Once the fault is confirmed at your home, the repair is
      quoted as a separate figure — part and labour listed separately — and nothing is
      opened up or replaced until you have agreed to it.
    </p>
    <p>
      Sometimes the honest answer is not to repair. A sealed-system refrigerant leak in
      an older refrigerator, or a control board on a model where the board costs most of
      what a replacement appliance costs, is not worth your money. You will be told
      that plainly, and the diagnosis charge is all you pay.
    </p>

    <h2>What is not claimed here</h2>
    <p>
      This business is not an authorised Samsung service centre, and is not affiliated
      with, authorised by or endorsed by Samsung Electronics. The brand name appears on
      this site to describe the appliances the service repairs, which is the only reason
      it appears.
    </p>
    <p>
      If your appliance is still covered by the manufacturer's warranty, go to Samsung
      first. An independent repair during the warranty period can end that cover, and no
      saving on a call-out is worth losing it.
    </p>

    <h2>Getting in touch</h2>
    <p>
      The fastest route is a WhatsApp message with the model number and a line about
      what the appliance is doing. The model number is on a sticker — inside the
      refrigerator door frame, behind the washing machine door seal, or on the side
      panel of an AC indoor unit. With that in hand, most faults can be narrowed down
      before the visit is even booked.
    </p>

    <p>
      <a class="btn" href="/contact/">Contact page</a>
      <a class="btn btn-dark" href="tel:<?= BIZ_PHONE_LINK ?>">Call <?= htmlspecialchars(BIZ_PHONE) ?></a>
    </p>
  </div>
</section>

<?php require __DIR__ . '/inc/footer.php'; ?>
