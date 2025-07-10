<?php

/**
 * Fields Summary:
 * - tubeMaterialExportVersion [input]
 * - tubeMaterialInnerLining [select]
 * - tubeStandard [input]
 */

namespace Pimcore\Model\DataObject\Objectbrick\Data;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;


class UniPrBrandFhs extends \App\Model\DataObject\UniProductManagement\Objectbrick\AbstractUniPrBrand
{
public const FIELD_TUBE_MATERIAL_EXPORT_VERSION = 'tubeMaterialExportVersion';
public const FIELD_TUBE_MATERIAL_INNER_LINING = 'tubeMaterialInnerLining';
public const FIELD_TUBE_STANDARD = 'tubeStandard';

protected string $type = "UniPrBrandFhs";
protected $tubeMaterialExportVersion;
protected $tubeMaterialInnerLining;
protected $tubeStandard;


/**
* UniPrBrandFhs constructor.
* @param DataObject\Concrete $object
*/
public function __construct(DataObject\Concrete $object)
{
	parent::__construct($object);
	$this->markFieldDirty("_self");
}


/**
* Get tubeMaterialExportVersion - Tube Material / Export Version
* @return string|null
*/
public function getTubeMaterialExportVersion(): ?string
{
	$data = $this->tubeMaterialExportVersion;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("tubeMaterialExportVersion")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("tubeMaterialExportVersion");
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
* Set tubeMaterialExportVersion - Tube Material / Export Version
* @param string|null $tubeMaterialExportVersion
* @return $this
*/
public function setTubeMaterialExportVersion (?string $tubeMaterialExportVersion): static
{
	$this->tubeMaterialExportVersion = $tubeMaterialExportVersion;

	return $this;
}

/**
* Get tubeMaterialInnerLining - Tube Material / Inner Lining
* @return string|null
*/
public function getTubeMaterialInnerLining(): ?string
{
	$data = $this->tubeMaterialInnerLining;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("tubeMaterialInnerLining")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("tubeMaterialInnerLining");
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
* Set tubeMaterialInnerLining - Tube Material / Inner Lining
* @param string|null $tubeMaterialInnerLining
* @return $this
*/
public function setTubeMaterialInnerLining (?string $tubeMaterialInnerLining): static
{
	$this->tubeMaterialInnerLining = $tubeMaterialInnerLining;

	return $this;
}

/**
* Get tubeStandard - Standard Met; Tube
* @return string|null
*/
public function getTubeStandard(): ?string
{
	$data = $this->tubeStandard;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("tubeStandard")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("tubeStandard");
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
* Set tubeStandard - Standard Met; Tube
* @param string|null $tubeStandard
* @return $this
*/
public function setTubeStandard (?string $tubeStandard): static
{
	$this->tubeStandard = $tubeStandard;

	return $this;
}

}

