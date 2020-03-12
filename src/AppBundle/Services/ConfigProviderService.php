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
    public function getLevelAttributeMappingConfig(){
        return $this->getConfigFromYmlFile(LEVEL_ATTRIBUTE_MAPPING_FILE_PATH);
    }

    public function getCategoryConfig(){
        return $this->getConfigFromYmlFile(CATEGORY_CONFIG_FILE_PATH);
    }

    public function getBrickMappingConfig(){
        return $this->getConfigFromYmlFile(BRICK_MAPPING_CONFIG_FILE_PATH);
    }


    /**
     * get yml config for the given file
     * caching the file data if environment is not dev
     *
     * @param $filePath
     * @return mixed
     */
    public function getConfigFromYmlFile($filePath){
        $env = \Pimcore\Config::getEnvironment();
        $cacheKey = Utils::getCacheKeyForFilePath($filePath);

        if($env != "dev"){
            if($config = Cache::load($cacheKey)){

            }else{
                $config = Utils::getYmlConfig($filePath);
                Cache::save($config,$cacheKey);
            }
        }else{
            $config = Utils::getYmlConfig($filePath);
            Cache::save($config,$cacheKey);
        }
        $returnValue = $config;

        return $returnValue;
    }


}