<?php
namespace PimDataPostBundle\Lib\HTTPRequestGenerator\B2B;

use GuzzleHttp\Psr7\Request;
use PimDataPostBundle\Lib\Util;
class B2BHTTPRequestGeneratorHelper
{
    public function getRequestMethod():string
    {
        return 'POST';
    }

    public function getRequestHeaders(bool $forceNewToken = false): array
    {
        return Util::getB2BRequestHeader($forceNewToken);
    }
}