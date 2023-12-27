<?php

/**
 * File Path: Your File path on system
 * Command: cs:one-time-import:product-hierarchy-import <filePath>
 * Des: Product hierarchy data import script.
 */

namespace PTGEU\ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use \Pimcore\Model\DataObject;

class PTGEUDeleteCommand extends AbstractCommand
{
    private $t;

    protected function configure()
    {
        $this->setName('contitech:ptg:eu:delete')
            ->setDescription('Delete');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->t = time();
        p_r('Script started at: ' . date('h:i:s', $this->t));
        p_r('------------------------------------------------');
        
        $this->delete();
        
        p_r('--------------Total Execution Time---------------');
        p_r('Script completed after: ' . (abs(time() - $this->t) / 60) . ' mnt');
        
    }

    public function delete()
    {
        $getObjectData = new DataObject\Listing;
        $getObjectData->setCondition("o_path = ?", ['/Contitech_PTGEU/MaterialMaster/PlantMaterialMaster/']);
        foreach($getObjectData->load() as $data)
        {
            echo $data->getId()." is deleting .. \n";
            $data->delete();
        }
    }
}
