<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\B2C;

use PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\B2C\B2CHTTPRequestBodyGeneratorHelper;
use PimDataPostBundle\Model\Types\B2CSalesForceObjectType;
use PimDataPostBundle\Model\Types\APIOperationType;
class B2CProductCategoryRelationHTTPRequestBodyGenerator extends AbstractB2CHTTPRequestBodyGenerator
{
    
    public $httpRequestGeneratorHelper;

    public function __construct() {
        $this->httpRequestGeneratorHelper = new B2CHTTPRequestBodyGeneratorHelper(B2CSalesForceObjectType::PRODUCT_CATEGORY_PRODUCT(),$this->graphNo,$this->subRequestNo);   
    }

    public function getTotalBatches(APIOperationType $operationType = null): int
    {
        return $this->httpRequestGeneratorHelper->getTotalBatches($operationType);

    }

    public function getHTTPRequestBodyByBatchNumber($batch, APIOperationType $operationType = null): string
    {
        return $this->httpRequestGeneratorHelper->getHTTPRequestBodyByBatchNumber($batch, $operationType);

    }

}