<?php

namespace CatalogBundle\OptionProvider;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Pimcore\Model\DataObject;
use Pimcore\Model\Document;
use Pimcore\Model\DataObject\ClassDefinition\DynamicOptionsProvider\SelectOptionsProviderInterface;

class DocumentOptionsProvider implements SelectOptionsProviderInterface {

    /**
     * @param $context array
     * @param $fieldDefinition Data
     * @return array
     */
    public function getOptions($context, $fieldDefinition) {
        $optionsData = [];
     
             
        $documentTypeList = new Document\DocType\Listing(); 
        //$documentTypeList->setCondition('type = "printpage"');
        $docList = $documentTypeList->load();
       
        foreach($docList as $doc)
        {
           
            if($doc instanceof Document\DocType && $doc->getType() == 'printpage')
            {
            $optionsData[] = array ('key' => $doc->getName(),'value' => $doc->getName());
            }
        }
        
      
        return $optionsData;
    }

    /**
     * Returns the value which is defined in the 'Default value' field  
     * @param $context array
     * @param $fieldDefinition Data
     * @return mixed
     */
    public function getDefaultValue($context, $fieldDefinition) {
        return true; //return $fieldDefinition->getDefaultValue();
    }

    /**
     * @param $context array
     * @param $fieldDefinition Data
     * @return bool
     */
    public function hasStaticOptions($context, $fieldDefinition) {
        return true;
    }

}
