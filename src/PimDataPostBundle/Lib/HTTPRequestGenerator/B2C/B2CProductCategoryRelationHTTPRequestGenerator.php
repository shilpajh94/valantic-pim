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
    private $b2cProductCategoryRelationHelper;

    private $b2cHTTPRequestGeneratorHelper;

    private $b2cHTTPRequestBodyGenerator;

    private $externalIdForCurrentRequest;

    public function __construct()
    {
        $this->b2cProductCategoryRelationHelper = new B2CProductCategoryRelationHelper();
        $this->b2cHTTPRequestGeneratorHelper = new B2CHTTPRequestGeneratorHelper();
        $this->b2cHTTPRequestBodyGenerator= new B2CProductCategoryRelationHTTPRequestBodyGenerator();
    }

    private function getRequestUrl(string $request): string
    {
        $decodeRequest = json_decode($request, true);
        $this->externalIdForCurrentRequest = $decodeRequest['externalID'];
        $entityurl = str_replace('<CATEGORY_ID_PLACEHOLDER>', $decodeRequest['body']['category_id'] ,$this->b2cProductCategoryRelationHelper->getEntityUrl());
        $entityurl = str_replace('<PRODUCT_ID_PLACEHOLDER>', $decodeRequest['body']['product_id'] , $entityurl);
        return $this->b2cProductCategoryRelationHelper->getApiHost().$entityurl;
    }

    private function getRequestBody(int $batch, APIOperationType $operationType = null): string
    {
        return $this->b2cHTTPRequestBodyGenerator->getHTTPRequestBodyByBatchNumber($batch,$operationType);
    }

    public function getExternalIdForCurrentRequest(): string
    {
        return $this->externalIdForCurrentRequest;
    }

    public function getRequest(int $batch, APIOperationType $operationType = null): Request
    {
        $getbodyRequest = $this->getRequestBody($batch, $operationType);
        return  new Request($this->b2cHTTPRequestGeneratorHelper->getRequestMethod($getbodyRequest), $this->getRequestUrl($getbodyRequest), $this->b2cHTTPRequestGeneratorHelper->getRequestHeaders(), $this->b2cHTTPRequestGeneratorHelper->getBodyFromRequestBody($getbodyRequest));
    }

    public function getTotalBatches(APIOperationType $operationType = null):int
    {
        return $this->b2cHTTPRequestBodyGenerator->getTotalBatches($operationType);
    }
}