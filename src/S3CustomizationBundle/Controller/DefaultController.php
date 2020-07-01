<?php

namespace S3CustomizationBundle\Controller;

use Pimcore\Controller\FrontendController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends FrontendController
{
    /**
     * @Route("/s3_customization")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from s3_customization');
    }
}
