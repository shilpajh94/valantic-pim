<?php
namespace B2BTranslationBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SalesForceIdImportCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('contitech:ifs-ptg:us:b2b-salesforceid-import')
            ->setDescription('Salesforce id updation respective to externalid using CSV import');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $serviceObj = \Pimcore::getContainer()->get('b2b_translation.salesforceid_import_service');
        $serviceObj->import();
    }
}
?>