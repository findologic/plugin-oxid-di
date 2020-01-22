<?php
/*
 RESOURCE IDENTIFIER = STRING
*/
require 'module_options.php';

$sLangName  = 'English';

$aLang = array(
    'charset' => 'UTF-8',
    'SHOP_MODULE_GROUP_shopkey' => 'FINDOLOGIC Shop key',
    'SHOP_MODULE_FindologicShopkey'   => 'Enter Shop Key provided from Findologic',
    'WRONG_KEY_MESSAGE' => 'Invalid Shopkey',
);

$aLang = array_merge($aLang, $options, $inputFields);