<?php

namespace IFSEU\ImportBundle\Services;

use Pimcore\Model\DataObject;
use Pimcore\Log\FileObject;
use AppBundle\Logger\AppLogger as Logger;
use IFSEU\ImportBundle\Services\ImportService;
use IFSEU\ImportBundle\Services\ImportConstants;
use Throwable;

class CategoryService
{
    public $name; // Command Name
    public $filePath;
    public $inboxFilePath;
    public $archiveDir;
    public $failedDir;
    private $logFileName;
    private $totalSteps;
    public $currentStep;
    private $reader;
    public $rowStatus;
    public $instance;
    const LOGGER_MODULE = 'SIOP IMPORT SHEET';
    private $fileLastCol;
    private $common;
    private $catHelper;
    private $catConfigData;
    private $processingCode;
    public function __construct()
    {
        try {
            $this->logFileName  = 'ifseu-product-category-log-'.date('Y-m-d-his');
            $this->common = \Pimcore::getContainer()->get('ifs_eu_import.common_helper');
            /* Load category configuration file */
            $this->catConfigData = \Pimcore::getContainer()->get('ifs_eu_import.config_provider_service')->getCategoryConfig();
            /* Initiating global category helper */
            $this->catHelper = \Pimcore::getContainer()->get('ifs_eu_import.category_helper');
            $this->instance = \Pimcore::getContainer()->get('ifs_eu_import.category_validator_service');
            $this->fileLastCol = $this->common->getParameterItem($this->catConfigData, 'sheet', 'lastColName');

            /* Create parent if it does not exist */
        } catch (\Throwable $th) {
            Logger::error($this->logFileName, $th);
            die;
        }
    }
    
    public function import($filePath)
    {
        $this->filePath  = $filePath;
        try {

            $spreadsheet    = ImportService::load($this->filePath);
            $validateResult  = $this->instance->validateSpreadSheet($spreadsheet);
            if (!$validateResult['status']) {
                Logger::error($this->logFileName, $validateResult['message']);
                die;
            }

            $activeSheet = $spreadsheet->getActiveSheet()->toArray();
            /* Number of rows in a sheet */
            $totalRow = count($activeSheet);
            $failedCnt = 0;
            $success = true;
            $this->totalSteps = $totalRow;

            $sheetColumns = $this->common->getParameterItem($this->catConfigData, 'sheet', 'columnName');
            foreach ($activeSheet as $rowCnt => $reader) {
                if ($rowCnt == 0) {
                    ImportService::setCell($this->fileLastCol . '1', 'Status');
                    continue;
                }
                $this->processingCode = '';
                $this->currentStep = $rowCnt + 1;
                $flag = true;
                $this->reader = array_combine($sheetColumns, $reader);
                /* Validate each row's column value */
                $this->instance->rowCnt = $this->currentStep;
                $result = $this->instance->validateRow($this->reader);
                $processedResult= $this->processImport($this->currentStep, $this->reader, $result);
                $flag           = $processedResult['flag'];
                $success        = $processedResult['success'];

                if (!$flag) {
                    $failedCnt++;
                    $this->rowStatus[$this->currentStep] .= 'Status: Failed';
                    ImportService::setCell($this->fileLastCol . $this->currentStep, $this->rowStatus[$this->currentStep]);
                } else {
                    $this->rowStatus[$this->currentStep] .= 'Status Success';
                    ImportService::setCell($this->fileLastCol . $this->currentStep, $this->rowStatus[$this->currentStep]);
                }
            }

            \Pimcore::collectGarbage();
            ImportService::save();


            /* Set Application Logger Message */
            if ($success) {
                Logger::log(self::LOGGER_MODULE)->info("Category Imported successfully.");
            } else {
                Logger::log(self::LOGGER_MODULE)->error("Category Import command failed to import $failedCnt out of $totalRow.");
            }
        } catch (\Throwable $th) {
            p_r($th);
            Logger::error($this->logFileName, $th->getMessage());
            die;
        }
    }

    private function processImport($currentStep, $reader, $result)
    {
        try{
            if (!$result['status']) {
                $success = false;
                $flag = false;
                $this->rowStatus[$currentStep] .= $result['message'];
            } else {
    
                $levelInfo = $this->catHelper->getLevels($reader['Code'], $reader['Text']);
                if ($levelInfo['status']) {
                    $lvl = max(array_keys($levelInfo['levels']));
                    $this->processingCode = $levelInfo['levels'][$lvl]['levelFullCode'];
                    if (!$this->createCategory($levelInfo['levels'])) {
                        $flag = false;
                        $success = false;
                    }
                } else {
                    /* Validation Error */
                    $flag = false;
                    $success = false;
                }
            }
    
            return ['flag' => $flag, 'success' => $success];
    
        }catch(Throwable $th){
            print_r($th);
        }
    }

    public function createCategory($levelInfo)
    {
        try{
            foreach ($levelInfo as $info) {
                $obj = $this->catHelper->getObjectByFullCode($info['levelFullCode'], $info['bu']);
                if (!empty($obj) && $obj->getId()) {
                    $this->rowStatus[$this->currentStep] .= 'SIOP code already exists at level ' . $info['level'] . '. Updating Code: ' . $info['code'] . '. ';
                    return $this->updateCategory($info);
                } else {
    
                    $parentObj = $this->catHelper->getObjectByFullCode($info['parentFullCode'], $info['bu']);
                    if (!empty($parentObj)) {
                        /* Create or Update Object */
                        $this->rowStatus[$this->currentStep] .= 'Creating SIOP at level ' . $info['level'] . '. Code: ' . $info['code'] . '. ';
                        return $this->updateCategory($info, $parentObj);
                    } else {
                        $this->rowStatus[$this->currentStep] .= 'Parent missing at level ' . $info['level'] . ' Code: ' . $info['code'] . ' Parent Code: ' . $info['parentCode'] . '. ';
                        $key = key($levelInfo);
                        unset($levelInfo[$key]);
                        $this->createCategory($levelInfo);
                    }
                }
                return $this->updateCategory($info);
            }
    
        }catch(Throwable $th){
            print_r($th);
        }
    }

    public function updateCategory($levelInfo, $parentObj = "")
    {
        try{
            $catObj = $this->catHelper->getObjectByFullCode($levelInfo['levelFullCode'], $levelInfo['bu']);

            if (empty($catObj)) {
                $catObj = new DataObject\IFSEUProductCategory();
            } else {
                $catObj = DataObject::getById($catObj->getId());
            }
    
            $objKey = $levelInfo['objectKey'];
    
            $catObj->setKey(\Pimcore\Model\Element\Service::getValidKey($objKey, 'object'));
            /* Updating Object Here */
            $catObj->setBusinessUnit($levelInfo['bu']);
            $catObj->setLevel($levelInfo['level']);
            $catObj->setCode($levelInfo['code']);
            $catObj->setFullCode($levelInfo['levelFullCode']);
    
    
            if ($levelInfo['level'] == 1) {
                $parentId = $this->catHelper->getLevelOneParentId($levelInfo['bu']);
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
    
            if (isset($this->reader) && isset($this->reader['Text'])) {
                if($this->processingCode==$levelInfo['levelFullCode']) {
                    $catObj->setDescription($this->reader['Text'], 'en');
                    $catObj->setPrintedCatalogDescription($this->reader['Text'], 'en');
                    $catObj->setConstructionType($this->reader['Text'], 'en');
                }
            }
    
            /* Set related object brick here */
            if (!empty($this->reader['attributeList'])) {
                $attributeList = $this->reader['attributeList'];
                // $attributeList = explode(',', $attributeList);
                $catObj->setRelatedObjectBrick($attributeList);
            }
    
            $catObj->setPublished(1);
            $catObj->save();
            if (empty($catObj)) {
    
                return false;
            }
    
            return $catObj->getId();
    
        }catch(Throwable $th){
            print_r($th);

        }
    }
}
