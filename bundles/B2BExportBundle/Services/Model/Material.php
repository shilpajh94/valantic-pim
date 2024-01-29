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

    CONST OBJECT_10_CUSTOM_FOR_B2BEXPORT = 'object_10_custom_for_b2bexport';
    CONST OBJECT_12_CUSTOM_FOR_B2BEXPORT = 'object_12_custom_for_b2bexport';

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
            // Creating Custom tables if not exist
            Material::createCustomTables();
            // Truncating custom tables
            Material::truncateCustomTables();
            // Inserting Data in both tables
            Material::insertDataInCustomTables();
            // Querying data from Sales Material Master Database
            $salesMaterialMaster = Db::get()->fetchAllAssociative("
                SELECT
                    product.articleNumber as partNo,
                    salesOrg.code AS salesOrgCode,
                    distChannel.code AS dcCode,
                    salesMaster.SalesUOM as SalesUOM,
                    plant.Plant AS plantCode,
                    plantMaterialMaster.TotalReplenismentLeadTime AS leadTime,
                    plantMaterialMaster.MinOrderQuantity AS minOrdQty,
                    0 AS maxOrdQty,
                    plantMaterialMaster.OrderingQuantityIncrements as ordIncrementQty,
                    salesMaster.pricePageFlag,
                    CASE
                        WHEN plantMaterialMaster.AvailabilityCheckCode = '<NA>' THEN ''
                        ELSE plantMaterialMaster.AvailabilityCheckCode
                    END as AvailabilityCheckCode
                FROM
                    ".self::OBJECT_10_CUSTOM_FOR_B2BEXPORT." salesMaster
                        JOIN
                    object_1 product ON product.oo_id = salesMaster.Material
                        JOIN
                    object_6 salesOrg ON salesOrg.oo_id = salesMaster.SalesOrganization__id
                        JOIN
                    object_8 distChannel ON distChannel.oo_id = salesMaster.DistributionChannel__id
                        JOIN
                    object_5 plant ON plant.oo_id = salesMaster.DeliveringPlant__id
                        JOIN
                    ".self::OBJECT_12_CUSTOM_FOR_B2BEXPORT." plantMaterialMaster ON (plantMaterialMaster.o_key = salesMaster.o_key)
                WHERE
                    product.o_published = 1 AND
                    salesOrg.o_published = 1 AND
                    distChannel.o_published = 1 AND
                    plant.o_published = 1;
        ");
        return $salesMaterialMaster;
        } catch (\Exception $ex) {
            \B2BExportBundle\Lib\Utils::log("Material Model Exception :: " .$ex->getMessage(),LogLevel::CRITICAL());
        }
    }


    /**
     * Defining truncateCustomTables Function
     */
    public static function truncateCustomTables() {
        Db::get()->executeQuery("TRUNCATE TABLE ".self::OBJECT_10_CUSTOM_FOR_B2BEXPORT);

        Db::get()->executeQuery("TRUNCATE TABLE ".self::OBJECT_12_CUSTOM_FOR_B2BEXPORT);
    }


    /**
     * Defining createCustomTables Function
     *
     */
    public static function createCustomTables() {
        Db::get()->executeQuery("CREATE TABLE IF NOT EXISTS ".self::OBJECT_12_CUSTOM_FOR_B2BEXPORT." (
            oo_id int(11) NOT NULL DEFAULT 0,
            o_published tinyint(1) unsigned DEFAULT 1,
            o_key varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT '',
            Material text,
            Plant__id int(11) DEFAULT NULL,
            Plant__type enum('document','asset','object') DEFAULT NULL,
            MinOrderQuantity double DEFAULT NULL,
            TotalReplenismentLeadTime double DEFAULT NULL,
            SafetyStock double DEFAULT NULL,
            StockIndicator varchar(190) DEFAULT NULL,
            SalesOrganization__id int(11) DEFAULT NULL,
            SalesOrganization__type enum('document','asset','object') DEFAULT NULL,
            DistributionChannel__id int(11) DEFAULT NULL,
            DistributionChannel__type enum('document','asset','object') DEFAULT NULL,
            OrderingQuantityIncrements double DEFAULT NULL,
            deletedFlagAtPlantLevel tinyint(1) DEFAULT NULL,
            AvailabilityCheckCode varchar(190) DEFAULT NULL,
            UNIQUE (o_key),
            PRIMARY KEY (oo_id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

        Db::get()->executeQuery("CREATE TABLE IF NOT EXISTS ".self::OBJECT_10_CUSTOM_FOR_B2BEXPORT." (
                oo_id int(11) NOT NULL DEFAULT '0',
                o_published tinyint(1) unsigned DEFAULT '1',
                o_key varchar(255),
                Material text,
                SalesUOM varchar(255) NULL,
                pricePageFlag varchar(255) NULL,
                SalesOrganization__id int(11) NULL,
                DistributionChannel__id int(11) NULL,
                DeliveringPlant__id int(11) NULL,
                epixFlag varchar(255) DEFAULT NULL,
                UNIQUE (o_key),
                PRIMARY KEY (oo_id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
    }


    /*
     * Defining insertDataInCustomTables Function
     *
     */
    public static function insertDataInCustomTables() {
        Db::get()->executeQuery("INSERT INTO ".self::OBJECT_12_CUSTOM_FOR_B2BEXPORT."
            ( SELECT
                oo_id,
                o_published,
                o_key,
                REPLACE(Material,',',''),
                Plant__id,
                Plant__type,
                MinOrderQuantity,
                TotalReplenismentLeadTime,
                SafetyStock,
                StockIndicator,
                SalesOrganization__id,
                SalesOrganization__type,
                DistributionChannel__id,
                DistributionChannel__type,
                OrderingQuantityIncrements,
                deletedFlagAtPlantLevel,
                AvailabilityCheckCode
                FROM object_12
            )");

        Db::get()->executeQuery("INSERT INTO ".self::OBJECT_10_CUSTOM_FOR_B2BEXPORT."
            ( SELECT
                salesMaster.oo_id,
                salesMaster.o_published,
                CONCAT(product.articleNumber,'-',plant.Plant,'-',salesOrg.code,'-',distChannel.code),
                REPLACE(salesMaster.Material,',',''),
                salesMaster.SalesUOM,
                salesMaster.pricePageFlag,
                salesMaster.SalesOrganization__id,
                salesMaster.DistributionChannel__id,
                salesMaster.DeliveringPlant__id,
                salesMaster.epixFlag
                FROM
                object_10 salesMaster JOIN object_1 product ON product.oo_id = SUBSTRING(salesMaster.Material, 2, (length(salesMaster.Material) - 2 ) )
                JOIN
                object_6 salesOrg ON salesOrg.oo_id = salesMaster.SalesOrganization__id
                JOIN
                object_8 distChannel ON distChannel.oo_id = salesMaster.DistributionChannel__id
                JOIN
                object_5 plant ON plant.oo_id = salesMaster.DeliveringPlant__id
                where salesMaster.epixFlag = '001' and salesMaster.o_published = '1'
        )");
    }
}
