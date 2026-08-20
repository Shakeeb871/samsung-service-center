<?php
$page_title = 'Contact Us | Samsung Service Center';
$page_desc  = 'Book a Samsung appliance repair anywhere in the UAE. Send the model number and the fault, and get a response from our 24/7 call centre.';
$page_path  = '/contact/';
$page_schema = 'ContactPage';
require __DIR__ . '/../inc/header.php';
?>

<?php page_hero(
  'Book a repair',
  'Our call centre is available 24/7 &mdash; send the model number and the fault.',
  ['Home' => '/', 'Contact Us' => '/contact/']
); ?>

<section class="section">
  <div class="wrap split">

    <div>
      <p>
        Our call centre is available 24/7 and our friendly team can advise and help you day or
        night. The more you can tell us up front, the more useful the first reply is — the model
        number matters most, because it decides which generation of board, compressor or motor is
        inside and whether the likely part is already in the van.
      </p>
      <p class="small">
        Where to find it: inside the refrigerator door frame, behind the washing machine door
        seal, on the back panel of a dryer, or on the side of an AC indoor unit.
      </p>

      <ul class="info-list mt">
        <li>
          <?= icon('phone', 20) ?>
          <div><span>Phone</span><a href="tel:<?= BIZ_PHONE_LINK ?>"><?= htmlspecialchars(BIZ_PHONE) ?></a></div>
        </li>
        <li>
          <?= icon('chat', 20) ?>
          <div><span>WhatsApp</span><a href="https://wa.me/<?= BIZ_WHATSAPP ?>" rel="noopener">Message us</a></div>
        </li>
        <li>
          <?= icon('mail', 20) ?>
          <div><span>New enquiries</span><a href="mailto:<?= BIZ_EMAIL ?>"><?= htmlspecialchars(BIZ_EMAIL) ?></a></div>
        </li>
        <?php /* Two rows rather than two addresses on one, because this is
                 the page whose whole job is sending the reader to the
                 right place. The label is what does that work — the
                 address on its own does not say which one to use. */ ?>
        <li>
          <?= icon('mail', 20) ?>
          <div><span>Existing repairs</span><a href="mailto:<?= BIZ_EMAIL_SUPPORT ?>"><?= htmlspecialchars(BIZ_EMAIL_SUPPORT) ?></a></div>
        </li>
        <li>
          <?= icon('clock', 20) ?>
          <div><span>Hours</span><strong><?= htmlspecialchars(BIZ_HOURS) ?></strong></div>
        </li>
        <li>
          <?= icon('pin', 20) ?>
          <div><span>Coverage</span><strong><?= htmlspecialchars(implode(', ', $EMIRATES)) ?></strong></div>
        </li>
      </ul>
    </div>

    <div>
      <?php if (forms_enabled()): ?>
      <form class="form-card" id="enquiry-form" action="<?= form_action() ?>" method="post">

        <div class="field">
          <label for="name">Your name</label>
          <input type="text" id="name" name="name" required maxlength="80" autocomplete="name">
        </div>

        <div class="field">
          <label for="phone">Phone or WhatsApp</label>
          <input type="tel" id="phone" name="phone" required maxlength="30" autocomplete="tel">
        </div>

        <div class="field">
          <label for="email">Email <span class="small">(optional)</span></label>
          <input type="email" id="email" name="email" maxlength="120" autocomplete="email">
        </div>

        <div class="field">
          <label for="appliance">Appliance</label>
          <select id="appliance" name="appliance" required>
            <option value="">Choose one</option>
            <?php foreach ($SERVICES as $s): ?>
            <option value="<?= htmlspecialchars(html_entity_decode($s['short'], ENT_QUOTES, 'UTF-8')) ?>"><?= $s['short'] ?></option>
            <?php endforeach; ?>
            <option value="Other">Something else</option>
          </select>
        </div>

        <div class="field">
          <label for="model">Model number <span class="small">(if you have it)</span></label>
          <input type="text" id="model" name="model" maxlength="60" placeholder="e.g. RT38K5530S8">
        </div>

        <div class="field">
          <label for="area">Your area</label>
          <input type="text" id="area" name="area" maxlength="60" placeholder="e.g. Al Barsha, Dubai">
        </div>

        <div class="field">
          <label for="message">What is it doing?</label>
          <textarea id="message" name="message" required maxlength="2000"
            placeholder="Describe the fault — noises, error codes on the display, when it started."></textarea>
        </div>

        <!-- Honeypot. People never see this; scripted spam fills it in. -->
        <div class="hp" aria-hidden="true">
          <label for="website">Website</label>
          <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
        </div>

        <button class="btn" type="submit">Send enquiry</button>
        <p class="form-status" role="status" aria-live="polite"></p>
      </form>
      <?php else: ?>
      <?php /* Nowhere to post on this build, so the page offers the two
               routes that reach a person directly instead. */ ?>
      <div class="form-card contact-direct">
        <h2>Reach us directly</h2>
        <p>
          The fastest route is a call or a WhatsApp message with the model number and a line about
          what the appliance is doing. Our lines are open 24 hours.
        </p>
        <a class="call-card-num" href="tel:<?= BIZ_PHONE_LINK ?>"><?= icon('phone', 22) ?><?= htmlspecialchars(BIZ_PHONE) ?></a>
        <div class="contact-direct-actions">
          <a class="btn" href="https://wa.me/<?= BIZ_WHATSAPP ?>" rel="noopener">WhatsApp us</a>
          <a class="btn btn-dark" href="mailto:<?= BIZ_EMAIL ?>">Email us</a>
        </div>
      </div>
      <?php endif; ?>
    </div>

  </div>
</section>

<?php require __DIR__ . '/../inc/footer.php'; ?>
