<?php
namespace PimDataPostBundle\Lib\RequestBodyGenerator;

use PimDataPostBundle\Model\PersistantModel\B2BProductRelationChange;
interface IProductMediaRequestBodyGenerator
{
    public function generateRequestBodyForImage(B2BProductRelationChange $b2bProductRelationChange): array;

    public function generateRequestBodyForVideo(B2BProductRelationChange $b2bProductRelationChange): array;

    public function generateRequestBodyForDocument(B2BProductRelationChange $b2bProductRelationChange): array;
}

