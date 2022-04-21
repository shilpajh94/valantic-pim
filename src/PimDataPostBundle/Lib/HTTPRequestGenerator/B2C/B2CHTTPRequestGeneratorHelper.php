<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\B2C;

use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Services\TokenAuthService;
class B2CHTTPRequestGeneratorHelper 
{
       
    public function getRequestHeaders(): array
    {
        $b2cAuthToken = Util::getService(TokenAuthService::class)->getB2CAuthToken();
        $authHeader="Bearer ".$b2cAuthToken->getTokenString();
        return array(
            'Content-Type' => 'application/json',
            'Authorization' => $authHeader
        );
    }

    public function geBodyFromRequestBody($request)
    {
        $decodeRequest = json_decode($request, true);
        $body = $decodeRequest['body'];
        return json_encode($body);
    }

    public function getRequestMethod($request)
    {
        $decodeRequest = json_decode($request, true);
        return $decodeRequest['method'];
    }
    
}