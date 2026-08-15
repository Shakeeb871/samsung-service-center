<?php
/**
 * Samsung Fridge, Freezer & Refrigerator Repair UAE.
 *
 * Copy only. The layout lives in inc/landing-page.php, shared with the
 * washing machine page.
 */

/* Plain '&' here — header.php escapes the title and the description,
   so an entity in them would be double-encoded into the tab. */
$page_title = 'Samsung Fridge, Freezer & Refrigerator Repair UAE | On-Site Service';
$page_desc  = 'Certified Samsung fridge, freezer and refrigerator repair across the UAE. Same-day on-site service, authentic Samsung parts, upfront pricing and a 90-day warranty on every job.';
$page_path  = '/services/samsung-refrigerator-repair/';

$LP = [
  'slug'  => 'samsung-refrigerator-repair',
  'crumb' => 'Fridge &amp; Refrigerator',
  'h1'    => 'Samsung Fridge, Freezer &amp; Refrigerator Repair UAE',
  'hero_lead' => 'Certified, on-site Samsung fridge, freezer and refrigerator repair across the Emirates.',

  'intro' => 'Welcome to the premier destination for official Samsung fridge, freezer, and
    refrigerator repair across the UAE. We deliver specialized, on-site repair services to keep
    your food fresh and your kitchen running smoothly. Our certified specialists provide same-day
    troubleshooting using authentic Samsung parts and precision diagnostic tools. Whether you need
    a simple thermostat replacement, a complex compressor repair, or a complete system regas, we
    bring absolute technical expertise directly to your home with guaranteed results.',

  /* The promises the opening paragraphs make, pulled out where they can
     be read in a glance rather than found in a sentence. */
  'assurance' => [
    ['clock',  'Same-day troubleshooting', 'On-site diagnosis at your home.'],
    ['shield', 'Authentic Samsung parts',  'Every replacement is a genuine part.'],
    ['wallet', 'Upfront, clear pricing',   'The price is agreed before work starts.'],
    ['check',  '90-day repair warranty',   'On every job we complete for you.'],
  ],

  'centre_h2' => 'Professional Samsung Refrigerator Service Center In United Arab Emirates',
  'centre_body' => [
    'Trusting a technician with your expensive cooling appliances requires complete confidence and
     transparent communication. We operate the most dependable Samsung refrigerator service center
     in the UAE, built strictly on honesty and professional workmanship. Our certified technicians
     understand the complex cooling cycles and electronic systems behind every Samsung model. We
     value your time, provide straightforward upfront pricing, and ensure every repair aligns with
     official factory guidelines. You receive a detailed service report and a solid 90-day warranty
     on every completed job.',
  ],

  'types_h2' => 'Our Specialists Repair All Types Of Samsung Refrigerators',
  'types_body' => 'Samsung designs a vast range of advanced cooling systems, and our technical team
    understands the specific architecture of every single model. We repair classic Top Mount
    fridges, spacious Side-by-Side refrigerators, and modern French Door models. Whether you own a
    sophisticated Family Hub smart fridge, a Twin Cooling Plus unit, or a reliable single-door
    freezer, our engineers carry the exact knowledge and tools required. We tailor our repair
    approach to the unique airflow and electronic design of your exact appliance to deliver a
    perfect repair.',

  /* Named in the paragraph above. Printed as labels so the range is
     visible without reading the paragraph twice. */
  'models' => ['Top Mount', 'Side-by-Side', 'French Door', 'Family Hub', 'Twin Cooling Plus', 'Single-Door Freezer'],

  'faults_h2' => 'We Deal With All Samsung Fridge &amp; Freezer Problems',
  'index_label' => 'Find your fault',
  'index_h3'    => 'What your fridge is doing',
  'index_hint'  => 'Press one to jump straight to that fault and its fix.',
  'faults_intro' => [
    'A failing refrigerator disrupts your entire kitchen routine and puts hundreds of Dirhams worth
     of groceries at risk. Ignoring minor temperature fluctuations or calling an uncertified
     mechanic often leads to spoiled food, burnt compressors, and wasted money due to incorrect
     guesswork. Our expert technicians eliminate this risk completely. We utilize advanced digital
     scanners to pinpoint the exact root cause behind any cooling failure or error code.',
    'Here is a detailed breakdown of the exact problems we fix and how we resolve them directly at
     your home.',
  ],

  /* Heading, the badge beside it, what is happening and why, then the
     fix. 'chip' is what the index prints — the symptom in two words,
     because someone standing at the fridge is matching a symptom, not a
     code the way they do on a washing machine. */
  'faults' => [
    [
      'id' => 'fridge-warm',
      'title' => 'Refrigerator Not Cooling But Freezer Works',
      'code'  => '',
      'chip'  => 'Fridge warm',
      'problem' => 'You open your fridge and find warm milk and spoiling vegetables, yet the freezer compartment remains perfectly frozen. This unequal cooling happens when the evaporator fan motor breaks down and fails to blow cold air from the freezer up into the fridge section. A solid block of ice blocking the internal air damper vents also stops cold air circulation completely.',
      'solution' => 'Our technicians dismantle the internal rear panel to inspect the airflow path. We replace faulty evaporator fan motors and manually clear any ice blockages from the damper vents, restoring strong, even cooling throughout the entire refrigerator compartment.',
    ],
    [
      'id' => 'no-cooling',
      'title' => 'Complete Cooling Failure',
      'code'  => 'Compressor Not Running',
      'chip'  => 'No cooling',
      'problem' => 'Both the fridge and freezer become completely warm, and you no longer hear the familiar humming sound from the back of the machine. This total cooling failure points directly to a dead compressor, a blown start relay, or a faulty inverter control board. Power surges frequently burn out the start relay, cutting electrical power to the main compressor motor.',
      'solution' => 'We use a digital multimeter to test the electrical continuity of the compressor pins and the start relay. We install a new genuine start relay, repair the inverter board, or safely replace the entire compressor to bring your appliance back to life.',
    ],
    [
      'id' => 'ice-buildup',
      'title' => 'Excessive Ice Buildup in the Freezer',
      'code'  => 'Defrost Failure',
      'chip'  => 'Ice buildup',
      'problem' => 'Thick sheets of solid ice build up on the back wall of your freezer, burying your frozen food and making the drawers hard to open. Modern Samsung fridges are frost-free, so ice buildup indicates a complete failure in the automatic defrost system. A burnt defrost heater, a broken bimetal thermostat, or a faulty defrost timer stops the fridge from melting its daily frost.',
      'solution' => 'We run a forced digital defrost cycle to test the internal heating components. We safely replace the burnt defrost heater and install new bimetal thermostats, ensuring your freezer remains completely frost-free and operates efficiently.',
    ],
    [
      'id' => 'leaking',
      'title' => 'Water Leaking Inside or Under the Fridge',
      'code'  => '',
      'chip'  => 'Leaking',
      'problem' => 'You discover dangerous pools of water collecting under the vegetable crisper drawers or leaking onto your kitchen floor. This messy problem occurs when the primary defrost drain tube gets completely clogged with food particles, dust, or solid ice. When the drain clogs, the automatic defrost water overflows directly into the fridge compartment instead of draining into the bottom drip pan.',
      'solution' => 'We access the internal drainage system behind the evaporator coils. We flush the blocked drain tube with hot water, clear all debris, and adjust the drain heater clip to prevent future freezing, keeping your fridge completely dry inside.',
    ],
    [
      'id' => 'noise',
      'title' => 'Loud Humming, Buzzing, or Clicking Noises',
      'code'  => '',
      'chip'  => 'Noise',
      'problem' => 'Your refrigerator sounds like a loud generator, or you hear a constant, repetitive clicking noise from the back panel. A loud buzzing noise usually comes from a failing condenser fan motor that is struggling to turn due to thick dust buildup. A repetitive clicking noise means the compressor start relay is repeatedly failing to ignite the main motor.',
      'solution' => 'We pull the fridge forward to clean the rear condenser coils and inspect the fan assembly. We replace noisy fan motors and fit new compressor start relays, returning your kitchen to complete silence.',
    ],
    [
      'id' => 'ice-maker',
      'title' => 'Ice Maker Not Producing Ice',
      'code'  => '',
      'chip'  => 'No ice',
      'problem' => 'You press the dispenser lever, but the ice maker stays completely empty and produces no ice cubes. This frustrating issue happens when the home water supply line gets kinked or frozen shut. A jammed mechanical ice maker assembly or a faulty electronic water inlet valve also stops water from filling the ice molds properly.',
      'solution' => 'We test the water pressure reaching the back of the fridge and inspect the ice maker gears. We thaw frozen water lines, replace defective inlet valves, or install a brand new ice maker assembly so you always have fresh ice ready.',
    ],
    [
      'id' => 'dispenser',
      'title' => 'Water Dispenser Not Working',
      'code'  => '',
      'chip'  => 'Dispenser',
      'problem' => 'You push a glass against the dispenser pad, but no water comes out, or it only drips very slowly. This happens when the main internal water filter becomes completely blocked with hard water minerals and sediment. A frozen water reservoir inside the fridge door or a broken micro-switch behind the dispenser pad also stops water flow.',
      'solution' => 'We replace the clogged water filter with an authentic Samsung filter to restore strong water pressure. We thaw frozen reservoirs and repair the dispenser micro-switches, ensuring a fast and clean flow of chilled drinking water.',
    ],
    [
      'id' => 'freezing-food',
      'title' => 'Refrigerator Freezing Food in the Fridge Section',
      'code'  => '',
      'chip'  => 'Freezing food',
      'problem' => 'Your fresh vegetables, eggs, and liquids turn solid and freeze inside the main refrigerator compartment. This overcooling problem stems from a defective temperature sensor (thermistor) that sends the wrong readings to the motherboard. A broken air damper control that stays permanently wide open also forces too much freezing air into the fresh food section.',
      'solution' => 'We test the thermistor sensors for accurate resistance readings at different temperatures. We replace faulty sensors and fit new electronic air dampers, giving you precise temperature control to keep food fresh, not frozen.',
    ],
    [
      'id' => 'error-codes',
      'title' => 'Blinking Error Codes on the Digital Display',
      'code'  => '22E &middot; 33E &middot; 40E',
      'chip'  => '22E',
      'problem' => 'Your smart fridge suddenly starts beeping, and specific error codes flash continuously on the front display panel. Codes like 22E point to an evaporator fan failure, 33E indicates an ice pipe heater issue, and 40E signals an ice room fan error. These codes are the motherboard&rsquo;s way of shutting down specific functions to prevent severe electrical damage.',
      'solution' => 'We connect our diagnostic scanners directly to your fridge&rsquo;s control panel. We decode the exact error, replace the specific failing sensor, fan, or heater, and reset the main control board to clear the error code permanently.',
    ],
    [
      'id' => 'door-seal',
      'title' => 'Fridge Door Not Closing or Sealing Properly',
      'code'  => '',
      'chip'  => 'Door seal',
      'problem' => 'The heavy fridge door pops open constantly, or you feel cold air escaping around the edges when the door is closed. This energy-wasting issue happens when the magnetic rubber door gasket loses its suction, tears, or fills with sticky grime. A poorly leveled fridge also causes the heavy doors to swing open naturally.',
      'solution' => 'We clean the door tracks and fit a brand new, factory-grade magnetic rubber gasket to restore an airtight seal. We also adjust the bottom leveling legs perfectly, ensuring the door closes smoothly and stays shut, saving your electricity bill.',
    ],
  ],

  'band_h2' => 'Fridge not cooling? A specialist can be with you within the hour.',
  'band_p'  => 'Certified technicians, authentic Samsung parts, and a 90-day warranty on every repair.',
  'band_alt' => 'Call our Samsung refrigerator repair experts in the UAE',

  'process_h2' => 'Our Complete Working Process',
  'steps' => [
    ['Contact Us 24/7', 'Our dedicated support team is available day or night to record your cooling issue and arrange immediate assistance.'],
    ['1 Hour Response', 'We aim to respond to emergency breakdowns within an hour, dispatching an expert specialist straight to your home.'],
    ['Diagnosis &amp; Approval', 'Our technician inspects the refrigerator on site, explains the exact fault clearly, and provides a transparent, upfront price before starting work.'],
    ['Problem Solved', 'We complete the approved repair, test the cooling cycle to prove the fridge works perfectly, and leave your kitchen completely clean.'],
  ],

  'inspect_h2' => 'Our Complete Inspection Services Includes In Samsung Refrigerator',
  'inspect_body' => 'We do not just swap a broken part and walk away. Our comprehensive inspection
    covers every vital component of your refrigerator to secure long-lasting performance. We
    thoroughly clean the rear condenser coils to ensure efficient heat release and test the
    compressor&rsquo;s electrical draw. Our specialists inspect the internal evaporator coils for
    frost patterns and check the entire defrost heating system. We also carefully examine the door
    seals, water filter lines, and digital control board to ensure your fridge operates at maximum
    energy efficiency.',

  /* Every item is a component named in the paragraph above — the list is
     that paragraph made scannable, not extra claims. */
  'inspect_list' => [
    'Rear condenser coils cleaned for efficient heat release',
    'Compressor tested for its electrical draw',
    'Internal evaporator coils inspected for frost patterns',
    'Entire defrost heating system checked',
    'Door seals examined',
    'Water filter lines examined',
    'Digital control board examined for energy efficiency',
  ],

  'support_h2' => 'Official Samsung Refrigerator Customer Support',
  'support_body' => 'A successful repair depends heavily on honest and accessible communication.
    Our dedicated customer support desk operates around the clock to provide instant assistance for
    any service inquiry or technical complaint. If you have a question about your recent repair or
    need emergency troubleshooting, you never have to wait for hours or chase different staff
    members. We maintain clear service records and take full accountability for our work, ensuring
    you always have a direct line to reliable and professional help.',

  'coverage_h2' => 'We Cover Every Area In UAE',
  'coverage_body' => 'A broken refrigerator does not wait for a convenient time, no matter where you
    live. Our dedicated repair team covers every major state, including Dubai, Abu Dhabi, Sharjah,
    Ajman, Ras Al Khaimah, Umm Al Quwain, and Fujairah. Our technicians have over a decade of local
    driving experience and know the fastest routes across the Emirates. This allows us to reach
    your doorstep swiftly and deliver emergency repair services exactly when you need them.',

  'why_h2' => 'Why Our Samsung Refrigerator Repair Team Matters In The UAE',
  'why_alt' => 'Our Samsung refrigerator repair team in the UAE',
  'why_body' => [
    'We are proud of our high standards and always endeavour to find ways to improve our
     relationship with our customers. Finding a reliable technician in the UAE can be a frustrating
     challenge, but our licensed Samsung team saves you from those constant headaches.',
    'We guarantee punctual arrivals to protect your daily schedule and provide completely
     transparent pricing with zero hidden fees. By combining genuine spare parts, professional
     communication, and deep technical expertise, we serve as the perfect appliance repair partner
     for your home. We treat your property with complete respect and deliver quick, trustworthy
     cooling solutions that last.',
  ],
];

require __DIR__ . '/../../inc/landing-page.php';
