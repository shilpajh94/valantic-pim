<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\B2B;

use PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\B2B\B2BHTTPRequestBodyGeneratorHelper;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;

class B2BProductMediaHTTPRequestBodyGenerator extends AbstractB2BHTTPRequestBodyGenerator
{
    
    public $httpRequestGeneratorHelper;

    public function __construct() {
        $this->httpRequestGeneratorHelper = new B2BHTTPRequestBodyGeneratorHelper(B2BSalesForceObjectType::PRODUCT_MEDIA(),$this->graphNo,$this->subRequestNo);   
    }

    public function getTotalBatches($operationType = null): int
    {
        return $this->httpRequestGeneratorHelper->getTotalBatches($operationType);
    }

    public function getHTTPRequestBodyByBatchNumber($batch, $operationType = null): string
    {
        return $this->httpRequestGeneratorHelper->getHTTPRequestBodyByBatchNumber($batch, $operationType);
    }
}