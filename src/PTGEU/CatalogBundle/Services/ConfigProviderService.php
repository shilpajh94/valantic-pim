<?php

namespace PTGEU\CatalogBundle\Services;

use AppBundle\Tool\Utils;
use Pimcore\Cache;


class ConfigProviderService
{

    public function getCatalogConfig()
    {
        return $this->getConfigFromYmlFile(PTG_EU_CATALOGBUNDLE_CONFIG_FILE_PATH);
    }
    
    public function getAttributeImagesConfig()
    {
        return $this->getConfigFromYmlFile(PTG_EU_CATALOGBUNDLE_ATTRIBUTE_IMAGE_CONFIG_FILE_PATH);
    }

    public function getPriceListTableConfig()
    {
        return $this->getConfigFromYmlFile(PTG_EU_CATALOGBUNDLE_PRICE_LIST_TABLE_CONFIG_FILE_PATH);
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
