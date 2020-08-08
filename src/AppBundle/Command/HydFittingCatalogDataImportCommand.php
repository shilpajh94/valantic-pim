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

    const CREATE_MASTER_IF_NOT_EXIST = true;
    /**
     * file path to import
     */
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

    /**
     * mapping for hydraulics catalog sheet in file
     */
    const HYD_CATALOG_SHEET_COLUMN_MAP = [
        "C" => array("field" => "brandName", "brickKey" => null, "type" => "select", "brickType" => null,"masterType" => "Brand","isMaster" => true),

        "D" => array("field" => "CatalogDescription", "brickKey" => "HydFittingsFert", "type" => "textarea", "brickType" => "fert"),
        "E" => array("field" => "shortDescription", "brickKey" => null, "type" => "wysiwyg", "brickType" => null),
        "F" => array("customLogic" => true, "customLogicFn" => "dualGripUnitCrimpSetter"),
        "G" => array("field" => "DescriptivePartNumber", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        "H" => array("field" => "CrimpNutYN", "brickKey" => "HydFittingsFert", "type" => "booleanSelect", "brickType" => "fert"),
        "I" => array("field" => "ThrustWireNut", "brickKey" => "HydFittingsFert", "type" => "booleanSelect", "brickType" => "fert"),
        "J" => array("field" => "DualSeatYN", "brickKey" => "HydFittingsFert", "type" => "booleanSelect", "brickType" => "fert"),
//        "K" => need to find the mapped column
        "K" => array("field" => "NumberOfHex", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        "L" => array("field" => "ActivantNumber", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
//        "M" => sap number
        "N" => array("field" => "HoseID1InFract", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        "O" => array("field" => "HoseID1MM", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "P" => array("field" => "FerruleIDInDec", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        // will get value from unit conversion
//        "Q" => array("field" => "FerruleIDMM", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "R" => array("field" => "FerruleODInDec", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        // will get value from unit conversion
//        "S" => array("field" => "FerruleODMM", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "T" => array("field" => "FerruleLengthInDec", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        // will get value from unit conversion
//        "U" => array("field" => "FerruleLengthMM", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "V" => array("field" => "ThreadSize1InMMDecimal", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        "W"  => array("field" => "ThreadSize2InMMDecimal", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        "X" => array("field" => "Hex1WrenchSizeIN", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        // will get value from unit conversion
//        "Y" => array("field" => "Hex1WrenchSizeMM", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "Z" => array("field" => "Hex2WrenchSizeIN", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        // will get value from unit conversion
//        "AA" => array("field" => "Hex2WrenchSizeMM", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "AB" => array("field" => "SocketWrenchSizeInFract", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        "AC" => array("field" => "DropLengthIN", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        // will get value from unit conversion
//        "AD" => array("field" => "DropLengthMM", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "AE" => array("field" => "CutOffLengthIN", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        // will get value from unit conversion
//        "AF" => array("field" => "CutOffLengthMM", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        "AG" => array("field" => "OverallLengthIN", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        // will get value from unit conversion
//        "AH" => array("field" => "OverallLengthMm", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        "AI" => array("field" => "ValveSize1inFraction", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        // will get value from unit conversion
//        "AJ" => array("field" => "ValveSizeMM", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "AK" => array("field" => "TubeODMM", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "AL" => array("field" => "TubeODInFract", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        "AM" => array("field" => "SkiveType", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        // master
//        "AN" => array("field" => "ElbowType", "brickKey" => "HydFittingsFert", "type" => "master", "brickType" => "fert","masterType" => "selectMaster"),
        "AN" => array("field" => "ElbowType", "brickKey" => "HydFittingsFert", "type" => "select", "brickType" => "fert","masterType" => "MultiselectMaster","isMaster" => true),

        "AO" => array("field" => "FlangeIDInFract", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        "AP" => array("field" => "FlangeODInDec", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        // will get value from unit conversion
//        "AQ" => array("field" => "FlangeODMM", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        "AR" => array("field" => "HoseID3InFract", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        "AS" => array("field" => "FittingSizeInFract", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        "AT" => array("field" => "OrificeTubeODInDecimal", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        // will get value from unit conversion
//        "AU" => array("field" => "OrificeTubeODMMDecimal", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "AV" => array("field" => "OrificeTubeLengthInDecimal", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        // will get value from unit conversion
//        "AW" => array("field" => "OrificeTubeLengthMMDecimal", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),

        "AX" => array("field" => "sapDescription", "brickKey" => null, "type" => "textarea", "brickType" => null),
        "AY" => array("field" => "ORingIdMM", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        // will get value from unit conversion
//        "AZ" => array("field" => "ORingIdInDec", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "BA" => array("field" => "ORingThicknessInDec", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        // will get value from unit conversion
//        "BB" => array("field" => "ORingThicknessMM", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "BC" => array("field" => "HydFittingId", "brickKey" => "HydFittingsFert", "type" => "input", "brickType" => "fert"),
        "BD" => array("field" => "ThreadSize1InMMDecimal", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "BE" => array("field" => "ThreadSize2InMMDecimal", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "BF" => array("field" => "ValveStyle", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        "BG" => array("field" => "ValveSizeInDec", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"),
        // same field as in AJ
//        "BH" => array("field" => "ValveSizeMM", "brickKey" => "HydFittingsFert", "type" => "numeric", "brickType" => "fert"), // BJ is pointing to this same field
    ];

    /**
     * mapping for accessories sheet in file
     */
    const ACCESSORY_SHEET_COLUMN_MAP = [
//        "A" => array("field" => "shortDescription", "brickKey" => null, "type" => "wysiwyg", "brickType" => null),
        "B" => array("field" => "BrandShortText1", "brickKey" => null, "type" => "input", "brickType" => null),
        "C" => array("field" => "descriptive", "brickKey" => "HoseSkeleton", "type" => "input", "brickType" => "skeleton"),
        "D" => array("field" => "industryStandard", "brickKey" => null, "type" => "input", "brickType" => null),
//        "E" => sapNumber
        "F" => array("field" => "AccessoryId", "brickKey" => "AccessoriesFert", "type" => "input", "brickType" => "fert"),
        "G" => array("field" => "FlatWidthIn", "brickKey" => "AccessoriesFert", "type" => "numeric", "brickType" => "fert"),
        "H" => array("field" => "DashSize", "brickKey" => "AccessoriesFert", "type" => "numeric", "brickType" => "fert"),
        // master
        "I" => array("field" => "MaterialType", "brickKey" => "AccessoriesFert", "type" => "multiselect", "brickType" => "fert","masterType" => "MultiselectMaster","isMaster" => true),
        "J" => array("field" => "Hardness", "brickKey" => "AccessoriesFert", "type" => "input", "brickType" => "fert"),
        "K" => array("field" => "minimumTemperatureF", "brickKey" => null, "type" => "numeric", "brickType" => null),
        "L" => array("field" => "maximumTemperatureF", "brickKey" => null, "type" => "numeric", "brickType" => null),
        // will get value from unit conversion
//        "M" => array("field" => "minimumTemperatureC", "brickKey" => null, "type" => "numeric", "brickType" => null),
//        "N" => array("field" => "maximumTemperatureC", "brickKey" => null, "type" => "numeric", "brickType" => null),
        "O" => array("field" => "PortHoleIDFract", "brickKey" => "AccessoriesFert", "type" => "input", "brickType" => "fert"),
        "P" => array("field" => "FlangePatternDimensionAInAndMMDecimal", "brickKey" => "AccessoriesFert", "type" => "input", "brickType" => "fert"),
        "Q" => array("field" => "FlangePatternDimensionBInAndMMDecimal", "brickKey" => "AccessoriesFert", "type" => "input", "brickType" => "fert"),
        "R" => array("field" => "workingPressureMPA", "brickKey" => "HoseSkeleton", "type" => "numeric", "brickType" => "skeleton"),
        "S" => array("field" => "RecommendedGrade8Bolt", "brickKey" => "AccessoriesFert", "type" => "input", "brickType" => "fert"),
    ];

    const BRAND_FOLDER_PATH = "/Master List/Brands";

    /**
     * boolean values to be considered
     */
    const BOOLEAN_FALSE_VALUES = ["No","no"];
    const BOOLEAN_TRUE_VALUES = ["Yes","yes"];

    /**
     * script statuses
     */
    const STATUS_PRODUCT_NOT_FOUND = "NOT FOUND";
    const STATUS_COMPLETED = "COMPLETED";
    const STATUS_PARTIALLY_COMPLETED = "PARTIALLY COMPLETED";
    const STATUS_FAILED = "FAILED";
    const STATUS_NOT_INH_HYD_HOSE = "NOT INH HYD HOSE";

    /**
     * separator for multiselect values
     */
    const MULTISELECT_COLUMN_VALUE_SEPARATOR = ",";

    /**
     * @var MultiselectMasterService
     */
    private $multiselectMasterService;

    /**
     * @var AppService
     */
    private $appService;

    /**
     * @var array
     */
    private $recordImportErrors = array();

    private $comments = array();

    /**
     * @var
     */
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

    /**
     * @param $spreadsheet
     * @param array $importSheetConfig
     */
    private function importSheet($spreadsheet, array $importSheetConfig)
    {
        $this->consoleLog("Starting import of  sheet number ".$importSheetConfig["SHEET_NUMBER"]."--------------------------------------------");
        $csvLogFilePath = PIMCORE_LOG_DIRECTORY."/".$importSheetConfig["LOG_FILE_NAME"].".csv";
        $csvLogFileHandle = fopen($csvLogFilePath,"w");
        $this->csvLog($csvLogFileHandle,array("Import Sheet Row Number","SAP Number","Status","Comment"));

        $statusCountArray = [
            self::STATUS_PRODUCT_NOT_FOUND => 0,
            self::STATUS_COMPLETED => 0,
            self::STATUS_PARTIALLY_COMPLETED => 0,
            self::STATUS_FAILED => 0,
            self::STATUS_NOT_INH_HYD_HOSE => 0
        ];

        $worksheet = $spreadsheet->getSheet($importSheetConfig["SHEET_NUMBER"]);
        $highestRow = $worksheet->getHighestRow();
        $recordsCount = 0;
        for($i = $importSheetConfig["DATA_ROW_NUMBER"]; $i <= $highestRow; $i++){
            $recordsCount++;
            $sapNumberCord = $importSheetConfig["SAP_NUMBER_COLUMN"].(strval($i));
            $sapNumber = $worksheet->getCell($sapNumberCord)->getValue();
//            $this->consoleLog("Importing sap ".$sapNumber.", row number ".strval($i));
            $product = Product::getByArticleNumber($sapNumber, 1);
            $parentSkeletonProduct = null;
            $importStatus = null;
            $this->recordImportErrors = array();
            $this->comments = array();

            if($product){
                $this->consoleLog("product id".$product->getId());

                $brickCollection = $product->getFert();
//                if(!$brickCollection->getHoseFert() ){
//                    $importStatus = self::STATUS_NOT_INH_HYD_HOSE;
//                    $msg = "SAP Number: " . $sapNumber . ", Row Number ".strval($i) . " [" .$importStatus."]";
//                    $this->consoleLog($msg);
//
//                    $err = "product does not belong to 'INH_HYD_HOSE', not importing this product.";
//                    $this->consoleLog($err);
//                    $this->recordImportErrors[] = $err;
//                    $this->csvLog($csvLogFileHandle, array($i, $sapNumber, $importStatus, implode("\n",$this->recordImportErrors)));
//                    $statusCountArray[$importStatus]++;
//                    continue;
//                }

                $columnMapConstantName = "self::".$importSheetConfig["COLUMN_MAP"];
                $map = constant($columnMapConstantName);
                foreach($map as $sheetColumnCord => $mapConfig){
                    $this->setCurrentImportColumn($sheetColumnCord);

                    $cellCord = $sheetColumnCord.(strval($i));
                    $cellData = $worksheet->getCell($cellCord)->getValue();

                    if( array_key_exists("customLogic", $mapConfig) && $mapConfig["customLogic"] == true){
                        $fnName = $mapConfig["customLogicFn"];
                        $this->$fnName($product, $cellData);
                        continue;
                    }

                    try{
                        if(array_key_exists("brickKey",$mapConfig) && $mapConfig["brickKey"] != null){
                            $brickCollectionGetter = "get".ucfirst($mapConfig["brickType"]);
                            $brickGetter = "get".ucfirst($mapConfig["brickKey"]);

                            $productToUpdate = $this->resolveProductToUpdate($product, $mapConfig["brickType"], $parentSkeletonProduct);

                            $brickCollection = $productToUpdate->$brickCollectionGetter();
                            if($brickCollection && ( $brick = $brickCollection->$brickGetter())  ){

                                $this->setObjectData($brick, $mapConfig, $cellData);

                            }else{
                                $this->recordImportErrors[] = "( Column '".$sheetColumnCord."' ) Brick '". $mapConfig["brickKey"] . "' is not attached to the product, so can not insert data in " . $mapConfig["field"] . " field";
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
//                $this->consoleLog("Product not found for sap ".$sapNumber.", row number ".strval($i));
                $this->recordImportErrors[] = "Product not found in pimcore for the sap number ".$sapNumber;
            }

            $statusCountArray[$importStatus]++;

            $msg = "SAP Number: " . $sapNumber . ", Row Number ".strval($i) . " [" .$importStatus."]";
            $this->consoleLog($msg);
            $this->comments = array_merge($this->comments, $this->recordImportErrors);
            $this->csvLog($csvLogFileHandle, array($i, $sapNumber, $importStatus, implode("\n",$this->comments)));

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

    /**
     * to handle HYD_CATALOG_SHEET_COLUMN_MAP['F'] index
     *
     * @param Product $product
     * @param $cellData
     */
    private function dualGripUnitCrimpSetter(Product $product, $cellData){

        $brickCollection = $product->getFert();
        if($brickCollection && ($brick = $brickCollection->getHydFittingsFert()) ){
            if($cellData){

                if($cellData == "Dual-Grip"){
                    $brick->setDualGripStyle(true);
                    $brick->setUniCrimpStyle(false);
                }elseif($cellData == "Uni-Crimp"){
                    $brick->setDualGripStyle(false);
                    $brick->setUniCrimpStyle(true);
                }
            }else{
                $brick->setUniCrimpStyle(null);
                $brick->setDualGripStyle(null);
            }
        }
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
            $msg = "Column "."'".$this->getCurrentImportColumn()."'" ." is mapped to a numeric field in pimcore (".$mapConfig["field"].") ,";
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
     * @throws \Exception
     */
    private function setMultiselectMaster($object,array $mapConfig, $cellData)
    {
        $brickKey = $mapConfig["brickKey"];
        $brickDef = DataObject\Objectbrick\Definition::getByKey($brickKey);
        $brickGroupName = $brickDef->getGroup();

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
                    $masterObject->setName($cellData);
                    $masterObject->save();
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
                        $masterObject = $this->multiselectMasterService->getMasterObject($mapConfig["field"], $brickGroupName, $cellData, true);
                        $msg = "( Column "."'".$this->getCurrentImportColumn()."'" ." ) Master '".$cellData."' for attribute '".$mapConfig["field"]."' does not exist in pimcore.Creating this master.";
                        $this->comments[] = $msg;
                    }
                    if($masterObject){
                        $masterObject->setName($value);
                        $masterObject->save();
                        $masterIds[] = $masterObject->getId();
                    }else{
                        $msg = "( Column "."'".$this->getCurrentImportColumn()."'" ." ) Master '".$cellData."' for attribute '".$mapConfig["field"]."' does not exist in pimcore.Skipping this data.";
                        $this->recordImportErrors[] = $msg;
                    }

                }
                $valueToSet = $masterIds;
            }
        }
        $object->$fieldSetter($valueToSet);
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

    /**
     * @param $logHandler
     * @param array $dataRow
     */
    private function csvLog($logHandler,array $dataRow)
    {
        $csvDelimiter = $this->multiselectMasterService->getRequiredMultiselectMasterConfig("csv_delimiter");

        fputcsv($logHandler,$dataRow,$csvDelimiter);
    }
}
