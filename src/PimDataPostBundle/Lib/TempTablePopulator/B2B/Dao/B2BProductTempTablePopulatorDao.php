<?php

namespace PimDataPostBundle\Lib\TempTablePopulator\B2B\Dao;

use PimDataPostBundle\Lib\TempTablePopulator\TempTablePopulatorDao;
use PimDataPostBundle\Model\UpdateWindow;

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
        $productEpixIds = [];   

        if($pimIds)
        {
            foreach ($pimIds as $pimId) {
                $query = "SELECT IF (count(object_10.oo_id)>0, 1, 0) FROM  object_10 WHERE  (TRIM(BOTH ',' FROM  object_10.Material)) = {$pimId} and (object_10.epixFlag = '001' and object_10.o_published = 1);";
                $productEpixIds[$pimId] = $this->db->fetchColumn($query);
            }
        }

        return $productEpixIds;
    }

    
}