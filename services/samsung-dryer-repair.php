<?php
$page_title = 'Samsung Dryer Repair Dubai | No Heat, Clothes Still Damp';
$page_desc  = 'Samsung tumble dryer and heat pump dryer repair in Dubai. No heat, long cycles, clothes damp at the end, or a drum that will not turn — diagnosed at your home before anything is quoted.';
$page_path  = '/services/samsung-dryer-repair/';

$svc = [
  'slug'  => 'samsung-dryer-repair',
  'short' => 'Dryer',
  'h1'    => 'Samsung dryer repair in Dubai',

  'intro' => [
    'Dryer faults are unusual in one respect: the part that fails is frequently not the part that caused the problem. A thermal cut-out that has tripped, for instance, is a protective device doing its job — it opened because something restricted the airflow, and replacing it without clearing that restriction means it will open again.',
    'That is why a dryer repair that only swaps the failed component tends not to last. The check below works backwards from the symptom to whatever made it happen.',
  ],

  'symptoms' => [
    ['Drum turns but there is no heat.', 'A tripped thermal cut-out, a failed element or, on heat pump models, a refrigeration circuit fault.'],
    ['Clothes still damp after a full cycle.', 'Usually restricted airflow: lint filter, condenser filter or a blocked exhaust path.'],
    ['Cycle runs far longer than it used to.', 'The moisture sensor is not seeing the load dry, so the machine keeps extending. Airflow again, or scaled sensor bars.'],
    ['Drum will not turn at all.', 'A snapped belt, a seized idler pulley, or a motor that has failed.'],
    ['Burning or hot smell during the cycle.', 'Stop using it. Lint accumulation near a heat source is a fire risk and needs looking at, not monitoring.'],
    ['Water in the condenser tank not filling.', 'On a condenser dryer that means moisture is not being extracted, which points back at heat or airflow.'],
  ],

  'checks' => [
    ['Airflow path, completely', 'Lint filter, secondary filter, condenser unit and the whole exhaust run. Nearly every heat and drying-time complaint traces back to somewhere along this path being restricted.'],
    ['Heating circuit', 'Element continuity, thermostats and thermal cut-outs are tested individually. A tripped cut-out is recorded as evidence of a restriction, not just replaced and forgotten.'],
    ['Moisture sensor', 'The sensor bars inside the drum are checked and cleaned. A film of fabric softener across them insulates the sensor, so the machine reads wet clothes as dry or dry clothes as wet.'],
    ['Belt, pulley and motor', 'Drum rotation, belt condition and idler pulley free play. A pulley that has begun to seize loads the motor long before the belt actually breaks.'],
    ['Heat pump circuit', 'On heat pump models the evaporator is inspected for lint blinding and the refrigeration circuit is checked. These dry at lower temperatures, so a small loss of performance shows up as a much longer cycle.'],
    ['Vent and installation', 'Where the machine vents, how long the duct run is and whether it has been crushed behind the appliance. A dryer installed into a restricted duct will never perform, regardless of what is replaced inside it.'],
  ],

  'notes_h2' => 'Lint is the cause behind most dryer faults',
  'notes' => [
    'A dryer works by moving heated air through wet fabric and carrying the moisture away. Everything about its performance depends on that air being able to move freely, and lint is what stops it. It accumulates in the obvious filter, and then in the places nobody looks — the housing behind the filter, the condenser fins, the ducting.',
    'When that airflow drops, the machine does not stop. It runs hotter, because the same heat is going into less moving air, and it runs longer, because less moisture is being carried out per minute. Eventually a thermal cut-out opens to prevent the temperature climbing further, and the machine stops heating altogether. From the outside that reads as "the heater failed", which is why the wrong part gets replaced so often.',
    'Clearing the lint filter after every load is the single most effective maintenance on any dryer, and the condenser filter on condenser and heat pump models needs rinsing far more often than most owners realise. There is also a safety dimension: accumulated lint sitting close to a heat source is a genuine fire risk, and a burning smell from a dryer is a reason to stop using it rather than to finish the load.',
  ],

  'faqs' => [
    ['My dryer heats but clothes are still damp. Is the heater fine?', 'Probably, yes. Heat without drying almost always means the moist air is not being carried away — a blocked condenser, a restricted vent, or an overloaded drum. Adding heat to that will not help; moving air will.'],
    ['Are heat pump dryers more expensive to repair?', 'They have more in them, so some repairs cost more. But their common faults are the same airflow and sensor issues as any other dryer, and those are no more expensive to put right. The refrigeration circuit itself rarely fails first.'],
    ['How full should I load it?', 'Under about three quarters. A packed drum stops the load tumbling, and clothes that do not tumble do not present new surface to the airflow. Overloading is the most common reason a perfectly healthy dryer appears to have lost performance.'],
    ['The drum makes a squealing noise.', 'Usually the idler pulley or a drum support roller. Worth attending to early — a pulley that seizes will shred the belt, which turns a small part into a bigger dismantling job.'],
    ['Can a vented dryer be converted to a condenser?', 'No. They are different machines internally. What can sometimes be improved is the vent installation itself, and if a bad duct run is the real problem that is the cheaper fix by a wide margin.'],
  ],
];

require __DIR__ . '/../inc/service-page.php';
