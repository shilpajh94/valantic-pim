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
use Symfony\Component\DependencyInjection\ContainerInterface;

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
    private $tableImportConfig;
    private $tableImportHelper;
    // private $salesOrganizations;
    // private $distributionChannels;
    private $common;
    private $salesOrgDesc;
    private $distributionChannelDesc;
    private $fileColumns = array();
    private $keyColumns = array();
    private $approvedSalesOrg = array();
    private $mappingCsvColumn = array();
    private $materialArray = array();
    private $plantArray = array();
    private $salesOrgArray = array();
    private $distributionChannelArray = array();
    private $countryArray = array();
    private $materialUpdateArray = array();
    private $materialReturnFlagUpdateArray = array();
    private $failedIDs = [];
    private $container;

    const LOGGER_MODULE = 'PLANT MATERIAL MASTER';
    
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->db = Db::get();
        /* Initilize monitoring item and set the number of steps will take to complete the task */
        $this->monitoringItem = ProcessManagerBundle\ElementsProcessManagerBundle::getMonitoringItem();
    }
    public function config($param = array())
    {

        try {
            \AppBundle\Helper\Common::clearAndDisablePimCache();
            $this->updateDefaults($param);
            // $spreadsheet = Import::load($this->filePath);
            $csvImportedData = Import::getCSVData($this->filePath);
            $this->fileColumns = $csvImportedData['header'];
            $csvData = $csvImportedData['data'];
            unset($csvImportedData);
            $this->common =$this->container->get('app.common_helper');
            $this->tableImportHelper =$this->container->get('app.plant_material_import_helper');
            $plantMaterialConfig =$this->container->get('app.config_provider_service')->getPlantMaterialConfig();

            $this->approvedSalesOrg = $this->common->getParameter($plantMaterialConfig, 'approvedSalesOrg');
            $this->mappingCsvColumn = $this->common->getParameter($plantMaterialConfig, 'mappingCsvColumn');
            $this->keyColumns = $this->common->getParameter($plantMaterialConfig, 'keyColumns');

            $this->import($csvData);
            
            \AppBundle\Helper\Common::endablePimCache();
        } catch (\Throwable $th) {
            p_r($th);
            \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->error($th);
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
        
        /**
         * get folder ids of Master List, MaterialMaster, Master List/Plants,
         * Master List/Sales Organizations, Master List/Distribution Channel
         * and MaterialMaster/SalesMaterialMaster
         */
        DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_FOLDER);
        DataObject\Service::createFolderByPath(ImportConstants::MATERIAL_MASTER_FOLDER);
        $plantFolderId= DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_PLANTS_FOLDER)->getId();
        $salesOrganizationsFolderId = DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_SALES_ORGANIZATIONS_FOLDER)->getId();
        $distributionChannelFolderId = DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_DISTRIBUTION_CHANNEL_FOLDER)->getId();
        $countryFolderId= DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_COUNTRY_FOLDER)->getId();
        DataObject\Service::createFolderByPath(ImportConstants::MATERIAL_MASTER_PLANT_MATERIAL_MASTER_FOLDER);

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
                    $this->processSlicedData($partialData, $plantFolderId, $countryFolderId, $salesOrganizationsFolderId, $distributionChannelFolderId);
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
                    $applicationLogMessage = "Plant material command failed to import {$this->failedCount} Record(s) out of {$deltaCount} Record(s)";
                }else
                    $applicationLogMessage = "Plant Material Master Imported successfully.";

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

        /**
         * Move imported file from inbox to archive or failed as per status
         */
        // $moveParam = array(
        //     'filePath' => $this->inboxFilePath,
        //     'archivePath'   =>  $this->archiveDir,
        //     'failedPath'    =>  $this->failedDir,
        //     'status'        =>  $allSuccess,
        //     'fileName'      =>  time()
        // );
        // $movedAssetObj = $this->common->moveFile($moveParam);
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

    public function processSlicedData($data, $plantFolderId, $countryFolderId, $salesOrganizationsFolderId, $distributionChannelFolderId) {
        
        $salesOrgDesc = '';
        $distributionChannelDesc = '';

	    $time2 = new \DateTime();
        \Pimcore\Model\Version::disable();
        $queryTableDataArray = array();
        $storeTableDataArray = array();
        $relationTableDataArray = array();
        $dependencyTableDataArray = array();
        $createdUpdatedCount = 0;

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
        $columnDeleteFlag = $this->mappingCsvColumn['deleteFlag'];
        $columnSiopCode =  $this->mappingCsvColumn['productHier'];
        $columnAvailabilityCheckCode =  $this->mappingCsvColumn['AvailabilityCheckCode'];
        $columnABCIndicator =  $this->mappingCsvColumn['ABCIndicator'];

	    $dataCount = count($data);
        foreach ($data as $rowCount => $rowvalueRecord)
        {
            $rowvalue = json_decode(mb_convert_encoding($rowvalueRecord['record'], 'UTF-8'));
            $rowvalue = array_combine($this->fileColumns, $rowvalue);

            $plantName = $rowvalue[$columnPlant];
            $material = $rowvalue[$columnMaterial];
            $salesOrg = $rowvalue[$columnSalesOrg];
            $distributionChannel = $rowvalue[$columnDistributionChannel];
            $countryName =  $rowvalue[$columnCountryOfOrigin];

            $errorsData = array();

            if(empty(trim($material)))
                $errorsData[] = 'Material should not be blank.';

            // if(empty(trim($plantName)))
            //     $errorsData[] = 'Plant should not be blank.';

            if(empty(trim($salesOrg)))
                $errorsData[] = 'Sales organization should not be blank.';
            else if(!isset($this->approvedSalesOrg[$salesOrg]))
                $errorsData[] = 'Sales Org '.$salesOrg.' should belong to '. implode(', ',$this->approvedSalesOrg);
            // else if(!isset($this->salesOrganizations[$salesOrg]))
            //     $errorsData[] = "Sales organization ".$salesOrg. " not found  in system.";

            if(empty(trim($distributionChannel)))
                $errorsData[] = 'Distribution channel should not be blank.';
            // else if(!isset($this->distributionChannels[$distributionChannel]))
            //     $errorsData[] = "Distribution channel ".$distributionChannel. " not found  in system.";

            // if(empty(trim($countryName)))
            //     $errorsData[] = 'Country Name should not be blank.';

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
                        $deleteFlag = isset($rowvalue[$columnDeleteFlag]) ? $rowvalue[$columnDeleteFlag] : NULL;
                        $materialObjId = $this->materialArray[$material];
                        // $salesOrgCode = $this->salesOrganizations[$salesOrg];
                        // $distributionChannelCode = $this->distributionChannels[$distributionChannel];
                        if(empty(trim($plantName)))
                            $plantMaterialKey = $material.'-'.$salesOrg.'-'.$distributionChannel;
                        else
                            $plantMaterialKey = $material.'-'.$plantName.'-'.$salesOrg.'-'.$distributionChannel;

                        // $plantMaterialKey = $this->createKeyForObject($rowvalue, $this->keyColumns, $this->mappingCsvColumn);

                        $materialFolderId= DataObject\Service::createFolderByPath(ImportConstants::MATERIAL_MASTER_PLANT_MATERIAL_MASTER_FOLDER."/".$material)->getId();
                        $query = "SELECT oo_id, parentId, `key`, `path` FROM `object_12` WHERE `parentId` = '{$materialFolderId}' AND `key` LIKE '%{$plantMaterialKey}%' limit 1";
                        $objectMaterial = $this->db->fetchAssociative($query);

                        if(!empty(trim($plantName)) && !isset($this->plantArray[$plantName]))
                        {
                            $plantId = $this->getPlantObject($plantName, $plantFolderId);
                            if($plantId)
                                $this->plantArray[$plantName] = $plantId;
                        }

                        $plantObjId = '';
                        if(isset($this->plantArray[$plantName]))
                            $plantObjId = $this->plantArray[$plantName];

                        if(!isset($this->salesOrgArray[$salesOrg]))
                        {
                            // $salesOrgDesc = $rowvalue[$columnSalesOrgDesc];
                             $salesOrgId = $this->getSalesOrgObject($salesOrg, $salesOrgDesc, $salesOrganizationsFolderId);
                            if($salesOrgId)
                                $this->salesOrgArray[$salesOrg] = $salesOrgId;
                        }
                        $salesOrgCode = $this->salesOrgArray[$salesOrg];
                        if(!isset($this->distributionChannelArray[$distributionChannel]))
                        {
                            // $distributionChannelDesc = $rowvalue[$columnDistributionChannelDesc];
                            $distributionChannelId = $this->getDistributionChannelObject($distributionChannel, $distributionChannelDesc, $distributionChannelFolderId);
                            if($distributionChannelId)
                                $this->distributionChannelArray[$distributionChannel] = $distributionChannelId;

                        }
                        $distributionChannelCode = $this->distributionChannelArray[$distributionChannel];

                        if(!empty(trim($countryName)) && !isset($this->countryArray[$countryName]))
                        {
                            $countryId = $this->getCountryObject($countryName, $countryFolderId);
                            if($countryId)
                            $this->countryArray[$countryName] = $countryId;
                        }

                        $countryObjId = '';
                        if(isset($this->countryArray[$countryName]))
                            $countryObjId = $this->countryArray[$countryName];

                        $createdOrUpdated = 'Updated';
                        if(!$objectMaterial){
                            $createdOrUpdated = 'Created';
                            $objectArr = [
                                'parentId' => $materialFolderId,
                                'key' => $plantMaterialKey,
                                'path' => "/".ImportConstants::MATERIAL_MASTER_PLANT_MATERIAL_MASTER_FOLDER."/".$material."/",
                            ];
                            $this->createdCount++;
                        }
                        else{
                            $objectArr = [
                                'parentId' => $objectMaterial['parentId'],
                                'key' => $objectMaterial['key'],
                                'path' => $objectMaterial['path'],
                            ];
                            $this->updatedCount++;
                        }

                        $objId = $this->tableImportHelper->insertInObjects($objectArr);
                        $quantityUnit =  $rowvalue[$columnStdPackQtyUOM];
                        $quantityValueUnitId = $this->common->getQuantityValueUnitId($quantityUnit);

                        $quantityValue =  $rowvalue[$columnStdPackQty];
                        $standardPackQuantity = $this->common->getDataQuantityValue($quantityValue, $quantityValueUnitId);

                        $planDeliveryTime = $rowvalue[$columnPlanDeliveryTime];
                        $commodityCode = $rowvalue[$columnCommodityCode];
                        $minOrderQty = $rowvalue[$columnMinOrderQty];
                        $profitCenter = $rowvalue[$columnProfitCenter];
                        $mrpController = $rowvalue[$columnMrpController];
                        $totalReplLeadTime = $rowvalue[$columnTotalReplLeadTime];
                        $stockIndicator = $rowvalue[$columnStockIndicator];
                        $safetyStock = $rowvalue[$columnSafetyStock];
                        $orderQtyInc = $rowvalue[$columnOrderQtyInc];
                        $siopCode = $rowvalue[$columnSiopCode];
                        $availabilityCheckCode = $rowvalue[$columnAvailabilityCheckCode];
                        $ABCIndicator = $rowvalue[$columnABCIndicator];

                        $stockIndicatorDescription = '';
                        if (strtolower($stockIndicator) == 's') {
                            $stockIndicatorDescription = 'Stock';
                        } else if (strtolower($stockIndicator) == 'ns') {
                            $stockIndicatorDescription = 'Non-Stock';
                        } else if(strtolower($stockIndicator) == 'sp') {
                            $stockIndicatorDescription = 'Special Stock';
                        }

                        $queryTableDataArray[] = [
                            'oo_id' => $objId,
                            'oo_classId' => 12,
                            'oo_className' => 'PlantMaterialMaster',
                            'Material' => ",".$materialObjId.",",
                            'Plant__id' => $plantObjId,
                            'Plant__type' => 'object',
                            'CountryOfOrigin__id' => $countryObjId,
                            'CountryOfOrigin__type' => 'object',
                            'PlannedDeliveryTime' => $planDeliveryTime,
                            'CommodityCode' => $commodityCode,
                            'MinOrderQuantity' => $minOrderQty,
                            'StandardPackQuantity' => $quantityValue,
                            'StandardPackQuantityUOM' => $quantityUnit,
                            'OutsidePurchaseIdentifierOrProcurementType' => "$columnOutsidePurchaseIdentifier",
                            'PlantProfitCenter' => $profitCenter,
                            'MRPController' => $mrpController,
                            'TotalReplenismentLeadTime' => $totalReplLeadTime,
                            'StockIndicator' => strtoupper($stockIndicator),
                            'StockIndicatorDescription' => $stockIndicatorDescription,
                            'SafetyStock' => $safetyStock,
                            'SalesOrganization__id' => $salesOrgCode,
                            'SalesOrganization__type' => 'object',
                            'DistributionChannel__id' => $distributionChannelCode,
                            'DistributionChannel__type' => 'object',
                            'OrderingQuantityIncrements' => $orderQtyInc,
                            'AvailabilityCheckCode' => $availabilityCheckCode,
                            'ABCIndicator' => $ABCIndicator,
                            'deletedFlagAtPlantLevel' => (strtoupper(trim($deleteFlag)) == 'X') ? 1 : -1
                        ];

                        $storeTableDataArray[] = [
                            'oo_id' => $objId,
                            'PlannedDeliveryTime' => $planDeliveryTime,
                            'CommodityCode'	=> $commodityCode,
                            'MinOrderQuantity' => $minOrderQty,
                            'StandardPackQuantity' => $quantityValue,
                            'StandardPackQuantityUOM' => $quantityUnit,
                            'OutsidePurchaseIdentifierOrProcurementType' => $columnOutsidePurchaseIdentifier,
                            'PlantProfitCenter'	=> $profitCenter,
                            'MRPController' => $mrpController,
                            'TotalReplenismentLeadTime' => $totalReplLeadTime,
                            'StockIndicator' => strtoupper($stockIndicator),
                            'StockIndicatorDescription' => $stockIndicatorDescription,
                            'SafetyStock' => $safetyStock,
                            'OrderingQuantityIncrements' => $orderQtyInc,
                            'AvailabilityCheckCode' => $availabilityCheckCode,
                            'ABCIndicator' => $ABCIndicator,
                            'deletedFlagAtPlantLevel' => (strtoupper(trim($deleteFlag)) == 'X') ? 1 : -1
                        ];
                        if (substr($siopCode, 0, 6) == '041500' && (empty($columnOutsidePurchaseIdentifier) || strtolower($columnOutsidePurchaseIdentifier) == 'f')) {
                            if (!in_array($materialObjId, $this->materialUpdateArray)) {
                                $materialObj = DataObject::getById($materialObjId);
                                $materialObj->setOutsidePurchaseFlag(true);
                                $materialObj->save();
                                $this->materialUpdateArray[] = $materialObjId;
                            }
                        }

                        /**
                         * "Return Flag (Y/N) =If stock indicator is S, flag is Yes else NO"
                         */
                        if ((!empty($stockIndicator) && strtolower($stockIndicator) == 's')) {
                            if (!in_array($materialObjId, $this->materialReturnFlagUpdateArray)) {
                                $materialObj = DataObject::getById($materialObjId);
                                $materialObj->setReturnFlag(true);
                                $materialObj->save();
                                $this->materialReturnFlagUpdateArray[] = $materialObjId;
                            }
                        }

                        if($countryObjId)
                            $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $countryObjId, 'type' => 'object', 'fieldname' => 'CountryOfOrigin', 'ownertype' => 'object' ];

                        if($plantObjId)
                            $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $plantObjId, 'type' => 'object', 'fieldname' => 'Plant', 'ownertype' => 'object' ];

                        $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $salesOrgCode, 'type' => 'object', 'fieldname' => 'SalesOrganization', 'ownertype' => 'object' ];
                        $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $distributionChannelCode, 'type' => 'object', 'fieldname' => 'DistributionChannel', 'ownertype' => 'object' ];
                        $relationTableDataArray[] = ['src_id' => $objId, 'dest_id' => $materialObjId, 'type' => 'object', 'fieldname' => 'Material', 'ownertype' => 'object' ];

                        if($countryObjId)
                            $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' => $countryObjId, 'sourcetype' => 'object', 'targettype' => 'object'];

                        if($plantObjId)
                            $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' => $plantObjId, 'sourcetype' => 'object', 'targettype' => 'object'];

                        $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' => $salesOrgCode, 'sourcetype' => 'object', 'targettype' => 'object'];
                        $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' => $distributionChannelCode, 'sourcetype' => 'object', 'targettype' => 'object'];
                        $dependencyTableDataArray[] = ['sourceid' => $objId, 'targetid' => $materialObjId, 'sourcetype' => 'object', 'targettype' => 'object'];

                        $errorsData['SUCCESS'] = "Plant Material Code: ".$plantMaterialKey." has been ".$createdOrUpdated.".";
                    }
                    else{
                        $errorsData[] = "Material ".$material. " not found in system.";
                        $this->failedIDs[] = $rowvalueRecord['id'];
                    }
                }
                catch (\Exception $e) {
                    /* return error massage if any exception found */
                    \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->error($e);
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
            $this->tableImportHelper->insertIntoMaterialTable($queryTableDataArray, 'object_query_12');

        if(count($storeTableDataArray))
            $this->tableImportHelper->insertIntoMaterialTable($storeTableDataArray, 'object_store_12');

        if(count($relationTableDataArray)){
            // $this->tableImportHelper->insertIntoMaterialTable($relationTableDataArray, 'object_relations_12');
            $this->tableImportHelper->insertDataInRelationalTable($relationTableDataArray, 'object_relations_12');
        }
        if(count($dependencyTableDataArray))
            $this->tableImportHelper->insertIntoMaterialTable($dependencyTableDataArray, 'dependencies');

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
                $objDelete = DataObject\PlantMaterialMaster::getByPath("/".ImportConstants::MATERIAL_MASTER_PLANT_MATERIAL_MASTER_FOLDER."/".$material."/".$key);

                if($objDelete)
                {
                    $deleteCount++;
                    $objDelete->setDeletedFlagAtPlantLevel(1);
                    $objDelete->setPublished(FALSE);
                    $objDelete->save();
                }
            }

            echo "Delete flag updated for {$deleteCount} objects in system.".PHP_EOL;
        }
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
     * return material object or false
     */
    public function getMaterialObject($MaterialKey){
        $query = "SELECT oo_id, `key`, `path` FROM `object_1` WHERE `articleNumber` LIKE '%{$MaterialKey}%' limit 1";
        $objectMaterial = $this->db->fetchAllAssociative($query);

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
        return $objectCountry->getId();

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
