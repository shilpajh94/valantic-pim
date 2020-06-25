<?php

namespace RequiredAttributesBundle\Lib\PimcoreDataTypeValueGetter;

/**
 * Interface created for generalization
 * So that more value getters can be created if needed be in the future.
 * For example if the requirement comes to treat the values differently for b2c export
 *
 * Interface IPimcoreDataTypeValueGetter
 * @package RequiredAttributesBundle\Lib\PimcoreDataTypeValueGetter
 */
interface IPimcoreDataTypeValueGetter
{
    public function setObject($object);

    public function getValueForConfig(array $attributeConfig, string $attributeName);


    public function getValueForInput(string $attributeName);

    public function getValueForTextarea(string $attributeName);

    public function getValueForNumeric(string $attributeName);

    public function getValueForCheckbox(string $attributeName);

    public function getValueForBooleanSelect(string $attributeName);

    public function getValueForSelect(string $attributeName);

    public function getValueForMultiselect(string $attributeName);

    public function getValueForImage(string $attributeName);

    public function getValueForQuantityValue(string $attributeName);

    public function getValueForDate(string $attributeName);

}