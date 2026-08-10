<?php
/**
 * Every business detail the site prints lives here. Change it once, it
 * changes on all pages. Nothing below should be hardcoded into a template.
 *
 * >>> THE VALUES MARKED "REPLACE" ARE PLACEHOLDERS. <<<
 * The site will run with them, but the phone links go nowhere and the
 * contact form will not reach an inbox until they are real.
 */

// ---------------------------------------------------------------------
// Staging switch.
//
// While true, every page sends noindex and search engines stay away. The
// site is on a subdomain of aiqonquickcool.com.my, which is not its final
// address — indexing it now would put a second copy of this content into
// Google that later competes with the real domain.
//
// Set to false only after the site moves to its own domain.
// ---------------------------------------------------------------------
define('IS_STAGING', true);

// Canonical base URL, no trailing slash. Change this at launch too.
define('SITE_URL', 'https://samsung.aiqonquickcool.com.my');

// --- Business details -------------------------------------------------
define('BIZ_NAME',    'Samsung Service Center Dubai');
define('BIZ_TAGLINE', 'Samsung appliance repair across Dubai');

// REPLACE — display form and dial form of the same number.
define('BIZ_PHONE',      '+971 00 000 0000');
define('BIZ_PHONE_LINK', '+9710000000000');

// REPLACE — WhatsApp number in international format, no + and no spaces.
define('BIZ_WHATSAPP', '9710000000000');

// REPLACE — where contact form enquiries are emailed.
define('BIZ_EMAIL', 'info@example.com');

// REPLACE — full street address, or remove the address block from the
// footer and contact page if the business does not have a walk-in office.
define('BIZ_ADDRESS', 'Office address, Dubai, United Arab Emirates');

define('BIZ_HOURS', 'Every day, 8:00 AM to 10:00 PM');

// Areas listed on the site. Add or remove freely — the footer and the
// areas block read this array, so nothing else needs editing.
$SERVICE_AREAS = [
  'Deira', 'Bur Dubai', 'Al Barsha', 'Jumeirah', 'Dubai Marina',
  'JLT', 'Business Bay', 'Downtown Dubai', 'Al Quoz', 'Mirdif',
  'Silicon Oasis', 'International City', 'Discovery Gardens', 'Motor City',
];

// The service pages, in the order they appear in the nav and grids.
$SERVICES = [
  'samsung-refrigerator-repair' => [
    'title' => 'Samsung Refrigerator Repair',
    'short' => 'Refrigerator',
    'blurb' => 'Not cooling, freezing food, water on the floor, or a compressor that never stops.',
  ],
  'samsung-washing-machine-repair' => [
    'title' => 'Samsung Washing Machine Repair',
    'short' => 'Washing Machine',
    'blurb' => 'Will not drain, will not spin, error codes on the display, or water leaking underneath.',
  ],
  'samsung-ac-repair' => [
    'title' => 'Samsung Air Conditioner Repair',
    'short' => 'Air Conditioner',
    'blurb' => 'Blowing warm air, low gas, water dripping from the indoor unit, or a unit that trips the breaker.',
  ],
  'samsung-dryer-repair' => [
    'title' => 'Samsung Dryer Repair',
    'short' => 'Dryer',
    'blurb' => 'Tumbling without heat, clothes still damp after a full cycle, or a drum that has stopped turning.',
  ],
  'samsung-dishwasher-repair' => [
    'title' => 'Samsung Dishwasher Repair',
    'short' => 'Dishwasher',
    'blurb' => 'Dishes coming out dirty, standing water in the tub, or a door latch that will not hold.',
  ],
  'samsung-oven-repair' => [
    'title' => 'Samsung Oven and Microwave Repair',
    'short' => 'Oven & Microwave',
    'blurb' => 'No heat, uneven baking, a turntable that will not spin, or a control panel that ignores presses.',
  ],
];
