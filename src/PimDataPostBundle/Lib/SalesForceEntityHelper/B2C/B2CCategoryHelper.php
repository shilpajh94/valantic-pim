<?php

namespace PimDataPostBundle\Lib\SalesForceEntityHelper\B2C;

use PimDataPostBundle\Model\Types\B2CSalesForceObjectType;

class B2CCategoryHelper extends AbstractB2CSalesForceEntityHelper
{
    private $salesForceObjectType;

    private $helper;

    public function __construct()
    {
        $this->salesForceObjectType = B2CSalesForceObjectType::CATEGORY();
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
    
    public function getCatalogId() 
    {
        $parameter = strtolower($this->getShopType()) ."_" . strval($this->getSalesForceObjectType());
        $objectTypeConfig =  $this->helper->getSymfonyParameter($parameter);
        return $objectTypeConfig["catalogId"];
    }

    public static function getExternalId(array $tempTableData): string
    {
        return "category_" . $tempTableData["o_id"];
    }
}