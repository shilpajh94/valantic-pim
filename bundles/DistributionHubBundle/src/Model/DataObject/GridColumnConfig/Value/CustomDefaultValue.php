<?php


namespace DistributionHubBundle\Model\DataObject\GridColumnConfig\Value;

use Pimcore\Bundle\AdminBundle\DataObject\GridColumnConfig\Value\DefaultValue;
use Pimcore\Bundle\AdminBundle\DataObject\GridColumnConfig\Value\AbstractValue;
use Pimcore\Localization\LocaleServiceInterface;
use Pimcore\Model\DataObject\Classificationstore;
use Pimcore\Model\DataObject\AbstractObject;
use Pimcore\Model\DataObject\ClassDefinition\Data;
use Pimcore\Model\DataObject\Concrete;
use Pimcore\Model\DataObject\Service;
use Pimcore\Model\Element\ElementInterface;
use Pimcore\Model\DataObject\Objectbrick;
use stdClass;

class CustomDefaultValue extends AbstractValue
{

    public $localeService;

    public function __construct(DefaultValue $abstractValue, LocaleServiceInterface $localeService = null)
    {
        $this->context = $abstractValue->context;
        $this->attribute = $abstractValue->attribute;
        $this->label = $abstractValue->getLabel();
        $this->localeService = $localeService;
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
    private function getValueForObject($object, $key, $brickType = null, $brickKey = null)
    {
        /**
         * this is done so that the runtime does not enter the second if condition of getFieldDefinition in ClassDefinition class
         * this enables the system to load the select and multiselect options at runtime ignoring the pre-set options
         * for select and multiselect
         */
        \Pimcore::setAdminMode();

        if (!$key) {
            throw new \Exception('Empty key');
        }
        $fieldDefinition = null;

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

        if (!empty($brickType)) {
            $getter = 'get' . Service::getFieldForBrickType($object->getClass(), $brickType);
            $value = $object->$getter();

            $getBrickType = 'get' . ucfirst($brickType);
            $value = $value->$getBrickType();
            if (!empty($value) && !empty($brickKey)) {
                $brickGetter = 'get' . ucfirst($brickKey);
                $value = $value->$brickGetter();

                $brickClass = Objectbrick\Definition::getByKey($brickType);
                $context = ['object' => $object, 'outerFieldname' => $key];
                $fieldDefinition = $brickClass->getFieldDefinition($brickKey, $context);
            }
        } else {
            $getter = 'get' . ucfirst($key);
            $value = $object->$getter();

            $fieldDefinition = $object->getClass()->getFieldDefinition($key);

            if (!$fieldDefinition) {
                $localizedFields = $object->getClass()->getFieldDefinition('localizedfields');
                if ($localizedFields instanceof Data\Localizedfields) {
                    $fieldDefinition = $localizedFields->getFieldDefinition($key);
                }
            }
        }

        if (!$fieldDefinition instanceof Data) {
            return $this->getDefaultValue($value);
        }

        if ($fieldDefinition->isEmpty($value)) {
            $parent = Service::hasInheritableParentObject($object);

            if (!empty($parent)) {
                return $this->getValueForObject($parent, $key, $brickType, $brickKey);
            }
        }

        $result = new stdClass();
        $result->value = $value;
        $result->label = $fieldDefinition->getTitle();
        $result->def = $fieldDefinition;
        $result->empty = $fieldDefinition->isEmpty($value);
        $result->objectid = $object->getId();

        \Pimcore::unsetAdminMode();

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

    private function endsWith( $haystack, $needle )
    {
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

    private function getClassificationStoreValueForObject($object, $key)
    {
        $keyParts = explode('~', $key);

        if (strpos($key, '~') === 0) {
            $type = $keyParts[1];
            if ($type === 'classificationstore') {
                $field = $keyParts[2];
                $groupKeyId = explode('-', $keyParts[3]);

                $groupId = (int) $groupKeyId[0];
                $keyid = (int) $groupKeyId[1];
                $getter = 'get' . ucfirst($field);

                if (method_exists($object, $getter)) {
                    /** @var Classificationstore $classificationStoreData */
                    $classificationStoreData = $object->$getter();

                    /** @var Data\Classificationstore $csFieldDefinition */
                    $csFieldDefinition = $object->getClass()->getFieldDefinition($field);
                    $csLanguage = $this->localeService->getLocale();

                    if (!$csFieldDefinition->isLocalized()) {
                        $csLanguage = 'default';
                    }

                    $fielddata = $classificationStoreData->getLocalizedKeyValue($groupId, $keyid, $csLanguage, true, true);

                    $keyConfig = Classificationstore\KeyConfig::getById($keyid);
                    $type = $keyConfig->getType();
                    $definition = json_decode($keyConfig->getDefinition());
                    $definition = Classificationstore\Service::getFieldDefinitionFromJson($definition, $type);

                    $result = new stdClass();
                    $result->value = $fielddata;
                    $result->label = $definition->getTitle();
                    $result->def = $definition;
                    $result->empty = $definition->isEmpty($fielddata);
                    $result->objectid = $object->getId();

                    return $result;
                }
            }
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
        $result = new stdClass();
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
    public function getLabeledValue($element): stdClass
    {
        /** @var Concrete $element */
        $attributeParts = explode('~', $this->attribute);

        $getter = 'get' . ucfirst($this->attribute);
        $brickType = null;
        $brickKey = null;

        if (str_starts_with($this->attribute, '~')) {
            // key value, ignore for now
            return $this->getClassificationStoreValueForObject($element, $this->attribute);
        } elseif (count($attributeParts) > 1) {
            $brickType = $attributeParts[0];
            $brickKey = $attributeParts[1];
        }

        if ($element instanceof Concrete && count($attributeParts) > 1) {
            $json = json_decode(trim($attributeParts[0], '?'));
            $brickType = $json ? $json->containerKey : $attributeParts[0];
            $brickKey = $attributeParts[1];

            $getter = 'get' . Service::getFieldForBrickType($element->getClass(), $brickType);
        }

        if ($this->attribute && method_exists($element, $getter) || ( $brickType !== null && $brickKey !== null ) ) {
            if ($element instanceof Concrete) {
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
