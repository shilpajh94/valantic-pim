<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\B2B;

use PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\B2B\B2BHTTPRequestBodyGeneratorHelper;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
class B2BCategoryHTTPRequestBodyGenerator extends AbstractB2BHTTPRequestBodyGenerator
{ 
    public $httpRequestGeneratorHelper;

    public function __construct() {
        $this->httpRequestGeneratorHelper = new B2BHTTPRequestBodyGeneratorHelper(B2BSalesForceObjectType::CATEGORY(),$this->graphNo,$this->subRequestNo);   
    }

    public function getTotalBatches(): int
    {
        return $this->httpRequestGeneratorHelper->getTotalBatches();
    }

    public function getHTTPRequestBodyByBatchNumber($batch): string
    {
        return $this->httpRequestGeneratorHelper->getHTTPRequestBodyByBatchNumber($batch);
    }
}