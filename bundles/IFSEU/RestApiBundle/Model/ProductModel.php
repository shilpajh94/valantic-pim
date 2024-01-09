<?php

namespace IFSEU\RestApiBundle\Model;

use Pimcore\Logger;

class ProductModel
{
    private $classId = "IFSEUProduct";
    private $langCode;
    private $fallbackLangCode = 'en';
    private $db;
    private $sqlArr = [];
    private $limit  = 50;
    private $maxLimit = 250;
    private $languages;

    public function __construct()
    {
        $this->db = \Pimcore\Db::get();
        $this->languages = \Pimcore\Tool::getValidLanguages();
    }

    /**
     * Method to get product details.
     *
     * @param string $lang language code
     * @param array $conditionArray parameter array
     * @param string $productType product type('Fert','Skeleton','Base')
     * @param array $vCatalogMap eHose data mapping array.
     *
     * @return array $productDetail Product Details array
     */
    public function fetchProduct($conditionArray, $vCatalogMap, $productType='fert', $lang='en')
    {
        // Get Condition String.
        $conditionString = $this->getConditionString($conditionArray,$productType);
        // Get Field String.
        $fieldString = $vCatalogMap['ehoseAPI'][ucfirst($productType)]['Fields'];

        $conArray['condition']= $conditionString;
        $conArray['fields']   = $fieldString;

        // Get Total record count.
        $totalCount =   $this->getTotalCount($lang,$conArray);

        // Get Offset and Limit.
        $offsetLimit    =   $this->getOffsetLimit($conditionArray,$totalCount);
        if($offsetLimit){
            try {
                $rFlag = $this->createProductSql($lang,$conArray,$offsetLimit);
                if ($rFlag) {
                    return $this->db->fetchAllAssociative($this->getSql());
                }
            } catch(\Exception $ex) {
                Logger::error($ex->getTraceAsString());
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
            $conditionString    =   trim($conditionString,'AND');
            return $conditionString;
        }

        if($productType=='fert'){
            // Code to be executed if productType = fert
            $conditionString .= " eHoseProduct=1  AND ";

            if(isset($conditionArray['ids']) && !empty($conditionArray['ids'])){

                $conditionString    .=   " materialNumber in (".$conditionArray['ids'].")  AND ";
            }
            if(isset($conditionArray['siop']) && !empty($conditionArray['siop'])){
                $conditionString    .=   " siopFullCode ='".$conditionArray['siop']."'  AND ";
            }
                $currentDateTime = date('Y-m-d H:i:s');
                $currentDateTimeStamp = strtotime($currentDateTime);
                $previousDateTimeStamp = strtotime(' -1 day');
                $conditionString    .=   " o_modificationDate >= ".$previousDateTimeStamp." AND
                 o_modificationDate <=".$currentDateTimeStamp."  AND ";
        }
        else {
            // Code to be executed if productType = base or skeleton
            if(isset($conditionArray['ids']) && !empty($conditionArray['ids'])){
                $conditionString    .=   " oo_id = ".$conditionArray['ids'];
            }
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
            $product = $this->db->fetchAllAssociative($this->getSql());
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
        //Default Limit
        $limit = $this->limit;
        $page  = 1;
        // Set page Limit.
        if(isset($conditionArray['limit']) && !empty($conditionArray['limit'])){
            if( intval($conditionArray['limit']) > 0 && $conditionArray['limit'] <= $this->maxLimit){
                $limit  =   $conditionArray['limit'];
            }elseif($conditionArray['limit']>$this->maxLimit){
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

        return array('offset'=>$offset,'limit'=>$limit);
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
        if(empty($conArray['fields'])){
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
        \Pimcore\Log\Simple::log('ehosequery', print_r($this->sqlArr [$this->fallbackLangCode],true));
        return true;
    }

    private function createSelectStatementAttributeArray($conArray)
    {
        $selectStatementAttributes = [];
        $fieldConfigs = $conArray["fields"];
        foreach($fieldConfigs as $fieldName => $fieldConfig){
            $fieldDataType = $fieldConfig[0];
            
            if( is_array($fieldDataType) && array_key_first($fieldDataType) === "numeric" ){
                $decimalPoints = $fieldDataType["numeric"] ?? DEFAULT_DECIMAL_PLACES_IN_EHOSE_API;
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
     * @param array $vCatalogMap eHose fields mapping array
     * @return array $pTypeData product data array.
     */
    public function getProductTypeData($id,$productType,$vCatalogMap){
        $pTypeData  =   array();
        $pTypeConditionArray['ids'] =$id;
        $pTypeArray = false;
        $pTypeArray  =  $this->fetchProduct($pTypeConditionArray,$vCatalogMap,$productType,'en');
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
        $query = 'SELECT name as `name` FROM object_query_IFSEUBrand WHERE oo_id = '.$id;
        return $this->db->fetchOne($query);
    }

    /**
     * Method to get the document id based on product oo_id
     *
     * @param int $oo_id object Id
     */
    public function getDocumentId(int $oo_id) : ?int {
        $query = 'SELECT dest_id FROM object_metadata_1 WHERE `column` = "CertificationDocument"
        and `data` = 1 and `o_id` = '.$oo_id;
        return $this->db->fetchOne($query);
    }

    /**
     * Method to get the Features from object_IFSEUProduct_en table based on PropertyID
     *
     * @param string $oo_id object Id
     *
     * @param string $classId object Id
     */
    public function getFeatures(string $oo_id, string $classId) : ?string {
        $languages = "'" . implode ( "', '", $this->languages ) . "'";
        //Removing comma from begining and end
        $oo_id = trim($oo_id, ',');
        $query = 'SELECT PropertyName FROM object_localized_'.$classId.'_en
        WHERE `oo_id` IN ('.$oo_id.') AND language IN ('.$languages.')';
        $features = $this->db->fetchFirstColumn($query);
        return implode(", ",$features);
    }

    /**
     * Method to get the Shipping Conditions from object_IFSEUProduct_en table based on PropertyID
     *
     * @param string $oo_id object Id
     *
     * @param string $classId object Id
     */
    public function getShippingConditions(string $oo_id, string $classId) : ?string {
        $languages = "'" . implode ( "', '", $this->languages ) . "'";
        //Removing comma from begining and end
        $oo_id = trim($oo_id, ',');
        if(!empty($oo_id)){
            $query = 'SELECT ShippingConditions FROM object_localized_'.$classId.'_en
            WHERE `oo_id` IN ('.$oo_id.') AND language IN ('.$languages.')';
            $shippingConditions = $this->db->fetchFirstColumn($query);
            return implode(", ",$shippingConditions);    
        }
        return '';
    }

    /**
     * Method to get the Conditions from object_IFSEUProduct_en table based on PropertyID
     *
     * @param string $oo_id object Id
     *
     * @param string $classId object Id
     */
    public function getConditions(string $oo_id, string $classId) : ?string {
        $languages = "'" . implode ( "', '", $this->languages ) . "'";
        //Removing comma from begining and end
        $oo_id = trim($oo_id, ',');
        if(!empty($oo_id)){
            $query = 'SELECT Conditions FROM object_localized_'.$classId.'_en
            WHERE `oo_id` IN ('.$oo_id.') AND language IN ('.$languages.')';
            $conditions = $this->db->fetchFirstColumn($query);
            return implode(", ",$conditions);    
        }
        return '';
    }

    /**
     * Method to get the Minimum Order from object_IFSEUProduct_en table based on PropertyID
     *
     * @param string $oo_id object Id
     *
     * @param string $classId object Id
     */
    public function getMinimumOrder(string $oo_id, string $classId) : ?string {
        $languages = "'" . implode ( "', '", $this->languages ) . "'";
        //Removing comma from begining and end
        $oo_id = trim($oo_id, ',');
        if(!empty($oo_id)){
            $query = 'SELECT MinimumOrder FROM object_localized_'.$classId.'_en
            WHERE `oo_id` IN ('.$oo_id.') AND language IN ('.$languages.')';
            $minimumOrder = $this->db->fetchFirstColumn($query);
            return implode(", ",$minimumOrder);
        }
        return '';
    }

      /**
     * Method to get the Property from object_IFSEUProduct_en table based on PropertyID
     *
     * @param string $oo_id object Id
     *
     * @param string $classId object Id
     */
    public function getPropertyName(string $oo_id, string $classId) : ?string {
        $languages = "'" . implode ( "', '", $this->languages ) . "'";
        $oo_id = trim($oo_id, ',');
        $query = 'SELECT PropertyName FROM object_localized_'.$classId.'_en
        WHERE `oo_id` IN ('.$oo_id.') AND language IN ('.$languages.')';
        return $this->db->fetchOne($query);
    }
    

    
    /**
     * Method to get the CountryAbbr from object_IFSEUCountries table based on oo_id
     *
     * @param string $oo_id object Id
     */
    public function getCountryInfo(int $oo_id) : ?array
    {
        $query = 'SELECT CountryID, CountryName, CountryAbbr FROM object_IFSEUCountries WHERE `oo_id` = '.$oo_id;
        return $this->db->fetchAllAssociative($query);
    }

    /**
     * Method to get the CountryAbbr from object_IFSEUCountries table based on oo_id
     *
     * @param string $oo_id object Id
     */
    public function getMaterialGroupInfo(int $oo_id) : ?array
    {
        $query = 'SELECT code, `description` FROM object_IFSEUMaterialGroup WHERE `oo_id` = '.$oo_id;
        return $this->db->fetchAllAssociative($query);
    }

    /**
     * Method to get the Category from object_IFSEUCategory table based on oo_id
     *
     * @param string $oo_id object Id
     */
    public function getCategoryName(int $oo_id) : ?string
    {
        $query = 'SELECT o_key FROM object_IFSEUCategory WHERE `oo_id` = '.$oo_id;
        return $this->db->fetchOne($query);
    }


    /**
     * Method to get the SubCategory from object_IFSEUSubCategory table based on oo_id
     *
     * @param string $oo_id object Id
     */
    public function getSubCategoryName(int $oo_id) : ?string
    {
        $query = 'SELECT o_key FROM object_IFSEUSubCategory WHERE `oo_id` = '.$oo_id;
        return $this->db->fetchOne($query);
    }

    /**
     * Method to get the localized field data from object_localized_data_IFSEUProduct table
     *  for all the languages based on ooo_id
     *
     * @param string $ooo_id object Id
     */
    public function getProductLocalizedData(int $ooo_id, array $fieldList) : ?array
    {
        $languages = "'" . implode ( "', '", $this->languages ) . "'";
        $fields[] = 'language';
        $fields = array_merge($fields, $fieldList);
        $fieldFormattedString = implode(",",$fields);
        $query = "SELECT {$fieldFormattedString} FROM object_localized_data_IFSEUProduct
         WHERE `ooo_id` = {$ooo_id} AND `language` IN ($languages)";
        $resultSet = $this->db->fetchAllAssociative($query);

        $resultSetFormatted = [];
        if($resultSet)
        {
            foreach ($resultSet as $value) {
                $language = $value['language'];
                unset($value['language']);
                $value = array_filter($value);

                if($value)
                {
                    $resultSetFormatted[$language] = $value;
                }
            }
        }
        return $resultSetFormatted;
    }

    /**
     * Method to get the localized field data from object_localized_data_IFSEUProduct table
     * for all the languages based on ooo_id
     *
     * @param string $ooo_id object Id
     */
    public function getMastersLocalizedData(string $classId, string $fieldName,
    string $aliasName, array $idList) : ?array
    {
        $languages = "'" . implode ( "', '", $this->languages ) . "'";
        $fields[] = 'ooo_id';
        $fields[] = 'language';
        $fields[] = $fieldName. " AS ". $aliasName;
        $fieldFormattedString = implode(",",$fields);
        $idListString = implode(",",$idList);
        $query = "SELECT {$fieldFormattedString} FROM object_localized_data_{$classId}
         WHERE `ooo_id` IN ($idListString) AND `language` IN ($languages)";
        $resultSet = $this->db->fetchAllAssociative($query);

        $resultSetFormatted = [];
        if($resultSet)
        {
            foreach ($resultSet as $value) {
                unset($value['ooo_id']);
                $language = $value['language'];
                unset($value['language']);
                $value = array_filter($value);

                if($value)
                {
                    $resultSetFormatted[$language][] = $value[$aliasName];
                }
            }
        }
        return $resultSetFormatted;
    }

    
}
