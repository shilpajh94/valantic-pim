<?php


namespace AppBundle\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ClearChildBrickDataWhenEqualToParentCommand extends Command
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
        'HoseFittingFamily'
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
    ];

    const PTGBase_BRICK_ATTRIBUTES = [
        'material',
        'PTGApplications'
    ];

    private $db;

    const LOG_FILE_NAME = "clear_child_brick_data_when_equal_to_parent";

    public function __construct(string $name = null)
    {
        $this->db = \Pimcore\Db::get();
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('contitech:clear_child_brick_data_when_equal_to_parent');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->requestToClearData("HoseSkeleton", self::HoseSkeleton_BRICK_ATTRIBUTES, 'fert');

        $this->requestToClearData("PTGSkeleton",self::PTGSkeleton_BRICK_ATTRIBUTES,'fert');

        $this->requestToClearData("HoseBase",self::HoseBase_BRICK_ATTRIBUTES,'fert');

        $this->requestToClearData("HoseBase",self::HoseBase_BRICK_ATTRIBUTES,'skeleton');

        $this->requestToClearData("PTGBase",self::PTGBase_BRICK_ATTRIBUTES,'fert');

        $this->requestToClearData("PTGBase",self::PTGBase_BRICK_ATTRIBUTES,'skeleton');

    }

    private function requestToClearData(string $brickName, array $brickAttr, string $childType)
    {

        foreach ($brickAttr as $attr) {
            $logFileName = $brickName . "--" . $attr . "--" . $childType . "--" . self::LOG_FILE_NAME;
            $csvLogFilePath = PIMCORE_LOG_DIRECTORY . "/" . $logFileName . ".csv";
            $csvLogFileHandle = fopen($csvLogFilePath, "w");
            $this->csvLog($csvLogFileHandle, array(
                "#",
                "Brick Name",
                "Attribute Name",
                "Child Id",
                "Parent Id",
                "Child Data",
                "Parent Data",
                "Child Type",
                "Update Status"
            ));
            $this->clearEqualChildData($brickName, $attr, $childType, $csvLogFileHandle);
            fclose($csvLogFileHandle);
        }
    }

    private function clearEqualChildData(string $brickName, string $attr, string $childType, $csvLogFileHandle)
    {
        $c = 0;
        $brickTableName = "object_brick_store_" . $brickName . "_1";

        p_r($brickName);
        p_r($attr);

        $fetchChildParentEqualDataQuery = "
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
                                AND childsBrickTable.$attr IS NOT NULL
                                AND (childsBrickTable.$attr = parentBrickTable.$attr)
                                AND childObjectTable.productType = '$childType'
                ";

        $fetchChildParentEqualDataQueryResult = $this->db->fetchAll($fetchChildParentEqualDataQuery);
        echo PHP_EOL . "Total = " . count($fetchChildParentEqualDataQueryResult) . PHP_EOL;

        foreach ($fetchChildParentEqualDataQueryResult as $item) {
            $childId = $item['childId'];
            $parentId = $item['parentId'];
            $childData = $item['childData'];
            $parentData = $item['parentData'];

            $updateQuery = "UPDATE $brickTableName SET $attr = null WHERE o_id = $childId";
            $response = $this->db->executeUpdate($updateQuery);

            $this->csvLog($csvLogFileHandle, [++$c, $brickName, $attr, $childId, $parentId, $childData, $parentData, $childType, $response]);

        }

    }

    private function csvLog($logHandler, array $dataRow)
    {
        $csvDelimiter = ",";
        fputcsv($logHandler, $dataRow, $csvDelimiter);
    }

}
