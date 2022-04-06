<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\B2B;

use GuzzleHttp\Psr7\Request;
use PimDataPostBundle\Services\TokenAuthService;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2B\B2BProductCategoryRelationHelper;
use PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\B2B\B2BProductCategoryRelationHTTPRequestBodyGenerator;
class B2BProductCategoryRelationHTTPRequestGenerator extends AbstractB2BHTTPRequestGenerator 
{
    public $b2bProductCategoryRelationHelper;

    public $b2bHTTPRequestBodyGenerator;

    public function __construct()
    {
        $this->b2bProductCategoryRelationHelper = new B2BProductCategoryRelationHelper();
        $this->b2bHTTPRequestBodyGenerator= new B2BProductCategoryRelationHTTPRequestBodyGenerator();
    }

    private function getRequestMethod()
    {
        return 'POST';
    }

    private function getRequestUrl(): string
    {     
        return $this->b2bProductCategoryRelationHelper->getApiHost().$this->b2bProductCategoryRelationHelper->getCompositeGraphApiUrl();
    }
    
    private function getRequestHeaders(): array
    {
        $b2bAuthToken = Util::getService(TokenAuthService::class)->getB2BAuthToken();
        $authHeader="Bearer ".$b2bAuthToken->getTokenString();
        return array(
            'Content-Type' => 'application/json',
            'Authorization' => $authHeader
        );
    }

    private function getRequestBody($batch): string
    {
        return $this->b2bHTTPRequestBodyGenerator->getHTTPRequestBodyByBatchNumber($batch);
    }

    public function getRequest($batch): Request
    {
       return new Request($this->getRequestMethod(), $this->getRequestUrl(), $this->getRequestHeaders() , $this->getRequestBody($batch));
    }

    public function getTotalBatches():int
    {
        return $this->b2bHTTPRequestBodyGenerator->getTotalBatches();
    }
}