<?php

namespace CatalogBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends FrontendController
{
    /**
     * @Route("/catalog")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from catalog');
    }
}
