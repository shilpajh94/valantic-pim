<?php
namespace PimDataPostBundle\Lib\RequestBodyGenerator;

class RequestBodyGeneratorDao
{
    private $db;
    
    public function __construct()
    {
        $this->db = \Pimcore\Db::get();
    }
}

