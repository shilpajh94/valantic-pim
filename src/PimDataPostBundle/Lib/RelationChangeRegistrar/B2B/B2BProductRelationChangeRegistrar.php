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

    public function registerChangedRelation(): void
    {
        $relationsChanged = $this->fetchRecordsWhereRelationHashChanged();
        $newRelations = $this->fetchNewActiveRecordsInTempTable();

        $relationDataArray = $this->processAllRelations(array_merge($relationsChanged,$newRelations));
        $this->saveChangedRelation($relationDataArray);
    }
    
    protected function fetchRecordsWhereRelationHashChanged(): array
    {
        return $this->b2bProductRelationChangeRegistrarDao->fetchRecordsWhereRelationHashChanged();
    }
    
    protected function fetchNewActiveRecordsInTempTable(): array
    {
        return $this->b2bProductRelationChangeRegistrarDao->fetchNewActiveRecordsInTempTable();
    }

    protected function getAllRelationalAttributes(): array
    {
       return $this->attributeConfigProvider->getSalesForceRelationalAttributeConfig();
    }

    protected function processAllRelations(array $productIds): array
    {
        $relationalFieldConfig = $this->getAllRelationalAttributes();
        return $this->b2bProductRelationChangeRegistrarDao->fetchRelationalAttributeData($relationalFieldConfig, $productIds);
    }

    protected function saveChangedRelation(array $relationalData): void
    {
       $this->helper->saveChangedRelation($relationalData);
    }
}

