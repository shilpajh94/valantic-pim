<?php

namespace PimDataPostBundle\Lib\SalesForceEntityHelper;

use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Model\Types\B2CSalesForceObjectType;
use PimDataPostBundle\Model\Types\ShopType;

class B2CHelper
{
    public function getEntityUrl(ShopType $shopType,B2CSalesForceObjectType $objectType): string
    {
        $config = $this->getEntityConfig($shopType, $objectType);
        return $config["url"];
    }

    private function getEntityConfig(ShopType $shopType,B2CSalesForceObjectType $objectType)
    {
        $parameter = strtolower($shopType) ."_" . strval($objectType);
        return $this->getSymfonyParameter($parameter);
    }

    public function getSymfonyParameter(string $parameter)
    {
        return Util::getSymfonyParameter($parameter);
    }
}