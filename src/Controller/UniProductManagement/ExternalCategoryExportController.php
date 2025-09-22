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
    /**
     * Export the product list preview of an external category as XLSX or CSV file.
     */

    #[Route('/admin/export/preview', name: 'admin_export_preview', options: ['expose' => true])]
    public function preview(Request $request, ExternalCategoryExportService $exportService, LoggerInterface $logger): Response
    {
        $objectId = $request->get('id');
        $format = $request->get('format', 'html');

        $logger->info(sprintf('Export requested for object ID: %s, format: %s', $objectId, $format));

        $object = UniProductCategoryExternal::getById($objectId);

        if (!$object instanceof UniProductCategoryExternal) {
            $logger->error(sprintf('Object with ID %s not found.', $objectId));

            return new Response('Object not found.', Response::HTTP_NOT_FOUND);
        }

        $data = $exportService->getCategoryData($object);
        $spreadsheet = $exportService->createSpreadsheet($data);

        try {
            return match ($format) {
                'xlsx' => $exportService->exportAsXlsx($spreadsheet, $object->getId()),
                'csv' => $exportService->exportAsCsv($spreadsheet, $object->getId()),
                default => $exportService->exportAsHtml($spreadsheet),
            };
        } catch (\Exception $e) {
            $logger->error(sprintf('Export failed: %s', $e->getMessage()));

            return new Response('Export failed.', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
