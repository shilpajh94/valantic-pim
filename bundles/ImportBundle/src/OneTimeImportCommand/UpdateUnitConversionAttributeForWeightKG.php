<?php

namespace ImportBundle\OneTimeImportCommand;

use AppBundle\Lib\UnitConversion\Unit;
use AppBundle\Lib\UnitConversion\WeightPerLengthConverter;
use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;


class UpdateUnitConversionAttributeForWeightKG extends AbstractCommand
{
    const GROSS_WEIGHT_UNITS = [
        "LB" => Unit::LBS,
        "KG" => Unit::KG,
        "G" => Unit::G
    ];

    /*  WeightPerLengthConverter handles conversion only from these source units
        As per client (Mark) we are assuming the if Weight unit = KG, we will consider it as KG_PER_M
        and if Weight unit = LB, we will consider it as LBS_PER_FT
    */
    const GROSS_WEIGHT_UNIT_TO_WEIGHT_PER_LENGTH_UNIT_MAP = array(
        Unit::LBS => WeightPerLengthConverter::UNIT_LBS_PER_FT,
        Unit::KG => WeightPerLengthConverter::UNIT_KG_PER_M,
        Unit::G => WeightPerLengthConverter::UNIT_G_PER_FT
    );

    const LOG_FILE_NAME = "Unit_Conversion_For_Kg_log";

    public function execute(InputInterface $input, OutputInterface $output)
    {
        //\Pimcore\Model\Version::disable();

        $productListing = new DataObject\Product\Listing();
        $productListing->setUnpublished(true);

        $productListing->setOrderKey("id");
        $productListing->setOrder("ASC");
        $productListing->setCondition("weightUnit LIKE ?", "KG");
        $productListing->load();
        $products = $productListing->getObjects();
        foreach ($products as $product) {

            $productWeightResult = $this->updateProductWeight($product);
            if ($productWeightResult) {
                try {
                    $product->save();
                } catch (\Exception $exception) {
                    $msg = $exception->getMessage();
                    $this->consoleLog("Product " . $product->getId() . ", Exception: " . $msg, "ERROR");
                }
            }
        }
        unset($products);
        \Pimcore::collectGarbage();
    }

    private function updateProductWeight(DataObject\Product $product) : float
    {
        $isProductUpdated = false;
        $grossWeight = $product->getGrossWeight();
        $weightUnit = $product->getWeightUnit();
        
        if (
            (is_numeric($grossWeight)) && ($weightUnit !== null && $weightUnit !== "")) {

            $weightPerLengthConverter = new WeightPerLengthConverter();
            
            if(array_key_exists(self::GROSS_WEIGHT_UNITS[$weightUnit], self::GROSS_WEIGHT_UNIT_TO_WEIGHT_PER_LENGTH_UNIT_MAP)){
                // No need to convert the value if LBS is given in UNIT
                if(self::GROSS_WEIGHT_UNITS[$weightUnit] == "LBS"){
                    $product->setWeightLbsPerFTUOM($grossWeight);
                } else {
                    $product->setWeightLbsPerFTUOM(
                        $weightPerLengthConverter->convert(
                            self::GROSS_WEIGHT_UNIT_TO_WEIGHT_PER_LENGTH_UNIT_MAP[self::GROSS_WEIGHT_UNITS[$weightUnit]],
                            WeightPerLengthConverter::UNIT_LBS_PER_FT,
                            $grossWeight)
                    );
                }


                $product->setWeightKg(
                    $weightPerLengthConverter->convert(
                        self::GROSS_WEIGHT_UNIT_TO_WEIGHT_PER_LENGTH_UNIT_MAP[self::GROSS_WEIGHT_UNITS[$weightUnit]],
                        WeightPerLengthConverter::UNIT_KG_PER_M,
                        $grossWeight)
                    );

                $product->setWeightg(
                    $weightPerLengthConverter->convert(
                        self::GROSS_WEIGHT_UNIT_TO_WEIGHT_PER_LENGTH_UNIT_MAP[self::GROSS_WEIGHT_UNITS[$weightUnit]],
                    WeightPerLengthConverter::UNIT_G_PER_M,
                    $grossWeight)
                );
                $isProductUpdated = true;
            }
        }
        return $isProductUpdated;
    }

    private function consoleLog($message, $level = "INFO")
    {
        echo "[ " . $level . " ] " . $message . PHP_EOL;
    }
}
