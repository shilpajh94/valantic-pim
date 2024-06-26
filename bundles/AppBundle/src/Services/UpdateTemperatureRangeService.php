<?php

namespace AppBundle\Services;

use phpDocumentor\Reflection\Types\Self_;
use Pimcore\Logger;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\DataObject\Folder;
use Pimcore\Model\DataObject\Product;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject\Service;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;


class UpdateTemperatureRangeService
{
    /**
     * @var UnitConverterService
     */
    private $unitConverterService;

    /**
     * @var ConfigProviderService
     */
    private $configProviderService;

    private $db;
    private $requestStack;


    /**
     * UpdateTemperatureRangeService constructor.
     * @param UnitConverterService $unitConverterService
     * @param ConfigProviderService $configProviderService
     */
    public function __construct(UnitConverterService $unitConverterService,
     ConfigProviderService $configProviderService, RequestStack $requestStack,
    )
    {
        $this->requestStack = $requestStack;
        $this->unitConverterService = $unitConverterService;
        $this->configProviderService = $configProviderService;
        $this->db = \Pimcore\Db::get();
    }

    /**
     * update the calculative logic value fields
     *
     * @param Product $product
     */
    public function getUpdatedTemperatureData($product, $updatedData)
    { 
        /**
         * setting temperature range fields
         */
        // p_r($product->getProductType());
        if($product->getProductType() == 'base'){
            $minimumTemperatureF = $product->getMinimumTemperatureF();
            $maximumTemperatureF = $product->getMaximumTemperatureF();
            $tempRangeF = $minimumTemperatureF . "°F" .
                " to " . $maximumTemperatureF . "°F";
            $product->setRangeTemperatureF($tempRangeF);
            $product->save();

            foreach ($product->getChildren() as $skeletonObject) {
                if ($skeletonObject instanceof DataObject\Product) {
                    // p_r($skeletonObject->getId());
                    if($skeletonObject->getProductType() == 'skeleton'){
                        // p_r($skeletonObject->getMinimumTemperatureF());
                        // p_r($skeletonObject->getMaximumTemperatureF());

                        AbstractObject::setGetInheritedValues(false);
                        // p_r($skeletonObject->getMinimumTemperatureF());
                        // p_r($skeletonObject->getMaximumTemperatureF());
                        if (
                            $skeletonObject->getMinimumTemperatureF() == null ||
                            $skeletonObject->getMaximumTemperatureF() == null
                        ) {
                            $minimumTemperatureF = $skeletonObject->getMinimumTemperatureF() == null ?
                             $product->getMinimumTemperatureF() : $skeletonObject->getMinimumTemperatureF();
                             
                            $maximumTemperatureF = $skeletonObject->getMaximumTemperatureF() == null ?
                             $product->getMaximumTemperatureF() : $skeletonObject->getMaximumTemperatureF();
    
                           $tempRangeF = $minimumTemperatureF . "°F" . " to " . $maximumTemperatureF . "°F";
                            // p_r($tempRangeF);
                           $skeletonObject->setRangeTemperatureF($tempRangeF);
                        //    p_r($skeletonObject->getRangeTemperatureF());
                           $skeletonObject->setPublished(1);
                           $skeletonObject->save();
                        }
                        // foreach($skeletonObject->getChildren() as $fertObjects){
                        //     if ($fertObjects->getProductType() == 'fert') {
                        //         AbstractObject::setGetInheritedValues(false);
                        //         if (
                        //             $fertObjects->getMinimumTemperatureF() == null ||
                        //             $fertObjects->getMaximumTemperatureF() == null
                        //         ) {
                        //             // For tempRangeF
                        //             $minimumTemperatureF = $fertObjects->getMinimumTemperatureF() == null ?
                        //              ($skeletonObject->getMinimumTemperatureF() != null ?
                        //               $skeletonObject->getMinimumTemperatureF() : $skeletonObject->getParent()->getMinimumTemperatureF()) :
                        //               $fertObjects->getMinimumTemperatureF();
            
                        //             $maximumTemperatureF = $fertObjects->getMaximumTemperatureF() == null ?
                        //             ($skeletonObject->getMaximumTemperatureF() != null ?
                        //              $skeletonObject->getMaximumTemperatureF() : $skeletonObject->getParent()->getMaximumTemperatureF()) :
                        //             $fertObjects->getMaximumTemperatureF();
            
                        //             $tempRangeF = $minimumTemperatureF . "°F" . " to " . $maximumTemperatureF . "°F";
                        //             $fertObjects->setRangeTemperatureF($tempRangeF);
                        //             $fertObjects->save();
                
                        //         }
                        //     }
            
                        // }
                    }
                }
            }
        }
    }

    // public function getUpdatedTemperatureData($product, $updatedData)
    // {
    //     if (isset($updatedData['minimumTemperatureF']) || isset($updatedData['maximumTemperatureF'])){
    //         // p_r($product->getMaximumTemperatureF());
    //         if($product->getMinimumTemperatureF() !== null && $product->getMaximumTemperatureF() !== null ){
    //             $tempRangeF = $product->getMinimumTemperatureF() . "°F" .
    //                             " to " . $product->getMaximumTemperatureF() . "°F";
    //             $product->setRangeTemperatureF($tempRangeF);
    //         }else{
    //             $product->setRangeTemperatureF(null);
    //         }

    //         if($product->getMinimumTemperatureC() !== null && $product->getMaximumTemperatureC() !== null){
    //             $tempRangeF = $product->getMinimumTemperatureC() . "°C" .
    //                             " to " . $product->getMaximumTemperatureC() . "°C";
    //             $product->setRangeTemperatureC($tempRangeF);
    //         }else{
    //             $product->setRangeTemperatureC(null);
    //         }

    //         if($product->getRangeTemperatureF() && $product->getRangeTemperatureC()){
    //             $tempRangeFAndC = strval($product->getRangeTemperatureF()) . " (" .
    //                 strval($product->getRangeTemperatureC()) .")" ;
    //             $product->setTemperatureRangeFAndC($tempRangeFAndC);
    //         }else{
    //             $product->setTemperatureRangeFAndC(null);
    //         }
    //     }
    // }

}
