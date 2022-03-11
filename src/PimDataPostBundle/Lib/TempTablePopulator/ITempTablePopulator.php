<?php

namespace PimDataPostBundle\Lib\TempTablePopulator;

interface ITempTablePopulator
{
    public function truncateTempTable(): void;

    public function getPimModifiedRecordIds(): array;

    public function getTempTableDataForIds(array $pimIds): void;

    public function addHashesToTempTableData(array $tempTableData): array;

    public function insertDataInTempTable();
}