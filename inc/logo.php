<?php
/**
 * The logo.
 *
 * Two paths, on purpose. If assets/img/logo.png (or .svg / .webp) has been
 * uploaded, that file is used — it is the real artwork and nothing should
 * second-guess it. Until then, logo_mark() draws the gear in SVG and the
 * wordmark is set in Poppins, so the site is never sitting there with a
 * broken image while it waits for a file.
 *
 * Drop the artwork in as assets/img/logo.png and it takes over on the next
 * page load. No code change.
 */

/** First logo file that actually exists, or null. */
function logo_file(): ?string
{
    foreach (['/assets/img/logo.svg', '/assets/img/logo.png', '/assets/img/logo.webp'] as $p) {
        if (is_file(dirname(__DIR__) . $p)) {
            return $p;
        }
    }
    return null;
}

/**
 * The gear mark on its own — half primary, half accent, tools inside.
 *
 * The two halves are the same gear drawn twice and clipped down the
 * middle, which keeps the tooth shapes identical across the split.
 */
function logo_mark(int $size = 44): string
{
    $u = 'lg' . $size; // ids must be unique when the mark appears twice on a page
    $teeth = '';
    for ($a = 0; $a < 360; $a += 45) {
        $teeth .= '<rect x="52" y="3" width="16" height="22" rx="5" transform="rotate(' . $a . ' 60 60)"/>';
    }

    return <<<SVG
<svg class="logo-mark" width="{$size}" height="{$size}" viewBox="0 0 120 120" role="img" aria-label="Samsung Service Center UAE">
  <defs>
    <g id="gear-{$u}">
      <circle cx="60" cy="60" r="43"/>
      {$teeth}
    </g>
    <clipPath id="l-{$u}"><rect x="0" y="0" width="60" height="120"/></clipPath>
    <clipPath id="r-{$u}"><rect x="60" y="0" width="60" height="120"/></clipPath>
  </defs>

  <use href="#gear-{$u}" fill="#1b4fa8" clip-path="url(#l-{$u})"/>
  <use href="#gear-{$u}" fill="#f4771f" clip-path="url(#r-{$u})"/>
  <circle cx="60" cy="60" r="29" fill="#fff"/>

  <!-- Wrench, lower-left to upper-right. -->
  <g transform="rotate(-45 60 60)">
    <rect x="56.5" y="58" width="7" height="22" rx="3.5" fill="#1b4fa8"/>
    <path d="M60 40a9.5 9.5 0 0 1 6.7 16.2l-3.3-3.3a4.8 4.8 0 1 0-6.8 0l-3.3 3.3A9.5 9.5 0 0 1 60 40Z" fill="#1b4fa8"/>
  </g>

  <!-- Screwdriver, upper-left to lower-right. -->
  <g transform="rotate(45 60 60)">
    <rect x="57" y="62" width="6" height="18" rx="3" fill="#f4771f"/>
    <path d="M60 42l4 8v10h-8V50l4-8Z" fill="#f4771f"/>
  </g>
</svg>
SVG;
}

/**
 * Full lockup for the header and footer.
 *
 * $dark inverts the wordmark for the footer, where the ground is #232333.
 */
function logo(bool $dark = false): string
{
    $file = logo_file();
    if ($file !== null) {
        $src = asset($file);
        return '<img class="logo-img" src="' . $src . '" alt="' . htmlspecialchars(BIZ_NAME) . '" width="210" height="52">';
    }

    $cls = $dark ? 'logo-lockup is-dark' : 'logo-lockup';
    return '<span class="' . $cls . '">'
         . logo_mark(46)
         . '<span class="logo-words">'
         . '<span class="logo-brand">SAMSUNG</span>'
         . '<span class="logo-line"><span class="logo-sub">SERVICE CENTER</span><span class="logo-badge">UAE</span></span>'
         . '</span></span>';
}
