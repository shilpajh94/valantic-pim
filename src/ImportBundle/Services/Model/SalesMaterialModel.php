<?php
namespace ImportBundle\Services\Model;

use Exception;
use Pimcore\Model\DataObject;
use Throwable;
use AppBundle\Logger\AppLogger as Logger;
use Elements\Bundle\ProcessManagerBundle;
use ImportBundle\Services\Import;
use ImportBundle\Services\ImportConstants;

class SalesMaterialModel
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
    private $failedCount = 0;
    private $successCount = 0;
    private $createdCount = 0;
    private $updatedCount = 0;
    private $fileColumns = array();
    private $keyColumns = array();
    private $approvedSalesOrg = array();
    private $privateMaterialGroup = array();
    private $common;
    private $salesMaterialCsvColumn = array();
    private $tableImportConfig;
    private $tableImportHelper;

    public function __construct()
    {
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
            $salesMaterialConfig = \Pimcore::getContainer()->get('app.config_provider_service')->getSalesMaterialConfig();

            $this->approvedSalesOrg = $this->common->getParameter($salesMaterialConfig, 'approvedSalesOrg');
            $this->privateMaterialGroup = $this->common->getParameter($salesMaterialConfig, 'privateMaterialGroup');
            $this->salesMaterialCsvColumn = $this->common->getParameter($salesMaterialConfig, 'salesMaterialCsvColumn');
            $this->tableImportConfig['tempTable'] = $this->common->getParameterItem($salesMaterialConfig, 'tables','tempTable');
            $this->tableImportConfig['masterTable'] = $this->common->getParameterItem($salesMaterialConfig, 'tables','masterTable');
            $this->tableImportConfig['logTable'] = $this->common->getParameterItem($salesMaterialConfig, 'tables','logTable');
            $this->keyColumns = $this->common->getParameter($salesMaterialConfig, 'keyColumns');
            
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
        $salesOrganizationsFolderId= DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_SALES_ORGANIZATIONS_FOLDER)->getId();
        $distributionChannelFolderId= DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_DISTRIBUTION_CHANNEL_FOLDER)->getId();
        $salesMaterialMasterFolderId= DataObject\Service::createFolderByPath(ImportConstants::MATERIAL_MASTER_SALES_MATERIAL_MASTER_FOLDER)->getId();
       
        $allSuccess = true;
        if(count($excelDataNewArray))
        {
            /**
             * getting csv or excel file column name
             */
            $this->fileColumns = $excelDataNewArray[0];
            $this->tableImportConfig['fileColumns'] = $this->fileColumns;
            $this->tableImportConfig['mappingCsvColumn'] = $this->salesMaterialCsvColumn;
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


            $columnPlant = $this->salesMaterialCsvColumn['plant'];
            $columnMaterial = $this->salesMaterialCsvColumn['material'];
            $columnSalesOrg = $this->salesMaterialCsvColumn['salesOrg'];
	        $columnDistributionChannel = $this->salesMaterialCsvColumn['distributionChannel'];
            
            /**
             * adding a new column 'status' to csv/excel file
             */
            //Import::setCell($nextColumn . '1', 'Status');
            foreach ($excelDataNewArray as $rowCount => $rowvalueRecord) {
                $rowvalue = json_decode(utf8_encode($rowvalueRecord['record']));
                
                $salesOrg = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnSalesOrg);
                $distributionChannel = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnDistributionChannel);
                $material = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnMaterial);
                $plantName = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnPlant);
                
                $this->currentStep = $rowCount + 1;
                $this->monitoringItem->setCurrentWorkload($this->currentStep)
                ->setTotalWorkload($this->totalSteps)
                ->setDefaultProcessMessage("Row: '".$this->currentStep."', Material: '".$material."', Sales Org: '".$salesOrg."', Distribution Channel: '".$distributionChannel."', Plant: '".$plantName)
                ->save();

                /**
                 * skip row if any of these (meterial, plant, sales org and distribution channel) fields are empty
                 */
                $errorsData = array();   
                if(empty(trim($material)))
                    $errorsData[] = 'Material should not be blank.';        

                if(empty(trim($salesOrg)))
                    $errorsData[] = 'Sales Org should not be blank.';
                
                /**
                 * skip row if sales org is not belong to approved sales organizations mentioned in config
                 */
                else if(!isset($this->approvedSalesOrg[$salesOrg]))            
                    $errorsData[] = 'Sales Org-'.$salesOrg.' should belong to '. implode(', ',$this->approvedSalesOrg);

                if(empty(trim($distributionChannel)))
                    $errorsData[] = 'Distribution Channel should not be blank.';

                if(empty(trim($plantName)))
                    $errorsData[] = 'Plant should not be blank.';

                if(!count($errorsData))
                {
                    $data['salesMaterialMasterFolderId'] = $salesMaterialMasterFolderId;
                    $data['plantFolderId'] = $plantFolderId;
                    $data['salesOrganizationsFolderId'] = $salesOrganizationsFolderId;
                    $data['distributionChannelFolderId'] = $distributionChannelFolderId;
                    $errorsData = $this->importSalesMaterial($rowvalue, $data);
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
            $applicationLogMessage = "Sales Material Master Imported successfully.";
            $applicationLogMessage .= $countMsg;
            \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->info($applicationLogMessage);

        } else {

            $applicationLogMessage = "Sales material command failed to import ".$this->failedCount." Record(s) out of $totalRow Record(s)";
            $applicationLogMessage .= $countMsg;
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

        $columnPlant = $this->salesMaterialCsvColumn['plant'];
        $columnMaterial = $this->salesMaterialCsvColumn['material'];
        $columnSalesOrg = $this->salesMaterialCsvColumn['salesOrg'];
        $columnSalesOrgDesc = $this->salesMaterialCsvColumn['salesOrgDesc'];
        $columnDistributionChannel = $this->salesMaterialCsvColumn['distributionChannel'];
        $columnDistributionChannelDesc = $this->salesMaterialCsvColumn['distributionChannelDesc'];
        $columnSalesUnit = $this->salesMaterialCsvColumn['salesUnit'];
        $columnMaterialGroup1 = $this->salesMaterialCsvColumn['materialGroup1'];
        $columnMaterialGroup2 = $this->salesMaterialCsvColumn['materialGroup2'];

        $salesOrg = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnSalesOrg);
        $distributionChannel = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnDistributionChannel);
        $material = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnMaterial);
        
        $salesMaterialKey = $this->common->createKeyForObject($this->fileColumns, $rowvalue, $this->keyColumns, $this->salesMaterialCsvColumn);
        $errorData = array();

        try{        
            
            $materialObj = $this->getMaterialObject($material);
            if($materialObj)
            {
                /**
                 * Create or update sales material object
                 */
                $materialFolderId= DataObject\Service::createFolderByPath(ImportConstants::MATERIAL_MASTER_SALES_MATERIAL_MASTER_FOLDER."/".$material)->getId();
                $objectSalesMaster = DataObject\SalesMaterialMaster::getByPath("/".ImportConstants::MATERIAL_MASTER_SALES_MATERIAL_MASTER_FOLDER."/".$material."/".$salesMaterialKey);
            
                $plantName = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnPlant);
                $salesOrgDesc = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnSalesOrgDesc);
                $distributionChannelDesc = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnDistributionChannelDesc);
                $plantObj = $this->getPlantObject($plantName, $plantFolderId);
                $salesOrgObj = $this->getSalesOrgObject($salesOrg, $salesOrgDesc, $salesOrganizationsFolderId);
                $distributionChannelObj = $this->getDistributionChannelObject($distributionChannel, $distributionChannelDesc, $distributionChannelFolderId);

                $createdOrUpdated = 'Updated';
                if(!$objectSalesMaster){      
                    $createdOrUpdated = 'Created'; 
                    $objectSalesMaster = new DataObject\SalesMaterialMaster();
                    $objectSalesMaster->setKey($salesMaterialKey);
                    $objectSalesMaster->setParentId($materialFolderId);
                    $this->createdCount++;
                }
                else{
                    $this->updatedCount++;
                }
               
                $objectSalesMaster->setMaterial(array($materialObj));
                $objectSalesMaster->setSalesOrganization($salesOrgObj);
                $objectSalesMaster->setDistributionChannel($distributionChannelObj);
                $objectSalesMaster->setSalesUOM($this->common->getFieldValue($this->fileColumns,$rowvalue,$columnSalesUnit));
                $objectSalesMaster->setDeliveringPlant($plantObj);
                $objectSalesMaster->setEpixFlag($this->common->getFieldValue($this->fileColumns,$rowvalue,$columnMaterialGroup1));

                $pricePageFlag = $this->common->getFieldValue($this->fileColumns,$rowvalue,$columnMaterialGroup1);
                $privateOrGenericBrand = $this->getPrivateOrGenericMaterial($pricePageFlag);

                $objectSalesMaster->setPricePageFlag($pricePageFlag);
                $objectSalesMaster->setSalesStatus('');
                $objectSalesMaster->setPrivateBrand($privateOrGenericBrand);
                $objectSalesMaster->setPublished(TRUE);                   
                $objectSalesMaster->save(); 

                if(empty($objectSalesMaster))
                    $errorData[] = "Sales Material Code: ".$salesMaterialKey.",  Material: ".$material.", Sales Org: ".$salesOrg.", Distribution Channel: ".$distributionChannel.", Plant: ".$plantName.", could not processed ";
                else
                    $errorData['SUCCESS'] = "Sales Material Code: ".$salesMaterialKey." has been ".$createdOrUpdated.".";
            }
            else{
                
                /* return error massage if material not found */
                $errorData[] = "Material: ".$material. " not found.";
            }
        } 
        catch (\Exception $e) {
            /* return error massage if any exception found */
            $errorData[] = "Sales Material Code: ".$salesMaterialKey. " - ".$e->getMessage();
        }

        return $errorData;
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
            $this->monitoringItem->setMessage("Distribution Channel: ".$distributionChannelKey." not found in master list, distribution channel created")->save();
        }
        else{
            $this->monitoringItem->setMessage("Distribution Channel: ".$distributionChannelKey." found in master list")->save();
        }
        return $object;

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
            $this->monitoringItem->setMessage("Sales Org: ".$salesOrgKey." not found in master list, sales org created")->save();
        }
        else{
            $this->monitoringItem->setMessage("Sales Org: ".$salesOrgKey." found in master list")->save();
        }
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
