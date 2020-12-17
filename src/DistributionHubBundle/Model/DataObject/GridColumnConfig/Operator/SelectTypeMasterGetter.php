<?php


namespace DistributionHubBundle\Model\DataObject\GridColumnConfig\Operator;


use DistributionHubBundle\Model\DataObject\GridColumnConfig\Value\CustomDefaultValue;
use Pimcore\DataObject\GridColumnConfig\Operator\AbstractOperator;
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

        $childs = $this->getChilds();

        if (!$childs) {
            return $result;
        } else {
            $c = $childs[0];

            $customDefaultValue = new CustomDefaultValue($c);

            $childResult = $customDefaultValue->getLabeledValue($element);

            $fieldDefinition = $childResult->def;
            $value = $childResult->value;

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
