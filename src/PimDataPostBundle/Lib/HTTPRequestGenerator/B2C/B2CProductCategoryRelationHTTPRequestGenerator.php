<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\B2C;

use GuzzleHttp\Psr7\Request;
use PimDataPostBundle\Services\TokenAuthService;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2C\B2CProductCategoryRelationHelper;
use PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\B2C\B2CProductCategoryRelationHTTPRequestBodyGenerator;
class B2CProductCategoryRelationHTTPRequestGenerator extends AbstractB2CHTTPRequestGenerator 
{
    public $b2cProductCategoryRelationHelper;

    public $b2cHTTPRequestGeneratorHelper;

    public $b2cHTTPRequestBodyGenerator;

    public function __construct()
    {
        $this->b2cProductCategoryRelationHelper = new B2CProductCategoryRelationHelper();
        $this->b2cHTTPRequestGeneratorHelper = new B2CHTTPRequestGeneratorHelper();
        $this->b2cHTTPRequestBodyGenerator= new B2CProductCategoryRelationHTTPRequestBodyGenerator();
    }

    private function getRequestUrl($request): string
    {
        $decodeRequest = json_decode($request, true);
        return "https://bgxw-010.sandbox.us01.dx.commercecloud.salesforce.com/s/-/dw/data/v18_1/products/".$decodeRequest['externalID'];
    }

    private function getRequestBody($batch, APIOperationType $operationType = null): string
    {
        return $this->b2cHTTPRequestBodyGenerator->getHTTPRequestBodyByBatchNumber($batch,$operationType);
    }

    public function getRequest($batch, APIOperationType $operationType = null): Request
    {
        $getbodyRequest = $this->getRequestBody($batch, $operationType);
        return  new Request($this->b2cHTTPRequestGeneratorHelper->getRequestMethod($getbodyRequest), $this->getRequestUrl($getbodyRequest), $this->b2cHTTPRequestGeneratorHelper->getRequestHeaders(), $this->b2cHTTPRequestGeneratorHelper->geBodyFromRequestBody($getbodyRequest));
    }

    public function getTotalBatches(APIOperationType $operationType = null):int
    {
        return $this->b2cHTTPRequestBodyGenerator->getTotalBatches($operationType);
    }
}