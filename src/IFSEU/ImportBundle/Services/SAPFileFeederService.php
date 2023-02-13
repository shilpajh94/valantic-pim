<?php

namespace IFSEU\ImportBundle\Services;

use Exception;
use Throwable;
use AppBundle\Lib\SFTPConnection;
use TypeError;

class SAPFileFeederService
{
    /* 
        Parameter commands is array type of parameter,
        It might contain multiple element, but at very first index, it will be a command
        which will load the object and return it back to its receiver        
    */
    private $common;
    public $fileType = ['csv', 'xlsx'];
    public $filePath;
    private $datetime;

    public function __construct()
    {
        $this->datetime = date('Ymdhis');
        $this->common = \Pimcore::getContainer()->get('import.common_helper');
    }

    /**
     * set log file name
     * load the command configuration
     * update the predefined properties with received value in params
     * param type: array
     */
    public function execFileFeeder($commandType)
    {
        try
        {
            // $SFTPConObj = new SFTPConnection(BW_SAP_IMPORT_SFTP_HOST, BW_SAP_IMPORT_SFTP_PORT);
            // $SFTPConObj->login(BW_SAP_IMPORT_SFTP_USERNAME, BW_SAP_IMPORT_SFTP_PASSWORD);

            // $filePathInfo   = explode('/',constant('BW_SAP_IMPORT_SFTP_'. strtoupper($commandType).'_FILE_PATH_PTGEU'));
            // $fileName       = array_pop($filePathInfo);
            // $ftpFilePath    = implode("/", $filePathInfo);
            // $fileNameArray  = explode(".", $fileName);
            // $fileNamePrefix = $fileNameArray[0];
            // $ext            = $fileNameArray[1];
            // $fileName       = $fileNamePrefix."_".date("mdY").".".$ext;

            // if(!$SFTPConObj->fileExists($ftpFilePath."/".$fileName)) 
            // {
            //     $fileName = $fileNamePrefix."_".date('mdY',strtotime("-1 days")).".".$ext;
                
            //     if (!$SFTPConObj->fileExists($ftpFilePath."/".$fileName)) 
            //     {
            //         echo "Today's file not uploaded.";
            //         return null;
            //     }
            // }

            // $tmpFilePath    = BW_SAP_IMPORT_SFTP_DOWNLOAD_TEMP_DIR.$fileName;

            // $SFTPConObj->downloadFile($tmpFilePath, $ftpFilePath."/".$fileName);

            // $this->filePath = $tmpFilePath;
            // $SFTPConObj->moveFile($ftpFilePath."/".$fileName, BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH.$fileName);
            
            $this->filePath = '/var/www/html/contiTech_CBS/var/tmp/PIM_P23_MaterialSales_01252023_copy.csv';

            if($this->validateAllowedFileType()) 
            {
                return realpath($this->filePath);
            } 
            else 
            {
                throw new TypeError(sprintf(ALLOWED_FILE_TYPES, implode(' and ', $this->fileType)));
            }
        } 
        catch (Throwable $th) 
        {
            echo $th->getMessage();
        }
    }

    /**
     * Validate the mentioned allowed type in configuration file (AppBundle\Resources\config\commands.yml)
    */
    public function validateAllowedFileType()
    {
        $ext = $this->common->getExt($this->filePath);
        try 
        {
            if (in_array($ext, $this->fileType)) 
            {
                return true;
            } 
            else 
            {
                throw new Exception(FILE_FORMAT_DOESNOT_SUPPORT);
            }
        } 
        catch (\Throwable $th) 
        {
            echo $th->getMessage();
        }
    }
}