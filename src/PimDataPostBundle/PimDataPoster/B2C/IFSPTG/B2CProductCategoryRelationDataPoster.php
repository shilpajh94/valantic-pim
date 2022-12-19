<?php

namespace PimDataPostBundle\PimDataPoster\B2C\IFSPTG;

use PimDataPostBundle\Lib\EnforcedRecordsProvider\B2C\B2CProductCategoryRelationEnforcedRecordsProvider;
use PimDataPostBundle\Lib\HTTPRequestGenerator\B2C\B2CProductCategoryRelationHTTPRequestGenerator;
use PimDataPostBundle\Lib\HTTPResponseHandler\B2C\B2CProductCategoryRelationHTTPResponseHandler;
use PimDataPostBundle\Lib\PimFailedRecordHandler\B2C\B2CPimFailedRecordHandler;
use PimDataPostBundle\Lib\RelationChangeProvider\B2C\CategoryRelationChangeProvider;
use PimDataPostBundle\Lib\RequestBodyGenerator\B2C\B2CProductCategoryRelationRequestBodyGenerator;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2C\B2CProductCategoryRelationHelper;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Logger\B2BLogger;
use PimDataPostBundle\Model\PersistantModel\B2CAPIRequestEntity;
use PimDataPostBundle\Model\PersistantModel\B2CProductRelationChange;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Model\Types\B2CSalesForceObjectType;
use PimDataPostBundle\PimDataPoster\IDataPoster;

class B2CProductCategoryRelationDataPoster implements IDataPoster
{
    private $pimIdSeparator = "_";

    public function postData()
    {
        $relationChangeProvider = new CategoryRelationChangeProvider();
        $requestBodyGenerator = new B2CProductCategoryRelationRequestBodyGenerator();
        $httpRequestGenerator = new B2CProductCategoryRelationHTTPRequestGenerator();
        $responseHandler = new B2CProductCategoryRelationHTTPResponseHandler();
        $helper = new B2CDataPosterHelper();
        $enforcedRecordProvier = new B2CProductCategoryRelationEnforcedRecordsProvider();
        $pimFailedRecordHandler = new B2CPimFailedRecordHandler();
        $relationObjectsForFailureEntry = [];

        try{
           // $level4CategoriesRelationObject = $relationChangeProvider->getCategories();
            $productCategoriesRelationObject = $relationChangeProvider->getB2CCategories();
            $categoryRelationsObjectsEnforcedToPush = $enforcedRecordProvier->getEnforcedRelationObject();
    
            //$relationObjectsForFailureEntry = array_merge($level4CategoriesRelationObject, $level6CategoriesRelationObject);

            $pimFailedRecordsToResend = $pimFailedRecordHandler->getFixedPimFailedRecord(B2CSalesForceObjectType::PRODUCT_CATEGORY_PRODUCT());
            $relationChangeObjectsToResent = $this->getRelationObjectFromPimFailedRecords($pimFailedRecordsToResend);

            $uniqueRelationChangeObjects = $this->mergeAndRemoveDuplicateRelationObjects($productCategoriesRelationObject,
                                                            $categoryRelationsObjectsEnforcedToPush,
                                                            $relationChangeObjectsToResent);
            $this->createAPIRequestEntityForRelationChangeObjects($uniqueRelationChangeObjects, $requestBodyGenerator);

            $relationObjectsForFailureEntry = array_merge($relationObjectsForFailureEntry, $relationChangeObjectsToResent);
            $pimFailedRecordHandler->deleteFixedPimFailedRecord($pimFailedRecordsToResend);

            $helper->sendAllRequestsToSFAndHandleResponses($httpRequestGenerator, $responseHandler);
        }catch(\Throwable $throwable){
            B2BLogger::getInstace()->error( get_class($throwable) . " in B2CProductCategoryRelationDataPoster: " . $throwable->getMessage() .". StackTrace: " .$throwable->getTraceAsString());
            $failureRecordids = $this->getPimIdsForRelationObjects($relationObjectsForFailureEntry);
            $helper->addPimFailedRecords($failureRecordids, $throwable, B2CSalesForceObjectType::PRODUCT_CATEGORY_PRODUCT() );
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
            $object = new B2CProductRelationChange();
            $object->setProductId($idsArray[0]);
            $object->setNewValue($idsArray[1]);

            $relationObjects[] = $object;
        }
        return $relationObjects;
    }

    private function createAPIRequestEntityForRelationChangeObjects(array $relationChangeObjects, 
                                                        B2CProductCategoryRelationRequestBodyGenerator $requestBodyGenerator): void
    {
        foreach($relationChangeObjects as $relationChangeObject){
            $requestBodyArray = $requestBodyGenerator->generateRequestBody($relationChangeObject);

            foreach($requestBodyArray as $key => $requestBody)
            {
                $currTime = time();

                $apiRequestEntity = new B2CAPIRequestEntity();
                $apiRequestEntity->setBody(json_encode($requestBody,JSON_UNESCAPED_SLASHES));
                $apiRequestEntity->setOperationType($key);
                $apiRequestEntity->setSFObjectType(B2CSalesForceObjectType::PRODUCT_CATEGORY_PRODUCT());
                $externalId = B2CProductCategoryRelationHelper::getExternalIdByOperationType($relationChangeObject, $key);
                $apiRequestEntity->setexternalID($externalId);
                $apiRequestEntity->setPimId($relationChangeObject->getProductId() . "_" . trim($relationChangeObject->getNewValue(),","));
                $apiRequestEntity->setReferenceId($externalId . "_" . $currTime);
                $apiRequestEntity->setCreationDate($currTime);
                $apiRequestEntity->save();
            }
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

    private function getPimIdForRelationChangeObject(B2CProductRelationChange $relationChangeObject): string
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