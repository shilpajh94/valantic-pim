<?php

namespace PTGEU\ImportBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SAPSalesMaterialImportCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('contitech:ptg:eu:sap-sales-material-import')
            ->setDescription('SAP Sales Material Import');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        /*$serviceObj = \Pimcore::getContainer()->get('import.sap_sales_material_import');
        $serviceObj->import();*/
    }
}