<?php


namespace AppBundle\Command;


use AppBundle\Services\ConfigProviderService;
use Pimcore\Bundle\EcommerceFrameworkBundle\CheckoutManager\V7\HandlePendingPayments\AlwaysRecreateOrderStrategy;
use Pimcore\Model\DataObject;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class IdentifyMissedUnitConversionAttributes extends Command
{
    const DATABASE_NAME = "contitech_18_mar";

    private $configProvider;

    private $db;

    private $groups = [];

    const SKELETON_BRICK_NAMES = ['HoseSkeleton','PTGSkeleton'];

    const BASE_BRICK_NAMES = ['HoseBase','PTGBase'];

    private $brickAttributesWhichHaveDataInSpecificLevel = [];

    const LOG_FILE_NAME = "IdentifyMissedUnitConversionAttributes_log";

    public function __construct(ConfigProviderService $configProviderService)
    {
        $this->db = \Pimcore\Db::get();
        $this->configProvider = $configProviderService;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('contitech:identify_missed_unit_conversion_attributes');
    }


    public function execute(InputInterface $input, OutputInterface $output)
    {
        $csvLogFilePath = PIMCORE_LOG_DIRECTORY . "/" . self::LOG_FILE_NAME . ".csv";
        $csvLogFileHandle = fopen($csvLogFilePath, "w");
        $this->csvLog($csvLogFileHandle, array(
            "#",
            "Brick Name",
            "Attribute Name",
            "(C1) Count-Child Product having it's own data",
            "(C2) Count-Child product where parent-child data is not equal",
            "(C3) Count-Data present in child but not in parent",
            "(C4) Count-Child has own data and is equal to parent",
            "Child Product Level",
            "Example of C1",
            "Example of C2",
            "Example of C3",
            "Example of C4"
        ));

        $msg = " [SKELETON brick attributes] which have [data in FERT level] ";
        $this->identifyBrickAttributesWhichHaveDataInSpecificLevel(self::SKELETON_BRICK_NAMES,'fert',$msg, $csvLogFileHandle);
        echo PHP_EOL.PHP_EOL;

        $msg = " [BASE brick attributes] which have [data in SKELETON level] ";
        $this->identifyBrickAttributesWhichHaveDataInSpecificLevel(self::BASE_BRICK_NAMES,'skeleton',$msg, $csvLogFileHandle);
        echo PHP_EOL.PHP_EOL;

        $msg = " [BASE brick attributes] which have [data in FERT level] ";
        $this->identifyBrickAttributesWhichHaveDataInSpecificLevel(self::BASE_BRICK_NAMES,'fert',$msg, $csvLogFileHandle);
        echo PHP_EOL.PHP_EOL;

        fclose($csvLogFileHandle);

        p_r($this->brickAttributesWhichHaveDataInSpecificLevel);

//
//        $limit = 10;
//        $productList = new DataObject\Product\Listing();
//        $total = $productList->getTotalCount();
//
//        $offset = 0;
//
////        while ($offset <= ($total - 1)) {
//            $this->initializeChildProcess($offset,$limit,"testfile");
////            $offset = ($offset + $limit);
////        }
    }

    private function identifyBrickAttributesWhichHaveDataInSpecificLevel($brickNames,$levelForQuery,$titleMsg, $csvLogFileHandle)
    {
        echo PHP_EOL;
        echo "--------------------------------------------------------------------" . PHP_EOL;
        echo $titleMsg . PHP_EOL;
        echo "--------------------------------------------------------------------";
        echo PHP_EOL.PHP_EOL;

        $c = 0;

        foreach($brickNames as $brickName){
            $brickTableName = "object_brick_store_" . $brickName . "_1";
            echo "Brick: [$brickName]---------------------------------" . PHP_EOL;

            $allColumnQuery = "
                            SELECT
                                COLUMN_NAME
                            FROM
                                information_schema.columns
                            WHERE
                                table_schema = '" . self::DATABASE_NAME . "'
                                    AND table_name = '" . $brickTableName . "'
            ";

            $allColumns = $this->db->fetchCol($allColumnQuery);

            foreach($allColumns as $columnName){

                $columnQuery = "
                            SELECT
                                $brickTableName.o_id
                            FROM
                                $brickTableName
                                    JOIN
                                object_1 ON $brickTableName.o_id = object_1.o_id
                            WHERE
                                $brickTableName.$columnName IS NOT NULL
                                    AND object_1.productType = '$levelForQuery'
                ";

                $contaminatedIds = $this->db->fetchCol($columnQuery);

                $fetchChildParentNotEqualDataQuery = "
                            SELECT
                                childsBrickTable.o_id
                            FROM
                                $brickTableName AS childsBrickTable
                                    JOIN
                                object_1 AS childObjectTable ON childsBrickTable.o_id = childObjectTable.o_id
                                    JOIN
                                object_1 AS parentObjectTable ON childObjectTable.o_parentId = parentObjectTable.o_id
                                    JOIN
                                $brickTableName AS parentBrickData ON parentObjectTable.o_id = parentBrickData.o_id
                            WHERE
                                parentObjectTable.o_type = 'object'
                                AND childsBrickTable.$columnName IS NOT NULL
                                AND (childsBrickTable.$columnName != parentBrickData.$columnName OR parentBrickData.$columnName is null )
                                AND childObjectTable.productType = '$levelForQuery'
                ";

                $childParentNotEqualDataQueryResult = $this->db->fetchCol($fetchChildParentNotEqualDataQuery);

                $fetchChildWhereParentDataNullDataQuery = "
                            SELECT
                                childsBrickTable.o_id
                            FROM
                                $brickTableName AS childsBrickTable
                                    JOIN
                                object_1 AS childObjectTable ON childsBrickTable.o_id = childObjectTable.o_id
                                    JOIN
                                object_1 AS parentObjectTable ON childObjectTable.o_parentId = parentObjectTable.o_id
                                    JOIN
                                $brickTableName AS parentBrickData ON parentObjectTable.o_id = parentBrickData.o_id
                            WHERE
                                parentObjectTable.o_type = 'object'
                                AND childsBrickTable.$columnName IS NOT NULL
                                AND (parentBrickData.$columnName IS NULL )
                                AND childObjectTable.productType = '$levelForQuery'
                ";

                $fetchChildWhereParentDataNullDataQueryResult = $this->db->fetchCol($fetchChildWhereParentDataNullDataQuery);


                $fetchChildParentDataEqualQuery = "
                            SELECT
                                childsBrickTable.o_id
                            FROM
                                $brickTableName AS childsBrickTable
                                    JOIN
                                object_1 AS childObjectTable ON childsBrickTable.o_id = childObjectTable.o_id
                                    JOIN
                                object_1 AS parentObjectTable ON childObjectTable.o_parentId = parentObjectTable.o_id
                                    JOIN
                                $brickTableName AS parentBrickData ON parentObjectTable.o_id = parentBrickData.o_id
                            WHERE
                                parentObjectTable.o_type = 'object'
                                AND childsBrickTable.$columnName IS NOT NULL
                                AND (parentBrickData.$columnName = childsBrickTable.$columnName )
                                AND childObjectTable.productType = '$levelForQuery'
                ";

                $fetchChildParentDataEqualQueryResult = $this->db->fetchCol($fetchChildParentDataEqualQuery);

                echo "Column [$columnName], Count of Child Product having own data [".count($contaminatedIds)."], eg  $contaminatedIds[0] " . PHP_EOL;
                echo "Count of child product where parent-child data is not equal: [". count($childParentNotEqualDataQueryResult) ."]";
                echo PHP_EOL.PHP_EOL;

                $this->csvLog($csvLogFileHandle,[
                    ++$c,
                    $brickName,
                    $columnName,
                    count($contaminatedIds),
                    count($childParentNotEqualDataQueryResult),
                    count($fetchChildWhereParentDataNullDataQueryResult),
                    count($fetchChildParentDataEqualQueryResult),
                    $levelForQuery,
                    $contaminatedIds[0],
                    $childParentNotEqualDataQueryResult[0]."-".$childParentNotEqualDataQueryResult[1],
                    $fetchChildWhereParentDataNullDataQueryResult[0]."-".$fetchChildWhereParentDataNullDataQueryResult[1],
                    $fetchChildParentDataEqualQueryResult[0]."-".$fetchChildParentDataEqualQueryResult[1]
                ]);

                $this->brickAttributesWhichHaveDataInSpecificLevel[$brickTableName][] =
                    ['columnName' => $columnName,'dataInChildCount' => count($contaminatedIds),'eg' => $contaminatedIds[0]];

            }
            echo PHP_EOL . PHP_EOL;
        }
    }

    private function identifyCountOfBrickChildAndParentAttributeDataMismatch()
    {

    }

    /**
     * identify attributes which do not have unit conversion done properly
     *
     * @param int $offset
     * @param int $limit
     * @param string $logFile
     */
    private function initializeChildProcess(int $offset, int $limit, string $logFile)
    {

        $map = \Pimcore\Cache::load('attribute_to_attribute_group_map');

        $brickFieldsInProductClass = ['Base', 'Skeleton', 'Fert'];

        $brickNames = ['AccessoriesFert','BeltsFert','HoseBase','HoseFert',
            'HoseSkeleton','HydFittingsFert','INHFittingsFert','MetalFert','PTGBase','SynchronousFert'];

        foreach($brickNames as $brickName){
            $brickTableName = $this->getBrickTableName($brickName);

            $config = $this->configProvider->getUnitConversionConfig();
            foreach($config as $groupName => $groupConfig){
                if(count($config) >1 ){

                    foreach($groupConfig as $attributeName => $attributeUnit){

                            if(count($groupConfig) == 2){

                                $attributes = array_keys($groupConfig);
                                $attr1 = $attributes[0];
                                $attr2 = $attributes[1];

                                if($this->getIfColumnExistInTable($brickTableName,$attr1) && $this->getIfColumnExistInTable($brickTableName,$attr2) )
                                {
                                    $query = "select count(*) from ".$brickTableName."
                                            where (".$attr1." is not null and  ".$attr2." is null) OR
                                            (".$attr1." is null and  ".$attr2." is not null)";
                                    $count = $this->db->fetchOne($query);
                                    if($count > 0){
                                        if(!array_key_exists($groupName,$this->groups)){
                                            $this->groups[$groupName] = 1;
                                            echo "Counts found: " . $count. ",  Table : " .$brickTableName . PHP_EOL;
                                            p_r($groupConfig);
                                        }

                                    }
                                    break;
                                }

                            }elseif (count($groupConfig) == 3){
                                $attributes = array_keys($groupConfig);
                                $attr1 = $attributes[0];
                                $attr2 = $attributes[1];
                                $attr3 = $attributes[2];

                                if($this->getIfColumnExistInTable($brickTableName,$attr1) &&
                                    $this->getIfColumnExistInTable($brickTableName,$attr2) &&
                                    $this->getIfColumnExistInTable($brickTableName,$attr3) )
                                {
                                    $query = "select count(*) from ".$brickTableName."
                                            where (".$attr1." is not null and  ".$attr2." is null) OR
                                            (".$attr1." is null and  ".$attr2." is not null) OR
                                             (".$attr1." is not null and  ".$attr3." is null) OR
                                             (".$attr1." is null and  ".$attr3." is not null) OR
                                              (".$attr2." is not null and  ".$attr3." is null) OR
                                             (".$attr2." is null and  ".$attr3." is not null)
                                             ";

                                    $count = $this->db->fetchOne($query);
                                    if($count > 0){
                                        if(!array_key_exists($groupName,$this->groups)){
                                            $this->groups[$groupName] = 1;
                                            echo "Counts found: " . $count. ",  Table : " .$brickTableName . PHP_EOL;
                                            p_r($groupConfig);
                                        }

                                    }
                                    break;
                                }



                            }
                            // handle the count 3 wala case

                    }
                }

            }

        }
    }

    private function getBrickTableName(string $brickName) : string
    {
        return "object_brick_query_" . $brickName . "_1";
    }

    private function getIfColumnExistInTable(string $tableName,string $columnName): bool
    {
        $query =  "SELECT count(*) FROM information_schema.COLUMNS
                 WHERE TABLE_SCHEMA = '". self::DATABASE_NAME ."' AND TABLE_NAME = '".$tableName."'
                 AND COLUMN_NAME = '".$columnName."'";


        return $this->db->fetchOne($query) == 0 ? false: true;
    }


    private function csvLog($logHandler, array $dataRow)
    {
        $csvDelimiter = ",";
        fputcsv($logHandler, $dataRow, $csvDelimiter);
    }
}
