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
        $list = new \Pimcore\Model\DataObject\PTGEUPlantMaterialMaster\Listing();
        $list = $list->load();
        foreach($list as $key){
            print_r($key);
        }
        die;
        // $list->setCondition();
        // $obj = DataObject\PTGEUPlantMaterialMaster::getByPath("/Contitech_PTGEU/MaterialMaster/PlantMaterialMaster");

        // if ($obj) {
        //     $obj = new DataObject\CSApplications();
        //     $obj->setKey($validKey);
        //     $obj->setParentID($parentFolderID);
        
        //     $obj->delete();
        
        // }
    }
}
