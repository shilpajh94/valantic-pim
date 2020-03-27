<?php

namespace ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use ImportBundle\Services\Import;

class ImportCompetitorDataCommand extends AbstractCommand
{
    private $common;
    private $successCount = 0;
    private $failedCount = 0;
    const COMPETITOR_PARTS_LOG_DIR = 'var/logs/competitor-parts/';
    const COMPETITIVE_DATA_FOLDER = 'Competitive Data';
    const COMPETITIVE_DATA_COMPETITOR_FOLDER = 'Competitive Data/Competitor';
    const COMPETITIVE_DATA_COMPETITOR_PARTS_FOLDER = 'Competitive Data/Competitor Parts';

    protected function configure()
    {
        $this->setName('onetime-import:competitor-data')
            ->setDescription('Commamd to imports competitor data')
            ->addArgument('input_file', InputArgument::REQUIRED, 'Input file path');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->common = \Pimcore::getContainer()->get('app.common_helper');
        $input_file = $input->getArgument('input_file');
        $excelDataNewArray = $this->getCSVData($input_file);
        
        $competitorDataCompetitorFolderId= DataObject\Service::createFolderByPath(self::COMPETITIVE_DATA_COMPETITOR_FOLDER)->getId();
        $competitorDataCompetitorPartsFolderId= DataObject\Service::createFolderByPath(self::COMPETITIVE_DATA_COMPETITOR_PARTS_FOLDER)->getId();
        
        echo "Script started.\n";
        echo "Processing has been started for file: ".$input_file.".\n\n";
        $allSuccess = false;
        if(count($excelDataNewArray)>0)
        {
            $allErrors = array();

            if (!file_exists(self::COMPETITOR_PARTS_LOG_DIR)) 
                mkdir(self::COMPETITOR_PARTS_LOG_DIR);

            $filePath = self::COMPETITOR_PARTS_LOG_DIR.'competitor-import-'.time().'.csv';
            $fileName = fopen($filePath,"w");

            $csvHeaders = array_keys($excelDataNewArray[0]);
            $csvHeaders[] = 'Status';

            fputcsv($fileName, $csvHeaders);
            
            foreach ($excelDataNewArray as $key => $record) {
                echo "Processing row: ". ($key + 1)."\n";
                $errorsData = array();
                
                if(empty(trim($record['Competitor Name'])))
                    $errorsData[] = 'Competitor Name should not be blank.';
                
                if(empty(trim($record['Competitor Product Name'])))
                    $errorsData[] = 'Competitor Product Name should not be blank.';

                if(empty(trim($record['Competitor Part Number'])))
                    $errorsData[] = 'Competitor Part Number should not be blank.';

                if(!count($errorsData))
                {
                    $errorsData = $this->createCompetitorPart($record, $competitorDataCompetitorFolderId, $competitorDataCompetitorPartsFolderId);
                }
                
                if(isset($errorsData['SUCCESS']))
                {
                    echo $errorsString = "SUCCESS: ".$errorsData['SUCCESS']."\n";
                    $excelDataNewArray[$key]['Status'] = 'SUCCESS';
                    $this->successCount++;
                }
                else if(count($errorsData) > 0)
                {
                    $allSuccess = false;
                    $this->failedCount++;
                    $errorsString = "FAILED: ";
                    $allErrorsInString = implode(' ', $errorsData);
                    $excelDataNewArray[$key]['Status'] = $allErrorsInString;
                    echo $errorsString .= $allErrorsInString."\n";
                }

                fputcsv($fileName, $excelDataNewArray[$key]);
                
            }
            fclose($fileName);
            echo "CSV log file created - ".$filePath.". \n";
            
        }
        else
        {
            echo "No record found.\n";
        }
        
        echo "Script stopped. Finished!! \n";
        die;
    }

    public function createCompetitorPart($data, $competitorDataCompetitorFolderId, $competitorDataCompetitorPartsFolderId)
    {
        $errorData = array();
        try {
            $competitorName = $data['Competitor Name'];
            $competitorProductName = $data['Competitor Product Name'];
            $competitorPartNumber = $data['Competitor Part Number'];
            $competitorIdInFraction = $data['Competitor ID (in) Fraction'];
            $competitorIdInDec = $data['Competitor ID (in) Dec'];
            $competitorLengthFt = $data['Competitor Length (ft)'];
            $competitorDescription = $data['Competitive Description'];
            $competitorIndustryStandard = $data['Competitive Industry Standard'];
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
            $comments = $data['Comments'];

            
            $competitorData['competitorKey'] = $competitorName;
            $competitorData['competitorName'] = $competitorName;
            $competitorData['competitorProductName'] = $competitorProductName;
            $competitorData['competitorParentId'] = $competitorDataCompetitorFolderId;
            $this->getCompetitorObject($competitorData);
            
            $competitorPartsKey = $competitorName."-".$competitorProductName."-".$competitorPartNumber;
            $competitorPartsKey = \Pimcore\File::getValidFilename($competitorPartsKey);
            $object = DataObject\CompetitorParts::getByPath("/".self::COMPETITIVE_DATA_COMPETITOR_PARTS_FOLDER."/".$competitorPartsKey);
            
            $createdOrUpdated = 'Updated';
            if(!$object){      
                $createdOrUpdated = 'Created'; 
                $object = new DataObject\CompetitorParts();
                $object->setKey($competitorPartsKey);
                $object->setParentId($competitorDataCompetitorPartsFolderId);
                $this->createdCount++;
            }
            else{
                $this->updatedCount++;
            }

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
                
                $competitorPriceDateArray = \explode('-',$competitorPriceDate);
                $competitorPriceDate = $competitorPriceDateArray[1]."-".$competitorPriceDateArray[0]."-".$competitorPriceDateArray[2];
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
        
        } catch (\Exception $e) {
            $errorData[] = $e->getMessage();
        }

        
        return $errorData;
    }

    /**
     * return competitor object or false
     */
    public function getCompetitorObject($competitorData){
        
        $competitorKey = $competitorData['competitorKey'];
        $competitorProductName = $competitorData['competitorProductName'];
        $competitorParentId = $competitorData['competitorParentId'];
        $competitorKey = \Pimcore\File::getValidFilename($competitorKey);
        $object = DataObject\Competitor::getByPath("/".self::COMPETITIVE_DATA_COMPETITOR_FOLDER."/".$competitorKey);
        if(!$object)
        {
            $object = new DataObject\Competitor();
            $object->setKey($competitorKey);
            $object->setName($competitorKey);
            $object->setProductName($competitorProductName);
            $object->setParentId($competitorParentId);
            $object->setPublished(TRUE);   
            $object->save();  
            echo "Competitor: ".$competitorKey." not found, competitor created \n";
        }
        else{
            echo "Competitor: ".$competitorKey." found in master list \n";
        }
        return $objectPlant;
    }

    /**
     * return array of given csv file
     */
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

    
}