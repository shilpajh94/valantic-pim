<?php
namespace B2BTranslationBundle\Command;

use B2BTranslationBundle\Logger\LogLevel;
use Pimcore\Console\AbstractCommand;
use B2BTranslationBundle\PimDataExport\B2B\IFSPTG;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use B2BTranslationBundle\PimDataExport\PimDataExportHelper;

class PimDataExportCommand extends AbstractCommand
{
    private $BusinessUnits = ['1' => 'IFS_PTG_US', '2' => 'CS', '3' => 'PTG_EU', '4' => 'IFS_EMEA'];
    private $bu;
    private $helper;

    protected function configure()
    {
        $this->setName('contitech:b2b:pim-data-export-command')
            ->setDescription('Create and send translation csv to ftp');
            // ->addArgument('optionForBusinessUnit', InputArgument::REQUIRED, "Enter '1' for 'IFS/PTG US', '2' for 'Conveyor Solution', '3' for 'PTG EU' and '4' for 'IFS EMEA'");
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->helper = new PimDataExportHelper;

        echo $msg = "Script execution started.".PHP_EOL.PHP_EOL;
        $this->helper->logMessage($msg, LogLevel::INFO());

        for ($i=1; $i <= 4; $i++) { 
            $this->bu = $this->BusinessUnits[$i];
            $this->exportDataForB2BShop();
        }

        // $optionForBusinessUnit = $input->getArgument('optionForBusinessUnit');
        // if($optionForBusinessUnit >= 1 &&  $optionForBusinessUnit <=4)
        // {
        //     $this->bu = $this->BusinessUnits[$optionForBusinessUnit];
        //     $this->exportDataForB2BShop();
        // }
        // else{
        //     echo "Invalid Business Unit Option.".PHP_EOL;
        // }

        echo PHP_EOL;
        echo $msg = "Script execution stopped.".PHP_EOL;
        $this->helper->logMessage($msg, LogLevel::INFO());
    }

    private function exportDataForB2BShop()
    {
        echo $msg = "{$this->bu}: Products translation data export started.".PHP_EOL;
        $this->helper->logMessage($msg, LogLevel::INFO());
        $executor = new IFSPTG\ProductDataExport($this->bu);
        $executor->exportData();
        $executor->uploadFile();
        echo $msg = "{$this->bu}: Products translation data export stopped.".PHP_EOL.PHP_EOL;
        $this->helper->logMessage($msg, LogLevel::INFO());
        echo PHP_EOL;

        echo $msg = "{$this->bu}: Product categories translation data export started.".PHP_EOL;
        $this->helper->logMessage($msg, LogLevel::INFO());
        $executor = new IFSPTG\CategoryDataExport($this->bu);
        $executor->exportData();
        $executor->uploadFile();
        echo $msg = "{$this->bu}: Product categories translation data export stopped.".PHP_EOL;
        $this->helper->logMessage($msg, LogLevel::INFO());
        echo PHP_EOL;
    }
}
?>