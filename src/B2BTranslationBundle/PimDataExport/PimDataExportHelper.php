<?php
namespace B2BTranslationBundle\PimDataExport;

use AppBundle\Lib\SFTPConnection;
use Pimcore\Db;
use B2BTranslationBundle\Tool\Utils;
use B2BTranslationBundle\Logger\LogLevel;
use B2BTranslationBundle\B2BTranslationConstants;

class PimDataExportHelper
{
    private $b2bProductTable = [
        'IFS_PTG_US' => 'salesforce_integration_b2b_product_master',
        'CS' => '',
        'PTG_EU' => '', 
        'IFS_EMEA' => ''
    ];

    private $b2bCategoryTable = [
        'IFS_PTG_US' => 'salesforce_integration_b2b_category_master',
        'CS' => '',
        'PTG_EU' => '', 
        'IFS_EMEA' => ''
    ];

    private $bUCategoryClassTableID = [
        'IFS_PTG_US' => array('categoryClassId'=>'2'),
        'CS' => array('categoryClassId'=>'CSHierarchy'),
        'PTG_EU' => array('categoryClassId'=>'39'),
        'IFS_EMEA' => array('categoryClassId'=>'IFSEUProductCategory'),
    ];

    public function uploadFile($customFileName)
    {
        try {
            $localFile    = B2B_TRANSLATION_SFTP_DOWNLOAD_TEMP_DIR.$customFileName;
            if(!file_exists($localFile)) 
            {
                echo "ERROR: Looking for file - ".$customFileName. ". But file not created in folder - '".B2B_TRANSLATION_SFTP_DOWNLOAD_TEMP_DIR."'";
                echo PHP_EOL;
                return null;
            }
            else{
                $SFTPConObj = new SFTPConnection(B2B_TRANSLATION_SFTP_HOST, B2B_TRANSLATION_SFTP_PORT);
                $SFTPConObj->login(B2B_TRANSLATION_SFTP_USERNAME, B2B_TRANSLATION_SFTP_PASSWORD);
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

    public function getAllB2BProduct($bu)
    {
        $db = Db::get();
        $table = $this->b2bProductTable[$bu];

        $ids = [];
        if($table)
        {
            $sql = "SELECT o_id FROM $table";
            $ids = $db->fetchCol($sql);
        }

        return $ids;
    }
    public function getAllB2BCategory($bu)
    {
        $db = Db::get();
        $table = $this->b2bCategoryTable[$bu];

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

    public function getRecordsWithFilteredMasterFields($bu, $fields, $b2bProducts)
    {
        $db = Db::get();
        $config = $this->bUCategoryClassTableID[$bu];
        $categoryClassId = $config['categoryClassId'];

        $columnsString = 'o_id';

        if($fields)
        {
            $columnsString .= ",". implode(',', $fields);
        }
        
        $ids = implode(',', $b2bProducts);
        $sql = "select {$columnsString} from object_{$categoryClassId} where o_id IN ($ids)";
        return $db->fetchAll($sql);
    }

    public function getRecordsWithFilteredFieldsCategory($bu, $validLanguage, $columnsList, $b2bProducts)
    {
        $db = Db::get();
        $config = $this->bUCategoryClassTableID[$bu];
        $categoryClassId = $config['categoryClassId'];

        $languages = "'" . implode ( "', '", $validLanguage ) . "'";
        $selectedFields = [];
        $selectedFields[] = 'ooo_id';
        $selectedFields[] = 'language';
        foreach ($columnsList as $key => $columm) {
            $selectedFields[] = "$columm";
        }

        $columnsString = implode(',', $selectedFields);
        $ids = implode(',', $b2bProducts);
        $sql = "select {$columnsString} from object_localized_data_{$categoryClassId} where ooo_id IN ($ids) AND language IN ($languages)";
        return $db->fetchAll($sql);
    }

    public function logMessage(String $msg, LogLevel $logLevel)
    {
        Utils::log(PRODUCT_LOCALIZATION_EXPORT_LOG_FILE, $msg, $logLevel);
    }
}