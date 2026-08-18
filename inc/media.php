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
function find_image(string $dir, $names, ?array $exts = null): ?string
{
    $abs = dirname(__DIR__) . $dir;
    if (!is_dir($abs)) {
        return null;
    }

    $exts = $exts ?? ['webp', 'jpg', 'jpeg', 'png', 'avif'];
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
 * Three rules decide what goes here, and each of them was a real problem
 * before:
 *
 * 1. ONE rel="icon". Two of them pointing at different artwork is an
 *    invitation for Google to pick the wrong one — and it was picking
 *    between the uploaded logo and a gear this file used to draw.
 *
 * 2. PNG, not WebP. Google documents ICO, PNG, GIF, JPEG and SVG for
 *    favicons; WebP is not among them, and Safari and Firefox do not
 *    render WebP favicons either. The uploaded WebP was converted once
 *    into favicon-96.png and favicon-192.png, both multiples of 48 as
 *    Google asks, and those are what ship.
 *
 * 3. apple-touch-icon at 180px. iOS ignores rel="icon" completely and
 *    screenshots the page instead when this is missing.
 *
 * 4. A real file at /favicon.ico. Google requests that path directly no
 *    matter what the page declares, and with no file there the request
 *    fell through to the 404 page.
 *
 * Nothing here is generated per request — the PNGs are committed files.
 */
function site_icon_tags(): string
{
    $out = [];

    /* Icon URLs carry no ?v= stamp. Everything else on the site does,
       because a stale stylesheet is a broken page — but Google caches a
       favicon by URL and refetches it rarely, so a URL that changes
       whenever the file's timestamp does is a favicon it has to discover
       all over again. These files change about once. */
    $plain = function (string $path): string {
        $enc = implode('/', array_map('rawurlencode', explode('/', ltrim($path, '/'))));
        return url('/' . $enc);
    };

    /* 4. The root /favicon.ico. Google asks for this path directly,
          whatever the page declares, and until it existed that request
          fell through the rewrite rules and was answered with the HTML
          404 page — an error document where an icon should be. It holds
          16, 32 and 48 in one file; 48 is the size Google's guidance
          names. */
    if (is_file(dirname(__DIR__) . '/favicon.ico')) {
        $out[] = '<link rel="icon" href="' . $plain('/favicon.ico') . '" sizes="48x48">';
    }

    // Converted PNGs next. Whichever exists is authoritative.
    $png96  = find_image('/assets/img', 'favicon-96');
    $png192 = find_image('/assets/img', 'favicon-192');
    $apple  = find_image('/assets/img', 'apple-touch-icon');

    if ($png96 !== null) {
        $out[] = '<link rel="icon" type="image/png" sizes="96x96" href="' . $plain($png96) . '">';
    }
    if ($png192 !== null) {
        $out[] = '<link rel="icon" type="image/png" sizes="192x192" href="' . $plain($png192) . '">';
    }

    // Only if no PNG was produced does the original upload stand in, and
    // only then does the drawn SVG appear — never alongside the real one.
    if ($png96 === null && $png192 === null) {
        $found = find_image('/assets/img', [SITE_ICON, 'site-icon', 'favicon', 'icon']);
        if ($found !== null) {
            $ext  = strtolower(pathinfo($found, PATHINFO_EXTENSION));
            $mime = ['jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png',
                     'webp' => 'image/webp', 'avif' => 'image/avif'][$ext] ?? '';
            $out[] = '<link rel="icon"' . ($mime ? ' type="' . $mime . '"' : '') . ' sizes="any" href="' . $plain($found) . '">';
        } elseif (is_file(dirname(__DIR__) . '/assets/img/favicon.svg')) {
            $out[] = '<link rel="icon" type="image/svg+xml" href="' . $plain('/assets/img/favicon.svg') . '">';
        }
    }

    if ($apple !== null) {
        $out[] = '<link rel="apple-touch-icon" sizes="180x180" href="' . $plain($apple) . '">';
    }

    return implode("\n", $out);
}

/**
 * The sharing image, absolute, for og:image and Twitter cards.
 *
 * Both want a full URL — a relative path is silently ignored, which is
 * why a page can look fine and still share as a blank rectangle.
 */
function social_image(): ?string
{
    $names = [ABOUT_IMAGE, HERO_IMAGE, 'about', 'hero'];

    // JPEG and PNG first. WhatsApp, Facebook and several link previewers
    // still do not render a WebP og:image, and a share that comes up
    // blank is worse than one with a slightly larger file behind it.
    // og-image.jpg is made once at 1200x630, the ratio every link
    // previewer crops to, and in a format all of them render.
    $found = find_image('/assets/img', 'og-image', ['jpg', 'jpeg', 'png'])
          ?? find_image('/assets/img', $names, ['jpg', 'jpeg', 'png'])
          ?? find_image('/assets/img', $names);

    return $found === null ? null : SITE_URL . asset($found);
}

/**
 * A service's photograph.
 *
 * Looks under the name recorded in $SERVICES first, then the slug, in
 * both assets/img/ and assets/img/services/. Uploads land in whichever
 * folder is convenient on the day, and the page should not care.
 */
function service_photo(string $slug, array $svc): string
{
    $names = array_values(array_filter([$svc['image'] ?? null, $slug]));
    $alt   = strip_tags(html_entity_decode($svc['title'], ENT_QUOTES, 'UTF-8'));

    foreach (['/assets/img/services', '/assets/img'] as $dir) {
        $found = find_image($dir, $names);
        if ($found !== null) {
            return '<img class="media-img" src="' . asset($found) . '" alt="'
                 . htmlspecialchars($alt) . '" loading="lazy" decoding="async">';
        }
    }

    return '<div class="media-placeholder" role="img" aria-label="' . htmlspecialchars($alt) . '"></div>';
}
