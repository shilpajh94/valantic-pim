<?php

namespace AppBundle\OptionProvider;

use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;


class UserRoleOptionProvider implements SelectOptionsProviderInterface
{
    /**
     * @param array $context 
     * @param Data $fieldDefinition 
     * @return array
     */
    public function getOptions($context, $fieldDefinition) {
        $roleList = new \Pimcore\Model\User\Role\Listing;
        $roleList->load();
        $roles = array();
        $roleList = $roleList->getItems();
        if(!empty($roleList) && count($roleList)>0) {
            foreach($roleList as $role) {
                $roles[] = array(
                    'key'       =>  $role->getName(),
                    'value'     =>  $role->getId()
                );
            }
        }
        return $roles;
    }

    /**
     * Returns the value which is defined in the 'Default value' field  
     * @param array $context 
     * @param Data $fieldDefinition 
     * @return mixed
     */
    public function getDefaultValue($context, $fieldDefinition) {
        return true;//$fieldDefinition->getDefaultValue();
    }

    /**
     * @param array $context 
     * @param Data $fieldDefinition 
     * @return bool
     */
    public function hasStaticOptions($context, $fieldDefinition) {
        return true;
    }

}