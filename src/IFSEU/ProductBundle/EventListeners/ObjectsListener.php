<?php

namespace IFSEU\ProductBundle\EventListeners;

use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject;
use IFSEU\ProductBundle\Services\CompletenessPercentageService;

class ObjectsListener
{

    private $percentageCompletionService;

    public function __construct(
        CompletenessPercentageService $percentageCompletionService
    ) {
        $this->percentageCompletionService = $percentageCompletionService;
    }

    /** 
     * @param DataObjectEvent $event
     */
    public function preUpdate(DataObjectEvent $event)
    {
        $object = $event->getObject();
        if ($object->getType() != 'folder') {
            $className = $object->getClassName();
            
            if ($className == 'IFSEUProduct') 
            {
                $this->percentageCompletionService->completenessPercentage($object, 'save');
            }
        }
    } 
}
