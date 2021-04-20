<?php

namespace ImportBundle\OneTimeImportCommand;

use AppBundle\Lib\UnitConversion\Unit;
use AppBundle\Lib\UnitConversion\WeightPerLengthConverter;
use AppBundle\Services\AppService;
use AppBundle\Services\UnitConverterService;
use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;


class ChildProcessUpdateMissedUnitConversionAttributeWeightLBSPerFTUOM extends AbstractCommand
{
    private $appService;
    const LOG_FILE_NAME = "update_missed_unit_conversion_attributes_wightlbsperftuom";

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
        $this->setName('conti:onetimeimport:child_process_update_missed_unit_conversion_attributes_weightlbsperftuom')
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
            
            // As per client we are assuming the GROSS_WEIGHT_UNITS = FT
            if(array_key_exists(self::GROSS_WEIGHT_UNITS[$grossWeightUnit], self::GROSS_WEIGHT_UNIT_TO_WEIGHT_PER_LENGTH_UNIT_MAP)){
                // No need to convert the value if LBS is given in UNIT
                if(self::GROSS_WEIGHT_UNITS[$grossWeightUnit] == "LBS"){
                    $product->setWeightLbsPerFTUOM($grossWeight);
                } else {
                    $product->setWeightLbsPerFTUOM(
                        $weightPerLengthConverter->convert(
                            self::GROSS_WEIGHT_UNIT_TO_WEIGHT_PER_LENGTH_UNIT_MAP[self::GROSS_WEIGHT_UNITS[$grossWeightUnit]],
                            WeightPerLengthConverter::UNIT_LBS_PER_FT,
                            $grossWeight)
                    );
                }
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
