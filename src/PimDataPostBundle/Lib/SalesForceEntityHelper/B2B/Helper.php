<?php

namespace PimDataPostBundle\Lib\SalesForceEntityHelper\B2B;

use PimDataPostBundle\Lib\SalesForceEntityHelper\Helper as SalesForceEntityHelperHelper;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
use PimDataPostBundle\Model\Types\ShopType;
use PimDataPostBundle\Services\UtilService;

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
}