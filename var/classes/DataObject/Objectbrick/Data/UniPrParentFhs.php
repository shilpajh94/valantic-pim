<?php

/**
 * Fields Summary:
 * - reinforcement [manyToManyObjectRelation]
 * - staticWire [checkbox]
 * - staticWireType [manyToOneRelation]
 * - helicalWire [checkbox]
 * - numberOfHelixWires [numeric]
 * - layFlat [checkbox]
 * - tubeCharacteristic [manyToManyObjectRelation]
 * - tubeColor [manyToManyObjectRelation]
 * - tubeMaterial [manyToManyObjectRelation]
 * - standardMetTube [multiselect]
 * - coverCharacteristicHaptic [manyToManyObjectRelation]
 * - coverColor [manyToManyObjectRelation]
 * - coverMaterialOuterLayer [manyToManyObjectRelation]
 * - standardMetCover [multiselect]
 * - standardMetCompleteHose [multiselect]
 * - numberOfPlies [numeric]
 * - designFactor [input]
 * - acceptableHoseMedia [manyToManyObjectRelation]
 * - localizedfields [localizedfields]
 * -- reinforcementVersion [textarea]
 * -- tubeMaterialExportVersion [textarea]
 * -- coverMaterialExportVersion [textarea]
 * -- standardMetHoseComment [input]
 * -- catalogCoupling [textarea]
 * -- catalogPackaging [textarea]
 */

namespace Pimcore\Model\DataObject\Objectbrick\Data;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;


class UniPrParentFhs extends DataObject\Objectbrick\Data\AbstractData
{
public const FIELD_REINFORCEMENT = 'reinforcement';
public const FIELD_STATIC_WIRE = 'staticWire';
public const FIELD_STATIC_WIRE_TYPE = 'staticWireType';
public const FIELD_HELICAL_WIRE = 'helicalWire';
public const FIELD_NUMBER_OF_HELIX_WIRES = 'numberOfHelixWires';
public const FIELD_LAY_FLAT = 'layFlat';
public const FIELD_TUBE_CHARACTERISTIC = 'tubeCharacteristic';
public const FIELD_TUBE_COLOR = 'tubeColor';
public const FIELD_TUBE_MATERIAL = 'tubeMaterial';
public const FIELD_STANDARD_MET_TUBE = 'standardMetTube';
public const FIELD_COVER_CHARACTERISTIC_HAPTIC = 'coverCharacteristicHaptic';
public const FIELD_COVER_COLOR = 'coverColor';
public const FIELD_COVER_MATERIAL_OUTER_LAYER = 'coverMaterialOuterLayer';
public const FIELD_STANDARD_MET_COVER = 'standardMetCover';
public const FIELD_STANDARD_MET_COMPLETE_HOSE = 'standardMetCompleteHose';
public const FIELD_NUMBER_OF_PLIES = 'numberOfPlies';
public const FIELD_DESIGN_FACTOR = 'designFactor';
public const FIELD_ACCEPTABLE_HOSE_MEDIA = 'acceptableHoseMedia';
public const FIELD_REINFORCEMENT_VERSION = 'reinforcementVersion';
public const FIELD_TUBE_MATERIAL_EXPORT_VERSION = 'tubeMaterialExportVersion';
public const FIELD_COVER_MATERIAL_EXPORT_VERSION = 'coverMaterialExportVersion';
public const FIELD_STANDARD_MET_HOSE_COMMENT = 'standardMetHoseComment';
public const FIELD_CATALOG_COUPLING = 'catalogCoupling';
public const FIELD_CATALOG_PACKAGING = 'catalogPackaging';

protected string $type = "UniPrParentFhs";
protected $reinforcement;
protected $staticWire;
protected $staticWireType;
protected $helicalWire;
protected $numberOfHelixWires;
protected $layFlat;
protected $tubeCharacteristic;
protected $tubeColor;
protected $tubeMaterial;
protected $standardMetTube;
protected $coverCharacteristicHaptic;
protected $coverColor;
protected $coverMaterialOuterLayer;
protected $standardMetCover;
protected $standardMetCompleteHose;
protected $numberOfPlies;
protected $designFactor;
protected $acceptableHoseMedia;
protected $localizedfields;


/**
* UniPrParentFhs constructor.
* @param DataObject\Concrete $object
*/
public function __construct(DataObject\Concrete $object)
{
	parent::__construct($object);
	$this->markFieldDirty("_self");
}


/**
* Get reinforcement - Reinforcement
* @return \Pimcore\Model\DataObject\UniPrReinforcement[]
*/
public function getReinforcement(): array
{
	$data = $this->getDefinition()->getFieldDefinition("reinforcement")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("reinforcement")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("reinforcement");
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
* Set reinforcement - Reinforcement
* @param \Pimcore\Model\DataObject\UniPrReinforcement[] $reinforcement
* @return $this
*/
public function setReinforcement (?array $reinforcement): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("reinforcement");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getReinforcement();
		});
	}
	else {
		$currentData = $this->getReinforcement();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $reinforcement);
	if (!$isEqual) {
		$this->markFieldDirty("reinforcement", true);
	}
	$this->reinforcement = $fd->preSetData($this, $reinforcement);
	return $this;
}

/**
* Get staticWire - Static Wire (Y/N)
* @return bool|null
*/
public function getStaticWire(): ?bool
{
	$data = $this->staticWire;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("staticWire")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("staticWire");
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
* Set staticWire - Static Wire (Y/N)
* @param bool|null $staticWire
* @return $this
*/
public function setStaticWire (?bool $staticWire): static
{
	$this->staticWire = $staticWire;

	return $this;
}

/**
* Get staticWireType - Static Wire Type
* @return \Pimcore\Model\DataObject\UniPrStaticWireType|null
*/
public function getStaticWireType(): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getDefinition()->getFieldDefinition("staticWireType")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("staticWireType")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("staticWireType");
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
* Set staticWireType - Static Wire Type
* @param \Pimcore\Model\DataObject\UniPrStaticWireType|null $staticWireType
* @return $this
*/
public function setStaticWireType (?\Pimcore\Model\Element\AbstractElement $staticWireType): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("staticWireType");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getStaticWireType();
		});
	}
	else {
		$currentData = $this->getStaticWireType();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $staticWireType);
	if (!$isEqual) {
		$this->markFieldDirty("staticWireType", true);
	}
	$this->staticWireType = $fd->preSetData($this, $staticWireType);
	return $this;
}

/**
* Get helicalWire - Helical Wire Y/N
* @return bool|null
*/
public function getHelicalWire(): ?bool
{
	$data = $this->helicalWire;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("helicalWire")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("helicalWire");
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
* Set helicalWire - Helical Wire Y/N
* @param bool|null $helicalWire
* @return $this
*/
public function setHelicalWire (?bool $helicalWire): static
{
	$this->helicalWire = $helicalWire;

	return $this;
}

/**
* Get numberOfHelixWires - Number Of Helix Wires
* @return float|null
*/
public function getNumberOfHelixWires(): ?float
{
	$data = $this->numberOfHelixWires;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("numberOfHelixWires")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("numberOfHelixWires");
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
* Set numberOfHelixWires - Number Of Helix Wires
* @param float|null $numberOfHelixWires
* @return $this
*/
public function setNumberOfHelixWires (?float $numberOfHelixWires): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("numberOfHelixWires");
	$this->numberOfHelixWires = $fd->preSetData($this, $numberOfHelixWires);
	return $this;
}

/**
* Get layFlat - Lay Flat Y/N
* @return bool|null
*/
public function getLayFlat(): ?bool
{
	$data = $this->layFlat;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("layFlat")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("layFlat");
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
* Set layFlat - Lay Flat Y/N
* @param bool|null $layFlat
* @return $this
*/
public function setLayFlat (?bool $layFlat): static
{
	$this->layFlat = $layFlat;

	return $this;
}

/**
* Get tubeCharacteristic - Tube Characteristic
* @return \Pimcore\Model\DataObject\UniPrTubeCharacteristic[]
*/
public function getTubeCharacteristic(): array
{
	$data = $this->getDefinition()->getFieldDefinition("tubeCharacteristic")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("tubeCharacteristic")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("tubeCharacteristic");
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
* Set tubeCharacteristic - Tube Characteristic
* @param \Pimcore\Model\DataObject\UniPrTubeCharacteristic[] $tubeCharacteristic
* @return $this
*/
public function setTubeCharacteristic (?array $tubeCharacteristic): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("tubeCharacteristic");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getTubeCharacteristic();
		});
	}
	else {
		$currentData = $this->getTubeCharacteristic();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $tubeCharacteristic);
	if (!$isEqual) {
		$this->markFieldDirty("tubeCharacteristic", true);
	}
	$this->tubeCharacteristic = $fd->preSetData($this, $tubeCharacteristic);
	return $this;
}

/**
* Get tubeColor - Tube Color  
* @return \Pimcore\Model\DataObject\UniPrTubeColor[]
*/
public function getTubeColor(): array
{
	$data = $this->getDefinition()->getFieldDefinition("tubeColor")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("tubeColor")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("tubeColor");
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
* Set tubeColor - Tube Color  
* @param \Pimcore\Model\DataObject\UniPrTubeColor[] $tubeColor
* @return $this
*/
public function setTubeColor (?array $tubeColor): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("tubeColor");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getTubeColor();
		});
	}
	else {
		$currentData = $this->getTubeColor();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $tubeColor);
	if (!$isEqual) {
		$this->markFieldDirty("tubeColor", true);
	}
	$this->tubeColor = $fd->preSetData($this, $tubeColor);
	return $this;
}

/**
* Get tubeMaterial - Tube Material  
* @return \Pimcore\Model\DataObject\UniPrTubeMaterial[]
*/
public function getTubeMaterial(): array
{
	$data = $this->getDefinition()->getFieldDefinition("tubeMaterial")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("tubeMaterial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("tubeMaterial");
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
* Set tubeMaterial - Tube Material  
* @param \Pimcore\Model\DataObject\UniPrTubeMaterial[] $tubeMaterial
* @return $this
*/
public function setTubeMaterial (?array $tubeMaterial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("tubeMaterial");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getTubeMaterial();
		});
	}
	else {
		$currentData = $this->getTubeMaterial();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $tubeMaterial);
	if (!$isEqual) {
		$this->markFieldDirty("tubeMaterial", true);
	}
	$this->tubeMaterial = $fd->preSetData($this, $tubeMaterial);
	return $this;
}

/**
* Get standardMetTube - Standard Met; Tube
* @return string[]|null
*/
public function getStandardMetTube(): ?array
{
	$data = $this->standardMetTube;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("standardMetTube")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("standardMetTube");
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
* Set standardMetTube - Standard Met; Tube
* @param string[]|null $standardMetTube
* @return $this
*/
public function setStandardMetTube (?array $standardMetTube): static
{
	$this->standardMetTube = $standardMetTube;

	return $this;
}

/**
* Get coverCharacteristicHaptic - Cover Characteristic Haptic
* @return \Pimcore\Model\DataObject\UniPrCoverCharacteristic[]
*/
public function getCoverCharacteristicHaptic(): array
{
	$data = $this->getDefinition()->getFieldDefinition("coverCharacteristicHaptic")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("coverCharacteristicHaptic")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("coverCharacteristicHaptic");
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
* Set coverCharacteristicHaptic - Cover Characteristic Haptic
* @param \Pimcore\Model\DataObject\UniPrCoverCharacteristic[] $coverCharacteristicHaptic
* @return $this
*/
public function setCoverCharacteristicHaptic (?array $coverCharacteristicHaptic): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("coverCharacteristicHaptic");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getCoverCharacteristicHaptic();
		});
	}
	else {
		$currentData = $this->getCoverCharacteristicHaptic();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $coverCharacteristicHaptic);
	if (!$isEqual) {
		$this->markFieldDirty("coverCharacteristicHaptic", true);
	}
	$this->coverCharacteristicHaptic = $fd->preSetData($this, $coverCharacteristicHaptic);
	return $this;
}

/**
* Get coverColor - Cover Color / Color- Outer   Layer
* @return \Pimcore\Model\DataObject\UniPrCoverColor[]
*/
public function getCoverColor(): array
{
	$data = $this->getDefinition()->getFieldDefinition("coverColor")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("coverColor")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("coverColor");
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
* Set coverColor - Cover Color / Color- Outer   Layer
* @param \Pimcore\Model\DataObject\UniPrCoverColor[] $coverColor
* @return $this
*/
public function setCoverColor (?array $coverColor): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("coverColor");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getCoverColor();
		});
	}
	else {
		$currentData = $this->getCoverColor();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $coverColor);
	if (!$isEqual) {
		$this->markFieldDirty("coverColor", true);
	}
	$this->coverColor = $fd->preSetData($this, $coverColor);
	return $this;
}

/**
* Get coverMaterialOuterLayer - Cover Material / Cover - Outer Layer
* @return \Pimcore\Model\DataObject\UniPrCoverMaterial[]
*/
public function getCoverMaterialOuterLayer(): array
{
	$data = $this->getDefinition()->getFieldDefinition("coverMaterialOuterLayer")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("coverMaterialOuterLayer")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("coverMaterialOuterLayer");
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
* Set coverMaterialOuterLayer - Cover Material / Cover - Outer Layer
* @param \Pimcore\Model\DataObject\UniPrCoverMaterial[] $coverMaterialOuterLayer
* @return $this
*/
public function setCoverMaterialOuterLayer (?array $coverMaterialOuterLayer): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("coverMaterialOuterLayer");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getCoverMaterialOuterLayer();
		});
	}
	else {
		$currentData = $this->getCoverMaterialOuterLayer();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $coverMaterialOuterLayer);
	if (!$isEqual) {
		$this->markFieldDirty("coverMaterialOuterLayer", true);
	}
	$this->coverMaterialOuterLayer = $fd->preSetData($this, $coverMaterialOuterLayer);
	return $this;
}

/**
* Get standardMetCover - Standard Met Cover
* @return string[]|null
*/
public function getStandardMetCover(): ?array
{
	$data = $this->standardMetCover;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("standardMetCover")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("standardMetCover");
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
* Set standardMetCover - Standard Met Cover
* @param string[]|null $standardMetCover
* @return $this
*/
public function setStandardMetCover (?array $standardMetCover): static
{
	$this->standardMetCover = $standardMetCover;

	return $this;
}

/**
* Get standardMetCompleteHose - Standard Met;Complete Hose
* @return string[]|null
*/
public function getStandardMetCompleteHose(): ?array
{
	$data = $this->standardMetCompleteHose;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("standardMetCompleteHose")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("standardMetCompleteHose");
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
* Set standardMetCompleteHose - Standard Met;Complete Hose
* @param string[]|null $standardMetCompleteHose
* @return $this
*/
public function setStandardMetCompleteHose (?array $standardMetCompleteHose): static
{
	$this->standardMetCompleteHose = $standardMetCompleteHose;

	return $this;
}

/**
* Get numberOfPlies - Number Of Plies
* @return float|null
*/
public function getNumberOfPlies(): ?float
{
	$data = $this->numberOfPlies;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("numberOfPlies")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("numberOfPlies");
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
* Set numberOfPlies - Number Of Plies
* @param float|null $numberOfPlies
* @return $this
*/
public function setNumberOfPlies (?float $numberOfPlies): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("numberOfPlies");
	$this->numberOfPlies = $fd->preSetData($this, $numberOfPlies);
	return $this;
}

/**
* Get designFactor - Design Factor
* @return string|null
*/
public function getDesignFactor(): ?string
{
	$data = $this->designFactor;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("designFactor")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("designFactor");
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
* Set designFactor - Design Factor
* @param string|null $designFactor
* @return $this
*/
public function setDesignFactor (?string $designFactor): static
{
	$this->designFactor = $designFactor;

	return $this;
}

/**
* Get acceptableHoseMedia - Acceptable Hose Media / Flow Medium
* @return \Pimcore\Model\DataObject\UniPrFlowMedium[]
*/
public function getAcceptableHoseMedia(): array
{
	$data = $this->getDefinition()->getFieldDefinition("acceptableHoseMedia")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("acceptableHoseMedia")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("acceptableHoseMedia");
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
* Set acceptableHoseMedia - Acceptable Hose Media / Flow Medium
* @param \Pimcore\Model\DataObject\UniPrFlowMedium[] $acceptableHoseMedia
* @return $this
*/
public function setAcceptableHoseMedia (?array $acceptableHoseMedia): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("acceptableHoseMedia");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getAcceptableHoseMedia();
		});
	}
	else {
		$currentData = $this->getAcceptableHoseMedia();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $acceptableHoseMedia);
	if (!$isEqual) {
		$this->markFieldDirty("acceptableHoseMedia", true);
	}
	$this->acceptableHoseMedia = $fd->preSetData($this, $acceptableHoseMedia);
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
* Get reinforcementVersion - Reinforcement / Export Version
* @return string|null
*/
public function getReinforcementVersion(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("reinforcementVersion", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get tubeMaterialExportVersion - Tube Material - Export Version
* @return string|null
*/
public function getTubeMaterialExportVersion(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("tubeMaterialExportVersion", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get coverMaterialExportVersion - Cover Material / Export Version
* @return string|null
*/
public function getCoverMaterialExportVersion(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("coverMaterialExportVersion", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get standardMetHoseComment - StandardMet ; HoseComment
* @return string|null
*/
public function getStandardMetHoseComment(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("standardMetHoseComment", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get catalogCoupling - Catalog Coupling
* @return string|null
*/
public function getCatalogCoupling(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("catalogCoupling", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get catalogPackaging - Catalog Packaging
* @return string|null
*/
public function getCatalogPackaging(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("catalogPackaging", $language);
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
* Set reinforcementVersion - Reinforcement / Export Version
* @param string|null $reinforcementVersion
* @return $this
*/
public function setReinforcementVersion (?string $reinforcementVersion, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("reinforcementVersion", $reinforcementVersion, $language, !$isEqual);

	return $this;
}

/**
* Set tubeMaterialExportVersion - Tube Material - Export Version
* @param string|null $tubeMaterialExportVersion
* @return $this
*/
public function setTubeMaterialExportVersion (?string $tubeMaterialExportVersion, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("tubeMaterialExportVersion", $tubeMaterialExportVersion, $language, !$isEqual);

	return $this;
}

/**
* Set coverMaterialExportVersion - Cover Material / Export Version
* @param string|null $coverMaterialExportVersion
* @return $this
*/
public function setCoverMaterialExportVersion (?string $coverMaterialExportVersion, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("coverMaterialExportVersion", $coverMaterialExportVersion, $language, !$isEqual);

	return $this;
}

/**
* Set standardMetHoseComment - StandardMet ; HoseComment
* @param string|null $standardMetHoseComment
* @return $this
*/
public function setStandardMetHoseComment (?string $standardMetHoseComment, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("standardMetHoseComment", $standardMetHoseComment, $language, !$isEqual);

	return $this;
}

/**
* Set catalogCoupling - Catalog Coupling
* @param string|null $catalogCoupling
* @return $this
*/
public function setCatalogCoupling (?string $catalogCoupling, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("catalogCoupling", $catalogCoupling, $language, !$isEqual);

	return $this;
}

/**
* Set catalogPackaging - Catalog Packaging
* @param string|null $catalogPackaging
* @return $this
*/
public function setCatalogPackaging (?string $catalogPackaging, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("catalogPackaging", $catalogPackaging, $language, !$isEqual);

	return $this;
}

}

