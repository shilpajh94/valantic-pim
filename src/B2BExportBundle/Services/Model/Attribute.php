<?php
namespace B2BExportBundle\Services\Model;

use Exception;
use Pimcore\Db;
use Pimcore\Log\Simple as Logger;
use Pimcore\Model\DataObject;

/**
 * Model Class Attribute
 *
 * Attribute Service Model
 *
 * @package ExportBundle\Services\Model
 */
class Attribute
{
    /**
     * Defining getValues Function
     *
     * @return array
     *
     * @throws Exception
     *
     */
    public static function getValues() {
        try {
            // Querying data from Sales Material Master Database
            $salesMaterialMaster = Db::get()->fetchAll("SELECT DISTINCT
              CONCAT(o6.code, '/', o8.code, '/', o5.Plant) as Identifier
              FROM object_10 o10
              JOIN object_6  o6
              ON o6.o_id = o10.SalesOrganization__id
              JOIN object_8  o8
              ON o8.o_id = o10.DistributionChannel__id
              JOIN object_5  o5
              ON o5.o_id = o10.DeliveringPlant__id
              WHERE o10.epixFlag = '001' AND
              o10.o_published = 1 AND
              o6.o_published = 1 AND
              o8.o_published = 1 AND
              o5.o_published = 1
            ");

            // Querying data from Plant Material Master Database
            $plantMaterialMaster = Db::get()->fetchAll('SELECT
              DISTINCT CONCAT(o6.code, "/", o8.code, "/", o5.Plant) as Identifier
              FROM object_12 o12
              JOIN object_6  o6
              ON o6.o_id = o12.SalesOrganization__id
              JOIN object_8  o8
              ON o8.o_id = o12.DistributionChannel__id
              JOIN object_5  o5
              ON o5.o_id = o12.Plant__id
              WHERE o12.o_published = 1 AND
              o6.o_published = 1 AND
              o8.o_published = 1 AND
              o5.o_published = 1
              ');
            // Querying ProductLine data from Database
            $productLineMaster = Db::get()->fetchAll('SELECT
              DISTINCT
              (o2.Level - 1) AS level,
              RIGHT(`fullCode`, LENGTH(`fullCode`) - 2) AS code
              FROM object_2 o2
              WHERE `Level` = 2 AND o_published = 1
            ');
            // Merging data from Sales Material Master & Plant Material Master Database
            $materialMaster = self::uniqueMultiDArray(array_merge($salesMaterialMaster, $plantMaterialMaster), 'Identifier');
            // Returning material master & product line master
            return ['materialMaster' => $materialMaster, 'productLineMaster' => $productLineMaster];
        } catch (\Exception $ex) {
            throw new \Exception( 'Attribute  Model Exception :: ' . $ex );
        }
    }

    /**
     * Defining getValuesCategoryEntry Function
     *
     * @return array
     *
     * @throws Exception
     *
     */
    public static function getValuesCategoryEntry() {
        try {
            // Querying data from Sales Material Master Database

//            $oldSql = "
//            SELECT DISTINCT
//                o1.articleNumber as partNo,
//                CONCAT(o6.code, '/', o8.code, '/', o5.Plant) as value
//                FROM object_10 o10
//                JOIN object_6  o6
//                ON o6.o_id = o10.SalesOrganization__id
//                JOIN object_8  o8
//                ON o8.o_id = o10.DistributionChannel__id
//                JOIN object_5  o5
//                ON o5.o_id = o10.DeliveringPlant__id
//                JOIN object_1 o1 ON
//                o10.Material = o1.oo_id
//                WHERE o10.epixFlag = '001'
//                UNION DISTINCT
//                SELECT DISTINCT
//                o1.articleNumber as partNo,
//                CONCAT(o6.code, '/', o8.code, '/', o5.Plant) as value
//                FROM object_10 o10
//                JOIN object_6  o6
//                ON o6.o_id = o10.SalesOrganization__id
//                JOIN object_8  o8
//                ON o8.o_id = o10.DistributionChannel__id
//                JOIN object_5  o5
//                ON o5.o_id = o10.DeliveringPlant__id
//                JOIN object_1 o1
//                ON FIND_IN_SET(o1.oo_id, o10.Material)
//                WHERE o10.epixFlag = '001'
//                AND o10.Material REGEXP ','
//            ";

            $newSql = "
                SELECT
                    product.articleNumber as partNo,
                    CONCAT(salesOrg.code, '/', distChannel.code, '/', plant.Plant) AS value
                FROM
                    object_10 salesMaster
                        JOIN
                    object_1 product ON product.oo_id = SUBSTRING(salesMaster.Material, 2, (length(salesMaster.Material) - 2 ) )
                        JOIN
                    object_6 salesOrg ON salesOrg.oo_id = salesMaster.SalesOrganization__id
                        JOIN
                    object_8 distChannel ON distChannel.oo_id = salesMaster.DistributionChannel__id
                        JOIN
                    object_5 plant ON plant.oo_id = salesMaster.DeliveringPlant__id
                WHERE
                    salesMaster.epixFlag = '001' AND
                    salesMaster.o_published = 1 AND
                    product.o_published = 1 AND
                    salesOrg.o_published = 1 AND
                    distChannel.o_published = 1 AND
                    plant.o_published = 1;
            ";

            $salesMaterialMaster = Db::get()->fetchAll($newSql);
            // Querying Product Line Master data from Database
//            $oldSql1 = "SELECT DISTINCT
//                o1.articleNumber as partNo,
//                o2.code as value
//                FROM object_10 o10
//                JOIN object_1 o1 ON
//                (REPLACE(SUBSTRING(substring_index(o10.Material, ',', 1),
//                length(substring_index(o10.Material, ',', 1- 1)) + 1), ',', '') = o1.oo_id)
//                JOIN object_2  o2
//                ON o2.oo_id = o1.SIOPLevel2";

//            $oldSql2 = "
//                SELECT
//                    articleNumber as partNo, SUBSTRING(TRIM(siopFullCode), 3, 4) as value
//                FROM
//                    object_1;
//            ";

            $newSql1 = "
                SELECT
                    distinct product.articleNumber as partNo,
                    SUBSTRING(TRIM(siopFullCode), 3, 4) AS value
                FROM
                    object_10 salesMaster
                        JOIN
                    object_1 product ON product.oo_id = SUBSTRING(salesMaster.Material, 2, (length(salesMaster.Material) - 2 ) )
                WHERE salesMaster.o_published = 1 AND product.o_published = 1
            ";

            $productLineMaster = Db::get()->fetchAll($newSql1);
            // Returning Sales material & product line master Array
            return ['salesMaterialMaster' => $salesMaterialMaster, 'productLineMaster' => $productLineMaster];
        } catch (\Exception $ex) {
            throw new \Exception( 'Attribute  Model Exception :: ' . $ex );
        }
    }

    /**
     * Defining getFacets Function
     *
     * @return array
     *
     * @throws Exception
     *
     */
    public static function getFacets() {
        try {
            // Querying B2B attributes from Database
			$b2bObjectPath = Db::get()->fetchOne('SELECT
                CONCAT(`o_path`, `o_key`) AS `path`
                FROM object_28
                WHERE object_28.o_published = 1'
            );
            $attributes = DataObject::getByPath($b2bObjectPath)->getB2BAttributeMapping();
            return $attributes;
        } catch (\Exception $ex) {
            throw new \Exception( 'Attribute  Model Exception :: ' . $ex );
        }
    }

    /**
     * Defining getValuesFacets Function
     *
     * @return array
     *
     * @throws Exception
     *
     */
    public static function getValuesFacets() {
      try {
        // Querying B2B attributes from Database

			$b2bObjectPath = Db::get()->fetchOne('SELECT
                CONCAT(`o_path`, `o_key`) AS `path`
                FROM object_28
                WHERE object_28.o_published = 1'
            );
            $attributes = DataObject::getByPath($b2bObjectPath)->getB2BAttributeMapping();
        return ['attributes' => $attributes, 'languageMaster' => self::languageMaster()];
      } catch (\Exception $ex) {
          throw new \Exception( 'Attribute  Model Exception :: ' . $ex );
      }
    }

    /**
     * Defining getAttrValCatEntryFacets Function
     *
     * @return array
     *
     * @throws Exception
     *
     */
    public static function getAttrValCatEntryFacets() {
        try {
            // Querying product master data from Database
//            $oldSql = "SELECT
//                    o1.oo_id
//                FROM object_10 o10
//                JOIN object_1 o1
//                ON o1.oo_id = o10.Material
//                WHERE o10.epixFlag = '001'
//                UNION DISTINCT
//                SELECT
//                    o1.oo_id
//                FROM object_10 o10
//                JOIN object_1 o1
//                ON FIND_IN_SET(o1.oo_id, o10.Material)
//                WHERE
//                o10.epixFlag = '001'
//                AND o10.Material REGEXP ','
//            ";


            $newSql = "
                SELECT DISTINCT
                    SUBSTRING(TRIM(material),
                        2,
                        (LENGTH(TRIM(material)) - 2)) AS oo_id
                FROM
                    object_10
                WHERE
                    epixFlag = '001'
                        AND material IS NOT NULL
                        AND material != ''
                        AND o_published = 1
		    ";

            $productsMaster = Db::get()->fetchAll($newSql);
            // Querying B2B attributes from Database
			$b2bObjectPath = Db::get()->fetchOne('SELECT
                CONCAT(`o_path`, `o_key`) AS `path`
                FROM object_28'
            );
            $attributes = DataObject::getByPath($b2bObjectPath)->getB2BAttributeMapping();
            // Returning products master & attributes @Array
            return [
                'productsMaster' => $productsMaster,
                'attributes' => $attributes
            ];
        } catch (\Exception $ex) {
            throw new \Exception( 'Attribute  Model Exception :: ' . $ex );
        }
    }

    /**
     * Function to eleminate duplicates from multi diamentional array by key
     *
     * @param array $array & String $key
     *
     * @return array
     *
     */
    protected function uniqueMultiDArray($array, $key) {
        $temp_array = [];
        $i = 0;
        $key_array = [];

        foreach ($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }

	/**
	 * Querying languages with languageId from Database
	 * @return array $languageMaster
	 */
	protected function languageMaster() {
		$languageMasterKeys = array_map(function($e){
				return $e['SystemCode'];
			}, Db::get()->fetchAll('
				SELECT SystemCode
				FROM object_27
			')
		);
		$languageMasterValues = array_map(function($e){
				return $e['Code'];
			}, Db::get()->fetchAll('
				SELECT Code
				FROM object_27
			')
		);
		// Language master from object_27 , ex : ['en' => -1, 'fr_CA' => -2]
		$languageMaster = array_combine($languageMasterKeys,$languageMasterValues);
		return 	$languageMaster;
	}
}
