<?php

namespace ImportBundle\Command;

use Exception;
use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Db;
use Pimcore\Model\DataObject;
use Pimcore\Logger;

class CopySapDescriptionIntoProductShortDescriptionCommand extends AbstractCommand
{
    private $db;

    protected function configure()
    {
        $this->setName('IFSPTG-US:Copy-SapDescription-Into-ProductShortDescription')
            ->setDescription('Copy Sap Description Into Product Short Description IFSPTG-US');
    }

    public function __construct()
    {
        parent::__construct();
        $this->db = \Pimcore\Db::get();
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $currentTime = time();
        $twentyFourHoursPriorTime = time() - (24*60*60); 

        $select = "SELECT Distinct oo_id FROM object_1";
        $join = " INNER JOIN object_localized_data_1 on object_1.oo_id = object_localized_data_1.ooo_id";
        $modificationTimeCondtion = "o_modificationDate <= ". $currentTime . " And  o_modificationDate >= ". $twentyFourHoursPriorTime;
        $productTypeCondition = "ProductType = 'fert'";
        $languageCondition = "object_localized_data_1.language = 'en' ";
        $productShortDescription = "object_localized_data_1.productShortDescription is NULL";

        $sql = $select.$join." Where ".$modificationTimeCondtion." And ".$productTypeCondition." And ".$languageCondition." And ".$productShortDescription;
        try{
            $modifiedEmptyProductShortDescriptionProductIds = $this->db->fetchCol($sql);
        }catch (\Exception $exception){
            Logger::error("Exception: " . $exception->getMessage());
            throw new \Exception("An unexpected error occurred.");
        }

        $totalCount = count($modifiedEmptyProductShortDescriptionProductIds);
        echo 'Number of Products - '.$totalCount;
        echo PHP_EOL;

        if($totalCount > 0){
            try{
                $i = 0;
                foreach($modifiedEmptyProductShortDescriptionProductIds as $eachModifiedProductId){
                    $productObj = DataObject\Product::getById($eachModifiedProductId);
                    if($productObj){
                        $sapDescription = $productObj->getSapDescription("en");
                        $productShortDescription = $productObj->setProductShortDescription($sapDescription,"en");
                        $productObj->save();
                        echo ++$i .' - '.$productObj->getArticleNumber();
                        echo PHP_EOL;
                    }
                }    
            }catch (\Exception $exception){
                Logger::error("Exception: " . $exception->getMessage());
            }
        }

    }
}
