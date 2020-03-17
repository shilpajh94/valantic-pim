<?php
/**
* Pimcore global services
*
* This source file is available under two different licenses:
* - GNU General Public License version 3 (GPLv3)
* - Pimcore Enterprise License (PEL)
* Full copyright and license information is available in
* LICENSE.md which is distributed with this source code.
*
* @copyright Copyright (c) Pimcore global services
* @license Pimcore global services GPLv3 and PEL
*/

namespace AppBundle\EventListener;

use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject\ProductLine;
use Pimcore\Model\DataObject;
use Symfony\Component\EventDispatcher\GenericEvent;

class ObjectListener
{
    
    /**
     * --
     * 
     * Listen to following events
     * - pimcore.admin.object.list.beforeListLoad
     * 
     * @param GenericEvent $event
     */    
    public function beforeListLoad(GenericEvent $event){
        try {
            $list   = $event->getArgument('list');
            $context= $event->getArgument('context');
            print_r($list);die;
            if(isset($context['class'])){
                if(method_exists($list,'getClassId') && $list->getClassId()==3){
                    $cond   = $list->getCondition();
                    $cond   .= " AND (plArchive =0 || plArchive IS NULL)";
                    $list->setCondition($cond);
                }
            }
        } catch (\Exception  $ex) {
            
        }
    }
    
    /**
     * --
     * 
     * Listen to following events
     * - pimcore.admin.object.list.beforeListLoad
     * 
     * @param GenericEvent $event
     */    
    public function beforeOpenObject(GenericEvent $event){
        $currentObject = $event->getArgument('object');
        $data = $event->getArgument('data');
        if ($currentObject instanceof \Pimcore\Model\DataObject\Product) {
            $validLayouts = $data['validLayouts'];
            $productType = $currentObject->getProductType();
            $layoutName = '';
            if($productType == "Base") {
                $layoutName = 'digit14';
            } else if($productType == "6Digit") {
                $layoutName = 'digit6';
            } else if($productType == "9Digit") {
                $layoutName = 'digit9';
            } else if($productType == "PTG") {
                $layoutName = 'PTG';
            } 
            if (!empty($layoutName)) {
                $customLayout = DataObject\ClassDefinition\CustomLayout::getByName($layoutName); //Id($data['currentLayoutId']);
                $customLayoutDefinition = $customLayout->getLayoutDefinitions();
                $data['currentLayoutId'] = $customLayout->getId();
                $data['layout'] = $customLayoutDefinition;
                foreach ($validLayouts as $layoutData) {
                    if ($layoutData['id'] == $data['currentLayoutId']) {
                        $newValidLayouts[] = $layoutData;
                        $data['validLayouts'] = $newValidLayouts;
                    }
                }
                $event->setArgument('data', $data);
            }
            
        }
    }
}
