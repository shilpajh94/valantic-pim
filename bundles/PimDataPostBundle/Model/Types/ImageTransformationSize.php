<?php

namespace PimDataPostBundle\Model\Types;

class ImageTransformationSize
{
    private const SMALL = "small";

    private const MEDIUM = "medium";

    private const LARGE = "large";

    private $transformationSize;

    private function __construct(string $transformationSize)
    {
        $this->transformationSize = $transformationSize;
    }

    public function __toString()
    {
        return $this->transformationSize;
    }

    public static function getByString(string $transformationSize): ?self
    {

        $returnValue = null;

        switch($transformationSize){
            case self::SMALL : $returnValue = self::SMALL();
                            break;
            case self::MEDIUM : $returnValue = self::MEDIUM();
                            break;
            case self::LARGE : $returnValue = self::LARGE();
                            break;
            default: $returnValue = null;
        }

        return $returnValue;
    }

    public static function SMALL(): self
    {
        return new self(self::SMALL);
    }

    public static function MEDIUM(): self
    {
        return new self(self::MEDIUM);
    }

    public static function LARGE(): self
    {
        return new self(self::LARGE);
    }
}