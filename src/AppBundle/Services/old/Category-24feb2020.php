<?php
/* Backup File
    Date: 24th Feb 2020 5:30 PM
*/
namespace AppBundle\Services;

use Exception;
use Pimcore\Model\DataObject;
use Throwable;
use AppBundle\Services\Validator\Validator;
use AppBundle\Controller\LogController as Logger;
class Category
{
    public $filePath;
    public $configuredData; // We will pull the data from configured class for this variable
    private $mappedClass;
    private $logFileName;
    public function config($param = array())
    {        
        try {
            $this->updateDefaults($param);
            if ($this->validate($param)) {
                $spreadsheet = Import::load($this->filePath);
                if ($spreadsheet) {
                    $this->import($spreadsheet);
                }
            } else {
                throw new Exception();
            }
        } catch (\Throwable $th) {
            //throw $th;
            Logger::error($this->logFileName, $th);
            // echo $th->getMessage();
            die;
        }
    }

    /* this function will validate imported excel file columns with main class
    and return the configured data with column indexs of file which is in process
    to import */
    public function validate($param = array())
    {
        $valObj = new Validator();
        $this->configuredData = $valObj->ValidateImportAndGetConfiguredData($param);        
        if ($this->configuredData)
            return true;
        return false;
    }

    public function import($spreadsheet)
    {
        $activeSheet = $spreadsheet->getActiveSheet()->toArray();
        $configData = $this->configuredData['configuredClassData'];

        foreach ($activeSheet as $rowCnt => $reader) {
            if ($rowCnt === 0) {
                continue;
            }

            /* New Code */
            if (isset($configData['isTree']) && $configData['isTree']) {
                foreach ($configData['level'] as $l => $fields) {
                    /* Create or Update Level 1 */
                    $param = array(
                        'reader' => $reader,
                        'level' =>  $fields
                    );
                    $this->creatOrUpdateCategory($param);
                }
            }
        }
    }
    private function creatOrUpdateCategory(array $row)
    {
        $catObj = new $this->mappedClass;
        /* 
            p_r(array_keys($catObj->getClass()->getFieldDefinitions()));
            it Will return list of properties defined in the class
            I will use it to validate with excel and csv header
         */
      

        $reader = $row['reader'];
        $level = $row['level'];
        /* 
        subPath is an array containing excel/csv column list, we will use getColumnIndex function
        to get list of index excel column to extract data from excel/csv row
        */
        $subPath = $this->getColumnIndex($level['subPath']);
        $subPathArr = array();
        if($subPath && is_array($subPath)) {
            foreach($subPath as $pathIndex) {
                $subPathArr[] = $reader[$pathIndex];
            }
        }
        // p_r($subPathArr);
        $fullPath = $this->createPath([$level['parentPath'], $subPathArr]);
        $parentInfo = DataObject::getByPath($fullPath);
        $colsIndex = $this->configuredData['colsIndex'];
        $catLevel = $level['Level'];
        $keyIndex = $this->getColumnIndex($level['key']);
        /* Key will be mandatory field */
        if(empty($reader[$keyIndex])) {
            // Logger
        }

        $objectPath = $this->createPath([$level['parentPath'], $subPathArr, $reader[$keyIndex]]);
        $objectInfo = DataObject::getByPath($objectPath);

        /* Checking Object does exist or not */
        if (empty($objectInfo)) {
            /* Creating and configure object with basic info */
            $catObj = new $this->mappedClass;
            $catObj->setParentId($parentInfo->getId());
            $catObj->setKey($reader[$keyIndex]);
        } else {
            /* Getting alredy exist object reference */
            $catObj = DataObject::getById($objectInfo->getId());
            $catObj->setParentId($parentInfo->getId());
        }

        /* End */
        $bzUnit = isset($level['BusinessUnit']) && !empty($level['BusinessUnit']) ? $level['BusinessUnit'] : 'IFS';
        $industry = isset($level['Industry']) && !empty($level['Industry']) ? $level['Industry'] : 'None';

        $siopLevel = isset($level['Level']) && !empty($level['Level']) ? $level['Level'] : 02;

        $codeIndex = $this->getColumnIndex($level['code']);
        $code = isset($codeIndex) && isset($reader[$codeIndex]) ? $reader[$codeIndex] : '';

        $fullCodeIndex = $this->getColumnIndex($level['FullCode']);
        $fullCode = isset($fullCodeIndex) && isset($reader[$fullCodeIndex]) ? $reader[$fullCodeIndex] : '';

        $parentCatCode = 'object' === strtolower($parentInfo->getType()) ? $parentInfo->getCode() : $code;

        $parentObjectId = $parentInfo->getId();

        $descriptionIndex = $this->getColumnIndex($level['description']);
        $description = isset($descriptionIndex) && isset($reader[$descriptionIndex]) ? $reader[$descriptionIndex] : '';
        


        /* Updating Object Here */
        $catObj->setBusinessUnit($bzUnit);
        $catObj->setIndustry($industry);
        $catObj->setLevel($siopLevel);
        $catObj->setCode($code);
        $catObj->setFullCode($fullCode);
        $catObj->setParentCategoryCode($parentCatCode);
        $catObj->setParentObjectId($parentObjectId);
        $catObj->setDescription($description, 'en');
        $catObj->setPublished(1);
        $catObj->save();
        return $catObj->getId();
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
            //throw $th;
            Logger::error($this->logFileName, $th);
            // echo $th->getMessage();
        }
    }
    public function getColumnIndex($colKeys)
    {
        $cols = $this->configuredData['colsIndex'];
        global $arrC;
        if (!empty($cols)) {
            if(!is_array($colKeys)) {
                if (array_key_exists($colKeys, $cols)) {
                    return $cols[$colKeys];
                }
            } else {
                foreach($colKeys as $key) {
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

    /* This function will override the default configuration */
    private function updateDefaults($params)
    {
        if (!empty($params)) {
            foreach ($params as $k => $v) {
                if(property_exists($this, $k)) {
                    $this->$k = $v;
                }
                
            }
        }
    }

}
