<?php

namespace AppBundle\Services;

use Pimcore\Model\DataObject\Product;
use Symfony\Component\HttpFoundation\RequestStack;

class UpdateTemperatureRangeService
{
    private $db;
    private $requestStack;

    /**
     * UpdateTemperatureRangeService constructor.
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
    public function getUpdatedTemperatureData($product, $updatedData)
    {
        if(isset($updatedData['minimumTemperatureF']) || isset($updatedData['maximumTemperatureF'])){
            $this->updateTemperatureDataWhenBothMinAndMaxTempFHasData($product,$updatedData);
    
        }
        elseif((array_key_exists('minimumTemperatureF', $updatedData) && array_key_exists('maximumTemperatureF', $updatedData)) && $updatedData['minimumTemperatureF'] == null && $updatedData['maximumTemperatureF'] == null){
            $this->updateTemperatureDataWhenBothMinAndMaxTempFHasNullData($product);
        }
        elseif(array_key_exists('minimumTemperatureF', $updatedData)  && $updatedData['minimumTemperatureF'] == null){
            $this->updateTemperatureDataWhenMaxTempFHasDataAndMinTempFHasNullData($product,$updatedData);
        }
        elseif(array_key_exists('maximumTemperatureF', $updatedData)  && $updatedData['maximumTemperatureF'] == null){
            $this->updateTemperatureDataWhenMinTempFHasDataAndMaxTempFHasNullData($product,$updatedData);
        }

    }

        public function updateTemperatureDataWhenBothMinAndMaxTempFHasData($product,$updatedData){
            $tempRangeF = null;
            $tempRangeC = null;
            $tempRangeFAndC = null;
    
            if (
                isset($updatedData['minimumTemperatureF'])
                && isset($updatedData['maximumTemperatureF'])
            ) {
                $product->setMinimumTemperatureF($updatedData['minimumTemperatureF']);
                $product->setMaximumTemperatureF($updatedData['maximumTemperatureF']);
                $tempRangeF = $product->getMinimumTemperatureF() . "°F" .
                    " to " . $product->getMaximumTemperatureF() . "°F";
            } 
            
            elseif (isset($updatedData['maximumTemperatureF'])) {
                $product->setMinimumTemperatureF($product->getMinimumTemperatureF());
                $product->setMaximumTemperatureF($updatedData['maximumTemperatureF']);
                $tempRangeF = $product->getMinimumTemperatureF() . "°F" .
                    " to " . $product->getMaximumTemperatureF() . "°F";
            } 
            
            elseif (isset($updatedData['minimumTemperatureF'])) {
                $product->setMinimumTemperatureF($updatedData['minimumTemperatureF']);
                $product->setMaximumTemperatureF($product->getMaximumTemperatureF());
                $tempRangeF = $product->getMinimumTemperatureF() . "°F" .
                    " to " . $product->getMaximumTemperatureF() . "°F";
            }
            $product->setRangeTemperatureF($tempRangeF);
    
            if ($product->getMinimumTemperatureC() !== null && $product->getMaximumTemperatureC() !== null) {
                $tempRangeC = $product->getMinimumTemperatureC() . "°C" .
                    " to " . $product->getMaximumTemperatureC() . "°C";
                $product->setRangeTemperatureC($tempRangeC);
            }
    
            if ($product->getRangeTemperatureF() && $product->getRangeTemperatureC()) {
                $tempRangeFAndC = strval($product->getRangeTemperatureF()) . " (" .
                    strval($product->getRangeTemperatureC()) . ")";
                $product->setTemperatureRangeFAndC($tempRangeFAndC);
            }
    
            $product->setMinimumTemperatureC($product->getMinimumTemperatureC());
            $product->setMaximumTemperatureC($product->getMaximumTemperatureC());
            $product->setRangeTemperatureC($tempRangeC);
            $product->setTemperatureRangeFAndC($tempRangeFAndC);
            $product->save();

    
        }
        public function updateTemperatureDataWhenBothMinAndMaxTempFHasNullData($product){
            $product->setMinimumTemperatureF(null);
            $product->setMaximumTemperatureF(null);
            $product->setRangeTemperatureF(null);
            $product->setMinimumTemperatureC(null);
            $product->setMaximumTemperatureC(null);
            $product->setRangeTemperatureC(null);
            $product->setTemperatureRangeFAndC(null);
            $product->save();


        }
        public function updateTemperatureDataWhenMaxTempFHasDataAndMinTempFHasNullData($product,$updatedData){
            $product->setMinimumTemperatureF($updatedData['minimumTemperatureF']);
            $product->setMaximumTemperatureF($product->getMaximumTemperatureF());
            $tempRangeF = $product->getMinimumTemperatureF() . "°F" .
            " to " . $product->getMaximumTemperatureF() . "°F";

            $product->setRangeTemperatureF($tempRangeF);
            $product->setMinimumTemperatureC($product->getMinimumTemperatureC());
            $product->setMaximumTemperatureC($product->getMaximumTemperatureC());
            $tempRangeC = $product->getMinimumTemperatureC() . "°C" .
            " to " . $product->getMaximumTemperatureC() . "°C";

            $product->setRangeTemperatureC($tempRangeC);

            $tempRangeFAndC = strval($tempRangeF) . " (" .
            strval($tempRangeC) . ")";

            $product->setTemperatureRangeFAndC($tempRangeFAndC);

        }
        public function updateTemperatureDataWhenMinTempFHasDataAndMaxTempFHasNullData($product,$updatedData){
            $product->setMinimumTemperatureF($product->getMinimumTemperatureF());
            $product->setMaximumTemperatureF($updatedData['maximumTemperatureF']);
            $tempRangeF = $product->getMinimumTemperatureF() . "°F" .
            " to " . $product->getMaximumTemperatureF() . "°F";

            $product->setRangeTemperatureF($tempRangeF);
            $product->setMinimumTemperatureC($product->getMinimumTemperatureC());
            $product->setMaximumTemperatureC($product->getMaximumTemperatureC());
            $tempRangeC = $product->getMinimumTemperatureC() . "°C" .
            " to " . $product->getMaximumTemperatureC() . "°C";

            $product->setRangeTemperatureC($tempRangeC);

            $tempRangeFAndC = strval($tempRangeF) . " (" .
            strval($tempRangeC) . ")";

            $product->setTemperatureRangeFAndC($tempRangeFAndC);

        }

}
