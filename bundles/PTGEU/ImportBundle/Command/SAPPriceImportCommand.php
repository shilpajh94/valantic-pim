<?php

namespace PTGEU\ImportBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SAPPriceImportCommand extends AbstractCommand
{
    private $container;
 
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    protected function configure()
    {
        $this->setName('contitech:ptg:eu:sap-price-import')
            ->setDescription('SAP Price Import');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $serviceObj = $this->container->get('import.sap_price_service');
        $serviceObj->import();
    }
}
