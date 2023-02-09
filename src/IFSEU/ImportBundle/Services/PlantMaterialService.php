<?php
namespace IFSEU\ImportBundle\Services;

use Pimcore\Db;
use Pimcore\Model\DataObject;
use Elements\Bundle\ProcessManagerBundle;
use IFSEU\ImportBundle\Services\ImportConstants;
use IFSEU\ImportBundle\Services\ImportService;
use IFSEU\ImportBundle\Model\PlantMaterialModel;

class PlantMaterialService
{
    use ProcessManagerBundle\ExecutionTraitClass;

    private $db;
    private $filePath;
    private $monitoringItem;
    private $failedCount = 0;
    private $successCount = 0;
    private $createdCount = 0;
    private $updatedCount = 0;
    private $tableImportHelper;
    private $common;
    private $fileColumns = array();
    private $mappingCsvColumn = array();
    private $materialArray = array();
    private $plantArray = array();
    private $salesOrgArray = array();
    private $distributionChannelArray = array();
    private $countryArray = array();
    private $plantFolderId;
    private $salesOrganizationsFolderId;
    private $distributionChannelFolderId;
    private $countryFolderId;
    private $failedIDs = [];


    const LOGGER_MODULE = 'PLANT MATERIAL MASTER';

    public function __construct()
    {
        $this->db = Db::get();

        $this->common               = \Pimcore::getContainer()->get('ifs_eu_import.common_helper');
        $this->tableImportHelper    = new PlantMaterialModel;
        $plantMaterialConfig        = \Pimcore::getContainer()->get('ifs_eu_import.config_provider_service')->getPlantMaterialConfig();

        $this->mappingCsvColumn     = $this->common->getParameter($plantMaterialConfig, 'mappingCsvColumn');

        /* Initilize monitoring item and set the number of steps will take to complete the task */
        $this->monitoringItem = ProcessManagerBundle\ElementsProcessManagerBundle::getMonitoringItem();
    }

    public function import()
    {
        try {
        
            $sapFileFeeder      = \Pimcore::getContainer()->get('ifs_eu_import.sap_file_feeder_service');
            $this->filePath     = $sapFileFeeder->execFileFeeder('plantMaterial');

            $csvInfo            = ImportService::getCSVData($this->filePath);
            $this->fileColumns = $csvInfo['header'];
            $excelDataNewArray  = $csvInfo['data'];

            // remove once testing done
            // $excelDataNewArray = (array_slice($excelDataNewArray, 1, 5));

            $this->monitoringItem->getLogger()->info('File Information');
            $this->monitoringItem->getLogger()->info('File path is being imported: ' . $this->filePath);

            echo 'Importing File: ' . $this->filePath.PHP_EOL;
            $time = new \DateTime();
            
            /**
             * get folder ids of Master List, MaterialMaster, Master List/Plants,
             * Master List/Sales Organizations, Master List/Distribution Channel
             * and MaterialMaster/SalesMaterialMaster
             */
            DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_FOLDER);
            DataObject\Service::createFolderByPath(ImportConstants::IFSEU_MATERIAL_MASTER_FOLDER);
            $this->plantFolderId= DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_PLANTS_FOLDER)->getId();
            $this->salesOrganizationsFolderId = DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_SALES_ORGANIZATIONS_FOLDER)->getId();
            $this->distributionChannelFolderId = DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_DISTRIBUTION_CHANNEL_FOLDER)->getId();
            $this->countryFolderId= DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_COUNTRY_FOLDER)->getId();
            DataObject\Service::createFolderByPath(ImportConstants::IFSEU_MATERIAL_MASTER_PLANT_MATERIAL_MASTER_FOLDER);

            $applicationLogMessage = "No record found in file.";
            if(count($excelDataNewArray) > 1)
            {
                /**
                 * remove column header from array excelDataNewArray. Only data remains.
                 */
                $csvRowCount = count($excelDataNewArray);

                echo "Creating IFS EU plant material tables...".PHP_EOL;
                $t = new \DateTime();
                $this->tableImportHelper->createPlantMaterialTable();
                $td = $t->diff(new \DateTime());
                echo $td->format("Creating IFS EU plant material tables takes %h hour %i minute %s second").PHP_EOL;
                
                echo "Truncating temp table...".PHP_EOL;
                $t = new \DateTime();
                $this->tableImportHelper->truncateTempTable();
                $td = $t->diff(new \DateTime());
                echo $td->format("Truncating temp table takes %h hour %i minute %s second").PHP_EOL;
                
                echo "Inserting temp table...".PHP_EOL;
                $time1 = new \DateTime();
                $this->tableImportHelper->insertDataInTemp($excelDataNewArray, $this->fileColumns);    // Insert csv file data in temp table
                $timediff1 = $time1->diff(new \DateTime());
                echo $timediff1->format("Total {$csvRowCount} records inserted in temp table takes %h hour %i minute %s second").PHP_EOL;
                unset($excelDataNewArray);

                echo "Getting deleted records...".PHP_EOL;
                $time5 = new \DateTime();
                $deletedRecords = $this->tableImportHelper->getDeletedRecords();
                $deleteRecordCount = count($deletedRecords);
                echo "Record {$deleteRecordCount} need to update deletion flag.".PHP_EOL;
                $this->processDeletedRecords($deletedRecords);
                unset($deletedRecords);

                $timediff5 = $time5->diff(new \DateTime());
                echo $timediff5->format("Delete flag updation takes %h hour %i minute %s second").PHP_EOL;

                echo "Getting delta records...".PHP_EOL;
                $t1 = new \DateTime();
                $excelDataNewArray = $this->tableImportHelper->getDelta();         // Get delta data
                $td1 = $t1->diff(new \DateTime());
                echo $td1->format("Getting delta takes %h hour %i minute %s second").PHP_EOL;

                $this->monitoringItem->getLogger()->info("Total {$csvRowCount} records found in file.");
                echo "Total {$csvRowCount} records found in csv file.".PHP_EOL;
                $deltaCount = count($excelDataNewArray);
                echo "Total {$deltaCount} Delta records found...".PHP_EOL;
                
                $applicationLogMessage = "No delta records found.";

                if($deltaCount > 0)
                {
                    $j = 1;

                    $i = 0;
                    $length = ImportConstants::IMPORT_BATCH_SIZE;
                    while ($i<$deltaCount) {

                        $diff = $deltaCount-$i;
                        if ($diff < $length) {
                            $length = $diff;
                        }

                        $partialData = array_slice($excelDataNewArray, $i, $length);
                        $i = $i+$length;
                        echo "Part {$j}, Record {$length}, Batch size ".ImportConstants::IMPORT_BATCH_SIZE.", ".PHP_EOL;
                        $this->processSlicedData($partialData);
                        $partialData = null;
                        \Pimcore::collectGarbage();
                        gc_collect_cycles();
                        $j++;
                    }
                    $countMsg = "\nTotal Processed Records:".$deltaCount.", ";
                    $countMsg .= "\nSuccess Records:".$this->successCount.", ";
                    $countMsg .= "\nFailed Records:".$this->failedCount.", ";
                    $countMsg .= "\nCreated Records:".$this->createdCount.", ";
                    $countMsg .= "\nUpdated Records:".$this->updatedCount."\n";

                    $applicationLogMessage = "Plant Material Master Imported successfully.";

                    if ($this->failedCount > 0)
                    {
                        $applicationLogMessage = "Plant material command failed to import {$this->failedCount} Record(s) out of {$deltaCount} Record(s)";
                    }

                    $applicationLogMessage .= $countMsg;
                }

                $time4 = new \DateTime();
                $this->tableImportHelper->updateMaster();
                $timediff4 = $time4->diff(new \DateTime());
                $masterListCount = $this->successCount;
                echo $timediff4->format("Total {$masterListCount} replaced in master table takes %h hour %i minute %s second").PHP_EOL;
                
                $this->tableImportHelper->deleteFailedRecordsFromMaster($this->failedIDs);
            }
        
            echo $applicationLogMessage;

            if ($this->failedCount > 0)
            {
                \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->error($applicationLogMessage);
            }
            else
            {
                \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->info($applicationLogMessage);
            }           

            $this->monitoringItem->getLogger()->info($applicationLogMessage);
            $this->monitoringItem->setMessage('Finished')->setCompleted();
            $timediff = $time->diff(new \DateTime());
            echo $timediff->format('Total script time: %h hour %i minute %s second').PHP_EOL;
            \Pimcore::collectGarbage();

        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }

    }    

    public function processSlicedData($data) {
	    $time2 = new \DateTime();
        \Pimcore\Model\Version::disable();
        $queryTableDataArray = array();
        $storeTableDataArray = array();
        $relationTableDataArray = array();
        $dependencyTableDataArray = array();
        $createdUpdatedCount = 0;

        $columnSalesOrg = $this->mappingCsvColumn['SalesOrganization'];
        $columnDistributionChannel = $this->mappingCsvColumn['DistributionChannel'];
        $columnPlant = $this->mappingCsvColumn['Plant'];
        $columnMaterial = $this->mappingCsvColumn['Material'];

	    $dataCount = count($data);
        foreach ($data as $rowCount => $rowvalueRecord)
        {
            $rowvalue = json_decode(utf8_encode($rowvalueRecord['record']));
            $rowvalue = array_combine($this->fileColumns, $rowvalue);

            $plantName = $rowvalue[$columnPlant];
            $material = $rowvalue[$columnMaterial];
            $salesOrg = $rowvalue[$columnSalesOrg];
            $distributionChannel = $rowvalue[$columnDistributionChannel];

            $errorsData = $this->validateMaterialSalesDistributionValues($material, $salesOrg, $distributionChannel);
            if(!count($errorsData))
            {
                try
                {
                    $materialObjId = $this->getMaterialObjectId($material);
                    
                    if($materialObjId)
                    {
                        $processedRowData = $this->processRowData($plantName, $material, $salesOrg, $distributionChannel);

                        $createdOrUpdated   = $processedRowData['createdOrUpdated'];
                        $plantMaterialKey   = $processedRowData['plantMaterialKey'];
                        $objectArr          = $processedRowData['objectArr'];
                        
                        $objId              = $this->tableImportHelper->insertInObjects($objectArr);
                        $prepareTableData = $this->prepareTableDataArray($objId, $materialObjId, $rowvalue);

                        $queryTableDataArray[] = $prepareTableData['queryTableData'];
                        $storeTableDataArray[] = $prepareTableData['storeTableData'];
                        $relationTableDataArray = array_merge($relationTableDataArray, $prepareTableData['objectRelationsTableData']);
                        $dependencyTableDataArray = array_merge($dependencyTableDataArray, $prepareTableData['dependencyTableData']);
                        
                        unset($prepareTableData);

                        $errorsData['SUCCESS'] = "Plant Material Code: ".$plantMaterialKey." has been ".$createdOrUpdated.".";

                    }
                    else{

                        $errorsData[] = "Material ".$material. " not found in system.";
                        $this->failedIDs[] = $rowvalueRecord['id'];
                    }
                }
                catch (\Exception $e) {
                    /* return error massage if any exception found */
                    $errorsData[] = "Plant Material Code: ".$plantMaterialKey. " - ".$e->getMessage();
                }
            }
            $statusCode = '';
            if(isset($errorsData['SUCCESS']))
            {
                $createdUpdatedCount++;
                $this->successCount++;
                $errorsString = "SUCCESS: ".$errorsData['SUCCESS'];
                $this->monitoringItem->getLogger()->info($errorsString);
                $statusCode = 'SUCCESS';
                $data[$rowCount]['failedReason'] = '';
            }
            else if(count($errorsData))
            {
                $errorsString = "FAILED: ";
                $allErrorsInString = implode(' ', $errorsData);
                $errorsString .= $allErrorsInString;
                $this->failedCount++;
                $this->monitoringItem->getLogger()->info($errorsString);
                $statusCode = 'FAILED';
                $data[$rowCount]['failedReason'] = $allErrorsInString;
            }
            unset($errorsData);
            $data[$rowCount]['statusCode'] = $statusCode;
        }

        $this->insertDataInDB($queryTableDataArray, $storeTableDataArray, $relationTableDataArray, $dependencyTableDataArray);
            
        $timediff2 = $time2->diff(new \DateTime());
        echo $timediff2->format("{$createdUpdatedCount} Object created out of {$dataCount} records in %h hour %i minute %s second").PHP_EOL;

        $time3 = new \DateTime();
        $this->tableImportHelper->insertDataToLogTable($data);
        $timediff3 = $time3->diff(new \DateTime());
        echo $timediff3->format("Total {$dataCount} records inserted in log table takes %h hour %i minute %s second").PHP_EOL;

        echo "Unset the temporary variable ...".PHP_EOL;
        unset($queryTableDataArray, $storeTableDataArray, $relationTableDataArray, $dependencyTableDataArray, $data);
    }

    public function processDeletedRecords($deletedRecords)
    {
        $deleteCount = 0;
        if(count($deletedRecords) > 0)
        {
            foreach ($deletedRecords as $key => $value)
            {
                $keyArray = explode('$',$value['id']);
                $material = $keyArray[0];
                $key = str_replace('$','-',$value['id']);
                $objDelete = DataObject\IFSEUPlantMaterialMaster::getByPath("/".ImportConstants::IFSEU_MATERIAL_MASTER_PLANT_MATERIAL_MASTER_FOLDER."/".$material."/".$key);

                if($objDelete)
                {
                    $deleteCount++;
                    // $objDelete->setDeletedFlagAtPlantLevel(1);
                    $objDelete->setPublished(FALSE);
                    $objDelete->save();
                }
            }

            echo "Delete flag updated for {$deleteCount} objects in system.".PHP_EOL;
        }
    }

    /**
     * prepare dependency table array
     * 
     */

    private function prepareTableDataArray($objId, $materialObjId, $rowvalue)
    {
        $columnPlant = $this->mappingCsvColumn['Plant'];
        $columnCountryOfOrigin = $this->mappingCsvColumn['CountryOfOrigin'];
        $columnPlannedDeliveryTime = $this->mappingCsvColumn['PlannedDeliveryTime'];
        $columnCommodityCode = $this->mappingCsvColumn['CommodityCode'];
        $columnMinOrderQty = $this->mappingCsvColumn['MinOrderQuantity'];
        $columnOrderQtyInc = $this->mappingCsvColumn['OrderingQuantityIncrements'];
        $columnStandardPackQuantity = $this->mappingCsvColumn['StandardPackQuantity'];
        $columnStandardPackQuantityUOM = $this->mappingCsvColumn['StandardPackQuantityUOM'];
        $columnOutsidePurchaseIdentifierOrProcurementType = $this->mappingCsvColumn['OutsidePurchaseIdentifierOrProcurementType'];
        $columnAvailabilityCheckCode = $this->mappingCsvColumn['AvailabilityCheckCode'];
        $columnSalesOrg = $this->mappingCsvColumn['SalesOrganization'];
        $columnDistributionChannel = $this->mappingCsvColumn['DistributionChannel'];
        $columnPlantProfitCenter = $this->mappingCsvColumn['PlantProfitCenter'];
        $columnMrpController = $this->mappingCsvColumn['MRPController'];
        $columnTotalReplenismentLeadTime =  $this->mappingCsvColumn['TotalReplenismentLeadTime'];
        $columnSafetyStock = $this->mappingCsvColumn['SafetyStock'];
        $columnStockIndicator = $this->mappingCsvColumn['StockIndicator'];
        $columnUnitOfMeasure = $this->mappingCsvColumn['UnitOfMeasure'];
        
        $plantName = $rowvalue[$columnPlant];
        $countryName =  $rowvalue[$columnCountryOfOrigin];
        $plannedDeliveryTime =  $rowvalue[$columnPlannedDeliveryTime];
        $commodityCode =  $rowvalue[$columnCommodityCode];
        $minOrderQty = ($rowvalue[$columnMinOrderQty]) != '' ? $rowvalue[$columnMinOrderQty] : NULL;
        $orderQtyInc =  $rowvalue[$columnOrderQtyInc];
        $standardPackQuantity =  $rowvalue[$columnStandardPackQuantity];
        $standardPackQuantityUOM =  $rowvalue[$columnStandardPackQuantityUOM];
        $outsidePurchaseIdentifierOrProcurementType =  $rowvalue[$columnOutsidePurchaseIdentifierOrProcurementType];
        $availabilityCheckCode =  $rowvalue[$columnAvailabilityCheckCode];
        $salesOrg =  $rowvalue[$columnSalesOrg];
        $distributionChannel =  $rowvalue[$columnDistributionChannel];
        $plantProfitCenter =  $rowvalue[$columnPlantProfitCenter];
        $mrpController =  $rowvalue[$columnMrpController];
        $totalReplenismentLeadTime =  $rowvalue[$columnTotalReplenismentLeadTime];
        $safetyStock =  $rowvalue[$columnSafetyStock];
        $stockIndicator =  $rowvalue[$columnStockIndicator];
        $unitOfMeasure =  $rowvalue[$columnUnitOfMeasure];

        $plantObjId = $this->getPlantObjectId($plantName);
        $salesOrgObjId = $this->getSalesOrgObjectId($salesOrg);
        $distributionChannelObjId = $this->getDistributionChannelObjectId($distributionChannel);
        $countryObjId = $this->getCountryObjectId($countryName);

        $storeTableData = [
            'oo_id' => $objId,
            'PlannedDeliveryTime' => $plannedDeliveryTime,
            'CommodityCode' => $commodityCode,
            'MinOrderQuantity' => $minOrderQty,
            'OrderingQuantityIncrements' => $orderQtyInc,
            'StandardPackQuantity' => $standardPackQuantity,
            'StandardPackQuantityUOM' => $standardPackQuantityUOM,
            'OutsidePurchaseIdentifierOrProcurementType' => strtoupper($outsidePurchaseIdentifierOrProcurementType),
            'AvailabilityCheckCode' => $availabilityCheckCode,
            'PlantProfitCenter' => $plantProfitCenter,
            'MRPController' => $mrpController,
            'TotalReplenismentLeadTime' => $totalReplenismentLeadTime,
            'SafetyStock' => $safetyStock,
            'StockIndicator' => $stockIndicator,
            'UnitOfMeasure' => $unitOfMeasure,
        ];
        $data['storeTableData'] = $storeTableData;
        $queryTableData = [
            'oo_classId' => 'IFSEUPlantMaterialMaster',
            'oo_className' => 'IFSEUPlantMaterialMaster',
            'Material' => ",".$materialObjId.",",
            'Plant__id' => $plantObjId,
            'Plant__type' => 'object',
            'CountryOfOrigin__id' => $countryObjId,
            'CountryOfOrigin__type' => 'object',
            'SalesOrganization__id' => $salesOrgObjId,
            'SalesOrganization__type' => 'object',
            'DistributionChannel__id' => $distributionChannelObjId,
            'DistributionChannel__type' => 'object'
        ];

        $data['queryTableData'] = array_merge($queryTableData, $storeTableData);

        if($countryObjId)
        {
            $relationTableData[] = ['src_id' => $objId, 'dest_id' => $countryObjId, 'type' => 'object', 'fieldname' => 'CountryOfOrigin', 'ownertype' => 'object' ];
            $dependencyTableData[] = ['sourceid' => $objId, 'targetid' => $countryObjId, 'sourcetype' => 'object', 'targettype' => 'object'];
        }
            
        if($plantObjId)
        {
            $relationTableData[] = ['src_id' => $objId, 'dest_id' => $plantObjId, 'type' => 'object', 'fieldname' => 'Plant', 'ownertype' => 'object' ];
            $dependencyTableData[] = ['sourceid' => $objId, 'targetid' => $plantObjId, 'sourcetype' => 'object', 'targettype' => 'object'];
        }
            
        $relationTableData[] = ['src_id' => $objId, 'dest_id' => $salesOrgObjId, 'type' => 'object', 'fieldname' => 'SalesOrganization', 'ownertype' => 'object' ];
        $relationTableData[] = ['src_id' => $objId, 'dest_id' => $distributionChannelObjId, 'type' => 'object', 'fieldname' => 'DistributionChannel', 'ownertype' => 'object' ];
        $relationTableData[] = ['src_id' => $objId, 'dest_id' => $materialObjId, 'type' => 'object', 'fieldname' => 'Material', 'ownertype' => 'object' ];
        $data['objectRelationsTableData'] = $relationTableData;

        $dependencyTableData[] = ['sourceid' => $objId, 'targetid' => $salesOrgObjId, 'sourcetype' => 'object', 'targettype' => 'object'];
        $dependencyTableData[] = ['sourceid' => $objId, 'targetid' => $distributionChannelObjId, 'sourcetype' => 'object', 'targettype' => 'object'];
        $dependencyTableData[] = ['sourceid' => $objId, 'targetid' => $materialObjId, 'sourcetype' => 'object', 'targettype' => 'object'];
        $data['dependencyTableData'] = $dependencyTableData;

        return $data;
    }

    /**
     * validate Material, sales organization and Distributed channel values
     * 
     */
    private function validateMaterialSalesDistributionValues($material, $salesOrg, $distributionChannel)
    {
        $errorsData = array();
        if(empty(trim($material)))
        {
            $errorsData[] = 'Material should not be blank.';
        }
            
        if(empty(trim($salesOrg)))
        {
            $errorsData[] = 'Sales organization should not be blank.';
        }
        
        if(empty(trim($distributionChannel)))
        {
            $errorsData[] = 'Distribution channel should not be blank.';
        }

        return $errorsData;
    }

    /**
     * 
     * Get material object id
     */

    private function getMaterialObjectId($material)
    {
        if(!isset($this->materialArray[$material]))
        {
            $materialId = $this->getMaterialObject($material);
            if($materialId)
            {
                $this->materialArray[$material] = $materialId;
            }
        }

        $materialObjId = '';
        if(isset($this->materialArray[$material]))
        {
            $materialObjId = $this->materialArray[$material];
        }
        
        return $materialObjId;
    }

    /**
     * 
     * Get plant object id
     */

    private function getPlantObjectId($plantName)
    {
        if(!empty(trim($plantName)) && !isset($this->plantArray[$plantName]))
        {
            $plantId = $this->getPlantObject($plantName);
            if($plantId)
            {
                $this->plantArray[$plantName] = $plantId;
            }
                
        }

        $plantObjId = '';
        if(isset($this->plantArray[$plantName]))
        {
            $plantObjId = $this->plantArray[$plantName];
        }

        return $plantObjId;
    }

    /**
     * 
     * Get country object id
     */

    private function getCountryObjectId($countryName)
    {
        if(!empty(trim($countryName)) && !isset($this->countryArray[$countryName]))
        {
            $countryId = $this->getCountryObject($countryName);
            if($countryId)
            {
                $this->countryArray[$countryName] = $countryId;
            }
        }

        $countryObjId = '';
        if(isset($this->countryArray[$countryName]))
        {
            $countryObjId = $this->countryArray[$countryName];
        }
        return $countryObjId;
    }

    /**
     * 
     * Get sales organisation code object id
     */

    private function getSalesOrgObjectId($salesOrg)
    {
        if(!isset($this->salesOrgArray[$salesOrg]))
        {
            $salesOrgId = $this->getSalesOrgObject($salesOrg);
            if($salesOrgId)
            {
                $this->salesOrgArray[$salesOrg] = $salesOrgId;
            }
                
        }
        return $this->salesOrgArray[$salesOrg];
    }

    /**
     * 
     * Get distribution channel code object id
     */

    private function getDistributionChannelObjectId($distributionChannel)
    {
        if(!isset($this->distributionChannelArray[$distributionChannel]))
        {
            $distributionChannelId = $this->getDistributionChannelObject($distributionChannel);
            if($distributionChannelId)
            {
                $this->distributionChannelArray[$distributionChannel] = $distributionChannelId;
            }
        }
        return $this->distributionChannelArray[$distributionChannel];
    }

    /**
     * return material object or false
     */
    public function getMaterialObject($MaterialKey){
        $query = "SELECT oo_id, o_key, o_path FROM `object_IFSEUProduct` WHERE `articleNumber` LIKE '%{$MaterialKey}%' limit 1";
        $objectMaterial = $this->db->fetchAll($query);

        foreach ($objectMaterial as $material) {
            $this->monitoringItem->getLogger()->info("Material: ".$MaterialKey." found");
            return $material['oo_id'];
        }

        return false;
    }

    /**
     * return plant object
     */
    public function getPlantObject($plantKey){
        $objectPlant = new DataObject\IFSEUPlant\Listing();
        $objectPlant->setCondition("Plant = ?", [$plantKey]);
        $objectPlant->load();
        if(empty($objectPlant))
        {
            $this->monitoringItem->getLogger()->info("Plant: ".$plantKey." not found in master list.");
            return '';
        }
        else{
            foreach ($objectPlant as $objPlant) {
                $this->monitoringItem->getLogger()->info("Plant: ".$plantKey." found in master list.");
                return $objPlant->getId();
            }
         
        }
    }

    /**
     * return distribution channel object
     */
    public function getDistributionChannelObject($distributionChannelKey){
        $object = new DataObject\IFSEUDistributionChannel\Listing();
        $object->setCondition("code = ?", [$distributionChannelKey]);
        $object->load();
        if(empty($object))
        {
            $this->monitoringItem->getLogger()->info("Distribution Channel: ".$distributionChannelKey." not found in master list, distribution channel created.");
            return '';
        }
        else{
            foreach ($object as $obj) {
                $this->monitoringItem->getLogger()->info("Distribution Channel: ".$distributionChannelKey." found in master list.");
                return $obj->getId();
            }
          
        }
    }

    /**
     * return sales organization object
     */
    public function getSalesOrgObject($salesOrgKey){
        $object = new DataObject\IFSEUSalesOrganisation\Listing();
        $object->setCondition("code = ?", [$salesOrgKey]);
        $object->load();
        if(empty($object))
        {
            $this->monitoringItem->getLogger()->info("Sales Org: ".$salesOrgKey." not found in master list, sales org created");
            return '';
        }
        else{
            foreach ($object as $obj) {
                $this->monitoringItem->getLogger()->info("Sales Org: ".$salesOrgKey." found in master list");
                return $obj->getId();
            }
            
        }

    }
     /**
     * return country object
     */
    public function getCountryObject($countryKey){
        $object = new DataObject\IFSEUCountries\Listing();
        $object->setCondition("CountryAbbr = ?", [$countryKey]);
        $object->load();
        if(empty($object))
        {
            $this->monitoringItem->getLogger()->info("Country: ".$countryKey." not found in master list, country created");
            return '';
        }
        else{
            foreach ($object as $obj) {
                $this->monitoringItem->getLogger()->info("Country: ".$countryKey." found in master list");
                return $obj->getId();
            }

        }

    }

    // function to process row data
    private function processRowData($plantName, $material, $salesOrg, $distributionChannel)
    {
        if(empty(trim($plantName)))
        {
            $plantMaterialKey = $material.'-'.$salesOrg.'-'.$distributionChannel;
        }
        else
        {
            $plantMaterialKey = $material.'-'.$plantName.'-'.$salesOrg.'-'.$distributionChannel;
        }

        $materialFolderId= DataObject\Service::createFolderByPath(ImportConstants::IFSEU_MATERIAL_MASTER_PLANT_MATERIAL_MASTER_FOLDER."/".$material)->getId();
        $query = "SELECT oo_id, o_parentId, o_key, o_path FROM `object_IFSEUPlant` WHERE `o_parentId` = '{$materialFolderId}' AND `o_key` LIKE '%{$plantMaterialKey}%' limit 1";
        $objectMaterial = $this->db->fetchRow($query);

        
        $createdOrUpdated = 'Updated';
        if(!$objectMaterial){
            $createdOrUpdated = 'Created';
            $objectArr = [
                'o_parentId' => $materialFolderId,
                'o_key' => $plantMaterialKey,
                'o_path' => "/".ImportConstants::IFSEU_MATERIAL_MASTER_PLANT_MATERIAL_MASTER_FOLDER."/".$material."/",
            ];
            $this->createdCount++;
        }
        else{
            $objectArr = [
                'o_parentId' => $objectMaterial['o_parentId'],
                'o_key' => $objectMaterial['o_key'],
                'o_path' => $objectMaterial['o_path'],
            ];
            $this->updatedCount++;
        }

        return ['plantMaterialKey' => $plantMaterialKey, 'createdOrUpdated' => $createdOrUpdated, 'objectArr' => $objectArr];
    }

    // function to insert data in database
    private function insertDataInDB($queryTableDataArray, $storeTableDataArray, $relationTableDataArray, $dependencyTableDataArray)
    {
        if(count($queryTableDataArray))
        {
            $this->tableImportHelper->insertIntoMaterialTable($queryTableDataArray, 'object_query_IFSEUPlantMaterialMaster');
        }
            
        if(count($storeTableDataArray))
        {
            $this->tableImportHelper->insertIntoMaterialTable($storeTableDataArray, 'object_store_IFSEUPlantMaterialMaster');
        }
            
        if(count($relationTableDataArray))
        {
            $this->tableImportHelper->insertIntoMaterialTable($relationTableDataArray, 'object_relations_IFSEUPlantMaterialMaster');
        }
            
        if(count($dependencyTableDataArray))
        {
            $this->tableImportHelper->insertIntoMaterialTable($dependencyTableDataArray, 'dependencies');
        }
    }
}