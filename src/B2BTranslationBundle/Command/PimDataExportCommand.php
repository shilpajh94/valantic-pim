<?php
namespace B2BTranslationBundle\Command;

use Pimcore\Console\AbstractCommand;
use B2BTranslationBundle\PimDataExport\B2B\IFSPTG\B2BProductDataExport;
use B2BTranslationBundle\PimDataExport\B2B\IFSPTG\B2BCategoryDataExport;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class PimDataExportCommand extends AbstractCommand
{
    private $BusinessUnits = ['1' => 'IFS_PTG_US', '2' => 'CS_US', '3' => 'PTG_EU', '4' => 'IFS_EU'];
    private $bu;

    protected function configure()
    {
        $this->setName('contitech:b2b:pim-data-export-command')
            ->setDescription('Create and send translation csv to ftp')
            ->addArgument('optionForBusinessUnit', InputArgument::REQUIRED, "Enter '1' for 'IFS/PTG US', '2' for 'Conveyor Solution', '3' for 'PTG EU' and '4' for 'IFS EU'");
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        echo "Script execution started.".PHP_EOL.PHP_EOL;
        $optionForBusinessUnit = $input->getArgument('optionForBusinessUnit');
        if($optionForBusinessUnit >= 1 &&  $optionForBusinessUnit <=4)
        {
            $this->bu = $this->BusinessUnits[$optionForBusinessUnit];
            $this->exportDataForB2BShop();
        }
        else{
            echo "Invalid Business Unit Option.".PHP_EOL;
        }

        echo PHP_EOL;
        echo "Script execution stopped.".PHP_EOL;
    }

    private function exportDataForB2BShop()
    {
        echo "Products translation data export started.".PHP_EOL;
        $executor = new B2BProductDataExport($this->bu);
        $executor->exportData();
        echo PHP_EOL;
        echo "Products translation data export stopped.".PHP_EOL.PHP_EOL;

        echo "Product categories translation data export started.".PHP_EOL;
        $executor = new B2BCategoryDataExport($this->bu);
        $executor->exportData();
        echo PHP_EOL;
        echo "Product categories translation data export stopped.".PHP_EOL;
    }
}
?>