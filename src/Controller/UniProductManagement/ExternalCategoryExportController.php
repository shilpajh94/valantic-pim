<?php

declare(strict_types=1);

namespace App\Controller\UniProductManagement;

use App\Service\UniProductManagement\ExternalCategoryExportService;
use Pimcore\Controller\FrontendController;
use Pimcore\Model\DataObject\UniProductCategoryExternal;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ExternalCategoryExportController extends FrontendController
{
    public function __construct(
        private LoggerInterface $logger,
        private ExternalCategoryExportService $exportService,
    ) {
    }

    #[Route(path: '/admin/export/preview', name: 'admin_export_preview')]
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

        $data = $this->exportService->getCategoryData($object);
        $spreadsheet = $this->exportService->createSpreadsheet($data);

        try {
            return match ($format) {
                'xlsx' => $this->exportService->exportAsXlsx($spreadsheet, $object->getId()),
                'csv' => $this->exportService->exportAsCsv($spreadsheet, $object->getId()),
                default => $this->exportService->exportAsHtml($spreadsheet),
            };
        } catch (\Exception $e) {
            $this->logger->error('Export failed: ' . $e->getMessage());

            return new Response('Export failed.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
