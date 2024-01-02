<?php

namespace PTGEU\ImportBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SAPSalesMaterialImportCommand extends AbstractCommand
{
    private $container;
 
    public function __construct(ContainerInterface $container)
    {
        parent::__construct();
        $this->container = $container;
    }

    protected function configure()
    {
        $this->setName('contitech:ptg:eu:sap-sales-material-import')
            ->setDescription('SAP Sales Material Import');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $serviceObj = $this->container->get('import.sap_sales_material_import');
        $serviceObj->import();
        return 1;
    }
}
