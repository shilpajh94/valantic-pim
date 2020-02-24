<?php

namespace AppBundle\Command;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\PlantMaterialMaster;
use Pimcore\Model\Asset;
use AppBundle\Services\Common;
use Elements\Bundle\ProcessManagerBundle\ExecutionTrait;
use Elements\Bundle\ProcessManagerBundle\Model\MonitoringItem;

class ImportPlantMaterialCommand extends ContainerAwareCommand
{
    use ExecutionTrait;
    private $monitoringItem;
    private $totalSteps;
    private $currentStep;
    protected $colomns = array();

    protected function configure()
    {
        $this
            ->setName('import-plant-material')
            ->setDescription('Commamd to import plant material data')
            ->addOption(
                'monitoring-item-id', null, InputOption::VALUE_REQUIRED,
                'Contains the monitoring item if executed via the Pimcore backend'
            )
            ->addOption(
                'input_file', 'c', InputOption::VALUE_REQUIRED,
                'Contains the file name if executed via the Pimcore backend'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $this->initProcessManager($input->getOption('monitoring-item-id'));
        $this->monitoringItem = $this->getMonitoringItem();
        
        $masterListId = Common::getFolderId(MASTER_LIST,MASTER_LIST);
        $materialMasterId = Common::getFolderId(MATERIALMASTER,MATERIALMASTER);
        $plantFolderId = Common::getFolderId(MASTER_LIST."/".PLANTS,PLANTS, $masterListId);
        $countryFolderId = Common::getFolderId(MASTER_LIST."/".COUNTRY,COUNTRY,$masterListId);
        $plantMaterialMasterFolderId = Common::getFolderId(MATERIALMASTER."/".PLANTMATERIALMASTER,PLANTMATERIALMASTER, $materialMasterId);
        $inputFile = $input->getOption('input_file');
        
        try {
            
            $validateImportFileResponse = Common::validateImportFile($inputFile);
            if(!is_array($validateImportFileResponse)){
                $output->writeln($validateImportFileResponse);
                $this->monitoringItem->setMessage('Validate file import file response: ' . $validateImportFileResponse)->save();
            } else {
                $output->writeln('Importing start from ' . $inputFile);
                $this->monitoringItem->setMessage('File path is being imported: ' . $inputFile)->save();
                $excelDataNewArray = $validateImportFileResponse ;
            }
            
            $this->colomns = $excelDataNewArray[0];
            array_shift($excelDataNewArray);   
            $insertRecord = 0;
            $this->totalSteps = count($excelDataNewArray);
            $this->monitoringItem->setTotalSteps($this->totalSteps)->save();

            foreach ($excelDataNewArray as $rowCount => $rowvalue) {
                $this->currentStep = $rowCount + 1;

                if(empty(trim($this->getFieldValue($rowvalue,'Plant', ''))))
                {
                    $errormsg = 'Please fill Plant in Row Number: '.$this->currentStep;
                    $this->monitoringItem->getLogger()->error($errormsg);
                }
                else if(empty(trim($this->getFieldValue($rowvalue,'Material', ''))))
                {
                    $errormsg = 'Please fill Material in Row Number: '.$this->currentStep;
                    $this->monitoringItem->getLogger()->error($errormsg);
                }else{
                    
                    $data['plantMaterialMasterFolderId'] = $plantMaterialMasterFolderId;
                    $data['plantFolderId'] = $plantFolderId;
                    $data['countryFolderId'] = $countryFolderId;
                    $this->importPlantMaterial($rowvalue, $data);
                    $insertRecord++;
                }  
            }

            $this->monitoringItem->setWorkloadCompleted()->save();
        
        } catch (\Exception $e) {
            $output->writeln($e->getMessage());
            $this->monitoringItem->setMessage($e->getMessage())->setCompleted();
        }

        $this->monitoringItem->setMessage('Job finished')->setCompleted();

    }

    public function importPlantMaterial($rowvalue, $data){
        $plantMaterialMasterFolderId = $data['plantMaterialMasterFolderId'];
        $plantFolderId = $data['plantFolderId'];
        $countryFolderId = $data['countryFolderId'];

        $plantName = $this->getFieldValue($rowvalue,'Plant', '');
        $material = $this->getFieldValue($rowvalue,'Material', '');
        $plantMaterialKey = $material."-".$plantName;

        $this->monitoringItem->setCurrentWorkload($this->currentStep)
            ->setTotalWorkload($this->totalSteps)
            ->setDefaultProcessMessage("Processing Plant Material Code - '".$plantMaterialKey."', Plant: '".$plantName."', Material: '".$material."'")
            ->save();

        try{        
            $exists = DataObject\PlantMaterialMaster::getByPath("/".MATERIALMASTER."/".PLANTMATERIALMASTER."/".$plantMaterialKey);
            if(!$exists){       
                $objectPlantMaster = new DataObject\PlantMaterialMaster();
                
                $countryName = $this->getFieldValue($rowvalue,'Country of Origin – Code', '');
                $plantObj = $this->getPlantObject($plantName, $plantFolderId);
                $countryObj = $this->getCountryObject($countryName, $countryFolderId);
                $objectPlantMaster->setPlant($plantObj);
                // $objectPlantMaster->setMaterial($this->getFieldValue($rowvalue,'Material'));
                $objectPlantMaster->setCountryOfOrigin($countryObj);
                $objectPlantMaster->setPlannedDeliveryTime($this->getFieldValue($rowvalue,'Planned Delivery Time in Days','NUMBER'));
                $objectPlantMaster->setCommodityCode($this->getFieldValue($rowvalue,'Commodity Code',''));
                $objectPlantMaster->setMinOrderQuantity($this->getFieldValue($rowvalue,'Min. Order Quantity','NUMBER'));
                $objectPlantMaster->setOrderingQuantityIcrements($this->getFieldValue($rowvalue,'Ordering Quantity Increments', 'NUMBER'));
                $objectPlantMaster->setStandardPackQuantity($this->getFieldValue($rowvalue,'Standard Pack Quantity','NUMBER'));
                $objectPlantMaster->setOutsidePurchaseIdentifier($this->getFieldValue($rowvalue,'', ''));
                $objectPlantMaster->setPlantProfitCenter($this->getFieldValue($rowvalue,'Profit Center', ''));
                $objectPlantMaster->setMRPController($this->getFieldValue($rowvalue,'MRP Controller', ''));
                $objectPlantMaster->setTotalReplenismentLeadTime($this->getFieldValue($rowvalue,'Total replenishment lead time', 'NUMBER'));
                $objectPlantMaster->setSafetyStock($this->getFieldValue($rowvalue,'Safety Stock', 'NUMBER'));
                $objectPlantMaster->setStockIndicator($this->getFieldValue($rowvalue,'Stock Indicator', ''));
                $objectPlantMaster->setTariffCodes($this->getFieldValue($rowvalue,'', ''));
                $objectPlantMaster->setKey($plantMaterialKey);
                $objectPlantMaster->setParentId($plantMaterialMasterFolderId);
                // $objectPlantMaster->setPublished(TRUE);                   
                $objectPlantMaster->save();    
                if(empty($objectPlantMaster)) {
                    $this->monitoringItem->getLogger()->error("Plant Material Code - '".$plantMaterialKey."', Plant: '".$plantName."', Material: '".$material."' could not processed ");
                }
                else{
                    $this->monitoringItem->setMessage("New Plant Material Code - '".$plantMaterialKey."' Created")->save();
                }
                                               
            } else {
                $error = "Plant Material Code - '".$plantMaterialKey."' already exist.";
                $this->monitoringItem->setMessage($error)->save();
            }     
        } 
        catch (\Exception $e) {
            $error = "Plant Material Code - '".$plantMaterialKey. " - ".$e->getMessage();
            $this->monitoringItem->setMessage($error)->save();
        }
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

    public function getCountryObject($countryKey, $countryFolderId){
        
        $objectCountry = DataObject\Country::getByPath("/".MASTER_LIST."/".COUNTRY."/".$countryKey);
        if(!$objectCountry)
        {
            $objectCountry = new DataObject\Country();
            $objectCountry->setKey($countryKey);
            $objectCountry->setCode($countryKey);
            $objectCountry->setName($countryKey);
            $objectCountry->setParentId($countryFolderId);
            $objectCountry->save();   
        }
        return $objectCountry;

    }

    public function getFieldValue($rowvalue, $string, $checkNumber){
        $index = array_search($string, $this->colomns);
        
        $value = ($checkNumber == 'NUMBER' && ( strtoupper($rowvalue[$index]) == 'NULL' || is_null($rowvalue[$index]) || empty($rowvalue[$index]))) ? 0 :  $rowvalue[$index];
        if($string == 'Standard Pack Quantity')
        {
            $value = new DataObject\Data\QuantityValue($value, '');
        }
        return $value;
    }
}
