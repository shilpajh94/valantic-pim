<?php

namespace AppBundle\Helper;

use Pimcore\Model\DataObject;
use Symfony\Component\DependencyInjection\ContainerInterface;

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
    private $siopObjects;
    private $container;
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        /* Initiate helper */
        $this->common = $this->container->get('app.common_helper');
        $this->catHelper = $this->container->get('app.category_helper');
        /* Loading global configuration for category */
        $this->catConfigData = $this->container->get('app.config_provider_service')->getCategoryConfig();
        $this->prdConfigData = $this->container->get('app.config_provider_service')->getProductConfig();
        $this->root = $this->common->getParameter($this->prdConfigData, 'root');
        $this->codeLength = $this->common->getParameter($this->catConfigData, 'codeLength');
        $this->levelLength = $this->common->getParameter($this->catConfigData, 'levelLength');
        $this->validCategories = $this->common->getParameter($this->catConfigData, 'validCategories');
        $this->businessUnit = $this->common->getParameter($this->catConfigData, 'businessUnit');
        $this->productType = $this->common->getParameter($this->prdConfigData, 'productType');
        $this->level = $this->common->getParameter($this->prdConfigData, 'level');
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
    public function setSiop($siops, \Pimcore\Model\DataObject\Product $targetObject)
    {
        if (!empty($targetObject) && !empty($siops)) {
            foreach ($siops as $l => $siop) {
                $sioLvlName = "setSIOPLevel" . $l;
                if (!empty($siop) && $siop->getId()) {
                    $targetObject->$sioLvlName([$this->container->get('pim.category_service')::getById($siop->getId())]);
                }
            }
            /**
             * Level 1 will be common and the above array will not have info about level 1, So setting it here.
             */
            $level1Id = $this->catHelper->getLevel1ParentId();
            if (!empty($level1Id)) {
                $catObj = DataObject::getById($level1Id);
                $targetObject->setSIOPLevel1([$catObj]);
            }
        }
    }

    public function updateSiop(\Pimcore\Model\DataObject\Product $targetObject)
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
        $buCode = $this->catHelper->isValidCategoryFormat($code);
        $bu = $this->businessUnit[$buCode];
        /* Replace product hierarchy descrioption for level 1 with business unit*/
        $reader['prodHier1Desc'] = $bu;
        if (!$this->catHelper->isValideCodeLength($code)) {
            return array(
                'status' => false,
                'message' => 'code "' . $code . '" length is not valid'
            );
        }
        if (!$buCode) {
            return array(
                'status' => false,
                'message' => 'code "' . $code . '" does not belong to any valid category'
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
            $parentPath = $parentLevel ? $this->getParentPath($parentLevel, $buCode, $reader) : $this->root['fullPath'];
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
            // p_r($levels);die;
        }

        return array(
            'status'    =>  true,
            'levels'    =>  $levels
        );
    }

    public function getParentPath($lvl, $buCode, $reader)
    {
        $bu = $this->businessUnit[$buCode];
        $path = '';
        if ($lvl == 1) {
            $path = '';
        } else {
            for ($i = 1; $i <= $lvl; $i++) {
                // $path[] = \Pimcore\Model\Element\Service::getValidKey($reader[$this->level[$i]['key']], 'object');
                if (empty($path))
                    $path = \Pimcore\Model\Element\Service::getValidKey($reader[$this->level[$i]['key']], 'folder');
                else {
                    $path .= '/' . \Pimcore\Model\Element\Service::getValidKey($reader[$this->level[$i]['key']], 'folder');
                }
            }
        }
        if (empty($path)) {
            $path = $this->root['fullPath'] . '/' . $bu;
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
    /* public function createCategoryHierarchy($fullCode)
    {
        $code = $fullCode;
        $len = strlen($code);
        $topLvl = $this->catHelper->getLevelByLength($len);
        $buCode = $this->catHelper->isValidCategoryFormat($code);
        $bu = $this->businessUnit[$buCode];
        $allowedLevel = $this->common->getParameterItem($this->prdConfigData, 'allowedLevel', $bu);
        if (!empty($allowedLevel) && $allowedLevel < $topLvl) {
            $code = $this->catHelper->extractFullCodeLevelWise($allowedLevel, $fullCode);
        }
        $catObj = $this->catHelper->getObjectByFullCode($code, $bu);
        if (!empty($catObj)) {
            $fullPath = $catObj->getFullPath();
            $extractedPath = $this->extractCategoryPath($fullPath, $bu);
            $prdCatFullPath = $this->root['fullPath'] . '/' . $extractedPath;
            $parentObj = DataObject\Service::createFolderByPath($prdCatFullPath);
            $obj = "";
            if ($allowedLevel < $topLvl) {
                for ($l = ($allowedLevel + 1); $l <= $topLvl; $l++) {
                    $code = $this->catHelper->extractFullCodeLevelWise($l, $fullCode);
                    $parentObj = $this->createCategoryObjectHierarchy($code, $parentObj, $l, $bu);
                }                
            }
            return $parentObj;
        }
        return false;
    } */

    public function createCategoryHierarchy($fullCode)
    {
        /** Loading list of siop code */
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
        $obj = "";
        if ($allowedLevel < $topLvl) {
            for ($l = ($allowedLevel + 1); $l <= $topLvl; $l++) {
                $code = $this->catHelper->extractFullCodeLevelWise($l, $fullCode);
                $parentObj = $this->createCategoryObjectHierarchy($code, $parentObj, $l, $bu);
            }
        }
        return $parentObj;
        return false;
    }
    private function createCategoryObjectHierarchy($code, $parentObj, $siopLevel, $bu = "")
    {
        $catObj = $this->catHelper->getObjectByFullCode($code, $bu);
        $brickMappingService = $this->container->get('AppBundle\Services\CategoryBrickMappingService');
        if (!empty($catObj)) {
            $keyName = $catObj->getKey();
            $prdFullPath = $parentObj->getFullPath() . '/' . $keyName;
            $prdObj = DataObject::getByPath($prdFullPath);
            if (empty($prdObj)) {
                $prdObj = new DataObject\Product;
                $prdObj->setKey($keyName);
                $prdObj->setParentId($parentObj->getId());
            }
            $productTypeKey = $this->common->getParameterItem($this->prdConfigData, 'productTypeLevel', $siopLevel);
            $productType = $this->getProductType($productTypeKey);
            $prdObj->setProductType($productType);
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
}
