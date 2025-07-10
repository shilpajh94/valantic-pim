<?php

/**
 * Fields Summary:
 * - outsideLengthMetric [numeric]
 * - insideLengthMetric [numeric]
 * - ribPitchMetric [numeric]
 * - outsideLengthImperial [numeric]
 * - insideLengthImperial [numeric]
 * - ribPitchImperial [numeric]
 */

namespace Pimcore\Model\DataObject\Objectbrick\Data;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;


class UniPrGsTechPts extends DataObject\Objectbrick\Data\AbstractData
{
public const FIELD_OUTSIDE_LENGTH_METRIC = 'outsideLengthMetric';
public const FIELD_INSIDE_LENGTH_METRIC = 'insideLengthMetric';
public const FIELD_RIB_PITCH_METRIC = 'ribPitchMetric';
public const FIELD_OUTSIDE_LENGTH_IMPERIAL = 'outsideLengthImperial';
public const FIELD_INSIDE_LENGTH_IMPERIAL = 'insideLengthImperial';
public const FIELD_RIB_PITCH_IMPERIAL = 'ribPitchImperial';

protected string $type = "UniPrGsTechPts";
protected $outsideLengthMetric;
protected $insideLengthMetric;
protected $ribPitchMetric;
protected $outsideLengthImperial;
protected $insideLengthImperial;
protected $ribPitchImperial;


/**
* UniPrGsTechPts constructor.
* @param DataObject\Concrete $object
*/
public function __construct(DataObject\Concrete $object)
{
	parent::__construct($object);
	$this->markFieldDirty("_self");
}


/**
* Get outsideLengthMetric - Outside Length (mm)
* @return float|null
*/
public function getOutsideLengthMetric(): ?float
{
	$data = $this->outsideLengthMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("outsideLengthMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("outsideLengthMetric");
		} catch (InheritanceParentNotFoundException $e) {
			// no data from parent available, continue ...
		}
	}
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set outsideLengthMetric - Outside Length (mm)
* @param float|null $outsideLengthMetric
* @return $this
*/
public function setOutsideLengthMetric (?float $outsideLengthMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("outsideLengthMetric");
	$this->outsideLengthMetric = $fd->preSetData($this, $outsideLengthMetric);
	return $this;
}

/**
* Get insideLengthMetric - Inside Length (mm)
* @return float|null
*/
public function getInsideLengthMetric(): ?float
{
	$data = $this->insideLengthMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("insideLengthMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("insideLengthMetric");
		} catch (InheritanceParentNotFoundException $e) {
			// no data from parent available, continue ...
		}
	}
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set insideLengthMetric - Inside Length (mm)
* @param float|null $insideLengthMetric
* @return $this
*/
public function setInsideLengthMetric (?float $insideLengthMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("insideLengthMetric");
	$this->insideLengthMetric = $fd->preSetData($this, $insideLengthMetric);
	return $this;
}

/**
* Get ribPitchMetric - Rib Pitch (s) (mm)
* @return float|null
*/
public function getRibPitchMetric(): ?float
{
	$data = $this->ribPitchMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("ribPitchMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("ribPitchMetric");
		} catch (InheritanceParentNotFoundException $e) {
			// no data from parent available, continue ...
		}
	}
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set ribPitchMetric - Rib Pitch (s) (mm)
* @param float|null $ribPitchMetric
* @return $this
*/
public function setRibPitchMetric (?float $ribPitchMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("ribPitchMetric");
	$this->ribPitchMetric = $fd->preSetData($this, $ribPitchMetric);
	return $this;
}

/**
* Get outsideLengthImperial - Outside Length (in)
* @return float|null
*/
public function getOutsideLengthImperial(): ?float
{
	$data = $this->outsideLengthImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("outsideLengthImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("outsideLengthImperial");
		} catch (InheritanceParentNotFoundException $e) {
			// no data from parent available, continue ...
		}
	}
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set outsideLengthImperial - Outside Length (in)
* @param float|null $outsideLengthImperial
* @return $this
*/
public function setOutsideLengthImperial (?float $outsideLengthImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("outsideLengthImperial");
	$this->outsideLengthImperial = $fd->preSetData($this, $outsideLengthImperial);
	return $this;
}

/**
* Get insideLengthImperial - Inside Length (in)
* @return float|null
*/
public function getInsideLengthImperial(): ?float
{
	$data = $this->insideLengthImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("insideLengthImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("insideLengthImperial");
		} catch (InheritanceParentNotFoundException $e) {
			// no data from parent available, continue ...
		}
	}
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set insideLengthImperial - Inside Length (in)
* @param float|null $insideLengthImperial
* @return $this
*/
public function setInsideLengthImperial (?float $insideLengthImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("insideLengthImperial");
	$this->insideLengthImperial = $fd->preSetData($this, $insideLengthImperial);
	return $this;
}

/**
* Get ribPitchImperial - Rib Pitch (s) (in)
* @return float|null
*/
public function getRibPitchImperial(): ?float
{
	$data = $this->ribPitchImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("ribPitchImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("ribPitchImperial");
		} catch (InheritanceParentNotFoundException $e) {
			// no data from parent available, continue ...
		}
	}
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set ribPitchImperial - Rib Pitch (s) (in)
* @param float|null $ribPitchImperial
* @return $this
*/
public function setRibPitchImperial (?float $ribPitchImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("ribPitchImperial");
	$this->ribPitchImperial = $fd->preSetData($this, $ribPitchImperial);
	return $this;
}

}

