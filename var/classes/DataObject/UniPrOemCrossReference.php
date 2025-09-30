<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - name [input]
 */

namespace Pimcore\Model\DataObject;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

/**
* @method static \Pimcore\Model\DataObject\UniPrOemCrossReference\Listing getList(array $config = [])
* @method static \Pimcore\Model\DataObject\UniPrOemCrossReference\Listing|\Pimcore\Model\DataObject\UniPrOemCrossReference|null getByName(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
*/

class UniPrOemCrossReference extends Concrete
{
public const FIELD_NAME = 'name';

protected $classId = "UNI_PR_ML_OCR";
protected $className = "UniPrOemCrossReference";
protected $name;


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
* Get name - OEM name
* @return string|null
*/
public function getName(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("name");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->name;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set name - OEM name
* @param string|null $name
* @return $this
*/
public function setName(?string $name): static
{
	$this->markFieldDirty("name", true);

	$this->name = $name;

	return $this;
}

}

