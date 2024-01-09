<?php

namespace ContitechCS\ImportBundle\Services;

use Exception;
use Throwable;
use Elements\Bundle\ProcessManagerBundle;
use AppBundle\Logger\AppLogger as Logger;
use AppBundle\Lib\SFTPConnection;
use Symfony\Component\DependencyInjection\ContainerInterface;


class Lookup
{
    /* 
        Parameter commands is array type of parameter,
        It might contain multiple element, but at very first index, it will be a command
        which will load the object and return it back to its receiver        
    */
    public $name;
    public $fileType = ['csv', 'xlsx'];
    public $feederService;
    public $validatorService;
    public $mappedService;
    public $listingService;
    public $filePath;
    private $datetime;
    public $logFileName;
    public $sysFilePath;
    private $common;
    private $monitoringItem;
    private $container;

    public function __construct(ContainerInterface $container)
    {
        
        $this->container = $container;
        $this->datetime = date('Ymdhis');
        $this->common = $this->container->get('app.common_helper');
        $this->monitoringItem = ProcessManagerBundle\ElementsProcessManagerBundle::getMonitoringItem();
    }

    /**
     * set log file name
     * load the command configuration
     * update the predefined properties with received value in params
     * param type: array
     */
    public function execDataFeeder($commands = array())
    {
        try{
            echo "here";
            // $SFTPConObj = new SFTPConnection(CS_BW_SAP_IMPORT_SFTP_HOST, CS_BW_SAP_IMPORT_SFTP_PORT);
            // $SFTPConObj->login(CS_BW_SAP_IMPORT_SFTP_USERNAME, CS_BW_SAP_IMPORT_SFTP_PASSWORD);

            $cmd = array_shift($commands); // Getting the command name  

            // $filePathInfo = explode('/',constant('CS_BW_SAP_IMPORT_SFTP_'. strtoupper($cmd).'_FILE_PATH'));

            // $fileName = array_pop($filePathInfo);
            
            // $ftpFilePath = implode("/", $filePathInfo);
            // $fileNameArray = explode(".", $fileName);
            // $fileNamePrefix = $fileNameArray[0];
            // $ext = $fileNameArray[1];
            // $fileName = $fileNamePrefix."_".date("mdY").".".$ext;
            // if (!$SFTPConObj->fileExists($ftpFilePath."/".$fileName)) {
            //     $fileName = $fileNamePrefix."_".date('mdY',strtotime("-1 days")).".".$ext;
            //     if (!$SFTPConObj->fileExists($ftpFilePath."/".$fileName)) {
            //         echo "Today's file not uploaded.";
            //         return null;
            //     }
            // }

            // $tmpFilePath = CS_BW_SAP_IMPORT_SFTP_DOWNLOAD_TEMP_DIR.$fileName;
            // $SFTPConObj->downloadFile($tmpFilePath, $ftpFilePath."/".$fileName);

            // $this->filePath = $tmpFilePath;

            // $this->filePath = CS_BW_SAP_IMPORT_SFTP_DOWNLOAD_TEMP_DIR.'PIM_Structure_Hierarchy_demo.csv';

            // $SFTPConObj->moveFile($ftpFilePath."/".$fileName, CS_BW_SAP_IMPORT_SFTP_ARCHIVE_FOLDER_PATH.$fileName);
            
            $this->setLogFileName($cmd);
            echo "rrrr";
            $this->execute($cmd);
            echo "dfgdg";

        } catch (Throwable $th) {
            echo $message = $th->getMessage();
            if($this->monitoringItem->id){
                $this->monitoringItem->setMessage($message)->save();
                $this->monitoringItem->setStatus($this->monitoringItem::STATUS_FAILED)->save();
            }
            Logger::error($this->logFileName, $th);
            die; 
        
        }

    }

    /**
     * Validate allowed file types
     * Lookup for the fill at specified location
     * Send further to responsible class to process the import
    */
    public function execute($cmd)
    {
//        $this->filePath = $this->filePath."_".date('mdY').".csv";
        
        try {
            if ($this->validateAllowedFileType()) {
                /* Get actual file path from PIM */
                
                $this->sysFilePath = realpath($this->filePath);
                
                // $feederService = $mappedService = $validatorService = $listingService = '';
                // 
                // if($cmd == 'product')
                // {
                //     $feederService = 'import.product_sql_service';
                //     $mappedService = 'pim.product_service';
                //     $validatorService = 'import.product_validator_service';
                //     $listingService = 'pim.product_listing_service';
                // }
                //
                
                // $feederObj = $this->container->get($feederService);
                // $params = array(
                //     'approvedSalesOrg'  =>  $this->approvedSalesOrg,
                //     'filePath'          =>  $this->sysFilePath,
                //     'validatorService'  =>  $validatorService,
                //     'mappedService'     =>  $mappedService,
                //     'listingService'    =>  $listingService,
                //     'logFileName'       =>  $this->logFileName,
                //     'name'              =>  $this->name
                // );
                // $feederObj->config($params);
            } else {
                throw new Exception(sprintf(ALLOWED_FILE_TYPES, implode(' and ', $this->fileType)));
            }
        } catch (Throwable $th) {
            $message = $th->getMessage();
            if($this->monitoringItem->id){
                $this->monitoringItem->setMessage($message)->save();
                $this->monitoringItem->setStatus($this->monitoringItem::STATUS_FAILED)->save();
            }
            Logger::error($this->logFileName, $th);
            die; 
           
        }
    }

    /**
     * Validate the mentioned allowed type in configuration file (AppBundle\Resources\config\commands.yml)
    */
    public function validateAllowedFileType()
    {
        $ext = $this->common->getExt($this->filePath);
        try {
            if (in_array($ext, $this->fileType)) {
                return true;
            } else {
                throw new Exception(FILE_FORMAT_DOESNOT_SUPPORT);
            }
        } catch (\Throwable $th) {
            throw $th;
            die;
        }
    }

    /**
     * Setting log file name
    */
    private function setLogFileName($logFileName = "")
    {
        $this->logFileName = $logFileName . $this->datetime;
    }
}