<?php

namespace ImportBundle\Services;

use Exception;
use Throwable;
use ImportBundle\Controller\LogController as Logger;

class Lookup
{
    /* 
        Parameter commands is array type of parameter,
        It might contain multiple element, but at very first index, it will be a command
        which will load the object and return it back to its receiver        
    */
    public $name;
    public $title;
    public $type;
    public $fileType;
    public $description;
    public $paramRequired;
    public $params;
    public $feederClass;
    public $validatorClass;
    public $mappedClass;
    public $defaultSheet;
    public $filePath;
    private $datetime;
    public $logFileName;
    public $archiveDir;
    public $failedDir;
    public $sysFilePath;
    public function __construct()
    {
        $this->datetime = date('Ymd his');
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
                $this->sysFilePath = $obj->getFileSystemPath();
                $feederObj = new $this->feederClass;
                $params = array(
                    'filePath'          =>  $this->sysFilePath,
                    'inboxFilePath'     =>  $this->filePath,
                    'archiveDir'        =>  $this->archiveDir,
                    'failedDir'         =>  $this->failedDir,
                    'validatorClass'    =>  $this->validatorClass,
                    'mappedClass'       =>  $this->mappedClass,
                    'logFileName'       =>  $this->logFileName,
                    'name'              =>  $this->name
                );
                // p_r($params);die;
                $feederObj->config($params);
            }
        } catch (Throwable $th) {
            Logger::error($this->logFileName, $th);
            // echo $th->getMessage();
            die;
        }
    }
    /* This function will check, does command exist or not, if it exist then it load the configuration command and update
    the properties of the current class */
    public function getCommandConfig($cmd)
    {
        $commands = (array) json_decode(file_get_contents(__DIR__ . "/config/commands.json"));
        try {
            if (array_key_exists($cmd, $commands)) {
                /* Updating properties of the current class */
                foreach ($commands[$cmd] as $k => $v) {
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
        $ext = end(explode('.', $this->filePath));
        try {
            if (in_array($ext, $this->fileType)) {
                return true;
            } else {
                throw new Exception('This command does not support the given file format.');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /* This function will override the default configuration */
    private function updateDefaults($commands)
    {
        if (!empty($commands)) {
            foreach ($commands as $k => $v) {
                if (!empty($v)) {
                    $this->$k = $v;
                }
            }
        }
        $this->setLogFileName();
    }

    private function setLogFileName($logFileName = "")
    {
        $className = explode("\\", $this->mappedClass);
        $className = end($className);
        if (!empty($className)) {
            $this->logFileName = $className . $this->datetime;
        } else {
            $this->logFileName = $logFileName . $this->datetime;
        }
    }
}
