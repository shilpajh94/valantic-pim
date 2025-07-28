<?php

declare(strict_types=1);

namespace App\Service\UniProductManagement;

use PhpOffice\PhpSpreadsheet\Spreadsheet;

class SpreadsheetService
{
    /**
     * Creates a spreadsheet with category data.
     *
     * @param array<int, array{id: int, name: string, parent: string|null}> $data
     */
    public function createSpreadsheet(array $data): Spreadsheet
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Export Data');

        // Set headers
        $sheet->setCellValue('A1', 'Category ID');
        $sheet->setCellValue('B1', 'Category Name');
        $sheet->setCellValue('C1', 'Parent Category');

        // Fill data rows
        $row = 2;

        foreach ($data as $entry) {
            $sheet->setCellValue("A$row", $entry['id']);
            $sheet->setCellValue("B$row", $entry['name']);
            $sheet->setCellValue("C$row", $entry['parent']);
            $row++;
        }

        return $spreadsheet;
    }
}
