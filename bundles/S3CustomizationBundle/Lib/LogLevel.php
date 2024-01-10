<?php


namespace S3CustomizationBundle\Lib;


class LogLevel
{
    /**
     * Detailed debug information
     */
    const DEBUG = "DEBUG";
    /**
     * Interesting events
     *
     * Examples: User logs in, SQL logs.
     */
    const INFO = "INFO";
    /**
     * Uncommon events
     */
    const NOTICE = "NOTICE";
    /**
     * Exceptional occurrences that are not errors
     *
     * Examples: Use of deprecated APIs, poor use of an API,
     * undesirable things that are not necessarily wrong.
     */
    const WARNING = "WARNING";
    /**
     * Runtime errors
     */
    const ERROR = "ERROR";
    /**
     * Critical conditions
     *
     * Example: Application component unavailable, unexpected exception.
     */
    const CRITICAL = "CRITICAL";
    /**
     * Action must be taken immediately
     *
     * Example: Entire website down, database unavailable, etc.
     * This should trigger the SMS alerts and wake you up.
     */
    const ALERT = "ALERT";
    /**
     * Urgent alert.
     */
    const EMERGENCY = "EMERGENCY";

    private $logLevel;

    private function __construct($logLevel)
    {
        $this->logLevel = $logLevel;
    }

    public function __toString()
    {
        return $this->logLevel;
    }

    public static function DEBUG(): self
    {
        return new self(self::DEBUG);
    }

    public static function INFO(): self
    {
        return new self(self::INFO);
    }

    public static function NOTICE(): self
    {
        return new self(self::NOTICE);
    }

    public static function WARNING(): self
    {
        return new self(self::WARNING);
    }

    public static function ERROR(): self
    {
        return new self(self::ERROR);
    }

    public static function CRITICAL(): self
    {
        return new self(self::CRITICAL);
    }

    public static function ALERT(): self
    {
        return new self(self::ALERT);
    }

    public static function EMERGENCY(): self
    {
        return new self(self::EMERGENCY);
    }
}
