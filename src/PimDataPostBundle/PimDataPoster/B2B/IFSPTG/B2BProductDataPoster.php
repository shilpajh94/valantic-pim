<?php

namespace PimDataPostBundle\PimDataPoster\B2B\IFSPTG;

use Pimcore\Google\Api;
use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\DeltaManager\B2B\B2BProductDeltaManager;
use PimDataPostBundle\Lib\HTTPRequestGenerator\B2B\B2BProductHTTPRequestGenerator;
use PimDataPostBundle\Lib\HTTPResponseHandler\B2B\B2BProductHTTPResponseHandler;
use PimDataPostBundle\Lib\RelationChangeRegistrar\B2B\B2BProductRelationChangeRegistrar;
use PimDataPostBundle\Lib\RequestBodyGenerator\B2B\B2BProductRequestBodyGenerator;
use PimDataPostBundle\Lib\TempTablePopulator\B2B\B2BProductTempTablePopulator;
use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;
use PimDataPostBundle\Model\PersistantModel\B2BAPIRequestEntity;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;

class B2BProductDataPoster
{
    public function postData()
    {
        try{
            $tempTablePopulator = new B2BProductTempTablePopulator();
            $tempTablePopulator->truncateTempTable();
            $pimModifiedRecords = $tempTablePopulator->getPimModifiedRecordIds();
            $this->insertProductIdsInTempTable($tempTablePopulator, $pimModifiedRecords);    
    
            /**
             * @TODO:
             * add relation change registrar
             * add logging
             */
    
            $tempMasterTableMeta = new TempMasterTablesMeta(Constants::B2B_PRODUCT_TEMP_TABLE_NAME, 
                                                                Constants::B2B_PRODUCT_MASTER_TABLE_NAME, 
                                                                "basicHash", 
                                                                "relationalHash");
    
            $relationChangeRegistrar = new B2BProductRelationChangeRegistrar($tempMasterTableMeta);
            $relationChangeRegistrar->registerChangedRelation();
            
            $deltaManager = new B2BProductDeltaManager($tempMasterTableMeta);
            $deltaManager->removeHashNotChangedRecordsFromTempTable();
            
            /**
             * to capture the product for which the masters in dynamic dropdonw,
             * nomenclature,fittingfamily and thread updated.
             */
            $productIdsForUpdatedMasters = $deltaManager->getProductIdsForUpdatedMaster();
            p_r($productIdsForUpdatedMasters);
            if(count($productIdsForUpdatedMasters) > 0){
                $this->insertProductIdsInTempTable($tempTablePopulator, $productIdsForUpdatedMasters);
            }
            $recordsToUpdate = array_unique(array_merge($deltaManager->getRecordsToUpdate(), $productIdsForUpdatedMasters));
            $recordsToCreate = $deltaManager->getRecordsToCreate();
    
            $this->createAPIRequestEntityForRecords($recordsToUpdate, APIOperationType::UPDATE(), $tempTablePopulator);
            $this->createAPIRequestEntityForRecords($recordsToCreate, APIOperationType::CREATE(), $tempTablePopulator);
    
            $httpRequestGenerator = new B2BProductHTTPRequestGenerator();
            $responseHandler = new B2BProductHTTPResponseHandler();
            $firstBatchIndex = 1;
            $totalBatches = $httpRequestGenerator->getTotalBatches();
            $client = new \GuzzleHttp\Client();
            for($i = $firstBatchIndex; $i <= $totalBatches; $i++){
                $request = $httpRequestGenerator->getRequest($i);
                $response = $client->send($request);
                $responseHandler->handleResponse($response);
            }
        }catch(\Throwable $ex){
            p_r($ex);
        }
      
    }

    private function createAPIRequestEntityForRecords(array $records, 
                                                            APIOperationType $operationType, 
                                                            B2BProductTempTablePopulator $tempTablePopulator)
    {
        $b2bProductRequestBodyGenerator = new B2BProductRequestBodyGenerator();
        foreach($records as $recordPimId){
            $tempTableData = $tempTablePopulator->getTempTableDataForIds([$recordPimId])[0];

            $requestBody = $b2bProductRequestBodyGenerator->generateRequestBody($tempTableData);

            $apiRequestEntity = new B2BAPIRequestEntity();
            $apiRequestEntity->setBody(json_encode($requestBody));
            $apiRequestEntity->setOperationType($operationType);
            $apiRequestEntity->setSFObjectType(B2BSalesForceObjectType::PRODUCT());
    
            $apiRequestEntity->setexternalID($tempTableData["external_id"]);
            $apiRequestEntity->setPimId($tempTableData["o_id"]);
            $apiRequestEntity->setReferenceId($recordPimId . "_" . time());
            $apiRequestEntity->save();
        }
    }

    private function insertProductIdsInTempTable(B2BProductTempTablePopulator $tempTablePopulator, array $ids)
    {
        $tempTableData = $tempTablePopulator->getTempTableDataForIds($ids);
        $tempTableDataWithHashes = $tempTablePopulator->addHashesToTempTableData($tempTableData);
        $tempTablePopulator->insertDataInTempTable($tempTableDataWithHashes);
    }
}