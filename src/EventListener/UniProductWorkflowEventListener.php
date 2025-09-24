<?php

declare(strict_types=1);

namespace App\EventListener;

use App\Enum\ProductManagement\ProductApprovalWorkflowPlace;
use App\Enum\ProductManagement\ProductApprovalWorkflowTransition;
use Pimcore\Event\DataObjectEvents;
use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Event\Model\VersionEvent;
use Pimcore\Event\VersionEvents;
use Pimcore\Model\DataObject\UniProductBase;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Workflow\Registry;

class UniProductWorkflowEventListener implements EventSubscriberInterface
{
    private const RESET_TO_APPROVAL = 'reset_to_approval';

    public function __construct(
        private readonly Registry $workflowRegistry,
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            DataObjectEvents::PRE_UPDATE => 'onPreUpdate',
            VersionEvents::POST_DELETE => 'onPreDeleteVersion',
        ];
    }

    /**
     * Handle approved products being edited, set them back to draft.
     */
    public function onPreUpdate(DataObjectEvent $event): void
    {
        $object = $event->getObject();

        // The self::RESET_TO_APPROVAL argument ensures that the status is not changed to draft
        // when resetting the status to approved.
        if (
            !$object instanceof UniProductBase
            || ($event->hasArgument(self::RESET_TO_APPROVAL) && $event->getArgument(self::RESET_TO_APPROVAL) === true)
        ) {
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

        // Apply draft transition
        if (!in_array(ProductApprovalWorkflowPlace::APPROVED->value, $currentPlaces, true)) {
            return;
        }

        $newWorkflow = $this->workflowRegistry->get($object, 'product_approval');
        $transitionName = ProductApprovalWorkflowTransition::EDIT_DRAFT->value;

        if ($newWorkflow->can($object, $transitionName)) {
            $newWorkflow->apply($object, $transitionName);
        }
    }

    /**
     * If a (draft) version is deleted, restore the previously approved state.
     * This is only called, if there is a published version available.
     */
    public function onPreDeleteVersion(VersionEvent $event): void
    {
        $version = $event->getVersion();
        $object = UniProductBase::getById($version->getCid(), ['force' => true]);

        if (!$object instanceof UniProductBase) {
            return;
        }

        // Reset workflow state
        $object->setApprovalState(ProductApprovalWorkflowPlace::APPROVED->value);
        $object->save([self::RESET_TO_APPROVAL => true]);
    }
}
