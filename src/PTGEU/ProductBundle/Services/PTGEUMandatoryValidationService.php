<?php

namespace PTGEU\ProductBundle\Services;

use Pimcore\Model\Element\ValidationException;
use Pimcore\Model\DataObject;
use ContitechCS\ProductBundle\Tool\Utils;
use Pimcore\Cache;
use Pimcore\Model\User;

class PTGEUMandatoryValidationService {

   

    public function checkForMandatoryValidation($product, $reqAttributesByUser = []) {
        
        $config = $this->getConfigFromYmlFile(PTGEU_PRODUCT_ROLE_BASED_EDITABLE_ATTRIBUTES_FILE_PATH); //whole config
       
        $product->setGetInheritedValues(true); //all info
        $className = $product->getClassName();  //PTGEUProduct
        $arr = array('Please fill all mandatory fields');
        $attributeNameArray = [];
        $count = 0;
        foreach ($config as $cnf) {
            $fieldName = $cnf[$count++];

                $method = "get$fieldName";  //getshelfLife
                $class = DataObject\ClassDefinition::getByName($className);
                $fieldTitle = $class->getFieldDefinition($fieldName);

                if ($fieldTitle) {
                    $fieldTitle = $fieldTitle->getTitle(); //Shelf Life
                } else {
                    $fieldTitle = $fieldName;
                }
                $value = $product->$method();
                if (empty($value)) {
                    $arr[$fieldName] = "$fieldTitle in Base Data"; //Shelf Life
                    $attributeNameArray[] = $fieldName;  //ShelfLife
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

     
    public function checkForParentUnpublishValidation($product) {
        $parent = $product->getParent();
        while($parent->getFullPath() != '/PTG_EU/Products') {
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