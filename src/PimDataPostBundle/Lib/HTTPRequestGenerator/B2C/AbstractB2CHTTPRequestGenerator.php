<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\B2C;

use PimDataPostBundle\Lib\HTTPRequestGenerator\IHTTPRequestGenerator;

abstract class AbstractB2CHTTPRequestGenerator implements IHTTPRequestGenerator
{
    public $startBatch = 1;  // start batch number

    public abstract function getRequest(int $batch);

    public abstract function getTotalBatches(): int;
    
}