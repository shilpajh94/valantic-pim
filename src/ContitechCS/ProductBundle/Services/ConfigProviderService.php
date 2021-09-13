<?php

/**
 * User: Mahesh Lakher
 * Date: 26/07/2021
 * Time: 11:00 AM
 */

namespace ContitechCS\ProductBundle\Services;

use ContitechCS\ProductBundle\Tool\Utils;
use Pimcore\Cache;

class ConfigProviderService
{

    /**
     * get unit conversion file 
     */
    public function getUnitConversionConfig()
    {
        return $this->getConfigFromYmlFile(CS_UNIT_CONVERSION_ATTRIBUTE_GROUP_FILE_PATH);
    }

    public function getBrickMappingConfig()
    {
        return $this->getConfigFromYmlFile(CS_BRICK_MAPPING_CONFIG_FILE_PATH);
    }

    public function getProductDataImportConfig()
    {
        return $this->getConfigFromYmlFile(CS_PRODUCT_DATA_IMPORT_CONFIG_FILE_PATH);
    }
    public function getUnitValueConfig()
    {
        return $this->getConfigFromYmlFile(CS_UNIT_FIELD_IMPORT_CONFIG_FILE_PATH);
    }
    public function getWorkflowConfig()
    {
        return $this->getConfigFromYmlFile(CS_WORKFLOW_CONFIG);
    }
    
    /**
     * get yml config for the given file
     * caching the file data if environment is not dev
     *
     * @param $filePath
     * @return mixed
     */
    public function getConfigFromYmlFile($filePath)
    {
        $env = \Pimcore\Config::getEnvironment();
        $cacheKey = Utils::getCacheKeyForFilePath($filePath);

        if ($env != "dev") {
            $config = Cache::load($cacheKey);
            if (!$config) {
                $config = Utils::getYmlConfig($filePath);
                Cache::save($config, $cacheKey);
            }
        } else {
            $config = Utils::getYmlConfig($filePath);
            Cache::save($config, $cacheKey);
        }
        return $config;
    }
}
