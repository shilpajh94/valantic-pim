<?php
namespace PimDataPostBundle\Lib\HTTPResponseHandler\B2C;

use PimDataPostBundle\Lib\HTTPResponseHandler\B2C\B2CHTTPResponseHandlerHelper;
use PimDataPostBundle\Lib\Constants;
use GuzzleHttp\Psr7\Response;
class B2CProductCategoryRelationHTTPResponseHandler extends AbstractB2CHTTPResponseHandler
{
    private $helper;

    public function __construct()
    {
        $this->helper = new B2CHTTPResponseHandlerHelper();    
    }

    public function handleResponse(Response $responseResult): bool
    {
        $responseArr= json_decode($responseResult->getBody()->getContents(),true);
        if(isset($responseArr['id']) && ($responseResult->getStatusCode() == 200 || $responseResult->getStatusCode() == 201) )
        {
            return $this->updateSuccessRecord($responseArr['id'], $responseResult->getStatusCode());
        }else {
            return $this->helper->updateFailedRecord($responseArr['id'], $responseResult->getStatusCode(), json_encode($responseArr['fault']));
        }    
    }

    private function updateSuccessRecord(string $externalId, int $statusCode): bool
    {
        $this->helper->updateSuccessRecord($externalId, $statusCode);
        return true;
    }

}
