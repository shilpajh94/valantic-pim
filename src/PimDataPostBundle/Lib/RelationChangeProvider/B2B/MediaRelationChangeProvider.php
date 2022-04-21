<?php

namespace PimDataPostBundle\Lib\RelationChangeProvider\B2B;
use PimDataPostBundle\AttributeConfigProvider\B2B\B2BProductAttributeConfigProvider;
use PimDataPostBundle\Lib\RelationChangeProvider\B2B\Dao\MediaRelationChangeProviderDao;

class MediaRelationChangeProvider
{
    private $dao;

    private $attributeConfigProvider;

    public function __construct() {
        $this->dao = new MediaRelationChangeProviderDao();   
        $this->attributeConfigProvider = new B2BProductAttributeConfigProvider();
    }

    public function getProductMediaImage(): array
    {
        $ImageAttributes = $this->attributeConfigProvider->getMediaAttributeConfig();
        return $this->dao->getProductMediaImage($ImageAttributes);
    }

    public function getProductMediaVideo(): array
    {
        $VideoAttributes = $this->attributeConfigProvider->getMediaAttributeConfig();
        return $this->dao->getProductMediaVideo($VideoAttributes);
    }

    public function getProductMediaAdvanceManyToManyRelation(): array
    {
        $ImageAttributes = $this->attributeConfigProvider->getMediaAttributeConfig();
        return $this->dao->getProductMediaAdvanceManyToManyRelation($ImageAttributes);
    }
}