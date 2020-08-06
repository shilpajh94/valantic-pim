<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ImportBundle\Services\Model;

use Exception;
use Pimcore\Model\Element\Service;
use Throwable;
use AppBundle\Logger\AppLogger as Logger;
use Pimcore\Model\DataObject;
use Pimcore\Model\Asset;
use ImportBundle\Services\Import;
use ImportBundle\Services\ImportConstants;

/**
 * Description of AssetImportModel
 *
 * @author rohitsrivastava
 */
class AssetImportModel {
    private $csvFilePath;
    private $assetsPath;
    private $csvArchivePath;
    private $csvHeader;
    private $dbModel;
    private $processedFileArray = [];
    private $ftpHandler;
    private $importType;

    const IMPORT_CONFIG = [
        "PTG" => [
                    "ID_COLUMN_INDEX" => 1,
                    "FILE_NAME_COLUMN_INDEX" => 3,
                    "ID_ATTRIBUTE" => "siopFullCode",
                    "ID_ATTRIBUTE_LABEL" => "SIOP full code"
        ],
        "IFS" => [
                    "ID_COLUMN_INDEX" => 0,
                    "FILE_NAME_COLUMN_INDEX" => 1,
                    "ID_ATTRIBUTE" => "o_key",
                    "ID_ATTRIBUTE_LABEL" => "Material Code"
                ],
    ];

    const STATUS_FAIURE = "FAILURE";
    const STATUS_COMPLETED = "COMPLETED";
    const STATUS_PRODUCT_NOT_FOUND = "PRODUCT_NOT_FOUND";
    const STATUS_IMAGE_FILE_NOT_FOUND = "IMAGE_FILE_NOT_FOUND";
    const STATUS_IDENTIFIER_NOT_VALID = "IDENTIFIER_NOT_VALID";

    const VALID_SIOP_LEVELS_FOR_PTG = ['5','6','SAP #'];

    public function __construct() {

        $this->datasource = 'LOCAL'; // "LOCAL" OR "FTP"
        // import type is concatenated to this path in changeInitialInstanceVariables function
        $this->csvFilePath = '/Data Import Files/Assets Import/Inbox'; // path to files to import
        // import type is concatenated to this path in changeInitialInstanceVariables function
        $this->csvArchivePath = '/Data Import Files/Assets Import/Archive'; // path to the archive folder
        // import type is concatenated to this path in changeInitialInstanceVariables function
        $this->assetPath = PIMCORE_PROJECT_ROOT."/OneTimeImport/Assets"; // system path of image files
        // import type is concatenated to this path in changeInitialInstanceVariables function
        $this->defaultAssetPath = '/Product Assets/Other Assets'; // folder to place the un-processed image files
        $this->dbModel = new \ImportBundle\Model\Import\AssetImport();

    }

    /**
     * make the instance variables import type specific
     * append the import type ( IFS or PTG ) to them
     *
     * @param string $importType
     */
    private function changeInitialInstanceVariables()
    {
        $importType = $this->importType;
        $this->csvFilePath = $this->csvFilePath."/".$importType;
        $this->csvArchivePath = $this->csvArchivePath."/".$importType;
        $this->assetPath = $this->assetPath."/".$importType;
        $this->defaultAssetPath = $this->defaultAssetPath."/".$importType;
    }

    public function import(string $importType) {

        $this->importType = $importType;
        $this->changeInitialInstanceVariables();

        if (strtolower($this->datasource) == 'ftp') {
            $this->ftpHandler = new \ImportBundle\Lib\FTPHandler();
            $this->ftpHandler->connect();
        }
        $csvFolder = Asset::getByPath($this->csvFilePath);
        if(!$csvFolder){
            $this->consoleLog("Import file source folder ".$this->csvFilePath." not found");
            return;
        }
        if ($csvFolder->hasChildren()) {
            $childrens = $csvFolder->getChildren();
            foreach ($childrens as $child) {

                $mime = $child->getMimetype();
                if ($mime == 'text/csv' || $mime == 'application/csv') {
                    $sysFilePath = $child->getFileSystemPath();
                    $csvInfo = Import::getCSVData($sysFilePath);

                    $this->csvHeader = $csvInfo['header'];
                    $dataArray = $csvInfo['data'];
                    $this->consoleLog("STARTING '" . $child->getFilename() . "' file import.-----------------");
                    $this->processCsvData($dataArray, $child->getFilename());
                }
//                $this->archiveCsvFile($child);
            }
            if (strtolower($this->datasource) == 'local') {
                $this->processRemainingAssets($this->assetPath);
            }
        }else{
            $this->consoleLog("No file found in source folder to import");
        }
        //print_r($this->processedFileArray); die;
    }

    private function processRemainingAssets($assetFolderPath) {
        $this->consoleLog("STARTING process for remaining image files.");
        if(!file_exists($assetFolderPath)){
            return ;
        }
        $dir = new \DirectoryIterator($assetFolderPath);
        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDot()) {
                if ($fileinfo->isDir()) {
                    $this->processRemainingAssets($fileinfo->getPathname());
                } else {
                    $sourceFilename = $fileinfo->getFileName();

                    if (!in_array(strtolower($sourceFilename), $this->processedFileArray)) {
                        echo $sourceFilename.PHP_EOL;
                        $this->consoleLog("Moving file '" . $sourceFilename . "' to configured default pimcore path.");
                        $this->processedFileArray[] = strtolower($sourceFilename);
                        $sourceFilename = Service::getValidKey($sourceFilename,"asset");

                        $assetFolderId = $this->getFolderByPath($this->defaultAssetPath);
                        $assetFullPath = $this->defaultAssetPath."/".$sourceFilename;
                        $content = file_get_contents($fileinfo->getPathname());
                        $assetObj = $this->saveAsset($sourceFilename, $assetFolderId, $content, $assetFullPath);
                    }
                }
            }
        }
    }

    private function processCsvData($csvData, $importFileName) {
        $index = 1;

        $statusCountArray = [
            self::STATUS_FAIURE => 0,
            self::STATUS_COMPLETED => 0,
            self::STATUS_PRODUCT_NOT_FOUND => 0,
            self::STATUS_IMAGE_FILE_NOT_FOUND => 0,
            self::STATUS_IDENTIFIER_NOT_VALID => 0
        ];

        $idColumnIndex = self::IMPORT_CONFIG[$this->importType]["ID_COLUMN_INDEX"];
        $idAttribute = self::IMPORT_CONFIG[$this->importType]["ID_ATTRIBUTE"];
        $fileNameColumnIndex = self::IMPORT_CONFIG[$this->importType]["FILE_NAME_COLUMN_INDEX"];
        $idAttributeLabel = self::IMPORT_CONFIG[$this->importType]["ID_ATTRIBUTE_LABEL"];

        $logFileName = $this->importType."_asset_import_".basename($importFileName)."_log.csv";
        $csvLogFilePath = PIMCORE_LOG_DIRECTORY."/".$logFileName;
        $csvLogFileHandle = fopen($csvLogFilePath,"w");


        if($this->importType == "PTG"){
            $idAttributeLabel .= "/SAP #";
        }
        $this->csvLog($csvLogFileHandle,array("Import Sheet Row Number",$idAttributeLabel,"Status","Comment"));

        foreach ($csvData as $row) {

            $status = self::STATUS_FAIURE;

            $idValue = $row[$idColumnIndex];
            $assetFilePath = $row[$fileNameColumnIndex];

            $assetNameArray = explode('/', $assetFilePath);
            $assetFilename = $assetNameArray[count($assetNameArray)-1];
            $assetInfo = $this->checkIfAssetFileExists($assetFilename, $assetFilePath);
            if(is_numeric($idValue)){
                if ($assetInfo['success']) {
                    $this->processedFileArray[] = strtolower($assetFilename);
                    $assetFilename = Service::getValidKey($assetFilename, 'asset');
                    if($this->importType == "IFS"){
                        $articleDetails = $this->dbModel->getProductByAttribute($idValue,$idAttribute, $this->importType);
                    }elseif ($this->importType == "PTG"){
                        $siopLevelOrSap = $row[0];
                        if(!in_array(trim($siopLevelOrSap), self::VALID_SIOP_LEVELS_FOR_PTG)){
                            $status = self::STATUS_IDENTIFIER_NOT_VALID;
                            $comment = "SIOP level found is " . $siopLevelOrSap . ", image can not be mapped at this level.";
                            $statusCountArray[$status]++;
                            $this->csvLog($csvLogFileHandle,array(($index + 1),$idValue,$status,$comment));
                            $index++;
                            continue;
                        }
                        if( trim($siopLevelOrSap) != "SAP #" && strpos($idValue,'0') != 0 ){
                            // some of the values in siop code do not have 0 in start
                            $idValue = '0' . $idValue;
                        }
                        $articleDetails = $this->dbModel->getProductByAttribute($idValue,$idAttribute, $this->importType, $siopLevelOrSap);
                    }
//                $articleDetails = $this->dbModel->getProductByOldMaterialCode($articleCode);
                    if (!empty($articleDetails) && count($articleDetails)>0) {
                        $siopPath = $articleDetails[0]['siopFullPath'];
                        $objId = $articleDetails[0]['o_id'];
                        $assetPath = $this->getAssetPathFromSiopPath($siopPath);
                        $assetFolderId = $this->getFolderByPath($assetPath);

                        $assetFullPath = $assetPath."/".$assetFilename;
                        $assetObj = $this->saveAsset($assetFilename, $assetFolderId, $assetInfo['content'], $assetFullPath);
//                    echo $objId."===".$assetObj->getId().PHP_EOL;

                        $obj = DataObject::getById($objId);
                        $obj->setMainImage($assetObj);
                        $obj->save();
                        $status = self::STATUS_COMPLETED;
                    } else {
                        $status = self::STATUS_PRODUCT_NOT_FOUND;
                        $assetFolderId = $this->getFolderByPath($this->defaultAssetPath);
                        $assetFullPath = $this->defaultAssetPath."/".$assetFilename;
                        $assetObj = $this->saveAsset($assetFilename, $assetFolderId, $assetInfo['content'], $assetFullPath);
                    }
                } else {
                    $status = self::STATUS_IMAGE_FILE_NOT_FOUND;
//                $msg = "File " . $assetFilename . " not found in source folder. CSV row no. " . $index . PHP_EOL;
//                $this->consoleLog($msg);
                }
            }else{
                $status = self::STATUS_IDENTIFIER_NOT_VALID;
            }

            $statusCountArray[$status]++;
            $this->csvLog($csvLogFileHandle,array(($index + 1),$idValue,$status,""));

            $msg = "CSV row " . ($index + 1) . "," . $idAttributeLabel . ": " . "'" . $idValue . "'" . ", status: " . "[" . $status . "]";
            $this->consoleLog($msg);
            $index++;
        }
        $this->consoleLog("-------------------------------SUMMARY------------------------------------");
        $this->consoleLog("Total records processed -> " . ($index - 1));
        foreach($statusCountArray as $status => $count){
            $msg = $status . " count -> " . $count;
            $this->consoleLog($msg);
        }
        $this->consoleLog("-------------------------------SUMMARY------------------------------------");
        fclose($csvLogFileHandle);

    }

    private function saveAsset($name, $parentId, $data, $fullPath) {
        $assetObj = Asset::getByPath($fullPath);
        if (empty($assetObj)) {
            $assetObj = new Asset();
            $assetObj->setParentId($parentId);
            $assetObj->setFilename($name);
        }
        $assetObj->setData($data);
        $assetObj->save();
        return $assetObj;
    }

//    private function checkIfAssetExists($assetPath) {
//        $assetObj = Asset::getByPath($assetPath);
//        if (!empty
//    }

    private function checkIfAssetFileExists($assetFilename, $assetPath) {
        switch ($this->datasource) {
            case 'LOCAL':
                $assetFilePath = $this->assetPath.'/'.$assetFilename;
                if ( $assetFilename && file_exists($assetFilePath)) {
                    return [
                        'success' => true,
                        'content' => file_get_contents($assetFilePath)
                    ];
                } else {
                    return [
                        'success' => false
                    ];
                }
                break;
            case 'FTP':
                $response = $this->ftpHandler->getFtpFileContent($assetPath, $assetFilename);
                if ($response) {
                    return [
                        'success' => true,
                        'content' => $response
                    ];
                } else {
                    return [
                        'success' => false
                    ];
                }
            default:
                echo "Error case : Invalid Datasource";
                exit;
        }
    }

    private function getAssetPathFromSiopPath($siopPath) {
        $search = '/Master List/SIOP Master List/SIOP Engineered Products';
        $replace = '/Product Assets';
        return str_replace($search, $replace, $siopPath);
    }
    private function archiveCsvFile($csvFileObject) {
        $archiveFolderId = $this->getFolderByPath($this->csvArchivePath);
        $csvFileObject->setParentId($archiveFolderId);
        $csvFileObject->save();
    }

    public function getFolderByPath($folderPath) {
        $pathExists = Asset\Service::pathExists($folderPath);
        if (empty($pathExists)) {
            $folder = Asset\Service::createFolderByPath($folderPath);
        } else {
            $folder = Asset\Service::getElementByPath('asset', $folderPath);
        }
        return $folder->getId();
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

    private function csvLog($logHandler,array $dataRow)
    {
        $csvDelimiter = ",";

        fputcsv($logHandler,$dataRow,$csvDelimiter);
    }

}
