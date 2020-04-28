<?php

namespace ImportBundle\Services\Model;

use Pimcore\Model\DataObject;
use Pimcore\Log\FileObject;
use AppBundle\Logger\AppLogger as Logger;
use Elements\Bundle\ProcessManagerBundle;
use ImportBundle\Services\Import;
use ImportBundle\Services\ImportConstants;

class CategoryModel
{
    public $name; // Command Name
    public $filePath;
    public $inboxFilePath;
    public $archiveDir;
    public $failedDir;
    private $listingService;
    private $validatorService;
    private $logFileName;
    private $monitoringItem;
    private $totalSteps;
    public $currentStep;
    private $currentLevel;
    private $errors;
    private $reader;
    private $level;
    public $rowStatus;
    use ProcessManagerBundle\ExecutionTraitClass;
    const LOGGER_MODULE = 'SIOP IMPORT SHEET';
    private $fileLastCol;
    private $common;
    private $catHelper;
    private $catConfigData;
    private $relatedClsfcnLvl;
    private $processingCode;
    public function __construct()
    {
        try {
            /* Initilize monitoring item and set the number of steps will take to complete the task */
            $this->monitoringItem = ProcessManagerBundle\ElementsProcessManagerBundle::getMonitoringItem();
            $this->common = \Pimcore::getContainer()->get('app.common_helper');
            /* Load category configuration file */
            $this->catConfigData = \Pimcore::getContainer()->get('app.config_provider_service')->getCategoryConfig();
            /* Initiating global category helper */
            $this->catHelper = \Pimcore::getContainer()->get('app.category_helper');

            $this->relatedClsfcnLvl = $this->common->getParameter($this->catConfigData, 'relatedClsfcnLvl');
            $this->fileLastCol = $this->common->getParameterItem($this->catConfigData, 'sheet', 'lastColName');

            /* Create parent if it does not exist */
            $this->createSIOPParentHier();
        } catch (\Throwable $th) {
            //throw $th;
            Logger::error($this->logFileName, $th);
            // echo $th->getMessage();
            die;
        }
    }
    /* 
        Update the defualt properties
        Validate the sheet header
        If all ok, will paas spreadsheet object to import function for further processing
    */
    public function config($param = array())
    {
        try {
            $this->updateDefaults($param);
            $this->instance = \Pimcore::getContainer()->get($this->validatorService);
            $spreadsheet = Import::load($this->filePath);
            $result = $this->instance->validateSpreadSheet($spreadsheet);
            if (!$result['status']) {
                $this->monitoringItem->setMessage($result['message'])->save();
                $this->monitoringItem->getLogger()->error($result['message']);
                $this->monitoringItem->setStatus($this->monitoringItem::STATUS_FAILED)->save();
                die;
            }
            $this->import($spreadsheet);
        } catch (\Throwable $th) {
            //throw $th;
            Logger::error($this->logFileName, $th);
            // echo $th->getMessage();
            die;
        }
    }


    private function createSIOPParentHier()
    {
        try {
            $id = DataObject\Service::createFolderByPath(ImportConstants::MASTER_LIST_SIOP_MASTER_LIST_FOLDER)->getId();
            $cat = DataObject\ProductCategory::getByPath("/" . ImportConstants::MASTER_LIST_SIOP_MASTER_LIST_FOLDER . "/" . ImportConstants::SIOP_ENGINEERED_PRODUCTS_NAME);
            if (empty($cat)) {
                $cat = new DataObject\ProductCategory;
                $cat->setKey(ImportConstants::SIOP_ENGINEERED_PRODUCTS_NAME);
                $cat->setParentId($id);
                $cat->setLevel(1);
                $cat->setCode('04');
                $cat->setFullCode('04');
                $cat->setParentCategoryCode('04');
                $cat->setDescription(ImportConstants::SIOP_ENGINEERED_PRODUCTS_NAME);
                $cat->setPublished(1);
                $cat->save();
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function import($spreadsheet)
    {
        try {

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

            $sheetColumns = $this->common->getParameterItem($this->catConfigData, 'sheet', 'columnName');

            foreach ($activeSheet as $rowCnt => $reader) {
                if ($rowCnt == 0) {
                    Import::setCell($this->fileLastCol . '1', 'Status');
                    continue;
                }
                $this->processingCode = '';
                $this->currentStep = $rowCnt + 1;
                $flag = true;
                $this->reader = array_combine($sheetColumns, $reader);
                /* Validate each row's column value */
                $this->instance->rowCnt = $this->currentStep;
                $result = $this->instance->validateRow($this->reader);

                $this->monitoringItem->setCurrentStep($this->currentStep)->save();
                if (!$result['status']) {
                    $success = false;
                    $flag = false;

                    $this->monitoringItem->getLogger()->error($result['message']);
                    $this->rowStatus[$this->currentStep] .= $result['message'];
                } else {
                    $len = strlen($this->reader['code']);
                    $levelInfo = $this->catHelper->getLevels($this->reader['code'], $this->reader['description']);
                    
                    if ($levelInfo['status']) {
                        $lvl = max(array_keys($levelInfo['levels']));
                        $this->processingCode = $levelInfo['levels'][$lvl]['levelFullCode'];
                        if (!$this->createCategory($levelInfo['levels'])) {
                            $this->monitoringItem->getLogger()->error("Code '" . $this->reader['code'] . "' failed to process");
                            $flag = false;
                            $success = false;
                        }
                    } else {
                        /* Validation Error */
                        $this->monitoringItem->getLogger()->error($levelInfo['message']);
                        $flag = false;
                        $success = false;
                    }
                }

                if (!$flag) {
                    $failedCnt++;
                    $this->rowStatus[$this->currentStep] .= 'Status: Failed';
                    Import::setCell($this->fileLastCol . $this->currentStep, $this->rowStatus[$this->currentStep]);
                } else {
                    $this->rowStatus[$this->currentStep] .= 'Status Success';
                    Import::setCell($this->fileLastCol . $this->currentStep, $this->rowStatus[$this->currentStep]);
                }
            }

            $this->monitoringItem->setWorkloadCompleted()->save();
            \Pimcore::collectGarbage();
            $this->monitoringItem->setMessage('Job finished')->setCompleted();
            Import::save();


            /* Move imported file from inbox to archive or failed as per status */
            $moveParam = array(
                'filePath'      => $this->inboxFilePath,
                'archivePath'   =>  $this->archiveDir,
                'failedPath'    =>  $this->failedDir,
                'status'        =>  $success,
                'fileName'      =>  $this->name . '-' . date('Y-m-d-his')
            );
            $movedAssetObj = $this->common->moveFile($moveParam);


            /* Set Application Logger Message */
            if ($success) {
                \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->info("Category Imported successfully. <a href='" . $movedAssetObj->getFileSystemPath() . "'>Download Log</a>");
            } else {
                $fileObject = new FileObject($movedAssetObj->getData());
                \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->error("Category Import command failed to import $failedCnt out of $totalRow. <a href='" . $movedAssetObj->getFileSystemPath() . "'>Download Log</a>");
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function createCategory($levelInfo)
    {
        foreach ($levelInfo as $info) {
            $obj = $this->catHelper->getObjectByFullCode($info['levelFullCode'], $info['bu']);
            if (!empty($obj) && $obj->getId()) {
                $this->rowStatus[$this->currentStep] .= 'SIOP code already exists at level ' . $info['level'] . '. Updating Code: ' . $info['code'] . '. ';
                if ($this->updateCategory($info)) {
                    return true;
                }
            } else {
                $parentObj = $this->catHelper->getObjectByFullCode($info['parentFullCode'], $info['bu']);
                if (!empty($parentObj)) {
                    /* Create or Update Object */
                    $this->rowStatus[$this->currentStep] .= 'Creating SIOP at level ' . $info['level'] . '. Code: ' . $info['code'] . '. ';
                    if ($this->updateCategory($info, $parentObj)) {
                        return true;
                    }
                    return false;
                } else {
                    $this->rowStatus[$this->currentStep] .= 'Parent missing at level ' . $info['level'] . ' Code: ' . $info['code'] . ' Parent Code: ' . $info['parentCode'] . '. ';
                    $key = key($levelInfo);
                    unset($levelInfo[$key]);
                    $this->createCategory($levelInfo);
                }
            }
            return $this->updateCategory($info);
        }
    }

    public function updateCategory($levelInfo, $parentObj = "")
    {
        $catObj = $this->catHelper->getObjectByFullCode($levelInfo['levelFullCode'], $levelInfo['bu']);

        if (empty($catObj)) {
            $this->monitoringItem->setMessage('New Category Insertion ')->save();
            $catObj = new DataObject\ProductCategory();
        } else {
            $this->monitoringItem->setMessage('Updating ' . $levelInfo['fullCode'] . ' ' . $catObj->getId())->save();
            $catObj = DataObject::getById($catObj->getId());
        }
        /* Setting current processing workload outof total workload */
        $this->monitoringItem->setCurrentWorkload($this->currentStep)
            ->setTotalWorkload($this->totalSteps)
            ->setDefaultProcessMessage("Processing Raw code '" . $levelInfo['fullCode'] . "', code: '" . $levelInfo['code'] . "', Full Code: '" . $levelInfo['levelFullCode'] . "'")
            ->save();

        $objKey = $levelInfo['objectKey']; //'description';

        $catObj->setKey(\Pimcore\Model\Element\Service::getValidKey($objKey, 'object'));
        /* Updating Object Here */
        $catObj->setBusinessUnit($levelInfo['bu']);
        $catObj->setIndustry('');
        $catObj->setLevel($levelInfo['level']);
        $catObj->setCode($levelInfo['code']);
        $catObj->setFullCode($levelInfo['levelFullCode']);


        if ($levelInfo['level'] == 2) {
            $parentId = $this->catHelper->getLevel2ParentId($levelInfo['bu']);
            $catObj->setParentId($parentId);
        } else {
            if (empty($parentObj)) {
                $parentObj = $this->catHelper->getObjectByFullCode($levelInfo['parentFullCode'], $levelInfo['bu']);
            }

            if ($parentObj) {
                $catObj->setParentId($parentObj->getId());
                $catObj->setParentCategoryCode($parentObj->getCode());
                $catObj->setParentObjectId($parentObj->getId());
            }
        }


        if (isset($this->reader) && isset($this->reader['description'])) {
            if($this->processingCode==$levelInfo['levelFullCode']) {
                $catObj->setDescription($this->reader['description'], 'en');
            }
        }

        /* Set related object brick here */
        //if (in_array($levelInfo['level'], $this->relatedClsfcnLvl)) {
            if (!empty($this->reader['attributeList'])) {
                $attributeList = $this->reader['attributeList'];
                $attributeList = explode(',', $attributeList);
                $catObj->setRelatedObjectBrick($attributeList);
            }
        //}
        $catObj->setPublished(1);
        $catObj->save();
        if (empty($catObj)) {
            $this->monitoringItem->getLogger()->error("Code '" . $levelInfo['code'] . "' and level " . $levelInfo['level'] . " could not processed ");
            return false;
        }
        return $catObj->getId();
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
