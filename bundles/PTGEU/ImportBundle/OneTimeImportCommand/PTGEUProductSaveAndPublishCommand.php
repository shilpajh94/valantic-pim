<?php

/**
 * File Path: Your File path on system
 * Command: cs:one-time-import:product-hierarchy-import <filePath>
 * Des: Product hierarchy data import script.
 */

namespace PTGEU\ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use \Pimcore\Model\DataObject;

class PTGEUProductSaveAndPublishCommand extends AbstractCommand
{

    protected function configure()
    {
        $this->setName('contitech:ptg:eu:product-save_publish')
            ->setDescription('Save and Publish Products');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $entries = new DataObject\PTGEUProduct\Listing();
        $entries->addConditionParam("businessUnit = ?", 'PTGEU');
        $entries->setUnpublished(1);
        $entries->load();
        $i = 1;
        foreach($entries as $eachEntry){
            $eachEntry->setKey(\Pimcore\Model\Element\Service::getValidKey($eachEntry->getKey(), 'object'));
            $eachEntry->setPublished(1);
            $eachEntry->save();
            print_r($i. ' --------  '.$eachEntry->getKey());
            echo PHP_EOL;
            $i++;
        }
    }
}
