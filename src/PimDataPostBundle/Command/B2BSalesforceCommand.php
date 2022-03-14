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
use PimDataPostBundle\AttributeConfigProvider\B2B\B2BProductAttributeConfigProvider;
use PimDataPostBundle\AttributeConfigProvider\B2B\B2BCategoryAttributeConfigProvider;
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

            // B2B Product Processing - Start

            $b2bProductTempTablePopulator = new B2BProductTempTablePopulator();
            $b2bProductTempTablePopulator->truncateTempTable();
            $resultSet = $b2bProductTempTablePopulator->getPimModifiedRecordIds();
            $resultSetProductsDetail = $b2bProductTempTablePopulator->getTempTableDataForIds($resultSet);
            $resultSetProductsDetailWithHashData = $b2bProductTempTablePopulator->addHashesToTempTableData($resultSetProductsDetail);
            $b2bProductTempTablePopulator->insertDataInTempTable($resultSetProductsDetailWithHashData);
            
            // B2B Product Processing - End
            
            // B2B Categories Processing First Part - start

            $b2bCategoryTempTablePopulator = new B2BCategoryTempTablePopulator();
            $b2bCategoryTempTablePopulator->truncateTempTable();
            $b2bCategoryActiveFlagHandler = new B2BCategoryActiveFlagHandler();
            $b2bCategoryActiveFlagHandler->updatePIMCategories();

            // B2B Categories Processing First Part - end

            // B2B Categories Processing Second  Part - start
            $allRelationCategories = $b2bCategoryActiveFlagHandler->getCategoryIdsWhereRelationWithProductChanged();
            if($allRelationCategories)
            {
                $categoriesForTemp = [];
                foreach ($allRelationCategories as $categoryId) {
                    $categoryData = $b2bCategoryActiveFlagHandler->isCategoryPresentInMasterTable($categoryId);
                    if($categoryData)
                    {
                        $isActive = $b2bCategoryActiveFlagHandler->isCategoryActiveInMasterTable($categoryId);
                        if(!$isActive)
                        {
                            $b2bCategoryActiveFlagHandler->updateShowInMenuFlagInPIM($categoryId,$isActive);
                        }   
                    }
                    else{
                        $b2bCategoryActiveFlagHandler->updateShowInMenuFlagInPIM($categoryId, false);
                        $categoriesForTemp[] = $categoryId;
                    }
                }

                if($categoriesForTemp)
                {
                    $this->updateCategoryTempTable($b2bCategoryTempTablePopulator, $categoriesForTemp);
                }
            }
            // B2B Categories Processing Second  Part - end

            // B2B Categories Processing third  Part - start
            $resultSet = $b2bCategoryTempTablePopulator->getPimModifiedRecordIds();
            $this->updateCategoryTempTable($b2bCategoryTempTablePopulator, $resultSet);
            // B2B Categories Processing third  Part - end
            
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
        echo "\n Script finished!!!\n";
        die;
    }

    public function updateCategoryTempTable($b2bCategoryTempTablePopulator, $resultSet)
    {
        $resultSetCategoriesDetail = $b2bCategoryTempTablePopulator->getTempTableDataForIds($resultSet);
        $resultSetCategoriesDetailWithHashData = $b2bCategoryTempTablePopulator->addHashesToTempTableData($resultSetCategoriesDetail);
        $b2bCategoryTempTablePopulator->insertDataInTempTable($resultSetCategoriesDetailWithHashData);
    }
}
