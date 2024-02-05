<?php

namespace ClassRelationBundle\Controller;

use Pimcore\Controller\FrontendController;
// use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends FrontendController
{
    /**
     * @Route("/class_relation")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from class_relation');
    }
}
