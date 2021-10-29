<?php

namespace ContitechCS\ProductBundle\EventListener;

use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject\CSHierarchy;

class HierarchyListener
{
    public function setBricks(DataObjectEvent $event)
    {
        if ($event->getObject() instanceof CSHierarchy) {
            $hierarchyObject = $event->getObject();

            if ($hierarchyObject->getPath() == '/Contitech_ConveyorSolution/Master Data/Product Hierarchy/') {
                $hierarchyObject->setLevel('Level 1');
            } else {
                $parent = $hierarchyObject->getParent();

                if ($parent->getRelatedBricks() == null) {
                    $parentLevel = $parent->getLevel();

                    $pieces = explode(' ', $parentLevel);
                    $last_word = array_pop($pieces);
                    $i = (int)$last_word;
                    $i++;

                    $level = 'Level ' . $i;

                    $hierarchyObject->setLevel($level);
                } else {
                    $parentBricks = $parent->getRelatedBricks();

                    $childBricks = $hierarchyObject->getRelatedBricks();
                    $childBrickStr = implode(',', $childBricks);
                    $parentBrickStr = implode(',', $parentBricks);

                    $finalBricks = $parentBrickStr . ',' . $childBrickStr;
                    $hierarchyObject->setRelatedBricks([$finalBricks]);

                    $parentLevel = $parent->getLevel();

                    $pieces = explode(' ', $parentLevel);
                    $last_word = array_pop($pieces);
                    $i = (int)$last_word;
                    $i++;

                    $level = 'Level ' . $i;

                    $hierarchyObject->setLevel($level);

                    // $latestChildBricks = $hierarchyObject->getRelatedBricks();
                    // $latestChildBricksStr = implode(',', $latestChildBricks);

                    // foreach($parentBricks as $eachParentBricks){
                    //     if (in_array($eachParentBricks, $childBricks)) {
                    //         continue;
                    //     }
                    //     else{
                    //         $array [] = $eachParentBricks;
                    //     }
                    // }
                    // if (!(empty($array))) {
                    //     $print = implode(',', $array);
                    //     throw new \Pimcore\Model\Element\ValidationException("Parent Bricks missing ". $print);
                    // }
                }
            }
        }
    }
}
