<?php

namespace IFSEU\ImportBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class IFSEU_SAPPriceImportCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('contitech:ifs:eu:sap-price-import')
            ->setDescription('SAP Price Import');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $serviceObj = \Pimcore::getContainer()->get('ifs_eu_import.sap_price_import');
        $serviceObj->import();
    }
}