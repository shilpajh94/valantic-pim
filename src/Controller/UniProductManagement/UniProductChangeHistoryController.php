<?php

declare(strict_types=1);

namespace App\Controller\UniProductManagement;

use App\Repository\UniProductManagement\UniProductChangeHistoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class UniProductChangeHistoryController extends AbstractController
{
    #[Route('/admin/change-history', name: 'admin_change_history', methods: ['GET'], options: ['expose' => true])]
    public function index(Request $request, UniProductChangeHistoryRepository $repository, NormalizerInterface $normalizer): JsonResponse
    {
        $objectId = $request->query->get('objectId');
        $className = $request->query->get('className');

        if (!$objectId || !$className) {
            return new JsonResponse(['error' => 'Invalid parameters'], JsonResponse::HTTP_BAD_REQUEST);
        }

        $data = $repository->findByObjectId($objectId, ['timestamp' => 'DESC']);

        $transformedData = array_map(function ($history): array {
            $fieldLabels = $history->getFieldLabels();
            $changedFields = array_keys($history->getNewValues());

            $changedFieldLabels = array_map(fn ($fieldName) => $fieldLabels[$fieldName] ?? ucfirst($fieldName), $changedFields);

            return [
                'id' => $history->getId(),
                'timestamp' => $history->getTimestamp()?->format('Y-m-d H:i:s'),
                'user' => $history->getUser(),
                'changedFields' => $changedFieldLabels,
                'previousValue' => null,
                'newValue' => null,
            ];
        }, $data);

        return new JsonResponse([
            'status' => 'success',
            'data' => $transformedData,
            'total' => count($transformedData),
        ]);
    }

    #[Route('/admin/change-history/{id}', name: 'admin_change_history_detail', methods: ['GET'], options: ['expose' => true])]
    public function detailedView(int $id, UniProductChangeHistoryRepository $repository): JsonResponse
    {
        $history = $repository->find($id);

        if ($history === null) {
            throw new NotFoundHttpException('Change history record not found');
        }

        return new JsonResponse([
            'status' => 'success',
            'data' => [
                'id' => $history->getId(),
                'timestamp' => $history->getTimestamp()?->format('Y-m-d H:i:s'),
                'user' => $history->getUser(),
                'previousValues' => $history->getPreviousValues(),
                'newValues' => $history->getNewValues(),
                'fieldLabels' => $history->getFieldLabels(),
            ],
        ]);
    }
}
