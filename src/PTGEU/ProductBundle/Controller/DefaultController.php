<?php

namespace PTGEU\ProductBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends FrontendController
{
    /**
     * @Route("/ptgeu_product")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from ptgeu_product');
    }
}
