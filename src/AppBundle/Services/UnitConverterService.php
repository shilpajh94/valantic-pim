<?php

namespace AppBundle\Services;


use AppBundle\Lib\UnitConversion\ConverterFactory;
use AppBundle\Lib\UnitConversion\Unit;

/**
 * responsible to handle the unit conversion requirements according to the attribute_group config
 *
 * Class UnitConverterService
 * @package AppBundle\Services]
 */
class UnitConverterService
{
    /**
     * cache key for attribute to attribute group map
     */
    CONST CACHE_KEY = 'attribute_to_attribute_group_map';

    /**
     * @var ConfigProviderService
     */
    private $configProvider;

    /**
     * UnitConverterService constructor.
     * @param ConfigProviderService $configProviderService
     */
    public function __construct(ConfigProviderService $configProviderService)
    {
        $this->configProvider = $configProviderService;
    }

    /**
     * set all the attribute values which are in the same attribute group as the given attributeName
     *
     * @param $object
     * @param string $attributeName
     * @param float $value
     * @throws \Exception
     */
    public function setGroupValueInObjectByAttribute($object,string $attributeName, float $value)
    {
        $attributeGroupWithValues = $this->getGroupWithValues($attributeName, $value);

        foreach($attributeGroupWithValues as $attributeName => $value){
            $setter = 'set'.ucfirst($attributeName);
            $object->$setter($value);
        }
    }

    /**
     * get the value of all attributes in attribute group in which the given attributeName attribute belongs to
     *
     * @param string $attributeName
     * @param float $value
     * @return array
     * @throws \Exception
     */
    public function getGroupWithValues(string $attributeName,float $value): array
    {
        $returnValue = array();
        $attributeGroupName = $this->getAttributeGroupName($attributeName);

        if(!$attributeGroupName){
            throw new \Exception("Attribute ".$attributeName." is not present in attribute_group configuration.");
        }
        $groupConfig = $this->getGroupConfig($attributeGroupName);
        $unitStringOfGivenAttribute = $groupConfig[$attributeName];

        if(!$unitStringOfGivenAttribute){
            throw new \Exception(("No configuration exist for attribute group ".$attributeGroupName." or attribute ".$attributeName." does not exist in the  attribute group ".$attributeGroupName."."));
        }
        $unitObjectOfGivenAttribute = new Unit($unitStringOfGivenAttribute);
        $converter = ConverterFactory::getConverterByUnit($value, $unitObjectOfGivenAttribute);

        foreach($groupConfig as $attributeName => $attributeUnit){
            $returnValue[$attributeName] = $converter->getValue(new Unit($attributeUnit));
        }

        return $returnValue;
    }

    /**
     * get the name of the attribute group in which the given attribute belongs to
     *
     * this mapping of attribute name to group name is being cached here, so that the complete traversing
     * of the attribute group config will not be needed for the same attribute.
     *
     * @param string $attributeName
     * @return null|string
     */
    private function getAttributeGroupName(string $attributeName): ?string
    {
        $returnValue = null;
        $map = \Pimcore\Cache::load(self::CACHE_KEY);

        if(is_array($map) && array_key_exists($attributeName, $map) ){
            $returnValue = $map[$attributeName];
        }else{
            if(!is_array($map)){
                $map = array();
            }
            $config = $this->configProvider->getUnitConversionConfig();
            foreach($config as $groupName => $groupConfig){
                if(array_key_exists($attributeName, $groupConfig)){
                    $map[$attributeName] = $groupName;
                    $returnValue = $groupName;
                    break;
                }
            }
            \Pimcore\Cache::save($map, self::CACHE_KEY, [], null, 0, true);
        }

        return $returnValue;
    }

    /**
     * get attribute group config of a group
     *
     * @param string $attrubuteGroupName
     * @return array
     */
    private function getGroupConfig(string $attrubuteGroupName): array
    {
        $config = $this->configProvider->getUnitConversionConfig();

        if(array_key_exists($attrubuteGroupName, $config)){
            return $config[$attrubuteGroupName];
        }

        return array();

    }

    /**
     * to remove the cache created for attribute name to attribute group name mapping
     */
    public function clearAttributeToAttributeGroupMapCache()
    {
        \Pimcore\Cache::remove(self::CACHE_KEY);
    }

}