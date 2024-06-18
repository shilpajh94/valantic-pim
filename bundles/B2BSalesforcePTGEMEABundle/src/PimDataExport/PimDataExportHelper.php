<?php
namespace B2BSalesforcePTGEMEABundle\PimDataExport;

use AppBundle\Lib\SFTPConnection;
use Pimcore\Db;
use B2BSalesforcePTGEMEABundle\Tool\Utils;
use B2BSalesforcePTGEMEABundle\Logger\LogLevel;
use B2BSalesforcePTGEMEABundle\PTGEUB2BConstants;

class PimDataExportHelper
{
    private $b2bProductTable = [
        'IFS_PTG_US' => 'salesforce_integration_b2b_product_master',
        'CS' => '',
        'PTG_EU' => 'object_38',
        'IFS_EMEA' => ''
    ];

    private $b2bCategoryTable = [
        'IFS_PTG_US' => 'salesforce_integration_b2b_category_master',
        'CS' => '',
        'PTG_EU' => 'object_39',
        'IFS_EMEA' => ''
    ];

    private $bUCategoryClassTableID = [
        'IFS_PTG_US' => array('categoryClassId'=>'2'),
        'CS' => array('categoryClassId'=>'CSHierarchy'),
        'PTG_EU' => array('categoryClassId'=>'39'),
        'IFS_EMEA' => array('categoryClassId'=>'IFSEUProductCategory'),
    ];

    private $b2bSalesTable = [
        'PTG_EU' => 'object_41',
        'IFS_PTG_US' => 'object_10',
        'CS' => '',
        'IFS_EMEA' => ''
    ];

    public function uploadFile($customFileName)
    {
        $remotefile = PTGEU_B2B_EXPORT_SFTP_INBOUND_FOLDER_PATH.'/'.$customFileName;
        $localfile =  PTGEU_B2B_SFTP_DOWNLOAD_TEMP_DIR.$customFileName;
        try
        {
            $conn = ftp_connect(PTGEU_B2B_SFTP_HOST);
            if(!$conn) {
                echo 'Error: could not connect to ftp server';
                exit;
            }

            $login = ftp_login($conn, PTGEU_B2B_SFTP_USERNAME, PTGEU_B2B_SFTP_PASSWORD);
            $mode = ftp_pasv($conn, TRUE);

            if ((!$conn) || (!$login) || (!$mode)) {
                die("FTP connection has failed !");
            }

            if (ftp_put($conn, $remotefile, $localfile, FTP_ASCII)) {
                echo "Successfully uploaded file - '$remotefile'";
            } else {
                echo "There was a problem while uploading '$remotefile'\n";
                ftp_quit($conn);
                exit;
            }

            ftp_close($conn);

        } catch (\Throwable $th) {
            echo PHP_EOL;
            echo "ERROR: File not uploaded to the server.";
            echo PHP_EOL;
            echo "ERROR: ". $th->getMessage();
            echo PHP_EOL;
        }
    }

    public function getAllB2BProduct($bu)
    {
        $db = Db::get();
        $table = $this->b2bProductTable[$bu];
        $salesTable = $this->b2bSalesTable[$bu];

        $ids = [];
        if($table)
        {
            $sql = "SELECT `id` FROM $table WHERE productType='fert' AND published=1";
            // $sql = "SELECT p.id FROM $table p JOIN $salesTable s ON p.id = SUBSTRING(s.Material,2,(LENGTH(s.Material) - 2))
            //   WHERE p.productType = 'fert' AND p.published = 1 AND s.published = 1 AND s.epixFlag = 1";
            $ids = $db->fetchFirstColumn($sql);
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
            $sql = "SELECT `id` FROM $table WHERE published=1 AND (Level= 3 || Level = 4 || Level = 5)";
            $ids = $db->fetchFirstColumn($sql);
        }

        return $ids;
    }

    public function getAllMediaDataForEachProduct($eachB2BProduct,$mediaAttributes){

        $db = Db::get();
        $columnsString = 'oo_id, articleNumber, ';
        $columnsString = $columnsString.implode(',', $mediaAttributes);
        $ids = implode(',', $eachB2BProduct);
        $sql = "select {$columnsString} from object_38 where oo_id IN ($ids)";
        return ($db->fetchAllAssociative($sql));
    }


    public function getLocalizedAttribute($bu, $className)
    {
        $businessUnitFileName = '';

        if($bu == 'IFS_PTG_US')
        {
            $businessUnitFileName = PTGEUB2BConstants::B2B_IFS_PTG_US_FILE_NAME;
        }
        else if($bu == 'CS')
        {
            $businessUnitFileName = PTGEUB2BConstants::B2B_CS_US_FILE_NAME;
        }
        else if($bu == 'PTG_EU')
        {
            $businessUnitFileName = PTGEUB2BConstants::B2B_PTG_EU_FILE_NAME;
        }
        else if($bu == 'IFS_EMEA')
        {
            $businessUnitFileName = PTGEUB2BConstants::B2B_IFS_EU_FILE_NAME;
        }
        $b2bTranslationList = [];
        $common = \Pimcore::getContainer()->get('b2bsalesforceptgemea.common_helper');
        $b2bTranslationConfig = \Pimcore::getContainer()->get('b2bsalesforceptgemea.config_provider_service')->getBusinessUnitTranslationConfig($businessUnitFileName);
        $b2bTranslationList = $common->getParameter($b2bTranslationConfig, $className);
        return $b2bTranslationList;
    }

    public function getLocalizedAttribute1($bu, $className)
    {
        $businessUnitFileName = '';

        if($bu == 'IFS_PTG_US')
        {
            $businessUnitFileName = PTGEUB2BConstants::B2B_IFS_PTG_US_FILE_NAME;
        }
        else if($bu == 'CS')
        {
            $businessUnitFileName = PTGEUB2BConstants::B2B_CS_US_FILE_NAME;
        }
        else if($bu == 'PTG_EU')
        {
            $businessUnitFileName = PTGEUB2BConstants::B2B_PTG_EU_FILE_NAME1;
        }
        else if($bu == 'IFS_EMEA')
        {
            $businessUnitFileName = PTGEUB2BConstants::B2B_IFS_EU_FILE_NAME;
        }

        $b2bTranslationList = [];
        $common = \Pimcore::getContainer()->get('b2bsalesforceptgemea.common_helper');
        $b2bTranslationConfig = \Pimcore::getContainer()->get('b2bsalesforceptgemea.config_provider_service')->getBusinessUnitTranslationConfig($businessUnitFileName);
        $b2bTranslationList = $common->getParameter($b2bTranslationConfig, $className);

        return $b2bTranslationList;
    }

    public function getRecordsWithFilteredMasterFields($bu, $fields, $b2bProducts)
    {
        $db = Db::get();
        $config = $this->bUCategoryClassTableID[$bu];
        $categoryClassId = $config['categoryClassId'];

        $columnsString = 'id';

        if($fields)
        {
            $columnsString .= ",". implode(',', $fields);
        }

        $ids = implode(',', $b2bProducts);
        $sql = "select {$columnsString} from object_{$categoryClassId} where `id` IN ($ids)";
        return $db->fetchAllAssociative($sql);
    }

    public function getRecordsWithFilteredFieldsCategory($bu, $validLanguage, $columnsList, $b2bProducts)
    {
        $db = Db::get();
        $config = $this->bUCategoryClassTableID[$bu];
        $categoryClassId = $config['categoryClassId'];

       // $languages = "'" . implode ( "', '", $validLanguage ) . "'";
        $selectedFields = [];
        $selectedFields[] = 'ooo_id';
        $selectedFields[] = 'language';
        foreach ($columnsList as $key => $columm) {
            $selectedFields[] = "$columm";
        }

        $columnsString = implode(',', $selectedFields);
        $ids = implode(',', $b2bProducts);
        $sql = "select {$columnsString} from object_localized_data_{$categoryClassId} where ooo_id IN ($ids) AND language = 'en'";
        return $db->fetchAllAssociative($sql);
    }

    public function logMessage(String $msg, LogLevel $logLevel)
    {
        Utils::log(PTGEMEA_EXPORT_LOG_FILE, $msg, $logLevel);
    }
}
