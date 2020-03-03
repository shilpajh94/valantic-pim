<?php

namespace ImportBundle\Services;

use Exception;
use Throwable;
use Elements\Bundle\ProcessManagerBundle;
use ImportBundle\Controller\LogController as Logger;

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
        $this->datetime = date('Ymd his');
        $this->common = \Pimcore::getContainer()->get('app.common_helper');
        $this->monitoringItem = ProcessManagerBundle\ElementsProcessManagerBundle::getMonitoringItem();
    }
    public function execDataFeeder($commands = array())
    {
        $cmd = array_shift($commands); // Getting the command name      
        $this->setLogFileName($cmd);
        $this->getCommandConfig($cmd);
        $this->updateDefaults($commands); // Update extra parameter value

        $this->execute();
    }

    public function execute()
    {
        try {
            if ($this->validateAllowedFileType()) {

                /* Get actual file path from PIM */
                $obj = \Pimcore\Model\Asset::getByPath($this->filePath);
                if(is_null($obj))
                {
                    $message = 'No files to proceed. Please check the directory. '.$this->filePath;
                    if($this->monitoringItem->id){
                        $this->monitoringItem->setMessage($message)->setCompleted();
                    }
                    echo $message;
                    die;
                }
                
                $this->sysFilePath = $obj->getFileSystemPath();
                $feederObj = $this->common->getInstance($this->feederService);
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
                // p_r($params);die;
                $feederObj->config($params);
            }
        } catch (Throwable $th) {
            Logger::error($this->logFileName, $th);
            $message = $th->getMessage().' Only '.implode(' and ', $this->fileType). 'are allowed.';
            if($this->monitoringItem->id){
                $this->monitoringItem->setMessage($message)->setCompleted();
            }
            echo $message;
            die; 
           
        }
    }
    /* This function will check, does command exist or not, if it exist then it load the configuration command and update
    the properties of the current class */
    public function getCommandConfig($cmd)
    {
        $this->common->loadConfig();
        $commands = $this->common->getParameter($cmd);
        try {
            if (!empty($commands) && $commands['name']==$cmd) {
                /* Updating properties of the current class */
                foreach ($commands as $k => $v) {
                    $this->$k = $v;
                }
            } else {
                throw new Exception("Invalid command: '$cmd' command not found");
            }
        } catch (Throwable $th) {
            Logger::error($this->logFileName, $th);
            // echo $t->getMessage();
            die;
        }
    }

    public function validateAllowedFileType()
    {
        $ext = strtolower(end(explode('.', $this->filePath)));
        try {
            if (in_array($ext, $this->fileType)) {
                return true;
            } else {
                throw new Exception('This command does not support the given file format.');
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
        $this->setLogFileName();
    }

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