<?php
/**
 * The questions the homepage answers.
 *
 * Kept here rather than written into index.php because two things read
 * them: the accordion on the page and the FAQPage markup in the graph. A
 * question edited in one place and not the other is a page whose markup
 * describes something the visitor cannot see, which is the one thing
 * structured data is not allowed to do.
 *
 * Each entry: [question, answer]. The copy is printed as given.
 */

$FAQS = [
  [
    'What Does 4C Mean on a Samsung Washing Machine?',
    'The 4C error code on a Samsung washing machine means the washer is not receiving '
  . 'enough water within the required time. It is usually caused by a closed or restricted '
  . 'water tap, kinked supply hose, clogged mesh filter, blocked detergent drawer, low water '
  . 'pressure, or a faulty water inlet valve. Check the water supply, hoses, and filters '
  . 'first; if the 4C code remains, the inlet valve or another internal component may need '
  . 'inspection.',
  ],
  [
    'What Is Your Payment Method?',
    'We offer credit card and bank transfer as payment options for Samsung appliance repair '
  . 'services. You can choose whichever method is more convenient for you, making it easy to '
  . 'complete your payment using the option that best suits your preference.',
  ],
  [
    'How Quickly Can Your Team Repair My Samsung Appliances?',
    'Most Samsung appliance repairs can be completed within 24&ndash;48 hours, depending on '
  . 'the type of fault and the availability of the required parts. Straightforward issues may '
  . 'be resolved on the same day, while more complex repairs can take longer if a specific '
  . 'replacement part is needed. After diagnosing the appliance, our technician will explain '
  . 'the problem and provide a clear estimate of the expected repair time.',
  ],
  [
    'Do You Provide a Warranty on Samsung Appliance Repairs?',
    'Yes, we provide a 90-day warranty on Samsung appliance repairs, covering eligible parts '
  . 'and labor. If the same repaired issue occurs again during the warranty period, our team '
  . 'will assess it and provide the necessary service according to the warranty terms. We '
  . 'explain the applicable coverage before completing the repair, so you know exactly what '
  . 'is included.',
  ],
  [
    'Are Your Technicians Certified to Repair Samsung Appliances?',
    'Yes, our technicians are trained and experienced in Samsung appliance repair and '
  . 'understand the systems used across different Samsung models. They have hands-on '
  . 'experience diagnosing and repairing appliances such as washing machines, refrigerators, '
  . 'dryers, dishwashers, ovens, and other Samsung home appliances. Each repair begins with '
  . 'proper fault diagnosis to ensure the right solution is applied.',
  ],
  [
    'Do You Use Genuine Samsung Parts for Repairs?',
    'Yes, we use genuine Samsung replacement parts whenever a component needs to be replaced. '
  . 'The correct part is selected according to your appliance model and the specific fault, '
  . 'helping maintain proper performance, compatibility, and long-term reliability. We also '
  . 'explain the required replacement before carrying out the repair.',
  ],
];
