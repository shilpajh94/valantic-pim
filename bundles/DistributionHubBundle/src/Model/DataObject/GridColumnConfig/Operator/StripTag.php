<?php

namespace DistributionHubBundle\Model\DataObject\GridColumnConfig\Operator;

use Pimcore\Bundle\AdminBundle\DataObject\GridColumnConfig\Operator\AbstractOperator;
use DistributionHubBundle\Model\DataObject\GridColumnConfig\Value\CustomDefaultValue;
use Pimcore\Bundle\AdminBundle\DataObject\GridColumnConfig\Value\DefaultValue;
use Pimcore\Bundle\AdminBundle\DataObject\GridColumnConfig\Operator\AnyGetter;
use stdClass;

class StripTag extends AbstractOperator
{
    public function __construct(\stdClass $config, $context = null)
    {
        parent::__construct($config, $context);
    }

    public function getLabeledValue($element) : stdClass
    {
        $result = new \stdClass();
        $result->label = $this->label;

        $children = $this->getChildren();

        if (!$children) {
            return $result;
        } else {
            $c = $children[0];
            $value = null;

            if($c instanceof DefaultValue){
                $customDefaultValue = new CustomDefaultValue($c);
                $childResult = $customDefaultValue->getLabeledValue($element);
                $value = html_entity_decode(strip_tags($childResult->value));
            }elseif ($c instanceof AnyGetter || $c instanceof \DistributionHubBundle\Model\DataObject\GridColumnConfig\Operator\AnyGetter){
                $customDefaultValue = $this->getCustomAnyGetter($c);
                $childResult = $customDefaultValue->getLabeledValue($element);
                $value = html_entity_decode(strip_tags($childResult->value[0]));
            }
        }
        $result->value = $value;
        return $result;
    }

    private function getCustomAnyGetter(AbstractOperator $anyGetter)
    {
        $config = new \stdClass();

        $refletionObject = new \ReflectionObject($anyGetter);
        $anyGetterProperties = ['label','children','attribute','param1','isArrayType','forwardAttribute',
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

}
