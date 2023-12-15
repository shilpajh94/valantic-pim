<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CatalogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Controller\FrontendController;

/**
 * Description of ContentController
 *
 * @author rohitsrivastava
 */
class ContentController extends FrontendController {
    
    /**
     * @Route("/print_page")
     */
    public function pdfAction(Request $request) {


        //return new Response('Hello world from web2_print');
    }
    
}
