<?php

namespace B2BTranslationBundle\Services;

use Exception;
use Throwable;
use AppBundle\Lib\SFTPConnection;
use TypeError;
use Symfony\Component\DependencyInjection\ContainerInterface;

class FileFeederService
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
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->datetime = date('Ymdhis');
        $this->common = $this->container->get('import.common_helper');
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
            // $SFTPConObj = new SFTPConnection(B2B_TRANSLATION_SFTP_HOST, B2B_TRANSLATION_SFTP_PORT);
            // $SFTPConObj->login(B2B_TRANSLATION_SFTP_USERNAME, B2B_TRANSLATION_SFTP_PASSWORD);

            // $filePathInfo   = explode('/',constant('BW_SAP_IMPORT_SFTP_'.
            // strtoupper($commandType).'_FILE_PATH_PTGEU'));
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

            // $tmpFilePath    = B2B_TRANSLATION_SFTP_DOWNLOAD_TEMP_DIR.$fileName;

            // $SFTPConObj->downloadFile($tmpFilePath, $ftpFilePath."/".$fileName);

            // $this->filePath = $tmpFilePath;
            // $SFTPConObj->moveFile($ftpFilePath."/".$fileName, B2B_TRANSLATION_SFTP_ARCHIVE_FOLDER_PATH.$fileName);
            
            $this->filePath = '/var/www/html/cttfse01/var/tmp/salesforceid-externalid.csv';

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
     * Validate the mentioned allowed type in configuration file (AppBundle\Resources\config\commands.yaml)
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
