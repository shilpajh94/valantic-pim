<?php
namespace B2BTranslationBundle\PimDataExport;

use AppBundle\Lib\SFTPConnection;
use Pimcore\Db;
use B2BTranslationBundle\Tool\Utils;
use B2BTranslationBundle\Logger\LogLevel;
use B2BTranslationBundle\B2BTranslationConstants;

class PimDataExportHelper
{
    private $b2bTable = [
        'IFS_PTG_US' => 'salesforce_integration_b2b_category_master',
        'CS' => '',
        'PTG_EU' => '', 
        'IFS_EMEA' => ''
    ];

    public function uploadFile($customFileName)
    {
        try {
            $SFTPConObj = new SFTPConnection(B2B_TRANSLATION_SFTP_HOST, B2B_TRANSLATION_SFTP_PORT);
            $SFTPConObj->login(B2B_TRANSLATION_SFTP_USERNAME, B2B_TRANSLATION_SFTP_PASSWORD);
            
            $localFile    = B2B_TRANSLATION_SFTP_DOWNLOAD_TEMP_DIR.$customFileName;
            if(!file_exists($localFile)) 
            {
                echo "ERROR: Looking for file - ".$customFileName. ". But file not created in folder - '".B2B_TRANSLATION_SFTP_DOWNLOAD_TEMP_DIR."'";
                return null;
            }
            else{
                $remoteFile = B2B_TRANSLATION_SFTP_INBOUND_FOLDER_PATH."/".$customFileName;
                $SFTPConObj->uploadFile($localFile, $remoteFile);
            }
        } catch (\Throwable $th) {
            echo PHP_EOL;
            echo "ERROR: File not uploaded to the server.";
            echo PHP_EOL;
            echo "ERROR: ". $th->getMessage();
            echo PHP_EOL;
        }
    }

    public function getB2BTranslationMapping($type, $bu)
    {
        $db = Db::get();
        $sqlMapping="select PIMB2BMappingData from object_B2BTranslationMapping Where TranslationDataType ='{$type}' AND BusinessUnit='{$bu}' ORDER BY o_modificationDate DESC";
        return $db->fetchOne($sqlMapping);
    }

    public function getAllB2BCategory($bu)
    {
        $db = Db::get();
        $table = $this->b2bTable[$bu];

        $ids = [];
        if($table)
        {
            $sql = "SELECT o_id FROM $table";
            $ids = $db->fetchCol($sql);
        }
        
        return $ids;
    }

    public function getLocalizedAttribute($bu, $className)
    {
        $businessUnitFileName = '';

        if($bu == 'IFS_PTG_US')
        {
            $businessUnitFileName = B2BTranslationConstants::B2B_IFS_PTG_US_FILE_NAME;
        }
        else if($bu == 'CS')
        {
            $businessUnitFileName = B2BTranslationConstants::B2B_CS_US_FILE_NAME;
        }
        else if($bu == 'PTG_EU')
        {
            $businessUnitFileName = B2BTranslationConstants::B2B_PTG_EU_FILE_NAME;
        }
        else if($bu == 'IFS_EMEA')
        {
            $businessUnitFileName = B2BTranslationConstants::B2B_IFS_EU_FILE_NAME;
        }

        $b2bTranslationList = [];
        $common = \Pimcore::getContainer()->get('b2b_translation.common_helper');
        $b2bTranslationConfig = \Pimcore::getContainer()->get('b2b_translation.config_provider_service')->getBusinessUnitTranslationConfig($businessUnitFileName);
        $b2bTranslationList = $common->getParameter($b2bTranslationConfig, $className);

        return $b2bTranslationList;
    }

    public function logMessage(String $msg, LogLevel $logLevel)
    {
        Utils::log(PRODUCT_LOCALIZATION_EXPORT_LOG_FILE, $msg, $logLevel);
    }
}