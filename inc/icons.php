<?php
/**
 * Inline SVG icons.
 *
 * Inline rather than an icon font or sprite sheet: there are a dozen of
 * them, they inherit currentColor so they follow the surrounding text
 * colour for free, and it costs no extra request.
 *
 * All are drawn on a 24x24 grid with a 1.6 stroke so they sit together at
 * any size.
 */

function icon(string $name, int $size = 24): string
{
    $paths = [

        'washer' =>
            '<rect x="3.5" y="2.5" width="17" height="19" rx="2.5"/>'.
            '<circle cx="12" cy="14" r="5"/><circle cx="12" cy="14" r="2"/>'.
            '<circle cx="7.5" cy="6" r=".6" fill="currentColor" stroke="none"/>'.
            '<circle cx="10" cy="6" r=".6" fill="currentColor" stroke="none"/>'.
            '<path d="M15 6h3"/>',

        'fridge' =>
            '<rect x="5" y="2.5" width="14" height="19" rx="2.5"/>'.
            '<path d="M5 9.5h14"/><path d="M8 5.5v2"/><path d="M8 12v2.5"/>',

        'dishwasher' =>
            '<rect x="3.5" y="2.5" width="17" height="19" rx="2.5"/>'.
            '<path d="M3.5 7.5h17"/><path d="M6.5 5h4"/>'.
            '<rect x="7" y="10.5" width="10" height="8" rx="1.5"/>'.
            '<path d="M12 12.5v4"/>',

        'dryer' =>
            '<rect x="3.5" y="2.5" width="17" height="19" rx="2.5"/>'.
            '<circle cx="12" cy="14" r="5"/>'.
            '<path d="M9.8 14a2.2 2.2 0 0 1 4.4 0 2.2 2.2 0 0 0 4.4 0" transform="scale(.62) translate(7.3 8.6)"/>'.
            '<path d="M6 6h2"/><path d="M15 6h3"/>',

        'cooker' =>
            '<rect x="3.5" y="6.5" width="17" height="15" rx="2.5"/>'.
            '<path d="M3.5 11.5h17"/>'.
            '<circle cx="8" cy="9" r="1.2"/><circle cx="16" cy="9" r="1.2"/>'.
            '<rect x="7" y="14.5" width="10" height="4.5" rx="1"/>'.
            '<path d="M6 6.5V4"/><path d="M18 6.5V4"/>',

        'hood' =>
            '<path d="M3 4h18l-3 6H6L3 4Z"/>'.
            '<path d="M6 10v3.5h12V10"/>'.
            '<path d="M9 17v3"/><path d="M12 17.5v3"/><path d="M15 17v3"/>',

        'ac' =>
            '<rect x="2.5" y="4" width="19" height="8" rx="2.5"/>'.
            '<path d="M6 8.5h12"/>'.
            '<path d="M7 15c0 1.5 1.5 1.5 1.5 3"/>'.
            '<path d="M12 15c0 2 1.5 2 1.5 4"/>'.
            '<path d="M17 15c0 1.5-1.5 1.5-1.5 3"/>',

        'check' => '<path d="m4.5 12.5 5 5 10-11"/>',

        'phone' =>
            '<path d="M4 4.5h4l2 5-2.5 1.5a11 11 0 0 0 5.5 5.5L14.5 14l5 2v4a1.5 1.5 0 0 1-1.6 1.5C9.9 21 3 14.1 2.5 6.1A1.5 1.5 0 0 1 4 4.5Z"/>',

        'mail' =>
            '<rect x="2.5" y="5" width="19" height="14" rx="2.5"/>'.
            '<path d="m3.5 7 8.5 6 8.5-6"/>',

        'pin' =>
            '<path d="M12 21.5s7-6.2 7-11.5a7 7 0 1 0-14 0c0 5.3 7 11.5 7 11.5Z"/>'.
            '<circle cx="12" cy="10" r="2.6"/>',

        'clock' => '<circle cx="12" cy="12" r="9"/><path d="M12 6.5V12l3.5 2.5"/>',

        'shield' =>
            '<path d="M12 2.5 4.5 5.5v6c0 4.7 3.2 8.9 7.5 10 4.3-1.1 7.5-5.3 7.5-10v-6L12 2.5Z"/>'.
            '<path d="m8.8 11.8 2.3 2.3 4.1-4.4"/>',

        'bolt' => '<path d="M13.5 2.5 4.5 13.5h6l-1 8 9-11h-6l1-8Z"/>',

        'tools' =>
            '<path d="M14.5 6a4 4 0 0 1 5.3 5.3l-8 8a2.1 2.1 0 0 1-3-3l8-8"/>'.
            '<path d="M8.5 4.5 4 9l2.5 2.5"/>',

        'wallet' =>
            '<rect x="2.5" y="5.5" width="19" height="13" rx="2.5"/>'.
            '<path d="M2.5 10h19"/><circle cx="17" cy="14.5" r="1.2"/>',

        'chat' =>
            '<path d="M21 12a8 8 0 0 1-8 8H5.5L3 22.5V12a8 8 0 0 1 8-8h2a8 8 0 0 1 8 8Z"/>'.
            '<path d="M8.5 11h7"/><path d="M8.5 14.5h4"/>',

        'gauge' =>
            '<path d="M4 17a9 9 0 1 1 16 0"/><path d="m12 13 4-3.5"/>'.
            '<circle cx="12" cy="14" r="1.4"/>',

        'star' =>
            '<path d="m12 3 2.7 5.6 6.1.9-4.4 4.3 1 6.1-5.4-2.9-5.4 2.9 1-6.1L3.2 9.5l6.1-.9L12 3Z" fill="currentColor" stroke="none"/>',

        'arrow' => '<path d="M4 12h15"/><path d="m13 6 6 6-6 6"/>',
    ];

    if (!isset($paths[$name])) {
        return '';
    }

    return '<svg class="ico" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" '
         . 'fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" '
         . 'stroke-linejoin="round" aria-hidden="true" focusable="false">'
         . $paths[$name] . '</svg>';
}
