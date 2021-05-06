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
                    plantMaterialMaster.TotalReplenismentLeadTime AS leadTime,
                    plantMaterialMaster.MinOrderQuantity AS minOrdQty,
                    0 AS maxOrdQty,
                    plantMaterialMaster.OrderingQuantityIncrements as ordIncrementQty,
                    salesMaster.SalesUOM AS SalesUOM,
                    salesMaster.pricePageFlag
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
                        JOIN
                    object_12 plantMaterialMaster ON (plantMaterialMaster.Plant__id = salesMaster.DeliveringPlant__id
                    AND SUBSTRING(plantMaterialMaster.Material, 2, (length(plantMaterialMaster.Material) - 2 ) ) = product.oo_id
                    AND plantMaterialMaster.SalesOrganization__id = salesOrg.oo_id
                    AND plantMaterialMaster.DistributionChannel__id = distChannel.oo_id)
            WHERE
                    salesMaster.epixFlag = '001' AND
                    salesMaster.o_published = 1 AND
                    product.o_published = 1 AND
                    salesOrg.o_published = 1 AND
                    distChannel.o_published = 1 AND
                    plantMaterialMaster.o_published = 1 AND
                    plant.o_published = 1;
    ");
    return $salesMaterialMaster;
      } catch (\Exception $ex) {
            \B2BExportBundle\Lib\Utils::log("Material Model Exception :: " .$ex->getMessage(),LogLevel::CRITICAL());
      }
    }
}
