<?php

namespace PimDataPostBundle\Lib\SalesForceEntityHelper\B2B;

use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
use PimDataPostBundle\Model\Types\ShopType;

abstract class AbstractB2BSalesForceEntityHelper implements IB2BSalesForceEntityHelper
{

    private $shopType;

    public function __construct()
    {
        $this->shopType = ShopType::B2B();
    }

    public function getShopType(): ShopType
    {
        return $this->shopType;
    }

    public abstract function getSalesForceObjectType(): B2BSalesForceObjectType;

    public abstract function getApiHost(): string;

    public abstract function getCompositeGraphApiUrl(): string;

    public abstract function getEntityUrl(): string;
}