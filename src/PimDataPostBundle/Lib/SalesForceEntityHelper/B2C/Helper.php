<?php

namespace PimDataPostBundle\Lib\SalesForceEntityHelper\B2C;

use PimDataPostBundle\Lib\SalesForceEntityHelper\B2CHelper as SalesForceEntityHelperHelper;
use PimDataPostBundle\Model\Types\B2CSalesForceObjectType;
use PimDataPostBundle\Model\Types\ShopType;

class Helper extends SalesForceEntityHelperHelper
{

    public function getApiHost(): string
    {
        return $this->getSymfonyParameter("b2c_api_host");
    }

    public function getCompositeGraphApiUrl(): string
    {
        return $this->getSymfonyParameter("b2c_composite_graph_api_url");
    }

    public function getExternalIdKey(B2CSalesForceObjectType $objectType): ?string
    {
        $parameter = strtolower(ShopType::B2C()) ."_" . strval($objectType);
        $objectTypeConfig =  $this->getSymfonyParameter($parameter);
        return $objectTypeConfig["external_id"];
    }
}