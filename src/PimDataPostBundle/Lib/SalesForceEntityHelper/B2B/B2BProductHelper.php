<?php

namespace PimDataPostBundle\Lib\SalesForceEntityHelper\B2B;

use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;

class B2BProductHelper extends AbstractB2BSalesForceEntityHelper
{
    private $salesForceObjectType;

    private $helper;

    public function __construct()
    {
        $this->salesForceObjectType = B2BSalesForceObjectType::PRODUCT();
        $this->helper = new Helper();
        parent::__construct();
    }

    public function getSalesForceObjectType(): B2BSalesForceObjectType
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

    public static function getExternalId(array $tempTableData): string
    {
        return $tempTableData["external_id"];
    }
}