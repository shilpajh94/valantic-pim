<?php

namespace AppBundle\Logger;
use Elements\Bundle\ProcessManagerBundle;
use Throwable;
use Pimcore\Log\Simple;
/**
 * Class AppLogger
 * @package AppBundle\Logger
 */
class AppLogger {

    static private $logger;
    private static $isEnable=1;
    private static $monitoringItem;
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

    public static function error($name, $th)
    {
        self::$monitoringItem = ProcessManagerBundle\ElementsProcessManagerBundle::getMonitoringItem();
        if (self::$isEnable) {
            if ($th instanceof Throwable) {
                $message = $th->getMessage();
                $message .= ", error code: " . $th->getCode() . " at line " . $th->getLine() . " in file " . $th->getFile();
            } else {
                $message = $th;
            }
            // p_r($message);
            if(self::$monitoringItem->id){
                self::$monitoringItem->setMessage($message)->save();
                self::$monitoringItem->getLogger()->error($message);
                self::$monitoringItem->setStatus(self::$monitoringItem::STATUS_FAILED)->save();
            }
            Simple::log($name, $message);
        }
    }

    public static function enable($flag)
    {
        self::$isEnable = $flag;
    }

}