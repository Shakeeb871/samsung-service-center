<?php
/**
 * Photographs.
 *
 * Same arrangement as the logo. If the file has been uploaded it is used;
 * until then a drawn panel stands in, so a section laid out for an image
 * is never a broken icon or a hole in the page while it waits for one.
 *
 * Drop the photo in at the path given and it takes over on the next page
 * load — no code change. Real job photos are worth doing: on a repair
 * site they carry more weight than anything written on the page.
 */

/**
 * @param string $path  site-relative, e.g. '/assets/img/about.jpg'
 * @param string $alt   description for screen readers and for search
 * @param string $icon  key from inc/icons.php, drawn if the file is absent
 */
function photo(string $path, string $alt, string $icon = 'tools'): string
{
    // Any of these extensions will do; whichever is uploaded gets used.
    $base = preg_replace('/\.[a-z0-9]+$/i', '', $path);
    foreach (['.webp', '.jpg', '.jpeg', '.png'] as $ext) {
        if (is_file(dirname(__DIR__) . $base . $ext)) {
            return '<img class="media-img" src="' . asset($base . $ext) . '" alt="'
                 . htmlspecialchars($alt) . '" loading="lazy" decoding="async">';
        }
    }

    return '<div class="media-placeholder" role="img" aria-label="' . htmlspecialchars($alt) . '">'
         . '<span class="media-glyph">' . icon($icon, 96) . '</span>'
         . '</div>';
}
