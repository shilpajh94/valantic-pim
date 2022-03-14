<?php

namespace PimDataPostBundle\Lib\TempTablePopulator\B2B;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\TempTablePopulator\B2B\Dao\B2BProductTempTablePopulatorDao;

class B2BProductTempTablePopulator extends AbstractB2BTempTablePopulator
{
    private $helper;

    private $dao;

    public function __construct()
    {
        $this->helper = new B2BTempTablePopulatorHelper();
        $this->dao = new B2BProductTempTablePopulatorDao();
    }
    
    public function truncateTempTable(): void
    {
        $this->helper->truncateTempTable(Constants::B2B_PRODUCT_TEMP_TABLE_NAME);
    }

    public function getPimModifiedRecordIds(): array
    {
        return $this->helper->getPimModifiedRecordIds();
    }

    public function getTempTableDataForIds(array $pimIds): array
    {
        return $this->helper->getTempTableDataForIds($pimIds);
    }

    public function addHashesToTempTableData(array $tempTableData): array
    {
        return $this->helper->addHashesToTempTableData($tempTableData);
    }

    public function insertDataInTempTable($insertTempData): void
    {
        $this->helper->insertDataInTempTable($insertTempData);
    }
}