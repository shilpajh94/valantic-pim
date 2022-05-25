<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ContitechCS\ProductBundle\Services;

use Pimcore\Model\DataObject;
use ContitechCS\ProductBundle\Tool\Utils;
use Pimcore\Cache;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\Element\ValidationException;

/**
 * Description of MandatoryValidationService
 *
 * @author rohitsrivastava
 */
class MandatoryValidationService {
    
    private $productConfig;
    
    public function checkValidationApplicability($product) {
        $productName = trim($product->getName());
        $config = $this->getConfigFromYmlFile(CS_PRODUCT_ATTRIBUTE_VALIDATION_FILE_PATH);
        $applyValidation = false;
        if (isset($config[$productName]) && !empty($config[$productName])) {
            $this->productConfig = $config[$productName];
            $applyValidation = true;
        } else {
            $parent = $product->getParent();
            while ($parent->getType()=='folder' && $parent->getFullPath() != "/Contitech_ConveyorSolution/Products") {
                $parent = $parent->getParent();
            }
            if ($parent->getType() != 'folder' && $parent instanceof DataObject\CSProducts) {
                $parentName = trim($parent->getName());
                if (!empty($parentName) && isset($config[$parentName]) && !empty($config[$parentName])) {
                    $applyValidation = true;
                    $this->productConfig = $config[$parentName];
                }
            }
        }
        return $applyValidation;
    }
    
    public function checkForMandatoryValidation($product, $reqAttributesByUser = []) {
        
        // $applyvalidation = false;
        if (!empty($this->productConfig)) {
            $product->setGetInheritedValues(true);
            $className = $product->getClassName();
            $arr = array('Please fill all mandatory fields');
            $attributeNameArray = [];
            foreach ($this->productConfig as $cnf) {
                $fieldName = $cnf['fieldName'];
                $objectType = $cnf['objectType'];
                if ($objectType === "class") {
                    $method = "get$fieldName";
                    $class = DataObject\ClassDefinition::getByName($className);
                    $fieldTitle = $class->getFieldDefinition($fieldName);
                    if ($fieldTitle) {
                        $fieldTitle = $fieldTitle->getTitle();
                    } else {
                        $fieldTitle = $fieldName;
                    }
                    $value = $product->$method();
                    if (empty($value)) {
                        $arr[$fieldName] = "$fieldTitle in Base Data";
                        $attributeNameArray[] = $fieldName;
                    }
                } else {
                    $getBrickMethod = "get$objectType";
                    $getBrickAttributeMethod = "get$fieldName";
                    $brickObject = $product->getProductAttributes()->$getBrickMethod();
                    if (!empty($brickObject)) {
                        $v = $product->getProductAttributes()->$getBrickMethod()->$getBrickAttributeMethod();
                        $brickClass =  DataObject\Objectbrick\Definition::getByKey($objectType);
                        $brickfieldTitle = $brickClass->getFieldDefinition($fieldName)->getTitle();
                        $objectTitle = $brickClass->getTitle();
                        if (empty($v)) {
                            $arr[$fieldName] = "$brickfieldTitle in $objectTitle";
                            $attributeNameArray[] = $fieldName;
                        }
                    }
                }
            }

            if (count($arr) > 1) {
                if (!empty($reqAttributesByUser) && count($reqAttributesByUser)>0) {
                    $newArray = array('Please fill all mandatory fields');
                    foreach ($attributeNameArray as $attribute) {
                        if (array_key_exists($attribute, $reqAttributesByUser['all']) && array_key_exists($attribute, $reqAttributesByUser['byRole'])) {
                            $newArray[] = $arr[$attribute];
                        }
                    }
                    if (count($newArray)>1) {
                        $msg = join("<br />- ", $newArray);
                        throw new ValidationException($msg, 1234);
                    }
                } else {
                    $msg = join("<br />- ", $arr);
                    throw new ValidationException($msg, 1234);
                }
            }
        }
    }
    
    
    public function checkForParentUnpublishValidation($product) {
        $parent = $product->getParent();
        while($parent->getFullPath() != '/Contitech_ConveyorSolution/Products') {
            if ($parent->getType() != 'folder' && $parent->isPublished() == 0) {
                throw new \Pimcore\Model\Element\ValidationException("Cannot publish product if parent product is unpublished");
            }
            else{
                $parent = $parent->getParent();
            }
        }
    }
    
    


    /**
     * get yml config for the given file
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
