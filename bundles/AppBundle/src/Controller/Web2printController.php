<?php

namespace AppBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class Web2printController extends FrontendController
{
    /**
     * @Route("/test")
     *
     * @param Request $request
     */
    public function template1Action(Request $request)
    {

    }

    public function template2Action(Request $request)
    {

    }


}
