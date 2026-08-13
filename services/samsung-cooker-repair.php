<?php
$page_title = 'Samsung Cooker Repair | Burners, Oven Heating, Controls';
$page_desc  = 'Samsung cooker and oven repair across the UAE. Burners that will not ignite, uneven oven heating, or broken temperature controls tested and repaired on site.';
$page_path  = '/services/samsung-cooker-repair/';

$svc = [
  'slug'  => 'samsung-cooker-repair',
  'short' => 'Cooker',
  'h1'    => 'Samsung cooker repair',

  'intro' => [
    'Burners that refuse to ignite, uneven oven heating, or broken temperature controls make daily meal preparation unsafe and difficult. Our Samsung Cooker service center tests ignition modules, thermostats, and heating elements. We resolve electrical and gas faults on the spot so you can cook with complete confidence.',
    'A cooker fault is not something to work around. A burner that lights late, a hob that clicks without igniting, or an oven running well above its setting are all faults that get worse rather than settling down, and gas appliances in particular are not appliances to keep using while you wait.',
  ],

  'symptoms' => [
    ['Burner clicks but will not light.', 'Ignition module, a fouled electrode, or a burner cap seated slightly out of position.'],
    ['Oven will not heat at all.', 'A failed element, thermostat or thermal cut-out, or a control board that has lost its relay.'],
    ['Food browns on one side only.', 'Fan circulation, a partially failed element, or a door seal letting heat escape past one edge.'],
    ['Oven runs far hotter or cooler than the setting.', 'The temperature sensor has drifted, or the thermostat is no longer calibrated.'],
    ['Gas smell around the appliance.', 'Stop using it, shut off the supply and call immediately. This is not a fault to keep an eye on.'],
    ['Control panel ignores presses.', 'A failed membrane or the board behind it. Sometimes only one region of the panel is dead, which is a useful clue.'],
  ],

  'checks' => [
    ['Ignition and gas supply', 'Electrodes, ignition module and burner seating are checked, along with supply pressure. Most no-ignition calls are the electrode or the cap, not the valve.'],
    ['Actual temperature versus setting', 'A separate probe measures what the cavity is really doing across a full cycle. Baking complaints are frequently calibration drift rather than a failed component.'],
    ['Elements and thermostats', 'Each element is tested for continuity and each thermostat and cut-out checked in turn. A tripped cut-out is treated as a symptom, because something made it trip.'],
    ['Fan and circulation', 'On fan ovens the fan motor and its element are tested together. Uneven browning is usually air distribution, not heat output.'],
    ['Door seal and hinges', 'A door that no longer closes square leaks heat continuously, and the oven compensates by running longer. It looks like a thermostat fault and it is not.'],
    ['Control board and panel', 'Board outputs and the touch membrane are tested separately, because a dead panel and a dead board present identically from outside and cost very differently.'],
  ],

  'notes_h2' => 'Why the temperature is measured before anything is replaced',
  'notes' => [
    'A large share of oven complaints arrive as "it is not cooking properly", and that description covers several completely different faults. An oven that reaches temperature slowly, an oven that overshoots, an oven that holds temperature but browns unevenly, and an oven that has simply drifted out of calibration all produce disappointing food and none of them share a repair.',
    'Measuring the cavity across a full heat cycle separates them in one visit. A unit that climbs to the right temperature and holds it steadily has a circulation or door problem. One that overshoots and undershoots has a sensor or thermostat problem. One that never arrives has a heating problem. Guessing between these is how the wrong part gets fitted and the complaint survives the repair.',
    'The same applies on the hob. A burner that ignites reliably on high but not on low is telling you something different from one that will not ignite at all, and the difference decides whether the electrode, the module or the valve is the thing to look at.',
  ],

  'faqs' => [
    ['My oven does not reach the temperature on the dial. Is that repairable?', 'Usually yes, and usually cheaply. Most cases are a drifted temperature sensor or an out-of-calibration thermostat, both routine replacements. The measurement comes first so the right one is changed.'],
    ['One oven element works and the other does not.', 'That points at the element itself or the board output feeding it, rather than anything shared. It is a common fault and generally straightforward, though the exact element has to match the model.'],
    ['The hob clicks constantly even when it is off.', 'Usually moisture or spillage around the ignition switch keeping the circuit live. It is a common fault, it is repairable, and it is worth dealing with promptly rather than living with.'],
    ['The oven door glass is cracked. Can it be replaced?', 'Yes, provided the panel is still available for that model. It is worth doing promptly — a cracked panel changes how heat is retained and the crack tends to spread with each heat cycle.'],
    ['Can you work on built-in cookers and ovens?', 'Yes. Built-in units need to be drawn out of the housing for access, so reasonable clearance in front of the unit is all that is required from your side.'],
  ],
];

require __DIR__ . '/../inc/service-page.php';
