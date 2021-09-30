<?php

if (CUSTOM_ENV == "prod") {

    define("CDN_ENABLE", 1);
    define("CDN_HOST", "https://doq3hlp8ldkf1.cloudfront.net");
    define("S3_HOST", "https://s3.us-east-1.amazonaws.com");
    define("S3_BUCKET", "contitech-assets-prod");
    define("S3_REGION", "us-east-1");

    define("S3_BUCKET_BW_SAP_ARCHIVE", "sap-import-archive-prod");
    define("S3_REGION_BW_SAP_ARCHIVE", "us-east-1");
    define("S3_BW_SAP_ARCHIVE_DIRECTORY", "SAP_import_files");
    
    define("B2B_EXPORT_SFTP_HOST", "vey1epxnds01");
    define("B2B_EXPORT_SFTP_PORT", 22);
    define("B2B_EXPORT_SFTP_USERNAME", "pimuser");
    define("B2B_EXPORT_SFTP_PASSWORD", "userpim");
    define("B2B_EXPORT_SFTP_PATH", "/opt/PIM/B2b");

    define("BW_SAP_IMPORT_SFTP_HOST", "v5ftp001.tiretech2.contiwan.com");
    define("BW_SAP_IMPORT_SFTP_PORT", 22);
    define("BW_SAP_IMPORT_SFTP_USERNAME", "pimcore");
    define("BW_SAP_IMPORT_SFTP_PASSWORD", "D3duct!0n");
    define("BW_SAP_IMPORT_SFTP_PATH", "/P9A/PIMCORE/OUTBOUND");

    define("BW_SAP_IMPORT_SFTP_PLANTMATERIAL_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/PIM_MaterialPlant.csv");
    define("BW_SAP_IMPORT_SFTP_SALESMATERIAL_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/PIM_MaterialSales.csv");
    define("BW_SAP_IMPORT_SFTP_PRODUCT_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/PIM_Material.csv");
    define("BW_SAP_IMPORT_SFTP_PRICE_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/PIM_ListPrice.csv");
//    define("BW_SAP_IMPORT_SFTP_SIOP_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/siop.csv");
    define("BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH", BW_SAP_IMPORT_SFTP_PATH."/archive/");
    define("BW_SAP_IMPORT_SFTP_DOWNLOAD_TEMP_DIR",PIMCORE_PROJECT_ROOT."/var/tmp/");

    define("CS_BW_SAP_IMPORT_SFTP_HOST", "v5ftp001.tiretech2.contiwan.com");
    define("CS_BW_SAP_IMPORT_SFTP_PORT", 22);
    define("CS_BW_SAP_IMPORT_SFTP_USERNAME", "pimcore");
    define("CS_BW_SAP_IMPORT_SFTP_PASSWORD", "D3duct!0n");
    define("CS_BW_SAP_IMPORT_SFTP_PATH", "/P9A/PIMCORE/OUTBOUND");

    define("CS_BW_SAP_IMPORT_SFTP_PRICE_FILE_PATH", CS_BW_SAP_IMPORT_SFTP_PATH."/PIM_ListPrice.csv");
    define("CS_BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH", CS_BW_SAP_IMPORT_SFTP_PATH."/archive/");
    define("CS_BW_SAP_IMPORT_SFTP_DOWNLOAD_TEMP_DIR",PIMCORE_PROJECT_ROOT."/var/tmp/");

    // this is being used by workflow reminder cron
    // setting this in 'settings' - > 'domain name' breaks the redirect set for admin
    define("APPLICATION_HOST","https://pim.conti.de");

} elseif (CUSTOM_ENV == "stage") {

    define("CDN_ENABLE", 1);
    define("CDN_HOST", "https://d3hdb0w38n8gg0.cloudfront.net");
    define("S3_HOST", "https://s3.us-east-1.amazonaws.com");
    define("S3_BUCKET", "pimcore-contitech-assets-stage");
    define("S3_REGION", "eu-central-1");

    define("S3_BUCKET_BW_SAP_ARCHIVE", "");
    define("S3_REGION_BW_SAP_ARCHIVE", "");
    define("S3_BW_SAP_ARCHIVE_DIRECTORY", "");

    define("B2B_EXPORT_SFTP_HOST", "vey1epxnds01");
    define("B2B_EXPORT_SFTP_PORT", 22);
    define("B2B_EXPORT_SFTP_USERNAME", "pimuser");
    define("B2B_EXPORT_SFTP_PASSWORD", "userpim");
    define("B2B_EXPORT_SFTP_PATH", "/opt/PIM/B2b");

    define("BW_SAP_IMPORT_SFTP_HOST", "v5ftp001.tiretech2.contiwan.com");
    define("BW_SAP_IMPORT_SFTP_PORT", 22);
    define("BW_SAP_IMPORT_SFTP_USERNAME", "pimcore");
    define("BW_SAP_IMPORT_SFTP_PASSWORD", "D3duct!0n");
    define("BW_SAP_IMPORT_SFTP_PATH", "/P9A/PIMCORE/OUTBOUND");

    define("BW_SAP_IMPORT_SFTP_PLANTMATERIAL_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/PIM_MaterialPlant.csv");
    define("BW_SAP_IMPORT_SFTP_SALESMATERIAL_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/PIM_MaterialSales.csv");
    define("BW_SAP_IMPORT_SFTP_PRODUCT_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/PIM_Material.csv");
    define("BW_SAP_IMPORT_SFTP_PRICE_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/PIM_ListPrice.csv");
//    define("BW_SAP_IMPORT_SFTP_SIOP_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/siop.csv");
    define("BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH", BW_SAP_IMPORT_SFTP_PATH."/archive/");
    define("BW_SAP_IMPORT_SFTP_DOWNLOAD_TEMP_DIR",PIMCORE_PROJECT_ROOT."/var/tmp/");

    define("CS_BW_SAP_IMPORT_SFTP_HOST", "v5ftp001.tiretech2.contiwan.com");
    define("CS_BW_SAP_IMPORT_SFTP_PORT", 22);
    define("CS_BW_SAP_IMPORT_SFTP_USERNAME", "pimcore");
    define("CS_BW_SAP_IMPORT_SFTP_PASSWORD", "D3duct!0n");
    define("CS_BW_SAP_IMPORT_SFTP_PATH", "/P9A/PIMCORE/OUTBOUND");

    define("CS_BW_SAP_IMPORT_SFTP_PRICE_FILE_PATH", CS_BW_SAP_IMPORT_SFTP_PATH."/PIM_ListPrice.csv");
    define("CS_BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH", CS_BW_SAP_IMPORT_SFTP_PATH."/archive/");
    define("CS_BW_SAP_IMPORT_SFTP_DOWNLOAD_TEMP_DIR",PIMCORE_PROJECT_ROOT."/var/tmp/");

    // this is being used by workflow reminder cron
    define("APPLICATION_HOST","http://stage.pim.conti.de");

} elseif (CUSTOM_ENV == "dev" || CUSTOM_ENV == "qc") {

    define("CDN_ENABLE", 0);
    define("CDN_HOST", "https://test_cdn");
    define("S3_HOST", "https://s3.us-east-1.amazonaws.com");
    define("S3_BUCKET", "megha-pim");
    define("S3_KEY", "AKIAZ6MFIGPTWVTS2K6D");
    define("S3_SECRET", "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");
    define("S3_REGION", "us-east-1");

    define("S3_BUCKET_BW_SAP_ARCHIVE", "megha-pim");
    define("S3_KEY_BW_SAP_ARCHIVE", "AKIAZ6MFIGPTWVTS2K6D");
    define("S3_SECRET_BW_SAP_ARCHIVE", "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");
    define("S3_REGION_BW_SAP_ARCHIVE", "us-east-1");
    define("S3_BW_SAP_ARCHIVE_DIRECTORY", "SAP_import_archived_files/");

    define("B2B_EXPORT_SFTP_HOST", "upload.pimcoreclients.com");
    define("B2B_EXPORT_SFTP_PORT", 22);
    define("B2B_EXPORT_SFTP_USERNAME", "rohit.sriwastva");
    define("B2B_EXPORT_SFTP_PASSWORD", "R@H!T@4321");
    define("B2B_EXPORT_SFTP_PATH", "/vsftpd/rohit.sriwastva");

    define("BW_SAP_IMPORT_SFTP_HOST", "upload.pimcoreclients.com");
    define("BW_SAP_IMPORT_SFTP_PORT", 22);
    define("BW_SAP_IMPORT_SFTP_USERNAME", "rohit.sriwastva");
    define("BW_SAP_IMPORT_SFTP_PASSWORD", "R@H!T@4321");
    define("BW_SAP_IMPORT_SFTP_PATH", "/vsftpd/rohit.sriwastva/bw");

    define("BW_SAP_IMPORT_SFTP_PLANTMATERIAL_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/PIM_MaterialPlant.csv");
    define("BW_SAP_IMPORT_SFTP_SALESMATERIAL_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/PIM_MaterialSales.csv");
    define("BW_SAP_IMPORT_SFTP_PRODUCT_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/PIM_Material.csv");
    define("BW_SAP_IMPORT_SFTP_PRICE_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/PIM_ListPrice.csv");
//    define("BW_SAP_IMPORT_SFTP_SIOP_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/siop.csv");
    define("BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH", BW_SAP_IMPORT_SFTP_PATH."/archive/");
    define("BW_SAP_IMPORT_SFTP_DOWNLOAD_TEMP_DIR",PIMCORE_PROJECT_ROOT."/var/tmp/");

    define("CS_BW_SAP_IMPORT_SFTP_HOST", "upload.pimcoreclients.com");
    define("CS_BW_SAP_IMPORT_SFTP_PORT", 22);
    define("CS_BW_SAP_IMPORT_SFTP_USERNAME", "rohit.sriwastva");
    define("CS_BW_SAP_IMPORT_SFTP_PASSWORD", "R@H!T@4321");
    define("CS_BW_SAP_IMPORT_SFTP_PATH", "/vsftpd/rohit.sriwastva/bw");

    define("CS_BW_SAP_IMPORT_SFTP_PRICE_FILE_PATH", CS_BW_SAP_IMPORT_SFTP_PATH."/PIM_ListPrice.csv");
    define("CS_BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH", CS_BW_SAP_IMPORT_SFTP_PATH."/archive/");
    define("CS_BW_SAP_IMPORT_SFTP_DOWNLOAD_TEMP_DIR",PIMCORE_PROJECT_ROOT."/var/tmp/");

    // this is being used by workflow reminder cron
    define("APPLICATION_HOST","localhost");
}
