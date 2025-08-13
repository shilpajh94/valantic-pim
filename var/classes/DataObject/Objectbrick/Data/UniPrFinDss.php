<?php

/**
 * Fields Summary:
 * - localizedfields [localizedfields]
 * -- modelType [manyToOneRelation]
 * -- bellowCompoundMaterial [manyToOneRelation]
 * -- hasInternalBumper [checkbox]
 * -- airInletLocation [manyToOneRelation]
 * -- basePlateMaterial [input]
 * - isBellowOnlyPart [checkbox]
 * - height [quantityValueRange]
 * - maximumBellowDiameter [quantityValue]
 * - maximumStroke [quantityValue]
 * - workingPressure [quantityValue]
 * - airInlet [manyToOneRelation]
 * - airInletThread [input]
 * - rollingLobePistonMaterial [manyToOneRelation]
 * - permissibleInstallationSpace [image]
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
public const FIELD_HAS_INTERNAL_BUMPER = 'hasInternalBumper';
public const FIELD_AIR_INLET_LOCATION = 'airInletLocation';
public const FIELD_BASE_PLATE_MATERIAL = 'basePlateMaterial';
public const FIELD_IS_BELLOW_ONLY_PART = 'isBellowOnlyPart';
public const FIELD_HEIGHT = 'height';
public const FIELD_MAXIMUM_BELLOW_DIAMETER = 'maximumBellowDiameter';
public const FIELD_MAXIMUM_STROKE = 'maximumStroke';
public const FIELD_WORKING_PRESSURE = 'workingPressure';
public const FIELD_AIR_INLET = 'airInlet';
public const FIELD_AIR_INLET_THREAD = 'airInletThread';
public const FIELD_ROLLING_LOBE_PISTON_MATERIAL = 'rollingLobePistonMaterial';
public const FIELD_PERMISSIBLE_INSTALLATION_SPACE = 'permissibleInstallationSpace';
public const FIELD_NUMBER_OF_CONVOLUTIONS = 'numberOfConvolutions';

protected string $type = "UniPrFinDss";
protected $localizedfields;
protected $isBellowOnlyPart;
protected $height;
protected $maximumBellowDiameter;
protected $maximumStroke;
protected $workingPressure;
protected $airInlet;
protected $airInletThread;
protected $rollingLobePistonMaterial;
protected $permissibleInstallationSpace;
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
* @return \Pimcore\Model\DataObject\UniPrModelTypeDss|null
*/
public function getModelType(?string $language = null): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getLocalizedfields()->getLocalizedValue("modelType", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get bellowCompoundMaterial - Bellow Compound Material
* @return \Pimcore\Model\DataObject\UniPrBellowCompoundMaterialDss|null
*/
public function getBellowCompoundMaterial(?string $language = null): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getLocalizedfields()->getLocalizedValue("bellowCompoundMaterial", $language);
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
* Get airInletLocation - Air Inlet Location
* @return \Pimcore\Model\DataObject\UniPrAirInletLocationDss|null
*/
public function getAirInletLocation(?string $language = null): ?\Pimcore\Model\Element\AbstractElement
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
* @param \Pimcore\Model\DataObject\UniPrModelTypeDss|null $modelType
* @return $this
*/
public function setModelType (?\Pimcore\Model\Element\AbstractElement $modelType, ?string $language = null): static
{
	$fd = $this->getDefinition()->getFieldDefinition("localizedfields")->getFieldDefinition("modelType");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getModelType($language);
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $modelType);
	if (!$isEqual) {
		$this->markFieldDirty("modelType", true);
	}
	$this->getLocalizedfields()->setLocalizedValue("modelType", $modelType, $language, !$isEqual);

	return $this;
}

/**
* Set bellowCompoundMaterial - Bellow Compound Material
* @param \Pimcore\Model\DataObject\UniPrBellowCompoundMaterialDss|null $bellowCompoundMaterial
* @return $this
*/
public function setBellowCompoundMaterial (?\Pimcore\Model\Element\AbstractElement $bellowCompoundMaterial, ?string $language = null): static
{
	$fd = $this->getDefinition()->getFieldDefinition("localizedfields")->getFieldDefinition("bellowCompoundMaterial");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getBellowCompoundMaterial($language);
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $bellowCompoundMaterial);
	if (!$isEqual) {
		$this->markFieldDirty("bellowCompoundMaterial", true);
	}
	$this->getLocalizedfields()->setLocalizedValue("bellowCompoundMaterial", $bellowCompoundMaterial, $language, !$isEqual);

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
* Set airInletLocation - Air Inlet Location
* @param \Pimcore\Model\DataObject\UniPrAirInletLocationDss|null $airInletLocation
* @return $this
*/
public function setAirInletLocation (?\Pimcore\Model\Element\AbstractElement $airInletLocation, ?string $language = null): static
{
	$fd = $this->getDefinition()->getFieldDefinition("localizedfields")->getFieldDefinition("airInletLocation");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getAirInletLocation($language);
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $airInletLocation);
	if (!$isEqual) {
		$this->markFieldDirty("airInletLocation", true);
	}
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
* Get height - Height
* @return \Pimcore\Model\DataObject\Data\QuantityValueRange|null
*/
public function getHeight(): ?\Pimcore\Model\DataObject\Data\QuantityValueRange
{
	$data = $this->height;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("height")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("height");
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
* Set height - Height
* @param \Pimcore\Model\DataObject\Data\QuantityValueRange|null $height
* @return $this
*/
public function setHeight (?\Pimcore\Model\DataObject\Data\QuantityValueRange $height): static
{
	$this->height = $height;

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
* @return \Pimcore\Model\DataObject\UniPrAirInletDss|null
*/
public function getAirInlet(): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getDefinition()->getFieldDefinition("airInlet")->preGetData($this);
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
* @param \Pimcore\Model\DataObject\UniPrAirInletDss|null $airInlet
* @return $this
*/
public function setAirInlet (?\Pimcore\Model\Element\AbstractElement $airInlet): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("airInlet");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getAirInlet();
		});
	}
	else {
		$currentData = $this->getAirInlet();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $airInlet);
	if (!$isEqual) {
		$this->markFieldDirty("airInlet", true);
	}
	$this->airInlet = $fd->preSetData($this, $airInlet);
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
* @return \Pimcore\Model\DataObject\UniPrRollingLobePistonMaterialDss|null
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
* @param \Pimcore\Model\DataObject\UniPrRollingLobePistonMaterialDss|null $rollingLobePistonMaterial
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

