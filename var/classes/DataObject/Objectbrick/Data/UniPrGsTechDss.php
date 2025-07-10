<?php

/**
 * Fields Summary:
 * - bellowOnly [booleanSelect]
 * - minimumHeightMetric [numeric]
 * - maximumBellowDiameterMetric [numeric]
 * - minimumHeightImperial [numeric]
 * - maximumBellowDiameterImperial [numeric]
 */

namespace Pimcore\Model\DataObject\Objectbrick\Data;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;


class UniPrGsTechDss extends DataObject\Objectbrick\Data\AbstractData
{
public const FIELD_BELLOW_ONLY = 'bellowOnly';
public const FIELD_MINIMUM_HEIGHT_METRIC = 'minimumHeightMetric';
public const FIELD_MAXIMUM_BELLOW_DIAMETER_METRIC = 'maximumBellowDiameterMetric';
public const FIELD_MINIMUM_HEIGHT_IMPERIAL = 'minimumHeightImperial';
public const FIELD_MAXIMUM_BELLOW_DIAMETER_IMPERIAL = 'maximumBellowDiameterImperial';

protected string $type = "UniPrGsTechDss";
protected $bellowOnly;
protected $minimumHeightMetric;
protected $maximumBellowDiameterMetric;
protected $minimumHeightImperial;
protected $maximumBellowDiameterImperial;


/**
* UniPrGsTechDss constructor.
* @param DataObject\Concrete $object
*/
public function __construct(DataObject\Concrete $object)
{
	parent::__construct($object);
	$this->markFieldDirty("_self");
}


/**
* Get bellowOnly - Bellow Only
* @return bool|null
*/
public function getBellowOnly(): ?bool
{
	$data = $this->bellowOnly;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("bellowOnly")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("bellowOnly");
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
* Set bellowOnly - Bellow Only
* @param bool|null $bellowOnly
* @return $this
*/
public function setBellowOnly (?bool $bellowOnly): static
{
	$this->bellowOnly = $bellowOnly;

	return $this;
}

/**
* Get minimumHeightMetric - Minimum Height (mm)
* @return float|null
*/
public function getMinimumHeightMetric(): ?float
{
	$data = $this->minimumHeightMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("minimumHeightMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("minimumHeightMetric");
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
* Set minimumHeightMetric - Minimum Height (mm)
* @param float|null $minimumHeightMetric
* @return $this
*/
public function setMinimumHeightMetric (?float $minimumHeightMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("minimumHeightMetric");
	$this->minimumHeightMetric = $fd->preSetData($this, $minimumHeightMetric);
	return $this;
}

/**
* Get maximumBellowDiameterMetric - Maximum Bellow Diameter (mm)
* @return float|null
*/
public function getMaximumBellowDiameterMetric(): ?float
{
	$data = $this->maximumBellowDiameterMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("maximumBellowDiameterMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("maximumBellowDiameterMetric");
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
* Set maximumBellowDiameterMetric - Maximum Bellow Diameter (mm)
* @param float|null $maximumBellowDiameterMetric
* @return $this
*/
public function setMaximumBellowDiameterMetric (?float $maximumBellowDiameterMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("maximumBellowDiameterMetric");
	$this->maximumBellowDiameterMetric = $fd->preSetData($this, $maximumBellowDiameterMetric);
	return $this;
}

/**
* Get minimumHeightImperial - Minimum Height (in)
* @return float|null
*/
public function getMinimumHeightImperial(): ?float
{
	$data = $this->minimumHeightImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("minimumHeightImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("minimumHeightImperial");
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
* Set minimumHeightImperial - Minimum Height (in)
* @param float|null $minimumHeightImperial
* @return $this
*/
public function setMinimumHeightImperial (?float $minimumHeightImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("minimumHeightImperial");
	$this->minimumHeightImperial = $fd->preSetData($this, $minimumHeightImperial);
	return $this;
}

/**
* Get maximumBellowDiameterImperial - Maximum Bellow Diameter (in)
* @return float|null
*/
public function getMaximumBellowDiameterImperial(): ?float
{
	$data = $this->maximumBellowDiameterImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("maximumBellowDiameterImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("maximumBellowDiameterImperial");
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
* Set maximumBellowDiameterImperial - Maximum Bellow Diameter (in)
* @param float|null $maximumBellowDiameterImperial
* @return $this
*/
public function setMaximumBellowDiameterImperial (?float $maximumBellowDiameterImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("maximumBellowDiameterImperial");
	$this->maximumBellowDiameterImperial = $fd->preSetData($this, $maximumBellowDiameterImperial);
	return $this;
}

}

