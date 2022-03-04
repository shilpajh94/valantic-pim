<?php


namespace PimDataPostBundle\AttributeConfigProvider\B2B;

use PimDataPostBundle\AttributeConfigProvider\IAttributeConfigProvider;
use PimDataPostBundle\Model\Types\ShopType;
use PimDataPostBundle\Model\Types\PimFieldType;

abstract class AbstractB2BAttributeConfigProvider implements IAttributeConfigProvider
{
    private $shopType = ShopType::B2B();

    public function getShopType(): ShopType
    {
        return $this->shopType;
    }

    public abstract function getLocalizedAttributeConfig(): array;

    public abstract function getSalesForceRelationalAttributeConfig(): array;

}