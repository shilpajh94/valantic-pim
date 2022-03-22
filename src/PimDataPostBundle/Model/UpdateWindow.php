<?php

namespace PimDataPostBundle\Model;

use PimDataPostBundle\Lib\Constants;

class UpdateWindow
{
    private $startTime;

    private $endTime;

    private static $instance;

    private function __construct()
    {
        $this->initializeEndTime();
        $this->initializeStartTime();
    }

    public static function getInstance(): self
    {
        if(self::$instance == null){
            self::$instance = new UpdateWindow();
        }
        return self::$instance;
    }

    private function initializeStartTime()
    {
        $endTime = clone($this->endTime);
        $this->startTime = $endTime->modify("-" . Constants::UPDATE_WINDOW_LENGTH_IN_MINUTES . " minutes");
    }

    private function initializeEndTime()
    {
        $Ymd = date("Y-m-d");
        $His = Constants::UPDATE_WINDOW_END_HOUR . "-" . "00" . "-" . "00";
        $datetime = $Ymd . " " . $His;

        $this->endTime = \DateTime::createFromFormat("Y-m-d H-i-s", $datetime);
    }

    public function getStartTimestamp(): int
    {
        return $this->startTime->getTimeStamp();
    }

    public function getEndTimestamp(): int
    {
        return $this->endTime->getTimeStamp();
    }
}