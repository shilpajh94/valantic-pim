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
        if ($object->getType() != 'folder') {
            $className = $object->getClassName();

            if ($className == 'PTGEUProduct') {
                $this->percentageCompletionService->completenessPercentage($object, 'save');
            }

            if ($className == 'PTGEUCatalogCategory') {
                $selectedColumns = json_decode($object->getColumns(), true);

                if (!array_key_exists("articleNumber", $selectedColumns)) {
                    throw new \Exception('Match Code is required in Selected Section for Print Columns.');
                }
            }
        }
    }
}
