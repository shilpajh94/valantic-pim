<?php

namespace PTGEU\ImportBundle\Services;

use Exception;
use PTGEU\ImportBundle\Services\ImportService;
use \Pimcore\Model\Asset;
use Pimcore\Model\DataObject\PTGEUProduct;
class ProductAssetMappingService
{   
    private $db;

    private $assetConfigData;
   
    public function __construct()
    {
        $this->db = \Pimcore\Db::get();
        $this->assetConfigData = \Pimcore::getContainer()->get('import.config_provider_service')->getAssetConfig();
    }

    public function import(string $filePath, string $downloadOrMapping)
    {
        if (is_file($filePath)) {
            $csvFilePath = $filePath;
            $csvFilePath = str_replace("%20", " ", $csvFilePath);
            $csvInfo = ImportService::getCSVData($csvFilePath);

            if ($downloadOrMapping == 'D') {
                foreach($csvInfo['data'] as $rowData)
                {
                    if($rowData[0]!='' && is_dir($rowData[0]) && $rowData[4]!= '')
                    {
                        $this->createAsset($rowData[0], $rowData[4]);
                        $innerFolder = $this->getChildFolderInAssetDirectory($rowData[0]);
                        foreach($innerFolder as $folder)
                        {
                            $rowData[0] = $rowData[0]."/".$folder;
                            $assetHierarchyPath = $this->resetPathSlash($rowData[4]).$folder;
                            $this->createAsset($rowData[0], $assetHierarchyPath);
                        }   
                    }
                }

            }
            if ($downloadOrMapping == 'M') {
                foreach($csvInfo['data'] as $rowData)
                {
                    if($rowData[4]!= '')
                    {
                        $getImagesDataByPath = $this->getImagesDataByPath($rowData[4]);
                        foreach($getImagesDataByPath as $assetObject)
                        {
                            $assetColumnName = $this->getColumnNameByFileName($assetObject->getFilename());
                            $this->savePTGEUProductColumn($rowData[1], $assetObject, $assetColumnName);
                        }
                        $getFolderDataByPath = $this->getFolderDataByPath($rowData[4]);
                        foreach($getFolderDataByPath as $assetFolderObject)
                        {
                            $getImagesDataByPath = $this->getImagesDataByPath($rowData[4].$assetFolderObject->getFilename()."/");
                            foreach($getImagesDataByPath as $assetObject)
                            {
                                $assetColumnName = $this->getColumnNameByFileName($assetObject->getFilename());
                                $this->savePTGEUProductColumn($rowData[1], $assetObject, $assetColumnName);
                            }
                        }   
                    }
                }

            }
        }
    }

    private function getColumnNameByFileName(string $fileName): string
    {
        $fileNameArr = explode("_", $fileName); 
        $columnName = $fileNameArr[count($fileNameArr)-1];
        $columnName = explode(".", $columnName);
        return $columnName[0]; 
    }

    private function savePTGEUProductColumn(string $productName, Asset $assetObject, string $columnName): void
    {
        $columnName = str_replace(" ","",$columnName);
        $pimColumnName = $this->getPimColumnName($columnName);
        if($pimColumnName != '')
        {
            $allProductObject = new PTGEUProduct\Listing();
            $allProductObject->setCondition("ProductName = ?", [$productName]);
            $allProductObject->load();
            foreach($allProductObject as $productObject)
            { 
                $fn = "set".$pimColumnName;
                $productObject->$fn($assetObject);
                $productObject->save();
            }
        }
    }

    private function getPimColumnName(string $columnName): string
    {
        if(isset($this->assetConfigData['parameters']['Attribute'][$columnName]['db_column_name']))
        {
            return ucfirst($this->assetConfigData['parameters']['Attribute'][$columnName]['db_column_name']);
        }
        return '';
    }

    private function getChildFolderInAssetDirectory(string $assetDirectoryPath): array
    {
        $folderData = scanDir($assetDirectoryPath);
        $childFolder = array();
        foreach($folderData as $fileName)
        {
            if($fileName != '. ' && $fileName != '..' && $fileName[0] != '.' && !pathinfo($assetDirectoryPath.'/'.$fileName, PATHINFO_EXTENSION))
            {
                $childFolder[] = $fileName;
            }
        }
        return $childFolder;
    }

    private function createAsset(string $assetDirectoryPath, string $assetHierarchyPath): void
    {
        $assetFolderId = $this->getFolderByPath($assetHierarchyPath);
        $folderData = scanDir($assetDirectoryPath);
        foreach($folderData as $fileName)
        {
            if($fileName != '. ' && $fileName != '..' && $fileName[0] != '.' && pathinfo($assetDirectoryPath.'/'.$fileName, PATHINFO_EXTENSION))
            {
                $assetObject = $this->checkIfAssetFileExists($fileName, $assetHierarchyPath); 
                if(!$assetObject)
                {
                    $content = file_get_contents($assetDirectoryPath.'/'.$fileName);
                    $this->saveAsset($fileName, $assetFolderId, $content); 
                }
            }
        }
    }

    private function resetPathSlash(string $path): string
    {
        if($path[0] != '/')
        {
            $path = "/".$path;
        }
        if($path[strlen($path)-1] != '/'){
            $path = $path."/";
        }
        return $path;
    }

    private function getFolderByPath(string $folderPath): string
    {
        $pathExists = Asset\Service::pathExists($folderPath);
        if (empty($pathExists)) {
            $folder = Asset\Service::createFolderByPath($folderPath);
        } else {
            $folder = Asset\Service::getElementByPath('asset', $folderPath);
        }
        return $folder->getId();
    }

    private function checkIfAssetFileExists(string $fileName, string $assetHierarchyFilePath): ? bool
    {
        $assetHierarchyFilePath = $this->resetPathSlash($assetHierarchyFilePath);
        $getAsset = new Asset\Listing();
        $getAsset->setCondition("filename = ? AND path = ?", [$fileName, $assetHierarchyFilePath]);
        if(empty($getAsset->load()))
        {
            return false;
        } 
        return true;
   
    }

    private function getImagesDataByPath(string $assetHierarchyFilePath): ? array
    {
        $assetHierarchyFilePath = $this->resetPathSlash($assetHierarchyFilePath);
        $getAsset = new Asset\Listing();
        $getAsset->setCondition("path = ? AND type = 'image'", [$assetHierarchyFilePath]);
        return $getAsset->load();
    }

    private function getFolderDataByPath(string $assetHierarchyFilePath): ? array
    {
        $assetHierarchyFilePath = $this->resetPathSlash($assetHierarchyFilePath);
        $getAsset = new Asset\Listing();
        $getAsset->setCondition("path = ? AND type = 'folder'", [$assetHierarchyFilePath]);
        return $getAsset->load();
    }

    private function saveAsset(string $name, string $parentId, string $data): void
    {
        $assetObj = new Asset();
        $assetObj->setParentId($parentId);
        $assetObj->setFilename($name);
        $filename = pathinfo($name, PATHINFO_FILENAME);
        $assetObj->setData($data);
        $assetObj->addMetadata("alt", "input", $filename, "");
        $assetObj->addMetadata("title", "input", $filename, "");
        $assetObj->addMetadata("description", "input", "", "");
        $assetObj->addMetadata("copyright", "input", "", "");
        $assetObj->addMetadata("tags", "input", "", "");
        $assetObj->save();  
    }


}
