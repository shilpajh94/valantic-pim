<?php

namespace RestApiBundle\Model;

use Pimcore\Logger;

class ProductModel
{
    private $classId = 1;
    private $langCode;
    private $fallbackLangCode = 'en';
    private $product;
    private $db;
    private $sqlArr = [];
    private $limit  = 50;
    private $maxLimit = 250;
    private $service;

    public function __construct()
    {
        $this->db = \Pimcore\Db::get();
    }

    /**
     * Method to get product details.
     *
     * @param string $lang language code
     * @param array $conditionArray parameter array
     * @param string $productType product type('Fert','Skeleton','Base')
     * @param array $vCatalogMap Virtual Catalog mapping array.
     *
     * @return array $productDetail Product Details array
     */
    public function fetchProduct($lang='en',$conditionArray,$productType='fert',$vCatalogMap)
    {
        // Get Condition String.
        $conditionString = $this->getConditionString($conditionArray,$productType);
        // Get Field String.
        $fieldString = $vCatalogMap['VirtualCatalog'][ucfirst($productType)]['Fields'];

        $conArray['condition']= $conditionString;
        $conArray['fields']   = $fieldString;

        // Get Total record count.
        $totalCount =   $this->getTotalCount($lang,$conArray);

        if(empty($totalCount)){
            return false;
        }else{
            // Get Offset and Limit.
            $offsetLimit    =   $this->getOffsetLimit($conditionArray,$totalCount);
            if($offsetLimit){
                try {
                    $rFlag = $this->createProductSql($lang,$conArray,$offsetLimit);
                    if($rFlag){
                        $stmt = $this->db->prepare($this->getSql());
                        $stmt->execute();
                        $product = $stmt->fetchAll();
                        if(empty($product)) {
                            return false;
                        }
                    }else{
                        return false;
                    }
                    return $product;
                } catch(\Exception $ex) {
                    Logger::error($ex->getTraceAsString());
                    return false;
                }
            }else{
                return false;
            }
        }
    }

    /**
     * Method to get condition string.
     *
     * @param array $conditionArray parameter array
     * @param string $productType product type('Fert','Skeleton','Base')
     *
     * @return array $conditionString condition array.
     */
    public function getConditionString($conditionArray,$productType){

        $conditionString    =   " ProductType='".$productType."'  AND ";
        if(empty($conditionArray)){
            $conditionString    =   trim($conditionString,'  AND ');
            return $conditionString;
        }

        if($productType=='fert'){
            $conditionString .= " virtualCatalogFlag=1  AND ";
        }

        switch($productType){
            case 'fert':
                // Code to be executed if productType=base
                if(isset($conditionArray['ids']) && !empty($conditionArray['ids'])){

                    $conditionString    .=   " articleNumber in (".$conditionArray['ids'].")  AND ";
                }
                if(isset($conditionArray['siop']) && !empty($conditionArray['siop'])){
                    $conditionString    .=   " siopFullCode ='".$conditionArray['siop']."'  AND ";
                }
                if(isset($conditionArray['updatedFrom']) && !empty($conditionArray['updatedFrom'])){
                    $conditionString    .=   " o_modificationDate >= ".strtotime($conditionArray['updatedFrom'])." AND  o_modificationDate <=".strtotime(date('Y-m-d H:i:s'))."  AND ";
                }
                break;
            case 'skeleton':
                // Code to be executed if productType=skelton
                if(isset($conditionArray['ids']) && !empty($conditionArray['ids'])){
                    $conditionString    .=   " oo_id = ".$conditionArray['ids'];
                }
                break;
            case 'base':
                // Code to be executed if productType=fert
                if(isset($conditionArray['ids']) && !empty($conditionArray['ids'])){
                    $conditionString    .=   " oo_id = ".$conditionArray['ids'];
                }
                break;
            default:
                // Code to be executed if productType is empty
        }

        $conditionString    =   trim($conditionString,'  AND ');

        return $conditionString;
    }

    /**
     * Method to get total count
     *
     * @param string $lang language code
     * @param array $conArray condition array.
     * @return int count product total count.
     */
    public function getTotalCount($lang,$conArray){

        $rtFlag = $this->createProductSql($lang,$conArray);
        if($rtFlag){
            $stmt = $this->db->prepare($this->getSql());
            $stmt->execute();
            $product = $stmt->fetchAll();
            return count($product);
        }else{
            return false;
        }
    }

    /**
     * Method to set offset and limit.
     *
     * @param array $conditionArray parameter array
     * @param int $totalCount total count.
     * @return array $returnArray
     */
    private function getOffsetLimit($conditionArray,$totalCount){
        $returnArray    =   [];
        //Default Limit
        $limit = $this->limit;
        $page  = 1;
        // Set page Limit.
        if(isset($conditionArray['limit']) && !empty($conditionArray['limit'])){
            if($conditionArray['limit']>=$this->limit && $conditionArray['limit']<=$this->maxLimit){
                $limit  =   $conditionArray['limit'];
            }else if($conditionArray['limit']>$this->maxLimit){
                $limit  =   $this->maxLimit;
            }
        }
        // Get requested Page.
        if(isset($conditionArray['page']) && !empty($conditionArray['page'])){
            $page   =   $conditionArray['page'];
        }
        // Get Total Page
        $totalPage = ceil($totalCount/$limit);
        if($totalPage==0){$totalPage=1;}
        if($page>$totalPage){return false;}
        $offset = (($page*$limit) - $limit);
        $returnArray = array('offset'=>$offset,'limit'=>$limit);

        return $returnArray;
    }

    /**
     * Method to get sql query string.
     *
     * @return string $sqlquery
     */
    public function getSql()
    {
        if ($this->langCode == $this->fallbackLangCode) {
            return $this->sqlArr[$this->fallbackLangCode];
        }
        return $this->sqlArr['other'];
    }

    /**
     * Method to create and set sql query array based on language code.
     *
     * @param string $lang Language code
     * @param array $conArray consition array
     * @param array $offsetLimit offset,limit data array
     * @return boolean true/false
     */
    private function createProductSql($lang,$conArray,$offsetLimit=array())
    {
        if(empty($conArray['fields']) || empty($conArray['fields'])){
            return false;
        }

        $this->langCode   = $lang;
        $limitText  =   "";
        if(!empty($offsetLimit)){
            $limitText = " LIMIT ".$offsetLimit['offset'].",".$offsetLimit['limit'];
        }
        $this->sqlArr [$this->fallbackLangCode] = '
            SELECT  '.implode(",",$conArray['fields']).'
            FROM object_localized_' . $this->classId. '_' . $this->langCode . '
            WHERE '.$conArray['condition'].' '.$limitText;
        \Pimcore\Log\Simple::log('virtualcatalogquery', print_r($this->sqlArr [$this->fallbackLangCode],true));
        return true;
    }

    /**
     * Method to create and set sql query array based on language code.
     *
     * @param int $id object Id
     * @param string $productType product type('base','skeleton','fert')
     * @param array $vCatalogMap virtual catalog fields mapping array
     * @return array $pTypeData product data array.
     */
    public function getProductTypeData($id,$productType,$vCatalogMap){
        $pTypeData  =   array();
        $pTypeConditionArray['ids'] =$id;
        $pTypeArray   =   $this->fetchProduct('en',$pTypeConditionArray,$productType,$vCatalogMap);
        if(!empty($pTypeArray)){
            $pTypeData    =   array_filter(array_pop($pTypeArray));
        }

        return $pTypeData;
    }

    /**
     * Method to create and set sql query array based on language code.
     *
     * @param int $id object Id
     * @param string $productType product type('base','skeleton','fert')
     * @param array $vCatalogMap virtual catalog fields mapping array
     * @return array $pTypeData product data array.
     */
    public function getBrandName($id){
        $query = 'SELECT name as BrandName FROM object_query_3 WHERE oo_id = '.$id;
        $a = $this->db->fetchAll($query);
        return ($a[0]['BrandName']);
    }

}
