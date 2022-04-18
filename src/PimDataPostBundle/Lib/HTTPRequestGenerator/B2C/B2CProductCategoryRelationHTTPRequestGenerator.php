<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\B2C;

use GuzzleHttp\Psr7\Request;
use PimDataPostBundle\Services\TokenAuthService;
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
    
    private function getRequestHeaders(): array
    {
        $b2cAuthToken = Util::getService(TokenAuthService::class)->getB2CAuthToken();
        $authHeader="Bearer ".$b2cAuthToken->getTokenString();
        return array(
            'Content-Type' => 'application/json',
            'Authorization' => $authHeader
        );
    }

    private function getRequestBody($batch): string
    {
        return $this->b2cHTTPRequestBodyGenerator->getHTTPRequestBodyByBatchNumber($batch);
    }

    public function getRequest($batch): Request
    {
        $getbodyRequest = $this->getRequestBody($batch);
        return  new Request($this->b2cHTTPRequestGeneratorHelper->getRequestMethod($getbodyRequest), $this->b2cHTTPRequestGeneratorHelper->getRequestUrl($getbodyRequest), $this->getRequestHeaders(), $this->b2cHTTPRequestGeneratorHelper->geBodyFromRequestBody($getbodyRequest));
    }

    public function getTotalBatches():int
    {
        return $this->b2cHTTPRequestBodyGenerator->getTotalBatches();
    }
}