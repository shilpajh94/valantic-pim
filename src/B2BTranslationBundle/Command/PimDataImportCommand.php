<?php
namespace B2BTranslationBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class PimDataImportCommand extends AbstractCommand
{
    private $BusinessUnits = ['1' => 'IFS_PTG_US', '2' => 'CS_US', '3' => 'PTG_EU', '4' => 'IFS_EU'];

    protected function configure()
    {
        $this->setName('contitech:b2b:pim-data-import-command')
            ->setDescription('Salesforce id updation respective to externalid using CSV import')
            ->addArgument('optionForBusinessUnit', InputArgument::REQUIRED, "Enter '1' for 'IFS/PTG US', '2' for 'Conveyor Solution', '3' for 'PTG EU' and '4' for 'IFS EU'");
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $optionForBusinessUnit = $input->getArgument('optionForBusinessUnit');
        if($optionForBusinessUnit >= 1 &&  $optionForBusinessUnit <=4)
        {
            $bu = $this->BusinessUnits[$optionForBusinessUnit];
            $serviceObj = \Pimcore::getContainer()->get('b2b_translation.salesforceid_import_service');
            $serviceObj->import($bu);
        }
        else{
            echo "Invalid Business Unit Option.".PHP_EOL;
        }
    }
}
?>