<?php

namespace AppBundle\Workflow;

class Constants
{
    /* Product Publishing */
    const PB =  'Product Publishing';
    const PB_WORKFLOW_NAME =  'product_publishing';
    const PB_PRODUCT_MANAGER_ROLE_NAME =  'Product-Manager';
    const PB_PRODUCT_EDITOR_ROLE_NAME = 'Editor';
    const PB_PRODUCT_REVEIW_EMAIL_TEMPLATE_PATH =  '/Workflow/Email Template/productReview';
    const PB_REVIEW_SUBJECT = 'Product Review';

    const PB_ENRICH_SUBJECT = 'Product Enrich';
    const PB_PRODUCT_ENRICH_EMAIL_TEMPLATE_PATH = '/Workflow/Email Template/productEnrich';

    const PB_PUBLISH_SUBJECT = 'Product Publish';
    const PB_PRODUCT_PUBLISH_EMAIL_TEMPLATE_PATH = '/Workflow/Email Template/productPublish';

    const PB_UNPUBLISH_SUBJECT = 'Product Unpublish';
    const PB_PRODUCT_UNPUBLISH_EMAIL_TEMPLATE_PATH = '/Workflow/Email Template/productUnpublish';

    const ADMIN_URL = 'http://contitech.dev.local/admin/';

    /* Transition Name */
    const PB_START_PROCESSING_ACTION_NAME = 'start_processing';
    const PB_ENRICH_AGAIN_ACTION_NAME   =   'enrich_again';
    const PB_PUBLISH_ACTION_NAME = 'publish';
    const PB_UNPUBLISH_ACTION_NAME = 'unpublish';

}
