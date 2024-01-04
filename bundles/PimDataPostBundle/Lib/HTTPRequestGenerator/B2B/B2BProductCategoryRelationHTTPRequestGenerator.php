<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\B2B;

use PimDataPostBundle\Model\Types\APIOperationType;
use GuzzleHttp\Psr7\Request;
use PimDataPostBundle\Services\TokenAuthService;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2B\B2BProductCategoryRelationHelper;
use PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\B2B\B2BProductCategoryRelationHTTPRequestBodyGenerator;
class B2BProductCategoryRelationHTTPRequestGenerator extends AbstractB2BHTTPRequestGenerator 
{
    public $b2bProductCategoryRelationHelper;

    public $b2bHTTPRequestBodyGenerator;

    public $b2bHTTPRequestGeneratorHelper;

    public function __construct()
    {
        $this->b2bProductCategoryRelationHelper = new B2BProductCategoryRelationHelper();
        $this->b2bHTTPRequestBodyGenerator= new B2BProductCategoryRelationHTTPRequestBodyGenerator();
        $this->b2bHTTPRequestGeneratorHelper = new B2BHTTPRequestGeneratorHelper();
    }

    private function getRequestUrl(): string
    {     
        return $this->b2bProductCategoryRelationHelper->getApiHost().$this->b2bProductCategoryRelationHelper->getCompositeGraphApiUrl();
    }
    
    private function getRequestBody($batch, APIOperationType $operationType = null): string
    {
        return $this->b2bHTTPRequestBodyGenerator->getHTTPRequestBodyByBatchNumber($batch, $operationType);
    }

    public function getRequest($batch, APIOperationType $operationType = null): Request
    {
       return  new Request($this->b2bHTTPRequestGeneratorHelper->getRequestMethod(), $this->getRequestUrl(), $this->b2bHTTPRequestGeneratorHelper->getRequestHeaders() , $this->getRequestBody($batch, $operationType));
    }

    public function getTotalBatches(APIOperationType $operationType = null):int
    {
        return $this->b2bHTTPRequestBodyGenerator->getTotalBatches($operationType);
    }
}