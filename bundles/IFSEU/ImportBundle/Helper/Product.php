<?php

namespace IFSEU\ImportBundle\Helper;

use Pimcore\Model\DataObject;
use Exception;
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
    public $catHelper;
    public $levelLength;
    public $level;
    public $siop;
    private $configProviderService;
    private $unitConversionService;
    private $container;

    public function __construct(ContainerInterface $container)
    {        
        /* Initiate helper */
        $this->container = $container;
        $this->common           = $this->container->get('ifs_eu_import.common_helper');
        $this->catHelper        = $this->container->get('ifs_eu_import.category_helper');
        $this->configProviderService= $this->container->get('ifs_eu_import.config_provider_service');
        $this->unitConversionService= $this->container->get('ifs_eu_import.unit_conversion_import_service');
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

    public function getLevels($code, $reader = array())
    {
        $buCode = '30';
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
            $objectKey = empty($reader) ?:( isset($reader[$this->level[$i]['key']]) ? $reader[$this->level[$i]['key']] : NULL);
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
                'parentObjectKey'   =>  empty($reader) ?: ((isset($this->level[$parentLevel]) && isset($reader[$this->level[$parentLevel]['key']])) ? $reader[$this->level[$parentLevel]['key']] : NULL),
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
                if (empty($path) && isset($reader[$this->level[$i]['key']]))
                {
                    $path = \Pimcore\Model\Element\Service::getValidKey($reader[$this->level[$i]['key']], 'folder');
                }
                else {
                    if(isset($reader[$this->level[$i]['key']])){
                        $path .= '/' . \Pimcore\Model\Element\Service::getValidKey($reader[$this->level[$i]['key']], 'folder');
                    }
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
    

    public function isValidCategoryCode($siopCode) {
        if (strlen($siopCode) == 16) {
            return true;
        }
        return false;
    }

    public function convertCategoryPathToProduct($categoryPath) {
        $search = '/Master Data/Product Category';
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
            $objectIndex = count($levelInfo)-1;
        } elseif ($type == 'skeleton' || $type == 'fert') {
            $objectIndex = count($levelInfo);
        }
        return $objectIndex;
    }

    public function processBricksData($rowData, $brick)
    {
        $bricksData = [];
        $brickAttributesConfigData  = $this->configProviderService->getBrickAttributesConfig();
        $conversionAttributeArr=[];
        $convertFieldsValue=[];
        foreach ($brickAttributesConfigData as $attributeLabel => $brickAttributeConfig) 
        { 
            $fieldName  = $brickAttributeConfig['fieldName'];
            $fieldType = $brickAttributeConfig['fieldType'];
            $objectType = $brickAttributeConfig['objectType'];
            $attributeLabel  = trim($attributeLabel);
            if($objectType==$brick)
            {
                
                $fieldValue =  array_key_exists($attributeLabel, $rowData) ? $rowData[$attributeLabel] : '';
                // $attributeGroupName = $this->unitConversionService->getAttributeGroupName($fieldName);
                // if(!($attributeLabel== 'OD mm' || $attributeLabel== 'OD inch') && !empty($attributeGroupName) && !empty($fieldValue)){
                //     $conversionAttributeArr= $this->unitConversionService->getGroupWithValues($fieldName, floatval($fieldValue));
                //     foreach($conversionAttributeArr as $key=>$convertValues){
                //         $convertFieldsValue[$key]=$convertValues;
                //     }
                // }
                if($fieldType=='Boolean Select')
                {
                    $fieldValue = $this->getBooleanValue($fieldValue);
                }
                
                $bricksData[$fieldName] = $fieldValue;
            }
        }
        // if(!empty($convertFieldsValue)){
        //     $checkfields=['IdInch','IdMM','wallThicknessInch','wallThicknessMM'];
        //     foreach($convertFieldsValue as $key=>$convertedValues){
        //         $bricksData[$key] = $convertedValues;
        //         if(in_array($key,$checkfields)){
        //             $bricksData['OdIn']=$convertFieldsValue['IdInch']+($convertFieldsValue['wallThicknessInch']*2);
        //             $bricksData['Odmm']=$convertFieldsValue['IdMM']+($convertFieldsValue['wallThicknessMM']*2);
        //         }
        //     }
        // }
        return $bricksData;
    }

    private function getBooleanValue($data)
    {
        switch ($data) {
            case 'Y':
                return 1;
            case 'Yes':
                return 1;
            case 'N':
                return -1;
            case 'No':
                return -1;
            case 'FALSE':
                return -1;
            case 'TRUE':
                return 1;
            default:
                return;
        }
    } 
}
