<?php

namespace ImportBundle\Services;

use Exception;
use Throwable;
use Elements\Bundle\ProcessManagerBundle;
use AppBundle\Logger\AppLogger as Logger;

class Lookup
{
    /* 
        Parameter commands is array type of parameter,
        It might contain multiple element, but at very first index, it will be a command
        which will load the object and return it back to its receiver        
    */
    public $name;
    public $fileType;
    public $description;
    public $feederService;
    public $validatorService;
    public $mappedService;
    public $listingService;
    public $filePath;
    private $datetime;
    public $logFileName;
    public $archiveDir;
    public $failedDir;
    public $sysFilePath;
    private $common;
    private $monitoringItem;

    public function __construct()
    {
        $this->datetime = date('Ymdhis');
        $this->common = \Pimcore::getContainer()->get('app.common_helper');
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
        $cmd = array_shift($commands); // Getting the command name      
        $this->setLogFileName($cmd);
        $this->getCommandConfig($cmd);
        $this->updateDefaults($commands); // Update extra parameter value

        $this->execute();
    }

    /**
     * Validate allowed file types
     * Lookup for the fill at specified location
     * Send further to responsible class to process the import
    */
    public function execute()
    {
//        $this->filePath = $this->filePath."_".date('mdY').".csv";
        
        try {
            if ($this->validateAllowedFileType()) {
                /* Get actual file path from PIM */
                
                $obj = \Pimcore\Model\Asset::getByPath($this->filePath);
                if(is_null($obj))
                {
                    $filePathInfo = explode('/',$this->filePath);
                    $fileName = array_pop($filePathInfo);
                    $filePath = implode('/',$filePathInfo);

                    echo $message = sprintf(IMPORT_FILE_NOT_FOUND, $filePath,$fileName);
                    if($this->monitoringItem->id){
                        throw new Exception($message);
                    }
                    die;
                }
                
                $this->sysFilePath = $obj->getFileSystemPath();
                $feederObj = \Pimcore::getContainer()->get($this->feederService);
                
                $params = array(
                    'approvedSalesOrg'  =>  $this->approvedSalesOrg,
                    'filePath'          =>  $this->sysFilePath,
                    'inboxFilePath'     =>  $this->filePath,
                    'archiveDir'        =>  $this->archiveDir,
                    'failedDir'         =>  $this->failedDir,
                    'validatorService'  =>  $this->validatorService,
                    'mappedService'     =>  $this->mappedService,
                    'listingService'    =>  $this->listingService,
                    'logFileName'       =>  $this->logFileName,
                    'name'              =>  $this->name
                );
                $feederObj->config($params);
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
    /* This function will check, does command exist or not, if it exist then it load the configuration command and update
    the properties of the current class */
    public function getCommandConfig($cmd)
    {
        /* $this->common->loadConfig();
        $commands = $this->common->getParameter($cmd); */
        $commands = \Pimcore::getContainer()->get('app.config_provider_service')->getCommandConfig();
        $commands = $this->common->getParameter($commands, $cmd);
        try {
            if (!empty($commands) && $commands['name']==$cmd) {
                /* Updating properties of the current class */
                foreach ($commands as $k => $v) {
                    $this->$k = $v;
                }
            } else {
                throw new Exception(sprintf(INVALID_COMMAND, $cmd));
            }
        } catch (Throwable $th) {
            Logger::error($this->logFileName, $th);
            // echo $t->getMessage();
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

    /* This function will override the default configuration */
    private function updateDefaults($commands)
    {
        if (!empty($commands)) {
            foreach ($commands as $k => $v) {
                if (!empty($v)) {
                    if (property_exists($this, $k)) {
                        $this->$k = $v;
                    }
                }
            }
        }
        // $this->setLogFileName();
    }

    /**
     * Setting log file name
    */
    private function setLogFileName($logFileName = "")
    {
        /* $className = explode("\\", $this->mappedService);
        $className = end($className);
        if (!empty($className)) {
            $this->logFileName = $className . $this->datetime;
        } else {
            $this->logFileName = $logFileName . $this->datetime;
        } */
        $this->logFileName = $logFileName . $this->datetime;
    }
}