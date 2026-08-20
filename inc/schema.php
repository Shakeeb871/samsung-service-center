<?php
/**
 * Structured data.
 *
 * One JSON-LD block per page, holding a @graph rather than a stack of
 * separate <script> tags. The graph lets each node carry an @id and refer
 * to the others by it, so the business is described once on the site and
 * every page points at that one description instead of repeating it. Six
 * copies of the same LocalBusiness with six sets of details is how the
 * details quietly stop matching.
 *
 * WHAT IS DELIBERATELY NOT HERE
 *
 * aggregateRating and review. The site has no collected reviews, and
 * rating markup without them is the single most common reason a site
 * picks up a manual action for spammy structured data. Stars in a search
 * result are worth having; they are not worth inventing. The moment there
 * are real reviews with real authors, they belong here.
 *
 * FAQPage. There are no FAQ sections on these pages. Marking up questions
 * that a visitor cannot see is an invalid-markup penalty waiting to
 * happen — the rule is that structured data describes what is on the
 * page, not what could be.
 *
 * priceRange. No prices are published, so there is nothing honest to put
 * in it.
 *
 * Everything below is a fact already printed on the page: the name, the
 * number, the two addresses, the hours, the emirates covered, the
 * services offered.
 */

/**
 * The whole graph for one page, as a ready <script> tag.
 *
 * @param string $type      WebPage, ContactPage, AboutPage or CollectionPage
 * @param string $canonical the page's canonical URL
 * @param string $title     the page title, as printed
 * @param string $desc      the meta description, as printed
 * @param array  $extra     further nodes to append — a Service, an ItemList
 */
function schema_tag(string $type, string $canonical, string $title, string $desc, array $extra = []): string
{
    $graph = array_merge(
        [schema_business(), schema_website(), schema_webpage($type, $canonical, $title, $desc)],
        $extra
    );

    $json = json_encode(
        ['@context' => 'https://schema.org', '@graph' => $graph],
        JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
    );

    /* No htmlspecialchars: this is a script body, not markup, and escaping
       it would put &amp; into the JSON. The one sequence that could close
       the tag early is </script, which cannot occur — every value comes
       from config or from copy run through text() below. Guarded anyway,
       because "cannot occur" has a way of expiring. */
    return '<script type="application/ld+json">'
         . str_ireplace('</script', '<\/script', $json)
         . '</script>';
}

/** Site identifiers, so nodes can point at each other rather than repeat. */
function schema_id(string $fragment): string
{
    return SITE_URL . '/#' . $fragment;
}

/**
 * Copy as a machine reads it.
 *
 * The site's copy carries HTML entities — &amp; in service titles,
 * &rsquo; in area names. Left alone they arrive in the JSON as literal
 * ampersand-a-m-p, and the business ends up named with punctuation nobody
 * typed.
 */
function schema_text(string $s): string
{
    return trim(html_entity_decode(strip_tags($s), ENT_QUOTES, 'UTF-8'));
}

/** Absolute URL for a file in the repo, with no cache-busting query. */
function schema_file_url(?string $path): ?string
{
    if ($path === null) {
        return null;
    }
    $enc = implode('/', array_map('rawurlencode', explode('/', ltrim($path, '/'))));
    return SITE_URL . '/' . $enc;
}

/**
 * The business itself. Described once; everything else refers to it.
 *
 * LocalBusiness rather than Organization, because the thing being
 * described is a service that comes to an address in a named set of
 * cities, which is what areaServed and openingHours are for.
 */
function schema_business(): array
{
    global $EMIRATES;

    $node = [
        '@type'       => 'LocalBusiness',
        '@id'         => schema_id('business'),
        'name'        => schema_text(BIZ_NAME),
        'description' => schema_text(BIZ_TAGLINE),
        'url'         => SITE_URL . '/',
        'telephone'   => BIZ_PHONE,
        'email'       => BIZ_EMAIL,

        'address' => [
            '@type'           => 'PostalAddress',
            'addressLocality' => 'Dubai',
            'addressRegion'   => 'Dubai',
            'addressCountry'  => 'AE',
        ],

        /* The seven emirates, as printed in the coverage section. Read
           from $EMIRATES so the markup cannot drift from the page. */
        'areaServed' => array_merge(
            array_map(
                function ($e) { return ['@type' => 'City', 'name' => schema_text($e)]; },
                $EMIRATES
            ),
            [['@type' => 'Country', 'name' => 'United Arab Emirates']]
        ),

        /* 24/7, which is what BIZ_HOURS says in words. Sunday through
           Saturday, midnight to midnight, is how that is expressed. */
        'openingHoursSpecification' => [[
            '@type'     => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            'opens'     => '00:00',
            'closes'    => '23:59',
        ]],

        /* Both mailboxes, each with the job it actually does. One
           contactPoint holding two addresses would not say which is
           which, and that distinction is the only reason there are two. */
        'contactPoint' => [
            [
                '@type'             => 'ContactPoint',
                'contactType'       => 'customer service',
                'telephone'         => BIZ_PHONE,
                'email'             => BIZ_EMAIL,
                'areaServed'        => 'AE',
                'availableLanguage' => ['English', 'Arabic', 'Hindi', 'Urdu'],
            ],
            [
                '@type'       => 'ContactPoint',
                'contactType' => 'technical support',
                'email'       => BIZ_EMAIL_SUPPORT,
                'areaServed'  => 'AE',
            ],
        ],

        /* Every service offered, from the same array the menu and the
           cards are built from. */
        'hasOfferCatalog' => [
            '@type'          => 'OfferCatalog',
            'name'           => 'Samsung appliance repair services',
            'itemListElement' => schema_service_offers(),
        ],

        /* What the business is expert in. Not a ranking switch — it is
           how a search engine works out which subject this site belongs
           to, and the list is the seven services so it cannot claim
           expertise in anything the site does not offer. */
        'knowsAbout' => schema_knows_about(),

        'slogan' => schema_text(BIZ_TAGLINE),
    ];

    /* --- Credentials -------------------------------------------------
       Everything below is published only when there is a real value in
       config. An empty foundingDate or a blank licence number is worse
       than no property: it is a claim with nothing behind it, and it is
       the kind of thing that gets a whole graph discounted. */

    if (BIZ_FOUNDED !== '') {
        $node['foundingDate'] = BIZ_FOUNDED;
    }

    if (BIZ_TECHNICIANS > 0) {
        /* minValue rather than value, because the page says "20+" and
           that is a floor, not a count. QuantitativeValue is what
           schema.org provides for saying exactly that. */
        $node['numberOfEmployees'] = [
            '@type'    => 'QuantitativeValue',
            'minValue' => (int) BIZ_TECHNICIANS,
            'unitText' => 'technicians',
        ];
    }

    /* A trade licence is a public record. That is the whole point of
       putting it here: an established business is one whose claim to be
       established can be looked up by somebody who doubts it. */
    if (BIZ_LICENCE !== '') {
        $node['identifier'] = [
            '@type'                => 'PropertyValue',
            'name'                 => 'UAE trade licence',
            'propertyID'           => 'tradeLicense',
            'value'                => BIZ_LICENCE,
        ] + (BIZ_LICENCE_AUTHORITY !== ''
            ? ['description' => 'Issued by ' . schema_text(BIZ_LICENCE_AUTHORITY)]
            : []);
    }

    if (BIZ_TRN !== '') {
        $node['vatID'] = BIZ_TRN;
    }

    /* The only honest support for a claim of being authorized: links to
       pages that say so and that this business does not control. */
    if ($GLOBALS['SOCIAL_PROFILES']) {
        $node['sameAs'] = array_values($GLOBALS['SOCIAL_PROFILES']);
    }

    if ($logo = schema_file_url(find_image('/assets/img', 'favicon-512', ['png']) ?: null)) {
        $node['logo'] = ['@type' => 'ImageObject', 'url' => $logo, 'width' => 512, 'height' => 512];
    }
    if ($img = social_image_plain()) {
        $node['image'] = $img;
    }

    return $node;
}

/**
 * og:image without the cache-busting query.
 *
 * social_image() stamps ?v= onto the URL, which is right for a browser
 * fetching it and wrong here — structured data should name the file's
 * canonical URL, not a version of it that changes with the timestamp.
 */
function social_image_plain(): ?string
{
    $found = find_image('/assets/img', 'og-image', ['jpg', 'jpeg', 'png'])
          ?? find_image('/assets/img', [ABOUT_IMAGE, HERO_IMAGE, 'about', 'hero']);

    return schema_file_url($found);
}

/**
 * The subjects the business is expert in.
 *
 * Built from $SERVICES rather than written out, so it can never claim
 * expertise in something the site does not offer — which is the only way
 * this property is worth anything.
 */
function schema_knows_about(): array
{
    global $SERVICES;

    $out = [];
    foreach ($SERVICES as $svc) {
        $out[] = schema_text($svc['title']);
    }
    $out[] = 'Samsung home appliance repair';
    $out[] = 'Genuine Samsung spare parts';

    return $out;
}

/** One Offer per service, for the catalogue above. */
function schema_service_offers(): array
{
    global $SERVICES;

    $out = [];
    foreach ($SERVICES as $slug => $svc) {
        $out[] = [
            '@type'       => 'Offer',
            'itemOffered' => [
                '@type' => 'Service',
                '@id'   => SITE_URL . '/services/' . $slug . '/#service',
                'name'  => schema_text($svc['title']),
                'url'   => SITE_URL . '/services/' . $slug . '/',
            ],
        ];
    }
    return $out;
}

/** The site as a whole. No SearchAction — there is no site search to name. */
function schema_website(): array
{
    return [
        '@type'      => 'WebSite',
        '@id'        => schema_id('website'),
        'url'        => SITE_URL . '/',
        'name'       => schema_text(BIZ_NAME),
        'publisher'  => ['@id' => schema_id('business')],
        'inLanguage' => 'en-AE',
    ];
}

/** This page. */
function schema_webpage(string $type, string $canonical, string $title, string $desc): array
{
    return [
        '@type'       => $type,
        '@id'         => $canonical . '#webpage',
        'url'         => $canonical,
        'name'        => schema_text($title),
        'description' => schema_text($desc),
        'isPartOf'    => ['@id' => schema_id('website')],
        'about'       => ['@id' => schema_id('business')],
        'inLanguage'  => 'en-AE',
    ];
}

/**
 * The Service node a single service page adds to its own graph.
 *
 * areaServed repeats here rather than referring to the business, because
 * a Service is the thing a search engine matches against "samsung fridge
 * repair dubai" and the place has to be on the node being matched.
 */
function schema_service(string $slug, array $svc, ?string $canonical = null): array
{
    global $EMIRATES;

    /* The service's own page is its canonical home wherever the node is
       printed. The hub describes all seven, but each @id still points at
       the page that service lives on, so the node the hub emits and the
       node that page emits are the same node rather than two rival
       descriptions of one service. */
    $canonical = $canonical ?? SITE_URL . '/services/' . $slug . '/';

    $node = [
        '@type'       => 'Service',
        '@id'         => $canonical . '#service',
        'name'        => schema_text($svc['title']),
        'description' => schema_text($svc['body']),
        'serviceType' => schema_text($svc['title']),
        'url'         => $canonical,
        'provider'    => ['@id' => schema_id('business')],
        'areaServed'  => array_map(
            function ($e) { return ['@type' => 'City', 'name' => schema_text($e)]; },
            $EMIRATES
        ),
        'mainEntityOfPage' => ['@id' => $canonical . '#webpage'],
    ];

    $names = array_values(array_filter([$svc['image'] ?? null, $slug]));
    $photo = find_image('/assets/img/services', $names) ?? find_image('/assets/img', $names);
    if ($photo !== null) {
        $node['image'] = schema_file_url($photo);
    }

    return $node;
}

/**
 * All seven services, described in full.
 *
 * For the pages that show every service rather than one: the hub and the
 * homepage both print the seven cards with the same titles, photographs
 * and copy, so a full Service node for each of them describes what is on
 * the page rather than adding anything to it.
 *
 * Each node keeps the @id of its own page. A graph is keyed on @id, so
 * the hub's copy of "Samsung Cooker Repair" and the cooker page's copy
 * are one thing seen twice, not two things that have to agree.
 */
function schema_all_services(): array
{
    global $SERVICES;

    $out = [];
    foreach ($SERVICES as $slug => $svc) {
        $out[] = schema_service($slug, $svc);
    }
    return $out;
}

/**
 * The list of services, in the order shown.
 *
 * @param string|null $id  the @id to publish it under. Two pages carry
 *                         this list — the hub and the homepage — and each
 *                         needs its own, or the second is a duplicate
 *                         declaration of the first.
 */
function schema_service_list(?string $id = null): array
{
    global $SERVICES;

    $items = [];
    $i = 0;
    foreach ($SERVICES as $slug => $svc) {
        $items[] = [
            '@type'    => 'ListItem',
            'position' => ++$i,
            'name'     => schema_text($svc['title']),
            'url'      => SITE_URL . '/services/' . $slug . '/',
        ];
    }

    return [
        '@type'           => 'ItemList',
        '@id'             => $id ?? SITE_URL . '/services/#list',
        'name'            => 'Samsung appliance repair services',
        'numberOfItems'   => count($items),
        'itemListElement' => $items,
    ];
}
