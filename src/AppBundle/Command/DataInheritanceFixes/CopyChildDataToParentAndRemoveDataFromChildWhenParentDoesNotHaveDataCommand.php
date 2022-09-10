<?php

namespace AppBundle\Command\DataInheritanceFixes;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CopyChildDataToParentAndRemoveDataFromChildWhenParentDoesNotHaveDataCommand extends Command
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

    private $db;

    const PARENTS_TO_BE_UPDATED_LOG_FILE = "C3__parents_to_be_updated";
    const BASE_TO_BE_UPDATED_LOG_FILE = "C3__base_to_be_updated";
    const PARENT_CHILD_UPDATE_STATUS_LOG_FILE = "C3__parent_child_update";
    const LOG_FILE_PREFIX = "EXECUTION_";

    public function __construct(string $name = null)
    {
        $this->db = \Pimcore\Db::get();
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('contitech:copy_child_data_to_parent_and_remove_data_from_child_when_parent_does_not_have_data_command');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->fixParentChildData();

        $this->fixBaseFertData();
    }

    private function fixParentChildData()
    {
        $this->requestToFixABrick("HoseSkeleton", self::HoseSkeleton_BRICK_ATTRIBUTES, 'fert',self::PARENTS_TO_BE_UPDATED_LOG_FILE, 'requestToFixParentChildData');

        $this->requestToFixABrick("PTGSkeleton", self::PTGSkeleton_BRICK_ATTRIBUTES, 'fert',self::PARENTS_TO_BE_UPDATED_LOG_FILE, 'requestToFixParentChildData');

        $this->requestToFixABrick("HoseBase", self::HoseBase_BRICK_ATTRIBUTES, 'skeleton',self::PARENTS_TO_BE_UPDATED_LOG_FILE, 'requestToFixParentChildData');

        $this->requestToFixABrick("PTGBase", self::PTGBase_BRICK_ATTRIBUTES, 'skeleton',self::PARENTS_TO_BE_UPDATED_LOG_FILE, 'requestToFixParentChildData');
    }

    private function fixBaseFertData()
    {
        $this->requestToFixABrick("HoseBase", self::HoseBase_BRICK_ATTRIBUTES, 'fert',self::BASE_TO_BE_UPDATED_LOG_FILE, 'requestToFixBaseFertData');
        $this->requestToFixABrick("PTGBase", self::PTGBase_BRICK_ATTRIBUTES, 'fert',self::BASE_TO_BE_UPDATED_LOG_FILE, 'requestToFixBaseFertData');
    }

    private function requestToFixABrick(string $brickName, array $brickAttrs, string $childType, string $logFileName, string $functionName)
    {
        echo $logFileName . "---------------------------------\n";

        $logFileName = self::LOG_FILE_PREFIX . $logFileName;
        $csvLogFilePath = PIMCORE_LOG_DIRECTORY . "/" . $logFileName . ".csv";
        $csvLogFileHandle = fopen($csvLogFilePath, "a");

        $parentChildUpdateStatusLogFileName = self::LOG_FILE_PREFIX . self::PARENT_CHILD_UPDATE_STATUS_LOG_FILE;
        $parentChildUpdateStatusCsvLogFilePath = PIMCORE_LOG_DIRECTORY . "/" . $parentChildUpdateStatusLogFileName . ".csv";
        $parentChildUpdateStatusCsvLogFileHandle = fopen($parentChildUpdateStatusCsvLogFilePath, "a");

        foreach ($brickAttrs as $attr) {
            $this->$functionName($brickName, $attr, $childType, $csvLogFileHandle,$parentChildUpdateStatusCsvLogFileHandle);
        }
        
        fclose($csvLogFileHandle);
    }

    private function requestToFixParentChildData(string $brickName, string $brickAttr, string $childType, $csvLogFileHandle, $parentChildUpdateStatusCsvLogFileHandle)
    {
        $c = 0;
        $brickStoreTableName = "object_brick_store_" . $brickName . "_1";
        $brickQueryTableName = "object_brick_query_" . $brickName . "_1";

        // to get the parents for which ( data in the parent is not present ) and ( data in children is present ) 
        // and ( data in the children is equal )
        // Because if the data in the children is eqaual only then we can copy children data to parent
        $fetchChildHasDataParentDoesNotQuery = "
                            SELECT
                                parentBrickTable.o_id parentId,
                                parentBrickTable.$brickAttr parentData,
                                GROUP_CONCAT(DISTINCT childsBrickTable.$brickAttr
                                        SEPARATOR ', ') distinctChildData,
                                GROUP_CONCAT(childsBrickTable.o_id
                                        SEPARATOR ', ') allChildWithData,
                                COUNT(DISTINCT childsBrickTable.$brickAttr) distinctchildDataCount
                            FROM
                                $brickStoreTableName AS childsBrickTable
                                    JOIN
                                object_1 AS childObjectTable ON childsBrickTable.o_id = childObjectTable.o_id
                                    JOIN
                                object_1 AS parentObjectTable ON childObjectTable.o_parentId = parentObjectTable.o_id
                                    JOIN
                                $brickStoreTableName AS parentBrickTable ON parentObjectTable.o_id = parentBrickTable.o_id
                            WHERE
                                parentObjectTable.o_type = 'object'
                                AND (parentBrickTable.$brickAttr IS NULL OR parentBrickTable.$brickAttr = '')
                                AND (childsBrickTable.$brickAttr IS NOT NULL)
                                AND childObjectTable.productType = '$childType'
                            GROUP BY parentBrickTable.o_id
                            HAVING MIN(childsBrickTable.$brickAttr) = MAX(childsBrickTable.$brickAttr)
                ";

        $result = $this->db->fetchAll($fetchChildHasDataParentDoesNotQuery);
        echo PHP_EOL . "Total = " . count($result) . PHP_EOL;

        foreach($result as $childWithDistinctDataRow){
            $parentId = $childWithDistinctDataRow['parentId'];
            $parentData = $childWithDistinctDataRow['parentData'];
            $distinctChildData = $childWithDistinctDataRow['distinctChildData'];
            $allChildWithData = $childWithDistinctDataRow['allChildWithData'];
            $distinctchildDataCount = $childWithDistinctDataRow['distinctchildDataCount'];

            $this->csvLog($csvLogFileHandle, [++$c, $brickName, $brickAttr, $parentId, $parentData, $distinctChildData, $allChildWithData, $distinctchildDataCount, $childType]);
        }


        $parentIds = array_column($result,'parentId');

        $fixDataQuery = "
                    UPDATE $brickStoreTableName AS childsBrickTable
                            JOIN
                        object_1 AS childObjectTable ON childsBrickTable.o_id = childObjectTable.o_id
                            JOIN
                        $brickQueryTableName AS childQueryBrickTable ON childsBrickTable.o_id = childQueryBrickTable.o_id
                            JOIN
                        object_1 AS parentObjectTable ON childObjectTable.o_parentId = parentObjectTable.o_id
                            JOIN
                        $brickStoreTableName AS parentBrickTable ON parentObjectTable.o_id = parentBrickTable.o_id 
                            JOIN
                        $brickQueryTableName AS parentQueryBrickTable ON parentQueryBrickTable.o_id = parentBrickTable.o_id 
                    SET 
                        parentBrickTable.$brickAttr = childsBrickTable.$brickAttr,
                        parentQueryBrickTable.$brickAttr = childQueryBrickTable.$brickAttr,
                        childsBrickTable.$brickAttr = NULL
                    WHERE
                        parentObjectTable.o_type = 'object'
                            AND (parentBrickTable.$brickAttr IS NULL )
                            AND (childsBrickTable.$brickAttr IS NOT NULL)
                            AND childObjectTable.productType = '$childType'
        ";

        $this->db->beginTransaction();
        $success = 'TRUE';
        try{

            if(count($parentIds) > 0){
                $fixDataQuery .=  " AND parentBrickTable.o_id IN (" . implode(",",$parentIds) . ")";

                $affectedRowsQuery = $this->db->exec($fixDataQuery);
            }

            $this->db->commit();
        }catch (\Exception $exception){
            $success = 'FALSE';
            p_r($exception);
            try {
                $this->db->rollBack();
            } catch (\Exception $er) {
                $success = 'ROLLBACK_FAILED';
                // PDO adapter throws exceptions if rollback fails
                p_r($er);
            }
        }

        $this->csvLog($parentChildUpdateStatusCsvLogFileHandle, [$brickName, $brickAttr, $success, $affectedRowsQuery]);

    }


    private function requestToFixBaseFertData(string $brickName, string $brickAttr, string $childType, $csvLogFileHandle, $parentChildUpdateStatusCsvLogFileHandle)
    {
        $c = 0;
        $brickStoreTableName = "object_brick_store_" . $brickName . "_1";
        $brickQueryTableName = "object_brick_query_" . $brickName . "_1";

        // to get the parents for which ( data in the parent is not present ) and ( data in children is present ) 
        // and ( data in the children is equal )
        // Because if the data in the children is eqaual only then we can copy children data to parent
        $fetchFertHasDataBaseDoesNotQuery = "
                            SELECT 
                                baseBrickTable.o_id baseId,
                                baseBrickTable.$brickAttr baseData,
                                GROUP_CONCAT(DISTINCT fertBrickTable.$brickAttr
                                    SEPARATOR ', ') distinctFertData,
                                GROUP_CONCAT(fertBrickTable.o_id
                                    SEPARATOR ', ') allFertWithData,
                                COUNT(DISTINCT fertBrickTable.$brickAttr) distinctFertDataCount
                            FROM
                                $brickStoreTableName AS fertBrickTable
                                    JOIN
                                object_1 AS fertObjectTable ON fertBrickTable.o_id = fertObjectTable.o_id
                                    JOIN
                                object_1 AS skeletonObjectTable ON fertObjectTable.o_parentId = skeletonObjectTable.o_id
                                    JOIN
                                $brickStoreTableName AS skeletonBrickTable ON skeletonObjectTable.o_id = skeletonBrickTable.o_id
                                    JOIN
                                object_1 AS baseObjectTable ON skeletonObjectTable.o_parentId = baseObjectTable.o_id
                                    JOIN
                                $brickStoreTableName as baseBrickTable ON baseObjectTable.o_id = baseBrickTable.o_id
                            WHERE
                                skeletonObjectTable.o_type = 'object'
                                    AND baseObjectTable.o_type = 'object'
                                    AND (fertBrickTable.$brickAttr IS NOT NULL AND fertBrickTable.$brickAttr != ''  )
                                    AND (baseBrickTable.$brickAttr IS NULL || baseBrickTable.$brickAttr = '')
                                    AND fertObjectTable.productType = '$childType'
                            GROUP BY baseBrickTable.o_id
                                HAVING MIN(fertBrickTable.$brickAttr) = MAX(fertBrickTable.$brickAttr)
                ";

        $result = $this->db->fetchAll($fetchFertHasDataBaseDoesNotQuery);
        echo PHP_EOL . "Total = " . count($result) . PHP_EOL;

        foreach($result as $childWithDistinctDataRow){
            $parentId = $childWithDistinctDataRow['baseId'];
            $parentData = $childWithDistinctDataRow['baseData'];
            $distinctChildData = $childWithDistinctDataRow['distinctFertData'];
            $allChildWithData = $childWithDistinctDataRow['allFertWithData'];
            $distinctchildDataCount = $childWithDistinctDataRow['distinctFertDataCount'];

            $this->csvLog($csvLogFileHandle, [++$c, $brickName, $brickAttr, $parentId, $parentData, $distinctChildData, $allChildWithData, $distinctchildDataCount, $childType]);
        }


        $baseIds = array_column($result,'baseId');

        $fixDataQuery = "
                    UPDATE $brickStoreTableName AS fertBrickTable
                            JOIN
                        object_1 AS fertObjectTable ON fertBrickTable.o_id = fertObjectTable.o_id
                            JOIN
                        $brickQueryTableName as fertQueryBrickTable ON fertBrickTable.o_id = fertQueryBrickTable.o_id
                            JOIN
                        object_1 AS skeletonObjectTable ON fertObjectTable.o_parentId = skeletonObjectTable.o_id
                            JOIN
                        $brickStoreTableName AS skeletonBrickTable ON skeletonObjectTable.o_id = skeletonBrickTable.o_id
                            JOIN
                        $brickQueryTableName AS skeletonQueryBrickTable ON skeletonObjectTable.o_id = skeletonQueryBrickTable.o_id
                            JOIN
                        object_1 AS baseObjectTable ON skeletonObjectTable.o_parentId = baseObjectTable.o_id
                            JOIN
                        $brickStoreTableName AS baseBrickTable ON baseObjectTable.o_id = baseBrickTable.o_id 
                            JOIN
                        $brickQueryTableName AS baseQueryBrickTable ON baseQueryBrickTable.o_id = baseBrickTable.o_id 
                    SET 
                        baseBrickTable.$brickAttr = fertBrickTable.$brickAttr,
                        baseQueryBrickTable.$brickAttr = fertQueryBrickTable.$brickAttr,
                        skeletonQueryBrickTable.$brickAttr = fertQueryBrickTable.$brickAttr,
                        skeletonBrickTable.$brickAttr = NULL,
                        fertBrickTable.$brickAttr = NULL
                    WHERE
                        baseObjectTable.o_type = 'object'
                            AND skeletonObjectTable.o_type = 'object'
                            AND (baseBrickTable.$brickAttr IS NULL )
                            AND (fertBrickTable.$brickAttr IS NOT NULL AND fertBrickTable.$brickAttr != '')
                            AND fertObjectTable.productType = '$childType'
        ";

       
        $this->db->beginTransaction();
        $success = 'TRUE';
        try{

            if(count($baseIds) > 0){
                $fixDataQuery .=  " AND baseBrickTable.o_id IN (" . implode(",",$baseIds) . ")";

                $affectedRowsQuery = $this->db->exec($fixDataQuery);
            }

            $this->db->commit();
        }catch (\Exception $exception){
            $success = 'FALSE';
            p_r($exception);
            try {
                $this->db->rollBack();
            } catch (\Exception $er) {
                $success = 'ROLLBACK_FAILED';
                // PDO adapter throws exceptions if rollback fails
                p_r($er);
            }
        }

        $this->csvLog($parentChildUpdateStatusCsvLogFileHandle, [$brickName, $brickAttr, $success, $affectedRowsQuery]);

    }

    private function csvLog($logHandler, array $dataRow)
    {
        $csvDelimiter = ",";
        fputcsv($logHandler, $dataRow, $csvDelimiter);
    }

}