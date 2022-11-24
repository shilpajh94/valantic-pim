<?php

namespace AppBundle\Operator;

use Pimcore\DataObject\GridColumnConfig\Operator\AbstractOperator;
use Pimcore\DataObject\GridColumnConfig\ResultContainer;
use Pimcore\Model\DataObject\AbstractObject;

class OperatorToGetProductBrickDataFromPlantClass extends AbstractOperator
{

    public function getLabeledValue($element)
    {
        $originalGetInheritedValues = AbstractObject::doGetInheritedValues();
        AbstractObject::setGetInheritedValues(true);

        $product = $element->getMaterial()[0]->getBase()->getHoseBase()->getCoverMaterial();
        $data = (\Pimcore\Model\DataObject\MultiselectMaster::getById($product[0])->getName()); 
        AbstractObject::setGetInheritedValues($originalGetInheritedValues);

        $result = new ResultContainer();
        $result->setValue($data);
        return $result;
    }
}