<?php


namespace B2BTranslationBundle\Tool;

use B2BTranslationBundle\Logger\LogLevel;
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