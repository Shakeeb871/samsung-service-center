<?php
/**
 * Samsung Dishwasher Repair UAE.
 *
 * Copy only. The layout lives in inc/landing-page.php, shared with the
 * washing machine and fridge pages.
 */

$page_title = 'Samsung Dishwasher Repair UAE | Certified On-Site Service';
$page_desc  = 'Certified Samsung dishwasher repair across the UAE. Same-day on-site service, genuine Samsung spare parts, upfront pricing and a 90-day warranty on every job.';
$page_path  = '/services/samsung-dishwasher-repair/';

$LP = [
  'slug'  => 'samsung-dishwasher-repair',
  'crumb' => 'Dishwasher',
  'h1'    => 'Samsung Dishwasher Repair UAE',
  'hero_lead' => 'Certified, on-site Samsung dishwasher repair across the Emirates.',

  'intro' => 'Welcome to the official destination for premium Samsung dishwasher repair across the
    UAE. We provide certified, on-site repair services to keep your kitchen routine running
    smoothly. Our dedicated specialists deliver fast, same-day solutions using genuine Samsung
    spare parts and advanced diagnostic tools. Whether you need a quick part replacement, a deep
    pump cleaning, or a complete system service, we bring true expertise straight to your doorstep
    with guaranteed results.',

  /* The promises the opening paragraphs make, pulled out where they can
     be read in a glance rather than found in a sentence. */
  'assurance' => [
    ['clock',  'Same-day on-site service', 'Fast solutions delivered at your doorstep.'],
    ['shield', 'Genuine Samsung parts',    'Every replacement is an authorised part.'],
    ['wallet', 'Upfront, clear pricing',   'The price is agreed before work starts.'],
    ['check',  '90-day repair warranty',   'On every job we complete for you.'],
  ],

  'centre_h2' => 'Professional Samsung Dishwasher Service Center In United Arab Emirates',
  'centre_body' => [
    'Finding a trustworthy team to handle your premium kitchen appliances requires confidence and
     clear communication. We operate the most reliable Samsung dishwasher service center in the
     region, focusing strictly on transparency and high-quality workmanship. Our certified
     technicians understand the exact engineering behind Samsung cleaning technology. We prioritize
     your schedule, provide upfront clear pricing, and ensure every repair meets official factory
     standards. You receive a complete service record and a solid 90-day warranty on every job we
     complete.',
  ],

  'types_h2' => 'Our Specialists Repair All Types Of Samsung Dishwashers',
  'types_body' => 'Samsung produces a wide variety of advanced dishwashing appliances, and our
    technical team knows the internal mechanics of every single model perfectly. We repair
    freestanding dishwashers, fully integrated built-in units, and modern slimline models. Whether
    you own an advanced WaterWall model, a StormWash unit, or a classic rotary spray dishwasher,
    our engineers carry the exact tools and knowledge required. We adapt our repair methods to the
    specific design and water pressure requirements of your exact appliance to ensure a flawless
    repair.',

  /* Named in the paragraph above. Printed as labels so the range is
     visible without reading the paragraph twice. */
  'models' => ['Freestanding', 'Fully Integrated', 'Slimline', 'WaterWall', 'StormWash', 'Rotary Spray'],

  'faults_h2' => 'We Deal With All Samsung Dishwasher Problems',
  'index_label' => 'Find your fault or error code',
  'index_h3'    => 'What your dishwasher is doing',
  'index_hint'  => 'Press one to jump straight to that fault and its fix.',
  'faults_intro' => [
    'A dishwasher can suddenly stop draining water, fail to dissolve detergent, or refuse to turn
     on entirely. Ignoring these early warning signs often leads to severe water leaks or permanent
     motherboard damage. Calling an uncertified mechanic makes the situation much worse, as they
     often replace expensive parts through guesswork. Our expert technicians eliminate this stress
     completely. We use advanced digital error scanners to pinpoint the exact root cause behind any
     Samsung dishwasher problem.',
    'Here is a detailed breakdown of the exact problems we fix and how we resolve them directly at
     your home.',
  ],

  /* Heading, the code shown on the panel, what is happening and why, then
     the fix. 'chip' is what the index prints — the code where the copy
     names one, the symptom in two words where it does not. */
  'faults' => [
    [
      'id' => 'drainage',
      'title' => 'Water Not Draining',
      'code'  => '5C or 5E Error',
      'chip'  => '5C',
      'problem' => 'Your dishwasher finishes its cycle, but you open the door to find a deep pool of dirty water sitting at the bottom of the tub. This drainage failure happens when food particles, broken glass, or grease completely clog the main filter assembly or the drainage hose. In older units, the magnetic drain pump motor simply wears out and loses the power needed to push heavy water out into your kitchen sink pipe.',
      'solution' => 'Our technicians dismantle the bottom filter assembly and clear all blockages from the drainage path. We test the electrical continuity of the drain pump. If the pump motor is dead, we replace it with a genuine Samsung drain pump to restore fast and clear water drainage immediately.',
    ],
    [
      'id' => 'dirty-dishes',
      'title' => 'Dishes Coming Out Dirty or Greasy',
      'code'  => '',
      'chip'  => 'Dirty dishes',
      'problem' => 'You run a full wash cycle, but plates and glasses come out covered in food residue, grease, and cloudy spots. This poor cleaning performance occurs when hard water limescale blocks the tiny holes inside the upper and lower rotating spray arms. A failing wash motor (circulation pump) can also lose its water pressure, meaning it cannot spray water hard enough to scrub the food off your dishes.',
      'solution' => 'We remove and deep-clean the rotating spray arms to clear all limescale blockages. We test the main circulation pump for adequate water pressure. If the pump is weak, we install a new authorized wash motor, ensuring your dishes come out sparkling clean every time.',
    ],
    [
      'id' => 'not-filling',
      'title' => 'Dishwasher Not Filling With Water',
      'code'  => '4C or 4E Error',
      'chip'  => '4C',
      'problem' => 'You press start, the machine hums slightly, but no water enters the tub, triggering a 4C error code on the digital panel. This filling problem happens when the small mesh screen inside the water inlet valve gets blocked with sand and pipe sediment. An electrical failure inside the inlet valve or a tripped Aqua Stop safety hose also prevents the machine from taking in any water.',
      'solution' => 'We inspect your home water pressure and clean the inlet mesh filter thoroughly. We test the electronic water inlet valve with a multimeter. If the valve fails to open mechanically, we fit a new factory-grade inlet valve so your dishwasher fills correctly on every cycle.',
    ],
    [
      'id' => 'leaking',
      'title' => 'Water Leaking From the Front Door',
      'code'  => 'LE or LC Error',
      'chip'  => 'LE',
      'problem' => 'You notice a dangerous puddle of water spreading across your kitchen floor from underneath the dishwasher door. Front leaks almost always happen because the heavy rubber door gasket tears, degrades, or loses its shape due to hot water and chemical exposure. A blocked bottom door channel or faulty door hinges that prevent the door from shutting tightly also cause heavy water leaks.',
      'solution' => 'We clean the door tracks entirely and fit a brand new, genuine Samsung rubber door seal to restore an airtight lock. We adjust the door hinges perfectly to ensure the door closes securely, keeping your kitchen floor completely dry.',
    ],
    [
      'id' => 'heating',
      'title' => 'Dishwasher Not Heating Water',
      'code'  => 'HE or HC Error',
      'chip'  => 'HE',
      'problem' => 'Your dishes come out wet and greasy, and you notice the inside of the tub remains completely cold after a wash cycle. The HE error indicates a total failure of the internal water heating element. Hard water scale builds up around the heater over time, causing it to overheat and burn out. A faulty NTC thermistor temperature sensor can also tell the main board to keep the heater turned off.',
      'solution' => 'We test the heating element and the temperature sensor for proper electrical resistance. We remove the scaled heater and install a brand new heating element, ensuring your dishwasher reaches the high temperatures required to melt grease and sanitize your dishes.',
    ],
    [
      'id' => 'no-power',
      'title' => 'Machine Completely Dead',
      'code'  => 'No Power',
      'chip'  => 'No Power',
      'problem' => 'You press the power button, but the display stays totally blank and the machine makes absolutely no sound. This sudden loss of power happens due to a blown thermal fuse, a damaged power cable, or a short-circuited main PCB motherboard. A broken door latch switch also prevents power from flowing because the machine thinks the door is still open.',
      'solution' => 'We trace the electrical current from your wall plug to the main control board. We replace blown thermal fuses, fix faulty door micro-switches, or install a newly programmed Samsung motherboard to bring your dead dishwasher back to life.',
    ],
    [
      'id' => 'dispenser',
      'title' => 'Detergent Dispenser Not Opening',
      'code'  => '',
      'chip'  => 'Dispenser',
      'problem' => 'At the end of the wash, you find the detergent tablet sitting completely dry inside the closed dispenser door. This frustrating issue occurs when the electronic actuator that triggers the dispenser door burns out. Sometimes, the plastic latch mechanism simply jams due to sticky soap residue, or a tall plate blocks the door from springing open during the cycle.',
      'solution' => 'We safely dismantle the inner door panel to access the dispenser assembly. We clean the latch mechanism and test the electronic actuator. If the release mechanism is broken, we replace the entire dispenser unit so your soap releases exactly at the right moment.',
    ],
    [
      'id' => 'noise',
      'title' => 'Loud Grinding or Buzzing Noises',
      'code'  => '',
      'chip'  => 'Noise',
      'problem' => 'Your dishwasher sounds like an engine grinding gears while it washes your plates. This harsh noise usually happens when a hard object, like a fruit pit or a small piece of broken glass, slips past the filter and hits the spinning chopper blade inside the pump. A continuous loud buzzing sound indicates the main circulation pump bearings have worn out entirely.',
      'solution' => 'We access the pump housing and manually remove any foreign debris trapped inside the chopper blade area. If the bearings are destroyed, we replace the circulation pump on the spot, returning your kitchen to complete silence.',
    ],
    [
      'id' => 'not-drying',
      'title' => 'Dishes Not Drying Correctly',
      'code'  => '',
      'chip'  => 'Not drying',
      'problem' => 'You open the door after the drying cycle ends, but your plates and plastic containers are dripping wet. This drying failure happens when the internal vent fan motor breaks down, trapping humid air inside the tub. A faulty rinse aid dispenser also stops the water from sliding off your dishes, leaving them wet and covered in water spots.',
      'solution' => 'We test the electronic vent fan and the rinse aid dispenser mechanism. We replace faulty drying fans and ensure your rinse aid releases properly, giving you perfectly dry dishes ready for the cupboard.',
    ],
    [
      'id' => 'odor',
      'title' => 'Bad Odors Inside the Dishwasher Tub',
      'code'  => '',
      'chip'  => 'Odour',
      'problem' => 'Your kitchen smells like stagnant water and rotting food every time you open the dishwasher door. This hygiene problem occurs because small food particles get trapped inside the micro-filter and start to decay. A blocked drain hose that leaves dirty water sitting at the bottom of the tub also creates a perfect environment for foul-smelling bacteria and mold.',
      'solution' => 'We perform a deep mechanical cleaning of the entire filter system and the drainage path. We flush the drain hoses completely and run a high-temperature chemical service wash, leaving your dishwasher smelling perfectly fresh and clean.',
    ],
  ],

  'band_h2' => 'Dishwasher standing full of water? A specialist can be with you within the hour.',
  'band_p'  => 'Certified technicians, genuine Samsung parts, and a 90-day warranty on every repair.',
  'band_alt' => 'Call our Samsung dishwasher repair experts in the UAE',

  'process_h2' => 'Our Complete Working Process',
  'steps' => [
    ['Contact Us 24/7', 'Our friendly customer support team is available day or night to record your appliance issue and arrange immediate help.'],
    ['1 Hour Response', 'We aim to respond to emergency call-outs within an hour, dispatching a skilled specialist straight to your location.'],
    ['Diagnosis &amp; Approval', 'Our technician examines the dishwasher on site, explains the exact fault clearly, and provides an upfront price before starting any work.'],
    ['Problem Solved', 'We complete the approved repair, run a final test cycle to prove the machine works, and leave your kitchen completely clean and tidy.'],
  ],

  'inspect_h2' => 'Our Complete Inspection Services Includes In Samsung Dishwasher',
  'inspect_body' => 'We do not just replace a single broken part and leave your home. Our
    comprehensive inspection covers every critical component of your machine to prevent future
    breakdowns. We thoroughly check the water inlet valves for proper flow and test the drain pump
    for blockages. Our specialists inspect the main PCB control board for electrical faults and
    assess the circulation pump for wear and tear. We also carefully examine the door seals, spray
    arms, and internal filters to ensure smooth, quiet, and leak-free operation.',

  /* Every item is a component named in the paragraph above — the list is
     that paragraph made scannable, not extra claims. */
  'inspect_list' => [
    'Water inlet valves checked for proper flow',
    'Drain pump tested for blockages',
    'Main PCB control board inspected for electrical faults',
    'Circulation pump assessed for wear and tear',
    'Door seals examined',
    'Spray arms examined',
    'Internal filters examined',
  ],

  'support_h2' => 'Official Samsung Dishwasher Customer Support',
  'support_body' => 'A successful repair depends heavily on honest and accessible communication.
    Our dedicated customer support desk operates around the clock to provide instant assistance for
    any service inquiry or technical complaint. If you have a question about your recent repair or
    need emergency troubleshooting, you never have to wait for hours or chase different staff
    members. We maintain clear service records and take full accountability for our work, ensuring
    you always have a direct line to reliable and professional help.',

  'coverage_h2' => 'We Cover Every Area In UAE',
  'coverage_body' => 'A broken dishwasher does not wait for a convenient time, no matter where you
    live. Our dedicated repair team covers every major state, including Dubai, Abu Dhabi, Sharjah,
    Ajman, Ras Al Khaimah, Umm Al Quwain, and Fujairah. Our technicians have over a decade of local
    driving experience and know the fastest routes across the Emirates. This allows us to reach
    your doorstep swiftly and deliver emergency repair services exactly when you need them.',

  'why_h2' => 'Why Our Samsung Dishwasher Repair Team Matters In The UAE',
  'why_alt' => 'Our Samsung dishwasher repair team in the UAE',
  'why_body' => [
    'We are proud of our high standards and always endeavour to find ways to improve our
     relationship with our customers. Finding a reliable technician in the UAE can be a frustrating
     challenge, but our licensed Samsung team saves you from those constant headaches.',
    'We guarantee to offer the same level of expertise and respect to our customers&rsquo; friends
     and family that use any of our services. We are the one setting standards for doorstep, quick,
     and reliable solutions, making us the perfect Samsung appliances repairer for your home.',
  ],
];

require __DIR__ . '/../../inc/landing-page.php';
