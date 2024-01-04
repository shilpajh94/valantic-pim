<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\B2C;

use PimDataPostBundle\Lib\HTTPRequestGenerator\IHTTPRequestGenerator;

interface IB2CHTTPRequestGenerator extends IHTTPRequestGenerator
{

    public function getExternalIdForCurrentRequest(): string;

}