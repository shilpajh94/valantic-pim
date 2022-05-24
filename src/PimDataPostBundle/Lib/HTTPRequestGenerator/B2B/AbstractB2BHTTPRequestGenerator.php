<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\B2B;

use PimDataPostBundle\Lib\HTTPRequestGenerator\IHTTPRequestGenerator;
use PimDataPostBundle\Model\Types\APIOperationType;
abstract class AbstractB2BHTTPRequestGenerator implements IHTTPRequestGenerator
{
    public $startBatch = 1;  // start batch number

    public abstract function getRequest(int $batch, APIOperationType $operationType = null);

    public abstract function getTotalBatches(APIOperationType $operationType = null): int;
    
}