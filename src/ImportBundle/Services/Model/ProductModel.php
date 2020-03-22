<?php

namespace ImportBundle\Services\Model;

use Exception;
use Pimcore\Model\DataObject;
use Pimcore\Log\FileObject;
use Throwable;
use AppBundle\Logger\AppLogger as Logger;
use Elements\Bundle\ProcessManagerBundle;
use ImportBundle\Services\Category\Category as CategoryService;
use ImportBundle\Services\Import;
use ImportBundle\Services\ImportConstants;

class ProductModel
{
    public $name; // Command Name
    public $filePath;
    public $inboxFilePath;
    public $archiveDir;
    public $failedDir;
    public $configuredData; // We will pull the data from configured class for this variable
    private $mappedService;
    private $validatorService;
    private $logFileName;
    private $monitoringItem;
    private $totalSteps;
    private $currentStep;
    private $currentLevel;
    private $errors;
    private $reader;
    private $level;
    private $cek; // Current Error Key
    private $productModel;
    private $siop;
    private $catInstance;
    private $instance;
    private $catHelper;
    private $rowStatus;
    private $tblImpHelper;
    private $prdHelper;
    private $prdConfigData;
    private $common;
    private $startRow;
    private $columnName;
    private $csvHeader;
    private $data;
    private $bricks;
    private $brickMappingService;
    private $fileHandle;
    use ProcessManagerBundle\ExecutionTraitClass;
    const LOGGER_MODULE = 'SIOP IMPORT SHEET';
    const FILE_LAST_COL = 'D';
    const MAX_TOP_CAT_LVL = 6;
    const MIN_TOP_CAT_LVL = 4;
    public function __construct()
    {
        /* Initilize monitoring item and set the number of steps will take to complete the task */
        $this->monitoringItem = ProcessManagerBundle\ElementsProcessManagerBundle::getMonitoringItem();
        $this->common = \Pimcore::getContainer()->get('app.common_helper');
        $this->tblImpHelper = \Pimcore::getContainer()->get('app.table_import_helper');
        $this->prdHelper = \Pimcore::getContainer()->get('app.product_helper');
        $this->catHelper = \Pimcore::getContainer()->get('app.category_helper');
        $this->catInstance = \Pimcore::getContainer()->get('import.category_service');
        $this->prdConfigData = \Pimcore::getContainer()->get('app.config_provider_service')->getProductConfig();
        $this->brickMappingService = \Pimcore::getContainer()->get('AppBundle\Services\CategoryBrickMappingService');
        $this->startRow = $this->common->getParameterItem($this->prdConfigData, 'sheet', 'startRow');
        $this->columnName = $this->common->getParameterItem($this->prdConfigData, 'sheet', 'columnName');        
    }

    /**
     * Update table name in import table class
     */
    private function initImportTable()
    {
        $tables = $this->common->getParameter($this->prdConfigData, 'table');
        $tables['fileColumns'] = $this->csvHeader;
        $tables['mappingCsvColumn'] = $this->columnName;
        $tables['keyColumns'] = $this->common->getParameterItem($this->prdConfigData, 'sheet', 'keyColumns');
        $this->tblImpHelper->init($tables);
    }
    public function config($param = array())
    {
        try {
            $this->updateDefaults($param);
            $this->instance = \Pimcore::getContainer()->get($this->validatorService);

            /**
             * Get spreadsheet object by calling load function
             * Pass file path directly or send array with sheet configuration
             * eg: Start row to read, end row to read, number of columns to read etc.
             */
            $sheetConfig = array(
                'filePath' => $this->filePath,
                'startRow'  =>  $this->startRow
            );
            $csvInfo = Import::getCSVData($this->filePath);
            // p_r($csvInfo);die;
            $this->csvHeader = $csvInfo['header'];
            /**
             * Setting up import table
             */
            $this->initImportTable();

            $this->import($csvInfo['data']);
        } catch (\Throwable $th) {
            //throw $th;
            Logger::error($this->logFileName, $th);
            // echo $th->getMessage();
            die;
        }
    }

    private function createRootFolder()
    {
        try {
            DataObject\Service::createFolderByPath(ImportConstants::PRODUCTS_MASTER_FOLDER);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function import($csvData)
    {
        $this->createRootFolder();
        $this->data = array();
        /* $workSheet = $spreadsheet->getActiveSheet();
        $workSheetInfo = Import::getActiveSheetInfo($workSheet);
        $readFrom = $this->common->getParameterItem($this->prdConfigData, 'sheet', 'readFrom');
        $readFrom = 'A' . $readFrom;
        $readTo = $workSheetInfo['highestDataColumn'] . $workSheetInfo['highestDataRow'];
        $activeSheet = $spreadsheet->getActiveSheet()->rangeToArray($readFrom . ':' . $readTo, NULL, TRUE, TRUE, FALSE); */
        
        // Cleaning the temp table
        $this->tblImpHelper->truncateTempTable();
        $t = time();
        p_r('Loading data into temp table at '.$t);
        $this->monitoringItem->setMessage('Loading data into temp table')->save();
        $this->monitoringItem->getLogger()->info('Loading data into temp table');
        $this->tblImpHelper->insertDataInTemp($csvData);
        $this->data = $this->tblImpHelper->getDelta();
        p_r('Data loaded at '.(time() - $t));
        $totalRow = count($this->data);
        $failedCnt = 0;
        $success = true;
        $this->totalSteps = $totalRow;
        $this->monitoringItem->setTotalSteps($this->totalSteps)->save();

        foreach ($this->data as $rowCnt => $row) {            
            $levelInfo = array();
            $this->reader = (array)json_decode($row['record']);
            $this->currentStep = $rowCnt + 1;
            $this->monitoringItem->setMessage('Processing record ' . $this->currentStep);
            $this->monitoringItem->setCurrentStep($this->currentStep)->save();
            /* Validate each row's column value */
            $this->instance->rowCnt = $this->currentStep;

            $record = array(
                'code'  =>  $this->getData('code'),
                'description'   =>  $this->getData('description'),
                'material'  =>  $this->getData('material')
            );
            /**
             * Will skipped the process if SIOP code does not exist
             * */
            if (!$this->prdHelper->isCategoryExist($this->getData('code'))) {
                $message = 'Skipping... SIOP code ' . $this->getData('code') . ' does not exist';
                $this->monitoringItem->setMessage($message)->save();
                $this->monitoringItem->getLogger()->error($message);
                $this->updateRowStatus('FAILED', $message);
                continue;
            }
            /* End */

            $result = $this->instance->validateRow($record);
            if (!$result['status']) {
                $success = false;
                $this->monitoringItem->getLogger()->error($result['message']);

                /**
                 * Updating current processed row
                 */
                $this->updateRowStatus('FAILED', $result['message']);
            } else {
                $levelInfo = $this->prdHelper->getLevels($this->getData('code'), $record);
                // p_r($levelInfo);die;
                if ($levelInfo['status']) {
                    /* Setting current processing workload outof total workload */
                    $this->monitoringItem->setCurrentWorkload($this->currentStep)
                        ->setTotalWorkload($this->totalSteps)
                        ->setDefaultProcessMessage("Processing Full code '" . $this->getData('code'))
                        ->save();

                    /* Check or Update Category In Master */
                    $this->catInstance->currentStep = $this->currentStep;
                    /**
                     * Intentionally preventing level 1 to proceed
                     * SIOP Level 1 will be common for all type of BU(Business Unit)
                     * */
                    unset($levelInfo['levels'][1]);


                    /* Creating category folder in product master    */
                    $this->monitoringItem->getLogger()->info('Creating SIOP Hierarchy');
                    $catObj = $this->prdHelper->createCategoryHierarchy($this->getData('code'));

                    $variantParentObj = false;
                    $variantObj = false;
                    if ($catObj) {
                        /* Set SIOP array to map SIOP tab */
                        $this->setSiop($levelInfo['levels']);
                        /* End */
                        
                        if ($this->instance->allowedToCreateObject($this->getData('code'), 'base')) {
                            $oldMatStts = $this->instance->validateBaseOrSkeleton($this->getData('oldMaterial'));                            
                            if ($oldMatStts['code'] == 1) {
                                /* Brand / Base Product */
                                $cmnSpcParentObj = $this->createBase($catObj);
                                // p_r($cmnSpcParentObj);
                                /* Skeleton */

                                if ($cmnSpcParentObj) {
                                    $variantParentObj = $this->createSkeleton($cmnSpcParentObj);                                 
                                }
                            } elseif ($oldMatStts['code'] == 2) {
                                $this->updateRowStatus('FAILED', $oldMatStts['message']);
                            }
                        }

                        /* Final product / Variant */
                        $pObj = $variantParentObj?$variantParentObj:$catObj;
                        $variantObj = $this->createVariant($pObj);
                        unset($pObj);

                        if ($variantObj) {
                            $this->updateRowStatus('SUCCESS');
                        }
                    } else {
                        $message = "Code '" . $this->getData('code') . "' failed to process due to SIOP hierarchy creation/updation";
                        $this->monitoringItem->getLogger()->error($message);
                        $success = false;

                        /**
                         * Updating current processed row
                         */
                        $this->updateRowStatus('FAILED', $message);
                    }
                } else {
                    /* Validation Error */
                    $this->monitoringItem->getLogger()->error($levelInfo['message']);
                    $success = false;

                    /**
                     * Updating current processed row
                     */
                    $this->updateRowStatus('FAILED', $levelInfo['message']);
                }
            }
        }

        /**
         * Update log, master table and clean the temp table
         */
        $this->tblImpHelper->insertDataToLogTable($this->data);
        $this->tblImpHelper->updateMaster();
        /**
         * Here setting process as completed
         */
        $this->exitProcess();
        $movedAssetObj = $this->moveFile($success);
        /* Set Application Logger Message */
        if ($success) {
            \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->info("SAP BW Imported successfully. <a href='" . $movedAssetObj->getFileSystemPath() . "'>Download Log</a>");
        } else {
            \AppBundle\Logger\AppLogger::log(self::LOGGER_MODULE)->error("SAP BW Import command failed to import $failedCnt out of $totalRow. <a href='" . $movedAssetObj->getFileSystemPath() . "'>Download Log</a>");
        }
    }



    /* Get the category object level wise */
    public function setSiop($levelInfo)
    {
        $this->siop = array();
        foreach ($levelInfo as $info) {
            $l = $info['level'];
            $o = $this->catHelper->getObjectByFullCode($info['levelFullCode'], $info['bu']);
            $this->siop[$l] = $o;
        }
    }


    public function getObjectByPath($path, $bu)
    {
        $obj = DataObject::getByPath($path);
        if (!empty($obj) && $obj->getId()) {
            return $obj;
        }
        return false;
    }

    /* Brand / Base Product / 6 digit */
    private function createBase($parentObj)
    {
        $oldMaterial = $this->getData('oldMaterial');
        $len = strlen($this->getData('oldMaterial'));
        $skeletonLength = $this->common->getParameterItem($this->prdConfigData, 'skeleton', 'length');
        $parentId = 0;
        $parentFullPath = '';
        $objectFullPath = '';
        $flag = false;
        if (is_numeric($oldMaterial) && $len >= $skeletonLength) {
            $this->monitoringItem->setMessage('Updating base product')->save();

            $cmnPrdSpecCode = $this->prdHelper->getBaseCode($oldMaterial);
            $codeLength = strlen($cmnPrdSpecCode);
            $productType = $this->prdHelper->getProductType($codeLength);
            if ($parentObj) {
                if (!empty($parentObj) && $parentObj->getId()) {
                    $parentId = $parentObj->getId();
                    $parentFullPath = $parentObj->getFullPath();
                    $objectFullPath = $parentFullPath . '/' . $cmnPrdSpecCode;
                    $prdSpecObj = DataObject::getByPath($objectFullPath);
                    if (empty($prdSpecObj)) {
                        $prdSpecObj = new DataObject\Product;
                        $prdSpecObj->setKey($cmnPrdSpecCode);
                        $prdSpecObj->setParentId($parentId);
                    }

                    /* Update Object */
                    /* Base Data */
                    $prdSpecObj->setProductType($productType);
                    $prdSpecObj->setSiopFullCode($this->getData('code'));
                    $this->prdHelper->setSiop($this->siop, $prdSpecObj);
                    $this->brickMappingService->manageBricksForSIOPRelationChange($prdSpecObj);
                    $prdSpecObj->setPublished(1);
                    $prdSpecObj->save();
                    if (!empty($prdSpecObj)) {
                        $this->monitoringItem->getLogger()->info('Updated base product having code: ' . $cmnPrdSpecCode);
                    } else {
                        $message = 'Failed to create/update base product having code: ' . $cmnPrdSpecCode;
                        $this->monitoringItem->getLogger()->error($message);
                        /**
                         * Updating current processed row
                         */

                        $this->updateRowStatus('FAILED', $message);
                    }
                    return $prdSpecObj;
                }
            }
        } else {
            /**
             * Updating current processed row
             */
            $message = "Failed to proceed due to old material length";
            $this->updateRowStatus('FAILED', $message);
        }
        return $flag;
    }

    /* Skeleton / 9 digit */
    private function createSkeleton($parentObj)
    {
        $oldMaterial = $this->getData('oldMaterial');
        $len = strlen($this->getData('oldMaterial'));
        $parentId = 0;
        $parentFullPath = '';
        $objectFullPath = '';
        $flag = false;
        if (is_numeric($oldMaterial)) {
            $this->monitoringItem->setMessage('Updating skeleton')->save();

            $cmnSpecCode = $this->prdHelper->getSkeletonCode($oldMaterial);
            $codeLength = strlen($cmnSpecCode);
            $productType = $this->prdHelper->getProductType($codeLength);
            if ($parentObj) {
                if (!empty($parentObj) && $parentObj->getId()) {
                    $parentId = $parentObj->getId();
                    $parentFullPath = $parentObj->getFullPath();
                    $objectFullPath = $parentFullPath . '/' . $cmnSpecCode;
                    $prdSpecObj = DataObject::getByPath($objectFullPath);
                    if (empty($prdSpecObj)) {
                        $prdSpecObj = new DataObject\Product;
                        $prdSpecObj->setKey($cmnSpecCode);
                        $prdSpecObj->setParentId($parentId);
                    }

                    /* Update Object */
                    $prdSpecObj->setProductType($productType);
                    $prdSpecObj->setSiopFullCode($this->getData('code'));
                    $this->prdHelper->setSiop($this->siop, $prdSpecObj);
                    $this->brickMappingService->manageBricksForSIOPRelationChange($prdSpecObj);
                    $prdSpecObj->setPublished(1);
                    $prdSpecObj->save();

                    if (!empty($prdSpecObj)) {
                        $this->monitoringItem->getLogger()->info('Updated skeleton having code: ' . $cmnSpecCode);
                    } else {
                        $message = 'Failed to create/update skeleton having code: ' . $cmnSpecCode;
                        $this->monitoringItem->getLogger()->error($message);
                        /**
                         * Updating current processed row
                         */

                        $this->updateRowStatus('FAILED', $message);
                    }
                    return $prdSpecObj;
                }
            }
        }
        return $flag;
    }
    /* Variant */
    private function createVariant($parentObj)
    {
        $variantPrdTpLength = $this->common->getParameterItem($this->prdConfigData, 'variant', 'length');
        $parentId = 0;
        $parentFullPath = '';
        $objectFullPath = '';
        $flag = false;
        $materialCode = $this->getData('material');
        $productType = $this->prdHelper->getProductType($variantPrdTpLength);
        if ($parentObj) {
            if (!empty($parentObj) && $parentObj->getId()) {
                $this->monitoringItem->setMessage('Updating variant');
                $parentId = $parentObj->getId();
                $parentFullPath = $parentObj->getFullPath();
                $objectFullPath = $parentFullPath . '/' . $materialCode;
                $prdSpecObj = DataObject::getByPath($objectFullPath);
                if (empty($prdSpecObj)) {
                    $prdSpecObj = new DataObject\Product;
                    $prdSpecObj->setKey($materialCode);
                    $prdSpecObj->setParentId($parentId);
                }

                /* Update Object */
                $prdSpecObj->setProductType($productType);
                $prdSpecObj->setArticleNumber($this->getData('material'));
                $prdSpecObj->setSapDescription($this->getData('description'), 'en');
                $prdSpecObj->setMaterialGroup($this->getData('group'));
                $prdSpecObj->setOldMaterialCode($this->getData('oldMaterial'));
                $prdSpecObj->setManufacter($this->getData('manufacture'));
                $prdSpecObj->setManufacterPartNumber($this->getData('manufacturePartNumber'));
                $prdSpecObj->setStccCode($this->getData('stccCode'));
                $prdSpecObj->setEanUpc($this->getData('eanUPC'));
                $prdSpecObj->setBaseUOM($this->getData('baseUOM'));
                $prdSpecObj->setIndustryStandard($this->getData('industryStandard'));
                $prdSpecObj->setGrossWeight($this->getData('grossWeight'));
                $prdSpecObj->setNetWeight($this->getData('netWeight'));
                $prdSpecObj->setWeightUnit($this->getData('weightUnit'));                
                $prdSpecObj->setSiopFullCode($this->getData('code'));
                $this->prdHelper->setSiop($this->siop, $prdSpecObj);
                $this->brickMappingService->manageBricksForSIOPRelationChange($prdSpecObj);
                $prdSpecObj->setPublished(1);
                $prdSpecObj->save();

                if (!empty($prdSpecObj)) {
                    $this->monitoringItem->getLogger()->info('Updated variant having code: ' . $materialCode);
                } else {
                    $message = 'Failed to create/update variant having code: ' . $materialCode;
                    $this->monitoringItem->getLogger()->error($message);
                    /**
                     * Updating current processed row
                     */

                    $this->updateRowStatus('FAILED', $message);
                }
                return $prdSpecObj;
            }
        }
        return $flag;
    }

    private function exitProcess()
    {
        $this->monitoringItem->setWorkloadCompleted()->save();
        \Pimcore::collectGarbage();
        $this->monitoringItem->setMessage('Job finished')->setCompleted();
    }

    private function moveFile($status)
    {
        /* Move imported file from inbox to archive or failed as per status */
        $moveParam = array(
            'filePath'      => $this->inboxFilePath,
            'archivePath'   =>  $this->archiveDir,
            'failedPath'    =>  $this->failedDir,
            'status'        =>  $status,
            'fileName'      =>  $this->name . '-' . date('Y-m-d-his')
        );
        return $this->common->moveFile($moveParam);
    }

    private function getCSVHeader($spreadsheet)
    {
        $activeSheet = $spreadsheet->getActiveSheet()->toArray();
        $this->csvHeader = $activeSheet[0];
    }

    private function updateRowStatus($statusCode, $message = '')
    {
        $cr = ($this->currentStep - 1); // Current Row
        $this->data[$cr]['statusCode'] = $statusCode;
        $this->data[$cr]['failedReason']  =  $message;
    }

    private function getData($key)
    {
        $csvHeaderVal = $this->columnName[$key];
        $index = array_search($csvHeaderVal, $this->csvHeader);
        unset($key);
        return is_numeric($index) && isset($this->reader[$index])? $this->reader[$index] : '';
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
