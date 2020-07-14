<?php

namespace AppBundle\Services;

use Pimcore\Logger;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\DataObject\Product;

class AppService
{
    /**
     * @var UnitConverterService
     */
    private $unitConverterService;

    /**
     * @var ConfigProviderService
     */
    private $configProviderService;

    /**
     * AppService constructor.
     * @param UnitConverterService $unitConverterService
     * @param ConfigProviderService $configProviderService
     */
    public function __construct(UnitConverterService $unitConverterService,ConfigProviderService $configProviderService)
    {
        $this->unitConverterService = $unitConverterService;
        $this->configProviderService = $configProviderService;
    }

    /**
     * @param Product $product
     * @param array $updatedData
     * @throws \Exception
     */
    public function updateUnitConversionAttributes(Product $product, array $updatedData)
    {
        $brickMappingConfig = $this->configProviderService->getBrickMappingConfig()['product_type_to_product_brick_field_mapping'];

        // creating brick data in required format and removing it from the update data
        $brickData = array();
        foreach ($brickMappingConfig as $level => $brickFieldNameInProduct) {
            if (array_key_exists($brickFieldNameInProduct, $updatedData)) {
                $brickData[$brickFieldNameInProduct] = $updatedData[$brickFieldNameInProduct];
                // unset the brick data from updated data
                unset($updatedData[$brickFieldNameInProduct]);
            }
        }

        // updated product attributes
        foreach ($updatedData as $attributeName => $attributeValue) {
            $this->updateAttributeGroup($product, $attributeName, floatval($attributeValue));
        }

        // update brick attributes
        // iterating every brick container in product
        foreach ($brickData as $brickFieldNameInProductClass => $brickItems) {
            $getter = 'get' . ucfirst($brickFieldNameInProductClass);
            $brickContainer = $product->$getter();

            // iterating every brick item in the brick collection
            foreach ($brickItems as $brickItem) {
                $brickItemType = $brickItem['type'];
                $brickUpdatedData = $brickItem['data'];
                if (is_array($brickUpdatedData) && count($brickUpdatedData) > 0) {
                    $itemGetter = 'get' . ucfirst($brickItemType);
                    $brickItem = $brickContainer->$itemGetter();

                    // iterating every attribute in the brick item
                    foreach ($brickUpdatedData as $brickAttributeName => $brickAttributeValue) {
                        $this->updateAttributeGroup($brickItem, $brickAttributeName, $brickAttributeValue);
                    }
                }

            }

        }
    }

    /**
     * to update the attribute group for the given attribute
     *
     * @param $object
     * @param string $attributeName
     * @param $value
     * @return mixed
     * @throws \Exception
     */
    private function updateAttributeGroup($object, string $attributeName, $value)
    {
        if ($this->unitConverterService->isAttributeExistInAttributeToGroupMapCache($attributeName)) {
            $this->unitConverterService->setGroupValueInObjectByAttribute($object, $attributeName, $value);
        }
        return $object;
    }

    /**
     * update the calculative logic value fields
     *
     * @param Product $product
     */
    public function updateCalcFields(Product $product)
    {
        /**
         * setting temperature range fields
         */
        if($product->getMinimumTemperatureF() && $product->getMaximumTemperatureF()){
            $tempRangeF = $product->getMinimumTemperatureF() . "°F" .
                            " to " . $product->getMaximumTemperatureF() . "°F";
            $product->setRangeTemperatureF($tempRangeF);
        }

        if($product->getMinimumTemperatureC() && $product->getMaximumTemperatureC()){
            $tempRangeF = $product->getMinimumTemperatureC() . "°C" .
                            " to " . $product->getMaximumTemperatureC() . "°C";
            $product->setRangeTemperatureC($tempRangeF);
        }

        if($product->getRangeTemperatureF() && $product->getRangeTemperatureC()){
            $tempRangeFAndC = strval($product->getRangeTemperatureF()) . " (" .
                strval($product->getRangeTemperatureC()) .")" ;
            $product->setTemperatureRangeFAndC($tempRangeFAndC);
        }

        /**
         * setting 'Total Weight (lbs) / Packaged Weight' in hose fert
         */
        if($product->getFert() && ($hoseFert = $product->getFert()->getHoseFert()) ){
            $netWeight = $product->getNetWeight();
            $hoseLengthFT = $hoseFert->getHoseLengthFT();

            try{
                $totalWeightPerPackage = $netWeight / $hoseLengthFT ;
                $hoseFert->setTotalWeightPerPackage(round($totalWeightPerPackage, 5));
            }catch (\Exception $exception){
                $hoseFert->setTotalWeightPerPackage(null);
            }
        }

        /**
         * setting 'Thrust Wire Nut (Y/N)' in hyd fittings fert
         */
        if($product->getFert() && ($hydFittingFert = $product->getFert()->getHydFittingsFert()) ){
           $thrustWireComponentNumber = $hydFittingFert->getThrustWireComponentNumber();
           if( $thrustWireComponentNumber && trim($thrustWireComponentNumber) !== '' ){
               $hydFittingFert->setThrustWireNut(true);
           }else{
               $hydFittingFert->setThrustWireNut(false);
           }
        }

        /**
         * setting 'Number of teeth' in synchronous fert
         */
        if($product->getFert() && ($syncFert = $product->getFert()->getSynchronousFert()) ){
            $pitchLenghIn = $syncFert->getPitchLengthIN();
            $pitchIN = $syncFert->getPitchIN();

            try{
                $numberOfTeeth = $pitchLenghIn / $pitchIN;
                $syncFert->setNumberOfTeeth(round($numberOfTeeth, 5));
            }catch (\Exception $exception){
                $syncFert->setNumberOfTeeth(null);
            }
        }

    }

    /**
     * create logic for "Return Flag (Y/N) =If stock indicator is S, flag is Yes else NO"
     * and update the product table
     *
     * @param int $productId
     */
    public function updateProductReturnFlag(int $productId)
    {
        $db = \Pimcore\Db::get();
        $plantMaterialMasterClassId = $this->getPimcoreClassIdbyName('PlantMaterialMaster');

        if($plantMaterialMasterClassId){
            $plantMaterialMasterTableName = "object_".$plantMaterialMasterClassId;
            $productClassId = $this->getPimcoreClassIdbyName('Product');
            $productQueryTable = "object_query_".$productClassId;
            $productStoreTable = "object_store_".$productClassId;

            $query = "SELECT COUNT(*) FROM ".$plantMaterialMasterTableName;
            $query .= " WHERE Material = :productId AND StockIndicator = 'S'";

            $db->beginTransaction();

            try {
                $result = $db->fetchOne($query, array('productId' => ",".$productId.","));
                $newReturnFlagValue = null;
                if(0 === (int)$result ){
                    $newReturnFlagValue = 0;
                }else{
                    $newReturnFlagValue = 1;
                }

                $data = array('returnFlag' => $newReturnFlagValue);
                $identifier = array('oo_id' => $productId);
                $type = array('returnFlag' => \PDO::PARAM_INT,'oo_id' => \PDO::PARAM_INT);

                /**
                 * update product table for returnFlag
                 */
                $db->update($productQueryTable,$data,$identifier,$type);
                $db->update($productStoreTable,$data,$identifier,$type);

                $db->commit();
            }catch (\Exception $exception){
                Logger::error($exception);
                try {
                    $db->rollBack();
                } catch (\Exception $er) {
                    // PDO adapter throws exceptions if rollback fails
                    Logger::error($er);
                }
            }
        }
    }

    /**
     * @param string $pimcoreClassName
     * @return string|null
     */
    private function getPimcoreClassIdbyName(string $pimcoreClassName): ?string
    {
        $classDef = ClassDefinition::getByName($pimcoreClassName);
        if($classDef){
            return $classDef->getId();
        }
        return null;
    }

}
