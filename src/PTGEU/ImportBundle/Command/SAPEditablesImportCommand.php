<?php

namespace PTGEU\ImportBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SAPEditablesImportCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('contitech:ptg:eu:sap-editables-import')
        ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ')
        ->setDescription('SAP Editable Attributes Import');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = $input->getArgument('filePath');
        $serviceObj = \Pimcore::getContainer()->get('import.editables_service');
        $serviceObj->import($filePath);
    }
}