<?php
 
namespace ContitechCS\ProductBundle\EventListener;

use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject\CSProducts;

class ProductListener
{
    
    public function checkPublishStatus(DataObjectEvent $event)
    {
        if ($event->getObject() instanceof CSProducts) {
            $productObject = $event->getObject();
            $argument = $event->getArguments();
            if ($productObject->isPublished() && (!isset($argument['saveVersionOnly']) || empty($argument['saveVersionOnly'])) && ($productObject->getType() != 'folder')) {
                $productParent = $productObject->getParent();
                    while($productParent->getType() != 'folder'){
                        if($productParent->isPublished() == 0){
                            throw new \Pimcore\Model\Element\ValidationException("Cannot save product if parent product is unpublished");
                        }
                        else{
                            $productParent = $productParent->getParent();
                        }
                    }
            }
            else if($productObject->isPublished() == 0){
                $childProduct = $productObject->getChildren();
                if($childProduct){
                    $count = 0;
                    $noOfChilds = 0;
                    foreach($childProduct as $eachChildProduct){
                        $noOfChilds++;
                        if($eachChildProduct->isPublished() !=0){
                            $count++;
                        }
                    }
                    if($count != 0){
                        throw new \Pimcore\Model\Element\ValidationException("Product with published children cannot be unpublished");
                    }
                }
            }
        }
    }
}