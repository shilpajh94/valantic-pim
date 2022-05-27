<?php

namespace PimDataPostBundle\PimDataPoster\B2C\IFSPTG;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\DeltaManager\B2C\B2CProductDeltaManager;
use PimDataPostBundle\Lib\EnforcedRecordsProvider\B2C\B2CProductEnforcedRecordsProvider;
use PimDataPostBundle\Lib\HTTPRequestGenerator\B2C\B2CProductHTTPRequestGenerator;
use PimDataPostBundle\Lib\HTTPResponseHandler\B2C\B2CProductHTTPResponseHandler;
use PimDataPostBundle\Lib\PimFailedRecordHandler\B2C\B2CPimFailedRecordHandler;
use PimDataPostBundle\Lib\RelationChangeRegistrar\B2C\B2CProductRelationChangeRegistrar;
use PimDataPostBundle\Lib\RequestBodyGenerator\B2C\B2CProductRequestBodyGenerator;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2C\B2CProductHelper;
use PimDataPostBundle\Lib\TempTablePopulator\B2C\B2CProductTempTablePopulator;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Logger\B2CLogger;
use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;
use PimDataPostBundle\Model\PersistantModel\B2CAPIRequestEntity;
use PimDataPostBundle\Model\PersistantModel\B2CProductRelationChange;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Model\Types\B2CSalesForceObjectType;
use PimDataPostBundle\PimDataPoster\IDataPoster;

class B2CProductDataPoster implements IDataPoster
{
    public function postData()
    {
        $tempTablePopulator = new B2CProductTempTablePopulator();
        $tempMasterTableMeta = new TempMasterTablesMeta(Constants::B2C_PRODUCT_TEMP_TABLE_NAME, 
                                                            Constants::B2C_PRODUCT_MASTER_TABLE_NAME, 
                                                            "basicHash", 
                                                            "relationalHash");
        $relationChangeRegistrar = new B2CProductRelationChangeRegistrar($tempMasterTableMeta);
        $deltaManager = new B2CProductDeltaManager($tempMasterTableMeta);
        $enforcedRecordProvier = new B2CProductEnforcedRecordsProvider();
        $httpRequestGenerator = new B2CProductHTTPRequestGenerator();
        $responseHandler = new B2CProductHTTPResponseHandler();
        $helper = new B2CDataPosterHelper();
        $pimFailedRecordHandler = new B2CPimFailedRecordHandler();
        $productIdsForFailureEntry = [];

        try{
            $this->deleteAllRelationChangeObjects();
            $tempTablePopulator->truncateTempTable();
            $pimModifiedRecords = $tempTablePopulator->getPimModifiedRecordIds();
            $productIdsForFailureEntry = $pimModifiedRecords;
            $this->insertProductIdsInTempTable($tempTablePopulator, $pimModifiedRecords); 

            $pimFailedRecordsToResend = $pimFailedRecordHandler->getFixedPimFailedRecord(B2CSalesForceObjectType::PRODUCT());
            $pimFailedRecordIdsToResend = $helper->getPimFailedRecordIdsFromObjects($pimFailedRecordsToResend);
            $productIdsForFailureEntry = array_merge($productIdsForFailureEntry, $pimFailedRecordIdsToResend);
            $this->insertProductIdsInTempTable($tempTablePopulator, $pimFailedRecordIdsToResend); 
            $pimFailedRecordHandler->deleteFixedPimFailedRecord($pimFailedRecordsToResend);

            $relationChangeRegistrar->registerChangedRelation();
            $deltaManager->removeHashNotChangedRecordsFromTempTable();
            $productEnforcedToPushForUpdate = $enforcedRecordProvier->getRecordsToUpdate();
            /**
             * to capture the product for which the masters in dynamic dropdonw,
             * nomenclature,fittingfamily and thread updated.
             */
            $productIdsForUpdatedMasters = $deltaManager->getProductIdsForUpdatedMaster();
            $productEnforcedToPushForUpdate = array_merge($productIdsForUpdatedMasters, $productEnforcedToPushForUpdate);
            if(count($productEnforcedToPushForUpdate) > 0){
                /**
                 * need to push the enforced records to the temp table because after successfull push to salesforce
                 * the corresponding record is moved from the temp table to the master table so that
                 * delta comparison can work fine.
                 */
                $this->insertProductIdsInTempTable($tempTablePopulator, $productEnforcedToPushForUpdate);
            }
            $recordsToUpdate = array_unique(array_merge($deltaManager->getRecordsToUpdate(), $productEnforcedToPushForUpdate));

            $recordsToCreate = $deltaManager->getRecordsToCreate();
            $productEnforcedToPushForCreate = $enforcedRecordProvier->getRecordsToCreate();
            if(count($productEnforcedToPushForCreate) > 0){
                /**
                 * need to push the enforced records to the temp table because after successfull push to salesforce
                 * the corresponding record is moved from the temp table to the master table so that
                 * delta comparison can work fine.
                 */
                $this->insertProductIdsInTempTable($tempTablePopulator, $productEnforcedToPushForCreate);
            }
            $recordsToCreate = array_unique(array_merge($recordsToCreate, $productEnforcedToPushForCreate));
            
            $this->createAPIRequestEntityForRecords($recordsToUpdate, APIOperationType::UPDATE(), $tempTablePopulator);
            $this->createAPIRequestEntityForRecords($recordsToCreate, APIOperationType::CREATE(), $tempTablePopulator);

            $helper->sendAllRequestsToSFAndHandleResponses($httpRequestGenerator, $responseHandler);
    
        }catch(\Throwable $throwable){
            B2CLogger::getInstace()->error( get_class($throwable) . " in B2CProductDataPoster: " . $throwable->getMessage() .". StackTrace: " .$throwable->getTraceAsString());
            $helper->addPimFailedRecords($productIdsForFailureEntry, $throwable, B2CSalesForceObjectType::PRODUCT() );
            Util::setPIMFailureFlag();
        }
           
    }

    private function createAPIRequestEntityForRecords(array $records, 
                                                            APIOperationType $operationType, 
                                                            B2CProductTempTablePopulator $tempTablePopulator)
    {
        $requestBodyGenerator = new B2CProductRequestBodyGenerator();
        $savedRequestIds = [];
        $records = $tempTablePopulator->filterIFSPTGProducts($records);

        foreach($records as $recordPimId){
            // there is a probability of duplicate requests here, so handling with following
            if( in_array($recordPimId, $savedRequestIds) ){
                continue;
            }
            $tempTableData = $tempTablePopulator->getExistingTempTableData($recordPimId);

            $currTime = time();
            $requestBody = $requestBodyGenerator->generateRequestBody($tempTableData);
            $apiRequestEntity = new B2CAPIRequestEntity();
            $apiRequestEntity->setBody(json_encode($requestBody));
            $apiRequestEntity->setOperationType($operationType);
            $apiRequestEntity->setSFObjectType(B2CSalesForceObjectType::PRODUCT());
    
            $apiRequestEntity->setexternalID(B2CProductHelper::getExternalId($tempTableData));
            $apiRequestEntity->setPimId($tempTableData["o_id"]);
            $apiRequestEntity->setReferenceId($recordPimId . "_" . $currTime);
            $apiRequestEntity->setBusinessUnit($tempTableData["BusinessUnit"]);
            $apiRequestEntity->setCreationDate($currTime);
            $apiRequestEntity->save();

            $savedRequestIds[] = $recordPimId;
            
        }
    }

    private function insertProductIdsInTempTable(B2CProductTempTablePopulator $tempTablePopulator, array $ids)
    {
        $ids = $tempTablePopulator->filterIFSPTGProducts($ids);
        $tempTableData = $tempTablePopulator->getTempTableDataForIds($ids);
        $tempTableDataWithHashes = $tempTablePopulator->addHashesToTempTableData($tempTableData);
        $tempTablePopulator->insertDataInTempTable($tempTableDataWithHashes);
    }

    private function deleteAllRelationChangeObjects()
    {
        $list = new B2CProductRelationChange\Listing();
        foreach($list as $obj){
            $obj->delete();
        }
    }
}