<?php

namespace PimDataPostBundle\Lib\SalesForceEntityHelper\B2C;

use PimDataPostBundle\Model\Types\B2CSalesForceObjectType;

class B2CProductHelper extends AbstractB2CSalesForceEntityHelper
{
    private $salesForceObjectType;

    private $helper;

    private $dao;

    public function __construct()
    {
        $this->salesForceObjectType = B2CSalesForceObjectType::PRODUCT();
        $this->helper = new Helper();
        $this->dao = new B2CProductDao();
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

    public function getCatalogId() 
    {
        $parameter = strtolower($this->getShopType()) ."_" . strtolower($this->getSalesForceObjectType()) . "_catalog";
        return $this->helper->getSymfonyParameter($parameter);
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
        return $tempTableData['articleNumber'];
    }

    public static function getExternalIdByPimId(int $pimId): string
    {
        return $this->dao->getArticleNumber($pimId);
    }
}