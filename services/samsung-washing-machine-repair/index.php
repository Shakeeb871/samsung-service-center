<?php
/**
 * Samsung Washing Machine Repair UAE — a landing page in its own right.
 *
 * The other six services still run through inc/service-page.php, which
 * expects symptoms, checks, notes and FAQs. This page's copy is a
 * different shape: eleven faults, each with its error code, what causes
 * it and how it is fixed. Forcing that into the shared template would
 * have meant cutting it about, so it has its own layout.
 *
 * Layout rule for this page: no section is a centred wall of prose. Every
 * block of copy is paired with something the eye can land on — a panel of
 * assurances, a photograph, an index of error codes, a checklist. The
 * words are exactly as supplied; only what sits beside them is designed.
 *
 * The eleven faults are native <details> elements rather than a scripted
 * accordion. They open without JavaScript, they are keyboard operable for
 * free, and browsers can find text inside a closed one. Someone arriving
 * with a 5C on the display wants that one entry, not all eleven — which
 * is what the code index above the list is for.
 */

$page_title = 'Samsung Washing Machine Repair UAE | Certified On-Site Service';
$page_desc  = 'Certified Samsung washing machine repair across the UAE. Same-day on-site service, genuine Samsung spare parts, upfront pricing and a 90-day warranty on every job.';
$page_path  = '/services/samsung-washing-machine-repair/';

require __DIR__ . '/../../inc/header.php';

/* The eleven faults as supplied: heading, the code shown on the machine,
   what is happening and why, then the fix.

   'chip' is what the index above the list prints — the code alone, as it
   appears on the display, because that is what someone is matching. */
$FAULTS = [
  [
    'id' => 'drainage',
    'title' => 'Water Drainage Failure',
    'code'  => '5C or 5E Error',
    'chip'  => '5C',
    'problem' => 'Your washing machine stops mid-cycle and leaves clothes soaking in a drum full of dirty water. This drainage failure usually happens when lint, coins, or small fabric pieces completely block the debris filter or the main drain hose. In older machines, the magnetic drain pump motor simply burns out over time and loses the electrical power needed to push heavy water out of the drum.',
    'solution' => 'Our technicians clear all internal blockages from the drainage path and test the pump&rsquo;s electrical continuity. If the drain pump motor has failed entirely, we replace it directly with a genuine Samsung pump to restore smooth and fast water drainage instantly.',
  ],
  [
    'id' => 'water-supply',
    'title' => 'Water Supply and Filling Issues',
    'code'  => '4C or 4E Error',
    'chip'  => '4C',
    'problem' => 'The machine turns on, but no water enters the drum, which triggers a 4C error code on your display. This occurs when the small mesh filters inside the water inlet valves get clogged with hard water scale and sand. A damaged electronic water inlet valve can also fail to open mechanically, stopping the water flow completely even if your home water pressure remains perfect.',
    'solution' => 'We clean the inlet mesh filters thoroughly and test the electrical voltage reaching the water valves. If the valve mechanism is jammed or electrically dead, we install a new authorized inlet valve so your machine fills quickly and correctly on every wash cycle.',
  ],
  [
    'id' => 'door-lock',
    'title' => 'Door Lock Malfunctions',
    'code'  => 'DE or dC Error',
    'chip'  => 'DE',
    'problem' => 'You finish a wash cycle but the door refuses to unlock, trapping your wet clothes inside. Conversely, the door might not click shut properly to allow the machine to start. This frustrating problem happens when the electronic door latch mechanism breaks physically or when the main control board fails to send the correct electrical unlocking signal to the latch assembly.',
    'solution' => 'We safely manually unlock your door to rescue your clothes without breaking the plastic handle. Then, we replace the faulty door interlock switch and check the wiring connections to ensure the door secures and opens exactly when it should.',
  ],
  [
    'id' => 'noise',
    'title' => 'Excessive Drum Noise and Heavy Vibrations',
    'code'  => '',
    'chip'  => 'Noise',
    'problem' => 'Your washing machine sounds like a jet engine taking off during the spin cycle and shakes violently across your laundry floor. This severe vibration stems from worn-out shock absorbers, broken suspension springs, or completely collapsed drum bearings. Continuous overloading tears these internal suspension parts apart, causing the heavy metal drum to hit the outer casing.',
    'solution' => 'We strip down the machine to inspect the internal suspension system. We replace the damaged shock absorbers or fit new high-quality drum bearings on the spot, completely eliminating the loud banging noises and keeping your machine perfectly stable.',
  ],
  [
    'id' => 'spin',
    'title' => 'Spin Cycle Failure',
    'code'  => 'UE or Ub Error',
    'chip'  => 'UE',
    'problem' => 'The machine washes and drains perfectly, but refuses to spin fast, leaving your laundry dripping wet. The UE error indicates an unbalanced load, which the machine detects to prevent self-damage. However, if your load is perfectly balanced, the actual root cause is often a stretched drive belt, worn-out motor carbon brushes, or a failing motor capacitor that cannot generate enough spinning torque.',
    'solution' => 'We recalibrate the internal load sensors and inspect the motor drive system physically. We fit a new tight drive belt or replace the worn motor brushes, giving your machine the exact power it needs to spin your clothes completely dry.',
  ],
  [
    'id' => 'leaking',
    'title' => 'Water Leaking From the Front or Bottom',
    'code'  => 'LE Error',
    'chip'  => 'LE',
    'problem' => 'You find dangerous puddles of water spreading across your floor during a wash. Front leaks almost always happen because sharp objects like keys or zippers tear the flexible rubber door seal gasket. Bottom leaks usually come from loose internal detergent hoses, a cracked plastic water tub, or a degraded rubber seal inside the main water pump.',
    'solution' => 'We trace the exact source of the leak using dry testing methods. We fit a brand new, factory-grade rubber door seal and secure all internal hose clips tightly, ensuring your laundry room floor stays completely dry.',
  ],
  [
    'id' => 'no-power',
    'title' => 'Machine Completely Dead',
    'code'  => 'No Power',
    'chip'  => 'No Power',
    'problem' => 'You press the power button, but the digital display stays blank and the machine makes absolutely no sound. This sudden power loss happens due to a blown internal noise filter, a damaged main power cable, or a short-circuited main PCB motherboard. Power surges in your home electrical system easily fry these sensitive electronic control boards.',
    'solution' => 'We use digital multimeters to trace the electrical current from your wall plug directly to the main board. We replace blown internal fuses, fix wiring faults, or install a new programmed Samsung motherboard to bring your dead machine back to life.',
  ],
  [
    'id' => 'drum-not-turning',
    'title' => 'Drum Not Turning At All',
    'code'  => '3E Error',
    'chip'  => '3E',
    'problem' => 'The machine fills with water, but the drum stays completely still and you hear a faint clicking noise from the bottom. The 3E error points directly to a serious motor defect. A snapped drive belt stops the rotation immediately, but more complex causes include a failed motor hall sensor or a burnt inverter control board that cannot communicate with the direct-drive motor.',
    'solution' => 'We run a direct diagnostic scan on the motor components to find the break in communication. We replace snapped belts, fit new hall sensors, or repair the inverter communication lines, restoring smooth and continuous drum rotation.',
  ],
  [
    'id' => 'heating',
    'title' => 'Water Heating Failure',
    'code'  => 'HE or HC Error',
    'chip'  => 'HE',
    'problem' => 'Your clothes come out stained, and the front glass door stays completely cold during a hot wash cycle. The HE error means the water heating element has failed. Hard water causes thick calcium scale to build up around the heater, causing it to overheat and burn out from the inside. A faulty NTC thermistor temperature sensor can also stop the heater from turning on.',
    'solution' => 'We test the heating element and the temperature sensor for proper electrical resistance. We remove the heavily scaled heater and install a brand new heating element, ensuring your machine reaches the exact temperatures needed to remove tough stains.',
  ],
  [
    'id' => 'odor',
    'title' => 'Bad Odors and Mold on Clothes',
    'code'  => '',
    'chip'  => 'Odour',
    'problem' => 'Your freshly washed clothes smell like damp mildew, and you notice dark black spots inside the machine drum. This hygiene problem occurs because low-temperature washes leave undissolved detergent residue and fabric softener behind. This sticky sludge builds up behind the drum and inside the rubber door seal, creating a perfect breeding ground for foul-smelling black mold.',
    'solution' => 'We perform a deep mechanical cleaning of the internal tub, detergent dispenser, and drainage path. We replace heavily molded door seals and run a high-temperature chemical service wash to eliminate all bacteria, leaving your machine smelling fresh.',
  ],
  [
    'id' => 'detergent',
    'title' => 'Detergent Not Dispensing Properly',
    'code'  => '',
    'chip'  => 'Detergent',
    'problem' => 'At the end of the wash cycle, you open the drawer and find a solid lump of wet washing powder left behind. This happens when the small water jets above the dispenser drawer get blocked by hard water limescale. A clogged siphon tube in the fabric softener compartment also stops the cleaning liquids from flowing down into the drum.',
    'solution' => 'We safely remove and dismantle the entire upper dispenser housing. We clear the blocked water jets, clean the siphon tubes, and ensure strong water pressure flushes all your detergent directly into the wash load where it belongs.',
  ],
];

/* What the machine is checked for, section by section. Every item is a
   component named in the inspection paragraph below it — the list is that
   paragraph made scannable, not extra claims. */
$INSPECTION = [
  'Water inlet valves checked for blockages',
  'Drain pump tested for proper water flow',
  'Main PCB control board inspected for electrical faults',
  'Motor and drive belt assessed for wear and tear',
  'Rubber door seal examined for tears and leaks',
  'Shock absorbers checked for stability',
  'Drum bearings checked for smooth, quiet operation',
];

/* The assurances the opening paragraphs make, pulled out where they can
   be read in a glance rather than found in a sentence. */
$ASSURANCE = [
  ['clock',  'Same-day on-site service',   'Fast solutions delivered at your doorstep.'],
  ['shield', 'Genuine Samsung parts',      'Every replacement is an authorised part.'],
  ['wallet', 'Upfront, clear pricing',     'The price is agreed before work starts.'],
  ['check',  '90-day repair warranty',     'On every job we complete for you.'],
];

/* Named in the "all types" paragraph. Printed as labels so the range is
   visible without reading the paragraph twice. */
$MODELS = ['Front-Load', 'Top-Load', 'Washer-Dryer Combo', 'EcoBubble', 'QuickDrive', 'AddWash'];

page_hero(
  'Samsung Washing Machine Repair UAE',
  'Certified, on-site Samsung washing machine repair across the Emirates.',
  ['Home' => '/', 'Services' => '/services/', 'Washing Machine' => null]
);
?>

<section class="section wm-open-sec">
  <div class="wrap wm-open">
    <div class="wm-open-copy">
      <p class="wm-first">
        Welcome to the official destination for premium Samsung washing machine repair across
        the UAE. We provide certified, on-site repair services to keep your laundry routine
        running at peak performance. Our dedicated specialists deliver fast, same-day solutions
        using genuine Samsung spare parts and advanced diagnostic tools. Whether you need a quick
        part replacement or a complete system service, we bring true expertise straight to your
        doorstep with guaranteed results.
      </p>
      <p class="wm-actions">
        <a class="btn" href="tel:<?= BIZ_PHONE_LINK ?>"><?= icon('phone', 15) ?>Call <?= htmlspecialchars(BIZ_PHONE) ?></a>
        <a class="btn btn-dark" href="https://wa.me/<?= BIZ_WHATSAPP ?>" rel="noopener">WhatsApp the model number</a>
      </p>
    </div>

    <?php /* Not a grid of tiles — one panel with ruled rows, so it reads
             as a specification rather than as four badges. */ ?>
    <aside class="assure" aria-label="What every repair includes">
      <ul>
        <?php foreach ($ASSURANCE as $a): ?>
        <li>
          <?= icon($a[0], 22) ?>
          <div>
            <strong><?= htmlspecialchars($a[1]) ?></strong>
            <span><?= htmlspecialchars($a[2]) ?></span>
          </div>
        </li>
        <?php endforeach; ?>
      </ul>
      <a class="assure-call" href="tel:<?= BIZ_PHONE_LINK ?>">
        <span>Speak to a technician</span>
        <strong><?= icon('phone', 18) ?><?= htmlspecialchars(BIZ_PHONE) ?></strong>
      </a>
    </aside>
  </div>
</section>

<section class="section section-tint">
  <div class="wrap split media-split">
    <div>
      <div class="section-head">
        <h2>Professional Samsung Washing Machine Service Center In United Arab Emirates</h2>
      </div>
      <p>
        Finding a trustworthy team to handle your expensive home appliances requires confidence
        and clear communication. We operate the most reliable Samsung washing machine service
        center in the region, focusing strictly on transparency and high-quality workmanship.
        Our certified technicians understand the exact engineering behind Samsung technology.
        We prioritize your schedule, provide upfront clear pricing, and ensure every repair
        meets official factory standards. You receive a complete service record and a solid
        90-day warranty on every job we complete.
      </p>
    </div>
    <div class="media">
      <?= service_photo('samsung-washing-machine-repair', $SERVICES['samsung-washing-machine-repair']) ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="section-head center">
      <h2>Our Specialits Repair All Types Of Samsung Washing Machine</h2>
    </div>
    <p class="wm-narrow">
      Samsung produces a wide variety of laundry appliances, and our technical team knows the
      internal mechanics of every single model perfectly. We repair front-load washing machines,
      top-load washers, and advanced washer-dryer combos. Whether you own an EcoBubble model, a
      QuickDrive unit, or a classic AddWash machine, our engineers carry the exact tools and
      knowledge required. We adapt our repair methods to the specific design and features of
      your exact appliance to ensure a flawless repair.
    </p>

    <ul class="model-strip">
      <?php foreach ($MODELS as $m): ?>
      <li><?= icon('washer', 20) ?><?= htmlspecialchars($m) ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<section class="section section-grey">
  <div class="wrap">
    <div class="fault-intro">
      <div class="section-head fi-head">
        <h2>We Deal With All Samsung Washing Machine Problems</h2>
      </div>

      <div class="fi-copy">
        <p>
          A washing machine can stop unexpectedly during a spin cycle, fail to drain water
          completely, or lock the door tight with your wet clothes trapped inside. Ignoring these
          early warning signs or simply resetting the machine often leads to permanent motherboard
          damage. Calling an uncertified mechanic makes the situation much worse, as they often
          replace the wrong parts through guesswork. Our expert technicians eliminate this stress
          completely. We use advanced digital error scanners to pinpoint the exact root cause
          behind any Samsung washing machine problem.
        </p>
        <p>
          Here is a detailed breakdown of the exact problems we fix and how we resolve them
          directly at your home.
        </p>
      </div>

      <?php /* An index, not decoration. Someone standing at the machine
               reading a code off the display presses it and lands on that
               one entry, already open. Without JavaScript the link still
               jumps to the row. */ ?>
      <aside class="code-index" aria-label="Find your error code">
        <h3>Your machine is showing</h3>
        <ul>
          <?php foreach ($FAULTS as $f): ?>
          <li><a href="#fault-<?= $f['id'] ?>"><?= htmlspecialchars($f['chip']) ?></a></li>
          <?php endforeach; ?>
        </ul>
        <p>Press a code to jump straight to that fault and its fix.</p>
      </aside>
    </div>

    <div class="fault-list">
      <?php foreach ($FAULTS as $i => $f): ?>
      <details class="fault" id="fault-<?= $f['id'] ?>"<?= $i === 0 ? ' open' : '' ?>>
        <summary>
          <span class="fault-n"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
          <span class="fault-head">
            <span class="fault-title"><?= $f['title'] ?></span>
            <?php if ($f['code'] !== ''): ?>
            <span class="fault-code"><?= $f['code'] ?></span>
            <?php endif; ?>
          </span>
          <span class="fault-mark" aria-hidden="true"></span>
        </summary>
        <div class="fault-body">
          <div class="fault-problem">
            <span class="fault-label">The Problem</span>
            <p><?= $f['problem'] ?></p>
          </div>
          <div class="fault-fix">
            <span class="fault-label fault-fix-label">The Solution</span>
            <p><?= $f['solution'] ?></p>
          </div>
        </div>
      </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="cta-band">
  <div class="cta-band-inner">
    <div class="cta-copy">
      <div class="cta-copy-inner">
        <h2>Washing machine down? A specialist can be with you within the hour.</h2>
        <p>Certified technicians, genuine Samsung parts, and a 90-day warranty on every repair.</p>
        <a class="cta-phone" href="tel:<?= BIZ_PHONE_LINK ?>"><?= icon('phone', 26) ?><?= htmlspecialchars(BIZ_PHONE) ?></a>
      </div>
    </div>
    <div class="cta-photo">
      <?= photo('/assets/img', [CTA_IMAGE, 'cta'], 'Call our Samsung washing machine repair experts in the UAE', '') ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="section-head center">
      <h2>Our Complete Working Process</h2>
    </div>

    <ol class="flow">
      <li class="flow-step">
        <span class="flow-num">01</span>
        <h3>Contact Us 24/7</h3>
        <p>Our friendly customer support team is available day or night to record your appliance issue and arrange immediate help.</p>
      </li>
      <li class="flow-step">
        <span class="flow-num">02</span>
        <h3>1 Hour Response</h3>
        <p>We aim to respond to emergency call-outs within an hour, dispatching a skilled specialist straight to your location.</p>
      </li>
      <li class="flow-step">
        <span class="flow-num">03</span>
        <h3>Diagnosis &amp; Approval</h3>
        <p>Our technician examines the machine on site, explains the exact fault clearly, and provides an upfront price before starting any work.</p>
      </li>
      <li class="flow-step">
        <span class="flow-num">04</span>
        <h3>Problem Solved</h3>
        <p>We complete the approved repair, run a final test cycle to prove the machine works, and leave your laundry room completely clean and tidy.</p>
      </li>
    </ol>
  </div>
</section>

<section class="section section-tint">
  <div class="wrap split inspect-split">
    <div>
      <div class="section-head">
        <h2>Our Complete Inspection Services Includes In Samsung Washing Machine</h2>
      </div>
      <p>
        We do not just replace a single broken part and leave your home. Our comprehensive
        inspection covers every critical component of your machine to prevent future breakdowns.
        We thoroughly check the water inlet valves for blockages and test the drain pump for
        proper water flow. Our specialists inspect the main PCB control board for electrical
        faults and assess the motor and drive belt for wear and tear. We also carefully examine
        the rubber door seal, shock absorbers, and drum bearings to ensure smooth, quiet, and
        leak-free operation.
      </p>
    </div>

    <?php /* The same seven components as a list you can run your eye down
             while the technician works through them. */ ?>
    <ul class="check-list">
      <?php foreach ($INSPECTION as $item): ?>
      <li><?= icon('check', 18) ?><?= htmlspecialchars($item) ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<section class="section section-dark">
  <div class="wrap split support-split">
    <div>
      <div class="section-head">
        <h2>Official Samsung Washing Machine Customer Support</h2>
      </div>
      <p>
        A successful repair depends heavily on honest and accessible communication. Our dedicated
        customer support desk operates around the clock to provide instant assistance for any
        service inquiry or technical complaint. If you have a question about your recent repair or
        need emergency troubleshooting, you never have to wait for hours or chase different staff
        members. We maintain clear service records and take full accountability for our work,
        ensuring you always have a direct line to reliable and professional help.
      </p>
    </div>

    <div class="support-card">
      <span class="support-open"><?= icon('clock', 16) ?>Support desk open 24 hours</span>
      <a class="cta-phone" href="tel:<?= BIZ_PHONE_LINK ?>"><?= icon('phone', 26) ?><?= htmlspecialchars(BIZ_PHONE) ?></a>
      <div class="support-actions">
        <a class="btn btn-white" href="https://wa.me/<?= BIZ_WHATSAPP ?>" rel="noopener">WhatsApp us</a>
        <a class="btn btn-outline" href="<?= url('/contact/') ?>">Book a repair</a>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="section-head center">
      <h2>We Cover Every Area In UAE</h2>
    </div>
    <p class="wm-narrow">
      A broken washing machine does not wait for a convenient time, no matter where you live.
      Our dedicated repair team covers every major state, including Dubai, Abu Dhabi, Sharjah,
      Ajman, Ras Al Khaimah, Umm Al Quwain, and Fujairah. Our technicians have over a decade
      of local driving experience and know the fastest routes across the Emirates. This allows
      us to reach your doorstep swiftly and deliver emergency repair services exactly when you
      need them.
    </p>

    <ul class="area-grid">
      <?php foreach ($EMIRATES as $e): ?>
      <li>
        <?= icon('pin', 18) ?>
        <strong><?= htmlspecialchars($e) ?></strong>
        <span><?= count($AREAS[$e]) ?> areas covered</span>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<section class="section section-grey">
  <div class="wrap split media-split media-split-flip">
    <div class="media">
      <?= photo('/assets/img', [ABOUT_IMAGE, 'about'], 'Our Samsung washing machine repair team in the UAE') ?>
    </div>
    <div>
      <div class="section-head">
        <h2>Why Our Samsung Washing Machine Repair Team Matters In The UAE</h2>
      </div>
      <p>
        We are proud of our high standards and always endeavour to find ways to improve our
        relationship with our customers. Finding a reliable technician in the UAE can be a
        frustrating challenge, but our licensed Samsung team saves you from those constant
        headaches.
      </p>
      <p>
        We guarantee punctual arrivals to protect your daily schedule and provide completely
        transparent pricing with zero hidden fees. By combining genuine spare parts, professional
        communication, and deep technical expertise, we serve as the perfect appliance repair
        partner for your home. We treat your property with complete respect and deliver quick,
        trustworthy solutions that last.
      </p>
      <p class="wm-actions">
        <a class="btn" href="tel:<?= BIZ_PHONE_LINK ?>"><?= icon('phone', 15) ?>Call <?= htmlspecialchars(BIZ_PHONE) ?></a>
        <a class="btn btn-dark" href="<?= url('/contact/') ?>">Book a repair</a>
      </p>
    </div>
  </div>
</section>

<section class="section section-tint">
  <div class="wrap">
    <div class="section-head center">
      <h2>Other Samsung repairs</h2>
    </div>
    <div class="svc-grid">
      <?php foreach ($SERVICES as $slug => $s): ?>
        <?php if ($slug === 'samsung-washing-machine-repair') continue; ?>
        <article class="svc-card svc-card-sm">
          <div class="svc-media"><?= service_photo($slug, $s) ?></div>
          <div class="svc-body">
            <h3><a href="<?= url('/services/' . $slug . '/') ?>"><?= $s['title'] ?></a></h3>
            <a class="card-link" href="<?= url('/services/' . $slug . '/') ?>">Read more <?= icon('arrow', 16) ?></a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../../inc/footer.php'; ?>
