<?php
/**
 * The service landing page.
 *
 * Two services now carry the same shape of copy — an intro, a service
 * centre block, the model range, a long list of faults with the fix for
 * each, a process, an inspection list, support, coverage and a closing
 * block — and the rest will follow. This is that layout, once, so the
 * next one is a file of copy rather than a file of markup.
 *
 * The page builds $LP and includes this. Every string in $LP is printed
 * as given; nothing here rewrites, trims or reorders copy.
 *
 * $LP keys
 *   slug          folder name under /services/
 *   crumb         last breadcrumb label
 *   h1, hero_lead the banner
 *   intro         the opening paragraph
 *   assurance     [[icon, title, line], …]  the panel over the banner
 *   centre_h2     centre_body[]
 *   types_h2      types_body,  models[]
 *   faults_h2     faults_intro[],  faults[]
 *   index_label   index_h3, index_hint   wording of the fault index
 *   band_h2       band_p              the dark call band
 *   process_h2    steps[[title, text], …]
 *   inspect_h2    inspect_body,  inspect_list[]
 *   support_h2    support_body
 *   coverage_h2   coverage_body
 *   why_h2        why_body[]
 *
 * Each fault: id, title, code (may be ''), chip, problem, solution.
 */

require_once __DIR__ . '/config.php';
require __DIR__ . '/header.php';

page_hero(
  $LP['h1'],
  $LP['hero_lead'],
  ['Home' => '/', 'Services' => '/services/', $LP['crumb'] => null],
  'has-lift'
);
?>

<?php /* Lifted up into the banner. The four things the copy promises are
         the first thing on the page, before any scrolling, and the overlap
         ties the banner to the page instead of stacking one flat block on
         another. */ ?>
<div class="lift">
  <div class="wrap">
    <ul class="lift-row">
      <?php foreach ($LP['assurance'] as $a): ?>
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

<?php /* Straight under the banner, phones only.
         On a desktop the fault index sits beside the list and is on screen
         the whole way down it. On a phone that index is five and a half
         screens away, and the visitor who searched their symptom has to
         read four sections about us before reaching their own answer.
         Most of them leave first. This is the same list of symptoms put
         where the question is asked, so the answer is one tap away. */ ?>
<nav class="quick-jump" aria-label="<?= htmlspecialchars($LP['index_label']) ?>">
  <div class="wrap">
    <p class="quick-jump-lead"><?= htmlspecialchars($LP['index_h3']) ?></p>
    <ul>
      <?php foreach ($LP['faults'] as $f): ?>
      <li><a href="#fault-<?= $f['id'] ?>"><?= htmlspecialchars($f['chip']) ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</nav>

<section class="section wm-open-sec">
  <div class="wrap wm-open">
    <div class="wm-open-copy">
      <p class="wm-first"><?= $LP['intro'] ?></p>
    </div>

    <?php /* Dark, on a white ground, early in the page. The one element
             the whole page exists to be pressed should not look like the
             panels around it. */ ?>
    <aside class="call-card">
      <span class="call-card-top"><?= icon('clock', 16) ?>Lines open 24 hours</span>
      <a class="call-card-num" href="tel:<?= BIZ_PHONE_LINK ?>"><?= icon('phone', 22) ?><?= htmlspecialchars(BIZ_PHONE) ?></a>
      <div class="call-card-actions">
        <a class="btn btn-white" href="https://wa.me/<?= BIZ_WHATSAPP ?>" rel="noopener">WhatsApp the model number</a>
        <a class="btn btn-outline" href="<?= url('/contact/') ?>">Book a repair</a>
      </div>
    </aside>
  </div>
</section>

<section class="section section-tint framed-sec">
  <div class="wrap split media-split">
    <div class="media frame frame-left">
      <?= service_photo($LP['slug'], $SERVICES[$LP['slug']]) ?>
    </div>
    <div>
      <div class="section-head">
        <h2><?= $LP['centre_h2'] ?></h2>
      </div>
      <?php foreach ($LP['centre_body'] as $p): ?>
      <p><?= $p ?></p>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="head-split">
      <div class="section-head">
        <h2><?= $LP['types_h2'] ?></h2>
      </div>
      <?php /* Set in two columns. One paragraph across 1150px runs to
               140 characters a line, which is where the eye starts losing
               its place on the way back to the left edge. */ ?>
      <p class="two-col"><?= $LP['types_body'] ?></p>
    </div>

    <ul class="spec-bar" style="--cols:<?= count($LP['models']) ?>">
      <?php foreach ($LP['models'] as $m): ?>
      <li><span><?= htmlspecialchars($m) ?></span></li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<section class="section section-grey">
  <div class="wrap">
    <div class="head-split">
      <div class="section-head">
        <h2><?= $LP['faults_h2'] ?></h2>
      </div>
      <div>
        <?php foreach ($LP['faults_intro'] as $p): ?>
        <p><?= $p ?></p>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="fault-wrap">
      <?php /* Stays on screen beside the rows rather than scrolling away
               at the top of them. Someone standing at the appliance with a
               symptom in front of them presses it and lands on that one
               entry, already open. Without JavaScript the link still
               jumps to the row. */ ?>
      <aside class="fault-side">
        <div class="code-index" aria-label="<?= htmlspecialchars($LP['index_label']) ?>">
          <h3><?= htmlspecialchars($LP['index_h3']) ?></h3>
          <ul>
            <?php foreach ($LP['faults'] as $f): ?>
            <li><a href="#fault-<?= $f['id'] ?>"><?= htmlspecialchars($f['chip']) ?></a></li>
            <?php endforeach; ?>
          </ul>
          <p><?= htmlspecialchars($LP['index_hint']) ?></p>
          <a class="code-call" href="tel:<?= BIZ_PHONE_LINK ?>"><?= icon('phone', 16) ?>Not sure? Call us</a>
        </div>
      </aside>

      <div class="fault-list">
        <?php foreach ($LP['faults'] as $i => $f): ?>
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
  </div>
</section>

<section class="cta-band">
  <div class="cta-band-inner">
    <div class="cta-copy">
      <div class="cta-copy-inner">
        <h2><?= $LP['band_h2'] ?></h2>
        <p><?= $LP['band_p'] ?></p>
        <a class="cta-phone" href="tel:<?= BIZ_PHONE_LINK ?>"><?= icon('phone', 26) ?><?= htmlspecialchars(BIZ_PHONE) ?></a>
      </div>
    </div>
    <div class="cta-photo">
      <?= photo('/assets/img', [CTA_IMAGE, 'cta'], $LP['band_alt'], '') ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="section-head center">
      <h2><?= $LP['process_h2'] ?></h2>
    </div>

    <?php /* A line down the middle with the four steps alternating either
             side of it. Four boxes in a row is the shape every template
             uses; this reads as a sequence you follow rather than four
             things that happen to be next to each other. */ ?>
    <ol class="track">
      <?php foreach ($LP['steps'] as $i => $s): ?>
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

<section class="section section-tint">
  <div class="wrap split inspect-split">
    <div class="inspect-copy">
      <div class="section-head">
        <h2><?= $LP['inspect_h2'] ?></h2>
      </div>
      <p><?= $LP['inspect_body'] ?></p>
    </div>

    <?php /* The same components, numbered, as a list you can run your eye
             down while the technician works through them. */ ?>
    <ol class="check-list">
      <?php foreach ($LP['inspect_list'] as $item): ?>
      <li><?= htmlspecialchars($item) ?></li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>

<section class="section section-dark">
  <div class="wrap split support-split">
    <div>
      <div class="section-head">
        <h2><?= $LP['support_h2'] ?></h2>
      </div>
      <p><?= $LP['support_body'] ?></p>
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
    <div class="head-split">
      <div class="section-head">
        <h2><?= $LP['coverage_h2'] ?></h2>
      </div>
      <p><?= $LP['coverage_body'] ?></p>
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

<section class="section section-grey framed-sec">
  <div class="wrap split media-split media-split-flip">
    <div class="media frame frame-right">
      <?= photo('/assets/img', [ABOUT_IMAGE, 'about'], $LP['why_alt']) ?>
    </div>
    <div>
      <div class="section-head">
        <h2><?= $LP['why_h2'] ?></h2>
      </div>
      <?php foreach ($LP['why_body'] as $p): ?>
      <p><?= $p ?></p>
      <?php endforeach; ?>
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
        <?php if ($slug === $LP['slug']) continue; ?>
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

<?php require __DIR__ . '/footer.php'; ?>
