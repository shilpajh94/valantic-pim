<?php

namespace PimDataPostBundle\Lib\RequestBodyGenerator\B2B;

use PimDataPostBundle\Lib\RequestBodyGenerator\IProductRelationRequestBodyGenerator;
use Pimcore\Model\DataObject\Product;
use PimDataPostBundle\Model\Types\PimFieldType;
use PimDataPostBundle\Lib\RequestBodyGenerator\B2B\Dao\B2BProductCategoryReationRequestBodyGeneratorDao;
use PimDataPostBundle\Model\PersistantModel\B2BProductRelationChange;

class B2BProductCategoryRelationRequestBodyGenerator implements IProductRelationRequestBodyGenerator
{
    Private $dao;
    public function __construct()  
    {
        $this->dao = new B2BProductCategoryReationRequestBodyGeneratorDao();

    }

    public function generateRequestBody(B2BProductRelationChange $b2bProductRelationChange): array
    {
        $returnArray = [];
        return array(
                "ProductCategoryId" => $this->dao->getCategorySalesforceIdByPimId($b2bProductRelationChange->newValue),
                "ProductId" => $this->dao->getProductSalesforceIdByPimId($b2bProductRelationChange->productId),
                "IsPrimaryCategory" => false
                );
    }
    
}
