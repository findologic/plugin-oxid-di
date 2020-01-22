<?php
/*
 RESOURCE IDENTIFIER = STRING
*/
require 'module_options.php';

$sLangName  = 'Deutsch';

$aLang = array(
    'charset' => 'UTF-8',
    'SHOP_MODULE_GROUP_shopkey' => 'Shopkey',
    'SHOP_MODULE_FindologicShopkey'   => 'Geben Shop-Key von Findologic bereitgestellt',
    'WRONG_KEY_MESSAGE' => 'Ungueltiger Shopkey',
);

$aLang = array_merge($aLang, $options, $inputFields);