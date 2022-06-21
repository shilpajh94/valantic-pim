<?php


namespace PimDataPostBundle\AttributeConfigProvider\B2C;

use PimDataPostBundle\AttributeConfigProvider\IAttributeConfigProvider;
use PimDataPostBundle\Model\Types\ShopType;
use PimDataPostBundle\Model\Types\PimFieldType;

abstract class AbstractB2CAttributeConfigProvider implements IAttributeConfigProvider
{
    private $shopType;

    public function __construct()
    {
        $this->shopType = ShopType::B2C();
    }

    public function getShopType(): ShopType
    {
        return $this->shopType;
    }

    public abstract function getLocalizedAttributeConfig(): array;

    public abstract function getSalesForceRelationalAttributeConfig(): array;

}