<?php

namespace DistributionHubBundle\Model\DataObject\GridColumnConfig\Operator;

use Pimcore\DataObject\GridColumnConfig\Operator\AbstractOperator;
use Pimcore\Model\DataObject\AbstractObject;

class ReverseManyToManyGetter extends AbstractOperator
{
    /** @var string */
    private $attribute;

    /** @var string */
    private $relatedElementAttribute;

    /** @var bool */
    private $returnLastResult;

    public function __construct(\stdClass $config, $context = null)
    {
        parent::__construct($config, $context);

        $this->attribute = $config->attribute ?? '';
        $this->relatedElementAttribute = $config->relatedElementAttribute ?? '';
        $this->returnLastResult = $config->returnLastResult ?? false;
    }

    public function getLabeledValue($element)
    {
        $result = new \stdClass();
        $result->label = $this->label;
        $relatedElementGetter = 'get'.ucfirst($this->relatedElementAttribute);
        $field = $element->getClass()->getFieldDefinition($this->attribute);
        $entries = $element->getRelationData($field->getOwnerFieldName(), false, $field->getOwnerClassId());
        $values = [];
        if ($entries) {
            foreach ($entries as $entry) {
                $obj = AbstractObject::getById($entry["id"]);
                if ($obj && method_exists($obj, $relatedElementGetter)) {
                    $values[] = $obj->$relatedElementGetter();
                }
            }
        }

        if (!$this->getReturnLastResult()) {
            $result->value = implode(",", $values);
        } else {
            $result->value = end($values);
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
     * @param string $attribute
     */
    public function setRelatedElementAttribute($attribute)
    {
        $this->relatedElementAttribute = $attribute;
    }

    /**
     * @return string
     */
    public function getRelatedElementAttribute()
    {
        return $this->relatedElementAttribute;
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
}
