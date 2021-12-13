<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ContitechCS\CatalogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Description of ContentController
 *
 * @author rohitsrivastava
 */
class ContentController extends AbstractController {
    
    /**
     * @Route("/print_page")
     */
    public function pdfAction(Request $request) {


        //return new Response('Hello world from web2_print');
    }
}
