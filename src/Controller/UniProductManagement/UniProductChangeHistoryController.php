<?php

declare(strict_types=1);

namespace App\Controller\UniProductManagement;

use App\Entity\UniProductChangeHistory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;

class UniProductChangeHistoryController extends AbstractController
{
    #[\Symfony\Component\Routing\Attribute\Route('/admin/change-history', name: 'admin_change_history', methods: ['GET'], options: ['expose' => true])]
    public function index(Request $request, EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $objectId = $request->query->get('objectId');
        $className = $request->query->get('className');

        if (!$objectId || !$className) {
            return new JsonResponse(['error' => 'Invalid parameters'], JsonResponse::HTTP_BAD_REQUEST);
        }

        $repository = $em->getRepository(UniProductChangeHistory::class);
        $data = $repository->findBy(
            ['objectId' => $objectId, 'objectClass' => 'Pimcore\Model\DataObject\\' . $className],
            ['timestamp' => 'DESC'],
        );

        $jsonData = $serializer->serialize($data, 'json');

        return new JsonResponse([
            'status' => 'success',
            'data' => json_decode($jsonData, true),
            'count' => count($data),
        ]);
    }

    #[\Symfony\Component\Routing\Attribute\Route('/admin/change-history/{id}', name: 'admin_change_history_detail', methods: ['GET'], options: ['expose' => true])]
    public function detailedView(int $id, EntityManagerInterface $em): JsonResponse
    {
        $repository = $em->getRepository(UniProductChangeHistory::class);
        $history = $repository->find($id);

        return new JsonResponse([
            'status' => 'success',
            'data' => [
                'changeFields' => $history->getChangeFields(),
                'previousValues' => $history->getPreviousValue(),
                'newValues' => $history->getNewValue(),
            ],
        ]);
    }
}
