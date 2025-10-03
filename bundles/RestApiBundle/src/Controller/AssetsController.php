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
        if($valid) {
        $page = $request->get('page');
		$perPageRecords = $request->get('recordsPerPage');
		$sortingField = $request->get('sortingField');
		$SortingOrder = $request->get('SortingOrder');
		$mediaNameFilter = $request->get('mediaNameFilter');
		$primaryTag = $request->get('primaryTag');
		$secondaryTag = $request->get('secondaryTag');

		if(($page && $page < 0) || ($perPageRecords && $perPageRecords < 0)) {
          return $this->jsonResponce($this->responseCode('ObjectNotFound',
             "No Data Found."), 404);
        }
		
		if(!isset($perPageRecords)){
			$perPageRecords = 15;
		}
        
        if(!isset($page)){
			$page = 1;
		}
        $offset = ($page - 1) * $perPageRecords;
       // if($offset > 0){
        //  $offset = $offset + 1;
       // }
        $limit = $perPageRecords;
 
       
       $query = "SELECT a.*, GROUP_CONCAT(t.name SEPARATOR ', ') as tagnames FROM `assets` as a 
		         left join tags_assignment as ta on (a.id = ta.cid and ta.ctype = 'asset') 
				 left join tags as t on (ta.tagid=t.id) where type in ('image','video','audio','document','text') 
		         and `path` LIKE '%Product Assets%'  
				 ";
		if(!isset($primaryTag)){	 
       	$query .= " and t.name in ('Brochures & Catalogues', 'Videos & Animations', 'Images & Visuals', 'Social Media', 'Presentation', 'Aftermarket', 'Conveying Solutions','Dynamic & Suspension Solutions', 'Hydraulics', 'Industrial Hose', 'Power Transmission Solutions')";
		}
		if(isset($mediaNameFilter)){ 
			$query .= " AND LOWER(a.filename) like LOWER('%$mediaNameFilter%')"; 
		}
		if(isset($primaryTag) && !isset($secondaryTag)){
			
				$query .= " AND t.name = '$primaryTag'";
			
		}
		if(isset($secondaryTag) && isset($primaryTag)){
		//	$query .= " AND t.name in ('$primaryTag', '$secondaryTag')";
			$query .= " AND t.name = '$secondaryTag'";
		}
		
		
		
		$query .= " group by a.id";
		
		if(isset($sortingField) && $sortingField == "mediaName" && (isset($SortingOrder) && ($SortingOrder == "ASC" || $SortingOrder == "DESC"))){
			$query .= " order by a.filename $SortingOrder";
		}
		
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
		
		 foreach($data as $arr){
			 $assetId = $arr["id"];
			 $path = str_replace("/PTS/", "/PTG/", $arr["path"]);
			 $asset = Asset::getById($assetId);
			 $metadata = $asset->getMetadata();
			 $thumbNailImg = "";
			 $thumbNailTitle = "";
			 foreach($metadata as $meta){
			     if($meta["name"] == "Thumbnail Image"){
			         $thumbnailData = $meta["data"];
			         
			         $thumbNailImg = $s3hosturl . $thumbnailData->getPath().$thumbnailData->getFilename();
			     } else if($meta["name"] == "External Title"){
			         $thumbNailTitle = $meta["data"];
			     }
			     
			 }
		
		
			$arrayData[$i]["key"] = "MediaEntry.".$arr["filename"];
			$arrayData[$i]["mediaName"] = substr($arr["filename"], 0, strrpos($arr["filename"], '.'));
			$arrayData[$i]["document"]["title"] = $thumbNailTitle;
			$arrayData[$i]["document"]["_publishUrl"] = $s3hosturl . $path . $arr["filename"];
			$arrayData[$i]["document"]["_dmS7Url"] = "";
			if(!$thumbNailImg){
			    $thumbNailImg = "https://d1iu74bzymbqn3.cloudfront.net/assets/Product%20Assets/images.jpg";
			}
			
			$arrayData[$i]["documentThumbnail"]["title"] = "";
			$arrayData[$i]["documentThumbnail"]["_publishUrl"] =   $thumbNailImg;
			//$arrayData[$i]["documentThumbnail"]["_publishUrl"] = $hostUrl.$thumbPath;
			$arrayData[$i]["documentThumbnail"]["_dmS7Url"] = $thumbNailImg;
			
			$tags = explode(",", $arr["tagnames"]);
			if(count($tags) > 0 && !empty($tags[0])){
			    
			if(isset($secondaryTag) && isset($primaryTag)){
			    $primaryTagkey = str_replace(' ', '', $primaryTag);
				$arrayData[$i]["tags"][0]["key"] = "Tag.".$primaryTagkey;
				$arrayData[$i]["tags"][0]["label"] = $primaryTag;
		    }
			    
			$j = 1;
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
     * Function to fetch Primary and Secondary Tags .
     *
     * Method({"GET"})
     *
     * @Route("/api/assets/tags")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     *
     * @throws \Exception
     */
   
     public function getAssetsTagsAction(Request $request)
     {
		$valid = $this->validateApiKey($request);
		$json["data"]["mediaByPath"]["item"] = [];
        if($valid) {
			
				$primaryTags = ['Brochures & Catalogues', 'Videos & Animations', 'Images & Visuals', 'Social Media', 'Presentation'];
				$secondaryTags = ['Aftermarket', 'Conveying Solutions','Dynamic & Suspension Solutions', 'Hydraulics', 'Industrial Hose', 'Power Transmission Solutions'];
				$pTags = [];
				$sTags = [];
				$i = 0;
				foreach($primaryTags as $pTag){
					$key = str_replace(' ', '', $pTag);
					$pTags[$i]["key"] = "Tag.".$key;
					$pTags[$i]["label"] = $pTag;
					$i ++;
				}
				$json["data"]["mediaByPath"]["item"]["tags"] = $pTags;
				$i = 0;
				foreach($secondaryTags as $sTag){
					$key = str_replace(' ', '', $sTag);
					$sTags[$i]["key"] = "Tag.".$key;
					$sTags[$i]["label"] = $sTag;
					$i ++;
				}
				$json["data"]["mediaByPath"]["item"]["secondaryTags"] = $sTags;
				
		}
		return $this->jsonResponce($json);
		 
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

