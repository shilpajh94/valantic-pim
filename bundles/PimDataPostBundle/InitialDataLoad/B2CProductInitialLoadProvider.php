<?php

namespace PimDataPostBundle\InitialDataLoad;

class B2CProductInitialLoadProvider
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
                    object_1 product
                WHERE
                    product.B2CStoreFlag = 1
                        AND product.o_published = 1
                ORDER BY product.o_id ASC
                LIMIT $offSet, $limit;";

        return $this->db->fetchFirstColumn($sql);
    }
}
