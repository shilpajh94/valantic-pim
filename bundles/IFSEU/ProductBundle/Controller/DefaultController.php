<?php

namespace IFSEU\ProductBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Tool\Utils;
use Exception;
use Pimcore\Cache;
use Pimcore\Model\DataObject;

/**
 * @package IFSEU\ProductBundle\Controller
 * @Route("/IFSEU/product")
 */
class DefaultController extends FrontendController
{
    private $levelName =null;
    private $configFile= null;
    private $db = null;

    public function __construct()
    {
        $this->db = \Pimcore\Db::get();
    }
    
    /**
     * @Route("/ifseu_product")
     */
    public function indexAction(Request $request)
    {
    }
     /**
     * @Route("/get/level/attributes", methods={"post"})
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function productLevelAttributs(Request $request){
        $this->levelName = ucfirst( $request->get('levelName'));
        if($this->checkLevelExist()){
            $attributes= $this->getAttributesAccordingToLevel();
            return $this->json(['attributes'=>$attributes,"success"=>true]);
        }else{
            return $this->json(['attributes'=>'',"success"=>false]);
        }

        
        
    }
        /**
     * @Route("/get/level/info", methods={"post"})
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getObjectLevelInfo(Request $request){
        try{
            $idPath = $request->get('idPath');
            $objIds=explode('/',$idPath);
            $objectinfodb =$this->getProductLevelInfoFromDb($objIds);
            if(!empty($objectinfodb['ProdcutsIdAndType'])){
                $objectinfodb['success']=true;
            }else{
                $objectinfodb['success']=false;
                $objectinfodb['msg'] ="Unable to find IFSEUProduct info ";
            }
        }catch(Exception $e){
            $objectinfodb['success']=false;
            $objectinfodb['msg'] ="Unable to find IFSEUProduct info ";
        }
        return $this->json($objectinfodb);
    }
    private function getProductLevelInfoFromDb(array $objIds){
        $productIdAndType = [];
        $productLevel =['base','skeleton','fert'];
        $level = -1;
        foreach($objIds as $objId){
            $query = "SELECT `o_id`,`o_type` FROM objects where o_id =".$this->db->quote(trim($objId));
            $dbData = $this->db->fetchAssoc($query);
            if(!empty($dbData) && $dbData['o_type']!= 'folder'){
                $level++;
                array_push($productIdAndType,$dbData);
            }
        }
        return ['ProdcutsIdAndType'=>$productIdAndType,"level"=>$productLevel[$level]];
    }
    private function getAttributesAccordingToLevel(){
        return array_keys( $this->configFile[$this->levelName]);
    }
    private function checkLevelExist(): bool {
        $this->configFile= $this->getAttributesConfigPath();
        $status = false;
        if(array_key_exists($this->levelName,$this->configFile)){
            $status = true;
        }
        return $status;
    }
    private function getAttributesConfigPath(){
        return $this->getConfigFromYmlFile(IFS_EU_PRODUCT_LEVEL_CONFIG_FILE_PATH);
    }

     /**
     * get yaml config for the given file
     * caching the file data if environment is not dev
     *
     * @param $filePath
     * @return mixed
     */
    public function getConfigFromYmlFile($filePath)
    {
        $env = \Pimcore\Config::getEnvironment();
        $cacheKey = Utils::getCacheKeyForFilePath($filePath);

        if ($env != "dev") {

            $con = Cache::load($cacheKey);
            if ($con) {
                $config =  $con;
            } else {
                $config = Utils::getYmlConfig($filePath);
                Cache::save($config, $cacheKey);
            }
        } else {
            $config = Utils::getYmlConfig($filePath);
            Cache::save($config, $cacheKey);
        }
        return $config;
    }

    public function newProductsEmailAction()
    {
        $parameterBag = [];
        return $this->render("@IFSEUProduct/default/NewProductsEmail.html.twig", $parameterBag);
    }
}
