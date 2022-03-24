<?php

namespace PimDataPostBundle\Lib\CategoryRelationChangeProvider\B2B;

class CategoryRelationChangeProvider
{
    private $dao;

    public function __construct() {
        $this->dao = new CategoryRelationChangeProviderDao();   
    }

    public function getIFSSIOPLevel4(): array
    {
        return $this->dao->getIFSSIOPLevel4();
    }

    public function getPTGSIOPLevel6(): array
    {
        return $this->dao->getPTGSIOPLevel6();
    }
}