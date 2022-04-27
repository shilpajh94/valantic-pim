<?php
namespace PimDataPostBundle\Lib\HTTPResponseHandler\B2B;

use PimDataPostBundle\AttributeConfigProvider\B2B\B2BProductAttributeConfigProvider;
use PimDataPostBundle\Lib\HTTPResponseHandler\HTTPResponseHandlerHelper;
use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;
use PimDataPostBundle\Lib\HTTPResponseHandler\B2B\B2BHTTPResponseHandlerDao;
use PimDataPostBundle\Lib\Constants;
use GuzzleHttp\Psr7\Response;
use PimDataPostBundle\Lib\HTTPResponseHandler\B2B\Helper\B2BProductHTTPResponseHandlerHelper;
use PimDataPostBundle\Lib\Util;

class B2BProductMediaHTTPResponseHandler extends AbstractB2BHTTPResponseHandler
{
    private $helper;
    private $attributeConfigProvider;
    private $b2bProductHTTPResponseHandlerDao;
    private $productHelper;

    public function __construct()
    {
        $this->helper = new HTTPResponseHandlerHelper();
        $this->productHelper = new B2BProductHTTPResponseHandlerHelper();
        $this->attributeConfigProvider = new B2BProductAttributeConfigProvider();
        $this->b2bProductHTTPResponseHandlerDao = new B2BHTTPResponseHandlerDao(Constants::B2B_PRODUCT_TEMP_TABLE_NAME,Constants::B2B_PRODUCT_MASTER_TABLE_NAME);
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
        if( $response['httpStatusCode']===204 ){
            return true;
        }

        if(($response['httpStatusCode']===200 || $response['httpStatusCode']===201) && (isset($response['body']['success']) && $response['body']['success']===true))
        {
            return  true;
        }
        return  false;
        
    }

    private function updateSuccessRecords(string $referenceId, int $responseStatus,  ?array $responseBody, int $responseTimestamp): bool
    {
        $pimId = $this->helper->updateSuccessRecords($referenceId, $responseStatus, $responseTimestamp);  
        $productId = explode("_", $pimId)[0];
        // it could be the case that the move operation has already been performed by the product response handler
        if( !in_array($productId, Util::getB2BSuccessIds()) ){
            $this->b2bProductHTTPResponseHandlerDao->moveTempToMaster($productId);        
        }

       return true;
    }

    private function updateFailedRecords(string $referenceId, int $responseStatus, array $responseBody, int $responseTimestamp): bool
    {

        return  $this->helper->updateFailedRecords($referenceId,$responseStatus,
                                                    json_encode($responseBody),
                                                    $responseTimestamp);
    }
      
}
