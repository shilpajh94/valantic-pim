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

class MultiselectMasterTypeProvider implements SelectOptionsProviderInterface
{

    /**
     * return all the multiselect fields in the all the bricks
     * this is being used in multiselect master to select the master type
     *
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
                if ($field->getFieldtype() == "multiselect" || $field->getFieldtype() == "select") {
                    $key = $brickGroup." >> ".$field->getTitle();
                    $value = $brickGroup."~".$field->getName();
                    $returnValue[] = array('key' => $key,'value' => $value);
                }
            }

        }
        $classList = DataObject\ClassDefinition::getByName("Product");
        $fieldDefs = $classList->getFieldDefinitions();
        foreach($fieldDefs as $fieldName => $field){
            if ($field->getFieldtype() == "multiselect") {
                $key = "Product Class"." >> ".$field->getTitle();
                $value = "ProductClass"."~".$field->getName();
                $returnValue[] = array('key' => $key,'value' => $value);
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
        return true; //$fieldDefinition->getDefaultValue();
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
