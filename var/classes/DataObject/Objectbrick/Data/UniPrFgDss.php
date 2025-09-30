<?php

/**
 * Fields Summary:
 * - modelType [manyToOneRelation]
 * - isBellowOnlyPart [checkbox]
 * - minimumHeightMetric [numeric]
 * - maximumHeightMetric [numeric]
 * - maximumBellowDiameterMetric [numeric]
 * - maximumStrokeMetric [numeric]
 * - workingPressureBar [numeric]
 * - workingPressureMpa [numeric]
 * - minimumHeightImperial [numeric]
 * - maximumHeightImperial [numeric]
 * - maximumBellowDiameterImperial [numeric]
 * - maximumStrokeImperial [numeric]
 * - workingPressurePsi [numeric]
 * - numberOfConvolutions [numeric]
 * - bellowCompoundMaterial [manyToOneRelation]
 * - rollingLobePistonMaterial [manyToOneRelation]
 * - airInletThread [input]
 * - airInletInsideThread [manyToOneRelation]
 * - airInletLocation [manyToOneRelation]
 * - localizedfields [localizedfields]
 * -- hasInternalBumper [checkbox]
 * -- basePlateMaterial [input]
 * - permissibleInstallationSpace [image]
 */

namespace Pimcore\Model\DataObject\Objectbrick\Data;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;


class UniPrFgDss extends DataObject\Objectbrick\Data\AbstractData
{
public const FIELD_MODEL_TYPE = 'modelType';
public const FIELD_IS_BELLOW_ONLY_PART = 'isBellowOnlyPart';
public const FIELD_MINIMUM_HEIGHT_METRIC = 'minimumHeightMetric';
public const FIELD_MAXIMUM_HEIGHT_METRIC = 'maximumHeightMetric';
public const FIELD_MAXIMUM_BELLOW_DIAMETER_METRIC = 'maximumBellowDiameterMetric';
public const FIELD_MAXIMUM_STROKE_METRIC = 'maximumStrokeMetric';
public const FIELD_WORKING_PRESSURE_BAR = 'workingPressureBar';
public const FIELD_WORKING_PRESSURE_MPA = 'workingPressureMpa';
public const FIELD_MINIMUM_HEIGHT_IMPERIAL = 'minimumHeightImperial';
public const FIELD_MAXIMUM_HEIGHT_IMPERIAL = 'maximumHeightImperial';
public const FIELD_MAXIMUM_BELLOW_DIAMETER_IMPERIAL = 'maximumBellowDiameterImperial';
public const FIELD_MAXIMUM_STROKE_IMPERIAL = 'maximumStrokeImperial';
public const FIELD_WORKING_PRESSURE_PSI = 'workingPressurePsi';
public const FIELD_NUMBER_OF_CONVOLUTIONS = 'numberOfConvolutions';
public const FIELD_BELLOW_COMPOUND_MATERIAL = 'bellowCompoundMaterial';
public const FIELD_ROLLING_LOBE_PISTON_MATERIAL = 'rollingLobePistonMaterial';
public const FIELD_AIR_INLET_THREAD = 'airInletThread';
public const FIELD_AIR_INLET_INSIDE_THREAD = 'airInletInsideThread';
public const FIELD_AIR_INLET_LOCATION = 'airInletLocation';
public const FIELD_HAS_INTERNAL_BUMPER = 'hasInternalBumper';
public const FIELD_BASE_PLATE_MATERIAL = 'basePlateMaterial';
public const FIELD_PERMISSIBLE_INSTALLATION_SPACE = 'permissibleInstallationSpace';

protected string $type = "UniPrFgDss";
protected $modelType;
protected $isBellowOnlyPart;
protected $minimumHeightMetric;
protected $maximumHeightMetric;
protected $maximumBellowDiameterMetric;
protected $maximumStrokeMetric;
protected $workingPressureBar;
protected $workingPressureMpa;
protected $minimumHeightImperial;
protected $maximumHeightImperial;
protected $maximumBellowDiameterImperial;
protected $maximumStrokeImperial;
protected $workingPressurePsi;
protected $numberOfConvolutions;
protected $bellowCompoundMaterial;
protected $rollingLobePistonMaterial;
protected $airInletThread;
protected $airInletInsideThread;
protected $airInletLocation;
protected $localizedfields;
protected $permissibleInstallationSpace;


/**
* UniPrFgDss constructor.
* @param DataObject\Concrete $object
*/
public function __construct(DataObject\Concrete $object)
{
	parent::__construct($object);
	$this->markFieldDirty("_self");
}


/**
* Get modelType - Model Type
* @return \Pimcore\Model\DataObject\UniPrDssModelType|null
*/
public function getModelType(): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getDefinition()->getFieldDefinition("modelType")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("modelType")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("modelType");
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
* Set modelType - Model Type
* @param \Pimcore\Model\DataObject\UniPrDssModelType|null $modelType
* @return $this
*/
public function setModelType (?\Pimcore\Model\Element\AbstractElement $modelType): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("modelType");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getModelType();
		});
	}
	else {
		$currentData = $this->getModelType();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $modelType);
	if (!$isEqual) {
		$this->markFieldDirty("modelType", true);
	}
	$this->modelType = $fd->preSetData($this, $modelType);
	return $this;
}

/**
* Get isBellowOnlyPart - Is the part a Bellow only
* @return bool|null
*/
public function getIsBellowOnlyPart(): ?bool
{
	$data = $this->isBellowOnlyPart;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("isBellowOnlyPart")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("isBellowOnlyPart");
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
* Set isBellowOnlyPart - Is the part a Bellow only
* @param bool|null $isBellowOnlyPart
* @return $this
*/
public function setIsBellowOnlyPart (?bool $isBellowOnlyPart): static
{
	$this->isBellowOnlyPart = $isBellowOnlyPart;

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
* Get maximumHeightMetric - Maximum Height (mm)
* @return float|null
*/
public function getMaximumHeightMetric(): ?float
{
	$data = $this->maximumHeightMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("maximumHeightMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("maximumHeightMetric");
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
* Set maximumHeightMetric - Maximum Height (mm)
* @param float|null $maximumHeightMetric
* @return $this
*/
public function setMaximumHeightMetric (?float $maximumHeightMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("maximumHeightMetric");
	$this->maximumHeightMetric = $fd->preSetData($this, $maximumHeightMetric);
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
* Get maximumStrokeMetric - Maximum Stroke (mm)
* @return float|null
*/
public function getMaximumStrokeMetric(): ?float
{
	$data = $this->maximumStrokeMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("maximumStrokeMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("maximumStrokeMetric");
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
* Set maximumStrokeMetric - Maximum Stroke (mm)
* @param float|null $maximumStrokeMetric
* @return $this
*/
public function setMaximumStrokeMetric (?float $maximumStrokeMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("maximumStrokeMetric");
	$this->maximumStrokeMetric = $fd->preSetData($this, $maximumStrokeMetric);
	return $this;
}

/**
* Get workingPressureBar - Working Pressure (Bar)
* @return float|null
*/
public function getWorkingPressureBar(): ?float
{
	$data = $this->workingPressureBar;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("workingPressureBar")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("workingPressureBar");
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
* Set workingPressureBar - Working Pressure (Bar)
* @param float|null $workingPressureBar
* @return $this
*/
public function setWorkingPressureBar (?float $workingPressureBar): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("workingPressureBar");
	$this->workingPressureBar = $fd->preSetData($this, $workingPressureBar);
	return $this;
}

/**
* Get workingPressureMpa - Working Pressure (MPa)
* @return float|null
*/
public function getWorkingPressureMpa(): ?float
{
	$data = $this->workingPressureMpa;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("workingPressureMpa")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("workingPressureMpa");
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
* Set workingPressureMpa - Working Pressure (MPa)
* @param float|null $workingPressureMpa
* @return $this
*/
public function setWorkingPressureMpa (?float $workingPressureMpa): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("workingPressureMpa");
	$this->workingPressureMpa = $fd->preSetData($this, $workingPressureMpa);
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
* Get maximumHeightImperial - Maximum Height (in)
* @return float|null
*/
public function getMaximumHeightImperial(): ?float
{
	$data = $this->maximumHeightImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("maximumHeightImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("maximumHeightImperial");
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
* Set maximumHeightImperial - Maximum Height (in)
* @param float|null $maximumHeightImperial
* @return $this
*/
public function setMaximumHeightImperial (?float $maximumHeightImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("maximumHeightImperial");
	$this->maximumHeightImperial = $fd->preSetData($this, $maximumHeightImperial);
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

/**
* Get maximumStrokeImperial - Maximum Stroke (in)
* @return float|null
*/
public function getMaximumStrokeImperial(): ?float
{
	$data = $this->maximumStrokeImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("maximumStrokeImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("maximumStrokeImperial");
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
* Set maximumStrokeImperial - Maximum Stroke (in)
* @param float|null $maximumStrokeImperial
* @return $this
*/
public function setMaximumStrokeImperial (?float $maximumStrokeImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("maximumStrokeImperial");
	$this->maximumStrokeImperial = $fd->preSetData($this, $maximumStrokeImperial);
	return $this;
}

/**
* Get workingPressurePsi - Working Pressure (psi)
* @return float|null
*/
public function getWorkingPressurePsi(): ?float
{
	$data = $this->workingPressurePsi;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("workingPressurePsi")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("workingPressurePsi");
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
* Set workingPressurePsi - Working Pressure (psi)
* @param float|null $workingPressurePsi
* @return $this
*/
public function setWorkingPressurePsi (?float $workingPressurePsi): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("workingPressurePsi");
	$this->workingPressurePsi = $fd->preSetData($this, $workingPressurePsi);
	return $this;
}

/**
* Get numberOfConvolutions - Number of Convolutions
* @return int|null
*/
public function getNumberOfConvolutions(): ?int
{
	$data = $this->numberOfConvolutions;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("numberOfConvolutions")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("numberOfConvolutions");
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
* Set numberOfConvolutions - Number of Convolutions
* @param int|null $numberOfConvolutions
* @return $this
*/
public function setNumberOfConvolutions (?int $numberOfConvolutions): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("numberOfConvolutions");
	$this->numberOfConvolutions = $fd->preSetData($this, $numberOfConvolutions);
	return $this;
}

/**
* Get bellowCompoundMaterial - Bellow Compound Material
* @return \Pimcore\Model\DataObject\UniPrDssBellowCompoundMaterial|null
*/
public function getBellowCompoundMaterial(): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getDefinition()->getFieldDefinition("bellowCompoundMaterial")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("bellowCompoundMaterial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("bellowCompoundMaterial");
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
* Set bellowCompoundMaterial - Bellow Compound Material
* @param \Pimcore\Model\DataObject\UniPrDssBellowCompoundMaterial|null $bellowCompoundMaterial
* @return $this
*/
public function setBellowCompoundMaterial (?\Pimcore\Model\Element\AbstractElement $bellowCompoundMaterial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("bellowCompoundMaterial");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getBellowCompoundMaterial();
		});
	}
	else {
		$currentData = $this->getBellowCompoundMaterial();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $bellowCompoundMaterial);
	if (!$isEqual) {
		$this->markFieldDirty("bellowCompoundMaterial", true);
	}
	$this->bellowCompoundMaterial = $fd->preSetData($this, $bellowCompoundMaterial);
	return $this;
}

/**
* Get rollingLobePistonMaterial - Rolling Lobe - Piston Material
* @return \Pimcore\Model\DataObject\UniPrDssRollingLobePistonMaterial|null
*/
public function getRollingLobePistonMaterial(): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getDefinition()->getFieldDefinition("rollingLobePistonMaterial")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("rollingLobePistonMaterial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("rollingLobePistonMaterial");
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
* Set rollingLobePistonMaterial - Rolling Lobe - Piston Material
* @param \Pimcore\Model\DataObject\UniPrDssRollingLobePistonMaterial|null $rollingLobePistonMaterial
* @return $this
*/
public function setRollingLobePistonMaterial (?\Pimcore\Model\Element\AbstractElement $rollingLobePistonMaterial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("rollingLobePistonMaterial");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getRollingLobePistonMaterial();
		});
	}
	else {
		$currentData = $this->getRollingLobePistonMaterial();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $rollingLobePistonMaterial);
	if (!$isEqual) {
		$this->markFieldDirty("rollingLobePistonMaterial", true);
	}
	$this->rollingLobePistonMaterial = $fd->preSetData($this, $rollingLobePistonMaterial);
	return $this;
}

/**
* Get airInletThread - Air Inlet Thread
* @return string|null
*/
public function getAirInletThread(): ?string
{
	$data = $this->airInletThread;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("airInletThread")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("airInletThread");
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
* Set airInletThread - Air Inlet Thread
* @param string|null $airInletThread
* @return $this
*/
public function setAirInletThread (?string $airInletThread): static
{
	$this->airInletThread = $airInletThread;

	return $this;
}

/**
* Get airInletInsideThread - Air Inlet - Inside Thread / Stud Bolt
* @return \Pimcore\Model\DataObject\UniPrDssAirInletInsideThread|null
*/
public function getAirInletInsideThread(): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getDefinition()->getFieldDefinition("airInletInsideThread")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("airInletInsideThread")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("airInletInsideThread");
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
* Set airInletInsideThread - Air Inlet - Inside Thread / Stud Bolt
* @param \Pimcore\Model\DataObject\UniPrDssAirInletInsideThread|null $airInletInsideThread
* @return $this
*/
public function setAirInletInsideThread (?\Pimcore\Model\Element\AbstractElement $airInletInsideThread): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("airInletInsideThread");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getAirInletInsideThread();
		});
	}
	else {
		$currentData = $this->getAirInletInsideThread();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $airInletInsideThread);
	if (!$isEqual) {
		$this->markFieldDirty("airInletInsideThread", true);
	}
	$this->airInletInsideThread = $fd->preSetData($this, $airInletInsideThread);
	return $this;
}

/**
* Get airInletLocation - Air Inlet Location
* @return \Pimcore\Model\DataObject\UniPrDssAirInletLocation|null
*/
public function getAirInletLocation(): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getDefinition()->getFieldDefinition("airInletLocation")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("airInletLocation")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("airInletLocation");
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
* Set airInletLocation - Air Inlet Location
* @param \Pimcore\Model\DataObject\UniPrDssAirInletLocation|null $airInletLocation
* @return $this
*/
public function setAirInletLocation (?\Pimcore\Model\Element\AbstractElement $airInletLocation): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("airInletLocation");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getAirInletLocation();
		});
	}
	else {
		$currentData = $this->getAirInletLocation();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $airInletLocation);
	if (!$isEqual) {
		$this->markFieldDirty("airInletLocation", true);
	}
	$this->airInletLocation = $fd->preSetData($this, $airInletLocation);
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
* Get hasInternalBumper - Internal Bumper (Y/N)
* @return bool|null
*/
public function getHasInternalBumper(?string $language = null): ?bool
{
	$data = $this->getLocalizedfields()->getLocalizedValue("hasInternalBumper", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get basePlateMaterial - Base Plate Material
* @return string|null
*/
public function getBasePlateMaterial(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("basePlateMaterial", $language);
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
* Set hasInternalBumper - Internal Bumper (Y/N)
* @param bool|null $hasInternalBumper
* @return $this
*/
public function setHasInternalBumper (?bool $hasInternalBumper, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("hasInternalBumper", $hasInternalBumper, $language, !$isEqual);

	return $this;
}

/**
* Set basePlateMaterial - Base Plate Material
* @param string|null $basePlateMaterial
* @return $this
*/
public function setBasePlateMaterial (?string $basePlateMaterial, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("basePlateMaterial", $basePlateMaterial, $language, !$isEqual);

	return $this;
}

/**
* Get permissibleInstallationSpace - Permissible Installation Space
* @return \Pimcore\Model\Asset\Image|null
*/
public function getPermissibleInstallationSpace(): ?\Pimcore\Model\Asset\Image
{
	$data = $this->permissibleInstallationSpace;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("permissibleInstallationSpace")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("permissibleInstallationSpace");
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
* Set permissibleInstallationSpace - Permissible Installation Space
* @param \Pimcore\Model\Asset\Image|null $permissibleInstallationSpace
* @return $this
*/
public function setPermissibleInstallationSpace (?\Pimcore\Model\Asset\Image $permissibleInstallationSpace): static
{
	$this->permissibleInstallationSpace = $permissibleInstallationSpace;

	return $this;
}

}

