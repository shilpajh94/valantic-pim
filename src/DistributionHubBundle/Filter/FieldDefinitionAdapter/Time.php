<?php

namespace DistributionHubBundle\Filter\FieldDefinitionAdapter;

use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject\Concrete;

class Time extends Datetime implements FieldDefinitionAdapterInterface {

    /**
     * field type for filter frontEnd
     * @var string
     */
    protected $fieldType = "time";

    /**
     * @param Concrete $object
     * @param bool $ignoreInheritance
     */
    protected function getDataValue($object, $ignoreInheritance = false) {
        $inheritanceBackup = null;
        if ($ignoreInheritance) {
            $inheritanceBackup = AbstractObject::getGetInheritedValues();
            AbstractObject::setGetInheritedValues(false);
        }

        $value = null;

        $getter = "get" . $this->fieldDefinition->getName();
        $valueObject = $object->$getter();
        if ($valueObject) {
            $valueObject = new \DateTime("0000-01-01T" . $valueObject);
            $value = $valueObject->format(\DateTime::ISO8601);
        }

        if ($ignoreInheritance) {
            AbstractObject::setGetInheritedValues($inheritanceBackup);
        }

        return $value;
    }

}
