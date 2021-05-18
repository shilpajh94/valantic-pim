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
            // Truncating custom tables
            Material::truncateCustomTables();
            // Creating Custom tables if not exist
            Material::createCustomTables();
            // Inserting Data in both tables
            Material::insertDataInCustomTables();
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
                    salesMaster.pricePageFlag,
                    CASE
                        WHEN plantMaterialMaster.AvailabilityCheckCode = '<NA>' THEN ''
                        ELSE plantMaterialMaster.AvailabilityCheckCode
                    END as SalesUOM
                FROM
                    object_query_10_custom_new salesMaster
                        JOIN
                    object_1 product ON product.oo_id = salesMaster.Material
                        JOIN
                    object_6 salesOrg ON salesOrg.oo_id = salesMaster.SalesOrganization__id
                        JOIN
                    object_8 distChannel ON distChannel.oo_id = salesMaster.DistributionChannel__id
                        JOIN
                    object_5 plant ON plant.oo_id = salesMaster.DeliveringPlant__id
                        JOIN
                    object_query_12_custom plantMaterialMaster ON (plantMaterialMaster.o_key = salesMaster.o_key)
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
     *
     * @throws Exception
     *
     */
    public static function truncateCustomTables() {
        try {
            Db::get()->executeQuery("TRUNCATE TABLE object_query_12_custom");

            Db::get()->executeQuery("TRUNCATE TABLE object_query_10_custom");

        } catch (\Exception $e) {
            \B2BExportBundle\Lib\Utils::log("Error while truncating custom table(s) :: " .$e->getMessage(),LogLevel::CRITICAL());
        } 
    }


    /**
     * Defining createCustomTables Function
     *
     * @throws Exception
     *
     */
    public static function createCustomTables() {
        try {
            Db::get()->executeQuery("CREATE TABLE IF NOT EXISTS object_query_12_custom (
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

            Db::get()->executeQuery("CREATE TABLE IF NOT EXISTS object_query_10_custom (
                    oo_id int(11) NOT NULL DEFAULT '0',
                    o_published tinyint(1) unsigned DEFAULT '1',
                    o_key varchar(255),
                    Material text,
                    pricePageFlag varchar(255) NULL,
                    SalesOrganization__id int(11) NULL,
                    DistributionChannel__id int(11) NULL,
                    DeliveringPlant__id int(11) NULL,
                    epixFlag varchar(255) DEFAULT NULL,
                    UNIQUE (o_key),
                    PRIMARY KEY (oo_id)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

        } catch (\Exception $e) {
            \B2BExportBundle\Lib\Utils::log("Custome table(s) not created :: " .$e->getMessage(),LogLevel::CRITICAL());
        } 
    }


    /*
     * Defining insertDataInCustomTables Function
     *
     * @throws Exception
     *
     */
    public static function insertDataInCustomTables() {
        try {
            Db::get()->executeQuery("INSERT INTO object_query_12_custom
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

            Db::get()->executeQuery("INSERT INTO object_query_10_custom
                ( SELECT 
                    salesMaster.oo_id,
                    salesMaster.o_published,
                    CONCAT(product.articleNumber,'-',plant.Plant,'-',salesOrg.code,'-',distChannel.code),
                    REPLACE(salesMaster.Material,',',''),
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

        } catch (\Exception $e) {
            \B2BExportBundle\Lib\Utils::log("Error while inserting data in custom table(s) :: " .$e->getMessage(),LogLevel::CRITICAL());
        } 
    }
}
