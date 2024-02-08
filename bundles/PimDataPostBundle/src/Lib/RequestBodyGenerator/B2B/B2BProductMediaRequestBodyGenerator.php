<?php

namespace PimDataPostBundle\Lib\RequestBodyGenerator\B2B;

use PimDataPostBundle\Lib\RequestBodyGenerator\IProductMediaRequestBodyGenerator;
use Pimcore\Model\DataObject\Product;
use PimDataPostBundle\Model\Types\PimFieldType;
use PimDataPostBundle\Lib\RequestBodyGenerator\B2B\B2BProductMediaRequestBodyGeneratorHelper;
use PimDataPostBundle\Model\PersistantModel\B2BProductRelationChange;

class B2BProductMediaRequestBodyGenerator implements IProductMediaRequestBodyGenerator
{
    Private $helper;
    public function __construct()  
    {
        $this->helper = new B2BProductMediaRequestBodyGeneratorHelper();

    }

    public function generateRequestBodyForImage(B2BProductRelationChange $b2bProductRelationChange): array
    {
        return $this->helper->generateRequestBodyForImage($b2bProductRelationChange);
    }

    public function generateRequestBodyForVideo(B2BProductRelationChange $b2bProductRelationChange): array
    {
        return $this->helper->generateRequestBodyForVideo($b2bProductRelationChange);
    }

    public function generateRequestBodyForDocument(B2BProductRelationChange $b2bProductRelationChange): array
    {
        return $this->helper->generateRequestBodyForDocument($b2bProductRelationChange);
    }
    
}
