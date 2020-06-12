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
    public static function getValues()
    {
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
              WHERE o10.epixFlag = '001'
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
              ON o5.o_id = o12.Plant__id');
            // Querying ProductLine data from Database
            $productLineMaster = Db::get()->fetchAll('SELECT 
              DISTINCT
              (o2.Level - 1) AS level,
              RIGHT(`fullCode`, LENGTH(`fullCode`) - 2) AS code
              FROM object_2 o2
              WHERE `Level` = 2
            ');
            // Merging data from Sales Material Master & Plant Material Master Database
            $materialMaster = self::uniqueMultiDArray(array_merge($salesMaterialMaster, $plantMaterialMaster), 'Identifier');
            // Returning material master & product line master
            return ['materialMaster' => $materialMaster, 'productLineMaster' => $productLineMaster];
        } catch (Exception $ex) {
            throw new Exception( 'Attribute  Model Exception :: ' . $ex );
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
    public static function getValuesCategoryEntry()
    {
        try {
            // Querying data from Sales Material Master Database
            $salesMaterialMaster = Db::get()->fetchAll("SELECT DISTINCT
                o1.articleNumber as partNo,
                CONCAT(o6.code, '/', o8.code, '/', o5.Plant) as value
                FROM object_10 o10
                JOIN object_6  o6
                ON o6.o_id = o10.SalesOrganization__id
                JOIN object_8  o8
                ON o8.o_id = o10.DistributionChannel__id
                JOIN object_5  o5
                ON o5.o_id = o10.DeliveringPlant__id
                JOIN object_1  o1
                ON o1.o_id = o10.Material
                AND o10.epixFlag = 001
            ");
            // Querying Product Line Master data from Database
            $productLineMaster = Db::get()->fetchAll("SELECT DISTINCT
                o1.articleNumber as partNo,
                o2.code as value
                FROM object_10 o10
                JOIN object_1  o1
                ON o1.o_id = o10.Material
                AND o10.epixFlag = 001
                JOIN object_2  o2
                ON o2.oo_id = o1.SIOPLevel2
            ");
            // Returning Sales material & product line master Array
            return ['salesMaterialMaster' => $salesMaterialMaster, 'productLineMaster' => $productLineMaster];
        } catch (Exception $ex) {
            throw new Exception( 'Attribute  Model Exception :: ' . $ex );
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
    public static function getFacets()
    {
        try {
            // Querying B2B attributes from Database
			$b2bObjectPath = Db::get()->fetchOne('SELECT
                CONCAT(`o_path`, `o_key`) AS `path`
                FROM object_28'
            );
            $attributes = DataObject::getByPath($b2bObjectPath)->getB2BAttributeMapping();
            return $attributes;
        } catch (Exception $ex) {
            throw new Exception( 'Attribute  Model Exception :: ' . $ex );
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
    public static function getValuesFacets()
    {
      try {
        // Querying B2B attributes from Database

			$b2bObjectPath = Db::get()->fetchOne('SELECT
                CONCAT(`o_path`, `o_key`) AS `path`
                FROM object_28'
            );
            $attributes = DataObject::getByPath($b2bObjectPath)->getB2BAttributeMapping();
        return $attributes;
      } catch (Exception $ex) {
          throw new Exception( 'Attribute  Model Exception :: ' . $ex );
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
    public static function getAttrValCatEntryFacets()
    {
        try {
            // Querying product master data from Database
            $productsMaster = Db::get()->fetchAll('SELECT DISTINCT
                o1.oo_id,
                o1.*
                FROM object_1 o1
                INNER JOIN object_10 o10 ON o1.oo_id = o10.Material AND o10.epixFlag = "001"
            ');
            // Querying B2B attributes from Database
			$b2bObjectPath = Db::get()->fetchOne('SELECT
                CONCAT(`o_path`, `o_key`) AS `path`
                FROM object_28'
            );
            $attributes = DataObject::getByPath($b2bObjectPath)->getB2BAttributeMapping();
            // Returning products master & attributes @Array
            return ['productsMaster' => $productsMaster, 'attributes' => $attributes];
        } catch (Exception $ex) {
            throw new Exception( 'Attribute  Model Exception :: ' . $ex );
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
    protected function uniqueMultiDArray($array, $key)
    {
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
}