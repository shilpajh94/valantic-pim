<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - customer [input]
 * - partNumber [input]
 */

namespace Pimcore\Model\DataObject;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

/**
* @method static \Pimcore\Model\DataObject\UniPrCustomerReference\Listing getList(array $config = [])
* @method static \Pimcore\Model\DataObject\UniPrCustomerReference\Listing|\Pimcore\Model\DataObject\UniPrCustomerReference|null getByCustomer(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniPrCustomerReference\Listing|\Pimcore\Model\DataObject\UniPrCustomerReference|null getByPartNumber(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
*/

class UniPrCustomerReference extends Concrete
{
public const FIELD_CUSTOMER = 'customer';
public const FIELD_PART_NUMBER = 'partNumber';

protected $classId = "UNI_PR_ML_CR";
protected $className = "UniPrCustomerReference";
protected $customer;
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
* Get customer - Customer
* @return string|null
*/
public function getCustomer(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("customer");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->customer;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set customer - Customer
* @param string|null $customer
* @return $this
*/
public function setCustomer(?string $customer): static
{
	$this->markFieldDirty("customer", true);

	$this->customer = $customer;

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

