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
    'title' => 'FINDOLOGIC Search',
    'description' => [
        'de' => '<p><strong>FINDOLOGIC – weit mehr als nur eine Suche!</strong></p>
                 <p>
                    <strong>Die innovative Suchlösung für eine höhere Conversion-Rate in Ihrem Online-Shop!</strong>
                 </p>
                 <p>FINDOLOGIC ist die ultimative Suchlösung für Ihren Online-Shop! Lassen Sie Ihre Kunden blitzschnell
                 das finden, was sie suchen! Denn nur was Kunden finden, das kaufen sie auch. Mit FINDOLOGIC sind
                 Umsatzsteigerungen von weit über 25% belegt.</p>
                 <p>Wie hoch ist Ihre CR?! Mit uns sind Conversion-Rates bis 21% über die interne Suche nachweislich
                 möglich!</p>',
        'en' => '<p>
                    <strong>FINDOLOGIC – increase sales! – with a better search function in your online store!</strong>
                </p>
                 <p>FINDOLOGIC is the ultimate search solution for your online store! Allow your customers to find what
                 they are looking for at lightning speed! Since customers can only purchase what they are able to find.
                 With FINDOLOGIC your profits will increase well over 25% - guaranteed!</p>
                 <p>What’s your CR? With our technology conversion rates up to 21% in search are possible!</p>'

    ],
    'version' => '1.0.0',
    'author' => 'FINDOLOGIC GmbH',
    'url' => 'https://www.findologic.com',
    'email' => 'support@findologic.com',
    'copyright' => 'Copyright © ' . date('Y') . ', FINDOLOGIC GmbH',
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
