<?php

namespace PimDataPostBundle\Lib\SalesForceEntityHelper\B2C;

use PimDataPostBundle\Model\PersistantModel\B2CProductRelationChange;
use PimDataPostBundle\Model\Types\B2CSalesForceObjectType;

class B2CProductCategoryRelationHelper extends AbstractB2CSalesForceEntityHelper
{
    private $salesForceObjectType;

    private $helper;

    public function __construct()
    {
        $this->salesForceObjectType = B2CSalesForceObjectType::PRODUCT_CATEGORY_PRODUCT();
        $this->helper = new Helper();
        parent::__construct();
    }

    public function getSalesForceObjectType(): B2CSalesForceObjectType
    {
        return $this->salesForceObjectType;
    }

    public function getApiHost(): string
    {
        return $this->helper->getApiHost();
    }

    public function getCompositeGraphApiUrl(): string
    {
        return $this->helper->getCompositeGraphApiUrl();
    }

    public function getEntityUrl(): string
    {
        return $this->helper->getEntityUrl($this->getShopType(),$this->getSalesForceObjectType());
    }

    public function getExternalIdKey(): string
    {
        return $this->helper->getExternalIdKey($this->salesForceObjectType);
    }
    
    public static function getExternalId(B2CProductRelationChange $relationChangeObject): string
    {
        return $relationChangeObject->getProductId() . "__prod_cat_relation";
    }
}