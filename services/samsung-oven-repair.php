<?php
$page_title = 'Samsung Oven & Microwave Repair Dubai | No Heat, Uneven Baking';
$page_desc  = 'Samsung oven, cooker and microwave repair in Dubai. No heat, uneven baking, a turntable that will not turn, or a control panel that ignores presses — diagnosed at your home and quoted first.';
$page_path  = '/services/samsung-oven-repair/';

$svc = [
  'slug'  => 'samsung-oven-repair',
  'short' => 'Oven & Microwave',
  'h1'    => 'Samsung oven and microwave repair in Dubai',

  'intro' => [
    'Ovens and microwaves are grouped here because they usually sit in the same kitchen and often fail for related reasons — a control board, a door switch, a thermostat. Internally they are very different machines, and one of them carries a risk the other does not.',
    'A microwave stores a serious electrical charge in its high voltage capacitor, and that charge remains after the appliance is unplugged. It is genuinely dangerous, which is why microwave repair is one of the few jobs where the advice is unambiguous: do not open the case.',
  ],

  'symptoms' => [
    ['Oven will not heat at all.', 'A failed element, thermostat or thermal cut-out, or a control board that has lost its relay.'],
    ['Food browns on one side only.', 'Fan oven circulation, a partially failed element, or a door seal letting heat escape past one edge.'],
    ['Oven runs far hotter or cooler than the setting.', 'The temperature sensor has drifted, or the thermostat is no longer calibrated.'],
    ['Microwave runs but does not heat food.', 'Magnetron, high voltage diode or capacitor — internal, and not a repair to attempt yourself.'],
    ['Microwave turntable will not turn.', 'The turntable motor or its coupling. Minor and inexpensive as microwave faults go.'],
    ['Touch panel ignores presses.', 'A failed membrane or the board behind it. Sometimes only one region of the panel is dead, which is a useful clue.'],
  ],

  'checks' => [
    ['Actual temperature versus setting', 'A separate probe measures what the cavity is really doing across a full cycle. Complaints about baking results are frequently a calibration drift rather than a failed component.'],
    ['Elements and thermostats', 'Each element is tested for continuity and each thermostat and cut-out checked in turn. A tripped cut-out is treated as a symptom, because something made it trip.'],
    ['Fan and circulation', 'On fan ovens the fan motor and its element are tested together. Uneven browning is usually air distribution, not heat output.'],
    ['Door seal and hinges', 'A door that no longer closes square leaks heat continuously, and the oven compensates by running longer. It looks like a thermostat fault and it is not.'],
    ['Control board and panel', 'Board outputs and the touch membrane are tested separately, because a dead panel and a dead board present identically from outside and have very different costs.'],
    ['Microwave high voltage section', 'Discharged and tested with the right equipment. Magnetron, diode, capacitor and door interlocks — including whether the interlocks still cut power reliably, which is a safety check as much as a diagnosis.'],
  ],

  'notes_h2' => 'Why a microwave is not a DIY repair',
  'notes' => [
    'The high voltage capacitor inside a microwave holds a charge capable of causing serious injury, and it holds it after the appliance is unplugged and after it has sat unused. There is no way to tell from outside whether it has discharged. Anyone servicing one has to discharge it deliberately, with the right tool, before touching anything inside the cabinet.',
    'The door interlock system deserves a mention for the same reason. It exists to guarantee that the magnetron cannot run with the door open, and it is checked on every microwave visit whether or not it is the reported fault. A microwave with a damaged door, a bent frame or a failing interlock should be taken out of service rather than used carefully.',
    'None of this makes the repair unusual — it makes it a job for someone equipped for it. The common microwave faults are ordinary: a turntable motor, a door switch, a control panel. Only the access is hazardous.',
  ],

  'faqs' => [
    ['My oven does not reach the temperature on the dial. Is that repairable?', 'Usually yes, and usually cheaply. Most cases are a drifted temperature sensor or an out-of-calibration thermostat, both routine replacements. The measurement comes first so the right one is changed.'],
    ['Is it worth repairing a microwave?', 'It depends on the part. A turntable motor, door switch or control panel is often worth doing. A failed magnetron on a low-cost countertop model rarely is, because the part and labour approach the price of a new one. A built-in unit is a different calculation, since replacement means fitting as well.'],
    ['One oven element works and the other does not.', 'That points at the element itself or the board output feeding it, rather than anything shared. It is a common fault and generally straightforward, though the exact element has to match the model.'],
    ['The oven door glass is cracked. Can it be replaced?', 'Yes, provided the panel is still available for that model. It is worth doing promptly — a cracked panel changes how heat is retained and the crack tends to spread with each heat cycle.'],
    ['Can you work on built-in ovens?', 'Yes. Built-in units need to be drawn out of the housing for access, so reasonable clearance in front of the unit is all that is required from your side.'],
  ],
];

require __DIR__ . '/../inc/service-page.php';
