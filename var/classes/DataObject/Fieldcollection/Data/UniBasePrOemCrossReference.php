<?php

/**
 * Fields Summary:
 * - oem [input]
 * - partNumber [input]
 */

namespace Pimcore\Model\DataObject\Fieldcollection\Data;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

class UniBasePrOemCrossReference extends DataObject\Fieldcollection\Data\AbstractData
{
public const FIELD_OEM = 'oem';
public const FIELD_PART_NUMBER = 'partNumber';

protected string $type = "UniBasePrOemCrossReference";
protected $oem;
protected $partNumber;


/**
* Get oem - OEM  
* @return string|null
*/
public function getOem(): ?string
{
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
	$this->oem = $oem;

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

