<?php

namespace PTGEU\ImportBundle\Services;

use Exception;
use PTGEU\ImportBundle\Services\ImportService;
use \Pimcore\Model\Asset;
use Pimcore\Model\DataObject\PTGEUProduct;
use PTGEU\ImportBundle\Model\ProductModel;
use Pimcore\Db;
use Pimcore\Model\DataObject;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ProductAssetMappingService
{
    private $db;

    private $assetConfigData;

    private $productModel;
    private $container;
   
    public function __construct(ContainerInterface $container)
    {
        $this->db = Db::get();
        $this->container = $container;
        $this->productModel    = new ProductModel($this->container);
        $this->assetConfigData = $this->container->get('import.config_provider_service')->getAssetConfig();
    }

    public function import(string $filePath, string $downloadOrMapping): void
    {
        if (is_file($filePath)) {
            $csvFilePath = $filePath;
            $csvFilePath = str_replace("%20", " ", $csvFilePath);
            $csvInfo = ImportService::getCSVData($csvFilePath);

            if ($downloadOrMapping == 'D') {
                foreach($csvInfo['data'] as $rowData)
                {
                    if($rowData[0]!='' && is_dir($rowData[0]) && $rowData[2]!= '')
                    {
                        $this->createAsset($rowData, $rowData[2]);
                        $innerFolder = $this->getChildFolderInAssetDirectory($rowData[0]);
                        foreach($innerFolder as $folder)
                        {
                            $rowData[0] = $rowData[0]."/".$folder;
                            $assetHierarchyPath = $this->resetPathSlash($rowData[2]).$folder;
                            $this->createAsset($rowData, $assetHierarchyPath);
                        }
                    } else {
                        $this->createAssetLog($rowData, 'Download');
                    }
                }

            }
            if ($downloadOrMapping == 'M') {
                foreach($csvInfo['data'] as $rowData)
                {
                    if($rowData[2]!= '')
                    {
                        $getImagesDataByPath = $this->getImagesDataByPath($rowData[2]);
                        if(count($getImagesDataByPath) == 0)
                        {
                            $this->insertLog($rowData, 'Mapping', 'Failed',
                            'Hierarchy path doesn`t exist or haven`t assets in pimcore !!', '');
                        }
                        foreach($getImagesDataByPath as $assetObject)
                        {
                            $assetColumnName = $this->getColumnNameByFileName($assetObject->getFilename());
                            $this->savePTGEUProductColumn($rowData, $assetObject, $assetColumnName);
                        }
                        $getFolderDataByPath = $this->getFolderDataByPath($rowData[2]);
                        foreach($getFolderDataByPath as $assetFolderObject)
                        {
                            $getImagesDataByPath = $this->getImagesDataByPath($rowData[2].
                            $assetFolderObject->getFilename()."/");
                            foreach($getImagesDataByPath as $assetObject)
                            {
                                $assetColumnName = $this->getColumnNameByFileName($assetObject->getFilename());
                                $this->savePTGEUProductColumn($rowData, $assetObject, $assetColumnName);
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

    private function savePTGEUProductColumn(array $rowData, Asset $assetObject, string $columnName): void
    {
        $productName = $rowData[1];
        $columnName = str_replace(" ","",$columnName);
        $pimColumnName = $this->getPimColumnName($columnName);
        if($pimColumnName != '')
        {
            $allProductObject = new PTGEUProduct\Listing();
            $allProductObject->setCondition(" ProductName   = :productName AND
            productType = :productType ", ["productName" => $productName, "productType" => "base"]);
            $allProductObject->load();
            $i = 0;

            foreach($allProductObject as $productObject)
            {
                try{
                    $fn = "set".$pimColumnName;
                    $productObject->$fn($assetObject);
                    $productObject->save();
                    $i++;
                    $this->insertLog($rowData, 'Mapping', 'Success',
                    'Mapped with productId'.$productObject->getId(), $assetObject->getFilename());
                } catch (Exception $exception){
                    $this->insertLog($rowData, 'Mapping', 'Failed', $exception->getMessage().'||
                     Unable to map with '.$productObject->getId(), $assetObject->getFilename());
                    echo "Mapping failed - ".$assetObject->getFilename()." to ".$productName." due to "
                    .$exception->getMessage()."\n";
                }
            }
            echo "$i assests mapped " . $assetObject->getFilename(). " for ". $productName ."\n";
            
        } else {
            $this->insertLog($rowData, 'Mapping', 'Failed', 'Invalid Column Name', $assetObject->getFilename());
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
            if($fileName != '. ' && $fileName != '..' && $fileName[0] != '.' &&
             !pathinfo($assetDirectoryPath.'/'.$fileName, PATHINFO_EXTENSION))
            {
                $childFolder[] = $fileName;
            }
        }
        return $childFolder;
    }

    private function createAsset(array $rowData, string $assetHierarchyPath): void
    {
        echo "Processing ".$rowData[0]."\n";
        $assetDirectoryPath = $rowData[0];
        $assetFolderId = $this->getFolderByPath($assetHierarchyPath);
        $folderData = scanDir($assetDirectoryPath);
        foreach($folderData as $fileName)
        {
            if($fileName != '. ' && $fileName != '..' && $fileName[0] != '.' &&
             pathinfo($assetDirectoryPath.'/'.$fileName, PATHINFO_EXTENSION))
            {
                $assetObject = $this->checkIfAssetFileExists($fileName, $assetHierarchyPath);
                echo "Downloading ".$fileName." from".$rowData[0]."\n";
                if(!$assetObject)
                {
                    $content = file_get_contents($assetDirectoryPath.'/'.$fileName);
                    try{
                        $this->saveAsset($fileName, $assetFolderId, $content);
                        $this->insertLog($rowData, 'Download', 'Success', '', $fileName);
                        echo "Download ".$fileName."from ".$rowData[0]."\n";
                    } catch (Exception $exception)
                    {
                        $this->insertLog($rowData, 'Download', 'Failed', $exception->getMessage(), $fileName);
                        echo "Download failed ".$fileName." from ".$rowData[0]." due to ".$exception->getMessage()."\n";
                    }
                } else{
                    echo "Download failed ".$fileName." from ".$rowData[0]." due to duplicate asset. \n";
                    $this->insertLog($rowData, 'Download', 'Failed', 'Duplicate !!
                     Already exist in pimcore', $fileName);
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

    private function createAssetLog(array $rowData, string $type): void
    {
        if($rowData[0]!='' && !is_dir($rowData[0]) && $rowData[2] != '')
        {
            $this->insertLog($rowData, $type, 'Failed', 'Asset folder path doesn`t exist !!', '');
        }  elseif($rowData[0]!='' && is_dir($rowData[0]) && $rowData[2] == '')
        {
            $this->insertLog($rowData, $type, 'Failed', 'Hierarchy path doesn`t defined !!', '');
        }
    }

    private function insertLog(array $rowData, string $type, string $statusCode,
     string $statusMessage, string $imageName): void
    {
        $sql = "INSERT INTO `ptgeu_asset_import_log` ";
        $sql .= "(`productName`, `statusCode`, `statusMessage`, `type`, `folderPath`, `hierarchyPath`, `imageName`)";
        $sql .= " VALUES ('".$rowData[1]."', '".$statusCode."', '".$statusMessage."',
         '".$type."', '".$rowData[0]."', '".$rowData[2]."', '".$imageName."' )";
        $this->db->query($sql);
    }


}
