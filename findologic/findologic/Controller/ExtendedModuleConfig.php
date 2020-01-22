<?php

class ExtendedModuleConfig extends ExtendedModuleConfig_parent
{
    /**
     * Saves shop configuration. Will perform a customized saving process for this module and
     * the default one for every other module.
     */
    public function saveConfVars()
    {
        if ($this->getEditObjectId() === 'findologic_module') {
            $this->_saveConfVars();
        } else {
            parent::saveConfVars();
        }
    }

    /**
     * Validates shopKey and saves shop configuration variables
     */
    private function _saveConfVars()
    {
        $config = $this->getConfig();

        $this->resetContentCache();

        $this->_sModuleId = $this->getEditObjectId();
        $shopId = $config->getShopId();

        $moduleId = $this->_getModuleForConfigVars();

        foreach ($this->_aConfParams as $type => $param) {
            $confVars = $config->getRequestParameter($param);

            if (is_array($confVars)) {
                foreach ($confVars as $name => $value) {
                    if (preg_match('/^[A-Z0-9]{32}$/', $value) || empty($value)) {
                        $dbType = $this->_getDbConfigTypeName($type);
                        $config->saveShopConfVar(
                            $dbType,
                            $name,
                            $this->_serializeConfVar($dbType, $name, $value),
                            $shopId,
                            $moduleId
                        );
                    } else {
                        return false;
                    }
                }
            }
        }

        return true;
    }

    /**
     * Convert metadata type to DB type.
     *
     * @param string $type Metadata type.
     *
     * @return string
     */
    private function _getDbConfigTypeName($type)
    {
        if ($type === 'password') {
            return 'str';
        }

        return $type;
    }
}
