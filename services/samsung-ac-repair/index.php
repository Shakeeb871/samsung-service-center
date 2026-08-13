<?php
$page_title = 'Samsung AC Repair Dubai | Not Cooling, Gas Refill, Water Leaking';
$page_desc  = 'Samsung air conditioner repair and servicing across Dubai. Warm air, low gas, water dripping from the indoor unit, or a unit that trips the breaker — diagnosed on site and quoted first.';
$page_path  = '/services/samsung-ac-repair/';

$svc = [
  'slug'  => 'samsung-ac-repair',
  'short' => 'Air Conditioner',
  'h1'    => 'Samsung air conditioner repair in Dubai',

  'intro' => [
    'An air conditioner in Dubai runs harder and for more months of the year than the same unit would almost anywhere else. Components rated for a few thousand hours of seasonal use here accumulate that in a single summer, and dust loading on coils is heavier than most service intervals assume.',
    'That is worth knowing because it changes what usually fails. A unit that has lost cooling here is more often suffering from a fouled condenser, a blocked drain or an overworked capacitor than from anything exotic — and all three are inexpensive to put right if they are caught before the compressor pays for them.',
  ],

  'symptoms' => [
    ['Running, but the air is not cold.', 'Low refrigerant from a leak, a fouled condenser coil, or a compressor that is not starting under load.'],
    ['Water dripping from the indoor unit.', 'A blocked condensate drain. Common, cheap to clear, and capable of damaging a ceiling if it is left.'],
    ['Unit trips the breaker when it starts.', 'Usually the compressor start circuit or a capacitor, sometimes an insulation fault. Stop using it until it is checked.'],
    ['Cools for a while, then stops and restarts.', 'Short cycling — often a sensor reading wrong, a restricted airflow path, or refrigerant pressure out of range.'],
    ['Ice forming on the pipework.', 'Airflow restriction or low refrigerant. Running it in this state is what turns a small repair into a compressor.'],
    ['Loud rattle or hum from the outdoor unit.', 'Fan bearing, loose mounting, or a compressor struggling to start.'],
  ],

  'checks' => [
    ['Airflow first', 'Filters, evaporator coil and blower are checked before anything else. Restricted airflow imitates almost every other fault, and it is the cause often enough that testing pressures on a dirty coil just produces misleading numbers.'],
    ['Condensate drain', 'The drain pan and line are cleared and flow-tested. In this climate the combination of constant condensation and dust makes drain blockages routine rather than unusual.'],
    ['Electrical and start components', 'Capacitors, contactors and the compressor start circuit are measured under load. A capacitor that has drifted out of tolerance will start a compressor on a mild day and fail to start it on a hot one.'],
    ['Refrigerant pressures', 'Suction and discharge pressures are read against the ambient temperature. Low charge is a symptom, not a diagnosis — it means refrigerant left the system somewhere.'],
    ['Leak detection', 'If the charge is low, the leak is traced before any gas goes in. Joints, flare connections and coil returns are the usual places, and a recharge without this is a temporary purchase.'],
    ['Condenser and outdoor unit', 'Coil cleanliness, fan operation and clearance around the unit. A condenser packed with dust cannot reject heat, and every other symptom follows from that.'],
  ],

  'notes_h2' => 'Gas top-ups, and why the leak matters more',
  'notes' => [
    'A sealed refrigeration circuit does not consume refrigerant. If a system is low, it is because gas escaped, and putting more in without finding where it went means paying for the same job again on a predictable schedule — usually mid-summer, when you least want to be without it.',
    'There is a second reason to care. A system running low on charge returns less refrigerant to the compressor, and refrigerant is what carries the oil that lubricates it and the cool vapour that keeps it from overheating. Running an undercharged unit through a Dubai summer is one of the more reliable ways to destroy a compressor, which is the single most expensive component in the machine.',
    'So the sequence is: find the leak, repair it, evacuate the system properly, then recharge to the manufacturer\'s stated weight. If a leak turns out to be in a place that cannot be economically repaired — a corroded evaporator on an older unit, for example — you will be told that, along with what replacement would cost, instead of being sold a recharge that buys a few weeks.',
  ],

  'faqs' => [
    ['How often should an AC be serviced in Dubai?', 'More often than the manual suggests, because the manual is not written for this dust load or this run time. Filters want checking monthly during heavy use, and a full service including a condenser clean before the summer season starts will do more for reliability than anything else you can pay for.'],
    ['My AC cools at night but not in the afternoon.', 'That pattern points at a system with no margin left — commonly a dirty condenser, a weak capacitor, or a slightly low charge. It works while the heat load is small and falls behind when it is not. It is also the stage at which the repair is still cheap.'],
    ['Is water dripping inside serious?', 'The blockage itself is minor and quick to clear. What it damages while you wait is not — condensate finds ceilings, plasterboard and cabinets. It is worth dealing with in days rather than weeks.'],
    ['Do you work on split units and ducted systems?', 'Yes, both, plus window units. Ducted systems involve additional airflow diagnosis because the duct run itself can be the restriction, and that is checked as part of the visit.'],
    ['Can you tell over the phone whether it needs gas?', 'Not reliably, and anyone who says otherwise is guessing. Warm air has several possible causes and low refrigerant is only one of them. The pressures have to be read at the unit.'],
  ],
];

require __DIR__ . '/../../inc/service-page.php';
