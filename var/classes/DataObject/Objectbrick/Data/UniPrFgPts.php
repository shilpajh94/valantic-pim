<?php

/**
 * Fields Summary:
 * - localizedfields [localizedfields]
 * -- materialType [manyToOneRelation]
 * -- matchMakerLL [input]
 * - numberOfTeeth [numeric]
 * - effectiveLengthMetric [quantityValue]
 * - effectiveLengthImperial [quantityValue]
 * - effectiveLengthUOM [select]
 * - pitchLengthMetric [quantityValue]
 * - pitchLengthImperial [quantityValue]
 * - pitchLengthUOM [select]
 * - datumLengthMetric [quantityValue]
 * - datumLengthImperial [quantityValue]
 * - outsideLengthMetric [quantityValue]
 * - outsideLengthImperial [quantityValue]
 * - insideLengthMetric [quantityValue]
 * - insideLengthImperial [quantityValue]
 * - refLengthLrMetric [quantityValue]
 * - refLengthLrImperial [quantityValue]
 * - refLineDiffHbMetric [quantityValue]
 * - refLineDiffHbImperial [quantityValue]
 * - heightMetric [quantityValue]
 * - heightImperial [quantityValue]
 * - heightUOM [select]
 * - widthMetric [quantityValue]
 * - widthImperial [quantityValue]
 * - widthUOM [select]
 * - profileHeightHMetric [quantityValue]
 * - profileHeightHImperial [quantityValue]
 * - ribPitchSMetric [quantityValue]
 * - ribPitchSImperial [quantityValue]
 * - pitchWidthBdMetric [quantityValue]
 * - pitchWidthBdImperial [quantityValue]
 * - pitchHeightHduMetric [quantityValue]
 * - pitchHeightHduImperial [quantityValue]
 * - lowerBeltWidthBiMetric [quantityValue]
 * - lowerBeltWidthBiImperial [quantityValue]
 * - ribs [numeric]
 * - maxPulleyGroove [numeric]
 * - finishing [input]
 * - isLowPah [checkbox]
 */

namespace Pimcore\Model\DataObject\Objectbrick\Data;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;


class UniPrFgPts extends DataObject\Objectbrick\Data\AbstractData
{
public const FIELD_MATERIAL_TYPE = 'materialType';
public const FIELD_MATCH_MAKER_LL = 'matchMakerLL';
public const FIELD_NUMBER_OF_TEETH = 'numberOfTeeth';
public const FIELD_EFFECTIVE_LENGTH_METRIC = 'effectiveLengthMetric';
public const FIELD_EFFECTIVE_LENGTH_IMPERIAL = 'effectiveLengthImperial';
public const FIELD_EFFECTIVE_LENGTH_UOM = 'effectiveLengthUOM';
public const FIELD_PITCH_LENGTH_METRIC = 'pitchLengthMetric';
public const FIELD_PITCH_LENGTH_IMPERIAL = 'pitchLengthImperial';
public const FIELD_PITCH_LENGTH_UOM = 'pitchLengthUOM';
public const FIELD_DATUM_LENGTH_METRIC = 'datumLengthMetric';
public const FIELD_DATUM_LENGTH_IMPERIAL = 'datumLengthImperial';
public const FIELD_OUTSIDE_LENGTH_METRIC = 'outsideLengthMetric';
public const FIELD_OUTSIDE_LENGTH_IMPERIAL = 'outsideLengthImperial';
public const FIELD_INSIDE_LENGTH_METRIC = 'insideLengthMetric';
public const FIELD_INSIDE_LENGTH_IMPERIAL = 'insideLengthImperial';
public const FIELD_REF_LENGTH_LR_METRIC = 'refLengthLrMetric';
public const FIELD_REF_LENGTH_LR_IMPERIAL = 'refLengthLrImperial';
public const FIELD_REF_LINE_DIFF_HB_METRIC = 'refLineDiffHbMetric';
public const FIELD_REF_LINE_DIFF_HB_IMPERIAL = 'refLineDiffHbImperial';
public const FIELD_HEIGHT_METRIC = 'heightMetric';
public const FIELD_HEIGHT_IMPERIAL = 'heightImperial';
public const FIELD_HEIGHT_UOM = 'heightUOM';
public const FIELD_WIDTH_METRIC = 'widthMetric';
public const FIELD_WIDTH_IMPERIAL = 'widthImperial';
public const FIELD_WIDTH_UOM = 'widthUOM';
public const FIELD_PROFILE_HEIGHT_HMETRIC = 'profileHeightHMetric';
public const FIELD_PROFILE_HEIGHT_HIMPERIAL = 'profileHeightHImperial';
public const FIELD_RIB_PITCH_SMETRIC = 'ribPitchSMetric';
public const FIELD_RIB_PITCH_SIMPERIAL = 'ribPitchSImperial';
public const FIELD_PITCH_WIDTH_BD_METRIC = 'pitchWidthBdMetric';
public const FIELD_PITCH_WIDTH_BD_IMPERIAL = 'pitchWidthBdImperial';
public const FIELD_PITCH_HEIGHT_HDU_METRIC = 'pitchHeightHduMetric';
public const FIELD_PITCH_HEIGHT_HDU_IMPERIAL = 'pitchHeightHduImperial';
public const FIELD_LOWER_BELT_WIDTH_BI_METRIC = 'lowerBeltWidthBiMetric';
public const FIELD_LOWER_BELT_WIDTH_BI_IMPERIAL = 'lowerBeltWidthBiImperial';
public const FIELD_RIBS = 'ribs';
public const FIELD_MAX_PULLEY_GROOVE = 'maxPulleyGroove';
public const FIELD_FINISHING = 'finishing';
public const FIELD_IS_LOW_PAH = 'isLowPah';

protected string $type = "UniPrFgPts";
protected $localizedfields;
protected $numberOfTeeth;
protected $effectiveLengthMetric;
protected $effectiveLengthImperial;
protected $effectiveLengthUOM;
protected $pitchLengthMetric;
protected $pitchLengthImperial;
protected $pitchLengthUOM;
protected $datumLengthMetric;
protected $datumLengthImperial;
protected $outsideLengthMetric;
protected $outsideLengthImperial;
protected $insideLengthMetric;
protected $insideLengthImperial;
protected $refLengthLrMetric;
protected $refLengthLrImperial;
protected $refLineDiffHbMetric;
protected $refLineDiffHbImperial;
protected $heightMetric;
protected $heightImperial;
protected $heightUOM;
protected $widthMetric;
protected $widthImperial;
protected $widthUOM;
protected $profileHeightHMetric;
protected $profileHeightHImperial;
protected $ribPitchSMetric;
protected $ribPitchSImperial;
protected $pitchWidthBdMetric;
protected $pitchWidthBdImperial;
protected $pitchHeightHduMetric;
protected $pitchHeightHduImperial;
protected $lowerBeltWidthBiMetric;
protected $lowerBeltWidthBiImperial;
protected $ribs;
protected $maxPulleyGroove;
protected $finishing;
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
* Get materialType - Material Type
* @return \Pimcore\Model\DataObject\UniPrPtsMaterialType|null
*/
public function getMaterialType(?string $language = null): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getLocalizedfields()->getLocalizedValue("materialType", $language);
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
* Set materialType - Material Type
* @param \Pimcore\Model\DataObject\UniPrPtsMaterialType|null $materialType
* @return $this
*/
public function setMaterialType (?\Pimcore\Model\Element\AbstractElement $materialType, ?string $language = null): static
{
	$fd = $this->getDefinition()->getFieldDefinition("localizedfields")->getFieldDefinition("materialType");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getMaterialType($language);
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $materialType);
	if (!$isEqual) {
		$this->markFieldDirty("materialType", true);
	}
	$this->getLocalizedfields()->setLocalizedValue("materialType", $materialType, $language, !$isEqual);

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
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getEffectiveLengthMetric(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $effectiveLengthMetric
* @return $this
*/
public function setEffectiveLengthMetric (?\Pimcore\Model\DataObject\Data\QuantityValue $effectiveLengthMetric): static
{
	$this->effectiveLengthMetric = $effectiveLengthMetric;

	return $this;
}

/**
* Get effectiveLengthImperial - Effective Length (in)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getEffectiveLengthImperial(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $effectiveLengthImperial
* @return $this
*/
public function setEffectiveLengthImperial (?\Pimcore\Model\DataObject\Data\QuantityValue $effectiveLengthImperial): static
{
	$this->effectiveLengthImperial = $effectiveLengthImperial;

	return $this;
}

/**
* Get effectiveLengthUOM - Effective Length UOM
* @return string|null
*/
public function getEffectiveLengthUOM(): ?string
{
	$data = $this->effectiveLengthUOM;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("effectiveLengthUOM")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("effectiveLengthUOM");
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
* Set effectiveLengthUOM - Effective Length UOM
* @param string|null $effectiveLengthUOM
* @return $this
*/
public function setEffectiveLengthUOM (?string $effectiveLengthUOM): static
{
	$this->effectiveLengthUOM = $effectiveLengthUOM;

	return $this;
}

/**
* Get pitchLengthMetric - Pitch Length (mm)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getPitchLengthMetric(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $pitchLengthMetric
* @return $this
*/
public function setPitchLengthMetric (?\Pimcore\Model\DataObject\Data\QuantityValue $pitchLengthMetric): static
{
	$this->pitchLengthMetric = $pitchLengthMetric;

	return $this;
}

/**
* Get pitchLengthImperial - Pitch Length (in)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getPitchLengthImperial(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $pitchLengthImperial
* @return $this
*/
public function setPitchLengthImperial (?\Pimcore\Model\DataObject\Data\QuantityValue $pitchLengthImperial): static
{
	$this->pitchLengthImperial = $pitchLengthImperial;

	return $this;
}

/**
* Get pitchLengthUOM - Pitch Length UOM
* @return string|null
*/
public function getPitchLengthUOM(): ?string
{
	$data = $this->pitchLengthUOM;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("pitchLengthUOM")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("pitchLengthUOM");
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
* Set pitchLengthUOM - Pitch Length UOM
* @param string|null $pitchLengthUOM
* @return $this
*/
public function setPitchLengthUOM (?string $pitchLengthUOM): static
{
	$this->pitchLengthUOM = $pitchLengthUOM;

	return $this;
}

/**
* Get datumLengthMetric - Datum Length (mm)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getDatumLengthMetric(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $datumLengthMetric
* @return $this
*/
public function setDatumLengthMetric (?\Pimcore\Model\DataObject\Data\QuantityValue $datumLengthMetric): static
{
	$this->datumLengthMetric = $datumLengthMetric;

	return $this;
}

/**
* Get datumLengthImperial - Datum Length (in)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getDatumLengthImperial(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $datumLengthImperial
* @return $this
*/
public function setDatumLengthImperial (?\Pimcore\Model\DataObject\Data\QuantityValue $datumLengthImperial): static
{
	$this->datumLengthImperial = $datumLengthImperial;

	return $this;
}

/**
* Get outsideLengthMetric - Outside Length (mm)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getOutsideLengthMetric(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $outsideLengthMetric
* @return $this
*/
public function setOutsideLengthMetric (?\Pimcore\Model\DataObject\Data\QuantityValue $outsideLengthMetric): static
{
	$this->outsideLengthMetric = $outsideLengthMetric;

	return $this;
}

/**
* Get outsideLengthImperial - Outside Length (in)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getOutsideLengthImperial(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $outsideLengthImperial
* @return $this
*/
public function setOutsideLengthImperial (?\Pimcore\Model\DataObject\Data\QuantityValue $outsideLengthImperial): static
{
	$this->outsideLengthImperial = $outsideLengthImperial;

	return $this;
}

/**
* Get insideLengthMetric - Inside Length (mm)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getInsideLengthMetric(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $insideLengthMetric
* @return $this
*/
public function setInsideLengthMetric (?\Pimcore\Model\DataObject\Data\QuantityValue $insideLengthMetric): static
{
	$this->insideLengthMetric = $insideLengthMetric;

	return $this;
}

/**
* Get insideLengthImperial - Inside Length (in)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getInsideLengthImperial(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $insideLengthImperial
* @return $this
*/
public function setInsideLengthImperial (?\Pimcore\Model\DataObject\Data\QuantityValue $insideLengthImperial): static
{
	$this->insideLengthImperial = $insideLengthImperial;

	return $this;
}

/**
* Get refLengthLrMetric - Reference. Length (Lr) (mm)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getRefLengthLrMetric(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $refLengthLrMetric
* @return $this
*/
public function setRefLengthLrMetric (?\Pimcore\Model\DataObject\Data\QuantityValue $refLengthLrMetric): static
{
	$this->refLengthLrMetric = $refLengthLrMetric;

	return $this;
}

/**
* Get refLengthLrImperial - Refierence. Length (Lr) (in)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getRefLengthLrImperial(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $refLengthLrImperial
* @return $this
*/
public function setRefLengthLrImperial (?\Pimcore\Model\DataObject\Data\QuantityValue $refLengthLrImperial): static
{
	$this->refLengthLrImperial = $refLengthLrImperial;

	return $this;
}

/**
* Get refLineDiffHbMetric - Reference line diff. (hb) (mm)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getRefLineDiffHbMetric(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $refLineDiffHbMetric
* @return $this
*/
public function setRefLineDiffHbMetric (?\Pimcore\Model\DataObject\Data\QuantityValue $refLineDiffHbMetric): static
{
	$this->refLineDiffHbMetric = $refLineDiffHbMetric;

	return $this;
}

/**
* Get refLineDiffHbImperial - Reference line diff. (hb) (in)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getRefLineDiffHbImperial(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $refLineDiffHbImperial
* @return $this
*/
public function setRefLineDiffHbImperial (?\Pimcore\Model\DataObject\Data\QuantityValue $refLineDiffHbImperial): static
{
	$this->refLineDiffHbImperial = $refLineDiffHbImperial;

	return $this;
}

/**
* Get heightMetric - Height (mm)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getHeightMetric(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $heightMetric
* @return $this
*/
public function setHeightMetric (?\Pimcore\Model\DataObject\Data\QuantityValue $heightMetric): static
{
	$this->heightMetric = $heightMetric;

	return $this;
}

/**
* Get heightImperial - Height (in)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getHeightImperial(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $heightImperial
* @return $this
*/
public function setHeightImperial (?\Pimcore\Model\DataObject\Data\QuantityValue $heightImperial): static
{
	$this->heightImperial = $heightImperial;

	return $this;
}

/**
* Get heightUOM - Height UOM
* @return string|null
*/
public function getHeightUOM(): ?string
{
	$data = $this->heightUOM;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("heightUOM")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("heightUOM");
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
* Set heightUOM - Height UOM
* @param string|null $heightUOM
* @return $this
*/
public function setHeightUOM (?string $heightUOM): static
{
	$this->heightUOM = $heightUOM;

	return $this;
}

/**
* Get widthMetric - Width (mm)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getWidthMetric(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $widthMetric
* @return $this
*/
public function setWidthMetric (?\Pimcore\Model\DataObject\Data\QuantityValue $widthMetric): static
{
	$this->widthMetric = $widthMetric;

	return $this;
}

/**
* Get widthImperial - Width (in)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getWidthImperial(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $widthImperial
* @return $this
*/
public function setWidthImperial (?\Pimcore\Model\DataObject\Data\QuantityValue $widthImperial): static
{
	$this->widthImperial = $widthImperial;

	return $this;
}

/**
* Get widthUOM - Width UOM
* @return string|null
*/
public function getWidthUOM(): ?string
{
	$data = $this->widthUOM;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("widthUOM")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("widthUOM");
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
* Set widthUOM - Width UOM
* @param string|null $widthUOM
* @return $this
*/
public function setWidthUOM (?string $widthUOM): static
{
	$this->widthUOM = $widthUOM;

	return $this;
}

/**
* Get profileHeightHMetric - Profile Height (H) (mm)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getProfileHeightHMetric(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $profileHeightHMetric
* @return $this
*/
public function setProfileHeightHMetric (?\Pimcore\Model\DataObject\Data\QuantityValue $profileHeightHMetric): static
{
	$this->profileHeightHMetric = $profileHeightHMetric;

	return $this;
}

/**
* Get profileHeightHImperial - Profile Height (H) (in)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getProfileHeightHImperial(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $profileHeightHImperial
* @return $this
*/
public function setProfileHeightHImperial (?\Pimcore\Model\DataObject\Data\QuantityValue $profileHeightHImperial): static
{
	$this->profileHeightHImperial = $profileHeightHImperial;

	return $this;
}

/**
* Get ribPitchSMetric - Rib Pitch (s) (mm)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getRibPitchSMetric(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $ribPitchSMetric
* @return $this
*/
public function setRibPitchSMetric (?\Pimcore\Model\DataObject\Data\QuantityValue $ribPitchSMetric): static
{
	$this->ribPitchSMetric = $ribPitchSMetric;

	return $this;
}

/**
* Get ribPitchSImperial - Rib Pitch (s) (In)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getRibPitchSImperial(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $ribPitchSImperial
* @return $this
*/
public function setRibPitchSImperial (?\Pimcore\Model\DataObject\Data\QuantityValue $ribPitchSImperial): static
{
	$this->ribPitchSImperial = $ribPitchSImperial;

	return $this;
}

/**
* Get pitchWidthBdMetric - Pitch Width (bd) (mm)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getPitchWidthBdMetric(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $pitchWidthBdMetric
* @return $this
*/
public function setPitchWidthBdMetric (?\Pimcore\Model\DataObject\Data\QuantityValue $pitchWidthBdMetric): static
{
	$this->pitchWidthBdMetric = $pitchWidthBdMetric;

	return $this;
}

/**
* Get pitchWidthBdImperial - Pitch Width (bd) (In)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getPitchWidthBdImperial(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $pitchWidthBdImperial
* @return $this
*/
public function setPitchWidthBdImperial (?\Pimcore\Model\DataObject\Data\QuantityValue $pitchWidthBdImperial): static
{
	$this->pitchWidthBdImperial = $pitchWidthBdImperial;

	return $this;
}

/**
* Get pitchHeightHduMetric - Pitch Height (hd/u) (mm)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getPitchHeightHduMetric(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $pitchHeightHduMetric
* @return $this
*/
public function setPitchHeightHduMetric (?\Pimcore\Model\DataObject\Data\QuantityValue $pitchHeightHduMetric): static
{
	$this->pitchHeightHduMetric = $pitchHeightHduMetric;

	return $this;
}

/**
* Get pitchHeightHduImperial - Pitch Height (hd/u) (in)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getPitchHeightHduImperial(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $pitchHeightHduImperial
* @return $this
*/
public function setPitchHeightHduImperial (?\Pimcore\Model\DataObject\Data\QuantityValue $pitchHeightHduImperial): static
{
	$this->pitchHeightHduImperial = $pitchHeightHduImperial;

	return $this;
}

/**
* Get lowerBeltWidthBiMetric - Lower Belt Width (bi) (mm)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getLowerBeltWidthBiMetric(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $lowerBeltWidthBiMetric
* @return $this
*/
public function setLowerBeltWidthBiMetric (?\Pimcore\Model\DataObject\Data\QuantityValue $lowerBeltWidthBiMetric): static
{
	$this->lowerBeltWidthBiMetric = $lowerBeltWidthBiMetric;

	return $this;
}

/**
* Get lowerBeltWidthBiImperial - Lower belt width (bi) (in)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getLowerBeltWidthBiImperial(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $lowerBeltWidthBiImperial
* @return $this
*/
public function setLowerBeltWidthBiImperial (?\Pimcore\Model\DataObject\Data\QuantityValue $lowerBeltWidthBiImperial): static
{
	$this->lowerBeltWidthBiImperial = $lowerBeltWidthBiImperial;

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

