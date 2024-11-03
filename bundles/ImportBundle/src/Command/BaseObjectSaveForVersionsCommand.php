<?php

/**
 * File Path: /home/praganosis/Working/CSV/hosedata.csv (Your File path on system)
 * Command: bin/console conti:onetimeimport:hose /home/praganosis/Working/CSV/hosedata.csv
 * Des: This command will import and enrich PTG data at class, base, skeleton, fert level including bricks too.
 * Just run the above command, it will create all required temp table if it does not exist into system
 * After creation of temp table, it will process the sheet to import and enrich data
 */

namespace ImportBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;

class BaseObjectSaveForVersionsCommand extends AbstractCommand
{

    protected function configure()
    {
        $this->setName('ifsna-base-object-save-for-version')
            ->setDescription('IFSNA objects save for version');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {

        $db = \Pimcore\Db::get();
        $sql = "SELECT oo_id
                FROM `object_1`
                WHERE `productType` = 'base' and versionCount = 0 and `published` = 1";
        $records = $db->fetchAllAssociative($sql);
        p_r(count($records));
        foreach($records as $id){
            $object = DataObject\Product::getById($id['oo_id']);
            $object->setPublished(1);
            $object->save();
            p_r($id['oo_id']);
        }
        return 1;

    }
}
