<?php
namespace B2BSalesforcePTGEMEABundle\PimDataImport;

use AppBundle\Lib\SFTPConnection;
use Pimcore\Db;
use Pimcore\Model\DataObject\ClassDefinition;

class PimDataImportHelper
{
    private $b2bProductTable = [
        'IFS_PTG_US' => 'salesforce_integration_b2b_product_master',
        'CS' => '',
        'PTG_EU' => 'object_38', 
        'IFS_EMEA' => ''
    ];

    public function downloadFile($customFileName)
    {
        $remotefile = PTGEU_B2B_EXPORT_SFTP_OUTBOUND_FOLDER_PATH.'/'.$customFileName;
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

            if(ftp_get($conn, $localfile, $remotefile, FTP_BINARY)){
                echo PHP_EOL;
                echo "File - '{$remotefile}' downloaded from server.";
                echo PHP_EOL;
            }
            else{
                echo PHP_EOL;
                echo 'Could not download file';
                ftp_quit($conn);
                exit;
            }

            ftp_close($conn);
            return $localfile;

        } catch (\Throwable $th) {
            echo PHP_EOL;
            echo "ERROR: File '".PTGEU_B2B_EXPORT_SFTP_OUTBOUND_FOLDER_PATH."/".$customFileName."' not downloaded from the server.";
            echo PHP_EOL;
            echo "ERROR: ". $th->getMessage();
            echo PHP_EOL;
        }
    }

    public function checkFieldValidation($classID)
    {
        $classDef = ClassDefinition::getById($classID);
        $className = $classDef->getName();
        $externalID = $classDef->getFieldDefinition('externalID');
        $SalesForce_ID = $classDef->getFieldDefinition('SalesForce_ID');

        $errMsg = '';
        $validFields = true;
        if(!($externalID && $SalesForce_ID))
        {
            $validFields = false;
            $errMsg = "ERROR: `externalID` and `SalesForce_ID` field not found in class - ".$className;
        }
        else if(!$externalID)
        {
            $validFields = false;
            $errMsg = "ERROR: `externalID` field not found in class - ".$className;
        }
        else if(!$SalesForce_ID)
        {
            $validFields = false;
            $errMsg = "ERROR: `SalesForce_ID` field not found in class - ".$className;
        }

        echo PHP_EOL;
        echo $errMsg;
        echo PHP_EOL;

        return $validFields;
    }

    public function downloadExtSfidFile($customFileName) {

        $remotefile = $customFileName;
        $localfile = $customFileName;

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

            if(ftp_get($conn, $localfile, $remotefile, FTP_BINARY)){
                echo PHP_EOL;
                echo "File - '{$remotefile}' downloaded from server.";
                echo PHP_EOL;
            }
            else{
                echo PHP_EOL;
                echo 'Could not download file';
                ftp_quit($conn);
                exit;
            }

            ftp_close($conn);
            return $localfile;
        } catch (\Throwable $th) {
            echo PHP_EOL;
            echo "ERROR: File '".$customFileName."' not downloaded from the server.";
            echo PHP_EOL;
            echo "ERROR: ". $th->getMessage();
            echo PHP_EOL;
        }

        return $localfile;
    }

    public function checkFieldExtSfidValidation($classID)
    {
        $classDef = ClassDefinition::getById($classID);
        $className = $classDef->getName();
        $externalID = $classDef->getFieldDefinition('externalId');
        $SalesForce_ID = $classDef->getFieldDefinition('sfIdForDeletion');

        $errMsg = '';
        $validFields = true;
        if(!($externalID && $SalesForce_ID))
        {
            $validFields = false;
            $errMsg = "ERROR: `externalID` and `SalesForce_ID` field not found in class - ".$className;
        }
        else if(!$externalID)
        {
            $validFields = false;
            $errMsg = "ERROR: `externalID` field not found in class - ".$className;
        }
        else if(!$SalesForce_ID)
        {
            $validFields = false;
            $errMsg = "ERROR: `SalesForce_ID` field not found in class - ".$className;
        }

        echo PHP_EOL;
        echo $errMsg;
        echo PHP_EOL;

        return $validFields;
    }

    public function getProductByExternalId($classID, $bu, $extid) {

        $db = Db::get();
        
        $table = "object_store_".$classID;
        
        $product = [];
        if($table) {
            $sql = "SELECT * FROM $table WHERE externalId = '".$extid."'";
            $product = $db->fetchAssociative($sql);
        }

        return $product;
    }

    public function setSfIdByExternalId($classID, $bu, $extid, $sfid) {

        $db = Db::get();
        
        $table1 = "object_store_".$classID;
        $table2 = $this->b2bProductTable[$bu];
        $table3 = "object_query_".$classID;
    
        $resp = [];
        if($table1) {
            $updSql1 = "UPDATE $table1 SET sfIdForDeletion = '".$sfid."' WHERE externalId = '".$extid."'";
            $updSql2 = "UPDATE $table2 SET sfIdForDeletion = '".$sfid."' WHERE externalId = '".$extid."'";
            $updSql3 = "UPDATE $table3 SET sfIdForDeletion = '".$sfid."' WHERE externalId = '".$extid."'";

            $resp['0'] = $db->executeStatement($updSql1);
            $resp['1'] = $db->executeStatement($updSql2);
            $resp['2'] = $db->executeStatement($updSql3);
        }

        return $resp;
    }
}