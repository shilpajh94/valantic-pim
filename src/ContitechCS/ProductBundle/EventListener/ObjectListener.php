<?php
/**
 * Pimcore global services
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright Copyright (c) Pimcore global services
 * @license Pimcore global services GPLv3 and PEL
 */

namespace ContitechCS\ProductBundle\EventListener;

use ContitechCS\ProductBundle\Services\AppService;
use ContitechCS\ProductBundle\Services\UnitConverterService;
use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Model\DataObject;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Pimcore\Model\DataObject\ClassDefinition;


class ObjectListener
{

    private $requestStack;

    private $appService;

    private $unitConversionService;

    public function __construct(RequestStack $requestStack,
                                AppService $appService,
                                UnitConverterService $unitConverterService
                                )
    {
        $this->requestStack = $requestStack;
        $this->appService = $appService;
        $this->unitConversionService = $unitConverterService;
    }

    /**
     * handle brick addition or deletion on product based on associated category
     *
     * to get rid of the performance decrease on every product save, we are using the http request
     * to identify whether any of the SIOP relation is changed in the product,if so, only then
     * process the product for brick changes
     *
     * @param DataObjectEvent $event
     */
    public function preUpdate(DataObjectEvent $event)
    {
        $object = $event->getObject();
         
         /**
         * if object save is run through cli then do not perform the brick addition or deletion
         * because in this case the import script is already handling this.
         */

        if (php_sapi_name() != "cli") {
            // to also get the inherited values
            $object->setGetInheritedValues(true);

            if ($object instanceof DataObject\CSProducts) {
                
                $this->completenessPercentage($object);
                $this->checkUniqueProduct($object);

                /**
                 * update the unit conversion attributes
                 */
                $this->updateUnitConversionAttributes($object);

            }
            
        }
    }

    //functionality to get completePercentage & emptyAttributes
    public function completenessPercentage($object)
    { 
        $count = 0;
        $emptyFieldCounter = 0;
        $emptyAttributes='';
        $completedPercentage = 0;
        
    
        $classDefinition = ClassDefinition::getByName($object->getClassName());
        $fieldCount = count($classDefinition->getFieldDefinitions()); //totalFields
        $localizedFields = $classDefinition->getFieldDefinition("localizedfields"); //complete localizedFields
        
        $localizedFieldsAttributes = $localizedFields->getChilds();
        $countOfLocalizedFields = count($localizedFieldsAttributes);         //child of localiziedFields (fieldName and type)
        $totalCount = $fieldCount-1+$countOfLocalizedFields;  //(-1 for locallizedfield)
     
        $langs = \Pimcore\Tool::getValidLanguages();  //available lanaguages loop

        foreach ($langs as $lang) {
            foreach ($classDefinition->getFieldDefinitions() as $field) { 
                $fieldName = $field->getName(); //all fiels Name
                $fieldType = $field->getFieldType(); //all fields type
                if ($fieldType == "localizedfields") {
                    foreach ($classDefinition->getFieldDefinition( $fieldName)->getChilds() as $localizedField) {
                        $localizedFieldName = $localizedField->getName(); //all childs of localizedfieldName
                        $localizedFieldValue = $object->{'get' . ucfirst($localizedFieldName)}($lang); //values in child of localizedfield
                        if (!empty($localizedFieldValue)) {   // if value present so count
                            $count++;
                        } else {
                            $emptyAttributes.= "\n\t ".++$emptyFieldCounter. ") ".$localizedFieldName; //emptychildattributes 
                        }
                    }  
                } else {
                   $fieldValue = $object->{'get' . ucfirst($fieldName)}();   //all fieldValue 
                    if (!empty($fieldValue)) {   
                        $count++;
                    } else {
                        $emptyAttributes.= "\n\t ".++$emptyFieldCounter. ") ".$fieldName; //else mention emptyattributes
                    }
    
                }
            }
            $completedPercentage = ($count/$totalCount)*100;
            $object->setCompletenessPercentage($completedPercentage,$lang);       
            $object->setEmptyFields($emptyAttributes,$lang); 
            $emptyFieldCounter = 0;
            $count = 0;
        }
    }


    // functionality to check if product is already exist or not, if already exists then display an error message saying “Duplicate product name”
    public function checkUniqueProduct($object)
    {  
        $productName =$object->getName();
        $productObjectId =$object->getId();
        if(!empty($productName)) {
            $list = new \Pimcore\Model\DataObject\CSProducts\Listing();
            $list->setCondition("Name = '$productName' AND oo_id != $productObjectId");
            $uniqueProduct=$list->load(); 
            if(!empty($uniqueProduct)) {
                throw new \Exception ("Duplicate product name");
            }
        } 
    }

    /**
     * to update the unit conversion attributes
     *
     * @param DataObject\Product $product
     * @throws \Exception
     */
    private function updateUnitConversionAttributes(DataObject\CSProducts $product)
    {
        $updatedData = $this->getEditedDataFromRequest();
        if(is_array($updatedData)){
            $this->appService->updateUnitConversionAttributes($product, $updatedData);
        }
    }

    /**
     * get the edited data from the current request
     *
     * @return mixed|null
     */
    private function getEditedDataFromRequest()
    {
        $updatedData = null;
        // get the current http request
        $currRequest = $this->requestStack->getCurrentRequest();

        if ($currRequest instanceof Request) {
            $updatedData = $currRequest->get('data');
            if ($updatedData) {
                $updatedData = json_decode($updatedData, true);
            }
        }

        return $updatedData;
    }
}
