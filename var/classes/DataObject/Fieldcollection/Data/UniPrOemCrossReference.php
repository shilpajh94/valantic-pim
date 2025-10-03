<?php

/**
 * Fields Summary:
 * - oem [manyToOneRelation]
 * - partNumber [input]
 */

namespace Pimcore\Model\DataObject\Fieldcollection\Data;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

class UniPrOemCrossReference extends DataObject\Fieldcollection\Data\AbstractData
{
public const FIELD_OEM = 'oem';
public const FIELD_PART_NUMBER = 'partNumber';

protected string $type = "UniPrOemCrossReference";
protected $oem;
protected $partNumber;


/**
* Get oem - OEM  
* @return \Pimcore\Model\DataObject\UniPrOemCrossReference|null
*/
public function getOem(): ?\Pimcore\Model\Element\AbstractElement
{
	$container = $this;
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("oem");
	$data = $fd->preGetData($container);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set oem - OEM  
* @param \Pimcore\Model\DataObject\UniPrOemCrossReference|null $oem
* @return $this
*/
public function setOem(?\Pimcore\Model\Element\AbstractElement $oem): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("oem");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getOem();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $oem);
	if (!$isEqual) {
		$this->markFieldDirty("oem", true);
	}
	$this->oem = $fd->preSetData($this, $oem);
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

