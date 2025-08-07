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
    case DISPLAY_SAP_UPDATED = 'display_sap_updated';
    case UPDATE_SAP_DATA_AUTOMATICALLY = 'update_sap_data_automatically';
    case EXPORT_SAP_UPDATED = 'export_sap_updated';
    case SET_TO_DRAFT_FOR_UPDATE = 'set_to_draft_for_update';
    case UPDATE_PRODUCT_DATA = 'update_product_data';
    case SUBMIT_UPDATED_FOR_APPROVAL = 'submit_updated_for_approval';
    case APPROVE_UPDATED_PRODUCT = 'approve_updated_product';
    case REJECT_UPDATED_PRODUCT = 'reject_updated_product';
    case PUBLISH_UPDATED_PRODUCT = 'publish_updated_product';
    case EXPORT_UPDATED_PRODUCT = 'export_updated_product';
    case EXPORT_UPDATED_TO_COMPLIANCE = 'export_updated_to_compliance';
    case SYNC_UPDATED_FROM_COMPLIANCE = 'sync_updated_from_compliance';
    case ARCHIVE_PRODUCT = 'archive_product';
    case MARK_AS_ARCHIVED = 'mark_as_archived';
    case REACTIVATE_PRODUCT = 'reactivate_product';
    case EMERGENCY_UNPUBLISH = 'emergency_unpublish';
}
