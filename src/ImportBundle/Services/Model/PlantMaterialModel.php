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
    public $name; // Command Name
    public $filePath;
    public $inboxFilePath;
    public $archiveDir;
    public $failedDir;
    public $configuredData; // We will pull the data from configured class for this variable
    private $mappedClass;
    private $validatorClass;
    private $logFileName;
    private $monitoringItem;
    private $totalSteps;
    public $currentStep;
    private $currentLevel;
    private $errors;
    private $reader;
    private $level;
    private $cek; // Current Error Key
    public $rowStatus;
    use ProcessManagerBundle\ExecutionTraitClass;
    const LOGGER_MODULE = 'PLANT MATERIAL MASTER';
    private $failedCount = 0;
    private $successCount = 0;
    private $createdCount = 0;
    private $updatedCount = 0;
    private $fileColumns = array();
    private $keyColumns = array();
    private $common;
    private $mappingCsvColumn = array();
    private $tableImportConfig;
    private $tableImportHelper;

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
            $spreadsheet = Import::load($this->filePath);
            $this->common = \Pimcore::getContainer()->get('app.common_helper');
            $this->tableImportHelper = \Pimcore::getContainer()->get('app.table_import_helper');
            $plantMaterialConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getPlantMaterialConfig();
            
            $this->mappingCsvColumn = $this->common->getParameter($plantMaterialConfig, 'mappingCsvColumn');
            $this->tableImportConfig['tempTable'] = $this->common->getParameterItem($plantMaterialConfig, 'tables','tempTable');
            $this->tableImportConfig['masterTable'] = $this->common->getParameterItem($plantMaterialConfig, 'tables','masterTable');
            $this->tableImportConfig['logTable'] = $this->common->getParameterItem($plantMaterialConfig, 'tables','logTable');
            $this->keyColumns = $this->common->getParameter($plantMaterialConfig, 'keyColumns');
            
            $this->import($spreadsheet);
        } catch (\Throwable $th) {
            Logger::error($this->logFileName, $th);
            die;
        }
    }

    public function import($spreadsheet)
    {
    
        $worksheet = $spreadsheet->getActiveSheet();
        $worksheetHighestColumnRow = Import::getActiveSheetInfo($worksheet);
        
        /**
         * Optaining next column from last column for "status" field
         */
        // $highestDataColumnIndex =  \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($worksheetHighestColumnRow['highestDataColumn']);
        // $nextColumnIndex = $highestDataColumnIndex + 1;
        // $nextColumn = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($nextColumnIndex);

        $lastRowLastColumn = $worksheetHighestColumnRow['highestDataColumn'] . $worksheetHighestColumnRow['highestDataRow'];

        /**
         * get all the data from the spreadsheet
         */
        $excelDataNewArray = $spreadsheet->getActiveSheet()->rangeToArray("A1:$lastRowLastColumn",NULL,TRUE,TRUE,FALSE);
        
        $this->monitoringItem->setMessage('File Information')->save();
        $this->monitoringItem->setMessage('File path is being imported: ' . $this->filePath)->save();
        
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
        if(count($excelDataNewArray))
        {
            /**
             * getting csv or excel file column name
             */
            $this->fileColumns = $excelDataNewArray[0];
            $this->tableImportConfig['fileColumns'] = $this->fileColumns;
            $this->tableImportConfig['mappingCsvColumn'] = $this->mappingCsvColumn;
            $this->tableImportConfig['keyColumns'] = $this->keyColumns;
            
            $this->tableImportHelper->init($this->tableImportConfig);
           
            /**
             * remove column header from array excelDataNewArray. Only data remains.
             */
            array_shift($excelDataNewArray); 
            $this->tableImportHelper->truncateTempTable();
            $this->tableImportHelper->insertDataInTemp($excelDataNewArray);    // Insert csv file data in temp table
            $excelDataNewArray = $this->tableImportHelper->getDelta();         // Get delta data
            
            /**
             * total number of rows without header row
             */
            $totalRow = count($excelDataNewArray);
            $this->totalSteps = $totalRow;
            $this->monitoringItem->setTotalSteps($this->totalSteps)->save();

            
            $columnPlant = $this->mappingCsvColumn['plant'];
            $columnMaterial = $this->mappingCsvColumn['material'];
            $columnSalesOrg = $this->mappingCsvColumn['salesOrg'];
            $columnDistributionChannel = $this->mappingCsvColumn['distributionChannel'];
            $columncountryOfOrigin = $this->mappingCsvColumn['countryOfOrigin'];

            /**
             * adding a new column 'status' to csv/excel file
             */
            // Import::setCell($nextColumn . '1', 'Status');
            foreach ($excelDataNewArray as $rowCount => $rowvalueRecord) {
                $rowvalue = json_decode(utf8_encode($rowvalueRecord['record']));
                
                $plantName = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnPlant);
                $material = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnMaterial);
                $salesOrg = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnSalesOrg);
                $distributionChannel = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnDistributionChannel);
                $countryName = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columncountryOfOrigin);
               
                $this->currentStep = $rowCount + 1;
                $this->monitoringItem->setCurrentWorkload($this->currentStep)
                ->setTotalWorkload($this->totalSteps)
                ->setDefaultProcessMessage("Row: '".$this->currentStep."', Plant: '".$plantName."', Material: '".$material."'")
                ->save();
                
		        /**
                 * skip row if meterial or plant fields are empty
                 */
                $errorsData = array();
                if(empty(trim($material)))
                    $errorsData[] = 'Material should not be blank.';

                if(empty(trim($plantName)))
                    $errorsData[] = 'Plant should not be blank.';

                if(empty(trim($salesOrg)))
                    $errorsData[] = 'Sales organization should not be blank.';    
                
                if(empty(trim($distributionChannel)))
                    $errorsData[] = 'Distribution channel should not be blank.';   

                if(empty(trim($countryName)))
                    $errorsData[] = 'Country Name should not be blank.';

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
                    $this->monitoringItem->setMessage($errorsString)->save();
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
                    $this->monitoringItem->setMessage($errorsString)->save();
                    $statusCode = 'FAILED';
                    $excelDataNewArray[$rowCount]['failedReason'] = $allErrorsInString;
                }

                $excelDataNewArray[$rowCount]['statusCode'] = $statusCode;

                /**
                 * add above error/success message in newly created status column
                 */
                // Import::setCell($nextColumn.($rowCount+2),$errorsString);
            }
            $this->tableImportHelper->insertDataToLogTable($excelDataNewArray);
            $this->tableImportHelper->updateMaster();
            
        }

        $this->monitoringItem->setMessage('Importing stop from: ' . $this->filePath)->save();
        $this->monitoringItem->setWorkloadCompleted()->save();
        
        // Import::save();
        
        /**
         * Move imported file from inbox to archive or failed as per status
         */
        $moveParam = array(
            'filePath' => $this->inboxFilePath,
            'archivePath'   =>  $this->archiveDir,
            'failedPath'    =>  $this->failedDir,
            'status'        =>  $allSuccess,
            'fileName'      =>  date('Ymd')."_".time()
        );
        $movedAssetObj = $this->common->moveFile($moveParam);

        $countMsg = "\nTotal Records:".$totalRow.", ";
        $countMsg .= "\nSuccess Records:".$this->successCount.", ";
        $countMsg .= "\nFailed Records:".$this->failedCount.", ";
        $countMsg .= "\nCreated Records:".$this->createdCount.", ";
        $countMsg .= "\nUpdated Records:".$this->updatedCount.", ";

        /**
         * Massage log to application logger
         */
        if ($allSuccess) {
            $applicationLogMessage = "Plant Material Master Imported successfully.";
            $applicationLogMessage .= $countMsg;
            \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->info($applicationLogMessage);

        } else {

            $applicationLogMessage = "Plant material command failed to import ".$this->failedCount." Record(s) out of $totalRow Record(s)";
            $applicationLogMessage .= $countMsg;
            \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->error($applicationLogMessage);

        }

        $this->monitoringItem->setMessage($applicationLogMessage)->save();
        $this->monitoringItem->setMessage('Job finished')->setCompleted();
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
                $objectPlantMaster->setOutsidePurchaseIdentifier($this->common->getFieldValue($this->fileColumns,$rowvalue,$columnOutsidePurchaseIdentifier));
                $objectPlantMaster->setPlantProfitCenter($this->common->getFieldValue($this->fileColumns,$rowvalue,$columnProfitCenter));
                $objectPlantMaster->setMRPController($this->common->getFieldValue($this->fileColumns,$rowvalue,$columnMrpController));
                $objectPlantMaster->setTotalReplenismentLeadTime($this->common->getFieldValue($this->fileColumns,$rowvalue,$columnTotalReplLeadTime));
                $objectPlantMaster->setSafetyStock($this->common->getFieldValue($this->fileColumns,$rowvalue,$columnSafetyStock));
                $objectPlantMaster->setStockIndicator($this->common->getFieldValue($this->fileColumns,$rowvalue,$columnStockIndicator));
                $objectPlantMaster->setTariffCodes('');
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
            $this->monitoringItem->setMessage("Material: ".$MaterialKey." found")->save();
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
            $this->monitoringItem->setMessage("Plant: ".$plantKey." not found in master list, plant created")->save();
        }
        else{
            $this->monitoringItem->setMessage("Plant: ".$plantKey." found in master list")->save();
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
            $this->monitoringItem->setMessage("Country: ".$countryKey." not found in master list, country created")->save(); 
        }
        else{
            $this->monitoringItem->setMessage("Country: ".$countryKey." found in master list")->save();
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
