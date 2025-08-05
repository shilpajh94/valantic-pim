<?php

declare(strict_types=1);

namespace App\Enum\ProductManagement;

enum ProductApprovalWorkflowPlace: string
{
    case IMPORTED_DISPLAYED = 'imported_displayed';
    case CATEGORY_AUTO_ASSIGNED = 'category_auto_assigned';
    case ENRICHED = 'enriched';
    case CATEGORY_MANUAL_ASSIGNED = 'category_manual_assigned';
    case MEDIA_ASSIGNED = 'media_assigned';
    case PENDING_APPROVAL = 'pending_approval';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
    case PUBLISHED = 'published';
    case EXPORTED = 'exported';
    case COMPLIANCE_SENT = 'compliance_sent';
    case COMPLIANCE_APPROVED = 'compliance_approved';
}
