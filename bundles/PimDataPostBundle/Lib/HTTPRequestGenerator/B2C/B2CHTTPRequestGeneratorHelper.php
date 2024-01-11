<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\B2C;

use PimDataPostBundle\Lib\Util;
class B2CHTTPRequestGeneratorHelper 
{
       
    public function getRequestHeaders(bool $forceNewToken = false): array
    {
        return Util::getB2CRequestHeader($forceNewToken);
    }

    public function getBodyFromRequestBody(string $request): string
    {
        $decodeRequest = json_decode($request, true);
        $body = $decodeRequest['body'];
        return json_encode($body);
    }

    public function getRequestMethod(string $request): string
    {
        $decodeRequest = json_decode($request, true);
        return $decodeRequest['method'];
    }
    
}