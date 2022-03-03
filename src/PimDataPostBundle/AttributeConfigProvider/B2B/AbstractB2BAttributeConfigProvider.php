<?php


namespace PimDataPostBundle\AttributeConfigProvider\B2B;

use PimDataPostBundle\AttributeConfigProvider\AbstractAttributeConfigProvider;
use PimDataPostBundle\Model\Types\ShopType;
use PimDataPostBundle\Model\Types\PimFieldType;

abstract class AbstractB2BAttributeConfigProvider extends AbstractAttributeConfigProvider
{
    private $shopType = ShopType::B2B();

    public function getShopType(): ShopType
    {
        return $this->shopType;
    }

    public abstract function getLocalizedAttributeConfig(): array;

    /**
     * needed while fetching the data from 
     */
    public abstract function getAttributeConfigByPimFieldType(PimFieldType $pimFieldType): array;

    public abstract function getSalesForceRelationalAttributeConfig(): array;

}