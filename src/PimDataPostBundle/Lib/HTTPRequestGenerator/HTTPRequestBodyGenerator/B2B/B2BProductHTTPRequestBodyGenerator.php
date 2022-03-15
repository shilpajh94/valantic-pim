<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\B2B;

use PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\B2B\B2BHTTPRequestBodyGeneratorHelper;
class B2BProductHTTPRequestBodyGenerator extends AbstractB2BHTTPRequestBodyGenerator
{
    
    public $httpRequestGeneratorHelper;

    public $type='PRODUCT';

    public function __construct() {
        $this->httpRequestGeneratorHelper = new B2BHTTPRequestBodyGeneratorHelper($this->type,$this->graphNo,$this->subRequestNo);   
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