<?php
/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 20/3/20
 * Time: 4:29 PM
 */

namespace AppBundle\OptionProvider;

use AppBundle\Services\OptionProviderCacheService;
use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\MultiSelectOptionsProviderInterface;

class OptionProviderForBrickMultiselects implements MultiSelectOptionsProviderInterface
{
    private $optionProvider;

    /**
     * return the multiselect master of a type
     * @param array $context
     * @param Data $fieldDefinition
     * @return array
     * @throws \Exception
     */
    public function getOptions(array $context, Data $fieldDefinition): array
    {
        $this->optionProvider = \Pimcore::getKernel()->getContainer()->get('AppBundle\Services\OptionProviderCacheService');
        $returnValue = array();
        $brickGroupName = $fieldDefinition->getOptionsProviderData();

        // field provider data must have entry for brick group name
        if($brickGroupName){
            $fieldName = $fieldDefinition->getName();
            $masterType = $this->getMasterType($brickGroupName,$fieldName);

            $cacheMasterType = $masterType;
            if($brickGroupName == 'Product Class')
                $cacheMasterType = 'ProductClass~'.$fieldName;

            $allAvailablelArrayCache = $this->optionProvider->getCachedKeyData($cacheMasterType);
            if($allAvailablelArrayCache && !empty($allAvailablelArrayCache))
            {
                $returnValue = $allAvailablelArrayCache;
                unset($allAvailablelArrayCache);
            }
            else
            {
                $list = new \Pimcore\Model\DataObject\MultiselectMaster\Listing();
                $list->setCondition(" masterType = :masterType ",["masterType" => $masterType]);
                $list->load();

                foreach($list as $object){
                    $key = $object->getName("en");
                    $value = $object->getId();

                    $returnValue[] = array('key' => $key, 'value' => $value);
                }

                if(!empty($returnValue))
                {
                    $this->optionProvider->setCachedOptionProviders($cacheMasterType);
                    $this->optionProvider->setAllOptionsInCacheForClass($cacheMasterType, $returnValue);
                }
            }
        }

        return $returnValue;

    }

    public function getMasterType($brickGroupName, $fieldName){
        return $brickGroupName."~".$fieldName;
    }

    /**
     * Returns the value which is defined in the 'Default value' field
     * @param array $context
     * @param Data $fieldDefinition
     * @return mixed
     */
    public function getDefaultValue(array $context, Data $fieldDefinition): ?string
    {
        return true;
    }
    
    /**
     * @param array $context
     * @param Data $fieldDefinition
     * @return bool
     */
    public function hasStaticOptions(array $context, Data $fieldDefinition): bool
    {
        return true;
    }

}
