<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\B2B;

use PimDataPostBundle\Lib\HTTPRequestGenerator\IHTTPRequestGenerator;

abstract class AbstractB2BHTTPRequestGenerator implements IHTTPRequestGenerator
{
    public abstract function getRequest(int $batch);

    public abstract function getTotalBatches(): int;
    

}