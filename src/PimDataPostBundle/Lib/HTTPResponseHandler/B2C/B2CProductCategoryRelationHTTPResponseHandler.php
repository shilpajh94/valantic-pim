<?php
namespace PimDataPostBundle\Lib\HTTPResponseHandler\B2C;

use PimDataPostBundle\Lib\HTTPResponseHandler\B2C\B2CHTTPResponseHandlerHelper;
use PimDataPostBundle\Lib\Constants;
use GuzzleHttp\Psr7\Response;
class B2CProductCategoryRelationHTTPResponseHandler extends AbstractB2CHTTPResponseHandler
{
    private $helper;

    private $externalIdForCurrentRequest;

    public function __construct()
    {
        $this->helper = new B2CHTTPResponseHandlerHelper();    
    }

    public function handleResponse(Response $responseResult, int $responseTimestamp): bool
    {
        $responseArr= json_decode($responseResult->getBody()->getContents(),true);
        if(isset($responseArr['id']) && ($responseResult->getStatusCode() == 200 || $responseResult->getStatusCode() == 201) )
        {
            return $this->updateSuccessRecord($this->externalIdForCurrentRequest, $responseResult->getStatusCode(), $responseTimestamp);
        }else {
            return $this->helper->updateFailedRecord($this->externalIdForCurrentRequest, $responseResult->getStatusCode(), json_encode($responseArr['fault']), $responseTimestamp);
        }    
    }

    public function setExternalIdForCurrentRequest(string $externalIdForCurrentRequest): void
    {
        $this->externalIdForCurrentRequest = $externalIdForCurrentRequest;
    }

    private function updateSuccessRecord(string $externalId, int $statusCode, int $responseTimestamp): bool
    {
        $this->helper->updateSuccessRecord($externalId, $statusCode, $responseTimestamp);
        return true;
    }

}
