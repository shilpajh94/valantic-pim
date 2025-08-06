<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - localizedfields [localizedfields]
 * -- coverCharacteristic [input]
 */

namespace Pimcore\Model\DataObject;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

/**
* @method static \Pimcore\Model\DataObject\UniPrCoverCharacteristic\Listing getList(array $config = [])
* @method static \Pimcore\Model\DataObject\UniPrCoverCharacteristic\Listing|\Pimcore\Model\DataObject\UniPrCoverCharacteristic|null getByLocalizedfields(string $field, mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniPrCoverCharacteristic\Listing|\Pimcore\Model\DataObject\UniPrCoverCharacteristic|null getByCoverCharacteristic(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
*/

class UniPrCoverCharacteristic extends Concrete
{
public const FIELD_COVER_CHARACTERISTIC = 'coverCharacteristic';

protected $classId = "UniPrCoverCharac";
protected $className = "UniPrCoverCharacteristic";
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
* Get coverCharacteristic - Cover Characteristic
* @return string|null
*/
public function getCoverCharacteristic(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("coverCharacteristic", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("coverCharacteristic");
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
* Set coverCharacteristic - Cover Characteristic
* @param string|null $coverCharacteristic
* @return $this
*/
public function setCoverCharacteristic (?string $coverCharacteristic, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("coverCharacteristic", $coverCharacteristic, $language, !$isEqual);

	return $this;
}

}

