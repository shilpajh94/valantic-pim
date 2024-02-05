<?php


namespace DistributionHubBundle\Model\DataObject\GridColumnConfig\Operator;


use DistributionHubBundle\Model\DataObject\GridColumnConfig\Value\CustomDefaultValue;
use Pimcore\DataObject\GridColumnConfig\Operator\AbstractOperator;
use Pimcore\DataObject\GridColumnConfig\Operator\AnyGetter;
use Pimcore\DataObject\GridColumnConfig\Value\DefaultValue;
use Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect;
use Pimcore\Model\DataObject\ClassDefinition\Data\Select;

class SelectTypeMasterGetter extends AbstractOperator
{
    private $multiselectSeparatortextField;

    public function __construct(\stdClass $config, $context = null) {

        $this->multiselectSeparatortextField = $config->multiselectSeparatortextField ?? ",";
        parent::__construct($config, $context);
    }

    public function getLabeledValue($element)
    {
        $result = new \stdClass();
        $result->label = $this->label;

        $childs = $this->getChildren();

        if (!$childs) {
            return $result;
        } else {
            $c = $childs[0];
            $fieldDefinition = null;
            $value = null;

            if($c instanceof DefaultValue){
                $customDefaultValue = new CustomDefaultValue($c);
                $childResult = $customDefaultValue->getLabeledValue($element);
                $value = $childResult->value;
                $fieldDefinition = $childResult->def;
            }elseif ($c instanceof AnyGetter || $c instanceof \DistributionHubBundle\Model\DataObject\GridColumnConfig\Operator\AnyGetter){
                $customDefaultValue = $this->getCustomAnyGetter($c);
                $childResult = $customDefaultValue->getLabeledValue($element);
                $value = $childResult->value[0];
                $fieldDefinition = $childResult->def;
            }

            if($value !== null ){
                if($fieldDefinition instanceof Select){
                    $value = $this->getValueForSelect($fieldDefinition, $value);

                }elseif ($fieldDefinition instanceof Multiselect){
                    $value = $this->getValueForMultiselect($fieldDefinition, $value);

                }
            }

        }
        $result->value = $value;
        return $result;
    }

    private function getCustomAnyGetter(AbstractOperator $anyGetter)
    {
        $config = new \stdClass();

        $refletionObject = new \ReflectionObject($anyGetter);
        $anyGetterProperties = ['label','childs','attribute','param1','isArrayType','forwardAttribute',
            'forwardParam1','returnLastResult'];
        foreach ($anyGetterProperties as $property) {
            $reflectionProperty = $refletionObject->getProperty($property);
            $reflectionProperty->setAccessible(true);
            $config->$property = $reflectionProperty->getValue($anyGetter);
        }
        $reflectionProperty = $refletionObject->getProperty('context');
        $reflectionProperty->setAccessible(true);
        $context = $reflectionProperty->getValue($anyGetter);

        return new CustomAnyGetter($config,$context);
    }

    private function getValueForSelect($fieldDefinition, $value){
        $options = $fieldDefinition->getOptions();

        $key = '';

        if(is_array($options)){
            foreach($options as $option){
                if(strval($option['value']) == strval($value)  ){
                    $key = $option['key'];
                    break;
                }
            }
        }
        return $key;
    }

    private function getValueForMultiselect($fieldDefinition, $values)
    {
        $options = $fieldDefinition->getOptions();
        $keyArray = [];

        if(is_array($options)){
            foreach($values as $value){
                foreach($options as $option){
                    if(strval($option['value']) == strval($value)){
                        $keyArray[] = $option['key'];
                        break;
                    }
                }
            }
        }

        return implode($this->multiselectSeparatortextField,$keyArray);
    }

}
