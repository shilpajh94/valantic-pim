<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ContitechCS\ProductBundle\EventListener;

use Pimcore\Event\Model\AssetEvent;
use Pimcore\Event\Model\ElementEventInterface;
use Symfony\Component\Workflow\WorkflowInterface;
/**
 * Description of AssetListener
 *
 * @author rohitsrivastava
 */
class AssetListener {
    // Symfony will inject the 'blog_publishing' workflow configured before
    public function __construct()
    {
        $this->assetWorkflow = \Pimcore::getContainer()->get('state_machine.cs_asset_workflow');
    }
    /**
     * Insert the id of the current asset in the table against its path
     *
     * @param ElementEventInterface $e
     */
    public function onPostAdd(ElementEventInterface $e)
    {
        if ($e instanceof AssetEvent) {
            $subject = $e->getAsset();
            if($subject instanceof \Pimcore\Model\Asset && $subject->getType() != 'folder') {
                if (strpos($subject->getRealFullPath(), '/Contitech_ConveyorSolution/Internal Assets/') !== false) {
                    $this->assetWorkflow->apply($subject, 'archive_asset');
                }
            }
        }
    }
    //put your code here
}
