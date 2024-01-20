<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ContitechCS\ProductBundle\Model\DataObject;

use Pimcore\Cache\Runtime;
use Pimcore\DataObject\GridColumnConfig\ConfigElementInterface;
use Pimcore\DataObject\GridColumnConfig\Operator\AbstractOperator;
use Pimcore\DataObject\GridColumnConfig\Service as GridColumnConfigService;
use Pimcore\Db;
use Pimcore\Event\DataObjectEvents;
use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Logger;
use Pimcore\Model;
use Pimcore\Model\Element;
use Pimcore\Tool\Admin as AdminTool;
use Pimcore\Tool\Session;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBagInterface;
use Pimcore\Model\DataObject\ClassDefinition\Data as FieldType;


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
        if (!$user->isAdmin() &&  !empty($object) && ($object->getClassName() == 'CSProducts')) {
            $editableFields = \ContitechCS\ProductBundle\Helper\CommonHelper::getEditableFieldsByUser($user);
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
        elseif (!$user->isAdmin() && !empty($object) && ($object->getClassName() == 'CSProducts')
            && $layout instanceof Model\DataObject\ClassDefinition\Data
            && !($layout instanceof Model\DataObject\ClassDefinition\Data\Objectbricks)
            && !($layout instanceof Model\DataObject\ClassDefinition\Data\Fieldcollections)) {
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
