<?php

namespace PimDataPostBundle\Lib\TempTablePopulator\B2B;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\AttributeConfigProvider\B2B\B2BCategoryAttributeConfigProvider;

class B2BCategoryTempTablePopulator extends AbstractB2BTempTablePopulator
{
    private $helper;

    private $attributeConfigProvider;

    public function __construct()
    {
        $this->helper = new B2BTempTablePopulatorHelper();
        $this->attributeConfigProvider = new B2BCategoryAttributeConfigProvider();
    }
    
    public function truncateTempTable(): void
    {
        $this->helper->truncateTempTable(Constants::B2B_CATEGORY_TEMP_TABLE_NAME);
    }

    public function getPimModifiedRecordIds(): array
    {
        return $this->helper->getPimModifiedRecordIds(Constants::B2B_CATEGORY_OBJECT_TABLE_NAME);
    }

    public function getTempTableDataForIds(array $pimIds): array
    {
        return $this->helper->getTempTableDataForIds($pimIds, $this->attributeConfigProvider->getCompleteAttributeConfig(), Constants::B2B_CATEGORY_OBJECT_TABLE_NAME);
    }

    public function addHashesToTempTableData(array $tempTableData): array
    {
        $relationalFields = $this->attributeConfigProvider->getPIMRelationalAttributeConfig("salesForceRelationalAttr");
        return $this->helper->addHashesToTempTableData($tempTableData, $relationalFields);
    }

    public function insertDataInTempTable(array $insertTempData): void
    {
        $this->helper->insertDataInTempTable($insertTempData, Constants::B2B_CATEGORY_TEMP_TABLE_NAME);
    }
}