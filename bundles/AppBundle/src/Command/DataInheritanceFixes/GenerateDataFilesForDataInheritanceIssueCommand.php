<?php


namespace AppBundle\Command\DataInheritanceFixes;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * This script is created for one time execution to generate data files before and after execution of
 * "contitech:clear_child_brick_data_when_parent_has_data" command to analyze the changes in data
 */
class GenerateDataFilesForDataInheritanceIssueCommand extends Command
{
    const HoseSkeleton_BRICK_ATTRIBUTES = [
        'tubeGaugeMM',
        'hoseDashSize',
        'hoseIdDec',
        'hoseIdMM',
        'hoseOdIn',
        'hoseOdmm',
        'workingPressurePSI',
        'workingPressureMPA',
        'workingPressureBAR',
        'minBurstPressurePSI',
        'minBurstPressurempa',
        'BendRadiusIN',
        'BendRadiusMM',
        'VacuumIN',
        'VacuumMM',
        'tubeGaugeIN',
        'HoseIDNominalIDFrac',
        'InnerHoseIdDec',
        'InnerHoseOdInDec',
        'InnerHoseIDFractional',
        'InnerHoseIdMM',
        'InnerHoseOdMM',
        'HoseFittingFamily',
        'tubeGaugeFractional'
    ];

    const PTGSkeleton_BRICK_ATTRIBUTES = [
        'profile',
        'beltAngle',
        'staticConductive',
        'heatOilResistant',
        'heightIn',
        'heightMm'
    ];

    const HoseBase_BRICK_ATTRIBUTES = [
        'staticWire',
        'numberOfHelixWires',
        'numberOfPlies',
        'tubeMaterial',
        'tubeCharacteristic',
        'tubeColor',
        'StandardMetCover',
        'standardMetHose',
        'coverMaterial',
        'coverCharacteristic',
        'coverColor',
        'agencyCompliance',
        'safetyFactor',
        'acceptableHoseMedia',
        'StandardMetTube',
        'Coupling',
        'Packaging',
        'VirtualCatalogTubeMaterial',
        'VirtualCatalogCoverMaterial',
        'standardMetHoseComment',
        'LayFlatHoseYN',
        'NonStockSizes',
        'HelicalWireYN',
        'IFSApplications',
        'staticWireType',
        'sixDigitVirtualCatalogDescription'
    ];

    const PTGBase_BRICK_ATTRIBUTES = [
        'material',
        'PTGApplications'
    ];

    // -------------------- Numeric brick attributes ------------------------

    const HoseSkeleton_NUMERIC_BRICK_ATTRIBUTES = [
        'tubeGaugeMM',
        'hoseDashSize',
        'hoseIdDec',
        'hoseIdMM',
        'hoseOdIn',
        'hoseOdmm',
        'workingPressurePSI',
        'workingPressureMPA',
        'workingPressureBAR',
        'minBurstPressurePSI',
        'minBurstPressurempa',
        'BendRadiusIN',
        'BendRadiusMM',
        'VacuumIN',
        'VacuumMM',
        'tubeGaugeIN',
        'InnerHoseIdDec',
        'InnerHoseOdInDec',
        'InnerHoseIdMM',
        'InnerHoseOdMM',
    ];

    const PTGSkeleton_NUMERIC_BRICK_ATTRIBUTES = [
        'beltAngle',
        'heightIn',
        'heightMm'
    ];

    const HoseBase_NUMERIC_BRICK_ATTRIBUTES = [
        'numberOfHelixWires',
        'numberOfPlies'
    ];

    private $db;

    const LOG_FILE_PREFIX = "After_FIX_";

    public function __construct(string $name = null)
    {
        $this->db = \Pimcore\Db::get();
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('contitech:generate_data_files_for_data_inheritance_issue_command');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->generateParentHasDataRegardlessOfChild();

        $this->generateParentAndChildBothHaveData();

        $this->generateChildWithDistinctData();
        $this->generateChildWithDistinctData1();

        $this->generateParentChildDataDifferentInQueryTable();

        $this->generateParentAndChildBothHaveZeroForNumericAttributes();

        $this->generateChildHasDataParentDoesNot();

        $this->generateBaseHasDataRegardlessOfFert();

        $this->generateBaseAndFertBothHaveData();

        $this->generateFertWithDistinctBaseData();
        $this->generateFertWithDistinctBaseData1();

        $this->generateBaseFertDataDifferentInQueryTable();

        $this->generateFertHasDataBaseDoesNot();
    }

    private function generateParentHasDataRegardlessOfChild()
    {
        $this->processBricks('parent_has_data_regardless_of_child','generator_ParentHasDataRegardlessOfChild');
    }

    private function generateParentAndChildBothHaveData()
    {
        $this->processBricks('parent_and_child_both_have_data','generator_ParentAndChildBothHaveData');
    }

    private function generateChildWithDistinctData()
    {
        $this->processBricks('C3__child_with_distinct_data','generator_ChildWithDistinctData');
    }

    private function generateChildWithDistinctData1()
    {
        $this->processBricks('C3__child_with_distinct_data_1','generator_ChildWithDistinctData1');
    }

    private function generateChildHasDataParentDoesNot()
    {
        $this->processBricks('C3__child_has_data_parent_does_not','generator_ChildHasDataParentDoesNot');
    }

    private function generateParentChildDataDifferentInQueryTable()
    {
        $this->processBricks('parent_child_data_different_in_query_table','generator_ParentChildDataDifferentInQueryTable');
    }

    private function generateParentAndChildBothHaveZeroForNumericAttributes()
    {
        $this->requestToGenerateData("HoseSkeleton",self::HoseSkeleton_NUMERIC_BRICK_ATTRIBUTES,'fert', '0__parent_and_child_with_zero', 'generator_ChildAndParentBothHaveZeroForNumericAttributes');
        $this->requestToGenerateData("PTGSkeleton",self::PTGSkeleton_NUMERIC_BRICK_ATTRIBUTES,'fert', '0__parent_and_child_with_zero', 'generator_ChildAndParentBothHaveZeroForNumericAttributes');

        $this->requestToGenerateData("HoseBase",self::HoseBase_NUMERIC_BRICK_ATTRIBUTES,'fert', '0__parent_and_child_with_zero', 'generator_ChildAndParentBothHaveZeroForNumericAttributes');
        $this->requestToGenerateData("HoseBase",self::HoseBase_NUMERIC_BRICK_ATTRIBUTES,'skeleton', '0__parent_and_child_with_zero', 'generator_ChildAndParentBothHaveZeroForNumericAttributes');
    }

    private function generateBaseHasDataRegardlessOfFert()
    {
        $this->requestToGenerateData("HoseBase",self::HoseBase_BRICK_ATTRIBUTES,'fert', 'base_has_data_regardless_of_fert', 'generator_BaseHasDataRegardlessOfFert');

        $this->requestToGenerateData("PTGBase",self::PTGBase_BRICK_ATTRIBUTES,'fert', 'base_has_data_regardless_of_fert', 'generator_BaseHasDataRegardlessOfFert');
    }

    private function generateBaseAndFertBothHaveData()
    {
        $this->requestToGenerateData("HoseBase",self::HoseBase_BRICK_ATTRIBUTES,'fert', 'base_and_fert_Both_have_data', 'generator_BaseAndFertBothHaveData');

        $this->requestToGenerateData("PTGBase",self::PTGBase_BRICK_ATTRIBUTES,'fert', 'base_and_fert_Both_have_data', 'generator_BaseAndFertBothHaveData');
    }

    private function generateFertWithDistinctBaseData()
    {
        $this->requestToGenerateData("HoseBase",self::HoseBase_BRICK_ATTRIBUTES,'fert', 'C3__fert_with_distinct_base_data', 'generator_FertWithDistinctBaseData');

        $this->requestToGenerateData("PTGBase",self::PTGBase_BRICK_ATTRIBUTES,'fert', 'C3__fert_with_distinct_base_data', 'generator_FertWithDistinctBaseData');
    }

    private function generateFertWithDistinctBaseData1()
    {
        $this->requestToGenerateData("HoseBase",self::HoseBase_BRICK_ATTRIBUTES,'fert', 'C3__fert_with_distinct_base_data_1', 'generator_FertWithDistinctBaseData1');

        $this->requestToGenerateData("PTGBase",self::PTGBase_BRICK_ATTRIBUTES,'fert', 'C3__fert_with_distinct_base_data_1', 'generator_FertWithDistinctBaseData1');
    }

    private function generateBaseFertDataDifferentInQueryTable()
    {
        $this->requestToGenerateData("HoseBase",self::HoseBase_BRICK_ATTRIBUTES,'fert', 'base_fert_data_different_in_query_table', 'generator_BaseFertDataDifferentInQueryTable');

        $this->requestToGenerateData("PTGBase",self::PTGBase_BRICK_ATTRIBUTES,'fert', 'base_fert_data_different_in_query_table', 'generator_BaseFertDataDifferentInQueryTable');
    }

    private function generateFertHasDataBaseDoesNot()
    {

        $this->requestToGenerateData("HoseBase",self::HoseBase_BRICK_ATTRIBUTES,'fert', 'C3__fert_has_data_base_does_not', 'generator_FertHasDataBaseDoesNot');

        $this->requestToGenerateData("PTGBase",self::PTGBase_BRICK_ATTRIBUTES,'fert', 'C3__fert_has_data_base_does_not', 'generator_FertHasDataBaseDoesNot');
    }

    private function processBricks(string $logFileName, string $generatorFunction)
    {

        $this->requestToGenerateData("HoseSkeleton", self::HoseSkeleton_BRICK_ATTRIBUTES, 'fert', $logFileName, $generatorFunction);

        $this->requestToGenerateData("PTGSkeleton",self::PTGSkeleton_BRICK_ATTRIBUTES,'fert', $logFileName, $generatorFunction);

        $this->requestToGenerateData("HoseBase",self::HoseBase_BRICK_ATTRIBUTES,'fert', $logFileName, $generatorFunction);

        $this->requestToGenerateData("HoseBase",self::HoseBase_BRICK_ATTRIBUTES,'skeleton', $logFileName, $generatorFunction);

        $this->requestToGenerateData("PTGBase",self::PTGBase_BRICK_ATTRIBUTES,'fert', $logFileName, $generatorFunction);

        $this->requestToGenerateData("PTGBase",self::PTGBase_BRICK_ATTRIBUTES,'skeleton', $logFileName, $generatorFunction);
    }

    private function requestToGenerateData(string $brickName, array $brickAttr, string $childType,string $logFileName,string $generatorFunction)
    {
        echo $logFileName . "---------------------------------\n";

        $c = 0;
        foreach ($brickAttr as $attr) {
            $csvLogFilePath = PIMCORE_LOG_DIRECTORY . "/" . self::LOG_FILE_PREFIX . $logFileName . ".csv";
            $csvLogFileHandle = fopen($csvLogFilePath, "a");

            // if($c == 0){
            //     $this->csvLog($csvLogFileHandle,array(
            //         "#",
            //         "Brick Name",
            //         "Attribute Name",
            //         "Child Id",
            //         "Parent Id",
            //         "Child Data",
            //         "Parent Data",
            //         "Child Type",
            //     ));
            // }
            
            $this->$generatorFunction($brickName, $attr, $childType, $csvLogFileHandle);
            fclose($csvLogFileHandle);
            $c++;
        }
    }

    private function generator_ParentHasDataRegardlessOfChild(string $brickName, string $attr, string $childType, $csvLogFileHandle)
    {
        $c = 0;
        $brickTableName = "object_brick_store_" . $brickName . "_1";

        $fetchParentHasDataRegardlessOfChildQuery = "
                            SELECT
                                childsBrickTable.o_id childId,
                                parentBrickTable.o_id parentId,
                                childsBrickTable.$attr childData,
                                parentBrickTable.$attr parentData
                            FROM
                                $brickTableName AS childsBrickTable
                                    JOIN
                                object_1 AS childObjectTable ON childsBrickTable.o_id = childObjectTable.o_id
                                    JOIN
                                object_1 AS parentObjectTable ON childObjectTable.o_parentId = parentObjectTable.o_id
                                    JOIN
                                $brickTableName AS parentBrickTable ON parentObjectTable.o_id = parentBrickTable.o_id
                            WHERE
                                parentObjectTable.o_type = 'object'
                                AND (parentBrickTable.$attr IS NOT NULL)
                                AND (parentBrickTable.$attr != '')
                                AND childObjectTable.productType = '$childType'
                            ORDER BY
                                childId
                    ";

        $result = $this->db->fetchAllAssociative($fetchParentHasDataRegardlessOfChildQuery);
        echo PHP_EOL . "Total = " . count($result) . PHP_EOL;

        foreach ($result as $item) {
            $childId = $item['childId'];
            $parentId = $item['parentId'];
            $childData = $item['childData'];
            $parentData = $item['parentData'];

            $this->csvLog($csvLogFileHandle, [++$c, $brickName, $attr, $childId, $parentId, $childData, $parentData, $childType]);
        }
    }

    private function generator_ParentAndChildBothHaveData(string $brickName, string $attr, string $childType, $csvLogFileHandle)
    {
        $c = 0;
        $brickTableName = "object_brick_store_" . $brickName . "_1";

        $fetchParentAndChildBothHaveDataQuery = "
                            SELECT
                                childsBrickTable.o_id childId,
                                parentBrickTable.o_id parentId,
                                childsBrickTable.$attr childData,
                                parentBrickTable.$attr parentData
                            FROM
                                $brickTableName AS childsBrickTable
                                    JOIN
                                object_1 AS childObjectTable ON childsBrickTable.o_id = childObjectTable.o_id
                                    JOIN
                                object_1 AS parentObjectTable ON childObjectTable.o_parentId = parentObjectTable.o_id
                                    JOIN
                                $brickTableName AS parentBrickTable ON parentObjectTable.o_id = parentBrickTable.o_id
                            WHERE
                                parentObjectTable.o_type = 'object'
                                AND (parentBrickTable.$attr IS NOT NULL)
                                AND (parentBrickTable.$attr != '')
                                AND (childsBrickTable.$attr IS NOT NULL)
                                AND childObjectTable.productType = '$childType'
                            ORDER BY
                                childId
                ";

        $result = $this->db->fetchAllAssociative($fetchParentAndChildBothHaveDataQuery);
        echo PHP_EOL . "Total = " . count($result) . PHP_EOL;

        foreach ($result as $item) {
            $childId = $item['childId'];
            $parentId = $item['parentId'];
            $childData = $item['childData'];
            $parentData = $item['parentData'];

            $this->csvLog($csvLogFileHandle, [++$c, $brickName, $attr, $childId, $parentId, $childData, $parentData, $childType]);
        }
    }

    private function generator_ChildWithDistinctData(string $brickName, string $attr, string $childType, $csvLogFileHandle)
    {
        $c = 0;
        $brickTableName = "object_brick_store_" . $brickName . "_1";

        p_r($brickName);
        $a = PIMCORE_SYSTEM_TEMP_DIRECTORY;
        p_r($attr);

        $fetchChildWithDistinctDataQuery = "
                                SELECT 
                                    parentBrickTable.o_id parentId,
                                    GROUP_CONCAT(DISTINCT childsBrickTable.$attr
                                        SEPARATOR ', ') distinctChildData,
                                    GROUP_CONCAT(childsBrickTable.o_id
                                        SEPARATOR ', ') allChildWithData,
                                    COUNT(DISTINCT childsBrickTable.$attr) distinctchildDataCount
                                FROM
                                    $brickTableName AS childsBrickTable
                                        JOIN
                                    object_1 AS childObjectTable ON childsBrickTable.o_id = childObjectTable.o_id
                                        JOIN
                                    object_1 AS parentObjectTable ON childObjectTable.o_parentId = parentObjectTable.o_id
                                        JOIN
                                    $brickTableName AS parentBrickTable ON parentObjectTable.o_id = parentBrickTable.o_id
                                WHERE
                                    parentObjectTable.o_type = 'object'
                                        AND childsBrickTable.$attr IS NOT NULL
                                        AND (parentBrickTable.$attr IS NULL || parentBrickTable.$attr = '')
                                        AND childObjectTable.productType = '$childType'
                                GROUP BY parentBrickTable.o_id
                                HAVING COUNT(DISTINCT childsBrickTable.$attr) > 1
        ";

        $childWithDistinctData = $this->db->fetchAllAssociative($fetchChildWithDistinctDataQuery);

        foreach($childWithDistinctData as $childWithDistinctDataRow){
            $parentId = $childWithDistinctDataRow['parentId'];
            $distinctChildData = $childWithDistinctDataRow['distinctChildData'];
            $allChildWithData = $childWithDistinctDataRow['allChildWithData'];
            $distinctchildDataCount = $childWithDistinctDataRow['distinctchildDataCount'];

            $this->csvLog($csvLogFileHandle, [++$c, $brickName, $attr, $parentId, $distinctChildData, $allChildWithData, $distinctchildDataCount, $childType]);

        }
    }

    private function generator_ParentChildDataDifferentInQueryTable(string $brickName, string $attr, string $childType, $csvLogFileHandle)
    {
        $c = 0;
        $brickTableName = "object_brick_query_" . $brickName . "_1";

        $fetchParentAndChildBothHaveDataQuery = "
                            SELECT
                                childsBrickTable.o_id childId,
                                parentBrickTable.o_id parentId,
                                childsBrickTable.$attr childData,
                                parentBrickTable.$attr parentData
                            FROM
                                $brickTableName AS childsBrickTable
                                    JOIN
                                object_1 AS childObjectTable ON childsBrickTable.o_id = childObjectTable.o_id
                                    JOIN
                                object_1 AS parentObjectTable ON childObjectTable.o_parentId = parentObjectTable.o_id
                                    JOIN
                                $brickTableName AS parentBrickTable ON parentObjectTable.o_id = parentBrickTable.o_id
                            WHERE
                                parentObjectTable.o_type = 'object'
                                AND (parentBrickTable.$attr IS NOT NULL)
                                AND (parentBrickTable.$attr != '')
                                AND (childsBrickTable.$attr != parentBrickTable.$attr OR childsBrickTable.$attr IS NULL)
                                AND childObjectTable.productType = '$childType'
                            ORDER BY
                                childId
                ";

        $result = $this->db->fetchAllAssociative($fetchParentAndChildBothHaveDataQuery);
        echo PHP_EOL . "Total = " . count($result) . PHP_EOL;

        foreach ($result as $item) {
            $childId = $item['childId'];
            $parentId = $item['parentId'];
            $childData = $item['childData'];
            $parentData = $item['parentData'];

            $this->csvLog($csvLogFileHandle, [++$c, $brickName, $attr, $childId, $parentId, $childData, $parentData, $childType]);
        }

    }

    private function generator_ChildHasDataParentDoesNot(string $brickName, string $attr, string $childType, $csvLogFileHandle)
    {
        $c = 0;
        $brickTableName = "object_brick_store_" . $brickName . "_1";

        $fetchChildHasDataParentDoesNotQuery = "
                            SELECT
                                childsBrickTable.o_id childId,
                                parentBrickTable.o_id parentId,
                                childsBrickTable.$attr childData,
                                parentBrickTable.$attr parentData
                            FROM
                                $brickTableName AS childsBrickTable
                                    JOIN
                                object_1 AS childObjectTable ON childsBrickTable.o_id = childObjectTable.o_id
                                    JOIN
                                object_1 AS parentObjectTable ON childObjectTable.o_parentId = parentObjectTable.o_id
                                    JOIN
                                $brickTableName AS parentBrickTable ON parentObjectTable.o_id = parentBrickTable.o_id
                            WHERE
                                parentObjectTable.o_type = 'object'
                                AND (parentBrickTable.$attr IS NULL OR parentBrickTable.$attr = '')
                                AND (childsBrickTable.$attr IS NOT NULL)
                                AND childObjectTable.productType = '$childType'
                            ORDER BY
                                childId
                ";

        $result = $this->db->fetchAllAssociative($fetchChildHasDataParentDoesNotQuery);
        echo PHP_EOL . "Total = " . count($result) . PHP_EOL;

        foreach ($result as $item) {
            $childId = $item['childId'];
            $parentId = $item['parentId'];
            $childData = $item['childData'];
            $parentData = $item['parentData'];

            $this->csvLog($csvLogFileHandle, [++$c, $brickName, $attr, $childId, $parentId, $childData, $parentData, $childType]);
        }
    }

    private function generator_ChildWithDistinctData1(string $brickName, string $attr, string $childType, $csvLogFileHandle)
    {
        $c = 0;
        $brickTableName = "object_brick_store_" . $brickName . "_1";

        p_r($brickName);
        p_r($attr);

        $fetchChildWithDistinctDataQuery = "
                                SELECT 
                                    parentBrickTable.o_id parentId,
                                    GROUP_CONCAT(DISTINCT childsBrickTable.$attr
                                        SEPARATOR ', ') distinctChildData,
                                    GROUP_CONCAT(childsBrickTable.o_id
                                        SEPARATOR ', ') allChildWithData,
                                    COUNT(DISTINCT childsBrickTable.$attr) distinctchildDataCount
                                FROM
                                    $brickTableName AS childsBrickTable
                                        JOIN
                                    object_1 AS childObjectTable ON childsBrickTable.o_id = childObjectTable.o_id
                                        JOIN
                                    object_1 AS parentObjectTable ON childObjectTable.o_parentId = parentObjectTable.o_id
                                        JOIN
                                    $brickTableName AS parentBrickTable ON parentObjectTable.o_id = parentBrickTable.o_id
                                WHERE
                                    parentObjectTable.o_type = 'object'
                                        AND childsBrickTable.$attr IS NOT NULL
                                        AND (parentBrickTable.$attr IS NULL || parentBrickTable.$attr = '')
                                        AND childObjectTable.productType = '$childType'
                                GROUP BY parentBrickTable.o_id
                                HAVING MIN(childsBrickTable.$attr) != MAX(childsBrickTable.$attr)
        ";

        $childWithDistinctData = $this->db->fetchAllAssociative($fetchChildWithDistinctDataQuery);

        foreach($childWithDistinctData as $childWithDistinctDataRow){
            $parentId = $childWithDistinctDataRow['parentId'];
            $distinctChildData = $childWithDistinctDataRow['distinctChildData'];
            $allChildWithData = $childWithDistinctDataRow['allChildWithData'];
            $distinctchildDataCount = $childWithDistinctDataRow['distinctchildDataCount'];

            $this->csvLog($csvLogFileHandle, [++$c, $brickName, $attr, $parentId, $distinctChildData, $allChildWithData, $distinctchildDataCount, $childType]);

        }
    }


    private function generator_ChildAndParentBothHaveZeroForNumericAttributes(string $brickName, string $attr, string $childType, $csvLogFileHandle)
    {
        $c = 0;
        $brickTableName = "object_brick_store_" . $brickName . "_1";

        $fetchParentAndChildBothHaveDataQuery = "
                            SELECT
                                childsBrickTable.o_id childId,
                                parentBrickTable.o_id parentId,
                                childsBrickTable.$attr childData,
                                parentBrickTable.$attr parentData
                            FROM
                                $brickTableName AS childsBrickTable
                                    JOIN
                                object_1 AS childObjectTable ON childsBrickTable.o_id = childObjectTable.o_id
                                    JOIN
                                object_1 AS parentObjectTable ON childObjectTable.o_parentId = parentObjectTable.o_id
                                    JOIN
                                $brickTableName AS parentBrickTable ON parentObjectTable.o_id = parentBrickTable.o_id
                            WHERE
                                parentObjectTable.o_type = 'object'
                                AND (parentBrickTable.$attr IS NOT NULL)
                                AND (parentBrickTable.$attr = 0)
                                AND (childsBrickTable.$attr IS NOT NULL)
                                AND (childsBrickTable.$attr = 0)
                                AND childObjectTable.productType = '$childType'
                            ORDER BY
                                childId
                ";

        $result = $this->db->fetchAllAssociative($fetchParentAndChildBothHaveDataQuery);
        echo PHP_EOL . "Total = " . count($result) . PHP_EOL;

        foreach ($result as $item) {
            $childId = $item['childId'];
            $parentId = $item['parentId'];
            $childData = $item['childData'];
            $parentData = $item['parentData'];

            $this->csvLog($csvLogFileHandle, [++$c, $brickName, $attr, $childId, $parentId, $childData, $parentData, $childType]);
        }
    }

    private function generator_BaseHasDataRegardlessOfFert(string $brickName, string $attr, string $childType, $csvLogFileHandle)
    {
        $c = 0;
        $brickTableName = "object_brick_store_" . $brickName . "_1";

        $fetchBaseHasDataRegardlessOfFertQuery = "
                            SELECT
                                fertBrickTable.o_id fertId,
                                baseBrickTable.o_id baseId,
                                fertBrickTable.$attr fertData,
                                baseBrickTable.$attr baseData
                            FROM
                                $brickTableName AS fertBrickTable
                                    JOIN
                                object_1 AS fertObjectTable ON fertBrickTable.o_id = fertObjectTable.o_id
                                    JOIN
                                object_1 AS skeletonObjectTable ON fertObjectTable.o_parentId = skeletonObjectTable.o_id
                                    JOIN
                                $brickTableName AS skeletonBrickTable ON skeletonObjectTable.o_id = skeletonBrickTable.o_id
                                    JOIN
                                object_1 AS baseObjectTable ON skeletonObjectTable.o_parentId = baseObjectTable.o_id
                                    JOIN
                                $brickTableName as baseBrickTable ON baseObjectTable.o_id = baseBrickTable.o_id
                            WHERE
                                skeletonObjectTable.o_type = 'object'
                                AND baseObjectTable.o_type = 'object'
                                AND (baseBrickTable.$attr IS NOT NULL)
                                AND (baseBrickTable.$attr != '')
                                AND fertObjectTable.productType = '$childType'
                ";

        $result = $this->db->fetchAllAssociative($fetchBaseHasDataRegardlessOfFertQuery);
        echo PHP_EOL . "Total = " . count($result) . PHP_EOL;

        foreach ($result as $item) {
            $childId = $item['fertId'];
            $parentId = $item['baseId'];
            $childData = $item['fertData'];
            $parentData = $item['baseData'];

            $this->csvLog($csvLogFileHandle, [++$c, $brickName, $attr, $childId, $parentId, $childData, $parentData, $childType]);
        }
    }

    private function generator_BaseAndFertBothHaveData(string $brickName, string $attr, string $childType, $csvLogFileHandle)
    {
        $c = 0;
        $brickTableName = "object_brick_store_" . $brickName . "_1";

        $fetchBaseAndFertBothHaveDataQuery = "
                            SELECT
                                fertBrickTable.o_id fertId,
                                baseBrickTable.o_id baseId,
                                fertBrickTable.$attr fertData,
                                baseBrickTable.$attr baseData
                            FROM
                                $brickTableName AS fertBrickTable
                                    JOIN
                                object_1 AS fertObjectTable ON fertBrickTable.o_id = fertObjectTable.o_id
                                    JOIN
                                object_1 AS skeletonObjectTable ON fertObjectTable.o_parentId = skeletonObjectTable.o_id
                                    JOIN
                                $brickTableName AS skeletonBrickTable ON skeletonObjectTable.o_id = skeletonBrickTable.o_id
                                    JOIN
                                object_1 AS baseObjectTable ON skeletonObjectTable.o_parentId = baseObjectTable.o_id
                                    JOIN
                                $brickTableName as baseBrickTable ON baseObjectTable.o_id = baseBrickTable.o_id
                            WHERE
                                skeletonObjectTable.o_type = 'object'
                                AND baseObjectTable.o_type = 'object'
                                AND (baseBrickTable.$attr IS NOT NULL)
                                AND (baseBrickTable.$attr != '')
                                AND (fertBrickTable.$attr IS NOT NULL)
                                AND fertObjectTable.productType = '$childType'
                ";

        $result = $this->db->fetchAllAssociative($fetchBaseAndFertBothHaveDataQuery);
        echo PHP_EOL . "Total = " . count($result) . PHP_EOL;

        foreach ($result as $item) {
            $childId = $item['fertId'];
            $parentId = $item['baseId'];
            $childData = $item['fertData'];
            $parentData = $item['baseData'];

            $this->csvLog($csvLogFileHandle, [++$c, $brickName, $attr, $childId, $parentId, $childData, $parentData, $childType]);
        }
    }

    private function generator_FertWithDistinctBaseData(string $brickName, string $attr, string $childType, $csvLogFileHandle)
    {
        $c = 0;
        $brickTableName = "object_brick_store_" . $brickName . "_1";

        p_r($brickName);
        p_r($attr);

        $fetchChildWithDistinctDataQuery = "
                                SELECT 
                                    baseBrickTable.o_id baseId,
                                    GROUP_CONCAT(DISTINCT fertBrickTable.$attr
                                        SEPARATOR ', ') distinctFertData,
                                    GROUP_CONCAT(fertBrickTable.o_id
                                        SEPARATOR ', ') allFertWithData,
                                    COUNT(DISTINCT fertBrickTable.$attr) distinctFertDataCount
                                FROM
                                    $brickTableName AS fertBrickTable
                                        JOIN
                                    object_1 AS fertObjectTable ON fertBrickTable.o_id = fertObjectTable.o_id
                                        JOIN
                                    object_1 AS skeletonObjectTable ON fertObjectTable.o_parentId = skeletonObjectTable.o_id
                                        JOIN
                                    $brickTableName AS skeletonBrickTable ON skeletonObjectTable.o_id = skeletonBrickTable.o_id
                                        JOIN
                                    object_1 AS baseObjectTable ON skeletonObjectTable.o_parentId = baseObjectTable.o_id
                                        JOIN
                                    $brickTableName as baseBrickTable ON baseObjectTable.o_id = baseBrickTable.o_id
                                WHERE
                                    skeletonObjectTable.o_type = 'object'
                                        AND baseObjectTable.o_type = 'object'
                                        AND fertBrickTable.$attr IS NOT NULL
                                        AND (baseBrickTable.$attr IS NULL || baseBrickTable.$attr = '')
                                        AND fertObjectTable.productType = '$childType'
                                GROUP BY baseBrickTable.o_id
                                HAVING COUNT(DISTINCT fertBrickTable.$attr) > 1
        ";

        $childWithDistinctData = $this->db->fetchAllAssociative($fetchChildWithDistinctDataQuery);

        foreach($childWithDistinctData as $childWithDistinctDataRow){
            $parentId = $childWithDistinctDataRow['baseId'];
            $distinctChildData = $childWithDistinctDataRow['distinctFertData'];
            $allChildWithData = $childWithDistinctDataRow['allFertWithData'];
            $distinctchildDataCount = $childWithDistinctDataRow['distinctFertDataCount'];
            
            $this->csvLog($csvLogFileHandle, [++$c, $brickName, $attr, $parentId, $distinctChildData, $allChildWithData, $distinctchildDataCount, $childType]);

        }
    }

    private function generator_FertWithDistinctBaseData1(string $brickName, string $attr, string $childType, $csvLogFileHandle)
    {
        $c = 0;
        $brickTableName = "object_brick_store_" . $brickName . "_1";

        p_r($brickName);
        p_r($attr);

        $fetchChildWithDistinctDataQuery = "
                                SELECT 
                                    baseBrickTable.o_id baseId,
                                    GROUP_CONCAT(DISTINCT fertBrickTable.$attr
                                        SEPARATOR ', ') distinctFertData,
                                    GROUP_CONCAT(fertBrickTable.o_id
                                        SEPARATOR ', ') allFertWithData,
                                    COUNT(DISTINCT fertBrickTable.$attr) distinctFertDataCount
                                FROM
                                    $brickTableName AS fertBrickTable
                                        JOIN
                                    object_1 AS fertObjectTable ON fertBrickTable.o_id = fertObjectTable.o_id
                                        JOIN
                                    object_1 AS skeletonObjectTable ON fertObjectTable.o_parentId = skeletonObjectTable.o_id
                                        JOIN
                                    $brickTableName AS skeletonBrickTable ON skeletonObjectTable.o_id = skeletonBrickTable.o_id
                                        JOIN
                                    object_1 AS baseObjectTable ON skeletonObjectTable.o_parentId = baseObjectTable.o_id
                                        JOIN
                                    $brickTableName as baseBrickTable ON baseObjectTable.o_id = baseBrickTable.o_id
                                WHERE
                                    skeletonObjectTable.o_type = 'object'
                                        AND baseObjectTable.o_type = 'object'
                                        AND fertBrickTable.$attr IS NOT NULL
                                        AND (baseBrickTable.$attr IS NULL || baseBrickTable.$attr = '')
                                        AND fertObjectTable.productType = '$childType'
                                GROUP BY baseBrickTable.o_id
                                    HAVING MIN(fertBrickTable.$attr) != MAX(fertBrickTable.$attr)
        ";

        $childWithDistinctData = $this->db->fetchAllAssociative($fetchChildWithDistinctDataQuery);

        foreach($childWithDistinctData as $childWithDistinctDataRow){
            $parentId = $childWithDistinctDataRow['baseId'];
            $distinctChildData = $childWithDistinctDataRow['distinctFertData'];
            $allChildWithData = $childWithDistinctDataRow['allFertWithData'];
            $distinctchildDataCount = $childWithDistinctDataRow['distinctFertDataCount'];

            $this->csvLog($csvLogFileHandle, [++$c, $brickName, $attr, $parentId, $distinctChildData, $allChildWithData, $distinctchildDataCount, $childType]);

        }
    }

    private function generator_BaseFertDataDifferentInQueryTable(string $brickName, string $attr, string $childType, $csvLogFileHandle)
    {
        $c = 0;
        $brickTableName = "object_brick_query_" . $brickName . "_1";

        $fetchBaseAndFertBothHaveDataQuery = "
                            SELECT
                                fertBrickTable.o_id fertId,
                                baseBrickTable.o_id baseId,
                                fertBrickTable.$attr fertData,
                                baseBrickTable.$attr baseData
                            FROM
                                $brickTableName AS fertBrickTable
                                    JOIN
                                object_1 AS fertObjectTable ON fertBrickTable.o_id = fertObjectTable.o_id
                                    JOIN
                                object_1 AS skeletonObjectTable ON fertObjectTable.o_parentId = skeletonObjectTable.o_id
                                    JOIN
                                $brickTableName AS skeletonBrickTable ON skeletonObjectTable.o_id = skeletonBrickTable.o_id
                                    JOIN
                                object_1 AS baseObjectTable ON skeletonObjectTable.o_parentId = baseObjectTable.o_id
                                    JOIN
                                $brickTableName as baseBrickTable ON baseObjectTable.o_id = baseBrickTable.o_id
                            WHERE
                                skeletonObjectTable.o_type = 'object'
                                AND baseObjectTable.o_type = 'object'
                                AND (baseBrickTable.$attr IS NOT NULL)
                                AND (baseBrickTable.$attr != '')
                                AND (baseBrickTable.$attr != fertBrickTable.$attr OR fertBrickTable.$attr IS NULL)
                                AND fertObjectTable.productType = '$childType'
                ";

        $result = $this->db->fetchAllAssociative($fetchBaseAndFertBothHaveDataQuery);
        echo PHP_EOL . "Total = " . count($result) . PHP_EOL;

        foreach ($result as $item) {
            $childId = $item['fertId'];
            $parentId = $item['baseId'];
            $childData = $item['fertData'];
            $parentData = $item['baseData'];

            $this->csvLog($csvLogFileHandle, [++$c, $brickName, $attr, $childId, $parentId, $childData, $parentData, $childType]);
        }
    }

    private function generator_FertHasDataBaseDoesNot(string $brickName, string $attr, string $childType, $csvLogFileHandle)
    {
        $c = 0;
        $brickTableName = "object_brick_store_" . $brickName . "_1";

        $fetchFertHasDataBaseDoesNotQuery = "
                            SELECT
                                fertBrickTable.o_id fertId,
                                baseBrickTable.o_id baseId,
                                fertBrickTable.$attr fertData,
                                baseBrickTable.$attr baseData
                            FROM
                                $brickTableName AS fertBrickTable
                                    JOIN
                                object_1 AS fertObjectTable ON fertBrickTable.o_id = fertObjectTable.o_id
                                    JOIN
                                object_1 AS skeletonObjectTable ON fertObjectTable.o_parentId = skeletonObjectTable.o_id
                                    JOIN
                                $brickTableName AS skeletonBrickTable ON skeletonObjectTable.o_id = skeletonBrickTable.o_id
                                    JOIN
                                object_1 AS baseObjectTable ON skeletonObjectTable.o_parentId = baseObjectTable.o_id
                                    JOIN
                                $brickTableName as baseBrickTable ON baseObjectTable.o_id = baseBrickTable.o_id
                            WHERE
                                skeletonObjectTable.o_type = 'object'
                                AND baseObjectTable.o_type = 'object'
                                AND (baseBrickTable.$attr IS NULL OR baseBrickTable.$attr = '')
                                AND (fertBrickTable.$attr IS NOT NULL AND fertBrickTable.$attr != '')
                                AND fertObjectTable.productType = '$childType'
                ";

        $result = $this->db->fetchAllAssociative($fetchFertHasDataBaseDoesNotQuery);
        echo PHP_EOL . "Total = " . count($result) . PHP_EOL;

        foreach ($result as $item) {
            $childId = $item['fertId'];
            $parentId = $item['baseId'];
            $childData = $item['fertData'];
            $parentData = $item['baseData'];

            $this->csvLog($csvLogFileHandle, [++$c, $brickName, $attr, $childId, $parentId, $childData, $parentData, $childType]);
        }   
    }

    private function csvLog($logHandler, array $dataRow)
    {
        $csvDelimiter = ",";
        fputcsv($logHandler, $dataRow, $csvDelimiter);
    }

}
