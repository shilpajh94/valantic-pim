<?php


namespace DistributionHubBundle\Model\DataObject\GridColumnConfig\Value;


use Pimcore\DataObject\GridColumnConfig\Value\DefaultValue;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Service;
use Pimcore\Model\Element\ElementInterface;
use Pimcore\Model\DataObject\Objectbrick;


class CustomDefaultValue extends DefaultValue
{


    public function __construct(DefaultValue $originalDefaultValue)
    {
        $this->context = $originalDefaultValue->context;
        $this->attribute = $originalDefaultValue->attribute;
        $this->label = $originalDefaultValue->getLabel();
    }

    /**
     * @param Concrete $object
     * @param string $key
     * @param string|null $brickType
     * @param string|null $brickKey
     * @param Data|null $fieldDefinition
     *
     * @return \stdClass
     *
     * @throws \Exception
     */
    private function getValueForObject($object, $key, $brickType = null, $brickKey = null, $fieldDefinition = null)
    {
        if (!$key) {
            return;
        }
        $getter = 'get' . ucfirst($key);

        if($brickType !== null && $brickKey !== null){
            $productClassBrickFieldName = $this->getBrickFieldNameInProductClass($brickType);
            if($productClassBrickFieldName){
                $getter = "get".$productClassBrickFieldName;
                $value = $object->$getter();
            }
        }else{
            $value = $object->$getter();
        }

        if (!empty($value) && !empty($brickType)) {
            $getBrickType = 'get' . ucfirst($brickType);
            $value = $value->$getBrickType();

            if (!empty($value) && !empty($brickKey)) {
                $brickGetter = 'get' . ucfirst($brickKey);
                $value = $value->$brickGetter();
            }
        }

        if (!$fieldDefinition) {
            $fieldDefinition = $object->getClass()->getFieldDefinition($key);

            if (!$fieldDefinition) {
                $localizedFields = $object->getClass()->getFieldDefinition('localizedfields');
                if ($localizedFields instanceof Data\Localizedfields) {
                    $fieldDefinition = $localizedFields->getFieldDefinition($key);
                }
            }
        }

        if (!empty($brickType) && !empty($brickKey)) {
            $brickClass = Objectbrick\Definition::getByKey($brickType);
            $context = ['object' => $object, 'outerFieldname' => $key];
            $fieldDefinition = $brickClass->getFieldDefinition($brickKey, $context);
        }

        if (!$fieldDefinition instanceof Data) {
            return $this->getDefaultValue($value);
        }

        if ($fieldDefinition->isEmpty($value)) {
            $parent = Service::hasInheritableParentObject($object);

            if (!empty($parent)) {
                return $this->getValueForObject($parent, $key, $brickType, $brickKey, $fieldDefinition);
            }
        }

        $result = new \stdClass();
        $result->value = $value;
        $result->label = $fieldDefinition->getTitle();
        $result->def = $fieldDefinition;
        $result->empty = $fieldDefinition->isEmpty($value);
        $result->objectid = $object->getId();

        return $result;
    }

    /**
     * Only for contitech
     *
     * @param string $brickType
     * @return string|null
     */
    private function getBrickFieldNameInProductClass(string $brickType): ?string
    {
        $fieldNames = ["fert","skeleton","base"];
        foreach($fieldNames as $fieldName){
            if($this->endsWith($brickType,$fieldName)){
                return $fieldName;
            }
        }
        return null;
    }

    private function endsWith( $haystack, $needle ) {
        $length = strlen( $needle );
        if( !$length ) {
            return true;
        }
        $endString = substr( $haystack, -$length );
        if($endString){
            return strtolower($endString) === strtolower($needle);
        }
        return null;
    }
    /**
     * @param mixed $value
     *
     * @return \stdClass
     */
    private function getDefaultValue($value)
    {
        $result = new \stdClass();
        $result->value = $value;
        $result->label = $this->label;
        $result->def = null;

        if (empty($value) || (is_object($value) && method_exists($value, 'isEmpty') && $value->isEmpty())) {
            $result->empty = true;
        } else {
            $result->empty = false;
        }

        return $result;
    }

    /**
     * @param ElementInterface|Concrete $element
     *
     * {@inheritdoc}
     */
    public function getLabeledValue($element)
    {
        /** @var Concrete $element */
        $attributeParts = explode('~', $this->attribute);

        $getter = 'get' . ucfirst($this->attribute);
        $brickType = null;
        $brickKey = null;

        if (substr($this->attribute, 0, 1) == '~') {
            // key value, ignore for now
        } elseif (count($attributeParts) > 1) {
            $brickType = $attributeParts[0];
            $brickKey = $attributeParts[1];
        }

        if ($this->attribute && method_exists($element, $getter) || ( $brickType !== null && $brickKey !== null ) ) {
            if ($element instanceof AbstractObject) {
                try {
                    $result = $this->getValueForObject($element, $this->attribute, $brickType, $brickKey);
                } catch (\Exception $e) {
                    $result = $this->getDefaultValue($element->$getter());
                }
            } else {
                $result = $this->getDefaultValue($element->$getter());
            }

            return $result;
        }

        return null;
    }

}
