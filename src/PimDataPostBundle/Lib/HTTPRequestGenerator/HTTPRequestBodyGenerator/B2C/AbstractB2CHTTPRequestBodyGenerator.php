<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\B2C;

use PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\IHTTPRequestBodyGenerator;
use PimDataPostBundle\Model\Types\APIOperationType;
abstract class AbstractB2CHTTPRequestBodyGenerator implements IHTTPRequestBodyGenerator
{
    public $graphNo=3;   //Number of graphID in 1 graphs
    
    public $subRequestNo=2;   // Number of subrequest in 1 composite request

    public $startBatch=1;        //start batch number

    public $table='b2c_salesforce_request';

    public abstract function getTotalBatches(APIOperationType $operationType = null): int;

    public abstract function getHTTPRequestBodyByBatchNumber(int $batch, APIOperationType $operationType = null): string;

}