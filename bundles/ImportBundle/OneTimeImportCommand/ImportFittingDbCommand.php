<?php

namespace ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use ImportBundle\Services\Import;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ImportFittingDbCommand extends AbstractCommand
{
    private $common;
    private $successCount = 0;
    private $failedCount = 0;
    private $fileColumns;
    private $unitConverter;
    private $container;
    const FITTING_DB_LOG_DIR = 'var/logs/fittingDB/';

    public function __construct(ContainerInterface $container)
    {
        parent::__construct();
        $this->container = $container;
    }


    protected function configure()
    {
        $this->setName('onetime-import:fitting-data')
            ->setDescription('Commamd to imports fitting data')
            ->addArgument('input_file', InputArgument::REQUIRED, 'Input file path');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $time = new \DateTime();
        $this->common =$this->container->get('app.common_helper');
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

            $this->unitConverter =$this->container->get('AppBundle\Services\UnitConverterService');

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
                    $partialPartNumberArray = explode('-',$data['Descriptive Part Number']);
                    $partialPartNumber = $partialPartNumberArray[0].'-'.$partialPartNumberArray[1];
                    $NomenClatureObj = $this->getNomenClatureObject($partialPartNumber);

                    if($NomenClatureObj)
                    {

                        $fittingFamilyObj = $NomenClatureObj->getFittingFamily();
                        $familyArray = array();
                        foreach($fittingFamilyObj as $key => $family)
                        {
                            $familyDetails = DataObject\FittingFamily::getById($family->getObjectId());
                            $familyArray[] = $familyDetails->getName();
                        }

                        $brickData->setHydFittingFamily($familyArray);
//                        $brickData->setHydThreadDescription('');
//                        $brickData->setElbowType($NomenClatureObj->getElbowType());
                    }

                    $isMaterialUpdated = true;

//                    $brickData->setActivantNumber($data['Activant Number']);
                    $brickData->setAssemblyRevisionNumber($data['Assembly Revision Number']);
                    $brickData->setComments($data['Comments']);
                    $brickData->setDescriptivePartNumber($data['Descriptive Part Number']);
//                    $brickData->setSAPMaterialNumber($data['SAP Material Number']);
                    $brickData->setFittingWeight($data['Fitting Weight']);

                    $assemblyVendor = explode(',', $data['Assembly Vendor']);
                    $assemblyVendor = array_map('trim', $assemblyVendor);
                    $brickData->setAssemblyVendor($assemblyVendor);

                    $dropLengthUnit = $this->unitConverter->getGroupWithValues('DropLengthIN', floatval($data['Drop Length']));
                    $brickData->setDropLengthIN($dropLengthUnit['DropLengthIN']);
                    $brickData->setDropLengthMM($dropLengthUnit['DropLengthMM']);

                    $OverallLengthUnit = $this->unitConverter->getGroupWithValues('OverallLengthIN', floatval($data['Overall Length']));
                    $brickData->setOverallLengthIN($OverallLengthUnit['OverallLengthIN']);
                    $brickData->setOverallLengthMm($OverallLengthUnit['OverallLengthMm']);

                    $RunLengthUnit = $this->unitConverter->getGroupWithValues('RunLengthIN', floatval($data['Run Length']));
                    $brickData->setRunLengthIN($RunLengthUnit['RunLengthIN']);
                    $brickData->setRunLengthMM($RunLengthUnit['RunLengthMM']);

                    $CutOffLengthUnit = $this->unitConverter->getGroupWithValues('CutOffLengthIN', floatval($data['Cut Off Length']));
                    $brickData->setCutOffLengthIN($CutOffLengthUnit['CutOffLengthIN']);
                    $brickData->setCutOffLengthMM($CutOffLengthUnit['CutOffLengthMM']);

                    $InsertionDepthUnit = $this->unitConverter->getGroupWithValues('InsertionDepthIN', floatval($data['Insertion Depth']));
                    $brickData->setInsertionDepthIN($InsertionDepthUnit['InsertionDepthIN']);
                    $brickData->setInsertionDepthMM($InsertionDepthUnit['InsertionDepthMM']);

                    if(!empty(trim($record['Released To Production Date'])))
                    {
                        $ReleasedToProductionDate = new \DateTime(date("d-m-Y", strtotime(str_replace('/', '-', $data['Released To Production Date']))));
                        $brickData->setReleasedToProductionDate($ReleasedToProductionDate);
                    }

                    if(strtolower($data['Released To Production']) == 'yes') {
                        $brickData->setReleasedToProduction(true);
                    }

                    if (strtolower($data['Released To Production']) == 'no') {
                        $brickData->setReleasedToProduction(false);
                    }

                    $brickData->setStemComponentNumber($data['Stem Component Number']);
                    $brickData->setStemComponentSAPNumber($data['Stem Component SAP Number']);
                    $brickData->setStemComponentThreadType($data['Stem Component Thread Type']);

                    $stemComponentVendor = explode(',', $data['Stem Component Vendor']);
                    $stemComponentVendor = array_map('trim', $stemComponentVendor);
                    $brickData->setStemComponentVendor($stemComponentVendor);

                    $brickData->setStemHexinchDecimal($data['Stem Hex inch Decimal']);
                    $brickData->setStemHexinchFraction($data['Stem Hex inch Fraction']);
                    $brickData->setStemHexMM($data['Stem Hex mm']);
                    $brickData->setStemMaterial($data['Stem Material']);

                    if(!empty(trim($record['Stem Rev Date'])))
                    {
                        $StemRevDate = new \DateTime(date("d-m-Y", strtotime(str_replace('/', '-', $data['Stem Rev Date']))));
                        $brickData->setStemRevDate($StemRevDate);
                    }

                    $brickData->setStemRevisionNumber($data['Stem Revision Number']);
                    $brickData->setFerruleComponentNumber($data['Ferrule Component Number']);
                    $brickData->setFerruleComponentSAPNumber($data['Ferrule Component SAP Number']);

                    $ferruleComponentVendor = explode(',', $data['Ferrule Component Vendor']);
                    $ferruleComponentVendor = array_map('trim', $ferruleComponentVendor);
                    $brickData->setFerruleComponentVendor($ferruleComponentVendor);

                    $brickData->setFerruleIDInDec(0);
                    $brickData->setFerruleMaterial($data['Ferrule Material']);
                    $brickData->setFerruleODInDec(0);

                    if(!empty(trim($record['Ferrule Rev Date'])))
                    {
                        $FerruleRevDate = new \DateTime(date("d-m-Y", strtotime(str_replace('/', '-', $data['Ferrule Rev Date']))));
                        $brickData->setFerruleRevDate($FerruleRevDate);
                    }

                    $brickData->setFerruleRevisionNumber($data['Ferrule Revision Number']);
                    $brickData->setSwivelNutComponentNumber($data['Swivel Nut Component Number']);
                    $brickData->setSwivelNutComponentSAPNumber($data['Swivel Nut Component SAP Number']);
                    $brickData->setSwivelNutComponentThreadType($data['Swivel Nut Component Thread Type']);

                    $swivelNutComponentVendor = explode(',', $data['Swivel Nut Component Vendor']);
                    $swivelNutComponentVendor = array_map('trim', $swivelNutComponentVendor);
                    $brickData->setSwivelNutComponentVendor($swivelNutComponentVendor);

                    $brickData->setSwivelNutHexinchFraction($data['Swivel Nut Hex inch Fraction']);
                    $brickData->setSwivelNutinchDecimal($data['Swviel Nut inch Decimal']);
                    $brickData->setSwivelNutMaterial($data['Swivel Nut Material']);

                    if(!empty(trim($record['Nut Rev Date'])))
                    {
                        $NutRevDate = new \DateTime(date("d-m-Y", strtotime(str_replace('/', '-', $data['Nut Rev Date']))));
                        $brickData->setSwivelNutRevDate($NutRevDate);
                    }

                    $brickData->setSwivelNutRevisionNumber($data['Swivel Nut Revision Number']);
                    $brickData->setThrustWireComponentNumber($data['Thrust Wire Component Number']);
                    $brickData->setThrustWireMaterial($data['Thrust Wire Material']);
                    $brickData->setThrustWireRevisionNumber($data['Thrust Wire Revision Number']);
                    //$brickData->setThrustWireNut('');
                    //$brickData->setORingBOMSAPNumber(0);
                    $brickData->setORingComponentNumber($data['O-Ring Component Number']);
                    $brickData->setORingComponentSAPNumber($data['O-Ring Component SAP Number']);

                    $oRingComponentVendor = explode(',', $data['O-Ring Component Vendor']);
                    $oRingComponentVendor = array_map('trim', $oRingComponentVendor);
                    $brickData->setORingComponentVendor($oRingComponentVendor);

                    $brickData->setORingMaterial($data['O-Ring Material']);
                    $brickData->setORingRevisionNumber($data['O-Ring Revision Number']);
                    $brickData->setInternalORingComponentNumber($data['Internal O-Ring']);
                    $brickData->setInternalORingRev($data['Internal O-Ring Rev']);
                    $brickData->setInternalORingSAPNumber($data['Internal O-ring SAP Number']);

                    $InternalOringVendor = explode(',', $data['Internal O-ring Vendor']);
                    $InternalOringVendor = array_map('trim', $InternalOringVendor);
                    $brickData->setInternalORingVendor($InternalOringVendor);

                    $BackUpORingComponentVendor = explode(',', $data['Back Up O-Ring Component Vendor']);
                    $BackUpORingComponentVendor = array_map('trim', $BackUpORingComponentVendor);
                    $brickData->setBackUpORingComponentVendor($BackUpORingComponentVendor);

                    $brickData->setBackUpORingComponentNumber($data['Back-Up O-Ring Component Number']);
                    $brickData->setBackUpORingMaterial($data['Back-Up O-Ring Material']);
                    $brickData->setBackUpORingRevisionNumber($data['Back-Up O-Ring Revision Number']);
                    $brickData->setBackUpORingSAPNumber($data['Back-Up O-Ring SAP Number']);

                    $SlipNutRetainingRingComponentVednor = explode(',', $data['Slip Nut Retaining Ring Component Vednor']);
                    $SlipNutRetainingRingComponentVednor = array_map('trim', $SlipNutRetainingRingComponentVednor);
                    $brickData->setSlipNutRetainingRingComponentVendor($SlipNutRetainingRingComponentVednor);

                    $brickData->setSlipNutRetainingRingComponentNumber($data['Slip Nut Retaining Ring Component Number']);
                    $brickData->setSlipNutRetainingRingMaterial($data['Slip Nut Retaining Ring Material']);
                    $brickData->setSlipNutRetainingRingSAPComponentNumber($data['Slip Nut Retaining Ring SAP Component Number']);
                    $brickData->setSlipNutRevisionNumber($data['Slip Nut Revision Number']);

                    $ThreadProtectorComponentVednor = explode(',', $data['Thread Protector Component Vednor']);
                    $ThreadProtectorComponentVednor = array_map('trim', $ThreadProtectorComponentVednor);
                    $brickData->setThreadProtectorComponentVendor($ThreadProtectorComponentVednor);

                    $brickData->setThreadProtectorComponentNumber($data['Thread Protector Component Number']);
                    $brickData->setThreadProtectorMaterial($data['Thread Protector Material']);
                    $brickData->setThreadProtectorRevisionNumber($data['Thread Protector Revision Number']);
                    $brickData->setThreadProtectorSAPComponentNumber($data['Thread Protector SAP Component Number']);
                    $brickData->setPackagingBoxSize($data['Packaging Box Size']);
                    $brickData->setPackagingQuantityPerBox($data['Packaging Quantity Per Box']);

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

    /**
     * return material object or false
     */
    public function getNomenClatureObject($Key){

        $objectNomenClature = new DataObject\NomenClature\Listing();
        $objectNomenClature->setCondition("o_key LIKE ?", "%".$Key."%");
        $objectNomenClature->setLimit(1);
        $objectNomenClature->load();

        foreach ($objectNomenClature as $nomenClature) {
            return $nomenClature;
        }

        return false;
    }
}
