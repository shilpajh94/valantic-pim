<?php

namespace IFSEU\ImportBundle\Services;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\ClassDefinition;
use Pimcore\Model\DataObject\Folder;
use Pimcore\Model\DataObject\IFSEUProduct;
use Pimcore\Model\DataObject\Service;
use Symfony\Component\DependencyInjection\ContainerInterface;


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

    private $db;
    private $container;

    /**
     * AppService constructor.
     * @param UnitConverterService $unitConverterService
     * @param ConfigProviderService $configProviderService
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->unitConverterService = $this->container->get('ifs_eu_import.unit_conversion_import_service');;
        $this->configProviderService = $this->container->get('ifs_eu_import.config_provider_service');
        $this->db = \Pimcore\Db::get();
    }

    /**
     * @param Product $product
     * @param array $updatedData
     * @throws \Exception
     */
    public function updateUnitConversionAttributes(IFSEUProduct $product, array $updatedData)
    {
        $brickMappingConfig = $this->configProviderService->getBrickMappingConfig()['product_type_to_product_brick_field_mapping'];
        $idInch = $product->getSkeleton()->getIFSEUHoseSkeleton()->getIDInch();
        $wallThicknessInch = $product->getSkeleton()->getIFSEUHoseSkeleton()->getwallThicknessInch();
        $idMM = $product->getSkeleton()->getIFSEUHoseSkeleton()->getIDMM();
        $wallThicknessMM = $product->getSkeleton()->getIFSEUHoseSkeleton()->getwallThicknessMM();
        if(isset($updatedData['Skeleton'][0]['data']['IdInch']))
        {
            $updatedData['Skeleton'][0]['data']['OdIn'] = $updatedData['Skeleton'][0]['data']['IdInch'] + ($wallThicknessInch * 2);
        }else if(isset($updatedData['Skeleton'][0]['data']['wallThicknessInch']))
        {
            $updatedData['Skeleton'][0]['data']['OdIn'] = $idInch + ($updatedData['Skeleton'][0]['data']['wallThicknessInch'] * 2);
        }

        if(isset($updatedData['Skeleton'][0]['data']['IdMM']))
        {
            $updatedData['Skeleton'][0]['data']['Odmm'] = $updatedData['Skeleton'][0]['data']['IdMM'] + ($wallThicknessMM * 2);
        }else if(isset($updatedData['Skeleton'][0]['data']['wallThicknessMM']))
        {
            $updatedData['Skeleton'][0]['data']['Odmm'] = $idMM + ($updatedData['Skeleton'][0]['data']['wallThicknessMM'] * 2);
        }

        if($updatedData)
        {
            $skeletorArr = array(
                'IFSEUHoseSkeleton~IdInch' => 'IdInch',
                'IFSEUHoseSkeleton~IdMM' =>'IdMM',
                'IFSEUHoseSkeleton~wallThicknessInch' => 'wallThicknessInch',
                'IFSEUHoseSkeleton~wallThicknessMM' => 'wallThicknessMM',
                'IFSEUHoseSkeleton~OdIn' => 'OdIn',
                'IFSEUHoseSkeleton~Odmm' => 'Odmm',
                'IFSEUHoseSkeleton~workingPressureBAR' => 'workingPressureBAR',
                'IFSEUHoseSkeleton~workingPressurePSI' => 'workingPressurePSI',
                'IFSEUHoseSkeleton~workingPressureMPA' => 'workingPressureMPA',
                'IFSEUHoseSkeleton~BurstPressurePSI' => 'BurstPressurePSI',
                'IFSEUHoseSkeleton~BurstPressureBar' => 'BurstPressureBar',
                'IFSEUHoseSkeleton~BurstPressurempa' => 'BurstPressurempa',
                'IFSEUHoseSkeleton~VacuumMM' => 'VacuumMM',
                'IFSEUHoseSkeleton~VacuumIN' => 'VacuumIN',
                'IFSEUHoseSkeleton~testPressureBar' => 'testPressureBar',
                'IFSEUHoseSkeleton~testPressurePSI' => 'testPressurePSI',
                'IFSEUHoseSkeleton~BendingRadiusMM' => 'BendingRadiusMM',
                'IFSEUHoseSkeleton~BendingRadiusIN' => 'BendingRadiusIN'
            );

            // $baseArr = array(
            //     'IFSEUHoseBase~hoseIdMM' => 'hoseIdMM',
            //     'IFSEUHoseBase~hoseIdDec' =>'hoseIdDec'
            // );

            $skeletonArrData = array();
            foreach ($updatedData as $key => $value) {
                if(isset($skeletorArr[$key]))
                {
                    $skeletonArrData[$skeletorArr[$key]] = $value;
                }
            }

            $baseArrData = array();
            foreach ($updatedData as $key => $value) {
                if(isset($baseArr[$key]))
                {
                    $baseArrData[$baseArr[$key]] = $value;
                }
            }

            if($baseArrData)
            {
                foreach ($baseArrData as $key => $value) {

                    $brickItem = $product->getBase()->getIFSEUHoseBase();

                    if($value === null){
                        $this->updateAttributeGroup($brickItem, $key, null);
                    }else{
                        
                        $this->updateAttributeGroup($brickItem, $key, floatval($value));
                    }
                }
            }

            if($skeletonArrData)
            {
                if(isset($skeletonArrData['IdInch']))
                {
                    $skeletonArrData['OdIn'] = $skeletonArrData['IdInch'] + ($wallThicknessInch * 2);
                }else if(isset($skeletonArrData['wallThicknessInch']))
                {
                    $skeletonArrData['OdIn'] = $idInch + ($skeletonArrData['wallThicknessInch'] * 2);
                }

                if(isset($skeletonArrData['IdMM']))
                {
                    $skeletonArrData['Odmm'] = $skeletonArrData['IdMM'] + ($wallThicknessMM * 2);
                }else if(isset($skeletonArrData['Skeleton'][0]['data']['wallThicknessMM']))
                {
                    $skeletonArrData['Odmm'] = $idMM + ($skeletonArrData['wallThicknessMM'] * 2);
                }
                
                foreach ($skeletonArrData as $key => $value) {

                    $brickItem = $product->getSkeleton()->getIFSEUHoseSkeleton();

                    if($value === null){
                        $this->updateAttributeGroup($brickItem, $key, null);
                    }else{
                        
                        $this->updateAttributeGroup($brickItem, $key, floatval($value));
                    }
                }
            }
        }

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
            if($attributeValue === null){
                $this->updateAttributeGroup($product, $attributeName, null);
            }else{
                $this->updateAttributeGroup($product, $attributeName, floatval($attributeValue));
            }
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
                        if($brickAttributeValue === null){
                            $this->updateAttributeGroup($brickItem, $brickAttributeName, null);
                        }else{
                            
                            $this->updateAttributeGroup($brickItem, $brickAttributeName, floatval($brickAttributeValue));
                        }
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
    public function updateAttributeGroup($object, string $attributeName, $value)
    {
        if ( (is_numeric($value) || $value === null ) && $this->unitConverterService->isAttributeExistInAttributeToGroupMapCache($attributeName)) {
           
            $this->unitConverterService->setGroupValueInObjectByAttribute($object, $attributeName, $value);
        }
        return $object;
    }

    /**
     * update the calculative logic value fields
     *
     * @param Product $product
     */
    public function updateCalcFields(IFSEUProduct $product)
    {
        /**
         * setting temperature range fields
         */
        if($product->getMinimumTemperatureF() !== null && $product->getMaximumTemperatureF() !== null ){
            $tempRangeF = $product->getMinimumTemperatureF() . "°F" .
                            " to " . $product->getMaximumTemperatureF() . "°F";
            $product->setRangeTemperatureF($tempRangeF);
        }else{
            $product->setRangeTemperatureF(null);
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
    }

    /**
     * @param string $pimcoreClassName
     * @return string|null
     */
    public function getPimcoreClassIdbyName(string $pimcoreClassName): ?string
    {
        $classDef = ClassDefinition::getByName($pimcoreClassName);
        if($classDef){
            return $classDef->getId();
        }
        return null;
    }
}
