<?php
namespace PimDataPostBundle\Lib\HTTPResponseHandler\B2C;

use PimDataPostBundle\Lib\HTTPResponseHandler\B2C\B2CHTTPResponseHandlerHelper;
use PimDataPostBundle\Lib\Constants;
use GuzzleHttp\Psr7\Response;
class B2CCategoryHTTPResponseHandler extends AbstractB2CHTTPResponseHandler
{
    private $helper;

    private $dao;

    public function __construct()
    {
        $this->helper = new B2CHTTPResponseHandlerHelper();
        $this->dao = new B2CHTTPResponseHandlerDao(Constants::B2C_CATEGORY_TEMP_TABLE_NAME,Constants::B2C_CATEGORY_MASTER_TABLE_NAME);
    }

    public function handleResponse(Response $responseResult, int $responseTimestamp): bool
    {
        $responseArr= json_decode($responseResult->getBody()->getContents(),true);
        if(isset($responseArr['id']) && ($responseResult->getStatusCode() == 200 || $responseResult->getStatusCode() == 201) )
        {
            return $this->updateSuccessRecord($responseArr['id'], $responseResult->getStatusCode(), $responseTimestamp);
        }else {
            return $this->helper->updateFailedRecord($responseArr['id'], $responseResult->getStatusCode(), json_encode($responseArr['fault']), $responseTimestamp);
        }    
    }

    private function updateSuccessRecord(string $externalId, int $statusCode, int $responseTimestamp): bool
    {
        $pimID = $this->helper->updateSuccessRecord($externalId, $statusCode, $responseTimestamp);
        return $this->dao->moveTempToMaster($pimID);
    }

}
