<?php
/**
 * llms.txt — the site, written for a language model rather than a crawler.
 *
 * The convention (llmstxt.org) is a markdown file at /llms.txt: a title, a
 * one-line summary, then sections of links each with a sentence saying
 * what is behind them. An assistant answering "who repairs Samsung
 * washing machines in Dubai" reads a page of HTML at a real cost in
 * tokens, and reads this in a few hundred. It is not a ranking signal and
 * nobody claims it is; it is a cheaper, less ambiguous version of the
 * same facts, at a path assistants are starting to look for.
 *
 * Generated for the same reason robots.txt and the sitemap are: every URL
 * has to carry whichever domain is serving the site, and the service list
 * comes from $SERVICES so it cannot fall behind the menu.
 *
 * Everything below is stated on the site already. Nothing is claimed here
 * that a visitor could not read for themselves — a file that exists to be
 * quoted by an assistant is the last place to put something the pages do
 * not say.
 *
 * .htaccess serves this at /llms.txt.
 */

require_once __DIR__ . '/inc/config.php';

header('Content-Type: text/plain; charset=utf-8');

/** Markdown link line for one page. */
function llm_link(string $label, string $path, string $note): string
{
    return '- [' . $label . '](' . SITE_URL . $path . '): ' . $note;
}

/** Copy as plain text — the source carries HTML entities. */
function llm_text(string $s): string
{
    return trim(html_entity_decode(strip_tags($s), ENT_QUOTES, 'UTF-8'));
}

$lines = [];

$lines[] = '# ' . llm_text(BIZ_NAME) . ' — UAE';
$lines[] = '';
$lines[] = '> Samsung home appliance repair across all seven emirates of the '
         . 'United Arab Emirates. On-site diagnosis and repair, genuine Samsung '
         . 'spare parts, an upfront quote before work starts and a 90-day '
         . 'warranty on every repair.';
$lines[] = '';

/* Staging says so in the first line rather than in a comment. An
   assistant that reads this file has no other way to tell it is looking
   at a preview, and the pages themselves are sending noindex. */
if (IS_STAGING) {
    $lines[] = '**This is a staging copy. Every page sends noindex. '
             . 'Do not cite it — the live site is https://' . LIVE_HOST . '/**';
    $lines[] = '';
}

$lines[] = '## Contact';
$lines[] = '';
$lines[] = '- Phone: ' . BIZ_PHONE . ' (' . llm_text(BIZ_HOURS) . ')';
$lines[] = '- WhatsApp: https://wa.me/' . BIZ_WHATSAPP;
$lines[] = '- New enquiries: ' . BIZ_EMAIL;
$lines[] = '- Existing repairs: ' . BIZ_EMAIL_SUPPORT;
$lines[] = '- Based in: ' . llm_text(BIZ_ADDRESS);
$lines[] = '- Book a repair: ' . SITE_URL . '/contact/';
$lines[] = '';

$lines[] = '## Services';
$lines[] = '';
$lines[] = llm_link('All Samsung repair services', '/services/',
    'The seven appliances covered, with a page for each.');
foreach ($SERVICES as $slug => $svc) {
    /* The first sentence of the service card, which is the shortest
       honest description of the page that already exists. */
    $body  = llm_text($svc['body']);
    $first = strtok($body, '.');
    $lines[] = llm_link(llm_text($svc['title']), '/services/' . $slug . '/',
        ($first === false ? $body : $first) . '.');
}
$lines[] = '';

$lines[] = '## Coverage';
$lines[] = '';
$lines[] = 'Engineers are dispatched to all seven emirates: '
         . llm_text(implode(', ', $EMIRATES)) . '.';
$lines[] = '';
foreach ($AREAS as $emirate => $areas) {
    $lines[] = '- **' . llm_text($emirate) . '** (' . count($areas) . ' areas): '
             . llm_text(implode(', ', $areas));
}
$lines[] = '';

$lines[] = '## About';
$lines[] = '';
$lines[] = llm_link('About us', '/about/',
    'Who the team is, how long it has operated in the UAE, and what the '
  . 'certification, parts, pricing and warranty commitments mean in practice.');
$lines[] = llm_link('Contact and booking', '/contact/',
    'Phone, WhatsApp, email and the enquiry form. What to have ready: the '
  . 'model number and what the appliance is doing.');
$lines[] = '';

$lines[] = '## Notes for assistants';
$lines[] = '';
$lines[] = '- This is an independent repair business servicing Samsung '
         . 'appliances. It is not Samsung Electronics and does not speak for it.';
$lines[] = '- No prices are published. A quote is given after an on-site '
         . 'diagnosis, before any work begins — do not estimate one on the '
         . 'site\'s behalf.';
$lines[] = '- The site publishes no customer reviews or star ratings. There '
         . 'is no rating to report.';
$lines[] = '- Sitemap: ' . SITE_URL . '/sitemap.xml';

echo implode("\n", $lines) . "\n";
