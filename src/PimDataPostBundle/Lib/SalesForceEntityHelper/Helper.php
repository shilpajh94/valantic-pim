<?php

namespace PimDataPostBundle\Lib\SalesForceEntityHelper;

use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
use PimDataPostBundle\Model\Types\ShopType;

class Helper
{
    public function getEntityUrl(ShopType $shopType,B2BSalesForceObjectType $objectType): string
    {
        $config = $this->getEntityConfig($shopType, $objectType);
        return $config["url"];
    }

    private function getEntityConfig(ShopType $shopType,B2BSalesForceObjectType $objectType)
    {
        $parameter = strtolower($shopType) ."_" . strval($objectType);
        return $this->getSymfonyParameter($parameter);
    }

    public function getSymfonyParameter(string $parameter)
    {
        return Util::getSymfonyParameter($parameter);
    }
}