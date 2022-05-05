<?php

namespace PimDataPostBundle\Logger;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Pimcore\Log\Handler\ApplicationLoggerDb;

class B2CLogger
{
    private const LOG_CHANNEL = "B2C_salesforce_integration";
    private static $instance;
    private $monolog;

    private function __construct()
    {
        $this->monolog = (new LoggerInitializer())->initializeLogger(self::LOG_CHANNEL);
    }

    public static function getInstace(): Logger
    {
        if(self::$instance == null){
            self::$instance = (new self())->getMonolog();
        }
        return self::$instance;
    }

    private function getMonolog(): Logger
    {
        return $this->monolog;
    }

}