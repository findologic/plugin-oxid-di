<?php

use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Config;

class InstallationController
{
    /**
     * Adds seo url for export
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public static function onActivate()
    {
        $db = oxDb::getDb(oxDb::FETCH_MODE_ASSOC);
        $seoUrl = 'Findologic/';
        $seoHash = md5(strtolower($seoUrl));
        $shopId = oxUtilsObject::getInstance()->getShopId();
        $qtedShopId = $db->quote($shopId);
        $qtedStdUrl = $db->quote('index.php?cl=findologic');
        $qtedSeoUrl = $db->quote($seoUrl);
        $qtedType = $db->quote('static');
        $qtedIdent = $db->quote($seoHash);

        $sql = "insert into oxseo
                    (oxobjectid, oxident, oxshopid, oxlang, oxstdurl, oxseourl, oxtype, oxfixed, oxexpired, oxparams)
                values
                    ( {$qtedIdent}, {$qtedIdent}, {$qtedShopId}, 0, {$qtedStdUrl}, {$qtedSeoUrl}, 
                    {$qtedType}, '0', '0', '' )
                on duplicate key update
                    oxident = {$qtedIdent}, oxstdurl = {$qtedStdUrl}, oxseourl = {$qtedSeoUrl}, 
                    oxfixed = '', oxexpired = '0'";

        oxDb::getDb()->execute($sql);
    }

    /**
     * Removes seo url for export from database
     */
    public static function onDeactivate()
    {
        $seoUrl = 'Findologic/';
        $seoHash = md5(strtolower($seoUrl));

        oxDb::getDb()->execute("delete from oxseo where oxident = '$seoHash'");
        oxDb::getDb()->execute('delete from oxconfig where OXMODULE = "module:findologic_module"');
    }
}
