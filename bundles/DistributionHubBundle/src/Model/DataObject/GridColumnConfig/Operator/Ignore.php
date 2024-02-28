<?php

namespace DistributionHubBundle\Model\DataObject\GridColumnConfig\Operator;

use Pimcore\Bundle\AdminBundle\DataObject\GridColumnConfig\Operator\AbstractOperator;
use stdClass;

class Ignore extends AbstractOperator
{
    public function getLabeledValue($element): stdClass
    {
        $result = new \stdClass();
        $result->label = $this->label;
        $result->value = "";

        return $result;
    }
}
