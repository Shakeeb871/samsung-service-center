<?php
/**
 * Photographs.
 *
 * If the file has been uploaded it is used; until then a drawn panel
 * stands in, so a section laid out for an image is never a broken icon or
 * a hole in the page while it waits for one.
 *
 * Lookup is case-insensitive and extension-insensitive on purpose. A file
 * saved as Hero.JPG is the same photograph as hero.jpg, but Linux does not
 * think so, and "I uploaded it and nothing happened" is a miserable thing
 * to debug over a chat window. Anything matching the name with any of the
 * usual extensions, in any case, is found.
 */

/**
 * Site-relative path of the first file in $dir whose name matches any of
 * $names, with any usual image extension. $names may be a single string.
 */
function find_image(string $dir, $names): ?string
{
    $abs = dirname(__DIR__) . $dir;
    if (!is_dir($abs)) {
        return null;
    }

    $exts = ['webp', 'jpg', 'jpeg', 'png', 'avif'];
    $want = array_map('strtolower', (array) $names);

    foreach (scandir($abs) ?: [] as $entry) {
        if ($entry === '.' || $entry === '..') {
            continue;
        }
        $dot = strrpos($entry, '.');
        if ($dot === false) {
            continue;
        }
        $stem = strtolower(substr($entry, 0, $dot));
        $ext  = strtolower(substr($entry, $dot + 1));
        if (in_array($stem, $want, true) && in_array($ext, $exts, true)) {
            return $dir . '/' . $entry;
        }
    }
    return null;
}

/**
 * @param string       $dir    site-relative folder, e.g. '/assets/img'
 * @param string|array $name   file stem, or several to try in order
 * @param string $name  file stem without extension, e.g. 'about'
 * @param string $alt   description for screen readers and for search
 * @param string $icon  key from inc/icons.php, drawn if no file is found
 */
function photo(string $dir, $name, string $alt, string $icon = 'tools'): string
{
    $found = find_image($dir, $name);
    if ($found !== null) {
        return '<img class="media-img" src="' . asset($found) . '" alt="'
             . htmlspecialchars($alt) . '" loading="lazy" decoding="async">';
    }

    // An empty $icon gives a plain panel. The service cards use that:
    // a drawn appliance where a photograph is going to be reads as the
    // final design rather than as a space reserved for one.
    $glyph = $icon === '' ? '' : icon($icon, 96);
    return '<div class="media-placeholder" role="img" aria-label="' . htmlspecialchars($alt) . '">'
         . $glyph . '</div>';
}

/**
 * Background image for the hero, if one has been uploaded.
 *
 * Returns a style attribute or an empty string. With no file the hero
 * keeps its gradient, so the section is never a grey box waiting on an
 * upload.
 */
function hero_bg(): string
{
    // The name from config first, then plain 'hero' — so either the file
    // as uploaded or a file renamed to hero.jpg will be picked up.
    $found = find_image('/assets/img', [HERO_IMAGE, 'hero']);
    if ($found === null) {
        return '';
    }
    // Quoted, because an unquoted CSS url() breaks on a space.
    return ' style="background-image:url(\'' . asset($found) . '\')"';
}

/**
 * The <link> tags for the site icon.
 *
 * Google reads rel="icon" and wants the file crawlable and square. The
 * drawn SVG stays as a second entry: browsers that prefer SVG take the
 * sharper one, and anything that cannot read SVG falls back to the
 * uploaded raster.
 *
 * apple-touch-icon is the same file — iOS ignores rel="icon" entirely and
 * will screenshot the page instead if this is missing.
 */
function site_icon_tags(): string
{
    $out = [];

    $found = find_image('/assets/img', [SITE_ICON, 'site-icon', 'favicon', 'icon']);
    if ($found !== null) {
        $type = strtolower(pathinfo($found, PATHINFO_EXTENSION));
        $mime = ['jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png',
                 'webp' => 'image/webp', 'avif' => 'image/avif'][$type] ?? '';
        $src  = asset($found);
        $out[] = '<link rel="icon" href="' . $src . '"' . ($mime ? ' type="' . $mime . '"' : '') . ' sizes="any">';
        $out[] = '<link rel="apple-touch-icon" href="' . $src . '">';
    }

    if (is_file(dirname(__DIR__) . '/assets/img/favicon.svg')) {
        $out[] = '<link rel="icon" href="' . asset('/assets/img/favicon.svg') . '" type="image/svg+xml">';
    }

    return implode("\n", $out);
}
