<?php

namespace PimDataPostBundle\Lib\RelationChangeProvider\B2C;

class CategoryRelationChangeProvider
{
    private $dao;

    public function __construct() {
        $this->dao = new CategoryRelationChangeProviderDao();   
    }

    public function getB2CCategories(): array
    {
        return $this->dao->getB2CCategories();
    }

}