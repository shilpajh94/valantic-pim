<?php

namespace ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use ImportBundle\Services\Import;

class ImportNomenClatureCommand extends AbstractCommand
{
    private $common;
    private $successCount = 0;
    private $failedCount = 0;
    private $fileColumns;
    const NOMENCLATURE_FOLDER = 'Master List/NomenClature';

    protected function configure()
    {
        $this->setName('onetime-import:nomenclature-masterlist')
            ->setDescription('Commamd to imports nomenclature master list')
            ->addArgument('input_file', InputArgument::REQUIRED, 'Input file path')
            ->addArgument('nomenclature_type', InputArgument::REQUIRED, 'Nomenclature type required. ie- Hydraulic Adapter, Hydraulic, AC-GC.');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
         

        $time = new \DateTime();
        $this->common = \Pimcore::getContainer()->get('app.common_helper');
        $input_file = $input->getArgument('input_file');
        $nomenclature_type = $input->getArgument('nomenclature_type');
        $csvImportedData = Import::getCSVData($input_file);
        $this->fileColumns = $csvImportedData['header'];
        $excelData = $csvImportedData['data'];
        unset($csvImportedData);

        $nomenClatureFolderId= DataObject\Service::createFolderByPath(self::NOMENCLATURE_FOLDER."/".$nomenclature_type)->getId();
        

        // echo "Script started.\n";
        // echo "Processing has been started for file: ".$input_file.".\n\n";

        // if (!file_exists(self::FITTING_DB_LOG_DIR)) 
        //     mkdir(self::FITTING_DB_LOG_DIR);

        // $filePath = self::FITTING_DB_LOG_DIR.'fittingDb-import-'.time().'.csv';
        // $fileName = fopen($filePath,"w");

        // $this->fileColumns[] = 'Status';
        // fputcsv($fileName, $this->fileColumns);
        $dataCount = count($excelData);
        if($dataCount>0)
        {
            $allErrors = array();
            foreach ($excelData as $key => $recordValue) {
                // $recordValue['Status'] = '';
                $record = array_combine($this->fileColumns, $recordValue);
                echo "Processing row: ". ($key + 1)."\n";
                $errorsData = array();

                if(($nomenclature_type == 'Hydraulic Adapter') && empty(trim($record['Thread'])))
                    $errorsData[] = 'Thread Type should not be blank.';
                    
                if(($nomenclature_type == 'Hydraulic') && empty(trim($record['Complete Part'])))
                    $errorsData[] = 'Complete Part should not be blank.';

                if(($nomenclature_type == 'AC-GC') && empty(trim($record['Combined'])))
                    $errorsData[] = 'Combined should not be blank.';

                if(!count($errorsData))
                {
                    $errorsData = $this->createNomenClatureMaster($record, $nomenclature_type, $nomenClatureFolderId);
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
                // fputcsv($fileName, $excelData[$key]);

            }
            // fclose($fileName);
            // echo "CSV log file created - ".$filePath.". \n";

            $countMsg = "\nTotal Processed Records:".$dataCount.", ";
            $countMsg .= "\nUpdated Records:".$this->successCount.", ";
            $countMsg .= "\nFailed Records:".$this->failedCount."\n";

            if ($this->failedCount > 0) 
            {
                echo "Nomenclature import command failed to import {$this->failedCount} Record(s) out of {$dataCount} Record(s)".$countMsg;
            }else
                echo "Nomenclature Imported successfully.";
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

    public function createNomenClatureMaster($data, $nomenclature_type, $nomenClatureFolderId)
    {
        $errorsData = array();
        $isMaterialUpdated = true;
        
        if($nomenclature_type == 'Hydraulic Adapter') 
            $key = trim($data['Thread']);
        else if($nomenclature_type == 'Hydraulic')
            $key = trim($data['Complete Part']);
        else if($nomenclature_type == 'AC-GC')
            $key = trim($data['Combined']);

        $key = strtoupper(\Pimcore\File::getValidFilename($key));

        $object = DataObject\NomenClature::getByPath("/".self::NOMENCLATURE_FOLDER."/".$nomenclature_type."/".$key);
        $createdOrUpdated = 'updated';
        if(!$object)
        {
            $createdOrUpdated = 'created';
            $object = new DataObject\NomenClature();
            $object->setKey($key);
            $object->setParentId($nomenClatureFolderId);
        }

        $object->setNomenClatureType($nomenclature_type);
        

        if($nomenclature_type == 'Hydraulic Adapter')
        {
            $object->setGender1($data['Gender']);
            $object->setThread($data['Thread']);
            if($data['Swivel'] && (strtoupper($data['Swivel']) == 'X'))
                $object->setSwivel('Swivel');

            $object->setFamily1($data['Family']);
            $object->setFamilyDescription1($data['Thread Family Description']);
            $object->setMarketingShortDescription($data['Marketing / Short Description']);
            $object->setAttributeCode($data['Adapter Attribute (Code)']);
            $object->setAttributeDescription($data['Adapter Attribute Description']);
        }
        else if($nomenclature_type == 'Hydraulic')
        {
            $object->setGender1($data['Gender']);

            if($data['Swivel (Y/N)'] && (strtoupper($data['Swivel (Y/N)']) == 'X'))
                $object->setSwivel('Swivel');

            $object->setPartialPartNumber($data['Complete Part']);
            $object->setFamily1($data['Fitting Family']);
            $object->setFamilyDescription1($data['Fitting Family Description']);
            $object->setThread($data['Thread']);
            $object->setThreadDescription($data['Thread Description']);

            if($data['Elbow Y/N'] && (strtoupper($data['Elbow Y/N']) == 'Y'))
                $object->setElbowYN('1');
            
            if($data['Elbow Y/N'] && (strtoupper($data['Elbow Y/N']) == 'N'))
                $object->setElbowYN('0');
            
            $object->setElbowType($data['Elbow Type']);
            $object->setElbowAngle1($data['Elbow Angle 1 (Degrees)']);
            $object->setElbowAngle2($data['Elbow Angle 2 (Degrees)']);
            $object->setAssemblyMaterialCode($data['Assembly Material (Code)']);
            $object->setAssemblyMaterialDescription($data['Assembly Material Description']);
            $object->setComments($data['Comments']);
        }
        else if($nomenclature_type == 'AC-GC')
        {
            $object->setPartialPartNumber($data['Combined']);
            $object->setStyleCode($data['Style Code']);
            $object->setStyleDescription($data['Style Desc.']);

            if($data['Swivel'] && (strtoupper($data['Swivel']) == 'Y'))
                $object->setSwivel('Swivel');

            $object->setFamily1($data['Family 1']);
            $object->setFamilyDescription1($data['Family 1 Description']);
            $object->setFamily2($data['Family 2']);
            $object->setFamilyDescription2($data['Family Description 2']);

            if(strtoupper($data['Gender']) == 'FEMALE')
                $object->setGender1('F');
            if(strtoupper($data['Gender']) == 'MALE')
                $object->setGender1('M');

            if(strtoupper($data['Gender2']) == 'FEMALE')
                $object->setGender2('F');
            if(strtoupper($data['Gender2']) == 'MALE')
                $object->setGender2('M');

            if($data['Elbow Y/N'] && (strtoupper($data['Elbow Y/N']) == 'Y'))
                $object->setElbowYN('1');
            
            if($data['Elbow Y/N'] && (strtoupper($data['Elbow Y/N']) == 'N'))
                $object->setElbowYN('0');

            $object->setNumberOfElbows($data['Number of Elbows']);
            
            $object->setElbowType($data['Elbow Type 1']);
            $object->setElbowAngle1($data['Elbow Angle 1 (Degrees)']);
            $object->setElbowAngle2($data['Elbow Angle 2 (Degrees)']);
            $object->setValve($data['Valve']);
            $object->setMarketingShortDescription($data['Marketing / Short Description']);
            $object->setAttributeCode($data['Attribute']);
            $object->setAttributeDescription($data['Attribute Description']);
        }

        $object->setPublished(TRUE);   
        $object->save(); 

        if($object)
            $errorsData['SUCCESS'] = "object ".$key. " has been {$createdOrUpdated}. \n";
        else
            $errorsData[] = "object ".$key. " has not been {$createdOrUpdated}. \n";

        unset($object);
        
        return $errorsData;
    }
}