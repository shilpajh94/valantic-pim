<?php

declare(strict_types=1);

namespace App\Service\UniProductManagement;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Html;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Pimcore\Model\DataObject\UniProductCategoryExternal;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExternalCategoryExportService
{
    public function __construct(private readonly UniProductExternalHierarchyService $externalHierarchyService)
    {
    }

    /**
     * Exports a spreadsheet as an XLSX file and returns a streamed response.
     */
    public function exportAsXlsx(Spreadsheet $spreadsheet, int $objectId): StreamedResponse
    {
        $filename = sprintf('export-%d-%s.xlsx', $objectId, uniqid());

        $response = new StreamedResponse(function () use ($spreadsheet): void {
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
        });

        $response->headers->set('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->headers->set('Content-Disposition', $this->buildContentDisposition($filename));

        return $response;
    }

    /**
     * Exports a spreadsheet as a CSV file and returns a streamed response.
     */
    public function exportAsCsv(Spreadsheet $spreadsheet, int $objectId): StreamedResponse
    {
        $filename = sprintf('export-%d-%s.csv', $objectId, uniqid());

        $response = new StreamedResponse(function () use ($spreadsheet): void {
            $writer = new Csv($spreadsheet);
            $writer->setDelimiter(',');
            $writer->setUseBOM(true);
            $writer->save('php://output');
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', $this->buildContentDisposition($filename));

        return $response;
    }

    /**
     * Exports a spreadsheet as an HTML preview and returns a streamed response.
     */
    public function exportAsHtml(Spreadsheet $spreadsheet): StreamedResponse
    {
        $response = new StreamedResponse(function () use ($spreadsheet): void {
            $writer = new Html($spreadsheet);
            $writer->save('php://output');
        });

        $response->headers->set('Content-Type', 'text/html');

        return $response;
    }

    /**
     * Fetches data for the category.
     *
     * @return array<int, array{id: int}>.
     */
    public function getCategoryData(UniProductCategoryExternal $category): array
    {
        return $this->externalHierarchyService->getProductsForExternalCategory($category);
    }

    /**
     * Creates a spreadsheet with product data.
     *
     * @param array<int, array{
     *     __id?: string,
     *     ghp_full_code?: string,
     *     sap_material_number?: string,
     *     localized?: array{en?: array{sap_description?: string}}
     * }> $data
     */
    public function createSpreadsheet(array $data): Spreadsheet
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Export Data');

        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'GHP Code');
        $sheet->setCellValue('C1', 'SAP Mat Number');
        $sheet->setCellValue('D1', 'SAP Description');

        $row = 2;

        foreach ($data as $entry) {
            $sheet->setCellValue("A$row", $entry['__id'] ?? '');
            $sheet->setCellValue("B$row", $entry['ghp_full_code'] ?? '');
            $sheet->setCellValue("C$row", $entry['sap_material_number'] ?? '');

            $sapDescription = $entry['localized']['en']['sap_description'] ?? '';
            $sheet->setCellValue("D$row", $sapDescription);

            $row++;
        }

        foreach ($sheet->getColumnIterator() as $column) {
            $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }

        return $spreadsheet;
    }

    /**
     * Builds the content disposition header for the response.
     */
    private function buildContentDisposition(string $filename): string
    {
        return ResponseHeaderBag::DISPOSITION_ATTACHMENT . '; filename="' . addslashes($filename) . '"';
    }
}
