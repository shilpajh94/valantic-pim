<?php

namespace PimDataPostBundle\PimDataPoster\B2B\IFSPTG;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\DeltaManager\B2B\B2BProductMediaDeltaManager;
use PimDataPostBundle\Lib\EnforcedRecordsProvider\B2B\B2BProductMediaRelationEnforcedRecordsProvider;
use PimDataPostBundle\Lib\HTTPRequestGenerator\B2B\B2BProductMediaHTTPRequestGenerator;
use PimDataPostBundle\Lib\HTTPResponseHandler\B2B\B2BProductMediaHTTPResponseHandler;
use PimDataPostBundle\Lib\PimFailedRecordHandler\B2B\B2BPimFailedRecordHandler;
use PimDataPostBundle\Lib\RelationChangeProvider\B2B\MediaRelationChangeProvider;
use PimDataPostBundle\Lib\RequestBodyGenerator\B2B\B2BProductMediaRequestBodyGenerator;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Logger\B2BLogger;
use PimDataPostBundle\Model\PersistantModel\B2BAPIRequestEntity;
use PimDataPostBundle\Model\PersistantModel\B2BProductRelationChange;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
use PimDataPostBundle\Model\Types\PimFieldType;
use PimDataPostBundle\PimDataPoster\IDataPoster;

class B2BProductMediaPoster implements IDataPoster
{
    private $pimIdSeparator = "_";

    public function postData()
    {
        $requestBodyGenerator = new B2BProductMediaRequestBodyGenerator();
        $relationChangeProvider = new MediaRelationChangeProvider();
        $httpRequestGenerator = new B2BProductMediaHTTPRequestGenerator();
        $responseHandler = new B2BProductMediaHTTPResponseHandler();
        $deltaManager = new B2BProductMediaDeltaManager();
        $helper = new B2BDataPosterHelper();
        $enforcedRecordProvier = new B2BProductMediaRelationEnforcedRecordsProvider();
        $relationObjectsForFailureEntry = [];
        $pimFailedRecordHandler = new B2BPimFailedRecordHandler();

        try{
            /**
             * get entries from relation change table
             * these are the entries whefe the relation was updated
             */
            $imageRelationChangeObjects = $relationChangeProvider->getProductMediaImage();
            $advancedManyToManyRelationChangeObjects = $relationChangeProvider->getProductMediaAdvanceManyToManyRelation();

            $relationObjectsForFailureEntry = array_merge($imageRelationChangeObjects, $advancedManyToManyRelationChangeObjects);

            $mediaRelationsObjectsEnforcedToUpdate = $enforcedRecordProvier->getUpdateEnforcedRelationObject();
            $mediaRelationsObjectsEnforcedToDelete = $enforcedRecordProvier->getDeleteEnforcedRelationObject();

            /**
             * $responseStructure = [
                [asset_id1] => [ 
                                "Document" => [product_id1,product_id2,product_id3],
                                ]
                ],
                [asset_id2] => [ 
                                "Document" => [product_id1,product_id2,product_id3]
                                ]
                ]
            ];
            */

            /**
             * receiving only the assets -> type = document & updated in update window & present in Document column in product master
             * this is to track the changes in media type in asset properties
             */
            $updatedAssets = $deltaManager->getAssetsUpdatedRecords();
            $advancedManyToManyRelationChangeObjectsForUpdatedAssets = $this->createRelationChangeObjectsForUpdatedDocuments($updatedAssets);
            $relationObjectsForFailureEntry = array_merge($relationObjectsForFailureEntry, $advancedManyToManyRelationChangeObjectsForUpdatedAssets);

            $deletedAssets = $deltaManager->getAssetsDeletedRecords();
            $relationChangeObjectsForDeletedImages =  $this->createRelationChangeObjectsForDeletedAssets($deletedAssets, false);
            $relationChangeObjectsForDeletedDocuments =  $this->createRelationChangeObjectsForDeletedAssets($deletedAssets, true);

            $relationObjectsForFailureEntry = array_merge($relationObjectsForFailureEntry, $relationChangeObjectsForDeletedImages, $relationChangeObjectsForDeletedDocuments);


            $pimFailedRecordsToResend = $pimFailedRecordHandler->getFixedPimFailedRecord(B2BSalesForceObjectType::PRODUCT_MEDIA());
            $relationChangeObjectsToResend = $this->getRelationObjectFromPimFailedRecords($pimFailedRecordsToResend);


            $uniqueRelationChangeObjects = $this->mergeAndRemoveDuplicateRelationObjects($imageRelationChangeObjects,
                                                                                            $advancedManyToManyRelationChangeObjects,
                                                                                            $mediaRelationsObjectsEnforcedToUpdate,
                                                                                            $mediaRelationsObjectsEnforcedToDelete,
                                                                                            $advancedManyToManyRelationChangeObjectsForUpdatedAssets,
                                                                                            $relationChangeObjectsForDeletedImages,
                                                                                            $relationChangeObjectsForDeletedDocuments,
                                                                                            $relationChangeObjectsToResend
                                                                                        );

            $this->createAPIRequestEntityForRelationChangeObjects($uniqueRelationChangeObjects, $requestBodyGenerator);

            $relationObjectsForFailureEntry = array_merge($relationObjectsForFailureEntry, $relationChangeObjectsToResend);
            $pimFailedRecordHandler->deleteFixedPimFailedRecord($pimFailedRecordsToResend);

            $helper->sendAllRequestsToSFAndHandleResponses($httpRequestGenerator, $responseHandler, APIOperationType::DELETE());
            $helper->sendAllRequestsToSFAndHandleResponses($httpRequestGenerator, $responseHandler, APIOperationType::UPDATE());
            $helper->sendAllRequestsToSFAndHandleResponses($httpRequestGenerator, $responseHandler, APIOperationType::CREATE());

        }catch(\Throwable $throwable){
            B2BLogger::getInstace()->error( get_class($throwable) . " in B2BProductMediaPoster: " . $throwable->getMessage() .". StackTrace: " .$throwable->getTraceAsString());
            $failureRecordids = $this->getPimIdsForRelationObjects($relationObjectsForFailureEntry);
            $helper->addPimFailedRecords($failureRecordids, $throwable, B2BSalesForceObjectType::PRODUCT_MEDIA() );
            Util::setPIMFailureFlag();
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

    private function createAPIRequestEntityForRelationChangeObjects(array $relationChangeObjects, 
                                                            B2BProductMediaRequestBodyGenerator $requestBodyGenerator): void
    {
        foreach($relationChangeObjects as $relationChangeObject){
            $attributeName = $relationChangeObject->getAttributeName();
            if($attributeName != "Document"){
                $requestBodyParams = $requestBodyGenerator->generateRequestBodyForImage($relationChangeObject);
            }else{
                $requestBodyParams = $requestBodyGenerator->generateRequestBodyForDocument($relationChangeObject);
            }
            $currTime = time();

            foreach($requestBodyParams as $requestBodyParam)
            {
                $apiRequestEntity = new B2BAPIRequestEntity();
                $apiRequestEntity->setBody(json_encode($requestBodyParam["body"],JSON_UNESCAPED_SLASHES));
                $apiRequestEntity->setOperationType($requestBodyParam["operationType"]);
                $apiRequestEntity->setSFObjectType(B2BSalesForceObjectType::PRODUCT_MEDIA() );
    
                $externalId = $requestBodyParam["externalId"];
                $pimId = $this->getPimIdForRelationChangeObject($relationChangeObject);
                $apiRequestEntity->setexternalID($externalId);
                $apiRequestEntity->setPimId($pimId);
                $apiRequestEntity->setReferenceId($externalId . "_" . $currTime);
                $apiRequestEntity->setCreationDate($currTime);
                $apiRequestEntity->save();
            }
        }
    }

    private function createRelationChangeObjectsForUpdatedDocuments(array $updatedAssets): array
    {
        $returnValue = [];
        foreach($updatedAssets as $assetId => $attrWithProductIds){
            $newValueForRelationChangeObject = ",asset|{$assetId},";
            foreach($attrWithProductIds as $attributeName => $productIds){
                foreach($productIds as $productId){
                    $relationChangeObject = new B2BProductRelationChange();
                    $relationChangeObject->setProductId($productId)
                                            ->setAttributeName($attributeName)
                                            ->setNewValue($newValueForRelationChangeObject);
                    $returnValue[] = $relationChangeObject;
                }
            }
        }
        return $returnValue;
    }

    private function createRelationChangeObjectsForDeletedAssets(array $deletedAssets, bool $getDocumentsOnly): array
    {
        $returnValue = [];
        foreach($deletedAssets as $assetId => $attrWithProductIds){
            foreach($attrWithProductIds as $attributeName => $productIds){
                if($attributeName == "Document" ){
                    $oldValueForRelationChangeObject = ",asset|{$assetId},";
                }else{
                    $oldValueForRelationChangeObject = $assetId;
                }

                if($this->continueLoopOrNot($attributeName, $getDocumentsOnly)){
                    continue;
                }

                foreach($productIds as $productId){
                    $relationChangeObject = new B2BProductRelationChange();
                    $relationChangeObject->setProductId($productId)
                                            ->setAttributeName($attributeName)
                                            ->setOldValue($oldValueForRelationChangeObject);
                    $returnValue[] = $relationChangeObject;
                }
            }
        }
        return $returnValue;
    }

    private function continueLoopOrNot(string $attributeName, bool $documentsOnly): bool
    {
        $returnValue = false;
        if($documentsOnly){
            if($attributeName != "Document" ){
                $returnValue = true;
            }
        }else{
            if($attributeName == "Document" ){
                $returnValue = true;
            }
        }
        return $returnValue;
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

    private function getPimIdForRelationChangeObject(B2BProductRelationChange $relationChangeObject)
    {
        $productId = $relationChangeObject->getProductId();
        $attributeName = $relationChangeObject->getAttributeName();
        $newValue = $relationChangeObject->getNewValue();
        $oldValue = $relationChangeObject->getOldValue();

        return $productId . $this->pimIdSeparator . $attributeName . $this->pimIdSeparator . $newValue . $this->pimIdSeparator . $oldValue;
    }

    private function getRelationObjectFromPimFailedRecords(array $pimFailedRecords): array
    {
        $relationObjects = [];
        foreach($pimFailedRecords as $failedRecord)
        {
            $failedRecordId = $failedRecord->getPimId();
            $valueArray = explode($this->pimIdSeparator, $failedRecordId);
            $newValue = $valueArray[2] == "" ? null : $valueArray[2];
            $oldValue = $valueArray[3] == "" ? null : $valueArray[3];

            $object = new B2BProductRelationChange();
            $object->setProductId($valueArray[0]);
            $object->setAttributeName($valueArray[1]);
            $object->setNewValue($newValue);
            $object->setOldValue($oldValue);

            $relationObjects[] = $object;
        }
        return $relationObjects;
    }

}