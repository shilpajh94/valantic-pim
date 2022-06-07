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

    public function import($filePath)
    {
        if (is_file($filePath)) {
            $csvFilePath = $filePath;
            $csvFilePath = str_replace("%20", " ", $csvFilePath);
            $csvInfo = ImportService::getCSVData($csvFilePath);
            foreach($csvInfo['data'] as $rowData)
            { 
                if($rowData[0]!='' && is_dir($rowData[0]) && $this->checkProductExist($rowData[1]))
                {
                    $dataRow = $this->getProductHierarchyRow($rowData[1]);
                    $assetHierarchyPath = $this->getAssetHierarchyPathByProductPath($dataRow);
                    $productObject = PTGEUProduct::getById($dataRow['o_id'], true);
                    $this->createAssetAndMapAssetToProduct($rowData[0], $assetHierarchyPath, $productObject);
                    $innerFolder = $this->getChildFolderInAssetDirectory($rowData[0]); 
                    foreach($innerFolder as $folder)
                    {
                        $rowData[0] = $rowData[0]."/".$folder;
                        $assetHierarchyPath = $assetHierarchyPath."/".$folder;
                        $this->createAssetAndMapAssetToProduct($rowData[0], $assetHierarchyPath, $productObject);
                    }
                }
            
            }
        }
    }

    private function getAssetHierarchyPathByProductPath(array $dataRow): string
    {
        $fullPathArray = explode("/",$dataRow['o_path']);
        $dataRow['o_path'] = "/".$fullPathArray[3]."/".$fullPathArray[4]."/".$fullPathArray[5]."/".$fullPathArray[6]."/";
        return $dataRow['o_path'].$dataRow['o_key'];
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

    private function createAssetAndMapAssetToProduct(string $assetDirectoryPath, string $assetHierarchyPath, PTGEUProduct $productObject): void
    {
        $assetFolderId = $this->getFolderByPath($assetHierarchyPath);
        $folderData = scanDir($assetDirectoryPath);
        foreach($folderData as $fileName)
        {
            if($fileName != '. ' && $fileName != '..' && $fileName[0] != '.' && pathinfo($assetDirectoryPath.'/'.$fileName, PATHINFO_EXTENSION))
            {
                $assetObject = $this->checkIfAssetFileExists($assetHierarchyPath.'/'.$fileName); 
                if(!$assetObject)
                {
                    $content = file_get_contents($assetDirectoryPath.'/'.$fileName);
                    $assetObject = $this->saveAsset($fileName, $assetFolderId, $content, $assetHierarchyPath.'/'.$fileName);  
                }
                $assetColumnName = $this->getColumnNameByFileName($fileName);
                $this->savePTGEUProductColumn($productObject, $assetObject, $assetColumnName); 
            }
        }
    }

    private function checkProductExist(string $productName): bool
    {
        try {
        $sql="SELECT `hierarchyLevel5` FROM ".PTGEU_OBJECT_TABLE_NAME . " WHERE  o_key = '".$productName."'";
        $resultArray = $this->db->fetchAll($sql);
        if(empty($resultArray))
        {
            return false;
        }
        } catch(Exception $e){
            echo "Error in ".$productName." :-".$e->getMessage();
            return false;
        }
        return true;
    }

    private function getProductHierarchyRow(string $productName): array
    {
        $sql="SELECT `o_path`,`o_key`,`o_id` FROM ".PTGEU_OBJECT_TABLE_NAME . " WHERE  o_key = '".$productName."'";
        $result = $this->db->fetchAll($sql);
        return $result[0];
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

    private function saveAsset(string $name, string $parentId, string $data, string $fullPath): Asset
    {
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

    private function checkIfAssetFileExists(string $assetHierarchyFilePath): ? Asset
    {
        return Asset::getByPath($assetHierarchyFilePath);
    }

    private function getColumnNameByFileName(string $fileName): string
    {
        $fileNameArr = explode("_", $fileName); 
        $columnName = $fileNameArr[count($fileNameArr)-1];
        $columnName = explode(".", $columnName);
        return $columnName[0]; 
    }

    private function savePTGEUProductColumn(PTGEUProduct $productObject, Asset $assetObject, string $columnName): void
    {
        $columnName = str_replace(" ","",$columnName);
        $pimColumnName = $this->getPimColumnName($columnName);
        if($pimColumnName != '')
        {
            $fn = "set".$pimColumnName;
            $productObject->$fn($assetObject);
            $productObject->save();
        }
    }

    private function getPimColumnName(string $columnName)
    {
        if(isset($this->assetConfigData['parameters']['Attribute'][$columnName]['db_column_name']))
        {
            return ucfirst($this->assetConfigData['parameters']['Attribute'][$columnName]['db_column_name']);
        }
        return '';
    }

}
