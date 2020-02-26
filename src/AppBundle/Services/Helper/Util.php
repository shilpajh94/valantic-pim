<?php
namespace AppBundle\Services\Helper;
use AppBundle\Services\Validator\Validator;
use Exception;

class Util {
    public $configuredData; // We will pull the data from configured class for this variable

    /* this function will validate imported excel file columns with main class
    and return the configured data with column indexs of file which is in process
    to import */
    public function validate($param = array())
    {
        // return true;
        $valObj = new Validator();
        $this->configuredData = $valObj->ValidateImportAndGetConfiguredData($param);
        if ($this->configuredData)
            return true;
        return false;
    }

    public function createPath($pathArr)
    {
        global $arrP;
        try {
            if (!empty($pathArr)) {
                foreach ($pathArr as $path) {
                    if (!empty($path)) {
                        if (!is_array($path)) {
                            $arrP[] = $path;
                        } else {
                            $this->createPath($path);
                        }
                    }
                }
                $str = implode("/", $arrP);
                unset($GLOBALS['arrP']);
                unset($arrP);
                return $str;
            } else {
                throw new Exception("Path should not empty");
            }
        } catch (\Throwable $th) {
            throw $th;
            // Logger::error($this->logFileName, $th);
            // echo $th->getMessage();
        }
    }

    public function getColumnIndex($colKeys)
    {
        $cols = $this->configuredData['colsIndex'];
        global $arrC;
        if (!empty($cols)) {
            if (!is_array($colKeys)) {
                if (array_key_exists($colKeys, $cols)) {
                    return $cols[$colKeys];
                }
            } else {
                foreach ($colKeys as $key) {
                    if (array_key_exists($key, $cols)) {
                        $arrC[] = $cols[$key];
                    }
                }
                $arrN = $arrC;
                unset($GLOBALS['arrC']);
                unset($arrC);
                return $arrN;
            }
        }
        return "";
    }

    public function moveFile($param) {
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
        if($ext) {
            $fileName = $fileObj->getFilename();
            $fileName = substr($fileName,0, strrpos($fileName, "."));
            $fileName = $fileName.'-'.$param['fileName'].'.'.$ext;
        }
        $newAsset->setFilename($fileName);
        
        switch($status) {
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
        $newAsset->save(["versionNote"=>"Import completed and status is $status, file path is: ".$fileObj->getFullPath()]);
        $fileObj->delete();
        return $newAsset;
    }

    public function getExt($fileName) {
        if(!empty($fileName)) {
            $arr = explode(".", $fileName);
            return end($arr);
        }
        return false;
    } 
}