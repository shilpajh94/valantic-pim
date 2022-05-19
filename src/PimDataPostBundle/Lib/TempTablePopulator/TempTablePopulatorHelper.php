<?php


namespace PimDataPostBundle\Lib\TempTablePopulator;


use PimDataPostBundle\Lib\TempTablePopulator\TempTablePopulatorDao;

class TempTablePopulatorHelper
{
    private $dao;

    public function __construct()
    {
        $this->dao = new TempTablePopulatorDao();
    }

    public function truncateTempTable(string $tableName): bool
    {
        return false;
    }

    public function filterIFSPTGProducts(array $productIds): array
    {
        return $this->dao->filterIFSPTGProducts($productIds);
    }
}