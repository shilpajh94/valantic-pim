<?php

declare(strict_types=1);

namespace App\Enum\ProductManagement;

enum ProductApprovalWorkflowTransition: string
{
    case SUBMIT_FOR_APPROVAL = 'submit_for_approval';
    case APPROVE_PRODUCT = 'approve_product';
    case REJECT_PRODUCT = 'reject_product';
    case EDIT_DRAFT = 'edit_draft';
    case ARCHIVE_PRODUCT = 'archive_product';
    case UNARCHIVE_PRODUCT = 'unarchive_product';
    case EMERGENCY_UNPUBLISH = 'emergency_unpublish';
}
