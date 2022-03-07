<?php

namespace PimDataPostBundle\Model\Types;

class B2BSalesForceObjectType
{
    private const PRODUCT = "Product2";

    private const CATEGORY = "ProductCategory";

    private const PRODUCT_MEDIA = "B2B_Product_Media__c";

    private const PRODUCT_CATEGORY_PRODUCT = "ProductCategoryProduct";

    private const PRODUCT_DATA_TRANSLATION = "Product2DataTranslation";

    private const CATEGORY_DATA_TRANSLATION = "ProductCategoryDataTranslation";


    private $objectType;

    private function __construct(string $objectType)
    {
        $this->operationType = $objectType;
    }

    public function __toString()
    {
        return $this->objectType;
    }

    public static function PRODUCT(): self
    {
        return new self(self::PRODUCT);
    }

}