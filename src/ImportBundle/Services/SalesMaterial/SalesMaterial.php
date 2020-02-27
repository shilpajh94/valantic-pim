<?php
namespace ImportBundle\Services\SalesMaterial;


use Exception;
use Pimcore\Model\DataObject;
use Pimcore\Log\FileObject;
use Throwable;
use ImportBundle\Controller\LogController as Logger;
use Elements\Bundle\ProcessManagerBundle;
use ImportBundle\Services\Helper\Util;
use ImportBundle\Services\Import;



class SalesMaterial
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
    const LOGGER_MODULE = 'SALES MATERIAL MASTER';
    const FILE_LAST_COL = 'O';
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
        $salesOrganizationsFolderId = $this->util->getFolderId(MASTER_LIST."/".SALES_ORGANIZATIONS,SALES_ORGANIZATIONS,$masterListId);
        $distributionChannelFolderId = $this->util->getFolderId(MASTER_LIST."/".DISTRIBUTION_CHANNEL,DISTRIBUTION_CHANNEL,$masterListId);
        $salesMaterialMasterFolderId = $this->util->getFolderId(MATERIALMASTER."/".SALESMATERIALMASTER,SALESMATERIALMASTER, $materialMasterId);
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
                
                $salesOrg = $this->getFieldValue($rowvalue,'Sales Org', '');
                $distributionChannel = $this->getFieldValue($rowvalue,'Distribution Channel', '');
                $material = $this->getFieldValue($rowvalue,'Material', '');
               
                $this->currentStep = $rowCount + 1;
                $this->monitoringItem->setCurrentWorkload($this->currentStep)
                ->setTotalWorkload($this->totalSteps)
                ->setDefaultProcessMessage("ROW - '".$this->currentStep."', Material: '".$material."', Sales Org: '".$salesOrg."', Distribution Channel: '".$distributionChannel)
                ->save();
                
                $errorsData = array();
                
                if(empty(trim($material)))
                    $errorsData[] = 'Material should not be blank.';

                if(empty(trim($salesOrg)))
                    $errorsData[] = 'Sales Org should not be blank.';

                if(empty(trim($distributionChannel)))
                    $errorsData[] = 'Distribution Channel should not be blank.';

                if(!count($errorsData))
                {
                    $data['salesMaterialMasterFolderId'] = $salesMaterialMasterFolderId;
                    $data['plantFolderId'] = $plantFolderId;
                    $data['salesOrganizationsFolderId'] = $salesOrganizationsFolderId;
                    $data['distributionChannelFolderId'] = $distributionChannelFolderId;
                    $data['plantMaterialMasterFolderId'] = $plantMaterialMasterFolderId;
                    $errorsData = $this->importSalesMaterial($rowvalue, $data);
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

        if ($allSuccess) {
            $applicationLogMessage = "Sales Material Master Imported successfully.";
            $applicationLogMessage .= "\nTotal Records : ".$totalRow;
            $applicationLogMessage .= "\nSuccess Records : ".$this->successCount;
            $applicationLogMessage .= "\nFailed Records : ".$this->failedCount;
            $applicationLogMessage .= "\nCreated Records : ".$this->createdCount;
            $applicationLogMessage .= "\nUpdated Records : ".$this->updatedCount;

            \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->info($applicationLogMessage);

        } else {

            $applicationLogMessage = "Sales material command failed to import ".$this->failedCount." Record(s) out of $totalRow Record(s)";
            $applicationLogMessage .= "\nTotal Records : ".$totalRow;
            $applicationLogMessage .= "\nSuccess Records : ".$this->successCount;
            $applicationLogMessage .= "\nFailed Records : ".$this->failedCount;
            $applicationLogMessage .= "\nCreated Records : ".$this->createdCount;
            $applicationLogMessage .= "\nUpdated Records : ".$this->updatedCount;
            \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->error($applicationLogMessage);

        }

        $this->monitoringItem->setMessage($applicationLogMessage)->save();
        $this->monitoringItem->setMessage('Job finished')->setCompleted();
        \Pimcore::collectGarbage();
        
    }

    public function importSalesMaterial($rowvalue, $data){
        $salesMaterialMasterFolderId = $data['salesMaterialMasterFolderId'];
        $plantFolderId = $data['plantFolderId']; 
        $salesOrganizationsFolderId = $data['salesOrganizationsFolderId'];
        $distributionChannelFolderId = $data['distributionChannelFolderId'];
        $plantMaterialMasterFolderId = $data['plantMaterialMasterFolderId'];

        $salesOrg = $this->getFieldValue($rowvalue,'Sales Org', '');
        $distributionChannel = $this->getFieldValue($rowvalue,'Distribution Channel', '');
        $material = $this->getFieldValue($rowvalue,'Material', '');

        $salesMaterialKey = $material."-".$salesOrg."-".$distributionChannel;

        
        
        $errorData = array();

        try{        
            
            $materialObj = $this->getMaterialObject($material);
            if($materialObj)
            {
                $objectSalesMaster = DataObject\SalesMaterialMaster::getByPath("/".MATERIALMASTER."/".SALESMATERIALMASTER."/".$salesMaterialKey);
            
                $createdOrUpdated = 'Updated';
                if(!$objectSalesMaster){      
                    $createdOrUpdated = 'Created'; 
                    $objectSalesMaster = new DataObject\SalesMaterialMaster();
                    $objectSalesMaster->setKey($salesMaterialKey);
                    $objectSalesMaster->setParentId($salesMaterialMasterFolderId);
                    $this->createdCount++;
                }
                else{
                    $this->updatedCount++;
                }
                
                $plantName = $this->getFieldValue($rowvalue,'Plant', '');
                $salesOrgDesc = $this->getFieldValue($rowvalue,'Sales Org Desc', '');
                $distributionChannelDesc = $this->getFieldValue($rowvalue,'Distribution Channel Desc', '');
                $plantObj = $this->getPlantObject($plantName, $plantFolderId);
                $salesOrgObj = $this->getSalesOrgObject($salesOrg, $salesOrgDesc, $salesOrganizationsFolderId);
                $distributionChannelObj = $this->getDistributionChannelObject($distributionChannel, $distributionChannelDesc, $distributionChannelFolderId);

                $objectSalesMaster->setMaterial($materialObj);
                $objectSalesMaster->setSalesOrganization($salesOrgObj);
                $objectSalesMaster->setDistributionChannel($distributionChannelObj);
                $objectSalesMaster->setSalesUOM($this->getFieldValue($rowvalue,'Sales Unit',''));
                $objectSalesMaster->setDeliveringPlant($plantObj);
                $objectSalesMaster->setEpixFlag($this->getFieldValue($rowvalue,'Material Group 1',''));
                $objectSalesMaster->setPricePageFlag($this->getFieldValue($rowvalue,'Material Group 2',''));
                $objectSalesMaster->setSalesStatus('');
                $objectSalesMaster->setPrivateBrand('');
                // $objectSalesMaster->setPublished(TRUE);                   
                $objectSalesMaster->save(); 


                if(empty($objectSalesMaster)) 
                    $errorData[] = "Sales Material Code - '".$salesMaterialKey."',  Material: '".$material."', Sales Org: '".$salesOrg."', Distribution Channel: '".$distributionChannel."' could not processed ";
                else
                    $errorData['SUCCESS'] = "Sales Material Code - '".$salesMaterialKey." has been ".$createdOrUpdated.".";
                   
            }
            else{
                $errorData[] = "Material : ".$material. " not found.";
            }
                
        } 
        catch (\Exception $e) {
            $errorData[] = "Sales Material Code - '".$plantMaterialKey. " - ".$e->getMessage();
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
            $objectPlant->save();   
        }
        return $objectPlant;

    }

    public function getDistributionChannelObject($distributionChannelKey, $distributionChannelDesc, $distributionChannelFolderId){
        
        $object = DataObject\DistributionChannel::getByPath("/".MASTER_LIST."/".DISTRIBUTION_CHANNEL."/".$distributionChannelKey);
        if(!$object)
        {
            $object = new DataObject\DistributionChannel();
            $object->setKey($distributionChannelKey);
            $object->setCode($distributionChannelKey);
            $object->setName($distributionChannelDesc);
            $object->setParentId($distributionChannelFolderId);
            $object->save();   
        }
        return $object;

    }

    public function getSalesOrgObject($salesOrgKey, $salesOrgDesc, $salesOrganizationsFolderId){
        
        $object = DataObject\SalesOrganisation::getByPath("/".MASTER_LIST."/".SALES_ORGANIZATIONS."/".$salesOrgKey);
        if(!$object)
        {
            $object = new DataObject\SalesOrganisation();
            $object->setKey($salesOrgKey);
            $object->setCode($salesOrgKey);
            $object->setName($salesOrgDesc);
            $object->setParentId($salesOrganizationsFolderId);
            $object->save();   
        }
        return $object;

    }

    public function getFieldValue($rowvalue, $string, $checkNumber){
        $index = array_search($string, $this->fileColumns);
        
        $value = ($checkNumber == 'NUMBER' && ( strtoupper($rowvalue[$index]) == 'NULL' || is_null($rowvalue[$index]) || empty($rowvalue[$index]))) ? 0 :  $rowvalue[$index];
        if($string == 'Standard Pack Quantity')
        {
            $value = new DataObject\Data\QuantityValue($value, '');
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
