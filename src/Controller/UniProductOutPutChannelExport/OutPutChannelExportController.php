<?php

namespace App\Controller\UniProductOutPutChannelExport;

use App\Service\UniProductManagement\UniProductOutPutChannelExportService;
use Pimcore\Model\DataObject\UniProductCategoryExternal;
use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;
use RestApiBundle\Security\ApiKeyUserProvider;


/*

@Author: Arun Kumar
 This class is exposing endpoints to export data to output channel
*/

#[Route('/channel-export-data/', name: 'output_channel_export')]
class OutPutChannelExportController extends FrontendController
{
	private $security; 

    public function __construct(private readonly UniProductOutPutChannelExportService $externalHierarchyService) {
		$this->security = new ApiKeyUserProvider();

		
	}
	
/*
  This function exposing all products data from Uni product Data Model 
*/
    #[Route('products', name: 'get_products', methods: ['GET'])]
    public function getProducts(Request $request): JsonResponse
    {
		$valid = $this->validateApiKey($request);
        if($valid) {

        return $this->json($this->externalHierarchyService->getAllProducts());

		} else {
          return $this->json('Api key is not valid!');
        }
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
      $apiKey = htmlspecialchars($request->headers->get('apiKey'));
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
