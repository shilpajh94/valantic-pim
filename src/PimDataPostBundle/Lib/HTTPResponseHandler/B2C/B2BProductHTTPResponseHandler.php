<?php
namespace PimDataPostBundle\Lib\HTTPResponseHandler\B2C;


use PimDataPostBundle\Lib\HTTPResponseHandler\B2C\HTTPResponseHandlerHelper;
use PimDataPostBundle\Lib\Constants;
use GuzzleHttp\Psr7\Response;
class B2CProductHTTPResponseHandler extends AbstractB2CHTTPResponseHandler
{
    private $helper;

    public function __construct()
    {
        $this->helper = new HTTPResponseHandlerHelper();
    }

    public function handleResponse(Response $responseResult): bool
    {
        return true;
    }
  
}
