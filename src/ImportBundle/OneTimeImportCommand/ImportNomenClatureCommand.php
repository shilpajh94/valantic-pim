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
            ->addArgument('nomenclature_type', InputArgument::REQUIRED, 'Nomenclature type required. ie- HYD_ADAPTER_NOM, HYD_NOMENCLATURES, AC_GC_NOM_COMPLETE.');
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

                if(($nomenclature_type == 'HYD_ADAPTER_NOM') && empty(trim($record['Thread Type'])))
                    $errorsData[] = 'Thread Type should not be blank.';
                    
                if(($nomenclature_type == 'HYD_NOMENCLATURES') && empty(trim($record['Complete Part'])))
                    $errorsData[] = 'Complete Part should not be blank.';

                if(($nomenclature_type == 'AC_GC_NOM_COMPLETE') && empty(trim($record['Adapter Type'])))
                    $errorsData[] = 'Adapter Type should not be blank.';

                if(($nomenclature_type == 'AC_GC_NOM_COMPLETE') && empty(trim($record['Fitting Style'])))
                    $errorsData[] = 'Fitting Style should not be blank.';


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
            echo "CSV log file created - ".$filePath.". \n";

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
        
        if($nomenclature_type == 'HYD_ADAPTER_NOM') 
            $key = trim($data['Thread Type']);
        else if($nomenclature_type == 'HYD_NOMENCLATURES')
            $key = trim($data['Complete Part']);
        else if($nomenclature_type == 'AC_GC_NOM_COMPLETE')
            $key = trim($data['Adapter Type']).'-'.trim($data['Fitting Style']);

        $key = strtoupper(\Pimcore\File::getValidFilename($key));

        $object = DataObject\NomenClature::getByPath("/".self::NOMENCLATURE_FOLDER."/".$nomenclature_type."/".$key);
        if(!$object)
        {
            $object = new DataObject\NomenClature();
            $object->setKey($key);
            $object->setParentId($nomenClatureFolderId);
            
            $object->setNomenClatureType($nomenclature_type);
            $object->setGender($data['Gender']);
            $object->setSwivel($data['Swivel']);

            if($nomenclature_type == 'HYD_ADAPTER_NOM')
            {
                $object->setThreadType($data['Thread Type']);
                $object->setFamily($data['Family']);
                $object->setFamilyDescription($data['Thread Family Description']);
                $object->setCatalogFieldName($data['Catalog Field Name']);
                $object->setAttribute($data['Attribute']);
                $object->setAttributDescription($data['Attribute Description']);
            }
            else if($nomenclature_type == 'HYD_NOMENCLATURES')
            {
                $object->setCompletePart($data['Complete Part']);
                $object->setFamily($data['Fitting Family']);
                $object->setFamilyDescription($data['Fitting Family Description']);
                $object->setThread($data['Thread']);
                $object->setThreadDescription($data['Thread Description']);
                $object->setElbowYN($data['Elbow Y/N']);
                $object->setElbowType($data['Elbow Type']);
                $object->setElbowAngle1($data['Elbow Angle 1']);
                $object->setElbowAngle2($data['Elbow Angle 2']);
                $object->setMaterial($data['Material']);
                $object->setMaterialIdentifer($data['Material Identifer']);
                $object->setComments($data['Comments']);
            }
            else if($nomenclature_type == 'AC_GC_NOM_COMPLETE')
            {
                $object->setAdapterType($data['Adapter Type']);
                $object->setDescription($data['Description']);
                $object->setFittingStyle($data['Fitting Style']);
                $object->setFamily($data['Family']);
                $object->setFamilyDescription($data['Family Description']);
                $object->setElbowAngle($data['Elbow Angle']);
                $object->setElbowType($data['Elbow Type']);
                $object->setValve($data['Valve']);
                $object->setAttribute($data['Attribute']);
                $object->setAttributDescription($data['Attribute Description']);
                $object->setFullDescription($data['Full Description']);
            }

            $object->setPublished(TRUE);   
            $object->save(); 

            if($object)
                $errorsData['SUCCESS'] = "object ".$key. " has been created. \n";
            else
                $errorsData[] = "object ".$key. " has not been created. \n";

            unset($object);
        }
        else{
            $errorsData['SUCCESS'] = "object ".$key. " has been already exist. \n";
        }
        
        return $errorsData;
    }
}