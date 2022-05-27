<?php

namespace PimDataPostBundle\PimDataPoster\B2B\IFSPTG;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\DeltaManager\B2B\B2BCategoryDeltaManager;
use PimDataPostBundle\Lib\EnforcedRecordsProvider\B2B\B2BCategoryEnforcedRecordsProvider;
use PimDataPostBundle\Lib\HTTPRequestGenerator\B2B\B2BCategoryHTTPRequestGenerator;
use PimDataPostBundle\Lib\HTTPResponseHandler\B2B\B2BCategoryHTTPResponseHandler;
use PimDataPostBundle\Lib\PimFailedRecordHandler\B2B\B2BPimFailedRecordHandler;
use PimDataPostBundle\Lib\RequestBodyGenerator\B2B\B2BCategoryRequestBodyGenerator;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2B\B2BCategoryHelper;
use PimDataPostBundle\Lib\TempTablePopulator\B2B\B2BCategoryTempTablePopulator;
use PimDataPostBundle\Lib\TempTablePopulator\CategoryActiveFlagHandler\B2BCategoryActiveFlagHandler;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Logger\B2BLogger;
use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;
use PimDataPostBundle\Model\PersistantModel\B2BAPIRequestEntity;
use PimDataPostBundle\Model\PersistantModel\B2BPimFailureRecord;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
use PimDataPostBundle\PimDataPoster\IDataPoster;

class B2BCategoryDataPoster implements IDataPoster
{

    public function postData()
    {
        
            $tempTablePopulator = new B2BCategoryTempTablePopulator();
            $tempMasterTableMeta = new TempMasterTablesMeta(Constants::B2B_CATEGORY_TEMP_TABLE_NAME, 
                                                                Constants::B2B_CATEGORY_MASTER_TABLE_NAME, 
                                                                "basicHash", 
                                                                "relationalHash");
            $deltaManager = new B2BCategoryDeltaManager($tempMasterTableMeta);
            $enforcedRecordProvier = new B2BCategoryEnforcedRecordsProvider();
            $httpRequestGenerator = new B2BCategoryHTTPRequestGenerator();
            $responseHandler = new B2BCategoryHTTPResponseHandler();
            $helper = new B2BDataPosterHelper();
            $pimFailedRecordHandler = new B2BPimFailedRecordHandler();
            $categoryIdsForFailureEntry = [];

            try{
            $tempTablePopulator->truncateTempTable();
            $categoryIdsToBeAddedInTempTable = $this->performActiveFlagChangesAndReturnCategoriyIdsToAddInTempTable();
            $categoryIdsForFailureEntry = $categoryIdsToBeAddedInTempTable;
            /**
             * In the above piece of code
             * if the category is present in category master table
             * and if an active product do not exist in for this category in product master table
             * and if the category is present in relation table
             * -> then the active flag will NOT be turned to true here
             */
            $pimModifiedRecordIdsWhichAreAlsoPresentInMaster = $tempTablePopulator->getPimModifiedRecordIdsWhichAreAlsoPresentInMaster();
            $categoryIdsToBeAddedInTempTable = array_merge($categoryIdsToBeAddedInTempTable, $pimModifiedRecordIdsWhichAreAlsoPresentInMaster);
            $categoryIdsForFailureEntry = $categoryIdsToBeAddedInTempTable;
    
            $this->insertProductIdsInTempTable($tempTablePopulator, $categoryIdsToBeAddedInTempTable);

            $pimFailedRecordsToResend = $pimFailedRecordHandler->getFixedPimFailedRecord(B2BSalesForceObjectType::CATEGORY());
            $pimFailedRecordIdsToResend = $helper->getPimFailedRecordIdsFromObjects($pimFailedRecordsToResend);
            $categoryIdsForFailureEntry = array_merge($categoryIdsForFailureEntry, $pimFailedRecordIdsToResend);
            $this->insertProductIdsInTempTable($tempTablePopulator, $pimFailedRecordIdsToResend); 
            $pimFailedRecordHandler->deleteFixedPimFailedRecord($pimFailedRecordsToResend);

            for($level = 2; $level <= 4; $level++){
                $recordsToCreate = $deltaManager->getRecordsToCreateByLevel($level);
                $categoriesEnforcedToPushForCreate = $enforcedRecordProvier->getRecordsToCreateByLevel($level);

                if(count($categoriesEnforcedToPushForCreate) > 0){
                    $this->insertProductIdsInTempTable($tempTablePopulator, $categoriesEnforcedToPushForCreate);
                }
                $recordsToCreate = array_merge($recordsToCreate, $categoriesEnforcedToPushForCreate);
                if(!empty($recordsToCreate)){
                    $this->createAPIRequestEntityForRecords($recordsToCreate, APIOperationType::CREATE(), $tempTablePopulator);
                    $helper->sendAllRequestsToSFAndHandleResponses($httpRequestGenerator, $responseHandler);
                }
            }
    
            $categoriesEnforcedToPushForUpdate = $enforcedRecordProvier->getRecordsToUpdate();

            if(count($categoriesEnforcedToPushForUpdate) > 0){
                 /**
                 * need to push the enforced records to the temp table because after successfull push to salesforce
                 * the corresponding record is moved from the temp table to the master table so that
                 * delta comparison can work fine.
                 */
                $this->insertProductIdsInTempTable($tempTablePopulator, $categoriesEnforcedToPushForUpdate);
            }

            $recordsToUpdate = array_merge($deltaManager->getRecordsToUpdate(), $categoriesEnforcedToPushForUpdate);
            if(!empty($recordsToUpdate)){
                $this->createAPIRequestEntityForRecords($recordsToUpdate, APIOperationType::UPDATE(), $tempTablePopulator);
                $helper->sendAllRequestsToSFAndHandleResponses($httpRequestGenerator, $responseHandler);
            }
           
        }catch(\Throwable $throwable){
            B2BLogger::getInstace()->error( get_class($throwable) . " in B2BCategoryDataPoster: " . $throwable->getMessage() .". StackTrace: " .$throwable->getTraceAsString());
            $helper->addPimFailedRecords($categoryIdsForFailureEntry, $throwable, B2BSalesForceObjectType::CATEGORY());
            Util::setPIMFailureFlag();
        }
    }

    private function performActiveFlagChangesAndReturnCategoriyIdsToAddInTempTable(): array
    {
        $activeFlagHandler = new B2BCategoryActiveFlagHandler();
        $categoriyIdsInMasterTable = $activeFlagHandler->getAllCategoryIdsInMasterTable();
        $categoriyIdsWithLevelInMasterTable = $activeFlagHandler->getCategoryIdToCategoryLevelMapping($categoriyIdsInMasterTable);
        $activeFlagValues = $activeFlagHandler->getValueForActiveFlag($categoriyIdsWithLevelInMasterTable);
        $activeFlagHandler->updateActiveFlagValue($activeFlagValues);
        $categoryIdsToBeAddedInTempTable = [];

        $categoryIdsWhereRelationWithHashChanged = $activeFlagHandler->getCategoryIdsWhereRelationWithProductChanged();
        foreach($categoryIdsWhereRelationWithHashChanged as $categoryId){
            if($activeFlagHandler->isCategoryPresentInMasterTable($categoryId)){
                if(!$activeFlagHandler->isCategoryActiveInMasterTable($categoryId)){
                    $activeFlagHandler->updateActiveFlagValue([$categoryId => true]);
                }
            }else{
                $activeFlagHandler->updateActiveFlagValue([$categoryId => true]);
                $categoryIdsToBeAddedInTempTable[] = $categoryId;
            }
        }
        return $categoryIdsToBeAddedInTempTable;
    }

    private function createAPIRequestEntityForRecords(array $records, 
                                                            APIOperationType $operationType, 
                                                            B2BCategoryTempTablePopulator $tempTablePopulator): void
    {
        $b2bProductRequestBodyGenerator = new B2BCategoryRequestBodyGenerator();
        $savedRequestIds = [];
        foreach($records as $recordPimId){
            // there is a probability of duplicate requests here, so handling with following
            if( in_array($recordPimId, $savedRequestIds) ){
                continue;
            }
            $tempTableData = $tempTablePopulator->getTempTableDataForIds([$recordPimId])[0];
            $currTime = time();
            $requestBody = $b2bProductRequestBodyGenerator->generateRequestBody($tempTableData);

            $apiRequestEntity = new B2BAPIRequestEntity();
            $apiRequestEntity->setBody(json_encode($requestBody,JSON_UNESCAPED_SLASHES));
            $apiRequestEntity->setOperationType($operationType);
            $apiRequestEntity->setSFObjectType(B2BSalesForceObjectType::CATEGORY());
    
            $apiRequestEntity->setexternalID(B2BCategoryHelper::getExternalId($tempTableData));
            $apiRequestEntity->setPimId($tempTableData["o_id"]);
            $apiRequestEntity->setReferenceId($recordPimId . "_" . $currTime);
            $apiRequestEntity->setCreationDate($currTime);
            $apiRequestEntity->save();

            $savedRequestIds[] = $recordPimId;
        }
    }

    private function insertProductIdsInTempTable(B2BCategoryTempTablePopulator $tempTablePopulator, array $ids): void
    {
        $tempTableData = $tempTablePopulator->getTempTableDataForIds($ids);
        $tempTableData = $this->filterValidCategories($tempTableData);
        $tempTableDataWithHashes = $tempTablePopulator->addHashesToTempTableData($tempTableData);
        $tempTablePopulator->insertDataInTempTable($tempTableDataWithHashes);
    }

    private function filterValidCategories(array $tempTableDataOfCategories): array
    {
        $returnValue = [];
        foreach($tempTableDataOfCategories as $tempTableDataOfSingleCategory){
            if($this->isCategoryLevelValidForSF($tempTableDataOfSingleCategory["Level"])){
                $returnValue[] = $tempTableDataOfSingleCategory;
            }
        }
        return $returnValue;
    }

    private function isCategoryLevelValidForSF(string $level): bool
    {
        return in_array(strval($level), ['2','3','4']);
    }

}
