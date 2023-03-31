<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace IFSEU\ProductBundle\Helper; 

use Pimcore\Model\User;
/**
 * Description of CommonHelper
 *
 */
class CommonHelper {

     public static function getEditableFieldsByUser(User $user) {
        $roles = $user->getRoles();
        $attributeList = [];
        $allAttributeList = [];
        if (!empty($roles) && count($roles)>0) {
            $rolesList = new User\Role\Listing();
            $rolesList->setCondition('`id` IN ('.implode(", ", $roles).' )');
            $rolesList->load();
            if (!empty($rolesList) && $rolesList->getItems()>0) {
                $editableAttributes = \Pimcore::getContainer()->get('ContitechCS\ProductBundle\Services\ConfigProviderService')->getConfigFromYmlFile(IFS_EU_PRODUCT_ROLE_BASED_EDITABLE_ATTRIBUTES_FILE_PATH);
                foreach ($rolesList->getItems() as $role) {
                    $roleName = $role->getName();    
                    $attributes = $editableAttributes[$roleName];
                    if($attributes){
                        foreach ($attributes as $attribute) {
                            $attributeList[$attribute] = true;
                        }    
                    }
                }
                $allRestrictedFields = $editableAttributes['All'];     
                foreach ($allRestrictedFields as $attribute) {
                    $allAttributeList[$attribute] = true;

                }
            }
        }
        
        return ['all' => $allAttributeList, 'byRole' => $attributeList];
    }
    
    public static function getFolderByPath($folderPath, $type = 'object') {
        $clsType = $type;
        if ($type =='object') {
            $clsType = 'DataObject';
        }
        $cls = "\\Pimcore\\Model\\".ucfirst($clsType)."\\Service";
        $pathExists = $cls::pathExists($folderPath);
        if (empty($pathExists)) {
            $folder = $cls::createFolderByPath($folderPath);
        } else {
            $folder = $cls::getElementByPath($type, $folderPath);
        }
        return $folder->getId();
    }
}
