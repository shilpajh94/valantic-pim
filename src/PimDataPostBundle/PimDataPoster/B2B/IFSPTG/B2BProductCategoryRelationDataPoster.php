<?php

namespace PimDataPostBundle\PimDataPoster\B2B\IFSPTG;

use PimDataPostBundle\Lib\HTTPRequestGenerator\B2B\B2BProductCategoryRelationHTTPRequestGenerator;
use PimDataPostBundle\Lib\HTTPResponseHandler\B2B\B2BProductCategoryRelationHTTPResponseHandler;
use PimDataPostBundle\Lib\RelationChangeProvider\B2B\CategoryRelationChangeProvider;
use PimDataPostBundle\Lib\RequestBodyGenerator\B2B\B2BProductCategoryRelationRequestBodyGenerator;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2B\B2BProductCategoryRelationHelper;
use PimDataPostBundle\Model\PersistantModel\B2BAPIRequestEntity;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
use PimDataPostBundle\PimDataPoster\IDataPoster;

class B2BProductCategoryRelationDataPoster implements IDataPoster
{
    public function postData()
    {
        $relationChangeProvider = new CategoryRelationChangeProvider();
        $requestBodyGenerator = new B2BProductCategoryRelationRequestBodyGenerator();
        $httpRequestGenerator = new B2BProductCategoryRelationHTTPRequestGenerator();
        $responseHandler = new B2BProductCategoryRelationHTTPResponseHandler();
        $helper = new B2BDataPosterHelper();

        $level4CategoriesRelationObject = $relationChangeProvider->getIFSSIOPLevel4Categories();
        $level6CategoriesRelationObject = $relationChangeProvider->getPTGSIOPLevel6Categories();

        $this->createAPIRequestEntityForRelationChangeObjects($level4CategoriesRelationObject, $requestBodyGenerator);
        $this->createAPIRequestEntityForRelationChangeObjects($level6CategoriesRelationObject, $requestBodyGenerator);

        $helper->sendAllRequestsToSFAndHandleResponses($httpRequestGenerator, $responseHandler);
    }


    private function createAPIRequestEntityForRelationChangeObjects(array $relationChangeObjects, 
                                                        B2BProductCategoryRelationRequestBodyGenerator $requestBodyGenerator): void
    {
        foreach($relationChangeObjects as $relationChangeObject){
            $requestBody = $requestBodyGenerator->generateRequestBody($relationChangeObject);

            $apiRequestEntity = new B2BAPIRequestEntity();
            $apiRequestEntity->setBody(json_encode($requestBody,JSON_UNESCAPED_SLASHES));
            $apiRequestEntity->setOperationType(APIOperationType::UPDATE());
            $apiRequestEntity->setSFObjectType(B2BSalesForceObjectType::PRODUCT_CATEGORY_PRODUCT());
    
            $externalId = B2BProductCategoryRelationHelper::getExternalId($relationChangeObject);
            $apiRequestEntity->setexternalID(B2BProductCategoryRelationHelper::getExternalId($relationChangeObject));
            $apiRequestEntity->setPimId($relationChangeObject->getProductId() . "_" . $relationChangeObject->getNewValue());
            $apiRequestEntity->setReferenceId($externalId . "_" . time());
            $apiRequestEntity->save();
        }
    }
}