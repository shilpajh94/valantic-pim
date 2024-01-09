<?php

namespace IFSEU\ImportBundle\Services;

use AppBundle\Tool\Utils;
use Pimcore\Cache;


class ConfigProviderService
{

    /**
     * get level - attribute mapping
     *
     * @return mixed
     */

    public function getPlantMaterialConfig()
    {
        return $this->getConfigFromYmlFile(IFS_EU_PLANT_MATERIAL_CONFIG_FILE_PATH);
    }

    public function getSalesMaterialConfig()
    {
        return $this->getConfigFromYmlFile(IFS_EU_SALES_MATERIAL_CONFIG_FILE_PATH);
    }
    public function getProductConfig()
    {
        return $this->getConfigFromYmlFile(IFS_EU_PRODUCT_CONFIG_FILE_PATH);
    }

    public function getAssetConfig()
    {
        return $this->getConfigFromYmlFile(IFS_EU_ASSET_CONFIG_FILE_PATH);
    }

    public function getProductImportConfig()
    {
        return $this->getConfigFromYmlFile(IFS_EU_PRODUCT_IMPORT_CONFIG_FILE_PATH);
    }
    
    public function getCategoryConfig()
    {
        return $this->getConfigFromYmlFile(IFS_EU_CATEGORY_CONFIG_FILE_PATH);
    }
    
    public function getBrickMappingConfig(){
        return $this->getConfigFromYmlFile(IFS_EU_BRICK_MAPPING_CONFIG_FILE_PATH);
    }

    public function getUnitConversionConfig()
    {
        return $this->getConfigFromYmlFile(IFS_EU_UNIT_CONVERSION_ATTRIBUTE_GROUP_FILE_PATH);
    }
    
    // public function getEditableProductAttributesImportConfig()
    // {
    //     return $this->getConfigFromYmlFile(IFS_EU_EDITABLE_PRODUCT_ATTRIBUTE_IMPORT_CONFIG_FILE_PATH);
    // }

    public function getIFSEUWorkflowConfig()
    {
        return $this->getConfigFromYmlFile(IFS_EU_WORKFLOW_CONFIG);
    }
    /**
     * get yaml config for the given file
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

            $con = Cache::load($cacheKey);
            if ($con) {
                $config =  $con;
            } else {
                $config = Utils::getYmlConfig($filePath);
                Cache::save($config, $cacheKey);
            }
        } else {
            $config = Utils::getYmlConfig($filePath);
            Cache::save($config, $cacheKey);
        }
        return $config;
    }
    public function getUnitValueConfig()
    {
        //return $this->getConfigFromYmlFile(PTG_EU_UNIT_FIELD_IMPORT_CONFIG_FILE_PATH);
    }
    public function getBrickAttributesConfig()
    {
        return $this->getConfigFromYmlFile(IFS_EU_BRICK_ATTRIBUTES_CONFIG_FILE_PATH);
    }

}
