<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ContitechCS\ProductBundle\Workflow;

use Symfony\Component\Workflow\SupportStrategy\WorkflowSupportStrategyInterface;
use Symfony\Component\Workflow\WorkflowInterface;

/**
 * Description of AssetSupportStrategy
 *
 * @author rohitsrivastava
 */
class AssetSupportStrategy implements WorkflowSupportStrategyInterface
{
    /**
     * @param Workflow $workflow
     * @param object   $subject
     *
     * @return bool
     */
    public function supports(WorkflowInterface $workflow, object $subject): bool
    {
        $return = false;
        if ($subject instanceof \Pimcore\Model\Asset && $subject->getType() != 'folder' &&
            strpos($subject->getRealFullPath(), '/Contitech_ConveyorSolution/') !== false) {
                $return = true;
        }

        return $return;
    }
}
