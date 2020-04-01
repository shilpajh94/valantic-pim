<?php
namespace ImportBundle\Services\Model;

use Pimcore\Db;
use Exception;
use Pimcore\Model\DataObject;
use Throwable;
use AppBundle\Logger\AppLogger as Logger;
use Elements\Bundle\ProcessManagerBundle;
use ImportBundle\Services\Import;
use ImportBundle\Services\ImportConstants;

class PlantMaterialModel
{
    use ProcessManagerBundle\ExecutionTraitClass;
    
    private $db;
    private $name;
    private $filePath;
    private $inboxFilePath;
    private $archiveDir;
    private $failedDir;
    private $logFileName;
    private $monitoringItem;
    private $reader;
    private $failedCount = 0;
    private $successCount = 0;
    private $createdCount = 0;
    private $updatedCount = 0;
    private $common;
    private $tableImportConfig;
    private $tableImportHelper;
    private $countries;
    private $salesOrganizations;
    private $distributionChannels;

    private $fileColumns = array();
    private $keyColumns = array();
    private $approvedSalesOrg = array();
    private $mappingCsvColumn = array();

    const LOGGER_MODULE = 'PLANT MATERIAL MASTER';

    public function __construct()
    {
        $this->db = Db::get();
        /* Initilize monitoring item and set the number of steps will take to complete the task */
        $this->monitoringItem = ProcessManagerBundle\ElementsProcessManagerBundle::getMonitoringItem();
    }
    public function config($param = array())
    {
        try {
            $this->updateDefaults($param);
            $spreadsheet = Import::load($this->filePath);
            $this->common = \Pimcore::getContainer()->get('app.common_helper');
            $this->tableImportHelper = \Pimcore::getContainer()->get('app.plant_material_import_helper');
            $plantMaterialConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getPlantMaterialConfig();
            
            $this->approvedSalesOrg = $this->common->getParameter($plantMaterialConfig, 'approvedSalesOrg');
            $this->mappingCsvColumn = $this->common->getParameter($plantMaterialConfig, 'mappingCsvColumn');
            // $this->tableImportConfig['tempTable'] = $this->common->getParameterItem($plantMaterialConfig, 'tables','tempTable');
            // $this->tableImportConfig['masterTable'] = $this->common->getParameterItem($plantMaterialConfig, 'tables','masterTable');
            // $this->tableImportConfig['logTable'] = $this->common->getParameterItem($plantMaterialConfig, 'tables','logTable');
            $this->keyColumns = $this->common->getParameter($plantMaterialConfig, 'keyColumns');
            
            $this->import($spreadsheet);
        } catch (\Throwable $th) {
            Logger::error($this->logFileName, $th);
            die;
        }
    }

    public function import($spreadsheet)
    {
        $time = new \DateTime();
        $excelDataNewArray = array();
        $worksheet = $spreadsheet->getActiveSheet();
        $worksheetHighestColumnRow = Import::getActiveSheetInfo($worksheet);
        
        /**
         * Optaining next column from last column for "status" field
         */
        // $highestDataColumnIndex =  \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($worksheetHighestColumnRow['highestDataColumn']);
        // $nextColumnIndex = $highestDataColumnIndex + 1;
        // $nextColumn = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($nextColumnIndex);

        $lastRowLastColumn = $worksheetHighestColumnRow['highestDataColumn'] . $worksheetHighestColumnRow['highestDataRow'];

        $this->monitoringItem->getLogger()->info('File Information');
        $this->monitoringItem->getLogger()->info('File path is being imported: ' . $this->filePath);

        /**
         * get all the data from the spreadsheet
         */
        $excelDataNewArray = $spreadsheet->getActiveSheet()->rangeToArray("A1:$lastRowLastColumn",NULL,TRUE,TRUE,FALSE);
        
        /**
         * get folder ids of Master List, MaterialMaster, Master List/Plants, 
         * Master List/Sales Organizations, Master List/Distribution Channel 
         * and MaterialMaster/SalesMaterialMaster
         */
        DataObject\Service::createFolderByPath(ImportConstants::MATERIAL_MASTER_FOLDER);
        $plantFolderId= DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_PLANTS_FOLDER)->getId();
        $countryFolderId= DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_COUNTRY_FOLDER)->getId();
        DataObject\Service::createFolderByPath(ImportConstants::MATERIAL_MASTER_PLANT_MATERIAL_MASTER_FOLDER)->getId();

        $allSuccess = true;
        $applicationLogMessage = '';
        if(count($excelDataNewArray) > 1)
        {
            /**
             * getting csv or excel file column name
             */
            $this->fileColumns = $excelDataNewArray[0];
            $this->tableImportConfig['fileColumns'] = $this->fileColumns;
            $this->tableImportConfig['mappingCsvColumn'] = $this->mappingCsvColumn;
            $this->tableImportConfig['keyColumns'] = $this->keyColumns;
            $this->tableImportHelper->init($this->tableImportConfig);

            $this->countries = $this->tableImportHelper->getCountries();
            $this->salesOrganizations = $this->tableImportHelper->getSalessOrganization();
            $this->distributionChannels = $this->tableImportHelper->getDistributionChannel();
            
            /**
             * remove column header from array excelDataNewArray. Only data remains.
             */
            array_shift($excelDataNewArray); 
            $csvRowCount = count($excelDataNewArray);
            $time1 = new \DateTime();
            $this->tableImportHelper->truncateTempTable();
            $this->tableImportHelper->insertDataInTemp($excelDataNewArray);    // Insert csv file data in temp table
            $excelDataNewArray = $this->tableImportHelper->getDelta();         // Get delta data
            $timediff1 = $time1->diff(new \DateTime());
            echo $timediff1->format('Data insertion in temp table takes %h hour %i minute %s second').PHP_EOL;
            
            $this->monitoringItem->getLogger()->info("Total {$csvRowCount} records found in file.");

            $deltaCount = count($excelDataNewArray);


            if($deltaCount > 0)
            {

                // $chunksArr = array_chunk($excelDataNewArray, 5000);
                $j = 1;

                $i = 0;
                $length = ImportConstants::IMPORT_BATCH_SIZE;
                while ($i<$deltaCount) {
                $offset = $i;
                $diff = $deltaCount-$i;
                if ($diff < $length) {
                    $length = $diff;
                }
                $time2 = new \DateTime();
                $partialData = array_slice($excelDataNewArray, $i, $length);
                $this->processSlicedData($partialData, $plantFolderId, $countryFolderId);
                $partialData = null;
                $i = $i+$length;
                // echo "i-".$i;
                // echo "diff-".$diff;
                // echo "length-".$length;
                // echo "deltaCount-".$deltaCount;

                // echo "Record Processed: ".$i;
                // $b = time();
                //     echo "Part ".$j." completed in time: ".$a."====".$b.PHP_EOL;
                    $timediff2 = $time2->diff(new \DateTime());
                    echo $timediff2->format("Part {$j}: Record {$length} Object creation takes %h hour %i minute %s second").PHP_EOL;

                    // \Pimcore::collectGarbage();
                    // gc_collect_cycles();
                    // $a = time();
                    $j++;
                }
                $countMsg = "\nTotal Processed Records:".$deltaCount.", ";
                $countMsg .= "\nSuccess Records:".$this->successCount.", ";
                $countMsg .= "\nFailed Records:".$this->failedCount.", ";
                $countMsg .= "\nCreated Records:".$this->createdCount.", ";
                $countMsg .= "\nUpdated Records:".$this->updatedCount."\n";

                if ($allSuccess) 
                    $applicationLogMessage = "Plant Material Master Imported successfully.";
                else
                    $applicationLogMessage = "Plant material command failed to import ".$this->failedCount." Record(s) out of $totalRow Record(s)";

                $applicationLogMessage .= $countMsg;
            }
            else{
                $applicationLogMessage = "No delta records found.";
            }
            
            // $this->tableImportHelper->updateMaster();
        }
        else
        {
            $applicationLogMessage = "No record found in file.";
        }
        
        /**
         * Move imported file from inbox to archive or failed as per status
         */
        $moveParam = array(
            'filePath' => $this->inboxFilePath,
            'archivePath'   =>  $this->archiveDir,
            'failedPath'    =>  $this->failedDir,
            'status'        =>  $allSuccess,
            'fileName'      =>  time()
        );
        // $movedAssetObj = $this->common->moveFile($moveParam);
        echo $applicationLogMessage;
        if ($allSuccess)
            \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->info($applicationLogMessage);  
        else
            \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->error($applicationLogMessage);

        $this->monitoringItem->getLogger()->info($applicationLogMessage);
        $this->monitoringItem->setMessage('Finished')->setCompleted();
        $timediff = $time->diff(new \DateTime());
        echo $timediff->format('Total script time: %h hour %i minute %s second').PHP_EOL;
        \Pimcore::collectGarbage();
    }

    public function processSlicedData($data, $plantFolderId, $countryFolderId) {
        
        \Pimcore\Model\Version::disable();
        $queryTableDataArray = array();
        $storeTableDataArray = array();
        $relationTableDataArray = array();
        $dependencyTableDataArray = array();
         
        $columnSalesOrg = $this->mappingCsvColumn['salesOrg'];
        $columnDistributionChannel = $this->mappingCsvColumn['distributionChannel'];
        $columnPlant = $this->mappingCsvColumn['plant'];
        $columnMaterial = $this->mappingCsvColumn['material'];
        $columnCountryOfOrigin = $this->mappingCsvColumn['countryOfOrigin'];
        $columnPlanDeliveryTime = $this->mappingCsvColumn['planDeliveryTime'];
        $columnCommodityCode = $this->mappingCsvColumn['commodityCode'];
        $columnMinOrderQty = $this->mappingCsvColumn['minOrderQty'];
        $columnOrderQtyInc = $this->mappingCsvColumn['orderQtyInc'];
        $columnStdPackQtyUOM = $this->mappingCsvColumn['stdPackQtyUOM'];
        $columnStdPackQty = $this->mappingCsvColumn['stdPackQty'];
        $columnOutsidePurchaseIdentifier = $this->mappingCsvColumn['outsidePurchaseIdentifier'];
        $columnProfitCenter = $this->mappingCsvColumn['profitCenter'];
        $columnMrpController = $this->mappingCsvColumn['mrpController'];
        $columnTotalReplLeadTime = $this->mappingCsvColumn['totalReplLeadTime'];
        $columnSafetyStock = $this->mappingCsvColumn['safetyStock'];
        $columnStockIndicator = $this->mappingCsvColumn['stockIndicator'];

        foreach ($data as $rowCount => $rowvalueRecord) 
        {
            $rowvalue = json_decode(utf8_encode($rowvalueRecord['record']));
            $plantName = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnPlant);
            $material = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnMaterial);
            $salesOrg = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnSalesOrg);
            $distributionChannel = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnDistributionChannel);
            $countryName = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnCountryOfOrigin);
        
            $errorsData = array();
            if(empty(trim($material)))
                $errorsData[] = 'Material should not be blank.';
            
            if(empty(trim($plantName)))
                $errorsData[] = 'Plant should not be blank.';

            if(empty(trim($salesOrg)))
                $errorsData[] = 'Sales organization should not be blank.';  
            else if(!isset($this->approvedSalesOrg[$salesOrg]))            
                $errorsData[] = 'Sales Org '.$salesOrg.' should belong to '. implode(', ',$this->approvedSalesOrg);
            else if(!isset($this->salesOrganizations[$salesOrg]))
                $errorsData[] = "Sales organization ".$salesOrg. " not found  in system.";
            
            if(empty(trim($distributionChannel)))
                $errorsData[] = 'Distribution channel should not be blank.';  
            else if(!isset($this->distributionChannels[$distributionChannel]))
                $errorsData[] = "Distribution channel ".$distributionChannel. " not found  in system.";

            if(empty(trim($countryName)))
                $errorsData[] = 'Country Name should not be blank.';
            
            if(!count($errorsData))
            {
                try
                {      
                    $materialObj = $this->getMaterialObject($material);
                    if($materialObj)
                    {
                        $salesOrgCode = $this->salesOrganizations[$salesOrg];
                        $distributionChannelCode = $this->distributionChannels[$distributionChannel];

                        $plantMaterialKey = $this->common->createKeyForObject($this->fileColumns, $rowvalue, $this->keyColumns, $this->mappingCsvColumn);
                        $materialFolderId= DataObject\Service::createFolderByPath(ImportConstants::MATERIAL_MASTER_PLANT_MATERIAL_MASTER_FOLDER."/".$material)->getId();
                        $query = "SELECT oo_id, o_parentId, o_key, o_path FROM `object_12` WHERE `o_parentId` = '{$materialFolderId}' AND `o_key` LIKE '%{$plantMaterialKey}%' limit 1";
                        $objectMaterial = $this->db->fetchRow($query);
        
                        $countryName = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnCountryOfOrigin);
                        $plantObj = $this->getPlantObject($plantName, $plantFolderId);
                        $countryObj = $this->getCountryObject($countryName, $countryFolderId);
                            
                        $createdOrUpdated = 'Updated';
                        if(!$objectMaterial){      
                            $createdOrUpdated = 'Created'; 
                            $objectArr = [
                                'o_parentId' => $materialFolderId,
                                'o_key' => $plantMaterialKey,
                                'o_path' => "/".ImportConstants::MATERIAL_MASTER_PLANT_MATERIAL_MASTER_FOLDER."/".$material."/",
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
            
                        $objId = $this->tableImportHelper->insertInObjects($objectArr);
                        
                        $quantityUnit = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnStdPackQtyUOM);
                        $quantityValueUnitId = $this->common->getQuantityValueUnitId($quantityUnit);
        
                        $quantityValue = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnStdPackQty);
                        $standardPackQuantity = $this->common->getDataQuantityValue($quantityValue, $quantityValueUnitId);
                        $queryTableDataArray[] = [
                            'oo_id' => $objId,
                            'oo_classId' => 12,
                            'oo_className' => 'PlantMaterialMaster',
                            'Material' => $materialObj['oo_id'],
                            'Plant__id' => $plantObj->getId(),
                            'Plant__type' => 'object',
                            'CountryOfOrigin__id' => $countryObj->getId(),
                            'CountryOfOrigin__type' => 'object',
                            'PlannedDeliveryTime' => $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnPlanDeliveryTime),
                            'CommodityCode' => $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnCommodityCode),
                            'MinOrderQuantity' => $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnMinOrderQty),
                            'StandardPackQuantity__value' => $quantityValue,
                            'StandardPackQuantity__unit' => $quantityValueUnitId,
                            'OutsidePurchaseIdentifier' => '',
                            'PlantProfitCenter' => $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnProfitCenter),
                            'MRPController' => $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnMrpController),
                            'TotalReplenismentLeadTime' => $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnTotalReplLeadTime),
                            'StockIndicator' => $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnStockIndicator),
                            'SalesOrganization__id' => $salesOrgCode,
                            'SalesOrganization__type' => 'object',
                            'DistributionChannel__id' => $distributionChannelCode,
                            'DistributionChannel__type' => 'object',
                            'OrderingQuantityIncrements' => $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnOrderQtyInc)
                        ];
                        
                        $storeTableDataArray[] = [
                            'oo_id' => $objId,
                            'PlannedDeliveryTime' => $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnPlanDeliveryTime),
                            'CommodityCode'	=> $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnCommodityCode),
                            'MinOrderQuantity' => $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnMinOrderQty),
                            'StandardPackQuantity__value' => $quantityValue,
                            'StandardPackQuantity__unit' => $quantityValueUnitId,
                            'OutsidePurchaseIdentifier' => '',
                            'PlantProfitCenter'	=> $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnProfitCenter),
                            'MRPController' => $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnMrpController),
                            'TotalReplenismentLeadTime' => $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnTotalReplLeadTime),
                            'StockIndicator' => $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnStockIndicator),	
                            'OrderingQuantityIncrements' => $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnOrderQtyInc),
                        ];
        
                        $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $countryObj->getId(), 'type' => 'object', 'fieldname' => 'CountryOfOrigin', 'ownertype' => 'object' ];
                        $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $plantObj->getId(), 'type' => 'object', 'fieldname' => 'Plant', 'ownertype' => 'object' ];
                        $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $salesOrgCode, 'type' => 'object', 'fieldname' => 'SalesOrganization', 'ownertype' => 'object' ];
                        $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $distributionChannelCode, 'type' => 'object', 'fieldname' => 'DistributionChannel', 'ownertype' => 'object' ];
                        $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $materialObj['oo_id'], 'type' => 'object', 'fieldname' => 'Material', 'ownertype' => 'object' ];
                        
                        $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' => $countryObj->getId(), 'sourcetype' => 'object', 'targettype' => 'object'];
                        $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' => $plantObj->getId(), 'sourcetype' => 'object', 'targettype' => 'object'];
                        $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' => $salesOrgCode, 'sourcetype' => 'object', 'targettype' => 'object'];
                        $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' => $distributionChannelCode, 'sourcetype' => 'object', 'targettype' => 'object'];
                        $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' => $materialObj['oo_id'], 'sourcetype' => 'object', 'targettype' => 'object'];
                        
                        $errorsData['SUCCESS'] = "Plant Material Code: ".$plantMaterialKey." has been ".$createdOrUpdated.".";
                    }
                    else{
                        $errorsData[] = "Material ".$material. " not found in system.";
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
                $this->successCount++;
                $errorsString = "SUCCESS: ".$errorsData['SUCCESS'];
                $this->monitoringItem->getLogger()->info($errorsString);
                $statusCode = 'SUCCESS';
                $data[$rowCount]['failedReason'] = '';
            }
            else if(count($errorsData))
            {
                $allSuccess = false;
                $errorsString = "FAILED: ";
                $allErrorsInString = implode(' ', $errorsData);
                $errorsString .= $allErrorsInString;
                $this->failedCount++;
                $this->monitoringItem->getLogger()->info($errorsString);
                $statusCode = 'FAILED';
                $data[$rowCount]['failedReason'] = $allErrorsInString;
            }

            $data[$rowCount]['statusCode'] = $statusCode;
        }

        if(count($queryTableDataArray))
            $this->tableImportHelper->insertIntoProductTable($queryTableDataArray, 'object_query_12');
        
        if(count($storeTableDataArray))
            $this->tableImportHelper->insertIntoProductTable($storeTableDataArray, 'object_store_12');

        if(count($relationTableDataArray))
            $this->tableImportHelper->insertIntoProductTable($relationTableDataArray, 'object_relations_12');
        
        if(count($dependencyTableDataArray))
            $this->tableImportHelper->insertIntoProductTable($dependencyTableDataArray, 'dependencies');

        $this->tableImportHelper->insertDataToLogTable($data);
        
        unset($queryTableDataArray);
        unset($storeTableDataArray);
        unset($relationTableDataArray);
        unset($dependencyTableDataArray);
        unset($data);
                
    }

    /**
     * return material object or false
     */
    public function getMaterialObject($MaterialKey){
        $query = "SELECT oo_id, o_key, o_path FROM `object_1` WHERE `articleNumber` LIKE '%{$MaterialKey}%' limit 1";
        $objectMaterial = $this->db->fetchAll($query);
        
        foreach ($objectMaterial as $material) {
            $this->monitoringItem->getLogger()->info("Material: ".$MaterialKey." found");
            return $material;
        }

        return false;
    }

    /**
     * return plant object
     */
    public function getPlantObject($plantKey, $plantFolderId){
        
        $objectPlant = DataObject\Plant::getByPath("/".ImportConstants::MASTER_LIST_PLANTS_FOLDER."/".$plantKey);
        if(!$objectPlant)
        {
            $objectPlant = new DataObject\Plant();
            $objectPlant->setKey($plantKey);
            $objectPlant->setPlant($plantKey);
            $objectPlant->setParentId($plantFolderId);
            $objectPlant->setPublished(TRUE);   
            $objectPlant->save();  
            $this->monitoringItem->getLogger()->info("Plant: ".$plantKey." not found in master list, plant created");
        }
        else{
            $this->monitoringItem->getLogger()->info("Plant: ".$plantKey." found in master list");
        }
        return $objectPlant;

    }

        /**
     * return country object
     */
    public function getCountryObject($countryKey, $countryFolderId){
        $objectCountry = DataObject\Country::getByPath("/".ImportConstants::MASTER_LIST_COUNTRY_FOLDER."/".$countryKey);
        if(!$objectCountry)
        {
            $objectCountry = new DataObject\Country();
            $objectCountry->setKey($countryKey);
            $objectCountry->setCode($countryKey);
            $objectCountry->setName($countryKey);
            $objectCountry->setParentId($countryFolderId);
            $objectCountry->setPublished(TRUE);   
            $objectCountry->save();   
            $this->monitoringItem->getLogger()->info("Country: ".$countryKey." not found in master list, country created"); 
        }
        else{
            $this->monitoringItem->getLogger()->info("Country: ".$countryKey." found in master list");
        }
        return $objectCountry;

    }

     /**
     * return sales organization object
     */
    public function getSalesOrgObject($salesOrgKey){
        
        $object = DataObject\SalesOrganisation::getByPath("/".ImportConstants::MASTER_LIST_SALES_ORGANIZATIONS_FOLDER."/".$salesOrgKey);
        return $object;

    }

    /**
     * return distribution channel object
     */
    public function getDistributionChannelObject($distributionChannelKey){
        
        $object = DataObject\DistributionChannel::getByPath("/".ImportConstants::MASTER_LIST_DISTRIBUTION_CHANNEL_FOLDER."/".$distributionChannelKey);
        return $object;

    }

    /* This function will override the default configuration */
    private function updateDefaults($params)
    {
        if (!empty($params)) {
            foreach ($params as $k => $v) {
                if (property_exists($this, $k)) {
                    $this->$k = $v;
                }
            }
        }
    }
}
