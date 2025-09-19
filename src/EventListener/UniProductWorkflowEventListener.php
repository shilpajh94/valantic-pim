<?php

declare(strict_types=1);

namespace App\EventListener;

use App\Enum\ProductManagement\ProductApprovalWorkflowPlace;
use App\Enum\ProductManagement\ProductApprovalWorkflowTransition;
use Pimcore\Event\DataObjectEvents;
use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject\UniProductBase;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Workflow\Registry;

class UniProductWorkflowEventListener implements EventSubscriberInterface
{
    /** @var array<string, true> */
    private array $processedObjects = [];
    private Registry $workflowRegistry;

    public function __construct(Registry $workflowRegistry)
    {
        $this->workflowRegistry = $workflowRegistry;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            DataObjectEvents::PRE_UPDATE => 'onPreUpdate',
        ];
    }

    /**
     * Handle approved products being edited, set them back to draft.
     */
    public function onPreUpdate(DataObjectEvent $event): void
    {
        $object = $event->getObject();

        if (!$object instanceof UniProductBase) {
            return;
        }

        $objectKey = $object->getId() . '_preupdate';

        if (isset($this->processedObjects[$objectKey])) {
            return;
        }
        // Get the current state of the object before update
        $oldObject = UniProductBase::getById($object->getId(), ['force' => true]);

        if (!$oldObject instanceof UniProductBase) {
            return;
        }
        $workflow = $this->workflowRegistry->get($oldObject, 'product_approval');
        $currentPlaces = array_keys($workflow->getMarking($oldObject)->getPlaces());

        if ($currentPlaces === []) {
            return;
        }
        /** @var string $currentPlace */
        $currentPlace = $currentPlaces[0];

        // Apply draft transition
        if ($currentPlace === ProductApprovalWorkflowPlace::APPROVED->value) {
            $newWorkflow = $this->workflowRegistry->get($object, 'product_approval');
            $transitionName = ProductApprovalWorkflowTransition::EDIT_DRAFT->value;

            if ($newWorkflow->can($object, $transitionName)) {
                $newWorkflow->apply($object, $transitionName);
            }

            return;
        }
    }
}
