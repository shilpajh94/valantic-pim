<?php

namespace AppBundle\Command;

use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use AppBundle\Logger\LogLevel;
use AppBundle\Tool\Utils;

class SAPImportCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('contitech:import_sap_files')->setDescription('Import SAP files');
    }

    // function to execute the start import 
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->log('Script execution started.', LogLevel::DEBUG());
        $this->startImport();
        $this->log('All scripts executed successfully.', LogLevel::INFO());
    }

    // function to start all the commands
    public function startImport()
    {
        exec('/usr/bin/php bin/console contitech:ptg:eu:sap-product-import', $output1, $retval1);
        exec('/usr/bin/php bin/console contitech:ptg:eu:sap-plant-material-import', $output2, $retval2);
        exec('/usr/bin/php bin/console contitech:ptg:eu:sap-sales-material-import', $output3, $retval3);
    }

    // function to generate log file
    public function log(String $msg, LogLevel $logLevel)
    {
        Utils::log(PTG_EU_SAP_IMPORT_LOG_FILE, $msg, $logLevel);
    }
}