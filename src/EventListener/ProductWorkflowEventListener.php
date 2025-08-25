<?php

declare(strict_types=1);

namespace App\EventListener;

use App\Enum\ProductManagement\ProductApprovalWorkflowPlace;
use App\Enum\ProductManagement\ProductApprovalWorkflowTransition;
use Pimcore\Event\DataObjectEvents;
use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject\UniProductBase;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Workflow\Exception\LogicException;
use Symfony\Component\Workflow\Registry;
use Symfony\Component\Workflow\WorkflowInterface;

class ProductWorkflowEventListener implements EventSubscriberInterface
{
    private LoggerInterface $logger;
    private Registry $workflowRegistry;

    public function __construct(LoggerInterface $logger, Registry $workflowRegistry)
    {
        $this->logger = $logger;
        $this->workflowRegistry = $workflowRegistry;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            DataObjectEvents::PRE_UPDATE => 'onPreUpdate',
        ];
    }

    public function onPreUpdate(DataObjectEvent $event): void
    {
        $object = $event->getObject();

        if (!$object instanceof UniProductBase) {
            return;
        }

        $oldObject = UniProductBase::getById($object->getId(), ['force' => true]);

        try {
            $workflow = $this->workflowRegistry->get($object, 'product_approval');
            $currentPlace = array_keys($workflow->getMarking($object)->getPlaces());

            // Move to draft if an approved object is edited
            if (in_array(ProductApprovalWorkflowPlace::APPROVED->value, $currentPlace, true)) {
                $this->applyTransitionSafely($workflow, $object, ProductApprovalWorkflowTransition::EDIT_DRAFT);
            }

            // Auto-approve if internal category data is updated and no approval needed
            if (in_array(ProductApprovalWorkflowPlace::PENDING_APPROVAL->value, $currentPlace, true) && $this->isCategoryDataUpdate($object)) {
                $this->applyTransitionSafely($workflow, $object, ProductApprovalWorkflowTransition::APPROVE_PRODUCT);
            }

            // Auto-approve if imported SAP data doesn't need approval
            if (in_array(ProductApprovalWorkflowPlace::CREATED->value, $currentPlace, true) && !$this->requiresApproval($object)) {
                $this->applyTransitionSafely($workflow, $object, ProductApprovalWorkflowTransition::APPROVE_PRODUCT);
            }

            // Auto-archive or deactivate for unpublish
            if (in_array(ProductApprovalWorkflowPlace::APPROVED->value, $currentPlace, true) && $this->isUnpublishRequested($object, $oldObject)) {
                $this->applyTransitionSafely($workflow, $object, ProductApprovalWorkflowTransition::ARCHIVE_PRODUCT);
            }
        } catch (\Exception $e) {
            $this->logger->error('Error handling product workflow', [
                'productId' => $object->getId(),
                'error' => $e->getMessage(),
            ]);
        }
    }

    private function isCategoryDataUpdate(UniProductBase $object): bool
    {
        return $object->isFieldDirty('internalCategories');
    }

    private function requiresApproval(UniProductBase $object): bool
    {
        $technicalFields = [
            'technicalProductGroupSpecific',
            'agencyCompliance',
            'industrialStandards',
            'weightMetric',
            'weightImperial',
            'weight',
            'unitOfMeasure',
        ];

        foreach ($technicalFields as $field) {
            if ($object->isFieldDirty($field)) {
                return true;
            }
        }

        return false;
    }

    private function isUnpublishRequested(UniProductBase $object, UniProductBase $oldObject): bool
    {
        if ($oldObject->getPublished() && !$object->getPublished()) {
            return true;
        }

        if ($object->getB2bFlag() !== true && $object->getB2cFlag() !== true && $object->getPrintedCatalogueFlag() !== true && $object->getVirtualCatalogueFlag() !== true) {
            return true;
        }

        return false;
    }

    private function applyTransitionSafely(WorkflowInterface $workflow, UniProductBase $product, ProductApprovalWorkflowTransition $transition): void
    {
        try {
            if ($workflow->can($product, $transition->value)) {
                $workflow->apply($product, $transition->value);
                $product->save();

                $this->logger->info('Workflow transition applied successfully', [
                    'productId' => $product->getId(),
                    'transition' => $transition->value,
                ]);
            } else {
                $this->logger->warning('Workflow transition not available', [
                    'productId' => $product->getId(),
                    'transition' => $transition->value,
                    'currentPlaces' => $workflow->getMarking($product)->getPlaces(),
                ]);
            }
        } catch (LogicException $e) {
            $this->logger->error('Workflow logic error', [
                'productId' => $product->getId(),
                'transition' => $transition->value,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
