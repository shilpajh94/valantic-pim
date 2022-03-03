<?php

namespace PimDataPostBundle\Model\Types;

/**
 * to specify the pimcore classes which are handled by this integration implementation
 */
class ClassType
{
    private const PRODUCT = "Product";

    private const CATEGORY = "Category";

    private $classType;

    private function __construct(string $classType)
    {
        $this->shopType = $classType;
    }

    public function __toString()
    {
        return $this->classType;
    }

    public static function PRODUCT(): self
    {
        return new self(self::PRODUCT);
    }

    public static function CATEGORY(): self
    {
        return new self(self::CATEGORY);
    }

}