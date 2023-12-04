<?php


namespace PTGEU\ProductBundle\Tool;

use Symfony\Component\Yaml\Parser;

class Utils
{

    /**
     * function to get the yml file data as an array
     *
     * @param string $filePath
     * @return mixed
     */
    public static function getYmlConfig(string $filePath){
        $yaml = new Parser();
        return $yaml->parseFile($filePath);
    }

    /**
     * create a valid cache key for the given file path
     *
     * @param $filePath
     * @return mixed
     */
    public static function getCacheKeyForFilePath($filePath){
        $cacheKey = str_replace("/","_",$filePath);
        return str_replace("\\","_",$cacheKey);
    }
}