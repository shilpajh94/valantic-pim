<?php

namespace PimDataPostBundle\Model\Types;

class APIOperationType
{
    private const CREATE = "CREATE";

    private const UPDATE = "UPDATE";

    private const DELETE = "DELETE";

    private $operationType;

    private function __construct(string $operationType)
    {
        $this->operationType = $operationType;
    }

    public function __toString()
    {
        return $this->operationType;
    }

    public static function getByString(string $operationType): ?self
    {
        $returnValue = null;

        switch($operationType){
            case self::CREATE : $returnValue = self::CREATE();
                            break;
            case self::UPDATE : $returnValue = self::UPDATE();
                            break;
            case self::DELETE : $returnValue = self::DELETE();
                            break;
            default: $returnValue = null;
        }

        return $returnValue;
    }

    public static function CREATE(): self
    {
        return new self(self::CREATE);
    }

    public static function UPDATE(): self
    {
        return new self(self::UPDATE);
    }

    public static function DELETE(): self
    {
        return new self(self::DELETE);
    }
}