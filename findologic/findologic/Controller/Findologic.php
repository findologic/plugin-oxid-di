<?php

use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;

class Findologic extends oxUBase
{
    /**
     * @var string
     */
    private $shopKey;

    /**
     * @var int
     */
    private $storeId;

    /**
     * @var int
     */
    private $count;

    /**
     * @var int
     */
    private $start;

    /**
     * @var int
     */
    private $total;

    /**
     * @var int
     */
    private $languageId;

    public function init()
    {
        $this->shopKey = oxRegistry::getConfig()->getRequestParameter('shopkey');
        $this->start = oxRegistry::getConfig()->getRequestParameter('start');
        $this->count = oxRegistry::getConfig()->getRequestParameter('count');

        $configShopKey = $this->checkShopKey($this->shopKey);

        $this->storeId = $this->getStore($this->shopKey, $configShopKey);
        $this->validateInput();

        include_once __DIR__ . '/../../../findologic-export/findologic-export/FindologicExport.php';
        if (!class_exists(FindologicExport::class)) {
            echo 'The Findologic - Export plugin is not installed! You can download it here: https://docs.findologic.com/lib/exe/fetch.php?media=integration_documentation:plugins:oxid_4_6_export_plugin.zip';
            return;
        }
        $export = new FindologicExport();
        $xml = $export->startExport($this->shopkey, $this->start, $this->count);

        if (oxRegistry::getConfig()->getRequestParameter('validate', false)) {
            $this->validateXml($xml);
        }

        header('Content-Type: application/xml; charset=utf-8');
        echo $xml;
        die;
    }

    /**
     * Validates whether all input parameters are supplied and valid.
     */
    private function validateInput()
    {
        $message = '';
        if (!$this->shopKey) {
            $message = 'Parameter "shopkey" is missing!<br>';
        }

        if (!$this->storeId) {
            $message .= 'Parameter "shopkey" is not configured for any store!<br>';
        }

        if ($this->start === false || $this->start < 0) {
            $message .= 'Parameter "start" is missing or less than 0!<br>';
        }

        if (!$this->count || $this->count < 1) {
            $message .= 'Parameter "count" is missing or less than 1!<br>';
        }

        if (!is_numeric($this->start) || !is_numeric($this->count)) {
            $message .= 'Parameters must be numeric values.<br> Please provide start and count values in precise format<br>';
        }

        if (strpos($this->start, '.') || strpos($this->count, '.')) {
            $message .= 'Parameters must be integer values.<br> Please provide start and count values in precise format<br>';
        }

        if ($message) {
            die($message);
        }
    }

    /**
     * Check if there is such shopKey, grab shopId registered with this shop
     *
     * @param string $reqShopKey
     * @param string $configShopKey
     *
     * @return int
     * @throws DatabaseConnectionException
     */
    private function getStore($reqShopKey, $configShopKey)
    {
        if ($reqShopKey != $configShopKey) {
            echo 'There is no shop attached to this key';
            die;
        }

        $storeId = oxDb::getDb()->getOne('SELECT OXID FROM oxshops');
        if (!$storeId) {
            return $this->getConfig()->getActiveShop()->getId();
        }

        return $storeId;
    }

    /**
     * Validates XML
     * @param string $xml
     */
    private function validateXml($xml)
    {
        // Enable user error handling
        libxml_use_internal_errors(true);

        $dom = new DOMDocument();
        $dom->loadXML($xml);
        if (!$dom->schemaValidate(__DIR__ . '/../../vendor/findologic/xml-export-schema/src/main/resources/findologic.xsd')) {
            $errors = libxml_get_errors();
            foreach ($errors as $error) {
                $return = '<br/>\n';
                switch ($error->level) {
                    case LIBXML_ERR_WARNING:
                        $return .= '<b>Warning $error->code</b>: ';
                        break;
                    case LIBXML_ERR_ERROR:
                        $return .= '<b>Error $error->code</b>: ';
                        break;
                    case LIBXML_ERR_FATAL:
                        $return .= '<b>Fatal Error $error->code</b>: ';
                        break;
                }

                $return .= trim($error->message);
                if ($error->file) {
                    $return .= ' in <b>$error->file</b>';
                }

                echo $return . ' on line <b>$error->line</b>\n';
            }

            die;
        }
    }

    /**
     * Checks if shopKey exists
     *
     * @param string $shopKey
     *
     * @return string
     */
    private function checkShopKey($shopKey)
    {
        $languages = oxNew('oxLang')->getLanguageArray();

        foreach ($languages as $language) {
            $confShopKeys[$language->id] = $this->getConfig()->getConfigParam('FindologicShopkey_' . $language->id);
            if ($confShopKeys[$language->id] === $shopKey) {
                $this->languageId = $language->id;

                return $shopKey;
            }
        }

        return false;
    }
}
