<?php

namespace PTGEU\ImportBundle\Services;

use Exception;
use PTGEU\ImportBundle\Services\ImportService;
use PTGEU\ImportBundle\Constants;
use \Pimcore\Model\Asset;
use Pimcore\Model\DataObject\PTGEUProduct;
class ProductAssetMappingService
{   
    private $db;
   
    public function __construct()
    {
        $this->db = \Pimcore\Db::get();
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
        $sql="SELECT `hierarchyLevel5` FROM ".Constants::PTGEU_OBJECT_TABLE_NAME . " WHERE  o_key = '".$productName."'";
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
        $sql="SELECT `o_path`,`o_key`,`o_id` FROM ".Constants::PTGEU_OBJECT_TABLE_NAME . " WHERE  o_key = '".$productName."'";
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
        switch ($columnName) {
            case 'MainImage':
            case 'MainImage1':
                $productObject->setMainImage1($assetObject);
                $productObject->save();
                break;
            case 'MainImage2':
                $productObject->setMainImage2($assetObject);
                $productObject->save();
                break;
            case 'FullView':
            case 'FullView1':
                $productObject->setFullView1($assetObject);
                $productObject->save();
                break;
            case 'FullView2':
                $productObject->setFullView2($assetObject);
                $productObject->save();
                break;
            case 'HalfView':
            case 'HalfView1':
                $productObject->setHalfView1($assetObject);
                $productObject->save();
                break;
            case 'HalfView2':
                $productObject->setHalfView2($assetObject);
                $productObject->save();
                break;
            case 'HalfView3':
                $productObject->setHalfView3($assetObject);
                $productObject->save();
                break;
            case 'HalfView4':
                $productObject->setHalfView4($assetObject);
                $productObject->save();
                break;
            case 'TechnicalDrawing':
            case 'TechnicalDrawing1':
                $productObject->setTechnicalDrawing1($assetObject);
                $productObject->save();
                break;
            case 'TechnicalDrawing2':
                $productObject->setTechnicalDrawing2($assetObject);
                $productObject->save();
                break;
            case 'ApplicationImage1':
                $productObject->setApplicationImage1($assetObject);
                $productObject->save();
                break;
            case 'ApplicationImage2':
                $productObject->setApplicationImage2($assetObject);
                $productObject->save();
                break;
            case 'ApplicationImage3':
                $productObject->setApplicationImage3($assetObject);
                $productObject->save();
                break;
            case 'ApplicationImage4':
                $productObject->setApplicationImage4($assetObject);
                $productObject->save();
                break;
            case 'ApplicationImage5':
                $productObject->setApplicationImage5($assetObject);
                $productObject->save();
                break;
            case 'ApplicationImage6':
                $productObject->setApplicationImage6($assetObject);
                $productObject->save();
                break;
            case 'EpixImage1':
                $productObject->setEpixImage1($assetObject);
                $productObject->save();
                break;
            case 'EpixImage2':
                $productObject->setEpixImage2($assetObject);
                $productObject->save();
                break;
            case 'EpixImage3':
                $productObject->setEpixImage3($assetObject);
                $productObject->save();
                break;
            case 'EpixImage4':
                $productObject->setEpixImage4($assetObject);
                $productObject->save();
                break;
            default:
                echo "Error case : Invalid Column";
                exit;
        }
    }

}
