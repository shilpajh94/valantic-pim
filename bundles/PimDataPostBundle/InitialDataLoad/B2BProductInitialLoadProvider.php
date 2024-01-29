<?php

namespace PimDataPostBundle\InitialDataLoad;

class B2BProductInitialLoadProvider
{
    private $db;

    public function __construct()
    {
        $this->db = \Pimcore\Db::get();
    }

    public function getProductIdsForInitialLoad($pageSize, $pageNumber): array
    {
        $limit = $pageSize;
        $offSet = ($pageNumber > 0) ? (( $pageNumber - 1 ) * $pageSize) : 0;

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
                        AND product.o_published = 1
                ORDER BY product.o_id ASC
                LIMIT $offSet, $limit;";

        return $this->db->fetchFirstColumn($sql);
    }
}
