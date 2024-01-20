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

class ImportCompetitorDataCommand extends AbstractCommand
{
    private $common;
    private $fileColumns;
    private $successCount = 0;
    private $failedCount = 0;
    private $materialArray = array();
    const COMPETITOR_PARTS_LOG_DIR = 'var/logs/competitor-parts/';
    const COMPETITIVE_DATA_FOLDER = 'Competitive Data';
    const COMPETITIVE_DATA_COMPETITOR_FOLDER = 'Competitive Data/Competitor';
    const COMPETITIVE_DATA_COMPETITOR_PARTS_FOLDER = 'Competitive Data/Competitor Parts';
    private $container;
    private $createdCount;
    private $updatedCount;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct();
        $this->container = $container;
    }

    protected function configure()
    {
        $this->setName('onetime-import:competitor-data')
            ->setDescription('Commamd to imports competitor data')
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
        
        DataObject\Service::createFolderByPath(self::COMPETITIVE_DATA_COMPETITOR_FOLDER);
        DataObject\Service::createFolderByPath(self::COMPETITIVE_DATA_COMPETITOR_PARTS_FOLDER);
        
        echo "Script started.\n";
        echo "Processing has been started for file: ".$input_file.".\n\n";

            if (!file_exists(self::COMPETITOR_PARTS_LOG_DIR)) 
                mkdir(self::COMPETITOR_PARTS_LOG_DIR);

            $filePath = self::COMPETITOR_PARTS_LOG_DIR.'competitor-import-'.time().'.csv';
            $fileName = fopen($filePath,"w");

        $this->fileColumns[] = 'Status';
        fputcsv($fileName, $this->fileColumns);
        $dataCount = count($excelData);
        if($dataCount>0)
        {
            foreach ($excelData as $key => $recordValue) {
                $recordValue['Status'] = '';
                $record = array_combine($this->fileColumns, $recordValue);
                echo "Processing row: ". ($key + 1)."\n";
                $errorsData = array();

                if(isset($record['Material']) || isset($record['Digit6']))
                {
                    if(isset($record['Material']) && empty($record['Material']) && isset($record['Digit6']) && empty(trim($record['Digit6'])))
                        $errorsData[] = 'Material and 6 digit both should not be empty, At least one should have a value.';
                }
                else
                {
                    $errorsData[] = 'Material or 6 digit field required.';
                }

                if(empty(trim($record['Competitor Name'])))
                    $errorsData[] = 'Competitor Name should not be blank.';
                
                if(isset($record['Competitor Product Name']) && empty(trim($record['Competitor Product Name'])))
                    $errorsData[] = 'Competitor Product Name should not be blank.';

                if(isset($record['Competitive Brand']) && empty(trim($record['Competitive Brand'])))
                    $errorsData[] = 'Competitive Brand should not be blank.';

                if(isset($record['Competitor Part Number']) && empty(trim($record['Competitor Part Number'])))
                    $errorsData[] = 'Competitor Part Number should not be blank.';

                if(isset($record['Competitve Part Number']) && empty(trim($record['Competitve Part Number'])))
                    $errorsData[] = 'Competitve Part Number should not be blank.';

                if(!count($errorsData))
                {
                    $errorsData = $this->createCompetitorPart($record);
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

    public function createCompetitorPart($data)
    {
        // print_r($data);
        $errorData = array();
        try {
            $material = $data['Material'];
            $digit6 = $data['Digit6'];

            if($material)
                $materialObj = $this->getMaterialObject($material);

            if($digit6)
                $materialObj = $this->getMaterialBaseObject($digit6);

            if($materialObj)
            {
                $competitorName = ucfirst(strtolower($data['Competitor Name']));

                if(isset($data['Competitor Product Name']))
                    $competitorProductName = $data['Competitor Product Name'];
                else if(isset($data['Competitive Brand']))
                    $competitorProductName = $data['Competitive Brand'];

                if(isset($data['Competitor Part Number']))
                    $competitorPartNumber = $data['Competitor Part Number'];
                else if(isset($data['Competitve Part Number']))
                    $competitorPartNumber = $data['Competitve Part Number'];

                if(isset($data['Competitive Industry Standard']))
                    $competitorIndustryStandard = $data['Competitive Industry Standard'];
                else if(isset($data['Competitive Ind Stnd']))
                    $competitorIndustryStandard = $data['Competitive Ind Stn'];

                // $competitorProductName = $data['Competitor Product Name'];
                // $competitorPartNumber = $data['Competitor Part Number'];
                $competitorIdInFraction = $data['Competitor ID (in) Fraction'];
                $competitorIdInDec = $data['Competitor ID (in) Dec'];
                $competitorLengthFt = $data['Competitor Length (ft)'];
                $competitorDescription = $data['Competitive Description'];
                // $competitorIndustryStandard = $data['Competitive Industry Standard'];

                
                $continentalBenefitOverThisHose1 = $data['Continental Benefit Over This Hose 1'];
                $continentalBenefitOverThisHose2 = $data['Continental Benefit Over This Hose 2'];
                $continentalBenefitOverThisHose3 = $data['Continental Benefit Over This Hose 3'];
                $competitorListPrice = $data['Competitor List Price'];
                $competitorPriceDate = $data['Competitive Price Date'];
                $documentCurrency = $data['Document Currency'];
                $competitorMultiplier = $data['Competitive Multiplier'];
                $competitorNetPrice = $data['Competitor Net Price'];
                $competitorPriceUOM = $data['Competitor Price UOM'];
                $competitorPrimaryAlternate = $data['Competitor Primary/Alternate'];

                $commentsArr = array($data['Comment1'], $data['Comment2.'], $data['Comment3']);
                $comments = implode(' ',$commentsArr);
                
                $competitorData['competitorKey'] = $competitorName;
                $competitorData['competitorName'] = $competitorName;
                $competitorData['competitorProductName'] = $competitorProductName;
                $this->getCompetitorObject($competitorData);
                
                $competitorPartsKey = $competitorName."-".$competitorProductName."-".$competitorPartNumber;
                $competitorPartsKey = \Pimcore\File::getValidFilename($competitorPartsKey);

                $competitorFolderId= DataObject\Service::createFolderByPath(self::COMPETITIVE_DATA_COMPETITOR_PARTS_FOLDER."/".$competitorName)->getId();
                $object = DataObject\CompetitorParts::getByPath("/".self::COMPETITIVE_DATA_COMPETITOR_PARTS_FOLDER."/".$competitorName."/".$competitorPartsKey);
                
                $createdOrUpdated = 'Updated';
                if(!$object){      
                    $createdOrUpdated = 'Created'; 
                    $object = new DataObject\CompetitorParts();
                    $object->setKey($competitorPartsKey);
                    $object->setParentId($competitorFolderId);
                    $this->createdCount++;
                }
                else{
                    $this->updatedCount++;
                }
            
                $object->setMaterial([$materialObj]);
                $object->setCompetitorName($competitorName);
                $object->setCompetitorProductName($competitorProductName);
                $object->setPartNumber($competitorPartNumber);
                $object->setCompetitorIdFraction($competitorIdInFraction);
                $object->setCompetitorIdDec($competitorIdInDec);
                $object->setCompetitorLength($competitorLengthFt);
                $object->setCompetitiveDescription($competitorDescription);
                $object->setCompetitiveIndustryStandard($competitorIndustryStandard);
                $object->setContinentalBenefitOverHose1($continentalBenefitOverThisHose1);
                $object->setContinentalBenefitOverHose2($continentalBenefitOverThisHose2);
                $object->setContinentalBenefitOverHose3($continentalBenefitOverThisHose3);
                $object->setCompetitorListPrice($competitorListPrice);
                if(!empty(trim($competitorPriceDate)))
                {
                    if(strpos($competitorPriceDate,'-') !== false){
                        $competitorPriceDateArray = \explode('-',$competitorPriceDate);
                        // m-d-Y to d-m-Y
                        $competitorPriceDate = $competitorPriceDateArray[1]."-".$competitorPriceDateArray[0]."-".$competitorPriceDateArray[2];
                    }
                    else if(strpos($competitorPriceDate,'/') !== false){
                        $competitorPriceDateArray = \explode('/',$competitorPriceDate);
                        // d/m/Y to d-m-Y
                        $competitorPriceDate = $competitorPriceDateArray[0]."-".$competitorPriceDateArray[1]."-".$competitorPriceDateArray[2];
                    }
                    $competitorPriceDate = new \DateTime($competitorPriceDate);
                    $object->setCompetitivePriceDate($competitorPriceDate);
                }
                
                $object->setDocumentCurrency($documentCurrency);
                $object->setCompetitiveMultiplier($competitorMultiplier);
                $object->setCompetitorNetPrice($competitorNetPrice);
                $object->setCompetitorPriceUOM($competitorPriceUOM);
                $object->setCompetitorPrimaryAlternate($competitorPrimaryAlternate);
                $object->setComments($comments);
                $object->setPublished(TRUE);                   
                $object->save();
                 
                if(empty($object)) 
                    $errorData[] = "Competitive Part Number: ".$competitorPartsKey." could not processed ";
                else
                    $errorData['SUCCESS'] = "Competitive Part Number: ".$competitorPartsKey." has been ".$createdOrUpdated.".";
            
            }
            else
            {
                if(!empty(trim($material)))
                    $msg = "Fert level material {$material} not found in system.";
                else if(!empty(trim($digit6)))
                    $msg = "Base level Material of 6 digit {$digit6} not found in system.";

                $errorData[] = $msg;
            }
            
        } catch (\Exception $e) {
            $errorData[] = $e->getMessage();
        }

        unset($data);
        unset($object);
        
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
            return $material;
        }

        return false;
    }

    /**
     * return material object or false
     */
    public function getMaterialBaseObject($digit6Key){
        $objectMaterial = new DataObject\Product\Listing();
        $objectMaterial->setCondition("o_key LIKE ?", "%".$digit6Key."%");
        $objectMaterial->setLimit(1);
        $objectMaterial->load();
        
        foreach ($objectMaterial as $material) {
            return $material;
        }

        return false;
    }

    
    /**
     * return competitor object or false
     */
    public function getCompetitorObject($competitorData){
        
        // $competitorKey = $competitorData['competitorKey'];
        $competitorName = $competitorData['competitorName'];
        $competitorProductName = $competitorData['competitorProductName'];
        // $competitorParentId = $competitorData['competitorParentId'];
        $competitorKey = \Pimcore\File::getValidFilename($competitorName.'-'.$competitorProductName);
        $competitorFolderId= DataObject\Service::createFolderByPath(self::COMPETITIVE_DATA_COMPETITOR_FOLDER."/".$competitorName)->getId();
                
        $object = DataObject\Competitor::getByPath("/".self::COMPETITIVE_DATA_COMPETITOR_FOLDER."/".$competitorName."/".$competitorKey);
        if(!$object)
        {
            $object = new DataObject\Competitor();
            $object->setKey($competitorKey);
            $object->setName($competitorName);
            $object->setProductName($competitorProductName);
            $object->setParentId($competitorFolderId);
            $object->setPublished(TRUE);   
            $object->save();  
            echo "Competitor: ".$competitorKey." not found, competitor created \n";
        }
        else{
            echo "Competitor: ".$competitorKey." found in master list \n";
        }
        //return $objectPlant;
    }
}