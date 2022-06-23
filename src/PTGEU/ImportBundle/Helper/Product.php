<?php

namespace PTGEU\ImportBundle\Helper;

use Pimcore\Model\DataObject;
use Exception;

class Product
{
    private $common;
    public $root;
    private $codeLength;
    private $validCategories;
    private $businessUnit;
    private $catConfigData;
    private $prdConfigData;
    private $productType;
    public $siopCodes;
    private $configProviderService;

    public function __construct()
    {
        /* Initiate helper */
        $this->common           = \Pimcore::getContainer()->get('import.common_helper');
        $this->catHelper        = \Pimcore::getContainer()->get('import.category_helper');
        $this->configProviderService= \Pimcore::getContainer()->get('import.config_provider_service');
        $this->catConfigData    = $this->configProviderService->getCategoryConfig();
        $this->prdConfigData    = $this->configProviderService->getProductConfig();
        $this->root             = $this->common->getParameter($this->prdConfigData, 'root');
        $this->codeLength       = $this->common->getParameter($this->catConfigData, 'codeLength');
        $this->levelLength      = $this->common->getParameter($this->catConfigData, 'levelLength');
        $this->validCategories  = $this->common->getParameter($this->catConfigData, 'validCategories');
        $this->businessUnit     = $this->common->getParameter($this->catConfigData, 'businessUnit');
        $this->productType      = $this->common->getParameter($this->prdConfigData, 'productType');
        $this->level            = $this->common->getParameter($this->prdConfigData, 'level');
    }

    /**
     * Return product type by giving length of the product
     * Ref: SAP BW Import and column oldMaterial
     */
    public function getProductType($index)
    {
        return isset($this->productType[$index]) ? $this->productType[$index] : false;
    }

    /**
     * Set 6digi, 9digit and final product object SIOP Code
     */
    public function setSiop($siops, \Pimcore\Model\DataObject\PTGEUProduct $targetObject)
    {
        if (!empty($targetObject) && !empty($siops)) {
            foreach ($siops as $l => $siop) {
                $sioLvlName = "setHierarchyLevel" . $l;
                if (!empty($siop) && $siop->getId()) {
                    $targetObject->$sioLvlName([\Pimcore::getContainer()->get('pim.category_service')::getById($siop->getId())]);
                }
            }
            /**
             * Level 1 will be common and the above array will not have info about level 1, So setting it here.
             */
            $level1Id = $this->catHelper->getLevel1ParentId();
            if (!empty($level1Id)) {
                $catObj = DataObject::getById($level1Id);
                $targetObject->setHierarchyLevel1([$catObj]);
            }
        }
    }

    public function updateSiop(\Pimcore\Model\DataObject\PTGEUProduct $targetObject)
    {
        $fullCode = $targetObject->getSiopFullCode();
        $levels = $this->getLevels($fullCode)['levels'];
        unset($levels[1]);
        $this->siop = array();
        foreach ($levels as $info) {
            $l = $info['level'];
            $this->siop[$l] = $this->catHelper->getObjectByCode($info['levelFullCode']);
            unset($l);
        }
    }

    public function getLevels($code, $reader = array())
    {
        $buCode = '50';
        $bu     = $this->businessUnit[$buCode];

        /* Replace product hierarchy descrioption for level 1 with business unit*/
        $reader['prodHier1Desc'] = $bu;
        if (!$this->catHelper->isValideCodeLength($code)) {
            return array(
                'status' => false,
                'message' => 'code "' . $code . '" length is not valid'
            );
        }

        $len = strlen($code);
        $level = $this->catHelper->getLevelByLength($len);
        $levels = array();
        for ($i = $level; $i >= 1; $i--) {
            $objectKey = empty($reader) ?: $reader[$this->level[$i]['key']];
            $parentLevel = $this->catHelper->getParentLevel($i);
            $levelFullCode = $this->catHelper->extractFullCodeLevelWise($i, $code);
            $parentFullCode = $this->catHelper->extractFullCodeLevelWise(($i - 1), $code);
            $parentPath = $parentLevel ? $this->getParentPath($parentLevel, $reader) : $this->root['fullPath'];
            $objectPath = $parentPath . '/' . $objectKey;
            $levels[$i] = array(
                'code'          =>  $this->catHelper->extractCodeLevelWise($i, $code),
                'parentCode'    =>  $this->catHelper->extractCodeLevelWise($parentLevel, $code),
                'fullCode'      =>  $code,
                'levelFullCode' =>  $levelFullCode,
                'parentFullCode' =>  $parentFullCode,
                'level'         =>  $i,
                'bu'            =>  $bu,
                'objectKey'     =>  $objectKey,
                'parentObjectKey'   =>  empty($reader) ?: $reader[$this->level[$parentLevel]['key']],
                'objectPath'    =>  $objectPath,
                'parentPath'    =>  $parentPath
            );
        }

        return array(
            'status'    =>  true,
            'levels'    =>  $levels
        );
    }

    public function getParentPath($lvl, $reader)
    {
        $path = '';
        if ($lvl == 1) {
            $path = '';
        } else {
            for ($i = 1; $i <= $lvl; $i++) {
                if (empty($path))
                {
                    $path = \Pimcore\Model\Element\Service::getValidKey($reader[$this->level[$i]['key']], 'folder');
                }
                else {
                    $path .= '/' . \Pimcore\Model\Element\Service::getValidKey($reader[$this->level[$i]['key']], 'folder');
                }
            }
        }
        if (empty($path)) {
            $path = $this->root['fullPath'];
        } else {
            $path = $this->root['fullPath'] . '/' . $path;
        }
        return $path;
    }

    /**
     * return type is product or category object
     * @param $fullCode is the SIOP full code
     * Des: It will create maximum allowed hierarchy for business unit
     * In case of PTG it will create base and skeleton level after creating maximum allowed siop level
     * In case of PTG last 2 level of SIOP will be use as base and skeleton
     */

    public function createCategoryHierarchy($fullCode)
    {
        /** Loading list of siop code */
        $parentObj = false;
        $this->catHelper->getCategories();
        $code = $fullCode;
        $len = strlen($code);
        $topLvl = $this->catHelper->getLevelByLength($len);
        $buCode = $this->catHelper->isValidCategoryFormat($code);
        $bu = $this->businessUnit[$buCode];
        $allowedLevel = $this->common->getParameterItem($this->prdConfigData, 'allowedLevel', $bu);
        if (!empty($allowedLevel) && $allowedLevel < $topLvl) {
            $code = $this->catHelper->extractFullCodeLevelWise($allowedLevel, $fullCode);
        }
        $fullPath = $this->catHelper->getCategoryFullPathByFullCode($code);
        $extractedPath = $this->extractCategoryPath($fullPath, $bu);
        $prdCatFullPath = $this->root['fullPath'] . '/' . $extractedPath;
        $parentObj = DataObject\Service::createFolderByPath($prdCatFullPath);
        
        if ($allowedLevel < $topLvl) {
            for ($l = ($allowedLevel + 1); $l <= $topLvl; $l++) {
                $code = $this->catHelper->extractFullCodeLevelWise($l, $fullCode);
                $parentObj = $this->createCategoryObjectHierarchy($code, $parentObj, $l, $bu);
            }
        }
        return $parentObj;
    }

    private function createCategoryObjectHierarchy($code, $parentObj, $siopLevel, $bu = "")
    {
        $catObj = $this->catHelper->getObjectByFullCode($code, $bu);
        $brickMappingService = \Pimcore::getContainer()->get('AppBundle\Services\CategoryBrickMappingService');
        if (!empty($catObj)) {
            $keyName = $catObj->getKey();
            $prdFullPath = $parentObj->getFullPath() . '/' . $keyName;
            $prdObj = DataObject::getByPath($prdFullPath);
            if (empty($prdObj)) {
                $prdObj = new DataObject\PTGEUProduct;
                $prdObj->setKey($keyName);
                $prdObj->setParentId($parentObj->getId());
            }
            $productTypeKey = $this->common->getParameterItem($this->prdConfigData, 'productTypeLevel', $siopLevel);
            $prodType = $this->getProductType($productTypeKey);
            $prdObj->setProductType($prodType);
            $prdObj->setSiopFullCode($code);
            $this->updateSiop($prdObj);
            $this->setSiop($this->siop, $prdObj);
            $brickMappingService->manageBricksForSIOPRelationChange($prdObj);
            $prdObj->setPublished(1);
            $prdObj->save();
            unset($keyName,
            $prdFullPath,
            $productTypeKey,
            $productTyp,
            $this->siop);
            return $prdObj;
        }
        return false;
    }
    
    public function extractCategoryPath($path, $bu)
    {
        if (!empty($path) && !empty($bu)) {
            return substr($path, stripos($path, $bu), strlen($path));
        }
        return false;
    }

    public function isCategoryExist($fullCode)
    {
        $buCode = $this->catHelper->isValidCategoryFormat($fullCode);
        $bu = $this->businessUnit[$buCode];
        return $this->catHelper->getObjectByFullCode($fullCode, $bu);
    }

    public function getBaseCode($oldMaterialCode)
    {
        $length = $this->level = $this->common->getParameterItem($this->prdConfigData, 'base', 'length');
        return !empty($oldMaterialCode) ? substr($oldMaterialCode, 0, $length) : false;
    }

    public function getSkeletonCode($oldMaterialCode)
    {
        $length = $this->level = $this->common->getParameterItem($this->prdConfigData, 'skeleton', 'length');
        return !empty($oldMaterialCode) ? substr($oldMaterialCode, 0, $length) : false;
    }

    public function getConfigurationDataByKey($key)
    {
        return $this->common->getParameter($this->prdConfigData, $key);
    }

    public function isValidCategoryCode($siopCode) {
        if (strlen($siopCode) == 18) {
            return true;
        }
        return false;
    }

    public function convertCategoryPathToProduct($categoryPath) {
        $search = '/Master List/Product Hierarchy';
        $replace = '/Products';
        return str_replace($search, $replace, $categoryPath);
    }
    
    public function getFolderByPath($folderPath) {
        $pathExists = \Pimcore\Model\DataObject\Service::pathExists($folderPath);
        if (empty($pathExists)) {
            $folder = \Pimcore\Model\DataObject\Service::createFolderByPath($folderPath);
        } else {
            $folder = \Pimcore\Model\DataObject\Service::getElementByPath('object', $folderPath);
        }
        return $folder->getId();
    }
    
    public function getObjectIndex($type, $levelInfo) 
    {
        if ($type == 'base') {
            $objectIndex = count($levelInfo)-2;
        } elseif ($type == 'skeleton' || $type == 'fert') {
            $objectIndex = count($levelInfo);
        }
        return $objectIndex;
    }

    public function processBricksData($rowData)
    {
        $bricksData = [];
        $brickAttributesConfigData  = $this->configProviderService->getBrickAttributesConfig();
        foreach ($rowData as $fieldCSVKey => $fieldValue) 
        { 
            $fieldCSVKey = trim($fieldCSVKey);
            if(isset($brickAttributesConfigData[$fieldCSVKey])) 
            {
                $fieldConfig= $brickAttributesConfigData[$fieldCSVKey];
                $fieldName  = $fieldConfig['fieldName'];
                $objectType = $fieldConfig['objectType'];
                if ($objectType != 'class') 
                {
                    $bricksData[$fieldConfig['objectType']][$fieldName] = $fieldValue;
                }
            }
        }
        return $bricksData;
    }

    public function processBricksUnitData()
    {
        $bricksUnits     = [];
        $unitValueConfig = $this->configProviderService->getUnitValueConfig();
        foreach ($unitValueConfig as $unitValue) {
                $bricksUnits[$unitValue['objectType']][$unitValue['fieldName']] = $unitValue['fieldValue'];
        }
        return $bricksUnits;
    }
}
