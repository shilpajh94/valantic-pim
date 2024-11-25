<?php

namespace IFSEU\ImportBundle\Services;

use Exception;
use Throwable;
use AppBundle\Logger\AppLogger as Logger;
use Pimcore\Model\DataObject;
use IFSEU\ImportBundle\Services\ImportService;
use IFSEU\ImportBundle\Model\PriceModel;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Services\ImportProcessEmailNotificationService;

class PriceImportService {
        private $filePath;
        private $logArray;
        private $products = [];
        public $priceModel;
        private $csvHeader;
        private $queryTableNewData;
        private $storeTableNewData;
        private $container;
        private $time;
        private $importProcessEmailNotificationObj;
        const BU_TYPE = 'IFSEU Price';

        public function __construct(ContainerInterface $container)
        {
            $this->container = $container;
            $this->priceModel       = new PriceModel;
            $this->time = time();
            $this->importProcessEmailNotificationObj = new ImportProcessEmailNotificationService;
        }

        public function import()
        {
            \AppBundle\Helper\Common::clearAndDisablePimCache();
            $sapFileFeeder  = $this->container->get('ifs_eu_import.sap_file_feeder_service');
            $this->filePath = $sapFileFeeder->execFileFeeder('price');
            try{
                $csvInfo = ImportService::getCSVData($this->filePath);
            } catch (Exception $e) {
                $this->importProcessEmailNotificationObj->sendMailNotification(
                    self::BU_TYPE,
                    self::BU_TYPE." Import not performed - Error occured while reading CSV \n".$e->getMessage()
                ); die;
            }
            $csvData = $csvInfo['data'];
            if (!empty($csvData)) {
                $this->csvHeader = array_flip($csvInfo['header']);
                $columnNames = ['Material Number','Sales Organization','Distribution Channel',
                    'Validity End Date','Validity Start Date','Condition Type','Rate','Rate Unit'];
                $flag = 1;
                foreach(array_keys($this->csvHeader) as $column){
                    if(!in_array($column, $columnNames)) {
                        $flag = 0;
                        break;
                    }
                }
                if ($flag == 1) {
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
                        $this->products[$rec['materialNumber']] = $rec;
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
                    \Pimcore\Cache::clearAll();
                    $this->priceModel->updateMasterTable();
                    \AppBundle\Helper\Common::endablePimCache();
                } else {
                    $message = self::BU_TYPE." - The uploaded file has wrong headers.";
                    echo $message;
                    $this->importProcessEmailNotificationObj->sendMailNotification(self::BU_TYPE, $message);
                }
            } else {
                $message = self::BU_TYPE." - No record found in file.";
                $this->importProcessEmailNotificationObj->sendMailNotification(self::BU_TYPE, $message);
            }
            \Pimcore\Cache::clearAll();
            $this->priceModel->updateMasterTable();
            $failedRecords =$this->priceModel->getFailedRecordFromLogTable( $this->time);
            if(count( $failedRecords)>0){
                $this->priceModel->deleteFailedRecordsFromMaster($failedRecords);
                echo "Total ".count( $failedRecords)." faild record removed from master table".PHP_EOL;
            }

            \AppBundle\Helper\Common::endablePimCache();
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
                    'record' => isset($record['record']) ? $record['record'] : '',
                    'status' => $status,
                    'reason' => $msg,
                    'createdAt' => $this->time
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
                $this->priceModel->insertDataIntoTable($this->queryTableNewData, 'object_query_IFSEUProduct');
            }
            if(!empty($this->storeTableNewData)) {
                $this->priceModel->insertDataIntoTable($this->storeTableNewData, 'object_store_IFSEUProduct');
            }

            if(!empty($this->logArray)) {
                $this->priceModel->insertDataIntoTable($this->logArray, 'ifseu_material_list_price_import_log');
            }
        }
    }
