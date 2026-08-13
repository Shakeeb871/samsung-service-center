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

/** Absolute path of the first file matching $name.<ext>, or null. */
function find_image(string $dir, string $name): ?string
{
    $abs = dirname(__DIR__) . $dir;
    if (!is_dir($abs)) {
        return null;
    }

    $exts = ['webp', 'jpg', 'jpeg', 'png', 'avif'];
    $want = strtolower($name);

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
        if ($stem === $want && in_array($ext, $exts, true)) {
            return $dir . '/' . $entry;
        }
    }
    return null;
}

/**
 * @param string $dir   site-relative folder, e.g. '/assets/img'
 * @param string $name  file stem without extension, e.g. 'about'
 * @param string $alt   description for screen readers and for search
 * @param string $icon  key from inc/icons.php, drawn if no file is found
 */
function photo(string $dir, string $name, string $alt, string $icon = 'tools'): string
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
    $found = find_image('/assets/img', 'hero');
    return $found === null ? '' : ' style="background-image:url(' . asset($found) . ')"';
}
