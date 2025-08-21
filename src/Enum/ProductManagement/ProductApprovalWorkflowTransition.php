<?php

declare(strict_types=1);

namespace App\Enum\ProductManagement;

enum ProductApprovalWorkflowTransition: string
{
    case SUBMIT_FOR_APPROVAL = 'submit_for_approval';
    case APPROVE_PRODUCT = 'approve_product';
    case REJECT_PRODUCT = 'reject_product';
    case RETURN_TO_APPROVAL = 'return_to_approval';
    case MOVE_TO_DRAFT = 'move_to_draft';
    case ARCHIVE_PRODUCT = 'archive_product';
}
