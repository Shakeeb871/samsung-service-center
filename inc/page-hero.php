<?php
/**
 * The banner every page except the homepage opens with.
 *
 * One shape for all of them: heading, a single line saying what the page
 * is, then the breadcrumb trail, over the shared photograph. Inner pages
 * that each invented their own opening is how a site starts feeling like
 * several sites.
 *
 * The breadcrumbs sit under the heading rather than above it. Above, they
 * are the first thing read on a page whose subject has not been stated
 * yet; under, they answer "where am I" once the reader knows what they
 * are looking at. They also emit BreadcrumbList markup, which is what
 * puts the trail into a Google result instead of a bare URL.
 *
 * @param string $h1     the page heading
 * @param string $lead   one line, no more — it is a banner, not a section
 * @param array  $crumbs [label => path]; the last entry is the current
 *                       page and is rendered as text, not a link
 * @param string $extra  extra class on the banner. 'has-lift' adds room at
 *                       the foot for a panel that overlaps up into it, so
 *                       the card never lands on the breadcrumbs.
 */
function page_hero(string $h1, string $lead = '', array $crumbs = [], string $extra = ''): void
{
    $bg = find_image('/assets/img', [PAGE_HERO_IMAGE, 'page-hero', HERO_IMAGE, 'hero']);
    $style = $bg === null ? '' : ' style="background-image:url(\'' . asset($bg) . '\')"';
    $cls   = 'page-hero' . ($extra === '' ? '' : ' ' . $extra);
    ?>
<section class="<?= htmlspecialchars($cls) ?>"<?= $style ?>>
  <div class="wrap">
    <h1><?= $h1 ?></h1>
    <?php if ($lead !== ''): ?>
    <p class="page-lead"><?= $lead ?></p>
    <?php endif; ?>

    <?php if ($crumbs): ?>
    <nav class="crumbs" aria-label="Breadcrumb">
      <ol>
        <?php $i = 0; $n = count($crumbs); foreach ($crumbs as $label => $path): $i++; ?>
        <li>
          <?php if ($i < $n && $path !== null): ?>
          <a href="<?= url($path) ?>"><?= $label ?></a>
          <?php else: ?>
          <span aria-current="page"><?= $label ?></span>
          <?php endif; ?>
        </li>
        <?php endforeach; ?>
      </ol>
    </nav>

    <script type="application/ld+json"><?= json_encode([
        '@context' => 'https://schema.org',
        '@type'    => 'BreadcrumbList',
        'itemListElement' => array_values(array_map(
            function ($i, $label, $path) {
                $item = [
                    '@type'    => 'ListItem',
                    'position' => $i + 1,
                    'name'     => html_entity_decode(strip_tags($label), ENT_QUOTES, 'UTF-8'),
                ];
                if ($path !== null) {
                    $item['item'] = SITE_URL . $path;
                }
                return $item;
            },
            array_keys(array_keys($crumbs)),
            array_keys($crumbs),
            array_values($crumbs)
        )),
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
    <?php endif; ?>
  </div>
</section>
<?php
}
