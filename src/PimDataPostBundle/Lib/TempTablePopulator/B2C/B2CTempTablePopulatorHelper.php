<?php

namespace PimDataPostBundle\Lib\TempTablePopulator\B2C;

use PimDataPostBundle\Lib\TempTablePopulator\TempTablePopulatorHelper;
use PimDataPostBundle\Lib\TempTablePopulator\TempTablePopulatorDao;

class B2CTempTablePopulatorHelper extends TempTablePopulatorHelper
{
    private $dao;

    public function __construct()
    {
        $this->dao = new TempTablePopulatorDao();
    }

    public function truncateTempTable(string $tableName)
    {
        $this->dao->truncate($tableName);
    }

    public function getPimModifiedRecordIds($tableName)
    {
        return $this->dao->getPimModifiedRecordIds($tableName);
    }

    public function getPimModifiedRecordIdsWhichAreAlsoPresentInMaster(string $objectTableName, string $masterTableName)
    {
        return $this->dao->getPimModifiedRecordIdsWhichAreAlsoPresentInMaster($objectTableName, $masterTableName);
    }

    public function getTempTableDataForIds($pimIds, $attribute, $tableName)
    {
        $resultSet =  $this->dao->getTempTableDataForIds($attribute, $pimIds, $tableName);
        return ($resultSet) ? $resultSet : [];
    }

    public function addHashesToTempTableData($resultSet, $relationalFields)
    {
        return $this->dao->addHashesToTempTableData($resultSet, $relationalFields);
    }

    public function insertDataInTempTable($resultSet, $tableName)
    {
        $this->dao->insertDataInTempTable($resultSet, $tableName);
    }

}