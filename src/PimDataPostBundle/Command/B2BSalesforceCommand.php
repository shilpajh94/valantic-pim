<?php

/**
 * File Path: Your File path on system
 * Command: conti:datapost:b2b-salesforce <filePath>
 * Des: Region data import script.
 */

namespace PimDataPostBundle\Command;

use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
use Pimcore\Db;
use PimDataPostBundle\Lib\TempTablePopulator\B2B\B2BProductTempTablePopulator;
use PimDataPostBundle\Lib\TempTablePopulator\B2B\B2BCategoryTempTablePopulator;
use PimDataPostBundle\Lib\TempTablePopulator\CategoryActiveFlagHandler\B2BCategoryActiveFlagHandler;


class B2BSalesforceCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('conti:datapost:b2b-salesforce')
            ->setDescription('B2C Product Data Store to Temp Table');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        echo " Script started!";

        try {


            echo "\n Product Insert In Temp Table Started.";

            $b2bProductTempTablePopulator = new B2BProductTempTablePopulator();
            $b2bProductTempTablePopulator->truncateTempTable();
            $resultSet = $b2bProductTempTablePopulator->getPimProductAndSalesMasterModifiedRecordIds();
            $resultSetProductsDetail = $b2bProductTempTablePopulator->getTempTableDataForIds($resultSet);
            $resultSetProductsDetailWithHashData = $b2bProductTempTablePopulator->addHashesToTempTableData($resultSetProductsDetail);
            $b2bProductTempTablePopulator->insertDataInTempTable($resultSetProductsDetailWithHashData);
            
            echo "\n Product Insert In Temp Table Completed.";
            

            echo "\n Category Insert In Temp Table Started.";

            $b2bCategoryTempTablePopulator = new B2BCategoryTempTablePopulator();
            $b2bCategoryTempTablePopulator->truncateTempTable();
            $b2bCategoryActiveFlagHandler = new B2BCategoryActiveFlagHandler();
            $masterTableCategories = $b2bCategoryActiveFlagHandler->getAllCategoryIdsInMasterTable();
            $categoriesActiveInactiveList = $b2bCategoryActiveFlagHandler->getValueForActiveFlag($masterTableCategories);
            $b2bCategoryActiveFlagHandler->updateActiveFlagValue($categoriesActiveInactiveList);

            $allRelationCategories = $b2bCategoryActiveFlagHandler->getCategoryIdsWhereRelationWithProductChanged();
            if($allRelationCategories)
            {
                $idAndActiveFlagValueArray = [];
                $categoriesForTemp = [];
                foreach ($allRelationCategories as $categoryId) {
                    $categoryData = $b2bCategoryActiveFlagHandler->isCategoryPresentInMasterTable($categoryId);
                    if($categoryData)
                    {
                        $isActive = $b2bCategoryActiveFlagHandler->isCategoryActiveInMasterTable($categoryId);
                        if(!$isActive)
                        {
                            $idAndActiveFlagValueArray[$categoryId] = $isActive;
                        }   
                    }
                    else{
                        $idAndActiveFlagValueArray[$categoryId] = false;
                        $categoriesForTemp[] = $categoryId;
                    }
                }
            }

            $b2bCategoryActiveFlagHandler->updateActiveFlagValue($idAndActiveFlagValueArray);


            $resultSet = $b2bCategoryTempTablePopulator->getPimModifiedRecordIds();

            $combinedResultSet = array_merge($categoriesForTemp, $resultSet);

            $resultSetProductsDetail = $b2bCategoryTempTablePopulator->getTempTableDataForIds($combinedResultSet);
            $resultSetProductsDetailWithHashData = $b2bCategoryTempTablePopulator->addHashesToTempTableData($resultSetProductsDetail);
            $b2bCategoryTempTablePopulator->insertDataInTempTable($resultSetProductsDetailWithHashData);
           
            echo "\n Category Insert In Temp Table Completed.";
            
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
        echo "\n Script finished!!!\n";
        die;
    }
}
