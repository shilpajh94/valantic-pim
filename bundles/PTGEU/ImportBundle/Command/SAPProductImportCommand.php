<?php

namespace PTGEU\ImportBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SAPProductImportCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('contitech:ptg:eu:sap-product-import')
            ->setDescription('SAP Material Import');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $serviceObj = \Pimcore::getContainer()->get('import.sap_product_service');
        $serviceObj->import();
    }
}