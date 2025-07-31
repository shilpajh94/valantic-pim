<?php

/**
 * Fields Summary:
 * - localizedfields [localizedfields]
 * -- modelType [input]
 * -- bellowCompoundMaterial [input]
 * -- internalBumper [checkbox]
 * -- airInletLocation [select]
 * -- basePlateMaterial [input]
 * - bellowOnly [checkbox]
 * - minimumHeight [quantityValue]
 * - maximumHeight [quantityValue]
 * - maximumBellowDiameter [quantityValue]
 * - maximumStroke [quantityValue]
 * - workingPressure [quantityValue]
 * - airInlet [input]
 * - airInletThread [input]
 * - rollingLobePistonMaterial [select]
 * - permissableInstallationSpace [image]
 * - numberOfConvolutions [numeric]
 */

namespace Pimcore\Model\DataObject\Objectbrick\Data;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;


class UniPrFinDss extends \App\Model\DataObject\UniProductManagement\Objectbrick\AbstractUniPrArticle
{
public const FIELD_MODEL_TYPE = 'modelType';
public const FIELD_BELLOW_COMPOUND_MATERIAL = 'bellowCompoundMaterial';
public const FIELD_INTERNAL_BUMPER = 'internalBumper';
public const FIELD_AIR_INLET_LOCATION = 'airInletLocation';
public const FIELD_BASE_PLATE_MATERIAL = 'basePlateMaterial';
public const FIELD_BELLOW_ONLY = 'bellowOnly';
public const FIELD_MINIMUM_HEIGHT = 'minimumHeight';
public const FIELD_MAXIMUM_HEIGHT = 'maximumHeight';
public const FIELD_MAXIMUM_BELLOW_DIAMETER = 'maximumBellowDiameter';
public const FIELD_MAXIMUM_STROKE = 'maximumStroke';
public const FIELD_WORKING_PRESSURE = 'workingPressure';
public const FIELD_AIR_INLET = 'airInlet';
public const FIELD_AIR_INLET_THREAD = 'airInletThread';
public const FIELD_ROLLING_LOBE_PISTON_MATERIAL = 'rollingLobePistonMaterial';
public const FIELD_PERMISSABLE_INSTALLATION_SPACE = 'permissableInstallationSpace';
public const FIELD_NUMBER_OF_CONVOLUTIONS = 'numberOfConvolutions';

protected string $type = "UniPrFinDss";
protected $localizedfields;
protected $bellowOnly;
protected $minimumHeight;
protected $maximumHeight;
protected $maximumBellowDiameter;
protected $maximumStroke;
protected $workingPressure;
protected $airInlet;
protected $airInletThread;
protected $rollingLobePistonMaterial;
protected $permissableInstallationSpace;
protected $numberOfConvolutions;


/**
* UniPrFinDss constructor.
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
* Get modelType - Model Type
* @return string|null
*/
public function getModelType(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("modelType", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get bellowCompoundMaterial - Bellow Compound Material
* @return string|null
*/
public function getBellowCompoundMaterial(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("bellowCompoundMaterial", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get internalBumper - Internal Bumper (Y/N)
* @return bool|null
*/
public function getInternalBumper(?string $language = null): ?bool
{
	$data = $this->getLocalizedfields()->getLocalizedValue("internalBumper", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get airInletLocation - Air Inlet Location
* @return string|null
*/
public function getAirInletLocation(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("airInletLocation", $language);
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
* Set modelType - Model Type
* @param string|null $modelType
* @return $this
*/
public function setModelType (?string $modelType, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("modelType", $modelType, $language, !$isEqual);

	return $this;
}

/**
* Set bellowCompoundMaterial - Bellow Compound Material
* @param string|null $bellowCompoundMaterial
* @return $this
*/
public function setBellowCompoundMaterial (?string $bellowCompoundMaterial, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("bellowCompoundMaterial", $bellowCompoundMaterial, $language, !$isEqual);

	return $this;
}

/**
* Set internalBumper - Internal Bumper (Y/N)
* @param bool|null $internalBumper
* @return $this
*/
public function setInternalBumper (?bool $internalBumper, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("internalBumper", $internalBumper, $language, !$isEqual);

	return $this;
}

/**
* Set airInletLocation - Air Inlet Location
* @param string|null $airInletLocation
* @return $this
*/
public function setAirInletLocation (?string $airInletLocation, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("airInletLocation", $airInletLocation, $language, !$isEqual);

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
* Get minimumHeight - Minimum Height
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getMinimumHeight(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->minimumHeight;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("minimumHeight")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("minimumHeight");
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
* Set minimumHeight - Minimum Height
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $minimumHeight
* @return $this
*/
public function setMinimumHeight (?\Pimcore\Model\DataObject\Data\QuantityValue $minimumHeight): static
{
	$this->minimumHeight = $minimumHeight;

	return $this;
}

/**
* Get maximumHeight - Maximum Height
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getMaximumHeight(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->maximumHeight;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("maximumHeight")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("maximumHeight");
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
* Set maximumHeight - Maximum Height
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $maximumHeight
* @return $this
*/
public function setMaximumHeight (?\Pimcore\Model\DataObject\Data\QuantityValue $maximumHeight): static
{
	$this->maximumHeight = $maximumHeight;

	return $this;
}

/**
* Get maximumBellowDiameter - Maximum Bellow Diameter
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getMaximumBellowDiameter(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->maximumBellowDiameter;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("maximumBellowDiameter")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("maximumBellowDiameter");
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
* Set maximumBellowDiameter - Maximum Bellow Diameter
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $maximumBellowDiameter
* @return $this
*/
public function setMaximumBellowDiameter (?\Pimcore\Model\DataObject\Data\QuantityValue $maximumBellowDiameter): static
{
	$this->maximumBellowDiameter = $maximumBellowDiameter;

	return $this;
}

/**
* Get maximumStroke - Maximum Stroke
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getMaximumStroke(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->maximumStroke;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("maximumStroke")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("maximumStroke");
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
* Set maximumStroke - Maximum Stroke
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $maximumStroke
* @return $this
*/
public function setMaximumStroke (?\Pimcore\Model\DataObject\Data\QuantityValue $maximumStroke): static
{
	$this->maximumStroke = $maximumStroke;

	return $this;
}

/**
* Get workingPressure - Working Pressure
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getWorkingPressure(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->workingPressure;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("workingPressure")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("workingPressure");
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
* Set workingPressure - Working Pressure
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $workingPressure
* @return $this
*/
public function setWorkingPressure (?\Pimcore\Model\DataObject\Data\QuantityValue $workingPressure): static
{
	$this->workingPressure = $workingPressure;

	return $this;
}

/**
* Get airInlet - Air Inlet - Inside Thread / Stud Bolt
* @return string|null
*/
public function getAirInlet(): ?string
{
	$data = $this->airInlet;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("airInlet")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("airInlet");
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
* Set airInlet - Air Inlet - Inside Thread / Stud Bolt
* @param string|null $airInlet
* @return $this
*/
public function setAirInlet (?string $airInlet): static
{
	$this->airInlet = $airInlet;

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
* Get rollingLobePistonMaterial - Rolling Lobe - Piston Material
* @return string|null
*/
public function getRollingLobePistonMaterial(): ?string
{
	$data = $this->rollingLobePistonMaterial;
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
* @param string|null $rollingLobePistonMaterial
* @return $this
*/
public function setRollingLobePistonMaterial (?string $rollingLobePistonMaterial): static
{
	$this->rollingLobePistonMaterial = $rollingLobePistonMaterial;

	return $this;
}

/**
* Get permissableInstallationSpace - Permissable Installation Space
* @return \Pimcore\Model\Asset\Image|null
*/
public function getPermissableInstallationSpace(): ?\Pimcore\Model\Asset\Image
{
	$data = $this->permissableInstallationSpace;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("permissableInstallationSpace")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("permissableInstallationSpace");
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
* Set permissableInstallationSpace - Permissable Installation Space
* @param \Pimcore\Model\Asset\Image|null $permissableInstallationSpace
* @return $this
*/
public function setPermissableInstallationSpace (?\Pimcore\Model\Asset\Image $permissableInstallationSpace): static
{
	$this->permissableInstallationSpace = $permissableInstallationSpace;

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

}

