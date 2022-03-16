<?php
namespace PimDataPostBundle\Lib\HTTPResponseHandler\B2B;

use PimDataPostBundle\Lib\HTTPResponseHandler\IHTTPResponseHandler;
use GuzzleHttp\Psr7\Response;
abstract class AbstractB2BHTTPResponseHandler implements IHTTPResponseHandler
{
    
    public abstract function handleResponse(Response $responseString);
    
  
    
}

