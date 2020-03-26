<?php
namespace ImportBundle\Services\Model;

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

    private $fileColumns = array();
    private $keyColumns = array();
    private $approvedSalesOrg = array();
    private $mappingCsvColumn = array();

    const LOGGER_MODULE = 'PLANT MATERIAL MASTER';

    public function __construct()
    {
        // $this->db = Db::get();
        /* Initilize monitoring item and set the number of steps will take to complete the task */
        $this->monitoringItem = ProcessManagerBundle\ElementsProcessManagerBundle::getMonitoringItem();
    }
    public function config($param = array())
    {
        try {
            $this->updateDefaults($param);
            $csvInfo = Import::getCSVData($this->filePath);
            
            $this->common = \Pimcore::getContainer()->get('app.common_helper');
            $this->tableImportHelper = \Pimcore::getContainer()->get('app.table_import_helper');
            $plantMaterialConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getPlantMaterialConfig();
            
            $this->approvedSalesOrg = $this->common->getParameter($plantMaterialConfig, 'approvedSalesOrg');
            $this->mappingCsvColumn = $this->common->getParameter($plantMaterialConfig, 'mappingCsvColumn');
            $this->tableImportConfig['tempTable'] = $this->common->getParameterItem($plantMaterialConfig, 'tables','tempTable');
            $this->tableImportConfig['masterTable'] = $this->common->getParameterItem($plantMaterialConfig, 'tables','masterTable');
            $this->tableImportConfig['logTable'] = $this->common->getParameterItem($plantMaterialConfig, 'tables','logTable');
            $this->keyColumns = $this->common->getParameter($plantMaterialConfig, 'keyColumns');
            $this->fileColumns = $csvInfo['header'];
            $this->import($csvInfo['data']);
        } catch (\Throwable $th) {
            Logger::error($this->logFileName, $th);
            die;
        }
    }

    public function import($excelDataNewArray)
    {
//        $excelDataNewArray = array();
//        $worksheet = $spreadsheet->getActiveSheet();
//        $worksheetHighestColumnRow = Import::getActiveSheetInfo($worksheet);
        
        /**
         * Optaining next column from last column for "status" field
         */
        // $highestDataColumnIndex =  \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($worksheetHighestColumnRow['highestDataColumn']);
        // $nextColumnIndex = $highestDataColumnIndex + 1;
        // $nextColumn = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($nextColumnIndex);

//        $lastRowLastColumn = $worksheetHighestColumnRow['highestDataColumn'] . $worksheetHighestColumnRow['highestDataRow'];

        $this->monitoringItem->getLogger()->info('File Information');
        $this->monitoringItem->getLogger()->info('File path is being imported: ' . $this->filePath);

        /**
         * get all the data from the spreadsheet
         */
//        $excelDataNewArray = $spreadsheet->getActiveSheet()->rangeToArray("A1:$lastRowLastColumn",NULL,TRUE,TRUE,FALSE);
//        
        /**
         * get folder ids of Master List, MaterialMaster, Master List/Plants, 
         * Master List/Sales Organizations, Master List/Distribution Channel 
         * and MaterialMaster/SalesMaterialMaster
         */
        $masterListId= DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_FOLDER)->getId();
        $materialMasterId= DataObject\Service::createFolderByPath(ImportConstants::MATERIAL_MASTER_FOLDER)->getId();
        $plantFolderId= DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_PLANTS_FOLDER)->getId();
        $countryFolderId= DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_COUNTRY_FOLDER)->getId();
        $plantMaterialMasterFolderId= DataObject\Service::createFolderByPath(ImportConstants::MATERIAL_MASTER_PLANT_MATERIAL_MASTER_FOLDER)->getId();

        $allSuccess = true;
        $applicationLogMessage = '';
        if(count($excelDataNewArray) > 1)
        {
            /**
             * getting csv or excel file column name
             */
            
            $this->tableImportConfig['fileColumns'] = $this->fileColumns;
            $this->tableImportConfig['mappingCsvColumn'] = $this->mappingCsvColumn;
            $this->tableImportConfig['keyColumns'] = $this->keyColumns;
            $this->tableImportHelper->init($this->tableImportConfig);
           
            /**
             * remove column header from array excelDataNewArray. Only data remains.
             */
//            array_shift($excelDataNewArray); 
            $csvRowCount = count($excelDataNewArray);
            $time = new \DateTime();
            $this->tableImportHelper->truncateTempTable();
            $this->tableImportHelper->insertDataInPlantTemp($excelDataNewArray);    // Insert csv file data in temp table
            $excelDataNewArray = $this->tableImportHelper->getPlantDelta();         // Get delta data

            $timediff = $time->diff(new \DateTime());
            echo $timediff->format('Data Insertion Temp table: %h hour %i minute %s second')."\n";

            $this->monitoringItem->getLogger()->info("Total {$csvRowCount} records found in file.");
            
            /**
             * total number of rows without header row
             */
            
            $totalRow = count($excelDataNewArray);
            if($totalRow > 0)
            {
                $this->monitoringItem->getLogger()->info("Total {$totalRow} delta records need to be processed...");
                $this->monitoringItem->setTotalSteps($totalRow)->save();
                
                $columnPlant = $this->mappingCsvColumn['plant'];
                $columnMaterial = $this->mappingCsvColumn['material'];
                $columnSalesOrg = $this->mappingCsvColumn['salesOrg'];
                $columnDistributionChannel = $this->mappingCsvColumn['distributionChannel'];
                $columncountryOfOrigin = $this->mappingCsvColumn['countryOfOrigin'];
                
                /**
                 * adding a new column 'status' to csv/excel file
                 */
                // Import::setCell($nextColumn . '1', 'Status');
                $time = new \DateTime();
                foreach ($excelDataNewArray as $rowCount => $rowvalueRecord) {
                    $rowvalue = json_decode(utf8_encode($rowvalueRecord['record']));
                    
                    echo $plantName = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnPlant); echo PHP_EOL;
                    echo $material = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnMaterial);echo PHP_EOL;
                    echo $salesOrg = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnSalesOrg);echo PHP_EOL;
                    echo $distributionChannel = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnDistributionChannel); echo PHP_EOL;
                    echo $countryName = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columncountryOfOrigin); echo PHP_EOL;
                
                    $currentStep = $rowCount + 1;
                    $this->monitoringItem->setCurrentWorkload($currentStep)
                    ->setTotalWorkload($totalRow)
                    ->setDefaultProcessMessage("Row {$currentStep}: processing..")
                    ->save();
                    
                    /**
                     * skip row if meterial or plant fields are empty
                     */
                    $errorsData = array();
                    if(empty(trim($material)))
                        $errorsData[] = 'Material should not be blank.';

                    if(empty(trim($plantName)))
                        $errorsData[] = 'Plant should not be blank.';

                    if(empty(trim($salesOrg))) {
                        $errorsData[] = 'Sales organization should not be blank.';  
                    /**
                     * skip row if sales org is not belong to approved sales organizations mentioned in config
                     */
                    } 
                    
                    if(empty(trim($distributionChannel)))
                        $errorsData[] = 'Distribution channel should not be blank.';   

                     if(empty(trim($countryName))) {
                        $errorsData[] = 'Country Name should not be blank.';
                     }

                    if(!count($errorsData))
                    {
                        $data['plantMaterialMasterFolderId'] = $plantMaterialMasterFolderId;
                        $data['plantFolderId'] = $plantFolderId;
                        $data['countryFolderId'] = $countryFolderId;
                        $errorsData = $this->importPlantMaterial($rowvalue, $data);
                    }
                    $statusCode = '';
                    if(isset($errorsData['SUCCESS']))
                    {
                        $this->successCount++;
                        $errorsString = "SUCCESS: ".$errorsData['SUCCESS'];
                        $this->monitoringItem->getLogger()->info($errorsString);
                        $statusCode = 'SUCCESS';
                        $excelDataNewArray[$rowCount]['failedReason'] = '';
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
                        $excelDataNewArray[$rowCount]['failedReason'] = $allErrorsInString;
                    }

                    $excelDataNewArray[$rowCount]['statusCode'] = $statusCode;

                    /**
                     * add above error/success message in newly created status column
                     */
                    // Import::setCell($nextColumn.($rowCount+2),$errorsString);
                }

                $timediff = $time->diff(new \DateTime());
                echo $timediff->format('Ojbect creation: %h hour %i minute %s second')."\n";

                $time = new \DateTime();
                $this->tableImportHelper->insertDataToLogTable($excelDataNewArray);
                $timediff = $time->diff(new \DateTime());
                echo $timediff->format('Data insertion log table: %h hour %i minute %s second')."\n";
                $countMsg = "\nTotal Records:".$totalRow.", ";
                $countMsg .= "\nSuccess Records:".$this->successCount.", ";
                $countMsg .= "\nFailed Records:".$this->failedCount.", ";
                $countMsg .= "\nCreated Records:".$this->createdCount.", ";
                $countMsg .= "\nUpdated Records:".$this->updatedCount.", ";

                if ($allSuccess) 
                    $applicationLogMessage = "Plant Material Master Imported successfully.";
                else
                    $applicationLogMessage = "Plant material command failed to import ".$this->failedCount." Record(s) out of $totalRow Record(s)";

                $applicationLogMessage .= $countMsg;
            }
            else{
                $applicationLogMessage = "No delta records found.";
            }
            $this->tableImportHelper->updateMaster();
        }
        else
        {
            $applicationLogMessage = "No record found in file.";
        }
        // Import::save();
        
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
        
        if ($allSuccess)
            \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->info($applicationLogMessage);  
        else
            \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->error($applicationLogMessage);

        $this->monitoringItem->getLogger()->info($applicationLogMessage);
        $this->monitoringItem->setMessage('Finished')->setCompleted();
        \Pimcore::collectGarbage();
        
    }

    public function importPlantMaterial($rowvalue, $data){
        $plantMaterialMasterFolderId = $data['plantMaterialMasterFolderId'];
        $plantFolderId = $data['plantFolderId'];
        $countryFolderId = $data['countryFolderId'];

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
        
        $plantName = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnPlant);
        $material = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnMaterial);
        
        $plantMaterialKey = $this->common->createKeyForObject($this->fileColumns, $rowvalue, $this->keyColumns, $this->mappingCsvColumn);
        $errorData = array();

        try{        
            
            $materialObj = $this->getMaterialObject($material);
            if($materialObj)
            {
		        /**
                 * Create or update plant material object
                 */
                $materialFolderId= DataObject\Service::createFolderByPath(ImportConstants::MATERIAL_MASTER_PLANT_MATERIAL_MASTER_FOLDER."/".$material)->getId();
                $objectPlantMaster = DataObject\PlantMaterialMaster::getByPath("/".ImportConstants::MATERIAL_MASTER_PLANT_MATERIAL_MASTER_FOLDER."/".$material."/".$plantMaterialKey);
            
		        $countryName = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnCountryOfOrigin);
                $plantObj = $this->getPlantObject($plantName, $plantFolderId);
                $countryObj = $this->getCountryObject($countryName, $countryFolderId);

                $createdOrUpdated = 'Updated';
                if(!$objectPlantMaster){      
                    $createdOrUpdated = 'Created'; 
                    $objectPlantMaster = new DataObject\PlantMaterialMaster();
                    $objectPlantMaster->setKey($plantMaterialKey);
                    $objectPlantMaster->setParentId($materialFolderId);
                    $this->createdCount++;
                }
                else{
                    $this->updatedCount++;
                }
                
                $objectPlantMaster->setPlant($plantObj);
                $objectPlantMaster->setMaterial(array($materialObj));
                $objectPlantMaster->setCountryOfOrigin($countryObj);
                $objectPlantMaster->setPlannedDeliveryTime($this->common->getFieldValue($this->fileColumns,$rowvalue,$columnPlanDeliveryTime));
                $objectPlantMaster->setCommodityCode($this->common->getFieldValue($this->fileColumns,$rowvalue,$columnCommodityCode));
                $objectPlantMaster->setMinOrderQuantity($this->common->getFieldValue($this->fileColumns,$rowvalue,$columnMinOrderQty));
                $objectPlantMaster->setOrderingQuantityIcrements($this->common->getFieldValue($this->fileColumns,$rowvalue,$columnOrderQtyInc));

                $quantityUnit = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnStdPackQtyUOM);
                $quantityValueUnitId = $this->common->getQuantityValueUnitId($quantityUnit);

                $quantityValue = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnStdPackQty);
                $standardPackQuantity = $this->common->getDataQuantityValue($quantityValue, $quantityValueUnitId);

                $objectPlantMaster->setStandardPackQuantity($standardPackQuantity);
                $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnOutsidePurchaseIdentifier);
                
                $objectPlantMaster->setOutsidePurchaseIdentifier('');
                $objectPlantMaster->setPlantProfitCenter($this->common->getFieldValue($this->fileColumns,$rowvalue,$columnProfitCenter));
                $objectPlantMaster->setMRPController($this->common->getFieldValue($this->fileColumns,$rowvalue,$columnMrpController));
                $objectPlantMaster->setTotalReplenismentLeadTime($this->common->getFieldValue($this->fileColumns,$rowvalue,$columnTotalReplLeadTime));
                $objectPlantMaster->setSafetyStock($this->common->getFieldValue($this->fileColumns,$rowvalue,$columnSafetyStock));
                $objectPlantMaster->setStockIndicator($this->common->getFieldValue($this->fileColumns,$rowvalue,$columnStockIndicator));
                $objectPlantMaster->setPublished(TRUE);                   
                $objectPlantMaster->save();    

                if(empty($objectPlantMaster)) 
                    $errorData[] = "Plant Material Code: ".$plantMaterialKey.", Plant: ".$plantName.", Material: ".$material." could not processed ";
                else
                    $errorData['SUCCESS'] = "Plant Material Code: ".$plantMaterialKey." has been ".$createdOrUpdated.".";
                   
            }
            else{
                
                /* return error massage if material not found */
                $errorData[] = "Material: ".$material. " not found.";
            }
        } 
        catch (\Exception $e) {
	        /* return error massage if any exception found */
            $errorData[] = "Plant Material Code: ".$plantMaterialKey. " - ".$e->getMessage();
        }

        return $errorData;
    }
    
    /**
     * return material object or false
     */
    public function getMaterialObject($MaterialKey){
        
        $objectMaterial = new DataObject\Product\Listing();
        $objectMaterial->setCondition("articleNumber LIKE ?", "%".$MaterialKey."%");
        $objectMaterial->setLimit(1);
        $objectMaterial->load();
        
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
