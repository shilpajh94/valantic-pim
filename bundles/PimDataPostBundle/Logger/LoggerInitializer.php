<?php

namespace PimDataPostBundle\Logger;

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Pimcore\Log\Handler\ApplicationLoggerDb;

class LoggerInitializer
{
    public function initializeLogger(string $channelName): Logger
    {
        $applicationLogHanlder = new ApplicationLoggerDb(\Pimcore\Db::get(),Logger::WARNING);

        $logFullPath = PIMCORE_LOG_DIRECTORY . DIRECTORY_SEPARATOR . $channelName .".log";
        $fileHandler = new StreamHandler($logFullPath, Logger::DEBUG);
        $fileHandler->setFormatter(new LineFormatter(null, DATE_W3C, false, true));

        $monolog = new Logger($channelName);
        $monolog->pushHandler($applicationLogHanlder);
        $monolog->pushHandler($fileHandler);
        return $monolog;
    }
}