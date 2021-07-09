<?php

namespace CSProductBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Bundle\AdminBundle\Controller\AdminController;

/**
 * @package CSProductBundle\Controller
 * @Route("/admin/csproduct/category")
 */

class CategoryController extends AdminController
{
    /**
     * @Route("/cs_product")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from cs_product');
    }

    /**
     * @Route("/get_categories")
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getCategories(Request $request)
    {
        $categoryList = new \Pimcore\Model\DataObject\CSHierarchy\Listing();
        $categoryList->load();
        //print_r($categoryList);die;

        $fieldArray = array();
        foreach ($categoryList as $list) {
            $fieldArrayTemp = array();
            $fieldArrayTemp['id'] = $list->getId();
            $fieldArrayTemp['name'] = $list->getName();
            $fieldArray[] = $fieldArrayTemp;
        }
        return $this->json(["categoryList" => $fieldArray]);
    }
}
