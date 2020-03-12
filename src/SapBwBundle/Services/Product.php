<?php

namespace SapBwBundle\Services;

use Exception;
use Pimcore\Model\DataObject;
use Pimcore\Log\FileObject;
use Throwable;
use AppBundle\Services\Validator\Validator;
use AppBundle\Controller\LogController as Logger;
use Elements\Bundle\ProcessManagerBundle;
use AppBundle\Services\Helper\Util;
use AppBundle\Services\Model\ProductModel;
use AppBundle\Services\Category as CategoryService;
use AppBundle\Services\Import;
class Product
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
    private $productModel;
    private $siop;
    private $catInstance;
    private $rowStatus;
    use ProcessManagerBundle\ExecutionTraitClass;
    const LOGGER_MODULE = 'SIOP IMPORT SHEET';
    const FILE_LAST_COL = 'D';
    public function __construct()
    {
        $this->util = new Util;
        /* Initilize monitoring item and set the number of steps will take to complete the task */
        $this->monitoringItem = ProcessManagerBundle\ElementsProcessManagerBundle::getMonitoringItem();
        $this->productModel = new ProductModel;
        $this->catInstance = new CategoryService;
    }
    public function config($param = array())
    {
        try {
            $this->updateDefaults($param);
            $this->instance = new $this->validatorClass;
            $spreadsheet = Import::load($this->filePath);
            // $result = $this->instance->validateSpreadSheet($spreadsheet);
            $this->configuredData = $this->instance->getAllProps();
            /*  if(!$result['status']) {
                $this->monitoringItem->getLogger()->error($result['message']);
            } */
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
                // Import::setCell(self::FILE_LAST_COL.'1', 'Status');
                continue;
            }
            $flag = true;
            $this->reader = array_combine($sheetColumns, $reader);

            /* Validate each row's column value */
            $this->instance->rowCnt = $this->currentStep;

            /* $result = $this->instance->validateRow($this->reader);
            if(!$result['status']) {
                $success = false;
                $flag = false;
                $this->monitoringItem->getLogger()->error($result['message']);
            } */

            $this->currentStep = $rowCnt + 1;
            $len = strlen($this->getData('code'));
            $levelInfo = $this->instance->getLevels($this->getData('code'), $this->reader);
            // p_r($levelInfo);
            if ($levelInfo['status']) {
                /* Check or Update Category In Master */
                $this->catInstance->currentStep = $this->currentStep;
                $this->catInstance->createCategory($levelInfo['levels']);
                if (isset($this->catInstance->rowStatus[$this->currentStep]) && !empty($this->catInstance->rowStatus[$this->currentStep])) {
                    $this->rowStatus[$this->currentStep] = 'Category enriched in master. ';
                    $this->rowStatus[$this->currentStep] .= $this->catInstance->rowStatus[$this->currentStep];
                }
                /* End */
                /* Set SIOP array to map SIOP tab */
                $this->setSiop($levelInfo['levels']);
                /* End */

                $catObj = $this->createCategory($levelInfo['levels']);
                if ($catObj) {
                    /* Brand / Base Product */
                    $cmnSpcParentObj = $this->createCommonProductSpecification($catObj);
                    // p_r($cmnSpcParentObj);
                    /* Skeleton */
                    $variantParentObj = false;
                    if ($cmnSpcParentObj) {
                        $variantParentObj = $this->createCommomSpecification($cmnSpcParentObj);
                    }
                    // p_r($variantParentObj);             
                    /* Final product / Variant */
                    if (!$variantParentObj) {
                        $variantParentObj = $catObj;
                    }
                    $this->createVariant($variantParentObj);
                } else {
                    $this->monitoringItem->getLogger()->error("Code '" . $this->getData('code') . "' failed to process");
                    $flag = false;
                    $success = false;
                }
            }

            /* if ($rowCnt == 10) {
                break;
            } */
        }
    }

    /* Get the category object level wise */
    public function setSiop($levelInfo)
    {
        foreach ($levelInfo as $info) {
            $l = $info['level'];
            $o = $this->catInstance->getObjectByFullCode($info['levelFullCode'], $info['bu']);
            // p_r($info['fullCode']);
            $this->siop[$l] = $o;
        }
    }

    /* Hierarchy Category */
    public function createCategory($levelInfo)
    {
        foreach ($levelInfo as $info) {
            $parentObj = $this->getObjectByPath($info['parentPath'], $info['bu']);
            if (!empty($parentObj)) {
                /* Create or Update Object */
                $catObj = $this->updateCategory($info, $parentObj);
                if ($catObj) {
                    return $catObj;
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
        $catObj = $this->catInstance->getObjectByFullCode($levelInfo['fullCode'], $levelInfo['bu']);

        if ($catObj && $catObj->getId()) {

            $catObj = $this->getObjectByPath($levelInfo['objectPath'], $levelInfo['bu']);
            if (empty($catObj)) {
                $this->monitoringItem->setMessage('New Folder')->save();
                $catObj = new DataObject\Folder;
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

            $catObj->setKey($objKey);

            if (empty($parentObj)) {
                $parentObj = $this->getObjectByPath($levelInfo['parentPath'], $levelInfo['bu']);
            }

            if ($parentObj) {
                $catObj->setParentId($parentObj->getId());
            }
            $catObj->save();
            if (empty($catObj)) {
                $this->monitoringItem->getLogger()->error("Code '" . $levelInfo['code'] . "' and level " . $levelInfo['level'] . " could not processed ");
                return false;
            }
            return $catObj;
        } else {
            p_r($levelInfo['fullCode'] . ' does not exist');
            return false;
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
    private function createCommonProductSpecification($parentObj)
    {
        $oldMaterial = $this->getData('oldMaterial');
        $len = strlen($this->getData('oldMaterial'));
        $parentId = 0;
        $parentFullPath = '';
        $objectFullPath = '';
        $flag = false;
        if (is_numeric($oldMaterial)) {
            if ($this->configuredData['oldMaterialLength'] == $len) {
                $cmnPrdSpecCode = substr($oldMaterial, 0, $this->configuredData['cmnPrdSpecLength']);
                $productType = $this->productModel->getProductType($this->configuredData['cmnPrdSpecLength']);
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
                        $prdSpecObj->setArticleNumber($this->getData('material'));
                        $prdSpecObj->setSapDescriptionLanguage($this->getData('language'));
                        $prdSpecObj->setSapDescription($this->getData('description'));
                        $prdSpecObj->setMaterialGroup($this->getData('group'));
                        $prdSpecObj->setOldMaterialCode($this->getData('oldMaterial'));
                        $prdSpecObj->setManufacter($this->getData('manufacture'));
                        $prdSpecObj->setManufacterPartNumber($this->getData('manufacturePartNumber'));
                        $prdSpecObj->setSiopFullCode($this->getData('code'));
                        $prdSpecObj->setPublished(1);
                        $prdSpecObj->save();
                        $this->productModel->setSiop($this->siop, $prdSpecObj);
                        return $prdSpecObj;
                    }
                }
            } else {
                /* Log material length error */
            }
        }
        return $flag;
    }

    /* Skeleton / 9 digit */
    private function createCommomSpecification($parentObj)
    {
        $oldMaterial = $this->getData('oldMaterial');
        $len = strlen($this->getData('oldMaterial'));
        $parentId = 0;
        $parentFullPath = '';
        $objectFullPath = '';
        $flag = false;
        if (is_numeric($oldMaterial)) {
            if ($this->configuredData['oldMaterialLength'] == $len) {
                $cmnSpecCode = substr($oldMaterial, 0, $this->configuredData['cmnSpecLength']);
                $productType = $this->productModel->getProductType($this->configuredData['cmnSpecLength']);
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
                        $prdSpecObj->setArticleNumber($this->getData('material'));
                        $prdSpecObj->setSapDescriptionLanguage($this->getData('language'));
                        $prdSpecObj->setSapDescription($this->getData('description'));
                        $prdSpecObj->setMaterialGroup($this->getData('group'));
                        $prdSpecObj->setOldMaterialCode($this->getData('oldMaterial'));
                        $prdSpecObj->setManufacter($this->getData('manufacture'));
                        $prdSpecObj->setManufacterPartNumber($this->getData('manufacturePartNumber'));
                        $prdSpecObj->setSiopFullCode($this->getData('code'));
                        $prdSpecObj->setPublished(1);
                        $prdSpecObj->save();
                        $this->productModel->setSiop($this->siop, $prdSpecObj);
                        return $prdSpecObj;
                    }
                }
            } else {
                /* Log material length error */
            }
        }
        return $flag;
    }
    /* Variant */
    private function createVariant($parentObj)
    {
        $oldMaterial = $this->getData('oldMaterial');
        $len = strlen($this->getData('oldMaterial'));
        $parentId = 0;
        $parentFullPath = '';
        $objectFullPath = '';
        $flag = false;
        if (is_numeric($oldMaterial)) {
            if ($this->configuredData['oldMaterialLength'] == $len) {
                $materialCode = $this->getData('material');
                if ($parentObj) {
                    if (!empty($parentObj) && $parentObj->getId()) {
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
                        $prdSpecObj->setArticleNumber($this->getData('material'));
                        $prdSpecObj->setSapDescriptionLanguage($this->getData('language'));
                        $prdSpecObj->setSapDescription($this->getData('description'));
                        $prdSpecObj->setMaterialGroup($this->getData('group'));
                        $prdSpecObj->setOldMaterialCode($this->getData('oldMaterial'));
                        $prdSpecObj->setManufacter($this->getData('manufacture'));
                        $prdSpecObj->setManufacterPartNumber($this->getData('manufacturePartNumber'));
                        $prdSpecObj->setPublished(1);
                        $prdSpecObj->save();
                        return $prdSpecObj;
                    }
                }
            } else {
                /* Log material length error */
            }
        }
        return $flag;
    }

    private function getData($index)
    {
        return $this->reader[$index];
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
