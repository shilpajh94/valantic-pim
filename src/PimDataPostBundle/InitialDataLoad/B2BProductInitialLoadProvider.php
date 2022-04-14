<?php

namespace PimDataPostBundle\InitialDataLoad;

class B2BProductInitialLoadProvider 
{
    private $db;

    public function __construct()
    {
        $this->db = \Pimcore\Db::get();
    }

    public function getProductIdsForInitialLoad(): array
    {
        $sql = "SELECT DISTINCT
        product.o_id
        FROM
        object_10 salesMaster
        JOIN
        object_1 product ON product.o_id = SUBSTRING(salesMaster.Material,
        2,
        (LENGTH(salesMaster.Material) - 2))
        WHERE
        salesMaster.epixFlag = '001'
        AND salesMaster.o_published = 1
        AND product.o_published = 1;";
            
        return $this->db->fetchCol($sql);
    }
}
