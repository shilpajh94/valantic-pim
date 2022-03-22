<?php
namespace PimDataPostBundle\Lib\RelationChangeRegistrar\B2B;

use PimDataPostBundle\Lib\RelationChangeRegistrar\IRelationChangeRegistrar;

abstract class AbstractB2BRelationChangeRegistrar implements IRelationChangeRegistrar
{
    public abstract function registerChangedRelation();

    protected abstract function fetchRecordsWhereRelationHashChanged(): array;

    protected abstract function fetchNewActiveRecordsInTempTable(): array;

    protected abstract function getAllRelationalAttributes(): array;

    /**
     * iterate all the records from fetchRecordsWhereRelationHashChanged
     *      iterate all the relational attributes
     *      identify the attribute where the value changed using data of temp and master table
     *          for this attribute create a relation change object and save this object
     */
    protected abstract function processAllRelations(array $products, bool $isNewRecord): array;

    /**
     * accept the model for the relation change object. so create the model first
     */
    protected abstract function saveChangedRelation(array $relationalData): void;
}