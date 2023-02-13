<?php

namespace IFSEU\ImportBundle\Services;

use IFSEU\ImportBundle\Model\SalesMaterialModel;
use Elements\Bundle\ProcessManagerBundle;
use Pimcore\Db;
use IFSEU\ImportBundle\Services\ImportConstants;
use Pimcore\Model\DataObject;



class SalesMaterialService
{
    use ProcessManagerBundle\ExecutionTraitClass;

    private $db;
    private $filePath;
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
    private $countryOfOriginArray = array();
    private $distributionChannelArray = array();
    private $productUpdateArray = array();
    private $failedIDs = [];

    const LOGGER_MODULE = 'IFSEU SALES MATERIAL MASTER';

    public function __construct() {
        $this->db = Db::get();
        /* Initilize monitoring item and set the number of steps will take to complete the task */
        $this->common = \Pimcore::getContainer()->get('ifs_eu_import.common_helper');
        $this->tableImportHelper = new SalesMaterialModel;
        $salesMaterialConfig = \Pimcore::getContainer()->get('ifs_eu_import.config_provider_service')->getSalesMaterialConfig();
        $this->mappingCsvColumn = $this->common->getParameter($salesMaterialConfig, 'mappingCsvColumn');
    }

    public function import() {
        
        $sapFileFeeder  = \Pimcore::getContainer()->get('ifs_eu_import.sap_file_feeder_service');
        $this->filePath = $sapFileFeeder->execFileFeeder('salesMaterial');

        $csvImportedData = ImportService::getCSVData($this->filePath);

        $this->fileColumns = $csvImportedData['header'];
        $excelDataNewArray = $csvImportedData['data'];
        unset($csvImportedData);

        // remove once testing done
        $excelDataNewArray = (array_slice($excelDataNewArray, 300, 5));

        echo 'Importing File: ' . $this->filePath.PHP_EOL;
        $time = new \DateTime();

        DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_FOLDER);
        DataObject\Service::createFolderByPath(ImportConstants::IFSEU_MATERIAL_MASTER_FOLDER);
        $plantFolderId= DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_PLANTS_FOLDER)->getId();
        $salesOrganizationsFolderId = DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_SALES_ORGANIZATIONS_FOLDER)->getId();
        $distributionChannelFolderId = DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_DISTRIBUTION_CHANNEL_FOLDER)->getId();
        $countryOfOriginFolderId  =  DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_COUNTRY_FOLDER)->getId();

        $this->importStart($excelDataNewArray, $time, $plantFolderId, $salesOrganizationsFolderId, $distributionChannelFolderId, $countryOfOriginFolderId);
    }

    public function importStart($excelDataNewArray, $time, $plantFolderId, $salesOrganizationsFolderId, $distributionChannelFolderId, $countryOfOriginFolderId) {
        if(count($excelDataNewArray) > 1) {
           
            $csvRowCount = count($excelDataNewArray);

            echo "Creating IFS EU sales material tables...".PHP_EOL;
            $t = new \DateTime();
            $this->tableImportHelper->createSalesMaterialTable();
            $td = $t->diff(new \DateTime());
            echo $td->format("Creating IFS EU sales material tables takes %h hour %i minute %s second").PHP_EOL;
                

            echo "Truncating temp table...".PHP_EOL; 
            $t = new \DateTime();
            $this->tableImportHelper->truncateTempTable();
            $td = $t->diff(new \DateTime());
            echo $td->format("Truncating temp table takes %h hour %i minute %s second").PHP_EOL;
            
            echo "Inserting temp table...".PHP_EOL;
            $time1 = new \DateTime();
            $this->tableImportHelper->insertDataInTemp($excelDataNewArray, $this->fileColumns);   
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
            $excelDataNewArray = $this->tableImportHelper->getDelta();        
            $td1 = $t1->diff(new \DateTime());
            echo $td1->format("Getting delta takes %h hour %i minute %s second").PHP_EOL;
            
            echo "Total {$csvRowCount} records found in csv file.".PHP_EOL;
            $deltaCount = count($excelDataNewArray);
            echo "Total {$deltaCount} Delta records found...".PHP_EOL;
            if($deltaCount > 0) {
                $applicationLogMessage = $this->countDelta($deltaCount, $excelDataNewArray, $plantFolderId, $salesOrganizationsFolderId, $distributionChannelFolderId, $countryOfOriginFolderId);
            } else {
                $applicationLogMessage = "No delta records found.";
            }
            
            $time4 = new \DateTime();
            $this->tableImportHelper->updateMaster();
            $timediff4 = $time4->diff(new \DateTime());
            echo $timediff4->format("Total {$deltaCount} replaced in master table takes %h hour %i minute %s second").PHP_EOL;
            
            $this->tableImportHelper->deleteFailedRecordsFromMaster($this->failedIDs);
            
        } else {
            $applicationLogMessage = "No record found in file.";
        }
        
        echo $applicationLogMessage;

        $timediff = $time->diff(new \DateTime());
        echo $timediff->format('Total script time: %h hour %i minute %s second').PHP_EOL;
        \Pimcore::collectGarbage();
    }

    public function countDelta($deltaCount, $excelDataNewArray, $plantFolderId, $salesOrganizationsFolderId, $distributionChannelFolderId, $countryOfOriginFolderId) {

        $j = 1;
        $i = 0;
        $applicationLogMessage = '';
        $length = ImportConstants::IMPORT_BATCH_SIZE;
        while ($i<$deltaCount) {
            $diff = $deltaCount-$i;
            if ($diff < $length) {
                $length = $diff;
            }
            
            $partialData = array_slice($excelDataNewArray, $i, $length);
            
            $i = $i+$length;
            echo "Part {$j}, Record {$length}, Batch size ".ImportConstants::IMPORT_BATCH_SIZE.", ".PHP_EOL;
            $this->processSlicedData($partialData, $plantFolderId, $salesOrganizationsFolderId, $distributionChannelFolderId, $countryOfOriginFolderId);
            $partialData = null;
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

        if ($this->failedCount > 0) {
            $applicationLogMessage = "Sales material command failed to import {$this->failedCount} Record(s) out of {$deltaCount} Record(s)";
        } else {
            $applicationLogMessage = "Sales Material Master Imported successfully.";
        }   
        $applicationLogMessage .= $countMsg;

        return $applicationLogMessage;
    }

    private function processRowData($objectMaterial, $materialFolderId, $salesMaterialKey, $material) {
        $createdOrUpdated = 'Updated';
        if(!$objectMaterial){      
            $createdOrUpdated = 'Created'; 
            $objectArr = [
                'o_parentId' => $materialFolderId,
                'o_key' => $salesMaterialKey,
                'o_path' => "/".ImportConstants::IFSEU_MATERIAL_MASTER_SALES_MATERIAL_MASTER_FOLDER."/".$material."/",
            ];
            $this->createdCount++;
        }else{
            $objectArr = [
                'o_parentId' => $objectMaterial['o_parentId'],
                'o_key' => $objectMaterial['o_key'],
                'o_path' => $objectMaterial['o_path'],
            ];
            $this->updatedCount++;
        }

        $objId = $this->tableImportHelper->insertInObjects($objectArr);

        return ['createdOrUpdated' => $createdOrUpdated, 'objId' => $objId];
    }
    
    public function processSlicedData($data, $plantFolderId, $salesOrganizationsFolderId, $distributionChannelFolderId, $countryOfOriginFolderId) {
        $time2 = new \DateTime();
        \Pimcore\Model\Version::disable();
        $queryTableDataArray = array();
        $storeTableDataArray = array();
        $relationTableDataArray = array();
        $dependencyTableDataArray = array();
        $createdUpdatedCount = 0;

        $columnMaterial = $this->mappingCsvColumn['Material'];
        $columnSalesOrg = $this->mappingCsvColumn['SalesOrganization'];
        $columnDistributionChannel = $this->mappingCsvColumn['DistributionChannel'];
        $columnPlant = $this->mappingCsvColumn['DeliveringPlant']; 
        $columnSalesUnit = $this->mappingCsvColumn['SalesUOM'];
        $columnDistChainStatus = $this->mappingCsvColumn['deletedFlagAtDistributionChainLevel'];
        
        
        $columnSalesOrgDesc = $this->mappingCsvColumn['SalesOrgDesc'];
        
        $columnDistributionChannelDesc = $this->mappingCsvColumn['DistChannelDesc'];
        // $columnCountryOfOrigin = $this->mappingCsvColumn['countryOfOriginCode'];
        // $columnCountryOfOriginDesc = $this->mappingCsvColumn['countryOfOriginName'];
        
        // $columnEpixFlag = $this->mappingCsvColumn['epixFlag'];
        // $columnDeletionFlag = $this->mappingCsvColumn['deletionFlag'];
        // $columnPricePageFlag= $this->mappingCsvColumn['pricePageFlag'];
        // $columnSalesText1= $this->mappingCsvColumn['salesText1'];
        // $columnSalesText2= $this->mappingCsvColumn['salesText2'];
        // $columnPrivateBrand= $this->mappingCsvColumn['privateBrand'];
        
        
	    $dataCount = count($data);
        foreach ($data as $rowCount => $rowvalueRecord) {
            
            $rowvalue = json_decode($rowvalueRecord['record']);
            $rowvalue = array_combine($this->fileColumns, $rowvalue);

            $plantName = $rowvalue[$columnPlant];
            $material = $rowvalue[$columnMaterial];
            $salesOrg = $rowvalue[$columnSalesOrg];
            $distributionChannel = $rowvalue[$columnDistributionChannel];
            // $countryOfOrigin = $rowvalue[$columnCountryOfOrigin];
            // p_r("$plantName - $material - $salesOrg - $distributionChannel");
            $errorsData = array();

            if(empty(trim($material))) {
                $errorsData[] = 'Material should not be blank.'; 
            }       
            if(empty(trim($salesOrg))) {
                $errorsData[] = 'Sales organization should not be blank.'; 
            } 
            if(empty(trim($distributionChannel))) {
                $errorsData[] = 'Distribution channel should not be blank.';  
            }
            if(empty(trim($plantName))) {
                $errorsData[] = 'Plant should not be blank.'; 
            } 
            
            if(!count($errorsData)) {
                try
                {
                    if(empty($this->materialArray[$material])) {
                        $materialId = $this->getMaterialObject($material);
                        if ($materialId) {
                            $this->materialArray[$material] = $materialId;
                        }
                    } else {
                        $materialId = $this->materialArray[$material];
                    }

                    if(!empty($this->materialArray[$material])) {
                        $materialObjId = $this->materialArray[$material];

                        $salesMaterialKey = $material.'-'.$salesOrg.'-'.$distributionChannel.'-'.$plantName; 

                        $materialFolderId= DataObject\Service::createFolderByPath(ImportConstants::IFSEU_MATERIAL_MASTER_SALES_MATERIAL_MASTER_FOLDER."/".$material)->getId();
                        $query = "SELECT oo_id, o_parentId, o_key, o_path FROM `object_IFSEUSalesMaterialMaster` WHERE `o_parentId` = '{$materialFolderId}' AND `o_key` LIKE '%{$salesMaterialKey}%' limit 1";
                        $objectMaterial = $this->db->fetchRow($query);
        
                        if(!empty(trim($plantName)) && !isset($this->plantArray[$plantName])) {
                            $plantId = $this->getPlantObject($plantName, $plantFolderId);
                            if($plantId) {
                                $this->plantArray[$plantName] = $plantId;
                            }
                        }
                        $plantObjId = '';
                        if(isset($this->plantArray[$plantName])) {
                            $plantObjId = $this->plantArray[$plantName];
                        }

                        if(!isset($this->salesOrgArray[$salesOrg])) {
                            $salesOrgDesc = $rowvalue[$columnSalesOrgDesc]; 

                            $salesOrgId = $this->getSalesOrgObject($salesOrg, $salesOrgDesc, $salesOrganizationsFolderId);
                            if($salesOrgId) {
                                $this->salesOrgArray[$salesOrg] = $salesOrgId;
                            }
                        }
                        $salesOrgCode = $this->salesOrgArray[$salesOrg];


                        if(!isset($this->distributionChannelArray[$distributionChannel])) {
                            $distributionChannelDesc = $rowvalue[$columnDistributionChannelDesc]; 
                            $distributionChannelId = $this->getDistributionChannelObject($distributionChannel, $distributionChannelDesc, $distributionChannelFolderId);
                            if($distributionChannelId) {
                                $this->distributionChannelArray[$distributionChannel] = $distributionChannelId;
                            }
                        }
                        $distributionChannelCode = $this->distributionChannelArray[$distributionChannel];

                        $resultRowData      = $this->processRowData($objectMaterial, $materialFolderId, $salesMaterialKey, $material);
                        $createdOrUpdated   = $resultRowData['createdOrUpdated'];            
                        $objId              = $resultRowData['objId'];

                        $salesUnit = $rowvalue[$columnSalesUnit];
                        $pricePageFlag = '';
                        $epixFlag = '';
                        $deletionFlag = '';
                        $distChainStatus = $rowvalue[$columnDistChainStatus];
                        $materialGroup5Value = '';
                        $privateOrGenericBrand = '';
                        
                        $this->productUpdateArray[$materialId] = $material;

                        $queryTableDataArray[] = ['oo_id' => $objId,
                            'oo_classId' => 'IFSEUSalesMaterialMaster',
                            'oo_className' => 'IFSEUSalesMaterialMaster',
                            'SalesOrganization__id' => $salesOrgCode,
                            'SalesOrganization__type' => 'object',
                            'DistributionChannel__id' => $distributionChannelCode,
                            'DistributionChannel__type' => 'object',
                            'SalesUOM' => $salesUnit,
                            'DeliveringPlant__id' => $plantObjId,
                            'DeliveringPlant__type' => 'object',
                            'epixFlag' => (strtoupper(trim($epixFlag)) == 'X') ? 1 : -1,
                            'pricePageFlag' => (strtoupper(trim($pricePageFlag)) == 'X') ? 1 : -1,
                            'privateBrand' => $privateOrGenericBrand,
                            'Material' => ",".$materialObjId.",",
                            'deletedFlagAtDistributionChainLevel' => $distChainStatus,
                            'deletedFlagAtSalesLevel' => (strtoupper(trim($deletionFlag)) == 'X') ? 1 : -1 
                        ];
                        
                        $storeTableDataArray[] = [
                            'oo_id' => $objId,
                            'SalesUOM' => $salesUnit,
                            'epixFlag' => (strtoupper(trim($epixFlag)) == 'X') ? 1 : -1,
                            'pricePageFlag' => (strtoupper(trim($pricePageFlag)) == 'X') ? 1 : -1,
                            'privateBrand' => $privateOrGenericBrand,
                            'deletedFlagAtDistributionChainLevel' => $distChainStatus,
                            'deletedFlagAtSalesLevel' => (strtoupper(trim($deletionFlag)) == 'X') ? 1 : -1 
                        ];
                        
                        if($plantObjId) {
                            $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $plantObjId, 'type' => 'object', 'fieldname' => 'DeliveringPlant', 'ownertype' => 'object' ];
                        }
                        $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $salesOrgCode, 'type' => 'object', 'fieldname' => 'SalesOrganization', 'ownertype' => 'object' ];
                        $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $distributionChannelCode, 'type' => 'object', 'fieldname' => 'DistributionChannel', 'ownertype' => 'object' ];
                        $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $materialObjId, 'type' => 'object', 'fieldname' => 'Material', 'ownertype' => 'object' ];
                        
                        if($plantObjId) {
                            $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' => $plantObjId, 'sourcetype' => 'object', 'targettype' => 'object'];
                        }
                        $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' => $salesOrgCode, 'sourcetype' => 'object', 'targettype' => 'object'];
                        $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' => $distributionChannelCode, 'sourcetype' => 'object', 'targettype' => 'object'];
                        $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' => $materialObjId, 'sourcetype' => 'object', 'targettype' => 'object'];
                        
                        $errorsData['SUCCESS'] = "Sales Material Code: ".$salesMaterialKey." has been ".$createdOrUpdated.".";
                    } else{
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
            if(isset($errorsData['SUCCESS'])) {
                $createdUpdatedCount++;
                $this->successCount++;
                $errorsString = "SUCCESS: ".$errorsData['SUCCESS'];
                $statusCode = 'SUCCESS';
                $data[$rowCount]['failedReason'] = '';
            } else if(count($errorsData)) {
                $errorsString = "FAILED: ";
                $allErrorsInString = implode(' ', $errorsData);
                $errorsString .= $allErrorsInString;
                $this->failedCount++;
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

    public function insertDataInDB($queryTableDataArray, $storeTableDataArray, $relationTableDataArray, $dependencyTableDataArray) 
    {       
        if(count($queryTableDataArray)) {
            $this->tableImportHelper->insertIntoSalesTable($queryTableDataArray, 'object_query_IFSEUSalesMaterialMaster');
        }
        if(count($storeTableDataArray)) {
            $this->tableImportHelper->insertIntoSalesTable($storeTableDataArray, 'object_store_IFSEUSalesMaterialMaster');
        }
        if(count($relationTableDataArray))  {
            $this->tableImportHelper->insertIntoSalesTable($relationTableDataArray, 'object_relations_IFSEUSalesMaterialMaster');
        }
        if(count($dependencyTableDataArray)) {
            $this->tableImportHelper->insertIntoSalesTable($dependencyTableDataArray, 'dependencies');
        }
    }

    public function processDeletedRecords($deletedRecords) {
        $deleteCount = 0;
        if(count($deletedRecords) > 0) {
            foreach ($deletedRecords as $key => $value) {
                $keyArray = explode('$',$value['id']);
                $material = $keyArray[0];
                $key = str_replace('$','-',$value['id']);
                $objDelete = DataObject\IFSEUSalesMaterialMaster::getByPath("/".ImportConstants::IFSEU_MATERIAL_MASTER_SALES_MATERIAL_MASTER_FOLDER."/".$material."/".$key, true);

                if($objDelete) {
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
     * return material object or false
     */
    public function getMaterialObject($MaterialKey) {
        $query = "SELECT oo_id, o_key, o_path FROM `object_IFSEUProduct` WHERE `articleNumber` LIKE '%{$MaterialKey}%' limit 1";
        $objectMaterial = $this->db->fetchAll($query);
        
        foreach ($objectMaterial as $material) {
            return $material['oo_id'];
        }
        return false;
    }

    /**
     * return plant object
     */
    public function getPlantObject($plantKey, $plantFolderId) {
        $objectPlant = DataObject\IFSEUPlant::getByPlant($plantKey,1);
        if(empty($objectPlant)) {
            $objectPlant = new DataObject\IFSEUPlant();
            $objectPlant->setKey($plantKey);
            $objectPlant->setPlant($plantKey);
            $objectPlant->setParentId($plantFolderId);
            $objectPlant->setPublished(TRUE);   
            $objectPlant->save();  
        }

        return $objectPlant->getId();
    }

    /**
     * return distribution channel object
     */
    public function getDistributionChannelObject($distributionChannelKey, $distributionChannelDesc, $distributionChannelFolderId) {
        $object = DataObject\IFSEUDistributionChannel::getByCode($distributionChannelKey, 1);
        if(empty($object)) {
            $object = new DataObject\IFSEUDistributionChannel();
            $object->setKey($distributionChannelKey."-".$distributionChannelDesc);
            $object->setCode($distributionChannelKey);
            $object->setName($distributionChannelDesc);
            $object->setParentId($distributionChannelFolderId);
            $object->setPublished(TRUE);   
            $object->save(); 

        } else {
            $object->setCode($distributionChannelKey);
            $object->setName($distributionChannelDesc);
            $object->save(); 
        }

        return $object->getId();
    }

    /**
     * return sales organization object
     */
    public function getSalesOrgObject($salesOrgKey, $salesOrgDesc, $salesOrganizationsFolderId) {
        $object = DataObject\IFSEUSalesOrganisation::getByCode($salesOrgKey,1);
        if(empty($object)) {
            $object = new DataObject\IFSEUSalesOrganisation();
            $object->setKey($salesOrgKey."-".$salesOrgDesc);
            $object->setCode($salesOrgKey);
            $object->setName($salesOrgDesc);
            $object->setParentId($salesOrganizationsFolderId);
            $object->setPublished(TRUE); 
            $object->save();   

        } else {
            $object->setCode($salesOrgKey);
            $object->setName($salesOrgDesc);
            $object->save(); 
        }

        return $object->getId();
    }
}