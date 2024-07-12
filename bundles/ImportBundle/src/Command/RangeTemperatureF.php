<?php

/**
 * File Path: /home/praganosis/Working/CSV/hosedata.csv (Your File path on system)
 * Command: bin/console conti:onetimeimport:hose /home/praganosis/Working/CSV/hosedata.csv
 * Des: This command will import and enrich PTG data at class, base, skeleton, fert level including bricks too.
 * Just run the above command, it will create all required temp table if it does not exist into system
 * After creation of temp table, it will process the sheet to import and enrich data
 */

namespace ImportBundle\Command;

use Pimcore\Console\AbstractCommand;
use AppBundle\Services\AppService;
use Pimcore\Model\DataObject\Product;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pimcore\Model\DataObject;
use Pimcore\Db;
use Symfony\Component\DependencyInjection\ContainerInterface;

class RangeTemperatureF extends AbstractCommand
{
    private $container;
    private $db;
    private $appService;

    public function __construct(ContainerInterface $container, AppService $appService)
    {
        parent::__construct();
        $this->container = $container;
        $this->appService = $appService;
        $this->db = \Pimcore\Db::get();
    }

    protected function configure()
    {
        $this->setName('conti:RangeTemperatureF')
            ->setDescription('handle Fert rangeTemperatureF field save and publish');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $sql =  "SELECT
                *
                FROM
                (
                SELECT  `oo_id` as id,
                 `minimumTemperatureF` as minimumTemperatureF,
                 `maximumTemperatureF` as maximumTemperatureF,
                 `rangeTemperatureF` as rangeTemperatureF,
                CONCAT(REPLACE(`minimumTemperatureF`, '.000', ''), '°F', ' to ',
                 REPLACE(`maximumTemperatureF`, '.000', ''),'°F') as correctdata
                FROM `object_1`
                WHERE `ProductType` = 'fert'
                OR `ProductType` = 'skeleton'
                    AND `rangeTemperatureF` != 'NULL'
                ) as a
                WHERE correctdata != rangeTemperatureF";

            $record = $this->db->fetchAllAssociative($sql);

            $result = [];
            foreach ($record as $key => $values) {
                $minTempF = $values['minimumTemperatureF'];
                $maxTempF = $values['maximumTemperatureF'];
                $rangeTemperatureF = $values['rangeTemperatureF'];
                $rangCust = explode('to', str_replace('°F', '', $rangeTemperatureF));
                if ($minTempF != $rangCust[0] || $maxTempF != $rangCust[1]) {
                    $result[] = $values['id'];
                }
            }

            p_r(count($result)); //die;
            foreach ($result as $key => $productId) {
                $object = DataObject\Product::getById($productId);
                if (strtoLower($object->getProductType()) == 'skeleton') {
                    p_r('Skeleton ------- ' . $productId);
                    $minTempFBase = $object->getParent()->getMinimumTemperatureF();
                    $maxTempFBase = $object->getParent()->getMaximumTemperatureF();

                    $minTempFSkeleton = $object->getMinimumTemperatureF();
                    $maxTempFSkeleton = $object->getMaximumTemperatureF();

                    if (((string)$minTempFBase == (string)$minTempFSkeleton)
                        && ((string)$maxTempFBase == (string)$maxTempFSkeleton)
                    ) {
                        $object->setRangeTemperatureF(null);
                        $object->setRangeTemperatureC(null);
                        $object->setTemperatureRangeFAndC(null);
                        $object->setPublished(true);
                        $object->save();
                    }
                    else{
                        $this->updateCalcFields($object);
                    }
                } elseif (strtoLower($object->getProductType()) == 'fert') {
                    p_r('Fert ------- ' . $productId);
                    $minTempFFromBase = $object->getParent()->getParent()->getMinimumTemperatureF();
                    $maxTempFFromBase = $object->getParent()->getParent()->getMaximumTemperatureF();
                    $rangeTemperatureF = $object->getParent()->getParent()->getRangeTemperatureF();

                    $minTempFFromBaseC = $object->getParent()->getParent()->getMinimumTemperatureC();
                    $maxTempFFromBaseC = $object->getParent()->getParent()->getMaximumTemperatureC();

                    $rangeTemperatureC = $object->getParent()->getParent()->getRangeTemperatureC();
                    $rangeTemperatureF = $object->getParent()->getParent()->getRangeTemperatureF();
                    $temperatureRangeFAndC = $object->getParent()->getParent()->getTemperatureRangeFAndC();

                    $minTempFFromSkeleton = $object->getParent()->getMinimumTemperatureF();
                    $maxTempFFromSkeleton = $object->getParent()->getMaximumTemperatureF();

                    $minTempFFromFert = $object->getMinimumTemperatureF();
                    $maxTempFFromFert = $object->getMaximumTemperatureF();

                    if (((string)$minTempFFromSkeleton == (string)$minTempFFromFert)
                        && ((string)$maxTempFFromSkeleton == (string)$maxTempFFromFert)
                    ) {
                        $object->setRangeTemperatureF(null);
                        $object->setRangeTemperatureC(null);
                        $object->setTemperatureRangeFAndC(null);
                        $object->setPublished(true);
                        $object->save();
                    } elseif (((string)$minTempFFromBase == (string)$minTempFFromFert)
                        && ((string)$maxTempFFromBase == (string)$maxTempFFromFert)
                    ) {
                        $object->setMinimumTemperatureF($minTempFFromBase);
                        $object->setMaximumTemperatureF($maxTempFFromBase);
                        $object->setMinimumTemperatureC($minTempFFromBaseC);
                        $object->setMaximumTemperatureC($maxTempFFromBaseC);
                        $object->setRangeTemperatureF($rangeTemperatureF);
                        $object->setRangeTemperatureC($rangeTemperatureC);
                        $object->setTemperatureRangeFAndC($temperatureRangeFAndC);
                        $object->setPublished(true);
                        $object->save();
                    } else {
                        $object->setPublished(true);
                        $object->save();
                    }
                }
                // p_r("Executed for this product Id ----- " . $productId);
            }
        } catch (\Exception $e) {
            p_r($e->getMessage());
        }

        return 1;
    }

    public function updateCalcFields(Product $product)
    {
        /**
         * setting temperature range fields
         */
        if($product->getMinimumTemperatureF() !== null && $product->getMaximumTemperatureF() !== null ){
            $tempRangeF = $product->getMinimumTemperatureF() . "°F" .
                            " to " . $product->getMaximumTemperatureF() . "°F";
            $product->setRangeTemperatureF($tempRangeF);
            $product->save();
        }else{
            $product->setRangeTemperatureF(null);
            $product->save();
        }

        if($product->getMinimumTemperatureC() !== null && $product->getMaximumTemperatureC() !== null){
            $tempRangeF = $product->getMinimumTemperatureC() . "°C" .
                            " to " . $product->getMaximumTemperatureC() . "°C";
            $product->setRangeTemperatureC($tempRangeF);
        }else{
            $product->setRangeTemperatureC(null);
        }

        if($product->getRangeTemperatureF() && $product->getRangeTemperatureC()){
            $tempRangeFAndC = strval($product->getRangeTemperatureF()) . " (" .
                strval($product->getRangeTemperatureC()) .")" ;
            $product->setTemperatureRangeFAndC($tempRangeFAndC);
        }else{
            $product->setTemperatureRangeFAndC(null);
        }

        if($product->getFert()){
            /**
             * setting 'Total Weight (lbs) / Packaged Weight' in hose fert
             */
            if( $hoseFert = $product->getFert()->getHoseFert() ){
                $netWeight = $product->getNetWeight();
                $hoseLengthFT = $hoseFert->getHoseLengthFT();

                try{
                    if (!empty($hoseLengthFT) && !empty($netWeight)) {
                        $totalWeightPerPackage = $netWeight * $hoseLengthFT ;
                        $hoseFert->setTotalWeightPerPackage(round($totalWeightPerPackage, 5));
                    } else {
                        $hoseFert->setTotalWeightPerPackage(null);
                    }

                }catch (\Exception $exception){
                    $hoseFert->setTotalWeightPerPackage(null);
                }
            }

            /**
             * setting 'Thrust Wire Nut (Y/N)' in hyd fittings fert
             *
             * Commented this code because we removed thrustwirenut attribute as per client
             */
            // if( $hydFittingFert = $product->getFert()->getHydFittingsFert() ){
            //     $thrustWireComponentNumber = $hydFittingFert->getThrustWireComponentNumber();
            //     if( $thrustWireComponentNumber && trim($thrustWireComponentNumber) !== '' ){
            //         $hydFittingFert->setThrustWireNut(true);
            //     }else{
            //         $hydFittingFert->setThrustWireNut(false);
            //     }
            // }

            /**
             * setting 'Number of teeth' in synchronous fert
             */
            if( $syncFert = $product->getFert()->getSynchronousFert() ){
                $pitchLenghIn = $syncFert->getPitchLengthIN();
                $pitchIN = $syncFert->getPitchIN();

                if($pitchLenghIn === null || $pitchIN === null){
                    $syncFert->setNumberOfTeeth(null);
                }else{
                    try{
                        $numberOfTeeth = $pitchLenghIn / $pitchIN;
                        $syncFert->setNumberOfTeeth(round($numberOfTeeth, 0));
                    }catch (\Exception $exception){
                        $syncFert->setNumberOfTeeth(null);
                    }
                }

            }
        }


    }
}
