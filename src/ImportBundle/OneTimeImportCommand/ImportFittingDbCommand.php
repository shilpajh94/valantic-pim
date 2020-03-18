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

    protected function configure()
    {
        $this->setName('onetime-import:fitting-data')
            ->setDescription('Commamd to imports fitting data')
            ->addArgument('input_file', InputArgument::REQUIRED, 'Input file path');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->common = \Pimcore::getContainer()->get('app.common_helper');
        $input_file = $input->getArgument('input_file');
        $excelDataNewArray = $this->getCSVData($input_file);

        echo "Script started.\n";
        echo "Processing has been started for file: ".$input_file.".\n\n";
        $allSuccess = false;
        if(count($excelDataNewArray)>0)
        {
            $allErrors = array();
            foreach ($excelDataNewArray as $key => $record) {
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
                    $this->successCount++;
                }
                else if(count($errorsData) > 0)
                {
                    $allSuccess = false;
                    $this->failedCount++;
                    $errorsString = "FAILED: ";
                    $allErrorsInString = implode(' ', $errorsData);
                    echo $errorsString .= $allErrorsInString."\n";
                }
            }
        }
        else
        {
            echo "No record found.\n";
        }
        echo "Script stopped. Finished!! \n";
        die;
    }

    public function updateBrickData($data)
    {
        $materialKey = $data['SAP Number'];
        // $product = DataObject\Product::getById(25170);
        $product = $this->getMaterialObject($materialKey);
        if($product)
        {
            // $rr = $product->getDigit14()->getHydFittingsFert();
            $allBricks = $product->getDigit14();
            $allBricksGetters=$allBricks->getBrickGetters();

            foreach ($allBricksGetters as $key => $brick) {
                $brickData = $product->getDigit14()->$brick();
                
                if($brickData && ($brickData->getType() == 'HydFittingsFert'))
                {
                    // $brickData->setFittingFamily(); 
                    $brickData->setActivantNumber($data['Activant Number']);
                    $brickData->setAssemblyRevisionNumber($data['Assembly Revision Number']);
                    $brickData->setAssemblyVendor([$data['Assembly Vendor']]);
                    $brickData->setComments($data['Comments']);
                    $brickData->setDescriptivePartNumber($data['Descriptive Part Number']);
                    // $brickData->setFittingEndFamilyType();
                    $brickData->setSAPMaterialNumber($data['SAP Material Number']);
                    $brickData->setSAPNumber($data['SAP Number']);
                    // $brickData->setCatalogDescription();
                    // $brickData->setTubeLengthMM();
                    // $brickData->setTubeLengthInDec();
                    // $brickData->setHex1WrenchSizeIn();
                    // $brickData->setHex1WrenchSizeMM();
                    // $brickData->setHex2WrenchSizeIn();
                    // $brickData->setHex2WrenchSizeMM();
                    // $brickData->setSocketWrenchSizeInFract();
                    // $brickData->setSocketWrenchSizeMM();
                    // $brickData->setSocketWrenchSizeInDec();
                    // $brickData->setElbowAngleDegrees();
                    $brickData->setDropLength($data['Drop Length']);

                    $overallLengthUnitId = $this->common->getQuantityValueUnitId('');
                    $standardPackQuantity = $this->common->getDataQuantityValue($data['Overall Length'], $overallLengthUnitId);
                    
                    $runLengthUnitId = $this->common->getQuantityValueUnitId('');
                    $runLength = $this->common->getDataQuantityValue($data['Run Length'], $runLengthUnitId);
                    
                    $cutOffLengthUnitId = $this->common->getQuantityValueUnitId('');
                    $cutOffLength = $this->common->getDataQuantityValue($data['Cut Off Length'], $cutOffLengthUnitId);
                    
                    $insertionDepthUnitId = $this->common->getQuantityValueUnitId('');
                    $insertionDepth = $this->common->getDataQuantityValue($data['Insertion Depth'], $insertionDepthUnitId);
                    
                    $fittingWeightUnitId = $this->common->getQuantityValueUnitId('');
                    $fittingWeight = $this->common->getDataQuantityValue($data['Fitting Weight'], $fittingWeightUnitId);

                    $brickData->setOverallLength($overallLength);
                    $brickData->setRunLength($runLength);
                    $brickData->setCutOffLength($cutOffLength);
                    $brickData->setInsertionDepth($insertionDepth);
                    $brickData->setFittingWeight($fittingWeight);
                    
                    $ReleasedToProductionDate = new \DateTime(date("d-m-Y", strtotime($data['Released To Production Date'])));
                    $brickData->setReleasedToProductionDate($ReleasedToProductionDate);
                    $brickData->setReleasedToProduction($data['Released To Production']);
                    // $brickData->setFlangeIDInFract();
                    // $brickData->setFlangeIDInDec();
                    // $brickData->setFlangeIDMM();
                    // $brickData->setFlangeODInFract();
                    // $brickData->setFlangeODInDec();
                    // $brickData->setFlangeODMM();
                    // $brickData->setTubeIDInFract();
                    // $brickData->setTubeIDInDec();
                    // $brickData->setTubeIDMM();
                    // $brickData->setTubeODInFract();
                    // $brickData->setTubeODInDec();
                    // $brickData->setTubeODMM();
                    // $brickData->setValveStyle();
                    // $brickData->setValveSizeInDec();
                    // $brickData->setValveSizeMM();
                    // $brickData->setThreadDashSize1();
                    // $brickData->setThreadDashSize2();
                    // $brickData->setThreadDashSize3();
                    // $brickData->setThreadDashSize4();
                    // $brickData->setHoseID1InFract();
                    // $brickData->setHoseID1InDec();
                    // $brickData->setHoseID1MM();
                    // $brickData->setHoseID2MM();
                    // $brickData->setHoseID2InFract();
                    // $brickData->setHoseID2InDec();
                    // $brickData->setHoseID3InDec();
                    // $brickData->setHoseID3MM();
                    // $brickData->setHoseID3InFract();
                    // $brickData->setHoseDashSize();
                    // $brickData->setSwivel();
                    // $brickData->setUniCrimpStyle();
                    // $brickData->setElbowType();
                    // $brickData->setAssemblyMaterial();
                    // $brickData->setDualGripStyle();
                    // $brickData->setFittingSizeInFract();
                    // $brickData->setSAEStandard();
                    // $brickData->setGender();
                    // $brickData->setSkiveType();
                    // $brickData->setThreadDescription1();
                    // $brickData->setThreadDescription2();
                    // $brickData->setThreadDescription3();
                    // $brickData->setThreadDescription4();
                    $brickData->setStemComponentNumber($data['Stem Component Number']);
                    $brickData->setStemComponentSAPNumber($data['Stem Component SAP Number']);
                    $brickData->setStemComponentThreadType($data['Stem Component Thread Type']);
                    // $brickData->setStemComponentVendor($data['Stem Component Vendor']); // need to set componet vendor
                    $brickData->setStemHexinchDecimal($data['Stem Hex inch Decimal']);
                    $brickData->setStemHexinchFraction($data['Stem Hex inch Fraction']);
                    $brickData->setStemHexMM($data['Stem Hex mm']);
                    $brickData->setStemMaterial($data['Stem Material']);
                    
                    $StemRevDate = new \DateTime(date("d-m-Y", strtotime($data['Stem Rev Date'])));
                    $brickData->setStemRevDate($StemRevDate);
                    // $brickData->setStemRevisionNumber($data['Stem Revision Number']);
                    $brickData->setFerruleComponentNumber($data['Ferrule Component Number']);
                    $brickData->setFerruleComponentSAPNumber($data['Ferrule Component SAP Number']);
                    // $brickData->setFerruleComponentVendor($data['Ferrule Component Vendor']); // need to set componet vendor
                    // $brickData->setFerruleID();
                    $brickData->setFerruleMaterial($data['Ferrule Material']);
                    // $brickData->setFerruleOD();
                    $FerruleRevDate = new \DateTime(date("d-m-Y", strtotime($data['Ferrule Rev Date'])));
                    $brickData->setFerruleRevDate($FerruleRevDate);

                    // $brickData->setFerruleRevisionNumber($data['Ferrule Revision Number']);
                    // $brickData->setFerruleIDInDec();
                    // $brickData->setFerruleIDMM();
                    // $brickData->setFerruleODInDec();
                    // $brickData->setFerruleODMM();
                    // $brickData->setFerruleLengthInDec();
                    // $brickData->setFerruleLengthMM();
                    $brickData->setSwivelNutComponentNumber($data['Swivel Nut Component Number']);
                    $brickData->setSwivelNutComponentSAPNumber($data['Swivel Nut Component SAP Number']);
                    $brickData->setSwivelNutComponentThreadType($data['Swivel Nut Component Thread Type']);
                    // $brickData->setSwivelNutComponentVendor($data['Swivel Nut Component Vendor']); // need to set componet vendor
                    $brickData->setSwivelNutHexinchFraction($data['Swivel Nut Hex inch Fraction']);
                    $brickData->setSwivelNutinchDecimal($data['Swviel Nut inch Decimal']);
                    $brickData->setSwivelNutMaterial($data['Swivel Nut Material']);

                    $NutRevDate = new \DateTime(date("d-m-Y", strtotime($data['Nut Rev Date'])));
                    $brickData->setSwivelNutRevDate($NutRevDate);
                    // $brickData->setSwivelNutRevisionNumber($data['Swivel Nut Revision Number']);
                    $brickData->setThrustWireComponentNumber($data['Thrust Wire Component Number']);
                    $brickData->setThrustWireMaterial($data['Thrust Wire Material']);
                    $brickData->setThrustWireRevisionNumber($data['Thrust Wire Revision Number']);
                    // $brickData->setThrustWireNut();
                    // $brickData->setORingBOMSAPNumber();
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
        }
        else{
            $errorsData[] = "SAP Number/Material: ".$materialKey." does not exist in the system.\n";
        }

        return $errorsData;
    }

    public function getCSVData($fileName) {
        try {

            $csvFilePath = $fileName;
            $firstRowData = array();
            if (empty($csvFilePath)) {
                return $firstRowData;
            }

            // $csvFilePath = PIMCORE_ASSET_DIRECTORY . $filePath;

            $csvFilePath = str_replace("%20", " ", $csvFilePath);

            $dialect = \Pimcore\Tool\Admin::determineCsvDialect($csvFilePath);
            $data = [];
            $count = 0;

            if (($handle = fopen($csvFilePath, 'r')) !== false) {
                while (($rowData = fgetcsv($handle, 0, $dialect->delimiter, $dialect->quotechar, $dialect->escapechar)) !== false) {
                    if ($count == 0) {
                        foreach ($rowData as $key => $value) {
                            unset($rowData[$key]);
                            $rowData[utf8_decode(trim($key))] = utf8_decode(trim($value));
                        }
                        $firstRowData = $rowData;
                    } else {
                        $tmpData = [];
                        foreach ($firstRowData as $key => $value) {
                            $tmpData[$value] = utf8_encode($rowData[$key]);
                            $tmpData[$value] = $rowData[$key];
                        }
                        $data[] = $tmpData;
                        $cols = count($rowData);
                    }
                    $count++;
                }
                fclose($handle);
            }
            return $data;
        } catch (\Exception $e) {
            return array(
                'error' => $e->getMessage()
            );
        }
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