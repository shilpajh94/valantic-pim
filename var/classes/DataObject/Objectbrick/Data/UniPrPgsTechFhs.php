<?php

/**
 * Fields Summary:
 * - hoseLengthMetric [input]
 * - hoseLengthImperial [input]
 */

namespace Pimcore\Model\DataObject\Objectbrick\Data;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;


class UniPrPgsTechFhs extends DataObject\Objectbrick\Data\AbstractData
{
public const FIELD_HOSE_LENGTH_METRIC = 'hoseLengthMetric';
public const FIELD_HOSE_LENGTH_IMPERIAL = 'hoseLengthImperial';

protected string $type = "UniPrPgsTechFhs";
protected $hoseLengthMetric;
protected $hoseLengthImperial;


/**
* UniPrPgsTechFhs constructor.
* @param DataObject\Concrete $object
*/
public function __construct(DataObject\Concrete $object)
{
	parent::__construct($object);
	$this->markFieldDirty("_self");
}


/**
* Get hoseLengthMetric - Hose Length (m)
* @return string|null
*/
public function getHoseLengthMetric(): ?string
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
* Set hoseLengthMetric - Hose Length (m)
* @param string|null $hoseLengthMetric
* @return $this
*/
public function setHoseLengthMetric (?string $hoseLengthMetric): static
{
	$this->hoseLengthMetric = $hoseLengthMetric;

	return $this;
}

/**
* Get hoseLengthImperial - Hose Length (ft)
* @return string|null
*/
public function getHoseLengthImperial(): ?string
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
* Set hoseLengthImperial - Hose Length (ft)
* @param string|null $hoseLengthImperial
* @return $this
*/
public function setHoseLengthImperial (?string $hoseLengthImperial): static
{
	$this->hoseLengthImperial = $hoseLengthImperial;

	return $this;
}

}

