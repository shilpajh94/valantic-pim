<?php

namespace AppBundle\Services;

use Pimcore\Model\DataObject\Product;
use Symfony\Component\HttpFoundation\RequestStack;

class UpdateTemperatureCRangeService
{
    private $db;
    private $requestStack;

    /**
     * UpdateTemperatureCRangeService constructor.
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
        $this->db = \Pimcore\Db::get();
    }

    /**
     * update the calculative logic value fields
     *
     * @param Product $product
     */
    public function getUpdatedTemperatureDataC($product, $updatedData)
    {
        if(isset($updatedData['minimumTemperatureC']) || isset($updatedData['maximumTemperatureC'])){
            $this->updateTemperatureDataWhenBothMinAndMaxTempFHasData($product,$updatedData);
        }
        elseif((array_key_exists('minimumTemperatureC', $updatedData) && array_key_exists('maximumTemperatureC', $updatedData)) && $updatedData['minimumTemperatureC'] == null && $updatedData['maximumTemperatureC'] == null){
            $this->updateTemperatureDataWhenBothMinAndMaxTempFHasNullData($product);
        }
        elseif(array_key_exists('minimumTemperatureC', $updatedData)  && $updatedData['minimumTemperatureC'] == null){
            $this->updateTemperatureDataWhenMaxTempFHasDataAndMinTempFHasNullData($product,$updatedData);
        }
        elseif(array_key_exists('maximumTemperatureC', $updatedData)  && $updatedData['maximumTemperatureC'] == null){
            $this->updateTemperatureDataWhenMinTempFHasDataAndMaxTempFHasNullData($product,$updatedData);
        }
    }
    public function updateTemperatureDataWhenBothMinAndMaxTempFHasData($product,$updatedData){
        $tempRangeF = null;
        $tempRangeC = null;
        $tempRangeFAndC = null;

        if (
            isset($updatedData['minimumTemperatureC'])
            && isset($updatedData['maximumTemperatureC'])
        ) {
            $product->setMinimumTemperatureC($updatedData['minimumTemperatureC']);
            $product->setMaximumTemperatureC($updatedData['maximumTemperatureC']);
            $tempRangeF = $product->getMinimumTemperatureC() . "°C" .
                " to " . $product->getMaximumTemperatureC() . "°C";
        }
        
        elseif (isset($updatedData['maximumTemperatureC'])) {
            $product->setMinimumTemperatureC($product->getMinimumTemperatureC());
            $product->setMaximumTemperatureC($updatedData['maximumTemperatureC']);
            $tempRangeF = $product->getMinimumTemperatureC() . "°C" .
                " to " . $product->getMaximumTemperatureC() . "°C";
        }
        
        elseif (isset($updatedData['minimumTemperatureC'])) {
            $product->setMinimumTemperatureC($updatedData['minimumTemperatureC']);
            $product->setMaximumTemperatureC($product->getMaximumTemperatureC());
            $tempRangeF = $product->getMinimumTemperatureC() . "°C" .
                " to " . $product->getMaximumTemperatureC() . "°C";
        }
        $product->setRangeTemperatureC($tempRangeF);

        if ($product->getMinimumTemperatureF() !== null || $product->getMaximumTemperatureF() !== null) {
            $tempRangeC = $product->getMinimumTemperatureF() . "°F" .
                " to " . $product->getMaximumTemperatureF() . "°F";
            $product->setRangeTemperatureF($tempRangeC);
        }

        if ($product->getRangeTemperatureC() || $product->getRangeTemperatureF()) {
            $tempRangeFAndC = strval($product->getRangeTemperatureC()) . " (" .
                strval($product->getRangeTemperatureF()) . ")";
            $product->setTemperatureRangeFAndC($tempRangeFAndC);
        }

        $product->setMinimumTemperatureF($product->getMinimumTemperatureF());
        $product->setMaximumTemperatureF($product->getMaximumTemperatureF());
        $product->setRangeTemperatureF($tempRangeC);
        $product->setTemperatureRangeFAndC($tempRangeFAndC);
        $product->save();


    }
    public function updateTemperatureDataWhenBothMinAndMaxTempFHasNullData($product){
        $product->setMinimumTemperatureC(null);
        $product->setMaximumTemperatureC(null);
        $product->setRangeTemperatureC(null);
        $product->setMinimumTemperatureF(null);
        $product->setMaximumTemperatureF(null);
        $product->setRangeTemperatureF(null);
        $product->setTemperatureRangeFAndC(null);
        $product->save();


    }
    public function updateTemperatureDataWhenMaxTempFHasDataAndMinTempFHasNullData($product,$updatedData){
        $product->setMinimumTemperatureC($updatedData['minimumTemperatureC']);
        $product->setMaximumTemperatureC($product->getMaximumTemperatureC());
        $tempRangeF = $product->getMinimumTemperatureC() . "°C" .
        " to " . $product->getMaximumTemperatureC() . "°C";

        $product->setRangeTemperatureC($tempRangeF);
        $product->setMinimumTemperatureF($product->getMinimumTemperatureF());
        $product->setMaximumTemperatureF($product->getMaximumTemperatureF());
        $tempRangeC = $product->getMinimumTemperatureF() . "°F" .
        " to " . $product->getMaximumTemperatureF() . "°F";

        $product->setRangeTemperatureF($tempRangeC);

        $tempRangeFAndC = strval($tempRangeF) . " (" .
        strval($tempRangeC) . ")";

        $product->setTemperatureRangeFAndC($tempRangeFAndC);

    }
    public function updateTemperatureDataWhenMinTempFHasDataAndMaxTempFHasNullData($product,$updatedData){
        $product->setMinimumTemperatureC($product->getMinimumTemperatureC());
        $product->setMaximumTemperatureC($updatedData['maximumTemperatureC']);
        $tempRangeF = $product->getMinimumTemperatureC() . "°C" .
        " to " . $product->getMaximumTemperatureC() . "°C";

        $product->setRangeTemperatureC($tempRangeF);
        $product->setMinimumTemperatureF($product->getMinimumTemperatureF());
        $product->setMaximumTemperatureF($product->getMaximumTemperatureF());
        $tempRangeC = $product->getMinimumTemperatureF() . "°F" .
        " to " . $product->getMaximumTemperatureF() . "°F";

        $product->setRangeTemperatureF($tempRangeC);

        $tempRangeFAndC = strval($tempRangeF) . " (" .
        strval($tempRangeC) . ")";

        $product->setTemperatureRangeFAndC($tempRangeFAndC);

    }

}
