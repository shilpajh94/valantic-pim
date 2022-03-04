<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator;

interface IHTTPRequestBodyGenerator
{

    /**
     * batches = pages
     * return the number of HTTP requests needed to consume the required entity in salesforce table completely
     */
    public function getTotalBatches(): int;

    public function getHTTPRequestBodyByBatchNumber(int $batch): string;
}