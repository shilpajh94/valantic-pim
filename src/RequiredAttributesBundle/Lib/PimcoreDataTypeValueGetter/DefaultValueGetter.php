<?php
/**
 * Created by PhpStorm.
 * User: pradeep
 * Date: 26/3/20
 * Time: 9:23 AM
 */

namespace RequiredAttributesBundle\Lib\PimcoreDataTypeValueGetter;


use Pimcore\Model\Asset;
use Pimcore\Model\DataObject\Data\QuantityValue;
use Pimcore\Model\DataObject\QuantityValue\Unit;

class DefaultValueGetter implements \IPimcoreDataTypeValueGetter
{
    private $object;

    private $language;

    public function __construct($object, $language = null)
    {
        $this->object = $object;
        $this->language = $language;
    }

//    public function setObject($object)
//    {
//        $this->object = $object;
//    }

    public function getValueForConfig(array $attributeConfig, string $attributeName)
    {
        $attributeType = $attributeConfig['type'];
        $value = null;

        switch ($attributeType){
            case 'input':
                $value = $this->getValueForInput($attributeName);
                break;
            case 'textarea':
                $value = $this->getValueForTextarea($attributeName);
                break;
            case 'numeric':
                $value = $this->getValueForNumeric($attributeName);
                break;
            case 'select':
                $value = $this->getValueForSelect($attributeName);
                break;
            case 'multiselect':
                $value = $this->getValueForMultiselect($attributeName);
                break;
            case 'image':
                $value = $this->getValueForImage($attributeName);
                break;
            case 'quantityValue':
                $value = $this->getValueForQuantityValue($attributeName);
                break;
        }

        return $value;
    }

    public function getValueForInput(string $attributeName): ?string
    {
        return $this->getValue($attributeName);
    }

    public function getValueForTextarea(string $attributeName): ?string
    {
        return $this->getValue($attributeName);
    }

    public function getValueForNumeric(string $attributeName): ?string
    {
        return $this->getValue($attributeName);
    }

    public function getValueForSelect(string $attributeName): ?string
    {
        return $this->getValue($attributeName);
    }

    /**
     * TODO: multiselect might return empty array if no value is selected
     * so if condition will return true with this
     *
     * @param string $attributeName
     * @return mixed
     */
    public function getValueForMultiselect(string $attributeName): ?array
    {
        return $this->getValue($attributeName);
    }

    public function getValueForImage(string $attributeName): ?string
    {
        $value = null;
        $image =  $this->getValue($attributeName);
        if($image instanceof Asset){
            $value = $image->getRealFullPath();
        }
        return $value;

    }

    public function getValueForQuantityValue(string $attributeName): ?string
    {
        $value = null;
        $quantityValue = $this->getValue($attributeName);
        if($quantityValue instanceof QuantityValue){
            $quantity = $quantityValue->getValue();
            $unit = $quantityValue->getUnit();

            if($quantity && $unit instanceof Unit){
                $value = $quantity. " ". $unit->getAbbreviation();
            }
        }
        return $value;
    }

    private function getValue(string $attributeName)
    {
        $getter = 'get'.ucfirst($attributeName);

        if($this->language){
            $value = $this->object->$getter($this->language);
        }else{
            $value = $this->object->$getter();
        }
        return $value;

    }

}