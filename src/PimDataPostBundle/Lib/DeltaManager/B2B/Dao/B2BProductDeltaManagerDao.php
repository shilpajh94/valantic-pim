<?php
namespace PimDataPostBundle\Lib\DeltaManager\B2B\Dao;

class B2BProductDeltaManagerDao
{
    private $db;
    
    public function __construct()
    {
        $this->db = \Pimcore\Db::get();
    }
}

