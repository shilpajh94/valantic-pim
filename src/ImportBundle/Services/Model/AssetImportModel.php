<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ImportBundle\Services\Model;

use Exception;
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
    

    //put your code here
    public function __construct() {
        
        $this->datasource = 'LOCAL'; // "LOCAL" OR "FTP"
        $this->csvFilePath = '/Data Import Files/Assets Import/Inbox';
        $this->csvArchivePath = '/Data Import Files/Assets Import/Archive';
        $this->assetPath = PIMCORE_PROJECT_ROOT."/OneTimeImport/Assets";
        $this->defaultAssetPath = '/Product Assets/Other Assets';
        $this->dbModel = new \ImportBundle\Model\Import\AssetImport();
    }
    
    public function import() {
        $csvFolder = Asset::getByPath($this->csvFilePath);
        if ($csvFolder->hasChildren()) {
            $childrens = $csvFolder->getChildren();
            foreach ($childrens as $child) {
                $mime = $child->getMimetype();
                if ($mime == 'text/csv' || $mime == 'application/csv') {
                    $sysFilePath = $child->getFileSystemPath();
                    $csvInfo = Import::getCSVData($sysFilePath);
                    $this->csvHeader = $csvInfo['header'];
                    
                    $dataArray = $csvInfo['data'];
                    $this->processCsvData($dataArray);
                }
                $this->archiveCsvFile($child);
            }
            $this->processRemainingAssets($this->assetPath);
        }
        print_r($this->processedFileArray); die;
    }
    
    private function processRemainingAssets($assetFolderPath) {
        $dir = new \DirectoryIterator($assetFolderPath);
        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDot()) {
                if ($fileinfo->isDir()) {
                    $this->processRemainingAssets($fileinfo->getPathname());
                } else {
                    $sourceFilename = $fileinfo->getFileName();
                    
                    if (!in_array(strtolower($sourceFilename), $this->processedFileArray)) {
                        echo $sourceFilename.PHP_EOL; 
                        $assetFolderId = $this->getFolderByPath($this->defaultAssetPath);
                        $assetFullPath = $this->defaultAssetPath."/".$sourceFilename;
                        $content = file_get_contents($fileinfo->getPathname());
                        $assetObj = $this->saveAsset($sourceFilename, $assetFolderId, $content, $assetFullPath);
                        $this->processedFileArray[] = strtolower($sourceFilename);
                    }
                }
            }
        }
    }
    
    private function processCsvData($csvData) {
        $index = 1;
        
        foreach ($csvData as $row) {
            $articleCode = $row[0];
            $assetName = $row[1];
            $assetNameArray = explode('/', $assetName);
            $assetFilename = $assetNameArray[count($assetNameArray)-1];
            $assetInfo = $this->checkIfAssetFileExists($assetFilename);
            if ($assetInfo['success']) {
                $this->processedFileArray[] = strtolower($assetFilename);
                $articleDetails = $this->dbModel->getProductByOldMaterialCode($articleCode);
                if (!empty($articleDetails) && count($articleDetails)>0) {
                    $siopPath = $articleDetails[0]['siopFullPath'];
                    $objId = $articleDetails[0]['o_id'];
                    $assetPath = $this->getAssetPathFromSiopPath($siopPath);
                    $assetFolderId = $this->getFolderByPath($assetPath);
                    
                    $assetFullPath = $assetPath."/".$assetFilename;
                    $assetObj = $this->saveAsset($assetFilename, $assetFolderId, $assetInfo['content'], $assetFullPath);
                    echo $objId."===".$assetObj->getId().PHP_EOL;
                    
                    $obj = DataObject::getById($objId);
                    $obj->setMainImage($assetObj);
                    $obj->save();
                } else {
                    $assetFolderId = $this->getFolderByPath($this->defaultAssetPath);
                    $assetFullPath = $this->defaultAssetPath."/".$assetFilename;
                    $assetObj = $this->saveAsset($assetFilename, $assetFolderId, $assetInfo['content'], $assetFullPath);
                }
            } else {
                echo $msg = 'Asset file name not exists in assets source'.PHP_EOL;
            }
            $index++;
//            if($index==20) {
//                break;
//            }
        }
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
    
    private function checkIfAssetFileExists($assetFilename) {
        switch ($this->datasource) {
            case 'LOCAL':
                $assetFilePath = $this->assetPath.'/'.$assetFilename;
                if (file_exists($assetFilePath)) {
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
    
}
