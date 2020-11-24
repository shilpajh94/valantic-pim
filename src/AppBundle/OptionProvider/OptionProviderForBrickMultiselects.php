<?php
/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 20/3/20
 * Time: 4:29 PM
 */

namespace AppBundle\OptionProvider;

use AppBundle\Services\OptionProviderCacheService;
use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\MultiSelectOptionsProviderInterface;

class OptionProviderForBrickMultiselects implements MultiSelectOptionsProviderInterface
{
    private $optionProvider;

    /**
     *
     * return the multiselect master of a type
     *
     * @param array $context
     * @param \Pimcore\Model\DataObject\ClassDefinition\Data $fieldDefinition
     * @return array
     * @throws \Exception
     */
    public function getOptions($context, $fieldDefinition)
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
            
            $isAvailable = $this->optionProvider->isCacheAvailableForClass($cacheMasterType);
            // echo $cacheMasterType." = " .$isAvailable."\n";
            if(!$isAvailable)
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
            else
            {
                $returnValue = $this->optionProvider->getCachedKeyData($cacheMasterType);
            }
        }

        return $returnValue;

    }

    public function getMasterType($brickGroupName, $fieldName){
        //TODO: place this separator in a config file
        return $brickGroupName."~".$fieldName;
    }

    /**
     * @param array $context
     * @param Data $fieldDefinition
     *
     * @return bool
     */
    public function hasStaticOptions($context, $fieldDefinition)
    {
        return true; //return $fieldDefinition->getDefaultValue();
    }

    /**
     * @param array $context
     * @param Data $fieldDefinition
     *
     * @return mixed
     */
    public function getDefaultValue($context, $fieldDefinition)
    {
        return true;
    }

}