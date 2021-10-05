<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ContitechCS\ProductBundle\Workflow;

use Pimcore\Model\Asset;
use Symfony\Component\Workflow\Event\TransitionEvent;
use Symfony\Component\Workflow\Event\CompletedEvent as Event;
/**
 * Description of AssetWorkflowListener
 *
 * @author rohitsrivastava
 */
class AssetWorkflowListener {
    
    private $transitionConfig;
    
    public function __construct() {
        
        $wfConfigData = \Pimcore::getContainer()->get('ContitechCS\ProductBundle\Services\ConfigProviderService')->getWorkflowConfig()['parameters'];
        $this->transitionConfig = isset($wfConfigData['transition']) ? $wfConfigData['transition'] : false;
        
    }
    
    public function csAssetTransitionAction(TransitionEvent $event) {
        $transition = $event->getTransition();
        $transitionName = $transition->getName(); 
        $subject = $event->getSubject();
        if (!empty($transitionName) && !empty($this->transitionConfig) && !empty($this->transitionConfig[$transitionName])) {
            $transitionConfig = $this->transitionConfig[$transitionName];
            if (!empty($transitionConfig)) {
                if (!empty($transitionConfig['action'])) {
                    foreach($transitionConfig['action'] as $key => $value) {
                        if ($key == 'path') {
                            $setter = "setParentId";
                            $parentId = \ContitechCS\ProductBundle\Helper\CommonHelper::getFolderByPath($value, 'asset'); 
                            $subject->$setter($parentId);
                        } else {
                            $setter = "set".ucfirst($key);
                            $subject->$setter($value);
                        }
                    }
                }
            }
        }
    }
}
