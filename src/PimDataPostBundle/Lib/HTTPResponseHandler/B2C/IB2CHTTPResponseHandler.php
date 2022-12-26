<?php
namespace PimDataPostBundle\Lib\HTTPResponseHandler\B2C;

use PimDataPostBundle\Lib\HTTPResponseHandler\IHTTPResponseHandler;
interface IB2CHTTPResponseHandler extends IHTTPResponseHandler
{
    
    public function setExternalIdForCurrentRequest(string $externalIdForCurrentRequest): void;
    
}

