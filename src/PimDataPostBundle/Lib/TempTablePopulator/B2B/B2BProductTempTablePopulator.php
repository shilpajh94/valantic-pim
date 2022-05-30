<?php

namespace PimDataPostBundle\Lib\TempTablePopulator\B2B;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\TempTablePopulator\B2B\Dao\B2BProductTempTablePopulatorDao;
use PimDataPostBundle\AttributeConfigProvider\B2B\B2BProductAttributeConfigProvider;

class B2BProductTempTablePopulator extends AbstractB2BTempTablePopulator
{
    private $helper;

    private $dao;

    private $attributeConfigProvider;

    public function __construct()
    {
        $this->helper = new B2BTempTablePopulatorHelper();
        $this->dao = new B2BProductTempTablePopulatorDao();
        $this->attributeConfigProvider = new B2BProductAttributeConfigProvider();
    }
    
    public function truncateTempTable(): void
    {
        $this->helper->truncateTempTable(Constants::B2B_PRODUCT_TEMP_TABLE_NAME);
    }

    public function getPimModifiedRecordIds(): array
    {
        $salesMaterialProductIDs = $this->dao->getTodaysSaleMasterModifiedRecords();
        // $materialProductIDs =  $this->helper getPimModifiedRecordIds(Constants::B2B_PRODUCT_OBJECT_TABLE_NAME);
        $materialProductIDs =  $this->helper->getAllFertsToBeUpdatedForSalesforce(Constants::B2B_PRODUCT_OBJECT_TABLE_NAME);

        $resultSet = [];

        if($salesMaterialProductIDs || $materialProductIDs)
        {
            $resultSet = \array_values(array_unique(array_merge($salesMaterialProductIDs, $materialProductIDs)));
        }

        return $resultSet;
    }

    public function getTempTableDataForIds(array $pimIds): array
    {
        $tempTableDataWIthoutEpixFlag = $this->helper->getTempTableDataForIds($pimIds, $this->attributeConfigProvider->getCompleteAttributeConfig(), Constants::B2B_PRODUCT_OBJECT_TABLE_NAME);
        $epixFlagForPimIds = $this->dao->getEpixFlagValueForProductIds($pimIds);

        foreach($tempTableDataWIthoutEpixFlag as &$tempTableRowWithoutEpixFlag){
            $tempTableRowWithoutEpixFlag["epixFlag"] = isset($epixFlagForPimIds[$tempTableRowWithoutEpixFlag["o_id"]]) ? 1 : 0 ;
        }
        return $tempTableDataWIthoutEpixFlag;
    }

    public function addHashesToTempTableData(array $tempTableData): array
    {
        $relationalFields = $this->attributeConfigProvider->getSalesForceRelationalAttributeConfig();
        return $this->helper->addHashesToTempTableData($tempTableData, $relationalFields);
    }

    public function insertDataInTempTable(array $insertTempData): void
    {
        $this->helper->insertDataInTempTable($insertTempData, Constants::B2B_PRODUCT_TEMP_TABLE_NAME);
    }

    public function getExistingTempTableData(int $o_id): array
    {
        return $this->dao->getExistingTempTableData($o_id);
    }

    // return product ids which are only IFS or PTG
    public function filterIFSPTGProducts(array $pimIds): array
    {
        return $this->helper->filterIFSPTGProducts($pimIds);
    }   

}
