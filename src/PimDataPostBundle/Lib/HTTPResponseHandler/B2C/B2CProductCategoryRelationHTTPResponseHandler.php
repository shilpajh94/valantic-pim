<?php
namespace PimDataPostBundle\Lib\HTTPResponseHandler\B2C;

use PimDataPostBundle\Lib\HTTPResponseHandler\B2C\B2CHTTPResponseHandlerHelper;
use PimDataPostBundle\Lib\Constants;
use GuzzleHttp\Psr7\Response;
use PimDataPostBundle\Lib\Util;

class B2CProductCategoryRelationHTTPResponseHandler extends AbstractB2CHTTPResponseHandler
{
    private $helper;

    private $externalIdForCurrentRequest;
    
    private $dao;

    public function __construct()
    {
        $this->helper = new B2CHTTPResponseHandlerHelper();
        $this->dao = new B2CHTTPResponseHandlerDao(Constants::B2C_PRODUCT_TEMP_TABLE_NAME,Constants::B2C_PRODUCT_MASTER_TABLE_NAME);    
    }

    public function handleResponse(Response $responseResult, int $responseTimestamp): bool
    {
        $responseArr= json_decode($responseResult->getBody()->getContents(),true);
        if(isset($responseArr['_resource_state']) && ($responseResult->getStatusCode() == 200 || $responseResult->getStatusCode() == 201) )
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
        $pimId = $this->helper->updateSuccessRecord($externalId, $statusCode, $responseTimestamp);
        $productId = explode("_", $pimId)[0];
        // it could be the case that the move operation has already been performed by the product response handler
        if( !in_array($productId, Util::getB2CSuccessIds()) ){
            $this->dao->updateCategoryInProductMasterFromTemp($productId);
        }
        return true;
    }

}
