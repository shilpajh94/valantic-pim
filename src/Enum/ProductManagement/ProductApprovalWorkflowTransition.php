<?php

declare(strict_types=1);

namespace App\Enum\ProductManagement;

enum ProductApprovalWorkflowTransition: string
{
    case DISPLAY_IMPORTED = 'display_imported';
    case AUTO_ASSIGN_CATEGORY = 'auto_assign_category';
    case ENRICH_PRODUCT = 'enrich_product';
    case MANUAL_ASSIGN_CATEGORY = 'manual_assign_category';
    case ASSIGN_MEDIA = 'assign_media';
    case SUBMIT_FOR_APPROVAL = 'submit_for_approval';
    case APPROVE_PRODUCT = 'approve_product';
    case REJECT_PRODUCT = 'reject_product';
    case RETURN_TO_ENRICHMENT = 'return_to_enrichment';
    case PUBLISH_PRODUCT = 'publish_product';
    case EXPORT_PRODUCT = 'export_product';
    case EXPORT_TO_COMPLIANCE = 'export_to_compliance';
    case COMPLIANCE_APPROVE = 'compliance_approve';
    case SYNC_FROM_COMPLIANCE = 'sync_from_compliance';
}
