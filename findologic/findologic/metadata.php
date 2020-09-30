<?php

/**
 * Metadata version of this file/plugin
 * Using 1.2 to be compatible with OXID Version >= 4.9
 * @link https://docs.oxid-esales.com/developer/en/6.0/modules/skeleton/metadataphp/index.html
 */
$sMetadataVersion = '1.2';

/**
 * Module information
 */

require 'views/admin/en/module_options.php';

$aModule = [
    'id' => 'findologic_module',
    'title' => 'Findologic - Search & Navigation Platform',
    'description' => [
        'de' => '<p>Findologic entwickelt seit 2008 moderne Software-Lösungen für Online-Shops und gehört weltweit zu den führenden Anbietern in diesem Bereich.</p>
                 <p>Was für den stationären Kunden der kompetente Fachverkäufer – ist für den Online-Shopper die digitale Shopping Assistenz. Genau hierauf zielen unsere einzigartigen Ansätze ab. Am Puls der Zeit gehen wir gemeinsam mit unseren Technologiepartnern, Agenturen, Shopsystemen & Kunden, in unvergleichlicher Effizienz, neue Wege. Wir durchdenken Prozesse und Lösungen radikal neu, sodass es kaum individuellen Aufwand und Einstellungsmöglichkeiten bedarf. Unsere Plattform und Produkte passen sich im Grunde automatisch dem Online-Shop an, was Wartung und Support vehement verringert und gleichermaßen Flexibilität, Einsatzfähigkeit und Kundennähe signifikant erhöht.</p>
                 <p>Das verschafft uns eine rasante und kosteneffiziente Weiterentwicklung, was auch Kunden in Qualität und Preis zu Gute kommt. Die intelligenten Technologien von Findologic sorgen im Rahmen einer ganzheitlichen Customer Journey und den wichtigsten Hebeln für zufriedenere Kunden in Online-Shops und verbessern die User Experience.</p>
                 <p>Wir unterscheiden uns durch zwei maßgebliche Faktoren von anderer Software: Disruptive Ansätze und Service First Ausrichtung.</p>
                 <h2>Features</h2>
                 <ul>
                    <li><b>Suche:</b> Die Suchfunktion entspricht dem wichtigsten Verkaufstool in Ihrem Online-Shop. Über 12 Jahre Wissen sind in über 1.000 verschiedene Szenarien in einer Wissensdatenbank eingeflossen, welche das algorithmische Verhalten der Suche für jeden User und Webshop optimal steuert.</li>
                    <li><b>Navigation:</b> Ihren Usern werden global über Ihren Online-Shop zu jedem Zeitpunkt der Customer Journey die relevantesten Produkte angezeigt.</li>
                    <li><b>Personalisierung:</b> Mit Personalisierung haben Sie ab sofort für jede Zielgruppe einen eigens optimierten Online-Shop. Mit der personalisierten Suche und Navigation ermöglichen wir es Ihnen, jeden einzelnen Ihrer User individuell und gezielt anzusprechen.</li>
                    <li><b>User Interface:</b> Eine Einbindung direkt in Ihr Frontend, revolutioniert Ihre Kundeninteraktionen. Garantiert.</li>
                    <li><b>Merchandising:</b> Das revolutionäre Backend mit unseren speziell entwickelten Tools zur effizienten Marketing Steuerung. Mit unserern Rankingmöglichkeiten lassen sich Ihre Produkte nach Kriterien wie Verfügbarkeit, Marge oder Neuheiten nach Ihren Wünschen pushen.</li>
                </ul>',
        'en' => '<p>Findologic has been developing modern software solutions for online shops since 2008 and is one of the world’s leading providers today.</p>
                <p>Just as a helpful sales assistant completes the shopping experience for the in-store customer – so the digital shopping assistant supports and serves the online shopper. This is exactly where our unique approach helps ecommerce businesses. We keep our finger on the pulse with our technology partners, agencies, shop systems and customers - with unparalleled results. We radically rethink processes and solutions, so that set up is simple and effortless. Our platform and products automatically adapt to the online shop, which drastically reduces maintenance and support, and at the same time significantly increases flexibility, usability and customer proximity.</p>
                <p>This also benefits customers in terms of quality and price. As part of a holistic customer journey intelligent technologies from Findologic greatly improve the user experience, leading to satisfied customers.</p>
                <p>We differ from other software in two key ways: Our disruptive approaches and our service first orientation.</p>
                <h2>Features</h2>
                <ul>
                    <li><b>Search:</b> When it comes to generating sales, the search function is the most important tool in your online shop. Our ‘Smart Suggest’ feature is an intelligent dropdown option which provides users with the fastest, most relevant, most efficient results possible. It dynamically updates search results in real-time, as a user types. Slick and space-saving, this feature makes life easy for customers, even those on mobile devices.</li>
                    <li><b>Navigation:</b> As users navigate your website they will always see the products most relevant to them.</li>
                    <li><b>Personalisation:</b> Treat each of your customers personally by tailoring the shopping experience to them.</li>
                    <li><b>User Interface:</b> With the Findologic User Interface integrated directly into your frontend, we can revolutionise your customer interactions. Guaranteed.</li>
                    <li><b>Merchandising:</b> Findologic’s revolutionary backend controls and optimises onsite merchandising. This ensures the best possible search experience for your customers, leading to higher conversion rates.</li>
                </ul>'
    ],
    'version' => '1.0.0',
    'author' => 'FINDOLOGIC GmbH',
    'url' => 'https://www.findologic.com',
    'email' => 'support@findologic.com',
    'thumbnail' => 'plugin.png',
    'extend' => [
        // Controllers
        'module_config' => 'findologic/findologic/Controller/ExtendedModuleConfig'
    ],
    'events' => [
        'onActivate'   => 'InstallationController::onActivate',
        'onDeactivate'   => 'InstallationController::onDeactivate'
    ],
    'lang' => 'de',
    'files' => [
        'Findologic' => 'findologic/findologic/Controller/Findologic.php',
        'InstallationController' => 'findologic/findologic/Controller/InstallationController.php',
        'XmlExample' => 'findologic/findologic/Example/XmlExample.php',
        'ExampleBaseItem' => 'findologic/findologic/Example/ExampleBaseItem.php',
        'ExampleContentItem' => 'findologic/findologic/Example/ExampleContentItem.php',
        'ExampleProductItem' => 'findologic/findologic/Example/ExampleProductItem.php'
    ],
    'blocks' => [
        [
            'template' => 'layout/base.tpl',
            'block'=>'base_style',
            'file'=>'/views/blocks/layout/base_style.tpl'
        ],
        [
            'template' => 'module_config.tpl',
            'block'=>'admin_module_config_group',
            'file'=>'/views/blocks/tpl/module_config.tpl'
        ]
    ],
    'settings' => $shopKeys
];
