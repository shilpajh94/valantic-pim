<?php

namespace PimDataPostBundle\Lib\HTTPRequestGenerator\B2C;

class B2CHTTPRequestGeneratorHelper 
{
   
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

    public function getRequestUrl($request): string
    {
        $decodeRequest = json_decode($request, true);
        return $decodeRequest['url'];
             
        //return $this->b2cProductHelper->getApiHost().$this->b2cProductHelper->getCompositeGraphApiUrl();
    }
    
}