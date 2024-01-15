<?php

namespace DistributionHubBundle\Lib;

/**
 * Class Constants
 * @package DistributionHubBundle\Lib
 */
class Constants
{
    const S3_THUMBS_WITH_LAMBDA = ["1200"];

    const FILE_TYPE_CSV = 'Csv';
    const FILE_TYPE_EXCEL = 'Excel';
    const FILE_TYPE_XLSX = 'Xlsx';
    const FILE_TYPE_XLS = 'Xls';
    const FILE_TYPE_JSON = 'Json';
    const CONFIG_FILE = PIMCORE_PROJECT_ROOT . '/bundles/DistributionHubBundle/Resources/config/config.yaml';
    const PACKAGE_CONFIG_FILE = PIMCORE_PROJECT_ROOT . '/bundles/DistributionHubBundle/Resources/config/pimcore/package/plugin_config.yaml';
    const SCHEDULE_STATUS_CREATED = 'CREATED';

    /**
     * @IMPORTANT: if this constant is changed then this also needs to be handled in scheduleConfig.js in delete action column handler
     */
    const SCHEDULE_STATUS_INPROGRESS = 'IN-PROGRESS';
    const SCHEDULE_STATUS_COMPLETED = 'COMPLETED';
    const SCHEDULE_STATUS_FAILED = 'FAILED';
    const SCHEDULE_STATUS_KILLED = 'KILLED';
    const SCHEDULE_STATUS_EXPIRED = 'EXPIRED';
    const MAIL_CONFIG_FILE = PIMCORE_PROJECT_ROOT . '/bundles/DistributionHubBundle/Resources/config/mail_config.yaml';
    const EXPORT_ONLY_ASSETS = "dHub_assets";
    const EXPORT_ONLY_DATA = "dHub_data_file";
    const EXPORT_DATA_ASSETS_BOTH = "dHub_both";
    const HOST_NAME_KEY_IN_SESSION = "app_host_url";
    const SIMPLE_ATTRIBUTE_TYPES = "flat";
    const SUPPORTED_ATTRIBUTE_TYPES = [
        "numeric",
        "select",
        "input",
        "textarea",
        "wysiwyg",
        "slider",
        "quantityValue",
        "multiselect",
        "booleanSelect",
        "languagemultiselect",
        "language",
        "country",
        "countrymultiselect",
        "checkbox",
        "manyToManyObjectRelation",
        "manyToOneRelation",
        "localizedfields",
        "advancedManyToManyRelation",
        "advancedManyToManyObjectRelation",
        "fieldcollections",
        "objectbricks",
        "date",
        "datetime",
        "time"
    ];
    const FLAT_ATTRIBUTE_TYPES = [
        "numeric",
        "select",
        "input",
        "textarea",
        "wysiwyg",
        "slider",
        "booleanSelect",
        "checkbox",
    ];
    // Installer constants
    const DHUB_PERMISSION_KEY = 'plugin_distribution_hub';
    const DHUB_CLASS_CHANNEL = "distribution_hub_channel";
    const DHUB_CLASS_FTP = "distribution_hub_FTPDetail";
    const DHUB_CLASS_FTP_MAP = "distribution_hub_channel_ftp_map";
    const DHUB_CLASS_SCHEDULE = "distribution_hub_schedule";
    const DHUB_CLASS_FILTER = "distribution_hub_filter";
    const DHUB_CLASS_SHARE = "distribution_hub_channel_user_share";
    const PREDEFINED_COLUMNS = [['key' => 'id',
            'type' => 'system',
            'label' => 'id',
            'position' => 1],
            ['key' => 'fullpath',
            'type' => 'system',
            'label' => 'fullpath',
            'position' => 2],
            ['key' => 'published',
            'type' => 'system',
            'label' => 'published',
            'position' => 3],
            ['key' => 'creationDate',
            'type' => 'system',
            'label' => 'creationDate',
            'position' => 4],
            ['key' => 'modificationDate',
            'type' => 'system',
            'label' => 'modificationDate',
            'position' => 5]];

    //Business Unit Specific Class and Roles Config
    const DHUB_BU_CLASSESS = PIMCORE_PROJECT_ROOT .'/bundles/DistributionHubBundle/Resources/config/business_unit_classes.yaml';
    const DHUB_BU_ROLES = PIMCORE_PROJECT_ROOT .'/bundles/DistributionHubBundle/Resources/config/business_unit_roles.yaml';
}
