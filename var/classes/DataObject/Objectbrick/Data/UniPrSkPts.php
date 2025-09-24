<?php

/**
 * Fields Summary:
 * - beltThicknessMetric [numeric]
 * - toothHeightMetric [numeric]
 * - pitchHeightMetric [numeric]
 * - profile [input]
 * - beltAngle [input]
 * - maxSpeed [input]
 * - beltThicknessImperial [numeric]
 * - toothHeightImperial [numeric]
 * - pitchHeightImperial [numeric]
 * - nominalLength [select]
 * - minPulleyDiameter [numeric]
 * - minOutsidePulleyDiameter [numeric]
 */

namespace Pimcore\Model\DataObject\Objectbrick\Data;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;


class UniPrSkPts extends \App\Model\DataObject\UniProductManagement\Objectbrick\AbstractUniPrSkeleton
{
public const FIELD_BELT_THICKNESS_METRIC = 'beltThicknessMetric';
public const FIELD_TOOTH_HEIGHT_METRIC = 'toothHeightMetric';
public const FIELD_PITCH_HEIGHT_METRIC = 'pitchHeightMetric';
public const FIELD_PROFILE = 'profile';
public const FIELD_BELT_ANGLE = 'beltAngle';
public const FIELD_MAX_SPEED = 'maxSpeed';
public const FIELD_BELT_THICKNESS_IMPERIAL = 'beltThicknessImperial';
public const FIELD_TOOTH_HEIGHT_IMPERIAL = 'toothHeightImperial';
public const FIELD_PITCH_HEIGHT_IMPERIAL = 'pitchHeightImperial';
public const FIELD_NOMINAL_LENGTH = 'nominalLength';
public const FIELD_MIN_PULLEY_DIAMETER = 'minPulleyDiameter';
public const FIELD_MIN_OUTSIDE_PULLEY_DIAMETER = 'minOutsidePulleyDiameter';

protected string $type = "UniPrSkPts";
protected $beltThicknessMetric;
protected $toothHeightMetric;
protected $pitchHeightMetric;
protected $profile;
protected $beltAngle;
protected $maxSpeed;
protected $beltThicknessImperial;
protected $toothHeightImperial;
protected $pitchHeightImperial;
protected $nominalLength;
protected $minPulleyDiameter;
protected $minOutsidePulleyDiameter;


/**
* UniPrSkPts constructor.
* @param DataObject\Concrete $object
*/
public function __construct(DataObject\Concrete $object)
{
	parent::__construct($object);
	$this->markFieldDirty("_self");
}


/**
* Get beltThicknessMetric - Belt Thickness (hs) (mm)
* @return float|null
*/
public function getBeltThicknessMetric(): ?float
{
	$data = $this->beltThicknessMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("beltThicknessMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("beltThicknessMetric");
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
* Set beltThicknessMetric - Belt Thickness (hs) (mm)
* @param float|null $beltThicknessMetric
* @return $this
*/
public function setBeltThicknessMetric (?float $beltThicknessMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("beltThicknessMetric");
	$this->beltThicknessMetric = $fd->preSetData($this, $beltThicknessMetric);
	return $this;
}

/**
* Get toothHeightMetric - Tooth Height (ht) (mm)
* @return float|null
*/
public function getToothHeightMetric(): ?float
{
	$data = $this->toothHeightMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("toothHeightMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("toothHeightMetric");
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
* Set toothHeightMetric - Tooth Height (ht) (mm)
* @param float|null $toothHeightMetric
* @return $this
*/
public function setToothHeightMetric (?float $toothHeightMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("toothHeightMetric");
	$this->toothHeightMetric = $fd->preSetData($this, $toothHeightMetric);
	return $this;
}

/**
* Get pitchHeightMetric - Pitch height (hd/u) (mm)
* @return float|null
*/
public function getPitchHeightMetric(): ?float
{
	$data = $this->pitchHeightMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("pitchHeightMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("pitchHeightMetric");
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
* Set pitchHeightMetric - Pitch height (hd/u) (mm)
* @param float|null $pitchHeightMetric
* @return $this
*/
public function setPitchHeightMetric (?float $pitchHeightMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("pitchHeightMetric");
	$this->pitchHeightMetric = $fd->preSetData($this, $pitchHeightMetric);
	return $this;
}

/**
* Get profile - Profile
* @return string|null
*/
public function getProfile(): ?string
{
	$data = $this->profile;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("profile")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("profile");
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
* Set profile - Profile
* @param string|null $profile
* @return $this
*/
public function setProfile (?string $profile): static
{
	$this->profile = $profile;

	return $this;
}

/**
* Get beltAngle - Belt Angle
* @return string|null
*/
public function getBeltAngle(): ?string
{
	$data = $this->beltAngle;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("beltAngle")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("beltAngle");
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
* Set beltAngle - Belt Angle
* @param string|null $beltAngle
* @return $this
*/
public function setBeltAngle (?string $beltAngle): static
{
	$this->beltAngle = $beltAngle;

	return $this;
}

/**
* Get maxSpeed - Max Speed
* @return string|null
*/
public function getMaxSpeed(): ?string
{
	$data = $this->maxSpeed;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("maxSpeed")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("maxSpeed");
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
* Set maxSpeed - Max Speed
* @param string|null $maxSpeed
* @return $this
*/
public function setMaxSpeed (?string $maxSpeed): static
{
	$this->maxSpeed = $maxSpeed;

	return $this;
}

/**
* Get beltThicknessImperial - Belt Thickness (hs) (in)
* @return float|null
*/
public function getBeltThicknessImperial(): ?float
{
	$data = $this->beltThicknessImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("beltThicknessImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("beltThicknessImperial");
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
* Set beltThicknessImperial - Belt Thickness (hs) (in)
* @param float|null $beltThicknessImperial
* @return $this
*/
public function setBeltThicknessImperial (?float $beltThicknessImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("beltThicknessImperial");
	$this->beltThicknessImperial = $fd->preSetData($this, $beltThicknessImperial);
	return $this;
}

/**
* Get toothHeightImperial - Tooth Height (ht) (in)
* @return float|null
*/
public function getToothHeightImperial(): ?float
{
	$data = $this->toothHeightImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("toothHeightImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("toothHeightImperial");
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
* Set toothHeightImperial - Tooth Height (ht) (in)
* @param float|null $toothHeightImperial
* @return $this
*/
public function setToothHeightImperial (?float $toothHeightImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("toothHeightImperial");
	$this->toothHeightImperial = $fd->preSetData($this, $toothHeightImperial);
	return $this;
}

/**
* Get pitchHeightImperial - Pitch height (hd/u) (in)
* @return float|null
*/
public function getPitchHeightImperial(): ?float
{
	$data = $this->pitchHeightImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("pitchHeightImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("pitchHeightImperial");
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
* Set pitchHeightImperial - Pitch height (hd/u) (in)
* @param float|null $pitchHeightImperial
* @return $this
*/
public function setPitchHeightImperial (?float $pitchHeightImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("pitchHeightImperial");
	$this->pitchHeightImperial = $fd->preSetData($this, $pitchHeightImperial);
	return $this;
}

/**
* Get nominalLength - Nominal Length
* @return string|null
*/
public function getNominalLength(): ?string
{
	$data = $this->nominalLength;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("nominalLength")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("nominalLength");
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
* Set nominalLength - Nominal Length
* @param string|null $nominalLength
* @return $this
*/
public function setNominalLength (?string $nominalLength): static
{
	$this->nominalLength = $nominalLength;

	return $this;
}

/**
* Get minPulleyDiameter - Minimum Pulley Diameter (mm)
* @return float|null
*/
public function getMinPulleyDiameter(): ?float
{
	$data = $this->minPulleyDiameter;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("minPulleyDiameter")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("minPulleyDiameter");
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
* Set minPulleyDiameter - Minimum Pulley Diameter (mm)
* @param float|null $minPulleyDiameter
* @return $this
*/
public function setMinPulleyDiameter (?float $minPulleyDiameter): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("minPulleyDiameter");
	$this->minPulleyDiameter = $fd->preSetData($this, $minPulleyDiameter);
	return $this;
}

/**
* Get minOutsidePulleyDiameter - Minimum Outside Pulley Diameter
* @return float|null
*/
public function getMinOutsidePulleyDiameter(): ?float
{
	$data = $this->minOutsidePulleyDiameter;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("minOutsidePulleyDiameter")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("minOutsidePulleyDiameter");
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
* Set minOutsidePulleyDiameter - Minimum Outside Pulley Diameter
* @param float|null $minOutsidePulleyDiameter
* @return $this
*/
public function setMinOutsidePulleyDiameter (?float $minOutsidePulleyDiameter): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("minOutsidePulleyDiameter");
	$this->minOutsidePulleyDiameter = $fd->preSetData($this, $minOutsidePulleyDiameter);
	return $this;
}

}

