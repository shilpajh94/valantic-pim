<?php

namespace PTGEU\ImportBundle\Services;

use Exception;
use Throwable;
use AppBundle\Logger\AppLogger as Logger;
use Pimcore\Model\DataObject;
use PTGEU\ImportBundle\Services\ImportService;
use PTGEU\ImportBundle\Model\PriceModel;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PriceService
{
    private $filePath;
    private $logArray;
    private $products = [];
    private $priceModel;
    public $csvHeader;
    private $queryTableNewData;
    private $storeTableNewData;
    private $container;
 
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->priceModel = new PriceModel;
    }
    
    public function import()
    {
        $sapFileFeeder  = $this->container->get('import.sap_file_feeder_service');
        $this->filePath = $sapFileFeeder->execFileFeeder('price');
        $csvInfo        = ImportService::getCSVData($this->filePath);
        $this->csvHeader= array_flip($csvInfo['header']);
        $csvData        = $csvInfo['data'];

        echo "Truncating temp table.".PHP_EOL;
        $this->priceModel->truncateTempTable();
        echo "Inserting data into temp table.".PHP_EOL;
        $this->priceModel->insertDataInTemp($csvData);
        $deletedPriceRecords = $this->priceModel->getDeletedPriceDataProducts();
        echo "Price deleted DELTA count is: ".count($deletedPriceRecords).PHP_EOL;
        
        $delta = $this->priceModel->getDelta();
        $deltaCount = count($delta);
        echo "Price DELTA count is: ".$deltaCount.PHP_EOL;
        
        if (count($deletedPriceRecords)>0) {
            foreach ($deletedPriceRecords as $data) {
                $delta[] = $data;
            }
        }

        $a = time();
        $deltaCount = count($delta);
        echo "Total price DELTA count is: ".$deltaCount.PHP_EOL;
        
        $productsData = $this->priceModel->getAllProducts();
        $queryTableData = $productsData['queryTableData'];
        foreach ($queryTableData as $rec) {
            $this->products[$rec['articleNumber']] = $rec;
        }
        
        
        $j = 1;
        $this->logArray = [];
        $i = 0;
        $length = 2000;
        while ($i<$deltaCount) {
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
        $this->priceModel->updateMasterTable();
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
                $msg = 'Article number does not exists.';
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
                $uniqueKeyArr[] = $priceData[2]; // Distribution Channel
                $uniqueKeyArr[] = $priceData[3]; // End Date
                $uniqueKeyArr[] = $priceData[4]; // Start Date
                $uniqueKeyArr[] = $priceData[5]; // Condition Type
                $uniqueKeyArr[] = $priceData[6]; // Rate
                $uniqueKeyArr[] = $priceData[7]; // Rate Unit
                // $uniqueKeyArr[] = $priceData[8]; // Price Ref.
                // $uniqueKeyArr[] = $priceData[9]; // Per
                // $uniqueKeyArr[] = $priceData[10]; // Unit

                $uniqueKey = implode('_', $uniqueKeyArr);
                $priceDataArray = [
                    $uniqueKey,
                    $priceData[1],
                    $priceData[2],
                    date('Y-m-d', strtotime($priceData[3])),
                    date('Y-m-d', strtotime($priceData[4])),
                    trim($priceData[6]),
                    $priceData[7],
                    $priceData[5],
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
            $this->priceModel->insertDataIntoTable($this->queryTableNewData, 'object_query_38');
        }
        if(!empty($this->storeTableNewData)) {
            $this->priceModel->insertDataIntoTable($this->storeTableNewData, 'object_store_38');
        }
        
        if(!empty($this->logArray)) {
            $this->priceModel->insertDataIntoTable($this->logArray, 'ptgeu_material_list_price_import_log');
        }
    }
}
