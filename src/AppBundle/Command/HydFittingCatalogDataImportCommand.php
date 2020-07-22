<?php


namespace AppBundle\Command;


use AppBundle\Services\AppService;
use AppBundle\Services\MultiselectMasterService;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Pimcore\Model\DataObject\Product;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;

class HydFittingCatalogDataImportCommand extends Command
{
    const DATA_FILE_PATH = PIMCORE_PROJECT_ROOT."/Hydraulics Fittings Catalog Data 05-06-2020 (5).xlsx";

    const IMPORT_SHEETS = array(
        "HYD_CATALOG_SHEET" => array(
            "SHEET_NUMBER" => 0,
            "DATA_ROW_NUMBER" => 4,
            "SAP_NUMBER_COLUMN" => "M",
            "COLUMN_MAP" => "HYD_CATALOG_SHEET_COLUMN_MAP",
            "LOG_FILE_NAME" => "hydraulics_catalog_sheet_import_log"
        ),
        "ACCESSORY_SHEET" => array(
            "SHEET_NUMBER" => 1,
            "DATA_ROW_NUMBER" => 3,
            "SAP_NUMBER_COLUMN" => "E",
            "COLUMN_MAP" => "ACCESSORY_SHEET_COLUMN_MAP",
            "LOG_FILE_NAME" => "accessory_sheet_import_log"
        )
    );

    const HYD_CATALOG_SHEET_COLUMN_MAP = [
//        "C" => "product--",  => pending from megha
        "D" => array("field" => "CatalogDescription", "brickKey" => "HydFittingsFert", "type" => "textarea", "brickType" => "fert"),
        "E" => array("field" => "shortDescription", "brickKey" => null, "type" => "wysiwyg", "brickType" => null),
//        "F" => array("customLogic" => true), => pending from megha
        "G" => array("field" => "DescriptivePartNumber", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        "H" => array("field" => "UniCrimpStyle", "brickKey" => "HydFittingsFert", "type" => "booleanSelect", "brickType" => "fert"),
        "I" => array("field" => "ThrustWireNut", "brickKey" => "HydFittingsFert", "type" => "booleanSelect", "brickType" => "fert"),
        "J" => array("field" => "DualGripStyle", "brickKey" => "HydFittingsFert", "type" => "booleanSelect", "brickType" => "fert"),
//        "K" => need to find the mapped column
        "L" => array("field" => "ActivantNumber", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
//        "M" => sap number
        "N" => array("field" => "HoseID1InFract", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        "O" => array("field" => "HoseID1MM", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "P" => array("field" => "FerruleIDInDec", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "Q" => array("field" => "FerruleIDMM", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "R" => array("field" => "FerruleODInDec", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "S" => array("field" => "FerruleODMM", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "T" => array("field" => "FerruleLengthInDec", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "U" => array("field" => "FerruleLengthMM", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
//        "V" => pending from megha
//        "W"  => pending from megha
        "X" => array("field" => "Hex1WrenchSizeIN", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "Y" => array("field" => "Hex1WrenchSizeMM", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "Z" => array("field" => "Hex2WrenchSizeIN", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "AA" => array("field" => "Hex2WrenchSizeMM", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "AB" => array("field" => "SocketWrenchSizeInFract", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
//        "AC" => we have got only one attribute for DropLength, attr. to be added
//        "AD" => we have got only one attribute for DropLength, attr. to be added
        "AE" => array("field" => "CutOffLengthIN", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        "AF" => array("field" => "CutOffLengthMM", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        "AG" => array("field" => "OverallLengthIN", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        "AH" => array("field" => "OverallLengthMm", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        "AI" => array("field" => "ValveSize1inFraction", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        "AJ" => array("field" => "ValveSizeMM", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "AK" => array("field" => "TubeODMM", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "AL" => array("field" => "TubeODInFract", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        "AM" => array("field" => "SkiveType", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        // master
//        "AN" => array("field" => "ElbowType", "brickKey" => "HydFittingsFert", "type" => "master", "brickType" => "fert","masterType" => "selectMaster"),
        "AN" => array("field" => "ElbowType", "brickKey" => "HydFittingsFert", "type" => "select", "brickType" => "fert","masterType" => "MultiselectMaster","isMaster" => true),

        "AO" => array("field" => "FlangeIDInFract", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        // data seems to be decimal as well as fractional
        // AO AP pointing to same location
//        "AP" => array("field" => "FlangeIDInFract", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        "AQ" => array("field" => "FlangeIDMM", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        "AR" => array("field" => "HoseID3InFract", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        "AS" => array("field" => "FittingSizeInFract", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        "AT" => array("field" => "OrificeTubeODInDecimal", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "AU" => array("field" => "OrificeTubeODMMDecimal", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "AV" => array("field" => "OrificeTubeLengthInDecimal", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "AW" => array("field" => "OrificeTubeLengthMMDecimal", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),

        "AX" => array("field" => "sapDescription", "brickKey" => null, "type" => "textarea", "brickType" => null),
        "AY" => array("field" => "ORingIdMM", "brickKey" => "AccessoriesFert", "type" => "numeric", "brickType" => "fert"),
        "AZ" => array("field" => "ORingIdInDec", "brickKey" => "AccessoriesFert", "type" => "numeric", "brickType" => "fert"),
        "BA" => array("field" => "ORingThicknessInDec", "brickKey" => "AccessoriesFert", "type" => "numeric", "brickType" => "fert"),
        "BB" => array("field" => "ORingThicknessMM", "brickKey" => "AccessoriesFert", "type" => "numeric", "brickType" => "fert"),
//        "BC" => to be ignored
    //   confusion in field name, mail and sheet contradicts
//        "BD" => array("field" => "ThreadSize1InDecimal", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
//        "BE" => array("field" => "OrificeTubeLengthMMDecimal", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "BF" => array("field" => "ValveStyle", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "BG" => array("field" => "ValveSizeInDec", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        // same field as in AJ
//        "BH" => array("field" => "ValveSizeMM", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"), // BJ is pointing to this same field
    ];


    const ACCESSORY_SHEET_COLUMN_MAP = [
        "A" => array("field" => "shortDescription", "brickKey" => null, "type" => "wysiwyg", "brickType" => null),
        "B" => array("field" => "BrandShortText1", "brickKey" => null, "type" => "input", "brickType" => null),
        "C" => array("field" => "descriptive", "brickKey" => "HoseSkeleton", "type" => "input", "brickType" => "skeleton"),
        "D" => array("field" => "industryStandard", "brickKey" => null, "type" => "input", "brickType" => null),
//        "E" => sapNumber
//        "F" => need to create this field
        "G" => array("field" => "FlatWidthIn", "brickKey" => "AccessoriesFert", "type" => "numeric", "brickType" => "fert"),
        "H" => array("field" => "DashSize", "brickKey" => "AccessoriesFert", "type" => "numeric", "brickType" => "fert"),
        // master
        "I" => array("field" => "MaterialType", "brickKey" => "AccessoriesFert", "type" => "multiselect", "brickType" => "fert","masterType" => "MultiselectMaster","isMaster" => true),
        "J" => array("field" => "Hardness", "brickKey" => "AccessoriesFert", "type" => "input", "brickType" => "fert"),
        "K" => array("field" => "minimumTemperatureF", "brickKey" => null, "type" => "numeric", "brickType" => null),
        "L" => array("field" => "maximumTemperatureF", "brickKey" => null, "type" => "numeric", "brickType" => null),
        "M" => array("field" => "minimumTemperatureC", "brickKey" => null, "type" => "numeric", "brickType" => null),
        "N" => array("field" => "maximumTemperatureC", "brickKey" => null, "type" => "numeric", "brickType" => null),
        "O" => array("field" => "PortHoleIDFract", "brickKey" => "AccessoriesFert", "type" => "input", "brickType" => "fert"),
        "P" => array("field" => "FlangePatternDimensionAInAndMMDecimal", "brickKey" => "AccessoriesFert", "type" => "input", "brickType" => "fert"),
        "Q" => array("field" => "FlangePatternDimensionBInAndMMDecimal", "brickKey" => "AccessoriesFert", "type" => "input", "brickType" => "fert"),
        "R" => array("field" => "workingPressureMPA", "brickKey" => "HoseSkeleton", "type" => "numeric", "brickType" => "skeleton"),
        "S" => array("field" => "RecommendedGrade8Bolt", "brickKey" => "AccessoriesFert", "type" => "input", "brickType" => "fert"),
    ];

    const BOOLEAN_FALSE_VALUES = ["No","no"];
    const BOOLEAN_TRUE_VALUES = ["Yes","yes"];

    const STATUS_PRODUCT_NOT_FOUND = "NOT FOUND";
    const STATUS_COMPLETED = "COMPLETED";
    const STATUS_PARTIALLY_COMPLETED = "PARTIALLY COMPLETED";
    const STATUS_FAILED = "FAILED";
    const MULTISELECT_COLUMN_VALUE_SEPARATOR = ",";

    private $multiselectMasterService;

    private $appService;

    private $recordImportErrors = array();

    private $currentImportColumn;

    public function __construct(MultiselectMasterService $multiselectMasterService, AppService $appService)
    {
        $this->multiselectMasterService = $multiselectMasterService;
        $this->appService = $appService;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('contitech:hydraulic_fitting_catalog_data_import');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $startTime = time();

        $reader = IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);
        $spreadsheet = $reader->load(self::DATA_FILE_PATH);

        foreach(self::IMPORT_SHEETS as $importSheetConfig){
            $this->importSheet($spreadsheet, $importSheetConfig);
        }

        $endTime = time();
        $timeSpent = $endTime - $startTime;
        $this->consoleLog("Time taken for execution ".$timeSpent."s");

        $this->consoleLog("Check import CSV log files at ".PIMCORE_LOG_DIRECTORY);
    }

    private function importSheet($spreadsheet, array $importSheetConfig)
    {
        $this->consoleLog("Starting import of  sheet number ".$importSheetConfig["SHEET_NUMBER"]."--------------------------------------------");
        $csvLogFilePath = PIMCORE_LOG_DIRECTORY."/".$importSheetConfig["LOG_FILE_NAME"].".csv";
        $csvLogFileHandle = fopen($csvLogFilePath,"w");
        $this->csvLog($csvLogFileHandle,array("Import Sheet Row Number","SAP Number","Status","Comment"));

        $worksheet = $spreadsheet->getSheet($importSheetConfig["SHEET_NUMBER"]);
        $highestRow = $worksheet->getHighestRow();

        for($i = $importSheetConfig["DATA_ROW_NUMBER"]; $i <= $highestRow; $i++){

            $sapNumberCord = $importSheetConfig["SAP_NUMBER_COLUMN"].(strval($i));
            $sapNumber = $worksheet->getCell($sapNumberCord)->getValue();
            $this->consoleLog("Importing sap ".$sapNumber.", row number ".strval($i));
            $product = Product::getByArticleNumber($sapNumber, 1);
            $parentSkeletonProduct = null;
            $importStatus = null;
            $this->recordImportErrors = array();

            if($product){
                $this->consoleLog("product id".$product->getId());
                $columnMapConstantName = "self::".$importSheetConfig["COLUMN_MAP"];
                $map = constant($columnMapConstantName);
                foreach($map as $sheetColumnCord => $mapConfig){
                    $this->setCurrentImportColumn($sheetColumnCord);

                    $cellCord = $sheetColumnCord.(strval($i));
                    $cellData = $worksheet->getCell($cellCord)->getValue();

                    try{
                        if(array_key_exists("brickKey",$mapConfig) && $mapConfig["brickKey"] != null){
                            $brickCollectionGetter = "get".ucfirst($mapConfig["brickType"]);
                            $brickGetter = "get".ucfirst($mapConfig["brickKey"]);

                            $productToUpdate = $this->resolveProductToUpdate($product, $mapConfig["brickType"], $parentSkeletonProduct);

                            $brickCollection = $productToUpdate->$brickCollectionGetter();
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
                    if($parentSkeletonProduct){
                        $parentSkeletonProduct->save();
                    }

                    $importStatus = count($this->recordImportErrors) > 0 ? self::STATUS_PARTIALLY_COMPLETED : self::STATUS_COMPLETED;

                }catch (\Exception $exception){
                    $importStatus = self::STATUS_FAILED;
                    $this->consoleLog($exception->getMessage(), "CRITICAL");
                    $this->recordImportErrors[] = $exception->getMessage();
                }
            }else{
                $importStatus = self::STATUS_PRODUCT_NOT_FOUND;
                $this->consoleLog("Product not found for sap ".$sapNumber.", row number ".strval($i));
                $this->recordImportErrors[] = "Product not found in pimcore for the sap number ".$sapNumber;
            }

            $this->csvLog($csvLogFileHandle, array($i, $sapNumber, $importStatus, implode("\n",$this->recordImportErrors)));

        }

        fclose($csvLogFileHandle);
    }

    /**
     * if product has a skeleton parent then return it
     * otherwise return the same product
     *
     * @param Product $product
     * @param string $brickType
     * @param Product|null $parentSkeletonProduct
     * @return Product
     */
    private function resolveProductToUpdate(Product $product,string $brickType, ?Product &$parentSkeletonProduct): Product
    {
        $returnValue = $product;

        if($brickType === "skeleton"){
            if($parentSkeletonProduct){
                $returnValue = $parentSkeletonProduct;
            }else{
                $parent = $product->getParent();
                if($parent->getType() !== "folder"){

                    $parentSkeletonProduct = $parent;
                    $returnValue = $parent;
                }
            }
        }elseif ($brickType === "base"){
            // handle the logic if needed according to the map config
        }

        return $returnValue;
    }

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

        }

        // to update the unit conversion attributes
        $this->appService->updateAttributeGroup($object, $mapConfig["field"], $cellData);
    }

    private function setNumericData($object,array $mapConfig, $cellData)
    {
        $fieldSetter = "set".ucfirst($mapConfig["field"]);

        if(is_numeric($cellData) || $cellData == null){
            $object->$fieldSetter($cellData);
        }else{
            $msg = "Column "."'".$this->getCurrentImportColumn()."'" ." is mapped to a numeric field in pimcore,";
            $msg .= " but non numeric data received. Skipping insert of this data (".$cellData.")" ;
            $this->recordImportErrors[] = $msg;

        }
    }

    private function setBooleanSelectData($object,array $mapConfig, $cellData)
    {
        $fieldSetter = "set".ucfirst($mapConfig["field"]);

        if(in_array($cellData,self::BOOLEAN_FALSE_VALUES)){
            $object->$fieldSetter(false);
        }elseif (in_array($cellData,self::BOOLEAN_TRUE_VALUES)){
            $object->$fieldSetter(true);
        }else{
            $msg = "Column "."'".$this->getCurrentImportColumn()."'" ." is mapped to a boolean field in pimcore,";
            $msg .= " but non boolean data received. Skipping insert of this data (".$cellData.")" ;
            $this->recordImportErrors[] = $msg;
        }
    }

    private function setStringData($object,array $mapConfig, $cellData)
    {
        $fieldSetter = "set".ucfirst($mapConfig["field"]);
        $object->$fieldSetter($cellData);
    }

    private function setMasterData($object,array $mapConfig, $cellData)
    {
        if($mapConfig["masterType"] == "MultiselectMaster"){
            $this->setMultiselectMaster($object,$mapConfig, $cellData);
        }

    }

    private function setMultiselectMaster($object,array $mapConfig, $cellData)
    {
        $brickKey = $mapConfig["brickKey"];
        $brickDef = DataObject\Objectbrick\Definition::getByKey($brickKey);
        $brickGroupName = $brickDef->getGroup();

        if($brickGroupName && $cellData){
            $fieldSetter = "set".ucfirst($mapConfig["field"]);

            if($mapConfig["type"] == "select"){
                $masterObject = $this->multiselectMasterService->getMasterObject($mapConfig["field"], $brickGroupName, $cellData);
                $masterObject->setName($cellData);
                $masterObject->save();
                $object->$fieldSetter($masterObject->getId());

            }elseif($mapConfig["type"] == "multiselect"){
                $values = explode(self::MULTISELECT_COLUMN_VALUE_SEPARATOR, $cellData);
                $masterIds = array();
                foreach($values as $value){
                    $masterObject = $this->multiselectMasterService->getMasterObject($mapConfig["field"], $brickGroupName, $value);
                    $masterObject->setName($value);
                    $masterObject->save();
                    $masterIds[] = $masterObject->getId();
                }
                $object->$fieldSetter($masterIds);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getCurrentImportColumn(): ?string
    {
        return $this->currentImportColumn;
    }

    /**
     * @param mixed $currentImportColumn
     */
    public function setCurrentImportColumn(string $currentImportColumn): void
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

    private function csvLog($logHandler,array $dataRow)
    {
        $csvDelimiter = $this->multiselectMasterService->getRequiredMultiselectMasterConfig("csv_delimiter");

        fputcsv($logHandler,$dataRow,$csvDelimiter);
    }
}
