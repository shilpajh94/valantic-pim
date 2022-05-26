<?php

namespace PTGEU\ImportBundle\Services;

use PTGEU\ImportBundle\Model\SalesMaterialModel;
use Elements\Bundle\ProcessManagerBundle;
use Pimcore\Db;
use PTGEU\ImportBundle\Services\ImportConstants;
use Pimcore\Model\DataObject;



class SalesMaterialService
{
    use ProcessManagerBundle\ExecutionTraitClass;

    private $db;
    private $filePath;
    private $monitoringItem;
    private $failedCount = 0;
    private $successCount = 0;
    private $createdCount = 0;
    private $updatedCount = 0;
    private $tableImportConfig;
    private $tableImportHelper;
    private $common;
    private $fileColumns = array();
    private $keyColumns = array();
    private $mappingCsvColumn = array();
    private $materialArray = array();
    private $plantArray = array();
    private $salesOrgArray = array();
    private $countryOfOriginArray = array();
    private $distributionChannelArray = array();
    private $productUpdateArray = array();
    private $privateMaterialGroup = array();
    private $failedIDs = [];

    const LOGGER_MODULE = 'PTGEU SALES MATERIAL MASTER';

    public function __construct()
    {
        $this->db = Db::get();
        /* Initilize monitoring item and set the number of steps will take to complete the task */
        $this->monitoringItem = ProcessManagerBundle\ElementsProcessManagerBundle::getMonitoringItem();
        $this->common = \Pimcore::getContainer()->get('import.common_helper');
        $this->tableImportHelper = new SalesMaterialModel;
        $salesMaterialConfig = \Pimcore::getContainer()->get('import.config_provider_service')->getSalesMaterialConfig();

        $this->privateMaterialGroup = $this->common->getParameter($salesMaterialConfig, 'privateMaterialGroup'); ///???
        $this->mappingCsvColumn = $this->common->getParameter($salesMaterialConfig, 'mappingCsvColumn');
        $this->keyColumns = $this->common->getParameter($salesMaterialConfig, 'keyColumns');
    }

    public function import() {

        $sapFileFeeder  = \Pimcore::getContainer()->get('import.sap_file_feeder_service');
        $this->filePath = $sapFileFeeder->execFileFeeder('salesMaterial');

        $csvImportedData = ImportService::getCSVData($this->filePath);

        $this->fileColumns = $csvImportedData['header'];
        $excelDataNewArray = $csvImportedData['data'];
        unset($csvImportedData);

        $this->monitoringItem->getLogger()->info('File Information');
        $this->monitoringItem->getLogger()->info('File path is being imported: ' . $this->filePath);

        echo 'Importing File: ' . $this->filePath.PHP_EOL;
        $time = new \DateTime();

        DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_FOLDER);//??
        DataObject\Service::createFolderByPath(ImportConstants::PTGEU_MATERIAL_MASTER_FOLDER);
        $plantFolderId= DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_PLANTS_FOLDER)->getId(); //??
        $salesOrganizationsFolderId = DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_SALES_ORGANIZATIONS_FOLDER)->getId(); //??
        $distributionChannelFolderId = DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_DISTRIBUTION_CHANNEL_FOLDER)->getId(); //??
        $countryOfOriginFolderId  =  DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_COUNTRY_FOLDER)->getId();

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
            // $this->salesOrganizations = $this->tableImportHelper->getSalessOrganization();
            // $this->distributionChannels = $this->tableImportHelper->getDistributionChannel();
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
                    $this->processSlicedData($partialData, $plantFolderId, $salesOrganizationsFolderId, $distributionChannelFolderId, $countryOfOriginFolderId);
                    $partialData = null;
                    $this->processObsleteFlagMaterials();
                    $this->productUpdateArray = [];
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
            
            $this->tableImportHelper->deleteFailedRecordsFromMaster($this->failedIDs);
            
        }
        else
        {
            $applicationLogMessage = "No record found in file.";
        }
        
        echo $applicationLogMessage;

        if ($this->failedCount > 0) 
        {
            \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->error($applicationLogMessage);
        }
        else{
            \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->info($applicationLogMessage); 
        }
        $this->monitoringItem->getLogger()->info($applicationLogMessage);
        $this->monitoringItem->setMessage('Finished')->setCompleted();
        $timediff = $time->diff(new \DateTime());
        echo $timediff->format('Total script time: %h hour %i minute %s second').PHP_EOL;
        \Pimcore::collectGarbage();
    }

    public function processSlicedData($data, $plantFolderId, $salesOrganizationsFolderId, $distributionChannelFolderId, $countryOfOriginFolderId){
        $time2 = new \DateTime();
        \Pimcore\Model\Version::disable();
        $queryTableDataArray = array();
        $storeTableDataArray = array();
        $relationTableDataArray = array();
        $dependencyTableDataArray = array();
        $createdUpdatedCount = 0;

        $columnPlant = $this->mappingCsvColumn['deliveringPlantCode']; 
        $columnMaterial = $this->mappingCsvColumn['material'];
        $columnSalesOrg = $this->mappingCsvColumn['salesOrgCode'];
        $columnSalesOrgDesc = $this->mappingCsvColumn['salesOrgName'];
        $columnDistributionChannel = $this->mappingCsvColumn['distributionChannelCode'];
        $columnDistributionChannelDesc = $this->mappingCsvColumn['distributionChannelName'];
        $columnCountryOfOrigin = $this->mappingCsvColumn['distributionChannelCode'];
        $columnCountryOfOriginDesc = $this->mappingCsvColumn['distributionChannelName'];
        $columnSalesUnit = $this->mappingCsvColumn['salesUnit'];
        $columnPrivateBrand = $this->mappingCsvColumn['privateBrand'];  ///???
        $columnEpixFlag = $this->mappingCsvColumn['epixFlag'];
        $columnDeletionFlag = $this->mappingCsvColumn['deletionFlag'];
        $columnPricePageFlag= $this->mappingCsvColumn['pricePageFlag'];
        $columnSalesText1= $this->mappingCsvColumn['salesText1'];
        $columnSalesText2= $this->mappingCsvColumn['salesText2'];
        $columnDistChainStatus = $this->mappingCsvColumn['deleteFlagAtDistributionChainLevel'];
        
	    $dataCount = count($data);
        foreach ($data as $rowCount => $rowvalueRecord) 
        {
            $rowvalue = json_decode(utf8_encode($rowvalueRecord['record']));
            $rowvalue = array_combine($this->fileColumns, $rowvalue);
            
            $plantName = $rowvalue[$columnPlant];
            $material = $rowvalue[$columnMaterial];
            $salesOrg = $rowvalue[$columnSalesOrg]; 
            $distributionChannel = $rowvalue[$columnDistributionChannel];
            $countryOfOrigin = $rowvalue[$columnCountryOfOrigin]; 

            
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

            if(empty(trim($plantName))) 
            {
                $errorsData[] = 'Plant should not be blank.'; 
            } 

            if(empty(trim($countryOfOrigin))) 
            {
                $errorsData[] = 'Country should not be blank.'; 
            } 

            if(!count($errorsData))
            {
                try
                { 
                    if(empty($this->materialArray[$material]))
                    {
                        $materialId = $this->getMaterialObject($material);
                        if ($materialId) {
                            $this->materialArray[$material] = $materialId;
                        }
                    } else {
                        $materialId = $this->materialArray[$material];
                    }

                    if(!empty($this->materialArray[$material]))
                    {
                        $materialObjId = $this->materialArray[$material];

                        $salesMaterialKey = $material.'-'.$salesOrg.'-'.$distributionChannel.'-'.$plantName.'-'.$countryOfOrigin; 

                        $materialFolderId= DataObject\Service::createFolderByPath(ImportConstants::PTGEU_MATERIAL_MASTER_SALES_MATERIAL_MASTER_FOLDER."/".$material)->getId();
                        $query = "SELECT oo_id, o_parentId, o_key, o_path FROM `object_41` WHERE `o_parentId` = '{$materialFolderId}' AND `o_key` LIKE '%{$salesMaterialKey}%' limit 1";
                        $objectMaterial = $this->db->fetchRow($query);
        
                        if(!empty(trim($plantName)) && !isset($this->plantArray[$plantName]))
                        {
                            $plantId = $this->getPlantObject($plantName, $plantFolderId);
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
                        if(!isset($this->salesOrgArray[$salesOrg]))
                        {
                            $salesOrgDesc = $rowvalue[$columnSalesOrgDesc]; 
                             $salesOrgId = $this->getSalesOrgObject($salesOrg, $salesOrgDesc, $salesOrganizationsFolderId);
                            if($salesOrgId)
                            {
                                $this->salesOrgArray[$salesOrg] = $salesOrgId;
                            }
                        }
                        $salesOrgCode = $this->salesOrgArray[$salesOrg];

                        if(!isset($this->distributionChannelArray[$distributionChannel]))
                        {
                            $distributionChannelDesc = $rowvalue[$columnDistributionChannelDesc]; 
                            $distributionChannelId = $this->getDistributionChannelObject($distributionChannel, $distributionChannelDesc, $distributionChannelFolderId);
                            if($distributionChannelId)
                            {
                                $this->distributionChannelArray[$distributionChannel] = $distributionChannelId;
                            }
                        }
                        $distributionChannelCode = $this->distributionChannelArray[$distributionChannel];

                        if(!isset($this->countryOfOriginArray[$countryOfOrigin]))
                        {
                            $countryOfOriginDesc = $rowvalue[$columnCountryOfOriginDesc]; 
                            $countryOfOriginId = $this->getCountryOfOriginObject($countryOfOrigin, $countryOfOriginDesc, $countryOfOriginFolderId);
                            if($countryOfOriginId)
                            {
                                $this->countryOfOriginArray[$countryOfOrigin] = $distributionChannelId;
                            }
                        }
                        $countryOfOriginCode = $this->countryOfOriginArray[$countryOfOrigin];

                        $createdOrUpdated = 'Updated';
                        if(!$objectMaterial){      
                            $createdOrUpdated = 'Created'; 
                            $objectArr = [
                                'o_parentId' => $materialFolderId,
                                'o_key' => $salesMaterialKey,
                                'o_path' => "/".ImportConstants::PTGEU_MATERIAL_MASTER_SALES_MATERIAL_MASTER_FOLDER."/".$material."/",
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
                        $pricePageFlag = $rowvalue[$columnPricePageFlag];
                        $epixFlag = $rowvalue[$columnEpixFlag];
                        $deletionFlag = $rowvalue[$columnDeletionFlag];
                        $distChainStatus = $rowvalue[$columnDistChainStatus];
                        $salesText1 = $rowvalue[$columnSalesText1];
                        $salesText2 = $rowvalue[$columnSalesText2];
                        $privateOrGenericBrand = $this->getPrivateOrGenericMaterial($pricePageFlag); //???
                        
                        $this->productUpdateArray[$materialId] = $material;

                        $queryTableDataArray[] = [
                            'oo_id' => $objId,
                            'oo_classId' => 41,
                            'oo_className' => 'PTGEUSalesMaterialMaster',
                            'SalesOrganization__id' => $salesOrgCode,
                            'SalesOrganization__type' => 'object',
                            'DistributionChannel__id' => $distributionChannelCode,
                            'DistributionChannel__type' => 'object',
                            'SalesUOM' => $salesUnit,
                            'DeliveringPlant__id' => $plantObjId,
                            'DeliveringPlant__type' => 'object',
                            'CountryOfOrigin__id' => $countryOfOriginCode,
                            'CountryOfOrigin__type' => 'object',
                            'SalesStatus' => '',
                            'salesText1' => $salesText1,
                            'salesText2' => $salesText2,
                            'epixFlag' => $epixFlag,
                            'pricePageFlag' => $pricePageFlag,
                            'privateBrand' => $privateOrGenericBrand,
                            'Material' => ",".$materialObjId.",",
                            'deletedFlagAtDistributionChainLevel' => $distChainStatus,
                            'deletedFlagAtSalesLevel' => (strtoupper(trim($deletionFlag)) == 'X') ? 1 : -1 
                        ];
                        
                        $storeTableDataArray[] = [
                            'oo_id' => $objId,
                            'SalesUOM' => $salesUnit,
                            'SalesStatus'	=> '',
                            'epixFlag' => $epixFlag,
                            'salesText1' => $salesText1,
                            'salesText2' => $salesText2,
                            'pricePageFlag' => $pricePageFlag,
                            'privateBrand' => $privateOrGenericBrand,
                            'deletedFlagAtDistributionChainLevel' => $distChainStatus,
                            'deletedFlagAtSalesLevel' => (strtoupper(trim($deletionFlag)) == 'X') ? 1 : -1 
                        ];
                        
                        if($plantObjId)
                        {
                            $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $plantObjId, 'type' => 'object', 'fieldname' => 'DeliveringPlant', 'ownertype' => 'object' ];
                        }
                        $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $salesOrgCode, 'type' => 'object', 'fieldname' => 'SalesOrganization', 'ownertype' => 'object' ];
                        $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $distributionChannelCode, 'type' => 'object', 'fieldname' => 'DistributionChannel', 'ownertype' => 'object' ];
                        $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $countryOfOriginCode, 'type' => 'object', 'fieldname' => 'CountryOfOrigin', 'ownertype' => 'object' ];
                        $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $materialObjId, 'type' => 'object', 'fieldname' => 'Material', 'ownertype' => 'object' ];
                        
                        if($plantObjId)
                        {
                            $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' => $plantObjId, 'sourcetype' => 'object', 'targettype' => 'object'];
                        }
                        $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' => $salesOrgCode, 'sourcetype' => 'object', 'targettype' => 'object'];
                        $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' => $distributionChannelCode, 'sourcetype' => 'object', 'targettype' => 'object'];
                        $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' => $countryOfOriginCode, 'sourcetype' => 'object', 'targettype' => 'object'];
                        $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' => $materialObjId, 'sourcetype' => 'object', 'targettype' => 'object'];
                        
                        $errorsData['SUCCESS'] = "Sales Material Code: ".$salesMaterialKey." has been ".$createdOrUpdated.".";
                    }
                    else{
                        $errorsData[] = "Material ".$material. " not found in system.";
                        $this->failedIDs[] = $rowvalueRecord['id'];
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
            $this->tableImportHelper->insertIntoSalesTable($queryTableDataArray, 'object_query_41');
        
        if(count($storeTableDataArray))
            $this->tableImportHelper->insertIntoSalesTable($storeTableDataArray, 'object_store_41');

        if(count($relationTableDataArray))
            $this->tableImportHelper->insertIntoSalesTable($relationTableDataArray, 'object_relations_41');
        
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

    public function processObsleteFlagMaterials() {
        $productUpdateArray = [];
            foreach ($this->productUpdateArray as $objectId => $sapNumber) {
                $flag = false;
                $salesRecordsFlag = $this->tableImportHelper->getSalesMaterialRecordsByMaterial($objectId);
                if (!empty($salesRecordsFlag)) {
                    $level = 3;
                    $flag = true;
                } else {
                    $level = '';
                    $product = DataObject\PTGEUProduct::getById($objectId);
                    $currentPath = $product->getPath();
                    $siopLevel3Path = $product->getSIOPLevel3()[0]->getFullpath();
                    $siopProductPath = $this->convertCategoryPathToProduct($siopLevel3Path)."/Quote/";
                    if ($siopProductPath == $currentPath) {
                        $flag = true;
                    }
                }
                if ($flag) {
                    $product = DataObject\PTGEUProduct::getById($objectId);
                    $parentFolder = $this->getParentObject($product, $level);
                    if ($parentFolder['success']) {
                        $productUpdateArray[] = [
                            'o_id' => $objectId,
                            'o_parentId' => $parentFolder['parentId'],
                            'o_path' => $parentFolder['parentPath']."/"
                        ];
                    }
                }
        }
        if (!empty($productUpdateArray)) {
            $this->tableImportHelper->updateProductPath($productUpdateArray);
        }
    }
    public function getParentObject($object, $level = '') {
        $currentParent = $object->getParent();
        if ($level == 3) {
            $siopLevel3 = $object->getSIOPLevel3()[0];
            $siopPath = $siopLevel3->getFullpath();
            $productPath = $this->convertCategoryPathToProduct($siopPath)."/Quote";
            $productFolderId = $this->getFolderByPath($productPath);
            return ['success' => true, "parentId" => $productFolderId, "parentPath" => $productPath];
        } else {
            $siopCode = $object->getSiopFullCode();
            if (strlen($siopCode) == 18) {
                $siopLevel6 = $object->getSIOPLevel6()[0];
                $siopPath = $siopLevel6->getFullpath();
                $productPath = $this->convertCategoryPathToProduct($siopPath);
                $productFolderId = $this->getFolderByPath($productPath);
                return ['success' => true, "parentId" => $productFolderId, "parentPath" => $productPath];
            } elseif (strlen($siopCode) == 13) {
                $siopLevel4 = $object->getSIOPLevel4()[0];
                $siopPath = $siopLevel4->getFullpath();
                $productPath = $this->convertCategoryPathToProduct($siopPath);
                $oldMaterialCode = trim($object->getOldMaterialCode());
                if (empty($oldMaterialCode) || $oldMaterialCode == 'NA' || $oldMaterialCode == 'N/A' || (strlen($oldMaterialCode)!= 14) || strstr($oldMaterialCode,' ') || strstr($oldMaterialCode,'-')) {
                    $productFolderId = $this->getFolderByPath($productPath);
                    return ['success' => true, "parentId" => $productFolderId, "parentPath" => $productPath];
                } else {
                    $sixDigitCode = substr($oldMaterialCode, 0, 6);
                    $nineDigitCode = substr($oldMaterialCode, 0, 9);
                    $productFullPath = $productPath."/".$sixDigitCode."/".$nineDigitCode;
                    $productFolderId = $this->getFolderByPath($productFullPath);
                    return ['success' => true, "parentId" => $productFolderId, "parentPath" => $productFullPath];
                }
            }
        }
        return ['success' => false, "parentId" => 0];
    }
    
    public function getFolderByPath($folderPath) {
        $pathExists = \Pimcore\Model\DataObject\Service::pathExists($folderPath);
        if (empty($pathExists)) {
            $folder = \Pimcore\Model\DataObject\Service::createFolderByPath($folderPath);
        } else {
            $folder = \Pimcore\Model\DataObject\Service::getElementByPath('object', $folderPath);
        }
        return $folder->getId();
    }
    
    public function convertCategoryPathToProduct($categoryPath) {
        $search = '/PTG_EU/Master List/Product Hierarchy';
        $replace = '/PTG_EU/Products';
        return str_replace($search, $replace, $categoryPath);
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
                $objDelete = DataObject\PTGEUSalesMaterialMaster::getByPath("/".ImportConstants::PTGEU_MATERIAL_MASTER_SALES_MATERIAL_MASTER_FOLDER."/".$material."/".$key, true);

                if($objDelete)
                {
                    $deleteCount++;
                    $objDelete->setDeletedFlagAtSalesLevel(1);
                    $objDelete->setPublished(false);
                    $objDelete->save();
                }
            }

            echo "Delete flag updated for {$deleteCount} objects in system.".PHP_EOL;
        }
    }

    /**
     * return private or generic brand on the basis of material group
     */
    public function getPrivateOrGenericMaterial($pricePageFlag){
        
        $privateGenericBrand = 'Generic';

        if(in_array($pricePageFlag, $this->privateMaterialGroup))
        {
            $privateGenericBrand = 'Private';
        }
        return $privateGenericBrand;
        
    }

    /**
     * return material object or false
     */
    public function getMaterialObject($MaterialKey){
        $query = "SELECT oo_id, o_key, o_path FROM `object_38` WHERE `articleNumber` LIKE '%{$MaterialKey}%' limit 1";
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

    /**
     * return distribution channel object
     */
    public function getDistributionChannelObject($distributionChannelKey, $distributionChannelDesc, $distributionChannelFolderId){
        
        $object = DataObject\DistributionChannel::getByPath("/".ImportConstants::MASTER_LIST_DISTRIBUTION_CHANNEL_FOLDER."/".$distributionChannelKey);
        if(!$object)
        {
            $object = new DataObject\DistributionChannel();
            $object->setKey($distributionChannelKey);
            $object->setCode($distributionChannelKey);
            $object->setName($distributionChannelDesc);
            $object->setParentId($distributionChannelFolderId);
            $object->setPublished(TRUE);   
            $object->save(); 
            $this->monitoringItem->getLogger()->info("Distribution Channel: ".$distributionChannelKey." not found in master list, distribution channel created");
        }
        else{
            $this->monitoringItem->getLogger()->info("Distribution Channel: ".$distributionChannelKey." found in master list");
        }
        return $object->getId();

    }

    /**
     * return sales organization object
     */
    public function getSalesOrgObject($salesOrgKey, $salesOrgDesc, $salesOrganizationsFolderId){
        
        $object = DataObject\SalesOrganisation::getByPath("/".ImportConstants::MASTER_LIST_SALES_ORGANIZATIONS_FOLDER."/".$salesOrgKey);
        if(!$object)
        {
            $object = new DataObject\SalesOrganisation();
            $object->setKey($salesOrgKey);
            $object->setCode($salesOrgKey);
            $object->setName($salesOrgDesc);
            $object->setParentId($salesOrganizationsFolderId);
            $object->setPublished(TRUE); 
            $object->save();   
            $this->monitoringItem->getLogger()->info("Sales Org: ".$salesOrgKey." not found in master list, sales org created");
        }
        else{
            $this->monitoringItem->getLogger()->info("Sales Org: ".$salesOrgKey." found in master list");
        }
        return $object->getId();

    }

    /**
     * return distribution channel object
     */
    public function getCountryOfOriginObject($countryOfOriginKey, $countryOfOriginDesc, $countryOfOriginFolderId){
        
        $object = DataObject\Country::getByPath("/".ImportConstants::MASTER_LIST_COUNTRY_FOLDER."/".$countryOfOriginKey);
        if(!$object)
        {
            $object = new DataObject\Country();
            $object->setKey($countryOfOriginKey);
            $object->setCode($countryOfOriginKey);
            $object->setName($countryOfOriginDesc);
            $object->setParentId($countryOfOriginFolderId);
            $object->setPublished(TRUE);   
            $object->save(); 
            $this->monitoringItem->getLogger()->info("Distribution Channel: ".$countryOfOriginKey." not found in master list, distribution channel created");
        }
        else{
            $this->monitoringItem->getLogger()->info("Distribution Channel: ".$countryOfOriginKey." found in master list");
        }
        return $object->getId();

    }

    /* This function will override the default configuration */
    /* private function updateDefaults($params)
    {
        if (!empty($params)) {
            foreach ($params as $k => $v) {
                if (property_exists($this, $k)) {
                    $this->$k = $v;
                }
            }
        }
    } */
}