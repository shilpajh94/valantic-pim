<?php
/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 20/3/20
 * Time: 4:29 PM
 */

namespace AppBundle\OptionProvider;


use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\MultiSelectOptionsProviderInterface;

class OptionProviderForBrickMultiselects implements MultiSelectOptionsProviderInterface
{

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
        $returnValue = array();
        $brickGroupName = $fieldDefinition->getOptionsProviderData();

        // field provider data must have entry for brick group name
        if($brickGroupName){
            $fieldName = $fieldDefinition->getName();
            $masterType = $this->getMasterType($brickGroupName,$fieldName);

            $list = new \Pimcore\Model\DataObject\MultiselectMaster\Listing();
            $list->setCondition(" masterType = :masterType ",["masterType" => $masterType]);
            $list->load();

            foreach($list as $object){
                $key = $object->getName("en");
                $value = $object->getId();

                $returnValue[] = array('key' => $key, 'value' => $value);
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
        return $fieldDefinition->getDefaultValue();
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