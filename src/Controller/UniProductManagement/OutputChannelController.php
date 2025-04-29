<?php

namespace App\Controller\UniProductManagement;

use App\Service\UniProductManagement\UniProductExternalHierarchyService;
use Elastic\Elasticsearch\Exception\ClientResponseException;
use Elastic\Elasticsearch\Exception\ServerResponseException;
use Pimcore\Model\DataObject\UniProductCategoryExternal;
use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/uni/product-management/output-channel', name: 'uni_product_management_output_channel')]
class OutputChannelController extends AbstractController
{
    public function __construct(private readonly UniProductExternalHierarchyService $externalHierarchyService) {}

    #[Route('/{id}/products', name: 'uni_product_management_output_channel_get_products', methods: ['GET'])]
    public function getProducts(int $id): JsonResponse
    {
        $category = UniProductCategoryExternal::getById($id);

        if (!$category instanceof UniProductCategoryExternal) {
            throw new NotFoundHttpException();
        }

        return $this->json($this->externalHierarchyService->getProductsForExternalCategory($category));
    }

    /**
     * @return array<string, mixed>
     *
     * @throws ClientResponseException
     * @throws ServerResponseException
     * @throws \JsonException
     */
    #[Route('/products-iframe/{objectId}', name: 'uni_product_management_output_channel_products_iframe', methods: ['GET'])]
    #[Template('uni/product_management/output_channel/products.html.twig')]
    public function productsIframe(Request $request, ?int $objectId = null): array
    {
        $context = json_decode($request->query->getString('context'), true, 512, JSON_THROW_ON_ERROR);
        $objectId ??= $context['objectId'] ?? null;

        if ($objectId === null) {
            throw new NotFoundHttpException();
        }

        $category = UniProductCategoryExternal::getById($objectId);

        if (!$category instanceof UniProductCategoryExternal) {
            throw new NotFoundHttpException();
        }

        $result = $this->externalHierarchyService->getProductsForExternalCategory($category);

        return [
            'products' => $result,
            'language' => 'en', // TODO
        ];
    }
}
