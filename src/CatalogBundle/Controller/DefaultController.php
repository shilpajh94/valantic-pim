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
    
    /**
     * @Route("/catalog/get-available-headers")
     */
    public function getAvailableHeaders(Request $request) {
        $arr = array (
            'storeData' => array (
                0 => array ('StatisticalDimension', 'Statistical Dimension'),
                1 => array ('ServiceDescription', 'Service Description'),
                2 => array ('PR','PR'),
                3 => array ('GSI','GSI')
            )
        );
        echo json_encode($arr); die;
    }
}
