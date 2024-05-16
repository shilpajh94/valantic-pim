<?php
namespace B2BTranslationBundle\Command;

use B2BTranslationBundle\Logger\LogLevel;
use Pimcore\Console\AbstractCommand;
use B2BTranslationBundle\PimDataExport\B2B\IFSPTG;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use B2BTranslationBundle\PimDataExport\PimDataExportHelper;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PimDataExportCommand extends AbstractCommand
{
    private $businessUnits = ['1' => 'IFS_PTG_US', '2' => 'CS', '3' => 'PTG_EU', '4' => 'IFS_EMEA'];
    private $bu;
    private $helper;
    private $container;

    protected function configure()
    {
        $this->setName('contitech:b2b:pim-data-export-command')
            ->setDescription('Create and send translation csv to ftp')
            ->addArgument(
                'optionForBusinessUnit',
                InputArgument::REQUIRED,
                "Enter 'IFS_PTG_US' for 'IFS/PTG US', 'CS' for 'Conveyor Solution',
            'PTG_EU' for 'PTG EU' and 'IFS_EMEA' for 'IFS EMEA'"
            );
    }

    public function __construct(ContainerInterface $container)
    {
        parent::__construct();
        $this->container = $container;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->helper = new PimDataExportHelper($this->container);

        echo $msg = "Script execution started." . PHP_EOL . PHP_EOL;
        $this->helper->logMessage($msg, LogLevel::INFO());

        $optionForBusinessUnit = $input->getArgument('optionForBusinessUnit');
        if (in_array($optionForBusinessUnit, $this->businessUnits)) {
            $this->bu = $optionForBusinessUnit;
            $this->exportDataForB2BShop();
        } else {
            echo "Invalid Business Unit Option." . PHP_EOL;
        }

        echo PHP_EOL;
        echo $msg = "Script execution stopped." . PHP_EOL;
        $this->helper->logMessage($msg, LogLevel::INFO());
        return 1;
    }

    private function exportDataForB2BShop()
    {
        echo $msg = "{$this->bu}: Product categories translation data export started." . PHP_EOL;
        $this->helper->logMessage($msg, LogLevel::INFO());
        $executor = new IFSPTG\CategoryDataExport($this->bu, $this->container);
        $executor->exportData();
        $executor->uploadFile();
        echo $msg = "{$this->bu}: Product categories translation data export stopped." . PHP_EOL;
        $this->helper->logMessage($msg, LogLevel::INFO());
        echo PHP_EOL;

        echo $msg = "{$this->bu}: Products translation data export started." . PHP_EOL;
        $this->helper->logMessage($msg, LogLevel::INFO());
        $executor = new IFSPTG\ProductDataExport($this->bu, $this->container);
        $executor->exportData();
        $executor->uploadFile();
        echo $msg = "{$this->bu}: Products translation data export stopped." . PHP_EOL . PHP_EOL;
        $this->helper->logMessage($msg, LogLevel::INFO());
        echo PHP_EOL;
    }
}
