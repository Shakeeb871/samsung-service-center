<?php
$page_title = 'Samsung Hood Repair Dubai | Weak Extraction, Motor Noise';
$page_desc  = 'Samsung cooker hood and extractor repair across the UAE. Weak smoke extraction, loud motor noise or dead control buttons — blower motors, ducting and filters checked on site.';
$page_path  = '/services/samsung-hood-repair/';

$svc = [
  'slug'  => 'samsung-hood-repair',
  'short' => 'Hood',
  'h1'    => 'Samsung hood repair',

  'intro' => [
    'Weak smoke extraction, harsh motor noise, or broken control buttons leave unpleasant odors and grease inside your kitchen. Our Samsung Hood service center inspects blower motors, duct connections, and filters. We clear airflow blockages and replace worn components to keep your kitchen air clean and fresh.',
    'Extraction faults are unusual in that the appliance often appears to be working. The motor runs, the lights come on, the buttons respond — and yet steam still hangs in the kitchen and a film of grease keeps returning to the cupboard doors. That is a hood moving far less air than it should, and the cause is almost never the motor.',
  ],

  'symptoms' => [
    ['Motor runs but steam still fills the kitchen.', 'Grease-loaded filters or a restricted duct. The fan is turning; the air is not moving.'],
    ['Loud or harsh motor noise.', 'Worn blower bearings, or an impeller carrying enough grease build-up to run out of balance.'],
    ['Control buttons dead or unresponsive.', 'The membrane or the board behind it, often after grease has worked its way past the panel.'],
    ['Lights out but extraction working.', 'Usually the lamp or its holder rather than anything in the extraction circuit.'],
    ['Grease dripping back down onto the hob.', 'Saturated filters that can no longer hold what they have collected.'],
    ['Hood switches itself off during cooking.', 'Thermal protection in the motor, which points at restricted airflow rather than a failing motor.'],
  ],

  'checks' => [
    ['Filters first', 'Grease filters are removed and assessed. A saturated filter is the single most common cause of poor extraction, and it is the cheapest thing in the appliance.'],
    ['Duct run and termination', 'The ducting is checked end to end, including where it terminates outside. A crushed section, an excessive run, or a closed external flap defeats any motor.'],
    ['Blower and impeller', 'Motor current, bearing condition and impeller balance are checked. Grease accumulation on the impeller blades changes both the noise and the airflow.'],
    ['Recirculation filters', 'On ducted-to-recirculate installations, the carbon filters are checked. These are consumables with a service life, and a spent one blocks rather than filters.'],
    ['Controls and lighting', 'Membrane, board and lamp circuits are tested separately, since a dead panel and a dead board look identical from the front.'],
    ['Installation itself', 'Mounting height above the hob and whether the hood is sized for the hob beneath it. A hood installed too high or undersized will underperform with nothing wrong inside it.'],
  ],

  'notes_h2' => 'Extraction is an airflow problem, not a motor problem',
  'notes' => [
    'A cooker hood is rated for a volume of air per hour, and that figure assumes a clean filter and a duct run close to what the manufacturer specifies. Real kitchens rarely provide either. Grease accumulates in the mesh filter until air has to be forced through it, and duct runs get extended, bent and squeezed around cabinetry during installation.',
    'Both effects are gradual, which is why nobody notices when performance started falling. The hood that cleared steam in its first year now leaves a haze, and the natural conclusion is that the motor is tiring. It usually is not. The motor is turning at the same speed against far more resistance, drawing more current and running hotter, which is what eventually trips the thermal protection and produces the "it switches itself off" complaint.',
    'Cleaning or replacing the grease filters on a regular schedule restores most of that lost performance and costs almost nothing. On recirculating installations the carbon filters matter just as much and are genuinely consumable — they cannot be cleaned and reused, and a spent one restricts airflow rather than filtering it.',
  ],

  'faqs' => [
    ['How often should the filters be cleaned?', 'Metal grease filters want washing roughly monthly with normal cooking, and more often if you fry frequently. Most are dishwasher safe. Carbon filters on recirculating hoods are replaced rather than cleaned, typically every few months.'],
    ['The hood is noisy. Does the motor need replacing?', 'Not necessarily. Grease on the impeller blades throws the fan out of balance and produces exactly the harsh noise people associate with a failing motor. Cleaning it is checked before anything is quoted.'],
    ['My hood extracts poorly even with clean filters.', 'Then the duct is the next thing. A crushed section behind the cabinetry, an over-long run, or an external flap that has stopped opening will all limit the hood regardless of what it is rated for.'],
    ['Can a recirculating hood be converted to ducted?', 'Sometimes, if there is a viable route to an outside wall. It is worth asking about, because ducted extraction outperforms recirculation by a wide margin and no filter change closes that gap.'],
    ['Are the lights replaceable separately?', 'Yes, and they are usually inexpensive. A hood with dead lights but working extraction rarely needs anything beyond the lamp or its holder.'],
  ],
];

require __DIR__ . '/../../inc/service-page.php';
