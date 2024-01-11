<?php

namespace PimDataPostBundle\Lib\SalesForceEntityHelper\B2C;
use PimDataPostBundle\Lib\Constants; 

class B2CProductDao
{

    public function __construct()
    {
        $this->db = \Pimcore\Db::get();
    }

    public function getArticleNumber(int $pimId): string
    {
        $this->db = \Pimcore\Db::get();
        $sql="SELECT articleNumber
        FROM ".Constants::B2C_PRODUCT_OBJECT_TABLE_NAME." where oo_id = ".$pimId;
        $rowData = $this->db->fetchCol($sql);
        if(!empty($rowData))
        {
            return $rowData[0];
        }
        return null;
    }

}