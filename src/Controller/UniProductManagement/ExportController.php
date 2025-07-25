<?php

declare(strict_types=1);

namespace App\Controller\UniProductManagement;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Html;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Pimcore\Controller\FrontendController;
use Pimcore\Model\DataObject\UniProductCategoryExternal;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class ExportController extends FrontendController
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    #[\Symfony\Component\Routing\Attribute\Route(path: '/admin/export/preview', name: 'admin_export_preview')]
    public function preview(Request $request): Response
    {
        $objectId = $request->get('id');
        $format = $request->get('format', 'html'); // Default format is 'html'

        $this->logger->info("Export requested for object ID: $objectId, format: $format");

        $object = UniProductCategoryExternal::getById($objectId);

        if (!$object instanceof UniProductCategoryExternal) {
            $this->logger->error("Object with ID $objectId not found.");

            return new Response('Object not found.', Response::HTTP_NOT_FOUND);
        }

        $this->logger->info('Object found: ' . $object->getName());

        // Fetch data for the category and its children
        $data = $this->getCategoryData($object);

        // Generate the spreadsheet
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

        // Handle different formats (xlsx, csv, html)
        try {
            switch ($format) {
                case 'xlsx':
                    return $this->exportAsXlsx($spreadsheet, $object->getId());

                case 'csv':
                    return $this->exportAsCsv($spreadsheet, $object->getId());

                case 'html':
                default:
                    return $this->exportAsHtml($spreadsheet);
            }
        } catch (\Exception $e) {
            $this->logger->error('Error during export: ' . $e->getMessage());

            return new Response('An error occurred during export.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Fetches data for the category and its children recursively.
     *
     * @param UniProductCategoryExternal $category The category object.
     *
     * @return array<int, array{id: int, name: string, parent: string|null}> Array of category data.
     */
    private function getCategoryData(UniProductCategoryExternal $category): array
    {
        $data = [];

        // Add the parent category
        $data[] = [
            'id' => $category->getId(),
            'name' => $category->getName(),
            'parent' => $category->getParent() instanceof \Pimcore\Model\DataObject\AbstractObject ? $category->getParent() : null,
        ];

        // Add children categories recursively
        foreach ($category->getChildren() as $child) {
            if ($child instanceof UniProductCategoryExternal) {
                $childData = $this->getCategoryData($child); // Recursive call
                $data = array_merge($data, $childData); // Merge child data into the parent array
            }
        }

        return $data;
    }

    private function exportAsXlsx(Spreadsheet $spreadsheet, int $objectId): Response
    {
        $filename = "export-$objectId.xlsx";
        $tempFile = sys_get_temp_dir() . "/$filename";

        $writer = new Xlsx($spreadsheet);
        $writer->save($tempFile);

        $this->logger->info("XLSX export successful for object ID: $objectId");

        return $this->file($tempFile, $filename, ResponseHeaderBag::DISPOSITION_ATTACHMENT);
    }

    private function exportAsCsv(Spreadsheet $spreadsheet, int $objectId): Response
    {
        $filename = "export-$objectId.csv";
        $tempFile = sys_get_temp_dir() . "/$filename";

        $writer = new Csv($spreadsheet);
        $writer->setDelimiter(',');
        $writer->save($tempFile);

        $this->logger->info("CSV export successful for object ID: $objectId");

        return $this->file($tempFile, $filename, ResponseHeaderBag::DISPOSITION_ATTACHMENT);
    }

    private function exportAsHtml(Spreadsheet $spreadsheet): Response
    {
        $writer = new Html($spreadsheet);

        // Capture the HTML output using output buffering
        ob_start();
        $writer->save('php://output');
        $html = ob_get_clean();

        // Add custom styles to generated HTML
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

        $this->logger->info('HTML export successful.');

        return new Response($htmlStyled);
    }
}
