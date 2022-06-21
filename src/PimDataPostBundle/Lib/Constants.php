<?php

namespace PimDataPostBundle\Lib;

class Constants
{
    const B2B_PRODUCT_TEMP_TABLE_NAME = "salesforce_integration_b2b_product_temp";

    const B2B_PRODUCT_MASTER_TABLE_NAME = "salesforce_integration_b2b_product_master";

    const B2B_PRODUCT_OBJECT_TABLE_NAME = "object_1";

    const B2B_PRODUCT_SMALL_IMAGE_DISPLAY_TYPE = "Product Image Small";

    const B2B_PRODUCT_MEDIUM_IMAGE_DISPLAY_TYPE = "Product Image Medium";

    const B2B_CATEGORY_TEMP_TABLE_NAME = "salesforce_integration_b2b_category_temp";

    const B2B_CATEGORY_MASTER_TABLE_NAME = "salesforce_integration_b2b_category_master";

    const B2B_CATEGORY_OBJECT_TABLE_NAME = "object_2";

    // B2C
    const B2C_PRODUCT_TEMP_TABLE_NAME = "salesforce_integration_b2c_product_temp";

    const B2C_PRODUCT_MASTER_TABLE_NAME = "salesforce_integration_b2c_product_master";

    const B2C_PRODUCT_OBJECT_TABLE_NAME = "object_1";

    const B2C_CATEGORY_TEMP_TABLE_NAME = "salesforce_integration_b2c_category_temp";

    const B2C_CATEGORY_MASTER_TABLE_NAME = "salesforce_integration_b2c_category_master";

    const B2C_CATEGORY_OBJECT_TABLE_NAME = "object_B2CCategory";

    /**
     * To create a window to capture the pim changes
     * The window starts from timestamp ( UPDATE_WINDOW_END_HOUR - UPDATE_WINDOW_LENGTH_IN_MINUTES )
     * The window ends at timestamp UPDATE_WINDOW_END_HOUR (current day)
     * 
     * for example, if UPDATE_WINDOW_END_HOUR = 14 and UPDATE_WINDOW_LENGTH_IN_MINUTES = 180 then
     * the window starts from 11:00:00 (current day) and ends at 14:00:00 (current day)
     * 
     * value range: 0-23
     */
    const UPDATE_WINDOW_END_HOUR = 19;

    const UPDATE_WINDOW_LENGTH_IN_MINUTES = 50;

    const INSERT_BATCH_SIZE = 50;

    const B2B_FAILURE_LOG_ASSET_FOLDER = "/Internal Assets/Saleforce Integration Failure Logs/B2B";

    const FAILURE_LOG_CSV_HEADERS = ['Object Type' => 'SFObjectType', 'Response Status' => 'responseStatus', 'Response Message' => 'responseMsg', "External Id" => 'externalID', "Pim Id" => 'pimId' , 'Business Unit' => 'businessUnit'];

    const FAILURE_NOTIFICATION_ROLES = ['ApplicationAdmin'];

    const B2B_FAILURE_TEMPLATE_NAME = "/Email/B2B Saleforce Integration Failure Email";

    const B2B_FAILURE_TEMPLATE_SUBJECT_NAME = "B2B Saleforce Integration Failure Email";

    const MAX_HTTP_CONNECTION_RETRIES = 5;

    const B2C_FAILURE_LOG_ASSET_FOLDER = "/Internal Assets/Saleforce Integration Failure Logs/B2C";

    const B2C_FAILURE_TEMPLATE_NAME = "/Email/B2C Saleforce Integration Failure Email";

    const B2C_FAILURE_TEMPLATE_SUBJECT_NAME = "B2C Saleforce Integration Failure Email";

    // in seconds
    const SLEEP_TIME_WITHIN_CONNECTION_RETRIES = 2;

    // in seconds
    const REQUEST_TIMEOUT_FOR_DATA_REQUESTS = 300;

    const B2B_SCRIPT_START_TIME_SESSION_KEY = "salesforce_integration_B2B_script_start_time";

    const B2B_PIM_FAILURE_FLAG_SESSION_KEY = "salesforce_integration_B2B_PIM_failure_flag";

    const B2B_PIM_FAILURE_TEMPLATE = "/Email/Saleforce Integration PIM Failure Email";

    const B2C_PIM_FAILURE_TEMPLATE = "/Email/Saleforce Integration PIM Failure Email";

    const B2B_PIM_CATEGORY_ATTRIBUTES = ["SIOPLevel1","SIOPLevel2","SIOPLevel3","SIOPLevel4","SIOPLevel5","SIOPLevel6"];

    const B2B_FAILURE_IDS_SESSION_KEY = "salesforce_integration_B2B_failure_key";

    const B2B_SUCCESS_IDS_SESSION_KEY = "salesforce_integration_B2B_success_key";

    const B2C_SUCCESS_IDS_SESSION_KEY = "salesforce_integration_B2C_success_key";

    const B2C_SCRIPT_START_TIME_SESSION_KEY = "salesforce_integration_B2C_script_start_time";

    const IFS_CATEGORIES = ['Industrial Hose' => '041000', 'Hydraulics'=>'041500'];

    const PTG_CATEGORIES = ['PTP' => '043000'];

    const B2B_API_REQUEST_ENTITIES_TABLE = \PimDataPostBundle\Model\PersistantModel\B2BAPIRequestEntity\Dao::TABLE_NAME;

    const B2B_API_REQUEST_ARCHIVE_FOLDER = "/Internal Assets/Saleforce Integration Archives/B2B";

    const B2B_API_REQUEST_ARCHIVE_CSV_LOG_HEADERS = ['ID' => 'id', 'Body' => 'body', 'SFObjectType' => 'SFObjectType', "Response Status" => 'responseStatus', "Reponse Msg" => 'responseMsg' , 'Operation Type' => 'operationType', "External ID" => "externalID", "PIM ID" => "pimId", "Response Time Stamp" =>"responseTimestamp", "Created Date Time Stamp" => "creationDate"];

    const B2C_API_REQUEST_ENTITIES_TABLE = "salesforce_integration_b2c_api_request_entities";

    const B2C_API_REQUEST_ARCHIVE_FOLDER = "/Internal Assets/Saleforce Integration Archives/B2C";

    const B2C_API_REQUEST_ARCHIVE_CSV_LOG_HEADERS = ['ID' => 'id', 'Body' => 'body', 'SFObjectType' => 'SFObjectType', "Response Status" => 'responseStatus', "Reponse Msg" => 'responseMsg' , 'Operation Type' => 'operationType', "External ID" => "externalID", "PIM ID" => "pimId", "Response Time Stamp" =>"responseTimestamp", "Created Date Time Stamp" => "creationDate"];

}