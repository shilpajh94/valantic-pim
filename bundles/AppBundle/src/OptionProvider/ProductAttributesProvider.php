<?php
/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 26/2/20
 * Time: 1:13 PM
 */

namespace AppBundle\OptionProvider;

use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\MultiSelectOptionsProviderInterface;

class ProductAttributesProvider implements MultiSelectOptionsProviderInterface
{
    /**
     * @param array $context
     * @param Data $fieldDefinition
     * @return array
     */
    public function getOptions(array $context, Data $fieldDefinition): array
    {
        $attributesToSkip = array("SIOPLevel1","SIOPLevel2","SIOPLevel3","SIOPLevel4","SIOPLevel5","SIOPLevel6","SalesOrgData","Plants","Specification","BrandData","Digit14","Document");
        $this->optionProvider = \Pimcore::getKernel()->getContainer()->get('AppBundle\Services\OptionProviderCacheService');
        $options = array();
        $className = 'Product';
        $allAvailablelArrayCache = $this->optionProvider->getCachedKeyData($className);
        if($allAvailablelArrayCache && !empty($allAvailablelArrayCache))
        {
            $options = $allAvailablelArrayCache;
            unset($allAvailablelArrayCache);
        }
        else
        {

            $classDef = \Pimcore\Model\DataObject\ClassDefinition::getByName("Product");
            $fieldDef = $classDef->getFieldDefinitions();
            foreach($fieldDef as $field){
                if(!in_array($field->getName(),$attributesToSkip)){

                    if($field->getFieldtype() == "localizedfields"){
                        $options = array_merge($options,$this->getLocalizedFieldsOptions($field));

                    }else{
                        $options[] = array("key" => $field->getTitle(),"value" =>  $field->getName() );
                    }
                }
                if(!empty($options))
                {
                    $this->optionProvider->setCachedOptionProviders($className);
                    $this->optionProvider->setAllOptionsInCacheForClass($className, $options);
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
    public function getLocalizedFieldsOptions($localizedFieldDef): array{
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