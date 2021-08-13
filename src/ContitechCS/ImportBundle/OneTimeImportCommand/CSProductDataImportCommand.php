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

class CSProductDataImportCommand extends AbstractCommand
{
    private $configProviderService;
    private $t;

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
        try {

            $this->configProviderService = new ConfigProviderService();
            $productDataImportConfig = $this->configProviderService->getProductDataImportConfig();

            

            $results = $this->getCSVData($filePath);

            $data = $results['data'];

            // p_r($data);
            // p_r($productDataImportConfig);
            // die;

            foreach ($data as $key => $productData) {

                $allObjectBricks = [];
            
                $parentId = DataObject\Service::createFolderByPath(ImportConstants::CONTITECH_CS_PRODUCT_FOLDER)->getId();   // createFolderByPath creates the folder assigned in the constant if not created and returns the path & if the folder is already present then returns the path of the folder.

                $productHier = explode('/', $productData['Product Hierarchy']);

                $productHier[] = $productData['Product Name'];

                $productHier = array_filter($productHier);
                $productHier = array_values($productHier);

                $productData = array_slice($productData, 2);

                foreach ($productHier as $key => $hierarchy) {

                    $hierarchyArr = array_slice($productHier, 0, $key + 1);

                    $func = function($value) {
                        return DataObject\Service::getValidKey($value,"obejct");;
                    };
                    $hierarchyArr = array_map($func,$hierarchyArr);

                    $hierarchyString = implode('/', $hierarchyArr);
    
                    echo "\n". $productPath = "/" . ImportConstants::CONTITECH_CS_PRODUCT_FOLDER . '/' . $hierarchyString;
    
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
                            $hierarchyKey = DataObject\Service::getValidKey($hierarchy,"obejct");
                            $product = new DataObject\CSProducts();
                            $product->setKey($hierarchyKey);
                            $product->setName($hierarchy, 'en');
                            $product->setParentId($parentId);
                            $product->setPublished(true);

                            $bricksData = [];
                            foreach ($productData as $fieldCVSKey => $fieldValue) {
                                if(isset($productDataImportConfig[$fieldCVSKey]))
                                {
                                    $fieldConfig = $productDataImportConfig[$fieldCVSKey];
                                    $fieldName = ucfirst($fieldConfig['fieldName']);
                                    if($fieldConfig['objectType'] == 'class')
                                    {
                                        $method = 'set' . $fieldName;
                                        $product->$method($fieldValue);
                                    }
                                    else{
                                        $bricksData[$fieldConfig['objectType']][$fieldName] = $fieldValue;
                                    }
                                }
                            }
                            // p_r($allObjectBricks);
                            // die;
    
                            if ($allObjectBricks) {
                                foreach ($allObjectBricks as $brick) {

                                    if(isset($bricksData[$brick]))
                                    {
                                        $class = 'Pimcore\\Model\\DataObject\\Objectbrick\\Data\\' . $brick;
                                        $brickObject = new $class($product);

                                        foreach ($bricksData[$brick] as $fieldKey => $fieldValue) {
                                            $objectBrickFieldMethod = 'set' . $fieldKey;
                                            $brickObject->$objectBrickFieldMethod($fieldValue);
                                            # code...
                                        }
                                        // $brickObject->setBeltRatingNMM(1);
                                        $method = 'set' . $brick;
                                        $product->getProductAttributes()->$method($brickObject);
                                    }
                                }
                            }
    
                            $result = $product->save();
                            $parentId = $result->getId();
    
                            echo "\n" .$msg =  "Product added successfully";
                        } catch (\Throwable $th) {
                            $success = false;
                            echo "\n" .$msg =  $th->getMessage();
                        }
                    } else {
                        $parentId = $CSProductObj->getId();
                    }
                }
            }
            
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
}
