<?php

namespace Wvision\Bundle\DataDefinitionsBundle\Lib;

/**
 * Class Constants
 * @package Wvision\Bundle\DataDefinitionsBundle\Lib
 */
class Constants
{
    const S3_THUMBS_WITH_LAMBDA = ["1200"];

    const FILE_TYPE_CSV = 'Csv';
    const FILE_TYPE_EXCEL = 'Excel';
    const FILE_TYPE_XLSX = 'Xlsx';
    const FILE_TYPE_XLS = 'Xls';
    const FILE_TYPE_JSON = 'Json';
    const CONFIG_FILE = PIMCORE_PROJECT_ROOT . '/bundles/w-vision/data-definitions/src/DataDefinitionsBundle/Resources/config/config.yaml';
    const SCHEDULE_STATUS_CREATED = 'CREATED';

    /**
     * @IMPORTANT: if this constant is changed then this also needs to be handled in scheduleConfig.js in delete action column handler
     */
    const SCHEDULE_STATUS_INPROGRESS = 'IN-PROGRESS';
    const SCHEDULE_STATUS_COMPLETED = 'COMPLETED';
    const SCHEDULE_STATUS_FAILED = 'FAILED';
    const SCHEDULE_STATUS_KILLED = 'KILLED';
    const SCHEDULE_STATUS_EXPIRED = 'EXPIRED';
    const EXPORT_ONLY_ASSETS = "dHub_assets";
    const EXPORT_ONLY_DATA = "dHub_data_file";
    const EXPORT_DATA_ASSETS_BOTH = "dHub_both";
    const HOST_NAME_KEY_IN_SESSION = "app_host_url";
    const SIMPLE_ATTRIBUTE_TYPES = "flat";

    //Data Definition Files for Class,Primary Key And Roles
    const DATA_DEFINITION_BU_CLASS = PIMCORE_PROJECT_ROOT .'/bundles/w-vision/data-definitions/src/DataDefinitionsBundle/Resources/config/business_unit_class.yaml';
    const DATA_DEFINITION_BU_ROLES = PIMCORE_PROJECT_ROOT .'/bundles/w-vision/data-definitions/src/DataDefinitionsBundle/Resources/config/business_unit_role.yaml';
   
    //constant for Product Data Import Module uploaded Files and And Log Files
    const DATA_DEFINITION_UPLOADED_FILES_IN_ASSET_FOLDER= '/Product Data Import Module/Uploaded Files';
    const DATA_DEFINITION_LOG_FILES_IN_ASSET_FOLDER= '/Product Data Import Module/Log Files';

    // //constant for Bulk Product Import Report Email Template
    const BULK_PRODUCT_IMPORT_REPORT = '/Bulk Product Import/BulkProductImportReport';
}
