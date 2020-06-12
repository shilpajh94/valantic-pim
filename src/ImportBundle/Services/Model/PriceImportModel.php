<?php

namespace ImportBundle\Services\Model;

use Exception;
use Throwable;
use AppBundle\Logger\AppLogger as Logger;
use Pimcore\Model\DataObject;
use ImportBundle\Services\Import;
use ImportBundle\Services\ImportConstants;

class PriceImportModel {
    /**
     * @var Symfony\Component\DependencyInjection\ContainerInterface
     */
    private $container;



    /**
     * @var DataImportBundle\Model\DataImportModel
     */
    private $modelArticle;
    private $productModel;


    /**
     * @var Pimcore\Model\DataObject
     */
    private $mainClass = "\\Pimcore\\Model\\DataObject\\";

    private $products = [];
    
    /**
     * @var object
     */
    private $logger;

    public function __construct() {
        $this->datasource = 'ASSETS'; // "ASSETS" OR "FTP"
        $this->assetFilePath = '/Data Import Files/Price List/PIM_ListPrice.csv';
        
        //$this->common = \Pimcore::getContainer()->get('app.common_helper');
        
        $this->tblImpHelper = \Pimcore::getContainer()->get('import.sap_price_import_table_helper');
        
//        $this->productHelper = \Pimcore::getContainer()->get('app.product_helper');
//        $this->catHelper = \Pimcore::getContainer()->get('app.category_helper');
//        $this->catInstance = \Pimcore::getContainer()->get('import.category_service');
//        $this->prdConfigData = \Pimcore::getContainer()->get('app.config_provider_service')->getProductConfig();
//        $this->startRow = $this->common->getParameterItem($this->prdConfigData, 'sheet', 'startRow');
//        $this->columnName = $this->common->getParameterItem($this->prdConfigData, 'sheet', 'columnName');
    }
    
    public function import()
    {
        $csvData = $this->fetchDataFromDataSource();
        
        echo "Truncating Temp table.".PHP_EOL;
        $this->tblImpHelper->truncateTempTable();
        echo "Inserting data into temp table.".PHP_EOL;
        $this->tblImpHelper->insertDataInTemp($csvData);
        $deletedPriceRecords = $this->tblImpHelper->getDeletedPriceDataProducts();
        echo "Price Deleted DELTA Count is: ".count($deletedPriceRecords).PHP_EOL;
        
        $delta = $this->tblImpHelper->getDelta();
        $deltaCount = count($delta);
        echo "Price DELTA Count is: ".$deltaCount.PHP_EOL;
        
        if (count($deletedPriceRecords)>0) {
            foreach ($deletedPriceRecords as $data) {
                $delta[] = $data;
            }
        }
        $deltaCount = count($delta);
        echo "Total Price DELTA Count is: ".$deltaCount.PHP_EOL;
        
        $productsData = $this->tblImpHelper->fetchArticles();
        $queryTableData = $productsData['queryTableData'];
        foreach ($queryTableData as $rec) {
            $this->products[$rec['articleNumber']] = $rec;
        }
        
        $this->logArray = [];
        $i = 0;
        $length = 2000;
        while ($i<$deltaCount) {
            $offset = $i;
            $diff = $deltaCount-$i;
            if ($diff < $length) {
                $length = $diff;
            }
            $partialData = array_slice($delta, $i, $length);
            $this->processPriceData($partialData);
            $partialData = null;
            unset($partialData);
            $i = $i+$length;
            echo "Record Processed: ".$i;
            $b = time();
            echo "Part ".$j." completed in time: ".$a."====".$b.PHP_EOL;
            \Pimcore::collectGarbage();
            gc_collect_cycles();
            $a = time();
            $j++;
        }
        $this->tblImpHelper->updateMasterTable();
    }
 
    public function processPriceData($sapPriceData) {
        $i = $j = 0;
        
        foreach ($sapPriceData as $record) {
            $artNo = $record['id'];
            if (!empty($this->products[$artNo])) {
                $successArray = $this->processSingleRecord($record);
                $status = $successArray['status'];
                $msg = $successArray['msg'];
                $i++;
            } else {
                $status = 'Failed';
                $msg = 'Article number not exists.';
                $j++;
            }
            $this->logArray[] = [
                'id' => $artNo,
                'record' => $record['record'],
                'status' => $status,
                'reason' => $msg,
                'createdAt' => time()
            ];
        }
        $this->insertDataInDB();
        echo "Success records count: ".$i.PHP_EOL;
        echo "Failed records count: ".$j.PHP_EOL;
        $this->logArray = [];
        $this->queryTableNewData = [];
        $this->storeTableNewData = [];
        
    }
    public function processSingleRecord($record) {
        $artNo = $record['id'];
        $existingData = $this->products[$artNo];
        $objectId = $existingData['oo_id'];
        $storeTablePriceArray = [];
        $queryTablePriceArray = [];
        if (!empty($record['record'])) {
            $dataArray = (array) json_decode($record['record']);
            foreach ($dataArray as $priceData) {
                $uniqueKeyArr = [];
                $uniqueKeyArr[] = $priceData[1]; // Sales Organization
                $uniqueKeyArr[] = $priceData[2]; // Plant
                $uniqueKeyArr[] = $priceData[3]; // End Date
                $uniqueKeyArr[] = $priceData[4]; // Start Date
                $uniqueKey = implode('_', $uniqueKeyArr);
                $priceDataArray = [
                    $uniqueKey,
                    $priceData[1],
                    $priceData[2],
                    date('Y-m-d', strtotime($priceData[3])),
                    date('Y-m-d', strtotime($priceData[4])),
                    trim($priceData[6]),
                    $priceData[7]
                ];
                $storeTablePriceArray[] = $priceDataArray;
                $queryTablePriceDataStr = implode('|', $priceDataArray);
                $queryTablePriceArray[] = $queryTablePriceDataStr;
            }
        }
        $this->queryTableNewData[] = [
            'priceData' => implode(PHP_EOL, $queryTablePriceArray),
            'oo_id' => $objectId
        ];

        $this->storeTableNewData[] = [
            'priceData' => serialize($storeTablePriceArray),
            'oo_id' => $objectId
        ];
        return ['status' => 'Success', 'msg' => ''];
    }
    
    public function insertDataInDB() {
        if(!empty($this->queryTableNewData)) {
            $this->tblImpHelper->insertDataIntoTable($this->queryTableNewData, 'object_query_1');
        }
        if(!empty($this->storeTableNewData)) {
            $this->tblImpHelper->insertDataIntoTable($this->storeTableNewData, 'object_store_1');
        }
        
        if(!empty($this->logArray)) {
            $this->tblImpHelper->insertDataIntoTable($this->logArray, 'material_list_price_import_log');
        }
    }
    
    public function fetchDataFromDataSource() {
        $dataArray = [];
        switch ($this->datasource) {
            case 'ASSETS':
                $assetObj = \Pimcore\Model\Asset::getByPath($this->assetFilePath);
                if (!empty($assetObj)) {
                    $sysFilePath = $assetObj->getFileSystemPath();
                    $csvInfo = Import::getCSVData($sysFilePath);
                    $this->csvHeader = array_flip($csvInfo['header']);
                    $dataArray = $csvInfo['data'];
                } else {
                    echo "File not found";
                }
                
                break;
            default:
                echo "Error case : Invalid Datasource";
                exit;
        }

        return $dataArray;
    }
    
}
