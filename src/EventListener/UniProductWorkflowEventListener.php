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
     * Handle approved products being edited, set them back to draft
     */
    public function onPreUpdate(DataObjectEvent $event): void
    {
        $object = $event->getObject();

        if (!$object instanceof UniProductBase) {
            return;
        }

        $objectKey = $object->getId() . '_preupdate';

        if (isset(self::$processedObjects[$objectKey])) {
            return;
        }
        self::$processedObjects[$objectKey] = true;


        try {
            // Get the current state of the object before update
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
                'path' => $object->getFullPath(),
            ]);
            // Only apply draft transition if the object is not a version copy
            $versionBasePath = '/UniProductVersion';
            if (
                strpos($object->getFullPath(), $versionBasePath) === false &&
                $currentPlace === ProductApprovalWorkflowPlace::APPROVED->value
            ) {
                if ($this->hasAnyChanges($oldObject, $object)) {
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
            } else {
                $this->logger->info('Skipping draft transition for version copy or non-approved object', [
                    'productId' => $object->getId(),
                    'path' => $object->getFullPath(),
                ]);
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
     * Handle workflow completion for approval, create copy when approved
     */
    public function onApprovalCompleted(CompletedEvent $event): void
    {
        $subject = $event->getSubject();

        if (!$subject instanceof UniProductBase) {
            return;
        }

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

            $existingCopy = $this->uniProductVersionService->getVersionCopyForProduct($subject);

            if ($existingCopy) {
                $this->logger->info('Updating existing version copy', [
                    'productId' => $subject->getId(),
                    'existingCopyId' => $existingCopy->getId(),
                ]);

                $this->uniProductVersionService->updateVersionCopy($subject, $existingCopy);
            } else {
                $this->logger->info('Creating new version copy', [
                    'productId' => $subject->getId(),
                ]);

                $this->uniProductVersionService->createVersionCopy($subject);
            }
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

    private function hasAnyChanges(UniProductBase $oldObject, UniProductBase $newObject): bool
    {
        $fieldDefinitions = $oldObject->getClass()->getFieldDefinitions();

        foreach ($fieldDefinitions as $fieldName => $fieldDefinition) {
            $getter = 'get' . ucfirst($fieldName);

            if (method_exists($oldObject, $getter) && method_exists($newObject, $getter)) {
                try {
                    $oldValue = $oldObject->$getter();
                    $newValue = $newObject->$getter();

                    if (!$this->uniProductVersionService->valuesAreEqual($oldValue, $newValue)) {
                        $this->logger->info('Change detected in field', [
                            'productId' => $newObject->getId(),
                            'field' => $fieldName,
                            'oldValue' => $this->uniProductVersionService->getLoggableValue($oldValue),
                            'newValue' => $this->uniProductVersionService->getLoggableValue($newValue),
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
}
