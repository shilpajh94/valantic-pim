<?php

namespace PimDataPostBundle\PimDataPoster\B2B\IFSPTG;

use PimDataPostBundle\Lib\EnforcedRecordsProvider\B2B\B2BProductCategoryRelationEnforcedRecordsProvider;
use PimDataPostBundle\Lib\HTTPRequestGenerator\B2B\B2BProductCategoryRelationHTTPRequestGenerator;
use PimDataPostBundle\Lib\HTTPResponseHandler\B2B\B2BProductCategoryRelationHTTPResponseHandler;
use PimDataPostBundle\Lib\PimFailedRecordHandler\B2B\B2BPimFailedRecordHandler;
use PimDataPostBundle\Lib\RelationChangeProvider\B2B\CategoryRelationChangeProvider;
use PimDataPostBundle\Lib\RequestBodyGenerator\B2B\B2BProductCategoryRelationRequestBodyGenerator;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2B\B2BProductCategoryRelationHelper;
use PimDataPostBundle\Logger\B2BLogger;
use PimDataPostBundle\Model\PersistantModel\B2BAPIRequestEntity;
use PimDataPostBundle\Model\PersistantModel\B2BProductRelationChange;
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
        $enforcedRecordProvier = new B2BProductCategoryRelationEnforcedRecordsProvider();
        $pimFailedRecordHandler = new B2BPimFailedRecordHandler();
        $relationObjectsForFailureEntry = [];

        try{
            $level4CategoriesRelationObject = $relationChangeProvider->getIFSSIOPLevel4Categories();
            $level6CategoriesRelationObject = $relationChangeProvider->getPTGSIOPLevel6Categories();
            $categoryRelationsObjectsEnforcedToPush = $enforcedRecordProvier->getEnforcedRelationObject();
    
            $relationObjectsForFailureEntry = array_merge($level4CategoriesRelationObject, $level6CategoriesRelationObject);
            $this->createAPIRequestEntityForRelationChangeObjects($level4CategoriesRelationObject, $requestBodyGenerator);
            $this->createAPIRequestEntityForRelationChangeObjects($level6CategoriesRelationObject, $requestBodyGenerator);
            $this->createAPIRequestEntityForRelationChangeObjects($categoryRelationsObjectsEnforcedToPush, $requestBodyGenerator);

            $pimFailedRecordsToResend = $pimFailedRecordHandler->getFixedPimFailedRecord(B2BSalesForceObjectType::PRODUCT_CATEGORY_PRODUCT());
            $relationChangeObjectsToResent = $this->getRelationObjectFromPimFailedRecords($pimFailedRecordsToResend);
            $this->createAPIRequestEntityForRelationChangeObjects($relationChangeObjectsToResent, $requestBodyGenerator);
            $relationObjectsForFailureEntry = array_merge($relationObjectsForFailureEntry, $relationChangeObjectsToResent);
            $pimFailedRecordHandler->deleteFixedPimFailedRecord($pimFailedRecordsToResend);

            $helper->sendAllRequestsToSFAndHandleResponses($httpRequestGenerator, $responseHandler);
        }catch(\Throwable $throwable){
            B2BLogger::getInstace()->error( get_class($throwable) . " in B2BProductCategoryRelationDataPoster: " . $throwable->getMessage() .". StackTrace: " .$throwable->getTraceAsString());
            $failureRecordids = $this->getPimIdForRelationObjects($relationObjectsForFailureEntry);
            $this->helper->addPimFailedRecords($failureRecordids, $throwable, B2BSalesForceObjectType::PRODUCT_CATEGORY_PRODUCT() );
        }

    }

    private function getRelationObjectFromPimFailedRecords(array $pimFailedRecords): array
    {
        $relationObjects = [];
        foreach($pimFailedRecords as $failedRecord)
        {
            $failedRecordId = $failedRecord->getPimId();
            $idsArray = explode("_",$failedRecordId);
            $object = new B2BProductRelationChange();
            $object->setProductId($idsArray[0]);
            $object->setNewValue($idsArray[1]);
            $relationObjects[] = $object;
        }
        return $relationObjects;
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
            $apiRequestEntity->setexternalID($externalId);
            $apiRequestEntity->setPimId($relationChangeObject->getProductId() . "_" . $relationChangeObject->getNewValue());
            $apiRequestEntity->setReferenceId($externalId . "_" . time());
            $apiRequestEntity->save();
        }
    }

    private function getPimIdForRelationObjects(array $relationObjects): array
    {
        $returnValue = [];
        foreach($relationObjects as $object){
            $returnValue[] = $object->getProductId(). "_" . $object->getNewValue();
        }
        return $returnValue;
    }
}