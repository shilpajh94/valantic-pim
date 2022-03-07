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
    public function getProductAttributeValidationConfig()
    {
        return $this->getConfigFromYmlFile(CS_PRODUCT_ATTRIBUTE_VALIDATION_FILE_PATH);
    }
    public function getSegmentCountriesConfig()
    {
        return $this->getConfigFromYmlFile(CS_SEGMENT_COUNTRIES_CONFIG);
    }
    public function getLanguageConfig()
    {
        return $this->getConfigFromYmlFile(CS_LANGUAGE_CONFIG);
    }

    public function getCatalogProductTablesConfig()
    {
        return $this->getConfigFromYmlFile(CS_CATALOG_PRODUCT_TABLE_CONFIG_FILE_PATH);
    }

    public function getCatalogApiConfig()
    {
        return $this->getConfigFromYmlFile(CS_API_CONFIG_FILE_PATH);
    }

    public function getCatalogImageMappingConfig()
    {
        return $this->getConfigFromYmlFile(CS_CATALOG_IMAGE_MAPPING_CONFIG_FILE_PATH);
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


    /**
     * get website settings
     *
     * @param string $key
     * @return string
     */
    public function getWebSiteSetting($key = false)
    {
        try {
            if (!$key) {
                throw new Exception("Website setting key is required");
            }

            $val    = false;
            $obj    =  \Pimcore\Model\WebsiteSetting::getByName($key, null, 'en');

            if ($obj) {
                $val = $obj->getData();
            }

            return $val;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * get default image
     *
     * @return string
     */
    public function getDefaultImage($setting_key = 'CS_default_image')
    {
        try {

            $obj = $this->getWebSiteSetting($setting_key);

            $thumbnail = '';

            if (method_exists($obj, 'getThumbnail')) {
                $thumbnail = $obj->getThumbnail('catalog_thumb');
            }

            return $thumbnail;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
