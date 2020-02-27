<?php
namespace ImportBundle\Services\PlantMaterial;


use Exception;
use Pimcore\Model\DataObject;
use Pimcore\Log\FileObject;
use Throwable;
use ImportBundle\Controller\LogController as Logger;
use Elements\Bundle\ProcessManagerBundle;
use ImportBundle\Services\Helper\Util;
use ImportBundle\Services\Import;



class PlantMaterial
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
    const FILE_LAST_COL = 'P';
    private $failedCount = 0;
    private $successCount = 0;
    private $createdCount = 0;
    private $updatedCount = 0;
    private $fileColumns = array();

    public function __construct()
    {
        $this->util = new Util;
        /* Initilize monitoring item and set the number of steps will take to complete the task */
        $this->monitoringItem = ProcessManagerBundle\ElementsProcessManagerBundle::getMonitoringItem();
    }
    public function config($param = array())
    {
        try {
            $this->updateDefaults($param);
            $spreadsheet = Import::load($this->filePath);
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
        $lastRowLastColumn = $worksheetHighestColumnRow['highestDataColumn'] . $worksheetHighestColumnRow['highestDataRow'];
        $activeSheet = $spreadsheet->getActiveSheet()->toArray();
        $excelDataNewArray = $spreadsheet->getActiveSheet()->rangeToArray("A1:$lastRowLastColumn",NULL,TRUE,TRUE,FALSE);
        
        $this->monitoringItem->setMessage('File Information')->save();
        $this->monitoringItem->setMessage('File path is being imported: ' . $this->filePath)->save();
        
        $masterListId = $this->util->getFolderId(MASTER_LIST,MASTER_LIST);
        $materialMasterId = $this->util->getFolderId(MATERIALMASTER,MATERIALMASTER);
        $plantFolderId = $this->util->getFolderId(MASTER_LIST."/".PLANTS,PLANTS, $masterListId);
        $countryFolderId = $this->util->getFolderId(MASTER_LIST."/".COUNTRY,COUNTRY,$masterListId);
        $plantMaterialMasterFolderId = $this->util->getFolderId(MATERIALMASTER."/".PLANTMATERIALMASTER,PLANTMATERIALMASTER, $materialMasterId);
             
        $allSuccess = true;
        if(count($excelDataNewArray))
        {
            $this->fileColumns = $excelDataNewArray[0];
            array_shift($excelDataNewArray); 

            $totalRow = count($excelDataNewArray);
            $this->totalSteps = $totalRow;
            $this->monitoringItem->setTotalSteps($this->totalSteps)->save();

            Import::setCell(self::FILE_LAST_COL . '1', 'Status');
            foreach ($excelDataNewArray as $rowCount => $rowvalue) {
                
                $plantName = $this->getFieldValue($rowvalue,'Plant', '');
                $material = $this->getFieldValue($rowvalue,'Material', '');
               
                $this->currentStep = $rowCount + 1;
                $this->monitoringItem->setCurrentWorkload($this->currentStep)
                ->setTotalWorkload($this->totalSteps)
                ->setDefaultProcessMessage("ROW - '".$this->currentStep."', Plant: '".$plantName."', Material: '".$material."'")
                ->save();
                
                $errorsData = array();
                if(empty(trim($plantName)))
                    $errorsData[] = 'Plant should not be blank.';

                if(empty(trim($material)))
                    $errorsData[] = 'Material should not be blank.';

                if(!count($errorsData))
                {
                    $data['plantMaterialMasterFolderId'] = $plantMaterialMasterFolderId;
                    $data['plantFolderId'] = $plantFolderId;
                    $data['countryFolderId'] = $countryFolderId;
                    $errorsData = $this->importPlantMaterial($rowvalue, $data);
                }

                if(isset($errorsData['SUCCESS']))
                {
                    $this->successCount++;
                    $errorsString = "SUCCESS : ".$errorsData['SUCCESS'];
                    $this->monitoringItem->setMessage($errorsString)->save();
                }
                else if(count($errorsData))
                {
                    $allSuccess = false;
                    $errorsString = "Failed : ";
                    $errorsString .= implode(' ', $errorsData);
                    $this->failedCount++;
                    $this->monitoringItem->setMessage($errorsString)->save();
                }

                Import::setCell(self::FILE_LAST_COL.($rowCount+2),$errorsString);
            }
        }

        $this->monitoringItem->setMessage('Importing stop from: ' . $this->filePath)->save();
        $this->monitoringItem->setWorkloadCompleted()->save();
        
        Import::save();
        
        /* Move imported file from inbox to archive or failed as per status */
        $moveParam = array(
            'filePath' => $this->inboxFilePath,
            'archivePath'   =>  $this->archiveDir,
            'failedPath'    =>  $this->failedDir,
            'status'        =>  $allSuccess,
            'fileName'      =>  date('Ymd')."_".time()
        );
        $movedAssetObj = $this->util->moveFile($moveParam);

        $countMsg = "\nTotal Records:".$totalRow.", ";
        $countMsg .= "\nSuccess Records:".$this->successCount.", ";
        $countMsg .= "\nFailed Records:".$this->failedCount.", ";
        $countMsg .= "\nCreated Records:".$this->createdCount.", ";
        $countMsg .= "\nUpdated Records:".$this->updatedCount.", ";

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

        $plantName = $this->getFieldValue($rowvalue,'Plant', '');
        $material = $this->getFieldValue($rowvalue,'Material', '');
        $plantMaterialKey = $material."-".$plantName;

        $errorData = array();

        try{        
            
            $material = $this->getFieldValue($rowvalue,'Material', '');
            $materialObj = $this->getMaterialObject($material);
            if($materialObj)
            {
                $objectPlantMaster = DataObject\PlantMaterialMaster::getByPath("/".MATERIALMASTER."/".PLANTMATERIALMASTER."/".$plantMaterialKey);
            
                $createdOrUpdated = 'Updated';
                if(!$objectPlantMaster){      
                    $createdOrUpdated = 'Created'; 
                    $objectPlantMaster = new DataObject\PlantMaterialMaster();
                    $objectPlantMaster->setKey($plantMaterialKey);
                    $objectPlantMaster->setParentId($plantMaterialMasterFolderId);
                    $this->createdCount++;
                }
                else{
                    $this->updatedCount++;
                }
                
                $countryName = $this->getFieldValue($rowvalue,'Country of Origin – Code', '');
                $plantObj = $this->getPlantObject($plantName, $plantFolderId);
                $countryObj = $this->getCountryObject($countryName, $countryFolderId);
                $objectPlantMaster->setPlant($plantObj);
                $objectPlantMaster->setMaterial($materialObj);
                $objectPlantMaster->setCountryOfOrigin($countryObj);
                $objectPlantMaster->setPlannedDeliveryTime($this->getFieldValue($rowvalue,'Planned Delivery Time in Days','NUMBER'));
                $objectPlantMaster->setCommodityCode($this->getFieldValue($rowvalue,'Commodity Code',''));
                $objectPlantMaster->setMinOrderQuantity($this->getFieldValue($rowvalue,'Min. Order Quantity','NUMBER'));
                $objectPlantMaster->setOrderingQuantityIcrements($this->getFieldValue($rowvalue,'Ordering Quantity Increments', 'NUMBER'));

                $quantityUnitId = $this->getFieldValue($rowvalue,'Standard Pack Quantity - UOM','UNIT');
                $quantityValue = $this->getFieldValue($rowvalue,'Standard Pack Quantity','NUMBER');
                $standardPackQuantity = new DataObject\Data\QuantityValue($quantityValue, $quantityUnitId);

                $objectPlantMaster->setStandardPackQuantity($standardPackQuantity);
                $objectPlantMaster->setOutsidePurchaseIdentifier($this->getFieldValue($rowvalue,'', ''));
                $objectPlantMaster->setPlantProfitCenter($this->getFieldValue($rowvalue,'Profit Center', ''));
                $objectPlantMaster->setMRPController($this->getFieldValue($rowvalue,'MRP Controller', ''));
                $objectPlantMaster->setTotalReplenismentLeadTime($this->getFieldValue($rowvalue,'Total replenishment lead time', 'NUMBER'));
                $objectPlantMaster->setSafetyStock($this->getFieldValue($rowvalue,'Safety Stock', 'NUMBER'));
                $objectPlantMaster->setStockIndicator($this->getFieldValue($rowvalue,'Stock Indicator', ''));
                $objectPlantMaster->setTariffCodes('');
                $objectPlantMaster->setPublished(TRUE);                   
                $objectPlantMaster->save();    

                if(empty($objectPlantMaster)) 
                    $errorData[] = "Plant Material Code - '".$plantMaterialKey."', Plant: '".$plantName."', Material: '".$material."' could not processed ";
                else
                    $errorData['SUCCESS'] = "Plant Material Code - '".$plantMaterialKey." has been ".$createdOrUpdated.".";
                   
            }
            else{
                $errorData[] = "Material : ".$material. " not found.";
            }
                
        } 
        catch (\Exception $e) {
            $errorData[] = "Plant Material Code - '".$plantMaterialKey. " - ".$e->getMessage();
        }

        return $errorData;
    }
    

    public function getMaterialObject($MaterialKey){
        
        $objectMaterial = new DataObject\Product\Listing();
        $objectMaterial->setCondition("o_key LIKE ?", "%".$MaterialKey."%");
        $objectMaterial->setLimit(1);
        $objectMaterial->load();
        
        foreach ($objectMaterial as $material) {
            return $material;
        }

        return false;
    }

    public function getPlantObject($plantKey, $plantFolderId){
        
        $objectPlant = DataObject\Plant::getByPath("/".MASTER_LIST."/".PLANTS."/".$plantKey);
        if(!$objectPlant)
        {
            $objectPlant = new DataObject\Plant();
            $objectPlant->setKey($plantKey);
            $objectPlant->setPlant($plantKey);
            $objectPlant->setParentId($plantFolderId);
            $objectPlant->setPublished(TRUE);   
            $objectPlant->save();   
        }
        return $objectPlant;

    }

    public function getCountryObject($countryKey, $countryFolderId){
        
        $objectCountry = DataObject\Country::getByPath("/".MASTER_LIST."/".COUNTRY."/".$countryKey);
        if(!$objectCountry)
        {
            $objectCountry = new DataObject\Country();
            $objectCountry->setKey($countryKey);
            $objectCountry->setCode($countryKey);
            $objectCountry->setName($countryKey);
            $objectCountry->setParentId($countryFolderId);
            $objectCountry->setPublished(TRUE);   
            $objectCountry->save();   
        }
        return $objectCountry;

    }

    public function getFieldValue($rowvalue, $string, $checkNumber){
        if(!empty($string))
        {
            $index = array_search($string, $this->fileColumns);
            $value = ($checkNumber == 'NUMBER' && ( strtoupper($rowvalue[$index]) == 'NULL' || is_null($rowvalue[$index]) || empty($rowvalue[$index]))) ? 0 :  $rowvalue[$index];
            if($checkNumber == 'UNIT')
            {
                $unit = DataObject\QuantityValue\Unit::getByAbbreviation($rowvalue[$index]);
                $value = (!is_null($unit)) ? $unit->getId() : '';
            }
        }
        else{
            $value = ($checkNumber == 'NUMBER') ? 0 : '';
        }
        return $value;
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
