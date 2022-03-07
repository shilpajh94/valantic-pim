<?php
namespace PimDataPostBundle\Lib\DeltaManager;

class DeltaManagerDao
{
    private $db;
    
    public function __construct()
    {
        $this->db = \Pimcore\Db::get();
    }
    
}

