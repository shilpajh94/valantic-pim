<?php

declare(strict_types=1);

namespace App\EventListener;

use App\Enum\ProductManagement\ProductApprovalWorkflowPlace;
use App\Enum\ProductManagement\ProductApprovalWorkflowTransition;
use App\Service\UniProductVersionService;
use Pimcore\Event\DataObjectEvents;
use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject\UniProductBase;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Workflow\Event\CompletedEvent;
use Symfony\Component\Workflow\Registry;

class UniProductWorkflowEventListener implements EventSubscriberInterface
{
    /** @var array<string, true> */
    private static array $processedObjects = [];
    private LoggerInterface $logger;
    private Registry $workflowRegistry;
    private UniProductVersionService $uniProductVersionService;

    public function __construct(LoggerInterface $logger, Registry $workflowRegistry, UniProductVersionService $uniProductVersionService)
    {
        $this->logger = $logger;
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
     * Handle approved products being edited - set them back to draft.
     */
    public function onPreUpdate(DataObjectEvent $event): void
    {
        $object = $event->getObject();

        if (!$object instanceof UniProductBase) {
            return;
        }

        // Prevent infinite loops
        $objectKey = $object->getId() . '_preupdate';

        if (isset(self::$processedObjects[$objectKey])) {
            return;
        }
        self::$processedObjects[$objectKey] = true;

        try {
            // Get the current state of the object (before update)
            $oldObject = UniProductBase::getById($object->getId(), ['force' => true]);

            if (!$oldObject instanceof UniProductBase) {
                unset(self::$processedObjects[$objectKey]);

                return;
            }

            $workflow = $this->workflowRegistry->get($oldObject, 'product_approval');
            $currentPlaces = array_keys($workflow->getMarking($oldObject)->getPlaces());

            if ($currentPlaces === []) {
                unset(self::$processedObjects[$objectKey]);

                return;
            }

            /** @var string $currentPlace */
            $currentPlace = $currentPlaces[0];

            $this->logger->info('PreUpdate - Current workflow state', [
                'productId' => $object->getId(),
                'currentPlace' => $currentPlace,
            ]);

            // If the object is currently approved and is being modified
            if ($currentPlace === ProductApprovalWorkflowPlace::APPROVED->value) {
                // Check if any field has changed or modified
                if ($this->hasAnyChanges($oldObject, $object)) {
                    // Transition the object back to draft
                    $newWorkflow = $this->workflowRegistry->get($object, 'product_approval');
                    $transitionName = ProductApprovalWorkflowTransition::EDIT_DRAFT->value;

                    if ($newWorkflow->can($object, $transitionName)) {
                        $newWorkflow->apply($object, $transitionName);

                        $this->logger->info('Approved product moved to draft', [
                            'productId' => $object->getId(),
                            'previousState' => $currentPlace,
                            'newState' => ProductApprovalWorkflowPlace::DRAFT->value,
                            'transition' => $transitionName,
                        ]);
                    } else {
                        $this->logger->warning('Cannot apply transition to move approved product to draft', [
                            'productId' => $object->getId(),
                            'currentState' => $currentPlace,
                            'attemptedTransition' => $transitionName,
                        ]);
                    }
                }
            }
        } catch (\Exception $e) {
            $this->logger->error('Error handling approved product modification in pre-update', [
                'productId' => $object->getId(),
                'error' => $e->getMessage(),
                'stackTrace' => $e->getTraceAsString(),
            ]);
        } finally {
            unset(self::$processedObjects[$objectKey]);
        }
    }

    /**
     * Handle workflow completion for approval - create copy when approved.
     */
    public function onApprovalCompleted(CompletedEvent $event): void
    {
        $subject = $event->getSubject();

        if (!$subject instanceof UniProductBase) {
            return;
        }

        // Prevent infinite loops
        $objectKey = $subject->getId() . '_approval_completed';

        if (isset(self::$processedObjects[$objectKey])) {
            return;
        }
        self::$processedObjects[$objectKey] = true;

        try {
            $this->logger->info('Product approval completed - handling version copy', [
                'productId' => $subject->getId(),
                'productKey' => $subject->getKey(),
            ]);

            // Check if a version copy already exists
            $existingCopy = $this->uniProductVersionService->getVersionCopyForProduct($subject);

            if ($existingCopy instanceof UniProductBase) {
                return;
            }
            // Create new version copy
            $this->logger->info('Creating new version copy', [
                'productId' => $subject->getId(),
            ]);

            $this->uniProductVersionService->createVersionCopy($subject);
        } catch (\Exception $e) {
            $this->logger->error('Error handling version copy after approval', [
                'productId' => $subject->getId(),
                'error' => $e->getMessage(),
                'stackTrace' => $e->getTraceAsString(),
            ]);
        } finally {
            unset(self::$processedObjects[$objectKey]);
        }
    }

    /**
     * Check if there are ANY changes between old and new object.
     */
    private function hasAnyChanges(UniProductBase $oldObject, UniProductBase $newObject): bool
    {
        $fieldDefinitions = $oldObject->getClass()->getFieldDefinitions();

        foreach ($fieldDefinitions as $fieldName => $fieldDefinition) {
            $getter = 'get' . ucfirst($fieldName);

            if (method_exists($oldObject, $getter) && method_exists($newObject, $getter)) {
                try {
                    $oldValue = $oldObject->$getter();
                    $newValue = $newObject->$getter();

                    if (!$this->valuesAreEqual($oldValue, $newValue)) {
                        $this->logger->info('Change detected in field', [
                            'productId' => $newObject->getId(),
                            'field' => $fieldName,
                            'oldValue' => $this->getLoggableValue($oldValue),
                            'newValue' => $this->getLoggableValue($newValue),
                        ]);

                        return true;
                    }
                } catch (\Exception $e) {
                    $this->logger->warning('Could not compare field values', [
                        'field' => $fieldName,
                        'error' => $e->getMessage(),
                    ]);
                }
            }
        }

        if ($oldObject->getModificationDate() !== $newObject->getModificationDate()) {
            $this->logger->info('Modification date changed', [
                'productId' => $newObject->getId(),
                'oldDate' => $oldObject->getModificationDate(),
                'newDate' => $newObject->getModificationDate(),
            ]);

            return true;
        }

        return false;
    }

    private function valuesAreEqual(mixed $oldValue, mixed $newValue): bool
    {
        if ($oldValue === null && $newValue === null) {
            return true;
        }

        if ($oldValue === null || $newValue === null) {
            return false;
        }

        if ($oldValue instanceof \DateTime && $newValue instanceof \DateTime) {
            return $oldValue->getTimestamp() === $newValue->getTimestamp();
        }

        if (is_object($oldValue) || is_array($oldValue)) {
            return serialize($oldValue) === serialize($newValue);
        }

        return (string) $oldValue === (string) $newValue;
    }

    private function getLoggableValue(mixed $value): string
    {
        if ($value === null) {
            return 'null';
        }

        if ($value instanceof \DateTime) {
            return $value->format('Y-m-d H:i:s');
        }

        if (is_object($value)) {
            return $value::class . ' object';
        }

        if (is_array($value)) {
            return 'array with ' . count($value) . ' items';
        }

        return (string) $value;
    }
}
