<?php
namespace PimDataPostBundle\Lib\RelationChangeRegistrar\B2B;

use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;
use PimDataPostBundle\Lib\RelationChangeRegistrar\RelationChangeRegistrarHelper;
use PimDataPostBundle\Lib\RelationChangeRegistrar\B2B\Dao\B2BProductRelationChangeRegistrarDao;
use PimDataPostBundle\AttributeConfigProvider\B2B\B2BProductAttributeConfigProvider;
class B2BProductRelationChangeRegistrar extends AbstractB2BRelationChangeRegistrar
{
    private $tempMasterTablesMeta;
    
    private $helper;
        
    private $b2bProductRelationChangeRegistrarDao;

    private $attributeConfigProvider;

    public function __construct(TempMasterTablesMeta $tempMasterTablesMeta) {
        $this->tempMasterTablesMeta = $tempMasterTablesMeta;
        $this->helper = new RelationChangeRegistrarHelper($this->tempMasterTablesMeta);
        $this->b2bProductRelationChangeRegistrarDao = new B2BProductRelationChangeRegistrarDao($this->tempMasterTablesMeta);
        $this->attributeConfigProvider = new B2BProductAttributeConfigProvider();
    }

    public function registerChangedRelation(): array
    {
        // $relationHashChangedRecords = $this->fetchRecordsWhereRelationHashChanged();
        return $this->getAllRelationalAttributes();
    }
    
    public function fetchRecordsWhereRelationHashChanged(): array
    {
        return $this->b2bProductRelationChangeRegistrarDao->fetchRecordsWhereRelationHashChanged();
    }
    
    public function fetchNewActiveRecordsInTempTable(): array
    {
        return $this->b2bProductRelationChangeRegistrarDao->fetchNewActiveRecordsInTempTable();
    }

    public function getAllRelationalAttributes(): array
    {
       return $this->attributeConfigProvider->getSalesForceRelationalAttributeConfig();
    }

    public function processAllRelations()
    {
       //processAllRelations
    }

    public function saveChangedRelation()
    {
       //saveChangedRelation
    }
}

