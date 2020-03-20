<?php
/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 20/3/20
 * Time: 9:16 AM
 */

namespace AppBundle\OptionProvider;


use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;

use Pimcore\Model\DataObject;

class BrickMultiselectProvider implements SelectOptionsProviderInterface
{

    /**
     * @param array $context
     * @param Data $fieldDefinition
     *
     * @return array
     */
    public function getOptions($context, $fieldDefinition)
    {

        $list = new DataObject\Objectbrick\Definition\Listing();
        $list = $list->load();

        $returnValue = array();


        foreach($list as $brickDef){
            $brickGroup = $brickDef->getGroup();

            $fieldDefs = $brickDef->getFieldDefinitions();

            foreach($fieldDefs as $fieldName => $field){
                if($field->getFieldtype() == "multiselect"){
                    $key = $brickGroup." >> ".$field->getTitle();
                    $value = $brickGroup."~".$field->getName();
                    $returnValue[] = array('key' => $key,'value' => $value);
                }
            }

        }
        return $returnValue;

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