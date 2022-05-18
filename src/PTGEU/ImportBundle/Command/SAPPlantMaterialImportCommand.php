<?php

namespace PTGEU\ImportBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SAPPlantMaterialImportCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('contitech:ptg:eu:sap-plant-material-import')
            ->setDescription('SAP Plant Material Import');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        /*$serviceObj = \Pimcore::getContainer()->get('import.sap_plant_material_import');
        $serviceObj->import();*/
    }
}