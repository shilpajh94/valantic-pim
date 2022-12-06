<?php

namespace ContitechCS\ImportBundle\OneTimeImportCommand;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;

class CSGetAllCoverCompoundDataFromProducts extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('cs:one-time-import:get-coverCompound-data')
            ->setDescription('Script to get cover compound data from all the products');
    }
    public function execute(InputInterface $input, OutputInterface $output)
    {
        $fileName = 'CSProducts_CoverCompound.csv';
        $columns[] = "Id";
        $columns[] = "Path";
        $columns[] = "Cover Comppounds";
        $fileResource = fopen(PIMCORE_SYSTEM_TEMP_DIRECTORY.'/'.$fileName, 'w');
        fputcsv($fileResource, $columns, ',');

        $productsList = new DataObject\CSProducts\Listing();
        $productsList->setCondition("o_published = ?", 1);
        $productsList->load();
        foreach($productsList as $eachProduct){
            if($eachProduct->hasChildren()){
                $coverCompound = $eachProduct->getCoverCompounds();
                if($coverCompound){
                    $coverCompoundList = '';
                    foreach($coverCompound as $eachCoverCompound){
                        $coverCompoundName = $eachCoverCompound->getPath().$eachCoverCompound->getKey();
                        $coverCompoundList = $coverCompoundList.' | '.$coverCompoundName;
                    }
                    $row[]  = $eachProduct->getId();
                    $row[]  = $eachProduct->getPath().$eachProduct->getKey();
                    $row[]  = $coverCompoundList;
    
                    fputcsv($fileResource, $row, ',');
                    unset($row);
                }
    
            }
        }
    }


}
