<?php

namespace PimDataPostBundle\Lib\SalesForceEntityHelper\B2C;

use PimDataPostBundle\Model\Types\B2CSalesForceObjectType;
use PimDataPostBundle\Model\Types\ShopType;

abstract class AbstractB2CSalesForceEntityHelper implements IB2CSalesForceEntityHelper
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

    public abstract function getSalesForceObjectType(): B2CSalesForceObjectType;

    public abstract function getApiHost(): string;

    public abstract function getCompositeGraphApiUrl(): string;

    public abstract function getEntityUrl(): string;
}