<?php
namespace B2BExportBundle\Services\Model;

use AppBundle\Logger\LogLevel;
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
      $salesMaterialMaster = Db::get()->fetchAll("
            SELECT
                    product.articleNumber as partNo,
                    salesOrg.code AS salesOrgCode,
                    distChannel.code AS dcCode,
                    plant.Plant AS plantCode,
                    0 AS leadTime,
                    0 as minOrdQty,
                    0 AS maxOrdQty,
                    0 as ordIncrementQty,
                    salesMaster.SalesUOM AS SalesUOM,
                    salesMaster.pricePageFlag
            FROM
                    object_query_10 salesMaster
                        JOIN
                    object_query_1 product ON product.oo_id = SUBSTRING(salesMaster.Material, 2, (length(salesMaster.Material) - 2 ) )
                        JOIN
                    object_query_6 salesOrg ON salesOrg.oo_id = salesMaster.SalesOrganization__id
                        JOIN
                    object_query_8 distChannel ON distChannel.oo_id = salesMaster.DistributionChannel__id
                        JOIN
                    object_query_5 plant ON plant.oo_id = salesMaster.DeliveringPlant__id
            WHERE
                    salesMaster.epixFlag = '001';
    ");
    return $salesMaterialMaster;
      } catch (Exception $ex) {
            \B2BExportBundle\Lib\Utils::log("Material Model Exception :: " .$ex->getMessage(),LogLevel::CRITICAL());
      }
    }
}
