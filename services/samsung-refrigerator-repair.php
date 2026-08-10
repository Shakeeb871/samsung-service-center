<?php
$page_title = 'Samsung Refrigerator Repair Dubai | Not Cooling, Leaking, Icing Up';
$page_desc  = 'Samsung fridge and freezer repair across Dubai. Not cooling, freezing food, water pooling underneath, or a compressor that never stops — diagnosed at your home before anything is quoted.';
$page_path  = '/services/samsung-refrigerator-repair/';

$svc = [
  'slug'  => 'samsung-refrigerator-repair',
  'short' => 'Refrigerator',
  'h1'    => 'Samsung refrigerator repair in Dubai',

  'intro' => [
    'A refrigerator is the one appliance in the house that cannot wait. When it stops holding temperature you have hours, not days, before the contents are a loss — and in a Dubai summer the margin is shorter still.',
    'Most Samsung refrigerator faults fall into a small number of patterns, and most of them are repairable at your home in one visit. The exception is a sealed-system refrigerant leak, which is a different order of job and, on an older unit, often not worth doing. Either way you get told which one you are looking at before any money is spent on parts.',
  ],

  'symptoms' => [
    ['Fridge section warm, freezer still cold.', 'Classic sign of a defrost fault. Ice builds over the evaporator until air can no longer pass through it to the fridge compartment.'],
    ['Compressor runs constantly and never cycles off.', 'Either it is losing cold as fast as it makes it, or the thermostat and sensor are reading wrong.'],
    ['Food freezing on the top shelf.', 'Usually a damper or sensor problem letting too much cold air through, not a setting that needs changing.'],
    ['Water pooling under the salad drawer.', 'The defrost drain is blocked, so meltwater backs up inside instead of running to the tray at the back.'],
    ['Loud humming or a rattle from the back.', 'A condenser fan with a worn bearing, or a compressor mount that has come loose.'],
    ['Display flashing a code, nothing cooling.', 'Note the code before you unplug it. It narrows the fault to a specific sensor or board circuit and saves diagnosis time.'],
  ],

  'checks' => [
    ['Temperature and airflow', 'Actual compartment temperatures are measured rather than trusted to the display, and the evaporator is inspected for ice. A blocked evaporator explains most "fridge warm, freezer cold" calls before anything is dismantled.'],
    ['Defrost circuit', 'The heater, the bi-metal thermostat and the defrost sensor are tested individually. These are inexpensive parts, and one of them is the answer often enough that they are checked before the costly components.'],
    ['Fans and sensors', 'Evaporator and condenser fan motors are checked for actual rotation and current draw, and each thermistor is measured against its resistance curve. A drifting sensor produces the same symptom as a much more serious fault.'],
    ['Compressor and start circuit', 'On inverter models the drive board and compressor windings are tested. A compressor that hums and trips is often a failed start component rather than a dead motor.'],
    ['Sealed system', 'Only when everything upstream is clear. Low refrigerant means a leak, and a leak has to be found and repaired — topping it up without that is money spent to buy a few weeks.'],
    ['Door seals and load', 'The unglamorous causes. A seal that no longer grips, or a unit pushed tight against a wall with no clearance to shed heat, will defeat a perfectly healthy cooling system.'],
  ],

  'notes_h2' => 'Why refrigerators struggle more here',
  'notes' => [
    'Refrigerators are rated to work within an ambient temperature range, and a kitchen in Dubai in August can sit at the top of it or past it. The condenser sheds heat by comparison with the air around it, so the hotter that air is, the longer the compressor has to run to reach the same internal temperature. A unit that copes in winter can fail to keep up in summer without anything having actually broken.',
    'That makes two things worth doing before you call anyone. Check the clearance behind and above the unit — the manufacturer specifies a gap for a reason, and pushing the fridge back against the wall removes it. And look at the condenser coil at the back or underneath: a layer of dust acts as insulation on the one surface whose entire job is to get rid of heat.',
    'Neither of those is a repair, and if one of them fixes your problem you have saved a call-out. If the unit is still not holding temperature with clear airflow and a clean coil, the fault is inside and worth looking at properly.',
  ],

  'faqs' => [
    ['My fridge is cold but the freezer is not. Is that the same fault?', 'It is usually a different one. Cold in the fridge with a warm freezer points at the sealed system or the compressor, because the freezer is the first thing the cooling circuit serves. The reverse — cold freezer, warm fridge — is the defrost and airflow fault described above, and it is the cheaper of the two.'],
    ['Is it worth repairing a refrigerator that is eight years old?', 'It depends entirely on what failed. A defrost heater, a sensor or a fan motor is worth replacing on almost any working unit. A compressor or a sealed-system leak on an eight-year-old refrigerator often is not, and you will be told that rather than sold the repair.'],
    ['Can you top up the gas?', 'A refrigerator is a sealed system. Unlike an air conditioner it is not designed to lose refrigerant, so if it is low there is a leak. The leak has to be found and repaired before recharging, otherwise you are paying to have the same fault again in a month.'],
    ['How long does the repair take?', 'Most defrost, fan and sensor repairs are finished in the same visit. A sealed-system repair takes longer because the system has to be evacuated and recharged properly, and rushing that stage is what causes the repeat failure.'],
    ['Should the fridge be emptied before you come?', 'No need to empty it in advance. If the repair turns out to need the unit moved or powered down for a while, the technician will tell you at that point and you can shift the contents then.'],
  ],
];

require __DIR__ . '/../inc/service-page.php';
