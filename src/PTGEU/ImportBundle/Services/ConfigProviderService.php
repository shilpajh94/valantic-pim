<?php

namespace PTGEU\ImportBundle\Services;

use AppBundle\Tool\Utils;
use Pimcore\Cache;


class ConfigProviderService
{

    /**
     * get level - attribute mapping
     *
     * @return mixed
     */

    public function getCategoryConfig()
    {
        return $this->getConfigFromYmlFile(PTG_EU_CATEGORY_CONFIG_FILE_PATH);
    }
    public function getPlantMaterialConfig()
    {
        return $this->getConfigFromYmlFile(PTG_EU_PLANT_MATERIAL_CONFIG_FILE_PATH);
    }

    public function getAssetConfig()
    {
        return $this->getConfigFromYmlFile(PTG_EU_ASSET_CONFIG_FILE_PATH);
    }

    public function getSalesMaterialConfig()
    {
        return $this->getConfigFromYmlFile(PTG_EU_SALES_MATERIAL_CONFIG_FILE_PATH);
    }
    public function getProductConfig()
    {
        return $this->getConfigFromYmlFile(PTG_EU_PRODUCT_CONFIG_FILE_PATH);
    }

    public function getBrickMappingConfig(){
        return $this->getConfigFromYmlFile(PTG_EU_BRICK_MAPPING_CONFIG_FILE_PATH);
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

    public function getPriceListTableConfig()
    {
        return $this->getConfigFromYmlFile(PRICE_LIST_TABLE_CONFIG_FILE_PATH);
    }

    public function getOptionProviderCacheConfig()
    {
        return $this->getConfigFromYmlFile(OPTION_PROVIDER_CACHE_CONFIG_FILE_PATH);
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

    public function getINHProductPageConfig() {
        return $this->getConfigFromYmlFile(INH_PRODUCT_PAGE_FILE_PATH);
    }

    public function getINHFittingCoverPageConfig() {
        return $this->getConfigFromYmlFile(INH_FITTING_COVER_PAGE_FILE_PATH);
    }

    public function getEditableProductAttributesImportConfig()
    {
        return $this->getConfigFromYmlFile(PTG_EU_EDITABLE_PRODUCT_ATTRIBUTE_IMPORT_CONFIG_FILE_PATH);
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
        return $this->getConfigFromYmlFile(PTG_EU_UNIT_FIELD_IMPORT_CONFIG_FILE_PATH);
    }
}
