<?php
$page_title = 'Samsung Dishwasher Repair Dubai | Not Cleaning, Not Draining';
$page_desc  = 'Samsung dishwasher repair across Dubai. Dishes coming out dirty, standing water in the tub, leaks, or a door latch that will not hold — diagnosed at your home and quoted before work starts.';
$page_path  = '/services/samsung-dishwasher-repair/';

$svc = [
  'slug'  => 'samsung-dishwasher-repair',
  'short' => 'Dishwasher',
  'h1'    => 'Samsung dishwasher repair in Dubai',

  'intro' => [
    'Dishwasher complaints split cleanly into two groups. Either the machine has a mechanical or electrical fault, or it is working exactly as designed and something about the water, the loading or the detergent is defeating it. Telling those apart is most of the diagnosis, and it decides whether you need a repair at all.',
    'The second group is larger than people expect in Dubai, because water hardness here is high enough to change how a dishwasher performs over time.',
  ],

  'symptoms' => [
    ['Dishes come out gritty or still soiled.', 'Blocked spray arms, a clogged filter, or water not reaching the temperature the cycle expects.'],
    ['Standing water in the bottom after every cycle.', 'Drain filter, drain pump, or a hose that is kinked or fitted without the required loop.'],
    ['White chalky film on glassware.', 'Hard water and salt or rinse aid settings, not usually a fault in the machine.'],
    ['Machine will not start, or stops part way.', 'Door latch, water inlet, or the board losing a sensor input mid-cycle.'],
    ['Water on the kitchen floor.', 'Door seal, spray arm seal or a hose connection. Where it appears narrows it considerably.'],
    ['Detergent tablet still sitting in the dispenser.', 'The dispenser flap is blocked by the load, or the water is not hot enough to dissolve it.'],
  ],

  'checks' => [
    ['Filter and spray arms', 'The filter stack is removed and cleaned, and every spray arm hole is checked for flow. Scale and food debris block these gradually, so cleaning performance falls off slowly enough that nobody notices when it started.'],
    ['Water inlet and temperature', 'Fill volume and heating are verified. Detergent needs a particular temperature to dissolve and work, and a machine filling with too little water or failing to heat will leave residue no matter what is loaded into it.'],
    ['Drain path', 'Filter, sump, pump impeller and the drain hose including its high loop. A hose without that loop lets dirty water siphon back into the tub.'],
    ['Door latch and seal', 'The latch tells the machine it is safe to run, so a worn one stops the cycle before it starts. The seal is checked along its whole length, since leaks usually come from one deformed section.'],
    ['Heating and circulation', 'Heating element and circulation pump are tested. A circulation pump losing pressure produces exactly the "not cleaning properly" complaint that people assume is detergent.'],
    ['Water hardness and settings', 'Salt and rinse aid settings are checked against the local supply. Getting these right resolves a good share of cleaning complaints without any part being replaced.'],
  ],

  'notes_h2' => 'Hard water is doing more damage than you think',
  'notes' => [
    'Dishwashers are engineered around an assumed water hardness, and the softener built into the machine is adjustable precisely because that assumption does not hold everywhere. Left on a default setting with harder water, scale builds on the heating element, inside the spray arms and across the internal pipework.',
    'The consequences arrive in order. First the glassware picks up a chalky film that will not rinse off. Then spray arm holes narrow, so coverage across the load drops and the top rack stops coming out clean. Eventually the heating element scales enough to affect how fast the water heats, which changes how well the detergent works, which looks like a completely separate problem.',
    'The fix is usually not a repair. Setting the water softener correctly for the local supply, keeping the salt reservoir topped up on models that use it, and running a descaling cycle periodically will restore performance on a machine that has no mechanical fault at all. That is checked first for exactly this reason — it would be a poor trade to replace a circulation pump on a machine whose only problem was a softener setting.',
  ],

  'faqs' => [
    ['Do I need to rinse dishes before loading?', 'Scrape, do not rinse. Dishwasher detergent is formulated to act on food residue, and a completely pre-rinsed load gives it nothing to work on, which can leave a film. Large debris should still come off, because that is what blocks the filter.'],
    ['There is water left in the bottom after every cycle. Is that normal?', 'A small amount of water in the sump is normal and keeps the seals from drying out. Enough to cover the filter or reach the bottom rack is not, and that points at the drain path.'],
    ['Why do my glasses look cloudy?', 'Either hard water deposits or etching. Deposits wipe off with a little vinegar; etching does not, because it is permanent damage to the glass surface from over-dosed detergent and very hot water. Which one it is tells you what to change.'],
    ['The machine has an error code and will not run.', 'Note the code before cutting power. Codes generally identify the circuit that reported a problem — fill, drain, heating or leak detection — and that narrows the diagnosis before the technician arrives.'],
    ['Is a dishwasher repair worth it, or should I replace it?', 'Filters, spray arms, seals, latches and drain pumps are worth repairing on almost any machine. A failed main board or circulation pump on an older entry-level model is where the arithmetic changes, and you will get both figures to compare.'],
  ],
];

require __DIR__ . '/../../inc/service-page.php';
