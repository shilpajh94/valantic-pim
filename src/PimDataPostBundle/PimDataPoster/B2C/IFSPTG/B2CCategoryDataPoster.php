<?php

namespace PimDataPostBundle\PimDataPoster\B2C\IFSPTG;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\DeltaManager\B2C\B2CCategoryDeltaManager;
use PimDataPostBundle\Lib\EnforcedRecordsProvider\B2C\B2CCategoryEnforcedRecordsProvider;
use PimDataPostBundle\Lib\HTTPRequestGenerator\B2C\B2CCategoryHTTPRequestGenerator;
use PimDataPostBundle\Lib\HTTPResponseHandler\B2C\B2CCategoryHTTPResponseHandler;
use PimDataPostBundle\Lib\PimFailedRecordHandler\B2C\B2CPimFailedRecordHandler;
use PimDataPostBundle\Lib\RequestBodyGenerator\B2C\B2CCategoryRequestBodyGenerator;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2C\B2CCategoryHelper;
use PimDataPostBundle\Lib\TempTablePopulator\B2C\B2CCategoryTempTablePopulator;
use PimDataPostBundle\Lib\TempTablePopulator\CategoryActiveFlagHandler\B2C\B2CCategoryActiveFlagHandler;
use PimDataPostBundle\Lib\Util;
use PimDataPostBundle\Logger\B2CLogger;
use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;
use PimDataPostBundle\Model\PersistantModel\B2CAPIRequestEntity;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Model\Types\B2CSalesForceObjectType;
use PimDataPostBundle\PimDataPoster\IDataPoster;

class B2CCategoryDataPoster implements IDataPoster
{
    public function postData()
    {
        $tempTablePopulator = new B2CCategoryTempTablePopulator();
        $tempMasterTableMeta = new TempMasterTablesMeta(Constants::B2C_CATEGORY_TEMP_TABLE_NAME, 
                                                            Constants::B2C_CATEGORY_MASTER_TABLE_NAME, 
                                                            "basicHash", 
                                                            "relationalHash");
        $deltaManager = new B2CCategoryDeltaManager($tempMasterTableMeta);
        $enforcedRecordProvier = new B2CCategoryEnforcedRecordsProvider();
        $httpRequestGenerator = new B2CCategoryHTTPRequestGenerator();
        $responseHandler = new B2CCategoryHTTPResponseHandler();
        $helper = new B2CDataPosterHelper();
        $pimFailedRecordHandler = new B2CPimFailedRecordHandler();
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

            $pimFailedRecordsToResend = $pimFailedRecordHandler->getFixedPimFailedRecord(B2CSalesForceObjectType::CATEGORY());
            $pimFailedRecordIdsToResend = $helper->getPimFailedRecordIdsFromObjects($pimFailedRecordsToResend);
            $categoryIdsForFailureEntry = array_merge($categoryIdsForFailureEntry, $pimFailedRecordIdsToResend);
            $this->insertProductIdsInTempTable($tempTablePopulator, $pimFailedRecordIdsToResend); 
            $pimFailedRecordHandler->deleteFixedPimFailedRecord($pimFailedRecordsToResend);

            for($level = 1; $level <= 6; $level++){
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
            B2CLogger::getInstace()->error( get_class($throwable) . " in B2CCategoryDataPoster: " . $throwable->getMessage() .". StackTrace: " .$throwable->getTraceAsString());
            $helper->addPimFailedRecords($categoryIdsForFailureEntry, $throwable, B2CSalesForceObjectType::CATEGORY());
            Util::setPIMFailureFlag();
        }
    }

    private function performActiveFlagChangesAndReturnCategoriyIdsToAddInTempTable(): array
    {
        $activeFlagHandler = new B2CCategoryActiveFlagHandler();
        $categoriyIdsInMasterTable = $activeFlagHandler->getAllCategoryIdsInMasterTable();
        $allCategoriesWithRightActiveFlagValueForAssociatedCategories = $activeFlagHandler->getValueForActiveFlag($categoriyIdsInMasterTable);

        $associatedCategoriesWithTrueActiveFlag = $this->getAssociatedCategoriesWithTrueActiveFlag($allCategoriesWithRightActiveFlagValueForAssociatedCategories);
        $parentsOfActiveAssociatedCategories = $activeFlagHandler->getUniqueParentIdsForObjectIdOfGivenClass("B2CCategory", $$associatedCategoriesWithTrueActiveFlag);
        $allActiveCategories = $parentsOfActiveAssociatedCategories;
        // returns a key value array for all the categories in mastr table with their respective active flag value 
        $allCategoriesInMasterTableWithActiveFlagValue = $this->prepareActiveFlagValueForAllCategoriesInMasterTable($categoriyIdsInMasterTable, $allActiveCategories); 
        $activeFlagHandler->updateActiveFlagValue($allCategoriesInMasterTableWithActiveFlagValue); 

        $categoryIdsToBeAddedInTempTable = [];

        $associatedCategoryIdsWhereRelationWithHashChanged = $activeFlagHandler->getCategoryIdsWhereRelationWithProductChanged();
        $parentOfAssociatedCategories = $activeFlagHandler->getUniqueParentIdsForObjectIdOfGivenClass("B2CCategory", $associatedCategoryIdsWhereRelationWithHashChanged); 
        foreach($parentOfAssociatedCategories as $categoryId){
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

    public function prepareActiveFlagValueForAllCategoriesInMasterTable($categoriyIdsInMasterTable, $allActiveCategories)
    {
        $allCategoriesInMasterTableWithActiveFlagValue = [];
        foreach ($categoriyIdsInMasterTable as $categoryId) {
            if(in_array($categoryId, $allActiveCategories))
            {
                $allCategoriesInMasterTableWithActiveFlagValue[$categoryId] = true;
            }
            else{
                $allCategoriesInMasterTableWithActiveFlagValue[$categoryId] = false;
            }
        }
        return $allCategoriesInMasterTableWithActiveFlagValue;
    }

    public function getAssociatedCategoriesWithTrueActiveFlag($allCategoriesWithRightActiveFlagValueForAssociatedCategories)
    {
        $associatedCategoriesWithTrueActiveFlag = [];
        foreach ($allCategoriesWithRightActiveFlagValueForAssociatedCategories as $categoryId => $flag) {
            if($flag)
            {
                $associatedCategoriesWithTrueActiveFlag[] = $categoryId;
            }
        }
        return $associatedCategoriesWithTrueActiveFlag;
    }

    private function createAPIRequestEntityForRecords(array $records, 
                                                        APIOperationType $operationType, 
                                                        B2CCategoryTempTablePopulator $tempTablePopulator): void
    {
        $requestBodyGenerator = new B2CCategoryRequestBodyGenerator();
        $savedRequestIds = [];
        foreach($records as $recordPimId){
        // there is a probability of duplicate requests here, so handling with following
            if( in_array($recordPimId, $savedRequestIds) ){
                continue;
            }
            $tempTableData = $tempTablePopulator->getTempTableDataForIds([$recordPimId])[0];
            $currTime = time();
            $requestBody = $requestBodyGenerator->generateRequestBody($tempTableData);

            $apiRequestEntity = new B2CAPIRequestEntity();
            $apiRequestEntity->setBody(json_encode($requestBody,JSON_UNESCAPED_SLASHES));
            $apiRequestEntity->setOperationType($operationType);
            $apiRequestEntity->setSFObjectType(B2CSalesForceObjectType::CATEGORY());

            $apiRequestEntity->setexternalID(B2CCategoryHelper::getExternalId($tempTableData["o_id"]));
            $apiRequestEntity->setPimId($tempTableData["o_id"]);
            $apiRequestEntity->setReferenceId($recordPimId . "_" . $currTime);
            $apiRequestEntity->setCreationDate($currTime);
            $apiRequestEntity->save();

            $savedRequestIds[] = $recordPimId;
        }
    }


    private function insertProductIdsInTempTable(B2CCategoryTempTablePopulator $tempTablePopulator, array $ids): void
    {
        $tempTableData = $tempTablePopulator->getTempTableDataForIds($ids);
        $tempTableDataWithHashes = $tempTablePopulator->addHashesToTempTableData($tempTableData);
        $tempTablePopulator->insertDataInTempTable($tempTableDataWithHashes);
    }



}
