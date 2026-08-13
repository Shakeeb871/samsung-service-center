<?php
http_response_code(404);
$page_title = 'Page not found';
$page_desc  = 'That page does not exist.';
$page_path  = '/404';
require __DIR__ . '/inc/header.php';
?>

<section class="section">
  <div class="wrap center" style="max-width:640px">
    <h1>That page is not here</h1>
    <p>
      The link is either out of date or slightly wrong. The repair pages below cover
      everything on this site, or you can call and describe the fault directly.
    </p>
    <p>
      <a class="btn" href="<?= url('/services/') ?>">All repairs</a>
      <a class="btn btn-dark" href="tel:<?= BIZ_PHONE_LINK ?>">Call <?= htmlspecialchars(BIZ_PHONE) ?></a>
    </p>
  </div>
</section>

<?php require __DIR__ . '/inc/footer.php'; ?>
