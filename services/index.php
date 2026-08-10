<?php
$page_title = 'Samsung Appliance Repair Services in Dubai';
$page_desc  = 'Every Samsung appliance repair covered — refrigerators, washing machines, air conditioners, dryers, dishwashers, ovens and microwaves. Diagnosis at your home, price agreed before work starts.';
$page_path  = '/services/';
require __DIR__ . '/../inc/header.php';
?>

<div class="wrap crumbs"><a href="/">Home</a> &rsaquo; Services</div>

<section class="section">
  <div class="wrap">
    <div class="section-head">
      <h1>Samsung appliance repairs in Dubai</h1>
      <p>
        Each page below covers one appliance: what usually fails on it, what the
        technician checks first, and what the repair normally involves. If you already
        know which appliance is giving trouble, go straight to it.
      </p>
    </div>

    <div class="grid grid-3">
      <?php foreach ($SERVICES as $slug => $s): ?>
      <div class="card">
        <h3><?= htmlspecialchars($s['title']) ?></h3>
        <p><?= htmlspecialchars($s['blurb']) ?></p>
        <a class="card-link" href="/services/<?= $slug ?>/">Read more</a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section-soft">
  <div class="wrap grid grid-2">
    <div>
      <span class="eyebrow">Why one brand</span>
      <h2>A Samsung-only workload changes the diagnosis</h2>
      <p>
        A general appliance technician meets a Samsung inverter compressor occasionally.
        Someone working on the brand daily has seen the same board fail on the same
        model range enough times to recognise it from the symptom description on the
        phone.
      </p>
      <p>
        That shows up in two practical ways. Fewer visits end with a part on order and a
        second appointment, because the likely part is already in the van. And fewer
        repairs replace the wrong component, because the fault pattern is familiar
        rather than being worked out from scratch.
      </p>
    </div>
    <div>
      <span class="eyebrow">What you get told</span>
      <h2>The parts of the quote that matter</h2>
      <ul class="symptoms">
        <li><strong>What actually failed</strong> — the component, not a restatement of the symptom.</li>
        <li><strong>What the part costs</strong> and whether it is genuine or a compatible equivalent.</li>
        <li><strong>What the labour costs</strong>, separately from the part.</li>
        <li><strong>Whether it is worth doing.</strong> On an older appliance with a sealed-system fault, often it is not.</li>
        <li><strong>What the guarantee covers</strong> and for how long.</li>
      </ul>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../inc/footer.php'; ?>
