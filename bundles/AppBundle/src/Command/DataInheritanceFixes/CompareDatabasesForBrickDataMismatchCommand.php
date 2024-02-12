<?php

namespace AppBundle\Command\DataInheritanceFixes;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * This script is created for one time execution to ensure that "contitech:clear_child_brick_data_when_parent_has_data"
 * command did not alter the unintended data.
 * Compare the data of before execution and after execution of script
 */
class CompareDatabasesForBrickDataMismatchCommand extends Command
{

    private $dbCon;

    private $db_1_name = "";
    private $db_2_name = "";

    // db after running the scripts
    private $newDb = "contiTech_28_oct_c3";

    // db before running the scripts
    private $olderDb = "contiTech_28_oct_c1_c2";

    const BRICKS_TO_COMPARE = [
        "base" => ["HoseBase","PTGBase"],
        "skeleton" => ["HoseSkeleton","PTGSkeleton"],
        "fert" => ["AccessoriesFert","BeltsFert","HoseFert","HydFittingsFert","INHFittingsFert","MetalFert","PTGFert","SynchronousFert"]
    ];

    const STORE_TABLE_COMPARE_LOG = "store_table_compare_log";
    const QUERY_TABLE_COMPARE_LOG = "query_table_compare_log";

    const AFTER_C3_FIX_COMPARISON_FILE_FOR_BASE_PRODUCT_BASE_BRICKS = "AfterC3Fix_ComparisonFileFor_BaseProductBaseBricks";

    const AFTER_C3_FIX_COMPARISON_FILE_FOR_SKELETON_PRODUCT_BASE_BRICKS = "AfterC3Fix_ComparisonFileFor_SkeltonProductBaseBricks";
    const AFTER_C3_FIX_COMPARISON_FILE_FOR_FERT_PRODUCT_BASE_BRICKS = "AfterC3Fix_ComparisonFileFor_FertProductBaseBricks";

    const AFTER_C3_FIX_COMPARISON_FILE_FOR_SKELETON_PRODUCT_SKELETON_BRICKS = "AfterC3Fix_ComparisonFileFor_SkeletonProductSkeletonBricks";
    const AFTER_C3_FIX_COMPARISON_FILE_FOR_FERT_PRODUCT_SKELETON_BRICKS = "AfterC3Fix_ComparisonFileFor_FertProductSkeletonBricks";

    const AFTER_C3_FIX_COMPARISON_FILE_FOR_FERT_PRODUCT_FERT_BRICKS = "AfterC3Fix_ComparisonFileFor_FertProductFertBricks";


    public function __construct(string $name = null)
    {
        $this->dbCon = \Pimcore\Db::get();
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('contitech:compare_databases_for_brick_data_mismatch');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        // $this->compareStoreTables();
        // $this->compareQueryTables();

        // $this->generator_AfterC3Fix_ComparisonFileForBaseBricks(self::AFTER_C3_FIX_COMPARISON_FILE_FOR_BASE_PRODUCT_BASE_BRICKS);
        // $this->generator_AfterC3Fix_ComparisonFileForSkeletonProductBaseBricks(self::AFTER_C3_FIX_COMPARISON_FILE_FOR_SKELETON_PRODUCT_BASE_BRICKS);
        // $this->generator_AfterC3Fix_ComparisonFileForFertProductBaseBricks(self::AFTER_C3_FIX_COMPARISON_FILE_FOR_FERT_PRODUCT_BASE_BRICKS);

        // $this->generator_AfterC3Fix_ComparisonFileForSkeletonProductSkeletonBricks(self::AFTER_C3_FIX_COMPARISON_FILE_FOR_SKELETON_PRODUCT_SKELETON_BRICKS);

        // $this->generator_AfterC3Fix_ComparisonFileForFertProductSkeletonBricks(self::AFTER_C3_FIX_COMPARISON_FILE_FOR_FERT_PRODUCT_SKELETON_BRICKS);

        // $this->generator_AfterC3Fix_ComparisonFileForFertProductFertBricks(self::AFTER_C3_FIX_COMPARISON_FILE_FOR_FERT_PRODUCT_FERT_BRICKS);

    }


    private function compareStoreTables()
    {
        $this->compareTable("store",self::STORE_TABLE_COMPARE_LOG);
    }

    private function compareQueryTables()
    {
        $this->compareTable("query",self::QUERY_TABLE_COMPARE_LOG);
    }


    private function compareTable(string $tableType, string $logFileName)
    {
        $csvLogFilePath = PIMCORE_LOG_DIRECTORY . "/" . $logFileName . ".csv";
        $csvLogFileHandle = fopen($csvLogFilePath, "a");
        $this->csvLog($csvLogFileHandle,["#","Brick Name","Column Name","Object Id","DB 1 Data"," DB 2 Data","Brick Type"]);

        foreach(self::BRICKS_TO_COMPARE as $brickType => $brickNames){
            foreach($brickNames as $brickName){
                $tableName = "object_brick_". $tableType ."_" . $brickName . "_1";

                $tableColumns = $this->getAllColumnsOfTable($this->db_1_name,$tableName);

                foreach($tableColumns as $columnName){
                    p_r($tableName . "-" . $columnName);
                    $query = "        
                                SELECT 
                                    db1BrickTable.id objectId,
                                    db1BrickTable.$columnName db1Data,
                                    db2BrickTable.$columnName db2Data
                                FROM
                                    $this->db_1_name.$tableName AS db1BrickTable
                                        JOIN
                                    $this->db_1_name.object_1 AS db1ObjectTable ON db1BrickTable.id = db1ObjectTable.id
                                        JOIN
                                    $this->db_2_name.$tableName AS db2BrickTable ON db1BrickTable.id = db2BrickTable.id
                                WHERE
                                    db1ObjectTable.productType = '$brickType'
                                        AND (
                                                (db1BrickTable.$columnName IS NOT NULL AND db2BrickTable.$columnName IS NULL)
                                                OR (db1BrickTable.$columnName IS NULL	AND db2BrickTable.$columnName IS NOT NULL)
                                                OR (db1BrickTable.$columnName != db2BrickTable.$columnName)
                                            )
                        ";

                        $result = $this->dbCon->fetchAllAssociative($query);
                        p_r("Result Count = " . count($result));
                        $c = 0;
                        foreach ($result as $item) {
                            $objectId = $item['objectId'];
                            $db1Data = $item['db1Data'];
                            $db2Data = $item['db2Data'];
                
                            $this->csvLog($csvLogFileHandle, [++$c, $brickName, $columnName, $objectId, $db1Data, $db2Data, $brickType]);
                        }
                }

               

            }

        }
        fclose($csvLogFileHandle);
    }

    private function generator_AfterC3Fix_ComparisonFileForBaseBricks(string $logFileName)
    {
        $csvLogFilePath = PIMCORE_LOG_DIRECTORY . "/" . $logFileName . ".csv";
        $csvLogFileHandle = fopen($csvLogFilePath, "w+");
        $this->csvLog($csvLogFileHandle,
                    ["#","Brick Name","Column Name",
                    "Base_Id","New_Base_Store_Data","New_Skeleton_Store_Data",
                    "New_Fert_Store_Data","Old_Base_Store_Data","Old_Skeleton_Store_Data",
                    "Old_Fert_Store_Data","validity_Store_Table","validity_Store_Table_1",
                    "validity_Store_Table_2",
                    "--SEPARATOR--",
                    "new_Base_Query_Data","new_Skeleton_Query_Data",
                    "new_Fert_Query_Data","old_Base_Query_Data",
                    "old_Skeleton_Query_Data","old_Fert_Query_Data",
                    "validity_Query_Table","validity_Query_Table_1","validity_Query_Table_2"]);

        foreach(self::BRICKS_TO_COMPARE["base"] as $brickName){
                $storeTableName = "object_brick_store_" . $brickName . "_1";
                $queryTableName = "object_brick_query_" . $brickName . "_1";

                $tableColumns = $this->getAllColumnsOfTable($this->newDb,$storeTableName);

                foreach($tableColumns as $columnName){
                    p_r($storeTableName . "-" . $columnName);
                    $query = "        
                    SELECT 
                        *,
                        IF(dataTable.New_Base_Store_Data = dataTable.Old_Skeleton_Store_Data,
                            TRUE,
                            IF(dataTable.New_Base_Store_Data = dataTable.Old_Fert_Store_Data,
                                TRUE,
                                FALSE)) AS validity_Store_Table,
                        IF(dataTable.New_Skeleton_Store_Data IS NULL, true , false) AS validity_Store_Table_1,
                        IF(dataTable.New_Fert_Store_Data IS NULL, true , false) AS validity_Store_Table_2,
                        IF(dataTable.New_Base_Query_Data = concat(',',dataTable.New_Base_Store_Data,','), true, false) AS validity_Query_Table,
                        IF(dataTable.New_Skeleton_Query_Data = concat(',',dataTable.New_Base_Store_Data,','), true, false) AS validity_Query_Table_1,
                        IF(dataTable.New_Fert_Query_Data = concat(',',dataTable.New_Base_Store_Data,','), true, false) AS validity_Query_Table_2
                    FROM
                        (SELECT 
                            newDBBaseProduct_Store_Table.id Base_Id,
                                GROUP_CONCAT(DISTINCT newDBBaseProduct_Store_Table.$columnName) AS New_Base_Store_Data,
                                GROUP_CONCAT(DISTINCT newDBSkeletonProduct_Store_Table.$columnName
                                    SEPARATOR ' , ') AS New_Skeleton_Store_Data,
                                GROUP_CONCAT(DISTINCT newDBFertProduct_Store_Table.$columnName
                                    SEPARATOR ' , ') AS New_Fert_Store_Data,
                                GROUP_CONCAT(DISTINCT oldDBBaseProduct_Store_Table.$columnName) AS Old_Base_Store_Data,
                                GROUP_CONCAT(DISTINCT oldDBSkeletonProduct_Store_Table.$columnName
                                    SEPARATOR ' , ') AS Old_Skeleton_Store_Data,
                                GROUP_CONCAT(DISTINCT oldDBFertProduct_Store_Table.$columnName
                                    SEPARATOR ' , ') AS Old_Fert_Store_Data,
                                '------',
                                GROUP_CONCAT(DISTINCT newDBBaseProduct_Query_Table.$columnName) AS New_Base_Query_Data,
                                GROUP_CONCAT(DISTINCT newDBSkeletonProduct_Query_Table.$columnName
                                    SEPARATOR ' , ') AS New_Skeleton_Query_Data,
                                GROUP_CONCAT(DISTINCT newDBFertProduct_Query_Table.$columnName
                                    SEPARATOR ' , ') AS New_Fert_Query_Data,
                                GROUP_CONCAT(DISTINCT oldDBBaseProduct_Query_Table.$columnName) AS Old_Base_Query_Data,
                                GROUP_CONCAT(DISTINCT oldDBSkeletonProduct_Query_Table.$columnName
                                    SEPARATOR ' , ') AS Old_Skeleton_Query_Data,
                                GROUP_CONCAT(DISTINCT oldDBFertProduct_Query_Table.$columnName
                                    SEPARATOR ' , ') AS Old_Fert_Query_Data
                        FROM
                            $this->newDb.$storeTableName AS newDBBaseProduct_Store_Table
                                JOIN $this->olderDb.$storeTableName AS oldDBBaseProduct_Store_Table ON newDBBaseProduct_Store_Table.id = oldDBBaseProduct_Store_Table.id
                                JOIN $this->newDb.object_1 AS objectTableBaseProduct ON newDBBaseProduct_Store_Table.id = objectTableBaseProduct.id
                                JOIN $this->newDb.object_1 AS objectTableSkeletonProduct ON objectTableSkeletonProduct.parentId = objectTableBaseProduct.id
                                JOIN $this->newDb.$storeTableName AS newDBSkeletonProduct_Store_Table ON objectTableSkeletonProduct.id = newDBSkeletonProduct_Store_Table.id
                                JOIN $this->olderDb.$storeTableName AS oldDBSkeletonProduct_Store_Table ON newDBSkeletonProduct_Store_Table.id = oldDBSkeletonProduct_Store_Table.id
                                JOIN $this->newDb.object_1 AS objectTableFertProduct ON objectTableFertProduct.parentId = newDBSkeletonProduct_Store_Table.id
                                JOIN $this->newDb.$storeTableName AS newDBFertProduct_Store_Table ON newDBFertProduct_Store_Table.id = objectTableFertProduct.id
                                JOIN $this->olderDb.$storeTableName AS oldDBFertProduct_Store_Table ON oldDBFertProduct_Store_Table.id = newDBFertProduct_Store_Table.id

                                JOIN $this->newDb.$queryTableName AS newDBBaseProduct_Query_Table ON newDBBaseProduct_Store_Table.id = newDBBaseProduct_Query_Table.id
                                JOIN $this->newDb.$queryTableName AS newDBSkeletonProduct_Query_Table ON newDBSkeletonProduct_Store_Table.id = newDBSkeletonProduct_Query_Table.id
                                JOIN $this->newDb.$queryTableName AS newDBFertProduct_Query_Table ON newDBFertProduct_Store_Table.id = newDBFertProduct_Query_Table.id

                                JOIN $this->olderDb.$queryTableName AS oldDBBaseProduct_Query_Table ON oldDBBaseProduct_Store_Table.id = oldDBBaseProduct_Query_Table.id
                                JOIN $this->olderDb.$queryTableName AS oldDBSkeletonProduct_Query_Table ON oldDBSkeletonProduct_Store_Table.id = oldDBSkeletonProduct_Query_Table.id
                                JOIN $this->olderDb.$queryTableName AS oldDBFertProduct_Query_Table ON oldDBFertProduct_Store_Table.id = oldDBFertProduct_Query_Table.id

                            WHERE
                            (newDBBaseProduct_Store_Table.$columnName != oldDBBaseProduct_Store_Table.$columnName)
                                OR ((newDBBaseProduct_Store_Table.$columnName IS NULL
                                AND oldDBBaseProduct_Store_Table.$columnName IS NOT NULL)
                                OR (newDBBaseProduct_Store_Table.$columnName IS NOT NULL
                                AND oldDBBaseProduct_Store_Table.$columnName IS NULL))
                        GROUP BY newDBBaseProduct_Store_Table.id) AS dataTable

                        ";

                        $result = $this->dbCon->fetchAllAssociative($query);
                        p_r("Result Count = " . count($result));
                        $c = 0;
                        foreach ($result as $item) {
                            $base_Id = $item['Base_Id'];
                            $new_Base_Store_Data = $item['New_Base_Store_Data'];
                            $new_Skeleton_Store_Data = $item['New_Skeleton_Store_Data'];
                            $new_Fert_Store_Data = $item['New_Fert_Store_Data'];
                            $old_Base_Store_Data = $item['Old_Base_Store_Data'];
                            $old_Skeleton_Store_Data = $item['Old_Skeleton_Store_Data'];
                            $old_Fert_Store_Data = $item['Old_Fert_Store_Data'];

                            $new_Base_Query_Data = $item['New_Base_Query_Data'];
                            $new_Skeleton_Query_Data = $item['New_Skeleton_Query_Data'];
                            $new_Fert_Query_Data = $item['New_Fert_Query_Data'];
                            $old_Base_Query_Data = $item['Old_Base_Query_Data'];
                            $old_Skeleton_Query_Data = $item['Old_Skeleton_Query_Data'];
                            $old_Fert_Query_Data = $item['Old_Fert_Query_Data'];

                            $validity_Store_Table = $item['validity_Store_Table'];
                            $validity_Store_Table_1 = $item['validity_Store_Table_1'];
                            $validity_Store_Table_2 = $item['validity_Store_Table_2'];

                            $validity_Query_Table = $item['validity_Query_Table'];
                            $validity_Query_Table_1 = $item['validity_Query_Table_1'];
                            $validity_Query_Table_2 = $item['validity_Query_Table_2'];
                
                            $this->csvLog($csvLogFileHandle, [++$c, $brickName, 
                                                        $columnName, $base_Id, 
                                                        $new_Base_Store_Data, $new_Skeleton_Store_Data, 
                                                        $new_Fert_Store_Data,$old_Base_Store_Data,
                                                        $old_Skeleton_Store_Data,$old_Fert_Store_Data,
                                                        $validity_Store_Table,$validity_Store_Table_1,$validity_Store_Table_2,
                                                        '-----',
                                                        $new_Base_Query_Data, $new_Skeleton_Query_Data, 
                                                        $new_Fert_Query_Data,$old_Base_Query_Data,
                                                        $old_Skeleton_Query_Data,$old_Fert_Query_Data,
                                                        $validity_Query_Table,$validity_Query_Table_1,$validity_Query_Table_2
                                                        ]);
                        }
                }
        }
        fclose($csvLogFileHandle);
    }

    private function generator_AfterC3Fix_ComparisonFileForSkeletonProductBaseBricks(string $logFileName)
    {
        $csvLogFilePath = PIMCORE_LOG_DIRECTORY . "/" . $logFileName . ".csv";
        $csvLogFileHandle = fopen($csvLogFilePath, "w+");
        $this->csvLog($csvLogFileHandle,
                    ["#","Brick Name","Column Name",
                    "Base_Id","New_Base_Store_Data","New_Skeleton_Store_Data",
                    "New_Fert_Store_Data","Old_Base_Store_Data","Old_Skeleton_Store_Data",
                    "Old_Fert_Store_Data","validity_Store_Table","validity_Store_Table_1",
                    "validity_Store_Table_2",
                    "--SEPARATOR--",
                    "new_Base_Query_Data","new_Skeleton_Query_Data",
                    "new_Fert_Query_Data","old_Base_Query_Data",
                    "old_Skeleton_Query_Data","old_Fert_Query_Data",
                    "validity_Query_Table","validity_Query_Table_1","validity_Query_Table_2"]);

        foreach(self::BRICKS_TO_COMPARE["base"] as $brickName){
                $storeTableName = "object_brick_store_" . $brickName . "_1";
                $queryTableName = "object_brick_query_" . $brickName . "_1";

                $tableColumns = $this->getAllColumnsOfTable($this->newDb,$storeTableName);

                foreach($tableColumns as $columnName){
                    p_r($storeTableName . "-" . $columnName);
                    $query = "        
                    SELECT 
                        *,
                        if(dataTable.Old_Skeleton_Store_Data = dataTable.New_Base_Store_Data, true , false) as validity_Store_Table,
                        IF(dataTable.New_Base_Query_Data = concat(',',dataTable.New_Base_Store_Data,','), true, false) AS validity_Query_Table,
                        IF(dataTable.New_Skeleton_Query_Data = concat(',',dataTable.New_Base_Store_Data,','), true, false) AS validity_Query_Table_1,
                        IF(dataTable.New_Fert_Query_Data = concat(',',dataTable.New_Base_Store_Data,','), true, false) AS validity_Query_Table_2
                    FROM
                        (SELECT 
                            newDBBaseProduct_Store_Table.id Base_Id,
                                GROUP_CONCAT(DISTINCT newDBBaseProduct_Store_Table.$columnName) AS New_Base_Store_Data,
                                GROUP_CONCAT(DISTINCT newDBSkeletonProduct_Store_Table.$columnName
                                    SEPARATOR ' , ') AS New_Skeleton_Store_Data,
                                GROUP_CONCAT(DISTINCT newDBFertProduct_Store_Table.$columnName
                                    SEPARATOR ' , ') AS New_Fert_Store_Data,
                                GROUP_CONCAT(DISTINCT oldDBBaseProduct_Store_Table.$columnName) AS Old_Base_Store_Data,
                                GROUP_CONCAT(DISTINCT oldDBSkeletonProduct_Store_Table.$columnName
                                    SEPARATOR ' , ') AS Old_Skeleton_Store_Data,
                                GROUP_CONCAT(DISTINCT oldDBFertProduct_Store_Table.$columnName
                                    SEPARATOR ' , ') AS Old_Fert_Store_Data,
                                '------',
                                GROUP_CONCAT(DISTINCT newDBBaseProduct_Query_Table.$columnName) AS New_Base_Query_Data,
                                GROUP_CONCAT(DISTINCT newDBSkeletonProduct_Query_Table.$columnName
                                    SEPARATOR ' , ') AS New_Skeleton_Query_Data,
                                GROUP_CONCAT(DISTINCT newDBFertProduct_Query_Table.$columnName
                                    SEPARATOR ' , ') AS New_Fert_Query_Data,
                                GROUP_CONCAT(DISTINCT oldDBBaseProduct_Query_Table.$columnName) AS Old_Base_Query_Data,
                                GROUP_CONCAT(DISTINCT oldDBSkeletonProduct_Query_Table.$columnName
                                    SEPARATOR ' , ') AS Old_Skeleton_Query_Data,
                                GROUP_CONCAT(DISTINCT oldDBFertProduct_Query_Table.$columnName
                                    SEPARATOR ' , ') AS Old_Fert_Query_Data
                        FROM
                            $this->newDb.$storeTableName AS newDBBaseProduct_Store_Table
                                JOIN $this->olderDb.$storeTableName AS oldDBBaseProduct_Store_Table ON newDBBaseProduct_Store_Table.id = oldDBBaseProduct_Store_Table.id
                                JOIN $this->newDb.object_1 AS objectTableBaseProduct ON newDBBaseProduct_Store_Table.id = objectTableBaseProduct.id
                                JOIN $this->newDb.object_1 AS objectTableSkeletonProduct ON objectTableSkeletonProduct.parentId = objectTableBaseProduct.id
                                JOIN $this->newDb.$storeTableName AS newDBSkeletonProduct_Store_Table ON objectTableSkeletonProduct.id = newDBSkeletonProduct_Store_Table.id
                                JOIN $this->olderDb.$storeTableName AS oldDBSkeletonProduct_Store_Table ON newDBSkeletonProduct_Store_Table.id = oldDBSkeletonProduct_Store_Table.id
                                JOIN $this->newDb.object_1 AS objectTableFertProduct ON objectTableFertProduct.parentId = newDBSkeletonProduct_Store_Table.id
                                JOIN $this->newDb.$storeTableName AS newDBFertProduct_Store_Table ON newDBFertProduct_Store_Table.id = objectTableFertProduct.id
                                JOIN $this->olderDb.$storeTableName AS oldDBFertProduct_Store_Table ON oldDBFertProduct_Store_Table.id = newDBFertProduct_Store_Table.id

                                JOIN $this->newDb.$queryTableName AS newDBBaseProduct_Query_Table ON newDBBaseProduct_Store_Table.id = newDBBaseProduct_Query_Table.id
                                JOIN $this->newDb.$queryTableName AS newDBSkeletonProduct_Query_Table ON newDBSkeletonProduct_Store_Table.id = newDBSkeletonProduct_Query_Table.id
                                JOIN $this->newDb.$queryTableName AS newDBFertProduct_Query_Table ON newDBFertProduct_Store_Table.id = newDBFertProduct_Query_Table.id

                                JOIN $this->olderDb.$queryTableName AS oldDBBaseProduct_Query_Table ON oldDBBaseProduct_Store_Table.id = oldDBBaseProduct_Query_Table.id
                                JOIN $this->olderDb.$queryTableName AS oldDBSkeletonProduct_Query_Table ON oldDBSkeletonProduct_Store_Table.id = oldDBSkeletonProduct_Query_Table.id
                                JOIN $this->olderDb.$queryTableName AS oldDBFertProduct_Query_Table ON oldDBFertProduct_Store_Table.id = oldDBFertProduct_Query_Table.id

                            WHERE
                            (newDBSkeletonProduct_Store_Table.$columnName != oldDBSkeletonProduct_Store_Table.$columnName)
                                OR ((newDBSkeletonProduct_Store_Table.$columnName IS NULL
                                AND oldDBSkeletonProduct_Store_Table.$columnName IS NOT NULL)
                                OR (newDBSkeletonProduct_Store_Table.$columnName IS NOT NULL
                                AND oldDBSkeletonProduct_Store_Table.$columnName IS NULL))
                        GROUP BY newDBSkeletonProduct_Store_Table.id) AS dataTable

                        ";

                        $result = $this->dbCon->fetchAllAssociative($query);
                        p_r("Result Count = " . count($result));
                        $c = 0;
                        foreach ($result as $item) {
                            $base_Id = $item['Base_Id'];
                            $new_Base_Store_Data = $item['New_Base_Store_Data'];
                            $new_Skeleton_Store_Data = $item['New_Skeleton_Store_Data'];
                            $new_Fert_Store_Data = $item['New_Fert_Store_Data'];
                            $old_Base_Store_Data = $item['Old_Base_Store_Data'];
                            $old_Skeleton_Store_Data = $item['Old_Skeleton_Store_Data'];
                            $old_Fert_Store_Data = $item['Old_Fert_Store_Data'];

                            $new_Base_Query_Data = $item['New_Base_Query_Data'];
                            $new_Skeleton_Query_Data = $item['New_Skeleton_Query_Data'];
                            $new_Fert_Query_Data = $item['New_Fert_Query_Data'];
                            $old_Base_Query_Data = $item['Old_Base_Query_Data'];
                            $old_Skeleton_Query_Data = $item['Old_Skeleton_Query_Data'];
                            $old_Fert_Query_Data = $item['Old_Fert_Query_Data'];

                            $validity_Store_Table = $item['validity_Store_Table'];
                            $validity_Store_Table_1 = $item['validity_Store_Table_1'];
                            $validity_Store_Table_2 = $item['validity_Store_Table_2'];

                            $validity_Query_Table = $item['validity_Query_Table'];
                            $validity_Query_Table_1 = $item['validity_Query_Table_1'];
                            $validity_Query_Table_2 = $item['validity_Query_Table_2'];
                
                            $this->csvLog($csvLogFileHandle, [++$c, $brickName, 
                                                        $columnName, $base_Id, 
                                                        $new_Base_Store_Data, $new_Skeleton_Store_Data, 
                                                        $new_Fert_Store_Data,$old_Base_Store_Data,
                                                        $old_Skeleton_Store_Data,$old_Fert_Store_Data,
                                                        $validity_Store_Table,$validity_Store_Table_1,$validity_Store_Table_2,
                                                        '-----',
                                                        $new_Base_Query_Data, $new_Skeleton_Query_Data, 
                                                        $new_Fert_Query_Data,$old_Base_Query_Data,
                                                        $old_Skeleton_Query_Data,$old_Fert_Query_Data,
                                                        $validity_Query_Table,$validity_Query_Table_1,$validity_Query_Table_2
                                                        ]);
                        }
                }
        }
        fclose($csvLogFileHandle);
    }

    private function generator_AfterC3Fix_ComparisonFileForFertProductBaseBricks(string $logFileName)
    {
        $csvLogFilePath = PIMCORE_LOG_DIRECTORY . "/" . $logFileName . ".csv";
        $csvLogFileHandle = fopen($csvLogFilePath, "w+");
        $this->csvLog($csvLogFileHandle,
                    ["#","Brick Name","Column Name",
                    "Base_Id","New_Base_Store_Data","New_Skeleton_Store_Data",
                    "New_Fert_Store_Data","Old_Base_Store_Data","Old_Skeleton_Store_Data",
                    "Old_Fert_Store_Data","validity_Store_Table","validity_Store_Table_1",
                    "validity_Store_Table_2",
                    "--SEPARATOR--",
                    "new_Base_Query_Data","new_Skeleton_Query_Data",
                    "new_Fert_Query_Data","old_Base_Query_Data",
                    "old_Skeleton_Query_Data","old_Fert_Query_Data",
                    "validity_Query_Table","validity_Query_Table_1","validity_Query_Table_2"]);

        foreach(self::BRICKS_TO_COMPARE["base"] as $brickName){
                $storeTableName = "object_brick_store_" . $brickName . "_1";
                $queryTableName = "object_brick_query_" . $brickName . "_1";

                $tableColumns = $this->getAllColumnsOfTable($this->newDb,$storeTableName);

                foreach($tableColumns as $columnName){
                    p_r($storeTableName . "-" . $columnName);
                    $query = "        
                    SELECT 
                        *,
                        if(dataTable.Old_Fert_Store_Data = New_Base_Store_Data, true, false) as validity_Store_Table,
                        IF(dataTable.New_Base_Query_Data = concat(',',dataTable.New_Base_Store_Data,','), true, false) AS validity_Query_Table,
                        IF(dataTable.New_Skeleton_Query_Data = concat(',',dataTable.New_Base_Store_Data,','), true, false) AS validity_Query_Table_1,
                        IF(dataTable.New_Fert_Query_Data = concat(',',dataTable.New_Base_Store_Data,','), true, false) AS validity_Query_Table_2
                    FROM
                        (SELECT 
                            newDBBaseProduct_Store_Table.id Base_Id,
                                GROUP_CONCAT(DISTINCT newDBBaseProduct_Store_Table.$columnName) AS New_Base_Store_Data,
                                GROUP_CONCAT(DISTINCT newDBSkeletonProduct_Store_Table.$columnName
                                    SEPARATOR ' , ') AS New_Skeleton_Store_Data,
                                GROUP_CONCAT(DISTINCT newDBFertProduct_Store_Table.$columnName
                                    SEPARATOR ' , ') AS New_Fert_Store_Data,
                                GROUP_CONCAT(DISTINCT oldDBBaseProduct_Store_Table.$columnName) AS Old_Base_Store_Data,
                                GROUP_CONCAT(DISTINCT oldDBSkeletonProduct_Store_Table.$columnName
                                    SEPARATOR ' , ') AS Old_Skeleton_Store_Data,
                                GROUP_CONCAT(DISTINCT oldDBFertProduct_Store_Table.$columnName
                                    SEPARATOR ' , ') AS Old_Fert_Store_Data,
                                '------',
                                GROUP_CONCAT(DISTINCT newDBBaseProduct_Query_Table.$columnName) AS New_Base_Query_Data,
                                GROUP_CONCAT(DISTINCT newDBSkeletonProduct_Query_Table.$columnName
                                    SEPARATOR ' , ') AS New_Skeleton_Query_Data,
                                GROUP_CONCAT(DISTINCT newDBFertProduct_Query_Table.$columnName
                                    SEPARATOR ' , ') AS New_Fert_Query_Data,
                                GROUP_CONCAT(DISTINCT oldDBBaseProduct_Query_Table.$columnName) AS Old_Base_Query_Data,
                                GROUP_CONCAT(DISTINCT oldDBSkeletonProduct_Query_Table.$columnName
                                    SEPARATOR ' , ') AS Old_Skeleton_Query_Data,
                                GROUP_CONCAT(DISTINCT oldDBFertProduct_Query_Table.$columnName
                                    SEPARATOR ' , ') AS Old_Fert_Query_Data
                        FROM
                            $this->newDb.$storeTableName AS newDBBaseProduct_Store_Table
                                JOIN $this->olderDb.$storeTableName AS oldDBBaseProduct_Store_Table ON newDBBaseProduct_Store_Table.id = oldDBBaseProduct_Store_Table.id
                                JOIN $this->newDb.object_1 AS objectTableBaseProduct ON newDBBaseProduct_Store_Table.id = objectTableBaseProduct.id
                                JOIN $this->newDb.object_1 AS objectTableSkeletonProduct ON objectTableSkeletonProduct.parentId = objectTableBaseProduct.id
                                JOIN $this->newDb.$storeTableName AS newDBSkeletonProduct_Store_Table ON objectTableSkeletonProduct.id = newDBSkeletonProduct_Store_Table.id
                                JOIN $this->olderDb.$storeTableName AS oldDBSkeletonProduct_Store_Table ON newDBSkeletonProduct_Store_Table.id = oldDBSkeletonProduct_Store_Table.id
                                JOIN $this->newDb.object_1 AS objectTableFertProduct ON objectTableFertProduct.parentId = newDBSkeletonProduct_Store_Table.id
                                JOIN $this->newDb.$storeTableName AS newDBFertProduct_Store_Table ON newDBFertProduct_Store_Table.id = objectTableFertProduct.id
                                JOIN $this->olderDb.$storeTableName AS oldDBFertProduct_Store_Table ON oldDBFertProduct_Store_Table.id = newDBFertProduct_Store_Table.id

                                JOIN $this->newDb.$queryTableName AS newDBBaseProduct_Query_Table ON newDBBaseProduct_Store_Table.id = newDBBaseProduct_Query_Table.id
                                JOIN $this->newDb.$queryTableName AS newDBSkeletonProduct_Query_Table ON newDBSkeletonProduct_Store_Table.id = newDBSkeletonProduct_Query_Table.id
                                JOIN $this->newDb.$queryTableName AS newDBFertProduct_Query_Table ON newDBFertProduct_Store_Table.id = newDBFertProduct_Query_Table.id

                                JOIN $this->olderDb.$queryTableName AS oldDBBaseProduct_Query_Table ON oldDBBaseProduct_Store_Table.id = oldDBBaseProduct_Query_Table.id
                                JOIN $this->olderDb.$queryTableName AS oldDBSkeletonProduct_Query_Table ON oldDBSkeletonProduct_Store_Table.id = oldDBSkeletonProduct_Query_Table.id
                                JOIN $this->olderDb.$queryTableName AS oldDBFertProduct_Query_Table ON oldDBFertProduct_Store_Table.id = oldDBFertProduct_Query_Table.id

                            WHERE
                            (newDBFertProduct_Store_Table.$columnName != oldDBFertProduct_Store_Table.$columnName)
                                OR ((newDBFertProduct_Store_Table.$columnName IS NULL
                                AND oldDBFertProduct_Store_Table.$columnName IS NOT NULL)
                                OR (newDBFertProduct_Store_Table.$columnName IS NOT NULL
                                AND oldDBFertProduct_Store_Table.$columnName IS NULL))
                            GROUP BY newDBFertProduct_Store_Table.id) AS dataTable

                        ";

                        $result = $this->dbCon->fetchAllAssociative($query);
                        p_r("Result Count = " . count($result));
                        $c = 0;
                        foreach ($result as $item) {
                            $base_Id = $item['Base_Id'];
                            $new_Base_Store_Data = $item['New_Base_Store_Data'];
                            $new_Skeleton_Store_Data = $item['New_Skeleton_Store_Data'];
                            $new_Fert_Store_Data = $item['New_Fert_Store_Data'];
                            $old_Base_Store_Data = $item['Old_Base_Store_Data'];
                            $old_Skeleton_Store_Data = $item['Old_Skeleton_Store_Data'];
                            $old_Fert_Store_Data = $item['Old_Fert_Store_Data'];

                            $new_Base_Query_Data = $item['New_Base_Query_Data'];
                            $new_Skeleton_Query_Data = $item['New_Skeleton_Query_Data'];
                            $new_Fert_Query_Data = $item['New_Fert_Query_Data'];
                            $old_Base_Query_Data = $item['Old_Base_Query_Data'];
                            $old_Skeleton_Query_Data = $item['Old_Skeleton_Query_Data'];
                            $old_Fert_Query_Data = $item['Old_Fert_Query_Data'];

                            $validity_Store_Table = $item['validity_Store_Table'];
                            $validity_Store_Table_1 = $item['validity_Store_Table_1'];
                            $validity_Store_Table_2 = $item['validity_Store_Table_2'];

                            $validity_Query_Table = $item['validity_Query_Table'];
                            $validity_Query_Table_1 = $item['validity_Query_Table_1'];
                            $validity_Query_Table_2 = $item['validity_Query_Table_2'];
                
                            $this->csvLog($csvLogFileHandle, [++$c, $brickName, 
                                                        $columnName, $base_Id, 
                                                        $new_Base_Store_Data, $new_Skeleton_Store_Data, 
                                                        $new_Fert_Store_Data,$old_Base_Store_Data,
                                                        $old_Skeleton_Store_Data,$old_Fert_Store_Data,
                                                        $validity_Store_Table,$validity_Store_Table_1,$validity_Store_Table_2,
                                                        '-----',
                                                        $new_Base_Query_Data, $new_Skeleton_Query_Data, 
                                                        $new_Fert_Query_Data,$old_Base_Query_Data,
                                                        $old_Skeleton_Query_Data,$old_Fert_Query_Data,
                                                        $validity_Query_Table,$validity_Query_Table_1,$validity_Query_Table_2
                                                        ]);
                        }
                }
        }
        fclose($csvLogFileHandle);
    }


    private function generator_AfterC3Fix_ComparisonFileForSkeletonProductSkeletonBricks(string $logFileName)
    {
        $csvLogFilePath = PIMCORE_LOG_DIRECTORY . "/" . $logFileName . ".csv";
        $csvLogFileHandle = fopen($csvLogFilePath, "w+");
        $this->csvLog($csvLogFileHandle,
                    ["#","Brick Name","Column Name",
                    "Base_Id","New_Skeleton_Store_Data",
                    "New_Fert_Store_Data","Old_Skeleton_Store_Data",
                    "Old_Fert_Store_Data","validity_Store_Table","validity_Store_Table_1",
                    "validity_Store_Table_2",
                    "--SEPARATOR--",
                    "new_Skeleton_Query_Data",
                    "new_Fert_Query_Data",
                    "old_Skeleton_Query_Data","old_Fert_Query_Data",
                    "validity_Query_Table","validity_Query_Table_1","validity_Query_Table_2"]);

        foreach(self::BRICKS_TO_COMPARE["skeleton"] as $brickName){
                $storeTableName = "object_brick_store_" . $brickName . "_1";
                $queryTableName = "object_brick_query_" . $brickName . "_1";

                $tableColumns = $this->getAllColumnsOfTable($this->newDb,$storeTableName);

                foreach($tableColumns as $columnName){
                    p_r($storeTableName . "-" . $columnName);
                    $query = "        
                    SELECT 
                        *,
                        if(dataTable.New_Skeleton_Store_Data = dataTable.Old_Fert_Store_Data, true , false) AS validity_Store_Table,
                        if(dataTable.New_Skeleton_Query_Data = dataTable.New_Skeleton_Store_Data, true , if(dataTable.New_Skeleton_Query_Data = concat(',',dataTable.New_Skeleton_Store_Data,','), true , false ) ) AS validity_Query_Table,
                        if(dataTable.New_Fert_Query_Data = dataTable.New_Skeleton_Store_Data, true , if(dataTable.New_Fert_Query_Data = concat(',',dataTable.New_Skeleton_Store_Data,','), true , false)   ) AS validity_Query_Table_1
                    FROM
                        (SELECT 
                            newDBSkeletonProduct_Store_Table.id Skeleton_Id,
                                GROUP_CONCAT(DISTINCT newDBSkeletonProduct_Store_Table.$columnName SEPARATOR ' , ') AS New_Skeleton_Store_Data,
                                GROUP_CONCAT(DISTINCT newDBFertProduct_Store_Table.$columnName SEPARATOR ' , ') AS New_Fert_Store_Data,
                                GROUP_CONCAT(DISTINCT oldDBSkeletonProduct_Store_Table.$columnName SEPARATOR ' , ') AS Old_Skeleton_Store_Data,
                                GROUP_CONCAT(DISTINCT oldDBFertProduct_Store_Table.$columnName SEPARATOR ' , ') AS Old_Fert_Store_Data,
                                '------',
                                GROUP_CONCAT(DISTINCT newDBSkeletonProduct_Query_Table.$columnName SEPARATOR ' , ') AS New_Skeleton_Query_Data,
                                GROUP_CONCAT(DISTINCT newDBFertProduct_Query_Table.$columnName SEPARATOR ' , ') AS New_Fert_Query_Data,
                                GROUP_CONCAT(DISTINCT oldDBSkeletonProduct_Query_Table.$columnName SEPARATOR ' , ') AS Old_Skeleton_Query_Data,
                                GROUP_CONCAT(DISTINCT oldDBFertProduct_Query_Table.$columnName SEPARATOR ' , ') AS Old_Fert_Query_Data
                        FROM
                             $this->newDb.$storeTableName AS newDBSkeletonProduct_Store_Table
                                JOIN $this->olderDb.$storeTableName AS oldDBSkeletonProduct_Store_Table ON newDBSkeletonProduct_Store_Table.id = oldDBSkeletonProduct_Store_Table.id
                                JOIN $this->newDb.object_1 AS objectTableFertProduct ON objectTableFertProduct.parentId = newDBSkeletonProduct_Store_Table.id
                                JOIN $this->newDb.$storeTableName AS newDBFertProduct_Store_Table ON newDBFertProduct_Store_Table.id = objectTableFertProduct.id
                                JOIN $this->olderDb.$storeTableName AS oldDBFertProduct_Store_Table ON oldDBFertProduct_Store_Table.id = newDBFertProduct_Store_Table.id

                                JOIN $this->newDb.$queryTableName AS newDBSkeletonProduct_Query_Table ON newDBSkeletonProduct_Store_Table.id = newDBSkeletonProduct_Query_Table.id
                                JOIN $this->newDb.$queryTableName AS newDBFertProduct_Query_Table ON newDBFertProduct_Store_Table.id = newDBFertProduct_Query_Table.id

                                JOIN $this->olderDb.$queryTableName AS oldDBSkeletonProduct_Query_Table ON oldDBSkeletonProduct_Store_Table.id = oldDBSkeletonProduct_Query_Table.id
                                JOIN $this->olderDb.$queryTableName AS oldDBFertProduct_Query_Table ON oldDBFertProduct_Store_Table.id = oldDBFertProduct_Query_Table.id
                            WHERE
                            (newDBSkeletonProduct_Store_Table.$columnName != oldDBSkeletonProduct_Store_Table.$columnName)
                                OR ((newDBSkeletonProduct_Store_Table.$columnName IS NULL  AND oldDBSkeletonProduct_Store_Table.$columnName IS NOT NULL)
                                OR (newDBSkeletonProduct_Store_Table.$columnName IS NOT NULL AND oldDBSkeletonProduct_Store_Table.$columnName IS NULL))
                            GROUP BY newDBSkeletonProduct_Store_Table.id) AS dataTable
                        ";

                        $result = $this->dbCon->fetchAllAssociative($query);
                        p_r("Result Count = " . count($result));
                        $c = 0;
                        foreach ($result as $item) {
                            $Skeleton_Id = $item['Skeleton_Id'];
                            $new_Skeleton_Store_Data = $item['New_Skeleton_Store_Data'];
                            $new_Fert_Store_Data = $item['New_Fert_Store_Data'];
                            $old_Skeleton_Store_Data = $item['Old_Skeleton_Store_Data'];
                            $old_Fert_Store_Data = $item['Old_Fert_Store_Data'];

                            $new_Skeleton_Query_Data = $item['New_Skeleton_Query_Data'];
                            $new_Fert_Query_Data = $item['New_Fert_Query_Data'];
                            $old_Skeleton_Query_Data = $item['Old_Skeleton_Query_Data'];
                            $old_Fert_Query_Data = $item['Old_Fert_Query_Data'];

                            $validity_Store_Table = $item['validity_Store_Table'];
                            $validity_Store_Table_1 = $item['validity_Store_Table_1'];
                            $validity_Store_Table_2 = $item['validity_Store_Table_2'];

                            $validity_Query_Table = $item['validity_Query_Table'];
                            $validity_Query_Table_1 = $item['validity_Query_Table_1'];
                            $validity_Query_Table_2 = $item['validity_Query_Table_2'];
                
                            $this->csvLog($csvLogFileHandle, [++$c, $brickName, 
                                                        $columnName, $Skeleton_Id, 
                                                         $new_Skeleton_Store_Data, 
                                                        $new_Fert_Store_Data,
                                                        $old_Skeleton_Store_Data,$old_Fert_Store_Data,
                                                        $validity_Store_Table,$validity_Store_Table_1,$validity_Store_Table_2,
                                                        '-----',
                                                        $new_Skeleton_Query_Data, 
                                                        $new_Fert_Query_Data,
                                                        $old_Skeleton_Query_Data,$old_Fert_Query_Data,
                                                        $validity_Query_Table,$validity_Query_Table_1,$validity_Query_Table_2
                                                        ]);
                        }
                }
        }
        fclose($csvLogFileHandle);
    }


    private function generator_AfterC3Fix_ComparisonFileForFertProductSkeletonBricks(string $logFileName)
    {
        $csvLogFilePath = PIMCORE_LOG_DIRECTORY . "/" . $logFileName . ".csv";
        $csvLogFileHandle = fopen($csvLogFilePath, "w+");
        $this->csvLog($csvLogFileHandle,
                    ["#","Brick Name","Column Name",
                    "Base_Id","New_Skeleton_Store_Data",
                    "New_Fert_Store_Data","Old_Skeleton_Store_Data",
                    "Old_Fert_Store_Data","validity_Store_Table","validity_Store_Table_1",
                    "validity_Store_Table_2",
                    "--SEPARATOR--",
                    "new_Skeleton_Query_Data",
                    "new_Fert_Query_Data",
                    "old_Skeleton_Query_Data","old_Fert_Query_Data",
                    "validity_Query_Table","validity_Query_Table_1","validity_Query_Table_2"]);

        foreach(self::BRICKS_TO_COMPARE["skeleton"] as $brickName){
                $storeTableName = "object_brick_store_" . $brickName . "_1";
                $queryTableName = "object_brick_query_" . $brickName . "_1";

                $tableColumns = $this->getAllColumnsOfTable($this->newDb,$storeTableName);

                foreach($tableColumns as $columnName){
                    p_r($storeTableName . "-" . $columnName);
                    $query = "        
                    SELECT 
                        *,
                        if(dataTable.Old_Fert_Store_Data = dataTable.New_Skeleton_Store_Data, true , false) AS validity_Store_Table,
                        if(dataTable.New_Skeleton_Query_Data = dataTable.New_Skeleton_Store_Data, true , if(dataTable.New_Skeleton_Query_Data = concat(',',dataTable.New_Skeleton_Store_Data,','), true , false ) ) AS validity_Query_Table,
                        if(dataTable.New_Fert_Query_Data = dataTable.New_Skeleton_Store_Data, true , if(dataTable.New_Fert_Query_Data = concat(',',dataTable.New_Skeleton_Store_Data,','), true , false)   ) AS validity_Query_Table_1
                    FROM
                        (SELECT 
                            newDBSkeletonProduct_Store_Table.id Skeleton_Id,
                                GROUP_CONCAT(DISTINCT newDBSkeletonProduct_Store_Table.$columnName SEPARATOR ' , ') AS New_Skeleton_Store_Data,
                                GROUP_CONCAT(DISTINCT newDBFertProduct_Store_Table.$columnName SEPARATOR ' , ') AS New_Fert_Store_Data,
                                GROUP_CONCAT(DISTINCT oldDBSkeletonProduct_Store_Table.$columnName SEPARATOR ' , ') AS Old_Skeleton_Store_Data,
                                GROUP_CONCAT(DISTINCT oldDBFertProduct_Store_Table.$columnName SEPARATOR ' , ') AS Old_Fert_Store_Data,
                                '------',
                                GROUP_CONCAT(DISTINCT newDBSkeletonProduct_Query_Table.$columnName SEPARATOR ' , ') AS New_Skeleton_Query_Data,
                                GROUP_CONCAT(DISTINCT newDBFertProduct_Query_Table.$columnName SEPARATOR ' , ') AS New_Fert_Query_Data,
                                GROUP_CONCAT(DISTINCT oldDBSkeletonProduct_Query_Table.$columnName SEPARATOR ' , ') AS Old_Skeleton_Query_Data,
                                GROUP_CONCAT(DISTINCT oldDBFertProduct_Query_Table.$columnName SEPARATOR ' , ') AS Old_Fert_Query_Data
                        FROM
                             $this->newDb.$storeTableName AS newDBSkeletonProduct_Store_Table
                                JOIN $this->olderDb.$storeTableName AS oldDBSkeletonProduct_Store_Table ON newDBSkeletonProduct_Store_Table.id = oldDBSkeletonProduct_Store_Table.id
                                JOIN $this->newDb.object_1 AS objectTableFertProduct ON objectTableFertProduct.parentId = newDBSkeletonProduct_Store_Table.id
                                JOIN $this->newDb.$storeTableName AS newDBFertProduct_Store_Table ON newDBFertProduct_Store_Table.id = objectTableFertProduct.id
                                JOIN $this->olderDb.$storeTableName AS oldDBFertProduct_Store_Table ON oldDBFertProduct_Store_Table.id = newDBFertProduct_Store_Table.id

                                JOIN $this->newDb.$queryTableName AS newDBSkeletonProduct_Query_Table ON newDBSkeletonProduct_Store_Table.id = newDBSkeletonProduct_Query_Table.id
                                JOIN $this->newDb.$queryTableName AS newDBFertProduct_Query_Table ON newDBFertProduct_Store_Table.id = newDBFertProduct_Query_Table.id

                                JOIN $this->olderDb.$queryTableName AS oldDBSkeletonProduct_Query_Table ON oldDBSkeletonProduct_Store_Table.id = oldDBSkeletonProduct_Query_Table.id
                                JOIN $this->olderDb.$queryTableName AS oldDBFertProduct_Query_Table ON oldDBFertProduct_Store_Table.id = oldDBFertProduct_Query_Table.id
                            WHERE
                            (newDBFertProduct_Store_Table.$columnName != oldDBFertProduct_Store_Table.$columnName)
                                OR ((newDBFertProduct_Store_Table.$columnName IS NULL  AND oldDBFertProduct_Store_Table.$columnName IS NOT NULL)
                                OR (newDBFertProduct_Store_Table.$columnName IS NOT NULL AND oldDBFertProduct_Store_Table.$columnName IS NULL))
                            GROUP BY newDBFertProduct_Store_Table.id) AS dataTable
                        ";

                        $result = $this->dbCon->fetchAllAssociative($query);
                        p_r("Result Count = " . count($result));
                        $c = 0;
                        foreach ($result as $item) {
                            $Skeleton_Id = $item['Skeleton_Id'];
                            $new_Skeleton_Store_Data = $item['New_Skeleton_Store_Data'];
                            $new_Fert_Store_Data = $item['New_Fert_Store_Data'];
                            $old_Skeleton_Store_Data = $item['Old_Skeleton_Store_Data'];
                            $old_Fert_Store_Data = $item['Old_Fert_Store_Data'];

                            $new_Skeleton_Query_Data = $item['New_Skeleton_Query_Data'];
                            $new_Fert_Query_Data = $item['New_Fert_Query_Data'];
                            $old_Skeleton_Query_Data = $item['Old_Skeleton_Query_Data'];
                            $old_Fert_Query_Data = $item['Old_Fert_Query_Data'];

                            $validity_Store_Table = $item['validity_Store_Table'];
                            $validity_Store_Table_1 = $item['validity_Store_Table_1'];
                            $validity_Store_Table_2 = $item['validity_Store_Table_2'];

                            $validity_Query_Table = $item['validity_Query_Table'];
                            $validity_Query_Table_1 = $item['validity_Query_Table_1'];
                            $validity_Query_Table_2 = $item['validity_Query_Table_2'];
                
                            $this->csvLog($csvLogFileHandle, [++$c, $brickName, 
                                                        $columnName, $Skeleton_Id, 
                                                         $new_Skeleton_Store_Data, 
                                                        $new_Fert_Store_Data,
                                                        $old_Skeleton_Store_Data,$old_Fert_Store_Data,
                                                        $validity_Store_Table,$validity_Store_Table_1,$validity_Store_Table_2,
                                                        '-----',
                                                        $new_Skeleton_Query_Data, 
                                                        $new_Fert_Query_Data,
                                                        $old_Skeleton_Query_Data,$old_Fert_Query_Data,
                                                        $validity_Query_Table,$validity_Query_Table_1,$validity_Query_Table_2
                                                        ]);
                        }
                }
        }
        fclose($csvLogFileHandle);
    }

    private function generator_AfterC3Fix_ComparisonFileForFertProductFertBricks(string $logFileName)
    {
        $csvLogFilePath = PIMCORE_LOG_DIRECTORY . "/" . $logFileName . ".csv";
        $csvLogFileHandle = fopen($csvLogFilePath, "w+");
        $this->csvLog($csvLogFileHandle,
                    ["#","Brick Name","Column Name",
                    "Base_Id",
                    "New_Fert_Store_Data",
                    "Old_Fert_Store_Data","validity_Store_Table","validity_Store_Table_1",
                    "validity_Store_Table_2",
                    "--SEPARATOR--",
                    "new_Fert_Query_Data",
                    "old_Fert_Query_Data",
                    "validity_Query_Table","validity_Query_Table_1","validity_Query_Table_2"]);

        foreach(self::BRICKS_TO_COMPARE["fert"] as $brickName){
                $storeTableName = "object_brick_store_" . $brickName . "_1";
                $queryTableName = "object_brick_query_" . $brickName . "_1";

                $tableColumns = $this->getAllColumnsOfTable($this->newDb,$storeTableName);

                foreach($tableColumns as $columnName){
                    p_r($storeTableName . "-" . $columnName);
                    $query = "        
                    SELECT 
                        *,
                        if(dataTable.New_Fert_Store_Data = dataTable.Old_Fert_Store_Data, true , false) AS validity_Store_Table,
                        if(dataTable.New_Fert_Query_Data = dataTable.Old_Fert_Query_Data, true , false) AS validity_Query_Table
                    FROM
                        (SELECT 
                                newDBFertProduct_Store_Table.id fert_Id,
                                GROUP_CONCAT(DISTINCT newDBFertProduct_Store_Table.$columnName SEPARATOR ' , ') AS New_Fert_Store_Data,
                                GROUP_CONCAT(DISTINCT oldDBFertProduct_Store_Table.$columnName SEPARATOR ' , ') AS Old_Fert_Store_Data,
                                '------',
                                GROUP_CONCAT(DISTINCT newDBFertProduct_Query_Table.$columnName SEPARATOR ' , ') AS New_Fert_Query_Data,
                                GROUP_CONCAT(DISTINCT oldDBFertProduct_Query_Table.$columnName SEPARATOR ' , ') AS Old_Fert_Query_Data
                        FROM
                            $this->newDb.$storeTableName AS newDBFertProduct_Store_Table
                                JOIN $this->olderDb.$storeTableName AS oldDBFertProduct_Store_Table ON oldDBFertProduct_Store_Table.id = newDBFertProduct_Store_Table.id

                                JOIN $this->newDb.$queryTableName AS newDBFertProduct_Query_Table ON newDBFertProduct_Store_Table.id = newDBFertProduct_Query_Table.id
                                JOIN $this->olderDb.$queryTableName AS oldDBFertProduct_Query_Table ON oldDBFertProduct_Store_Table.id = oldDBFertProduct_Query_Table.id
                            WHERE
                            (newDBFertProduct_Store_Table.$columnName != oldDBFertProduct_Store_Table.$columnName)
                                OR ((newDBFertProduct_Store_Table.$columnName IS NULL  AND oldDBFertProduct_Store_Table.$columnName IS NOT NULL)
                                OR (newDBFertProduct_Store_Table.$columnName IS NOT NULL AND oldDBFertProduct_Store_Table.$columnName IS NULL))
                            GROUP BY newDBFertProduct_Store_Table.id) AS dataTable
                        ";

                        $result = $this->dbCon->fetchAllAssociative($query);
                        p_r("Result Count = " . count($result));
                        $c = 0;
                        foreach ($result as $item) {
                            $fert_Id = $item['fert_Id'];
                            $new_Fert_Store_Data = $item['New_Fert_Store_Data'];
                            $old_Fert_Store_Data = $item['Old_Fert_Store_Data'];

                            $new_Fert_Query_Data = $item['New_Fert_Query_Data'];
                            $old_Fert_Query_Data = $item['Old_Fert_Query_Data'];

                            $validity_Store_Table = $item['validity_Store_Table'];
                            $validity_Store_Table_1 = $item['validity_Store_Table_1'];
                            $validity_Store_Table_2 = $item['validity_Store_Table_2'];

                            $validity_Query_Table = $item['validity_Query_Table'];
                            $validity_Query_Table_1 = $item['validity_Query_Table_1'];
                            $validity_Query_Table_2 = $item['validity_Query_Table_2'];
                
                            $this->csvLog($csvLogFileHandle, [++$c, $brickName, 
                                                        $columnName, $fert_Id, 
                                                        $new_Fert_Store_Data,
                                                        $old_Fert_Store_Data,
                                                        $validity_Store_Table,$validity_Store_Table_1,$validity_Store_Table_2,
                                                        '-----',
                                                        $new_Fert_Query_Data,
                                                        $old_Fert_Query_Data,
                                                        $validity_Query_Table,$validity_Query_Table_1,$validity_Query_Table_2
                                                        ]);
                        }
                }
        }
        fclose($csvLogFileHandle);
    }

    private function getAllColumnsOfTable(string $databaseName,string $tableName)
    {
        $allColumnQuery = "
                SELECT
                    COLUMN_NAME
                FROM
                    information_schema.columns
                WHERE
                    table_schema = '" . $databaseName . "'
                        AND table_name = '" . $tableName . "'
        ";

        return $this->dbCon->fetchOne($allColumnQuery);
    }

    private function csvLog($logHandler, array $dataRow)
    {
        $csvDelimiter = ",";
        fputcsv($logHandler, $dataRow, $csvDelimiter);
    }
}