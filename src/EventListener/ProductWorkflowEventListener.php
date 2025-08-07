<?php

declare(strict_types=1);

namespace App\EventListener;

use App\Enum\ProductManagement\ProductApprovalWorkflow;
use App\Enum\ProductManagement\ProductApprovalWorkflowPlace;
use App\Enum\ProductManagement\ProductApprovalWorkflowTransition;
use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject\UniProductBase;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Workflow\Exception\LogicException;
use Symfony\Component\Workflow\Registry;

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
            'pimcore.dataobject.postAdd' => 'onDataObjectPostAdd',
            'pimcore.dataobject.postUpdate' => 'onDataObjectPostUpdate',
        ];
    }

    public function onDataObjectPostAdd(DataObjectEvent $event): void
    {
        $object = $event->getObject();

        if (!$object instanceof UniProductBase) {
            return;
        }

        $this->handleNewProduct($object);
    }

    public function onDataObjectPostUpdate(DataObjectEvent $event): void
    {
        $object = $event->getObject();

        if (!$object instanceof UniProductBase) {
            return;
        }

        $this->handleProductUpdate($object);
    }

    private function handleNewProduct(UniProductBase $product): void
    {
        try {
            $workflow = $this->workflowRegistry->get($product, ProductApprovalWorkflow::PRODUCT_APPROVAL->value);
            $marking = $workflow->getMarking($product);

            if (empty($marking->getPlaces())) {
                if ($this->isImportedProduct($product)) {
                    $this->applyTransitionSafely($workflow, $product, ProductApprovalWorkflowTransition::DISPLAY_IMPORTED);
                } elseif ($this->isSAPUpdatedProduct($product)) {
                    $this->applyTransitionSafely($workflow, $product, ProductApprovalWorkflowTransition::DISPLAY_SAP_UPDATED);
                }
            }
        } catch (\Exception $e) {
            $this->logger->error('Error handling new product workflow', [
                'productId' => $product->getId(),
                'error' => $e->getMessage(),
            ]);
        }
    }

    private function handleProductUpdate(UniProductBase $product): void
    {
        try {
            $workflow = $this->workflowRegistry->get($product, ProductApprovalWorkflow::PRODUCT_APPROVAL->value);
            $marking = $workflow->getMarking($product);
            $currentPlaces = $marking->getPlaces();

            if ($this->isSAPDataUpdate($product)) {
                $this->handleSAPDataUpdate($workflow, $product, $currentPlaces);
            }

            if ($this->shouldAutoAssignCategory($product, $currentPlaces)) {
                $this->applyTransitionSafely($workflow, $product, ProductApprovalWorkflowTransition::AUTO_ASSIGN_CATEGORY);
            }

            if ($this->shouldAutoUpdateSAPData($product, $currentPlaces)) {
                $this->applyTransitionSafely($workflow, $product, ProductApprovalWorkflowTransition::UPDATE_SAP_DATA_AUTOMATICALLY);
            }

            if ($this->isProductDeactivated($product) && $this->canArchiveProduct($currentPlaces)) {
                $this->applyTransitionSafely($workflow, $product, ProductApprovalWorkflowTransition::ARCHIVE_PRODUCT);
            }
        } catch (\Exception $e) {
            $this->logger->error('Error handling product update workflow', [
                'productId' => $product->getId(),
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @param array<string, int> $currentPlaces
     */
    private function handleSAPDataUpdate(object $workflow, UniProductBase $product, array $currentPlaces): void
    {
        if (array_key_exists(ProductApprovalWorkflowPlace::PUBLISHED->value, $currentPlaces)) {
            $this->applyTransitionSafely($workflow, $product, ProductApprovalWorkflowTransition::DISPLAY_SAP_UPDATED);
        }
    }

    private function applyTransitionSafely(object $workflow, UniProductBase $product, ProductApprovalWorkflowTransition $transition): void
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

    private function isImportedProduct(UniProductBase $product): bool
    {
        $sapMaterialNumber = (string) $product->getSapMaterialNumber();
        $isNonSapSourced = $sapMaterialNumber !== '' && $sapMaterialNumber !== '0' && !str_starts_with($sapMaterialNumber, 'SAP_');
        $hasEanCode = $product->getEanCode() !== null && $product->getEanCode() !== '' && $product->getEanCode() !== '0';
        $isImportedState = $product->getApprovalState() === 'imported';

        return $isNonSapSourced || $hasEanCode || $isImportedState;
    }

    private function isSAPUpdatedProduct(UniProductBase $product): bool
    {
        return str_starts_with((string) $product->getSapMaterialNumber(), 'SAP_')
            || $product->getSapDescription() !== null && $product->getSapDescription() !== '' && $product->getSapDescription() !== '0';
    }

    private function isSAPDataUpdate(UniProductBase $product): bool
    {
        $sapFields = ['sapDescription', 'completenessPercentage'];

        foreach ($sapFields as $field) {
            $getter = 'get' . ucfirst($field);

            if (method_exists($product, $getter) && $product->isFieldDirty($field)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param array<string, int> $currentPlaces
     */
    private function shouldAutoAssignCategory(UniProductBase $product, array $currentPlaces): bool
    {
        return array_key_exists(ProductApprovalWorkflowPlace::IMPORTED_DISPLAYED->value, $currentPlaces)
            && $product->getInternalCategories() !== []
            && $product->getB2bSubCategory() === [];
    }

    /**
     * @param array<string, int> $currentPlaces
     */
    private function shouldAutoUpdateSAPData(UniProductBase $product, array $currentPlaces): bool
    {
        return array_key_exists(ProductApprovalWorkflowPlace::SAP_UPDATED_DISPLAYED->value, $currentPlaces)
            && $this->hasAutomaticSAPUpdates($product);
    }

    private function hasAutomaticSAPUpdates(UniProductBase $product): bool
    {
        return $product->getB2bFlag() === true;
    }

    private function isProductDeactivated(UniProductBase $product): bool
    {
        return $product->getApprovalState() === 'inactive'
            || $product->getB2bFlag() === false
            || $product->getB2cFlag() === false;
    }

    /**
     * @param array<string, int> $currentPlaces
     */
    private function canArchiveProduct(array $currentPlaces): bool
    {
        $archivableStates = [
            ProductApprovalWorkflowPlace::PUBLISHED->value,
            ProductApprovalWorkflowPlace::EXPORTED->value,
        ];

        return array_intersect_key(array_flip($archivableStates), $currentPlaces) !== [];
    }
}
