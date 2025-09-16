<?php

declare(strict_types=1);

namespace App\Controller\UniProductManagement;

use App\Service\UniProductManagement\OutputConfiguratorService;
use Pimcore\Model\DataObject\UniProductDataOutputConfiguration;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OutputConfiguratorController extends AbstractController
{
    #[\Symfony\Component\Routing\Attribute\Route('/admin/output-configurator/export/{id}', name: 'admin_output_configurator_export', options: ['expose' => true])]
    public function export(int $id, OutputConfiguratorService $outputConfiguratorService): Response
    {
        $config = UniProductDataOutputConfiguration::getById($id);

        if (!$config instanceof UniProductDataOutputConfiguration) {
            throw new NotFoundHttpException();
        }

        try {
            $tempFilePath = $outputConfiguratorService->generateExport($config);

            $response = new BinaryFileResponse($tempFilePath);
            $response->setContentDisposition(
                ResponseHeaderBag::DISPOSITION_ATTACHMENT,
                basename($tempFilePath),
            );

            $response->deleteFileAfterSend(true);

            return $response;
        } catch (\Exception $e) {
            return new Response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
