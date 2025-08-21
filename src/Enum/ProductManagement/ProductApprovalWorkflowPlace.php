<?php

declare(strict_types=1);

namespace App\Enum\ProductManagement;

enum ProductApprovalWorkflowPlace: string
{
    case CREATED_FROM_SAP = 'created_from_sap';
    case PENDING_APPROVAL = 'pending_approval';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
    case DRAFT = 'draft';
    case ARCHIVED = 'archived';
}
