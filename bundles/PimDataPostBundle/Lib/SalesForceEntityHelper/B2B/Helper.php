<?php

namespace PimDataPostBundle\Lib\SalesForceEntityHelper\B2B;

use PimDataPostBundle\Lib\SalesForceEntityHelper\Helper as SalesForceEntityHelperHelper;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
use PimDataPostBundle\Model\Types\ShopType;

class Helper extends SalesForceEntityHelperHelper
{

    public function getApiHost(): string
    {
        return $this->getSymfonyParameter("b2b_api_host");
    }

    public function getCompositeGraphApiUrl(): string
    {
        return $this->getSymfonyParameter("b2b_composite_graph_api_url");
    }

    public function getExternalIdKey(B2BSalesForceObjectType $objectType): ?string
    {
        $parameter = strtolower(ShopType::B2B()) ."_" . strval($objectType);
        $objectTypeConfig =  $this->getSymfonyParameter($parameter);
        return $objectTypeConfig["external_id"];
    }
}