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
        $allAttributeList = [];
        if (!empty($roles) && count($roles)>0) {
            $rolesList = new User\Role\Listing();
            $rolesList->setCondition('`id` IN ('.implode(", ", $roles).' )');
            $rolesList->load();
            if (!empty($rolesList) && $rolesList->getItems()>0) {
                $editableAttributes = \Pimcore::getContainer()->get('ContitechCS\ProductBundle\Services\ConfigProviderService')->getConfigFromYmlFile(IFSEU_MANDATORY_ATTRIBUTES_FILE_PATH);
            
                $allRestrictedFields = $editableAttributes['MandatoryAttributes'];   
                foreach ($allRestrictedFields as $attribute) {
                    $allAttributeList[$attribute] = true;
                }
            }
        }
        return ['MandatoryAttributes' => $allAttributeList];
    }    
}
