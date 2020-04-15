<?php

namespace ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use ImportBundle\Services\Import;

class ImportFittingDbCommand extends AbstractCommand
{
    private $common;
    private $successCount = 0;
    private $failedCount = 0;
    private $fileColumns;
    const FITTING_DB_LOG_DIR = 'var/logs/fittingDB/';

    protected function configure()
    {
        $this->setName('onetime-import:fitting-data')
            ->setDescription('Commamd to imports fitting data')
            ->addArgument('input_file', InputArgument::REQUIRED, 'Input file path');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $time = new \DateTime();
        $this->common = \Pimcore::getContainer()->get('app.common_helper');
        $input_file = $input->getArgument('input_file');
        $csvImportedData = Import::getCSVData($input_file);
        $this->fileColumns = $csvImportedData['header'];
        $excelData = $csvImportedData['data'];
        unset($csvImportedData);

        echo "Script started.\n";
        echo "Processing has been started for file: ".$input_file.".\n\n";

        if (!file_exists(self::FITTING_DB_LOG_DIR)) 
            mkdir(self::FITTING_DB_LOG_DIR);

        $filePath = self::FITTING_DB_LOG_DIR.'fittingDb-import-'.time().'.csv';
        $fileName = fopen($filePath,"w");

        $this->fileColumns[] = 'Status';
        fputcsv($fileName, $this->fileColumns);
        $dataCount = count($excelData);
        if($dataCount>0)
        {
            $allErrors = array();
            foreach ($excelData as $key => $recordValue) {
                $recordValue['Status'] = '';
                $record = array_combine($this->fileColumns, $recordValue);
                echo "Processing row: ". ($key + 1)."\n";
                $errorsData = array();

                if(empty(trim($record['SAP Number'])))
                    $errorsData[] = 'SAP Number should not be blank.';

                if(!count($errorsData))
                {
                    $errorsData = $this->updateBrickData($record);
                }
                
                if(isset($errorsData['SUCCESS']))
                {
                    echo $errorsString = "SUCCESS: ".$errorsData['SUCCESS']."\n";
                    $excelData[$key]['Status'] = 'SUCCESS';
                    $this->successCount++;
                }
                else if(count($errorsData) > 0)
                {
                    $this->failedCount++;
                    $errorsString = "FAILED: ";
                    $allErrorsInString = implode(' ', $errorsData);
                    $excelData[$key]['Status'] = $allErrorsInString;
                    echo $errorsString .= $allErrorsInString."\n";
                }

                unset($errorsData);
                fputcsv($fileName, $excelData[$key]);

            }
            fclose($fileName);
            echo "CSV log file created - ".$filePath.". \n";

            $countMsg = "\nTotal Processed Records:".$dataCount.", ";
            $countMsg .= "\nUpdated Records:".$this->successCount.", ";
            $countMsg .= "\nFailed Records:".$this->failedCount."\n";

            if ($this->failedCount > 0) 
            {
                echo "Fitting db import command failed to import {$this->failedCount} Record(s) out of {$dataCount} Record(s)".$countMsg;
            }else
                echo "Fitting db Imported successfully.";
        }
        else
        {
            echo "No record found.\n";
        }
        unset($excelData);
        echo "Script stopped. Finished!! \n";
        $timediff = $time->diff(new \DateTime());
        echo $timediff->format('Total script time: %h hour %i minute %s second').PHP_EOL;
        \Pimcore::collectGarbage();
        die;
    }

    public function updateBrickData($data)
    {
        $errorsData = array();
        $materialKey = $data['SAP Number'];
        $product = $this->getMaterialObject($materialKey);
        
        if($product)
        {
            $allBricks = $product->getFert();
            $allBricksGetters=$allBricks->getBrickGetters();
            $isMaterialUpdated = false;
            foreach ($allBricksGetters as $key => $brick) {
                $brickData = $product->getFert()->$brick();
                
                if($brickData && ($brickData->getType() == 'HydFittingsFert'))
                {
                    $isMaterialUpdated = true;
                    $brickData->setFittingFamily(''); 
                    $brickData->setActivantNumber($data['Activant Number']);
                    $brickData->setAssemblyRevisionNumber($data['Assembly Revision Number']);
                    $brickData->setAssemblyVendor([$data['Assembly Vendor']]);
                    $brickData->setComments($data['Comments']);
                    $brickData->setDescriptivePartNumber($data['Descriptive Part Number']);
                    $brickData->setFittingEndFamilyType('');
                    $brickData->setSAPMaterialNumber($data['SAP Material Number']);
                    $brickData->setSAPNumber($data['SAP Number']);
                    $brickData->setCatalogDescription('');
                    // $brickData->setTubeLengthMM(0);
                    // $brickData->setTubeLengthInDec(0);
                    // $brickData->setHex1WrenchSizeIn(0);
                    // $brickData->setHex1WrenchSizeMM(0);
                    // $brickData->setHex2WrenchSizeIn(0);
                    // $brickData->setHex2WrenchSizeMM(0);
                    // $brickData->setSocketWrenchSizeInFract(0);
                    // $brickData->setSocketWrenchSizeMM(0);
                    // $brickData->setSocketWrenchSizeInDec(0);
                    // $brickData->setElbowAngleDegrees(0);
                    $brickData->setDropLength($data['Drop Length']);
                    
                    $brickData->setOverallLengthIn($data['Overall Length']);
                    $brickData->setOverallLengthMm($data['Overall Length']);
                    $brickData->setRunLengthIn($data['Run Length']);
                    $brickData->setRunLengthMm($data['Run Length']);
                    $brickData->setCutOffLengthIn($data['Cut Off Length']);
                    $brickData->setCutOffLengthMm($data['Cut Off Length']);
                    $brickData->setInsertionDepthIn($data['Insertion Depth']);
                    $brickData->setInsertionDepthMm($data['Insertion Depth']);
                    $brickData->setFittingWeight($data['Fitting Weight']);
                    
                    if(empty(trim($record['Released To Production Date'])))
                    {
                        $ReleasedToProductionDate = new \DateTime(date("d-m-Y", strtotime(str_replace('/', '-', $data['Released To Production Date']))));
                        $brickData->setReleasedToProductionDate($ReleasedToProductionDate);
                    }
                    $brickData->setReleasedToProduction($data['Released To Production']);
                    // $brickData->setFlangeIDInFract(0);
                    // $brickData->setFlangeIDInDec(0);
                    // $brickData->setFlangeIDMM(0);
                    // $brickData->setFlangeODInFract(0);
                    // $brickData->setFlangeODInDec(0);
                    // $brickData->setFlangeODMM(0);
                    // $brickData->setTubeIDInFract(0);
                    // $brickData->setTubeIDInDec(0);
                    // $brickData->setTubeIDMM(0);
                    // $brickData->setTubeODInFract(0);
                    // $brickData->setTubeODInDec(0);
                    // $brickData->setTubeODMM(0);
                    // $brickData->setValveStyle(0);
                    // $brickData->setValveSizeInDec(0);
                    // $brickData->setValveSizeMM(0);
                    // $brickData->setThreadDashSize1(0);
                    // $brickData->setThreadDashSize2(0);
                    // $brickData->setThreadDashSize3(0);
                    // $brickData->setThreadDashSize4(0);
                    // $brickData->setHoseID1InFract(0);
                    // $brickData->setHoseID1InDec(0);
                    // $brickData->setHoseID1MM(0);
                    // $brickData->setHoseID2MM(0);
                    // $brickData->setHoseID2InFract(0);
                    // $brickData->setHoseID2InDec(0);
                    // $brickData->setHoseID3InDec(0);
                    // $brickData->setHoseID3MM(0);
                    // $brickData->setHoseID3InFract(0);
                    // $brickData->setHoseDashSize(0);
                    // $brickData->setSwivel('');
                    // $brickData->setUniCrimpStyle('');
                    // $brickData->setElbowType('');
                    // $brickData->setAssemblyMaterial('');
                    // $brickData->setDualGripStyle('');
                    // $brickData->setFittingSizeInFract('');
                    // $brickData->setSAEStandard('');
                    // $brickData->setGender('');
                    // $brickData->setSkiveType('');
                    // $brickData->setThreadDescription1('');
                    // $brickData->setThreadDescription2('');
                    // $brickData->setThreadDescription3('');
                    // $brickData->setThreadDescription4('');
                    $brickData->setStemComponentNumber($data['Stem Component Number']);
                    $brickData->setStemComponentSAPNumber($data['Stem Component SAP Number']);
                    $brickData->setStemComponentThreadType($data['Stem Component Thread Type']);
                    // $brickData->setStemComponentVendor($data['Stem Component Vendor']); // need to set componet vendor
                    $brickData->setStemHexinchDecimal($data['Stem Hex inch Decimal']);
                    $brickData->setStemHexinchFraction($data['Stem Hex inch Fraction']);
                    $brickData->setStemHexMM($data['Stem Hex mm']);
                    $brickData->setStemMaterial($data['Stem Material']);
                    
                    if(empty(trim($record['Stem Rev Date'])))
                    {
                        $StemRevDate = new \DateTime(date("d-m-Y", strtotime(str_replace('/', '-', $data['Stem Rev Date']))));
                        $brickData->setStemRevDate($StemRevDate);
                    }

                    // $brickData->setStemRevisionNumber($data['Stem Revision Number']);
                    $brickData->setFerruleComponentNumber($data['Ferrule Component Number']);
                    $brickData->setFerruleComponentSAPNumber($data['Ferrule Component SAP Number']);
                    // $brickData->setFerruleComponentVendor($data['Ferrule Component Vendor']); // need to set componet vendor
                    $brickData->setFerruleID(0);
                    $brickData->setFerruleMaterial($data['Ferrule Material']);
                    $brickData->setFerruleOD(0);

                    if(empty(trim($record['Ferrule Rev Date'])))
                    {
                        $FerruleRevDate = new \DateTime(date("d-m-Y", strtotime(str_replace('/', '-', $data['Ferrule Rev Date']))));
                        $brickData->setFerruleRevDate($FerruleRevDate);
                    }

                    // $brickData->setFerruleRevisionNumber($data['Ferrule Revision Number']);
                    // $brickData->setFerruleIDInDec(0);
                    // $brickData->setFerruleIDMM(0);
                    // $brickData->setFerruleODInDec(0);
                    // $brickData->setFerruleODMM(0);
                    // $brickData->setFerruleLengthInDec(0);
                    // $brickData->setFerruleLengthMM(0);
                    $brickData->setSwivelNutComponentNumber($data['Swivel Nut Component Number']);
                    $brickData->setSwivelNutComponentSAPNumber($data['Swivel Nut Component SAP Number']);
                    $brickData->setSwivelNutComponentThreadType($data['Swivel Nut Component Thread Type']);
                    // $brickData->setSwivelNutComponentVendor($data['Swivel Nut Component Vendor']); // need to set componet vendor
                    $brickData->setSwivelNutHexinchFraction($data['Swivel Nut Hex inch Fraction']);
                    $brickData->setSwivelNutinchDecimal($data['Swviel Nut inch Decimal']);
                    $brickData->setSwivelNutMaterial($data['Swivel Nut Material']);

                    if(empty(trim($record['Nut Rev Date'])))
                    {
                        $NutRevDate = new \DateTime(date("d-m-Y", strtotime(str_replace('/', '-', $data['Nut Rev Date']))));
                        $brickData->setSwivelNutRevDate($NutRevDate);
                    }

                    // $brickData->setSwivelNutRevisionNumber($data['Swivel Nut Revision Number']);
                    $brickData->setThrustWireComponentNumber($data['Thrust Wire Component Number']);
                    $brickData->setThrustWireMaterial($data['Thrust Wire Material']);
                    $brickData->setThrustWireRevisionNumber($data['Thrust Wire Revision Number']);
                    $brickData->setThrustWireNut('');
                    $brickData->setORingBOMSAPNumber(0);
                    $brickData->setORingComponentNumber($data['O-Ring Component Number']);
                    $brickData->setORingComponentSAPNumber($data['O-Ring Component SAP Number']);
                    // $brickData->setORingComponentVendor($data['O-Ring Component Vendor']); // need to set componet vendor
                    $brickData->setORingMaterial($data['O-Ring Material']);
                    $brickData->setORingRevisionNumber($data['O-Ring Revision Number']);
                    $brickData->setInternalORingComponentNumber($data['Internal O-Ring']);
                    $brickData->setInternalORingRev($data['Internal O-Ring Rev']);
                    $brickData->setInternalORingSAPNumber($data['Internal O-ring SAP Number']);
                    // $brickData->setInternalORingVendor($data['Internal O-ring Vendor']);  // need to set componet vendor
                    // $brickData->setBackUpORingComponentVendor($data['Back Up O-Ring Component Vendor']); // need to set componet vendor
                    $brickData->setBackUpORingComponentNumber($data['Back-Up O-Ring Component Number']);
                    $brickData->setBackUpORingMaterial($data['Back-Up O-Ring Material']);
                    $brickData->setBackUpORingRevisionNumber($data['Back-Up O-Ring Revision Number']);
                    $brickData->setBackUpORingSAPNumber($data['Back-Up O-Ring SAP Number']);
                    $brickData->setSlipNutRetainingRingComponentNumber($data['Slip Nut Retaining Ring Component Number']);
                    // $brickData->setSlipNutRetainingRingComponentVendor($data['Slip Nut Retaining Ring Component Vednor']); // need to set componet vendor
                    $brickData->setSlipNutRetainingRingMaterial($data['Slip Nut Retaining Ring Material']);
                    $brickData->setSlipNutRetainingRingSAPComponentNumber($data['Slip Nut Retaining Ring SAP Component Number']);
                    $brickData->setSlipNutRevisionNumber($data['Slip Nut Revision Number']);
                    $brickData->setThreadProtectorComponentNumber($data['Thread Protector Component Number']);
                    // $brickData->setThreadProtectorComponentVendor($data['Thread Protector Component Vednor']); // need to set componet vendor
                    $brickData->setThreadProtectorMaterial($data['Thread Protector Material']);
                    $brickData->setThreadProtectorRevisionNumber($data['Thread Protector Revision Number']);
                    $brickData->setThreadProtectorSAPComponentNumber($data['Thread Protector SAP Component Number']);
                    $brickData->setPackagingBoxSize($data['Packaging Box Size']);
                    // $brickData->setPackagingQuantityPerBox($data['Packaging Quantity Per Box']);

                    $product->save();
                    $errorsData['SUCCESS'] = "SAP Number ".$materialKey. " has been updated. \n";
                }
                
                unset($brickData);
            }

            if(!$isMaterialUpdated)
            {
                $errorsData[] = "Updation failed. HydFittingsFert binding not found with SAP Number ".$materialKey. " \n";
            }
        }
        else{
            $errorsData[] = "SAP Number/Material: ".$materialKey." does not exist in the system.\n";
        }

        return $errorsData;
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
            return $material;
        }

        return false;
    }
}