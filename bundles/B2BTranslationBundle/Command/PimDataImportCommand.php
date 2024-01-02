<?php
namespace B2BTranslationBundle\Command;

use Pimcore\Console\AbstractCommand;
use B2BTranslationBundle\PimDataImport\B2B\ProductDataImport;
use B2BTranslationBundle\PimDataImport\B2B\CategoryDataImport;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class PimDataImportCommand extends AbstractCommand
{
    private $businessUnits = ['1' => 'IFS_PTG_US', '2' => 'CS', '3' => 'PTG_EU', '4' => 'IFS_EMEA'];
    private $bu;

    protected function configure()
    {
        $this->setName('contitech:b2b:pim-data-import-command')
            ->setDescription('Salesforce id updation respective to externalid using CSV import')
            ->addArgument('optionForBusinessUnit', InputArgument::REQUIRED, "Enter 'IFS_PTG_US' for 'IFS/PTG US',
             'CS' for 'Conveyor Solution', 'PTG_EU' for 'PTG EU' and 'IFS_EMEA' for 'IFS EMEA'");
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        echo "Script execution started.".PHP_EOL.PHP_EOL;

        $optionForBusinessUnit = $input->getArgument('optionForBusinessUnit');
        if(in_array($optionForBusinessUnit,$this->businessUnits))
        {
            $this->bu = $optionForBusinessUnit;
            $this->importDataForB2BShop();
        }
        else{
            echo "Invalid Business Unit Option.".PHP_EOL;
        }

        echo PHP_EOL;
        echo "Script execution stopped.".PHP_EOL;
    }

    private function importDataForB2BShop()
    {
        echo "{$this->bu}: Product categories salesforce id data import started.".PHP_EOL;
        $executor = new CategoryDataImport($this->bu);
        $executor->downloadFile();
        $executor->importData();
        echo PHP_EOL;
        echo "{$this->bu}: Product categories salesforce id data import stopped.".PHP_EOL;

        echo "{$this->bu}: Products salesforce id data import started.".PHP_EOL;
        $executor = new ProductDataImport($this->bu);
        $executor->downloadFile();
        $executor->importData();
        echo PHP_EOL;
        echo "{$this->bu}: Products salesforce id data import stopped.".PHP_EOL.PHP_EOL;
    }
}
