<?php

/**
 * Fields Summary:
 * - materialType [manyToOneRelation]
 * - numberOfTeeth [numeric]
 * - effectiveLengthMetric [numeric]
 * - pitchLengthMetric [numeric]
 * - datumLengthMetric [numeric]
 * - outsideLengthMetric [numeric]
 * - insideLengthMetric [numeric]
 * - refLengthLrMetric [numeric]
 * - refLineDiffHbMetric [numeric]
 * - heightMetric [numeric]
 * - widthMetric [numeric]
 * - profileHeightHMetric [numeric]
 * - ribPitchSMetric [numeric]
 * - pitchWidthBdMetric [numeric]
 * - pitchHeightHduMetric [numeric]
 * - lowerBeltWidthBiMetric [numeric]
 * - ribs [numeric]
 * - effectiveLengthImperial [numeric]
 * - pitchLengthImperial [numeric]
 * - datumLengthImperial [numeric]
 * - outsideLengthImperial [numeric]
 * - insideLengthImperial [numeric]
 * - refLengthLrImperial [numeric]
 * - refLineDiffHbImperial [numeric]
 * - heightImperial [numeric]
 * - widthImperial [numeric]
 * - profileHeightHImperial [numeric]
 * - ribPitchSImperial [numeric]
 * - pitchWidthBdImperial [numeric]
 * - pitchHeightHduImperial [numeric]
 * - lowerBeltWidthBiImperial [numeric]
 * - localizedfields [localizedfields]
 * -- matchMakerLL [input]
 * - maxPulleyGroove [numeric]
 * - finishing [input]
 * - beltType [manyToOneRelation]
 * - isLowPah [checkbox]
 */

namespace Pimcore\Model\DataObject\Objectbrick\Data;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;


class UniPrFgPts extends DataObject\Objectbrick\Data\AbstractData
{
public const FIELD_MATERIAL_TYPE = 'materialType';
public const FIELD_NUMBER_OF_TEETH = 'numberOfTeeth';
public const FIELD_EFFECTIVE_LENGTH_METRIC = 'effectiveLengthMetric';
public const FIELD_PITCH_LENGTH_METRIC = 'pitchLengthMetric';
public const FIELD_DATUM_LENGTH_METRIC = 'datumLengthMetric';
public const FIELD_OUTSIDE_LENGTH_METRIC = 'outsideLengthMetric';
public const FIELD_INSIDE_LENGTH_METRIC = 'insideLengthMetric';
public const FIELD_REF_LENGTH_LR_METRIC = 'refLengthLrMetric';
public const FIELD_REF_LINE_DIFF_HB_METRIC = 'refLineDiffHbMetric';
public const FIELD_HEIGHT_METRIC = 'heightMetric';
public const FIELD_WIDTH_METRIC = 'widthMetric';
public const FIELD_PROFILE_HEIGHT_HMETRIC = 'profileHeightHMetric';
public const FIELD_RIB_PITCH_SMETRIC = 'ribPitchSMetric';
public const FIELD_PITCH_WIDTH_BD_METRIC = 'pitchWidthBdMetric';
public const FIELD_PITCH_HEIGHT_HDU_METRIC = 'pitchHeightHduMetric';
public const FIELD_LOWER_BELT_WIDTH_BI_METRIC = 'lowerBeltWidthBiMetric';
public const FIELD_RIBS = 'ribs';
public const FIELD_EFFECTIVE_LENGTH_IMPERIAL = 'effectiveLengthImperial';
public const FIELD_PITCH_LENGTH_IMPERIAL = 'pitchLengthImperial';
public const FIELD_DATUM_LENGTH_IMPERIAL = 'datumLengthImperial';
public const FIELD_OUTSIDE_LENGTH_IMPERIAL = 'outsideLengthImperial';
public const FIELD_INSIDE_LENGTH_IMPERIAL = 'insideLengthImperial';
public const FIELD_REF_LENGTH_LR_IMPERIAL = 'refLengthLrImperial';
public const FIELD_REF_LINE_DIFF_HB_IMPERIAL = 'refLineDiffHbImperial';
public const FIELD_HEIGHT_IMPERIAL = 'heightImperial';
public const FIELD_WIDTH_IMPERIAL = 'widthImperial';
public const FIELD_PROFILE_HEIGHT_HIMPERIAL = 'profileHeightHImperial';
public const FIELD_RIB_PITCH_SIMPERIAL = 'ribPitchSImperial';
public const FIELD_PITCH_WIDTH_BD_IMPERIAL = 'pitchWidthBdImperial';
public const FIELD_PITCH_HEIGHT_HDU_IMPERIAL = 'pitchHeightHduImperial';
public const FIELD_LOWER_BELT_WIDTH_BI_IMPERIAL = 'lowerBeltWidthBiImperial';
public const FIELD_MATCH_MAKER_LL = 'matchMakerLL';
public const FIELD_MAX_PULLEY_GROOVE = 'maxPulleyGroove';
public const FIELD_FINISHING = 'finishing';
public const FIELD_BELT_TYPE = 'beltType';
public const FIELD_IS_LOW_PAH = 'isLowPah';

protected string $type = "UniPrFgPts";
protected $materialType;
protected $numberOfTeeth;
protected $effectiveLengthMetric;
protected $pitchLengthMetric;
protected $datumLengthMetric;
protected $outsideLengthMetric;
protected $insideLengthMetric;
protected $refLengthLrMetric;
protected $refLineDiffHbMetric;
protected $heightMetric;
protected $widthMetric;
protected $profileHeightHMetric;
protected $ribPitchSMetric;
protected $pitchWidthBdMetric;
protected $pitchHeightHduMetric;
protected $lowerBeltWidthBiMetric;
protected $ribs;
protected $effectiveLengthImperial;
protected $pitchLengthImperial;
protected $datumLengthImperial;
protected $outsideLengthImperial;
protected $insideLengthImperial;
protected $refLengthLrImperial;
protected $refLineDiffHbImperial;
protected $heightImperial;
protected $widthImperial;
protected $profileHeightHImperial;
protected $ribPitchSImperial;
protected $pitchWidthBdImperial;
protected $pitchHeightHduImperial;
protected $lowerBeltWidthBiImperial;
protected $localizedfields;
protected $maxPulleyGroove;
protected $finishing;
protected $beltType;
protected $isLowPah;


/**
* UniPrFgPts constructor.
* @param DataObject\Concrete $object
*/
public function __construct(DataObject\Concrete $object)
{
	parent::__construct($object);
	$this->markFieldDirty("_self");
}


/**
* Get materialType - Material Type
* @return \Pimcore\Model\DataObject\UniPrPtsMaterialType|null
*/
public function getMaterialType(): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getDefinition()->getFieldDefinition("materialType")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("materialType")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("materialType");
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
* Set materialType - Material Type
* @param \Pimcore\Model\DataObject\UniPrPtsMaterialType|null $materialType
* @return $this
*/
public function setMaterialType (?\Pimcore\Model\Element\AbstractElement $materialType): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("materialType");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getMaterialType();
		});
	}
	else {
		$currentData = $this->getMaterialType();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $materialType);
	if (!$isEqual) {
		$this->markFieldDirty("materialType", true);
	}
	$this->materialType = $fd->preSetData($this, $materialType);
	return $this;
}

/**
* Get numberOfTeeth - Number of teeth
* @return float|null
*/
public function getNumberOfTeeth(): ?float
{
	$data = $this->numberOfTeeth;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("numberOfTeeth")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("numberOfTeeth");
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
* Set numberOfTeeth - Number of teeth
* @param float|null $numberOfTeeth
* @return $this
*/
public function setNumberOfTeeth (?float $numberOfTeeth): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("numberOfTeeth");
	$this->numberOfTeeth = $fd->preSetData($this, $numberOfTeeth);
	return $this;
}

/**
* Get effectiveLengthMetric - Effective Length (mm)
* @return string|null
*/
public function getEffectiveLengthMetric(): ?string
{
	$data = $this->effectiveLengthMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("effectiveLengthMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("effectiveLengthMetric");
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
* Set effectiveLengthMetric - Effective Length (mm)
* @param string|null $effectiveLengthMetric
* @return $this
*/
public function setEffectiveLengthMetric (?string $effectiveLengthMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("effectiveLengthMetric");
	$this->effectiveLengthMetric = $fd->preSetData($this, $effectiveLengthMetric);
	return $this;
}

/**
* Get pitchLengthMetric - Pitch Length (mm)
* @return string|null
*/
public function getPitchLengthMetric(): ?string
{
	$data = $this->pitchLengthMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("pitchLengthMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("pitchLengthMetric");
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
* Set pitchLengthMetric - Pitch Length (mm)
* @param string|null $pitchLengthMetric
* @return $this
*/
public function setPitchLengthMetric (?string $pitchLengthMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("pitchLengthMetric");
	$this->pitchLengthMetric = $fd->preSetData($this, $pitchLengthMetric);
	return $this;
}

/**
* Get datumLengthMetric - Datum Length (mm)
* @return string|null
*/
public function getDatumLengthMetric(): ?string
{
	$data = $this->datumLengthMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("datumLengthMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("datumLengthMetric");
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
* Set datumLengthMetric - Datum Length (mm)
* @param string|null $datumLengthMetric
* @return $this
*/
public function setDatumLengthMetric (?string $datumLengthMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("datumLengthMetric");
	$this->datumLengthMetric = $fd->preSetData($this, $datumLengthMetric);
	return $this;
}

/**
* Get outsideLengthMetric - Outside Length (mm)
* @return string|null
*/
public function getOutsideLengthMetric(): ?string
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
* @param string|null $outsideLengthMetric
* @return $this
*/
public function setOutsideLengthMetric (?string $outsideLengthMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("outsideLengthMetric");
	$this->outsideLengthMetric = $fd->preSetData($this, $outsideLengthMetric);
	return $this;
}

/**
* Get insideLengthMetric - Inside Length (mm)
* @return string|null
*/
public function getInsideLengthMetric(): ?string
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
* @param string|null $insideLengthMetric
* @return $this
*/
public function setInsideLengthMetric (?string $insideLengthMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("insideLengthMetric");
	$this->insideLengthMetric = $fd->preSetData($this, $insideLengthMetric);
	return $this;
}

/**
* Get refLengthLrMetric - Reference. Length (Lr) (mm)
* @return string|null
*/
public function getRefLengthLrMetric(): ?string
{
	$data = $this->refLengthLrMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("refLengthLrMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("refLengthLrMetric");
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
* Set refLengthLrMetric - Reference. Length (Lr) (mm)
* @param string|null $refLengthLrMetric
* @return $this
*/
public function setRefLengthLrMetric (?string $refLengthLrMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("refLengthLrMetric");
	$this->refLengthLrMetric = $fd->preSetData($this, $refLengthLrMetric);
	return $this;
}

/**
* Get refLineDiffHbMetric - Reference line diff. (hb) (mm)
* @return string|null
*/
public function getRefLineDiffHbMetric(): ?string
{
	$data = $this->refLineDiffHbMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("refLineDiffHbMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("refLineDiffHbMetric");
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
* Set refLineDiffHbMetric - Reference line diff. (hb) (mm)
* @param string|null $refLineDiffHbMetric
* @return $this
*/
public function setRefLineDiffHbMetric (?string $refLineDiffHbMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("refLineDiffHbMetric");
	$this->refLineDiffHbMetric = $fd->preSetData($this, $refLineDiffHbMetric);
	return $this;
}

/**
* Get heightMetric - Height (mm)
* @return string|null
*/
public function getHeightMetric(): ?string
{
	$data = $this->heightMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("heightMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("heightMetric");
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
* Set heightMetric - Height (mm)
* @param string|null $heightMetric
* @return $this
*/
public function setHeightMetric (?string $heightMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("heightMetric");
	$this->heightMetric = $fd->preSetData($this, $heightMetric);
	return $this;
}

/**
* Get widthMetric - Width (mm)
* @return int|null
*/
public function getWidthMetric(): ?int
{
	$data = $this->widthMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("widthMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("widthMetric");
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
* Set widthMetric - Width (mm)
* @param int|null $widthMetric
* @return $this
*/
public function setWidthMetric (?int $widthMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("widthMetric");
	$this->widthMetric = $fd->preSetData($this, $widthMetric);
	return $this;
}

/**
* Get profileHeightHMetric - Profile Height (H) (mm)
* @return string|null
*/
public function getProfileHeightHMetric(): ?string
{
	$data = $this->profileHeightHMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("profileHeightHMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("profileHeightHMetric");
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
* Set profileHeightHMetric - Profile Height (H) (mm)
* @param string|null $profileHeightHMetric
* @return $this
*/
public function setProfileHeightHMetric (?string $profileHeightHMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("profileHeightHMetric");
	$this->profileHeightHMetric = $fd->preSetData($this, $profileHeightHMetric);
	return $this;
}

/**
* Get ribPitchSMetric - Rib Pitch (s) (mm)
* @return string|null
*/
public function getRibPitchSMetric(): ?string
{
	$data = $this->ribPitchSMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("ribPitchSMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("ribPitchSMetric");
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
* Set ribPitchSMetric - Rib Pitch (s) (mm)
* @param string|null $ribPitchSMetric
* @return $this
*/
public function setRibPitchSMetric (?string $ribPitchSMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("ribPitchSMetric");
	$this->ribPitchSMetric = $fd->preSetData($this, $ribPitchSMetric);
	return $this;
}

/**
* Get pitchWidthBdMetric - Pitch Width (bd) (mm)
* @return string|null
*/
public function getPitchWidthBdMetric(): ?string
{
	$data = $this->pitchWidthBdMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("pitchWidthBdMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("pitchWidthBdMetric");
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
* Set pitchWidthBdMetric - Pitch Width (bd) (mm)
* @param string|null $pitchWidthBdMetric
* @return $this
*/
public function setPitchWidthBdMetric (?string $pitchWidthBdMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("pitchWidthBdMetric");
	$this->pitchWidthBdMetric = $fd->preSetData($this, $pitchWidthBdMetric);
	return $this;
}

/**
* Get pitchHeightHduMetric - Pitch Height (hd/u) (mm)
* @return string|null
*/
public function getPitchHeightHduMetric(): ?string
{
	$data = $this->pitchHeightHduMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("pitchHeightHduMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("pitchHeightHduMetric");
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
* Set pitchHeightHduMetric - Pitch Height (hd/u) (mm)
* @param string|null $pitchHeightHduMetric
* @return $this
*/
public function setPitchHeightHduMetric (?string $pitchHeightHduMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("pitchHeightHduMetric");
	$this->pitchHeightHduMetric = $fd->preSetData($this, $pitchHeightHduMetric);
	return $this;
}

/**
* Get lowerBeltWidthBiMetric - Lower Belt Width (bi) (mm)
* @return string|null
*/
public function getLowerBeltWidthBiMetric(): ?string
{
	$data = $this->lowerBeltWidthBiMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("lowerBeltWidthBiMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("lowerBeltWidthBiMetric");
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
* Set lowerBeltWidthBiMetric - Lower Belt Width (bi) (mm)
* @param string|null $lowerBeltWidthBiMetric
* @return $this
*/
public function setLowerBeltWidthBiMetric (?string $lowerBeltWidthBiMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("lowerBeltWidthBiMetric");
	$this->lowerBeltWidthBiMetric = $fd->preSetData($this, $lowerBeltWidthBiMetric);
	return $this;
}

/**
* Get ribs - Ribs
* @return int|null
*/
public function getRibs(): ?int
{
	$data = $this->ribs;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("ribs")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("ribs");
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
* Set ribs - Ribs
* @param int|null $ribs
* @return $this
*/
public function setRibs (?int $ribs): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("ribs");
	$this->ribs = $fd->preSetData($this, $ribs);
	return $this;
}

/**
* Get effectiveLengthImperial - Effective Length (in)
* @return string|null
*/
public function getEffectiveLengthImperial(): ?string
{
	$data = $this->effectiveLengthImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("effectiveLengthImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("effectiveLengthImperial");
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
* Set effectiveLengthImperial - Effective Length (in)
* @param string|null $effectiveLengthImperial
* @return $this
*/
public function setEffectiveLengthImperial (?string $effectiveLengthImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("effectiveLengthImperial");
	$this->effectiveLengthImperial = $fd->preSetData($this, $effectiveLengthImperial);
	return $this;
}

/**
* Get pitchLengthImperial - Pitch Length (in)
* @return string|null
*/
public function getPitchLengthImperial(): ?string
{
	$data = $this->pitchLengthImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("pitchLengthImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("pitchLengthImperial");
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
* Set pitchLengthImperial - Pitch Length (in)
* @param string|null $pitchLengthImperial
* @return $this
*/
public function setPitchLengthImperial (?string $pitchLengthImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("pitchLengthImperial");
	$this->pitchLengthImperial = $fd->preSetData($this, $pitchLengthImperial);
	return $this;
}

/**
* Get datumLengthImperial - Datum Length (in)
* @return string|null
*/
public function getDatumLengthImperial(): ?string
{
	$data = $this->datumLengthImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("datumLengthImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("datumLengthImperial");
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
* Set datumLengthImperial - Datum Length (in)
* @param string|null $datumLengthImperial
* @return $this
*/
public function setDatumLengthImperial (?string $datumLengthImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("datumLengthImperial");
	$this->datumLengthImperial = $fd->preSetData($this, $datumLengthImperial);
	return $this;
}

/**
* Get outsideLengthImperial - Outside Length (in)
* @return string|null
*/
public function getOutsideLengthImperial(): ?string
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
* @param string|null $outsideLengthImperial
* @return $this
*/
public function setOutsideLengthImperial (?string $outsideLengthImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("outsideLengthImperial");
	$this->outsideLengthImperial = $fd->preSetData($this, $outsideLengthImperial);
	return $this;
}

/**
* Get insideLengthImperial - Inside Length (in)
* @return string|null
*/
public function getInsideLengthImperial(): ?string
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
* @param string|null $insideLengthImperial
* @return $this
*/
public function setInsideLengthImperial (?string $insideLengthImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("insideLengthImperial");
	$this->insideLengthImperial = $fd->preSetData($this, $insideLengthImperial);
	return $this;
}

/**
* Get refLengthLrImperial - Refierence. Length (Lr) (in)
* @return string|null
*/
public function getRefLengthLrImperial(): ?string
{
	$data = $this->refLengthLrImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("refLengthLrImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("refLengthLrImperial");
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
* Set refLengthLrImperial - Refierence. Length (Lr) (in)
* @param string|null $refLengthLrImperial
* @return $this
*/
public function setRefLengthLrImperial (?string $refLengthLrImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("refLengthLrImperial");
	$this->refLengthLrImperial = $fd->preSetData($this, $refLengthLrImperial);
	return $this;
}

/**
* Get refLineDiffHbImperial - Reference line diff. (hb) (in)
* @return string|null
*/
public function getRefLineDiffHbImperial(): ?string
{
	$data = $this->refLineDiffHbImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("refLineDiffHbImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("refLineDiffHbImperial");
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
* Set refLineDiffHbImperial - Reference line diff. (hb) (in)
* @param string|null $refLineDiffHbImperial
* @return $this
*/
public function setRefLineDiffHbImperial (?string $refLineDiffHbImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("refLineDiffHbImperial");
	$this->refLineDiffHbImperial = $fd->preSetData($this, $refLineDiffHbImperial);
	return $this;
}

/**
* Get heightImperial - Height (in)
* @return string|null
*/
public function getHeightImperial(): ?string
{
	$data = $this->heightImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("heightImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("heightImperial");
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
* Set heightImperial - Height (in)
* @param string|null $heightImperial
* @return $this
*/
public function setHeightImperial (?string $heightImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("heightImperial");
	$this->heightImperial = $fd->preSetData($this, $heightImperial);
	return $this;
}

/**
* Get widthImperial - Width (in)
* @return string|null
*/
public function getWidthImperial(): ?string
{
	$data = $this->widthImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("widthImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("widthImperial");
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
* Set widthImperial - Width (in)
* @param string|null $widthImperial
* @return $this
*/
public function setWidthImperial (?string $widthImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("widthImperial");
	$this->widthImperial = $fd->preSetData($this, $widthImperial);
	return $this;
}

/**
* Get profileHeightHImperial - Profile Height (H) (in)
* @return string|null
*/
public function getProfileHeightHImperial(): ?string
{
	$data = $this->profileHeightHImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("profileHeightHImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("profileHeightHImperial");
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
* Set profileHeightHImperial - Profile Height (H) (in)
* @param string|null $profileHeightHImperial
* @return $this
*/
public function setProfileHeightHImperial (?string $profileHeightHImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("profileHeightHImperial");
	$this->profileHeightHImperial = $fd->preSetData($this, $profileHeightHImperial);
	return $this;
}

/**
* Get ribPitchSImperial - Rib Pitch (s) (In)
* @return string|null
*/
public function getRibPitchSImperial(): ?string
{
	$data = $this->ribPitchSImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("ribPitchSImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("ribPitchSImperial");
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
* Set ribPitchSImperial - Rib Pitch (s) (In)
* @param string|null $ribPitchSImperial
* @return $this
*/
public function setRibPitchSImperial (?string $ribPitchSImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("ribPitchSImperial");
	$this->ribPitchSImperial = $fd->preSetData($this, $ribPitchSImperial);
	return $this;
}

/**
* Get pitchWidthBdImperial - Pitch Width (bd) (In)
* @return string|null
*/
public function getPitchWidthBdImperial(): ?string
{
	$data = $this->pitchWidthBdImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("pitchWidthBdImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("pitchWidthBdImperial");
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
* Set pitchWidthBdImperial - Pitch Width (bd) (In)
* @param string|null $pitchWidthBdImperial
* @return $this
*/
public function setPitchWidthBdImperial (?string $pitchWidthBdImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("pitchWidthBdImperial");
	$this->pitchWidthBdImperial = $fd->preSetData($this, $pitchWidthBdImperial);
	return $this;
}

/**
* Get pitchHeightHduImperial - Pitch Height (hd/u) (in)
* @return string|null
*/
public function getPitchHeightHduImperial(): ?string
{
	$data = $this->pitchHeightHduImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("pitchHeightHduImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("pitchHeightHduImperial");
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
* Set pitchHeightHduImperial - Pitch Height (hd/u) (in)
* @param string|null $pitchHeightHduImperial
* @return $this
*/
public function setPitchHeightHduImperial (?string $pitchHeightHduImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("pitchHeightHduImperial");
	$this->pitchHeightHduImperial = $fd->preSetData($this, $pitchHeightHduImperial);
	return $this;
}

/**
* Get lowerBeltWidthBiImperial - Lower belt width (bi) (in)
* @return string|null
*/
public function getLowerBeltWidthBiImperial(): ?string
{
	$data = $this->lowerBeltWidthBiImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("lowerBeltWidthBiImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("lowerBeltWidthBiImperial");
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
* Set lowerBeltWidthBiImperial - Lower belt width (bi) (in)
* @param string|null $lowerBeltWidthBiImperial
* @return $this
*/
public function setLowerBeltWidthBiImperial (?string $lowerBeltWidthBiImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("lowerBeltWidthBiImperial");
	$this->lowerBeltWidthBiImperial = $fd->preSetData($this, $lowerBeltWidthBiImperial);
	return $this;
}

/**
* Get localizedfields - 
* @return \Pimcore\Model\DataObject\Localizedfield|null
*/
public function getLocalizedfields(): ?\Pimcore\Model\DataObject\Localizedfield
{
	$data = $this->getDefinition()->getFieldDefinition("localizedfields")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("localizedfields")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("localizedfields");
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
* Get matchMakerLL - MATCHMAKER
* @return string|null
*/
public function getMatchMakerLL(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("matchMakerLL", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set localizedfields - 
* @param \Pimcore\Model\DataObject\Localizedfield|null $localizedfields
* @return $this
*/
public function setLocalizedfields (?\Pimcore\Model\DataObject\Localizedfield $localizedfields): static
{
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getLocalizedfields();
		});
	}
	else {
		$currentData = $this->getLocalizedfields();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$this->markFieldDirty("localizedfields", true);
	$this->localizedfields = $localizedfields;

	return $this;
}

/**
* Set matchMakerLL - MATCHMAKER
* @param string|null $matchMakerLL
* @return $this
*/
public function setMatchMakerLL (?string $matchMakerLL, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("matchMakerLL", $matchMakerLL, $language, !$isEqual);

	return $this;
}

/**
* Get maxPulleyGroove - Max Pulley Groove
* @return string|null
*/
public function getMaxPulleyGroove(): ?string
{
	$data = $this->maxPulleyGroove;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("maxPulleyGroove")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("maxPulleyGroove");
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
* Set maxPulleyGroove - Max Pulley Groove
* @param string|null $maxPulleyGroove
* @return $this
*/
public function setMaxPulleyGroove (?string $maxPulleyGroove): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("maxPulleyGroove");
	$this->maxPulleyGroove = $fd->preSetData($this, $maxPulleyGroove);
	return $this;
}

/**
* Get finishing - Finishing
* @return string|null
*/
public function getFinishing(): ?string
{
	$data = $this->finishing;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("finishing")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("finishing");
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
* Set finishing - Finishing
* @param string|null $finishing
* @return $this
*/
public function setFinishing (?string $finishing): static
{
	$this->finishing = $finishing;

	return $this;
}

/**
* Get beltType - Belt Type
* @return \Pimcore\Model\DataObject\UniPrPtsBeltType|null
*/
public function getBeltType(): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getDefinition()->getFieldDefinition("beltType")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("beltType")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("beltType");
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
* Set beltType - Belt Type
* @param \Pimcore\Model\DataObject\UniPrPtsBeltType|null $beltType
* @return $this
*/
public function setBeltType (?\Pimcore\Model\Element\AbstractElement $beltType): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("beltType");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getBeltType();
		});
	}
	else {
		$currentData = $this->getBeltType();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $beltType);
	if (!$isEqual) {
		$this->markFieldDirty("beltType", true);
	}
	$this->beltType = $fd->preSetData($this, $beltType);
	return $this;
}

/**
* Get isLowPah - Low PAH  (Polyhydroxyalkanoate)
* @return bool|null
*/
public function getIsLowPah(): ?bool
{
	$data = $this->isLowPah;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("isLowPah")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("isLowPah");
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
* Set isLowPah - Low PAH  (Polyhydroxyalkanoate)
* @param bool|null $isLowPah
* @return $this
*/
public function setIsLowPah (?bool $isLowPah): static
{
	$this->isLowPah = $isLowPah;

	return $this;
}

}

