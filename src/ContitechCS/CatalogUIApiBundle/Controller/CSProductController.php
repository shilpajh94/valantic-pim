<?php

namespace ContitechCS\CatalogUIApiBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use ContitechCS\CatalogUIApiBundle\Services\Rest;
use ContitechCS\CatalogUIApiBundle\Interfaces\ConstantsInterface;

use \Exception;

class CSProductController extends FrontendController implements ConstantsInterface
{
    protected $httpCode = 200;

    /**
     * @param Request $request
     *
     * @return Response Object
     *
     * @Route("/api/product-group", methods={"GET"}, requirements={
     * "Content-Type" = "application/json"
     * })
     */
    public function getProductGroup(Request $request)
    {   
        try
        {
            return Rest::output(true);
        }
        catch (Exception $e) 
        {  
            return Rest::output(false, $e->getMessage());
        }
    }
}
