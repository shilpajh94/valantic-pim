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
            "Product Name",
            "Comment",
            "Missing Column Name"
        ));

        try {

            $this->configProviderService = new ConfigProviderService();
            $productDataImportConfig = $this->configProviderService->getProductDataImportConfig();
            $unitValueConfig = $this->configProviderService->getUnitValueConfig();

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

                $productHier[] = $productData['Product Name'];

                $productHier = array_filter($productHier);
                $productHier = array_values($productHier);

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
                            $product->setParentId($parentId);
                            $product->setOmitMandatoryCheck(true);
                            $product->setPublished(true);

                            $bricksData = [];
                            foreach ($productData as $fieldCVSKey => $fieldValue) {
                                if (isset($productDataImportConfig[$fieldCVSKey])) {
                                    $fieldConfig = $productDataImportConfig[$fieldCVSKey];
                                    $fieldName = ucfirst($fieldConfig['fieldName']);
                                    if ($fieldConfig['objectType'] == 'class') {
                                        $method = 'set' . $fieldName;
                                        $product->$method($fieldValue);
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
                                            $objectBrickFieldMethod = 'set' . $fieldKey;
                                            $brickObject->$objectBrickFieldMethod($fieldValue);
                                            # code...
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
                            p_r('Cannot save Product... Check Your Log.');
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
}
