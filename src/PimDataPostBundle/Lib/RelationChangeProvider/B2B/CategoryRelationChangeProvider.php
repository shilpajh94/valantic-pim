<?php

namespace PimDataPostBundle\Lib\RelationChangeProvider\B2B;

class CategoryRelationChangeProvider
{
    private $dao;

    public function __construct() {
        $this->dao = new CategoryRelationChangeProviderDao();   
    }

    public function getIFSSIOPLevel4Categories(): array
    {
        return $this->dao->getIFSSIOPLevel4Categories();
    }

    public function getPTGSIOPLevel6Categories(): array
    {
        return $this->dao->getPTGSIOPLevel6Categories();
    }
}