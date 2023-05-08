<?php

namespace IFSEU\ImportBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class IFSEU_SAPPlantMaterialImportCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('contitech:ifs:eu:sap-plant-material-import')
            ->setDescription('SAP Plant Material Import');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $serviceObj = \Pimcore::getContainer()->get('ifs_eu_import.sap_plant_material_import');
        $serviceObj->import();
    }
}