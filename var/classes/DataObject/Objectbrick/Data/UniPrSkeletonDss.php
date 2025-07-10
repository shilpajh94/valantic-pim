<?php

/**
 * Fields Summary:
 * - workingPressureMetric [numeric]
 * - airInletLocation [input]
 * - application [input]
 */

namespace Pimcore\Model\DataObject\Objectbrick\Data;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;


class UniPrSkeletonDss extends \App\Model\DataObject\UniProductManagement\Objectbrick\AbstractUniPrSkeleton
{
public const FIELD_WORKING_PRESSURE_METRIC = 'workingPressureMetric';
public const FIELD_AIR_INLET_LOCATION = 'airInletLocation';
public const FIELD_APPLICATION = 'application';

protected string $type = "UniPrSkeletonDss";
protected $workingPressureMetric;
protected $airInletLocation;
protected $application;


/**
* UniPrSkeletonDss constructor.
* @param DataObject\Concrete $object
*/
public function __construct(DataObject\Concrete $object)
{
	parent::__construct($object);
	$this->markFieldDirty("_self");
}


/**
* Get workingPressureMetric - Working Pressure (Bar)
* @return float|null
*/
public function getWorkingPressureMetric(): ?float
{
	$data = $this->workingPressureMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("workingPressureMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("workingPressureMetric");
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
* Set workingPressureMetric - Working Pressure (Bar)
* @param float|null $workingPressureMetric
* @return $this
*/
public function setWorkingPressureMetric (?float $workingPressureMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("workingPressureMetric");
	$this->workingPressureMetric = $fd->preSetData($this, $workingPressureMetric);
	return $this;
}

/**
* Get airInletLocation - Air Inlet Location
* @return string|null
*/
public function getAirInletLocation(): ?string
{
	$data = $this->airInletLocation;
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
* @param string|null $airInletLocation
* @return $this
*/
public function setAirInletLocation (?string $airInletLocation): static
{
	$this->airInletLocation = $airInletLocation;

	return $this;
}

/**
* Get application - Application
* @return string|null
*/
public function getApplication(): ?string
{
	$data = $this->application;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("application")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("application");
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
* Set application - Application
* @param string|null $application
* @return $this
*/
public function setApplication (?string $application): static
{
	$this->application = $application;

	return $this;
}

}

