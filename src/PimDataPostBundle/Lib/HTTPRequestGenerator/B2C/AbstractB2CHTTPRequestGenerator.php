<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\B2C;

use PimDataPostBundle\Model\Types\APIOperationType;
use GuzzleHttp\Psr7\Request;
abstract class AbstractB2CHTTPRequestGenerator implements IB2CHTTPRequestGenerator
{
    public $startBatch = 1;  // start batch number

    public abstract function getRequest(int $batch, APIOperationType $operationType = null): Request;

    public abstract function getTotalBatches(APIOperationType $operationType = null): int;
     
}