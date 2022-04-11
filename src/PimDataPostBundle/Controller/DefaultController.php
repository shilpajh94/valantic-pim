<?php

namespace PimDataPostBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends FrontendController
{
    /**
     * @Route("/pim_data_post")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from pim_data_post');
    }


    /**
     * @Route("/default_email_template")
     */
    public function defaultEmailTemplateAction(Request $request)
    {

    }
}
