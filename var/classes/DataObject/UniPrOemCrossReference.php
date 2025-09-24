<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - oem [input]
 * - partNumber [input]
 */

namespace Pimcore\Model\DataObject;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

/**
* @method static \Pimcore\Model\DataObject\UniPrOemCrossReference\Listing getList(array $config = [])
* @method static \Pimcore\Model\DataObject\UniPrOemCrossReference\Listing|\Pimcore\Model\DataObject\UniPrOemCrossReference|null getByOem(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniPrOemCrossReference\Listing|\Pimcore\Model\DataObject\UniPrOemCrossReference|null getByPartNumber(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
*/

class UniPrOemCrossReference extends Concrete
{
public const FIELD_OEM = 'oem';
public const FIELD_PART_NUMBER = 'partNumber';

protected $classId = "UNI_PR_ML_OCR";
protected $className = "UniPrOemCrossReference";
protected $oem;
protected $partNumber;


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
* Get oem - OEM  
* @return string|null
*/
public function getOem(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("oem");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->oem;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set oem - OEM  
* @param string|null $oem
* @return $this
*/
public function setOem(?string $oem): static
{
	$this->markFieldDirty("oem", true);

	$this->oem = $oem;

	return $this;
}

/**
* Get partNumber - Part Number
* @return string|null
*/
public function getPartNumber(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("partNumber");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->partNumber;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set partNumber - Part Number
* @param string|null $partNumber
* @return $this
*/
public function setPartNumber(?string $partNumber): static
{
	$this->markFieldDirty("partNumber", true);

	$this->partNumber = $partNumber;

	return $this;
}

}

