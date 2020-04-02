<?php

namespace RequiredAttributesBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends FrontendController
{
    /**
     * @Route("/required_attributes")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from required_attributes');
    }
}
