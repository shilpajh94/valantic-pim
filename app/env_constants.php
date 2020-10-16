<?php

if (CUSTOM_ENV == "prod") {

    define("CDN_ENABLE", 1);
    define("CDN_HOST", "https://doq3hlp8ldkf1.cloudfront.net");
    define("S3_HOST", "https://s3.us-east-1.amazonaws.com");
    define("S3_BUCKET", "contitech-assets-prod");
    define("S3_REGION", "us-east-1");

    define("B2B_EXPORT_SFTP_HOST", "vey1epxnds01");
    define("B2B_EXPORT_SFTP_PORT", 22);
    define("B2B_EXPORT_SFTP_USERNAME", "pimuser");
    define("B2B_EXPORT_SFTP_PASSWORD", "userpim");
    define("B2B_EXPORT_SFTP_PATH", "/opt/PIM/B2b");

} elseif (CUSTOM_ENV == "stage") {

    define("CDN_ENABLE", 1);
    define("CDN_HOST", "https://d3l7tdim6hoq5l.cloudfront.net");
    define("S3_HOST", "https://s3.us-east-1.amazonaws.com");
    define("S3_BUCKET", "contitech-assets-stage");
    define("S3_REGION", "us-east-1");

    define("B2B_EXPORT_SFTP_HOST", "vey1epxnds01");
    define("B2B_EXPORT_SFTP_PORT", 22);
    define("B2B_EXPORT_SFTP_USERNAME", "pimuser");
    define("B2B_EXPORT_SFTP_PASSWORD", "userpim");
    define("B2B_EXPORT_SFTP_PATH", "/opt/PIM/B2b");

} elseif (CUSTOM_ENV == "dev" || CUSTOM_ENV == "qc") {

    define("CDN_ENABLE", 0);
    define("CDN_HOST", "https://test_cdn");
    define("S3_HOST", "https://s3.us-east-1.amazonaws.com");
    define("S3_BUCKET", "megha-pim");
    define("S3_KEY", "AKIAZ6MFIGPTWVTS2K6D");
    define("S3_SECRET", "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");
    define("S3_REGION", "us-east-1");

    define("B2B_EXPORT_SFTP_HOST", "upload.pimcoreclients.com");
    define("B2B_EXPORT_SFTP_PORT", 22);
    define("B2B_EXPORT_SFTP_USERNAME", "rohit.sriwastva");
    define("B2B_EXPORT_SFTP_PASSWORD", "R@H!T@4321");
    define("B2B_EXPORT_SFTP_PATH", "/vsftpd/rohit.sriwastva");

}
