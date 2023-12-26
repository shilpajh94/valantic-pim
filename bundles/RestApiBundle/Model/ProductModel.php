<?php

namespace RestApiBundle\Model;

use Doctrine\ORM\Query\Expr\Func;
use Pimcore\Logger;
use Pimcore\Db;

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
        $this->db = Db::get();
    }

    public function getBrandInfo($brandId)
    {
        $sql = "select name, VirtualCatalogApiSorter__id, VirtualCatalogApiMapper__id from " .
        $this->brandTable . "where oo_id =" . $brandId;
        $brand = $this->db->fetchAllAssociative($sql);

        if (!empty($brand)) {
            return $brand[0];
        } else {
            return null;
        }
    }

    public function getVirtualCatalogApiSorter($id)
    {
        $sql = "select GroupingField, Columns, `Order` from " .
        $this->virtualCatalogSorterTable . " where oo_id = " . $id;
        $sorter = $this->db->fetchAllAssociative($sql);
        if (!empty($sorter)) {
            return $sorter[0];
        } else {
            return null;
        }
    }

    public function getVirtualCatalogApiMapper($id)
    {
        $sql = "select originalValues from " . $this->virtualCatalogMapperTable . " where oo_id = " . $id;
        $mapper =  $this->db->fetchAllAssociative($sql);
        if (!empty($mapper)) {
            return $mapper[0];
        } else {
            return null;
        }
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
    public function fetchProduct($conditionArray, $vCatalogMap, $productType = 'fert', $lang = 'en')
    {
        // Get Condition String.
        $conditionString = $this->getConditionStringNewAPI($conditionArray, $productType);

        // Get Field String.
        $fieldString = $vCatalogMap['VirtualCatalog']['Fields'];

        $conArray['condition'] = $conditionString;
        $conArray['fields']   = $fieldString;

        // Get Total record count.
        $totalCount =   $this->getTotalCountNewAPI($lang, $conArray);

        // Get Offset and Limit.
        $offsetLimit    =   $this->getOffsetLimit($conditionArray, $totalCount);
        if ($offsetLimit) {
            try {
                $rFlag = $this->createProductSqlNewAPI($lang, $conArray, $offsetLimit);
                if ($rFlag) {
                    return $this->db->fetchAllAssociative($this->getSql());
                }
            } catch (\Exception $ex) {
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
    public function getConditionString($conditionArray, $productType)
    {
        $conditionString = "ProductType='" . $productType . "'AND";
        if (empty($conditionArray)) {
            $conditionString    =   trim($conditionString, 'AND ');
            return $conditionString;
        }

        if ($productType == 'fert') {
            $conditionString .= " virtualCatalogFlag=1 AND ";

            if (isset($conditionArray['ids']) && !empty($conditionArray['ids'])) {

                $conditionString    .=   " articleNumber in (" . $conditionArray['ids'] . ")  AND ";
            }
            if (isset($conditionArray['siop']) && !empty($conditionArray['siop'])) {
                $conditionString    .=   " siopFullCode ='" . $conditionArray['siop'] . "'AND ";
            }
            if (isset($conditionArray['updatedFrom']) && !empty($conditionArray['updatedFrom'])) {
                $conditionString    .=   " o_modificationDate >= " . strtotime($conditionArray['updatedFrom']) .
                " AND o_modificationDate <=" . strtotime(date('Y-m-d H:i:s')) . "AND";
            }
        }
        else {
            if (isset($conditionArray['ids']) && !empty($conditionArray['ids'])) {
                $conditionString    .=   "oo_id = " . $conditionArray['ids'];
            }
        }

        $conditionString    =   trim($conditionString, 'AND ');

        return $conditionString;
    }

    /**
     * Method to get condition string.
     *
     * @param array $conditionArray parameter array
     * @param string $productType product type('Fert','Skeleton','Base')
     *
     * @return array $conditionString condition array.
     */
    public function getConditionStringNewAPI($conditionArray, $productType)
    {

        $conditionString    =   " `objlocal`.`ProductType`='" . $productType . "'  AND ";
        if (empty($conditionArray)) {
            $conditionString    =   trim($conditionString, 'AND ');
            return $conditionString;
        }

        if($productType == 'fert') {
            $conditionString .= " `objlocal`.`virtualCatalogFlag`=1 AND ";

            if (isset($conditionArray['ids']) && !empty($conditionArray['ids'])) {

                $conditionString    .=   " `vc`.`sapCode` in (" . $conditionArray['ids'] . ")  AND ";
            }
            if (isset($conditionArray['siop']) && !empty($conditionArray['siop'])) {
                $conditionString    .=   " `vc`.`siopFullcode` ='" . $conditionArray['siop'] . "'  AND ";
            }
            if (isset($conditionArray['updatedFrom']) && !empty($conditionArray['updatedFrom'])) {
                $conditionString    .=   " `vc`.updatedAt >= " . strtotime($conditionArray['updatedFrom']) .
                " AND  o_modificationDate <=" . strtotime(date('Y-m-d H:i:s')) . "AND ";
            }
        }
        else {
            if (isset($conditionArray['ids']) && !empty($conditionArray['ids'])) {
                $conditionString    .=   " oo_id = " . $conditionArray['ids'];
            }
        }

        $conditionString    =   trim($conditionString, '  AND ');

        return $conditionString;
    }

    /**
     * Method to get total count
     *
     * @param string $lang language code
     * @param array $conArray condition array.
     * @return int count product total count.
     */
    public function getTotalCount($lang, $conArray)
    {

        $rtFlag = $this->createProductSql($lang, $conArray);
        if ($rtFlag) {
            $product = $this->db->fetchAllAssociative($this->getSql());
            return count($product);
        } else {
            return false;
        }
    }

    /**
     * Method to get total count
     *
     * @param string $lang language code
     * @param array $conArray condition array.
     * @return int count product total count.
     */
    public function getTotalCountNewAPI($lang, $conArray)
    {

        $rtFlag = $this->createProductSqlNewAPI($lang, $conArray);
        if ($rtFlag) {
            $product = $this->db->fetchAllAssociative($this->getSql());
            return count($product);
        } else {
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
    private function getOffsetLimit($conditionArray, $totalCount)
    {
        //Default Limit
        $limit = $this->limit;
        $page  = 1;
        // Set page Limit.
        if (isset($conditionArray['limit']) && !empty($conditionArray['limit'])) {
            if (intval($conditionArray['limit']) > 0 && $conditionArray['limit'] <= $this->maxLimit) {
                $limit  =   $conditionArray['limit'];
            } elseif ($conditionArray['limit'] > $this->maxLimit) {
                $limit  =   $this->maxLimit;
            }
        }
        // Get requested Page.
        if (isset($conditionArray['page']) && !empty($conditionArray['page'])) {
            $page   =   $conditionArray['page'];
        }
        // Get Total Page
        $totalPage = ceil($totalCount / $limit);
        if ($totalPage == 0) {
            $totalPage = 1;
        }
        if ($page > $totalPage) {
            return false;
        }
        $offset = (($page * $limit) - $limit);

        return array('offset' => $offset, 'limit' => $limit);
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

    public function getBrandsWithSorterObjectsMapped()
    {
        $sql = "SELECT distinct p.brandName as brand_id, b.name,vcmap.GroupingField as mapper_GroupingField,
        vcmap.originalValues as mapping, vcsort.GroupingField as sorting_GroupingField,
        
        IF(vcsort.columns = '{}' ,vcsort.Order,vcsort.columns) as sorting
        from object_1 p join object_3 b on p.brandName = b.oo_id  left join object_VirtualCatalogApiSorter vcsort
        on b.VirtualCatalogApiSorter__id = vcsort.oo_id left join object_VirtualCatalogApiMapper vcmap
        on b.VirtualCatalogApiMapper__id = vcmap.oo_id where p.brandName is not null
        and p.brandName <> ''";

        return $this->db->fetchAllAssociative($sql);
    }
    public function getProductsForTheRequiredBrand($brandId)
    {
        $sql = "SELECT * from `object_1` where `brandName` = " . $brandId;
        return $this->db->fetchAllAssociative($sql);
    }

    public function getProductsInSortedFormat($brandId, $groupingFieldNameForSorting, $sortingData, $brickName)
    {
        $select = "SELECT * from `object_1` INNER JOIN `object_brick_query_" . $brickName .
        "_1` ON object_1.oo_id = object_brick_query_" . $brickName . "_1.o_id
        where `object_1`.`brandName` = " . $brandId . " and `ProductType` = 'fert' " . " ORDER BY ";
        if (is_array($sortingData)) {
            $condition = '';
            $case = 'Case ';
            $i = 0;
            foreach ($sortingData as $eachSortingData) {
                $eachSortingData = trim($eachSortingData, "'");
                if ($groupingFieldNameForSorting == 'reinforcement') {
                    $condition = $condition . " WHEN " . $groupingFieldNameForSorting . " = '," .
                    $eachSortingData . ",' THEN " . $i;
                } else {
                    $condition = $condition . " WHEN `object_brick_query_" . $brickName . "_1`." .
                    $groupingFieldNameForSorting . " = '," . $eachSortingData . ",' THEN " . $i;
                }
                $i++;
            }
            $else = ' ELSE ' . $i++ . ' END';
            if ($groupingFieldNameForSorting == 'reinforcement') {
                $sql = "SELECT * from `object_1` where `brandName` = " . $brandId .
                " and `ProductType` = 'fert' " . " ORDER BY " . $case . $condition . $else;
            } else {
                $sql = $select . $case . $condition . $else;
            }
        } else {
            $sql = $select . ' `object_brick_query_' . $brickName . '_1`.' .
            $groupingFieldNameForSorting . ' ' . $sortingData;
        }
        return $this->db->fetchAllAssociative($sql);
    }

    /**
     * Method to create and set sql query array based on language code.
     *
     * @param string $lang Language code
     * @param array $conArray consition array
     * @param array $offsetLimit offset,limit data array
     * @return boolean true/false
     */
    private function createProductSql($lang, $conArray, $offsetLimit = array())
    {
        if (empty($conArray['fields'])) {
            return false;
        }

        $this->langCode   = $lang;
        $limitText  =   "";
        if (!empty($offsetLimit)) {
            $limitText = " LIMIT " . $offsetLimit['offset'] . "," . $offsetLimit['limit'];
        }


        $selectStatementAttributeArray = $this->createSelectStatementAttributeArray($conArray);

        $this->sqlArr[$this->fallbackLangCode] = '
            SELECT  ' . implode(",", $selectStatementAttributeArray) . '
            FROM object_localized_' . $this->classId . '_' . $this->langCode . '
            WHERE ' . $conArray['condition'] . ' ' . $limitText . "\n\n";
        \Pimcore\Log\Simple::log('virtualcatalogquery', print_r($this->sqlArr[$this->fallbackLangCode], true));

        return true;
    }

    /**
     * Method to create and set sql query array based on language code.
     *
     * @param string $lang Language code
     * @param array $conArray consition array
     * @param array $offsetLimit offset,limit data array
     * @return boolean true/false
     */
    private function createProductSqlNewAPI($lang, $conArray, $offsetLimit = array())
    {
        if (empty($conArray['fields'])) {
            return false;
        }

        $this->langCode   = $lang;
        $limitText  =   "";
        if (!empty($offsetLimit)) {
            $limitText = " LIMIT " . $offsetLimit['offset'] . "," . $offsetLimit['limit'];
        }

        $selectStatementAttributeArray = $this->createSelectStatementAttributeNewAPIArray($conArray);

        $whereClause = '';
        if ($conArray['condition']) {
            $whereClause = ' WHERE ' . $conArray['condition'];
        }

        $this->sqlArr[$this->fallbackLangCode] = '
                SELECT  ' . implode(",", $selectStatementAttributeArray) . '
                FROM virtual_catalog_sorted_product_table AS `vc`
                LEFT JOIN object_localized_' . $this->classId . '_' . $this->langCode . ' AS `objlocal`
                ON `vc`.`oo_id` = `objlocal`.`oo_id` ' . $whereClause . ' ' . $limitText . "\n\n";

        \Pimcore\Log\Simple::log('virtualcatalogquery', print_r($this->sqlArr[$this->fallbackLangCode], true));

        return true;
    }

    private function createSelectStatementAttributeArray($conArray)
    {
        $selectStatementAttributes = [];
        $fieldConfigs = $conArray["fields"];
        foreach ($fieldConfigs as $fieldName => $fieldConfig) {
            $fieldDataType = $fieldConfig[0];

            if (is_array($fieldDataType) && array_key_first($fieldDataType) === "numeric") {
                $decimalPoints = $fieldDataType["numeric"] ?? DEFAULT_DECIMAL_PLACES_IN_VIRTUAL_CATALOG_API;
                $selectStatementAttributes[] = "ROUND(" . $fieldName . "," . $decimalPoints . ") AS " . $fieldName;
            } elseif ($fieldDataType === "string") {
                $selectStatementAttributes[] = $fieldName;
            }
        }
        return $selectStatementAttributes;
    }

    private function createSelectStatementAttributeNewAPIArray($conArray)
    {
        $selectStatementAttributes = [];
        $fieldConfigs = $conArray["fields"];
        foreach ($fieldConfigs as $fieldName => $fieldConfig) {
            $fieldDataType = $fieldConfig[0];

            if (is_array($fieldDataType) && array_key_first($fieldDataType) === "numeric") {
                $decimalPoints = $fieldDataType["numeric"] ?? DEFAULT_DECIMAL_PLACES_IN_VIRTUAL_CATALOG_API;
                $selectStatementAttributes[] = "ROUND(" . $fieldName . "," . $decimalPoints . ") AS " . $fieldName;
            } elseif ($fieldDataType === "string") {
                $selectStatementAttributes[] = "`objlocal`.`$fieldName`";
            } elseif ($fieldDataType === "customString") {
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
    public function getProductTypeData($id, $productType, $vCatalogMap)
    {
        $pTypeData  =   array();
        $pTypeConditionArray['ids'] = $id;
        $pTypeArray = false;
        $pTypeArray   =   $this->fetchProduct($pTypeConditionArray, $vCatalogMap, $productType, 'en');
        if (!empty($pTypeArray)) {
            $pTypeData    =   array_filter(array_pop($pTypeArray));
        }

        return $pTypeData;
    }

    /**
     * Method to get the brand name based on id
     *
     * @param int $id object Id
     */
    public function getBrandName(int $id): ?string
    {
        $query = 'SELECT name as BrandName FROM object_query_3 WHERE oo_id = ' . $id;
        return  $this->db->fetchOne($query);
    }

    /**
     * Method to get the brand name based on id
     *
     * @param int $id object Id
     */
    public function getBrandNameNewAPI(int $id): ?array
    {
        $query = 'SELECT oq3.oo_id AS brandId, oq3.name as BrandName,
        oq3.VirtualCatalogApiMapper__id, oq_mapper.GroupingField, oq_mapper.originalValues
        FROM object_query_3 AS oq3
        LEFT JOIN object_query_VirtualCatalogApiMapper AS oq_mapper
        ON oq_mapper.oo_id = oq3.VirtualCatalogApiMapper__id
        WHERE oq3.oo_id = ' . $id;
        $brand = $this->db->fetchAssociative($query);

        if ($brand['originalValues']) {
            $originalValuesList = explode(PHP_EOL, $brand['originalValues']);
            $fieldValues = [];
            foreach ($originalValuesList as $originalValues) {

                $fieldOriginalValues = explode('|', $originalValues);
                $fieldValues[$fieldOriginalValues[0]]['original'] = $fieldOriginalValues[1];
                $fieldValues[$fieldOriginalValues[0]]['alias'] = $fieldOriginalValues[2];
            }

            $brand['originalValues'] = $fieldValues;
        }

        return $brand;
    }

    /**
     * Method to get the document id based on product oo_id
     *
     * @param int $oo_id object Id
     */
    public function getDocumentId(int $oo_id): ?int
    {
        $query = 'SELECT dest_id FROM object_metadata_1 WHERE `column` = "CertificationDocument"
        and `data` = 1 and `o_id` = ' . $oo_id;
        return $this->db->fetchOne($query);
    }

    /**
     * Method to get the Features from object_localized_29_en table based on oo_id
     *
     * @param string $oo_id object Id
     *
     * @param int $classId object Id
     */
    public function getFeatures(string $oo_id, int $classId): ?string
    {
        //Removing comma from begining and end
        $oo_id = substr($oo_id, 1, -1);
        $query = 'SELECT o_key FROM object_localized_' . $classId . '_en WHERE `oo_id` IN (' . $oo_id . ')';
        $features = $this->db->fetchFirstColumn($query);
        return implode(", ", $features);
    }

    /**
     * Method to get the distinct brands
     */
    public function getDistinctBrand()
    {
        $sql = 'SELECT distinct brandName FROM object_1 where virtualcatalogflag = 1';
        $data = $this->db->fetchAllAssociative($sql);
        if (!empty($data)) {
            return $data;
        } else {
            return null;
        }
    }
}

