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
        $parent = $product->getParent();
        $config = $this->getConfigFromYmlFile(CS_PRODUCT_ATTRIBUTE_VALIDATION_FILE_PATH);
        $applyValidation = false;
        if (isset($config[$productName]) && !empty($config[$productName])) {
            $this->productConfig = $config[$productName];
            $applyValidation = true;
        } else {
            if ($parent != "/Contitech_ConveyorSolution/Products") {
                $parentName = trim($parent->getName());
                if (isset($config[$parentName]) && !empty($config[$parentName])) {
                    $applyValidation = true;
                    $this->productConfig = $config[$parentName];
                }
            }
        }
        return $applyValidation;
    }
    
    public function checkForMandatoryValidation($product) {
        
        // $applyvalidation = false;
        if (!empty($this->productConfig)) {
            $className = $product->getClassName();
            $arr = array('Please fill all mandatory fields');
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
                        $arr[] = "$fieldTitle in Base Data";
                    }
                } else {
                    $getBrickMethod = "get$objectType";
                    $getBrickAttributeMethod = "get$fieldName";
                    $v = $product->getProductAttributes()->$getBrickMethod()->$getBrickAttributeMethod();
                    $brickClass =  DataObject\Objectbrick\Definition::getByKey($objectType);
                    $brickfieldTitle = $brickClass->getFieldDefinition($fieldName)->getTitle();
                    $objectTitle = $brickClass->getTitle();
                    if (empty($v)) {
                        $arr[] = "$brickfieldTitle in $objectTitle";
                    }
                }
            }

            if (count($arr) > 1) {
                $msg = join("<br />- ", $arr);
                throw new ValidationException($msg, 1234);
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
