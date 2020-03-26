<?php



interface IPimcoreDataTypeValueGetter
{
//    public function setObject($object);

    public function getValueForConfig(array $attributeConfig, string $attributeName);


    public function getValueForInput(string $attributeName);

    public function getValueForTextarea(string $attributeName);

    public function getValueForNumeric(string $attributeName);

    public function getValueForSelect(string $attributeName);

    public function getValueForMultiselect(string $attributeName);

    public function getValueForImage(string $attributeName);

    public function getValueForQuantityValue(string $attributeName);

}