<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ContitechCS\ProductBundle\Workflow;

use Pimcore\Model\Asset;
use Pimcore\Model\DataObject;
use Pimcore\Model\Element\ValidationException;
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
    
    public function productMappingValidation(Asset $asset) {
        $requiredByInfo = $asset->getDependencies()->getRequiredBy();
        if (!empty($requiredByInfo) && count($requiredByInfo)>0) {
            foreach ($requiredByInfo as $requiredBy) {
                if ($requiredBy['type'] == 'object' && !empty($requiredBy['id'])) {
                    $object = DataObject::getById($requiredBy['id']);
                    if ($object instanceof DataObject\CSProducts) {
                        return ['success' => false, 'msg' => 'This asset is already associated with product. Please remove mapping before archiving. To check related products visit Dependency tab.'];
                    }
                }
            }
        }
        return ['success' => true];
    }
    
    public function csAssetTransitionAction(TransitionEvent $event) {
        $transition = $event->getTransition();
        $transitionName = $transition->getName(); 
        $subject = $event->getSubject();
        if (!empty($transitionName) && !empty($this->transitionConfig) && !empty($this->transitionConfig[$transitionName])) {
            $transitionConfig = $this->transitionConfig[$transitionName];
            if (!empty($transitionConfig)) {
                if (!empty($transitionConfig['condition'])) {
                    $validationMethods = $transitionConfig['condition']['methods'];
                    foreach ($validationMethods as $method) {
                        $response = $this->$method($subject);
                        if (empty($response['success'])) {
                            throw new ValidationException($response['msg']);
                        }
                    }
                }
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
