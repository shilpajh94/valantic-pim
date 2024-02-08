<?php

namespace PimDataPostBundle\Lib\TempTablePopulator;

interface ITempTablePopulator
{
    public function truncateTempTable(): void;

    public function getPimModifiedRecordIds(): array;

    public function getTempTableDataForIds(array $pimIds): array;

    public function addHashesToTempTableData(array $tempTableData): array;

    public function insertDataInTempTable(array $insertTableData): void;
}