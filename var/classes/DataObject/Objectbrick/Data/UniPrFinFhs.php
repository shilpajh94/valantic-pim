<?php

/**
 * Fields Summary:
 * - fitting1Type [manyToOneRelation]
 * - fitting2Type [manyToOneRelation]
 * - bendRestrictorType [manyToOneRelation]
 * - fitting1SizeImperial [quantityValue]
 * - fitting2SizeImperial [quantityValue]
 * - fitting1Material [manyToOneRelation]
 * - fitting2Material [manyToOneRelation]
 * - isBendRestrictor [checkbox]
 * - isAssembly [checkbox]
 * - localizedfields [localizedfields]
 * -- hoseFittingFamily [input]
 * -- completeFittingText [input]
 * -- note1 [textarea]
 * -- note2 [textarea]
 * - hoseLengthImperial [quantityValue]
 * - hoseLengthMetric [quantityValue]
 */

namespace Pimcore\Model\DataObject\Objectbrick\Data;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;


class UniPrFinFhs extends DataObject\Objectbrick\Data\AbstractData
{
public const FIELD_FITTING1_TYPE = 'fitting1Type';
public const FIELD_FITTING2_TYPE = 'fitting2Type';
public const FIELD_BEND_RESTRICTOR_TYPE = 'bendRestrictorType';
public const FIELD_FITTING1_SIZE_IMPERIAL = 'fitting1SizeImperial';
public const FIELD_FITTING2_SIZE_IMPERIAL = 'fitting2SizeImperial';
public const FIELD_FITTING1_MATERIAL = 'fitting1Material';
public const FIELD_FITTING2_MATERIAL = 'fitting2Material';
public const FIELD_IS_BEND_RESTRICTOR = 'isBendRestrictor';
public const FIELD_IS_ASSEMBLY = 'isAssembly';
public const FIELD_HOSE_FITTING_FAMILY = 'hoseFittingFamily';
public const FIELD_COMPLETE_FITTING_TEXT = 'completeFittingText';
public const FIELD_NOTE1 = 'note1';
public const FIELD_NOTE2 = 'note2';
public const FIELD_HOSE_LENGTH_IMPERIAL = 'hoseLengthImperial';
public const FIELD_HOSE_LENGTH_METRIC = 'hoseLengthMetric';

protected string $type = "UniPrFinFhs";
protected $fitting1Type;
protected $fitting2Type;
protected $bendRestrictorType;
protected $fitting1SizeImperial;
protected $fitting2SizeImperial;
protected $fitting1Material;
protected $fitting2Material;
protected $isBendRestrictor;
protected $isAssembly;
protected $localizedfields;
protected $hoseLengthImperial;
protected $hoseLengthMetric;


/**
* UniPrFinFhs constructor.
* @param DataObject\Concrete $object
*/
public function __construct(DataObject\Concrete $object)
{
	parent::__construct($object);
	$this->markFieldDirty("_self");
}


/**
* Get fitting1Type - Fitting 1 Type
* @return \Pimcore\Model\DataObject\UniPrFittingTypeFhs|null
*/
public function getFitting1Type(): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getDefinition()->getFieldDefinition("fitting1Type")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("fitting1Type")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("fitting1Type");
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
* Set fitting1Type - Fitting 1 Type
* @param \Pimcore\Model\DataObject\UniPrFittingTypeFhs|null $fitting1Type
* @return $this
*/
public function setFitting1Type (?\Pimcore\Model\Element\AbstractElement $fitting1Type): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("fitting1Type");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getFitting1Type();
		});
	}
	else {
		$currentData = $this->getFitting1Type();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $fitting1Type);
	if (!$isEqual) {
		$this->markFieldDirty("fitting1Type", true);
	}
	$this->fitting1Type = $fd->preSetData($this, $fitting1Type);
	return $this;
}

/**
* Get fitting2Type - Fitting 2 Type
* @return \Pimcore\Model\DataObject\UniPrFittingTypeFhs|null
*/
public function getFitting2Type(): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getDefinition()->getFieldDefinition("fitting2Type")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("fitting2Type")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("fitting2Type");
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
* Set fitting2Type - Fitting 2 Type
* @param \Pimcore\Model\DataObject\UniPrFittingTypeFhs|null $fitting2Type
* @return $this
*/
public function setFitting2Type (?\Pimcore\Model\Element\AbstractElement $fitting2Type): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("fitting2Type");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getFitting2Type();
		});
	}
	else {
		$currentData = $this->getFitting2Type();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $fitting2Type);
	if (!$isEqual) {
		$this->markFieldDirty("fitting2Type", true);
	}
	$this->fitting2Type = $fd->preSetData($this, $fitting2Type);
	return $this;
}

/**
* Get bendRestrictorType - Bend Restrictor Type
* @return \Pimcore\Model\DataObject\UniPrBendRestrictorTypeFhs|null
*/
public function getBendRestrictorType(): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getDefinition()->getFieldDefinition("bendRestrictorType")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("bendRestrictorType")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("bendRestrictorType");
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
* Set bendRestrictorType - Bend Restrictor Type
* @param \Pimcore\Model\DataObject\UniPrBendRestrictorTypeFhs|null $bendRestrictorType
* @return $this
*/
public function setBendRestrictorType (?\Pimcore\Model\Element\AbstractElement $bendRestrictorType): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("bendRestrictorType");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getBendRestrictorType();
		});
	}
	else {
		$currentData = $this->getBendRestrictorType();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $bendRestrictorType);
	if (!$isEqual) {
		$this->markFieldDirty("bendRestrictorType", true);
	}
	$this->bendRestrictorType = $fd->preSetData($this, $bendRestrictorType);
	return $this;
}

/**
* Get fitting1SizeImperial - Fitting 1 Size (in)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getFitting1SizeImperial(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->fitting1SizeImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("fitting1SizeImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("fitting1SizeImperial");
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
* Set fitting1SizeImperial - Fitting 1 Size (in)
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $fitting1SizeImperial
* @return $this
*/
public function setFitting1SizeImperial (?\Pimcore\Model\DataObject\Data\QuantityValue $fitting1SizeImperial): static
{
	$this->fitting1SizeImperial = $fitting1SizeImperial;

	return $this;
}

/**
* Get fitting2SizeImperial - Fitting 2 Size (in)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getFitting2SizeImperial(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->fitting2SizeImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("fitting2SizeImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("fitting2SizeImperial");
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
* Set fitting2SizeImperial - Fitting 2 Size (in)
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $fitting2SizeImperial
* @return $this
*/
public function setFitting2SizeImperial (?\Pimcore\Model\DataObject\Data\QuantityValue $fitting2SizeImperial): static
{
	$this->fitting2SizeImperial = $fitting2SizeImperial;

	return $this;
}

/**
* Get fitting1Material - Fitting 1 Materials
* @return \Pimcore\Model\DataObject\UniPrFittingMaterialFhs|null
*/
public function getFitting1Material(): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getDefinition()->getFieldDefinition("fitting1Material")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("fitting1Material")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("fitting1Material");
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
* Set fitting1Material - Fitting 1 Materials
* @param \Pimcore\Model\DataObject\UniPrFittingMaterialFhs|null $fitting1Material
* @return $this
*/
public function setFitting1Material (?\Pimcore\Model\Element\AbstractElement $fitting1Material): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("fitting1Material");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getFitting1Material();
		});
	}
	else {
		$currentData = $this->getFitting1Material();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $fitting1Material);
	if (!$isEqual) {
		$this->markFieldDirty("fitting1Material", true);
	}
	$this->fitting1Material = $fd->preSetData($this, $fitting1Material);
	return $this;
}

/**
* Get fitting2Material - Fitting 2 Materials
* @return \Pimcore\Model\DataObject\UniPrFittingMaterialFhs|null
*/
public function getFitting2Material(): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getDefinition()->getFieldDefinition("fitting2Material")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("fitting2Material")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("fitting2Material");
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
* Set fitting2Material - Fitting 2 Materials
* @param \Pimcore\Model\DataObject\UniPrFittingMaterialFhs|null $fitting2Material
* @return $this
*/
public function setFitting2Material (?\Pimcore\Model\Element\AbstractElement $fitting2Material): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("fitting2Material");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getFitting2Material();
		});
	}
	else {
		$currentData = $this->getFitting2Material();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $fitting2Material);
	if (!$isEqual) {
		$this->markFieldDirty("fitting2Material", true);
	}
	$this->fitting2Material = $fd->preSetData($this, $fitting2Material);
	return $this;
}

/**
* Get isBendRestrictor - Bend Restrictor Y/N
* @return bool|null
*/
public function getIsBendRestrictor(): ?bool
{
	$data = $this->isBendRestrictor;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("isBendRestrictor")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("isBendRestrictor");
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
* Set isBendRestrictor - Bend Restrictor Y/N
* @param bool|null $isBendRestrictor
* @return $this
*/
public function setIsBendRestrictor (?bool $isBendRestrictor): static
{
	$this->isBendRestrictor = $isBendRestrictor;

	return $this;
}

/**
* Get isAssembly - Assembly / Not Assembly
* @return bool|null
*/
public function getIsAssembly(): ?bool
{
	$data = $this->isAssembly;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("isAssembly")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("isAssembly");
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
* Set isAssembly - Assembly / Not Assembly
* @param bool|null $isAssembly
* @return $this
*/
public function setIsAssembly (?bool $isAssembly): static
{
	$this->isAssembly = $isAssembly;

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
* Get hoseFittingFamily - Hose Fitting Family (HYD)
* @return string|null
*/
public function getHoseFittingFamily(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("hoseFittingFamily", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get completeFittingText - Complete Fitting Text
* @return string|null
*/
public function getCompleteFittingText(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("completeFittingText", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get note1 - Note1 (above table)
* @return string|null
*/
public function getNote1(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("note1", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get note2 - Note 2 (below table)
* @return string|null
*/
public function getNote2(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("note2", $language);
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
* Set hoseFittingFamily - Hose Fitting Family (HYD)
* @param string|null $hoseFittingFamily
* @return $this
*/
public function setHoseFittingFamily (?string $hoseFittingFamily, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("hoseFittingFamily", $hoseFittingFamily, $language, !$isEqual);

	return $this;
}

/**
* Set completeFittingText - Complete Fitting Text
* @param string|null $completeFittingText
* @return $this
*/
public function setCompleteFittingText (?string $completeFittingText, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("completeFittingText", $completeFittingText, $language, !$isEqual);

	return $this;
}

/**
* Set note1 - Note1 (above table)
* @param string|null $note1
* @return $this
*/
public function setNote1 (?string $note1, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("note1", $note1, $language, !$isEqual);

	return $this;
}

/**
* Set note2 - Note 2 (below table)
* @param string|null $note2
* @return $this
*/
public function setNote2 (?string $note2, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("note2", $note2, $language, !$isEqual);

	return $this;
}

/**
* Get hoseLengthImperial - Hose Length Ft
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getHoseLengthImperial(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->hoseLengthImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("hoseLengthImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("hoseLengthImperial");
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
* Set hoseLengthImperial - Hose Length Ft
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $hoseLengthImperial
* @return $this
*/
public function setHoseLengthImperial (?\Pimcore\Model\DataObject\Data\QuantityValue $hoseLengthImperial): static
{
	$this->hoseLengthImperial = $hoseLengthImperial;

	return $this;
}

/**
* Get hoseLengthMetric - Hose Length (M)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getHoseLengthMetric(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->hoseLengthMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("hoseLengthMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("hoseLengthMetric");
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
* Set hoseLengthMetric - Hose Length (M)
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $hoseLengthMetric
* @return $this
*/
public function setHoseLengthMetric (?\Pimcore\Model\DataObject\Data\QuantityValue $hoseLengthMetric): static
{
	$this->hoseLengthMetric = $hoseLengthMetric;

	return $this;
}

}

