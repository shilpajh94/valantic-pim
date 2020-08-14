<?php

namespace AppBundle\Command;

use AppBundle\Services\AppService;
use AppBundle\Services\MultiselectMasterService;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Pimcore\Model\DataObject\Product;
use Pimcore\Model\DataObject;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HydAttributeDataImportCommand extends Command
{
    const CREATE_MASTER_IF_NOT_EXIST = true;

    /**
     * file path to import
     */
    const DATA_FILE_PATH = PIMCORE_PROJECT_ROOT."/hyd_attribute_without_cal_values.xlsx";

    const IMPORT_CONFIG = array(
        "BASE_CONFIG" => array(
            "ID_COLUMN" => "D",
            "ID_ATTRIBUTE" => "o_key",
            "ID_ATTRIBUTE_TITLE" => "Material Code",
            "COLUMN_MAP" => "BASE_COLUMN_MAP",
            "LOG_FILE_NAME" => "HYD_ATTRIBUTE_BASE_DATA_IMPORT_LOG",
            "IMPORT_TYPE" => "BASE DATA"
        ),
        "SKELETON_CONFIG" => array(
            "ID_COLUMN" => "C",
            "ID_ATTRIBUTE" => "o_key",
            "ID_ATTRIBUTE_TITLE" => "Material Code",
            "COLUMN_MAP" => "SKELETON_COLUMN_MAP",
            "LOG_FILE_NAME" => "HYD_ATTRIBUTE_SKELETON_DATA_IMPORT_LOG",
            "IMPORT_TYPE" => "SKELETON DATA"
        ),
        "FERT_CONFIG" => array(
            "ID_COLUMN" => "A",
            "ID_ATTRIBUTE" => "articleNumber",
            "ID_ATTRIBUTE_TITLE" => "SAP Code",
            "COLUMN_MAP" => "FERT_COLUMN_MAP",
            "LOG_FILE_NAME" => "HYD_ATTRIBUTE_FERT_DATA_IMPORT_LOG",
            "IMPORT_TYPE" => "FERT DATA"
        )
    );

    /**
     * mapping for base level columns
     */
    const BASE_COLUMN_MAP = array(
        "I" => array("field" => "tubeMaterial", "brickKey" => "HoseBase", "type" => "multiselect", "brickType" => "base","masterType" => "MultiselectMaster","isMaster" => true),
        "J" => array("field" => "tubeCharacteristic", "brickKey" => "HoseBase", "type" => "multiselect", "brickType" => "base","masterType" => "MultiselectMaster","isMaster" => true),
        "K" => array("field" => "tubeColor", "brickKey" => "HoseBase", "type" => "multiselect", "brickType" => "base","masterType" => "MultiselectMaster","isMaster" => true),
        "L" => array("field" => "coverMaterial", "brickKey" => "HoseBase", "type" => "multiselect", "brickType" => "base","masterType" => "MultiselectMaster","isMaster" => true),
        "M" => array("field" => "coverCharacteristic", "brickKey" => "HoseBase", "type" => "multiselect", "brickType" => "base","masterType" => "MultiselectMaster","isMaster" => true),
        "N" => array("field" => "coverColor", "brickKey" => "HoseBase", "type" => "multiselect", "brickType" => "base","masterType" => "MultiselectMaster","isMaster" => true),
        "O" => array("field" => "standardMetHose", "brickKey" => "HoseBase", "type" => "multiselect", "brickType" => "base","masterType" => "MultiselectMaster","isMaster" => true),
        "AE" => array("field" => "staticWire", "brickKey" => "HoseBase", "type" => "input", "brickType" => "base"),
        "AF" => array("field" => "numberOfHelixWires", "brickKey" => "HoseBase", "type" => "numeric", "brickType" => "base"),
        "AG" => array("field" => "numberOfPlies", "brickKey" => "HoseBase", "type" => "numeric", "brickType" => "base"),
    );

    /**
     * mapping for skeleton level columns
     */
    const SKELETON_COLUMN_MAP = array(
        "AJ" => array("field" => "hoseIdNominalId", "brickKey" => "HoseSkeleton", "type" => "input", "brickType" => "skeleton"),
        "AK" => array("field" => "hoseIdDec", "brickKey" => "HoseSkeleton", "type" => "numeric", "brickType" => "skeleton"),
        // will get value from unit conversion
//        "AL" => array("field" => "hoseIdMM", "brickKey" => "HoseSkeleton", "type" => "numeric", "brickType" => "skeleton"),
        "AM" => array("field" => "hoseOdIn", "brickKey" => "HoseSkeleton", "type" => "numeric", "brickType" => "skeleton"),
        // will get value from unit conversion
//        "AN" => array("field" => "hoseOdmm", "brickKey" => "HoseSkeleton", "type" => "numeric", "brickType" => "skeleton"),
        "AO" => array("field" => "workingPressureMPA", "brickKey" => "HoseSkeleton", "type" => "numeric", "brickType" => "skeleton"),
        // will get value from unit conversion
//        "AP" => array("field" => "workingPressurePSI", "brickKey" => "HoseSkeleton", "type" => "numeric", "brickType" => "skeleton"),
//        "AQ" => array("field" => "minBurstPressurePSI", "brickKey" => "HoseSkeleton", "type" => "numeric", "brickType" => "skeleton"),
        "AR" => array("field" => "minBurstPressurempa", "brickKey" => "HoseSkeleton", "type" => "numeric", "brickType" => "skeleton"),
        "AS" => array("field" => "BendRadiusIN", "brickKey" => "HoseSkeleton", "type" => "numeric", "brickType" => "skeleton"),
        // will get value from unit conversion
//        "AT" => array("field" => "BendRadiusMM", "brickKey" => "HoseSkeleton", "type" => "numeric", "brickType" => "skeleton"),
        "AU" => array("field" => "VacuumIN", "brickKey" => "HoseSkeleton", "type" => "numeric", "brickType" => "skeleton"),
        // will get value from unit conversion
//        "AV" => array("field" => "VacuumMM", "brickKey" => "HoseSkeleton", "type" => "numeric", "brickType" => "skeleton"),
    );

    /**
     * mapping for fert level columns
     */
    const FERT_COLUMN_MAP = array(
        // not sure about this map ( don't import this column )
//        "F" => array("field" => "sapDescription", "brickKey" => null, "type" => "textarea", "brickType" => null),
        "G" => array("field" => "ActivantNumber", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        "H" => array("field" => "brandName", "brickKey" => null, "type" => "select", "brickType" => null,"masterType" => "Brand","isMaster" => true),
        "P" => array("field" => "reinforcement", "brickKey" => null, "type" => "multiselect", "brickType" => null,"masterType" => "MultiselectMaster","isMaster" => true),
        // name of these temp fields is different than modeling ( this is fine )
        "Q" => array("field" => "minimumTemperatureF", "brickKey" => null, "type" => "numeric", "brickType" => null),
        // will get value from unit conversion
//        "R" => array("field" => "minimumTemperatureC", "brickKey" => null, "type" => "numeric", "brickType" => null),
        "S" => array("field" => "maximumTemperatureF", "brickKey" => null, "type" => "numeric", "brickType" => null),
        // will get value from unit conversion
//        "T" => array("field" => "maximumTemperatureC", "brickKey" => null, "type" => "numeric", "brickType" => null),

        "U" => array("field" => "temperatureRangeApplication1", "brickKey" => "HoseFert", "type" => "input", "brickType" => "fert"),
        "V" => array("field" => "temperatureRangeApplicationFAndC1", "brickKey" => "HoseFert", "type" => "input", "brickType" => "fert"),
        "W" => array("field" => "temperatureRangeApplication2", "brickKey" => "HoseFert", "type" => "input", "brickType" => "fert"),
        "X" => array("field" => "temperatureRangeApplicationFAndC2", "brickKey" => "HoseFert", "type" => "input", "brickType" => "fert"),

        "Y" => array("field" => "temperatureRangeApplication3", "brickKey" => "HoseFert", "type" => "input", "brickType" => "fert"),
        "Z" => array("field" => "temperatureRangeApplicationFAndC3", "brickKey" => "HoseFert", "type" => "input", "brickType" => "fert"),
        "AA" => array("field" => "temperatureRangeApplication4", "brickKey" => "HoseFert", "type" => "input", "brickType" => "fert"),
        "AB" => array("field" => "temperatureRangeApplicationFAndC4", "brickKey" => "HoseFert", "type" => "input", "brickType" => "fert"),
        "AC" => array("field" => "temperatureRangeApplication5", "brickKey" => "HoseFert", "type" => "input", "brickType" => "fert"),
        "AD" => array("field" => "temperatureRangeApplicationFAndC5", "brickKey" => "HoseFert", "type" => "input", "brickType" => "fert"),

        "AH" => array("field" => "hoseLengthFT", "brickKey" => "HoseFert", "type" => "numeric", "brickType" => "fert"),
        // will get value from unit conversion
//        "AI" => array("field" => "hoseLengthM", "brickKey" => "HoseFert", "type" => "numeric", "brickType" => "fert"),
        "AW" => array("field" => "fitting1Type", "brickKey" => "HoseFert", "type" => "input", "brickType" => "fert"),
        "AX" => array("field" => "fitting1Size", "brickKey" => "HoseFert", "type" => "input", "brickType" => "fert"),
        "AY" => array("field" => "fitting1Material", "brickKey" => "HoseFert", "type" => "input", "brickType" => "fert"),
        "AZ" => array("field" => "fitting2Type", "brickKey" => "HoseFert", "type" => "input", "brickType" => "fert"),
        "BA" => array("field" => "fitting2Size", "brickKey" => "HoseFert", "type" => "input", "brickType" => "fert"),
        "BB" => array("field" => "fitting2Material", "brickKey" => "HoseFert", "type" => "input", "brickType" => "fert"),
        "BC" => array("field" => "assembly", "brickKey" => "HoseFert", "type" => "booleanSelect", "brickType" => "fert"),
        "BD" => array("field" => "grossWeight", "brickKey" => null, "type" => "numeric", "brickType" => null),
        "BE" => array("field" => "netWeight", "brickKey" => null, "type" => "numeric", "brickType" => null),
        "BF" => array("field" => "weightUnit", "brickKey" => null, "type" => "select", "brickType" => null),
    );

    const BRAND_FOLDER_PATH = "/Master List/Brands";

    /**
     * script statuses
     */
    const STATUS_PRODUCT_NOT_FOUND = "NOT FOUND";
    const STATUS_COMPLETED = "COMPLETED";
    const STATUS_PARTIALLY_COMPLETED = "PARTIALLY COMPLETED";
    const STATUS_FAILED = "FAILED";
    /**
     * row number to start import from
     */
    const DATA_ROW_NUMBER = 3;
    /**
     * separator for multiselect values
     */
    const MULTISELECT_COLUMN_VALUE_SEPARATOR = ";";

    /**
     * boolean values to be considered
     */
    const BOOLEAN_FALSE_VALUES = ["No","no"];
    const BOOLEAN_TRUE_VALUES = ["Yes","yes"];

    /**
     * @var array
     */
    private $recordImportErrors = array();
    private $comments = array();


    /**
     * @var
     */
    private $currentImportColumn;

    /**
     * @var MultiselectMasterService
     */
    private $multiselectMasterService;

    /**
     * @var AppService
     */
    private $appService;

    /**
     * HydAttributeDataImportCommand constructor.
     * @param MultiselectMasterService $multiselectMasterService
     * @param AppService $appService
     */
    public function __construct(MultiselectMasterService $multiselectMasterService,AppService $appService)
    {
        $this->multiselectMasterService = $multiselectMasterService;
        $this->appService = $appService;
        parent::__construct();
    }


    protected function configure()
    {
        $this->setName('contitech:hyd_attribute_data_import');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $startTime = time();

        $reader = IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);
        $spreadsheet = $reader->load(self::DATA_FILE_PATH);
        $worksheet = $spreadsheet->getSheet(0);

        foreach(self::IMPORT_CONFIG as $importConfig){
            $this->importDataForConfig($worksheet, $importConfig);
        }

        $endTime = time();
        $timeSpent = $endTime - $startTime;
        $this->consoleLog("Time taken for execution ".$timeSpent."s");

        $this->consoleLog("Check import CSV log files at ".PIMCORE_LOG_DIRECTORY);

    }

    /**
     * @param Worksheet $worksheet
     * @param array $importConfig
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     */
    private function importDataForConfig(Worksheet $worksheet, array $importConfig)
    {
        $this->consoleLog("STARTING Import for ".$importConfig["IMPORT_TYPE"]."--------------------------");

        $csvLogFilePath = PIMCORE_LOG_DIRECTORY."/".$importConfig["LOG_FILE_NAME"].".csv";
        $csvLogFileHandle = fopen($csvLogFilePath,"w");
        $this->csvLog($csvLogFileHandle, array("Import Sheet Row Number",$importConfig["ID_ATTRIBUTE_TITLE"],"Status","Comment"));

        $statusCountArray = [
            self::STATUS_PRODUCT_NOT_FOUND => 0,
            self::STATUS_COMPLETED => 0,
            self::STATUS_PARTIALLY_COMPLETED => 0,
            self::STATUS_FAILED => 0,
        ];

        $highestRow = $worksheet->getHighestRow();
        $processedRecords = array();
        $recordsCount = 0;
        for ($i = self::DATA_ROW_NUMBER; $i <= $highestRow; $i++) {
            $recordsCount++;
            $idCellCord = $importConfig["ID_COLUMN"].strval($i);
            $idCellValue = $worksheet->getCell($idCellCord)->getValue();

            if(in_array($idCellValue, $processedRecords)){
                continue;
            }
            $processedRecords[] = $idCellValue;

            $importStatus = null;
            $this->recordImportErrors = array();
            $this->comments = array();

            $product = $this->getProductByAttribute($importConfig["ID_ATTRIBUTE"], $idCellValue);
            if($product){
                $this->consoleLog("product id".$product->getId());
                $columnMapConstantName = "self::".$importConfig["COLUMN_MAP"];
                $map = constant($columnMapConstantName);

                foreach($map as $sheetColumnCord => $mapConfig) {
                    $this->setCurrentImportColumn($sheetColumnCord);

                    $cellCord = $sheetColumnCord.(strval($i));
                    $cellData = $worksheet->getCell($cellCord)->getValue();

                    try{
                        if(array_key_exists("brickKey",$mapConfig) && $mapConfig["brickKey"] != null){
                            $brickCollectionGetter = "get".ucfirst($mapConfig["brickType"]);
                            $brickGetter = "get".ucfirst($mapConfig["brickKey"]);

                            $brickCollection = $product->$brickCollectionGetter();
                            if($brickCollection && ( $brick = $brickCollection->$brickGetter())  ){

                                $this->setObjectData($brick, $mapConfig, $cellData);

                            }else{
                                // log that the brick is not attached to the product
                            }
                        }else{
                            // assuming that only base product config comes here
                            $this->setObjectData($product, $mapConfig, $cellData);
                        }
                    }catch (\Exception $exception){
                        $this->consoleLog($exception,"CRITICAL");
                        $this->recordImportErrors[] = $exception->getMessage();
                    }
                }

                try{
                    $product->save();
                    $importStatus = count($this->recordImportErrors) > 0 ? self::STATUS_PARTIALLY_COMPLETED : self::STATUS_COMPLETED;
                }catch (\Exception $exception){
                    $importStatus = self::STATUS_FAILED;
                    $this->consoleLog($exception->getMessage(), "CRITICAL");
                    $this->recordImportErrors[] = $exception->getMessage();
                }

            }else{
                $importStatus = self::STATUS_PRODUCT_NOT_FOUND;
//                $this->consoleLog("Product not found for ".$importConfig["ID_ATTRIBUTE"]." ".$idCellValue.", row number ".strval($i));
                $this->recordImportErrors[] = "Product not found in pimcore for the ".$importConfig["ID_ATTRIBUTE"]." ".$idCellValue;
            }

            $statusCountArray[$importStatus]++;

            $msg = $importConfig["ID_ATTRIBUTE_TITLE"].": " . $idCellValue . ", Row Number ".strval($i) . " [" .$importStatus."]";
            $this->consoleLog($msg);

            $this->comments = array_merge($this->comments, $this->recordImportErrors);
            $this->csvLog($csvLogFileHandle, array($i, $idCellValue, $importStatus, implode("\n",$this->comments)));

        }

        $this->consoleLog("-------------------------------SUMMARY------------------------------------");
        $this->consoleLog("Total records processed -> " . ($recordsCount));
        foreach($statusCountArray as $status => $count){
            $msg = "'" . $status . "' count -> " . $count;
            $this->consoleLog($msg);
        }
        $this->consoleLog("-------------------------------SUMMARY------------------------------------");
        fclose($csvLogFileHandle);
    }

    /**
     * @param $object
     * @param array $mapConfig
     * @param $cellData
     * @throws \Exception
     */
    private function setObjectData($object,array $mapConfig, $cellData)
    {
        if(array_key_exists("isMaster",$mapConfig)){

            $this->setMasterData($object, $mapConfig, $cellData);

        }elseif($mapConfig["type"] == "numeric"){

            $this->setNumericData($object, $mapConfig, $cellData);

        }elseif ($mapConfig["type"] == "booleanSelect"){

            $this->setBooleanSelectData($object, $mapConfig, $cellData);

        }elseif ($mapConfig["type"] == "input" || $mapConfig["type"] == "textarea" || $mapConfig["type"] == "wysiwyg"){

            $this->setStringData($object, $mapConfig, $cellData);

        }elseif($mapConfig["type"] == "select"){

            $this->setSelectData($object, $mapConfig, $cellData);

        }

        // to update the unit conversion attributes
        // assuming that all the unit attributes are getting the values in import file
        $this->appService->updateAttributeGroup($object, $mapConfig["field"], $cellData);
    }

    /**
     * @param $object
     * @param array $mapConfig
     * @param $cellData
     */
    private function setNumericData($object,array $mapConfig, $cellData)
    {
        $fieldSetter = "set".ucfirst($mapConfig["field"]);

        if(is_numeric($cellData) || $cellData == null){
            $object->$fieldSetter($cellData);
        }else{
            $msg = "Column "."'".$this->getCurrentImportColumn()."'" ." is mapped to a numeric field in pimcore (".$mapConfig["field"]."),";
            $msg .= " but non numeric data received. Skipping insert of this data (".$cellData.")" ;
            $this->recordImportErrors[] = $msg;

        }
    }

    /**
     * @param $object
     * @param array $mapConfig
     * @param $cellData
     */
    private function setBooleanSelectData($object,array $mapConfig, $cellData)
    {
        $fieldSetter = "set".ucfirst($mapConfig["field"]);

        if(in_array($cellData,self::BOOLEAN_FALSE_VALUES)){
            $object->$fieldSetter(false);
        }elseif (in_array($cellData,self::BOOLEAN_TRUE_VALUES)){
            $object->$fieldSetter(true);
        }elseif ($cellData == null){
            $object->$fieldSetter(null);
        }else{
            $msg = "Column "."'".$this->getCurrentImportColumn()."'" ." is mapped to a boolean field in pimcore (".$mapConfig["field"].") ,";
            $msg .= " but non boolean data received. Skipping insert of this data (".$cellData.")" ;
            $this->recordImportErrors[] = $msg;
        }
    }

    /**
     * @param $object
     * @param array $mapConfig
     * @param $cellData
     */
    private function setStringData($object,array $mapConfig, $cellData)
    {
        $fieldSetter = "set".ucfirst($mapConfig["field"]);
        $object->$fieldSetter($cellData);
    }

    /**
     * @param $object
     * @param array $mapConfig
     * @param $cellData
     */
    private function setSelectData($object,array $mapConfig, $cellData)
    {
        $fieldSetter = "set".ucfirst($mapConfig["field"]);
        if($cellData && trim($cellData) !== '' ){
            $object->$fieldSetter($cellData);
        }else{
            $object->$fieldSetter(null);
        }
    }

    /**
     * @param $object
     * @param array $mapConfig
     * @param $cellData
     */
    private function setMasterData($object,array $mapConfig, $cellData)
    {
        if($mapConfig["masterType"] == "MultiselectMaster"){
            $this->setMultiselectMaster($object,$mapConfig, $cellData);
        }elseif($mapConfig["masterType"] == "Brand"){
            $this->setBrandMasterData($object, $mapConfig, $cellData);
        }

    }

    /**
     * @param $object
     * @param array $mapConfig
     * @param $cellData
     */
    private function setBrandMasterData($object,array $mapConfig, $cellData)
    {
        $brandId = null;
        if($cellData){
            $brandObject = DataObject\Brand::getByName($cellData,1);

            // create brand if not exist
            if(!$brandObject && self::CREATE_MASTER_IF_NOT_EXIST){
                $key = DataObject\Service::getValidKey($cellData,"obejct");
                $parent = DataObject\Folder::getByPath(self::BRAND_FOLDER_PATH);

                $brandObject = new DataObject\Brand();
                $brandObject->setName($cellData);
                $brandObject->setKey($key);
                $brandObject->setParent($parent);
                $brandObject->setPublished(true);
                $brandObject->save();

                $msg = "( Column "."'".$this->getCurrentImportColumn()."'" ." ) Master '".$cellData."' for attribute '".$mapConfig["field"]."' does not exist in pimcore.Creating this master.";
                $this->comments[] = $msg;
            }

            if($brandObject){
                $brandId = $brandObject->getId();
            }else{
                $msg = "( Column "."'".$this->getCurrentImportColumn()."'" ." ) Master '".$cellData."' for attribute '".$mapConfig["field"]."' does not exist in pimcore.Skipping this data.";
                $this->recordImportErrors[] = $msg;
            }
        }
        $fieldSetter = "set".ucfirst($mapConfig["field"]);
        $object->$fieldSetter($brandId);
    }

    /**
     * @param $object
     * @param array $mapConfig
     * @param $cellData
     * @throws \Exception
     */
    private function setMultiselectMaster($object,array $mapConfig, $cellData)
    {
        if(array_key_exists("brickKey",$mapConfig) && $mapConfig["brickKey"] != null) {
            $brickKey = $mapConfig["brickKey"];
            $brickDef = DataObject\Objectbrick\Definition::getByKey($brickKey);
            $brickGroupName = $brickDef->getGroup();
        }else{
            // expecting only products here
            $brickGroupName = "ProductClass";
        }

        $valueToSet = null;
        $fieldSetter = "set".ucfirst($mapConfig["field"]);

        if($brickGroupName && $cellData){

            if($mapConfig["type"] == "select"){
                $masterObject = $this->multiselectMasterService->getMasterObject($mapConfig["field"], $brickGroupName, $cellData, false);

                if(!$masterObject && self::CREATE_MASTER_IF_NOT_EXIST){
                    $masterObject = $this->multiselectMasterService->getMasterObject($mapConfig["field"], $brickGroupName, $cellData, true);
                    $msg = "( Column "."'".$this->getCurrentImportColumn()."'" ." ) Master '".$cellData."' for attribute '".$mapConfig["field"]."' does not exist in pimcore.Creating this master.";
                    $this->comments[] = $msg;
                }

                if($masterObject){
                    if(!$masterObject->getId()){
                        $masterObject->setName($cellData);
                        $masterObject->save();
                    }
                    $valueToSet = $masterObject->getId();
                }else{
                    $msg = "( Column "."'".$this->getCurrentImportColumn()."'" ." ) Master '".$cellData."' for attribute '".$mapConfig["field"]."' does not exist in pimcore.Skipping this data.";
                    $this->recordImportErrors[] = $msg;
                }

            }elseif($mapConfig["type"] == "multiselect"){
                $values = explode(self::MULTISELECT_COLUMN_VALUE_SEPARATOR, $cellData);
                $masterIds = array();
                foreach($values as $value){
                    $masterObject = $this->multiselectMasterService->getMasterObject($mapConfig["field"], $brickGroupName, $value, false);

                    if(!$masterObject && self::CREATE_MASTER_IF_NOT_EXIST){
                        $masterObject = $this->multiselectMasterService->getMasterObject($mapConfig["field"], $brickGroupName, $value, true);
                        $msg = "( Column "."'".$this->getCurrentImportColumn()."'" ." ) Master '".$value."' for attribute '".$mapConfig["field"]."' does not exist in pimcore.Creating this master.";
                        $this->comments[] = $msg;
                    }

                    if($masterObject){
                        if(!$masterObject->getId()){
                            $masterObject->setName($value);
                            $masterObject->save();
                        }

                        $masterIds[] = $masterObject->getId();
                    }else{
                        $msg = "( Column "."'".$this->getCurrentImportColumn()."'" ." ) Master '".$value."' for attribute '".$mapConfig["field"]."' does not exist in pimcore.Skipping this data.";
                        $this->recordImportErrors[] = $msg;
                    }

                }
                $valueToSet = $masterIds;
            }
        }
        $object->$fieldSetter($valueToSet);
    }

    /**
     * @param string $attribute
     * @param string|null $value
     * @return Product|null
     */
    private function getProductByAttribute(string $attribute, ?string $value): ?Product
    {
        if($value == null){
            return null;
        }
        $list = new Product\Listing();
        $query = $attribute." = ".$list->quote($value);
        $list->setCondition($query);
        $list->setLimit(1);
        $list->load();
        $objects = $list->getObjects();

        return count($objects) > 0 ? $objects[0] : null;
    }


    /**
     * @return mixed
     */
    public function getCurrentImportColumn()
    {
        return $this->currentImportColumn;
    }

    /**
     * @param mixed $currentImportColumn
     */
    public function setCurrentImportColumn($currentImportColumn): void
    {
        $this->currentImportColumn = $currentImportColumn;
    }

    /**
     * handle logging
     *
     * @param $message
     * @param string $level
     */
    private function consoleLog($message, $level = "INFO")
    {
        echo "[ " . $level . " ] " . $message . PHP_EOL;
    }

    /**
     * @param $logHandler
     * @param array $dataRow
     */
    private function csvLog($logHandler,array $dataRow)
    {
        $csvDelimiter = ",";

        fputcsv($logHandler,$dataRow,$csvDelimiter);
    }

}
