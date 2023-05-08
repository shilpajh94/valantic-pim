<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace IFSEU\ProductBundle\Model\DataObject;

use Pimcore\Model;
use Pimcore\Tool\Admin as AdminTool;


class Service extends \Pimcore\Model\DataObject\Service {
    
    
    /**
     * @param Model\User $user
     */
    public function __construct($user = null)
    {
        $this->_user = $user;
    }
    /**
     * Enriches the layout definition before it is returned to the admin interface.
     *
     * @param Model\DataObject\ClassDefinition\Data|Model\DataObject\ClassDefinition\Layout $layout
     * @param Concrete $object
     * @param array $context additional contextual data
     */
    public static function enrichLayoutDefinition(&$layout, $object = null, $context = [])
    {
        $user = AdminTool::getCurrentUser();
        $editableFields = [];
        if (!$user->isAdmin() &&  !empty($object) && ($object->getClassName() == 'IFSEUProduct')) {
            $editableFields = \IFSEU\ProductBundle\Helper\CommonHelper::getEditableFieldsByUser($user);
        }
        $context['object'] = $object;

        if (method_exists($layout, 'enrichLayoutDefinition')) {
            $layout->enrichLayoutDefinition($object, $context);
        }

        if ($layout instanceof Model\DataObject\ClassDefinition\Data\Localizedfields) {
            $user = AdminTool::getCurrentUser();
            if (!$user->isAdmin() && ($context['purpose'] ?? null) !== 'gridconfig') {
                $allowedView = self::getLanguagePermissions($object, $user, 'lView');
                $allowedEdit = self::getLanguagePermissions($object, $user, 'lEdit');
                self::enrichLayoutPermissions($layout, $allowedView, $allowedEdit);
            }

            if (isset($context['containerType']) && $context['containerType'] === 'fieldcollection') {
                $context['subContainerType'] = 'localizedfield';
            } elseif (isset($context['containerType']) && $context['containerType'] === 'objectbrick') {
                $context['subContainerType'] = 'localizedfield';
            } else {
                $context['ownerType'] = 'localizedfield';
            }
            $context['ownerName'] = 'localizedfields';
        } 
        else if (!$user->isAdmin() && !empty($object) && ($object->getClassName() == 'IFSEUProduct') && $layout instanceof Model\DataObject\ClassDefinition\Data && !($layout instanceof Model\DataObject\ClassDefinition\Data\Objectbricks) && !($layout instanceof Model\DataObject\ClassDefinition\Data\Fieldcollections)) {
            if (($context['purpose'] ?? null) !== 'gridconfig') {
               
                if (count($editableFields['byRole'])>0) {
                   
                    if (array_key_exists($layout->getName(), $editableFields['all'])) {
                        if (array_key_exists($layout->getName(), $editableFields['byRole'])) {
                            $layout->setNoteditable(false);
                        } else {
                            $layout->setNoteditable(true);
                        }
                    }
                }
            }
            
        }

        if (method_exists($layout, 'getChildren')) {
            $children = $layout->getChildren();
            if (is_array($children)) {
                foreach ($children as $child) {
                    self::enrichLayoutDefinition($child, $object, $context);
                }
            }
        }
    }
}
