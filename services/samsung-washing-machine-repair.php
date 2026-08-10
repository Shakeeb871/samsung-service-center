<?php
$page_title = 'Samsung Washing Machine Repair Dubai | Not Draining, Not Spinning';
$page_desc  = 'Samsung washing machine repair across Dubai. Will not drain, will not spin, error codes, leaking water or a drum that does not turn — diagnosed at your home and quoted before work starts.';
$page_path  = '/services/samsung-washing-machine-repair/';

$svc = [
  'slug'  => 'samsung-washing-machine-repair',
  'short' => 'Washing Machine',
  'h1'    => 'Samsung washing machine repair in Dubai',

  'intro' => [
    'A washing machine that stops mid-cycle leaves you with a drum full of water and a door that will not open, which is why these calls tend to be urgent. The good news is that the most common causes are also the cheapest ones, and a fair number of them you can check yourself in ten minutes.',
    'Samsung front loaders and top loaders both display error codes when they stop, and those codes are genuinely useful. Write down what appears on the panel before switching the machine off — it points the diagnosis at a specific circuit instead of a general area.',
  ],

  'symptoms' => [
    ['Cycle stops with water still in the drum.', 'Almost always drainage: the pump filter, the pump itself, or a hose that has kinked or blocked.'],
    ['Drum fills but never spins.', 'Could be a motor or board fault, but an unbalanced load or a worn drum bearing produces the same result more often.'],
    ['Loud grinding or rumbling on spin.', 'Drum bearings on the way out, or something hard that has worked its way past the seal into the outer tub.'],
    ['Water on the floor after every wash.', 'Door seal, detergent drawer, or a split hose. Where the puddle appears narrows it quickly.'],
    ['Machine will not fill, or fills very slowly.', 'The inlet valve or its filter screen. On Dubai water supply those screens scale up faster than the manual assumes.'],
    ['Door stays locked after the cycle finishes.', 'The door interlock, or a machine that thinks there is still water inside because the pressure system is blocked.'],
  ],

  'checks' => [
    ['Error code and cycle behaviour', 'The code on the panel is read first, then the machine is run to see where in the cycle it actually stops. A machine that fails at the same point every time is telling you which stage of the circuit to look at.'],
    ['Drain path, end to end', 'Pump filter, pump impeller, drain hose and standpipe. This is where most "will not spin" faults actually live, because the machine refuses to spin while it still senses water.'],
    ['Water inlet and pressure system', 'Inlet valve, filter screens and the pressure sensor and its tube. A blocked pressure tube makes the machine misread its own water level, which produces symptoms all over the map.'],
    ['Motor and drive', 'Motor windings, drive belt where fitted, and the board output that feeds them. On direct-drive models the rotor and hall sensor are checked instead.'],
    ['Bearings and drum', 'Drum play is checked by hand. A bearing that has started to go gives a distinctive rumble under load, and catching it early is the difference between a bearing job and a new outer tub.'],
    ['Seals and hose runs', 'For leaks, the machine is run and watched rather than guessed at. Water travels along the base before it appears, so the visible puddle is rarely under the actual source.'],
  ],

  'notes_h2' => 'The two things worth checking before you call',
  'notes' => [
    'The drain pump filter is behind a small hatch at the bottom front of most front loaders. It is designed to be opened by the owner, and it collects coins, hairclips, buttons and lint until the pump can no longer move water. A blocked filter is the single most common cause of a machine that stops with water inside, and clearing it costs nothing. Put a shallow tray and a towel down first, because whatever is still in the drum comes out through that opening.',
    'The second is the drain hose. Check that it has not been pushed too far down the standpipe, that it is not kinked behind the machine, and that the standpipe itself is not blocked. A hose pushed too deep siphons water out during the wash and the machine keeps refilling to compensate.',
    'If the filter is clean and the hose is clear and the machine still will not drain, the pump itself or the board that drives it is the next thing, and that is a job for someone with a meter. Scale is a factor here too — hard water leaves deposits on heating elements and inside the pressure system, and both show up as faults that look electrical until you open them.',
  ],

  'faqs' => [
    ['The machine shows an error code. Does that tell you the fault?', 'It tells us which circuit reported a problem, not which component failed. A drainage code, for example, means the machine did not empty within its expected time — that could be the filter, the pump, the hose or the sensor that measures the level. It narrows six possibilities to three, which is worth having.'],
    ['Is a bearing replacement worth doing?', 'On a mid to high-end machine that is otherwise sound, usually yes. On an entry-level machine several years old, the labour involved often approaches the cost of replacing the machine, and you will be given both figures to compare rather than just the repair quote.'],
    ['My clothes come out soaking wet.', 'The machine is not reaching spin speed. Start with load balance — a single heavy item like a bath mat will defeat any machine — then look at the drain, because a machine holding water will not spin at all. If both are fine it is the motor, the board or the bearings.'],
    ['Can you repair top loaders as well as front loaders?', 'Yes. The mechanics differ — top loaders have a different drive and suspension arrangement — but the diagnostic approach is the same and parts for both are available.'],
    ['Do I need to move the machine out before you arrive?', 'Only if it is built in or wedged into a tight space. Clear access to the front and enough room to pull the machine forward is enough for most repairs.'],
  ],
];

require __DIR__ . '/../inc/service-page.php';
