<?php

/**
 * Fields Summary:
 * - placeholder [input]
 */

namespace Pimcore\Model\DataObject\Objectbrick\Data;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;


class UniPrSk extends \App\Model\DataObject\UniProductManagement\Objectbrick\AbstractUniPrSkeleton
{
public const FIELD_PLACEHOLDER = 'placeholder';

protected string $type = "UniPrSk";
protected $placeholder;


/**
* UniPrSk constructor.
* @param DataObject\Concrete $object
*/
public function __construct(DataObject\Concrete $object)
{
	parent::__construct($object);
	$this->markFieldDirty("_self");
}


/**
* Get placeholder - Placeholder Field
* @return string|null
*/
public function getPlaceholder(): ?string
{
	$data = $this->placeholder;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("placeholder")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("placeholder");
		} catch (InheritanceParentNotFoundException $e) {
			// no data from parent available, continue ...
		}
	}
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set placeholder - Placeholder Field
* @param string|null $placeholder
* @return $this
*/
public function setPlaceholder (?string $placeholder): static
{
	$this->placeholder = $placeholder;

	return $this;
}

}

