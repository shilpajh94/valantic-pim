<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\B2B;

use PimDataPostBundle\Lib\HTTPRequestGenerator\HTTPRequestBodyGenerator\IHTTPRequestBodyGenerator;

abstract class AbstractB2BHTTPRequestBodyGenerator implements IHTTPRequestBodyGenerator
{
    public $graphNo=1;   //Number of graphID in 1 graphs
    
    public $subRequestNo=1;   // Number od subrequest in 1 composite request

    public $INDEX=0;

    public $table='b2b_salesforce_request';

    public abstract function getTotalBatches(): int;

    public abstract function getHTTPRequestBodyByBatchNumber(int $batch): string;

}