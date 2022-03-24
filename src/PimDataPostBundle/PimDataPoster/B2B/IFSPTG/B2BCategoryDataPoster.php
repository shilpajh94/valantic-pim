<?php

namespace PimDataPostBundle\PimDataPoster\B2B\IFSPTG;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\DeltaManager\B2B\B2BCategoryDeltaManager;
use PimDataPostBundle\Lib\HTTPRequestGenerator\B2B\B2BCategoryHTTPRequestGenerator;
use PimDataPostBundle\Lib\HTTPResponseHandler\B2B\B2BCategoryHTTPResponseHandler;
use PimDataPostBundle\Lib\RequestBodyGenerator\B2B\B2BCategoryRequestBodyGenerator;
use PimDataPostBundle\Lib\TempTablePopulator\B2B\B2BCategoryTempTablePopulator;
use PimDataPostBundle\Lib\TempTablePopulator\CategoryActiveFlagHandler\B2BCategoryActiveFlagHandler;
use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;
use PimDataPostBundle\Model\PersistantModel\B2BAPIRequestEntity;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;

class B2BCategoryDataPoster {

    public function postData()
    {

        $tempTablePopulator = new B2BCategoryTempTablePopulator();
        $tempTablePopulator->truncateTempTable();


        $activeFlagHandler = new B2BCategoryActiveFlagHandler();
        $categoriyIdsInMasterTable = $activeFlagHandler->getAllCategoryIdsInMasterTable();
        $activeFlagValues = $activeFlagHandler->getValueForActiveFlag($categoriyIdsInMasterTable);
        $activeFlagHandler->updateActiveFlagValue($activeFlagValues);
        $categoryIdsToBeAddedInTempTable = [];

        $categoryIdsWhereRelationWithHashChanged = $activeFlagHandler->getCategoryIdsWhereRelationWithProductChanged();
        foreach($categoryIdsWhereRelationWithHashChanged as $categoryId){
            if($activeFlagHandler->isCategoryPresentInMasterTable($categoryId)){
                if(!$activeFlagHandler->isCategoryActiveInMasterTable($categoryId)){
                    $activeFlagHandler->updateActiveFlagValue([ [$categoryId => true] ]);
                }
            }else{
                $activeFlagHandler->updateActiveFlagValue([ [$categoryId => true] ]);
                $categoryIdsToBeAddedInTempTable[] = $categoryId;
            }
        }

        $pimModifiedRecordIdsWhichAreAlsoPresentInMaster = $tempTablePopulator->getPimModifiedRecordIdsWhichAreAlsoPresentInMaster();
        $categoryIdsToBeAddedInTempTable = array_merge($categoryIdsToBeAddedInTempTable, $pimModifiedRecordIdsWhichAreAlsoPresentInMaster);

        $tempTableData = $tempTablePopulator->getTempTableDataForIds($categoryIdsToBeAddedInTempTable);
        $tempTableData = $tempTablePopulator->addHashesToTempTableData($tempTableData);
        $tempTablePopulator->insertDataInTempTable($tempTableData);


        $tempMasterTableMeta = new TempMasterTablesMeta(Constants::B2B_CATEGORY_TEMP_TABLE_NAME, 
                                        Constants::B2B_CATEGORY_MASTER_TABLE_NAME, 
                                        "basicHash", 
                                        "relationalHash");
        $deltaManager = new B2BCategoryDeltaManager($tempMasterTableMeta);

        for($level = 1; $level <= 6; $level++){
            $recordsToCreate = $deltaManager->getRecordsToCreateByLevel($level);
            $this->createAPIRequestEntityForRecords($recordsToCreate, APIOperationType::CREATE(), $tempTablePopulator);

            $httpRequestGenerator = new B2BCategoryHTTPRequestGenerator();
            $responseHandler = new B2BCategoryHTTPResponseHandler();
            $firstBatchIndex = 1;
            $totalBatches = $httpRequestGenerator->getTotalBatches();
            $client = new \GuzzleHttp\Client();
            for($i = $firstBatchIndex; $i <= $totalBatches; $i++){
                $request = $httpRequestGenerator->getRequest($i);
                $response = $client->send($request);
                $responseHandler->handleResponse($response);
            }
        }

        /**
         * here the system will pick the above sent records again ?
         */
        $recordsToUpdate = $deltaManager->getRecordsToUpdate();
        $this->createAPIRequestEntityForRecords($recordsToUpdate, APIOperationType::UPDATE(), $tempTablePopulator);

        $httpRequestGenerator = new B2BCategoryHTTPRequestGenerator();
            $responseHandler = new B2BCategoryHTTPResponseHandler();
            $firstBatchIndex = 1;
            $totalBatches = $httpRequestGenerator->getTotalBatches();
            $client = new \GuzzleHttp\Client();
            for($i = $firstBatchIndex; $i <= $totalBatches; $i++){
                $request = $httpRequestGenerator->getRequest($i);
                $response = $client->send($request);
                $responseHandler->handleResponse($response);
            }

    }

    private function createAPIRequestEntityForRecords(array $records, 
                                                            APIOperationType $operationType, 
                                                            B2BCategoryTempTablePopulator $tempTablePopulator)
    {
        $b2bProductRequestBodyGenerator = new B2BCategoryRequestBodyGenerator();
        foreach($records as $recordPimId){
            $tempTableData = $tempTablePopulator->getTempTableDataForIds([$recordPimId])[0];

            $requestBody = $b2bProductRequestBodyGenerator->generateRequestBody($tempTableData);

            $apiRequestEntity = new B2BAPIRequestEntity();
            $apiRequestEntity->setBody(json_encode($requestBody));
            $apiRequestEntity->setOperationType($operationType);
            $apiRequestEntity->setSFObjectType(B2BSalesForceObjectType::CATEGORY());
    
            $apiRequestEntity->setexternalID($tempTableData["external_id"]);
            $apiRequestEntity->setPimId($tempTableData["o_id"]);
            $apiRequestEntity->setReferenceId($recordPimId . "_" . time());
            $apiRequestEntity->save();
        }
    }

}
