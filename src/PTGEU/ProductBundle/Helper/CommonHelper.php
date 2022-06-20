<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace PTGEU\ProductBundle\Helper;

use Pimcore\Model\User;
use Pimcore\Tool\Admin as AdminTool;
/**
 * Description of CommonHelper
 *
 * @author TehreemPervez
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
                $editableAttributes = \Pimcore::getContainer()->get('ContitechCS\ProductBundle\Services\ConfigProviderService')->getConfigFromYmlFile(PTGEU_ROLE_BASED_MANDATORY_ATTRIBUTES_FILE_PATH);
            
                $allRestrictedFields = $editableAttributes['MandatoryAttribures'];   
                foreach ($allRestrictedFields as $attribute) {
                    $allAttributeList[$attribute] = true;
                }
            }
        }
        
        return ['MandatoryAttribures' => $allAttributeList];
    }
    
    
}
