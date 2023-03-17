<?php
namespace B2BTranslationBundle\PimDataExport;

use AppBundle\Lib\SFTPConnection;

class PimDataExportHelper
{
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
}