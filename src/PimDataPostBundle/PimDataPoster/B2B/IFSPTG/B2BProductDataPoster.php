<?php

namespace PimDataPostBundle\PimDataPoster\B2B\IFSPTG;

use Pimcore\Google\Api;
use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\DeltaManager\B2B\B2BProductDeltaManager;
use PimDataPostBundle\Lib\HTTPRequestGenerator\B2B\B2BProductHTTPRequestGenerator;
use PimDataPostBundle\Lib\RequestBodyGenerator\B2B\B2BProductRequestBodyGenerator;
use PimDataPostBundle\Lib\TempTablePopulator\B2B\B2BProductTempTablePopulator;
use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;
use PimDataPostBundle\Model\PersistantModel\APIRequestEntity;
use PimDataPostBundle\Model\PersistantModel\B2BAPIRequestEntity;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;

class B2BProductDataPoster
{
    public function postData()
    {
        $this->insertPimModifiedDataInTempTable();

        $tempMasterTableMeta = new TempMasterTablesMeta(Constants::B2B_PRODUCT_TEMP_TABLE_NAME, 
                                                            Constants::B2B_PRODUCT_MASTER_TABLE_NAME, 
                                                            "basicHash", 
                                                            "relationalHash");
        $deltaManager = new B2BProductDeltaManager($tempMasterTableMeta);

        $recordsToUpdate = $deltaManager->getRecordsToUpdate();
        $recordsToCreate = $deltaManager->getRecordsToUpdate();


        $this->createAPIRequestEntityForRecords($recordsToUpdate, APIOperationType::UPDATE());
        $this->createAPIRequestEntityForRecords($recordsToCreate, APIOperationType::CREATE());

        $httpRequestGenerator = new B2BProductHTTPRequestGenerator();
        $firstBatchIndex = $httpRequestGenerator->getIndexOfFirstBatch();
        $totalBatches = $httpRequestGenerator->getTotalBatches();
        $client = new \GuzzleHttp\Client();
        for($i = $firstBatchIndex; $i <= $totalBatches; $i++){
            $request = $httpRequestGenerator->getRequest($i);
            $client->send($request);
        }
    }

    private function createAPIRequestEntityForRecords(array $records, APIOperationType $operationType)
    {
        $b2bProductRequestBodyGenerator = new B2BProductRequestBodyGenerator();
        foreach($records as $recordPimId){
            //@TODO: create $temp table data
            $tempTableData;
            $requestBody = $b2bProductRequestBodyGenerator->generateRequestBody($tempTableData);
            $apiRequestEntity = new B2BAPIRequestEntity();
            $apiRequestEntity->setBody($requestBody);
            $apiRequestEntity->setOperationType($operationType);
            $apiRequestEntity->setSFObjectType(B2BSalesForceObjectType::PRODUCT());
    
            $apiRequestEntity->setexternalID($tempTableData["external_id"]);
            $apiRequestEntity->setReferenceId($recordPimId . "_" . time());
            $apiRequestEntity->save();
        }
    }

    private function insertPimModifiedDataInTempTable()
    {
        $tempTablePopulator = new B2BProductTempTablePopulator();
        $tempTablePopulator->truncateTempTable();
        $pimModifiedRecords = $tempTablePopulator->getPimModifiedRecordIds();
        $tempTableData = $tempTablePopulator->getTempTableDataForIds($pimModifiedRecords);
        $tempTableDataWithHashes = $tempTablePopulator->addHashesToTempTableData($tempTableData);
        $tempTablePopulator->insertDataInTempTable($tempTableDataWithHashes);
    }
}