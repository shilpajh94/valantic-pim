<?php
/* Updating code, left due to time
Will have to continue from here when I came back from leave.
*/
namespace AppBundle\Services;

use Exception;
use Pimcore\Model\DataObject;
use Throwable;
use AppBundle\Services\Validator\Validator;
use AppBundle\Controller\LogController as Logger;
use Elements\Bundle\ProcessManagerBundle;

class Category
{
    public $filePath;
    public $configuredData; // We will pull the data from configured class for this variable
    private $mappedClass;
    private $logFileName;
    private $monitoringItem;
    private $totalSteps;
    private $currentStep;
    private $currentLevel;
    private $errors;
    private $reader;
    private $level;
    private $cek; // Current Error Key
    use ProcessManagerBundle\ExecutionTraitClass;
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
        $parentPath = $this->configuredData['configuredClassData']['root']['fullPath'];
        $rootParent = DataObject::getByPath($parentPath);

        $activeSheet = $spreadsheet->getActiveSheet()->toArray();
        /* Number of rows in a sheet */
        $totalRow = count($activeSheet);
        $this->totalSteps = $totalRow;
        /* Initilize monitoring item and set the number of steps will take to complete the task */
        $this->monitoringItem = ProcessManagerBundle\ElementsProcessManagerBundle::getMonitoringItem();
        $this->monitoringItem->setTotalSteps($this->totalSteps)->save();
        /* Letting know the Filepath is being processes */
        $this->monitoringItem->setMessage('File Information')->save();
        $this->monitoringItem->setMessage('File path is being imported: ' . $this->filePath)->save();
        /* Setting Parent Information in log */
        $this->monitoringItem->setMessage('Object and Parent Stats')->save();


        $configData = $this->configuredData['configuredClassData'];

        if ($rootParent->getId()) {
            $this->monitoringItem->setMessage('Root Parent: ' . $rootParent->getKey() . ', Type: ' . $rootParent->getType() . ', Id: ' . $rootParent->getId() . ', Path: ' . $rootParent->getFullPath())->save();

            /* Class info */
            $catObj = new $this->mappedClass;

            if (get_class($catObj)) {
                $this->monitoringItem->getLogger()->info('Processing Class: ' . get_class($catObj));


                /* 
            p_r(array_keys($catObj->getClass()->getFieldDefinitions()));
            it Will return list of properties defined in the class
            I will use it to validate with excel and csv header
         */
                
                foreach ($activeSheet as $rowCnt => $reader) {
                    if ($rowCnt === 0) {
                        continue;
                    }
                    $this->reader = $reader;
                    $this->currentStep = $rowCnt + 1;

                    /* New Code */
                    if (isset($configData['isTree']) && $configData['isTree']) {
                        foreach ($configData['level'] as $l => $fields) {
                            /* Create or Update Level 1 */
                            $this->level = $fields;
                            $param = array(
                                'reader' => $reader,
                                'level' =>  $fields
                            );
                            $this->creatOrUpdateCategory($param);
                        }
                    }
                }
            } else {               
                $this->monitoringItem->getLogger()->error('Please check command configuration, you might have defined wrong path of mapped class');
            }
        } else {
            $this->monitoringItem->getLogger()->error('Parent information has been not provided');
        }
        $this->monitoringItem->setWorkloadCompleted()->save();
        \Pimcore::collectGarbage();
        $this->monitoringItem->setMessage('Job finished')->setCompleted();
    }

    private function validateField() {
        $fieldValidationArr = $this->level['fieldValidation'];
        if(!empty($fieldValidationArr)) {
            foreach($fieldValidationArr as $k => $fldVal) {
                $colIndex = $this->getColumnIndex($this->level[$k]);
                if(isset($fldVal['callBack'])) {
                    if(isset($fldVal['callBack']['params'])) {
                        $paramArr = array();
                        foreach($fldVal['callBack']['params'] as $param) {
                            /* Row Index */
                            $ri = $this->getColumnIndex($this->level[$param]);
                            $paramArr[] = $this->reader[$ri];
                        }
                        $funcName = $fldVal['callBack']['funcName'];
                        if(!$this->$funcName($paramArr)) {
                            $this->cek = $k;
                            $this->updateError();
                            p_r($this->errors);die;
                        }
                    }
                }
            }
        }
    }

    private function updateError() {
        $fieldValidationArr = $this->level['fieldValidation'];
        if(!empty($fieldValidationArr)) {
            $errMsgs = $fieldValidationArr[$this->cek]['message'];
            if(!empty($errMsgs)) {
                foreach($errMsgs as $errMsg) {
                    $colKeys = array_map(array($this,'getColumnIndex'), $this->getColHeader($errMsg[1]));
                    $colHeader = $this->getColHeader($errMsg[1]);   
                    $this->errors[] = sprintf($errMsg[0], implode(',',$colHeader), $this->currentStep);
                }
            }
        }
    }

    private function isEmpty($param = array()) {
        if($param) {
            foreach($param as $v) {
                if(empty($v)) {
                    return false;
                }
            }
        }
    }

    private function getColHeader($arr) {
        $colHeader = array();
        foreach($arr as $ky) {
            $colHeader[] = $this->level[$ky];
        }
        return $colHeader;
    }

    private function getColVal($colIndex) {
        return $this->reader[$colIndex];
    }

    

    private function creatOrUpdateCategory($row = array())
    {
        $flag = true;
        $reader = $row['reader'];
        $level = $row['level'];
        $this->currentLevel = $level['Level'];
        /* 
        subPath is an array containing excel/csv column list, we will use getColumnIndex function
        to get list of index excel column to extract data from excel/csv row
        */
        $subPath = $this->getColumnIndex($level['subPath']);
        $subPathArr = array();
        if ($subPath && is_array($subPath)) {
            foreach ($subPath as $pathIndex) {
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
        /* Field Validation */
        if(isset($level['fieldValidation']) && !empty($level['fieldValidation'])) {
            $this->validateField();
        }
        die;
        if (empty($reader[$keyIndex])) {
            $flag = false;
            $this->monitoringItem->getLogger()->error("Skipping due to empty mandatory field, row number: " . $this->currentStep. ', Column: ' . $level['key']);
        }

        if ($flag) {
            $objectPath = $this->createPath([$level['parentPath'], $subPathArr, $reader[$keyIndex]]);
            $objectInfo = DataObject::getByPath($objectPath);

            /* Checking Object does exist or not */
            $objectProcessingMode = 'New Insertion';
            $objectActStatus = 'Processing ' . $reader[$keyIndex];
            if (empty($objectInfo)) {
                /* Creating and configure object with basic info */
                $catObj = new $this->mappedClass;
                $catObj->setParentId($parentInfo->getId());
                $catObj->setKey($reader[$keyIndex]);
            } else {
                /* Getting alredy exist object reference */
                $catObj = DataObject::getById($objectInfo->getId());
                $catObj->setParentId($parentInfo->getId());
                $objectProcessingMode = 'Updation';
            }
            /* Setting Process Manager current step */
            // $this->monitoringItem->setCurrentStep($this->currentStep)->setMessage('Processing Object (' . $objectProcessingMode . ') of class ' . get_class($catObj))->save();

            /* Setting current processing workload outof total workload */
            $this->monitoringItem->setCurrentWorkload($this->currentStep)
                ->setTotalWorkload($this->totalSteps)
                ->setDefaultProcessMessage(get_class($catObj))
                ->save();





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

            if ($catObj->getId()) {
                $objectActStatus .= ' , Status: Succeeded ';
                $this->monitoringItem->getLogger()->info($objectProcessingMode . ', ' . $objectActStatus . ', Object Id: ' . $catObj->getId());
            } else {
                $objectActStatus .= ' , Status: Failed ';
                $this->monitoringItem->getLogger()->error($objectProcessingMode . ', ' . $objectActStatus);
            }

            // $this->monitoringItem->getLogger()->info($this->monitoringItem->getMessage());
            return $catObj->getId();
        }
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

    /* This function will override the default configuration */
    private function updateDefaults($params)
    {
        if (!empty($params)) {
            foreach ($params as $k => $v) {
                if (property_exists($this, $k)) {
                    $this->$k = $v;
                }
            }
        }
    }
}
