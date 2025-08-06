<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - localizedfields [localizedfields]
 * -- tubeMaterial [input]
 */

namespace Pimcore\Model\DataObject;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

/**
* @method static \Pimcore\Model\DataObject\UniPrTubeMaterial\Listing getList(array $config = [])
* @method static \Pimcore\Model\DataObject\UniPrTubeMaterial\Listing|\Pimcore\Model\DataObject\UniPrTubeMaterial|null getByLocalizedfields(string $field, mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniPrTubeMaterial\Listing|\Pimcore\Model\DataObject\UniPrTubeMaterial|null getByTubeMaterial(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
*/

class UniPrTubeMaterial extends Concrete
{
public const FIELD_TUBE_MATERIAL = 'tubeMaterial';

protected $classId = "UniPrTubeMaterial";
protected $className = "UniPrTubeMaterial";
protected $localizedfields;


/**
* @param array $values
* @return static
*/
public static function create(array $values = []): static
{
	$object = new static();
	$object->setValues($values);
	return $object;
}

/**
* Get localizedfields - 
* @return \Pimcore\Model\DataObject\Localizedfield|null
*/
public function getLocalizedfields(): ?\Pimcore\Model\DataObject\Localizedfield
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("localizedfields");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("localizedfields")->preGetData($this);

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get tubeMaterial - Tube Material
* @return string|null
*/
public function getTubeMaterial(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("tubeMaterial", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("tubeMaterial");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set localizedfields - 
* @param \Pimcore\Model\DataObject\Localizedfield|null $localizedfields
* @return $this
*/
public function setLocalizedfields(?\Pimcore\Model\DataObject\Localizedfield $localizedfields): static
{
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getLocalizedfields();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$this->markFieldDirty("localizedfields", true);
	$this->markFieldDirty("localizedfields", true);

	$this->localizedfields = $localizedfields;

	return $this;
}

/**
* Set tubeMaterial - Tube Material
* @param string|null $tubeMaterial
* @return $this
*/
public function setTubeMaterial (?string $tubeMaterial, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("tubeMaterial", $tubeMaterial, $language, !$isEqual);

	return $this;
}

}

