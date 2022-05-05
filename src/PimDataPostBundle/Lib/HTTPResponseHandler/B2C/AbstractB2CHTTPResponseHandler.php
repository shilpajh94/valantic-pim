<?php
namespace PimDataPostBundle\Lib\HTTPResponseHandler\B2C;

use PimDataPostBundle\Lib\HTTPResponseHandler\IHTTPResponseHandler;
use GuzzleHttp\Psr7\Response;
abstract class AbstractB2CHTTPResponseHandler implements IHTTPResponseHandler
{
    
    public abstract function handleResponse(Response $responseString, int $responseTimestamp): bool;
    
  
    
}

