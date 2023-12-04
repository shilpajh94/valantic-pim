<?php
namespace PimDataPostBundle\Lib\HTTPResponseHandler;

use GuzzleHttp\Psr7\Response;
interface IHTTPResponseHandler
{
    
    public function handleResponse(Response $response, int $responseTimestamp);
    
}

