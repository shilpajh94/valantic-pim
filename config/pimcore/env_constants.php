<?php

if (CUSTOM_ENV == "prod") {

    define("CDN_ENABLE", 1);
    define("CDN_HOST", "https://d3hxu0uwhrukhz.cloudfront.net");
    define("S3_HOST", "https://s3.eu-central-1.amazonaws.com");
    define("S3_BUCKET", "pimcore-contitech-assets");
    define("S3_REGION", "eu-central-1");

    define("S3_BUCKET_BW_SAP_ARCHIVE", "pim-sap-import-archive-prod");
    define("S3_REGION_BW_SAP_ARCHIVE", "eu-central-1");
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
   
    define("BW_SAP_IMPORT_SFTP_PATH_PTGEU", "/P9A/PIMCORE/OUTBOUND/P61/PRODUCTION");

    define("BW_SAP_IMPORT_SFTP_PATH_IFSEMEA", "/P9A/PIMCORE/OUTBOUND/P23/PRODUCTION");

    
    define("BW_SAP_IMPORT_SFTP_PLANTMATERIAL_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/PIM_MaterialPlant.csv");
    define("BW_SAP_IMPORT_SFTP_SALESMATERIAL_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/PIM_MaterialSales.csv");
    define("BW_SAP_IMPORT_SFTP_PRODUCT_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/PIM_Material.csv");
    define("BW_SAP_IMPORT_SFTP_PRICE_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/PIM_ListPrice.csv");
//    define("BW_SAP_IMPORT_SFTP_SIOP_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/siop.csv");
    define("BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH", BW_SAP_IMPORT_SFTP_PATH."/archive/");
    define("BW_SAP_IMPORT_SFTP_DOWNLOAD_TEMP_DIR",PIMCORE_PROJECT_ROOT."/var/tmp/");

    define("BW_SAP_IMPORT_SFTP_PLANTMATERIAL_FILE_PATH_PTGEU", BW_SAP_IMPORT_SFTP_PATH_PTGEU."/PIM_P61_Material_Plant.csv");
    define("BW_SAP_IMPORT_SFTP_SALESMATERIAL_FILE_PATH_PTGEU", BW_SAP_IMPORT_SFTP_PATH_PTGEU."/PIM_P61_Material_Sales.csv");
    define("BW_SAP_IMPORT_SFTP_PRODUCT_FILE_PATH_PTGEU", BW_SAP_IMPORT_SFTP_PATH_PTGEU."/PIM_P61_Material.csv");
    // define("BW_SAP_IMPORT_SFTP_PRICE_FILE_PATH_PTGEU", BW_SAP_IMPORT_SFTP_PATH_PTGEU."/PIM_ListPrice.csv");
    define("BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH_PTGEU", BW_SAP_IMPORT_SFTP_PATH_PTGEU."/archive/");

    define("BW_SAP_IMPORT_SFTP_PLANTMATERIAL_FILE_PATH_IFSEMEA", BW_SAP_IMPORT_SFTP_PATH_IFSEMEA."/PIM_P23_MaterialPlant.csv");
    define("BW_SAP_IMPORT_SFTP_SALESMATERIAL_FILE_PATH_IFSEMEA", BW_SAP_IMPORT_SFTP_PATH_IFSEMEA."/PIM_P23_MaterialSales.csv");
    define("BW_SAP_IMPORT_SFTP_PRODUCT_FILE_PATH_IFSEMEA", BW_SAP_IMPORT_SFTP_PATH_IFSEMEA."/PIM_P23_Material.csv");
    define("BW_SAP_IMPORT_SFTP_PRICE_FILE_PATH_IFSEMEA", BW_SAP_IMPORT_SFTP_PATH_IFSEMEA."/PIM_P23_ListPrice.csv");


    // this is being used by workflow reminder cron
    // setting this in 'settings' - > 'domain name' breaks the redirect set for admin
    define("APPLICATION_HOST","https://pim.conti.de");
    define("IMAGE_TRANSFORMATION_LAMBDA_FUNCTION_NAME", "Prod-ImageThumbnails");
    define("IMAGE_TRANSFORMATION_LAMBDA_FUNCTION_REGION", "eu-central-1");

    define("B2B_TRANSLATION_SFTP_HOST", "v5as017.tiretech2.contiwan.com");
    define("B2B_TRANSLATION_SFTP_PORT", 21);
    define("B2B_TRANSLATION_SFTP_USERNAME", "PIMServices");
    define("B2B_TRANSLATION_SFTP_PASSWORD", "Pr0duct2023");
    define("B2B_TRANSLATION_SFTP_DOWNLOAD_TEMP_DIR",PIMCORE_PROJECT_ROOT."/var/tmp/");
    define("B2B_TRANSLATION_SFTP_INBOUND_FOLDER_PATH", "/PIM/Translation/Inbound"); #location where PIM can send the data to our server.
    define("B2B_TRANSLATION_SFTP_OUTBOUND_FOLDER_PATH", "/PIM/Translation/Outbound"); #location where PIM can find extract from salesforce.

} elseif (CUSTOM_ENV == "stage") {

    define("CDN_ENABLE", 1);
    define("CDN_HOST", "https://dw9p6b81hm4k2.cloudfront.net");
    define("S3_HOST", "https://s3.eu-central-1.amazonaws.com");
    define("S3_BUCKET", "pimcorex-contitech-assets-prod");
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

    define("BW_SAP_IMPORT_SFTP_PATH", "/Staging91/PIMCore/OUTBOUND");

    define("BW_SAP_IMPORT_SFTP_PATH_PTGEU", "/Staging91/PIMCore/OUTBOUND/P61/PRODUCTION");

    define("BW_SAP_IMPORT_SFTP_PATH_IFSEMEA", "/Staging91/PIMCore/OUTBOUND/P23/PRODUCTION");


    define("BW_SAP_IMPORT_SFTP_PLANTMATERIAL_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/PIM_MaterialPlant.csv");
    define("BW_SAP_IMPORT_SFTP_SALESMATERIAL_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/PIM_MaterialSales.csv");
    define("BW_SAP_IMPORT_SFTP_PRODUCT_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/PIM_Material.csv");
    define("BW_SAP_IMPORT_SFTP_PRICE_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/PIM_ListPrice.csv");
//    define("BW_SAP_IMPORT_SFTP_SIOP_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/siop.csv");
    define("BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH", BW_SAP_IMPORT_SFTP_PATH."/archive/");
    define("BW_SAP_IMPORT_SFTP_DOWNLOAD_TEMP_DIR",PIMCORE_PROJECT_ROOT."/var/tmp/");
    
    define("BW_SAP_IMPORT_SFTP_PLANTMATERIAL_FILE_PATH_PTGEU", BW_SAP_IMPORT_SFTP_PATH_PTGEU."/PIM_P61_Material_Plant.csv");
    define("BW_SAP_IMPORT_SFTP_SALESMATERIAL_FILE_PATH_PTGEU", BW_SAP_IMPORT_SFTP_PATH_PTGEU."/PIM_P61_Material_Sales.csv");
    define("BW_SAP_IMPORT_SFTP_PRODUCT_FILE_PATH_PTGEU", BW_SAP_IMPORT_SFTP_PATH_PTGEU."/PIM_P61_Material.csv");
    // define("BW_SAP_IMPORT_SFTP_PRICE_FILE_PATH_PTGEU", BW_SAP_IMPORT_SFTP_PATH_PTGEU."/PIM_ListPrice.csv");
    define("BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH_PTGEU", BW_SAP_IMPORT_SFTP_PATH_PTGEU."/archive/");
    
    define("BW_SAP_IMPORT_SFTP_PLANTMATERIAL_FILE_PATH_IFSEMEA", BW_SAP_IMPORT_SFTP_PATH_IFSEMEA."/PIM_P23_MaterialPlant.csv");
    define("BW_SAP_IMPORT_SFTP_SALESMATERIAL_FILE_PATH_IFSEMEA", BW_SAP_IMPORT_SFTP_PATH_IFSEMEA."/PIM_P23_MaterialSales.csv");
    define("BW_SAP_IMPORT_SFTP_PRODUCT_FILE_PATH_IFSEMEA", BW_SAP_IMPORT_SFTP_PATH_IFSEMEA."/PIM_P23_Material.csv");
    define("BW_SAP_IMPORT_SFTP_PRICE_FILE_PATH_IFSEMEA", BW_SAP_IMPORT_SFTP_PATH_IFSEMEA."/PIM_P23_ListPrice.csv");


    // this is being used by workflow reminder cron
    define("APPLICATION_HOST","https://stage.pim11.conti.de");
    define("IMAGE_TRANSFORMATION_LAMBDA_FUNCTION_NAME", "stage-ImageThumbnails");
    define("IMAGE_TRANSFORMATION_LAMBDA_FUNCTION_REGION", "eu-central-1");

    define("B2B_TRANSLATION_SFTP_HOST", "v5as017.tiretech2.contiwan.com");
    define("B2B_TRANSLATION_SFTP_PORT", 21);
    define("B2B_TRANSLATION_SFTP_USERNAME", "PIMServices");
    define("B2B_TRANSLATION_SFTP_PASSWORD", "Pr0duct2023");
    define("B2B_TRANSLATION_SFTP_DOWNLOAD_TEMP_DIR",PIMCORE_PROJECT_ROOT."/var/tmp/");
    define("B2B_TRANSLATION_SFTP_INBOUND_FOLDER_PATH", "/PIM/Translation/Inbound"); #location where PIM can send the data to our server.
    define("B2B_TRANSLATION_SFTP_OUTBOUND_FOLDER_PATH", "/PIM/Translation/Outbound"); #location where PIM can find extract from salesforce.

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

    define("BW_SAP_IMPORT_SFTP_HOST", "upload.pimcoreclient.com");
    define("BW_SAP_IMPORT_SFTP_PORT", 22);
    define("BW_SAP_IMPORT_SFTP_USERNAME", "rohit.sriwastva");
    define("BW_SAP_IMPORT_SFTP_PASSWORD", "R@H!T@4321");
    define("BW_SAP_IMPORT_SFTP_PATH", "/vsftpd/rohit.sriwastva/bw");

    define("BW_SAP_IMPORT_SFTP_PATH_PTGEU", "/vsftpd/rohit.sriwastva/bw");

    define("BW_SAP_IMPORT_SFTP_PATH_IFSEMEA", "/vsftpd/rohit.sriwastva/bw");

    define("BW_SAP_IMPORT_SFTP_PLANTMATERIAL_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/PIM_MaterialPlant.csv");
    define("BW_SAP_IMPORT_SFTP_SALESMATERIAL_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/PIM_MaterialSales.csv");
    define("BW_SAP_IMPORT_SFTP_PRODUCT_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/PIM_Material.csv");
    define("BW_SAP_IMPORT_SFTP_PRICE_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/PIM_ListPrice.csv");
//    define("BW_SAP_IMPORT_SFTP_SIOP_FILE_PATH", BW_SAP_IMPORT_SFTP_PATH."/siop.csv");
    define("BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH", BW_SAP_IMPORT_SFTP_PATH."/archive/");
    define("BW_SAP_IMPORT_SFTP_DOWNLOAD_TEMP_DIR",PIMCORE_PROJECT_ROOT."/var/tmp/");
    
    define("BW_SAP_IMPORT_SFTP_PLANTMATERIAL_FILE_PATH_PTGEU", BW_SAP_IMPORT_SFTP_PATH_PTGEU."/PIM_P61_Material_Plant.csv");
    define("BW_SAP_IMPORT_SFTP_SALESMATERIAL_FILE_PATH_PTGEU", BW_SAP_IMPORT_SFTP_PATH_PTGEU."/PIM_P61_Material_Sales.csv");
    define("BW_SAP_IMPORT_SFTP_PRODUCT_FILE_PATH_PTGEU", BW_SAP_IMPORT_SFTP_PATH_PTGEU."/PIM_P61_Material.csv");
    // define("BW_SAP_IMPORT_SFTP_PRICE_FILE_PATH_PTGEU", BW_SAP_IMPORT_SFTP_PATH_PTGEU."/PIM_ListPrice.csv");
    define("BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH_PTGEU", BW_SAP_IMPORT_SFTP_PATH_PTGEU."/archive/");

    define("BW_SAP_IMPORT_SFTP_PLANTMATERIAL_FILE_PATH_IFSEMEA", BW_SAP_IMPORT_SFTP_PATH_IFSEMEA."/PIM_P23_MaterialPlant.csv");
    define("BW_SAP_IMPORT_SFTP_SALESMATERIAL_FILE_PATH_IFSEMEA", BW_SAP_IMPORT_SFTP_PATH_IFSEMEA."/PIM_P23_MaterialSales.csv");
    define("BW_SAP_IMPORT_SFTP_PRODUCT_FILE_PATH_IFSEMEA", BW_SAP_IMPORT_SFTP_PATH_IFSEMEA."/PIM_P23_Material.csv");
    define("BW_SAP_IMPORT_SFTP_PRICE_FILE_PATH_IFSEMEA", BW_SAP_IMPORT_SFTP_PATH_IFSEMEA."/PIM_P23_ListPrice.csv");

    // this is being used by workflow reminder cron
    define("APPLICATION_HOST","localhost");
    define("IMAGE_TRANSFORMATION_LAMBDA_FUNCTION_NAME", "dev-ImageThumbnails");
    define("IMAGE_TRANSFORMATION_LAMBDA_FUNCTION_REGION", "eu-central-1");

    define("B2B_TRANSLATION_SFTP_HOST", "v5as017.tiretech2.contiwan.com");
    define("B2B_TRANSLATION_SFTP_PORT", 21);
    define("B2B_TRANSLATION_SFTP_USERNAME", "PIMServices");
    define("B2B_TRANSLATION_SFTP_PASSWORD", "Pr0duct2023");
    define("B2B_TRANSLATION_SFTP_DOWNLOAD_TEMP_DIR",PIMCORE_PROJECT_ROOT."/var/tmp/");
    define("B2B_TRANSLATION_SFTP_INBOUND_FOLDER_PATH", "/PIM/Translation/Inbound"); #location where PIM can send the data to our server.
    define("B2B_TRANSLATION_SFTP_OUTBOUND_FOLDER_PATH", "/PIM/Translation/Outbound"); #location where PIM can find extract from salesforce.

}
