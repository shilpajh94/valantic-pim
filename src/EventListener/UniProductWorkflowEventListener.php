<?php

declare(strict_types=1);

namespace App\EventListener;

use App\Enum\ProductManagement\ProductApprovalWorkflowPlace;
use App\Enum\ProductManagement\ProductApprovalWorkflowTransition;
use App\Service\UniProductVersionService;
use Pimcore\Event\DataObjectEvents;
use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject\UniProductBase;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Workflow\Event\CompletedEvent;
use Symfony\Component\Workflow\Registry;

class UniProductWorkflowEventListener implements EventSubscriberInterface
{
    /** @var array<string, true> */
    private array $processedObjects = [];
    private Registry $workflowRegistry;
    private UniProductVersionService $uniProductVersionService;

    public function __construct(Registry $workflowRegistry, UniProductVersionService $uniProductVersionService)
    {
        $this->workflowRegistry = $workflowRegistry;
        $this->uniProductVersionService = $uniProductVersionService;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            DataObjectEvents::PRE_UPDATE => 'onPreUpdate',
            'workflow.product_approval.completed.approve_product' => 'onApprovalCompleted',
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

        // Only apply draft transition if the object is not a version copy
        if (
            !$this->uniProductVersionService->isShadowCopy($object)
            && $currentPlace === ProductApprovalWorkflowPlace::APPROVED->value
            && $this->hasAnyChanges($oldObject, $object)
        ) {
            $newWorkflow = $this->workflowRegistry->get($object, 'product_approval');
            $transitionName = ProductApprovalWorkflowTransition::EDIT_DRAFT->value;

            if ($newWorkflow->can($object, $transitionName)) {
                $newWorkflow->apply($object, $transitionName);
            }

            return;
        }
    }

    /**
     * Handle workflow completion for approval, create copy when approved.
     */
    public function onApprovalCompleted(CompletedEvent $event): void
    {
        $subject = $event->getSubject();

        if (!$subject instanceof UniProductBase) {
            return;
        }

        $objectKey = $subject->getId() . '_approval_completed';

        if (isset($this->processedObjects[$objectKey])) {
            return;
        }
        $this->uniProductVersionService->createOrUpdateVersionCopy($subject);
        // Mark as processed only after successful completion
        $this->processedObjects[$objectKey] = true;
    }

    private function hasAnyChanges(UniProductBase $oldObject, UniProductBase $newObject): bool
    {
        $fieldDefinitions = $oldObject->getClass()->getFieldDefinitions();

        foreach ($fieldDefinitions as $fieldName => $fieldDefinition) {
            $getter = 'get' . ucfirst($fieldName);

            if (!method_exists($oldObject, $getter) || !method_exists($newObject, $getter)) {
                continue;
            }

            $oldValue = $oldObject->$getter();
            $newValue = $newObject->$getter();

            if (!$this->uniProductVersionService->valuesAreEqual($oldValue, $newValue)) {
                return true;
            }
        }

        if ($oldObject->getModificationDate() !== $newObject->getModificationDate()) {
            return true;
        }

        return false;
    }
}
