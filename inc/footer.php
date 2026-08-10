</main>

<section class="cta-band">
  <div class="wrap cta-inner">
    <div>
      <h2>Tell us what the appliance is doing</h2>
      <p>Describe the fault and the model number, and you will get a straight answer on whether it is worth repairing.</p>
    </div>
    <div class="cta-actions">
      <a class="btn" href="tel:<?= BIZ_PHONE_LINK ?>">Call <?= htmlspecialchars(BIZ_PHONE) ?></a>
      <a class="btn btn-ghost" href="https://wa.me/<?= BIZ_WHATSAPP ?>" rel="noopener">WhatsApp</a>
    </div>
  </div>
</section>

<footer class="site-foot">
  <div class="wrap foot-grid">

    <div class="foot-col foot-about">
      <span class="brand-mark">S</span>
      <p><?= htmlspecialchars(BIZ_NAME) ?> repairs Samsung home appliances across Dubai — refrigerators, washing machines, air conditioners, dryers, dishwashers and ovens.</p>
      <p class="foot-contact">
        <a href="tel:<?= BIZ_PHONE_LINK ?>"><?= htmlspecialchars(BIZ_PHONE) ?></a><br>
        <a href="mailto:<?= BIZ_EMAIL ?>"><?= htmlspecialchars(BIZ_EMAIL) ?></a>
      </p>
    </div>

    <div class="foot-col">
      <h3>Repairs</h3>
      <ul>
        <?php foreach ($SERVICES as $slug => $s): ?>
        <li><a href="/services/<?= $slug ?>/"><?= htmlspecialchars($s['short']) ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="foot-col">
      <h3>Pages</h3>
      <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/services/">All services</a></li>
        <li><a href="/about/">About</a></li>
        <li><a href="/contact/">Contact</a></li>
      </ul>
      <h3 class="mt">Hours</h3>
      <p class="small"><?= htmlspecialchars(BIZ_HOURS) ?></p>
    </div>

    <div class="foot-col">
      <h3>Areas covered</h3>
      <p class="small areas"><?= htmlspecialchars(implode(' · ', $SERVICE_AREAS)) ?></p>
    </div>

  </div>

  <div class="wrap foot-base">
    <p>&copy; <?= date('Y') ?> <?= htmlspecialchars(BIZ_NAME) ?>. All rights reserved.</p>
    <p class="disclaimer">
      Independent appliance repair service. Not affiliated with, authorised by, or
      endorsed by Samsung Electronics Co., Ltd. Samsung and its product names are
      trademarks of their respective owner and are used here only to describe the
      appliances this service repairs.
    </p>
  </div>
</footer>

<a class="wa-float" href="https://wa.me/<?= BIZ_WHATSAPP ?>" rel="noopener" aria-label="Chat on WhatsApp">
  <svg viewBox="0 0 24 24" width="26" height="26" fill="currentColor" aria-hidden="true">
    <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.46 1.32 4.96L2 22l5.25-1.38a9.9 9.9 0 0 0 4.79 1.22h.01c5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2zm5.8 14.02c-.25.69-1.45 1.32-1.99 1.37-.53.05-1.03.24-3.47-.72-2.92-1.15-4.77-4.13-4.91-4.32-.14-.19-1.17-1.55-1.17-2.96s.74-2.1 1-2.39c.26-.29.57-.36.76-.36.19 0 .38 0 .55.01.18.01.41-.07.64.49.24.57.81 1.98.88 2.12.07.14.12.31.02.5-.09.19-.14.31-.28.48-.14.17-.29.37-.42.5-.14.14-.28.29-.12.57.16.28.72 1.18 1.54 1.91 1.06.94 1.95 1.24 2.23 1.38.28.14.44.12.6-.07.17-.19.69-.8.87-1.08.18-.28.36-.23.61-.14.25.09 1.58.75 1.85.88.27.14.45.21.52.33.07.11.07.66-.18 1.35z"/>
  </svg>
</a>

<script src="/assets/js/main.js" defer></script>
</body>
</html>
