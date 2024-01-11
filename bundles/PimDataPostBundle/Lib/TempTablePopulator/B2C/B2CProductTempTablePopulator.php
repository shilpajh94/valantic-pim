<?php

namespace PimDataPostBundle\Lib\TempTablePopulator\B2C;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\TempTablePopulator\B2C\Dao\B2CProductTempTablePopulatorDao;
use PimDataPostBundle\AttributeConfigProvider\B2C\B2CProductAttributeConfigProvider;

class B2CProductTempTablePopulator extends AbstractB2CTempTablePopulator
{
    private $helper;

    private $dao;

    private $attributeConfigProvider;

    public function __construct()
    {
        $this->helper = new B2CTempTablePopulatorHelper();
        $this->dao = new B2CProductTempTablePopulatorDao();
        $this->attributeConfigProvider = new B2CProductAttributeConfigProvider();
    }
    
    public function truncateTempTable(): void
    {
        $this->helper->truncateTempTable(Constants::B2C_PRODUCT_TEMP_TABLE_NAME);
    }

    public function getPimModifiedRecordIds(): array
    {
        // return $this->helper getPimModifiedRecordIds(Constants::B2C_PRODUCT_OBJECT_TABLE_NAME);
        return array_values(array_unique($this->helper->getAllFertsToBeUpdatedForSalesforce(Constants::B2C_PRODUCT_OBJECT_TABLE_NAME)));
    }

    public function getTempTableDataForIds(array $pimIds): array
    {
        return $this->helper->getTempTableDataForIds($pimIds, $this->attributeConfigProvider->getCompleteAttributeConfig(), Constants::B2C_PRODUCT_OBJECT_TABLE_NAME);
    }

    public function addHashesToTempTableData(array $tempTableData): array
    {
        $relationalFields = $this->attributeConfigProvider->getSalesForceRelationalAttributeConfig();
        return $this->helper->addHashesToTempTableData($tempTableData, $relationalFields);
    }

    public function insertDataInTempTable(array $insertTempData): void
    {
        $this->helper->insertDataInTempTable($insertTempData, Constants::B2C_PRODUCT_TEMP_TABLE_NAME);
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
