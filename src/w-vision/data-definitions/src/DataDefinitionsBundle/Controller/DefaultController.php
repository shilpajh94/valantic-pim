<?php

namespace Wvision\Bundle\DataDefinitionsBundle\Controller;


use Pimcore\Controller\FrontendController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends FrontendController
{
    /**
     * @Route("/w-vision")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from w-vision');
    }

    public function defaultAction(Request $request)
    {
       // return new Response('Hello world from w-vision');
    }
}
