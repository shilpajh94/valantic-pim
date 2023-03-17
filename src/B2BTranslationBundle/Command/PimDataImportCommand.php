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
    private $BusinessUnits = ['1' => 'IFS_PTG_US', '2' => 'CS', '3' => 'PTG_EU', '4' => 'IFS_EMEA'];
    private $bu;

    protected function configure()
    {
        $this->setName('contitech:b2b:pim-data-import-command')
            ->setDescription('Salesforce id updation respective to externalid using CSV import');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        echo "Script execution started.".PHP_EOL.PHP_EOL;

        for ($i=1; $i <= 4; $i++) { 
            $this->bu = $this->BusinessUnits[$i];
            echo "Business Unit - {$this->bu}".PHP_EOL.PHP_EOL;
            $this->importDataForB2BShop();
        }

        echo PHP_EOL;
        echo "Script execution stopped.".PHP_EOL;
    }

    private function importDataForB2BShop()
    {
        echo "Products salesforce id data import started.".PHP_EOL;
        $executor = new ProductDataImport($this->bu);
        $executor->downloadFile();
        $executor->importData();
        echo PHP_EOL;
        echo "Products salesforce id data import stopped.".PHP_EOL.PHP_EOL;

        echo "Product categories salesforce id data import started.".PHP_EOL;
        $executor = new CategoryDataImport($this->bu);
        $executor->downloadFile();
        $executor->importData();
        echo PHP_EOL;
        echo "Product categories salesforce id data import stopped.".PHP_EOL;
    }
}
?>