<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\B2C;

use GuzzleHttp\Psr7\Request;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Services\TokenAuthService;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2C\B2CProductHelper;
use PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\B2C\B2CProductHTTPRequestBodyGenerator;
class B2CProductHTTPRequestGenerator extends AbstractB2CHTTPRequestGenerator 
{
    private $b2cProductHelper;

    private $b2cHTTPRequestGeneratorHelper;

    private $b2cHTTPRequestBodyGenerator;

    private $externalIdForCurrentRequest;

    public function __construct()
    {
        $this->b2cProductHelper = new B2CProductHelper();
        $this->b2cHTTPRequestGeneratorHelper = new B2CHTTPRequestGeneratorHelper();
        $this->b2cHTTPRequestBodyGenerator= new B2CProductHTTPRequestBodyGenerator();
     
    }

    private function getRequestUrl(string $request): string
    {
        $decodeRequest = json_decode($request, true);
        $this->externalIdForCurrentRequest = $decodeRequest['externalID'];
        return $this->b2cProductHelper->getApiHost().str_replace('<PRODUCT_ID_PLACEHOLDER>', $decodeRequest['externalID'] ,$this->b2cProductHelper->getEntityUrl());
    }

    private function getRequestBody(int $batch, APIOperationType $operationType = null): string
    {
        return $this->b2cHTTPRequestBodyGenerator->getHTTPRequestBodyByBatchNumber($batch,$operationType);
    }

    public function getRequest(int $batch, APIOperationType $operationType = null): Request
    {
        $getbodyRequest = $this->getRequestBody($batch, $operationType);
        return  new Request($this->b2cHTTPRequestGeneratorHelper->getRequestMethod($getbodyRequest), $this->getRequestUrl($getbodyRequest), $this->b2cHTTPRequestGeneratorHelper->getRequestHeaders(), $this->b2cHTTPRequestGeneratorHelper->getBodyFromRequestBody($getbodyRequest));
    }

    public function getExternalIdForCurrentRequest(): string
    {
        return $this->externalIdForCurrentRequest;
    }

    public function getTotalBatches(APIOperationType $operationType = null):int
    {
        return $this->b2cHTTPRequestBodyGenerator->getTotalBatches($operationType);
    }

}