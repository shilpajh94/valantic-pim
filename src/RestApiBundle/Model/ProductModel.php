<?php

namespace RestApiBundle\Model;

use Pimcore\Logger;

class ProductModel
{
    private $classId = 1;
    private $langCode;
    private $fallbackLangCode = 'en';
    private $db;
    private $sqlArr = [];
    private $limit  = 50;
    private $maxLimit = 250;
    private $brandTable = "object_3";
    private $virtualCatalogSorterTable = "object_VirtualCatalogApiSorter";
    private $virtualCatalogMapperTable = "object_VirtualCatalogApiMapper";

    public function __construct()
    {
        $this->db = \Pimcore\Db::get();
    }



    public function fetchProductByBrandOrdering($lang='en',$conditionArray,$productType='fert',$vCatalogMap)
    {
        // Get Condition String.
        $conditionString = $this->getConditionString($conditionArray,$productType);

        // Get Field String.
        $fieldString = $vCatalogMap['VirtualCatalog']['Fields'];

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
                    $sql = $this->getproductwithBrandOrder($lang,$conArray,$offsetLimit);
                    $stmt = $this->db->prepare($sql);
                    $stmt->execute();
                    $product = $stmt->fetchAll();
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

    public function getBrandInfo($brandId)
    {
        $sql = "select name, VirtualCatalogApiSorter__id, VirtualCatalogApiMapper__id from ".$this->brandTable." where oo_id = ".$brandId;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $brand = $stmt->fetchAll();
        if(count($brand)!= 0)
            return $brand[0];
        else
            return null;
    }

    public function getVirtualCatalogApiSorter($id)
    {
        $sql = "select Columns from ".$this->virtualCatalogSorterTable." where oo_id = ".$id;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $sorter = $stmt->fetchAll();
        if(count($sorter)!= 0)
            return $sorter[0];
        else
            return null;
    }

    public function getVirtualCatalogApiMapper($id)
    {
        $sql = "select originalValues from ".$this->virtualCatalogMapperTable." where oo_id = ".$id;
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $sorter = $stmt->fetchAll();
        if(count($sorter)!= 0)
            return $sorter[0];
        else
            return null;
    }


    private function getproductwithBrandOrder($lang, $conArray, $offsetLimit)
    {
        $this->langCode   = $lang;
        $limitText  =   "";
        if(!empty($offsetLimit)){
            $limitText = " LIMIT ".$offsetLimit['offset'].",".$offsetLimit['limit'];
        }
        $sql = 'SELECT * FROM object_localized_' . $this->classId. '_' . $this->langCode . ' WHERE '.$conArray['condition'].' ORDER BY brandName DESC '.' '.$limitText;
        return $sql;
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
        $fieldString = $vCatalogMap['VirtualCatalog']['Fields'];

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
                        }else{
                               // $objectId = $conditionArray["ids"];                                
                                // if(array_key_exists("VirtualCatalogReinforcement",$fieldString)){
                                //     $sql = "SELECT VirtualCatalogReinforcement FROM object_store_" . $this->classId;
                                //     $sql .= " WHERE  oo_id = ?";
                                //     $product[0]["VirtualCatalogReinforcement"] = $this->db->fetchOne($sql,[$objectId]);
                                // }
                            
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
            $conditionString .= " virtualCatalogFlag=1 AND ";
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
            if( intval($conditionArray['limit']) > 0 && $conditionArray['limit'] <= $this->maxLimit){
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

        
        $selectStatementAttributeArray = $this->createSelectStatementAttributeArray($conArray);

        $this->sqlArr [$this->fallbackLangCode] = '
            SELECT  '.implode(",",$selectStatementAttributeArray).'
            FROM object_localized_' . $this->classId. '_' . $this->langCode . '
            WHERE '.$conArray['condition'].' '.$limitText."\n\n";
        \Pimcore\Log\Simple::log('virtualcatalogquery', print_r($this->sqlArr [$this->fallbackLangCode],true));

        return true;
    }

    private function createSelectStatementAttributeArray($conArray)
    {
        $selectStatementAttributes = [];
        $fieldConfigs = $conArray["fields"];
        foreach($fieldConfigs as $fieldName => $fieldConfig){
            $fieldDataType = $fieldConfig[0];
            
            if( is_array($fieldDataType) && array_key_first($fieldDataType) === "numeric" ){
                $decimalPoints = $fieldDataType["numeric"] ?? DEFAULT_DECIMAL_PLACES_IN_VIRTUAL_CATALOG_API;
                $selectStatementAttributes[] = "ROUND(". $fieldName .",". $decimalPoints .") AS " . $fieldName;
            }elseif($fieldDataType === "string"){
                $selectStatementAttributes[] = $fieldName;
            }

        }
        return $selectStatementAttributes;
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
     * Method to get the brand name based on id
     *
     * @param int $id object Id
     */
    public function getBrandName(int $id) : ?string {
        $query = 'SELECT name as BrandName FROM object_query_3 WHERE oo_id = '.$id;
        $brandName = $this->db->fetchOne($query);
        return $brandName;
    }

    /**
     * Method to get the document id based on product oo_id
     *
     * @param int $oo_id object Id
     */
    public function getDocumentId(int $oo_id) : ?int {
        $query = 'SELECT dest_id FROM object_metadata_1 WHERE `column` = "CertificationDocument"
        and `data` = 1 and `o_id` = '.$oo_id;
        $documentId = $this->db->fetchOne($query);
        return $documentId;
    }

    /**
     * Method to get the Features from object_localized_29_en table based on oo_id
     *
     * @param string $oo_id object Id
     * 
     * @param int $classId object Id
     */
    public function getFeatures(string $oo_id, int $classId) : ?string {
        //Removing comma from begining and end
        $oo_id = substr($oo_id,1,-1);
        $query = 'SELECT o_key FROM object_localized_'.$classId.'_en WHERE `oo_id` IN ('.$oo_id.')';
        $features = $this->db->fetchCol($query);
        $featureList = implode(", ",$features);
        return $featureList;
    }

}
