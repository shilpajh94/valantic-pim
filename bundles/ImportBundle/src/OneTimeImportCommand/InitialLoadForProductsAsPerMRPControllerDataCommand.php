<?php

/**
 * File Path: /home/praganosis/Working/CSV/hosesflag.csv (Your File path on system)
 * Command: bin/console conti:onetimeimport:hosesflag /home/praganosis/Working/CSV/hosesflag.csv
 * Des: This command will set the flat value of industrial hoses.
 */

namespace ImportBundle\OneTimeImportCommand;

use Exception;
use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
use Pimcore\Db;

class InitialLoadForProductsAsPerMRPControllerDataCommand extends AbstractCommand
{
    private $t;
    private $db;
    protected function configure()
    {
        $this->setName('conti:onetimeimport:product-activeness-wrt-plant-mrpControllerData')
            ->setDescription('Product activeness as per MRP Controller Value in Plants');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        p_r('Script started at: ' . date('h:i:s', $this->t));
        p_r('------------------------------------------------');
        $this->import();
        p_r('--------------Total Execution Time---------------');
        p_r('Script completed after: ' . (abs(time() - $this->t) / 60) . ' mnt');
    }

    private function import()
    {
        try {

            $this->db = Db::get();
            $productsIdsToBeUnblishedArray = array();

            $sql = "SELECT DISTINCT(object_1.`oo_id`) from object_1
            INNER JOIN
            object_12
            ON
            REPLACE((object_12.`Material`), ',', '') = object_1.`oo_id`
            where object_1.`published` = 1
            and object_1.`ProductType` = 'fert'
            and object_12.mrpController = 'OBS'
            and object_12.`published` = 1";

            $records = $this->db->fetchAllAssociative($sql);
            p_r("Number of Products having atleast one plant with OBS as MRPController mapped --  ". count($records));
            foreach($records as $productId){
                $productToBeUnpublished = true;
                $obj    = DataObject::getById($productId['oo_id']);
                if($obj){
                    foreach($obj->getPlants() as $eachPlant){
                        if($eachPlant->getPublished() == 1 && $eachPlant->getMrpController() != 'OBS'){
                            $productToBeUnpublished = false;
                            break;
                        }
                    }
                    if($productToBeUnpublished){
                        array_push($productsIdsToBeUnblishedArray, $productId['oo_id']);
                    }
                }
            }
            $productsIdsToBeUnblished = implode(", ", $productsIdsToBeUnblishedArray);
            p_r("Total number of products to be unpublished -- ".count($productsIdsToBeUnblishedArray));;
            $updateQuery = "UPDATE objects set `published` = 0 where `id` IN ($productsIdsToBeUnblished)";
            $this->db->executeQuery($updateQuery);

            p_r('Done');
        }catch(Exception $e){
            p_r($e);
        }
    }
}



