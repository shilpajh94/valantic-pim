<?php
/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 26/2/20
 * Time: 1:13 PM
 */

namespace AppBundle\OptionProvider;


use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\MultiSelectOptionsProviderInterface;

class ProductAttributesProvider implements MultiSelectOptionsProviderInterface
{

    /**
     * @param array $context
     * @param Data $fieldDefinition
     *
     * @return array
     */
    public function getOptions($context, $fieldDefinition){

        /**
         * @TODO: this is to be mentioned in the config file
         */
        $attributesToSkip = array("SIOPLevel1","SIOPLevel2","SIOPLevel3","SIOPLevel4","SIOPLevel5","SIOPLevel6","SalesOrgData","Plants","Specification","BrandData","Digit14","Document");

        $classDef = \Pimcore\Model\DataObject\ClassDefinition::getByName("Product");
        $fieldDef = $classDef->getFieldDefinitions();
        $options = array();
        foreach($fieldDef as $field){
            if(!in_array($field->getName(),$attributesToSkip)){

                if($field->getFieldtype() == "localizedfields"){
                    $options = array_merge($options,$this->getLocalizedFieldsOptions($field));

                }else{
                    $options[] = array("key" => $field->getTitle(),"value" =>  $field->getName() );
                }
            }
        }
        return $options;
    }

    /**
     * to get attributes of the localized fields
     *
     * @param $localizedFieldDef
     * @return array
     */
    public function getLocalizedFieldsOptions($localizedFieldDef){
        $options = array();
        $children = $localizedFieldDef->getChildren();

        foreach($children as $locChild){
            $options[] = array("key" => $locChild->getTitle(),"value" => $locChild->getName());
        }
        /**
         * just to be able to use the same variable name again :)
         */

        $children = null;
        /**
         * if localized fields are present more than once in the class definition then
         * children of first localized field come in the getChildren
         * and getReferencedFields returns the other localized fields which have child of their own
         */
        if(count($localizedFieldDef->getReferencedFields()) > 0){
            $otherLocFieldDefs = $localizedFieldDef->getReferencedFields();
            foreach($otherLocFieldDefs as $locFieldDef){
                $children  = $locFieldDef->getChildren();
                foreach($children as $field){
                    $options[] = array("key" => $field->getTitle(),"value" => $field->getName());
                }
            }
        }
        return $options;
    }

    /**
     * @param array $context
     * @param Data $fieldDefinition
     *
     * @return bool
     */
    public function hasStaticOptions($context, $fieldDefinition){
        return true;
    }

}