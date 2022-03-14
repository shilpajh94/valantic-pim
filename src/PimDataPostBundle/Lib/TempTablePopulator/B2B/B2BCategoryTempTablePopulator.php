<?php

namespace PimDataPostBundle\Lib\TempTablePopulator\B2B;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\TempTablePopulator\B2B\Dao\B2BCategoryTempTablePopulatorDao;

class B2BCategoryTempTablePopulator extends AbstractB2BTempTablePopulator
{
    private $helper;

    private $dao;

    public function __construct()
    {
        $this->helper = new B2BTempTablePopulatorHelper();
        $this->dao = new B2BCategoryTempTablePopulatorDao();
    }
    
    public function truncateTempTable(): void
    {
        $this->helper->truncateTempTable(Constants::B2B_CATEGORY_TEMP_TABLE_NAME);
    }

    public function getPimModifiedRecordIds(): array
    {
        return $this->helper->getTodaysCategoryPimModifiedRecordIds();
    }

    public function getTempTableDataForIds(array $pimIds): array
    {
        return $this->helper->getCategoryTempTableDataForIds($pimIds);
    }

    public function addHashesToTempTableData(array $tempTableData): array
    {
        return $this->helper->addCategoryHashesToTempTableData($tempTableData);
    }

    public function insertDataInTempTable($insertTempData): void
    {
        $this->helper->insertCategoriesDataInTempTable($insertTempData);
    }
}