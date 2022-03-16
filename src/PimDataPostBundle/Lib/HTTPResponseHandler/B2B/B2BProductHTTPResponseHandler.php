<?php
namespace PimDataPostBundle\Lib\HTTPResponseHandler\B2B;

use PimDataPostBundle\AttributeConfigProvider\B2B\B2BProductAttributeConfigProvider;
use PimDataPostBundle\Lib\HTTPResponseHandler\HTTPResponseHandlerHelper;
use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;
use PimDataPostBundle\Lib\HTTPResponseHandler\B2B\Dao\B2BProductHTTPResponseHandlerDao;
use PimDataPostBundle\Lib\Constants;
use GuzzleHttp\Psr7\Response;
class B2BProductHTTPResponseHandler extends AbstractB2BHTTPResponseHandler
{
    private $helper;
    private $attributeConfigProvider;
    private $b2bProductHTTPResponseHandlerDao;

    public function __construct()
    {
        $this->helper = new HTTPResponseHandlerHelper();
        $this->attributeConfigProvider = new B2BProductAttributeConfigProvider();
        $this->b2bProductHTTPResponseHandlerDao = new B2BProductHTTPResponseHandlerDao(Constants::B2B_PRODUCT_TEMP_TABLE_NAME,Constants::B2B_PRODUCT_MASTER_TABLE_NAME);
    }

    public function handleResponse(Response $responseString): bool
    {
        $responseArr= json_decode($responseString->getBody()->getContents(),true);
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
                                                $response['body']);
                    }
                    else
                    {
                        $this->updateFailedRecords($response['referenceId'],
                                                $response['httpStatusCode'],
                                                $response['body']);
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
        if($response['httpStatusCode']===200 || $response['httpStatusCode']===201)
        {
            if(isset($response['body']['success']) && $response['body']['success']===true)
            {
                return  true;
            }
        }
        return  false;
        
    }

    private function updateSuccessRecords(string $referenceId, int $responseStatus,  array $responseBody): bool
    {
       $salesforceId = $responseBody['id'];
       $pimId =  $this->helper->updateSuccessRecords($referenceId, $responseStatus);   
       if($pimId != 0)
       {
        $this->b2bProductHTTPResponseHandlerDao->moveTempToMaster($pimId);
        $this->insertSalesforceId($pimId,$salesforceId);
       }  
       return true;
    }

    private function updateFailedRecords(string $referenceId, int $responseStatus, array $responseBody): bool
    {

        return  $this->helper->updateFailedRecords($referenceId,$responseStatus,
                                                    json_encode($responseBody));
    }
    
    private function insertSalesforceId(int $pimId, string $salesforceId): bool
    {
        return $this->helper->insertSalesforceId($pimId,$salesforceId);
    }
      
}