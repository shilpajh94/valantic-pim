<?php

/**
 * Fields Summary:
 * - customer [input]
 * - partNumber [input]
 */

namespace Pimcore\Model\DataObject\Fieldcollection\Data;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

class UniBasePrCustomerReference extends DataObject\Fieldcollection\Data\AbstractData
{
public const FIELD_CUSTOMER = 'customer';
public const FIELD_PART_NUMBER = 'partNumber';

protected string $type = "UniBasePrCustomerReference";
protected $customer;
protected $partNumber;


/**
* Get customer - Customer
* @return string|null
*/
public function getCustomer(): ?string
{
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
	$this->customer = $customer;

	return $this;
}

/**
* Get partNumber - Part Number
* @return string|null
*/
public function getPartNumber(): ?string
{
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
	$this->partNumber = $partNumber;

	return $this;
}

}

