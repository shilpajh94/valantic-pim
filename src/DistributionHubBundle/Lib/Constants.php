<?php

namespace DistributionHubBundle\Lib;

/**
 * Class Constants
 * @package DistributionHubBundle\Lib
 */
class Constants
{

    const FILE_TYPE_CSV = 'Csv';

    const FILE_TYPE_EXCEL = 'Excel';

    const FILE_TYPE_XLSX = 'Xlsx';

    const FILE_TYPE_XLS = 'Xls';

    const FILE_TYPE_JSON = 'Json';

    const CONFIG_FILE = PIMCORE_PROJECT_ROOT.'/src/DistributionHubBundle/Resources/config/config.yml';

    const PACKAGE_CONFIG_FILE = PIMCORE_PROJECT_ROOT.'/src/DistributionHubBundle/Resources/config/pimcore/package/plugin_config.yml';

    const SCHEDULE_STATUS_CREATED = 'CREATED';
    /**
     * @IMPORTANT: if this constant is changed then this also needs to be handled in scheduleConfig.js in delete action column handler
     */
    const SCHEDULE_STATUS_INPROGRESS = 'IN-PROGRESS';

    const SCHEDULE_STATUS_COMPLETED = 'COMPLETED';

    const SCHEDULE_STATUS_FAILED = 'FAILED';

    const SCHEDULE_STATUS_KILLED = 'KILLED';

    const SCHEDULE_STATUS_EXPIRED = 'EXPIRED';

    const MAIL_CONFIG_FILE = PIMCORE_PROJECT_ROOT.'/src/DistributionHubBundle/Resources/config/mail_config.yml';

    const EXPORT_ONLY_ASSETS = "dHub_assets";

    const EXPORT_ONLY_DATA = "dHub_data_file";

    const EXPORT_DATA_ASSETS_BOTH = "dHub_both";

    const HOST_NAME_KEY_IN_SESSION = "app_host_url";
}
