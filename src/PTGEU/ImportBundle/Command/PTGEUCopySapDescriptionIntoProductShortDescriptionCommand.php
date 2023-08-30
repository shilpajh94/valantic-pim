<?php

namespace PTGEU\ImportBundle\Command;

use Exception;
use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Db;
use Pimcore\Model\DataObject;
use Pimcore\Logger;

class PTGEUCopySapDescriptionIntoProductShortDescriptionCommand extends AbstractCommand
{
    private $db;

    protected function configure()
    {
        $this->setName('contitech:ptg:eu:copy-sapDescription-into-productShortDescription')
            ->setDescription('Copy Sap Description Into Product Short Description PTGEU');
    }

    public function __construct()
    {
        parent::__construct();
        $this->db = \Pimcore\Db::get();
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {

        $select = "SELECT Distinct oo_id FROM object_38";
        $join = " INNER JOIN object_localized_data_38 on object_38.oo_id = object_localized_data_38.ooo_id";
        $productTypeCondition = "ProductType = 'fert'";
        $languageCondition = "object_localized_data_38.language = 'en' ";
        $productShortDescriptionCondition = "(object_localized_data_38.productShortDescription is NULL OR 
                                                object_localized_data_38.productShortDescription = '' OR 
                                                object_localized_data_38.productShortDescription = 'NULL')";

        $sql = $select.$join." Where ". $productTypeCondition." And ".$languageCondition." And ".$productShortDescriptionCondition;
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
                    $productObj = DataObject\PTGEUProduct::getById($eachModifiedProductId);
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
