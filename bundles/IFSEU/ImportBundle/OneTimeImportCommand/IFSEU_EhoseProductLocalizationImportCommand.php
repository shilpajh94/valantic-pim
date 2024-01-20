<?php

namespace IFSEU\ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class IFSEU_EhoseProductLocalizationImportCommand extends AbstractCommand
{
    private $lang;
    private $container;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct();
        $this->container = $container;
    }
    protected function configure()
    {
        $this->setName('contitech:ifs:eu:ehose-product-localization-import')
            ->setDescription('Product Import')
            ->addArgument('filePath', InputArgument::REQUIRED, 'Enter File Path: ')
            ->addArgument('localizedLanguage', InputArgument::REQUIRED, "Enter localization Language");
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {

        $localizedLanguage=$input->getArgument('localizedLanguage');
        $filePath=$input->getArgument('filePath');
        $serviceObj = $this->container->get('ifs_eu_import.product_import_localization');
        $serviceObj->import($filePath,$localizedLanguage);
        return 1;
    }
    
}