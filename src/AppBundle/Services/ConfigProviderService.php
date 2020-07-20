<?php

/**
 * User: pradeep
 * Date: 2/3/20
 * Time: 12:17 PM
 */

namespace AppBundle\Services;

use AppBundle\Tool\Utils;
use Pimcore\Cache;


class ConfigProviderService
{

    /**
     * get level - attribute mapping
     *
     * @return mixed
     */
    public function getLevelAttributeMappingConfig()
    {
        return $this->getConfigFromYmlFile(LEVEL_ATTRIBUTE_MAPPING_FILE_PATH);
    }
    public function getCommandConfig()
    {
        return $this->getConfigFromYmlFile(COMMAND_CONFIG_FILE_PATH);
    }
    public function getCategoryConfig()
    {
        return $this->getConfigFromYmlFile(CATEGORY_CONFIG_FILE_PATH);
    }
    public function getPlantMaterialConfig()
    {
        return $this->getConfigFromYmlFile(PLANT_MATERIAL_CONFIG_FILE_PATH);
    }
    public function getSalesMaterialConfig()
    {
        return $this->getConfigFromYmlFile(SALES_MATERIAL_CONFIG_FILE_PATH);
    }
    public function getProductConfig()
    {
        return $this->getConfigFromYmlFile(PRODUCT_CONFIG_FILE_PATH);
    }

    public function getBrickMappingConfig(){
        return $this->getConfigFromYmlFile(BRICK_MAPPING_CONFIG_FILE_PATH);
    }


    public function getMultiselectMasterConfig(){
        return $this->getConfigFromYmlFile(MULTISELECT_MASTER_IMPORT_CONFIG);
    }

    public function getUnitConversionConfig()
    {
        return $this->getConfigFromYmlFile(UNIT_CONVERSION_ATTRIBUTE_GROUP_FILE_PATH);
    }

    public function getCatalogTableColumnConfig()
    {
        return $this->getConfigFromYmlFile(CATALOG_TABLE_COLUMN_CONFIG_FILE_PATH);
    }
     public function getCatalogTableConfig()
    {
        return $this->getConfigFromYmlFile(CATALOG_TABLE_CONFIG_FILE_PATH);
    }
     public function getCatalogTableDynamicColumnConfig()
    {
        return $this->getConfigFromYmlFile(CATALOG_TABLE_DYNAMIC_COLUMN_CONFIG_FILE_PATH);
    }

    public function getAttributeImagesConfig()
    {
        return $this->getConfigFromYmlFile(ATTRIBUTE_IMAGES_FILE_PATH);
    }

    
    public function getWorkFlowConfig()
    {
        return $this->getConfigFromYmlFile(WORKFLOW_CONFIG_FILE_PATH);
    }

    public function getFittingTableConfig() {
        return $this->getConfigFromYmlFile(FITTING_TABLE_IMPORT_FILE_PATH);
    }

    public function getINHSectionPageConfig() {
        return $this->getConfigFromYmlFile(INH_SECTION_PAGE_FILE_PATH);
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
            if ($config = Cache::load($cacheKey)) {
            } else {
                $config = Utils::getYmlConfig($filePath);
                Cache::save($config, $cacheKey);
            }
        } else {
            $config = Utils::getYmlConfig($filePath);
            Cache::save($config, $cacheKey);
        }
        $returnConfig = $config;
        return $returnConfig;
    }
}
