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

namespace IFSEU\RestApiBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use IFSEU\RestApiBundle\RestTrait\RestResponce;
use IFSEU\RestApiBundle\RestTrait\LanguageCode;
use IFSEU\RestApiBundle\Security\ApiKeyUserProvider;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Logger\Simple;

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

    private $ehoseRestAPILogFileName   =   '';

    const RESPONSE = "Response:-";
    const EHOSE_DATA_NOT_FOUND = 'ehose data not found!';

    /**
     * Constructor function to set variables
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->service = $this->container->get('ifs_eu_restapi_product_model_services');
        $this->ehoseRestAPILogFileName ='restapi_ehose_ifseu_product_log_'. date("Ymd");
        $this->security = new ApiKeyUserProvider();
    }

    /**
     * Function to fetch products by ids,siopcode and UpdatedFrom to till date.
     *
     * Method({"GET"})
     *
     * @Route("/rest_api/ehose/ifseu/products")
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
        $returnValidationFlag =   $this->validateApiKey($request);

        if($returnValidationFlag){
            // Get Parameter Array.
            $conditionArray =   $this->getParameterArray($request);
            // Get eHose data based on parameter request.
            $productDetail  =   $this->service->getProduct('en',$conditionArray);
            // Log Data.
            Simple::log($this->ehoseRestAPILogFileName, "Request:-".json_encode($conditionArray));
            // If eHose data not exist return error.
            if (empty($productDetail)) {
                Simple::log($this->ehoseRestAPILogFileName, self::RESPONSE.
                json_encode($this->responseCode('ObjectNotFound', self::EHOSE_DATA_NOT_FOUND)));
                return $this->jsonResponce($this->responseCode('ObjectNotFound', self::EHOSE_DATA_NOT_FOUND), 404);
            }
            Simple::log($this->ehoseRestAPILogFileName, self::RESPONSE.json_encode($productDetail));
            return $this->jsonResponce($productDetail);
        }else{
            Simple::log($this->ehoseRestAPILogFileName, self::RESPONSE.
            json_encode($this->responseCode('ObjectNotFound', self::EHOSE_DATA_NOT_FOUND)));
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
