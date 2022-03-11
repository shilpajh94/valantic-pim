<?php

namespace PimDataPostBundle\Model;

class UpdateWindow
{
    private $startTimestamp;

    private $endTimestamp;

    private static $instance;

    private function __construct()
    {
        $this->initializeStartTimeStamp();
        $this->initializeEndTimestamp();
    }

    public static function getInstance(): self
    {
        if(self::$instance == null){
            self::$instance = new UpdateWindow();
        }
        return self::$instance;
    }

    private function initializeStartTimeStamp()
    {

    }

    private function initializeEndTimestamp()
    {

    }

    public function getStartTimestamp(): int
    {
        return $this->startTimestamp;
    }

    public function getEndTimestamp(): int
    {
        return $this->endTimestamp;
    }
}