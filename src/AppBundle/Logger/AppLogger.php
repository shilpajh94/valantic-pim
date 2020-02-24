<?php

namespace AppBundle\Logger;

/**
 * Class AppLogger
 * @package AppBundle\Logger
 */
class AppLogger {

    static private $logger;

    private function __construct() {
       
    }

    /**
     * @Functional Description: This is a wrapper function for initiating ApplicationLogger instance
     * @param string $module
     * @return \Pimcore\Log\ApplicationLogger
     */
    static function log($module) {
        if (!self::$logger[$module]) {
            self::$logger[$module] = \Pimcore\Log\ApplicationLogger::getInstance($module, true);
        }
        return self::$logger[$module];
    }

}