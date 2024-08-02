<?php

namespace ImportBundle\Services;

use Pimcore\Model\DataObject;
use AppBundle\Logger\AppLogger as Logger;
use ImportBundle\Services\Import;
use Symfony\Component\DependencyInjection\ContainerInterface;

class CSHierarchyService
{
    public $filePath;
    private $logFileName;
    private $totalSteps;
    public $currentStep;
    private $reader;
    const LOGGER_MODULE = 'SIOP IMPORT SHEET';
    private $common;
    private $hierarchyConfigData;
    private $processingCode;
    private $container;
    private $columns;
    private $rowCnt;
    private $levelLength;
    private $businessUnit;
    private $root;
    private $codeLength;

    public function __construct(ContainerInterface $container)
    {
        try {
            $this->container = $container;
            $this->rowCnt = 0;
            $this->logFileName = 'ifs-na-cs-product-hierarchy-log-' . date('Y-m-d-his');
            $this->common = $this->container->get('app.common_helper');
            /* Load cs hierarchy configuration file data */
            $this->hierarchyConfigData = $this->container->get('app.config_provider_service')->getCSHierarchyConfig();
            $this->columns = $this->common->getParameterItem($this->hierarchyConfigData, 'sheet', 'columnName');
            $this->root = $this->common->getParameter($this->hierarchyConfigData, 'root');
            $this->codeLength = $this->common->getParameter($this->hierarchyConfigData, 'codeLength');
            $this->levelLength = $this->common->getParameter($this->hierarchyConfigData, 'levelLength');
            $this->businessUnit = $this->common->getParameter($this->hierarchyConfigData, 'businessUnit');

            /* Create parent if it does not exist */
        } catch (\Throwable $th) {
            Logger::error($this->logFileName, $th . ' ------- Trace -' . $th->getTraceAsString());
            die;
        }
    }

    public function import($filePath)
    {
        $this->filePath = $filePath;
        try {

            $spreadsheet = Import::load($this->filePath);
            $validateResult = $this->validateSpreadSheet($spreadsheet);
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

            $sheetColumns = $this->common->getParameterItem($this->hierarchyConfigData, 'sheet', 'columnName');
            foreach ($activeSheet as $rowCnt => $reader) {
                $this->processingCode = '';
                $this->currentStep = $rowCnt + 1;

                $this->reader = array_combine($sheetColumns, $reader);
                /* Validate each row's column value */
                $this->rowCnt = $this->currentStep;
                $result = $this->validateRow($this->reader);

                $processedResult = $this->processImport($this->reader, $result);
                $success = $processedResult['success'];
            }

            \Pimcore::collectGarbage();
            Import::save();


            /* Set Application Logger Message */
            if ($success) {
                Logger::log(self::LOGGER_MODULE)->info("Category Imported successfully.");
            } else {
                Logger::log(self::LOGGER_MODULE)->error("Category Import
                command failed to import $failedCnt out of $totalRow.");
            }
        } catch (\Throwable $th) {
            Logger::error($this->logFileName, $th . ' ------- Trace -' . $th->getTraceAsString());
            die;
        }
    }

    private function processImport($reader, $result)
    {
        if (!$result['status']) {
            $success = false;
        } else {
            $levelInfo = $this->getLevels($reader['code'], $reader['description']);
            if ($levelInfo['status']) {
                $lvl = max(array_keys($levelInfo['levels']));
                $this->processingCode = $levelInfo['levels'][$lvl]['levelFullCode'];
                if (!$this->createCategory($levelInfo['levels'])) {
                    $success = false;
                } else {
                    $success = true;
                }
            } else {
                /* Validation Error */
                $success = false;
            }
        }

        return ['success' => $success];
    }

    public function createCategory($levelInfo)
    {
        foreach ($levelInfo as $info) {
            $obj = $this->getObjectByFullCode($info['levelFullCode'], $info['bu']);
            if (!empty($obj) && $obj->getId()) {
                return $this->updateCategory($info);
            } else {
                $parentObj = $this->getObjectByFullCode($info['parentFullCode'], $info['bu']);
                if (!empty($parentObj)) {
                    /* Create or Update Object */
                    return $this->updateCategory($info, $parentObj);
                } else {
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
        $catObj = $this->getObjectByFullCode($levelInfo['levelFullCode'], $levelInfo['bu']);

        if (empty($catObj)) {
            $catObj = new DataObject\ProductCategory();
        } else {
            $catObj = DataObject::getById($catObj->getId());
        }

        $objKey = $levelInfo['objectKey'];

        $catObj->setKey(\Pimcore\Model\Element\Service::getValidKey($objKey, 'object'));
        /* Updating Object Here */
        $catObj->setBusinessUnit($levelInfo['bu']);
        $catObj->setIndustry('');
        $catObj->setLevel($levelInfo['level']);
        $catObj->setCode($levelInfo['code']);
        $catObj->setFullCode($levelInfo['levelFullCode']);

        if ($levelInfo['level'] == 1) {
            $parentId = $this->getLevelOneParentId();
            $catObj->setParentId($parentId);
            $catObj->setParentCategoryCode('05');

        } else {
            if (empty($parentObj)) {
                $parentObj = $this->getObjectByFullCode($levelInfo['parentFullCode'], $levelInfo['bu']);
            }

            if ($parentObj) {
                $catObj->setParentId($parentObj->getId());
                $catObj->setParentCategoryCode($parentObj->getCode());
                $catObj->setParentObjectId($parentObj->getId());
            }
        }

        if (
            isset($this->reader) && isset($this->reader['description']) &&
            $this->processingCode == $levelInfo['levelFullCode']
        ) {
            $catObj->setDescription($this->reader['description'], 'en');
            $catObj->setPrintedCatalogDescription($this->reader['description'], 'en');
            $catObj->setConstructionType($this->reader['description'], 'en');
        }

        $catObj->setRelatedObjectBrick(null);
        $catObj->setPublished(1);
        $catObj->save();
        if (empty($catObj)) {
            return false;
        }
        return $catObj->getId();
    }

    public function validateSpreadSheet($spreadsheet)
    {
        $activeSheet = $spreadsheet->getActiveSheet()->toArray();
        $columns = $this->extractColumns($activeSheet);
        if (count($this->columns) !== count($columns)) {
            return array(
                'status' => false,
                'message' => 'Uploaded file column(s) does not match with predefined configuration.'
            );
        }
        $reader = array_combine($this->columns, $columns);
        return $this->validateRow($reader);
    }

    public function validateRow($reader)
    {
        $exception = '';
        $flag = true;
        if (
            array_key_exists('code', $reader) &&
            !$this->getLevels($reader['code'])['status']
        ) {
            $flag = false;
            $exception = 'Column for code is not valid at row number ' .
                $this->rowCnt . '. Please check the code position or it\'s content length';
        }
        if (
            $flag && array_key_exists('level', $reader) &&
            !$this->validateLevel($reader['level'])
        ) {
            $flag = false;
            $exception = 'Column for level is not valid at row number ' .
                $this->rowCnt . '. Please check the column position or it\'s content length';
        }
        if (
            $flag && array_key_exists('description', $reader) &&
            !$this->validateDescription($reader['description'])
        ) {
            $flag = false;
            $exception = 'Column for description is not valid at row number ' .
                $this->rowCnt . '. Please check the column position or it\'s content length';
        }

        return array(
            'status' => $flag,
            'message' => $exception
        );
    }

    private function validateDescription($description)
    {
        if (!empty($description)) {
            return true;
        }
        return false;
    }

    private function validateLevel($level)
    {
        if (!empty($level) && is_numeric($level)) {
            return strlen($level) == 1 ?: false;
        }
        return false;
    }
    private function extractColumns($activeSheet)
    {
        foreach ($activeSheet as $rowCnt => $reader) {
            $this->rowCnt = $rowCnt;
            if ($rowCnt == 1) {
                return $reader;
            }
        }
    }

    public function getLevels($code, $kn = "")
    {
        $buCode = '05';
        $bu = $this->businessUnit[$buCode];

        if (!$this->isValideCodeLength($code)) {
            return array(
                'status' => false,
                'message' => 'code "' . $code . '" length is not valid'
            );
        }

        $len = strlen($code);
        $level = $this->getLevelByLength($len);
        $levels = array();
        for ($i = $level; $i >= 1; $i--) {
            $parentLevel = $this->getParentLevel($i);
            $levelFullCode = $this->extractFullCodeLevelWise($i, $code);
            $parentFullCode = $this->extractFullCodeLevelWise(($i - 1), $code);
            $levels[$i] = array(
                'code' => $this->extractCodeLevelWise($i, $code),
                'parentCode' => $this->extractCodeLevelWise($parentLevel, $code),
                'fullCode' => $code,
                'levelFullCode' => $levelFullCode,
                'parentFullCode' => $parentFullCode,
                'level' => $i,
                'bu' => $bu
            );
            if ($i == $level) {
                $levels[$i]['objectKey'] = $kn;
            } else {
                $levels[$i]['objectKey'] = $levelFullCode;
            }
        }

        return array(
            'status' => true,
            'levels' => $levels
        );
    }

    /**
     * this function will extract fullcode of given level
     */
    public function extractFullCodeLevelWise($currLevel, $code)
    {
        $levelLength = isset($this->levelLength[$currLevel]) ? $this->levelLength[$currLevel] : null;
        if ($levelLength) {
            return substr($code, 0, $levelLength);
        } else {
            return '';
        }
    }

    /**
     * this function will extract code of given level
     */
    public function extractCodeLevelWise($level, $code)
    {
        $levelLength = isset($this->levelLength[$level]) ? $this->levelLength[$level] : null;
        $levelCode = substr($code, 0, $levelLength);
        $len = strlen($levelCode);
        $from = $len - (isset($this->codeLength[$level]) ? $this->codeLength[$level] : 0);
        return substr($levelCode, $from, $len);
    }

    public function getParentLevel($currLevel)
    {
        return $currLevel - 1;
    }
    public function getLevelByLength($len)
    {
        return array_search($len, $this->levelLength);
    }

    public function isValideCodeLength($code)
    {
        $len = strlen($code);
        return in_array($len, $this->levelLength);
    }

    public function getLevelOneParentId()
    {
        $path = $this->root['fullPath'];
        if (DataObject::getByPath($path)) {
            return DataObject::getByPath($path)->getId();
        } else {
            return DataObject\Service::createFolderByPath($path)->getId();
        }
    }

    public function getObjectByFullCode($code, $bu)
    {
        try {
            if (!empty($code)) {
                $obj = new DataObject\ProductCategory\Listing;
                $obj->setCondition("fullCode='$code' AND BusinessUnit='$bu'");
                $obj->setLimit(1);
                $obj->load();

                foreach ($obj as $o) {
                    if ($o->getId()) {
                        return $o;
                    }
                }
            }
            return false;
        } catch (\Exception $ex) {
            print_r($ex);
        }
    }
}
