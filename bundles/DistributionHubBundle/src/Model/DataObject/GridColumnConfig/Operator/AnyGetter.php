<?php

namespace DistributionHubBundle\Model\DataObject\GridColumnConfig\Operator;

use Pimcore\DataObject\GridColumnConfig\Operator\AbstractOperator;
use Pimcore\Model\AbstractModel;
use Pimcore\DataObject\GridColumnConfig\Value\DefaultValue;
use \DistributionHubBundle\Model\DataObject\GridColumnConfig\Value\CustomDefaultValue;
use Pimcore\Model\DataObject\Data\ObjectMetadata;


class AnyGetter extends AbstractOperator
{
    /** @var string */
    private $attribute;

    /** @var string */
    private $param1;

    /** @var bool */
    private $isArrayType;

    /** @var string */
    private $forwardAttribute;

    /** @var string */
    private $forwardParam1;

    /** @var bool */
    private $returnLastResult;

    public function __construct(\stdClass $config, $context = null)
    {
        parent::__construct($config, $context);

        $this->attribute = $config->attribute ?? '';
        $this->param1 = $config->param1 ?? '';
        $this->isArrayType = $config->isArrayType ?? false;

        $this->forwardAttribute = $config->forwardAttribute ?? '';
        $this->forwardParam1 = $config->forwardParam1 ?? '';

        $this->returnLastResult = $config->returnLastResult ?? false;
    }

    public function getLabeledValue($element)
    {
        $result = new \stdClass();
        $result->label = $this->label;

        $childs = $this->getChildren();

        $getter = 'get'.ucfirst($this->attribute);

        if (!$childs) {
            if ($this->attribute && method_exists($element, $getter)) {
                $result->value = $element->$getter();
                if ($result->value instanceof AbstractModel) {
                    $result->value = $result->value->getObjectVars();
                }

                return $result;
            }
        } else {
            if (count($childs) > 1) {
                $result->isArrayType = true;
            }
            $resultElements = [];

            if (!is_array($childs)) {
                $childs = [$childs];
            }

            foreach ($childs as $c) {
                $forwardObject = $element;

                if ($this->forwardAttribute) {
                    $forwardGetter = 'get'.ucfirst($this->forwardAttribute);
                    $forwardParam = $this->getForwardParam1();
                    if ($this->forwardAttribute && method_exists($element, $forwardGetter)) {
                        $forwardObject = $element->$forwardGetter($forwardParam);
                        if (!$forwardObject) {
                            return $result;
                        }
                    } else {
                        return $result;
                    }
                }
                $value = null;

                if($c instanceof DefaultValue){
                    $customDefaultValue = new CustomDefaultValue($c);
                    $childResult = $customDefaultValue->getLabeledValue($element);
                    $value = $childResult->value;
                    $fieldDefinition = $childResult->def;
                }elseif ($c instanceof AnyGetter || $c instanceof \DistributionHubBundle\Model\DataObject\GridColumnConfig\Operator\AnyGetter){
                    $customDefaultValue = $this->getCustomAnyGetter($c);
                    $childResult = $customDefaultValue->getLabeledValue($element);
                    $value = $childResult->value[0];
                    $fieldDefinition = $childResult->def;
                }else{
                    $valueContainer = $c->getLabeledValue($forwardObject);
                    $value = $valueContainer->value;
                }

                if ($value || $this->getReturnLastResult()) {
                    $resultElementValue = $value;
                } else {
                    $resultElementValue = null;
                }

                if ($this->getisArrayType()) {
                    if (is_array($value)) {
                        $newValues = [];
                        foreach ($value as $o) {
                            // ------- customization open ----------------------
                            if(is_array($o)){
                                $o = $o[0];
                            }elseif($o instanceof ObjectMetadata){
                                $o = $o->getObject();
                            }

                            // -------- customiation closed --------------------
                            if ($this->attribute && method_exists($o, $getter)) {
                                $targetValue = $o->$getter($this->getParam1());
                                $newValues[] = $targetValue;
                            }
                        }
                        $resultElementValue = $newValues;
                    }
                } else {
                    $o = $value; // Concrete::getById($value->getId());
                    if (!empty($o) && $this->attribute && method_exists($o, $getter)) {
                        $value = $o->$getter($this->getParam1());
                        $resultElementValue = $value;
                    }
                }
                $resultElements[] = $resultElementValue;
            }
            if (count($childs) == 1) {
                $result->value = $resultElements[0];
            } else {
                $result->value = $resultElements;
            }
        }

        return $result;
    }

    /**
     * @return string
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * @param string $attribute
     */
    public function setAttribute($attribute)
    {
        $this->attribute = $attribute;
    }

    /**
     * @return string
     */
    public function getParam1()
    {
        return $this->param1;
    }

    /**
     * @param string $param1
     */
    public function setParam1($param1)
    {
        $this->param1 = $param1;
    }

    /**
     * @return string
     */
    public function getForwardAttribute()
    {
        return $this->forwardAttribute;
    }

    /**
     * @param string $forwardAttribute
     */
    public function setForwardAttribute($forwardAttribute)
    {
        $this->forwardAttribute = $forwardAttribute;
    }

    /**
     * @return string
     */
    public function getForwardParam1()
    {
        return $this->forwardParam1;
    }

    /**
     * @param string $forwardParam1
     */
    public function setForwardParam1($forwardParam1)
    {
        $this->forwardParam1 = $forwardParam1;
    }

    /**
     * @return bool
     */
    public function getIsArrayType()
    {
        return $this->isArrayType;
    }

    /**
     * @param bool $isArrayType
     */
    public function setIsArrayType($isArrayType)
    {
        $this->isArrayType = $isArrayType;
    }

    /**
     * @return bool
     */
    public function getReturnLastResult()
    {
        return $this->returnLastResult;
    }

    /**
     * @param bool $returnLastResult
     */
    public function setReturnLastResult($returnLastResult)
    {
        $this->returnLastResult = $returnLastResult;
    }

    private function getCustomAnyGetter(AbstractOperator $anyGetter)
    {
        $config = new \stdClass();

        $refletionObject = new \ReflectionObject($anyGetter);
        $anyGetterProperties = ['label','childs','attribute','param1','isArrayType','forwardAttribute',
            'forwardParam1','returnLastResult'];
        foreach ($anyGetterProperties as $property) {
            $reflectionProperty = $refletionObject->getProperty($property);
            $reflectionProperty->setAccessible(true);
            $config->$property = $reflectionProperty->getValue($anyGetter);
        }
        $reflectionProperty = $refletionObject->getProperty('context');
        $reflectionProperty->setAccessible(true);
        $context = $reflectionProperty->getValue($anyGetter);

        return new CustomAnyGetter($config,$context);
    }
}
