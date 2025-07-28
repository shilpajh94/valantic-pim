<?php

declare(strict_types=1);

namespace App\Controller\UniProductManagement;

use App\Service\UniProductManagement\CategoryDataService;
use App\Service\UniProductManagement\ExportService;
use App\Service\UniProductManagement\SpreadsheetService;
use Pimcore\Controller\FrontendController;
use Pimcore\Model\DataObject\UniProductCategoryExternal;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ExportController extends FrontendController
{
    private LoggerInterface $logger;
    private CategoryDataService $categoryDataService;
    private SpreadsheetService $spreadsheetService;
    private ExportService $exportService;

    public function __construct(
        LoggerInterface $logger,
        CategoryDataService $categoryDataService,
        SpreadsheetService $spreadsheetService,
        ExportService $exportService,
    ) {
        $this->logger = $logger;
        $this->categoryDataService = $categoryDataService;
        $this->spreadsheetService = $spreadsheetService;
        $this->exportService = $exportService;
    }

    #[\Symfony\Component\Routing\Attribute\Route(path: '/admin/export/preview', name: 'admin_export_preview')]
    public function preview(Request $request): Response
    {
        $objectId = $request->get('id');
        $format = $request->get('format', 'html');

        $this->logger->info("Export requested for object ID: $objectId, format: $format");

        $object = UniProductCategoryExternal::getById($objectId);

        if (!$object instanceof UniProductCategoryExternal) {
            $this->logger->error("Object with ID $objectId not found.");

            return new Response('Object not found.', Response::HTTP_NOT_FOUND);
        }

        $data = $this->categoryDataService->getCategoryData($object);
        $spreadsheet = $this->spreadsheetService->createSpreadsheet($data);

        try {
            switch ($format) {
                case 'xlsx':
                    return $this->exportService->exportAsXlsx($spreadsheet, $object->getId());

                case 'csv':
                    return $this->exportService->exportAsCsv($spreadsheet, $object->getId());

                case 'html':
                default:
                    return $this->exportService->exportAsHtml($spreadsheet);
            }
        } catch (\Exception $e) {
            $this->logger->error('Error during export: ' . $e->getMessage());

            return new Response('An error occurred during export.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
