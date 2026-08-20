<?php
/**
 * Every business detail the site prints lives here. Change it once, it
 * changes on all pages.
 */

// ---------------------------------------------------------------------
// The live address. Anything else serving these files — the staging
// subdomain, a preview host, localhost — is treated as staging and sends
// noindex on every page.
//
// This is worked out from the host rather than set by hand, because the
// same files sit on both. A single true/false switch would mean either
// the staging copy gets indexed and competes with the real domain for
// its own content, or the real domain goes live still telling Google to
// stay away. Neither is recoverable in an afternoon.
// ---------------------------------------------------------------------
define('LIVE_HOST', 'samsung-servicecenterdubai.com');

/* Set by build.php while it renders the static copy. On PHP hosting it
   is never defined, so the site behaves exactly as it always has. */
if (!defined('IS_STATIC')) {
    define('IS_STATIC', (bool) getenv('STATIC_BUILD'));
}

$__host = strtolower($_SERVER['HTTP_HOST'] ?? LIVE_HOST);
$__host = preg_replace('/:\d+$/', '', $__host);          // drop any :8080
define('IS_STAGING', $__host !== LIVE_HOST && $__host !== 'www.' . LIVE_HOST);

/**
 * Cache-busting asset URL.
 *
 * .htaccess tells browsers to hold CSS and JS for a long time, which is
 * right for speed and wrong the moment the file changes: a visitor who
 * loaded the old stylesheet keeps it until the cache expires, and the new
 * layout arrives wearing the old design. Appending the file's own
 * modification time makes every edit a new URL, so the browser refetches
 * the moment it changes and never before.
 *
 * $path is web-root relative, e.g. '/assets/css/style.css'.
 */
function asset(string $path): string
{
    $file = dirname(__DIR__) . $path;
    // Each segment is encoded separately so the slashes stay slashes. A
    // file name with a space in it produces a broken URL otherwise, and
    // uploaded artwork very often has spaces in it.
    $enc = implode('/', array_map('rawurlencode', explode('/', ltrim($path, '/'))));
    return url('/' . $enc) . '?v=' . (is_file($file) ? filemtime($file) : time());
}

/**
 * Identifies the deployed build. Printed as an HTML comment on every page
 * so "did the deploy actually land?" is answerable from View Source
 * instead of from guesswork.
 */
function build_id(): string
{
    $css = dirname(__DIR__) . '/assets/css/style.css';
    return is_file($css) ? date('Y-m-d H:i', filemtime($css)) : 'unknown';
}

/**
 * Where the site lives, worked out at runtime.
 *
 * The site does not care which folder it sits in. BASE is the path from
 * the document root to this site's folder — empty at a domain root,
 * '/samsung' inside a folder called samsung — and every internal link
 * goes through url(), so uploading the same files anywhere just works.
 *
 * That is deliberate: hardcoded '/assets/...' links break the moment the
 * site is not at the very top of the web root, and finding out means
 * looking at a site with no styling and no obvious cause.
 */
$__here = str_replace('\\', '/', realpath(dirname(__DIR__)) ?: dirname(__DIR__));
$__doc  = isset($_SERVER['DOCUMENT_ROOT']) && $_SERVER['DOCUMENT_ROOT'] !== ''
        ? str_replace('\\', '/', rtrim(realpath($_SERVER['DOCUMENT_ROOT']) ?: $_SERVER['DOCUMENT_ROOT'], '/'))
        : '';
define('BASE', ($__doc !== '' && strpos($__here, $__doc) === 0)
    ? rtrim(substr($__here, strlen($__doc)), '/')
    : '');

/** Absolute path for an internal link. $path is site-relative: '/contact/'. */
function url(string $path): string
{
    return BASE . $path;
}

/** Scheme and host as the visitor sees them, used for canonical tags. */
$__scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
         || (($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https') ? 'https' : 'http';
/**
 * Uploaded artwork, by the name each file carries in assets/img/.
 *
 * Descriptive file names are worth keeping — they are read by image
 * search — so the site is told the name rather than the file being
 * renamed to suit the code. Extension and capitalisation do not matter,
 * and each falls back to a short generic name if that is what gets
 * uploaded instead.
 */
define('HERO_IMAGE',  'Samsung Authorise service center in uae provide best and most trusted samsung appliances repair services in UAE');
define('ABOUT_IMAGE', 'Best Samsung Service Center In United Arab Emirates');
define('SITE_ICON',   'Samsung Service Center Site Icon');
define('PAGE_HERO_IMAGE', 'Samsung Authorise Service Centre In UAE - Official Repair Centre');
define('CTA_IMAGE',   'Call Our Experts Now for Fast, Affordable, and Professional Support in the UAE');

/**
 * The address the site calls its own.
 *
 * Live, this is always LIVE_HOST — never the host the visitor happened to
 * type. Reached at www, the page would otherwise declare itself canonical
 * at www while the non-www copy declares itself canonical too, and a
 * search engine then has two pages competing over one piece of content.
 * .htaccess redirects www away; this is the belt to that pair of braces,
 * and it also keeps the sitemap and robots.txt on one address.
 *
 * On staging the real host is kept, so the preview links to itself.
 */
define('SITE_URL', IS_STAGING
    ? $__scheme . '://' . ($_SERVER['HTTP_HOST'] ?? LIVE_HOST) . BASE
    : 'https://' . LIVE_HOST . BASE);

// --- Business details -------------------------------------------------
define('BIZ_NAME',    'Samsung Service Center');
define('BIZ_TAGLINE', 'Appliance repair across the UAE');

define('BIZ_PHONE',      '+971 50 619 1442');
define('BIZ_PHONE_LINK', '+971506191442');
define('BIZ_WHATSAPP',   '971506191442');

/**
 * Two addresses, and the split is deliberate.
 *
 * BIZ_EMAIL is the general one and the only one the enquiry form delivers
 * to — a form that fans out to two inboxes is a message two people each
 * assume the other answered.
 *
 * BIZ_EMAIL_SUPPORT is printed beside it for someone who already has a job
 * open and needs the engineer who did it, not the booking desk. Both are
 * real mailboxes on the domain; neither is a placeholder any more.
 */
define('BIZ_EMAIL',         'info@samsung-servicecenterdubai.com');
define('BIZ_EMAIL_SUPPORT', 'support@samsung-servicecenterdubai.com');

/**
 * Where the enquiry forms post.
 *
 * On PHP hosting this is api/contact.php and nothing else is needed. On
 * GitHub Pages there is no PHP, so it has to be an external endpoint —
 * a Formspree form URL, for example:
 *
 *   define('FORM_ENDPOINT', 'https://formspree.io/f/xxxxxxx');
 *
 * Left empty on a static build, the forms are not printed at all and
 * their place is taken by the call and WhatsApp panel. A form that
 * silently throws messages away is worse than no form.
 */
define('FORM_ENDPOINT', getenv('FORM_ENDPOINT') ?: '');

/** True when the build has nowhere to send a form. */
function forms_enabled(): bool
{
    return !IS_STATIC || FORM_ENDPOINT !== '';
}

/** Where a form should post. */
function form_action(): string
{
    return FORM_ENDPOINT !== '' ? FORM_ENDPOINT : url('/api/contact.php');
}

// REPLACE — or remove the address row from the footer if there is no
// walk-in office.
define('BIZ_ADDRESS', 'Dubai, United Arab Emirates');

define('BIZ_HOURS', '24/7 customer support');

// --- Credentials ------------------------------------------------------
//
// The facts a search engine cannot work out from the copy, and that carry
// weight precisely because they are checkable by someone who doubts them.
// Each is empty until there is a real value; inc/schema.php omits any
// property whose value is blank rather than publishing an empty one.
//
// FILL THESE IN. They are the difference between a site that says it is
// established and a site that can be verified as established.

// The year trading began. The copy says "over a decade" and "over 10
// years"; this is the actual number behind that. Format: '2013'.
define('BIZ_FOUNDED', '');

// UAE trade licence number, and the emirate that issued it. This is the
// single strongest thing on this list: it is a public record anyone can
// look up, which is exactly what makes a claim of being established worth
// anything. Example: '1234567' / 'Dubai'.
define('BIZ_LICENCE',           '');
define('BIZ_LICENCE_AUTHORITY', '');

// Tax Registration Number, if VAT-registered. Another public record.
define('BIZ_TRN', '');

// How many engineers. The counter on the homepage says 20+, so this
// matches it; change both together or they contradict each other.
define('BIZ_TECHNICIANS', 20);

/**
 * Profiles the business also appears on, as full URLs.
 *
 * sameAs is how a search engine joins this website to the Google Business
 * Profile, the Facebook page and the Instagram account and concludes they
 * are one business rather than four. It is also the only honest way to
 * support a claim of being authorized: a link to a page that says so and
 * that the business does not control.
 *
 *   'https://www.google.com/maps/place/…'
 *   'https://www.facebook.com/…'
 *   'https://www.instagram.com/…'
 */
$SOCIAL_PROFILES = [];

// Areas covered, by emirate. The coverage section reads this, and
// $EMIRATES below is derived from it so the two can never drift apart.
$AREAS = [
  'Dubai' => [
    'Deira', 'Bur Dubai', 'Al Barsha', 'Barsha Heights', 'Jumeirah', 'Umm Suqeim',
    'Dubai Marina', 'Jumeirah Lake Towers', 'Jumeirah Beach Residence', 'Palm Jumeirah',
    'Business Bay', 'Downtown Dubai', 'DIFC', 'Za&rsquo;abeel', 'Al Quoz', 'Al Safa',
    'Al Wasl', 'Satwa', 'Karama', 'Oud Metha', 'Al Jaddaf', 'Mirdif', 'Mirdif Hills',
    'Al Warqa', 'Al Qusais', 'Al Nahda', 'Muhaisnah', 'Al Twar', 'Hor Al Anz',
    'Al Rigga', 'Port Saeed', 'Al Garhoud', 'Dubai Festival City', 'Ras Al Khor',
    'Nad Al Sheba', 'Dubai Silicon Oasis', 'International City', 'Discovery Gardens',
    'Al Furjan', 'Jumeirah Village Circle', 'Jumeirah Village Triangle', 'Dubai Hills Estate',
    'Arabian Ranches', 'Emirates Hills', 'The Springs', 'The Meadows', 'The Greens',
    'Motor City', 'Dubai Sports City', 'Dubai Studio City', 'Damac Hills', 'Mudon',
    'Remraam', 'Town Square', 'Dubailand', 'Jumeirah Islands', 'Madinat Jumeirah Living',
  ],
  'Abu Dhabi' => [
    'Al Danah', 'Al Khalidiyah', 'Al Bateen', 'Al Mushrif', 'Al Nahyan', 'Al Wahda',
    'Al Muroor', 'Madinat Zayed', 'Corniche', 'Al Maryah Island', 'Al Reem Island',
    'Saadiyat Island', 'Yas Island', 'Al Raha Beach', 'Al Raha Gardens', 'Khalifa City',
    'Mohammed Bin Zayed City', 'Shakhbout City', 'Al Shamkha', 'Al Falah', 'Al Reef',
    'Mussafah', 'Baniyas', 'Al Shahama', 'Al Bahia', 'Between Two Bridges', 'Masdar City',
  ],
  'Sharjah' => [
    'Al Majaz', 'Al Khan', 'Al Taawun', 'Al Qasimia', 'Al Nahda', 'Al Mamzar',
    'Rolla', 'Al Layyah', 'Al Ramtha', 'Al Yarmook', 'Al Nasserya', 'Al Gharb',
    'Muwaileh', 'Muwaileh Commercial', 'University City', 'Al Zahia', 'Al Rahmaniya',
    'Al Suyoh', 'Tilal City', 'Al Riqa', 'Sharjah Industrial Area', 'Al Sajaa',
    'Khor Fakkan', 'Kalba', 'Dibba Al Hisn',
  ],
  'Ajman' => [
    'Al Nuaimiya', 'Al Rashidiya', 'Al Jurf', 'Ajman Corniche', 'Ajman Downtown',
    'Al Rawda', 'Al Mowaihat', 'Al Hamidiya', 'Al Zahra', 'Al Bustan', 'Al Rumailah',
    'Emirates City', 'Al Alia', 'Al Helio', 'Masfout',
  ],
  'Ras Al Khaimah' => [
    'Al Nakheel', 'Al Dhait', 'Al Mairid', 'Al Qusaidat', 'Khuzam', 'Julphar',
    'Al Hamra Village', 'Mina Al Arab', 'Al Marjan Island', 'Al Jazirah Al Hamra',
    'Al Rams', 'Digdaga', 'Al Uraibi', 'Khatt', 'Al Ghail',
  ],
  'Umm Al Quwain' => [
    'Al Salamah', 'Al Raas', 'Al Haditha', 'Al Riqqah', 'Al Humrah', 'Al Maidan',
    'Al Ramlah', 'Al Dar Al Baida', 'UAQ Marina', 'Falaj Al Mualla', 'Old Town',
  ],
  'Fujairah' => [
    'Fujairah City', 'Al Faseel', 'Sakamkam', 'Merashid', 'Al Gurfah', 'Mirbah',
    'Qidfa', 'Murbah', 'Dibba Al Fujairah', 'Masafi', 'Al Hayl', 'Al Bidyah',
  ],
];

// Emirates covered, in the order above.
$EMIRATES = array_keys($AREAS);

// The seven services.
//
//   image  the photograph's file name in assets/img/, as uploaded. The
//          names describe the service rather than matching the slug,
//          which is better for image search — so the slug is not assumed
//          and the real name is recorded here.
//   title  the service's name. Short on purpose — it is what the nav
//          dropdown, the schema Service name, the sitemap image titles
//          and llms.txt all read, and none of those wants a phrase.
//   card   the heading printed on the service card, written long for the
//          search terms it covers. Separate from title precisely so the
//          menu is not sixty characters wide; falls back to title.
//   short  one or two words, for the footer links and the enquiry select
//   icon   key in inc/icons.php, drawn only if no photograph is found
//   body   the copy that appears on the service card
$SERVICES = [
  'samsung-washing-machine-repair' => [
    'image' => 'Samsung Washing Machine Repair',
    'title' => 'Samsung Washing Machine Repair',
    'card'  => 'Samsung Washing Machine Repair for Water, Spin &amp; Error Code Issues',
    'short' => 'Washing Machine',
    'icon'  => 'washer',
    'body'  => 'Is your washer facing spinning failures, a drain malfunction, or showing error code E3, 4C, DE, or SE error in Samsung washing machine? A locked door or sudden stoppage can freeze your household work. Our Samsung washing machine service center diagnoses the exact issue on site. Whether you need to unlock Samsung washing machine controls, clear a 4C water inlet fault, or repair the drain pump, our certified technicians fix it instantly using genuine parts.',
  ],
  'samsung-refrigerator-repair' => [
    'image' => 'Samsung Fridge Repair',
    'title' => 'Samsung Fridge &amp; Refrigerator Repair',
    'card'  => 'Samsung Refrigerator Repair for Cooling &amp; Temperature Problems',
    'short' => 'Fridge &amp; Refrigerator',
    'icon'  => 'fridge',
    'body'  => 'Warm food, water pooling at the bottom, or excessive frost build-up indicates a serious cooling failure in your refrigerator. Delaying a repair risks spoiling hundreds of Dirhams in groceries. Our Samsung Fridge &amp; Refrigerator service center provides rapid emergency support. Our specialists check the inverter compressor, defrost sensors, and refrigerant lines to solve the fault quickly and restore optimal cooling.',
  ],
  'samsung-dishwasher-repair' => [
    'image' => 'Samsung Dishwasher Repair',
    'title' => 'Samsung Dishwasher Repair',
    'card'  => 'Samsung Dishwasher Repair for Drainage, Water &amp; Cleaning Issues',
    'short' => 'Dishwasher',
    'icon'  => 'dishwasher',
    'body'  => 'Dirty dishes after a cycle, standing water in the tub, or sudden power tripping means your dishwasher needs immediate expert attention. Our Samsung Dishwasher service center checks water inlet valves, spray arms, and drainage pumps directly at your home. We fix the root cause and restore perfect cleaning performance without unnecessary part replacements.',
  ],
  'samsung-dryer-repair' => [
    'image' => 'Samsung Dryer Repair',
    'title' => 'Samsung Tumble Dryer Repair',
    'card'  => 'Samsung Tumble Dryer Repair for Heating &amp; Drying Problems',
    'short' => 'Tumble Dryer',
    'icon'  => 'dryer',
    'body'  => 'A dryer that runs without heating, takes double the time to dry clothes, or makes loud drum noises ruins your laundry routine. Our Samsung Tumble Dryer service center inspects heating elements, thermal fuses, and belt drives. We complete on-site repairs swiftly for your samsung dryer service, ensuring your appliance operates safely and efficiently.',
  ],
  'samsung-cooker-repair' => [
    'image' => 'Samsung Cooker Repair',
    'title' => 'Samsung Cooker Repair',
    'card'  => 'Samsung Cooker Repair for Heating, Ignition &amp; Cooking Issues',
    'short' => 'Cooker',
    'icon'  => 'cooker',
    'body'  => 'Burners that refuse to ignite, uneven oven heating, or broken temperature controls make daily meal preparation unsafe and difficult. Our Samsung Cooker service center tests ignition modules, thermostats, and heating elements. We resolve electrical and gas faults on the spot so you can cook with complete confidence.',
  ],
  'samsung-hood-repair' => [
    'image' => 'Samsung Hood Repair',
    'title' => 'Samsung Hood Repair',
    'card'  => 'Samsung Cooker Hood Repair for Ventilation &amp; Motor Problems',
    'short' => 'Hood',
    'icon'  => 'hood',
    'body'  => 'Weak smoke extraction, harsh motor noise, or broken control buttons leave unpleasant odors and grease inside your kitchen. Our Samsung Hood service center inspects blower motors, duct connections, and filters. We clear airflow blockages and replace worn components to keep your kitchen air clean and fresh.',
  ],
  'samsung-ac-repair' => [
    'image' => 'Samsung Air Conditioner Repair & Service',
    'title' => 'Samsung Air Conditioner Service &amp; Repair',
    'card'  => 'Samsung AC Repair &amp; Servicing for Cooling &amp; Performance Issues',
    'short' => 'Air Conditioner',
    'icon'  => 'ac',
    'body'  => 'An AC leaking water, blowing warm air, or failing to start during the hot UAE summer creates unbearable indoor discomfort. Our Samsung Air Conditioner service center provides fast diagnostic checks for capacitors, PCB boards, and refrigerant levels. We perform precise servicing and repairs to restore powerful cooling quickly.',
  ],
];
