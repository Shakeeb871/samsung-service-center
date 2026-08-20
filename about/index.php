<?php
/**
 * About Us.
 *
 * The copy is long — roughly 2,000 words across twelve sections — so the
 * page is built out of the same components as the service pages rather
 * than as one column of prose: the panel over the banner, the dark call
 * card, headings set beside their copy, problem/solution cards, the
 * numbered value list, the process timeline and the coverage tiles.
 * Nothing here rewrites, trims or reorders a word of it.
 */

$page_title = 'About Us | The Most Trusted Samsung Service Center In The UAE';
$page_desc  = 'A certified and authorized Samsung service center operating across the UAE for over a decade. Genuine parts, upfront pricing, punctual visits and a 90-day warranty on every repair.';
$page_path  = '/about/';
$page_schema = 'AboutPage';

require __DIR__ . '/../inc/header.php';

/* The promises the copy makes, pulled out where they can be read in a
   glance rather than found in a sentence. */
$ABOUT_ASSURANCE = [
  ['clock',  'Over a decade in the UAE', 'Serving every emirate, doorstep to doorstep.'],
  ['shield', 'Certified and authorized', 'Samsung-trained engineers, not gig workers.'],
  ['wallet', 'Upfront, fixed pricing',   'Quoted after diagnosis, before any work.'],
  ['check',  '90-day repair warranty',   'Same fault returns, we return free.'],
];

/* Three frustrations named in the copy, each with the answer to it. Set
   as cards rather than paragraphs — the whole point of the section is
   that the two halves are read against each other. */
$PROBLEMS = [
  [
    'title'    => 'The Problem of False Commitments',
    'problem'  => 'Many companies give you a wide waiting window, telling you they will arrive &ldquo;sometime between morning and evening.&rdquo; You end up wasting your entire day sitting at home.',
    'solution' => 'We guarantee punctual visits. We assign you a strict time slot and we target a 1-hour emergency response. Our team updates you when the technician is on the way, ensuring your daily schedule remains completely protected.',
  ],
  [
    'title'    => 'The Problem of Hidden Charges',
    'problem'  => 'Local mechanics often quote a very low price on the phone just to get inside your house. Once they open your machine, they suddenly invent new faults and double the price, forcing you to pay hidden fees.',
    'solution' => 'We operate with 100% honest pricing. We never guess on the phone. Our technician inspects your machine physically, runs a digital diagnostic scan, and gives you a clear, fixed price before starting any work. You remain in complete control of your budget.',
  ],
  [
    'title'    => 'The Problem of Fake Spare Parts',
    'problem'  => 'To increase their profit margins, many repair shops use cheap, counterfeit Chinese parts that look like Samsung parts but fail within a month. These fake parts frequently cause electrical short circuits that destroy the main motherboard.',
    'solution' => 'We strictly use authentic, factory-authorized Samsung spare parts. Every part we install comes with its official serial details and a proper warranty. We protect your appliance from dangerous electrical faults and ensure it runs exactly as the manufacturer intended.',
  ],
];

/* One department per appliance family, carrying that appliance's own
   icon — the same glyphs the services menu uses. */
$DEPARTMENTS = [
  ['washer', 'Complete Laundry Care (Washing Machines &amp; Dryers)',
   'A washing machine that leaks water or a tumble dryer that refuses to heat can ruin your clothes and flood your floors. Our laundry repair division understands the complex suspension systems, drain pumps, and digital motors that power Samsung washers and dryers. We resolve severe vibrations, clear deep internal blockages, and replace worn-out drive belts quickly. We ensure your laundry appliances clean and dry your clothes perfectly without causing any fabric damage.'],
  ['fridge', 'Advanced Cooling Systems (Refrigerators &amp; Freezers)',
   'In the extreme heat of the UAE, a broken refrigerator is a true emergency. Spoiled food costs you money and puts your family&rsquo;s health at risk. Our cooling specialists respond immediately to temperature failures, ice-maker blockages, and compressor breakdowns. We understand Samsung&rsquo;s Twin Cooling Plus technology and digital inverter compressors deeply. We seal gas leaks, replace defrost heaters, and restore ice-cold temperatures safely and efficiently.'],
  ['cooker', 'Kitchen Ventilation and Cooking (Cookers &amp; Hoods)',
   'A safe kitchen requires perfectly working cookers and strong extractor hoods. We handle dangerous gas ignition failures, burnt electric oven elements, and weak hood suction issues. Our technicians use electronic gas leak detectors to ensure your cooking environment remains completely safe from fire hazards. We clean heavily greased extractor motors and replace faulty oven thermostats, allowing you to cook your meals safely and comfortably.'],
  ['dishwasher', 'Dishwashing Technology',
   'A dishwasher that leaves plates greasy or refuses to drain dirty water creates a highly unhygienic kitchen environment. Our dishwashing experts clear clogged internal filters, replace dead circulation wash pumps, and fix leaking front door seals. We ensure your Samsung dishwasher reaches the high temperatures required to melt tough grease and sanitize your dishes completely.'],
  ['ac', 'Ultimate Climate Control (Air Conditioners)',
   'Surviving the UAE summer requires a perfectly functioning air conditioner. When your AC blows warm air, drips water down your walls, or makes loud grinding noises, our climate control team steps in. We deep-clean blocked indoor evaporator coils, recharge low refrigerant gas levels, and replace noisy blower motors. We restore powerful, icy airflow to your living space instantly, giving you a comfortable home environment.'],
];

$VALUES = [
  ['clock', 'Unmatched Punctuality and Respect',
   'We respect your home and your time. Our technicians arrive in clean uniforms, carry professional toolkits, and wear protective shoe covers to keep your floors clean. We work quietly, efficiently, and we never leave a mess behind. When the repair is finished, we clean the work area completely.'],
  ['chat', 'Absolute Transparency',
   'We believe you have the right to know exactly what is happening to your appliance. Our technicians do not hide behind complex technical words. We show you the broken part, explain why it failed in simple language, and tell you exactly how we will fix it. We provide useful maintenance tips to help you avoid the same problem in the future.'],
  ['shield', 'Safety First Approach',
   'Home appliances deal with high electrical currents, pressurized refrigerant gases, and highly flammable cooking gas. Safety is our ultimate priority. We follow strict safety protocols during every inspection. We test all electrical connections for grounding faults and ensure no water leaks exist near live wires. We protect your home from fire hazards and electrical shocks completely.'],
  ['phone', '24/7 Professional Communication',
   'We maintain a dedicated customer care department that never sleeps. Appliance emergencies happen at night and on weekends. You can reach us anytime. We provide instant call responses, professional follow-ups, and a clear line of communication. If you need to make a complaint, you speak directly to a decision-maker who resolves the issue instantly.'],
];

$STEPS = [
  ['The Initial Assessment',
   'Before we even touch a screwdriver, we listen to you. We ask about the symptoms, any loud noises you heard, and the error codes you saw. This helps us narrow down the problem immediately.'],
  ['Digital and Physical Inspection',
   'We connect our diagnostic tools to your appliance&rsquo;s control board. We read the internal error logs and test the electrical continuity of the suspected parts. We cross-check the digital data with a physical inspection of the belts, motors, and pumps.'],
  ['The Approval Stage',
   'Once we find the exact root cause, we pause. We give you a complete damage report and an upfront price quotation. We only proceed when you give us your clear approval.'],
  ['Precision Repair',
   'We remove the broken component carefully to avoid damaging any surrounding plastic clips or wires. We install the genuine Samsung spare part, secure all connections tightly, and reassemble the machine perfectly.'],
  ['The Final Live Test',
   'Changing a part is not the same as proving the machine works. Before we leave, we run a live test cycle in front of you. We watch the washing machine spin, we measure the air conditioner&rsquo;s temperature output, and we ensure the dishwasher drains completely. We only close the job when you are 100% satisfied with the result.'],
];

page_hero(
  'About Us &mdash; The Most Trusted Samsung Service Center In The UAE',
  'A certified Samsung repair team covering every emirate, for over a decade.',
  ['Home' => '/', 'About Us' => null],
  'has-lift'
);
?>

<div class="lift">
  <div class="wrap">
    <ul class="lift-row">
      <?php foreach ($ABOUT_ASSURANCE as $a): ?>
      <li>
        <?= icon($a[0], 24) ?>
        <div>
          <strong><?= htmlspecialchars($a[1]) ?></strong>
          <span><?= htmlspecialchars($a[2]) ?></span>
        </div>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>

<section class="section wm-open-sec">
  <div class="wrap wm-open">
    <div class="wm-open-copy">
      <p class="wm-first">
        We know exactly how frustrating a broken home appliance can be. When your daily routine
        stops suddenly, you do not just need a quick fix. You need a reliable repair team you can
        actually trust with your expensive home investments. We are a certified and authorized
        Samsung service center operating across the United Arab Emirates. For over a decade, we
        have provided expert doorstep repair solutions for washing machines, refrigerators,
        dishwashers, cookers, tumble dryers, hoods, and air conditioners.
      </p>
      <p>
        Our goal is simple and direct. We bring your essential home devices back to life quickly,
        safely, and honestly. We understand that behind every broken washing machine is a family
        waiting for clean clothes, and behind every broken refrigerator is the fear of spoiled
        food. We treat your appliance emergencies with the exact urgency and respect they deserve.
      </p>
    </div>

    <aside class="call-card">
      <span class="call-card-top"><?= icon('clock', 16) ?>Lines open 24 hours</span>
      <a class="call-card-num" href="tel:<?= BIZ_PHONE_LINK ?>"><?= icon('phone', 22) ?><?= htmlspecialchars(BIZ_PHONE) ?></a>
      <div class="call-card-actions">
        <a class="btn btn-white" href="https://wa.me/<?= BIZ_WHATSAPP ?>" rel="noopener">WhatsApp us</a>
        <a class="btn btn-outline" href="<?= url('/contact/') ?>">Book a repair</a>
      </div>
    </aside>
  </div>
</section>

<section class="section section-tint framed-sec">
  <div class="wrap split media-split">
    <div class="media frame frame-left">
      <?= photo('/assets/img', [ABOUT_IMAGE, 'about'], 'Our Samsung service centre team in the United Arab Emirates') ?>
    </div>
    <div>
      <div class="section-head">
        <h2>Our Foundation And Why We Started Our Journey</h2>
      </div>
      <p>
        We saw a huge problem in the UAE appliance repair industry many years ago. The market was
        completely flooded with
        uncertified mechanics and unreliable repair companies. Customers were tired of technicians
        arriving late, making false promises, and causing more damage to expensive appliances due
        to a lack of proper training.
      </p>
      <p>
        People paid extremely high bills for fake, counterfeit spare parts. Even worse, they
        received absolutely zero customer support when the exact same fault returned just a week
        later. Customers faced ignored phone calls, blocked numbers, and completely denied
        warranties. We decided to change this terrible standard completely.
      </p>
      <p>
        We built our Samsung service center to deliver the exact opposite experience. We focus
        strictly on transparent communication, upfront pricing, and absolute accountability. You do
        not need a middleman who guesses the fault and experiments on your machine. You need an
        official specialist who understands the exact engineering behind your Samsung appliance and
        treats your property with complete respect from the moment they step through your door.
      </p>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="head-split">
      <div class="section-head">
        <h2>Our Mission And True Commitment To You</h2>
      </div>
      <div>
        <p>
          Our mission is to eliminate the stress of appliance breakdowns completely. We provide
          real value through dedicated, tailored, and customized priority care for every single
          customer across the UAE. We guarantee to offer the highest level of technical expertise
          and respect to our customers&rsquo; friends and family that use any of our services.
        </p>
        <p>
          When you book a repair with us, you are not just getting a quick temporary fix. You
          receive a comprehensive diagnostic check, genuine Samsung spare parts, and a long-lasting
          solution that protects your appliance for years to come. We take full responsibility for
          our work. If a mistake happens on our end, we claim it and fix it immediately without any
          arguments or delays. Customer satisfaction is not just a marketing phrase for us; it is
          our absolute priority and the foundation of our entire business model.
        </p>
      </div>
    </div>
  </div>
</section>

<section class="section section-grey">
  <div class="wrap">
    <div class="head-split">
      <div class="section-head">
        <h2>The Severe Market Problems We Actively Solve</h2>
      </div>
      <p>
        Finding the right Samsung technician in the UAE often feels like a gamble. We designed our
        entire service structure around solving the most common frustrations that customers face
        with ordinary repairmen.
      </p>
    </div>

    <div class="fault-list">
      <?php foreach ($PROBLEMS as $i => $pr): ?>
      <div class="fault is-static">
        <div class="fault-summary">
          <span class="fault-n"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
          <span class="fault-head">
            <span class="fault-title"><?= $pr['title'] ?></span>
          </span>
        </div>
        <div class="fault-body">
          <div class="fault-problem">
            <span class="fault-label">The Problem</span>
            <p><?= $pr['problem'] ?></p>
          </div>
          <div class="fault-fix">
            <span class="fault-label fault-fix-label">Our Solution</span>
            <p><?= $pr['solution'] ?></p>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="head-split">
      <div class="section-head">
        <h2>What Makes Us An Official Authority In Appliance Repair?</h2>
      </div>
      <div>
        <p>
          Being an authorized Samsung service center requires maintaining the highest standards of
          technical accuracy and customer care. We do not just hire ordinary mechanics. We employ
          certified engineers who undergo rigorous, continuous training directly related to Samsung
          technology.
        </p>
        <p>
          Modern Samsung appliances are highly advanced. A new Samsung washing machine or smart
          refrigerator contains complex digital inverter boards, moisture sensors, and Bluetooth
          communication modules. You cannot fix these machines with a basic screwdriver and
          guesswork.
        </p>
        <p>
          Our specialists carry advanced digital error scanners, multimeters, and precise
          diagnostic tools. When a machine flashes an error code like 4C, 5E, or E3, our team knows
          exactly how to decode the signal, test the relevant circuits, and isolate the exact
          failing component. This precision prevents unnecessary tampering. We do not dismantle
          your entire machine looking for a fault; we pinpoint the root cause in minutes.
        </p>
      </div>
    </div>
  </div>
</section>

<section class="section section-tint">
  <div class="wrap">
    <div class="head-split">
      <div class="section-head">
        <h2>Our Deep Expertise Across All Samsung Appliances</h2>
      </div>
      <p>
        We have built specialized repair departments for every type of Samsung home appliance. This
        ensures that the technician arriving at your home is a true expert in that specific
        machine.
      </p>
    </div>

    <?php /* Flex, not grid, so the two on the last row centre themselves
             rather than hanging off the left edge. */ ?>
    <div class="dept-grid">
      <?php foreach ($DEPARTMENTS as $d): ?>
      <article class="dept">
        <?= icon($d[0], 30) ?>
        <h3><?= $d[1] ?></h3>
        <p><?= $d[2] ?></p>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="cta-band">
  <div class="cta-band-inner">
    <div class="cta-copy">
      <div class="cta-copy-inner">
        <h2>Appliance down? A certified specialist can be with you within the hour.</h2>
        <p>Genuine Samsung parts, a fixed price agreed before work starts, and a 90-day warranty.</p>
        <a class="cta-phone" href="tel:<?= BIZ_PHONE_LINK ?>"><?= icon('phone', 26) ?><?= htmlspecialchars(BIZ_PHONE) ?></a>
      </div>
    </div>
    <div class="cta-photo">
      <?= photo('/assets/img', [CTA_IMAGE, 'cta'], 'Call our certified Samsung technicians in the UAE', '') ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="head-split">
      <div class="section-head">
        <h2>The Core Values That Define Our Service Center</h2>
      </div>
      <p>
        Our daily operations are guided by four strict core values. These are not just words on a
        page; they are the exact standards we hold every single employee accountable for.
      </p>
    </div>

    <ul class="reason-list">
      <?php foreach ($VALUES as $v): ?>
      <li>
        <?= icon($v[0], 26) ?>
        <div>
          <h3><?= $v[1] ?></h3>
          <p><?= $v[2] ?></p>
        </div>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<section class="section section-grey">
  <div class="wrap">
    <div class="head-split">
      <div class="section-head">
        <h2>Our Strict Diagnostic and Quality Control Process</h2>
      </div>
      <p>
        We leave absolutely nothing to chance. Every repair follows a strict, step-by-step quality
        control process to guarantee a successful job on the first visit.
      </p>
    </div>

    <ol class="track">
      <?php foreach ($STEPS as $i => $s): ?>
      <li class="track-step">
        <span class="track-dot" aria-hidden="true"></span>
        <div class="track-card">
          <span class="track-n"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
          <h3><?= $s[0] ?></h3>
          <p><?= $s[1] ?></p>
        </div>
      </li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="head-split">
      <div class="section-head">
        <h2>Meet Our Team of Certified Specialists</h2>
      </div>
      <div>
        <p>
          A service center is only as good as the people who run it. We are incredibly proud of our
          licensed Samsung team. Our technicians are highly experienced professionals who have been
          serving the UAE community for over 10 years.
        </p>
        <p>
          We do not hire temporary gig workers or freelancers. Every specialist working for us is a
          full-time, dedicated employee who has passed strict background checks and technical
          exams. We invest heavily in their continuous education. Whenever Samsung releases a new
          appliance technology, our team undergoes immediate technical training to understand the
          new internal systems perfectly.
        </p>
        <p>
          Our administrative staff and customer service representatives are equally important. They
          are the friendly voices that answer your emergency calls at two in the morning. They
          manage our complex dispatch routing to ensure the closest technician reaches your location
          within one hour. They maintain your complete service history, so if you call us six
          months later, we know exactly what work was done previously.
        </p>
      </div>
    </div>
  </div>
</section>

<section class="section section-tint">
  <div class="wrap">
    <div class="head-split">
      <div class="section-head">
        <h2>Our Commitment To The UAE Community</h2>
      </div>
      <div>
        <p>
          We proudly cover every single state in the UAE. Whether you live in a high-rise apartment
          in Dubai Marina, a family villa in Abu Dhabi, or a residential neighborhood in Sharjah,
          Ajman, Ras Al Khaimah, Umm Al Quwain, or Fujairah, we reach you quickly. Our drivers know
          the main highways and local routes perfectly, allowing us to bypass heavy traffic and
          arrive exactly when promised.
        </p>
        <p>
          We also take our environmental responsibility seriously. We do not throw broken motors,
          burnt motherboards, or dangerous refrigerant gases into normal household trash. We dispose
          of all electronic waste and heavy metals through proper recycling channels. We safely
          recover and trap old AC gases to prevent environmental damage. When you choose us, you are
          choosing a company that cares deeply about the community and the environment.
        </p>
      </div>
    </div>

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

<section class="section section-dark">
  <div class="wrap split support-split">
    <div>
      <div class="section-head">
        <h2>The 90-Day Ironclad Warranty</h2>
      </div>
      <p>
        We back up every single word we say with a solid 90-day repair warranty. We know that
        installing genuine parts and following factory repair methods produces permanent results.
        However, if a part we installed fails or the exact same problem returns within the warranty
        period, we take full responsibility.
      </p>
      <p>
        You simply call our official customer support number. We do not ask difficult questions, and
        we do not try to blame you. We dispatch a senior technician to your home immediately, and we
        fix the issue completely free of charge. This is the level of accountability and
        trustworthiness you deserve.
      </p>
    </div>

    <div class="support-card">
      <span class="support-open"><?= icon('shield', 16) ?>Covered for 90 days</span>
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
    <div class="head-split">
      <div class="section-head">
        <h2>Setting The Ultimate Standard For Doorstep Repair</h2>
      </div>
      <div>
        <p>
          We are extremely proud of our work and always endeavor to find new ways to improve our
          services and strengthen the relationship with our customers. The UAE is a fast-growing,
          modern country, and its residents deserve home maintenance services that match this high
          standard of living.
        </p>
        <p>
          We are the ones actively setting the highest standards for doorstep, quick, and reliable
          appliance solutions across the country. We remove the frustration, eliminate the waiting,
          and deliver true technical excellence.
        </p>
        <p>
          Enjoy a completely hassle-free and seamless experience with guaranteed results. Choose the
          team that values your time, respects your home, and stands proudly behind their work. We
          remain the perfect Samsung appliances repairer for your home, delivering true commitment,
          deep expertise, and absolute honesty on every single visit.
        </p>
        <p class="wm-actions">
          <a class="btn" href="tel:<?= BIZ_PHONE_LINK ?>"><?= icon('phone', 15) ?>Call <?= htmlspecialchars(BIZ_PHONE) ?></a>
          <a class="btn btn-dark" href="<?= url('/contact/') ?>">Book a repair</a>
        </p>
      </div>
    </div>
  </div>
</section>

<section class="section section-tint">
  <div class="wrap">
    <div class="section-head center">
      <h2>What we repair</h2>
    </div>
    <div class="svc-grid">
      <?php foreach ($SERVICES as $slug => $s): ?>
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

<?php require __DIR__ . '/../inc/footer.php'; ?>
