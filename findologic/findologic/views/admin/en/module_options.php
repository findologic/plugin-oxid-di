<?php

$oxLang = oxNew('oxLang');
$languages = $oxLang->getLanguageArray();

$options = array();
$inputFields = array();
foreach ($languages as $language) {
    $options['SHOP_MODULE_LanguageList_'. $language->id] = $language->name;
    $inputFields['SHOP_MODULE_FindologicShopkey_'. $language->id]
        = "Shopkey for language '{$language->name}'";
}

$shopKeys = array();
foreach ($inputFields as $key => $val) {
    $shopKeys[] = array(
        'group' => 'shopkey',
        'name' => str_replace('SHOP_MODULE_', '', $key),
        'type' => 'str',
        'value' => ''
    );
}
