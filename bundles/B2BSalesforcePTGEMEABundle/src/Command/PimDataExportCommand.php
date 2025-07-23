<?php
namespace B2BSalesforcePTGEMEABundle\Command;

use B2BSalesforcePTGEMEABundle\Logger\LogLevel;
use Pimcore\Console\AbstractCommand;
use B2BSalesforcePTGEMEABundle\PimDataExport\B2B\PTGEMEA;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use B2BSalesforcePTGEMEABundle\PimDataExport\PimDataExportHelper;

class PimDataExportCommand extends AbstractCommand
{
    private $BusinessUnits = ['1' => 'IFS_PTG_US', '2' => 'CS', '3' => 'PTG_EU', '4' => 'IFS_EMEA'];
    private $bu;
    private $helper;

    protected function configure()
    {
        $this->setName('contitech:b2b-salesforce-ptgeu:pim-data-export-command')
            ->setDescription('Create and send csv to ftp')
            ->addArgument('optionForBusinessUnit', InputArgument::REQUIRED, "Enter 'IFS_PTG_US' for 'IFS/PTG US', 'CS' for 'Conveyor Solution', 'PTG_EU' for 'PTG EU' and 'IFS_EMEA' for 'IFS EMEA'");
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->helper = new PimDataExportHelper;

        echo $msg = "Script execution started.".PHP_EOL.PHP_EOL;
        $this->helper->logMessage($msg, LogLevel::INFO());

        $optionForBusinessUnit = $input->getArgument('optionForBusinessUnit');
        if(in_array($optionForBusinessUnit,$this->BusinessUnits))
        {
            $this->bu = $optionForBusinessUnit;
            $this->exportDataForB2BShop();
        }
        else{
            echo "Invalid Business Unit Option.".PHP_EOL;
        }

        echo PHP_EOL;
        echo $msg = "Script execution stopped.".PHP_EOL;
        $this->helper->logMessage($msg, LogLevel::INFO());

        return 1;
    }

    private function exportDataForB2BShop()
    {
        echo $msg = "{$this->bu}: Product category Product data export started.\n".PHP_EOL;
        $this->helper->logMessage($msg, LogLevel::INFO());
        $executor = new PTGEMEA\ProductCategoryProductDataExport($this->bu);
        $executor->exportData();
        $executor->uploadFile();
        echo $msg = "{$this->bu}: Product categories data export stopped.\n".PHP_EOL;
        $this->helper->logMessage($msg, LogLevel::INFO());
        echo PHP_EOL;

        echo $msg = "{$this->bu}: Product media data export started.\n".PHP_EOL;
        $this->helper->logMessage($msg, LogLevel::INFO());
        $executor = new PTGEMEA\ProductMediaDataExport($this->bu);
        $executor->exportData();
        $executor->uploadFile();
        echo $msg = "{$this->bu}: Product media data export stopped.\n".PHP_EOL;
        $this->helper->logMessage($msg, LogLevel::INFO());
        echo PHP_EOL;

        echo $msg = "{$this->bu}: Product categories data export started.\n".PHP_EOL;
        $this->helper->logMessage($msg, LogLevel::INFO());
        $executor = new PTGEMEA\ProductCategoryDataExport($this->bu);
        $executor->exportData();
        $executor->uploadFile();
        echo $msg = "{$this->bu}: Product categories data export stopped.\n".PHP_EOL;
        $this->helper->logMessage($msg, LogLevel::INFO());
        echo PHP_EOL;

        echo $msg = "{$this->bu}: Products data export started.\n".PHP_EOL;
        $this->helper->logMessage($msg, LogLevel::INFO());
        $executor = new PTGEMEA\ProductDataExport($this->bu);
        $executor->exportData();
        $executor->uploadFile();
        echo $msg = "{$this->bu}: Products data export stopped.\n".PHP_EOL.PHP_EOL;
        $this->helper->logMessage($msg, LogLevel::INFO());
        echo PHP_EOL;
    }
}
?>