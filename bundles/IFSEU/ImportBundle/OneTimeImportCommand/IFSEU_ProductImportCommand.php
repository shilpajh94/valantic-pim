<?php

namespace IFSEU\ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class IFSEU_ProductImportCommand extends AbstractCommand
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct();
        $this->container = $container;
    }

    protected function configure()
    {
        $this->setName('contitech:ifs:eu:ehose-product-import')
            ->setDescription('Product Import');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $serviceObj = $this->container->get('ifs_eu_import.eHose_product_import');
        $serviceObj->import();
        return 1;
    }
}