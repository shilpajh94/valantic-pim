<?php

namespace SapBwBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends FrontendController
{
    /**
     * @Route("/sap_bw")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from sap_bw');
    }
}
