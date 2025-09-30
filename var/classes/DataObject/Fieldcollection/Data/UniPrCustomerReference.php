<?php

/**
 * Fields Summary:
 * - customer [manyToOneRelation]
 * - partNumber [input]
 */

namespace Pimcore\Model\DataObject\Fieldcollection\Data;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

class UniPrCustomerReference extends DataObject\Fieldcollection\Data\AbstractData
{
public const FIELD_CUSTOMER = 'customer';
public const FIELD_PART_NUMBER = 'partNumber';

protected string $type = "UniPrCustomerReference";
protected $customer;
protected $partNumber;


/**
* Get customer - Customer
* @return \Pimcore\Model\DataObject\UniPrCustomerReference|null
*/
public function getCustomer(): ?\Pimcore\Model\Element\AbstractElement
{
	$container = $this;
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("customer");
	$data = $fd->preGetData($container);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set customer - Customer
* @param \Pimcore\Model\DataObject\UniPrCustomerReference|null $customer
* @return $this
*/
public function setCustomer(?\Pimcore\Model\Element\AbstractElement $customer): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("customer");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getCustomer();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $customer);
	if (!$isEqual) {
		$this->markFieldDirty("customer", true);
	}
	$this->customer = $fd->preSetData($this, $customer);
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

