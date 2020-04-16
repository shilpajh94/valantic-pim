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

class SalesMaterialModel
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
    private $tableImportConfig;
    private $tableImportHelper;
    private $salesOrganizations;
    private $distributionChannels;
    private $common;

    private $fileColumns = array();
    private $keyColumns = array();
    private $approvedSalesOrg = array();
    private $mappingCsvColumn = array();
    private $materialArray = array();
    private $plantArray = array();
    private $privateMaterialGroup = array();

    const LOGGER_MODULE = 'SALES MATERIAL MASTER';

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
            // $spreadsheet = Import::load($this->filePath);
            $csvImportedData = Import::getCSVData($this->filePath);
            $this->fileColumns = $csvImportedData['header'];
            $csvData = $csvImportedData['data'];
            unset($csvImportedData);
            $this->common = \Pimcore::getContainer()->get('app.common_helper');
            $this->tableImportHelper = \Pimcore::getContainer()->get('app.sales_material_import_helper');
            $salesMaterialConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getSalesMaterialConfig();

            $this->approvedSalesOrg = $this->common->getParameter($salesMaterialConfig, 'approvedSalesOrg');
            $this->privateMaterialGroup = $this->common->getParameter($salesMaterialConfig, 'privateMaterialGroup');
            $this->mappingCsvColumn = $this->common->getParameter($salesMaterialConfig, 'mappingCsvColumn');
            $this->keyColumns = $this->common->getParameter($salesMaterialConfig, 'keyColumns');
            
            $this->import($csvData);
        } catch (\Throwable $th) {
            Logger::error($this->logFileName, $th);
            die;
        }
    }

    public function import($excelDataNewArray)
    {
        $this->monitoringItem->getLogger()->info('File Information');
        $this->monitoringItem->getLogger()->info('File path is being imported: ' . $this->filePath);

        echo 'Importing File: ' . $this->filePath.PHP_EOL;
        $time = new \DateTime();
        // $excelDataNewArray = array();
        // $excelData = array();
        // $excelData = Import::getCSVData($this->filePath);
        // $this->fileColumns = $excelData['header'];
        // $excelDataNewArray = $excelData['data'];
        // unset($excelData);
        // print_r($excelDataNewArray['header']);
        // echo count($excelDataNewArray['data']);
        // $worksheet = $spreadsheet->getActiveSheet();
        // $worksheetHighestColumnRow = Import::getActiveSheetInfo($worksheet);

        /**
         * Optaining next column from last column for "status" field
         */
        // $highestDataColumnIndex =  \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($worksheetHighestColumnRow['highestDataColumn']);
        // $nextColumnIndex = $highestDataColumnIndex + 1;
        // $nextColumn = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($nextColumnIndex);

        // $lastRowLastColumn = $worksheetHighestColumnRow['highestDataColumn'] . $worksheetHighestColumnRow['highestDataRow'];

        
        /**
         * get all the data from the spreadsheet
         */
        // $excelDataNewArray = $spreadsheet->getActiveSheet()->rangeToArray("A1:$lastRowLastColumn",NULL,TRUE,TRUE,FALSE);
        
        /**
         * get folder ids of Master List, MaterialMaster, Master List/Plants, 
         * Master List/Sales Organizations, Master List/Distribution Channel 
         * and MaterialMaster/SalesMaterialMaster
         */
        DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_FOLDER);
        DataObject\Service::createFolderByPath(ImportConstants::MATERIAL_MASTER_FOLDER);
        $plantFolderId= DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_PLANTS_FOLDER)->getId();
        DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_SALES_ORGANIZATIONS_FOLDER);
        DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_DISTRIBUTION_CHANNEL_FOLDER);
        DataObject\Service::createFolderByPath(ImportConstants::MATERIAL_MASTER_SALES_MATERIAL_MASTER_FOLDER);
       
        $allSuccess = true;
        $applicationLogMessage = '';
        if(count($excelDataNewArray) > 1)
        {
            /**
             * getting csv or excel file column name
             */
            // $this->fileColumns = $excelDataNewArray[0];
            $this->tableImportConfig['fileColumns'] = $this->fileColumns;
            $this->tableImportConfig['mappingCsvColumn'] = $this->mappingCsvColumn;
            $this->tableImportConfig['keyColumns'] = $this->keyColumns;
            $this->tableImportHelper->init($this->tableImportConfig);
            $this->salesOrganizations = $this->tableImportHelper->getSalessOrganization();
            $this->distributionChannels = $this->tableImportHelper->getDistributionChannel();
            /**
             * remove column header from array excelDataNewArray. Only data remains.
             */
            // array_shift($excelDataNewArray); 
            $csvRowCount = count($excelDataNewArray);
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
            
            echo "Getting delta records...".PHP_EOL;
            $t1 = new \DateTime();
            unset($excelDataNewArray);
            $excelDataNewArray = $this->tableImportHelper->getDelta();         // Get delta data
            $td1 = $t1->diff(new \DateTime());
            echo $td1->format("Getting delta takes %h hour %i minute %s second").PHP_EOL;
            
            $this->monitoringItem->getLogger()->info("Total {$csvRowCount} records found in file.");
            echo "Total {$csvRowCount} records found in csv file.".PHP_EOL;
            $deltaCount = count($excelDataNewArray);
            echo "Total {$deltaCount} Delta records found...".PHP_EOL;
            if($deltaCount > 0)
            {
                $j = 1;

                $i = 0;
                $length = ImportConstants::IMPORT_BATCH_SIZE;
                while ($i<$deltaCount) {
                    $offset = $i;
                    $diff = $deltaCount-$i;
                    if ($diff < $length) {
                        $length = $diff;
                    }
                    
                    $partialData = array_slice($excelDataNewArray, $i, $length);
                    $i = $i+$length;
                    echo "Part {$j}, Record {$length}, Batch size ".ImportConstants::IMPORT_BATCH_SIZE.", ".PHP_EOL;
                    $this->processSlicedData($partialData, $plantFolderId);
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

                if ($this->failedCount > 0) 
                {
                    $allSuccess = false;
                    $applicationLogMessage = "Sales material command failed to import {$this->failedCount} Record(s) out of {$deltaCount} Record(s)";
                }else
                    $applicationLogMessage = "Sales Material Master Imported successfully.";
                    
                $applicationLogMessage .= $countMsg;
            }
            else{
                $applicationLogMessage = "No delta records found.";
            }
            
            $time4 = new \DateTime();
            $this->tableImportHelper->updateMaster();
            $timediff4 = $time4->diff(new \DateTime());
            echo $timediff4->format("Total {$deltaCount} replaced in master table takes %h hour %i minute %s second").PHP_EOL;
            
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
        $movedAssetObj = $this->common->moveFile($moveParam);
        echo $applicationLogMessage;

        if ($this->failedCount > 0) 
            \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->error($applicationLogMessage);
        else
            \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->info($applicationLogMessage); 

        $this->monitoringItem->getLogger()->info($applicationLogMessage);
        $this->monitoringItem->setMessage('Finished')->setCompleted();
        $timediff = $time->diff(new \DateTime());
        echo $timediff->format('Total script time: %h hour %i minute %s second').PHP_EOL;
        \Pimcore::collectGarbage();
        
    }

    public function processSlicedData($data, $plantFolderId){
        $time2 = new \DateTime();
        \Pimcore\Model\Version::disable();
        $queryTableDataArray = array();
        $storeTableDataArray = array();
        $relationTableDataArray = array();
        $dependencyTableDataArray = array();
        $createdUpdatedCount = 0;

        $columnPlant = $this->mappingCsvColumn['plant'];
        $columnMaterial = $this->mappingCsvColumn['material'];
        $columnSalesOrg = $this->mappingCsvColumn['salesOrg'];
        $columnSalesOrgDesc = $this->mappingCsvColumn['salesOrgDesc'];
        $columnDistributionChannel = $this->mappingCsvColumn['distributionChannel'];
        $columnDistributionChannelDesc = $this->mappingCsvColumn['distributionChannelDesc'];
        $columnSalesUnit = $this->mappingCsvColumn['salesUnit'];
        $columnMaterialGroup1 = $this->mappingCsvColumn['materialGroup1'];
        $columnMaterialGroup2 = $this->mappingCsvColumn['materialGroup2'];
        $columnDeletionFlag = $this->mappingCsvColumn['deletionFlag'];
        $columnDistChainStatus = $this->mappingCsvColumn['distChainStatus'];
        
	    $dataCount = count($data);
        foreach ($data as $rowCount => $rowvalueRecord) 
        {
            $rowvalue = json_decode(utf8_encode($rowvalueRecord['record']));
            $rowvalue = array_combine($this->fileColumns, $rowvalue);
            
            $plantName = $rowvalue[$columnPlant];
            $material = $rowvalue[$columnMaterial];
            $salesOrg = $rowvalue[$columnSalesOrg]; 
            $distributionChannel = $rowvalue[$columnDistributionChannel];  
            
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

            if(!count($errorsData))
            {
                try
                { 
                    if(!isset($this->materialArray[$material]))
                    {
                        $materialId = $this->getMaterialObject($material);
                        if($materialId)
                            $this->materialArray[$material] = $materialId;
                    }

                    if(isset($this->materialArray[$material]))
                    {
                        $materialObjId = $this->materialArray[$material];
                        $salesOrgCode = $this->salesOrganizations[$salesOrg];
                        $distributionChannelCode = $this->distributionChannels[$distributionChannel];

                        $salesMaterialKey = $material.'-'.$salesOrg.'-'.$distributionChannel;
                        // $salesMaterialKey = $this->createKeyForObject($rowvalue, $this->keyColumns, $this->mappingCsvColumn);

                        $materialFolderId= DataObject\Service::createFolderByPath(ImportConstants::MATERIAL_MASTER_SALES_MATERIAL_MASTER_FOLDER."/".$material)->getId();
                        $query = "SELECT oo_id, o_parentId, o_key, o_path FROM `object_10` WHERE `o_parentId` = '{$materialFolderId}' AND `o_key` LIKE '%{$salesMaterialKey}%' limit 1";
                        $objectMaterial = $this->db->fetchRow($query);
        
                        if(!isset($this->plantArray[$plantName]))
                        {
                            $plantId = $this->getPlantObject($plantName, $plantFolderId);
                            if($plantId)
                                $this->plantArray[$plantName] = $plantId;
                        }
                        $plantObjId = $this->plantArray[$plantName];
                            
                        $createdOrUpdated = 'Updated';
                        if(!$objectMaterial){      
                            $createdOrUpdated = 'Created'; 
                            $objectArr = [
                                'o_parentId' => $materialFolderId,
                                'o_key' => $salesMaterialKey,
                                'o_path' => "/".ImportConstants::MATERIAL_MASTER_SALES_MATERIAL_MASTER_FOLDER."/".$material."/",
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
                        
                        $salesUnit = $rowvalue[$columnSalesUnit];
                        $pricePageFlag = $rowvalue[$columnMaterialGroup2];
                        $epixFlag = $rowvalue[$columnMaterialGroup1];
                        $deletionFlag = $rowvalue[$columnDeletionFlag];
                        $distChainStatus = $rowvalue[$columnDistChainStatus];
                        $privateOrGenericBrand = $this->getPrivateOrGenericMaterial($pricePageFlag);

                        $queryTableDataArray[] = [
                            'oo_id' => $objId,
                            'oo_classId' => 10,
                            'oo_className' => 'SalesMaterialMaster',
                            'SalesOrganization__id' => $salesOrgCode,
                            'SalesOrganization__type' => 'object',
                            'DistributionChannel__id' => $distributionChannelCode,
                            'DistributionChannel__type' => 'object',
                            'SalesUOM' => $salesUnit,
                            'DeliveringPlant__id' => $plantObjId,
                            'DeliveringPlant__type' => 'object',
                            'SalesStatus' => '',
                            'epixFlag' => $epixFlag,
                            'pricePageFlag' => $pricePageFlag,
                            'privateBrand' => $privateOrGenericBrand,
                            'Material' => $materialObjId,
                            'deletedFlagAtDistributionChainLevel' => $distChainStatus,
                            'deletedFlagAtSalesLevel' => (strtoupper(trim($deletionFlag)) == 'X') ? 1 : -1 
                        ];
                        
                        $storeTableDataArray[] = [
                            'oo_id' => $objId,
                            'SalesUOM' => $salesUnit,
                            'SalesStatus'	=> '',
                            'epixFlag' => $epixFlag,
                            'pricePageFlag' => $pricePageFlag,
                            'privateBrand' => $privateOrGenericBrand,
                            'deletedFlagAtDistributionChainLevel' => $distChainStatus,
                            'deletedFlagAtSalesLevel' => (strtoupper(trim($deletionFlag)) == 'X') ? 1 : -1 
                        ];
        
                        $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $plantObjId, 'type' => 'object', 'fieldname' => 'DeliveringPlant', 'ownertype' => 'object' ];
                        $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $salesOrgCode, 'type' => 'object', 'fieldname' => 'SalesOrganization', 'ownertype' => 'object' ];
                        $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $distributionChannelCode, 'type' => 'object', 'fieldname' => 'DistributionChannel', 'ownertype' => 'object' ];
                        $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $materialObjId, 'type' => 'object', 'fieldname' => 'Material', 'ownertype' => 'object' ];
                        
                        $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' => $plantObjId, 'sourcetype' => 'object', 'targettype' => 'object'];
                        $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' => $salesOrgCode, 'sourcetype' => 'object', 'targettype' => 'object'];
                        $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' => $distributionChannelCode, 'sourcetype' => 'object', 'targettype' => 'object'];
                        $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' => $materialObjId, 'sourcetype' => 'object', 'targettype' => 'object'];
                        
                        $errorsData['SUCCESS'] = "Sales Material Code: ".$salesMaterialKey." has been ".$createdOrUpdated.".";
                    }
                    else{
                        $errorsData[] = "Material ".$material. " not found in system.";
                    }
                } 
                catch (\Exception $e) {

                    /* return error massage if any exception found */
                    $errorsData[] = "Sales Material Code: ".$salesMaterialKey. " - ".$e->getMessage();
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
                $allSuccess = false;
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

        if(count($queryTableDataArray))
            $this->tableImportHelper->insertIntoSalesTable($queryTableDataArray, 'object_query_10');
        
        if(count($storeTableDataArray))
            $this->tableImportHelper->insertIntoSalesTable($storeTableDataArray, 'object_store_10');

        if(count($relationTableDataArray))
            $this->tableImportHelper->insertIntoSalesTable($relationTableDataArray, 'object_relations_10');
        
        if(count($dependencyTableDataArray))
            $this->tableImportHelper->insertIntoSalesTable($dependencyTableDataArray, 'dependencies');
        
        $timediff2 = $time2->diff(new \DateTime());
        echo $timediff2->format("{$createdUpdatedCount} Object created out of {$dataCount} records in %h hour %i minute %s second").PHP_EOL;
                    
        $time3 = new \DateTime();
        $this->tableImportHelper->insertDataToLogTable($data);
        $timediff3 = $time3->diff(new \DateTime());
        echo $timediff3->format("Total {$dataCount} records inserted in log table takes %h hour %i minute %s second").PHP_EOL;
            
        echo "Unset the temporary variable ...".PHP_EOL;
        unset($queryTableDataArray);
        unset($storeTableDataArray);
        unset($relationTableDataArray);
        unset($dependencyTableDataArray);
        unset($data);
    }
    
    /**
     * return private or generic brand on the basis of material group
     */
    public function getPrivateOrGenericMaterial($pricePageFlag){
        
        $privateGenericBrand = 'Generic';

        if(in_array($pricePageFlag, $this->privateMaterialGroup))
            $privateGenericBrand = 'Private';

        return $privateGenericBrand;
        
    }

    /**
     * return material object or false
     */
    public function getMaterialObject($MaterialKey){
        $query = "SELECT oo_id, o_key, o_path FROM `object_1` WHERE `articleNumber` LIKE '%{$MaterialKey}%' limit 1";
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
        return $objectPlant->getId();

    }

    public function createKeyForObject($data, $keyColumns, $mappingCsvColumn){
        $keyColumnValues = array();
        foreach($keyColumns as $key =>$keyColumn)
        {
            $column = $mappingCsvColumn[$keyColumn];
            $keyColumnValues[] = $data[$column];
        }

        $id = implode(ImportConstants::OBJECT_KEY_SEPARATOR, $keyColumnValues);
        return $id;
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
