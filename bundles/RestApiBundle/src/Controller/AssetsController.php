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
use Pimcore\Tool;
use \Pimcore\Model\Asset;



class AssetsController extends FrontendController
{

    /**
     * Security variable for security class
     * @var $service
     */
    public $security;  

    /**
     * trait RestResponce
     */
    use RestResponce;

    /**
     * trait LanguageCode
     */
    use LanguageCode;
    
    private $db;

  //  const RESPONSE = "Response:-";
  //  const VIRTUAL_CATALOG_DATA_NOT_FOUND = 'Virtual catalog data not found!';
    
    /**
     * Constructor function to set variables
     */
    public function __construct(ContainerInterface $container)
    {
        $this->db = Db::get();
        $this->security = new ApiKeyUserProvider();
       
    }

    /**
     * Function to fetch assets .
     *
     * Method({"GET"})
     *
     * @Route("/api/assets")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     *
     * @throws \Exception
     */
   
     public function getProductDataAction(Request $request)
     {
		 
        $valid = $this->validateApiKey($request);
		$valid = true;
        if($valid) {
			
        $page = $request->headers->get('page');
	//	$page = 1;
        if($page && $page < 0) {
          return $this->jsonResponce($this->responseCode('ObjectNotFound',
             "No Data Found."), 404);
        }
        $offset = ($page - 1) * 15;
        if($offset > 0){
          $offset = $offset + 1;
        }
        $limit = 15 * $page;
       /* $query = "SELECT a.*, GROUP_CONCAT(t.name SEPARATOR ', ') as tagnames FROM `assets` as a left join tags_assignment as ta on (a.id = ta.cid and ta.ctype = 'asset') left join tags as t on (ta.tagid=t.id) where type in ('image','video','audio','document','text') and `path` LIKE '%Product Assets%' group by a.id";*/
       
       $query = "SELECT a.*, GROUP_CONCAT(t.name SEPARATOR ', ') as tagnames FROM `assets` as a 
		         left join tags_assignment as ta on (a.id = ta.cid and ta.ctype = 'asset') 
				 left join tags as t on (ta.tagid=t.id) where type in ('image','video','audio','document','text') 
		         and `path` LIKE '%Product Assets%'  
				 and t.name in ('Brochures & Catalogues', 'Videos & Animations', 'Images & Visuals', 'Print Ads', 'Online Ads', 'Social Media', 'Presentation', 'Product Certificates')
				 group by a.id";
       
        if(isset($page) && $page > 0) {
            $query .= " limit $offset, $limit";
        }
        $data =  $this->db->fetchAllAssociative($query);
		
        if (empty($data)) {
             return $this->jsonResponce($this->responseCode('ObjectNotFound',
             "No Data Found."), 404);
         }
		 $i = 0;
		 $s3hosturl = PIMCORE_TRANSFORMED_ASSET_URL;
		 $hostUrl = Tool::getHostUrl(); 
		 /*$hosturl = S3_HOST;
		 if(CDN_ENABLE == true){
			 $hosturl = CDN_HOST;
		 }*/
		
		 foreach($data as $arr){
			 $assetId = $arr["id"];
			 
			// $asset = Asset::getById($assetId); // Or retrieve the asset from an object field
			// $thumbPath = "";
    //if ($asset instanceof Asset\Image) {
	  /* $queryThumbnail = "SELECT name, filename, cid, filesize FROM `assets_image_thumbnail_cache` where cid = $assetId order by filesize ASC";
	   $tData =  $this->db->fetchAllAssociative($queryThumbnail);
	   if(!empty($tData[0]['name'])){
		  // echo "<pre>"; print_r($tData); die;
        $thumbnail = $asset->getThumbnail($tData[0]['name']); // "myThumbnail" is the name of the pre-configured thumbnail
		
		if(isset($thumbnail)){ //echo "<pre>"; print_r($thumbnail); die;
			$thumbPath = $thumbnail->getPath();
		} else {
			
			$thumbnailDefault = $asset->getThumbnail("pimcore-system-treepreview");
			$thumbPath = $thumbnailDefault->getPath();
		}
		
	   }*/
    //}
			 
			$arrayData[$i]["key"] = "MediaEntry.".$arr["filename"];
			$arrayData[$i]["mediaName"] = substr($arr["filename"], 0, strrpos($arr["filename"], '.'));
			$arrayData[$i]["document"]["title"] = "";
			$arrayData[$i]["document"]["_publishUrl"] = $s3hosturl . $arr["path"] . $arr["filename"];
			$arrayData[$i]["document"]["_dmS7Url"] = "";
			
			$thumbnail = "https://d1iu74bzymbqn3.cloudfront.net/assets/Product%20Assets/images.jpg";
			
			$arrayData[$i]["documentThumbnail"]["title"] = "";
			$arrayData[$i]["documentThumbnail"]["_publishUrl"] = $thumbnail;
			//$arrayData[$i]["documentThumbnail"]["_publishUrl"] = $hostUrl.$thumbPath;
			$arrayData[$i]["documentThumbnail"]["_dmS7Url"] = "";
			
			$tags = explode(",", $arr["tagnames"]);
			if(count($tags) > 0 && !empty($tags[0])){
			$j = 0;
			foreach($tags as $tag){
				$key = str_replace(' ', '', $tag);
				$arrayData[$i]["tags"][$j]["key"] = "Tag.".$key;
				$arrayData[$i]["tags"][$j]["label"] = $tag;
				$j ++;
			}
			} else {
				$arrayData[$i]["tags"] = "";
			}
			
			$i ++;
		 }
		 
		 $finalData["data"]["mediaEntryList"]['items'] = $arrayData;
         return $this->jsonResponce($finalData);
        } else {
          return $this->jsonResponce($this->responseCode('InvalidApiKey', 'Api key is not valid!'), 404);
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

