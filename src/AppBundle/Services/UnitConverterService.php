<?php
/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 13/4/20
 * Time: 12:28 PM
 */

namespace AppBundle\Services;


use AppBundle\Lib\UnitConversion\ConverterFactory;
use AppBundle\Lib\UnitConversion\Unit;


class UnitConverterService
{
    private $configProvider;

    public function __construct(ConfigProviderService $configProviderService)
    {
        $this->configProvider = $configProviderService;
    }

    public function setGroupValueInObjectByAttribute($object,string $attributeName, float $value)
    {
        $attributeGroupWithValues = $this->getGroupWithValues($attributeName, $value);

        foreach($attributeGroupWithValues as $attributeName => $value){
            $setter = 'set'.ucfirst($attributeName);
            $object->$setter($value);
        }
    }

    private function getGroupWithValues(string $attributeName,float $value): array
    {
        $returnValue = array();
        $attributeGroupName = $this->getAttributeGroupName($attributeName);
        $groupConfig = $this->getGroupConfig($attributeGroupName);

        $unitStringOfGivenAttribute = $groupConfig[$attributeName];
        $unitObjectOfGivenAttribute = new Unit($unitStringOfGivenAttribute);

        $converter = ConverterFactory::getConverterByUnit($value, $unitObjectOfGivenAttribute);

        foreach($groupConfig as $attributeName => $attributeUnit){
            $returnValue[$attributeGroupName] = $converter->getValue(new Unit($attributeUnit));
        }

        return $returnValue;

    }

    /**
     * @TODO: implement caching here
     *
     * @param string $attributeName
     * @return null|string
     */
    private function getAttributeGroupName(string $attributeName): ?string
    {
        $returnValue = null;
        $config = $this->configProvider->getUnitConversionConfig();

        foreach($config as $groupName => $groupConfig){

            if(array_key_exists($attributeName, $groupConfig)){
                $returnValue = $groupName;
                break;
            }
        }

        return $returnValue;
    }

    private function getGroupConfig(string $attrubuteGroupName): array
    {
        $config = $this->configProvider->getUnitConversionConfig();

        if(array_key_exists($attrubuteGroupName, $config)){
            return $config[$attrubuteGroupName];
        }

        return array();

    }

}