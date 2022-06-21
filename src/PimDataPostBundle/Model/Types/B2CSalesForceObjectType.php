<?php

namespace PimDataPostBundle\Model\Types;

class B2CSalesForceObjectType
{
    private const PRODUCT = "Product";

    private const CATEGORY = "Category";

    private const PRODUCT_CATEGORY_PRODUCT = "ProductCategoryProduct";

    private $objectType;

    private function __construct(string $objectType)
    {
        $this->objectType = $objectType;
    }

    public function __toString()
    {
        return $this->objectType;
    }

    public static function getByString(string $objectType): ?self
    {
        $returnValue = null;

        switch($objectType){
            case self::PRODUCT : $returnValue = self::PRODUCT();
                            break;
            case self::CATEGORY : $returnValue = self::CATEGORY();
                            break;
            case self::PRODUCT_CATEGORY_PRODUCT : $returnValue = self::PRODUCT_CATEGORY_PRODUCT();
                            break;              
            default: $returnValue = null;
        }

        return $returnValue;
    }

    public static function PRODUCT(): self
    {
        return new self(self::PRODUCT);
    }

    public static function CATEGORY(): self
    {
        return new self(self::CATEGORY);
    }

    public static function PRODUCT_CATEGORY_PRODUCT(): self
    {
        return new self(self::PRODUCT_CATEGORY_PRODUCT);
    }

}