<?php

namespace PimDataPostBundle\Lib\SalesForceEntityHelper\B2B;

use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
use PimDataPostBundle\Model\Types\ShopType;

interface IB2BSalesForceEntityHelper
{
    public function getShopType(): ShopType;

    public function getSalesForceObjectType(): B2BSalesForceObjectType;

    public function getApiHost(): string;

    public function getCompositeGraphApiUrl(): string;
}