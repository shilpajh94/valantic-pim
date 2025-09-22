<?php

/**
 * Fields Summary:
 * - beltThicknessMetric [quantityValue]
 * - beltThicknessImperial [quantityValue]
 * - toothHeightMetric [quantityValue]
 * - toothHeightImperial [quantityValue]
 * - pitchHeightMetric [quantityValue]
 * - pitchHeightImperial [quantityValue]
 * - pitchUOM [select]
 * - profile [input]
 * - nominalLength [select]
 * - beltAngle [input]
 * - maxSpeed [input]
 * - minPulleyDiameter [quantityValue]
 * - minOutsidePulleyDiameter [quantityValue]
 */

namespace Pimcore\Model\DataObject\Objectbrick\Data;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;


class UniPrSkPts extends \App\Model\DataObject\UniProductManagement\Objectbrick\AbstractUniPrSkeleton
{
public const FIELD_BELT_THICKNESS_METRIC = 'beltThicknessMetric';
public const FIELD_BELT_THICKNESS_IMPERIAL = 'beltThicknessImperial';
public const FIELD_TOOTH_HEIGHT_METRIC = 'toothHeightMetric';
public const FIELD_TOOTH_HEIGHT_IMPERIAL = 'toothHeightImperial';
public const FIELD_PITCH_HEIGHT_METRIC = 'pitchHeightMetric';
public const FIELD_PITCH_HEIGHT_IMPERIAL = 'pitchHeightImperial';
public const FIELD_PITCH_UOM = 'pitchUOM';
public const FIELD_PROFILE = 'profile';
public const FIELD_NOMINAL_LENGTH = 'nominalLength';
public const FIELD_BELT_ANGLE = 'beltAngle';
public const FIELD_MAX_SPEED = 'maxSpeed';
public const FIELD_MIN_PULLEY_DIAMETER = 'minPulleyDiameter';
public const FIELD_MIN_OUTSIDE_PULLEY_DIAMETER = 'minOutsidePulleyDiameter';

protected string $type = "UniPrSkPts";
protected $beltThicknessMetric;
protected $beltThicknessImperial;
protected $toothHeightMetric;
protected $toothHeightImperial;
protected $pitchHeightMetric;
protected $pitchHeightImperial;
protected $pitchUOM;
protected $profile;
protected $nominalLength;
protected $beltAngle;
protected $maxSpeed;
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
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getBeltThicknessMetric(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $beltThicknessMetric
* @return $this
*/
public function setBeltThicknessMetric (?\Pimcore\Model\DataObject\Data\QuantityValue $beltThicknessMetric): static
{
	$this->beltThicknessMetric = $beltThicknessMetric;

	return $this;
}

/**
* Get beltThicknessImperial - Belt Thickness (hs) (in)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getBeltThicknessImperial(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $beltThicknessImperial
* @return $this
*/
public function setBeltThicknessImperial (?\Pimcore\Model\DataObject\Data\QuantityValue $beltThicknessImperial): static
{
	$this->beltThicknessImperial = $beltThicknessImperial;

	return $this;
}

/**
* Get toothHeightMetric - Tooth Height (ht) (mm)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getToothHeightMetric(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $toothHeightMetric
* @return $this
*/
public function setToothHeightMetric (?\Pimcore\Model\DataObject\Data\QuantityValue $toothHeightMetric): static
{
	$this->toothHeightMetric = $toothHeightMetric;

	return $this;
}

/**
* Get toothHeightImperial - Tooth Height (ht) (in)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getToothHeightImperial(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $toothHeightImperial
* @return $this
*/
public function setToothHeightImperial (?\Pimcore\Model\DataObject\Data\QuantityValue $toothHeightImperial): static
{
	$this->toothHeightImperial = $toothHeightImperial;

	return $this;
}

/**
* Get pitchHeightMetric - Pitch height (hd/u) (mm)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getPitchHeightMetric(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $pitchHeightMetric
* @return $this
*/
public function setPitchHeightMetric (?\Pimcore\Model\DataObject\Data\QuantityValue $pitchHeightMetric): static
{
	$this->pitchHeightMetric = $pitchHeightMetric;

	return $this;
}

/**
* Get pitchHeightImperial - Pitch height (hd/u) (in)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getPitchHeightImperial(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $pitchHeightImperial
* @return $this
*/
public function setPitchHeightImperial (?\Pimcore\Model\DataObject\Data\QuantityValue $pitchHeightImperial): static
{
	$this->pitchHeightImperial = $pitchHeightImperial;

	return $this;
}

/**
* Get pitchUOM - Pitch Unit of Measure
* @return string|null
*/
public function getPitchUOM(): ?string
{
	$data = $this->pitchUOM;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("pitchUOM")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("pitchUOM");
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
* Set pitchUOM - Pitch Unit of Measure
* @param string|null $pitchUOM
* @return $this
*/
public function setPitchUOM (?string $pitchUOM): static
{
	$this->pitchUOM = $pitchUOM;

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
* Get minPulleyDiameter - Minimum Pulley Diameter (mm)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getMinPulleyDiameter(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $minPulleyDiameter
* @return $this
*/
public function setMinPulleyDiameter (?\Pimcore\Model\DataObject\Data\QuantityValue $minPulleyDiameter): static
{
	$this->minPulleyDiameter = $minPulleyDiameter;

	return $this;
}

/**
* Get minOutsidePulleyDiameter - Minimum Outside Pulley Diameter
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getMinOutsidePulleyDiameter(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $minOutsidePulleyDiameter
* @return $this
*/
public function setMinOutsidePulleyDiameter (?\Pimcore\Model\DataObject\Data\QuantityValue $minOutsidePulleyDiameter): static
{
	$this->minOutsidePulleyDiameter = $minOutsidePulleyDiameter;

	return $this;
}

}

