<?php
namespace PimDataPostBundle\Lib\RelationChangeRegistrar\B2C;

use PimDataPostBundle\Model\DeltaManager\TempMasterTablesMeta;
use PimDataPostBundle\Lib\RelationChangeRegistrar\B2C\B2CRelationChangeRegistrarHelper;
use PimDataPostBundle\Lib\RelationChangeRegistrar\B2C\Dao\B2CProductRelationChangeRegistrarDao;
use PimDataPostBundle\AttributeConfigProvider\B2C\B2CProductAttributeConfigProvider;
class B2CProductRelationChangeRegistrar extends AbstractB2CRelationChangeRegistrar
{
    private $tempMasterTablesMeta;
    
    private $helper;
        
    private $b2cProductRelationChangeRegistrarDao;

    private $attributeConfigProvider;

    public function __construct(TempMasterTablesMeta $tempMasterTablesMeta) {
        $this->tempMasterTablesMeta = $tempMasterTablesMeta;
        $this->helper = new B2CRelationChangeRegistrarHelper();
        $this->b2cProductRelationChangeRegistrarDao = new B2CProductRelationChangeRegistrarDao($this->tempMasterTablesMeta);
        $this->attributeConfigProvider = new B2CProductAttributeConfigProvider();
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
        return $this->b2cProductRelationChangeRegistrarDao->fetchRecordsWhereRelationHashChanged();
    }
    
    protected function fetchNewActiveRecordsInTempTable(): array
    {
        return $this->b2cProductRelationChangeRegistrarDao->fetchNewActiveRecordsInTempTable();
    }

    protected function getAllRelationalAttributes(): array
    {
       return $this->attributeConfigProvider->getSalesForceRelationalAttributeConfig();
    }

    protected function processAllRelations(array $productIds): array
    {
        $relationalFieldConfig = $this->getAllRelationalAttributes();
        return $this->b2cProductRelationChangeRegistrarDao->fetchRelationalAttributeData($relationalFieldConfig, $productIds);
    }

    protected function saveChangedRelation(array $relationalData): void
    {
       $this->helper->saveChangedRelation($relationalData);
    }
}

