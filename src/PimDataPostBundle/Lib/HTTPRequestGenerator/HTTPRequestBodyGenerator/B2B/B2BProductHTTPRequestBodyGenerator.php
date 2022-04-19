<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\B2B;

use PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\B2B\B2BHTTPRequestBodyGeneratorHelper;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
use PimDataPostBundle\Model\Types\APIOperationType;

class B2BProductHTTPRequestBodyGenerator extends AbstractB2BHTTPRequestBodyGenerator
{
    
    public $httpRequestGeneratorHelper;

    public function __construct() {
        $this->httpRequestGeneratorHelper = new B2BHTTPRequestBodyGeneratorHelper(B2BSalesForceObjectType::PRODUCT(),$this->graphNo,$this->subRequestNo);   
    }

    public function getTotalBatches(APIOperationType $operationType = null): int
    {
        return $this->httpRequestGeneratorHelper->getTotalBatches();
    }

    public function getHTTPRequestBodyByBatchNumber($batch, APIOperationType $operationType = null): string
    {
        return $this->httpRequestGeneratorHelper->getHTTPRequestBodyByBatchNumber($batch);
    }
}