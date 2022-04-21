<?php
namespace PimDataPostBundle\Lib\HTTPResponseHandler\B2B;

use PimDataPostBundle\AttributeConfigProvider\B2B\B2BCategoryAttributeConfigProvider;
use PimDataPostBundle\Lib\HTTPResponseHandler\HTTPResponseHandlerHelper;
use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;
use PimDataPostBundle\Lib\HTTPResponseHandler\B2B\B2BHTTPResponseHandlerDao;
use PimDataPostBundle\Lib\Constants;
use GuzzleHttp\Psr7\Response;
class B2BProductCategoryRelationHTTPResponseHandler extends AbstractB2BHTTPResponseHandler
{
    private $helper;

    public function __construct()
    {
        $this->helper = new HTTPResponseHandlerHelper();
    }

    public function handleResponse(Response $responseResult, int $responseTimestamp): bool
    {
        $responseArr= json_decode($responseResult->getBody()->getContents(),true);
        if(isset($responseArr['graphs']))
        {
            foreach($responseArr['graphs'] as $graphArr)
            {
                foreach($graphArr['graphResponse']['compositeResponse'] as $response)
                {
                    if($this->isSuccessResponse($response)=== true)
                    {
                        $this->updateSuccessRecords($response['referenceId'],
                                                $response['httpStatusCode'],
                                                $response['body'],
                                                $responseTimestamp);
                    }
                    else
                    {
                        $this->updateFailedRecords($response['referenceId'],
                                                $response['httpStatusCode'],
                                                $response['body'],
                                                $responseTimestamp);
                    }
                }
            }
            return true;
        }
        else
        {
            /*    create log in log files      */
            return false;
        }    
        
    }

    private function isSuccessResponse($response): bool
    {
        if(($response['httpStatusCode']===200 || $response['httpStatusCode']===201) && (isset($response['body']['success']) && $response['body']['success']===true))
        {
            return  true;
        }
        return  false;
        
    }

    private function updateSuccessRecords(string $referenceId, int $responseStatus,  array $responseBody, int $responseTimestamp): bool
    {
       $this->helper->updateSuccessRecords($referenceId, $responseStatus, $responseTimestamp);    
       return true;
    }

    private function updateFailedRecords(string $referenceId, int $responseStatus, array $responseBody, int $responseTimestamp): bool
    {

        return  $this->helper->updateFailedRecords($referenceId,$responseStatus,
                                                    json_encode($responseBody),
                                                    $responseTimestamp);
    }
    
}