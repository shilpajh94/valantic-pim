<?php

namespace PTGEU\ImportBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SAPEditablesImportCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('contitech:ptg:eu:sap-editables-import')
            ->setDescription('SAP Editable Attributes Import');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $serviceObj = \Pimcore::getContainer()->get('import.editables_service');
        $serviceObj->import();
    }
}