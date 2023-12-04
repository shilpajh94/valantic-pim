<?php
namespace PimDataPostBundle\Lib\HTTPResponseHandler\B2C;

use GuzzleHttp\Psr7\Response;
abstract class AbstractB2CHTTPResponseHandler implements IB2CHTTPResponseHandler
{ 
    public abstract function handleResponse(Response $responseString, int $responseTimestamp): bool;
     
}

