<?php
/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace AppBundle\Command;

// use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class to Import Articles data
 */
// class ProductDataImportCommand extends ContainerAwareCommand
class ProductDataImportCommand extends Command

{
    private $storeTableDataArray; 
    private $categories; 
    private $relationTableDataArray; 
    private $dependencyTableDataArray; 
    private $tableObj; 
    private $productHelper; 
    private $langArr; 
    private $logArray; 
    private $objectsTableData; 
    private $queryTableDataArray; 
    private $localisedQueryTableDataArray; 
    private $localisedDataTableDataArray; 
    private $products;
    private $container;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct();
        $this->container = $container;
    }

    /**
     * Function to set the command configurations
     *
     */
    protected function configure()
    {
        $this->setName('contitech:product-data-import')
            ->setDescription('Import abbreviations')
//            ->addArgument('source', InputArgument::REQUIRED, 'Source should be s3 or ftp.'
            ->setHelp('');
    }

    /**
     * Function to start the execution on command.
     *
     * @param Symfony\Component\Console\Input\InputInterface $input
     * @param Symfony\Component\Console\Output\OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
//        $fileName = 'chemical_master.csv';
        echo $a = time();
        $type = 'Material';
        $fileName = $type."_master.csv";
        $time = time();
//        $csvFilePath = PIMCORE_PROJECT_ROOT.'/web/'.$fileName;
//        $csvData = \ImportBundle\Services\Import::getCSVData($csvFilePath);
//        $csvHeader = $csvData['header'];
//        $data = $csvData['data'];
        $this->tableObj = $this->container->get('app.product_import_helper');;
//        $this->tableObj->truncateTempTable();
//        $this->tableObj->insertDataInTemp($data);
        
        $this->productHelper = $this->container->get('app.product_helper');
        
        $this->langArr = ['de', 'en', 'es_MX', 'fr_CA', 'pt'];
        
        $this->categories = [];
        $catList = $this->tableObj->getCategories();
        foreach($catList as $cat) {
            $fullCode = $cat['fullCode'];
            $this->categories[$fullCode] = array(
                'data' =>  $cat,
                'id'    =>  $cat['oo_id'],
                'fullPath'  =>  $cat['path'].$cat['key']
            );
            unset($fullCode);
        }
        $this->updateProductsList();
        
        //$this->initiatePTGProductsProcess();
        
        $this->initiateIFSProductsProcess();
    }
    
    public function initiateIFSProductsProcess() {
        $a = time();
        $delta = $this->tableObj->getDelta('ifs');
        
        $this->setVariablesToEmpty();
        $deltaCount = count($delta);
        $j = 1;
        
        $this->logArray = [];
        $i = 0;
        $length = 5000;
        while ($i<$deltaCount) {
            $offset = $i;
            $diff = $deltaCount-$i;
            if ($diff < $length) {
                $length = $diff;
            }
            $partialData = array_slice($delta, $i, $length);
            $this->processIFSProducts($partialData);
            $partialData = null;
            $i = $i+$length;
            echo PHP_EOL;
            echo "Record Processed: ".$i;
            $b = time();
            echo "Part ".$j." completed in time: ".$a."====".$b.PHP_EOL;
            \Pimcore::collectGarbage();
            gc_collect_cycles();
            $a = time();
            $j++;
        }
    }
    
    public function initiatePTGProductsProcess() {
        $a = time();
        $delta = $this->tableObj->getDelta('ptg');
        $this->setVariablesToEmpty();
        $deltaCount = count($delta);
        $j = 1;
        
        $this->logArray = [];
        $i = 0;
        $length = 5000;
        while ($i<$deltaCount) {
            $offset = $i;
            $diff = $deltaCount-$i;
            if ($diff < $length) {
                $length = $diff;
            }
            $partialData = array_slice($delta, $i, $length);
            $this->processPTGProducts($partialData);
            $partialData = null;
            $i = $i+$length;
            echo "Record Processed: ".$i;
            $b = time();
            echo "Part ".$j." completed in time: ".$a."====".$b.PHP_EOL;
            \Pimcore::collectGarbage();
            gc_collect_cycles();
            $a = time();
            $j++;
        }
    }
    
    
    public function setVariablesToEmpty() {
        $this->logArray = [];
        $this->objectsTableData = [];
        $this->queryTableDataArray = [];
        $this->storeTableDataArray = [];
        $this->localisedQueryTableDataArray = [];
        $this->localisedDataTableDataArray = [];
        $this->relationTableDataArray = [];
        $this->dependencyTableDataArray = [];
        foreach ($this->langArr as $lang) {
            $this->localisedQueryTableDataArray[$lang] = [];    
        }
        
        \Pimcore::collectGarbage();
        gc_collect_cycles();
    }
    
    public function updateProductsList() {
        $productList = $this->tableObj->getProducts();
        foreach($productList as $prod) {
            $fullPath = $prod['path'].$prod['key'];
            $this->products[$fullPath] = $prod['oo_id'];
            unset($fullPath);
        }
    }
    
    public function processIFSProducts($data) {
        foreach ($data as $row) {
            $this->processSingleRecord($row['siopfullcode'], $row, 'IFS');
        }
        $this->insertDataInDB();
        $this->tableObj->insertDataToLogTable($this->logArray);
        $this->setVariablesToEmpty();
    }
    
    
    public function processPTGProducts($data) {
        foreach ($data as $row) {
            $this->processSingleRecord($row['siopfullcode'], $row, 'PTG');
        }
        $this->insertDataInDB();
        $this->tableObj->insertDataToLogTable($this->logArray);
        $this->setVariablesToEmpty();
    }
    
    
    public function insertDataInDB() {
        if(!empty($this->queryTableDataArray)) {
            $this->tableObj->insertIntoProductTable($this->queryTableDataArray, 'object_query_1');
        }
        if(!empty($this->storeTableDataArray)) {
            $this->tableObj->insertIntoProductTable($this->storeTableDataArray, 'object_store_1');
        }
        if (!empty($this->relationTableDataArray)) {
            $this->tableObj->insertIntoProductTable($this->relationTableDataArray, 'object_relations_1');
        }
        foreach ($this->langArr as $lang) {
            if (!empty($this->localisedQueryTableDataArray[$lang])) {
                $tbl = 'object_localized_query_1_'.($lang);
                $this->tableObj->insertIntoProductTable($this->localisedQueryTableDataArray[$lang], $tbl);    
            }
        }
        if (!empty($this->localisedDataTableDataArray)) {
            $this->tableObj->insertIntoProductTable($this->localisedDataTableDataArray, 'object_localized_data_1');
        }
        if (!empty($this->dependencyTableDataArray)) {
            $this->tableObj->insertIntoProductTable($this->dependencyTableDataArray, 'dependencies');
        }
    }
    
    public function createIFSObject($record, $parentId, $parentPath, $levelInfo, $type) {
        $oldMaterialCode = $record[6];
        if ($type=='base') {
            $objectKey = substr($oldMaterialCode, 0,6);
        } elseif ($type == 'skeleton') {
            $objectKey = substr($oldMaterialCode, 0,9);
        } else {
            $objectKey = $record[0];
        }
        $objectArr = [
            'parentId' => $parentId,
            'key' => $objectKey,
            'path' => $parentPath.'/',
            'className' => 'Product'
        ];
        echo PHP_EOL;
        echo $objId = $this->tableObj->insertInObjects($objectArr);
        $currentLevelPath = $parentPath.'/'.$objectKey;
        $this->products[$currentLevelPath] = $objId;
        $this->getQueryTableData($objId, $record, $levelInfo, 4, $type);
        $this->getStoreTableData($objId, $record, $levelInfo, 4, $type);
        $this->getRelationTableData($objId, $record, $levelInfo, 4);
        $this->getLocalizedQueryData($objId, $record);
        $this->getDependencyTableData($objId, $record, $levelInfo, 4);
        return [$objId, $currentLevelPath];
    }
    
    public function createPTGObject($record, $parentId, $parentPath, $levelInfo, $type) {
        if ($type == 'base' || $type == 'skeleton') {
            if ($type == 'base') {
                $objectIndex = count($levelInfo)-1;
            } elseif ($type == 'skeleton') {
                $objectIndex = count($levelInfo);
            }
            $currentLevelCode = $levelInfo[$objectIndex]['levelFullCode'];
            $categoryPath = $this->categories[$currentLevelCode]['fullPath'];
            $currentLevelPath = $this->convertCategoryPathToProduct($categoryPath);
            $currentLevelArray = explode('/', $currentLevelPath);
            $objectKey = $currentLevelArray[count($currentLevelArray)-1];
        } elseif ($type == 'fert') {
            $objectKey = $record[0];
            $objectIndex = count($levelInfo);
        }
        $objectArr = [
            'parentId' => $parentId,
            'key' => $objectKey,
            'path' => $parentPath.'/',
            'className' => 'Product'
        ];
        $objId = $this->tableObj->insertInObjects($objectArr);
        $currentLevelPath = $parentPath.'/'.$objectKey;
        $this->products[$currentLevelPath] = $objId;
        $this->getQueryTableData($objId, $record, $levelInfo, $objectIndex, $type);
        $this->getStoreTableData($objId, $record, $levelInfo, $objectIndex, $type);
        $this->getRelationTableData($objId, $record, $levelInfo, $objectIndex);
        $this->getLocalizedQueryData($objId, $record);
        $this->getDependencyTableData($objId, $record, $levelInfo, $objectIndex);
        return [$objId, $currentLevelPath];
    }
    public function processSingleRecord($siopCode, $row, $bu) {
        $recData =  (array) json_decode($row['record']);
        $status = 'Failed';
        if (array_key_exists($siopCode, $this->categories)) {
            $buCatCode = substr($siopCode, 2, 4);
            if (($buCatCode == 3000 && strlen($siopCode) == 18) || (($buCatCode == 1000 || $buCatCode == 1500) && strlen($siopCode) == 13)) {
                $record = array(
                    'code'  =>  $siopCode,
                    'description'   =>  $recData['2'],
                    'material'  =>  $recData['0']
                );
                $levelInfo = $this->productHelper->getLevels($record['code'], $record);
                if ($levelInfo['status']) {
                    if (strtolower($bu) == 'ifs') {
                        $folderIndex = count($levelInfo['levels']);
                        $folderCode = $levelInfo['levels'][$folderIndex]['levelFullCode'];
                        $folderPath = $this->categories[$folderCode]['fullPath'];
                        $folderPath = $this->convertCategoryPathToProduct($folderPath);
                        $folderId = $this->getFolderByPath($folderPath);
                        $oldMaterialCode = $recData[6];
                        if (empty($oldMaterialCode) || $oldMaterialCode == 'NA' || $oldMaterialCode == 'N/A') {
                            $this->createIFSObject($recData, $folderId, $folderPath, $levelInfo['levels'], 'fert');
                        } else {
                            $levelArray = $this->createIFSObject($recData, $folderId, $folderPath, $levelInfo['levels'], 'base');
                            $levelArray = $this->createIFSObject($recData, $levelArray[0], $levelArray[1], $levelInfo['levels'], 'skeleton');
                            $levelArray = $this->createIFSObject($recData, $levelArray[0], $levelArray[1], $levelInfo['levels'], 'fert');
                        }
                    } else if(strtolower($bu) == 'ptg') {
                        $folderIndex = count($levelInfo['levels'])-2;
                        $folderCode = $levelInfo['levels'][$folderIndex]['levelFullCode'];
                        $folderPath = $this->categories[$folderCode]['fullPath'];
                        $folderPath = $this->convertCategoryPathToProduct($folderPath);
                        $folderId = $this->getFolderByPath($folderPath);
                        $levelArray = $this->createPTGObject($recData, $folderId, $folderPath, $levelInfo['levels'], 'base');
                        $levelArray = $this->createPTGObject($recData, $levelArray[0], $levelArray[1], $levelInfo['levels'], 'skeleton');
                        $levelArray = $this->createPTGObject($recData, $levelArray[0], $levelArray[1], $levelInfo['levels'], 'fert');
                    }
                    $status = 'Success';
                    $msg = 'Object Id is: '.$levelArray[0];
                }
            } else {
                $msg = 'Siop Category code and its length does not match.';
            }
        } else {
            $msg = 'SIOP Category not exists.';
        }
        $logRow = [
            'id' => $recData[0],
            'record' => $row['record'],
            'statusCode' => $status,
            'failedReason' => $msg
        ];
        $this->logArray[] = $logRow; 
        $logRow = null;
        unset($logRow);
    }
    
    public function validateSIOPCode() {
        
    }

    
    public function getLocalizedQueryData($objId, $record) {
        
        foreach ($this->langArr as $lang) {
            $value = null;
            if ($lang == 'en') {
                $value = $record['2'];
            }
            $this->localisedDataTableDataArray[] = [
                'ooo_id' => $objId,
                'language' => $lang,
                'sapDescription' => $value
            ];
            $this->localisedQueryTableDataArray[$lang][] = [
                'ooo_id' => $objId,
                'language' => $lang,
                'sapDescription' => $record['2']
            ];
        }
    }

    public function getQueryTableData($objId, $record, $levelInfo, $level=4, $productType = 'fert') {
        $siopData = [];
        for ($k=1; $k<=$level; $k++) {
            $index = 'SIOPLevel'.$k;
            $catCode = $levelInfo[$k]['levelFullCode'];
            $siopData[$index] = $this->categories[$catCode]['id'];
        }
        $queryTableData = [
            'oo_id' => $objId,
            'oo_classId' => 1,
            'oo_className' => 'Product',
            'ProductType' => strtolower($productType),
            'siopFullCode' => trim($record['4']),
            'articleNumber' => null,
            'materialGroup' => null,
            'baseUOM' => null,
            'oldMaterialCode' => null,
            'industryStandard' => null,
            'manufacturer' => null,
            'manufacturerPartNumber' => null,
            'eanUpc' => null,
            'stccCode' => null,
            'grossWeight' => null,
            'netWeight' => null,
            'weightUnit' => null
        ];
        if (strtolower($productType) == 'fert') {
            $queryTableData['articleNumber'] = trim($record['0']);
            $queryTableData['materialGroup'] = trim($record['3']);
            $queryTableData['baseUOM'] = trim($record['5']);
            $queryTableData['oldMaterialCode'] = trim($record['6']);
            $queryTableData['industryStandard'] = trim($record['19']);
            $queryTableData['manufacturer'] = trim($record['20']);
            $queryTableData['manufacturerPartNumber'] = trim($record['21']);
            $queryTableData['eanUpc'] = trim($record['22']);
            $queryTableData['stccCode'] = trim($record['23']);
            $queryTableData['grossWeight'] = trim($record['25']);
            $queryTableData['netWeight'] = trim($record['26']);
            $queryTableData['weightUnit'] = trim($record['27']);
        }
        $this->queryTableDataArray[] = array_merge($queryTableData, $siopData);
    }

    public function getStoreTableData($objId, $record, $levelInfo, $level=4, $productType = 'fert') {
        $storeTableDataArray = [
            'oo_id' => $objId,
            'ProductType' => strtolower($productType),
            'siopFullCode' => trim($record['4']),
            'articleNumber' => null,
            'materialGroup' => null,
            'baseUOM' => null,
            'oldMaterialCode' => null,
            'industryStandard' => null,
            'manufacturer' => null,
            'manufacturerPartNumber' => null,
            'eanUpc' => null,
            'stccCode' => null,
            'grossWeight' => null,
            'netWeight' => null,
            'weightUnit' => null
        ];
        if (strtolower($productType) == 'fert') {
            $storeTableDataArray['articleNumber'] = trim($record['0']);
            $storeTableDataArray['materialGroup'] = trim($record['3']);
            $storeTableDataArray['baseUOM'] = trim($record['5']);
            $storeTableDataArray['oldMaterialCode'] = trim($record['6']);
            $storeTableDataArray['industryStandard'] = trim($record['19']);
            $storeTableDataArray['manufacturer'] = trim($record['20']);
            $storeTableDataArray['manufacturerPartNumber'] = trim($record['21']);
            $storeTableDataArray['eanUpc'] = trim($record['22']);
            $storeTableDataArray['stccCode'] = trim($record['23']);
            $storeTableDataArray['grossWeight'] = trim($record['25']);
            $storeTableDataArray['netWeight'] = trim($record['26']);
            $storeTableDataArray['weightUnit'] = trim($record['27']);
        }
        $this->storeTableDataArray[] = $storeTableDataArray;
    }

    public function getRelationTableData($objId, $record, $levelInfo, $level=4) {
        for ($k=1; $k<=$level; $k++) {
            $index = 'SIOPLevel'.$k;
            $catCode = $levelInfo[$k]['levelFullCode'];
            $targetId = $this->categories[$catCode]['id'];
            $this->relationTableDataArray[] = [
                'src_id' => $objId,
                'dest_id' => $targetId,
                'type' => 'object',
                'fieldname' => $index,
                'ownertype' => 'object'
            ];
        }
    }
    public function getDependencyTableData($objId, $record, $levelInfo, $level=4) {
        for ($k=1; $k<=$level; $k++) {
            $index = 'SIOPLevel'.$k;
            $catCode = $levelInfo[$k]['levelFullCode'];
            $targetId = $this->categories[$catCode]['id'];
            $this->dependencyTableDataArray[] = [
                'sourceid' => $objId,
                'targetid' => $targetId,
                'sourcetype' => 'object',
                'targettype' => 'object'
            ];
        }
    }
    public function convertCategoryPathToProduct($categoryPath) {
        $search = '/Master List/SIOP Master List/SIOP Engineered Products';
        $replace = '/Products Master';
        return str_replace($search, $replace, $categoryPath);
    }
    
    public function getFolderByPath($folderPath) {
        $pathExists = \Pimcore\Model\DataObject\Service::pathExists($folderPath);
        if (empty($pathExists)) {
            $folder = \Pimcore\Model\DataObject\Service::createFolderByPath($folderPath);
        } else {
            $folder = \Pimcore\Model\DataObject\Service::getElementByPath('object', $folderPath);
        }
        return $folder->getId();
    }
}