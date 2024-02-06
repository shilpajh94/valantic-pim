<?php


namespace AppBundle\Tool;

use AppBundle\Logger\LogLevel;
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
        $value = $yaml->parseFile($filePath);
        return $value;
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
     * function to log message to a given log file
     *
     * example usage
     * Utils::log(REQUIRED_ATTRIBUTES_LOG_FILE, $exception->getMessage(), LogLevel::CRITICAL())
     *
     * @param string $logFileName
     * @param string $message
     * @param LogLevel $logLevel
     */
    public static function log(string $logFileName, string $message, LogLevel $logLevel){
        $logLevel = strval($logLevel);
        $logMessage = "[".$logLevel."]"." ".$message;
        \Pimcore\Log\Simple::log($logFileName,$logMessage);
    }

}