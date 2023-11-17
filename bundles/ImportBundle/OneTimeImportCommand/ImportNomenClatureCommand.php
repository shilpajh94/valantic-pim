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
    const THREAD_FOLDER = "/Master List/Thread";
    const FITTING_FAMILY_FOLDER = "/Master List/Fitting Family";
    const ADAPTER_FOLDER = "/Master List/Adapter";

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
        if(!file_exists($input_file)){
            echo "Import file '".$input_file." not found".PHP_EOL;
            return;
        }
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

        $key = strtoupper(\Pimcore\Model\Element\Service::getValidKey($key, 'object'));

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
            $threadObject = $this->getThreadMaster($data['Thread'],$data['Thread Family Description']);
            $elementMetadata = new DataObject\Data\ObjectMetadata('Thread', [], $threadObject);
            $object->setThread([$elementMetadata]);

            if($data["Family"]){
                $fittingFamilyDesc = $this->getFittingFamilyMaster($data["Family"]);
                $elementMetadata = new DataObject\Data\ObjectMetadata('FittingFamily', [], $fittingFamilyDesc);
                $object->setFittingFamily([$elementMetadata]);
            }else{
                $object->setFittingFamily([]);
            }

            $object->setMarkettingShortDescription($data["Marketing / Short Description"]);
            $object->setGender1($data['Gender']);

            if($data['Swivel'] && (strtoupper($data['Swivel']) == 'X')){
                $object->setSwivel('Swivel');
            }else{
                $object->setSwivel(null);
            }

            $object->setAttributeCode($data['Adapter Attribute (Code)']);
            $object->setAttributeDescription($data['Adapter Attribute Description']);
        }
        else if($nomenclature_type == 'Hydraulic')
        {
            $object->setPartialPartNumber($data['Complete Part']);

            if($data["Fitting Family"]){
                $fittingFamilyDesc = $this->getFittingFamilyMaster($data["Fitting Family"], $data["Fitting Family Description"]);
                $elementMetadata = new DataObject\Data\ObjectMetadata('FittingFamily', [], $fittingFamilyDesc);
                $object->setFittingFamily([$elementMetadata]);
            }else{
                $object->setFittingFamily([]);
            }

            if($data['Thread']){
                $threadObject = $this->getThreadMaster($data['Thread'],$data['Thread Description']);
                $elementMetadata = new DataObject\Data\ObjectMetadata('Thread', [], $threadObject);
                $object->setThread([$elementMetadata]);
            }else{
                $object->setThread([]);
            }

            $object->setGender1($data['Gender']);

            if($data['Swivel (Y/N)'] && (strtoupper($data['Swivel (Y/N)']) == 'X')){
                $object->setSwivel('Swivel');
            }else{
                $object->setSwivel(null);
            }

            // not importing Hose Dash and Thread Dash because there is no data in the import sheet

            if($data['Elbow Y/N'] && (strtoupper($data['Elbow Y/N']) == 'Y')){
                $object->setElbowYN('1');
            }elseif($data['Elbow Y/N'] && (strtoupper($data['Elbow Y/N']) == 'N')){
                $object->setElbowYN('0');
            }else{
                $object->setElbowYN(null);
            }
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

            $families = [];
            if($data["Family 1"]){
                $fittingFamilyObj = $this->getFittingFamilyMaster($data["Family 1"], $data["Family 1 Description"]);
                $elementMetadata = new DataObject\Data\ObjectMetadata('FittingFamily', [], $fittingFamilyObj);
                $families[] = $elementMetadata;
            }
            if($data["Family 2"]){
                $fittingFamilyObj = $this->getFittingFamilyMaster($data["Family 2"], $data["Family Description 2"]);
                $elementMetadata = new DataObject\Data\ObjectMetadata('FittingFamily', [], $fittingFamilyObj);
                $families[] = $elementMetadata;
            }
            $object->setFittingFamily($families);

            if(strtoupper($data['Gender']) == 'FEMALE'){
                $object->setGender1('F');
            }elseif(strtoupper($data['Gender']) == 'MALE'){
                $object->setGender1('M');
            }else{
                $object->setGender1(null);
            }

            if(strtoupper($data['Gender2']) == 'FEMALE'){
                $object->setGender2('F');
            }elseif(strtoupper($data['Gender2']) == 'MALE'){
                $object->setGender2('M');
            }else{
                $object->setGender2(null);
            }

            if($data['Swivel'] && (strtoupper($data['Swivel']) == 'Y')){
                $object->setSwivel('Swivel');
            }else{
                $object->setSwivel(null);
            }

            $object->setAttributeCode($data['Attribute']);
            $object->setAttributeDescription($data['Attribute Description']);

            if($data['Elbow Y/N'] && (strtoupper($data['Elbow Y/N']) == 'Y')){
                $object->setElbowYN('1');
            }elseif ($data['Elbow Y/N'] && (strtoupper($data['Elbow Y/N']) == 'N')){
                $object->setElbowYN('0');
            }else{
                $object->setElbowYN(null);
            }

            $object->setNumberOfElbows($data['Number of Elbows']);
            $object->setElbowType($data['Elbow Type 1']);
            $object->setElbowAngle1($data['Elbow Angle 1 (Degrees)']);
            $object->setElbowAngle2($data['Elbow Angle 2 (Degrees)']);
            $object->setValve($data['Valve']);
            $object->setMarkettingShortDescription($data["Marketing / Short Description"]);

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

    public function getThreadMaster(string $name, ?string $desc = ''): DataObject\Thread
    {
        $threadFolderObject = DataObject\Service::createFolderByPath(self::THREAD_FOLDER);
        $obj = DataObject\Thread::getByName($name,1);
        if(!$obj){
            $key = \Pimcore\Model\Element\Service::getValidKey($name, 'object');
            $obj  = new DataObject\Thread();
            $obj->setName($name);
            $obj->setDescription($desc);

            $obj->setPublished(true);
            $obj->setKey($key);
            $obj->setParent($threadFolderObject);
            $obj->save();
        }
        return $obj;
    }

    public function getFittingFamilyMaster(string $name, ?string $desc = ''): DataObject\FittingFamily
    {
        $fittingFamilyFolderObject = DataObject\Service::createFolderByPath(self::FITTING_FAMILY_FOLDER);
        $obj = DataObject\FittingFamily::getByName($name,1);
        if(!$obj){
            $key = \Pimcore\Model\Element\Service::getValidKey($name, 'object');
            $obj  = new DataObject\FittingFamily();
            $obj->setName($name);
            $obj->setDescription($desc);

            $obj->setPublished(true);
            $obj->setKey($key);
            $obj->setParent($fittingFamilyFolderObject);
            $obj->save();
        }
        return $obj;
    }

    public function getAdapterMaster(string $name, ?string $desc = ''): DataObject\Adapter
    {
        $adapterFolderObject = DataObject\Service::createFolderByPath(self::ADAPTER_FOLDER);
        $obj = DataObject\Adapter::getByName($name,1);
        if(!$obj){
            $key = \Pimcore\Model\Element\Service::getValidKey($name, 'object');
            $obj  = new DataObject\Adapter();
            $obj->setName($name);
            $obj->setDescription($desc);

            $obj->setPublished(true);
            $obj->setKey($key);
            $obj->setParent($adapterFolderObject);
            $obj->save();
        }
        return $obj;
    }
}
