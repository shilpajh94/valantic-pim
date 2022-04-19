<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator;

use PimDataPostBundle\Model\Types\APIOperationType;
interface IHTTPRequestBodyGenerator
{

    /**
     * batches = pages
     * return the number of HTTP requests needed to consume the required entity in salesforce table completely
     */
    public function getTotalBatches(APIOperationType $operationType = null): int;

    public function getHTTPRequestBodyByBatchNumber(int $batch, APIOperationType $operationType = null): string;
}