<?php

namespace AppBundle\Helper;

use Exception;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Pimcore\Model\DataObject;
use ImportBundle\Services\ImportConstants;

class Common
{

    public function getParameter($data, $key) {
        if(!empty($data) && isset($data['parameters'])) {
            return isset($data['parameters'][$key])?$data['parameters'][$key]:false;       
        }
    }

    public function getInstance($service) {
        return \Pimcore::getContainer()->get($service);
    }

    public function getParameterItem($data, $key, $item) {
        if(!empty($data) && isset($data['parameters'])) {
            return isset($data['parameters'][$key])&&isset($data['parameters'][$key][$item])?$data['parameters'][$key][$item]:false;       
        }
    }

    public function moveFile($param)
    {
        /* 
            @$status: success or failed
            if success then move file to archive else move to failed folder
        */
        $filePath = $param['filePath'];
        $failedPath = $param['failedPath'];
        $archivePath = $param['archivePath'];
        $status = strtolower($param['status']);
        $fileObj = \Pimcore\Model\Asset::getByPath($filePath);
        $fileName = $fileObj->getFilename();
        $ext = $this->getExt($fileObj->getFilename());
        $newAsset = new \Pimcore\Model\Asset();
        if ($ext) {
            $fileName = $fileObj->getFilename();
            $fileName = substr($fileName, 0, strrpos($fileName, "."));
            $fileName = $fileName . '-' . $param['fileName'] . '.' . $ext;
        }
        $newAsset->setFilename($fileName);

        switch ($status) {
            case true:
                $parentInfo = \Pimcore\Model\Asset::getByPath($archivePath);
                $newAsset->setParentId($parentInfo->getId());
                $newAsset->setData(file_get_contents($fileObj->getFileSystemPath()));
                break;
            case false:
                $parentInfo = \Pimcore\Model\Asset::getByPath($failedPath);
                $newAsset->setParentId($parentInfo->getId());
                $newAsset->setData(file_get_contents($fileObj->getFileSystemPath()));
                break;
            default:
                throw new Exception('Issue in file moving after import ');
        }
        $newAsset->save(["versionNote" => "Import completed and status is $status, file path is: " . $fileObj->getFullPath()]);
        $fileObj->delete();
        return $newAsset;
    }

    public function getExt($fileName)
    {
        if (!empty($fileName)) {
            $arr = explode(".", $fileName);
            return strtolower(end($arr));
        }
        return false;
    }

    /**
     *  return quantity value unit id by quantity name
     */
    public function getQuantityValueUnitId($qtyName)
    {
        $unit = DataObject\QuantityValue\Unit::getByAbbreviation($qtyName);
        $unitId = (!is_null($unit)) ? $unit->getId() : '';
        return $unitId;
    }

    /**
     *  return quantity value with quantity unit
     */
    public function getDataQuantityValue($columnStdPackQty, $quantityValueUnitId){
        $quantityValue = new DataObject\Data\QuantityValue($columnStdPackQty, $quantityValueUnitId);
        return $quantityValue;
    }

    /**
     *  return corresponding value of a key from an array
     */
    public function getFieldValue($fileColumns, $rowvalue, $string){
        // $value = ($checkNumber == 'NUMBER') ? 0 : '';
        if(!empty($string))
        {
            if(in_array($string, $fileColumns))
            {
                $index = array_search($string, $fileColumns);
                $value = $rowvalue[$index];
                // $value = ($checkNumber == 'NUMBER' && ( strtoupper($rowvalue[$index]) == 'NULL' || is_null($rowvalue[$index]) || empty($rowvalue[$index]))) ? 0 :  $rowvalue[$index];
            }
        }
        return $value;
    }

    public function createKeyForObject($fileColumns, $data, $keyColumns, $mappingCsvColumn){
        $keyColumnValues = array();
        foreach($keyColumns as $key =>$keyColumn)
        {
            $column = $mappingCsvColumn[$keyColumn];
            $columnValue = $this->getFieldValue($fileColumns,$data,$column);
            $keyColumnValues[] = $columnValue;
        }

        $id = implode(ImportConstants::OBJECT_KEY_SEPARATOR, $keyColumnValues);
        return $id;
    }
}
