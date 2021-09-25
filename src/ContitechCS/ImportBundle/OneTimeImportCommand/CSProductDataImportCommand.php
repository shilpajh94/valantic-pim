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
            ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = $input->getArgument('filePath');

        $this->t = time();
        if (is_file($filePath)) {
            p_r('Script started at: ' . date('h:i:s', $this->t));
            p_r('------------------------------------------------');
            $this->import($filePath);
            p_r('--------------Total Execution Time---------------');
            p_r('Script completed after: ' . (abs(time() - $this->t) / 60) . ' mnt');
        }
    }


    private function import($filePath)
    {

        $csvLogFilePath = PIMCORE_LOG_DIRECTORY . "/" . self::LOG_FILE_NAME . ".csv";
        $csvLogFileHandle = fopen($csvLogFilePath, "w");
        $this->csvLog($csvLogFileHandle, array(
            "Import Sheet Row Number",
            "Name",
            "Comment",
            "Missing Column Name"
        ));

        try {
            $this->configProviderService = new ConfigProviderService();
            $productDataImportConfig = $this->configProviderService->getProductDataImportConfig();
            $unitValueConfig = $this->configProviderService->getUnitValueConfig();
            $CSApplications = $this->getCSApplications();
            $CSRelatedProducts = $this->getCSRelatedProducts();
            $CSFeaturesAndBenefits = $this->getCSFeaturesAndBenefits();
            $CSProductIndustries = $this->getCSProductIndustries();
            $results = $this->getCSVData($filePath);

            $data = $results['data'];
            $i = 0;
            foreach ($data as $key => $productData) {
                $missingColName = '';

                $i++;

                $failedProducts = [];

                $allObjectBricks = [];

                $parentId = DataObject\Service::createFolderByPath(ImportConstants::CONTITECH_CS_PRODUCT_FOLDER)->getId();   // createFolderByPath creates the folder assigned in the constant if not created and returns the path & if the folder is already present then returns the path of the folder.

                $productHier = explode('/', $productData['Product Hierarchy']);

                $productHier = array_filter($productHier);
                $productHier = array_values($productHier);

                if($productData['Product'] != null){
                    $productName = $productData['Product Name'].'-'.$productData['Product'];
                }
                else{
                    $productName = $productData['Product Name'];
                }
                

                $productHier[] = $productName;
                $productData = array_slice($productData, 2);
                foreach ($productHier as $key => $hierarchy) {

                    $hierarchyArr = array_slice($productHier, 0, $key + 1);

                    $func = function ($value) {
                        return DataObject\Service::getValidKey($value, "obejct");;
                    };
                    $hierarchyArr = array_map($func, $hierarchyArr);

                    $hierarchyString = implode('/', $hierarchyArr);

                    echo "\n" . $productPath = "/" . ImportConstants::CONTITECH_CS_PRODUCT_FOLDER . '/' . $hierarchyString;

                    $hierarchyPath = \str_replace(ImportConstants::CONTITECH_CS_PRODUCT_FOLDER, ImportConstants::CONTITECH_CS_MASTERDATA_PRODUCT_HIERARCHY_FOLDER, $productPath);

                    $hierarchyPathObj = DataObject\CSHierarchy::getByPath($hierarchyPath);

                    $str = $hierarchyPath;
                    $parentPath =  substr($str, 0,strrpos($str, '/')); 
                    $parentPathObj = DataObject\CSHierarchy::getByPath( $parentPath);

                    if ($hierarchyPathObj) {
                        $CSHierarchyRelatedBricks = $hierarchyPathObj->getRelatedBricks();
                        if ($CSHierarchyRelatedBricks) {
                            $allObjectBricks = array_merge($allObjectBricks, $CSHierarchyRelatedBricks);
                            $allObjectBricks = array_unique($allObjectBricks);
                        }
                    }

                    $CSProductObj = DataObject\CSProducts::getByPath($productPath);

                    if (!$CSProductObj) {

                        try {
                            $hierarchyKey = DataObject\Service::getValidKey($hierarchy, "obejct");
                            $product = new DataObject\CSProducts();
                            $product->setKey($hierarchyKey);
                            $product->setName($hierarchy, 'en');
                            $product->setParentCategory([$parentPathObj]);
                            $product->setParentId($parentId);
                            $product->setOmitMandatoryCheck(true);
                            $product->setPublished(true);
                            $bricksData = [];
                            foreach ($productData as $fieldCVSKey => $fieldValue) {
                                if (isset($productDataImportConfig[$fieldCVSKey])) {
                                    $fieldConfig = $productDataImportConfig[$fieldCVSKey];
                                    $fieldName = ucfirst($fieldConfig['fieldName']);
                                    if ($fieldConfig['objectType'] == 'class') {
                                        if($fieldConfig['fieldType'] == 'manyToManyObjectRelation'){
                                            if($fieldConfig['fieldName'] == "CSProductApplications"){
                                                if (strpos($fieldValue, '|') !== false) {
                                                    $fv = explode("|",$fieldValue);
                                                    if(count($fv) > 0){
                                                        $csapplication_array = array();
                                                        foreach($fv AS $app){
                                                            $app = trim($app);
                                                            $v = strtolower(trim($app));
                                                            if(isset($CSApplications[$v])){
                                                                $csApplicationsData = new \Pimcore\Model\DataObject\CSApplications();
                                                                $csApplicationsData->setId($CSApplications[$v]['id']);
                                                                $csApplicationsData->setApplicationCode($CSApplications[$v]['code']);
                                                                $csApplicationsData->setApplicationName($CSApplications[$v]['name']);
                                                                $csapplication_array[] = $csApplicationsData;
                                                            }else{
                                                                $appParentId = DataObject\Service::createFolderByPath(ImportConstants::CONTITECH_CS_MASTERDATA_FOLDER."/Applications")->getId();
                                                                $csApplicationsData = new \Pimcore\Model\DataObject\CSApplications();
                                                                $csApplicationsData->setKey($app);
                                                                $csApplicationsData->setApplicationCode($app);
                                                                $csApplicationsData->setApplicationName($app);
                                                                $csApplicationsData->setParentId($appParentId);
                                                                $csApplicationsData->setPublished(true);
                                                                $csApplicationsData->save();
                                                                $csapplication_array[] = $csApplicationsData;
                                                                if($csApplicationsData){
                                                                    $fieldArrayTemp = array();
                                                                    $fieldArrayTemp['id'] = $csApplicationsData->getId();
                                                                    $fieldArrayTemp['code'] = $csApplicationsData->getApplicationCode();
                                                                    $fieldArrayTemp['name'] = $csApplicationsData->getApplicationName();
                                                                    $CSApplications[strtolower($csApplicationsData->getApplicationName())] = $fieldArrayTemp;
                                                                }
                                                            }
                                                        }
                                                        if(count($csapplication_array) > 0){
                                                            $method = 'set' . $fieldName;
                                                            $product->$method($csapplication_array);
                                                        }
                                                    }
                                                }
                                            }
                                            if($fieldConfig['fieldName'] == "CSRelatedProducts"){
                                                if (strpos($fieldValue, '|') !== false) {
                                                    $fv = explode("|",$fieldValue);
                                                    if(count($fv) > 0){
                                                        $csRelatedProducts_array = array();
                                                        foreach($fv AS $ril){
                                                            $ril = trim($ril);
                                                            $v = strtolower(trim($ril));
                                                            if(isset($CSRelatedProducts[$v])){
                                                                $csRelatedProductsData = new \Pimcore\Model\DataObject\CSRelatedProducts();
                                                                $csRelatedProductsData->setId($CSRelatedProducts[$v]['id']);
                                                                $csRelatedProductsData->setKey($CSRelatedProducts[$v]['key']);
                                                                $csRelatedProductsData->setRelatedProduct($CSRelatedProducts[$v]['name']);
                                                                $csRelatedProducts_array[] = $csRelatedProductsData;
                                                            }else{
                                                                $rilatedparentId = DataObject\Service::createFolderByPath(ImportConstants::CONTITECH_CS_MASTERDATA_FOLDER."/Related Product")->getId();
                                                                $csRelatedProductsData = new \Pimcore\Model\DataObject\CSRelatedProducts();
                                                                $csRelatedProductsData->setKey($ril);
                                                                $csRelatedProductsData->setRelatedProduct($ril);
                                                                $csRelatedProductsData->setParentId($rilatedparentId);
                                                                $csRelatedProductsData->setPublished(true);
                                                                $csRelatedProductsData->save();
                                                                $csRelatedProducts_array[] = $csRelatedProductsData;
                                                                $fieldArrayTemp = array();
                                                                $fieldArrayTemp['id'] = $csRelatedProductsData->getId();
                                                                $fieldArrayTemp['key'] = $csRelatedProductsData->getKey();
                                                                $fieldArrayTemp['name'] = $csRelatedProductsData->getRelatedProduct();
                                                                $CSRelatedProducts[strtolower($csRelatedProductsData->getRelatedProduct())] = $fieldArrayTemp;
                                                            }
                                                        }
                                                        if(count($csRelatedProducts_array) > 0){
                                                            $method = 'set' . $fieldName;
                                                            $product->$method($csRelatedProducts_array);
                                                        }
                                                    }
                                                }
                                            }
                                            if($fieldConfig['fieldName'] == "CSProductFeaturesAndBenefits"){
                                                if (strpos($fieldValue, '|') !== false) {
                                                    $fv = explode("|",$fieldValue);
                                                    if(count($fv) > 0){
                                                        $csProductFeaturesAndBenefits_array = array();
                                                        foreach($fv AS $v){
                                                            $v = strtolower(trim($v));
                                                            if(isset($CSFeaturesAndBenefits[$v])){
                                                                $csFeaturesAndBenefitsData = new \Pimcore\Model\DataObject\CSFeaturesAndBenefits();
                                                                $csFeaturesAndBenefitsData->setId($CSFeaturesAndBenefits[$v]['id']);
                                                                $csFeaturesAndBenefitsData->setFeatureName($CSFeaturesAndBenefits[$v]['FeatureName']);
                                                                $csFeaturesAndBenefitsData->setFeatureImage($CSFeaturesAndBenefits[$v]['FeatureImage']);
                                                                $csProductFeaturesAndBenefits_array[] = $csFeaturesAndBenefitsData;
                                                            }
                                                        }
                                                        if(count($csProductFeaturesAndBenefits_array) > 0){
                                                            $method = 'set' . $fieldName;
                                                            $product->$method($csProductFeaturesAndBenefits_array);
                                                        }
                                                    }
                                                }
                                            }
                                            if($fieldConfig['fieldName'] == "CSProductIndustries"){
                                                // print_r($fieldValue);
                                                if (strpos($fieldValue, '|') !== false) {
                                                    $fv = explode("|",$fieldValue);
                                                    if(count($fv) > 0){
                                                        $csProductIndustries_array = array();
                                                        foreach($fv AS $v){
                                                            $v = strtolower(trim($v));
                                                            if(isset($CSProductIndustries[$v])){
                                                                $csProductIndustriesData = new \Pimcore\Model\DataObject\CSIndustries();
                                                                $csProductIndustriesData->setId($CSProductIndustries[$v]['id']);
                                                                $csProductIndustriesData->setIndustryCode($CSProductIndustries[$v]['IndustryCode']);
                                                                $csProductIndustriesData->setIndustryName($CSProductIndustries[$v]['IndustryName']);
                                                                $csProductIndustries_array[] = $csProductIndustriesData;
                                                            }
                                                        }
                                                        if(count($csProductIndustries_array) > 0){
                                                            $method = 'set' . $fieldName;
                                                            $product->$method($csProductIndustries_array);
                                                        }
                                                    }
                                                }
                                            }
                                        }else{
                                            $method = 'set' . $fieldName;
                                            $product->$method($fieldValue);
                                        }
                                    } else {
                                        $bricksData[$fieldConfig['objectType']][$fieldName] = $fieldValue;
                                    }
                                }
                            }

                            if ($allObjectBricks) {
                                foreach ($allObjectBricks as $brick) {

                                    if (isset($bricksData[$brick])) {
                                        $class = 'Pimcore\\Model\\DataObject\\Objectbrick\\Data\\' . $brick;
                                        $brickObject = new $class($product);

                                        foreach ($bricksData[$brick] as $fieldKey => $fieldValue) {
                                            if($fieldKey == 'Region'){
                                                $region = $productData['Region'];
                                                $brickObject->setRegion([$region]);
                                            }
                                            else{
                                                $objectBrickFieldMethod = 'set' . $fieldKey;
                                                $brickObject->$objectBrickFieldMethod($fieldValue);
                                            }
                                        }
                                        foreach($unitValueConfig as $unit =>$unitValue){
                                        
                                            $fieldKey = ucfirst($unitValue['fieldName']);
                                            $objectBrickFieldMethod = 'set' . $fieldKey;
                                           
                                            if($unitValue['objectType']==$brick){
                                                $brickObject->$objectBrickFieldMethod($unitValue['fieldValue']);
                                            }
                                            else{
                                                continue;
                                            }  
                                        }
                                        $method = 'set' . $brick;
                                        $product->getProductAttributes()->$method($brickObject);
                                    }
                                }
                            }

                            $result = $product->save();
                            $parentId = $result->getId();
                            \Pimcore::getContainer()->get('ContitechCS\ProductBundle\Services\AppService')->createAssetsHierarch($product);
                            echo "\n" . $msg =  "Product added successfully";
                            $comment = "Product added successfully";
                            $missingColName = 'None';
                        } catch (\Throwable $th) {

                            $failedProducts[] = $product->getName();
                            Logger::error("[ CsProductDataImportCommand ] " . $th->getMessage());
                            $msg =  $th->getMessage();
                            preg_match_all("/\[([^\]]*)\]/", $msg, $matches);
                            $missingCol = $matches[1];
                            $missingColName = '';
                            foreach ($missingCol as $val) {
                                $missingColName = $missingColName . '   ' . $val;
                            }
                            $success = false;
                            p_r('Cannot save Product!!!.');
                        }


                        if (count($failedProducts)  > 0) {
                            $comment = "Products which COULD NOT be saved: [" . implode(", ", $failedProducts) . "]";
                        }

                        $this->csvLog($csvLogFileHandle, array(
                            $i,
                            $hierarchyKey,
                            $comment,
                            $missingColName
                        ));
                    } else {
                        $parentId = $CSProductObj->getId();
                    }
                }
            }
            fclose($csvLogFileHandle);
        } catch (\Throwable $th) {
            p_r($th->getMessage());
        }
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

    /**
     * 
     *
     *
     * @return Array
     */
    public function getCSApplications()
    {
        $csApplicationsList = new \Pimcore\Model\DataObject\CSApplications\Listing();
        $csApplicationsList->load();
        $fieldArray = array();
        foreach ($csApplicationsList as $list) {
            $fieldArrayTemp = array();
            $fieldArrayTemp['id'] = $list->getId();
            $fieldArrayTemp['code'] = $list->getApplicationCode();
            $fieldArrayTemp['name'] = $list->getApplicationName();
            $fieldArray[strtolower($list->getApplicationName())] = $fieldArrayTemp;
        }
        return $fieldArray;
    }

    /**
     * 
     *
     *
     * @return Array
     */
    public function getCSRelatedProducts()
    {
        $csRelatedProduct = new \Pimcore\Model\DataObject\CSRelatedProducts\Listing();
        $csRelatedProduct->load();
        $fieldArray = array();
        foreach ($csRelatedProduct as $list) {
            $fieldArrayTemp = array();
            $fieldArrayTemp['id'] = $list->getId();
            $fieldArrayTemp['key'] = $list->getKey();
            $fieldArrayTemp['name'] = $list->getRelatedProduct();
            $fieldArray[strtolower($list->getRelatedProduct())] = $fieldArrayTemp;
        }
        return $fieldArray;
    }

    /**
     * 
     *
     *
     * @return Array
     */
    public function getCSFeaturesAndBenefits()
    {
        $csFeaturesAndBenefits = new \Pimcore\Model\DataObject\CSFeaturesAndBenefits\Listing();
        $csFeaturesAndBenefits->load();
        $fieldArray = array();
        foreach ($csFeaturesAndBenefits as $list) {
            $fieldArrayTemp = array();
            $fieldArrayTemp['id'] = $list->getId();
            $fieldArrayTemp['FeatureName'] = $list->getFeatureName();
            $fieldArrayTemp['FeatureDescription'] = $list->getFeatureDescription();
            $fieldArrayTemp['FeatureImage'] = $list->getFeatureImage();
            $fieldArray[strtolower($list->getFeatureName())] = $fieldArrayTemp;
        }
        return $fieldArray;
    }

    /**
     * 
     *
     *
     * @return Array
     */
    public function getCSProductIndustries()
    {
        $csIndustries = new \Pimcore\Model\DataObject\CSIndustries\Listing();
        $csIndustries->load();
        $fieldArray = array();
        foreach ($csIndustries as $list) {
            $fieldArrayTemp = array();
            $fieldArrayTemp['id'] = $list->getId();
            $fieldArrayTemp['IndustryCode'] = $list->getIndustryCode();
            $fieldArrayTemp['IndustryName'] = $list->getIndustryName();
            $fieldArray[strtolower($list->getIndustryName())] = $fieldArrayTemp;
        }
        return $fieldArray;
    }
}
