<?php

namespace ImportBundle\Services\Model;

use Exception;
use Throwable;
use AppBundle\Logger\AppLogger as Logger;
use Pimcore\Model\DataObject;
use ImportBundle\Services\Import;
use ImportBundle\Services\ImportConstants;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Services\ImportProcessEmailNotificationService;

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
    private $datasource;
    private $assetFilePath;
    private $tblImpHelper;
    private $logArray;
    private $queryTableNewData;
    private $storeTableNewData;
    private $csvHeader;
    private $importProcessEmailNotificationObj;


    /**
     * @var Pimcore\Model\DataObject
     */
    private $mainClass = "\\Pimcore\\Model\\DataObject\\";

    private $products = [];

    /**
     * @var object
     */
    private $logger;

    public function __construct(ContainerInterface $container) {

        $this->container = $container;
        $this->datasource = 'FTP'; // "ASSETS" OR "FTP"

        $this->assetFilePath = '/Data Import Files/Price List/PIM_ListPrice.csv';

        //$this->common =$this->container->get('app.common_helper');

        $this->tblImpHelper =$this->container->get('import.sap_price_import_table_helper');
        $this->importProcessEmailNotificationObj = new ImportProcessEmailNotificationService;

//        $this->productHelper =$this->container->get('app.product_helper');
//        $this->catHelper =$this->container->get('app.category_helper');
//        $this->catInstance =$this->container->get('import.category_service');
//        $this->prdConfigData =$this->container->get('app.config_provider_service')->getProductConfig();
//        $this->startRow = $this->common->getParameterItem($this->prdConfigData, 'sheet', 'startRow');
//        $this->columnName = $this->common->getParameterItem($this->prdConfigData, 'sheet', 'columnName');
    }

    public function import()
    {
        \AppBundle\Helper\Common::clearAndDisablePimCache();
        $deletedPriceRecords = '';
        $csvData = $this->fetchDataFromDataSource();
        if (empty($csvData) || count($csvData)==0) {
            $message = "IFS-NA Price - No record found in file.";
            $this->importProcessEmailNotificationObj->sendMailNotification($message);
            return false;
        }
        $columnNames = ['Material Number','Sales Organization','Distribution Channel',
            'Validity End Date','Validity Start Date','Condition Type','Rate','Rate Unit'];
        $flag = 1;
        foreach(array_keys($this->csvHeader) as $column){
            p_r($column);
            if(in_array($column, $columnNames)) {
                $flag = 1;
            } else {
                $flag = 0;
                break;
            }
        }
        if($flag == 1){
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
            $j = 1;
            $length = 2000;
            while ($i<$deltaCount) {
                $a = time();
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
                $j++;
            }
            $this->tblImpHelper->updateMasterTable();

            \AppBundle\Helper\Common::endablePimCache();
        } else {
            $message = "IFS-NA Price - The uploaded file has wrong headers.";
            echo $message;
            $this->importProcessEmailNotificationObj->sendMailNotification($message);
        }
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
                'record' => isset($record['record']) ? $record['record'] : NULL,
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
                } else {
                    $sysFilePath = null;
                }
                break;
            case 'FTP':
                $sysFilePath = $this->fetchFileFromFTP();
                break;
            default:
                echo "Error case : Invalid Datasource";
                exit;
        }
        if (!empty($sysFilePath) && file_exists($sysFilePath)) {
            $csvInfo = Import::getCSVData($sysFilePath);
            try{
                $csvInfo = Import::getCSVData($sysFilePath);
            } catch (Exception $e) {
                $this->importProcessEmailNotificationObj->sendMailNotification(
                    "IFS-NA Price Import not performed - Error occured while reading CSV \n".$e->getMessage()
                );
            }
            $this->csvHeader = array_flip($csvInfo['header']);
            $dataArray = $csvInfo['data'];
        }
        return $dataArray;
    }

    public function fetchFileFromFTP() {
        $SFTPConObj = new \AppBundle\Lib\SFTPConnection(BW_SAP_IMPORT_SFTP_HOST, BW_SAP_IMPORT_SFTP_PORT);
        $SFTPConObj->login(BW_SAP_IMPORT_SFTP_USERNAME, BW_SAP_IMPORT_SFTP_PASSWORD);
        $filePathInfo = explode('/', BW_SAP_IMPORT_SFTP_PRICE_FILE_PATH);
        $fileName = array_pop($filePathInfo);
        $ftpFilePath = implode("/", $filePathInfo);
        $fileNameArray = explode(".", $fileName);
        $fileNamePrefix = $fileNameArray[0];
        $ext = $fileNameArray[1];
        $fileName = $fileNamePrefix."_".date("mdY").".".$ext;
        if (!$SFTPConObj->fileExists($ftpFilePath."/".$fileName)) {
        $fileName = $fileNamePrefix."_".date('mdY',strtotime("-1 days")).".".$ext;
        if (!$SFTPConObj->fileExists($ftpFilePath."/".$fileName)) {
        $msg = "IFS-NA Price - Today's and yesterday's import file not uploaded.";
        $this->importProcessEmailNotificationObj->sendMailNotification($msg);
        return null;
        }
        }
        $tmpFilePath = BW_SAP_IMPORT_SFTP_DOWNLOAD_TEMP_DIR. $fileName;

        $SFTPConObj->downloadFile($tmpFilePath, $ftpFilePath."/".$fileName);

        $SFTPConObj->moveFile($ftpFilePath."/".$fileName, BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH.$fileName);

        return $tmpFilePath;
    }
}
