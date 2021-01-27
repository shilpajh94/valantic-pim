<?php


namespace ImportBundle\OneTimeImportCommand;


use AppBundle\Lib\UnitConversion\ConverterFactory;
use AppBundle\Lib\UnitConversion\Unit;
use AppBundle\Services\AppService;
use AppBundle\Services\UnitConverterService;
use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * RUN : conti:onetimeimport:update_missed_unit_conversion_attributes
 *
 * Updating following attributes:
 * product class -> Weight_ g/m
 * product class -> Weight_ g/m
 * hose skeleton -> Working Pressure (BAR)
 * inh fitting fert -> Overall Length (mm)
 * inh fitting fert -> Maximum OD (mm)
 *
 * Class UpdateMissedUnitConversionAttributes
 * @package ImportBundle\OneTimeImportCommand
 */
class UpdateMissedUnitConversionAttributes extends AbstractCommand
{
    private $unitConverterService;
    private $appService;
    const LOG_FILE_NAME = "update_missed_unit_conversion_attributes";

    const GROSS_WEIGHT_UNITS = [
        "LB" => Unit::LBS,
        "KG" => Unit::KG,
        "G" => Unit::G
    ];
    const BATCH_SIZE = 100;

    public function __construct(UnitConverterService $unitConverterService,AppService $appService)
    {
        $this->unitConverterService = $unitConverterService;
        $this->appService = $appService;
        parent::__construct();
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $csvLogFilePath = PIMCORE_LOG_DIRECTORY . "/" . self::LOG_FILE_NAME . ".csv";
        $csvLogFileHandle = fopen($csvLogFilePath, "w");
        $this->csvLog($csvLogFileHandle, array(
            "Id",
            "Status",
            "Comment"
        ));

        $productListing = new DataObject\Product\Listing();
        $productListing->setUnpublished(true);
//        $productListing->setCondition("o_id IN (1846678,1846680,1846682,1846684)");

        $productListing->setOrderKey("o_id");
        $productListing->setOrder("ASC");

        $totalCount = $productListing->getTotalCount();
        $updateCount = 0;
        $processedCount = 0;

        $offset = 0;
        $batchIndex = 1;

        while ($offset <= ( $totalCount - 1)) {

            $productListing->setOffset($offset);
            $productListing->setLimit(self::BATCH_SIZE);

            $productListing->load();
            $products = $productListing->getObjects();

            foreach($products as $product){
                $status = "NA";
                $msg = "";

                $productWeightResult = $this->updateProductWeight($product);
                $hoseResult = $this->updateHoseSkeleton($product);
                $inhResult = $this->updateINHFittingFert($product);

                if($inhResult || $hoseResult || $productWeightResult){
                    try {
                        $product->save();
                        $updateCount++;
                        $status = "SUCCESS";
                    }catch (\Exception $exception){
                        $status = "FAILURE";
                        $msg = $exception->getMessage();
                        $this->consoleLog("Product " . $product->getId() . ", Exception: " .  $msg,"ERROR");
                    }

                }
                $processedCount++;

                echo $processedCount . " ";
                if($processedCount % 30 === 0){
                    echo PHP_EOL;
                    if($processedCount % 300 === 0){
                        echo "Last updated product: " . $product->getId();
                        echo PHP_EOL . "Total count --- " . $totalCount . PHP_EOL;
                    }
                }

                $this->csvLog($csvLogFileHandle, array(
                    $product->getId(),
                    $status,
                    $msg
                ));

                unset($product);
            }
            $offset = $offset + self::BATCH_SIZE;
            $batchIndex++;

            unset($products);
            \Pimcore::collectGarbage();
        }

        fclose($csvLogFileHandle);
    }

    private function updateINHFittingFert(DataObject\Product $product)
    {
        $isProductUpdated = false;
        if($product->getFert() && $product->getFert()->getINHFittingsFert()){
            $inhFittingsFert = $product->getFert()->getINHFittingsFert();
            $maxODIN = $inhFittingsFert->getMaximumODIN();
            $this->appService->updateAttributeGroup($inhFittingsFert,'MaximumODIN',$maxODIN);

            $overAllLengthIN = $inhFittingsFert->getOverallLengthInches();
            $this->appService->updateAttributeGroup($inhFittingsFert,'OverallLengthInches',$overAllLengthIN);
            $isProductUpdated = true;
        }
        return $isProductUpdated;
    }

    private function updateHoseSkeleton(DataObject\Product $product)
    {
        $isProductUpdated = false;
        if($product->getSkeleton() && $product->getSkeleton()->getHoseSkeleton()){
            $hoseSkeleton = $product->getSkeleton()->getHoseSkeleton();
            $workingPressurePSI = $hoseSkeleton->getWorkingPressurePSI();
            $this->appService->updateAttributeGroup($hoseSkeleton,'WorkingPressurePSI',$workingPressurePSI);
            $isProductUpdated = true;
        }
        return $isProductUpdated;
    }

    private function updateProductWeight(DataObject\Product $product)
    {
        $isProductUpdated = false;
        $grossWeight = $product->getGrossWeight();
        $grossWeightUnit = $product->getWeightUnit();

        if(
            ($grossWeight === null || is_numeric($grossWeight)) &&
            ($grossWeightUnit !== null && $grossWeightUnit !== "" )
        ){
            if($grossWeight === null){
                $product->setWeightKg(null);
                $product->setWeightg(null);
            }else{
                $sourceUnit = new Unit(self::GROSS_WEIGHT_UNITS[$grossWeightUnit]);
                $converter = ConverterFactory::getConverterByUnit($grossWeight,$sourceUnit);
                $valueInKG = $converter->getValue(new Unit(Unit::KG));
                $valueInG = $converter->getValue(new Unit(Unit::G));

                // rounding off to 5 because that is the expected from unit conversion service
                // can not use unit conversion service functions here because these attributes are
                // not part of the unit conversion config
                $product->setWeightKg(round($valueInKG,5));
                $product->setWeightg(round($valueInG,5));
            }

            $isProductUpdated = true;
        }
        return $isProductUpdated;
    }

    private function consoleLog($message, $level = "INFO")
    {
        echo "[ " . $level . " ] " . $message . PHP_EOL;
    }

    private function csvLog($logHandler, array $dataRow)
    {
        $csvDelimiter = ",";
        fputcsv($logHandler, $dataRow, $csvDelimiter);
    }
}
