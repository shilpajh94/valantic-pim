<?php

namespace DistributionHubBundle\Model\DataObject\GridColumnConfig\Operator;

use Pimcore\DataObject\GridColumnConfig\Operator\AbstractOperator;
use DistributionHubBundle\Model\DataObject\GridColumnConfig\Value\CustomDefaultValue;
use Pimcore\DataObject\GridColumnConfig\Value\DefaultValue;

class StripTag extends AbstractOperator
{
    public function __construct(\stdClass $config, $context = null)
    {
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
            $value = null;

            if($c instanceof DefaultValue){
                $customDefaultValue = new CustomDefaultValue($c);
                $childResult = $customDefaultValue->getLabeledValue($element);
                $value = strip_tags($childResult->value);
            }
        }
        $result->value = $value;
        return $result;
    }
    
}