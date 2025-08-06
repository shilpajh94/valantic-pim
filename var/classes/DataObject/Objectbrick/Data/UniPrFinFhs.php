<?php

/**
 * Fields Summary:
 * - localizedfields [localizedfields]
 * -- hoseFittingFamily [input]
 * -- fitting1Type [input]
 * -- fitting2Type [input]
 * -- completeFittingText [input]
 * -- bendRestrictorType [input]
 * -- note1 [input]
 * -- note2 [input]
 * -- fitting1Material [input]
 * -- fitting2Material [input]
 * - isAssembly [checkbox]
 * - hoseLengthFt [quantityValue]
 * - hoseLengthM [quantityValue]
 * - bendRestrictor [checkbox]
 * - fitting1SizeInch [quantityValue]
 * - fitting2SizeInch [quantityValue]
 */

namespace Pimcore\Model\DataObject\Objectbrick\Data;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;


class UniPrFinFhs extends DataObject\Objectbrick\Data\AbstractData
{
public const FIELD_HOSE_FITTING_FAMILY = 'hoseFittingFamily';
public const FIELD_FITTING1_TYPE = 'fitting1Type';
public const FIELD_FITTING2_TYPE = 'fitting2Type';
public const FIELD_COMPLETE_FITTING_TEXT = 'completeFittingText';
public const FIELD_BEND_RESTRICTOR_TYPE = 'bendRestrictorType';
public const FIELD_NOTE1 = 'note1';
public const FIELD_NOTE2 = 'note2';
public const FIELD_FITTING1_MATERIAL = 'fitting1Material';
public const FIELD_FITTING2_MATERIAL = 'fitting2Material';
public const FIELD_IS_ASSEMBLY = 'isAssembly';
public const FIELD_HOSE_LENGTH_FT = 'hoseLengthFt';
public const FIELD_HOSE_LENGTH_M = 'hoseLengthM';
public const FIELD_BEND_RESTRICTOR = 'bendRestrictor';
public const FIELD_FITTING1_SIZE_INCH = 'fitting1SizeInch';
public const FIELD_FITTING2_SIZE_INCH = 'fitting2SizeInch';

protected string $type = "UniPrFinFhs";
protected $localizedfields;
protected $isAssembly;
protected $hoseLengthFt;
protected $hoseLengthM;
protected $bendRestrictor;
protected $fitting1SizeInch;
protected $fitting2SizeInch;


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
* Get fitting1Type - Fitting 1 Type
* @return string|null
*/
public function getFitting1Type(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("fitting1Type", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get fitting2Type - Fitting 2 Type
* @return string|null
*/
public function getFitting2Type(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("fitting2Type", $language);
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
* Get bendRestrictorType - Bend Restrictor Type
* @return string|null
*/
public function getBendRestrictorType(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("bendRestrictorType", $language);
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
* Get note2 - Note 2(below table)
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
* Get fitting1Material - Fitting 1 Material
* @return string|null
*/
public function getFitting1Material(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("fitting1Material", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get fitting2Material - Fitting 2 Material
* @return string|null
*/
public function getFitting2Material(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("fitting2Material", $language);
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
* Set fitting1Type - Fitting 1 Type
* @param string|null $fitting1Type
* @return $this
*/
public function setFitting1Type (?string $fitting1Type, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("fitting1Type", $fitting1Type, $language, !$isEqual);

	return $this;
}

/**
* Set fitting2Type - Fitting 2 Type
* @param string|null $fitting2Type
* @return $this
*/
public function setFitting2Type (?string $fitting2Type, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("fitting2Type", $fitting2Type, $language, !$isEqual);

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
* Set bendRestrictorType - Bend Restrictor Type
* @param string|null $bendRestrictorType
* @return $this
*/
public function setBendRestrictorType (?string $bendRestrictorType, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("bendRestrictorType", $bendRestrictorType, $language, !$isEqual);

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
* Set note2 - Note 2(below table)
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
* Set fitting1Material - Fitting 1 Material
* @param string|null $fitting1Material
* @return $this
*/
public function setFitting1Material (?string $fitting1Material, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("fitting1Material", $fitting1Material, $language, !$isEqual);

	return $this;
}

/**
* Set fitting2Material - Fitting 2 Material
* @param string|null $fitting2Material
* @return $this
*/
public function setFitting2Material (?string $fitting2Material, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("fitting2Material", $fitting2Material, $language, !$isEqual);

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
* Get hoseLengthFt - Hose Length Ft
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getHoseLengthFt(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->hoseLengthFt;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("hoseLengthFt")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("hoseLengthFt");
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
* Set hoseLengthFt - Hose Length Ft
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $hoseLengthFt
* @return $this
*/
public function setHoseLengthFt (?\Pimcore\Model\DataObject\Data\QuantityValue $hoseLengthFt): static
{
	$this->hoseLengthFt = $hoseLengthFt;

	return $this;
}

/**
* Get hoseLengthM - Hose Length (M)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getHoseLengthM(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->hoseLengthM;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("hoseLengthM")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("hoseLengthM");
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
* Set hoseLengthM - Hose Length (M)
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $hoseLengthM
* @return $this
*/
public function setHoseLengthM (?\Pimcore\Model\DataObject\Data\QuantityValue $hoseLengthM): static
{
	$this->hoseLengthM = $hoseLengthM;

	return $this;
}

/**
* Get bendRestrictor - Bend Restrictor Y/N
* @return bool|null
*/
public function getBendRestrictor(): ?bool
{
	$data = $this->bendRestrictor;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("bendRestrictor")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("bendRestrictor");
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
* Set bendRestrictor - Bend Restrictor Y/N
* @param bool|null $bendRestrictor
* @return $this
*/
public function setBendRestrictor (?bool $bendRestrictor): static
{
	$this->bendRestrictor = $bendRestrictor;

	return $this;
}

/**
* Get fitting1SizeInch - Fitting 1 Size (in)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getFitting1SizeInch(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->fitting1SizeInch;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("fitting1SizeInch")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("fitting1SizeInch");
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
* Set fitting1SizeInch - Fitting 1 Size (in)
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $fitting1SizeInch
* @return $this
*/
public function setFitting1SizeInch (?\Pimcore\Model\DataObject\Data\QuantityValue $fitting1SizeInch): static
{
	$this->fitting1SizeInch = $fitting1SizeInch;

	return $this;
}

/**
* Get fitting2SizeInch - Fitting 2 Size (in)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getFitting2SizeInch(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->fitting2SizeInch;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("fitting2SizeInch")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("fitting2SizeInch");
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
* Set fitting2SizeInch - Fitting 2 Size (in)
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $fitting2SizeInch
* @return $this
*/
public function setFitting2SizeInch (?\Pimcore\Model\DataObject\Data\QuantityValue $fitting2SizeInch): static
{
	$this->fitting2SizeInch = $fitting2SizeInch;

	return $this;
}

}

