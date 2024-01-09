<?php

namespace DistributionHubBundle\Model\DataObject\GridColumnConfig\Operator;

use Pimcore\DataObject\GridColumnConfig\Operator\AbstractOperator;
use Pimcore\DataObject\GridColumnConfig\ResultContainer;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\AbstractObject;
use Symfony\Component\Yaml\Yaml;

class ProductBrickDataOperator extends AbstractOperator
{
    private $attributeName;

    public function __construct(\stdClass $config, $context = null)
    {
        parent::__construct($config, $context);

        $this->attributeName = $config->additionalData;
    }

    public function getLabeledValue($element)
    {

        $originalGetInheritedValues = AbstractObject::doGetInheritedValues();
        AbstractObject::setGetInheritedValues(true);
        $getUnpublishedObjects = DataObject::doHideUnpublished();
        DataObject::setHideUnpublished(false);

        $brickAttributesConfig = Yaml::parseFile(PIMCORE_PROJECT_ROOT . '/bundles/DistributionHubBundle/Resources/config/ifs_ptg_us_brickAttributes.yaml');
        if(array_key_exists($this->attributeName,$brickAttributesConfig)){

            $brickAttributeDetails = $brickAttributesConfig[$this->attributeName];
            $fieldType = $brickAttributeDetails['fieldType'];

            if($fieldType == 'input' || $fieldType == 'wysiwyg' || $fieldType == 'textarea' || $fieldType == 'number' || $fieldType == 'select' || $fieldType == 'booleanselect' || $fieldType == 'date'|| $fieldType == 'checkbox'){
                $data = $this->getDataForRequiredFields($element,$brickAttributeDetails);
            }
            else if($fieldType == 'selectmaster'){
                $data = $this->getDataForSelectMasterFields($element,$brickAttributeDetails);
            }
            else if($fieldType == 'multiselect'){
                $data = $this->getDataForMultiSelectFields($element,$brickAttributeDetails);
            }
            else if($fieldType == 'multiselectmaster'){
                $data = $this->getDataForMultiSelectMasterFields($element,$brickAttributeDetails);
            }
        }
            DataObject::setHideUnpublished($getUnpublishedObjects);
            AbstractObject::setGetInheritedValues($originalGetInheritedValues);

            $result = new ResultContainer();
            $result->setValue($data);
            return $result;

    }

    private function getDataForRequiredFields($element,$brickAttributeDetails){
        $brickLevelGetter   = 'get'.$brickAttributeDetails['brickLevel'];
        $brickNameGetter    = 'get'.$brickAttributeDetails['brickName'];
        $fieldNameGetter    = 'get'.$brickAttributeDetails['fieldName'];
        $brickObj = $element->getMaterial()[0]->$brickLevelGetter()->$brickNameGetter();
        if($brickObj){
            return ($brickObj->$fieldNameGetter());
        }
        return null;
    }

    private function getDataForSelectMasterFields($element,$brickAttributeDetails){
        $brickLevelGetter   = 'get'.$brickAttributeDetails['brickLevel'];
        $brickNameGetter    = 'get'.$brickAttributeDetails['brickName'];
        $fieldNameGetter    = 'get'.$brickAttributeDetails['fieldName'];
        $masterClass        = "\\Pimcore\\Model\\DataObject\\".$brickAttributeDetails['class'];
        $brickObj = $element->getMaterial()[0]->$brickLevelGetter()->$brickNameGetter();
        if($brickObj){
            $product = $brickObj->$fieldNameGetter();
            $masterObj = ($masterClass::getById($product));
            if($masterObj){
                return ($masterObj->getName());
            }
            return null;
        }
    }

    private function getDataForMultiSelectFields($element,$brickAttributeDetails){
        $brickLevelGetter   = 'get'.$brickAttributeDetails['brickLevel'];
        $brickNameGetter    = 'get'.$brickAttributeDetails['brickName'];
        $fieldNameGetter    = 'get'.$brickAttributeDetails['fieldName'];
        $brickObj = $element->getMaterial()[0]->$brickLevelGetter()->$brickNameGetter();
        if($brickObj){
            $product = $brickObj->$fieldNameGetter();
            if(count($product) > 1){
                $data = '';
                foreach($product as $eachProduct){
                    $data = $data. ' | '. $eachProduct ;
                }
            }
            return $data;
        }
        return null;
    }

    private function getDataForMultiSelectMasterFields($element,$brickAttributeDetails){
        $brickLevelGetter   = 'get'.$brickAttributeDetails['brickLevel'];
        $brickNameGetter    = 'get'.$brickAttributeDetails['brickName'];
        $fieldNameGetter    = 'get'.$brickAttributeDetails['fieldName'];
        $masterClass        = "\\Pimcore\\Model\\DataObject\\".$brickAttributeDetails['class'];
        $brickObj = $element->getMaterial()[0]->$brickLevelGetter()->$brickNameGetter();
        if($brickObj){
            $product = $brickObj->$fieldNameGetter();
            if(count($product) > 1){
                $data = '';
                foreach($product as $eachProduct){
                    $masterDataobj = ($masterClass::getById($eachProduct));
                    if($masterDataobj){
                        $name = $masterDataobj->getName();
                        $data = $data. ' | '. $name ;
                    }
                }
                return $data;
            }else{
                $masterDataobj = ($masterClass::getById($product[0]));
                if($masterDataobj){
                    return ($masterDataobj->getName());
                }
            }
        }
        return null;
    }
}
