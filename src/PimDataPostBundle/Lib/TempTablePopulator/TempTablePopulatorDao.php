<?php

namespace PimDataPostBundle\Lib\TempTablePopulator;

class TempTablePopulatorDao
{
    private $db;

    public function __construct()
    {
        $this->db = \Pimcore\Db::get();
    }
}