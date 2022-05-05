<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\B2C;

use GuzzleHttp\Psr7\Request;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Services\TokenAuthService;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2C\B2CCategoryHelper;
use PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\B2C\B2CCategoryHTTPRequestBodyGenerator;
class B2CCategoryHTTPRequestGenerator extends AbstractB2CHTTPRequestGenerator 
{
    public $b2cCategoryHelper;

    public $b2cHTTPRequestGeneratorHelper;

    public $b2cHTTPRequestBodyGenerator;

    public function __construct()
    {
        $this->b2cCategoryHelper = new B2CCategoryHelper();
        $this->b2cHTTPRequestGeneratorHelper = new B2CHTTPRequestGeneratorHelper();
        $this->b2cHTTPRequestBodyGenerator= new B2CCategoryHTTPRequestBodyGenerator();
    }
    
    private function getRequestUrl($request): string
    {
        $decodeRequest = json_decode($request, true);
        return $this->b2cProductHelper->getApiHost().str_replace('<CATEGORY_ID_PLACEHOLDER>', $decodeRequest['externalID'] ,$this->b2cProductHelper->getEntityUrl());
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