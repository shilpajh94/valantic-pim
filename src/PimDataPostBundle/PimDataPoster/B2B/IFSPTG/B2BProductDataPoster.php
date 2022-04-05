<?php

namespace PimDataPostBundle\PimDataPoster\B2B\IFSPTG;

use Pimcore\Google\Api;
use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\DeltaManager\B2B\B2BProductDeltaManager;
use PimDataPostBundle\Lib\EnforcedRecordsProvider\B2B\B2BProductEnforcedRecordsProvider;
use PimDataPostBundle\Lib\HTTPRequestGenerator\B2B\B2BProductHTTPRequestGenerator;
use PimDataPostBundle\Lib\HTTPResponseHandler\B2B\B2BProductHTTPResponseHandler;
use PimDataPostBundle\Lib\RelationChangeRegistrar\B2B\B2BProductRelationChangeRegistrar;
use PimDataPostBundle\Lib\RequestBodyGenerator\B2B\B2BProductRequestBodyGenerator;
use PimDataPostBundle\Lib\SalesForceEntityHelper\B2B\B2BProductHelper;
use PimDataPostBundle\Lib\TempTablePopulator\B2B\B2BProductTempTablePopulator;
use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;
use PimDataPostBundle\Model\PersistantModel\B2BAPIRequestEntity;
use PimDataPostBundle\Model\Types\APIOperationType;
use PimDataPostBundle\Model\Types\B2BSalesForceObjectType;
use PimDataPostBundle\PimDataPoster\IDataPoster;

class B2BProductDataPoster implements IDataPoster
{
    public function postData()
    {
        try{
            $tempTablePopulator = new B2BProductTempTablePopulator();
            $tempMasterTableMeta = new TempMasterTablesMeta(Constants::B2B_PRODUCT_TEMP_TABLE_NAME, 
                                                                Constants::B2B_PRODUCT_MASTER_TABLE_NAME, 
                                                                "basicHash", 
                                                                "relationalHash");
            $relationChangeRegistrar = new B2BProductRelationChangeRegistrar($tempMasterTableMeta);
            $deltaManager = new B2BProductDeltaManager($tempMasterTableMeta);
            $enforcedRecordProvier = new B2BProductEnforcedRecordsProvider();
            $httpRequestGenerator = new B2BProductHTTPRequestGenerator();
            $responseHandler = new B2BProductHTTPResponseHandler();
            $helper = new B2BDataPosterHelper();

            $tempTablePopulator->truncateTempTable();
            $pimModifiedRecords = $tempTablePopulator->getPimModifiedRecordIds();
            $this->insertProductIdsInTempTable($tempTablePopulator, $pimModifiedRecords);    

            /**
             * @TODO:
             * add logging
             */

            $relationChangeRegistrar->registerChangedRelation();
            // $deltaManager->removeHashNotChangedRecordsFromTempTable();
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
    
            $apiRequestEntity->setexternalID(B2BProductHelper::getExternalId($tempTableData));
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