<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\B2B;

use PimDataPostBundle\Lib\HTTPRequestGenerator\IHTTPRequestGenerator;

abstract class AbstractB2BHTTPRequestGenerator implements IHTTPRequestGenerator
{
    public $startBatch = 1;  // start batch number


}