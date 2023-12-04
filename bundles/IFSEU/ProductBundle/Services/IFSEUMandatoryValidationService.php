<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace IFSEU\ProductBundle\Services;

use Pimcore\Model\DataObject;
use AppBundle\Tool\Utils;
use Pimcore\Cache;
use Pimcore\Model\User;
use Pimcore\Model\Element\ValidationException;

/**
 * Description of IFSEUMandatoryValidationService
 *
 */

class IFSEUMandatoryValidationService
{

    private $productConfig;

    public function checkValidationApplicability($product)
    {
        $config = $this->getConfigFromYmlFile(IFSEU_MANDATORY_ATTRIBUTES_FILE_PATH);
        $applyValidation = false;
        if (isset($config['MandatoryAttributes']) && !empty($config['MandatoryAttributes'])) {
            $this->productConfig = $config['MandatoryAttributes'];
            $applyValidation = true;
        } else {
            $parent = $product->getParent();
            while ($parent->getType() == 'folder' && $parent->getFullPath() != "/Contitech_IFS_EMEA/Products") {
                $parent = $parent->getParent();
            }
            if ($parent->getType() != 'folder' && $parent instanceof DataObject\IFSEUProduct) {
                if (isset($config['MandatoryAttributes']) && !empty($config['MandatoryAttributes'])) {
                    $applyValidation = true;
                    $this->productConfig = $config['MandatoryAttributes'];
                }
            }
        }
        return $applyValidation;
    }

    public function checkForMandatoryValidation($product, $reqAttributesByUser = [])
    {
        if (!empty($this->productConfig)) {
            $product->setGetInheritedValues(true);
            $className = $product->getClassName();
            $arr = array('Please fill all mandatory fields');
            $attributeNameArray = [];
            $attributeNameArrayValidate = [];
            $productType = $product->getProductType();
            foreach ($this->productConfig as $cnf) {
                $fieldName = $cnf['fieldName'];
                $fieldLevel = $cnf['fieldLevel'];
                $fieldType = $cnf['fieldType'];
                if($fieldLevel == $productType){
                    if($fieldType != 'objectBrick'){
                        $method = "get$fieldName";
                        $class = DataObject\ClassDefinition::getByName($className);
                        $fieldTitle = $class->getFieldDefinition($fieldName);
                        if ($fieldTitle) {
                            $fieldTitle = $fieldTitle->getTitle();
                        } else {
                            $fieldTitle = $fieldName;
                        }
                        $value = $product->$method();
                        if (empty($value) && ($value != false || $value != '0')) {
                            if($productType == 'fert'){
                                $productType = 'Finished Goods';
                            }
                            $arr[$fieldName] = "$fieldTitle in ".$productType." data";
                            $attributeNameArray[] = $fieldName;
                        }
                    }else{
                        $objectBrickName=$cnf['objectBrickName'];
                        $getBrickMethod = "get".$objectBrickName;
                        $getBrickAttributeMethod = "get$fieldName";
                        $brickObject = $product->getBase()->$getBrickMethod();
                        if (!empty($brickObject)) {
                            $v = $product->getBase()->$getBrickMethod()->$getBrickAttributeMethod();
                            $brickClass =  DataObject\Objectbrick\Definition::getByKey($objectBrickName);
                            $brickfieldTitle = $brickClass->getFieldDefinition($fieldName)->getTitle();
                            $objectTitle = $brickClass->getTitle();
                            if (empty($v)) {
                                $arr[$fieldName] = "$brickfieldTitle in $objectTitle";
                                $attributeNameArray[] = $fieldName;
                            }
                        }
                    }
                }
            }
            
            if(count($arr) > 1){
                if (!empty($reqAttributesByUser) && count($reqAttributesByUser) > 0) {
                    $attributeNameArrayValidate = array('Please fill all mandatory fields');
                    foreach ($attributeNameArray as $attribute) {
                        if (array_key_exists($attribute, $reqAttributesByUser['all'])) {
                            $attributeNameArrayValidate[] = $arr[$attribute];
                        }
                    }
                    if (count($attributeNameArrayValidate) > 1) {
                        $msg = join("<br />- ", $attributeNameArrayValidate);
                        throw new ValidationException($msg, 1234);
                    }
                }
                else {
                        $msg = join("<br />- ", $arr);
                        throw new ValidationException($msg, 1234);
                }
            }
        }
    }


    public function checkForParentUnpublishValidation($product)
    {
        $parent = $product->getParent();
        while ($parent->getFullPath() != '/Contitech_IFS_EMEA/Products') {
            if ($parent->getType() != 'folder' && $parent->isPublished() == 0) {
                throw new \Pimcore\Model\Element\ValidationException
                ("Cannot publish product if parent product is unpublished");
            } else {
                $parent = $parent->getParent();
            }
        }
    }

    /**
     * get yaml config for the given file
     * caching the file data if environment is not dev
     *
     * @param $filePath
     * @return mixed
     */
    public function getConfigFromYmlFile($filePath)
    {
        $env = \Pimcore\Config::getEnvironment();
        $cacheKey = Utils::getCacheKeyForFilePath($filePath);

        if ($env != "dev") {
            $config = Cache::load($cacheKey);
            if (!$config) {
                $config = Utils::getYmlConfig($filePath);
                Cache::save($config, $cacheKey);
            }
        } else {
            $config = Utils::getYmlConfig($filePath);
            Cache::save($config, $cacheKey);
        }
        return $config;
    }
}
