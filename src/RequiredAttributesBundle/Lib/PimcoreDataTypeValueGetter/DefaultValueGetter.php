<?php

namespace RequiredAttributesBundle\Lib\PimcoreDataTypeValueGetter;

use AppBundle\Logger\LogLevel;
use AppBundle\Tool\Utils;
use Pimcore\Model\Asset;
use Pimcore\Model\DataObject\Data\QuantityValue;
use Pimcore\Model\DataObject\QuantityValue\Unit;

/**
 * class responsible to fetch values from pimcore object for each individual type
 *
 * Class DefaultValueGetter
 * @package RequiredAttributesBundle\Lib\PimcoreDataTypeValueGetter
 */
class DefaultValueGetter implements IPimcoreDataTypeValueGetter
{
    /**
     * @var : pimcore object to fetch value from
     */
    private $object;
    /**
     * @var : language to fetch value for
     */
    private $language;

    /**
     * @param $object
     */
    public function setObject($object)
    {
        $this->object = $object;
    }

    /**
     * get value for the specified type of attributes
     *
     * @param array $attributeConfig
     * @param string $attributeName
     * @param null $language
     * @return bool|null|string
     */
    public function getValueForConfig(array $attributeConfig, string $attributeName, $language = null)
    {
        $this->language = $language;

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
            case 'checkbox':
                $value = $this->getValueForCheckbox($attributeName);
                break;
            case 'booleanSelect':
                $value = $this->getValueForBooleanSelect($attributeName);
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
            case 'date':
                $value = $this->getValueForDate($attributeName);
                break;
            default:
                Utils::log(REQUIRED_ATTRIBUTES_LOG_FILE,"The attribute type ".$attributeType." is not handled for completeness/required. ",LogLevel::CRITICAL());
        }

        return $value;
    }

    /**
     * @param string $attributeName
     * @return null|string
     */
    public function getValueForInput(string $attributeName): ?string
    {
        $value = $this->getValue($attributeName);

        if( $value!==null && strlen( trim($value) ) == 0 ){
            $value = null;
        }
        return $value;
    }

    /**
     * @param string $attributeName
     * @return null|string
     */
    public function getValueForTextarea(string $attributeName): ?string
    {
        $value = $this->getValue($attributeName);

        if( $value!==null && strlen( trim($value) ) == 0 ){
            $value = null;
        }
        return $value;
    }

    /**
     * @param string $attributeName
     * @return null|string
     */
    public function getValueForNumeric(string $attributeName): ?string
    {
        return $this->getValue($attributeName);
    }

    /**
     * @param string $attributeName
     * @return bool|null
     */
    public function getValueForCheckbox(string $attributeName): ?bool
    {
        return $this->getValue($attributeName);
    }

    /**
     * @param string $attributeName
     * @return bool|null
     */
    public function getValueForBooleanSelect(string $attributeName): ?bool
    {
        return $this->getValue($attributeName);
    }

    /**
     * @param string $attributeName
     * @return int|null
     */
    public function getValueForDate(string $attributeName): ?int
    {
        $value = $this->getValue($attributeName);
        if($value instanceof \Carbon\Carbon){
            $value = $value->getTimestamp();
        }
        return $value;
    }


    /**
     * @param string $attributeName
     * @return null|string
     */
    public function getValueForSelect(string $attributeName): ?string
    {
        $value = $this->getValue($attributeName);
        if( $value!==null && strlen( trim($value) ) == 0 ){
            $value = null;
        }
        return $value;
    }

    /**
     * @param string $attributeName
     * @return mixed
     */
    public function getValueForMultiselect(string $attributeName): ?array
    {
        $value =  $this->getValue($attributeName);
        if(is_array($value) && count($value) == 0 ){
            $value = null;
        }
        return $value;
    }

    /**
     * @param string $attributeName
     * @return null|string
     */
    public function getValueForImage(string $attributeName): ?string
    {
        $value = null;
        $image =  $this->getValue($attributeName);
        if($image instanceof Asset){
            $value = $image->getRealFullPath();
        }
        return $value;

    }

    /**
     * @param string $attributeName
     * @return null|string
     */
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

    /**
     * @param string $attributeName
     * @return mixed
     */
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