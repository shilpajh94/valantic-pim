<?php
namespace PimDataPostBundle\Lib\RequestBodyGenerator;

use PimDataPostBundle\Model\APIOperationType;

class RequestBodyGeneratorDao
{
    private $db;
    
    public function __construct()
    {
        $this->db = \Pimcore\Db::get();
    }
}

