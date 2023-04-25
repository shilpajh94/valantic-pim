<?php

namespace IFSEU\RestApiBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends FrontendController
{
    /**
     * @Route("/rest_api/ifseu/")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from rest_api');
    }
}