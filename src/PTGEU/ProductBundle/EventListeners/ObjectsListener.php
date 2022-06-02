<?php

namespace PTGEU\ProductBundle\EventListeners;

use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject;
use PTGEU\ProductBundle\Services\CompletenessPercentageService;

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
        $className = $object->getClassName();
        
        if ($className == 'PTGEUProduct') 
        {
            $this->percentageCompletionService->completenessPercentage($object);
        }

    } 
}
