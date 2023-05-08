<?php

namespace IFSEU\ImportBundle\Helper;
use Exception;
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
}
