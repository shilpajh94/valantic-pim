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


class ChildProcessUpdateMissedUnitConversionAttribute extends AbstractCommand
{
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

    public function __construct(UnitConverterService $unitConverterService, AppService $appService)
    {
        $this->unitConverterService = $unitConverterService;
        $this->appService = $appService;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('conti:onetimeimport:child_process_update_missed_unit_conversion_attributes')
            ->addArgument('offset', InputArgument::REQUIRED, 'offset for product listing')
            ->addArgument('limit', InputArgument::REQUIRED, 'limit for product listing')
            ->addArgument('logfile', InputArgument::REQUIRED, 'logfile path');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
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
//        $productListing->setCondition("o_id IN (3833090)");

        $productListing->setOrderKey("o_id");
        $productListing->setOrder("ASC");
        $productListing->setOffset($offset);
        $productListing->setLimit($limit);

        $productListing->load();
        $products = $productListing->getObjects();

        foreach ($products as $product) {
            $status = "NA";
            $msg = "";

            $productWeightResult = $this->updateProductWeight($product);
//            $hoseResult = $this->updateHoseSkeleton($product);
//            $inhResult = $this->updateINHFittingFert($product);
//            $hydFittingFertResult = $this->updateHydFittingFert($product);

            if ($productWeightResult) {
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

    private function updateINHFittingFert(DataObject\Product $product)
    {
        $isProductUpdated = false;
        if ($product->getFert() && $product->getFert()->getINHFittingsFert()) {
            $inhFittingsFert = $product->getFert()->getINHFittingsFert();
            $maxODIN = $inhFittingsFert->getMaximumODIN();
            $this->appService->updateAttributeGroup($inhFittingsFert, 'MaximumODIN', $maxODIN);

            $overAllLengthIN = $inhFittingsFert->getOverallLengthInches();
            $this->appService->updateAttributeGroup($inhFittingsFert, 'OverallLengthInches', $overAllLengthIN);
            $isProductUpdated = true;
        }
        return $isProductUpdated;
    }

    private function updateHydFittingFert(DataObject\Product $product)
    {
        $isProductUpdated = false;

        if($product->getFert() && $product->getFert()->getHydFittingsFert()){
            $hydFittingFert = $product->getFert()->getHydFittingsFert();

            $hex1WrenchSizeIN = $hydFittingFert->getHex1WrenchSizeIN();
            $hex1WrenchSizeMM = $hydFittingFert->getHex1WrenchSizeMM();
            if( ($hex1WrenchSizeIN != null && $hex1WrenchSizeIN != "") && ( $hex1WrenchSizeMM == null || $hex1WrenchSizeMM == "" ) ){
                $this->appService->updateAttributeGroup($hydFittingFert, 'Hex1WrenchSizeIN', $hex1WrenchSizeIN);
            }

            $hex2WrenchSizeIN = $hydFittingFert->getHex2WrenchSizeIN();
            $hex2WrenchSizeMM = $hydFittingFert->getHex2WrenchSizeMM();
            if(  ($hex2WrenchSizeIN != null && $hex2WrenchSizeIN != "") && ( $hex2WrenchSizeMM == null || $hex2WrenchSizeMM == "" ) ){
                $this->appService->updateAttributeGroup($hydFittingFert, 'Hex2WrenchSizeIN', $hex2WrenchSizeIN);
            }
            $isProductUpdated = true;
        }
        return $isProductUpdated;
    }

    private function updateHoseSkeleton(DataObject\Product $product)
    {
        $isProductUpdated = false;
        if ($product->getProductType() === "skeleton" && $product->getSkeleton() && $product->getSkeleton()->getHoseSkeleton()) {
            $hoseSkeleton = $product->getSkeleton()->getHoseSkeleton();
//            $workingPressurePSI = $hoseSkeleton->getWorkingPressurePSI();
//            $this->appService->updateAttributeGroup($hoseSkeleton, 'workingPressurePSI', $workingPressurePSI);

            $tubeGaugeIN = $hoseSkeleton->getTubeGaugeIN();
            $tubeGaugeMM = $hoseSkeleton->getTubeGaugeMM();

            if( ($tubeGaugeIN != null && $tubeGaugeIN != "") && ( $tubeGaugeMM == null || $tubeGaugeMM == "" ) ){
                $this->appService->updateAttributeGroup($hoseSkeleton, 'tubeGaugeIN', $tubeGaugeIN);
                $isProductUpdated = true;
            }

        }
        return $isProductUpdated;
    }

    private function updateProductWeight(DataObject\Product $product)
    {
        $isProductUpdated = false;
        $grossWeight = $product->getGrossWeight();
        $grossWeightUnit = $product->getWeightUnit();

        if (
            ($grossWeight === null || is_numeric($grossWeight)) &&
            ($grossWeightUnit !== null && $grossWeightUnit !== "")
        ) {
            $weightPerLengthConverter = new WeightPerLengthConverter();
            // for example, we are converting from LBSperFT to KGperM, where LBSperFT is the
            // $grossWeightUnit (actually it is KG but per FT is implicit for $grossWeight,this is why a map is maintained)
            if(array_key_exists(self::GROSS_WEIGHT_UNITS[$grossWeightUnit], self::GROSS_WEIGHT_UNIT_TO_WEIGHT_PER_LENGTH_UNIT_MAP)){
                $product->setWeightKg(
                    $weightPerLengthConverter->convert(
                        self::GROSS_WEIGHT_UNIT_TO_WEIGHT_PER_LENGTH_UNIT_MAP[self::GROSS_WEIGHT_UNITS[$grossWeightUnit]],
                        WeightPerLengthConverter::UNIT_KG_PER_M,
                        $grossWeight)
                );

                $product->setWeightg(
                    $weightPerLengthConverter->convert(
                        self::GROSS_WEIGHT_UNIT_TO_WEIGHT_PER_LENGTH_UNIT_MAP[self::GROSS_WEIGHT_UNITS[$grossWeightUnit]],
                    WeightPerLengthConverter::UNIT_G_PER_M,
                    $grossWeight)
                );
            }

            $isProductUpdated = true;
        }
        return $isProductUpdated;
    }

    private function csvLog($logHandler, array $dataRow)
    {
        $csvDelimiter = ",";
        fputcsv($logHandler, $dataRow, $csvDelimiter);
    }

    private function consoleLog($message, $level = "INFO")
    {
        echo "[ " . $level . " ] " . $message . PHP_EOL;
    }

}
