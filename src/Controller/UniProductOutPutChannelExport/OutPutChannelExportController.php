<?php

namespace App\Controller\UniProductOutPutChannelExport;

use Pimcore\Model\DataObject\UniProductBase;
use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;
use RestApiBundle\Security\ApiKeyUserProvider;


#[Route('/channel-export-data/', name: 'output_channel_export')]
class OutPutChannelExportController extends FrontendController
{
	public $security;  

    public function __construct() {
		
		$this->security = new ApiKeyUserProvider();
		
	}

    #[Route('products', name: 'get_products', methods: ['GET'])]
    public function getProducts(Request $request): JsonResponse
    {
		$valid = $this->validateApiKey($request);
        if($valid) {
		$products = \Pimcore\Model\DataObject\UniProductBase::getList();
		$products->setCondition("regions IS NOT null"); 
		$fertProducts = (array) $products->load();
		echo "<pre>"; print_r($fertProducts); die;

		 return $this->json($fertProducts);
		} else {
          return $this->json('Api key is not valid!');
        }

        //return $this->json($this->externalHierarchyService->getProductsForExternalCategory($category));
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
   
   
   /*public function jsonSerialize(): mixed {
        return [
            'name' => $this->name,
            'description' => $this->description
        ]
    }*/

   
}
