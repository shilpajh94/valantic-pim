<?php

namespace AppBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends FrontendController
{
    /**
     * @Route("/test")
     *
     * @param Request $request
     */
    public function defaultAction(Request $request)
    {

        $service = $this->get('app.config_provider_service');
        p_r($service->getLevelAttributeMappingConfig());
        die("adsf");
    }


}
