<?php

namespace IFSEU\ImportBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class IFSEU_SAPProductImportCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('contitech:ifs:eu:sap-product-import')
            ->setDescription('SAP Product Import');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $serviceObj = \Pimcore::getContainer()->get('ifs_eu_import.sap_product_import');
        $serviceObj->import();
    }
}