<?php

/**
 * Fields Summary:
 * - competitor [input]
 * - partNumber [input]
 */

namespace Pimcore\Model\DataObject\Fieldcollection\Data;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

class UniPrCompetitorCrossReference extends DataObject\Fieldcollection\Data\AbstractData
{
public const FIELD_COMPETITOR = 'competitor';
public const FIELD_PART_NUMBER = 'partNumber';

protected string $type = "UniPrCompetitorCrossReference";
protected $competitor;
protected $partNumber;


/**
* Get competitor - Competitor
* @return string|null
*/
public function getCompetitor(): ?string
{
	$data = $this->competitor;
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set competitor - Competitor
* @param string|null $competitor
* @return $this
*/
public function setCompetitor(?string $competitor): static
{
	$this->competitor = $competitor;

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

