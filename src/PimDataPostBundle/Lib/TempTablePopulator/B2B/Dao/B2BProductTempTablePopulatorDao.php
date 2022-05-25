<?php

namespace PimDataPostBundle\Lib\TempTablePopulator\B2B\Dao;

use PimDataPostBundle\Lib\TempTablePopulator\TempTablePopulatorDao;
use PimDataPostBundle\Model\UpdateWindow;
use PimDataPostBundle\Lib\Constants;

class B2BProductTempTablePopulatorDao extends TempTablePopulatorDao
{
    private $db;
    private $updateWindow;

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->getDBInstance();
        $this->updateWindow = UpdateWindow::getInstance();

    }

    public function getTodaysSaleMasterModifiedRecords()
    {
        $startTime = $this->updateWindow->getStartTimestamp();
        $endTime = $this->updateWindow->getEndTimestamp();

        $query = "SELECT TRIM(BOTH ',' FROM  object_10.Material) AS o_id FROM object_10 WHERE (`o_modificationDate` >= {$startTime} AND `o_modificationDate` <= {$endTime})";
        return $this->db->fetchCol($query);
    }

    public function getEpixFlagValueForProductIds($pimIds)
    {
        $resultSet = [];
        if($pimIds)
        {
            $productIds = implode(",",$pimIds); 
            $query = "SELECT TRIM(BOTH ',' FROM  object_10.Material) AS pim_id, count(object_10.oo_id) AS b2b_epixFlag FROM  object_10 WHERE  (TRIM(BOTH ',' FROM  object_10.Material)) IN ($productIds) AND (object_10.epixFlag = '001' AND object_10.o_published = 1)  GROUP BY pim_id;";
            $resultSet = $this->db->fetchPairs($query);
        }
        return $resultSet;
    }

    public function getExistingTempTableData($object_id)
    {
        $resultSet = [];
        if($object_id)
        {
            $query = "SELECT * FROM ".Constants::B2B_PRODUCT_TEMP_TABLE_NAME. " WHERE o_id = {$object_id}";
            $resultSet = $this->db->fetchRow($query);
        }
        return $resultSet;
    }

    public function getPimModifiedProductIdsWithProductType(): array
    {
        $startTime = $this->updateWindow->getStartTimestamp();
        $endTime = $this->updateWindow->getEndTimestamp();
        $tableName = Constants::B2B_PRODUCT_OBJECT_TABLE_NAME;
        
        $query = "SELECT `o_id`,`productType` FROM {$tableName} WHERE (`o_modificationDate` >= {$startTime} AND `o_modificationDate` <= {$endTime})";
        $resultSet = $this->db->fetchAll($query);
    
        return ($resultSet) ? $resultSet : [];
    }

    
}