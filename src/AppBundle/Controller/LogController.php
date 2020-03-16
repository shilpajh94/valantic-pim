<?php

namespace AppBundle\Controller;

use Pimcore\Log\Simple;
use Throwable;
use Elements\Bundle\ProcessManagerBundle;
class LogController
{
    private static $isEnable=1;
    private static $monitoringItem;
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
            self::$monitoringItem->getLogger()->error($message);
            Simple::log($name, $message);
        }
    }

    public static function enable($flag)
    {
        self::$isEnable = $flag;
    }
}
