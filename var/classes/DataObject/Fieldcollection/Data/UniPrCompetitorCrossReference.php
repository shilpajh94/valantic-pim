<?php

/**
 * Fields Summary:
 * - competitor [manyToOneRelation]
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
* @return \Pimcore\Model\DataObject\UniPrCompetitorCrossReference|null
*/
public function getCompetitor(): ?\Pimcore\Model\Element\AbstractElement
{
	$container = $this;
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("competitor");
	$data = $fd->preGetData($container);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set competitor - Competitor
* @param \Pimcore\Model\DataObject\UniPrCompetitorCrossReference|null $competitor
* @return $this
*/
public function setCompetitor(?\Pimcore\Model\Element\AbstractElement $competitor): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("competitor");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getCompetitor();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $competitor);
	if (!$isEqual) {
		$this->markFieldDirty("competitor", true);
	}
	$this->competitor = $fd->preSetData($this, $competitor);
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

