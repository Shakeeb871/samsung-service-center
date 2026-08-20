<?php
/* Spelled Samsung. The title was supplied as "Samsnug" — the one word on
   this page that cannot carry a typo, since it is the brand being
   searched for and nobody searches the misspelling. */
$page_title = 'Samsung Authorized Service Center In UAE - Official Repairs';
$page_desc  = 'Samsung service center across the UAE. 24/7 customer service, an experienced Samsung specialist at your door within 1 hour, an upfront quote on every repair and a full 90 day warranty.';
$page_path  = '/';

/* The homepage prints the same seven service cards the hub does — same
   titles, same photographs, same copy — so it carries the same seven
   Service nodes, plus its own ItemList. Each node keeps the @id of the
   page that service lives on, so this is the same seven things described
   twice rather than fourteen things. */
require_once __DIR__ . '/inc/config.php';
require_once __DIR__ . '/inc/media.php';
require_once __DIR__ . '/inc/schema.php';
require_once __DIR__ . '/inc/faqs.php';
$page_schema_extra = array_merge(
    [schema_service_list(SITE_URL . '/#services'), schema_faq($FAQS)],
    schema_all_services()
);

require __DIR__ . '/inc/header.php';
?>

<section class="hero"<?= hero_bg() ?>>
  <div class="wrap">
    <div class="hero-grid">

      <div>
        <div class="rating">
          <span class="stars"><?= str_repeat(icon('star', 15), 5) ?></span>
          <span>Samsung appliance specialists across the UAE</span>
        </div>

        <h1>Trusted Samsung Appliance Repair Experts Serving UAE Homes</h1>

        <p>
          Samsung innovation makes everyday home life smooth, but when an appliance stops
          working, it disrupts your typical routines completely. You are left looking for an
          authorized Samsung service center or a reliable repair team who can arrive timely
          and keep their true promises. Too many repair services leave customers waiting for
          days, give vague arrival times, or add hidden fees to the bill.
        </p>
        <p>
          At our Samsung service center, we fix that frustration completely. We offer 24/7
          customer service and dispatch an experienced Samsung specialist to your door with a
          fast response within 1 hour. We value true commitment and remain completely truthful
          when it comes to pricing. Every repair comes with an upfront quote and a full 90 day
          warranty on repairing, giving you complete peace of mind.
        </p>

        <div class="hero-actions">
          <a class="btn" href="tel:<?= BIZ_PHONE_LINK ?>"><?= icon('phone', 15) ?>Call Us</a>
          <a class="btn btn-outline" href="#book">Book Now</a>
        </div>
      </div>

    </div>

    <div class="enquiry-bar" id="book">
      <?php if (forms_enabled()): ?>
      <form id="enquiry-form" action="<?= form_action() ?>" method="post">
        <input type="text" name="name" placeholder="Your Name" required maxlength="80" autocomplete="name" aria-label="Your name">
        <input type="tel" name="phone" placeholder="Phone" required maxlength="30" autocomplete="tel" aria-label="Phone">
        <input type="email" name="email" placeholder="Your Email" maxlength="120" autocomplete="email" aria-label="Email">
        <select name="appliance" required aria-label="Service required">
          <option value="">Service required</option>
          <?php foreach ($SERVICES as $s): ?>
          <option value="<?= htmlspecialchars(html_entity_decode($s['short'], ENT_QUOTES, 'UTF-8')) ?>"><?= $s['short'] ?></option>
          <?php endforeach; ?>
          <option value="Other">Other</option>
        </select>
        <input type="text" name="message" placeholder="Message" required maxlength="2000" aria-label="Message">
        <div class="hp" aria-hidden="true"><input type="text" name="website" tabindex="-1" autocomplete="off" placeholder="Website"></div>
        <button class="btn" type="submit">Submit</button>
        <p class="form-status" role="status" aria-live="polite"></p>
      </form>
      <?php else: ?>
      <?php /* No endpoint to post to on this build. The number and the
               WhatsApp thread are what this bar was competing with
               anyway. */ ?>
      <div class="enquiry-direct">
        <div>
          <strong>Tell us what the appliance is doing</strong>
          <span>Call or send the model number on WhatsApp &mdash; lines open 24 hours.</span>
        </div>
        <div class="enquiry-direct-actions">
          <a class="btn" href="tel:<?= BIZ_PHONE_LINK ?>"><?= icon('phone', 15) ?>Call <?= htmlspecialchars(BIZ_PHONE) ?></a>
          <a class="btn btn-dark" href="https://wa.me/<?= BIZ_WHATSAPP ?>" rel="noopener">WhatsApp us</a>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php /* The four figures, straight under the hero.
         A <dl> rather than a list of divs: each one is a term and the
         value that answers it, which is what a description list is, and a
         screen reader then reads "appliances repaired, five thousand
         plus" instead of two unrelated fragments.
         The number is printed first in all four even where it was written
         the other way round, because a row of counters is scanned down
         the numbers — a column where two start with a figure and two
         start with a word has nothing to scan. */ ?>
<section class="counters" aria-label="Our record">
  <div class="wrap">
    <dl class="count-grid">
      <?php /* Label first in the markup, number first on the screen. A
               description list has to be written term-then-value to be
               valid, and that is also the order it should be read aloud
               in — "appliances repaired, five thousand plus". The eye
               wants the opposite, so the flip is done in CSS. */ ?>
      <div class="count">
        <dt class="count-label">Appliances repaired</dt>
        <dd class="count-n">5000<span>+</span></dd>
      </div>
      <div class="count">
        <dt class="count-label">Technicians</dt>
        <dd class="count-n">20<span>+</span></dd>
      </div>
      <div class="count">
        <dt class="count-label">Customer satisfaction</dt>
        <dd class="count-n">100<span>%</span></dd>
      </div>
      <div class="count">
        <dt class="count-label">Available</dt>
        <dd class="count-n">24/7</dd>
      </div>
    </dl>
  </div>
</section>

<section class="section">
  <div class="wrap split media-split">

    <div>
      <div class="section-head">
        <h2>Reliable Samsung Appliance Repair Services Across the UAE</h2>
      </div>
      <p>
        Are you tired of repair services taking your appliance away for a &ldquo;simple
        clean&rdquo; or basic check, only to deliver it back dented, damaged, or not working
        at all? Dealing with an unexpected breakdown in your home is stressful enough without
        worrying about careless technicians ruining your expensive Samsung home appliances.
      </p>
      <p>
        When a company shows zero accountability, makes false promises about arrival times,
        or conceals true costs, it disrespects the customer&rsquo;s integrity. You deserve an
        extremely excellent service that respects your time, listens attentively on call, and
        handles your property with absolute care.
      </p>
      <p>
        At our reliable certified Samsung repair centre, our management team handles every
        request with outstanding professionalism and customer care that exceeds expectations.
        We prioritize on site repairs with no delays and remain honest throughout the complete
        process. Our technicians are straightforward, tell you the right fault, give a proper
        report, and complete the job on time to make your Samsung devices fully functional
        again.
      </p>
      <p class="mt">
        <a class="btn" href="tel:<?= BIZ_PHONE_LINK ?>"><?= icon('phone', 15) ?>Speak to a specialist</a>
      </p>
    </div>

    <div class="media">
      <?= photo('/assets/img', [ABOUT_IMAGE, 'about'], 'Best Samsung service center in the United Arab Emirates — technician on a repair call', 'tools') ?>
    </div>

  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="section-head center">
      <h2>Complete Repair Solutions for Samsung Home Appliances</h2>
      <p>
        A failing appliance can cause endless hassle when technicians cannot diagnose the issue
        correctly. Our qualified technicians find the true root cause of the fault across all
        Samsung devices instead of doing quick guesswork. From deep cleaning and installation to
        complex repairing and servicing, our team delivers complete solutions. Managed by a
        highly skilled administrative staff, we use authentic Samsung parts authorized from
        Samsung to keep your home running smoothly.
      </p>
    </div>

    <div class="svc-grid">
      <?php foreach ($SERVICES as $slug => $s): ?>
      <article class="svc-card">
        <div class="svc-media">
          <?= service_photo($slug, $s) ?>
        </div>
        <div class="svc-body">
          <h3><a href="<?= url('/services/' . $slug . '/') ?>"><?= $s['card'] ?? $s['title'] ?></a></h3>
          <p><?= $s['body'] ?></p>
          <a class="btn btn-block" href="tel:<?= BIZ_PHONE_LINK ?>"><?= icon('phone', 16) ?>Call Us Now!</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="cta-band">
  <div class="cta-band-inner">
    <div class="cta-copy">
      <div class="cta-copy-inner">
        <h2>Get Professional Samsung Appliance Repair Support When You Need It</h2>
        <p>Expert repairs for home and commercial Samsung appliances, every day of the week.</p>
        <a class="cta-phone" href="tel:<?= BIZ_PHONE_LINK ?>"><?= icon('phone', 26) ?><?= htmlspecialchars(BIZ_PHONE) ?></a>
      </div>
    </div>
    <div class="cta-photo">
      <?= photo('/assets/img', [CTA_IMAGE, 'cta'], 'Call our Samsung appliance repair experts in the UAE', '') ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="section-head center">
      <h2>Samsung Appliance Repair Services Across Dubai, Abu Dhabi &amp; Sharjah</h2>
      <p>
        We cover every state in UAE no matter where you are located. Whether you need a
        Samsung service center Dubai, a Samsung service center Abu Dhabi, or service in
        Sharjah, Ajman, RAK, UAQ, or Fujairah, our team is ready. Our Samsung service center
        experts have 10+ years experienced in the UAE and know the main roads of UAE very
        well. These skilled experts reach your location within 1 hour for emergency call-outs,
        ensuring fast and reliable help right at your doorstep when you search for a Samsung
        authorized service center near me or Samsung service center near me.
      </p>
    </div>

    <div class="coverage">
      <ul class="cov-rail" role="tablist" aria-label="Emirates">
        <?php $n = 0; foreach ($AREAS as $emirate => $list): ?>
        <li>
          <button class="cov-tab<?= $n === 0 ? ' is-on' : '' ?>" type="button"
                  role="tab" id="cov-tab-<?= $n ?>" aria-controls="cov-panel-<?= $n ?>"
                  aria-selected="<?= $n === 0 ? 'true' : 'false' ?>">
            <span class="cov-name"><?= htmlspecialchars($emirate) ?></span>
            <span class="cov-count"><?= count($list) ?></span>
          </button>
        </li>
        <?php $n++; endforeach; ?>
      </ul>

      <div class="cov-body">
        <?php $n = 0; foreach ($AREAS as $emirate => $list): ?>
        <div class="cov-panel<?= $n === 0 ? ' is-on' : '' ?>" id="cov-panel-<?= $n ?>"
             role="tabpanel" aria-labelledby="cov-tab-<?= $n ?>">
          <ul class="cov-areas">
            <?php foreach ($list as $area): ?>
            <li><?= $area ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php $n++; endforeach; ?>
      </div>
    </div>
  </div>
</section>

<section class="section section-grey">
  <div class="wrap">
    <div class="section-head center">
      <h2>How Our Samsung Appliance Repair Process Works</h2>
    </div>

    <ol class="flow">
      <li class="flow-step">
        <span class="flow-num">01</span>
        <h3>Tell Us About Your Samsung Appliance Problem</h3>
        <p>Our call centre is available 24/7 and our friendly team can advise and help you day or night.</p>
      </li>
      <li class="flow-step">
        <span class="flow-num">02</span>
        <h3>Get a Quick Response From Our Service Team</h3>
        <p>We aim to respond to emergency call-outs within an hour, subject to availability.</p>
      </li>
      <li class="flow-step">
        <span class="flow-num">03</span>
        <h3>Our Technician Identifies the Cause of the Problem</h3>
        <p>Our engineers and property maintenance team will arrive on site to resolve the issues.</p>
      </li>
      <li class="flow-step">
        <span class="flow-num">04</span>
        <h3>Your Appliance Is Repaired and Thoroughly Tested</h3>
        <p>We cover every part of property maintenance and leave your home clean and tidy.</p>
      </li>
    </ol>
  </div>
</section>

<section class="section section-dark">
  <div class="wrap split">
    <div>
      <h2>Samsung Appliance Support Available Around the Clock</h2>
      <p>
        Unresponsive customer care and unhandled complaints make appliance repairs stressful.
        Many companies ignore follow-up calls once they leave your home, leaving you confused if
        an issue returns. You can reach our team via our samsung appliance service center contact
        number or samsung customer care number anytime.
      </p>
      <p>
        Our well maintained staff and quality control department provide instant call response
        and professional communication. We offer technical quality repair process assurance with
        proper explanation, full acceptance, and clear responsibility. We resolve issues on the
        spot because customer satisfaction is our priority.
      </p>
    </div>

    <div class="callout">
      <h3>Need Help After Your Repair? Speak With Our Support Team</h3>
      <p>
        Dealing with a technical complaint or a careless repair job from an unreliable service
        can feel helpless when no one takes responsibility.
      </p>
      <p>
        If you face any technical complaint, contact us on our official number
        <strong><?= htmlspecialchars(BIZ_PHONE_LINK) ?></strong>. We listen to your issue
        carefully and resolve the issue quickly. If there is a mistake on our engineers&rsquo;
        end, we claim it and fix it regardless of the size of the issue, providing professional
        follow-up with no late deliveries.
      </p>
      <a class="phone-big" href="tel:<?= BIZ_PHONE_LINK ?>"><?= icon('phone', 20) ?><?= htmlspecialchars(BIZ_PHONE) ?></a>
    </div>
  </div>
</section>

<section class="section section-tint">
  <div class="wrap reasons-grid">

    <div class="reasons-intro">
      <h2>Why UAE Homeowners Choose Our Samsung Repair Services</h2>
      <p>
        We are proud of our work and always endeavour to find ways to improve our services and,
        most importantly, the relationship with our customers. We guarantee to offer the same
        level of expertise and respect to our customers&rsquo; friends, family that use any of
        our services.
      </p>
      <p>
        Our licensed Samsung team is highly experienced and serving the UAE to save you any
        further headaches. We are the one setting standards for doorstep, quick, and reliable
        solutions, making us the perfect Samsung appliances repairer for your home.
      </p>
      <p><a class="btn" href="tel:<?= BIZ_PHONE_LINK ?>"><?= icon('phone', 15) ?>Call <?= htmlspecialchars(BIZ_PHONE) ?></a></p>
    </div>

    <ul class="reason-list">
      <li>
        <?= icon('clock', 34) ?>
        <div>
          <h3>Technicians Ready for Your Scheduled Service Visit</h3>
          <p>
            We guarantee punctual visits by our certified specialists strictly within your agreed
            time slot. This prompt action prevents a minor appliance glitch from escalating into
            severe, costly damage while you wait. Ultimately, it eliminates your waiting stress,
            protects your daily schedule, and delivers urgent relief right when you need it most.
          </p>
        </div>
      </li>
      <li>
        <?= icon('chat', 34) ?>
        <div>
          <h3>Clear Communication From Diagnosis to Completion</h3>
          <p>
            Our dedicated communication department provides direct and honest updates with an
            instant response time. This ensures you stay fully informed at every stage of the
            repair process and allows us to resolve any queries on the spot with proper follow-up.
            As a result, you gain complete confidence and clarity without the frustration of
            repeating your problem to different people.
          </p>
        </div>
      </li>
      <li>
        <?= icon('wallet', 34) ?>
        <div>
          <h3>Clear Repair Costs Before the Work Begins</h3>
          <p>
            We provide transparent upfront quotes and supply genuine Samsung spare parts backed by
            a proper official invoice. This straightforward approach guarantees that you will never
            face hidden fees or unexpected charges after the work is done. You remain in complete
            control of your budget and pay exactly the price we agreed upon before the repair
            begins.
          </p>
        </div>
      </li>
      <li>
        <?= icon('shield', 34) ?>
        <div>
          <h3>Experienced Technicians Who Understand Samsung Appliances</h3>
          <p>
            Our highly experienced technicians know every Samsung appliance inside out,
            specializing in both mechanical and electrical components. They accurately solve
            complex faults and routine problems alike, while providing straightforward explanations
            and useful maintenance precautions. This expert care ensures long-lasting appliance
            performance and saves you money on future breakdowns.
          </p>
        </div>
      </li>
      <li>
        <?= icon('gauge', 34) ?>
        <div>
          <h3>Professional Tools for Accurate Appliance Diagnosis</h3>
          <p>
            Our team utilizes advanced digital diagnostic devices and automated error scanners
            during every inspection. These modern tools pinpoint the exact root cause of any
            mechanical or electrical fault in minutes without relying on guesswork. This protects
            your delicate appliance motherboard from accidental tampering and saves you from buying
            unnecessary spare parts.
          </p>
        </div>
      </li>
      <li>
        <?= icon('phone', 34) ?>
        <div>
          <h3>Ongoing Customer Support for Samsung Appliance Services</h3>
          <p>
            We run a dedicated 24/7 customer care service desk that covers all regions across the
            UAE. This round-the-clock availability ensures an immediate call response to handle any
            appliance issue instantly, day or night. You will never feel helpless during a
            late-night appliance emergency because expert help is always just a phone call away.
          </p>
        </div>
      </li>
      <li>
        <?= icon('tools', 34) ?>
        <div>
          <h3>Every Repair Is Checked Before the Job Is Complete</h3>
          <p>
            We perform comprehensive on-site testing and thorough post-repair quality checks after
            every single job. This strict testing process proves that the appliance operates
            perfectly before our technician leaves your property. It delivers complete peace of
            mind, leaving you with a clean, fully functional home appliance right on the first
            visit.
          </p>
        </div>
      </li>
    </ul>

  </div>
</section>

<?php /* The questions, from inc/faqs.php — the same array the FAQPage
         markup is built from, so the two can never describe different
         things.

         <details> rather than a div and a class: it opens with the script
         off, the keyboard drives it without a single tabindex, find-in-page
         reaches the closed answers, and Google indexes them. The animation
         in main.js is layered on top of that, not holding it up. */ ?>
<section class="section faq-band" aria-labelledby="faq-h2">
  <div class="wrap">

    <div class="section-head center">
      <h2 id="faq-h2">Frequently Asked Questions About Samsung Appliance Repairs in the UAE</h2>
    </div>

    <div class="faq-list">
      <?php foreach ($FAQS as $i => list($q, $a)): ?>
      <details class="faq"<?= $i === 0 ? ' open' : '' ?>>
        <summary>
          <span class="faq-q"><?= $q ?></span>
          <span class="faq-mark" aria-hidden="true"></span>
        </summary>
        <div class="faq-body">
          <div class="faq-inner">
            <p><?= $a ?></p>
          </div>
        </div>
      </details>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<?php require __DIR__ . '/inc/footer.php'; ?>
