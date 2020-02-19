<?php

namespace AppBundle\Services;

use Exception;
use Pimcore\Model\DataObject;
use Pimcore\Log\FileObject;
use Throwable;
use AppBundle\Services\Validator\Validator;
use AppBundle\Controller\LogController as Logger;
use Elements\Bundle\ProcessManagerBundle;
use AppBundle\Services\Helper\Util;

class Category
{
    public $name; // Command Name
    public $filePath;
    public $inboxFilePath;
    public $archiveDir;
    public $failedDir;
    public $configuredData; // We will pull the data from configured class for this variable
    private $mappedClass;
    private $validatorClass;
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
    const LOGGER_MODULE = 'SIOP IMPORT SHEET';
    const FILE_LAST_COL = 'D';
    public function __construct()
    {
        $this->util = new Util;
        /* Initilize monitoring item and set the number of steps will take to complete the task */
        $this->monitoringItem = ProcessManagerBundle\ElementsProcessManagerBundle::getMonitoringItem();
    }
    public function config($param = array())
    {
        try {
            $this->updateDefaults($param);
            $this->instance = new $this->validatorClass;
            $spreadsheet = Import::load($this->filePath);
            $result = $this->instance->validateSpreadSheet($spreadsheet);
            $this->configuredData = $this->instance->getAllProps();
            if(!$result['status']) {
                $this->monitoringItem->getLogger()->error($result['message']);
            }
            $this->import($spreadsheet);
            
        } catch (\Throwable $th) {
            //throw $th;
            Logger::error($this->logFileName, $th);
            // echo $th->getMessage();
            die;
        }
    }

    

    public function import($spreadsheet)
    {
        $activeSheet = $spreadsheet->getActiveSheet()->toArray();
        /* Number of rows in a sheet */
        $totalRow = count($activeSheet);
        $failedCnt = 0;
        $success = true;
        $this->totalSteps = $totalRow;
        $this->monitoringItem->setTotalSteps($this->totalSteps)->save();

        $this->monitoringItem->setMessage('File Information')->save();
        $this->monitoringItem->setMessage('File path is being imported: ' . $this->filePath)->save();
        /* Setting Parent Information in log */
        $this->monitoringItem->setMessage('Object and Parent Stats')->save();
        $sheetColumns = $this->configuredData['columns'];
        foreach ($activeSheet as $rowCnt => $reader) {
            if ($rowCnt == 0) {
                Import::setCell(self::FILE_LAST_COL.'1', 'Status');
                continue;
            }
            $flag = true;
            $this->reader = array_combine($sheetColumns, $reader);
            /* Validate each row's column value */
            $this->instance->rowCnt = $this->currentStep;
            $result = $this->instance->validateRow($this->reader);
            if(!$result['status']) {
                $success = false;
                $flag = false;
                $this->monitoringItem->getLogger()->error($result['message']);
            }

            $this->currentStep = $rowCnt + 1;
            $len = strlen($this->reader['code']);
            $levelInfo = $this->instance->getLevels($this->reader['code'], $this->reader['description']);
            // p_r($levelInfo);die;
            if ($levelInfo['status']) {
                if(!$this->createCategory($levelInfo['levels'])) {
                    $this->monitoringItem->getLogger()->error("Code '".$this->reader['code']."' failed to process");
                    $flag = false;
                    $success = false;
                }
            } else {
                /* Validation Error */
                // p_r($levelInfo['message']);
                $this->monitoringItem->getLogger()->error($levelInfo['message']);
                $flag = false;
                $success = false;
            }
            if(!$flag) {
                $failedCnt++;
                Import::setCell(self::FILE_LAST_COL.$this->currentStep, 'Failed');
            } else {
                Import::setCell(self::FILE_LAST_COL.$this->currentStep, 'Success');
            }
            /* if ($rowCnt > 5) {
                break;
            } */
        }

        $this->monitoringItem->setWorkloadCompleted()->save();
        \Pimcore::collectGarbage();
        $this->monitoringItem->setMessage('Job finished')->setCompleted();
        Import::save();
        /* Move imported file from inbox to archive or failed as per status */
        $moveParam = array(
            'filePath' => $this->inboxFilePath,
            'archivePath'   =>  $this->archiveDir,
            'failedPath'    =>  $this->failedDir,
            'status'        =>  $success,
            'fileName'      =>  $this->name.'-'.date('Ymd')
        );
        $movedAssetObj = $this->util->moveFile($moveParam);
        /* Set Application Logger Message */
        if($success) {
            \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->info("Category Imported successfully. <a href='".$movedAssetObj->getFileSystemPath()."'>Download Log</a>");
        } else {            
            $fileObject = new FileObject($movedAssetObj->getData());
            /* \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->error("Category Import command failed to import $failedCnt out of $totalRow. <a href='".$movedAssetObj->getFileSystemPath()."'>Download Log</a>",[
                'fileObject'    => $fileObject
            ]); */
            \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->error("Category Import command failed to import $failedCnt out of $totalRow. <a href='".$movedAssetObj->getFileSystemPath()."'>Download Log</a>");
        }
    }

    public function createCategory($levelInfo)
    {
        foreach ($levelInfo as $info) {            
            $parentObj = $this->getObjectByFullCode($info['parentFullCode'],$info['bu']);
            if (!empty($parentObj)) {
                /* Create or Update Object */
                if ($this->updateCategory($info, $parentObj)) {
                    return true;
                }
                return false;
            } else {
                $key = key($levelInfo);
                unset($levelInfo[$key]);
                $this->createCategory($levelInfo);
            }
            return $this->updateCategory($info);
        }
    }

    public function updateCategory($levelInfo, $parentObj = "")
    {
        $catObj = $this->getObjectByFullCode($levelInfo['fullCode'],$levelInfo['bu']);

        if (empty($catObj)) {
            $this->monitoringItem->setMessage('New Insertion ')->save();
            $catObj = new DataObject\Category();
        } else {
            $this->monitoringItem->setMessage('Updating '.$levelInfo['fullCode'].' '.$catObj->getId())->save();
            $catObj = DataObject::getById($catObj->getId());
        }

        /* Setting current processing workload outof total workload */
        $this->monitoringItem->setCurrentWorkload($this->currentStep)
            ->setTotalWorkload($this->totalSteps)
            ->setDefaultProcessMessage("Processing Raw code '".$levelInfo['fullCode']."', code: '".$levelInfo['code']."', Full Code: '".$levelInfo['levelFullCode']."'")
            ->save();

        $objKey = $levelInfo['objectKey']; //'description';

        $catObj->setKey(\Pimcore\Model\Element\Service::getValidKey($objKey, 'object'));

        /* Updating Object Here */
        $catObj->setBusinessUnit('');
        $catObj->setIndustry('');
        // p_r($levelInfo['level']);
        $catObj->setLevel($levelInfo['level']);
        // p_r($levelInfo['code']);
        $catObj->setCode($levelInfo['code']);
        $catObj->setFullCode($levelInfo['levelFullCode']);
        if (empty($parentObj)) {
            $parentObj = $this->getObjectByFullCode($levelInfo['parentFullCode'],$levelInfo['bu']);
        }

        if ($parentObj) {
            $catObj->setParentId($parentObj->getId());
            $catObj->setParentCategoryCode($parentObj->getCode());
            $catObj->setParentObjectId($parentObj->getId());
        }
        $catObj->setDescription($this->reader['description'], 'en');
        $catObj->setPublished(1);
        $catObj->save();
        if(empty($catObj)) {
            $this->monitoringItem->getLogger()->error("Code '".$levelInfo['code']."' and level ".$levelInfo['level']." could not processed ");
            return false;
        }
        return $catObj->getId();
    }
    public function getObjectByFullCode($code, $bu)
    {
        if (!empty($code)) {
            $obj = new DataObject\Category\Listing();
            $obj->setCondition("FullCode='$code' AND BusinessUnit='$bu'");
            $obj->setLimit(1);
            $obj->load();
            
            foreach ($obj as $o) {
                if ($o->getId())
                    return $o;
            }
        }
        return false;
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
