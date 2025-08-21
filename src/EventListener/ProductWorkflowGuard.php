<?php

declare(strict_types=1);

namespace App\EventListener;

use App\Enum\ProductManagement\ProductApprovalWorkflowTransition;
use Pimcore\Model\DataObject\UniProductBase;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Workflow\Event\GuardEvent;

class ProductWorkflowGuard
{
    private TokenStorageInterface $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public function guardTransition(GuardEvent $event): void
    {
        $token = $this->tokenStorage->getToken();

        if ($token === null) {
            $event->setBlocked(true);

            return;
        }

        $userRoles = $token->getRoleNames();
        $transition = $event->getTransition()->getName();
        $subject = $event->getSubject();

        if (!$subject instanceof UniProductBase) {
            return;
        }

        switch ($transition) {
            case ProductApprovalWorkflowTransition::SUBMIT_FOR_APPROVAL->value:
                // Marcom enriches data and submits for approval
                $event->setBlocked(!in_array('ROLE_MARCOM', $userRoles, true));

                break;

            case ProductApprovalWorkflowTransition::APPROVE_PRODUCT->value:
                // Product Managers approve data
                $event->setBlocked(!in_array('ROLE_PRODUCT_MANAGER', $userRoles, true));

                break;

            case ProductApprovalWorkflowTransition::REJECT_PRODUCT->value:
                // Application Engineering for technical updates/rejections
                $event->setBlocked(!in_array('ROLE_APPLICATION_ENGINEERING', $userRoles, true));

                break;

            case ProductApprovalWorkflowTransition::RETURN_TO_APPROVAL->value:
                // Allow return to approval for rejected or draft states by Marcom or Product Managers
                $event->setBlocked(!in_array('ROLE_MARCOM', $userRoles, true) && !in_array('ROLE_PRODUCT_MANAGER', $userRoles, true));

                break;

            case ProductApprovalWorkflowTransition::MOVE_TO_DRAFT->value:
            case ProductApprovalWorkflowTransition::ARCHIVE_PRODUCT->value:
                // Restrict to Admin for manual archiving, but allow event listener for auto-archive
                $event->setBlocked(!in_array('ROLE_ADMIN', $userRoles, true));

                break;

            default:
                $event->setBlocked(true);
        }
    }
}
