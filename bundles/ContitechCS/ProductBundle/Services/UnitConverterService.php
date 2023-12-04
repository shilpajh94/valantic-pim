<?php

namespace ContitechCS\ProductBundle\Services;


use ContitechCS\ProductBundle\Lib\UnitConversion\ConverterFactory;
use ContitechCS\ProductBundle\Lib\UnitConversion\Unit;

/**
 * responsible to handle the unit conversion requirements according to the attribute_group config
 *
 * Class UnitConverterService
 * @package ContitechCS\ProductBundle\Services]
 */
class UnitConverterService
{
    /**
     * cache key for attribute to attribute group map
     */
    const CACHE_KEY = 'cs_attribute_to_attribute_group_map';

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
    public function setGroupValueInObjectByAttribute($object,string $attributeName,?float $value)
    {
        $attributeGroupWithValues = $this->getGroupWithValues($attributeName, $value);

        foreach($attributeGroupWithValues as $attributeName => $value){
            $setter = 'set'.ucfirst($attributeName);

            if($value !== null){
                $value = round($value, 5);
            }

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
    public function getGroupWithValues(string $attributeName,?float $value): array
    {
        $returnValue = array();
        $attributeGroupName = $this->getAttributeGroupName($attributeName);

        if(!$attributeGroupName){
            throw new \Exception("Attribute ".$attributeName." is not present in attribute_group configuration.");
        }
        $groupConfig = $this->getGroupConfig($attributeGroupName);
        $unitStringOfGivenAttribute = $groupConfig[$attributeName];

        if(!$unitStringOfGivenAttribute){
            throw new \Exception(("No configuration exist for attribute group ".$attributeGroupName.
                " or attribute ".$attributeName." does not exist in the  attribute group ".$attributeGroupName."."));
        }
        $unitObjectOfGivenAttribute = new Unit($unitStringOfGivenAttribute);

        if($value === null){
            foreach($groupConfig as $attributeName => $attributeUnit){
                $returnValue[$attributeName] = null;
            }
        }else{
            $converter = ConverterFactory::getConverterByUnit($value, $unitObjectOfGivenAttribute);

            foreach($groupConfig as $attributeName => $attributeUnit){
                $returnValue[$attributeName] = $converter->getValue(new Unit($attributeUnit));
            }
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

        if( $map === false ){
            $this->createAttributeToGroupMapCache();
            $map = \Pimcore\Cache::load(self::CACHE_KEY);
        }

        if(is_array($map) && array_key_exists($attributeName, $map) ){
            $returnValue = $map[$attributeName];
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
     * @param string $attributeName
     * @return bool
     */
    public function isAttributeExistInAttributeToGroupMapCache(string $attributeName): bool
    {
        return $this->getAttributeGroupName($attributeName)? true : false;
    }

    /**
     * create attribute name to attribute group name mapping cache
     *
     * @throws \Exception
     */
    public function createAttributeToGroupMapCache()
    {
        $map = array();

        $config = $this->configProvider->getUnitConversionConfig();
        if(is_array($config)){
            foreach($config as $groupName => $groupConfig){
                foreach($groupConfig as $attributeName => $attributeUnit){
                    $map[$attributeName] = $groupName;
                }
            }
            \Pimcore\Cache::save($map, self::CACHE_KEY, [], null, 0, true);

        }else{
            throw new \Exception("Unit conversion config not found");
        }
    }

    /**
     * to remove the cache created for attribute name to attribute group name mapping
     */
    public function clearAttributeToGroupMapCache()
    {
        \Pimcore\Cache::remove(self::CACHE_KEY);
    }

}
