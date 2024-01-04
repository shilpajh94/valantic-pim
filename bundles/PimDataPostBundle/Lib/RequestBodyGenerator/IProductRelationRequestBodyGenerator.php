<?php
namespace PimDataPostBundle\Lib\RequestBodyGenerator;

use PimDataPostBundle\Model\PersistantModel\B2BProductRelationChange;
interface IProductRelationRequestBodyGenerator
{
    public function generateRequestBody(B2BProductRelationChange $b2bProductRelationChange): array;
}

