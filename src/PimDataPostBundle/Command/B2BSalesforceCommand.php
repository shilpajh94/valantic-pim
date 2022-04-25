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
use PimDataPostBundle\Lib\TempTablePopulator\B2B\B2BProductTempTablePopulator;
use PimDataPostBundle\Lib\TempTablePopulator\B2B\B2BCategoryTempTablePopulator;
use PimDataPostBundle\Lib\TempTablePopulator\B2C\B2CProductTempTablePopulator;
use PimDataPostBundle\Lib\TempTablePopulator\B2C\B2CCategoryTempTablePopulator;
use PimDataPostBundle\Lib\TempTablePopulator\CategoryActiveFlagHandler\B2BCategoryActiveFlagHandler;
use PimDataPostBundle\Lib\TempTablePopulator\CategoryActiveFlagHandler\B2C\B2CCategoryActiveFlagHandler;

use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;
use PimDataPostBundle\Lib\RelationChangeRegistrar\B2B\B2BProductRelationChangeRegistrar;
use PimDataPostBundle\Lib\RelationChangeRegistrar\B2C\B2CProductRelationChangeRegistrar;

use PimDataPostBundle\Lib\FailureNotificationSender\B2B\B2BFailureNotificationSender;

// use Pimcore\Mail;

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

            // echo "\n Product Insert In Temp Table Started.";

            // $b2cProductTempTablePopulator = new B2CProductTempTablePopulator();
            // $b2cProductTempTablePopulator->truncateTempTable();
            // $productIds = $b2cProductTempTablePopulator->getPimModifiedRecordIds();
            // $productsDetail = $b2cProductTempTablePopulator->getTempTableDataForIds($productIds);
            
            // $productsDetailWithHashData = $b2cProductTempTablePopulator->addHashesToTempTableData($productsDetail);
            
            // $b2cProductTempTablePopulator->insertDataInTempTable($productsDetailWithHashData);
            
            // echo "\n Product Insert In Temp Table Completed.";

            // echo "\n Process started relation table data insertion.";
            // $objProductTempMasterTablesMeta= new TempMasterTablesMeta('salesforce_integration_b2c_product_temp','salesforce_integration_b2c_product_master','basicHash','relationalHash');
            // $objB2CProductRelationChangeRegistrar=new B2CProductRelationChangeRegistrar($objProductTempMasterTablesMeta);
            // $objB2CProductRelationChangeRegistrar->registerChangedRelation();
            // echo "\n Process end relation table data insertion.";

            echo "\n Category Insert In Temp Table Started.";

            $tempTablePopulator = new B2CCategoryTempTablePopulator();
            $activeFlagHandler = new B2CCategoryActiveFlagHandler();
            $tempTablePopulator->truncateTempTable();
            $categoriyIdsInMasterTable = $activeFlagHandler->getAllCategoryIdsInMasterTable();
            $activeFlagValues = $activeFlagHandler->getValueForActiveFlag($categoriyIdsInMasterTable);
            $activeFlagHandler->updateActiveFlagValue($activeFlagValues);

            $categoryIdsToBeAddedInTempTable = [];
    
            $categoryIdsWhereRelationWithHashChanged = $activeFlagHandler->getCategoryIdsWhereRelationWithProductChanged();

            foreach($categoryIdsWhereRelationWithHashChanged as $categoryId){
                if($activeFlagHandler->isCategoryPresentInMasterTable($categoryId)){
                    if(!$activeFlagHandler->isCategoryActiveInMasterTable($categoryId)){
                        $activeFlagHandler->updateActiveFlagValue([$categoryId => true]);
                    }
                }else{
                    $activeFlagHandler->updateActiveFlagValue([$categoryId => true]);
                    $categoryIdsToBeAddedInTempTable[] = $categoryId;
                }
            }

            $pimModifiedRecordIdsWhichAreAlsoPresentInMaster = $tempTablePopulator->getPimModifiedRecordIdsWhichAreAlsoPresentInMaster();
            $categoryIdsToBeAddedInTempTable = array_merge($categoryIdsToBeAddedInTempTable, $pimModifiedRecordIdsWhichAreAlsoPresentInMaster);
            $tempTableData = $tempTablePopulator->getTempTableDataForIds($categoryIdsToBeAddedInTempTable);
            $tempTableDataWithHashes = $tempTablePopulator->addHashesToTempTableData($tempTableData);
            $tempTablePopulator->insertDataInTempTable($tempTableDataWithHashes);
            echo "\n Category Insert In Temp Table Completed.";

            die;

            // echo "\n Product Insert In Temp Table Started.";

            // $b2bProductTempTablePopulator = new B2BProductTempTablePopulator();
            // $b2bProductTempTablePopulator->truncateTempTable();
            // $productIds = $b2bProductTempTablePopulator->getPimProductAndSalesMasterModifiedRecordIds();
            // $productsDetail = $b2bProductTempTablePopulator->getTempTableDataForIds($productIds);
            
            // $productsDetailWithHashData = $b2bProductTempTablePopulator->addHashesToTempTableData($productsDetail);
            
            // $b2bProductTempTablePopulator->insertDataInTempTable($productsDetailWithHashData);
            
            // echo "\n Product Insert In Temp Table Completed.";

            // echo "\n Process started relation table data insertion.";
            // $objProductTempMasterTablesMeta= new TempMasterTablesMeta('b2b_product_temp','b2b_product_master','basicHash','relationalHash');
            // $objB2BProductRelationChangeRegistrar=new B2BProductRelationChangeRegistrar($objProductTempMasterTablesMeta);
            
            // $changedRecords = $objB2BProductRelationChangeRegistrar->fetchRecordsWhereRelationHashChanged();
            // $relationalChangedData = $objB2BProductRelationChangeRegistrar->processAllRelations($changedRecords, false);

            // $newTempActiveProducts = $objB2BProductRelationChangeRegistrar->fetchNewActiveRecordsInTempTable();
            // $relationalNewData = $objB2BProductRelationChangeRegistrar->processAllRelations($newTempActiveProducts, true);
            
            // $relationalData = [];

            // if($relationalChangedData)
            // {
            //     $relationalData = array_merge($relationalChangedData, $relationalNewData);
            // }
            // elseif($relationalNewData)
            // {
            //     $relationalData = array_merge($relationalNewData, $relationalChangedData);
            // }

            // $objB2BProductRelationChangeRegistrar->saveChangedRelation($relationalData);
            
            // echo "\n Process end relation table data insertion.";

            // echo "\n Category Insert In Temp Table Started.";

            // $b2bCategoryTempTablePopulator = new B2BCategoryTempTablePopulator();
            // $b2bCategoryTempTablePopulator->truncateTempTable();
            // $b2bCategoryActiveFlagHandler = new B2BCategoryActiveFlagHandler();
            // $masterTableCategories = $b2bCategoryActiveFlagHandler->getAllCategoryIdsInMasterTable();
            
            // $categoriesActiveInactiveList = $b2bCategoryActiveFlagHandler->getValueForActiveFlag($masterTableCategories);

            // $b2bCategoryActiveFlagHandler->updateActiveFlagValue($categoriesActiveInactiveList);

            // $allRelationCategories = $b2bCategoryActiveFlagHandler->getCategoryIdsWhereRelationWithProductChanged();

            // $idAndActiveFlagValueArray = [];
            // if($allRelationCategories)
            // {
            //     $categoriesForTemp = [];
            //     foreach ($allRelationCategories as $categoryId) {

            //         $categoryData = $b2bCategoryActiveFlagHandler->isCategoryPresentInMasterTable($categoryId);
            //         if($categoryData)
            //         {
            //             $isActive = $b2bCategoryActiveFlagHandler->isCategoryActiveInMasterTable($categoryId);
            //             if(!$isActive)
            //             {
            //                 $idAndActiveFlagValueArray[$categoryId] = $isActive;
            //             }   
            //         }
            //         else{
            //             $idAndActiveFlagValueArray[$categoryId] = false;
            //             $categoriesForTemp[] = $categoryId;
            //         }
            //     }
            // }
            
            // $b2bCategoryActiveFlagHandler->updateActiveFlagValue($idAndActiveFlagValueArray);

            // $categoryIds = $b2bCategoryTempTablePopulator->getPimModifiedRecordIds();

            // $combinedCategoryIds = [];

            // if($categoriesForTemp)
            // {
            //     $combinedCategoryIds = array_merge($categoriesForTemp, $categoryIds);
            // }
            // elseif($categoryIds)
            // {
            //     $combinedCategoryIds = array_merge($categoryIds, $categoriesForTemp);
            // }

            // $combinedCategoryIdsDetail = $b2bCategoryTempTablePopulator->getTempTableDataForIds($combinedCategoryIds);
            // $combinedCategoryIdsDetailWithHashData = $b2bCategoryTempTablePopulator->addHashesToTempTableData($combinedCategoryIdsDetail);
            // $b2bCategoryTempTablePopulator->insertDataInTempTable($combinedCategoryIdsDetailWithHashData);

            // echo "\n Category Insert In Temp Table Completed.";


            // echo "\n Start sending failure notification mail.";
            // $b2bFailureNotificationSender = new B2BFailureNotificationSender();
            // $b2bFailureNotificationSender->SendFailureNotification();
            

            // echo "\n End sending failure notification mail.";

        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }
        echo "\n Script finished!!!\n";
        die;
    }
}
