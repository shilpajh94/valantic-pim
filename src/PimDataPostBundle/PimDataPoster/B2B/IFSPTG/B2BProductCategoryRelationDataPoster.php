<?php

namespace PimDataPostBundle\PimDataPoster\B2B\IFSPTG;

use PimDataPostBundle\Lib\EnforcedRecordsProvider\B2B\B2BProductCategoryRelationEnforcedRecordsProvider;
use PimDataPostBundle\Lib\HTTPRequestGenerator\B2B\B2BProductCategoryRelationHTTPRequestGenerator;
use PimDataPostBundle\Lib\HTTPResponseHandler\B2B\B2BProductCategoryRelationHTTPResponseHandler;
use PimDataPostBundle\Lib\PimFailedRecordHandler\B2B\B2BPimFailedRecordHandler;
use PimDataPostBundle\Lib\RelationChangeProvider\B2B\CategoryRelationChangeProvider;
use PimDataPostBundle\Lib\RequestBodyGenerator\B2B\B2BProductCategoryRelationRequestBodyGenerator;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2B\B2BProductCategoryRelationHelper;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Logger\B2BLogger;
use PimDataPostBundle\Model\PersistantModel\B2BAPIRequestEntity;
use PimDataPostBundle\Model\PersistantModel\B2BProductRelationChange;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
use PimDataPostBundle\PimDataPoster\IDataPoster;

class B2BProductCategoryRelationDataPoster implements IDataPoster
{
    private $pimIdSeparator = "_";

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
            $levelCategoriesRelationObject = $relationChangeProvider->getSIOPLevel4Categories();

            $categoryRelationsObjectsEnforcedToPush = $enforcedRecordProvier->getEnforcedRelationObject();
    
            $relationObjectsForFailureEntry = $levelCategoriesRelationObject;

            $pimFailedRecordsToResend = $pimFailedRecordHandler->getFixedPimFailedRecord(B2BSalesForceObjectType::PRODUCT_CATEGORY_PRODUCT());
            $relationChangeObjectsToResent = $this->getRelationObjectFromPimFailedRecords($pimFailedRecordsToResend);

            $uniqueRelationChangeObjects = $this->mergeAndRemoveDuplicateRelationObjects($levelCategoriesRelationObject,
                                                            $categoryRelationsObjectsEnforcedToPush,
                                                            $relationChangeObjectsToResent);
            // @todo for CR: iterate all these relation objects and replace the old value and new value of categories
            // with the disgnated category value in the group
            $this->createAPIRequestEntityForRelationChangeObjects($uniqueRelationChangeObjects, $requestBodyGenerator);

            $relationObjectsForFailureEntry = array_merge($relationObjectsForFailureEntry, $relationChangeObjectsToResent);
            $pimFailedRecordHandler->deleteFixedPimFailedRecord($pimFailedRecordsToResend);

            $helper->sendAllRequestsToSFAndHandleResponses($httpRequestGenerator, $responseHandler);
        }catch(\Throwable $throwable){
            B2BLogger::getInstace()->error( get_class($throwable) . " in B2BProductCategoryRelationDataPoster: " . $throwable->getMessage() .". StackTrace: " .$throwable->getTraceAsString());
            $failureRecordids = $this->getPimIdsForRelationObjects($relationObjectsForFailureEntry);
            $helper->addPimFailedRecords($failureRecordids, $throwable, B2BSalesForceObjectType::PRODUCT_CATEGORY_PRODUCT() );
            Util::setPIMFailureFlag();
        }

    }

    private function getRelationObjectFromPimFailedRecords(array $pimFailedRecords): array
    {
        $relationObjects = [];
        foreach($pimFailedRecords as $failedRecord)
        {
            $failedRecordId = $failedRecord->getPimId();
            $idsArray = explode($this->pimIdSeparator, $failedRecordId);
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
            $currTime = time();

            $apiRequestEntity = new B2BAPIRequestEntity();
            $apiRequestEntity->setBody(json_encode($requestBody,JSON_UNESCAPED_SLASHES));
            $apiRequestEntity->setOperationType(APIOperationType::UPDATE());
            $apiRequestEntity->setSFObjectType(B2BSalesForceObjectType::PRODUCT_CATEGORY_PRODUCT());
    
            $externalId = B2BProductCategoryRelationHelper::getExternalId($relationChangeObject);
            $apiRequestEntity->setexternalID($externalId);
            $apiRequestEntity->setPimId($relationChangeObject->getProductId() . "_" . trim($relationChangeObject->getNewValue(),","));
            $apiRequestEntity->setReferenceId($externalId . "_" . $currTime);
            $apiRequestEntity->setCreationDate($currTime);
            $apiRequestEntity->save();
        }
    }

    private function getPimIdsForRelationObjects(array $relationObjects): array
    {
        $returnValue = [];
        foreach($relationObjects as $object){
            $returnValue[] = $this->getPimIdForRelationChangeObject($object);
        }
        return $returnValue;
    }

    private function getPimIdForRelationChangeObject(B2BProductRelationChange $relationChangeObject): string
    {
        return $relationChangeObject->getProductId(). $this->pimIdSeparator . $relationChangeObject->getNewValue();
    }

    private function mergeAndRemoveDuplicateRelationObjects(...$allArrays): array
    {
        $allPimIds = [];
        $returnValue = [];

        foreach($allArrays as $arrayOfRelationChangeObjects){
            foreach($arrayOfRelationChangeObjects as $object)
            {
                $pimId = $this->getPimIdForRelationChangeObject($object);
                if(!in_array($pimId, $allPimIds)){
                    $returnValue[] = $object;
                    $allPimIds[] = $pimId;
                }
            }
        }
        return $returnValue;
    }
}