<?php

namespace PimDataPostBundle\Lib\TempTablePopulator;

interface ICategoryActiveFlagHandler
{
    public function getAllCategoryIdsInMasterTable(): array;

    public function getValueForActiveFlag(array $categoryIds): array;

    /**
     * Change the value only if the value in the category was different
     * If the value is equal to what is needed to be set then do not hit save on the category object
     */
    public function updateActiveFlagValue(array $idAndActiveFlagValueArray): void;

    public function getCategoryIdsWhereRelationWithProductChanged(): array;

    public function isCategoryPresentInMasterTable(int $categoryId): bool;

    public function isCategoryActiveInMasterTable(int $categoryId): bool;
}