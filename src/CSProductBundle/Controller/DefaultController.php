<?php

namespace CSProductBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Model\DataObject;

/**
 * @package CSProductBundle\Controller
 * @Route("/admin/csproduct/default")
 */

class DefaultController extends FrontendController
{
    /**
     * @Route("/cs_product")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from cs_product');
    }

    /**
     * @Route("/save_product")
     *
     * @param Request $request
     * 
     */
    public function saveProduct(Request $request)
    {
        $product = new \Pimcore\Model\DataObject\CSProducts;
        $parentId = $request->get('productCategoryId');
        $parentIdPath = DataObject\Service::getIdPath($parentId);
        //echo $parentIdPath;
        $productName = $request->get('productName');
        $product->setKey($productName, 'object');
        $product->setName($productName, 'en');
        $product->setParentId($parentId);
        $product->setPublished(TRUE);
        $product->save();

        // echo $request->get('productName');
        // echo "\n\n";
        // echo $request->get('productCategory');
    }
}
