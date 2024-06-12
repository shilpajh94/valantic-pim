<?php

namespace PTGEU\ImportBundle\Services;

use PTGEU\ImportBundle\Model\SalesMaterialModel;
use Elements\Bundle\ProcessManagerBundle;
use Pimcore\Db;
use PTGEU\ImportBundle\Services\ImportConstants;
use Pimcore\Model\DataObject;
use Symfony\Component\DependencyInjection\ContainerInterface;

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
    private $mappingCsvColumn = array();
    private $materialArray = array();
    private $plantArray = array();
    private $salesOrgArray = array();
    private $countryOfOriginArray = array();
    private $distributionChannelArray = array();
    private $productUpdateArray = array();
    private $failedIDs = [];
    private $countryOfOriginCode;
    private $distributionChannelCode;
    private $container;

    const LOGGER_MODULE = 'PTGEU SALES MATERIAL MASTER';

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
        $this->db = Db::get();
        /* Initilize monitoring item and set the number of steps will take to complete the task */
        $this->monitoringItem = ProcessManagerBundle\ElementsProcessManagerBundle::getMonitoringItem();
        $this->common = $this->container->get('import.common_helper');
        $this->tableImportHelper = new SalesMaterialModel;
        $salesMaterialConfig = $this->container->get('import.config_provider_service')
        ->getSalesMaterialConfig();

        $this->mappingCsvColumn = $this->common->getParameter($salesMaterialConfig, 'mappingCsvColumn');
    }

    public function import() {
        \AppBundle\Helper\Common::clearAndDisablePimCache();
        $sapFileFeeder  = $this->container->get('import.sap_file_feeder_service');
        $this->filePath = $sapFileFeeder->execFileFeeder('salesMaterial');

        $csvImportedData = ImportService::getCSVData($this->filePath);

        $this->fileColumns = $csvImportedData['header'];
        $excelDataNewArray = $csvImportedData['data'];
        unset($csvImportedData);

        $this->monitoringItem->getLogger()->info('File Information');
        $this->monitoringItem->getLogger()->info('File path is being imported: ' . $this->filePath);

        echo 'Importing File: ' . $this->filePath.PHP_EOL;
        $time = new \DateTime();

        DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_FOLDER);
        DataObject\Service::createFolderByPath(ImportConstants::PTGEU_MATERIAL_MASTER_FOLDER);
        $plantFolderId= DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_PLANTS_FOLDER)->getId();
        $salesOrganizationsFolderId = DataObject\Service::createFolderByPath(ImportConstants::
        MASTER_LIST_SALES_ORGANIZATIONS_FOLDER)->getId();
        $distributionChannelFolderId = DataObject\Service::createFolderByPath(ImportConstants::
        MASTER_LIST_DISTRIBUTION_CHANNEL_FOLDER)->getId();
        $countryOfOriginFolderId  =  DataObject\Service::createFolderByPath(ImportConstants::
        MASTER_LIST_COUNTRY_FOLDER)->getId();

        $this->importStart($excelDataNewArray, $time, $plantFolderId,
         $salesOrganizationsFolderId, $distributionChannelFolderId, $countryOfOriginFolderId);
         \AppBundle\Helper\Common::endablePimCache();
    }

    public function importStart($excelDataNewArray, $time, $plantFolderId,
     $salesOrganizationsFolderId, $distributionChannelFolderId, $countryOfOriginFolderId) {
        if(count($excelDataNewArray) > 1) {

            $this->tableImportConfig['fileColumns'] = $this->fileColumns;
            $this->tableImportConfig['mappingCsvColumn'] = $this->mappingCsvColumn;
            $this->tableImportHelper->init($this->tableImportConfig);

            $csvRowCount = count($excelDataNewArray);
            echo "Truncating temp table...".PHP_EOL;
            $t = new \DateTime();
            $this->tableImportHelper->truncateTempTable();
            $td = $t->diff(new \DateTime());
            echo $td->format("Truncating temp table takes %h hour %i minute %s second").PHP_EOL;

            echo "Inserting temp table...".PHP_EOL;
            $time1 = new \DateTime();
            $this->tableImportHelper->insertDataInTemp($excelDataNewArray, $this->fileColumns);
            $timediff1 = $time1->diff(new \DateTime());
            echo $timediff1->format("Total {$csvRowCount} records inserted in temp table takes
             %h hour %i minute %s second").PHP_EOL;
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

            $this->monitoringItem->getLogger()->info("Total {$csvRowCount} records found in file.");
            echo "Total {$csvRowCount} records found in csv file.".PHP_EOL;
            $deltaCount = count($excelDataNewArray);
            echo "Total {$deltaCount} Delta records found...".PHP_EOL;
            if($deltaCount > 0) {
                $applicationLogMessage = $this->countDelta($deltaCount, $excelDataNewArray,
                 $plantFolderId, $salesOrganizationsFolderId, $distributionChannelFolderId, $countryOfOriginFolderId);
            } else {
                $applicationLogMessage = "No delta records found.";
            }

            $time4 = new \DateTime();
            $this->tableImportHelper->updateMaster();
            $timediff4 = $time4->diff(new \DateTime());
            echo $timediff4->format("Total {$deltaCount} replaced in master table takes
             %h hour %i minute %s second").PHP_EOL;

            $this->tableImportHelper->deleteFailedRecordsFromMaster($this->failedIDs);

        } else {
            $applicationLogMessage = "No record found in file.";
        }

        echo $applicationLogMessage;

        if ($this->failedCount > 0) {
            \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->error($applicationLogMessage);
        } else {
            \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->info($applicationLogMessage);
        }

        $this->importFinished($applicationLogMessage, $time);
    }

    public function countDelta($deltaCount, $excelDataNewArray, $plantFolderId,
    $salesOrganizationsFolderId, $distributionChannelFolderId, $countryOfOriginFolderId) {
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
            $this->processSlicedData($partialData, $plantFolderId, $salesOrganizationsFolderId,
             $distributionChannelFolderId, $countryOfOriginFolderId);
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
            $applicationLogMessage = "Sales material command failed to import
             {$this->failedCount} Record(s) out of {$deltaCount} Record(s)";
        } else {
            $applicationLogMessage = "Sales Material Master Imported successfully.";
        }
        $applicationLogMessage .= $countMsg;

        return $applicationLogMessage;
    }

    public function importFinished($applicationLogMessage, $time) {
        $this->monitoringItem->getLogger()->info($applicationLogMessage);
        $this->monitoringItem->setMessage('Finished')->setCompleted();
        $timediff = $time->diff(new \DateTime());
        echo $timediff->format('Total script time: %h hour %i minute %s second').PHP_EOL;
        \Pimcore::collectGarbage();
    }

    private function processRowData($objectMaterial, $materialFolderId, $salesMaterialKey, $material) {
        $createdOrUpdated = 'Updated';
        if(!$objectMaterial){
            $createdOrUpdated = 'Created';
            $objectArr = [
                'parentId' => $materialFolderId,
                'key' => $salesMaterialKey,
                'path' => "/".ImportConstants::PTGEU_MATERIAL_MASTER_SALES_MATERIAL_MASTER_FOLDER."/".$material."/",
            ];
            $this->createdCount++;
        }else{
            $objectArr = [
                'parentId' => $objectMaterial['parentId'],
                'key' => $objectMaterial['key'],
                'path' => $objectMaterial['path'],
            ];
            $this->updatedCount++;
        }

        $objId = $this->tableImportHelper->insertInObjects($objectArr);

        return ['createdOrUpdated' => $createdOrUpdated, 'objId' => $objId];
    }

    public function processSlicedData($data, $plantFolderId, $salesOrganizationsFolderId,
     $distributionChannelFolderId, $countryOfOriginFolderId) {
        $time2 = new \DateTime();
        \Pimcore\Model\Version::disable();
        $queryTableDataArray = array();
        $storeTableDataArray = array();
        $relationTableDataArray = array();
        $dependencyTableDataArray = array();
        $createdUpdatedCount = 0;
        $salesOrgCode = '';

        $columnPlant = $this->mappingCsvColumn['deliveringPlantCode'];
        $columnMaterial = $this->mappingCsvColumn['material'];
        $columnSalesOrg = $this->mappingCsvColumn['salesOrgCode'];
        $columnSalesOrgDesc = $this->mappingCsvColumn['salesOrgName'];
        $columnDistributionChannel = $this->mappingCsvColumn['distributionChannelCode'];
        $columnDistributionChannelDesc = $this->mappingCsvColumn['distributionChannelName'];
        $columnCountryOfOrigin = $this->mappingCsvColumn['countryOfOriginCode'];
        $columnCountryOfOriginDesc = $this->mappingCsvColumn['countryOfOriginName'];
        $columnSalesUnit = $this->mappingCsvColumn['salesUnit'];
        $columnEpixFlag = $this->mappingCsvColumn['epixFlag'];
        $columnDeletionFlag = $this->mappingCsvColumn['deletedFlagAtSalesLevel'];
        $columnPricePageFlag= $this->mappingCsvColumn['pricePageFlag'];
        $columnSalesText1= $this->mappingCsvColumn['salesText1'];
        $columnSalesText2= $this->mappingCsvColumn['salesText2'];
        $columnPrivateBrand= $this->mappingCsvColumn['privateBrand'];
        // $columnDistChainStatus = $this->mappingCsvColumn['deleteFlagAtDistributionChainLevel'];

	    $dataCount = count($data);
        foreach ($data as $rowCount => $rowvalueRecord) {
            $rowvalue = json_decode(mb_convert_encoding($rowvalueRecord['record'], 'UTF-8'));
            $rowvalue = array_combine($this->fileColumns, $rowvalue);

            $plantName = $rowvalue[$columnPlant];
            $material = $rowvalue[$columnMaterial];
            $salesOrg = $rowvalue[$columnSalesOrg];
            $distributionChannel = $rowvalue[$columnDistributionChannel];
            $countryOfOrigin = $rowvalue[$columnCountryOfOrigin];

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
            if(empty(trim($countryOfOrigin))) {
                $errorsData[] = 'Country should not be blank.';
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

                        $salesMaterialKey = $material.'-'.$salesOrg.'-'.$distributionChannel.'-'.
                        $plantName.'-'.$countryOfOrigin;

                        $materialFolderId= DataObject\Service::createFolderByPath(ImportConstants::
                        PTGEU_MATERIAL_MASTER_SALES_MATERIAL_MASTER_FOLDER."/".$material)->getId();
                        $query = "SELECT oo_id, parentId, `key`, `path` FROM `object_41` WHERE
                         `parentId` = '{$materialFolderId}' AND `key` LIKE '%{$salesMaterialKey}%' limit 1";
                        $objectMaterial = $this->db->fetchAssociative($query);

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

                            $salesOrgId = $this->getSalesOrgObject($salesOrg, $salesOrgDesc,
                             $salesOrganizationsFolderId);
                            if($salesOrgId) {
                                $this->salesOrgArray[$salesOrg] = $salesOrgId;
                                $salesOrgCode = $this->salesOrgArray[$salesOrg];
                            }
                        }


                        if(!isset($this->distributionChannelArray[$distributionChannel])) {
                            $distributionChannelDesc = $rowvalue[$columnDistributionChannelDesc];
                            $distributionChannelId = $this->getDistributionChannelObject($distributionChannel,
                             $distributionChannelDesc, $distributionChannelFolderId);
                            if($distributionChannelId) {
                                $this->distributionChannelArray[$distributionChannel] = $distributionChannelId;
                                $this->distributionChannelCode = $this->distributionChannelArray[$distributionChannel];
                            }
                        }

                        if(!isset($this->countryOfOriginArray[$countryOfOrigin])) {
                            $countryOfOriginDesc = $rowvalue[$columnCountryOfOriginDesc];
                            $countryOfOriginId = $this->getCountryOfOriginObject($countryOfOrigin,
                             $countryOfOriginDesc, $countryOfOriginFolderId);
                            if($countryOfOriginId) {
                                $this->countryOfOriginArray[$countryOfOrigin] = $countryOfOriginId;
                                $this->countryOfOriginCode = $this->countryOfOriginArray[$countryOfOrigin];
                            }
                        }

                        $resultRowData      = $this->processRowData($objectMaterial,
                        $materialFolderId, $salesMaterialKey, $material);
                        $createdOrUpdated   = $resultRowData['createdOrUpdated'];
                        $objId              = $resultRowData['objId'];

                        $salesUnit = $rowvalue[$columnSalesUnit];
                        $pricePageFlag = $rowvalue[$columnPricePageFlag];
                        $epixFlag = $rowvalue[$columnEpixFlag];
                        $deletionFlag = $rowvalue[$columnDeletionFlag];
                        // $distChainStatus = $rowvalue[$columnDistChainStatus];
                        $salesText1 = $rowvalue[$columnSalesText1];
                        $salesText2 = $rowvalue[$columnSalesText2];
                        $materialGroup5Value = $rowvalue[$columnPrivateBrand];
                        $privateOrGenericBrand = $this->getBrandId($materialGroup5Value);

                        $this->productUpdateArray[$materialId] = $material;

                        $queryTableDataArray[] = ['oo_id' => $objId,
                            'oo_classId' => 41,
                            'oo_className' => 'PTGEUSalesMaterialMaster',
                            'SalesOrganization__id' => $salesOrgCode,
                            'SalesOrganization__type' => 'object',
                            'DistributionChannel__id' => $this->distributionChannelCode,
                            'DistributionChannel__type' => 'object',
                            'SalesUOM' => $salesUnit,
                            'DeliveringPlant__id' => $plantObjId,
                            'DeliveringPlant__type' => 'object',
                            'CountryOfOrigin__id' => $this->countryOfOriginCode,
                            'CountryOfOrigin__type' => 'object',
                            'salesText1' => $salesText1,
                            'salesText2' => $salesText2,
                            'epixFlag' => (strtoupper(trim($epixFlag)) == 'X') ? 1 : -1,
                            'pricePageFlag' => (strtoupper(trim($pricePageFlag)) == 'X') ? 1 : -1,
                            'privateBrand' => $privateOrGenericBrand,
                            'Material' => ",".$materialObjId.",",
                            // 'deletedFlagAtDistributionChainLevel' => $distChainStatus,
                            'deletedFlagAtSalesLevel' => (strtoupper(trim($deletionFlag)) == 'X') ? 1 : -1
                        ];

                        $storeTableDataArray[] = [
                            'oo_id' => $objId,
                            'SalesUOM' => $salesUnit,
                            'epixFlag' => (strtoupper(trim($epixFlag)) == 'X') ? 1 : -1,
                            'salesText1' => $salesText1,
                            'salesText2' => $salesText2,
                            'pricePageFlag' => (strtoupper(trim($pricePageFlag)) == 'X') ? 1 : -1,
                            'privateBrand' => $privateOrGenericBrand,
                            // 'deletedFlagAtDistributionChainLevel' => $distChainStatus,
                            'deletedFlagAtSalesLevel' => (strtoupper(trim($deletionFlag)) == 'X') ? 1 : -1
                        ];

                        if($plantObjId) {
                            $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $plantObjId,
                             'type' => 'object', 'fieldname' => 'DeliveringPlant', 'ownertype' => 'object' ];
                        }
                        $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $salesOrgCode,
                         'type' => 'object', 'fieldname' => 'SalesOrganization', 'ownertype' => 'object' ];
                        $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $this->distributionChannelCode,
                         'type' => 'object', 'fieldname' => 'DistributionChannel', 'ownertype' => 'object' ];
                        $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $this->countryOfOriginCode,
                         'type' => 'object', 'fieldname' => 'CountryOfOrigin', 'ownertype' => 'object' ];
                        $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $materialObjId,
                         'type' => 'object', 'fieldname' => 'Material', 'ownertype' => 'object' ];

                        if($plantObjId) {
                            $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' => $plantObjId,
                             'sourcetype' => 'object', 'targettype' => 'object'];
                        }
                        $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' => $salesOrgCode,
                         'sourcetype' => 'object', 'targettype' => 'object'];
                        $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' =>
                         $this->distributionChannelCode,
                         'sourcetype' => 'object', 'targettype' => 'object'];
                        $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' => $this->countryOfOriginCode,
                         'sourcetype' => 'object', 'targettype' => 'object'];
                        $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' => $materialObjId,
                         'sourcetype' => 'object', 'targettype' => 'object'];

                        $errorsData['SUCCESS'] = "Sales Material Code: ".$salesMaterialKey." has been ".
                        $createdOrUpdated.".";
                    } else{
                        $errorsData[] = "Material ".$material. " not found in system.";
                        $this->failedIDs[] = $rowvalueRecord['id'];
                    }
                }
                catch (\Exception $e) {
                    p_r($e);
                    \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->error($e);
                    /* return error massage if any exception found */
                    $errorsData[] = "Sales Material Code: ".$salesMaterialKey. " - ".$e->getMessage();
                }
            }
            $statusCode = '';
            if(isset($errorsData['SUCCESS'])) {
                $createdUpdatedCount++;
                $this->successCount++;
                $errorsString = "SUCCESS: ".$errorsData['SUCCESS'];
                $this->monitoringItem->getLogger()->info($errorsString);
                $statusCode = 'SUCCESS';
                $data[$rowCount]['failedReason'] = '';
            } elseif(count($errorsData)) {
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

        $this->insertDataInDB($queryTableDataArray, $storeTableDataArray,
         $relationTableDataArray, $dependencyTableDataArray);

        $timediff2 = $time2->diff(new \DateTime());
        echo $timediff2->format("{$createdUpdatedCount} Object created out of {$dataCount}
         records in %h hour %i minute %s second").PHP_EOL;

        $time3 = new \DateTime();
        $this->tableImportHelper->insertDataToLogTable($data);
        $timediff3 = $time3->diff(new \DateTime());
        echo $timediff3->format("Total {$dataCount} records inserted in log table takes
         %h hour %i minute %s second").PHP_EOL;

        echo "Unset the temporary variable ...".PHP_EOL;
        unset($queryTableDataArray, $storeTableDataArray, $relationTableDataArray,
         $dependencyTableDataArray, $data);
    }

    public function insertDataInDB($queryTableDataArray, $storeTableDataArray,
     $relationTableDataArray, $dependencyTableDataArray)
    {
        if(count($queryTableDataArray)) {
            $this->tableImportHelper->insertIntoSalesTable($queryTableDataArray, 'object_query_41');
        }
        if(count($storeTableDataArray)) {
            $this->tableImportHelper->insertIntoSalesTable($storeTableDataArray, 'object_store_41');
        }
        if(count($relationTableDataArray))  {
            // $this->tableImportHelper->insertIntoSalesTable($relationTableDataArray, 'object_relations_41');
            $this->tableImportHelper->insertDataInRelationalTable($relationTableDataArray, 'object_relations_41');

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
                $objDelete = DataObject\PTGEUSalesMaterialMaster::getByPath("/".
                ImportConstants::PTGEU_MATERIAL_MASTER_SALES_MATERIAL_MASTER_FOLDER."/".$material."/".$key);

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
    public function getMaterialObject($materialKey) {
        $query = "SELECT oo_id, `key`, `path` FROM `object_38` WHERE `articleNumber` LIKE '%{$materialKey}%' limit 1";
        $objectMaterial = $this->db->fetchAllAssociative($query);

        foreach ($objectMaterial as $material) {
            $this->monitoringItem->getLogger()->info("Material: ".$materialKey." found");
            return $material['oo_id'];
        }
        return false;
    }

    /**
     * return plant object
     */
    public function getPlantObject($plantKey, $plantFolderId) {
        $objectPlant = new DataObject\PTGEUPlant\Listing();
        $objectPlant->setCondition("Plant = ?", [$plantKey]);
        $objectPlant->load();
        if(empty($objectPlant)) {
            $objectPlantNew = new DataObject\PTGEUPlant();
            $objectPlantNew->setKey($plantKey);
            $objectPlantNew->setPlant($plantKey);
            $objectPlantNew->setParentId($plantFolderId);
            $objectPlantNew->setPublished(true);
            $objectPlantNew->save();
            $this->monitoringItem->getLogger()->info("Plant: ".$plantKey." not found in master list, plant created");

            return $objectPlantNew->getId();
        } else {
            foreach ($objectPlant as $objPlant) {
                return $objPlant->getId();
            }
            $this->monitoringItem->getLogger()->info("Plant: ".$plantKey." found in master list.");
        }
    }

    /**
     * return distribution channel object
     */
    public function getDistributionChannelObject($distributionChannelKey,
     $distributionChannelDesc, $distributionChannelFolderId) {
        $object = new DataObject\PTGEUDistributionChannel\Listing();
        $object->setCondition("distributionCode = ?", [$distributionChannelKey]);
        $object->load();
        if(empty($object)) {
            $objectNew = new DataObject\PTGEUDistributionChannel();
            $objectNew->setKey($distributionChannelKey."-".$distributionChannelDesc);
            $objectNew->setDistributionCode($distributionChannelKey);
            $objectNew->setName($distributionChannelDesc);
            $objectNew->setParentId($distributionChannelFolderId);
            $objectNew->setPublished(true);
            $objectNew->save();
            $this->monitoringItem->getLogger()->info("Distribution Channel : ".
            $distributionChannelKey." not found in master list, distribution channel created");

            return $objectNew->getId();
        } else {
            foreach ($object as $obj) {
                return $obj->getId();
            }

            $this->monitoringItem->getLogger()->info("Distribution Channel : ".
            $distributionChannelKey." found in master list.");
        }
    }

    /**
     * return sales organization object
     */
    public function getSalesOrgObject($salesOrgKey, $salesOrgDesc, $salesOrganizationsFolderId) {
        $object = new DataObject\PTGEUSalesOrg\Listing();
        $object->setCondition("salesOrgCode= ?", [$salesOrgKey]);
        $object->load();
        if(empty($object)) {
            $objectNew = new DataObject\PTGEUSalesOrg();
            $objectNew->setKey($salesOrgKey."-".$salesOrgDesc);
            $objectNew->setSalesOrgCode($salesOrgKey);
            $objectNew->setSalesOrgName($salesOrgDesc);
            $objectNew->setParentId($salesOrganizationsFolderId);
            $objectNew->setPublished(true);
            $objectNew->save();
            $this->monitoringItem->getLogger()->info("Sales Org: ".$salesOrgKey.
            " not found in master list, sales org created");

            return $objectNew->getId();
        } else {
            foreach ($object as $obj) {
                return $obj->getId();
            }
            $this->monitoringItem->getLogger()->info("Sales Org: ".$salesOrgKey." found in master list");
        }
    }

    /**
     * return Country of origin object
     */
    public function getCountryOfOriginObject($countryOfOriginKey, $countryOfOriginDesc, $countryOfOriginFolderId) {
        $object = new DataObject\PTGEUCountryOfOrigin\Listing();
        $object->setCondition("countryName = ?", [$countryOfOriginDesc]);
        $object->load();
        if(empty($object)) {
            $object = new DataObject\PTGEUCountryOfOrigin();
            $object->setKey($countryOfOriginDesc);
            $object->setCountryCode($countryOfOriginKey);
            $object->setCountryName($countryOfOriginDesc);
            $object->setParentId($countryOfOriginFolderId);
            $object->setPublished(true);
            $object->save();
            $this->monitoringItem->getLogger()->info("Distribution Channel: ".
            $countryOfOriginKey." not found in master list, distribution channel created");

            return $object->getId();
        }  else {
            foreach ($object as $obj) {
                return $obj->getId();
            }
            $this->monitoringItem->getLogger()->info("Distribution Channel: ".
            $countryOfOriginKey." found in master list");
        }
    }

    public function getBrandId($materialGroup5Value) {
        $brandList = new \Pimcore\Model\DataObject\PTGEUBrand\Listing();
        $brandList->setCondition("brandCode = ?",$materialGroup5Value);
        foreach ($brandList as $brand) {
            return $brand->getId();
        }
    }
}
