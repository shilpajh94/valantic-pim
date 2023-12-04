<?php
namespace B2BTranslationBundle\PimDataImport;

use AppBundle\Lib\SFTPConnection;
use Pimcore\Model\DataObject\ClassDefinition;

class PimDataImportHelper
{
    public function downloadFile($customFileName)
    {
        $remotefile = B2B_TRANSLATION_SFTP_OUTBOUND_FOLDER_PATH.'/'.$customFileName;
        $localfile = B2B_TRANSLATION_SFTP_DOWNLOAD_TEMP_DIR.$customFileName;
        try 
        {
            $conn = ftp_connect(B2B_TRANSLATION_SFTP_HOST);
            if(!$conn) {
                echo 'Error: could not connect to ftp server';
                exit;
            }

            $login = ftp_login($conn, B2B_TRANSLATION_SFTP_USERNAME, B2B_TRANSLATION_SFTP_PASSWORD);
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
            echo "ERROR: File '".B2B_TRANSLATION_SFTP_OUTBOUND_FOLDER_PATH."/".$customFileName."' not downloaded from the server.";
            echo PHP_EOL;
            echo "ERROR: ". $th->getMessage();
            echo PHP_EOL;
        }
        // try {
        //     $SFTPConObj = new SFTPConnection(B2B_TRANSLATION_SFTP_HOST, B2B_TRANSLATION_SFTP_PORT);
        //     $SFTPConObj->login(B2B_TRANSLATION_SFTP_USERNAME, B2B_TRANSLATION_SFTP_PASSWORD);
            
        //     if(!$SFTPConObj->fileExists(B2B_TRANSLATION_SFTP_OUTBOUND_FOLDER_PATH."/".$customFileName)) 
        //     {
        //         echo "ERROR: Looking for file - ".$customFileName. ". But file not found in given server folder - '".B2B_TRANSLATION_SFTP_OUTBOUND_FOLDER_PATH."'";
        //         return null;
        //     }
        //     else{
        //         $tmpFilePath    = B2B_TRANSLATION_SFTP_DOWNLOAD_TEMP_DIR.$customFileName;
        //         $SFTPConObj->downloadFile($tmpFilePath, B2B_TRANSLATION_SFTP_OUTBOUND_FOLDER_PATH."/".$customFileName);
        //         return $tmpFilePath;
        //     }
        // } catch (\Throwable $th) {
        //     echo PHP_EOL;
        //     echo "ERROR: File '".B2B_TRANSLATION_SFTP_OUTBOUND_FOLDER_PATH."/".$customFileName."' not downloaded from the server.";
        //     echo PHP_EOL;
        //     echo "ERROR: ". $th->getMessage();
        //     echo PHP_EOL;
        // }
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
}