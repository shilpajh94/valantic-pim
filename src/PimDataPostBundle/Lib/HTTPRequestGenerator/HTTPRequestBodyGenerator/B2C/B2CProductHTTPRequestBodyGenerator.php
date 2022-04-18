<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\B2C;

use PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\B2C\B2CHTTPRequestBodyGeneratorHelper;
use PimDataPostBundle\Model\Types\B2CSalesForceObjectType;

class B2CProductHTTPRequestBodyGenerator extends AbstractB2CHTTPRequestBodyGenerator
{
    
    public $httpRequestGeneratorHelper;

    public function __construct() {
        $this->httpRequestGeneratorHelper = new B2CHTTPRequestBodyGeneratorHelper(B2CSalesForceObjectType::PRODUCT(),$this->graphNo,$this->subRequestNo);   
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