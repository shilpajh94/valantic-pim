<?php

namespace PimDataPostBundle\Lib\SalesForceEntityHelper\B2C;

use PimDataPostBundle\Model\Types\B2CSalesForceObjectType;
use PimDataPostBundle\Model\Types\ShopType;

interface IB2CSalesForceEntityHelper
{
    public function getShopType(): ShopType;

    public function getSalesForceObjectType(): B2CSalesForceObjectType;

    public function getApiHost(): string;

    public function getCompositeGraphApiUrl(): string;
}