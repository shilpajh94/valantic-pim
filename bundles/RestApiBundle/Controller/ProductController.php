<?php
/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @package    RestApiBundle
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace RestApiBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use RestApiBundle\RestTrait\RestResponce;
use RestApiBundle\RestTrait\LanguageCode;
use RestApiBundle\Security\ApiKeyUserProvider;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Pimcore\Db;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends FrontendController
{
    /**
     * trait RestResponce
     */
    use RestResponce;

    /**
     * trait LanguageCode
     */
    use LanguageCode;
    
    /**
     * Service variable for service class
     * @var $service
     */
    public $service;
    
    /**
     * Security variable for security class
     * @var $service
     */
    public $security;
    
    private $vcRestAPILogFileName   =   '';

    protected $container;
    private $db;

    const RESPONSE = "Response:-";
    const VIRTUAL_CATALOG_DATA_NOT_FOUND = 'Virtual catalog data not found!';
    
    /**
     * Constructor function to set variables
     */
    public function __construct(ContainerInterface $container)
    {
        $this->db = Db::get();
        $this->container = $container;
        $this->service = $this->container->get('restapi_product_model_service');
        $this->vcRestAPILogFileName ='virtual_catalog_restapi_log_'. date("Ymd");
        $this->security = new ApiKeyUserProvider();
    }

    /**
     * Function to fetch products by ids,siopcode and UpdatedFrom to till date.
     *
     * Method({"GET"})
     *
     * @Route("/VirtualCatalog/products-old/")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     *
     * @throws \Exception
     */
   
    public function getProductdataAction(Request $request)
    {
        // Get Apikey validation.
        // $returnValidationFlag =   $this->validateApiKey($request);
        $returnValidationFlag = true;
        if($returnValidationFlag){
            // Get Parameter Array.
            $conditionArray =   $this->getParameterArray($request);
            // Get Virtual catalog data based on parameter request.
            // $productDetail  =   $this->service->getBrandSorter('en',$conditionArray);
            $productDetail  =   $this->service->getProduct('en',$conditionArray);
            // Log Data.
            \AppBundle\Logger\Simple::log($this->vcRestAPILogFileName, "Request:-".json_encode($conditionArray));
            // If Virtual catalog data not exist return error.
            
            if (empty($productDetail)) {
                \AppBundle\Logger\Simple::log($this->vcRestAPILogFileName, self::RESPONSE.json_encode
                ($this->responseCode('ObjectNotFound', self::VIRTUAL_CATALOG_DATA_NOT_FOUND)));
                return $this->jsonResponce($this->responseCode('ObjectNotFound',
                self::VIRTUAL_CATALOG_DATA_NOT_FOUND), 404);
            }
            \AppBundle\Logger\Simple::log($this->vcRestAPILogFileName, self::RESPONSE.json_encode($productDetail));
            return $this->jsonResponce($productDetail);
        }else{
            \AppBundle\Logger\Simple::log($this->vcRestAPILogFileName, self::RESPONSE.json_encode
            ($this->responseCode('ObjectNotFound', self::VIRTUAL_CATALOG_DATA_NOT_FOUND)));
            return $this->jsonResponce($this->responseCode('InvalidApiKey', 'Api key is not valid!'), 404);
        }
    }

    /**
     * Function to fetch products by ids,siopcode and UpdatedFrom to till date.
     *
     * Method({"GET"})
     *
     * @Route("/VirtualCatalog/products/")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     *
     * @throws \Exception
     */
   
     public function getProductDataNewAPIAction(Request $request)
     {
         // Get Apikey validation.
         $returnValidationFlag =    $this->validateApiKey($request);
         
         if($returnValidationFlag){
             // Get Parameter Array.
             $conditionArray =   $this->getParameterArrayAPI($request);
             // Get Virtual catalog data based on parameter request.
             // $productDetail  =   $this->service->getBrandSorter('en',$conditionArray);
             $productDetail  =   $this->service->getProductNewAPI('en',$conditionArray);
             // Log Data.
             \AppBundle\Logger\Simple::log($this->vcRestAPILogFileName, "Request:-".json_encode($conditionArray));
             // If Virtual catalog data not exist return error.
             if (empty($productDetail)) {
                \AppBundle\Logger\Simple::log($this->vcRestAPILogFileName, self::RESPONSE.json_encode
                 ($this->responseCode('ObjectNotFound', self::VIRTUAL_CATALOG_DATA_NOT_FOUND)));
                 return $this->jsonResponce($this->responseCode('ObjectNotFound',
                 self::VIRTUAL_CATALOG_DATA_NOT_FOUND), 404);
             }
             \AppBundle\Logger\Simple::log($this->vcRestAPILogFileName, self::RESPONSE.json_encode($productDetail));
             return $this->jsonResponce($productDetail);
         }else{
            \AppBundle\Logger\Simple::log($this->vcRestAPILogFileName, self::RESPONSE.json_encode
             ($this->responseCode('ObjectNotFound', self::VIRTUAL_CATALOG_DATA_NOT_FOUND)));
             return $this->jsonResponce($this->responseCode('InvalidApiKey', 'Api key is not valid!'), 404);
         }
     }

    /**
     * Function to fetch parameter details .
     *
     * @param Request $request
     *
     * @return array $parameterArray Parameters array
     *
     * @throws \Exception
     */
    private function getParameterArray($request){
        $parameterArray['apiKey'] = $request->headers->get('apiKey');
        $parameterArray['ids'] = $request->get('ids');
        $parameterArray['siop']= $request->get('siop');
        $parameterArray['page']= $request->get('page');
        $parameterArray['limit']= $request->get('limit');
        $parameterArray['updatedFrom'] = $request->get('updatedFrom');
        return  $parameterArray;
    }

    /**
     * Function to fetch parameter details .
     *
     * @param Request $request
     *
     * @return array $parameterArray Parameters array
     *
     * @throws \Exception
     */
    private function getParameterArrayAPI($request){
        $parameterArray['apiKey'] = $request->headers->get('apiKey');
        $parameterArray['ids'] = $request->get('ids');
        $parameterArray['siop']= $request->get('siopCode');
        $parameterArray['page']= $request->get('page');
        $parameterArray['limit']= $request->get('limit');
        $parameterArray['updatedFrom'] = $request->get('updatedAt');
        return  $parameterArray;
    }
    
    /**
     * Function to validate api key.
     *
     * @param Request $request
     *
     * @return boolean true/false
     *
     * @throws \Exception
     */
    private function validateApiKey($request){
       $apiKey = $request->headers->get('apiKey');
       if(!empty($apiKey)){
        $userName = $this->security->getUsernameForApiKey($apiKey);
        if(empty($userName)){
            return false;
        }
       }else{
        return false;
       }
        return true;
    }

}
