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
            case self::PRODUCT_MEDIA : $returnValue = self::PRODUCT_MEDIA();
                            break;
            case self::PRODUCT_CATEGORY_PRODUCT : $returnValue = self::PRODUCT_CATEGORY_PRODUCT();
                            break;
            case self::PRODUCT_DATA_TRANSLATION : $returnValue = self::PRODUCT_DATA_TRANSLATION();
                            break;
            case self::CATEGORY_DATA_TRANSLATION : $returnValue = self::CATEGORY_DATA_TRANSLATION();
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

    public static function PRODUCT_MEDIA(): self
    {
        return new self(self::PRODUCT_MEDIA);
    }

    public static function PRODUCT_CATEGORY_PRODUCT(): self
    {
        return new self(self::PRODUCT_CATEGORY_PRODUCT);
    }

    public static function PRODUCT_DATA_TRANSLATION(): self
    {
        return new self(self::PRODUCT_DATA_TRANSLATION);
    }

    public static function CATEGORY_DATA_TRANSLATION(): self
    {
        return new self(self::CATEGORY_DATA_TRANSLATION);
    }

    

}