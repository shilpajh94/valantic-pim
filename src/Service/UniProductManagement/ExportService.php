<?php

declare(strict_types=1);

namespace App\Service\UniProductManagement;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Html;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class ExportService
{
    public function exportAsXlsx(Spreadsheet $spreadsheet, int $objectId): Response
    {
        $filename = "export-$objectId.xlsx";
        $tempFile = sys_get_temp_dir() . "/$filename";

        $writer = new Xlsx($spreadsheet);
        $writer->save($tempFile);

        return $this->file($tempFile, $filename, ResponseHeaderBag::DISPOSITION_ATTACHMENT);
    }

    public function exportAsCsv(Spreadsheet $spreadsheet, int $objectId): Response
    {
        $filename = "export-$objectId.csv";
        $tempFile = sys_get_temp_dir() . "/$filename";

        $writer = new Csv($spreadsheet);
        $writer->setDelimiter(',');
        $writer->save($tempFile);

        return $this->file($tempFile, $filename, ResponseHeaderBag::DISPOSITION_ATTACHMENT);
    }

    public function exportAsHtml(Spreadsheet $spreadsheet): Response
    {
        $writer = new Html($spreadsheet);

        ob_start();
        $writer->save('php://output');
        $html = ob_get_clean();

        $htmlStyled = <<<HTML
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

        return new Response($htmlStyled);
    }

    private function file(string $path, string $filename, string $disposition): Response
    {
        return new Response(file_get_contents($path), Response::HTTP_OK, [
            'Content-Type' => mime_content_type($path),
            'Content-Disposition' => "$disposition; filename=$filename",
        ]);
    }
}
