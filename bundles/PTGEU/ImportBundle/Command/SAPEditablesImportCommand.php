<?php

namespace PTGEU\ImportBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SAPEditablesImportCommand extends AbstractCommand
{
    private $container;
 
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    protected function configure()
    {
        $this->setName('contitech:ptg:eu:sap-editables-import')
        ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ')
        ->setDescription('SAP Editable Attributes Import');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $filePath = $input->getArgument('filePath');
        $serviceObj = $this->container->get('import.editables_service');
        $serviceObj->import($filePath);
        return 1;
    }
}
