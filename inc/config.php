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

define('SITE_URL', 'https://samsung.aiqonquickcool.com.my');

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

// Emirates covered, as listed in the coverage section.
$EMIRATES = ['Dubai', 'Abu Dhabi', 'Sharjah', 'Ajman', 'Ras Al Khaimah', 'Umm Al Quwain', 'Fujairah'];

// The seven services. 'icon' maps to a key in inc/icons.php, 'body' is the
// copy that appears on the service card.
$SERVICES = [
  'samsung-washing-machine-repair' => [
    'title' => 'Samsung Washing Machine Repair',
    'short' => 'Washing Machine',
    'icon'  => 'washer',
    'body'  => 'Is your washer facing spinning failures, a drain malfunction, or showing error code E3, 4C, DE, or SE error in Samsung washing machine? A locked door or sudden stoppage can freeze your household work. Our Samsung washing machine service center diagnoses the exact issue on site. Whether you need to unlock Samsung washing machine controls, clear a 4C water inlet fault, or repair the drain pump, our certified technicians fix it instantly using genuine parts.',
  ],
  'samsung-refrigerator-repair' => [
    'title' => 'Samsung Fridge &amp; Refrigerator Repair',
    'short' => 'Fridge &amp; Refrigerator',
    'icon'  => 'fridge',
    'body'  => 'Warm food, water pooling at the bottom, or excessive frost build-up indicates a serious cooling failure in your refrigerator. Delaying a repair risks spoiling hundreds of Dirhams in groceries. Our Samsung Fridge &amp; Refrigerator service center provides rapid emergency support. Our specialists check the inverter compressor, defrost sensors, and refrigerant lines to solve the fault quickly and restore optimal cooling.',
  ],
  'samsung-dishwasher-repair' => [
    'title' => 'Samsung Dishwasher Repair',
    'short' => 'Dishwasher',
    'icon'  => 'dishwasher',
    'body'  => 'Dirty dishes after a cycle, standing water in the tub, or sudden power tripping means your dishwasher needs immediate expert attention. Our Samsung Dishwasher service center checks water inlet valves, spray arms, and drainage pumps directly at your home. We fix the root cause and restore perfect cleaning performance without unnecessary part replacements.',
  ],
  'samsung-dryer-repair' => [
    'title' => 'Samsung Tumble Dryer Repair',
    'short' => 'Tumble Dryer',
    'icon'  => 'dryer',
    'body'  => 'A dryer that runs without heating, takes double the time to dry clothes, or makes loud drum noises ruins your laundry routine. Our Samsung Tumble Dryer service center inspects heating elements, thermal fuses, and belt drives. We complete on-site repairs swiftly for your samsung dryer service, ensuring your appliance operates safely and efficiently.',
  ],
  'samsung-cooker-repair' => [
    'title' => 'Samsung Cooker Repair',
    'short' => 'Cooker',
    'icon'  => 'cooker',
    'body'  => 'Burners that refuse to ignite, uneven oven heating, or broken temperature controls make daily meal preparation unsafe and difficult. Our Samsung Cooker service center tests ignition modules, thermostats, and heating elements. We resolve electrical and gas faults on the spot so you can cook with complete confidence.',
  ],
  'samsung-hood-repair' => [
    'title' => 'Samsung Hood Repair',
    'short' => 'Hood',
    'icon'  => 'hood',
    'body'  => 'Weak smoke extraction, harsh motor noise, or broken control buttons leave unpleasant odors and grease inside your kitchen. Our Samsung Hood service center inspects blower motors, duct connections, and filters. We clear airflow blockages and replace worn components to keep your kitchen air clean and fresh.',
  ],
  'samsung-ac-repair' => [
    'title' => 'Samsung Air Conditioner Service &amp; Repair',
    'short' => 'Air Conditioner',
    'icon'  => 'ac',
    'body'  => 'An AC leaking water, blowing warm air, or failing to start during the hot UAE summer creates unbearable indoor discomfort. Our Samsung Air Conditioner service center provides fast diagnostic checks for capacitors, PCB boards, and refrigerant levels. We perform precise servicing and repairs to restore powerful cooling quickly.',
  ],
];
