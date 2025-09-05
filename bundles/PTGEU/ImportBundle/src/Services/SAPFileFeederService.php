<?php

namespace PTGEU\ImportBundle\Services;

use Exception;
use Throwable;
use AppBundle\Lib\SFTPConnection;
use AppBundle\Services\ImportProcessEmailNotificationService;
use TypeError;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SAPFileFeederService
{
    /*
        Parameter commands is array type of parameter,
        It might contain multiple element, but at very first index, it will be a command
        which will load the object and return it back to its receiver
    */
    private $common;
    public $fileType = 'csv';
    public $filePath;
    private $datetime;
    private $container;
    private $importProcessEmailNotificationObj;
    const BU_TYPE = "PTGEU ";

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->datetime = date('Ymdhis');
        $this->common = $this->container->get('import.common_helper');
        $this->importProcessEmailNotificationObj = new ImportProcessEmailNotificationService;
    }

    /**
     * set log file name
     * load the command configuration
     * update the predefined properties with received value in params
     * param type: array
     */
    public function execFileFeeder($commandType)
    {
        try {
            $sftpConObj = new SFTPConnection(BW_SAP_IMPORT_SFTP_HOST, BW_SAP_IMPORT_SFTP_PORT);
            $sftpConObj->login(BW_SAP_IMPORT_SFTP_USERNAME, BW_SAP_IMPORT_SFTP_PASSWORD);

            $filePathInfo = explode('/', constant('BW_SAP_IMPORT_SFTP_' . strtoupper($commandType) . '_FILE_PATH_PTGEU'));
            $fileName = array_pop($filePathInfo);
            $ftpFilePath = implode("/", $filePathInfo);
            $fileNameArray = explode(".", $fileName);
            $fileNamePrefix = $fileNameArray[0];
            $ext = $fileNameArray[1];
            $fileName = $fileNamePrefix . "_" . date("mdY") . "." . $ext;

            if (!$sftpConObj->fileExists($ftpFilePath . "/" . $fileName)) {
                $fileName = $fileNamePrefix . "_" . date('mdY', strtotime("-1 days")) . "." . $ext;
                if (!$sftpConObj->fileExists($ftpFilePath . "/" . $fileName)) {
                    $msg = self::BU_TYPE.ucFirst($commandType)." - Today's and yesterday's import file not uploaded.";
                    $this->importProcessEmailNotificationObj->sendMailNotification(self::BU_TYPE.ucFirst($commandType), $msg);
                    throw new Exception($msg);
                }
            }

            $tmpFilePath = BW_SAP_IMPORT_SFTP_DOWNLOAD_TEMP_DIR . $fileName;

            $sftpConObj->downloadFile($tmpFilePath, $ftpFilePath . "/" . $fileName);

            $this->filePath = $tmpFilePath;
            $sftpConObj->moveFile($ftpFilePath . "/" . $fileName, BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH . $fileName);

            $this->filePath = $tmpFilePath;

            if ($this->validateAllowedFileType()) {
                return realpath($this->filePath);
            } else {
                $msg = self::BU_TYPE.ucFirst($commandType)." - ".FILE_FORMAT_DOESNOT_SUPPORT." ".sprintf(ALLOWED_FILE_TYPES, $this->fileType);
                $this->importProcessEmailNotificationObj->sendMailNotification(self::BU_TYPE.ucFirst($commandType), $msg);
                throw new TypeError($msg);
            }
        } catch (Throwable $th) {
            echo $th->getMessage();
        }
    }

    /**
     * Validate the mentioned allowed type in configuration file (AppBundle\Resources\config\commands.yaml)
     */
    public function validateAllowedFileType()
    {
        $ext = $this->common->getExt($this->filePath);
        try {
            if ($ext == $this->fileType) {
                return true;
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
