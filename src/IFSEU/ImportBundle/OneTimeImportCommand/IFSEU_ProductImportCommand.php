<?php

namespace IFSEU\ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class IFSEU_ProductImportCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('contitech:ifs:eu:ehose-product-import')
            ->setDescription('Product Import');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $serviceObj = \Pimcore::getContainer()->get('ifs_eu_import.product_import');
        $serviceObj->import();
    }
}