<?php

namespace AppBundle\Command\DataInheritanceFixes;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * This script is created for one time execution to fix the issue where the data from parent is not 
 * getting inherited by the children.
 * Reason for this is that the children are keeping their own data for few attributes, because of this
 * inheritance is not working.
 * 
 * This script is removing the data from child if data for that attribute is present in parent.
 */
class ClearChildBrickDataWhenParentHasDataCommand extends Command
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

    const LOG_FILE_PREFIX = "EXECUTION_";
    const LOG_FILE_NAME_PARENT_CHILD = "clear_child_brick_data_when_parent_has_data_log";
    const LOG_FILE_NAME_BASE_FERT = "clear_fert_brick_data_when_base_has_data_log";
    const CHILD_ATTRIBUTE_UPDATE_LOG_FILE_NAME = "updated_children_log";
    const LOG_FILE_NAME_ZERO_VALUE = "clear_child_data_when_parent_and_child_have_zero_log";

    public function __construct(string $name = null)
    {
        $this->db = \Pimcore\Db::get();
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('contitech:clear_child_brick_data_when_parent_has_data');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->fixChildDataWhenParentHasData();

        $this->fixFertDataWhenBaseHasData();

        $this->fixChildDataWhenParentAndChildHaveZero();
    }

    private function fixChildDataWhenParentHasData()
    {
        $this->requestToClearData("HoseSkeleton", self::HoseSkeleton_BRICK_ATTRIBUTES, 'fert',self::LOG_FILE_NAME_PARENT_CHILD, 'clearChildBrickDataWhenParentHasData' );

        $this->requestToClearData("PTGSkeleton",self::PTGSkeleton_BRICK_ATTRIBUTES,'fert',self::LOG_FILE_NAME_PARENT_CHILD, 'clearChildBrickDataWhenParentHasData');

        $this->requestToClearData("HoseBase",self::HoseBase_BRICK_ATTRIBUTES,'fert',self::LOG_FILE_NAME_PARENT_CHILD, 'clearChildBrickDataWhenParentHasData');

        $this->requestToClearData("HoseBase",self::HoseBase_BRICK_ATTRIBUTES,'skeleton',self::LOG_FILE_NAME_PARENT_CHILD, 'clearChildBrickDataWhenParentHasData');

        $this->requestToClearData("PTGBase",self::PTGBase_BRICK_ATTRIBUTES,'fert',self::LOG_FILE_NAME_PARENT_CHILD, 'clearChildBrickDataWhenParentHasData');

        $this->requestToClearData("PTGBase",self::PTGBase_BRICK_ATTRIBUTES,'skeleton',self::LOG_FILE_NAME_PARENT_CHILD, 'clearChildBrickDataWhenParentHasData');
    }

    private function fixFertDataWhenBaseHasData()
    {
        $this->requestToClearData("HoseBase",self::HoseBase_BRICK_ATTRIBUTES,'fert',self::LOG_FILE_NAME_BASE_FERT, 'clearFertBrickDataWhenBaseHasData');

        $this->requestToClearData("PTGBase",self::PTGBase_BRICK_ATTRIBUTES,'fert',self::LOG_FILE_NAME_BASE_FERT, 'clearFertBrickDataWhenBaseHasData');
    }

    private function fixChildDataWhenParentAndChildHaveZero()
    {
        $this->requestToClearData("HoseSkeleton",self::HoseSkeleton_NUMERIC_BRICK_ATTRIBUTES,'fert',self::LOG_FILE_NAME_ZERO_VALUE, 'clearChildZeroDataWhenParentHasZeroData');
        $this->requestToClearData("PTGSkeleton",self::PTGSkeleton_NUMERIC_BRICK_ATTRIBUTES,'fert',self::LOG_FILE_NAME_ZERO_VALUE, 'clearChildZeroDataWhenParentHasZeroData');

        $this->requestToClearData("HoseBase",self::HoseBase_NUMERIC_BRICK_ATTRIBUTES,'fert',self::LOG_FILE_NAME_ZERO_VALUE, 'clearChildZeroDataWhenParentHasZeroData');
        $this->requestToClearData("HoseBase",self::HoseBase_NUMERIC_BRICK_ATTRIBUTES,'skeleton',self::LOG_FILE_NAME_ZERO_VALUE, 'clearChildZeroDataWhenParentHasZeroData');
    }

    private function requestToClearData(string $brickName, array $brickAttr, string $childType, string $logFileName, string $functionName)
    {
        echo $logFileName . "---------------------------------\n";

        $logFileName = self::LOG_FILE_PREFIX . $logFileName;
        $csvLogFilePath = PIMCORE_LOG_DIRECTORY . "/" . $logFileName . ".csv";
        $csvLogFileHandle = fopen($csvLogFilePath, "a");

        foreach ($brickAttr as $attr) {
            $this->$functionName($brickName, $attr, $childType, $csvLogFileHandle);
        }
        
        fclose($csvLogFileHandle);
    }

    private function clearChildBrickDataWhenParentHasData(string $brickName, string $attr, string $childType, $csvLogFileHandle)
    {
        p_r($brickName);
        p_r($attr);
        $storebrickTableName = "object_brick_store_" . $brickName . "_1";
        $querybrickTableName = "object_brick_query_" . $brickName . "_1";


        $recordsToBeUpdatedQuery = "
                            SELECT 
                                childsBrickTable.o_id childId,
                                parentBrickTable.o_id parentId,
                                childsBrickTable.$attr childData,
                                parentBrickTable.$attr parentData
                            FROM 
                                $storebrickTableName AS childsBrickTable
                                    JOIN
                                object_1 AS childObjectTable ON childsBrickTable.o_id = childObjectTable.o_id
                                    JOIN
                                object_1 AS parentObjectTable ON childObjectTable.o_parentId = parentObjectTable.o_id
                                    JOIN
                                $storebrickTableName AS parentBrickTable ON parentObjectTable.o_id = parentBrickTable.o_id
                            WHERE
                                parentObjectTable.o_type = 'object'
                                AND (parentBrickTable.$attr IS NOT NULL)
                                AND (parentBrickTable.$attr != '')
                                AND childObjectTable.productType = '$childType'
        ";

        // if parent has data
            // clear data from child store table
        
        $clearDataFromChildStoreTableWhenParentHasDataQuery = "
                            UPDATE 
                                $storebrickTableName AS childsBrickTable
                                    JOIN
                                object_1 AS childObjectTable ON childsBrickTable.o_id = childObjectTable.o_id
                                    JOIN
                                object_1 AS parentObjectTable ON childObjectTable.o_parentId = parentObjectTable.o_id
                                    JOIN
                                $storebrickTableName AS parentBrickTable ON parentObjectTable.o_id = parentBrickTable.o_id
                            SET childsBrickTable.$attr = NULL
                            WHERE
                                parentObjectTable.o_type = 'object'
                                    AND (parentBrickTable.$attr IS NOT NULL)
                                    AND (parentBrickTable.$attr != '')
                                    AND childObjectTable.productType = '$childType'
        ";



            // update child query table set data equal to parent query table data
        $setChildQueryTableDataEqualToParentQueryTableDataQuery = "
                            UPDATE 
                                $querybrickTableName AS childsBrickTable
                                    JOIN
                                object_1 AS childObjectTable ON childsBrickTable.o_id = childObjectTable.o_id
                                    JOIN
                                object_1 AS parentObjectTable ON childObjectTable.o_parentId = parentObjectTable.o_id
                                    JOIN
                                $querybrickTableName AS parentBrickTable ON parentObjectTable.o_id = parentBrickTable.o_id
                                    JOIN
                                $storebrickTableName AS parentStoreBrickTable ON parentStoreBrickTable.o_id = parentBrickTable.o_id
                            SET childsBrickTable.$attr = parentBrickTable.$attr
                            WHERE
                                parentObjectTable.o_type = 'object'
                                    AND (parentStoreBrickTable.$attr IS NOT NULL)
                                    AND (parentStoreBrickTable.$attr != '')
                                    AND childObjectTable.productType = '$childType'

        ";


        $this->db->beginTransaction();
        $success = 'TRUE';
        try{
            $rowsToBeAffected = $this->db->fetchAllAssociative($recordsToBeUpdatedQuery);

            $childIds = array_column($rowsToBeAffected, "childId");
            if(count($childIds) > 0){
                $clearDataFromChildStoreTableWhenParentHasDataQuery .=  " AND childsBrickTable.o_id IN (" . implode(",",$childIds) . ")";
                $setChildQueryTableDataEqualToParentQueryTableDataQuery .= " AND childsBrickTable.o_id IN (" . implode(",",$childIds) . ")";

                $affectedRowsForStoreTableQuery = $this->db->exec($clearDataFromChildStoreTableWhenParentHasDataQuery);
                $affectedRowsForQueryTableQuery = $this->db->exec($setChildQueryTableDataEqualToParentQueryTableDataQuery);
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

        $this->csvLog($csvLogFileHandle, [$brickName, $attr, $success, count($rowsToBeAffected), $affectedRowsForStoreTableQuery, $affectedRowsForQueryTableQuery]);
    }

    private function clearFertBrickDataWhenBaseHasData(string $brickName, string $attr, string $childType, $csvLogFileHandle)
    {
        p_r($brickName);
        p_r($attr);
        $storebrickTableName = "object_brick_store_" . $brickName . "_1";
        $querybrickTableName = "object_brick_query_" . $brickName . "_1";

        $fetchBaseHasDataRegardlessOfFertQuery = "
                    SELECT
                        fertBrickTable.o_id fertId,
                        baseBrickTable.o_id baseId,
                        fertBrickTable.$attr fertData,
                        baseBrickTable.$attr baseData
                    FROM
                        $storebrickTableName AS fertBrickTable
                            JOIN
                        object_1 AS fertObjectTable ON fertBrickTable.o_id = fertObjectTable.o_id
                            JOIN
                        object_1 AS skeletonObjectTable ON fertObjectTable.o_parentId = skeletonObjectTable.o_id
                            JOIN
                        $storebrickTableName AS skeletonBrickTable ON skeletonObjectTable.o_id = skeletonBrickTable.o_id
                            JOIN
                        object_1 AS baseObjectTable ON skeletonObjectTable.o_parentId = baseObjectTable.o_id
                            JOIN
                        $storebrickTableName as baseBrickTable ON baseObjectTable.o_id = baseBrickTable.o_id
                    WHERE
                        skeletonObjectTable.o_type = 'object'
                        AND baseObjectTable.o_type = 'object'
                        AND (baseBrickTable.$attr IS NOT NULL)
                        AND (baseBrickTable.$attr != '')
                        AND fertObjectTable.productType = '$childType'
                    ";

        // if base has data
            // clear data from fert store table


        $clearDataFromFertStoreWhenBaseHasDataQuery = "
                    UPDATE
                        $storebrickTableName AS fertBrickTable
                            JOIN
                        object_1 AS fertObjectTable ON fertBrickTable.o_id = fertObjectTable.o_id
                            JOIN
                        object_1 AS skeletonObjectTable ON fertObjectTable.o_parentId = skeletonObjectTable.o_id
                            JOIN
                        $storebrickTableName AS skeletonBrickTable ON skeletonObjectTable.o_id = skeletonBrickTable.o_id
                            JOIN
                        object_1 AS baseObjectTable ON skeletonObjectTable.o_parentId = baseObjectTable.o_id
                            JOIN
                        $storebrickTableName as baseBrickTable ON baseObjectTable.o_id = baseBrickTable.o_id
                    SET fertBrickTable.$attr = NULL
                    WHERE
                        skeletonObjectTable.o_type = 'object'
                        AND baseObjectTable.o_type = 'object'
                        AND (baseBrickTable.$attr IS NOT NULL)
                        AND (baseBrickTable.$attr != '')
                        AND fertObjectTable.productType = '$childType'
                    ";


        // update fert query table set data equal to base query table data

        $setFertQueryTableDataEqualToBaseQueryTableDataQuery = "
        
                    UPDATE
                        $querybrickTableName AS fertBrickTable
                            JOIN
                        object_1 AS fertObjectTable ON fertBrickTable.o_id = fertObjectTable.o_id
                            JOIN
                        object_1 AS skeletonObjectTable ON fertObjectTable.o_parentId = skeletonObjectTable.o_id
                            JOIN
                        $querybrickTableName AS skeletonBrickTable ON skeletonObjectTable.o_id = skeletonBrickTable.o_id
                            JOIN
                        object_1 AS baseObjectTable ON skeletonObjectTable.o_parentId = baseObjectTable.o_id
                            JOIN
                        $querybrickTableName as baseBrickTable ON baseObjectTable.o_id = baseBrickTable.o_id
                    SET fertBrickTable.$attr = baseBrickTable.$attr
                    WHERE
                        skeletonObjectTable.o_type = 'object'
                        AND baseObjectTable.o_type = 'object'
                        AND (baseBrickTable.$attr IS NOT NULL)
                        AND (baseBrickTable.$attr != '')
                        AND fertObjectTable.productType = '$childType'
         ";


    
        
        $this->db->beginTransaction();
        $success = 'TRUE';
        try{
            $rowsToBeAffected = $this->db->fetchAllAssociative($fetchBaseHasDataRegardlessOfFertQuery);

            $fertIds = array_column($rowsToBeAffected, "fertId");
            if(count($fertIds) > 0){
                $clearDataFromFertStoreWhenBaseHasDataQuery .=  " AND fertBrickTable.o_id IN (" . implode(",",$fertIds) . ")";
                $setFertQueryTableDataEqualToBaseQueryTableDataQuery .= " AND fertBrickTable.o_id IN (" . implode(",",$fertIds) . ")";

                $affectedRowsForStoreTableQuery = $this->db->exec($clearDataFromFertStoreWhenBaseHasDataQuery);
                $affectedRowsForQueryTableQuery = $this->db->exec($setFertQueryTableDataEqualToBaseQueryTableDataQuery);
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

        $this->csvLog($csvLogFileHandle, [$brickName, $attr, $success, count($rowsToBeAffected), $affectedRowsForStoreTableQuery, $affectedRowsForQueryTableQuery]);
    }


    private function clearChildZeroDataWhenParentHasZeroData(string $brickName, string $attr, string $childType, $csvLogFileHandle)
    {
        p_r($brickName);
        p_r($attr);
        $storebrickTableName = "object_brick_store_" . $brickName . "_1";
        $querybrickTableName = "object_brick_query_" . $brickName . "_1";


        $recordsToBeUpdatedQuery = "
                            SELECT 
                                childsBrickTable.o_id childId,
                                parentBrickTable.o_id parentId,
                                childsBrickTable.$attr childData,
                                parentBrickTable.$attr parentData
                            FROM 
                                $storebrickTableName AS childsBrickTable
                                    JOIN
                                object_1 AS childObjectTable ON childsBrickTable.o_id = childObjectTable.o_id
                                    JOIN
                                object_1 AS parentObjectTable ON childObjectTable.o_parentId = parentObjectTable.o_id
                                    JOIN
                                $storebrickTableName AS parentBrickTable ON parentObjectTable.o_id = parentBrickTable.o_id
                            WHERE
                                parentObjectTable.o_type = 'object'
                                AND (parentBrickTable.$attr IS NOT NULL)
                                AND (parentBrickTable.$attr = 0)
                                AND (childsBrickTable.$attr IS NOT NULL)
                                AND (childsBrickTable.$attr = 0)
                                AND childObjectTable.productType = '$childType'
        ";

        // if parent has data
            // clear data from child store table
        
        $clearDataFromChildStoreTableWhenParentHasDataQuery = "
                            UPDATE 
                                $storebrickTableName AS childsBrickTable
                                    JOIN
                                object_1 AS childObjectTable ON childsBrickTable.o_id = childObjectTable.o_id
                                    JOIN
                                $querybrickTableName AS childQueryBrickTable ON childsBrickTable.o_id = childQueryBrickTable.o_id
                                    JOIN
                                object_1 AS parentObjectTable ON childObjectTable.o_parentId = parentObjectTable.o_id
                                    JOIN
                                $storebrickTableName AS parentBrickTable ON parentObjectTable.o_id = parentBrickTable.o_id
                            SET childsBrickTable.$attr = NULL, 
                                childQueryBrickTable.$attr = parentBrickTable.$attr
                            WHERE
                                parentObjectTable.o_type = 'object'
                                AND (parentBrickTable.$attr IS NOT NULL)
                                AND (parentBrickTable.$attr = 0)
                                AND (childsBrickTable.$attr IS NOT NULL)
                                AND (childsBrickTable.$attr = 0)
                                AND childObjectTable.productType = '$childType'
        ";


        $this->db->beginTransaction();
        $success = 'TRUE';
        try{
            $rowsToBeAffected = $this->db->fetchAllAssociative($recordsToBeUpdatedQuery);

            $childIds = array_column($rowsToBeAffected, "childId");
            if(count($childIds) > 0){
                $clearDataFromChildStoreTableWhenParentHasDataQuery .=  " AND childsBrickTable.o_id IN (" . implode(",",$childIds) . ")";
                // $setChildQueryTableDataEqualToParentQueryTableDataQuery .= " AND childsBrickTable.o_id IN (" . implode(",",$childIds) . ")";

                $affectedRowsForStoreTableQuery = $this->db->exec($clearDataFromChildStoreTableWhenParentHasDataQuery);
                // $affectedRowsForQueryTableQuery = $this->db->exec($setChildQueryTableDataEqualToParentQueryTableDataQuery);
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

        $this->csvLog($csvLogFileHandle, [$brickName, $attr, $success, count($rowsToBeAffected), $affectedRowsForStoreTableQuery, isset($affectedRowsForQueryTableQuery) ? $affectedRowsForQueryTableQuery : NULL]);
    }

    private function csvLog($logHandler, array $dataRow)
    {
        $csvDelimiter = ",";
        fputcsv($logHandler, $dataRow, $csvDelimiter);
    }
}