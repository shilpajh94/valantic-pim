<?php

declare(strict_types=1);

namespace App\Enum\ProductManagement;

enum UniProductManagementApprovalWorkflowPlace: string
{
    case CREATED = 'created';
    case PENDING_APPROVAL = 'pending_approval';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
    case DRAFT = 'draft';
    case ARCHIVED = 'archived';
    case EMERGENCY_UNPUBLISHED = 'emergency_unpublished';
}
