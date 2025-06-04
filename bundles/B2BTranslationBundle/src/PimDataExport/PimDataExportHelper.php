<?php
namespace B2BTranslationBundle\PimDataExport;

use AppBundle\Lib\SFTPConnection;
use Pimcore\Db;
use B2BTranslationBundle\Tool\Utils;
use B2BTranslationBundle\Logger\LogLevel;
use B2BTranslationBundle\B2BTranslationConstants;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PimDataExportHelper
{
    private $container;

    private $b2bProductTable = [
        'IFS_PTG_US' => 'salesforce_integration_b2b_product_master',
        'CS' => '',
        'PTG_EU' => 'object_38',
        'IFS_EMEA' => ''
    ];

    private $b2bProductSelectColumn = [
        'IFS_PTG_US' => 'o_id',
        'CS' => '',
        'PTG_EU' => 'oo_id',
        'IFS_EMEA' => ''
    ];

    private $b2bCategoryTable = [
        'IFS_PTG_US' => 'salesforce_integration_b2b_category_master',
        'CS' => '',
        'PTG_EU' => 'object_39',
        'IFS_EMEA' => ''
    ];

    private $b2bCategorySelectColumn = [
        'IFS_PTG_US' => 'o_id',
        'CS' => '',
        'PTG_EU' => 'oo_id',
        'IFS_EMEA' => ''
    ];

    private $bUCategoryClassTableID = [
        'IFS_PTG_US' => array('categoryClassId' => '2'),
        'CS' => array('categoryClassId' => 'CSHierarchy'),
        'PTG_EU' => array('categoryClassId' => '39'),
        'IFS_EMEA' => array('categoryClassId' => 'IFSEUProductCategory'),
    ];

    private $b2bSalesTable = [
        'PTG_EU' => 'object_41',
        'IFS_PTG_US' => 'object_10',
        'CS' => '',
        'IFS_EMEA' => ''
    ];

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function uploadFile($customFileName)
    {
        $remotefile = B2B_TRANSLATION_SFTP_INBOUND_FOLDER_PATH . '/' . $customFileName;
        $localfile = B2B_TRANSLATION_SFTP_DOWNLOAD_TEMP_DIR . $customFileName;
        try {
            $conn = ftp_connect(B2B_TRANSLATION_SFTP_HOST);
            if (!$conn) {
                echo 'Error: could not connect to ftp server';
                exit;
            }

            $login = ftp_login($conn, B2B_TRANSLATION_SFTP_USERNAME, B2B_TRANSLATION_SFTP_PASSWORD);
            $mode = ftp_pasv($conn, true);

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
            echo "ERROR: " . $th->getMessage();
            echo PHP_EOL;
        }
    }

    public function getB2BTranslationMapping($type, $bu)
    {
        $db = Db::get();
        $sqlMapping = "select PIMB2BMappingData from object_B2BTranslationMapping Where TranslationDataType ='{$type}'
         AND BusinessUnit='{$bu}' ORDER BY modificationDate DESC";
        return $db->fetchOne($sqlMapping);
    }

    public function getAllB2BProduct($bu)
    {
        $db = Db::get();
        $table = $this->b2bProductTable[$bu];
        $column = $this->b2bProductSelectColumn[$bu];
        $salesTable = $this->b2bSalesTable[$bu];

        $ids = [];
        if ($table) {
            $sql = "SELECT DISTINCT p.$column FROM $table p JOIN $salesTable s ON p.$column = SUBSTRING(s.Material,2,(LENGTH(s.Material) - 2))
            WHERE p.o_published = 1 AND s.published = 1 AND s.epixFlag = 1";
            $ids = $db->fetchFirstColumn($sql);
        }

        return $ids;
    }
    public function getAllB2BCategory($bu)
    {
        $db = Db::get();
        $table = $this->b2bCategoryTable[$bu];
        $column = $this->b2bCategorySelectColumn[$bu];

        $ids = [];
        if ($table) {
            $sql = "SELECT $column FROM $table";
            $ids = $db->fetchFirstColumn($sql);
        }

        return $ids;
    }

    public function getLocalizedAttribute($bu, $className)
    {
        $businessUnitFileName = '';

        if ($bu == 'IFS_PTG_US') {
            $businessUnitFileName = B2BTranslationConstants::B2B_IFS_PTG_US_FILE_NAME;
        } elseif ($bu == 'CS') {
            $businessUnitFileName = B2BTranslationConstants::B2B_CS_US_FILE_NAME;
        } elseif ($bu == 'PTG_EU') {
            $businessUnitFileName = B2BTranslationConstants::B2B_PTG_EU_FILE_NAME;
        } elseif ($bu == 'IFS_EMEA') {
            $businessUnitFileName = B2BTranslationConstants::B2B_IFS_EU_FILE_NAME;
        }

        $common = $this->container->get('b2b_translation.common_helper');
        $b2bTranslationConfig = $this->container->get('b2b_translation.config_provider_service')
            ->getBusinessUnitTranslationConfig($businessUnitFileName);

        return $common->getParameter($b2bTranslationConfig, $className);
    }

    public function getRecordsWithFilteredMasterFields($bu, $fields, $b2bProducts)
    {
        $db = Db::get();
        $config = $this->bUCategoryClassTableID[$bu];
        $categoryClassId = $config['categoryClassId'];

        $columnsString = 'id';

        if ($fields) {
            $columnsString .= "," . implode(',', $fields);
        }

        $ids = implode(',', $b2bProducts);
        $sql = "select {$columnsString} from object_{$categoryClassId} where id IN ($ids)";
        return $db->fetchAllAssociative($sql);
    }

    public function getRecordsWithFilteredFieldsCategory($bu, $validLanguage, $columnsList, $b2bProducts)
    {
        $db = Db::get();
        $config = $this->bUCategoryClassTableID[$bu];
        $categoryClassId = $config['categoryClassId'];

        $languages = "'" . implode("', '", $validLanguage) . "'";
        $selectedFields = [];
        $selectedFields[] = 'ooo_id';
        $selectedFields[] = 'language';
        foreach ($columnsList as $columm) {
            $selectedFields[] = "$columm";
        }

        $columnsString = implode(',', $selectedFields);
        $ids = implode(',', $b2bProducts);
        $sql = "select {$columnsString} from object_localized_data_{$categoryClassId}
         where ooo_id IN ($ids) AND language IN ($languages)";
        return $db->fetchAllAssociative($sql);
    }

    public function logMessage(string $msg, LogLevel $logLevel)
    {
        Utils::log(PRODUCT_LOCALIZATION_EXPORT_LOG_FILE, $msg, $logLevel);
    }
}
