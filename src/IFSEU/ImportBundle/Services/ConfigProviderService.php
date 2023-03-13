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

    public function getCategoryConfig()
    {
        return $this->getConfigFromYmlFile(IFS_EU_CATEGORY_CONFIG_FILE_PATH);
    }

    public function getProductConfig()
    {
        return $this->getConfigFromYmlFile(IFS_EU_PRODUCT_CONFIG_FILE_PATH);
    }

    public function getBrickMappingConfig(){
        return $this->getConfigFromYmlFile(IFS_EU_BRICK_MAPPING_CONFIG_FILE_PATH);
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

}
