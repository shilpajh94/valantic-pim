<?php

declare(strict_types=1);

namespace App\Service\UniProductManagement;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Html;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject\UniProductCategoryExternal;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExternalCategoryExportService
{
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

            ob_start();

            try {
                $writer->save('php://output');
                echo $this->wrapHtmlOutput(ob_get_clean());
            } finally {
                if (ob_get_length() > 0) {
                    ob_end_clean();
                }
            }
        });

        $response->headers->set('Content-Type', 'text/html');

        return $response;
    }

    /**
     * Fetches data for the category and its children recursively.
     *
     * @return array<int, array{id: int, name: string, parent: string|null}>.
     */
    public function getCategoryData(UniProductCategoryExternal $category): array
    {
        $data = [];
        $data[] = [
            'id' => $category->getId(),
            'name' => $category->getName(),
            'parent' => $category->getParent() instanceof AbstractObject ? $category->getParent() : null,
        ];

        foreach ($category->getChildren() as $child) {
            if ($child instanceof UniProductCategoryExternal) {
                $childData = $this->getCategoryData($child);
                $data = array_merge($data, $childData);
            }
        }

        return $data;
    }

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

        $sheet->setCellValue('A1', 'Category ID');
        $sheet->setCellValue('B1', 'Category Name');
        $sheet->setCellValue('C1', 'Parent Category');

        $row = 2;

        foreach ($data as $entry) {
            $sheet->setCellValue("A$row", $entry['id']);
            $sheet->setCellValue("B$row", $entry['name']);
            $sheet->setCellValue("C$row", $entry['parent']);
            $row++;
        }

        return $spreadsheet;
    }

    /**
     * Wraps the HTML content of the exported spreadsheet with additional styling and structure.
     */
    private function wrapHtmlOutput(string $html): string
    {
        return <<<HTML
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Export Preview</title>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            margin: 20px;
                        }
                        table {
                            border-collapse: collapse;
                            width: 100%;
                            margin-top: 20px;
                        }
                        table, th, td {
                            border: 1px solid #ddd;
                        }
                        th {
                            background-color: #f4f4f4;
                            padding: 10px;
                            text-align: left;
                        }
                        td {
                            padding: 8px;
                            text-align: left;
                        }
                        tr:nth-child(even) {
                            background-color: #f9f9f9;
                        }
                        tr:hover {
                            background-color: #f1f1f1;
                        }
                    </style>
                </head>
                <body>
                    <h1>Export Preview</h1>
                    $html
                </body>
                </html>
            HTML;
    }

    /**
     * Builds the content disposition header for the response.
     */
    private function buildContentDisposition(string $filename): string
    {
        return ResponseHeaderBag::DISPOSITION_ATTACHMENT . '; filename="' . addslashes($filename) . '"';
    }
}
