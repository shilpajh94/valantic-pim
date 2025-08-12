<?php

declare(strict_types=1);

namespace App\EventListener;

use App\Enum\ProductManagement\ProductApprovalWorkflowTransition;
use Pimcore\Model\DataObject\UniProductBase;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Workflow\Event\GuardEvent;

class ProductWorkflowGuard implements EventSubscriberInterface
{
    private Security $security;
    private LoggerInterface $logger;

    public function __construct(Security $security, LoggerInterface $logger)
    {
        $this->security = $security;
        $this->logger = $logger;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            'workflow.product_approval.guard' => ['guardTransition'],
        ];
    }

    public function guardTransition(GuardEvent $event): void
    {
        $subject = $event->getSubject();
        $transition = $event->getTransition()->getName();
        $user = $this->security->getUser();

        if (!$subject instanceof UniProductBase) {
            return;
        }

        if (!$user instanceof UserInterface) {
            $event->setBlocked(true, 'No user authenticated');
            $this->logger->warning('Workflow transition blocked: No authenticated user', [
                'transition' => $transition,
                'productId' => $subject->getId(),
            ]);

            return;
        }

        switch ($transition) {
            case ProductApprovalWorkflowTransition::ENRICH_PRODUCT->value:
            case ProductApprovalWorkflowTransition::MANUAL_ASSIGN_CATEGORY->value:
            case ProductApprovalWorkflowTransition::ASSIGN_MEDIA->value:
            case ProductApprovalWorkflowTransition::UPDATE_PRODUCT_DATA->value:
                $this->guardEnrichmentTransitions($event, $user, $transition, $subject);

                break;

            case ProductApprovalWorkflowTransition::SUBMIT_FOR_APPROVAL->value:
            case ProductApprovalWorkflowTransition::SUBMIT_UPDATED_FOR_APPROVAL->value:
                $this->guardSubmissionTransitions($event, $user, $transition, $subject);

                break;

            case ProductApprovalWorkflowTransition::APPROVE_PRODUCT->value:
            case ProductApprovalWorkflowTransition::APPROVE_UPDATED_PRODUCT->value:
            case ProductApprovalWorkflowTransition::REJECT_PRODUCT->value:
            case ProductApprovalWorkflowTransition::REJECT_UPDATED_PRODUCT->value:
                $this->guardApprovalTransitions($event, $user, $transition, $subject);

                break;

            case ProductApprovalWorkflowTransition::PUBLISH_PRODUCT->value:
            case ProductApprovalWorkflowTransition::PUBLISH_UPDATED_PRODUCT->value:
            case ProductApprovalWorkflowTransition::EXPORT_PRODUCT->value:
            case ProductApprovalWorkflowTransition::EXPORT_UPDATED_PRODUCT->value:
                $this->guardPublishingTransitions($event, $user, $transition, $subject);

                break;

            case ProductApprovalWorkflowTransition::SET_TO_DRAFT_FOR_UPDATE->value:
            case ProductApprovalWorkflowTransition::ARCHIVE_PRODUCT->value:
            case ProductApprovalWorkflowTransition::MARK_AS_ARCHIVED->value:
            case ProductApprovalWorkflowTransition::EMERGENCY_UNPUBLISH->value:
                $this->guardAdministrativeTransitions($event, $user, $transition, $subject);

                break;

            case ProductApprovalWorkflowTransition::EXPORT_TO_COMPLIANCE->value:
            case ProductApprovalWorkflowTransition::EXPORT_UPDATED_TO_COMPLIANCE->value:
            case ProductApprovalWorkflowTransition::COMPLIANCE_APPROVE->value:
            case ProductApprovalWorkflowTransition::SYNC_FROM_COMPLIANCE->value:
            case ProductApprovalWorkflowTransition::SYNC_UPDATED_FROM_COMPLIANCE->value:
                $this->guardComplianceTransitions($event, $user, $transition, $subject);

                break;

            case ProductApprovalWorkflowTransition::DISPLAY_IMPORTED->value:
            case ProductApprovalWorkflowTransition::DISPLAY_SAP_UPDATED->value:
            case ProductApprovalWorkflowTransition::AUTO_ASSIGN_CATEGORY->value:
            case ProductApprovalWorkflowTransition::UPDATE_SAP_DATA_AUTOMATICALLY->value:
            case ProductApprovalWorkflowTransition::EXPORT_SAP_UPDATED->value:
                break;

            default:
                $this->logger->info('Unhandled workflow transition', [
                    'transition' => $transition,
                    'productId' => $subject->getId(),
                ]);
        }
    }

    private function guardEnrichmentTransitions(GuardEvent $event, UserInterface $user, string $transition, UniProductBase $subject): void
    {
        if (!$this->hasRole($user, 'ROLE_MARCOM')) {
            $event->setBlocked(true, 'User does not have enrichment permissions');
            $this->logBlockedTransition($transition, $subject->getId(), 'Missing ROLE_MARCOM');

            return;
        }

        if (!$this->canUserEnrichProduct()) {
            $event->setBlocked(true, 'User cannot enrich this product (product group restriction)');
            $this->logBlockedTransition($transition, $subject->getId(), 'Product group restriction');
        }
    }

    private function guardSubmissionTransitions(GuardEvent $event, UserInterface $user, string $transition, UniProductBase $subject): void
    {
        if (!$this->hasRole($user, 'ROLE_MARCOM')) {
            $event->setBlocked(true, 'User does not have permission to submit for approval');
            $this->logBlockedTransition($transition, $subject->getId(), 'Missing ROLE_MARCOM');

            return;
        }

        if (!$this->isProductReadyForApproval($subject)) {
            $event->setBlocked(true, 'Product data is not complete enough for approval');
            $this->logBlockedTransition($transition, $subject->getId(), 'Incomplete product data');
        }
    }

    private function guardApprovalTransitions(GuardEvent $event, UserInterface $user, string $transition, UniProductBase $subject): void
    {
        if (!$this->hasRole($user, 'ROLE_PRODUCT_MANAGER')) {
            $event->setBlocked(true, 'User does not have product approval permissions');
            $this->logBlockedTransition($transition, $subject->getId(), 'Missing ROLE_PRODUCT_MANAGER');

            return;
        }

        if ($this->isUserLastEnricher()) {
            $event->setBlocked(true, 'User cannot approve products they have enriched');
            $this->logBlockedTransition($transition, $subject->getId(), 'Self-approval not allowed');
        }
    }

    private function guardPublishingTransitions(GuardEvent $event, UserInterface $user, string $transition, UniProductBase $subject): void
    {
        if (!$this->hasRole($user, 'ROLE_ADMIN') && !$this->hasRole($user, 'ROLE_PRODUCT_MANAGER')) {
            $event->setBlocked(true, 'User does not have permission to publish products');
            $this->logBlockedTransition($transition, $subject->getId(), 'Missing publishing permissions');
        }
    }

    private function guardAdministrativeTransitions(GuardEvent $event, UserInterface $user, string $transition, UniProductBase $subject): void
    {
        if (!$this->hasRole($user, 'ROLE_ADMIN')) {
            $event->setBlocked(true, 'Only admin can perform administrative actions');
            $this->logBlockedTransition($transition, $subject->getId(), 'Missing ROLE_ADMIN');
        }
    }

    private function guardComplianceTransitions(GuardEvent $event, UserInterface $user, string $transition, UniProductBase $subject): void
    {
        if (!$this->hasRole($user, 'ROLE_ADMIN') && !$this->hasRole($user, 'ROLE_APPLICATION_ENGINEERING')) {
            $event->setBlocked(true, 'User does not have compliance permissions');
            $this->logBlockedTransition($transition, $subject->getId(), 'Missing compliance permissions');
        }
    }

    private function hasRole(?UserInterface $user, string $role): bool
    {
        if (!$user instanceof UserInterface || !method_exists($user, 'getRoles')) {
            return false;
        }

        return in_array($role, $user->getRoles(), true);
    }

    private function canUserEnrichProduct(): bool
    {
        return true;
    }

    private function isUserLastEnricher(): bool
    {
        return false;
    }

    private function isProductReadyForApproval(UniProductBase $subject): bool
    {
        $sapMaterialNumber = trim((string) $subject->getSapMaterialNumber());

        if ($sapMaterialNumber === '' || $sapMaterialNumber === '0') {
            return false;
        }

        $partNumber = trim((string) $subject->getPartNumber());

        if ($partNumber === '') {
            return false;
        }

        $productBrandName = trim((string) $subject->getProductBrandName());

        if ($productBrandName === '') {
            return false;
        }

        $masterBrand = $subject->getMasterBrand();

        if ($masterBrand === null || $masterBrand === '' || $masterBrand === '0') {
            return false;
        }

        $productCategory = $subject->getProductCategory(null);

        if (!$productCategory instanceof \Pimcore\Model\Element\AbstractElement) {
            return false;
        }

        $sapDescription = trim((string) $subject->getSapDescription(null));

        if ($sapDescription === '') {
            return false;
        }

        $internalCategories = $subject->getInternalCategories();

        if ($internalCategories === []) {
            return false;
        }

        $completenessPercentage = $subject->getCompletenessPercentage(null);

        if ($completenessPercentage !== null) {
            $percentage = (float) $completenessPercentage;

            if ($percentage < 80.0) {
                return false;
            }
        }

        return true;
    }

    private function logBlockedTransition(string $transition, ?int $productId, string $reason): void
    {
        $this->logger->info('Workflow transition blocked by guard', [
            'transition' => $transition,
            'productId' => $productId,
            'reason' => $reason,
            'user' => $this->security->getUser()?->getUserIdentifier(),
        ]);
    }
}
