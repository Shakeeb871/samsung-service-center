<?php
$page_title = 'Contact | Samsung Service Center Dubai';
$page_desc  = 'Book a Samsung appliance repair in Dubai. Send the model number and the fault, and get a diagnosis time and a call-out price back.';
$page_path  = '/contact/';
require __DIR__ . '/inc/header.php';
?>

<div class="wrap crumbs"><a href="/">Home</a> &rsaquo; Contact</div>

<section class="section">
  <div class="wrap grid grid-2">

    <div>
      <h1>Book a repair</h1>
      <p>
        The more you can tell us up front, the more useful the first reply is. The model
        number matters most — it decides which generation of board, compressor or motor
        is inside, and that is what determines whether the likely part is already in the
        van.
      </p>
      <p class="small">
        Where to find it: inside the refrigerator door frame, behind the washing machine
        door seal, on the back panel of a dryer, or on the side of an AC indoor unit.
      </p>

      <ul class="info-list mt">
        <li>
          <span>Phone</span>
          <a href="tel:<?= BIZ_PHONE_LINK ?>"><?= htmlspecialchars(BIZ_PHONE) ?></a>
        </li>
        <li>
          <span>WhatsApp</span>
          <a href="https://wa.me/<?= BIZ_WHATSAPP ?>" rel="noopener">Message us</a>
        </li>
        <li>
          <span>Email</span>
          <a href="mailto:<?= BIZ_EMAIL ?>"><?= htmlspecialchars(BIZ_EMAIL) ?></a>
        </li>
        <li>
          <span>Hours</span>
          <strong><?= htmlspecialchars(BIZ_HOURS) ?></strong>
        </li>
        <li>
          <span>Address</span>
          <strong><?= htmlspecialchars(BIZ_ADDRESS) ?></strong>
        </li>
      </ul>
    </div>

    <div>
      <form class="form-card" id="enquiry-form" action="/api/contact.php" method="post">

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
            <option value="<?= htmlspecialchars($s['short']) ?>"><?= htmlspecialchars($s['short']) ?></option>
            <?php endforeach; ?>
            <option value="Other">Something else</option>
          </select>
        </div>

        <div class="field">
          <label for="model">Model number <span class="small">(if you have it)</span></label>
          <input type="text" id="model" name="model" maxlength="60" placeholder="e.g. RT38K5530S8">
        </div>

        <div class="field">
          <label for="area">Area in Dubai</label>
          <input type="text" id="area" name="area" maxlength="60" placeholder="e.g. Al Barsha">
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
    </div>

  </div>
</section>

<?php require __DIR__ . '/inc/footer.php'; ?>
