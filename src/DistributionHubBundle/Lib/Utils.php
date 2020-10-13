<?php

namespace DistributionHubBundle\Lib;

use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Exception\ParseException;
use Pimcore\Tool;
use DistributionHubBundle\Lib\DHubLogger;

class Utils
{

    /**
     * function to get the yml file data as an array
     *
     * @param string $filePath
     * @return mixed
     */
    public static function getYmlConfig(string $filePath){
        
        try {
            $yaml = new Parser();
            $value = $yaml->parseFile($filePath);
            return $value;
        } catch (ParseException $e) {
            DHubLogger::log("Unable to parse the YAML string: %s". $e->getMessage(), DHubLogger::ERROR);
            throw new ParseException("Unable to parse the YAML string: %s ". $e->getMessage());
        }

    }

    /**
     * create a valid cache key for the given file path
     *
     * @param $filePath
     * @return mixed
     */
    public static function getCacheKeyForFilePath($filePath){
        $cacheKey = str_replace("/","_",$filePath);
        $cacheKey = str_replace("\\","_",$cacheKey);
        return $cacheKey;
    }
    
    /**
     * returns available system languages
     *
     * @param 
     * @return array
     */
    public static function getAvailableLanguages() {

        $locales = \Pimcore\Tool::getSupportedLocales();
        $availableLanguages = \Pimcore\Tool::getValidLanguages();
        $fieldArray = array();

        foreach ($availableLanguages as $language) {
            $fieldArrayTemp = array();
            $fieldArrayTemp['name'] = $locales[$language];
            $fieldArrayTemp['value'] = $language;
            $fieldArray[] = $fieldArrayTemp;
        }

        return $fieldArray;
    }
}