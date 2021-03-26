<?php

namespace ImportBundle\OneTimeImportCommand;

use AppBundle\Lib\UnitConversion\ConverterFactory;
use AppBundle\Lib\UnitConversion\Unit;
use AppBundle\Lib\UnitConversion\WeightPerLengthConverter;
use AppBundle\Services\AppService;
use AppBundle\Services\UnitConverterService;
use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;

class ChildProcessUpdateMissedUnitConversionAttribute extends AbstractCommand {

    private $unitConverterService;
    private $appService;

    const LOG_FILE_NAME = "update_missed_unit_conversion_attributes";
    const GROSS_WEIGHT_UNITS = [
        "LB" => Unit::LBS,
        "KG" => Unit::KG,
        "G" => Unit::G
    ];
    // WeightPerLengthConverter handles conversion only from these source units
    const GROSS_WEIGHT_UNIT_TO_WEIGHT_PER_LENGTH_UNIT_MAP = array(
        Unit::LBS => WeightPerLengthConverter::UNIT_LBS_PER_FT,
        Unit::KG => WeightPerLengthConverter::UNIT_KG_PER_FT,
        Unit::G => WeightPerLengthConverter::UNIT_G_PER_FT
    );

    private $db;

    public function __construct(UnitConverterService $unitConverterService, AppService $appService) {
        $this->unitConverterService = $unitConverterService;
        $this->appService = $appService;
        $this->db = \Pimcore\Db::get();
        parent::__construct();
    }

    protected function configure() {
        $this->setName('conti:onetimeimport:child_process_update_missed_unit_conversion_attributes')
                ->addArgument('offset', InputArgument::REQUIRED, 'offset for product listing')
                ->addArgument('limit', InputArgument::REQUIRED, 'limit for product listing')
                ->addArgument('logfile', InputArgument::REQUIRED, 'logfile path');
    }

    public function execute(InputInterface $input, OutputInterface $output) {

        \Pimcore\Model\Version::disable();
        $offset = $input->getArgument('offset');
        $limit = $input->getArgument('limit');
        $logfile = $input->getArgument('logfile');

        $csvLogFilePath = $logfile;
        $csvLogFileHandle = fopen($csvLogFilePath, "a");
        $this->csvLog($csvLogFileHandle, array(
            "Id",
            "Status",
            "Comment"
        ));

        $updateCount = 0;
        $processedCount = 0;

        $productListing = new DataObject\Product\Listing();
        $productListing->setUnpublished(true);
//        $productListing->setCondition("o_id IN (1851293,1933158,1978560,1851294,1948405)");

        $productListing->setOrderKey("o_id");
        $productListing->setOrder("ASC");
        $productListing->setOffset($offset);
        $productListing->setLimit($limit);

        $productListing->load();
        $products = $productListing->getObjects();
        

        foreach ($products as $product) {
            echo $product->getId();
            echo PHP_EOL;
            $status = "NA";
            $msg = "";

            $productUpdated = false;

            $productUpdated = ($this->updateAccessoriesFert($product) || $productUpdated);
            $productUpdated = ($this->updateHoseFert($product) || $productUpdated);
            $productUpdated = ($this->updateHoseSkeleton($product) || $productUpdated);
            $productUpdated = ($this->updateHydFittingFert($product) || $productUpdated);

            if ($productUpdated) {
                try {
                    $product->save();
                    $updateCount++;
                    $status = "SUCCESS";
                } catch (\Exception $exception) {
                    $status = "FAILURE";
                    $msg = $exception->getMessage();
                    $this->consoleLog("Product " . $product->getId() . ", Exception: " . $msg, "ERROR");
                }
            }
            $processedCount++;

            $this->csvLog($csvLogFileHandle, array(
                $product->getId(),
                $status,
                $msg
            ));
        }
        $this->consoleLog("Last Updated Product " . $product->getId());

        unset($products);
        \Pimcore::collectGarbage();

        fclose($csvLogFileHandle);
    }

    private function updateHoseFert(DataObject\Product $product) {
        $isProductUpdated = false;
        if ($product->getProductType() === "fert" && $product->getFert() && $product->getFert()->getHoseFert()) {
            $hoseFert = $product->getFert()->getHoseFert();

            $isProductUpdated = $this->updateUnitFor2Attributes($hoseFert, 'hoseLengthFT', 'hoseLengthM');
        }
        return $isProductUpdated;
    }

    private function updateAccessoriesFert(DataObject\Product $product) {
        $isProductUpdated = false;
        if ($product->getProductType() === "fert" && $product->getFert() && $product->getFert()->getAccessoriesFert()) {
            $accFert = $product->getFert()->getAccessoriesFert();
            $workingPressurePSI = $accFert->getAccessoriesWorkingPressurePSI();
            $workingPressureBAR = $accFert->getAccessoriesWorkingPressureBAR();
            $workingPressureMPA = $accFert->getAccessoriesWorkingPressureMPA();

            if (
                    $this->isEmpty($workingPressureBAR) &&
                    $this->isEmpty($workingPressureMPA) &&
                    !$this->isEmpty($workingPressurePSI)
            ) {
                $this->appService->updateAttributeGroup($accFert, 'AccessoriesWorkingPressurePSI', $workingPressurePSI);
                $isProductUpdated = true;
            }
        }
        return $isProductUpdated;
    }

    private function updateHydFittingFert(DataObject\Product $product) {
        $isProductUpdated = false;

        if ($product->getProductType() === "fert" && $product->getFert() && $product->getFert()->getHydFittingsFert()) {
            $hydFittingFert = $product->getFert()->getHydFittingsFert();
            // Hex1WrenchSizeIN and Hex2WrenchSizeIN were run befofre

            $isProductUpdated = ( $this->updateUnitFor2Attributes($hydFittingFert, 'Hex1WrenchSizeIN', 'Hex1WrenchSizeMM') || $isProductUpdated );

            $isProductUpdated = ( $this->updateUnitFor2Attributes($hydFittingFert, 'Hex2WrenchSizeIN', 'Hex2WrenchSizeMM') || $isProductUpdated );

            $isProductUpdated = ( $this->updateUnitFor2Attributes($hydFittingFert, 'OverallLengthIN', 'OverallLengthMm') || $isProductUpdated );

            $isProductUpdated = ( $this->updateUnitFor2Attributes($hydFittingFert, 'CutOffLengthIN', 'CutOffLengthMM') || $isProductUpdated );

            $isProductUpdated = ( $this->updateUnitFor2Attributes($hydFittingFert, 'FlangeIDInDec', 'FlangeIDMM') || $isProductUpdated );

            $isProductUpdated = ( $this->updateUnitFor2Attributes($hydFittingFert, 'FlangeODInDec', 'FlangeODMM') || $isProductUpdated );

            $isProductUpdated = ( $this->updateUnitFor2Attributes($hydFittingFert, 'StemHexinchDecimal', 'StemHexMM') || $isProductUpdated );

            $isProductUpdated = ( $this->updateUnitFor2Attributes($hydFittingFert, 'FerruleIDInDec', 'FerruleIDMM') || $isProductUpdated );

            $isProductUpdated = ( $this->updateUnitFor2Attributes($hydFittingFert, 'FerruleODInDec', 'FerruleODMM') || $isProductUpdated );
        }
        return $isProductUpdated;
    }

    private function updateHoseSkeleton(DataObject\Product $product) {
        $isProductUpdated = false;
        
        if ($product->getSkeleton() && $product->getSkeleton()->getHoseSkeleton()) {

            if ($product->getProductType() === "skeleton" || $this->isOrphanFert($product)) {
                $hoseSkeleton = $product->getSkeleton()->getHoseSkeleton();
                // workingPressurePSI and $tubeGaugeIN groups were run before this
                $workingPressurePSI = $hoseSkeleton->getWorkingPressurePSI();
                $workingPressureMPA = $hoseSkeleton->getWorkingPressureMPA();
                $workingPressureBAR = $hoseSkeleton->getWorkingPressureBAR();

                if (
                        !$this->isEmpty($workingPressurePSI) &&
                        ( $this->isEmpty($workingPressureMPA) || $this->isEmpty($workingPressureBAR) )
                ) {
                    $this->appService->updateAttributeGroup($hoseSkeleton, 'workingPressurePSI', $workingPressurePSI);
                    $isProductUpdated = true;
                }

                $isProductUpdated = ( $this->updateUnitFor2Attributes($hoseSkeleton, 'hoseIdDec', 'hoseIdMM') || $isProductUpdated );

                $isProductUpdated = ( $this->updateUnitFor2Attributes($hoseSkeleton, 'hoseOdIn', 'hoseOdmm') || $isProductUpdated );

                $isProductUpdated = ( $this->updateUnitFor2Attributes($hoseSkeleton, 'minBurstPressurePSI', 'minBurstPressurempa') || $isProductUpdated );

                $isProductUpdated = ( $this->updateUnitFor2Attributes($hoseSkeleton, 'BendRadiusIN', 'BendRadiusMM') || $isProductUpdated );
            }
        }
        return $isProductUpdated;
    }

    private function updateUnitFor2Attributes($object, $attr1, $attr2) {
        $isProductUpdated = false;

        $attr1Getter = "get" . ucfirst($attr1);
        $attr2Getter = "get" . ucfirst($attr2);

        $attr1Value = $object->$attr1Getter();
        $attr2Value = $object->$attr2Getter();

        if (!$this->isEmpty($attr1Value) && $this->isEmpty($attr2Value)) {
            $this->appService->updateAttributeGroup($object, $attr1, trim($attr1Value));
            $isProductUpdated = true;
        } elseif ($this->isEmpty($attr1Value) && !$this->isEmpty($attr2Value)) {
            $this->appService->updateAttributeGroup($object, $attr2, trim($attr2Value));
            $isProductUpdated = true;
        }

        return $isProductUpdated;
    }

    private function isOrphanFert(DataObject\Product $product): bool {

        if ($product->getProductType() === 'fert') {

            $productId = $product->getId();
            $sql = "SELECT parent.o_type FROM objects product JOIN objects parent ON product.o_parentId = parent.o_id
                WHERE product.o_id = ?";

            $result = $this->db->fetchOne($sql, $productId);
            if ($result === 'folder')
                return true;
        }
        return false;
    }

    private function isEmpty($value) {
        if ($value === null || trim($value) === "")
            return true;
        return false;
    }

    private function csvLog($logHandler, array $dataRow) {
        $csvDelimiter = ",";
        fputcsv($logHandler, $dataRow, $csvDelimiter);
    }

    private function consoleLog($message, $level = "INFO") {
        echo "[ " . $level . " ] " . $message . PHP_EOL;
    }

    //    private function updateProductWeight(DataObject\Product $product)
//    {
//        $isProductUpdated = false;
//        $grossWeight = $product->getGrossWeight();
//        $grossWeightUnit = $product->getWeightUnit();
//
//        if (
//            ($grossWeight === null || is_numeric($grossWeight)) &&
//            ($grossWeightUnit !== null && $grossWeightUnit !== "")
//        ) {
//            $weightPerLengthConverter = new WeightPerLengthConverter();
//            // for example, we are converting from LBSperFT to KGperM, where LBSperFT is the
//            // $grossWeightUnit (actually it is KG but per FT is implicit for $grossWeight,this is why a map is maintained)
//            if(array_key_exists(self::GROSS_WEIGHT_UNITS[$grossWeightUnit], self::GROSS_WEIGHT_UNIT_TO_WEIGHT_PER_LENGTH_UNIT_MAP)){
//                $product->setWeightKg(
//                    $weightPerLengthConverter->convert(
//                        self::GROSS_WEIGHT_UNIT_TO_WEIGHT_PER_LENGTH_UNIT_MAP[self::GROSS_WEIGHT_UNITS[$grossWeightUnit]],
//                        WeightPerLengthConverter::UNIT_KG_PER_M,
//                        $grossWeight)
//                );
//
//                $product->setWeightg(
//                    $weightPerLengthConverter->convert(
//                        self::GROSS_WEIGHT_UNIT_TO_WEIGHT_PER_LENGTH_UNIT_MAP[self::GROSS_WEIGHT_UNITS[$grossWeightUnit]],
//                    WeightPerLengthConverter::UNIT_G_PER_M,
//                    $grossWeight)
//                );
//            }
//
//            $isProductUpdated = true;
//        }
//        return $isProductUpdated;
//    }
    //    private function updateINHFittingFert(DataObject\Product $product)
//    {
//        $isProductUpdated = false;
//        if ($product->getFert() && $product->getFert()->getINHFittingsFert()) {
//            $inhFittingsFert = $product->getFert()->getINHFittingsFert();
//            $maxODIN = $inhFittingsFert->getMaximumODIN();
//            $this->appService->updateAttributeGroup($inhFittingsFert, 'MaximumODIN', $maxODIN);
//
//            $overAllLengthIN = $inhFittingsFert->getOverallLengthInches();
//            $this->appService->updateAttributeGroup($inhFittingsFert, 'OverallLengthInches', $overAllLengthIN);
//            $isProductUpdated = true;
//        }
//        return $isProductUpdated;
//    }
}
