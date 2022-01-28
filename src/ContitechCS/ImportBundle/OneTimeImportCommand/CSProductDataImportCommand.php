<?php

/**
 * File Path: Your File path on system
 * Command: cs:one-time-import:product-hierarchy-import <filePath>
 * Des: Product hierarchy data import script.
 */

namespace ContitechCS\ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Data\BlockElement;
use ContitechCS\ImportBundle\Services\ImportConstants;
use ContitechCS\ProductBundle\Services\ConfigProviderService;
use Pimcore\Logger;


class CSProductDataImportCommand extends AbstractCommand
{
    private $configProviderService;
    private $t;
    const LOG_FILE_NAME = "Product_Data_Import_command_log";
    protected function configure()
    {
        $this->setName('cs:one-time-import:product-data-import')
            ->setDescription('Product data import script')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ')
            ->addArgument('language', InputArgument::REQUIRED, 'Enter Language');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $languageArray = array('en', 'de', 'pt', 'es', 'fr', 'zh');
        $filePath = $input->getArgument('filePath');
        $language = strtolower($input->getArgument('language'));

        if (!in_array($language, $languageArray)) {
            echo "\n Invalid Argument: Use use atleast one language code, among 'en', 'de', 'pt', 'es', 'fr', 'zh' to import the data in that particular language. \n ";
            die;
        }

        $this->t = time();
        if (is_file($filePath)) {
            p_r('Script started at: ' . date('h:i:s', $this->t));
            p_r('------------------------------------------------');
            $this->import($filePath, $language);
            p_r('--------------Total Execution Time---------------');
            p_r('Script completed after: ' . (abs(time() - $this->t) / 60) . ' mnt');
        }
    }


    private function import($filePath, $language)
    {
        $this->db = \Pimcore\Db::get();
        $csvLogFilePath = PIMCORE_LOG_DIRECTORY . "/" . self::LOG_FILE_NAME . ".csv";
        $csvLogFileHandle = fopen($csvLogFilePath, "w");
        $this->csvLog($csvLogFileHandle, array(
            "Import Sheet Row Number",
            "Name",
            "Hierarchy",
            "Hierarchy Status",
            "Data Issue Column",
            "Incorrect Data",
            "Comment",
            "Extra attribute data given"
        ));

        try {
            $this->configProviderService = new ConfigProviderService();
            $productDataImportConfig = $this->configProviderService->getProductDataImportConfig();

            $unitValueConfig = $this->configProviderService->getUnitValueConfig();
            $results = $this->getCSVData($filePath);

            $data = $results['data'];

            // Get all region list from Region Masters
            $masterRegionArray = $this->getAllRegions();

            //$data = \array_slice($data, 0, 1);
            $removeSlashInProductName = [];

            $i = 1;
            foreach ($data as $key => $productData) {
                $i++;
                $extraAttrString = '';
                $productNameLog = '';
                $comment = '';
                $hierarchyStatus = '';
                $incorrectDataArray = [];
                $colNameArray = [];
                $productHierarchyArray = [];
                $productHierarchyArray = explode('/', $productData['Product Hierarchy']);
                $name = '';
                foreach ($productHierarchyArray as $eachHierarchyName) {
                    $name = $name . '/' . trim($eachHierarchyName);
                }
                $productHierarchy = "/" . ImportConstants::CONTITECH_CS_MASTERDATA_PRODUCT_HIERARCHY_FOLDER . $name;
                if ($productData['Product Flag'] == 0) {
                    $productHierarchy = $productHierarchy . '/' . trim($productData['Product Name']);
                }
                $productHierarchyPathObj = DataObject\CSHierarchy::getByPath($productHierarchy);
                if ($productHierarchyPathObj) {
                    $prodHierarchy = $productHierarchy;
                    $hierarchyStatus = 'Hierarchy Matched';

                    $allObjectBricks = [];

                    $parentId = DataObject\Service::createFolderByPath(ImportConstants::CONTITECH_CS_PRODUCT_FOLDER)->getId();   // createFolderByPath creates the folder assigned in the constant if not created and returns the path & if the folder is already present then returns the path of the folder.

                    $productHier = explode('/', $productData['Product Hierarchy']);

                    $productHier = array_filter($productHier);
                    $productHier = array_values($productHier);
                    $regionArray = $region = '';

                    if (($productData['Region'] != null) && ($productData['Product Flag'] == 1)) {
                        if (strpos($productData['Region'], '|') !== false) {
                            $regionArray = explode('|', $productData['Region']);
                        } else {
                            $regionArray = array($productData['Region']);
                        }

                        foreach ($regionArray as $regionName) {
                            if (in_array(trim($regionName), $masterRegionArray)) {
                                $region = $regionName;
                                if (strpos($region, "/") !== false) {
                                    $region = str_replace("/", "-", $region);
                                }
                                break;
                            }
                        }
                    }

                    $productName = trim($productData['Product Name']);
                    $productCol = trim($productData['Product']);

                    if ($productData['Product'] != null) {
                        $productNameCombined = $productName . '/' . $productCol;
                        $removeSlashInProductName[$productNameCombined] = $productName;
                        $productName = $productNameCombined;
                    }

                    $productHier[] = $productName;
                    $pName = '';
                    if ($productName != "") {
                        $pName = "/" . $productName;
                    }
                    $completeHierarchy = "/" . ImportConstants::CONTITECH_CS_PRODUCT_FOLDER . '/' . trim($productData['Product Hierarchy']) . $pName;

                    unset($productData['Product Hierarchy']);
                    unset($productData['Product Name']);
                    // // $productData = array_slice($productData, 2);
                    $parentHierarchyObj = $parentObjForLeaf = $pathWithoutRegion = '';
                    foreach ($productHier as $key => $hierarchy) {
                        $incorrectDataArray = [];
                        $colNameArray = [];
                        $hierarchyArr = array_slice($productHier, 0, $key + 1);

                        $func = function ($value) {
                            return DataObject\Service::getValidKey($value, "object");
                        };
                        $parentHierArr = $hierarchyArr = array_map($func, $hierarchyArr);
                        array_pop($parentHierArr);

                        $hierarchyString = implode('/', $hierarchyArr);
                        if ($parentHierArr) {
                            $parentHierNewString = implode('/', $parentHierArr);

                            $parentProductPath = "/" . ImportConstants::CONTITECH_CS_PRODUCT_FOLDER . '/' . $parentHierNewString;
                        }

                        $productPath = "/" . ImportConstants::CONTITECH_CS_PRODUCT_FOLDER . '/' . $hierarchyString;
                        $pathWithoutRegion = $productPath;
                        $hierarchyPath = \str_replace(ImportConstants::CONTITECH_CS_PRODUCT_FOLDER, ImportConstants::CONTITECH_CS_MASTERDATA_PRODUCT_HIERARCHY_FOLDER, $productPath);

                        $hierarchyPathObj = DataObject\CSHierarchy::getByPath($hierarchyPath);

                        if ($hierarchyPathObj) {
                            $parentObjForLeaf = $hierarchyPathObj;
                            if ($hierarchyPathObj->getLevel() != 'Level 1') {
                                $parentHierarchyObj = $hierarchyPathObj->getParent();
                            }

                            $CSHierarchyRelatedBricks = $hierarchyPathObj->getRelatedBricks();

                            if ($CSHierarchyRelatedBricks) {
                                $allObjectBricks = array_merge($allObjectBricks, $CSHierarchyRelatedBricks);
                                if (is_array($allObjectBricks) && !empty($allObjectBricks)) {
                                    $allObjectBricks = array_unique($allObjectBricks);
                                }
                            }
                        }
                        // Creating folder for each region
                        if (!empty($region)) {
                            $region = trim($region);
                            if (strpos($productName, "/") !== false) {
                                $productName = str_replace("/", "-", $productName);
                            }
                            if (strpos($productPath, $productName) !== false) {
                                $productPath = str_replace($productName, "", $productPath);

                                $regionPath = $productPath . $region;
                                $parentId = DataObject\Service::createFolderByPath($regionPath)->getId();
                                $productPath = $productPath . $region . "/" . $productName;
                            }

                            if (strpos($completeHierarchy, $productName) !== false) {
                                $completeHierarchy = str_replace($region . "/", "", $completeHierarchy);
                                $completeHierarchy = str_replace($productName, $region . "/" . $productName, $completeHierarchy);
                            }
                        }
                        $product = '';
                        $CSProductObj = DataObject\CSProducts::getByPath($productPath);
                        $productNameLog = $hierarchy;

                        if ($completeHierarchy == $productPath) {
                            $productNameLog = $hierarchy;

                            try {
                                if ($CSProductObj) {
                                    $product = $CSProductObj;
                                    $parentId = $product->getParentId();
                                } else {
                                    if (strpos($pathWithoutRegion, $productName) !== false) {
                                        $pathWithoutRegion = str_replace("/" . $productName, "", $pathWithoutRegion);
                                    }

                                    $query = "SELECT o_id from objects where concat(o_path,o_key) 
                                    LIKE '%$pathWithoutRegion%$productName' and o_type='object'";
                                    $result = $this->db->fetchCol($query);
                                    $count = count($result);
                                    if ($count > 0) {
                                        echo "\n Changing Region Folder";
                                        $product = DataObject\CSProducts::getById($result[0], true);
                                        $product->setParentId($parentId);
                                    } else {
                                        $product = new DataObject\CSProducts();
                                        $hierarchyKey = DataObject\Service::getValidKey($hierarchy, "object");
                                        $product->setKey($hierarchyKey);
                                        $product->setParentId($parentId);
                                    }
                                }

                                if (isset($removeSlashInProductName[$hierarchy])) {
                                    $product->setName($removeSlashInProductName[$hierarchy], $language);
                                } else {
                                    $product->setName($hierarchy, $language);
                                }
                                if ($hierarchyPathObj) {
                                    $product->setParentCategory([$parentHierarchyObj]);
                                } else {
                                    $product->setParentCategory([$parentObjForLeaf]);
                                }


                                $product->setOmitMandatoryCheck(true);
                                $product->setPublished(true);
                                $bricksData = [];
                                $natureOfProduct = 0;

                                foreach ($productData as $fieldCVSKey => $fieldValue) {
                                    $fieldCVSKey = trim($fieldCVSKey);

                                    if (isset($productDataImportConfig[$fieldCVSKey])) {
                                        $fieldConfig = $productDataImportConfig[$fieldCVSKey];
                                        $fieldName = ucfirst($fieldConfig['fieldName']);
                                        $blockName = ucfirst($fieldConfig['blockName']);
                                        if ($fieldConfig['objectType'] == 'class') {
                                            if (($fieldConfig['fieldType'] == 'manyToManyObjectRelation') && trim($fieldValue)) {

                                                $masterValueArray = explode("|", trim(ucwords($fieldValue)));

                                                $masterValueArray = array_map('trim', $masterValueArray);

                                                $masterObjects = array();

                                                foreach ($masterValueArray as $val) {
                                                    $masterObjects[] = $this->getRelationalObject($fieldConfig['className'], $fieldConfig['fieldNameToSearch'], $val, $fieldConfig['mandatoryFields'], $fieldConfig['createFlag']);
                                                }

                                                $method = 'set' . $fieldName;
                                                $product->$method($masterObjects, $language);
                                            } else if ($fieldConfig['fieldType'] == 'Multiselection') {
                                                $fieldValue = trim($fieldValue);
                                                $fieldValueArr = explode('|', $fieldValue);

                                                if ($fieldName == 'CSRegion') {
                                                    $regionValueArr = [];
                                                    foreach ($fieldValueArr as $eachRegion) {
                                                        $regionValue = trim($eachRegion);
                                                        if (strpos($regionValue, "/") !== false) {
                                                            $regionValue = str_replace("/", "-", $regionValue);
                                                        }
                                                        $regionPath = '/' . ImportConstants::CONTITECH_CS_MASTERDATA_REGION_FOLDER . '/' . $regionValue;
                                                        $regionPathObj = DataObject\CSRegion::getByPath($regionPath);
                                                        if ($regionPathObj) {
                                                            $regionPathObjId = $regionPathObj->getId();
                                                            $regionValueArr[] = $regionPathObjId;
                                                        }
                                                    }
                                                    $fieldValue = array_map('trim', $regionValueArr);
                                                } else if ($fieldName == 'CSSegment') {
                                                    $segmentValueArr = [];
                                                    foreach ($fieldValueArr as $eachSegment) {
                                                        $segmentValue = trim($eachSegment);
                                                        $segment = new \Pimcore\Model\DataObject\CSSegment\Listing();
                                                        $segment->setCondition('SegmentName = ?', $segmentValue);
                                                        foreach ($segment as $seg) {
                                                            $segmentValueArr[] = $seg->getId();
                                                        }
                                                    }
                                                    $fieldValue = array_map('trim', $segmentValueArr);
                                                } else {
                                                    $fieldValue = array_map('trim', $fieldValueArr);
                                                }
                                                $method = 'set' . $fieldName;
                                                $product->$method($fieldValue, $language);
                                            } else if ($fieldConfig['fieldType'] == 'Block' && $fieldConfig['objectType'] == 'class') {
                                                $fieldValue = trim($fieldValue);

                                                if (strpos($fieldValue, "\n") !== false) {
                                                    $fieldValueArr = explode("\n", $fieldValue);
                                                } else {
                                                    $fieldValueArr = explode('|', $fieldValue);
                                                }
                                                $fieldValue = array_map('trim', $fieldValueArr);

                                                $fieldValueBlock = array();
                                                if ($blockName == 'BenefitBlock') {
                                                    $method = 'set' . $blockName;
                                                    foreach ($fieldValue as $key => $val) {
                                                        $fieldValueBlock[] = [
                                                            "Benefit" => new BlockElement("Benefit", 'input', $val)
                                                        ];
                                                    }
                                                } else if ($blockName == 'FeatureBlock') {
                                                    $method = 'set' . $blockName;
                                                    foreach ($fieldValue as $key => $val) {
                                                        $fieldValueBlock[] = [
                                                            "Feature" => new BlockElement("Feature", 'input', $val)
                                                        ];
                                                    }
                                                }

                                                $product->$method($fieldValueBlock, $language);
                                            } else {
                                                if ($fieldName == 'NatureOfProduct') {
                                                    if ($fieldValue) {
                                                        $fieldValue = 'Final Product';
                                                        $natureOfProduct = 1;
                                                    } else {
                                                        $fieldValue = 'Product Group';
                                                    }
                                                }
                                                $method = 'set' . $fieldName;
                                                $product->$method($fieldValue, $language);
                                            }
                                        } else {
                                            $bricksData[$fieldConfig['objectType']][$fieldName]['fieldType'] = $fieldConfig['fieldType'];
                                            $bricksData[$fieldConfig['objectType']][$fieldName]['blockName'] = $fieldConfig['blockName'];
                                            $bricksData[$fieldConfig['objectType']][$fieldName]['fieldValue'] = $fieldValue;
                                            $configAttributeArray[] = $fieldValue;
                                        }
                                    }
                                }
                                if ($allObjectBricks) {
                                    $patternDataValue = '';
                                    foreach ($allObjectBricks as $brick) {
                                        if (isset($bricksData[$brick])) {
                                            $class = 'Pimcore\\Model\\DataObject\\Objectbrick\\Data\\' . $brick;
                                            $brickObject = new $class($product);
                                            foreach ($bricksData[$brick] as $fieldKey => $fieldData) {
                                                $fieldValue = trim($fieldData['fieldValue']);

                                                if (($fieldData['fieldType'] == 'Number') && $fieldValue && !is_numeric($fieldValue)) {
                                                    $colNameArray[] = $fieldKey;
                                                    $incorrectDataArray[] = $fieldValue;
                                                }

                                                $objectBrickFieldMethod = 'set' . $fieldKey;
                                                if (($fieldData['fieldType'] == 'Multiselection') && $fieldValue) {
                                                    if (strpos($fieldValue, "\n") !== false) {
                                                        $fieldValueArr = explode("\n", $fieldValue);
                                                    } else {
                                                        $fieldValueArr = explode('|', $fieldValue);
                                                    }
                                                    $fieldValue = array_map('trim', $fieldValueArr);
                                                    if ($fieldKey == 'BeltWidthmm' || $fieldKey == 'BeltWidth') {
                                                        $beltWidthArr = [];
                                                        foreach ($fieldValue as $eachBeltWidth) {
                                                            if (strpos($eachBeltWidth, "in") !== false && $eachBeltWidth != "Continuous") {
                                                                $eachBeltWidth = str_replace("in", "", $fieldValue);
                                                            }
                                                            if (strpos($eachBeltWidth, "-") !== false && $fieldKey == 'BeltWidthmm') {
                                                                $brickObject->setBeltWidthRangeMM($eachBeltWidth, $language);
                                                            } elseif (strpos($eachBeltWidth, "-") !== false && $fieldKey == 'BeltWidth') {
                                                                $brickObject->setBeltWidthRangeInch($eachBeltWidth, $language);
                                                            } else {
                                                                $AvailableBeltWidthPath = '/' . ImportConstants::CONTITECH_CS_MASTERDATA_AVAILABLEBELTWIDTH_FOLDER . '/' . $eachBeltWidth;
                                                                $AvailableBeltWidthPathObj = DataObject\CSAvailableBeltWidths::getByPath($AvailableBeltWidthPath);
                                                                if ($AvailableBeltWidthPathObj) {
                                                                    $AvailableBeltWidthPathObjId = $AvailableBeltWidthPathObj->getId();
                                                                    $beltWidthArr[] = $AvailableBeltWidthPathObjId;
                                                                }
                                                            }
                                                        }
                                                        $fieldValue = array_map('trim', $beltWidthArr);
                                                    }
                                                }

                                                if ($fieldData['fieldType'] == 'Block' && $fieldConfig['objectType'] != "class") {
                                                    $objectBrickFieldMethod = 'setAvailableBeltPatternWidthBlock';

                                                    if (strpos($fieldValue, "in") !== false && $fieldValue != "Continuous") {
                                                        $fieldValue = str_replace("in", "", $fieldValue);
                                                    }
                                                    if (strpos($fieldValue, ",-") !== false) {
                                                        $fieldValue = str_replace(",-", "", $fieldValue);
                                                    }
                                                    if (strpos($fieldValue, "\n") !== false) {
                                                        $fieldValueArr = explode("\n", $fieldValue);
                                                    } else {
                                                        $fieldValueArr = explode('|', $fieldValue);
                                                    }
                                                    $fieldValue = array_map('trim', $fieldValueArr);

                                                    $beltWidthBlockData = array();

                                                    if ($fieldData['blockName'] == 'PatternWidthBlock') {
                                                        $patternDataValue = $fieldValue;
                                                    }
                                                    if ($fieldData['blockName'] == 'BeltWidthBlock' && (!empty($fieldValue))) {
                                                        $i = 0;
                                                        foreach ($fieldValue as $key => $val) {
                                                            if (strpos($val, "-") !== false && $fieldKey == 'AvailableBeltWidthInch') {
                                                                $brickObject->setAvailableBeltWidthRangeInch($val, $language);
                                                            }
                                                            $beltWidthObj = DataObject\CSAvailableBeltWidths::getByAvailableBeltWidthInch($val, 1);
                                                            if ($beltWidthObj) {
                                                                $beltWidthObjId = $beltWidthObj->getId();
                                                            }
                                                            $pVal = '';
                                                            if ($patternDataValue) {
                                                                if (preg_match("/^[a-zA-Z ]+/", $patternDataValue[0])) {
                                                                    $pVal = $patternDataValue[0];
                                                                } else {
                                                                    $pVal = $patternDataValue[$i++];
                                                                }
                                                                $idArray = array();
                                                                $valArray = explode(",", $pVal);
                                                                foreach ($valArray as $value) {
                                                                    $AvailablePatternWidthPath = '/' . ImportConstants::CONTITECH_CS_MASTERDATA_AVAILABLEPATTERNWIDTH_FOLDER . '/' . trim($value);
                                                                    $AvailablePatternWidthPathObj = DataObject\CSAvailablePatternWidths::getByPath($AvailablePatternWidthPath);
                                                                    if ($AvailablePatternWidthPathObj) {
                                                                        $idArray[] = $AvailablePatternWidthPathObj->getId();
                                                                    }
                                                                }
                                                                $beltWidthBlockData[] = [
                                                                    "availableBeltWidthInch" => new BlockElement("availableBeltWidthInch", 'select', $beltWidthObjId),
                                                                    "availablePatternWidthInch" => new BlockElement("availablePatternWidthInch", 'multiselect', $idArray)
                                                                ];
                                                                if ($beltWidthBlockData) {
                                                                    $brickObject->$objectBrickFieldMethod($beltWidthBlockData, $language);
                                                                }
                                                            }
                                                        }
                                                        $beltWidthBlockData = [];
                                                        $beltWidthObjId = '';
                                                        $idArray = [];
                                                    }
                                                } else {
                                                    $brickObject->$objectBrickFieldMethod($fieldValue, $language);
                                                }
                                            }

                                            foreach ($unitValueConfig as $unit => $unitValue) {

                                                $fieldKey = ucfirst($unitValue['fieldName']);
                                                $objectBrickFieldMethod = 'set' . $fieldKey;

                                                if ($unitValue['objectType'] == $brick) {
                                                    $brickObject->$objectBrickFieldMethod($unitValue['fieldValue']);
                                                } else {
                                                    continue;
                                                }
                                            }
                                            $brickObject->setFieldname('ProductAttributes');
                                            $method = 'set' . $brick;
                                            $product->getProductAttributes()->$method($brickObject, $language);
                                            if ($natureOfProduct == 1) {
                                                unset($bricksData[$brick]);
                                            }
                                        }

                                        $method = 'set' . $brick;
                                    }
                                    $extraAttrString = '';
                                    if ($natureOfProduct == 1) {
                                        foreach ($bricksData as $extraBricks) {
                                            foreach ($extraBricks as $b => $v) {
                                                if (!empty($v['fieldValue'])) {
                                                    $extraAttrString = $b . ", " . $extraAttrString;
                                                }
                                            }
                                        }
                                    }
                                }
                                $result = $product->save();
                                $parentId = $result->getId();
                                $prd = DataObject\CSProducts::getById($parentId, true);
                                $prd->save();
                                echo "\n" . '---------------------------';
                                echo "\n" . "Product added successfully";
                                echo "\n Hierarchy created: " . $productPath;
                                $comment = "Product added successfully";
                                echo "\n Product asset folder creation started.";
                                \Pimcore::getContainer()->get('ContitechCS\ProductBundle\Services\AppService')->createAssetsHierarch($prd);
                                echo "\n Product asset folder creation Done.";
                                echo "\n";
                            } catch (\Throwable $th) {
                                p_r($th->getMessage());
                                //p_r($th->getTraceAsString());
                            }
                        } else {
                            $parentId = $CSProductObj->getId();
                        }
                    }
                } else {
                    $prodHierarchy = $productHierarchy;
                    $hierarchyStatus = 'Hierarchy Mismatched';
                    $comment = 'Product Not Saved';
                    $productNameLog = $productData['Product Name'];
                    if ($productData['Product Hierarchy'] == null) {
                        $productNameLog = 'Empty Row';
                    }
                    echo "\n" . '---------------------------';
                    echo "\n" . $comment;
                    echo "\n" . $hierarchyStatus;
                    echo "\n" . $prodHierarchy;
                }
                $incorrectData = implode(", ", $incorrectDataArray);
                $colName = implode(", ", $colNameArray);
                if ($productNameLog == null) {
                    $pieces = explode('/', $prodHierarchy);
                    $productNameLog = array_pop($pieces);
                    if ($productNameLog == '') {
                        $productNameLog = array_pop($pieces);
                    }
                }
                $this->csvLog($csvLogFileHandle, array(
                    $i,
                    $productNameLog,
                    $prodHierarchy,
                    $hierarchyStatus,
                    $colName,
                    $incorrectData,
                    $comment,
                    $extraAttrString
                ));
            }
            fclose($csvLogFileHandle);
        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }
    }

    public function getAllRegions()
    {
        $regionList = new \Pimcore\Model\DataObject\CSRegion\Listing();
        $regionList->load();

        $fieldArray = array();
        foreach ($regionList as $list) {
            $fieldArray[] = $list->getRegionName();
        }
        return $fieldArray;
    }

    public function createHierarchy($result, $brick, $parentId)
    {
        $hierarchy = '';
        foreach ($result as $key => $value) {
            $hierarchyName = $value;
            $level = $key;
            $hierarchy = $hierarchy . '/' . $hierarchyName;
            if (!empty($hierarchyName)) {
                $hierarchyNamePath = "/" . ImportConstants::CONTITECH_CS_MASTERDATA_PRODUCT_HIERARCHY_FOLDER . "/" . $hierarchy;
                $CSHierarchyObj = DataObject\CSHierarchy::getByPath($hierarchyNamePath);
                if (!$CSHierarchyObj) {
                    $obj = new DataObject\CSHierarchy();
                    $obj->setKey($hierarchyName);
                    $obj->setName($hierarchyName);
                    $obj->setLevel($level);
                    $obj->setRelatedBricks([$brick]);
                    $obj->setParentId($parentId);
                    $obj->setPublished(true);
                    $output = $obj->save();

                    $parentId = $output->getId();
                } else {
                    $parentId = $CSHierarchyObj->getId();
                }
            }
        }
    }

    /**
     * return object or false
     */
    public function getRelationalObject($className, $fieldNameToSearch, $searchString, $mandatoryFields, $createFlag = false)
    {
        $searchString = trim($searchString);
        $className = trim($className);

        if ($createFlag) {
            $mandatoryFields = trim($mandatoryFields);
            $validKey = DataObject\Service::getValidKey($searchString, "object");
            $constant = ImportConstants::getDynamicConstant($className);

            $parentId = DataObject\Service::createFolderByPath($constant)->getId();

            $class = "Pimcore\\Model\\DataObject\\{$className}";
            $object = $class::getByPath("/" . $constant . "/" . $validKey);
            if (!$object) {
                try {

                    $object = new $class();
                    $object->setKey($validKey);

                    if ($mandatoryFields) {
                        $mandatoryFieldsArr = explode('|', $mandatoryFields);
                        $masterValueArray = array_map('trim', $mandatoryFieldsArr);

                        foreach ($masterValueArray as $fieldName) {
                            $method = 'set' . $fieldName;
                            $object->$method($searchString);
                        }
                    }

                    $object->setParentId($parentId);
                    $object->setOmitMandatoryCheck(true);
                    $object->setPublished(TRUE);
                    $object->save();
                } catch (\Throwable $th) {
                    p_r($th->getMessage());
                }
            }
        } else {
            $class = "Pimcore\\Model\\DataObject\\{$className}\\Listing";

            $objectlist = new $class;
            $objectlist->setCondition("$fieldNameToSearch = ?", $searchString);
            $objectlist->setLimit(1);
            $objectlist->load();

            foreach ($objectlist as $object) {
                return $object;
            }

            return false;
        }
        return $object;
    }
    public function getCSVData($fileName)
    {
        try {

            $csvFilePath = $fileName;
            $firstRowData = array();
            if (empty($csvFilePath)) {
                return $firstRowData;
            }

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
                    }
                    $count++;
                }
                fclose($handle);
            }
            return array(
                'header'    =>  $firstRowData,
                'data'      =>  $data
            );
        } catch (\Exception $e) {
            return array(
                'error' => $e->getMessage()
            );
        }
    }

    /**
     * @param $logHandler
     * @param array $dataRow
     */
    private function csvLog($logHandler, array $dataRow)
    {
        $csvDelimiter = ",";

        fputcsv($logHandler, $dataRow, $csvDelimiter);
    }
}
