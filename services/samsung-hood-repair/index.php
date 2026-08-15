<?php
/**
 * Samsung Hood Repair UAE.
 *
 * Copy only. The layout lives in inc/landing-page.php, shared with the
 * other service landing pages.
 */

$page_title = 'Samsung Hood Repair UAE | Certified On-Site Service';
$page_desc  = 'Certified Samsung cooker hood and extractor fan repair across the UAE. Same-day on-site service, genuine Samsung spare parts, upfront pricing and a 90-day warranty on every job.';
$page_path  = '/services/samsung-hood-repair/';

$LP = [
  'slug'  => 'samsung-hood-repair',
  'crumb' => 'Cooker Hood',
  'h1'    => 'Samsung Hood Repair UAE',
  'hero_lead' => 'Certified, on-site Samsung cooker hood and extractor fan repair across the Emirates.',

  'intro' => 'Welcome to the official destination for premium Samsung hood repair across the UAE.
    We provide certified, on-site cooker hood and extractor fan repair services to keep your
    kitchen air clean, fresh, and completely free of cooking smoke. Our dedicated specialists
    deliver fast, same-day solutions using genuine Samsung spare parts and advanced diagnostic
    tools. Whether you need a deep motor cleaning, a complete electrical system service, or a
    replacement for a broken control panel, we bring true expertise straight to your doorstep with
    guaranteed results.',

  /* The promises the opening paragraphs make, pulled out where they can
     be read in a glance rather than found in a sentence. */
  'assurance' => [
    ['clock',  'Same-day on-site service', 'Fast solutions delivered at your doorstep.'],
    ['shield', 'Genuine Samsung parts',    'Every replacement is an authorised part.'],
    ['wallet', 'Upfront, clear pricing',   'The price is agreed before work starts.'],
    ['check',  '90-day repair warranty',   'On every job we complete for you.'],
  ],

  'centre_h2' => 'Professional Samsung Hood Service Center In United Arab Emirates',
  'centre_body' => [
    'Finding a trustworthy team to handle your kitchen ventilation appliances requires confidence
     and clear communication. We operate the most reliable Samsung hood service center in the
     region, focusing strictly on transparency and high-quality workmanship. Our certified
     technicians understand the exact engineering behind Samsung airflow technology. We prioritize
     your schedule, provide upfront clear pricing, and ensure every repair meets official factory
     standards. You receive a complete service record and a solid 90-day warranty on every job we
     complete.',
  ],

  'types_h2' => 'Our Specialists Repair All Types Of Samsung Hoods',
  'types_body' => 'Samsung produces a wide variety of advanced kitchen extraction appliances, and
    our technical team knows the internal mechanics of every single model perfectly. We repair
    wall-mounted chimney hoods, modern island extractor fans, and sleek built-in telescopic hoods.
    Whether you own an advanced smart cooker hood, a high-suction canopy unit, or a classic visor
    model, our engineers carry the exact tools and knowledge required. We adapt our repair methods
    to the specific extraction rates and electrical designs of your exact appliance to ensure a
    flawless repair.',

  /* Named in the paragraph above. Printed as labels so the range is
     visible without reading the paragraph twice. */
  'models' => ['Wall Chimney', 'Island', 'Built-In Telescopic', 'Smart Hood', 'Canopy', 'Visor'],

  'faults_h2' => 'We Deal With All Samsung Hood Problems',
  'index_label' => 'Find your fault',
  'index_h3'    => 'What your hood is doing',
  'index_hint'  => 'Press one to jump straight to that fault and its fix.',
  'faults_intro' => [
    'A cooker hood can suddenly stop pulling in smoke, make terrible grinding noises, or refuse to
     turn on completely. Ignoring these early warning signs leaves your kitchen covered in sticky
     grease and strong cooking odors. Calling an uncertified mechanic makes the situation much
     worse, as they often replace expensive motors through guesswork. Our expert technicians
     eliminate this stress completely. We use advanced digital scanners and airflow testers to
     pinpoint the exact root cause behind any Samsung hood problem.',
    'Here is a detailed breakdown of the exact problems we fix and how we resolve them directly at
     your home.',
  ],

  /* Heading, the badge beside it, what is happening and why, then the
     fix. 'chip' is what the index prints — the symptom in two words,
     because a hood shows a fault in the room, not on a display. */
  'faults' => [
    [
      'id' => 'weak-suction',
      'title' => 'Weak Smoke Extraction',
      'code'  => 'Poor Suction',
      'chip'  => 'Weak suction',
      'problem' => 'You turn the hood to the maximum speed, but thick cooking smoke still fills your kitchen and sets off the fire alarm. This weak suction happens when thick layers of sticky cooking grease completely block the metal mesh filters. A crushed external ducting pipe or a failing extraction motor also prevents the hood from pulling the air outside efficiently.',
      'solution' => 'Our technicians remove and deeply degrease the metal filters. We inspect the ducting pipe for blockages and test the extraction motor power. We restore strong suction instantly, ensuring your hood pulls all the heavy smoke out of your kitchen.',
    ],
    [
      'id' => 'noise',
      'title' => 'Loud Vibrations and Grinding Noises',
      'code'  => '',
      'chip'  => 'Noise',
      'problem' => 'Your extractor fan sounds like a helicopter landing in your kitchen the moment you turn it on. This harsh noise occurs when grease builds up heavily on one side of the internal plastic fan blade (impeller), throwing it completely off balance. Worn-out motor bearings or a loose mounting bracket holding the hood to the wall also cause severe vibrations.',
      'solution' => 'We dismantle the main housing to access the internal blower motor. We clean or replace the unbalanced fan blade, install new motor bearings, and tighten all wall mounts, returning your kitchen ventilation to a smooth and quiet operation.',
    ],
    [
      'id' => 'no-power',
      'title' => 'Hood Not Turning On At All',
      'code'  => 'Complete Power Loss',
      'chip'  => 'No power',
      'problem' => 'You press the power button, but the display remains completely dark and the fan refuses to start. This sudden power loss happens due to a blown internal thermal fuse located near the main motor. Power surges from the main electrical supply also frequently fry the sensitive electronic control board located behind the front panel.',
      'solution' => 'We trace the electrical current from the wall switch directly to the main circuit board. We replace blown thermal fuses and install a newly programmed Samsung motherboard, restoring complete electrical power to your appliance safely.',
    ],
    [
      'id' => 'controls',
      'title' => 'Touch Controls or Buttons Unresponsive',
      'code'  => '',
      'chip'  => 'Controls stuck',
      'problem' => 'You press the control panel to change the fan speed, but the buttons feel stuck or the digital touch screen does not respond. This frustrating issue happens when hot cooking steam and rising grease penetrate the small gaps around the push buttons, gluing the internal switches together. A short-circuited touch interface board also prevents the buttons from sending signals to the main motor.',
      'solution' => 'We safely remove the front glass panel to access the switch assembly. We clean away all the trapped grease and install a brand new electronic touch control board, giving you back instant and precise control over your hood settings.',
    ],
    [
      'id' => 'lights',
      'title' => 'LED Lights Not Working',
      'code'  => '',
      'chip'  => 'No light',
      'problem' => 'You try to turn on the hood lights to see your cooking pots, but the bulbs stay completely dark or flicker constantly. This lighting failure happens when the LED bulbs simply burn out over time. A faulty internal lighting transformer (LED driver) or a melted wiring connection caused by intense stove heat also cuts off power to the lamps.',
      'solution' => 'We test the voltage reaching the light sockets. We install genuine Samsung LED bulbs and replace faulty lighting transformers, ensuring your cooking area remains brightly and safely illuminated.',
    ],
    [
      'id' => 'oil-drips',
      'title' => 'Oil and Grease Dripping from the Hood',
      'code'  => '',
      'chip'  => 'Oil drips',
      'problem' => 'You notice dirty brown drops of cooking oil falling from the hood directly into your clean food. This highly unhygienic problem occurs when the internal grease catchers or oil cups overflow completely. If the hood has not received a deep internal service for years, heavy grease liquifies under the heat of your stove and leaks through the outer casing.',
      'solution' => 'We completely dismantle the internal extraction chamber and perform a heavy-duty chemical degreasing service. We empty and replace the saturated oil cups and install fresh filters, completely stopping the dirty oil drips.',
    ],
    [
      'id' => 'speed-stuck',
      'title' => 'Fan Speed Stuck on One Level',
      'code'  => '',
      'chip'  => 'Speed stuck',
      'problem' => 'You turn the hood on, but the fan runs at full maximum speed permanently, and you cannot turn it down or shut it off without unplugging the machine. This control failure points directly to a fused relay switch on the main printed circuit board (PCB). When a relay sticks in the closed position, it sends continuous electrical power to the motor regardless of what button you press.',
      'solution' => 'We access the main control housing and test the individual relays on the motherboard. We replace the faulty relay board with an authentic Samsung replacement, allowing you to cycle smoothly through all the different fan speeds again.',
    ],
    [
      'id' => 'bad-odour',
      'title' => 'Bad Odors Pushed Back Into the Kitchen',
      'code'  => '',
      'chip'  => 'Bad odour',
      'problem' => 'You run the extractor fan, but instead of removing smells, it blows a stale, foul odor right back into your face. For recirculating hoods (hoods without an outside duct), this happens when the active carbon charcoal filters expire completely and lose their ability to absorb smells. A trapped dead insect or old rotting grease inside the motor housing also creates this terrible smell.',
      'solution' => 'We open the main ventilation chamber to remove any trapped debris. We install brand new, high-absorption active charcoal carbon filters, ensuring your hood effectively neutralizes bad odors and returns perfectly fresh air to your kitchen.',
    ],
    [
      'id' => 'humming',
      'title' => 'Motor Humming But Not Spinning',
      'code'  => '',
      'chip'  => 'Humming',
      'problem' => 'You turn the fan on and hear a low electrical humming noise, but the blades refuse to spin. This happens when the motor start capacitor fails, meaning the motor does not get the initial electrical kick it needs to start turning. A completely seized motor bearing locked solid by old grease also prevents rotation.',
      'solution' => 'We test the start capacitor with a multimeter. We replace the dead capacitor with a new one and manually free the seized bearings using specialized lubricants, giving the motor the power it needs to spin up instantly.',
    ],
    [
      'id' => 'error-codes',
      'title' => 'Flashing Error Codes on Digital Display',
      'code'  => '',
      'chip'  => 'Error codes',
      'problem' => 'Your smart Samsung hood starts beeping, and specific error codes flash continuously on the front screen. These codes usually indicate a communication failure between the hood and your smart induction hob via Bluetooth, or signal that the internal filter saturation sensors have triggered to warn you that the hood is blocked.',
      'solution' => 'We connect our diagnostic scanners to the main control panel to decode the exact error. We reset the smart communication modules, replace faulty saturation sensors, and clear the error codes permanently, restoring full smart functionality to your appliance.',
    ],
  ],

  'band_h2' => 'Kitchen filling with smoke? A specialist can be with you within the hour.',
  'band_p'  => 'Certified technicians, genuine Samsung parts, and a 90-day warranty on every repair.',
  'band_alt' => 'Call our Samsung cooker hood repair experts in the UAE',

  'process_h2' => 'Our Complete Working Process',
  'steps' => [
    ['Contact Us 24/7', 'Our friendly customer support team is available day or night to record your appliance issue and arrange immediate help.'],
    ['1 Hour Response', 'We aim to respond to emergency call-outs within an hour, dispatching a skilled specialist straight to your location.'],
    ['Diagnosis &amp; Approval', 'Our technician examines the cooker hood on site, explains the exact fault clearly, and provides an upfront price before starting any work.'],
    ['Problem Solved', 'We complete the approved repair, run a final test cycle to prove the machine extracts smoke perfectly, and leave your kitchen completely clean and tidy.'],
  ],

  'inspect_h2' => 'Our Complete Inspection Services Includes In Samsung Hood',
  'inspect_body' => 'We do not just replace a single broken part and leave your home. Our
    comprehensive inspection covers every critical component of your machine to prevent future
    breakdowns. We thoroughly check the extraction motor for overheating and test the electrical
    wiring for any heat damage caused by your stove. Our specialists inspect the metal grease
    filters, active charcoal filters, and the external ducting flaps for any blockages. We also
    carefully examine the touch control boards and lighting circuits to ensure safe, efficient, and
    reliable ventilation.',

  /* Every item is a component named in the paragraph above — the list is
     that paragraph made scannable, not extra claims. */
  'inspect_list' => [
    'Extraction motor checked for overheating',
    'Electrical wiring tested for heat damage',
    'Metal grease filters inspected',
    'Active charcoal filters inspected',
    'External ducting flaps inspected for blockages',
    'Touch control boards examined',
    'Lighting circuits examined',
  ],

  'support_h2' => 'Official Samsung Hood Customer Support',
  'support_body' => 'A successful repair depends heavily on honest and accessible communication.
    Our dedicated customer support desk operates around the clock to provide instant assistance for
    any service inquiry or technical complaint. If you have a question about your recent repair or
    need emergency troubleshooting, you never have to wait for hours or chase different staff
    members. We maintain clear service records and take full accountability for our work, ensuring
    you always have a direct line to reliable and professional help.',

  'coverage_h2' => 'We Cover Every Area In UAE',
  'coverage_body' => 'A broken cooker hood does not wait for a convenient time, no matter where you
    live. Our dedicated repair team covers every major state, including Dubai, Abu Dhabi, Sharjah,
    Ajman, Ras Al Khaimah, Umm Al Quwain, and Fujairah. Our technicians have over a decade of local
    driving experience and know the fastest routes across the Emirates. This allows us to reach
    your doorstep swiftly and deliver emergency repair services exactly when you need them.',

  'why_h2' => 'Why Our Samsung Hood Repair Team Matters In The UAE',
  'why_alt' => 'Our Samsung cooker hood repair team in the UAE',
  'why_body' => [
    'We are proud of our work and always endeavour to find ways to improve our services, and most
     importantly, the relationship with our customers. Finding a reliable technician in the UAE can
     be a frustrating challenge, but we guarantee to offer the same level of expertise and respect
     to our customers&rsquo; friends and family that use any of our services.',
    'Our licensed Samsung team is highly experienced and serving the community to save you any
     further headaches. We are the one setting standards for doorstep, quick, and reliable
     solutions, making us the perfect Samsung appliances repairer for your home. We treat your
     property with complete respect and deliver fast, trustworthy kitchen ventilation solutions
     that last.',
  ],
];

require __DIR__ . '/../../inc/landing-page.php';
