<?php
/*
 RESOURCE IDENTIFIER = STRING
*/
require 'module_options.php';

$sLangName  = 'English';

$aLang = array(
    'charset' => 'UTF-8',
    'SHOP_MODULE_GROUP_shopkey' => 'Shop key',
    'SHOP_MODULE_FindologicShopkey'   => 'Shop key',
    'WRONG_KEY_MESSAGE' => 'Invalid shop key',
);

$aLang = array_merge($aLang, $options, $inputFields);
