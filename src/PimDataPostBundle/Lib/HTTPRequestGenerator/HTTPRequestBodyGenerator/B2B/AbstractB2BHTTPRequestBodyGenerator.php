<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\B2B;

use PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\IHTTPRequestBodyGenerator;

abstract class AbstractB2BHTTPRequestBodyGenerator implements IHTTPRequestBodyGenerator
{
    public $graphNo= 10;   //Number of graphID in 1 graphs
    
    public $subRequestNo= 50;   // Number of subrequest in 1 composite request

    public $startBatch=1;        //start batch number

    public $table='b2b_salesforce_request';

    public abstract function getTotalBatches(): int;

    public abstract function getHTTPRequestBodyByBatchNumber(int $batch): string;

}