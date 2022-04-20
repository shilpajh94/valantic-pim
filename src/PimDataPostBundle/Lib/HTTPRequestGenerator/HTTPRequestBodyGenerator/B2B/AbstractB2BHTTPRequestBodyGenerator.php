<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\B2B;

use PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\IHTTPRequestBodyGenerator;
use PimDataPostBundle\Model\Types\APIOperationType;
abstract class AbstractB2BHTTPRequestBodyGenerator implements IHTTPRequestBodyGenerator
{
    public $graphNo= 500;   //Number of graphID in 1 graphs
    
    public $subRequestNo= 1;   // Number of subrequest in 1 composite request

    public $startBatch=1;        //start batch number

    public $table='b2b_salesforce_request';

    public abstract function getTotalBatches(APIOperationType $operationType = null): int;

    public abstract function getHTTPRequestBodyByBatchNumber(int $batch, APIOperationType $operationType = null): string;

}