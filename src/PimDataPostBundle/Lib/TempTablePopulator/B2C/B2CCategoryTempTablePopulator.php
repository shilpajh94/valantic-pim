<?php

namespace PimDataPostBundle\Lib\TempTablePopulator\B2C;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\AttributeConfigProvider\B2B\B2CCategoryAttributeConfigProvider;

class B2CCategoryTempTablePopulator extends AbstractB2CTempTablePopulator
{
    private $helper;

    private $attributeConfigProvider;

    public function __construct()
    {
        $this->helper = new B2CTempTablePopulatorHelper();
        $this->attributeConfigProvider = new B2CCategoryAttributeConfigProvider();
    }
    
    public function truncateTempTable(): void
    {
        $this->helper->truncateTempTable(Constants::B2C_CATEGORY_TEMP_TABLE_NAME);
    }

    public function getPimModifiedRecordIds(): array
    {
        return $this->helper->getPimModifiedRecordIds(Constants::CATEGORY_OBJECT_TABLE_NAME);
    }

    public function getPimModifiedRecordIdsWhichAreAlsoPresentInMaster(): array
    {
        return $this->helper->getPimModifiedRecordIdsWhichAreAlsoPresentInMaster(Constants::B2C_CATEGORY_OBJECT_TABLE_NAME, Constants::B2C_CATEGORY_MASTER_TABLE_NAME);
    }

    public function getTempTableDataForIds(array $pimIds): array
    {
        return $this->helper->getTempTableDataForIds($pimIds, $this->attributeConfigProvider->getCompleteAttributeConfig(), Constants::B2C_CATEGORY_OBJECT_TABLE_NAME);
    }

    public function addHashesToTempTableData(array $tempTableData): array
    {
        $relationalFields = $this->attributeConfigProvider->getPIMRelationalAttributeConfig("salesForceRelationalAttr");
        return $this->helper->addHashesToTempTableData($tempTableData, $relationalFields);
    }

    public function insertDataInTempTable(array $insertTempData): void
    {
        $this->helper->insertDataInTempTable($insertTempData, Constants::B2C_CATEGORY_TEMP_TABLE_NAME);
    }
}