<?php

namespace IFSEU\RestApiBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends FrontendController
{
    /**
     * @Route("/rest_api/afseu/")
     */
    public function indexAction(Request $request)
    {
        dd(\Pimcore::getContainer());
        return new Response('Hello world fromss rest_api');
    }
}
