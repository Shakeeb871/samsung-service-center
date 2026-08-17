<?php
/**
 * Bolds a short, fixed list of terms in body copy.
 *
 * Three groups: what the site is trying to rank for, the words that carry
 * its authority, and the faults a visitor arrives searching for. Bold text
 * is a small signal to a search engine and a large one to a reader
 * skimming two thousand words on a phone, which is what this is really
 * for.
 *
 * Two rules keep it from becoming the thing it is trying to avoid:
 *
 *  1. Each term is bolded ONCE per page — the keyword twice — at its first
 *     appearance. A page with the same phrase emboldened eleven times
 *     reads as written for a crawler, and both the reader and Google treat
 *     it accordingly.
 *
 *  2. Only text inside <p> is touched. Headings are already bold, and
 *     buttons, labels, chips, the menu and the footer are interface, not
 *     prose.
 *
 * No word of the copy changes. Only markup is added around words already
 * there, and nothing is inserted inside a tag, an attribute, a link URL or
 * an existing <strong>.
 */

/**
 * The terms, longest first inside each group.
 *
 * Order matters: "Samsung washing machine repair" has to be tried before
 * "Samsung repair", or the shorter one matches inside the longer and the
 * result is a phrase half in bold.
 */
function emphasis_terms(): array
{
    return [
        /* --- What the site is for -------------------------------- */
        ['limit' => 2, 'terms' => [
            'Samsung washing machine service center',
            'Samsung refrigerator service center',
            'Samsung dishwasher service center',
            'Samsung tumble dryer service center',
            'Samsung air conditioner service center',
            'Samsung cooker service center',
            'Samsung hood service center',
            'Samsung service center',
            'Samsung service centre',
            'Samsung washing machine repair',
            'Samsung refrigerator repair',
            'Samsung fridge repair',
            'Samsung dishwasher repair',
            'Samsung tumble dryer repair',
            'Samsung air conditioner repair',
            'Samsung cooker repair',
            'Samsung hood repair',
            'appliance repair',
        ]],

        /* --- The words the trust rests on -------------------------
           Eight of them, and no more. Every extra one takes weight off
           the rest. */
        ['limit' => 1, 'terms' => [
            'certified and authorized',
            'genuine Samsung spare parts',
            'authentic, factory-authorized Samsung spare parts',
            'authentic Samsung parts',
            'genuine Samsung',
            'certified technicians',
            'certified engineers',
            'licensed Samsung team',
            '90-day warranty',
            '90-day repair warranty',
            'same-day',
            'upfront clear pricing',
            'upfront price',
            'official factory standards',
            'official factory guidelines',
        ]],

        /* --- What the visitor arrived searching for ----------------
           The symptom in the reader's own words, wherever the copy uses
           it. These are the lines someone scanning for their own fault
           actually stops on. */
        ['limit' => 1, 'terms' => [
            'stops mid-cycle',
            'no water enters the drum',
            'refuses to unlock',
            'refuses to spin',
            'shakes violently',
            'blows completely warm air',
            'blows warm air',
            'stops draining',
            'stop draining',
            'not draining',
            'leaking water',
            'water leaking',
            'leaks water',
            'refuses to ignite',
            'refuse to ignite',
            'refuses to turn on',
            'refuses to heat',
            'refuses to run',
            'refuses to start',
            'refuses to spin',
            'completely dead',
            'error code',
            'error codes',
            'burning plastic',
            'foul odor',
            'bad odors',
            'ice buildup',
            'spoiled food',
            'grinding noises',
            'buzzing noise',
            'loud generator',
            'dripping wet',
        ]],
    ];
}

/**
 * Bolds the terms inside every <p> of a chunk of HTML.
 *
 * Counters are per call, so the caps apply per page rather than leaking
 * from one render into the next.
 */
function emphasise(string $html): string
{
    $used = [];

    return preg_replace_callback(
        '#<p\b[^>]*>(.*?)</p>#si',
        function (array $m) use (&$used) {
            return str_replace($m[1], emphasise_text($m[1], $used), $m[0]);
        },
        $html
    );
}

/** One paragraph's inner HTML. */
function emphasise_text(string $html, array &$used): string
{
    /* Split into tags and the text between them, so nothing is ever
       matched inside an attribute — a href full of the word "repair"
       would otherwise be rewritten into broken markup. */
    $parts = preg_split('#(<[^>]+>)#', $html, -1, PREG_SPLIT_DELIM_CAPTURE);
    $depth = 0;   // inside <strong>, leave well alone

    foreach ($parts as $i => $part) {
        if ($part === '' || $part[0] === '<') {
            if (stripos($part, '<strong') === 0) { $depth++; }
            if (stripos($part, '</strong') === 0) { $depth = max(0, $depth - 1); }
            continue;
        }
        if ($depth > 0) {
            continue;
        }
        $parts[$i] = emphasise_fragment($part, $used);
    }

    return implode('', $parts);
}

/** A run of plain text with no markup in it. */
function emphasise_fragment(string $text, array &$used): string
{
    foreach (emphasis_terms() as $group) {
        foreach ($group['terms'] as $term) {
            $key = strtolower($term);
            $used[$key] = $used[$key] ?? 0;
            if ($used[$key] >= $group['limit']) {
                continue;
            }

            /* Word boundaries both ends, so "repair" does not match inside
               "repairer" and leave a bold stump. Case-insensitive, and the
               text as written is what gets wrapped — never the term as
               spelled in the list. */
            $pattern = '/\b' . preg_quote($term, '/') . '\b/i';
            $count   = 0;
            $text    = preg_replace_callback(
                $pattern,
                function (array $m) { return '<strong>' . $m[0] . '</strong>'; },
                $text,
                $group['limit'] - $used[$key],
                $count
            );
            $used[$key] += $count;
        }
    }

    return $text;
}
