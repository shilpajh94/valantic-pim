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
    case SAP_UPDATED_DISPLAYED = 'sap_updated_displayed';
    case SAP_AUTO_UPDATED = 'sap_auto_updated';
    case DRAFT_FOR_UPDATE = 'draft_for_update';
    case UPDATED_ENRICHED = 'updated_enriched';
    case UPDATED_PENDING_APPROVAL = 'updated_pending_approval';
    case ARCHIVED = 'archived';
    case EMERGENCY_UNPUBLISHED = 'emergency_unpublished';
}
