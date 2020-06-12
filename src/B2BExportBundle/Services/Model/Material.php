<?php
namespace B2BExportBundle\Services\Model;

use Exception;
use Pimcore\Db;
use Pimcore\Log\Simple as Logger;
use Pimcore\Model\DataObject;

/**
 * Model Class Material
 *
 * Material Service Model 
 *
 * @package ExportBundle\Services\Model
 */
class Material
{
    /**
     * Defining getPlants Function
     *
     * @return array
     *
     * @throws Exception
     *
     */
    public static function getPlants(){
		try {
      // Querying data from Sales Material Master Database		
      $salesMaterialMaster = Db::get()->fetchAll("SELECT DISTINCT
        o1.articleNumber as partNo,
        o6.code AS salesOrgCode,
        o8.code AS dcCode,
        o5.Plant AS plantCode,
        0 AS leadTime,
        0 as minOrdQty,
        0 AS maxOrdQty,
        0 as ordIncrementQty,
        '' AS SalesUOM,
        o10.pricePageFlag
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
    return $salesMaterialMaster;
      } catch (Exception $ex) {
              Logger::log('b2bexport',"Material Model Exception :: " .$ex->getMessage());
      }
    }
}