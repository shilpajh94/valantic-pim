<?php

namespace ContitechCS\CatalogUIApiBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use ContitechCS\CatalogUIApiBundle\Services\Rest;
use ContitechCS\CatalogUIApiBundle\Services\ProductApiService;
use ContitechCS\CatalogUIApiBundle\Interfaces\ConstantsInterface;
use ContitechCS\CatalogUIApiBundle\Security\ApiKeyUserProvider;
use Pimcore\Model\DataObject;

use \Exception;

class ProductApiController extends FrontendController implements ConstantsInterface
{
    protected $httpCode = 200;

    /**
     * Security variable for security class
     * @var $service
     */
    public $security;

    public $productApiService;

    /**
     * Constructor function to set variables
     */
    public function __construct()
    {   
        $this->security = new ApiKeyUserProvider();
        $this->productApiService = new ProductApiService();

        // validate api key
        try
        {
            $response = $this->security->validateApiKey();
            if(!$response)
            {   
                $response = new \Symfony\Component\HttpFoundation\Response();
                $response->setStatusCode(401);
                $response->setContent(json_encode(['status' => false,'code' => 401, 'data' => [], 'msg' => self::API_KEY_INVALID_MSG]));
                $response->send();exit;
            }
        }
        catch (Exception $e) 
        {  
            $response = new \Symfony\Component\HttpFoundation\Response();
            $response->setStatusCode(400);
            $response->setContent(json_encode(['status' => false,'code'=>400, 'data' => [], 'msg' => $e->getMessage()]));
            $response->send();exit;
        }
    }

    /**
     * @param Request $request
     *
     * @return Response Object
     *
     * @Route("/api/get-product-groups", methods={"GET"}, requirements={
     * "Content-Type" = "application/json"
     * })
     */
    public function getCSProductAction(Request $request)
    {   
        try
        {   
            $language = $request->get('language');

            if(!$language)
            {
                return Rest::output(false, self::LANGUAGE_TXT.' '.self::REQUIRED_MSG);
            }
            
            $result = $this->productApiService->getCSProducts($language);

            return Rest::output(true,self::RECORD_LIST_MSG,$this->httpCode,$result);
        }
        catch (Exception $e) 
        {  
            return Rest::output(false, $e->getMessage());
        }
    }

    /**
     * @param Request $request
     *
     * @return Response Object
     *
     * @Route("/api/product-group-catalogs", methods={"GET"}, requirements={
     * "Content-Type" = "application/json"
     * })
     */
    public function getProductGroupCatalogs(Request $request)
    {   
        try
        {   
            $productGroups  = $request->get('productGroups');
            $region         = $request->get('region');
            $language       = $request->get('language');

            if(!$productGroups){
                return Rest::output(false, self::PRODUCT_GROUP_TXT.' '.self::REQUIRED_MSG);
            }

            if(!$region){
                return Rest::output(false, self::REGION_TXT.' '.self::REQUIRED_MSG);
            }

            if(!$language){
                return Rest::output(false, self::LANGUAGE_TXT.' '.self::REQUIRED_MSG);
            }

            $result = $this->productApiService->getProductGroupCatalogs();

            return Rest::output(true,self::RECORD_LIST_MSG,$this->httpCode,$result);
        }
        catch (Exception $e) 
        {  
            return Rest::output(false, $e->getMessage());
        }
    }

    /**
     * @param Request $request
     *
     * @return Response Object
     *
     * @Route("/api/get-regions", methods={"GET"}, requirements={
     * "Content-Type" = "application/json"
     * })
     */
    public function getRegions(Request $request)
    {   
        try
        {
            $result = $this->productApiService->getRegion();

            return Rest::output(true,self::RECORD_LIST_MSG,$this->httpCode,$result);
        }
        catch (Exception $e) 
        {  
            return Rest::output(false, $e->getMessage());
        }
    }  
}
