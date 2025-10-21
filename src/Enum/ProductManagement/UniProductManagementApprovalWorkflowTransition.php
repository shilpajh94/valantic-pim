<?php

declare(strict_types=1);

namespace App\Enum\ProductManagement;

enum UniProductManagementApprovalWorkflowTransition: string
{
    case SUBMIT_FOR_APPROVAL = 'submit_for_approval';
    case APPROVE = 'approve';
    case REJECT = 'reject';
    case EDIT_DRAFT = 'edit_draft';
    case ARCHIVE = 'archive';
    case UNARCHIVE = 'unarchive';
    case EMERGENCY_UNPUBLISH = 'emergency_unpublish';
}
