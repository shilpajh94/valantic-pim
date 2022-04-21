<?php

namespace PimDataPostBundle\Model\Types;

/**
 * to specify the pimcore classes which are handled by this integration implementation
 */
class StatusType
{
    private const FIXED = "FIXED";

    private const NONFIXED = "NON-FIXED";

    private $statusType;

    private function __construct(string $statusType)
    {
        $this->statusType = $statusType;
    }

    public function __toString()
    {
        return $this->statusType;
    }

    public static function getByString(string $statusType): ?self
    {

        $returnValue = null;
        
        switch($statusType){
            case self::FIXED : $returnValue = self::FIXED();
                            break;
            case self::NONFIXED : $returnValue = self::NONFIXED();
                            break;
            default: $returnValue = null;
        }

        return $returnValue;
    }

    public static function FIXED(): self
    {
        return new self(self::FIXED);
    }

    public static function NONFIXED(): self
    {
        return new self(self::NONFIXED);
    }

}