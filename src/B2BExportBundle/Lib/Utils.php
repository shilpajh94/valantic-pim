<?php


namespace B2BExportBundle\Lib;


use AppBundle\Logger\LogLevel;

class Utils
{
    public static function log(string $message, LogLevel $level)
    {
        \AppBundle\Tool\Utils::log(B2B_EXPORT_LOG_FILE,$message, $level);
    }
}
