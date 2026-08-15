<?php
/**
 * Every business detail the site prints lives here. Change it once, it
 * changes on all pages.
 */

// ---------------------------------------------------------------------
// Staging switch. While true, every page sends noindex. The site is on a
// subdomain of aiqonquickcool.com.my, which is not its final address —
// indexing it now puts a second copy of this content into Google that
// later competes with the real domain.
// ---------------------------------------------------------------------
define('IS_STAGING', true);

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

define('SITE_URL', $__scheme . '://' . ($_SERVER['HTTP_HOST'] ?? 'samsung.aiqonquickcool.com.my') . BASE);

// --- Business details -------------------------------------------------
define('BIZ_NAME',    'Samsung Service Center');
define('BIZ_TAGLINE', 'Appliance repair across the UAE');

define('BIZ_PHONE',      '+971 50 619 1442');
define('BIZ_PHONE_LINK', '+971506191442');
define('BIZ_WHATSAPP',   '971506191442');

// REPLACE — the enquiry form delivers here.
define('BIZ_EMAIL', 'info@example.com');

// REPLACE — or remove the address row from the footer if there is no
// walk-in office.
define('BIZ_ADDRESS', 'Dubai, United Arab Emirates');

define('BIZ_HOURS', '24/7 customer support');

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
//   icon   key in inc/icons.php, drawn only if no photograph is found
//   body   the copy that appears on the service card
$SERVICES = [
  'samsung-washing-machine-repair' => [
    'image' => 'Samsung Washing Machine Repair',
    'title' => 'Samsung Washing Machine Repair',
    'short' => 'Washing Machine',
    'icon'  => 'washer',
    'body'  => 'Is your washer facing spinning failures, a drain malfunction, or showing error code E3, 4C, DE, or SE error in Samsung washing machine? A locked door or sudden stoppage can freeze your household work. Our Samsung washing machine service center diagnoses the exact issue on site. Whether you need to unlock Samsung washing machine controls, clear a 4C water inlet fault, or repair the drain pump, our certified technicians fix it instantly using genuine parts.',
  ],
  'samsung-refrigerator-repair' => [
    'image' => 'Samsung Fridge Repair',
    'title' => 'Samsung Fridge &amp; Refrigerator Repair',
    'short' => 'Fridge &amp; Refrigerator',
    'icon'  => 'fridge',
    'body'  => 'Warm food, water pooling at the bottom, or excessive frost build-up indicates a serious cooling failure in your refrigerator. Delaying a repair risks spoiling hundreds of Dirhams in groceries. Our Samsung Fridge &amp; Refrigerator service center provides rapid emergency support. Our specialists check the inverter compressor, defrost sensors, and refrigerant lines to solve the fault quickly and restore optimal cooling.',
  ],
  'samsung-dishwasher-repair' => [
    'image' => 'Samsung Dishwasher Repair',
    'title' => 'Samsung Dishwasher Repair',
    'short' => 'Dishwasher',
    'icon'  => 'dishwasher',
    'body'  => 'Dirty dishes after a cycle, standing water in the tub, or sudden power tripping means your dishwasher needs immediate expert attention. Our Samsung Dishwasher service center checks water inlet valves, spray arms, and drainage pumps directly at your home. We fix the root cause and restore perfect cleaning performance without unnecessary part replacements.',
  ],
  'samsung-dryer-repair' => [
    'image' => 'Samsung Dryer Repair',
    'title' => 'Samsung Tumble Dryer Repair',
    'short' => 'Tumble Dryer',
    'icon'  => 'dryer',
    'body'  => 'A dryer that runs without heating, takes double the time to dry clothes, or makes loud drum noises ruins your laundry routine. Our Samsung Tumble Dryer service center inspects heating elements, thermal fuses, and belt drives. We complete on-site repairs swiftly for your samsung dryer service, ensuring your appliance operates safely and efficiently.',
  ],
  'samsung-cooker-repair' => [
    'image' => 'Samsung Cooker Repair',
    'title' => 'Samsung Cooker Repair',
    'short' => 'Cooker',
    'icon'  => 'cooker',
    'body'  => 'Burners that refuse to ignite, uneven oven heating, or broken temperature controls make daily meal preparation unsafe and difficult. Our Samsung Cooker service center tests ignition modules, thermostats, and heating elements. We resolve electrical and gas faults on the spot so you can cook with complete confidence.',
  ],
  'samsung-hood-repair' => [
    'image' => 'Samsung Hood Repair',
    'title' => 'Samsung Hood Repair',
    'short' => 'Hood',
    'icon'  => 'hood',
    'body'  => 'Weak smoke extraction, harsh motor noise, or broken control buttons leave unpleasant odors and grease inside your kitchen. Our Samsung Hood service center inspects blower motors, duct connections, and filters. We clear airflow blockages and replace worn components to keep your kitchen air clean and fresh.',
  ],
  'samsung-ac-repair' => [
    'image' => 'Samsung Air Conditioner Repair & Service',
    'title' => 'Samsung Air Conditioner Service &amp; Repair',
    'short' => 'Air Conditioner',
    'icon'  => 'ac',
    'body'  => 'An AC leaking water, blowing warm air, or failing to start during the hot UAE summer creates unbearable indoor discomfort. Our Samsung Air Conditioner service center provides fast diagnostic checks for capacitors, PCB boards, and refrigerant levels. We perform precise servicing and repairs to restore powerful cooling quickly.',
  ],
];
