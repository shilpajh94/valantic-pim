<?php

namespace RequiredAttributesBundle\Controller;

use RequiredAttributesBundle\Services\CustomizationService;
use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CustomizationController
 * @package RequiredAttributesBundle\Controller
 * @Route("/admin/required_attribute/customization")
 */
class CustomizationController extends FrontendController
{
    /**
     * @var CustomizationService
     */
    private $customizationService;

    /**
     * CustomizationController constructor.
     * @param CustomizationService $customizationService
     */
    public function __construct(CustomizationService $customizationService)
    {
        $this->customizationService = $customizationService;
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @Route("/get_label_value_data")
     */
    public function getLabelValueDataAction(Request $request)
    {
        $labelValueData = array();
        $objectId = $request->get("objectId");
        if($objectId){
            $labelValueData = $this->customizationService->getLabelValueDataForObjectId($objectId);
        }

        return $this->json(["success" => true,"data" => $labelValueData]);
    }


}
