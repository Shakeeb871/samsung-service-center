<?php
$page_title = 'Samsung Service Center Dubai | Appliance Repair at Home';
$page_desc  = 'Samsung refrigerator, washing machine, air conditioner, dryer, dishwasher and oven repair across Dubai. Technicians come to you, diagnose the fault and quote before any work starts.';
$page_path  = '/';
require __DIR__ . '/inc/header.php';
?>

<section class="hero">
  <div class="wrap">
    <h1>Samsung appliance repair, at your door in Dubai</h1>
    <p class="lede">
      A refrigerator that has stopped cooling or a washing machine that will not drain
      is not something you can wait a week on. Tell us the model and the symptom, and a
      technician who works on Samsung units every day comes out to look at it.
    </p>
    <div class="hero-actions">
      <a class="btn" href="tel:<?= BIZ_PHONE_LINK ?>">Call <?= htmlspecialchars(BIZ_PHONE) ?></a>
      <a class="btn btn-ghost" href="https://wa.me/<?= BIZ_WHATSAPP ?>" rel="noopener">Send the model number on WhatsApp</a>
    </div>
    <ul class="hero-points">
      <li>Repairs done in your home</li>
      <li>Price agreed before work starts</li>
      <li><?= htmlspecialchars(BIZ_HOURS) ?></li>
    </ul>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="section-head">
      <span class="eyebrow">What we repair</span>
      <h2>Six appliance types, one manufacturer</h2>
      <p>
        Working on a single brand changes what a technician carries in the van. Samsung
        uses its own inverter compressors, its own control boards and its own fault
        codes, and the parts are not interchangeable with other makes. Sticking to one
        manufacturer means the common failures are already familiar and the usual
        replacement parts are already on board.
      </p>
    </div>

    <div class="grid grid-3">
      <?php foreach ($SERVICES as $slug => $s): ?>
      <div class="card">
        <h3><?= htmlspecialchars($s['short']) ?></h3>
        <p><?= htmlspecialchars($s['blurb']) ?></p>
        <a class="card-link" href="/services/<?= $slug ?>/">See <?= strtolower(htmlspecialchars($s['short'])) ?> repairs</a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section section-soft">
  <div class="wrap">
    <div class="section-head">
      <span class="eyebrow">How a call goes</span>
      <h2>You know the cost before anyone opens the appliance</h2>
      <p>
        The part of appliance repair people dread is the open-ended bill. This is how
        the job is structured so that does not happen.
      </p>
    </div>

    <div class="grid grid-3">
      <div class="card">
        <div class="num">1</div>
        <h3>Describe the fault</h3>
        <p>
          Call or send a WhatsApp message with the model number — it is on a sticker
          inside the fridge door, behind the washing machine drum seal, or on the side
          of the indoor AC unit. The model tells us which generation of board and
          compressor is inside before anyone leaves the workshop.
        </p>
      </div>
      <div class="card">
        <div class="num">2</div>
        <h3>Diagnosis at your home</h3>
        <p>
          A technician tests the unit where it stands. Most faults are found on site:
          a failed thermistor, a blocked drain pump, a start relay that has gone open
          circuit. You get told what failed and what it costs to put right.
        </p>
      </div>
      <div class="card">
        <div class="num">3</div>
        <h3>Repair, or an honest no</h3>
        <p>
          If the fix is worth doing, it is usually done in the same visit. If the
          repair costs more than the appliance is worth — a sealed system leak on an
          older unit, for example — you will be told that instead of being sold a
          repair that does not make sense.
        </p>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap grid grid-2">
    <div>
      <span class="eyebrow">Common calls</span>
      <h2>The faults that come up most in Dubai</h2>
      <p>
        Some of these are ordinary wear. Others are specific to running appliances in
        this climate, where summer ambient temperatures push cooling systems far harder
        than they are tested for, and where hard water leaves scale on every heating
        element it touches.
      </p>
      <p>
        If the symptom below matches yours, the relevant page explains what usually
        causes it.
      </p>
      <a class="btn btn-dark" href="/services/">Browse all repairs</a>
    </div>
    <div>
      <ul class="symptoms">
        <li><strong>Fridge running constantly but not cold.</strong> Often a failed defrost heater or sensor letting the evaporator ice over, so air cannot move through it.</li>
        <li><strong>Washing machine stops mid-cycle with water inside.</strong> Usually a blocked drain pump filter or a pump that has stopped turning.</li>
        <li><strong>AC blowing air that is not cold.</strong> Low refrigerant from a leak, a fouled condenser coil, or a compressor that is not starting.</li>
        <li><strong>Dryer tumbling without heat.</strong> Commonly a tripped thermal cut-out, which is a symptom of restricted airflow rather than the root fault.</li>
        <li><strong>Dishes coming out gritty.</strong> Spray arms blocked with scale, a clogged filter, or a water inlet not filling to the right level.</li>
        <li><strong>Oven heats unevenly or not at all.</strong> A broken element, a failed thermostat, or a control board that has lost its relay.</li>
      </ul>
    </div>
  </div>
</section>

<section class="section section-soft">
  <div class="wrap">
    <div class="section-head">
      <span class="eyebrow">Coverage</span>
      <h2>Areas across Dubai</h2>
      <p>Call-outs run through the day across the city. If your area is not on the list, ask — it is probably still covered.</p>
    </div>
    <ul class="area-tags">
      <?php foreach ($SERVICE_AREAS as $area): ?>
      <li><?= htmlspecialchars($area) ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<section class="section">
  <div class="wrap" style="max-width:800px">
    <div class="section-head">
      <span class="eyebrow">Questions</span>
      <h2>Before you book</h2>
    </div>

    <div class="faq-item">
      <button class="faq-q" type="button">Are you an authorised Samsung service centre?</button>
      <div class="faq-a">
        <p>
          No. This is an independent repair service that specialises in Samsung
          appliances. If your appliance is still inside the manufacturer's warranty
          period, contact Samsung directly first — an independent repair can void
          what is left of that warranty.
        </p>
      </div>
    </div>

    <div class="faq-item">
      <button class="faq-q" type="button">What does a call-out cost?</button>
      <div class="faq-a">
        <p>
          There is a diagnosis charge for the visit, quoted to you on the phone before
          the technician is dispatched. The repair itself is quoted separately once the
          fault is confirmed, and no work starts until you approve that figure.
        </p>
      </div>
    </div>

    <div class="faq-item">
      <button class="faq-q" type="button">Do you use genuine Samsung parts?</button>
      <div class="faq-a">
        <p>
          Where a genuine part is available for the model, that is what goes in. Some
          older models have parts that Samsung no longer supplies, and in those cases a
          compatible equivalent is the only option — you will be told which one is
          being used and why before it is fitted.
        </p>
      </div>
    </div>

    <div class="faq-item">
      <button class="faq-q" type="button">How long does a repair take?</button>
      <div class="faq-a">
        <p>
          Most common faults are diagnosed and repaired in a single visit. A repair
          that needs a part ordered in takes longer, and you will be given a realistic
          date rather than an optimistic one when the part is confirmed.
        </p>
      </div>
    </div>

    <div class="faq-item">
      <button class="faq-q" type="button">Is the work guaranteed?</button>
      <div class="faq-a">
        <p>
          Yes — parts fitted and labour carried out are covered for an agreed period,
          confirmed in writing on your invoice. The guarantee covers the fault that was
          repaired, not unrelated failures elsewhere in the appliance.
        </p>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/inc/footer.php'; ?>
