<?php

namespace PimDataPostBundle\Lib\TempTablePopulator\B2C\Dao;

use PimDataPostBundle\Lib\Constants;
use PimDataPostBundle\Lib\TempTablePopulator\TempTablePopulatorDao;
use PimDataPostBundle\Model\UpdateWindow;

class B2CProductTempTablePopulatorDao extends TempTablePopulatorDao
{

    private $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->getDBInstance();
    }

    public function getExistingTempTableData($object_id)
    {
        $resultSet = [];
        if($object_id)
        {
            $query = "SELECT * FROM ".Constants::B2C_PRODUCT_TEMP_TABLE_NAME. " WHERE o_id = {$object_id}";
            $resultSet = $this->db->fetchAssociative($query);
        }
        return $resultSet;
    }
}