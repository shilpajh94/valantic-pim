<?php

/**
 * Fields Summary:
 * - outsideDiameterMetric [numeric]
 * - insideDiameterMetric [numeric]
 * - vacuumMetric [numeric]
 * - tubeGaugeMetric [numeric]
 * - bendRadiusMetric [numeric]
 * - outsideDiameterInnerHoseMetric [numeric]
 * - insideDiameterInnerHoseMetric [numeric]
 * - insideDiameterFractionInnerHoseImperial [numeric]
 * - outsideDiameterImperial [numeric]
 * - insideDiameterImperial [numeric]
 * - vacuumImperial [numeric]
 * - tubeGaugeImperial [numeric]
 * - bendRadiusImperial [numeric]
 * - outsideDiameterInnerHoseImperial [numeric]
 * - insideDiameterInnerHoseImperial [numeric]
 * - insideDiameterFractionImperial [numeric]
 * - minimumBurstPressureMpa [numeric]
 * - workingPressureMpa [numeric]
 * - workingPressureBar [numeric]
 * - minimumBurstPressurePsi [numeric]
 * - workingPressurePsi [numeric]
 * - hoseDashSizeHyd [numeric]
 * - negativePositiveTolerance [select]
 * - ratingsFlexibility [select]
 * - temperatureRatings [input]
 * - notesTemperature [input]
 * - isJustTemporarily [checkbox]
 * - temperatureMax [quantityValueRange]
 * - temporaryUntilC [numeric]
 * - dampableUntil1C [numeric]
 * - dampableUntil2C [numeric]
 * - pressureUntil [quantityValue]
 * - temperatureMin [quantityValueRange]
 * - temporaryUntilT [numeric]
 * - dampableUntil1T [numeric]
 * - dampableUntil2T [numeric]
 * - isOnlyOpenSystem [checkbox]
 * - localizedfields [localizedfields]
 * -- headlineWeb [input]
 * -- flowMediumStabilityFlag [input]
 * -- supplementaryDeclarations [input]
 * -- easyPack [input]
 * -- methodOfCalculation [textarea]
 * -- flameRetardant [textarea]
 * -- declarationsResistanceToChlorine [input]
 * -- declarationsResistanceToCrushing [input]
 * -- declarationsAntiUv [input]
 * -- declarationsResistanceToAbrasion [input]
 * -- declarationsResistanceToMould [input]
 * -- declarationsFlexibility [textarea]
 * -- conductive [textarea]
 * -- caution [textarea]
 * -- atex [input]
 * -- antistatic [input]
 * -- siliconFree [input]
 * -- phtalateFree [input]
 * -- forFood2 [textarea]
 * -- flameRetardant2 [textarea]
 * -- declarationsResistanceToTear [input]
 * -- declarationsResistanceToPerforation [input]
 * -- declarationsSmoothSurface [input]
 * -- declarationsResistanceToOzone [input]
 * -- resistanceToChemicals [input]
 * -- resistanceToHydrolysis [textarea]
 * -- resistanceToMicrorganisms [input]
 * -- wasteWater [input]
 * -- trgsHomologation [input]
 * -- compressionLoad [textarea]
 * -- calibratedDiameters [input]
 * -- puType [input]
 * -- ophtalateFree [input]
 * -- halogenFree [input]
 * -- forFood [textarea]
 * - ratingsResistanceToAbrasion [select]
 * - ratingsResistanceToTear [select]
 * - ratingsAntiUv [select]
 * - ratingsResistanceToChlorine [select]
 * - ratingsResistanceToCrushing [select]
 * - ratingsResistanceToMould [select]
 * - ratingsResistanceToPerforation [select]
 * - ratingsSmoothSurface [select]
 * - ratingsResistanceToOzone [select]
 */

namespace Pimcore\Model\DataObject\Objectbrick\Data;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;


class UniPrSkFhs extends \App\Model\DataObject\UniProductManagement\Objectbrick\AbstractUniPrSkeleton
{
public const FIELD_OUTSIDE_DIAMETER_METRIC = 'outsideDiameterMetric';
public const FIELD_INSIDE_DIAMETER_METRIC = 'insideDiameterMetric';
public const FIELD_VACUUM_METRIC = 'vacuumMetric';
public const FIELD_TUBE_GAUGE_METRIC = 'tubeGaugeMetric';
public const FIELD_BEND_RADIUS_METRIC = 'bendRadiusMetric';
public const FIELD_OUTSIDE_DIAMETER_INNER_HOSE_METRIC = 'outsideDiameterInnerHoseMetric';
public const FIELD_INSIDE_DIAMETER_INNER_HOSE_METRIC = 'insideDiameterInnerHoseMetric';
public const FIELD_INSIDE_DIAMETER_FRACTION_INNER_HOSE_IMPERIAL = 'insideDiameterFractionInnerHoseImperial';
public const FIELD_OUTSIDE_DIAMETER_IMPERIAL = 'outsideDiameterImperial';
public const FIELD_INSIDE_DIAMETER_IMPERIAL = 'insideDiameterImperial';
public const FIELD_VACUUM_IMPERIAL = 'vacuumImperial';
public const FIELD_TUBE_GAUGE_IMPERIAL = 'tubeGaugeImperial';
public const FIELD_BEND_RADIUS_IMPERIAL = 'bendRadiusImperial';
public const FIELD_OUTSIDE_DIAMETER_INNER_HOSE_IMPERIAL = 'outsideDiameterInnerHoseImperial';
public const FIELD_INSIDE_DIAMETER_INNER_HOSE_IMPERIAL = 'insideDiameterInnerHoseImperial';
public const FIELD_INSIDE_DIAMETER_FRACTION_IMPERIAL = 'insideDiameterFractionImperial';
public const FIELD_MINIMUM_BURST_PRESSURE_MPA = 'minimumBurstPressureMpa';
public const FIELD_WORKING_PRESSURE_MPA = 'workingPressureMpa';
public const FIELD_WORKING_PRESSURE_BAR = 'workingPressureBar';
public const FIELD_MINIMUM_BURST_PRESSURE_PSI = 'minimumBurstPressurePsi';
public const FIELD_WORKING_PRESSURE_PSI = 'workingPressurePsi';
public const FIELD_HOSE_DASH_SIZE_HYD = 'hoseDashSizeHyd';
public const FIELD_NEGATIVE_POSITIVE_TOLERANCE = 'negativePositiveTolerance';
public const FIELD_RATINGS_FLEXIBILITY = 'ratingsFlexibility';
public const FIELD_TEMPERATURE_RATINGS = 'temperatureRatings';
public const FIELD_NOTES_TEMPERATURE = 'notesTemperature';
public const FIELD_IS_JUST_TEMPORARILY = 'isJustTemporarily';
public const FIELD_TEMPERATURE_MAX = 'temperatureMax';
public const FIELD_TEMPORARY_UNTIL_C = 'temporaryUntilC';
public const FIELD_DAMPABLE_UNTIL1_C = 'dampableUntil1C';
public const FIELD_DAMPABLE_UNTIL2_C = 'dampableUntil2C';
public const FIELD_PRESSURE_UNTIL = 'pressureUntil';
public const FIELD_TEMPERATURE_MIN = 'temperatureMin';
public const FIELD_TEMPORARY_UNTIL_T = 'temporaryUntilT';
public const FIELD_DAMPABLE_UNTIL1_T = 'dampableUntil1T';
public const FIELD_DAMPABLE_UNTIL2_T = 'dampableUntil2T';
public const FIELD_IS_ONLY_OPEN_SYSTEM = 'isOnlyOpenSystem';
public const FIELD_HEADLINE_WEB = 'headlineWeb';
public const FIELD_FLOW_MEDIUM_STABILITY_FLAG = 'flowMediumStabilityFlag';
public const FIELD_SUPPLEMENTARY_DECLARATIONS = 'supplementaryDeclarations';
public const FIELD_EASY_PACK = 'easyPack';
public const FIELD_METHOD_OF_CALCULATION = 'methodOfCalculation';
public const FIELD_FLAME_RETARDANT = 'flameRetardant';
public const FIELD_DECLARATIONS_RESISTANCE_TO_CHLORINE = 'declarationsResistanceToChlorine';
public const FIELD_DECLARATIONS_RESISTANCE_TO_CRUSHING = 'declarationsResistanceToCrushing';
public const FIELD_DECLARATIONS_ANTI_UV = 'declarationsAntiUv';
public const FIELD_DECLARATIONS_RESISTANCE_TO_ABRASION = 'declarationsResistanceToAbrasion';
public const FIELD_DECLARATIONS_RESISTANCE_TO_MOULD = 'declarationsResistanceToMould';
public const FIELD_DECLARATIONS_FLEXIBILITY = 'declarationsFlexibility';
public const FIELD_CONDUCTIVE = 'conductive';
public const FIELD_CAUTION = 'caution';
public const FIELD_ATEX = 'atex';
public const FIELD_ANTISTATIC = 'antistatic';
public const FIELD_SILICON_FREE = 'siliconFree';
public const FIELD_PHTALATE_FREE = 'phtalateFree';
public const FIELD_FOR_FOOD2 = 'forFood2';
public const FIELD_FLAME_RETARDANT2 = 'flameRetardant2';
public const FIELD_DECLARATIONS_RESISTANCE_TO_TEAR = 'declarationsResistanceToTear';
public const FIELD_DECLARATIONS_RESISTANCE_TO_PERFORATION = 'declarationsResistanceToPerforation';
public const FIELD_DECLARATIONS_SMOOTH_SURFACE = 'declarationsSmoothSurface';
public const FIELD_DECLARATIONS_RESISTANCE_TO_OZONE = 'declarationsResistanceToOzone';
public const FIELD_RESISTANCE_TO_CHEMICALS = 'resistanceToChemicals';
public const FIELD_RESISTANCE_TO_HYDROLYSIS = 'resistanceToHydrolysis';
public const FIELD_RESISTANCE_TO_MICRORGANISMS = 'resistanceToMicrorganisms';
public const FIELD_WASTE_WATER = 'wasteWater';
public const FIELD_TRGS_HOMOLOGATION = 'trgsHomologation';
public const FIELD_COMPRESSION_LOAD = 'compressionLoad';
public const FIELD_CALIBRATED_DIAMETERS = 'calibratedDiameters';
public const FIELD_PU_TYPE = 'puType';
public const FIELD_OPHTALATE_FREE = 'ophtalateFree';
public const FIELD_HALOGEN_FREE = 'halogenFree';
public const FIELD_FOR_FOOD = 'forFood';
public const FIELD_RATINGS_RESISTANCE_TO_ABRASION = 'ratingsResistanceToAbrasion';
public const FIELD_RATINGS_RESISTANCE_TO_TEAR = 'ratingsResistanceToTear';
public const FIELD_RATINGS_ANTI_UV = 'ratingsAntiUv';
public const FIELD_RATINGS_RESISTANCE_TO_CHLORINE = 'ratingsResistanceToChlorine';
public const FIELD_RATINGS_RESISTANCE_TO_CRUSHING = 'ratingsResistanceToCrushing';
public const FIELD_RATINGS_RESISTANCE_TO_MOULD = 'ratingsResistanceToMould';
public const FIELD_RATINGS_RESISTANCE_TO_PERFORATION = 'ratingsResistanceToPerforation';
public const FIELD_RATINGS_SMOOTH_SURFACE = 'ratingsSmoothSurface';
public const FIELD_RATINGS_RESISTANCE_TO_OZONE = 'ratingsResistanceToOzone';

protected string $type = "UniPrSkFhs";
protected $outsideDiameterMetric;
protected $insideDiameterMetric;
protected $vacuumMetric;
protected $tubeGaugeMetric;
protected $bendRadiusMetric;
protected $outsideDiameterInnerHoseMetric;
protected $insideDiameterInnerHoseMetric;
protected $insideDiameterFractionInnerHoseImperial;
protected $outsideDiameterImperial;
protected $insideDiameterImperial;
protected $vacuumImperial;
protected $tubeGaugeImperial;
protected $bendRadiusImperial;
protected $outsideDiameterInnerHoseImperial;
protected $insideDiameterInnerHoseImperial;
protected $insideDiameterFractionImperial;
protected $minimumBurstPressureMpa;
protected $workingPressureMpa;
protected $workingPressureBar;
protected $minimumBurstPressurePsi;
protected $workingPressurePsi;
protected $hoseDashSizeHyd;
protected $negativePositiveTolerance;
protected $ratingsFlexibility;
protected $temperatureRatings;
protected $notesTemperature;
protected $isJustTemporarily;
protected $temperatureMax;
protected $temporaryUntilC;
protected $dampableUntil1C;
protected $dampableUntil2C;
protected $pressureUntil;
protected $temperatureMin;
protected $temporaryUntilT;
protected $dampableUntil1T;
protected $dampableUntil2T;
protected $isOnlyOpenSystem;
protected $localizedfields;
protected $ratingsResistanceToAbrasion;
protected $ratingsResistanceToTear;
protected $ratingsAntiUv;
protected $ratingsResistanceToChlorine;
protected $ratingsResistanceToCrushing;
protected $ratingsResistanceToMould;
protected $ratingsResistanceToPerforation;
protected $ratingsSmoothSurface;
protected $ratingsResistanceToOzone;


/**
* UniPrSkFhs constructor.
* @param DataObject\Concrete $object
*/
public function __construct(DataObject\Concrete $object)
{
	parent::__construct($object);
	$this->markFieldDirty("_self");
}


/**
* Get outsideDiameterMetric - Outside Diameter (mm)
* @return float|null
*/
public function getOutsideDiameterMetric(): ?float
{
	$data = $this->outsideDiameterMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("outsideDiameterMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("outsideDiameterMetric");
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
* Set outsideDiameterMetric - Outside Diameter (mm)
* @param float|null $outsideDiameterMetric
* @return $this
*/
public function setOutsideDiameterMetric (?float $outsideDiameterMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("outsideDiameterMetric");
	$this->outsideDiameterMetric = $fd->preSetData($this, $outsideDiameterMetric);
	return $this;
}

/**
* Get insideDiameterMetric - Inside Diameter (mm)
* @return float|null
*/
public function getInsideDiameterMetric(): ?float
{
	$data = $this->insideDiameterMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("insideDiameterMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("insideDiameterMetric");
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
* Set insideDiameterMetric - Inside Diameter (mm)
* @param float|null $insideDiameterMetric
* @return $this
*/
public function setInsideDiameterMetric (?float $insideDiameterMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("insideDiameterMetric");
	$this->insideDiameterMetric = $fd->preSetData($this, $insideDiameterMetric);
	return $this;
}

/**
* Get vacuumMetric - Vacuum (mm)
* @return float|null
*/
public function getVacuumMetric(): ?float
{
	$data = $this->vacuumMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("vacuumMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("vacuumMetric");
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
* Set vacuumMetric - Vacuum (mm)
* @param float|null $vacuumMetric
* @return $this
*/
public function setVacuumMetric (?float $vacuumMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("vacuumMetric");
	$this->vacuumMetric = $fd->preSetData($this, $vacuumMetric);
	return $this;
}

/**
* Get tubeGaugeMetric - Tube Gauge (mm) / Wall Thickness
* @return float|null
*/
public function getTubeGaugeMetric(): ?float
{
	$data = $this->tubeGaugeMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("tubeGaugeMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("tubeGaugeMetric");
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
* Set tubeGaugeMetric - Tube Gauge (mm) / Wall Thickness
* @param float|null $tubeGaugeMetric
* @return $this
*/
public function setTubeGaugeMetric (?float $tubeGaugeMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("tubeGaugeMetric");
	$this->tubeGaugeMetric = $fd->preSetData($this, $tubeGaugeMetric);
	return $this;
}

/**
* Get bendRadiusMetric - Bend Radius (mm)
* @return float|null
*/
public function getBendRadiusMetric(): ?float
{
	$data = $this->bendRadiusMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("bendRadiusMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("bendRadiusMetric");
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
* Set bendRadiusMetric - Bend Radius (mm)
* @param float|null $bendRadiusMetric
* @return $this
*/
public function setBendRadiusMetric (?float $bendRadiusMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("bendRadiusMetric");
	$this->bendRadiusMetric = $fd->preSetData($this, $bendRadiusMetric);
	return $this;
}

/**
* Get outsideDiameterInnerHoseMetric - Outside Diameter (mm) - (Inner Hose)
* @return float|null
*/
public function getOutsideDiameterInnerHoseMetric(): ?float
{
	$data = $this->outsideDiameterInnerHoseMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("outsideDiameterInnerHoseMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("outsideDiameterInnerHoseMetric");
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
* Set outsideDiameterInnerHoseMetric - Outside Diameter (mm) - (Inner Hose)
* @param float|null $outsideDiameterInnerHoseMetric
* @return $this
*/
public function setOutsideDiameterInnerHoseMetric (?float $outsideDiameterInnerHoseMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("outsideDiameterInnerHoseMetric");
	$this->outsideDiameterInnerHoseMetric = $fd->preSetData($this, $outsideDiameterInnerHoseMetric);
	return $this;
}

/**
* Get insideDiameterInnerHoseMetric - Inside Diameter (mm ) - (Inner Hose)
* @return float|null
*/
public function getInsideDiameterInnerHoseMetric(): ?float
{
	$data = $this->insideDiameterInnerHoseMetric;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("insideDiameterInnerHoseMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("insideDiameterInnerHoseMetric");
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
* Set insideDiameterInnerHoseMetric - Inside Diameter (mm ) - (Inner Hose)
* @param float|null $insideDiameterInnerHoseMetric
* @return $this
*/
public function setInsideDiameterInnerHoseMetric (?float $insideDiameterInnerHoseMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("insideDiameterInnerHoseMetric");
	$this->insideDiameterInnerHoseMetric = $fd->preSetData($this, $insideDiameterInnerHoseMetric);
	return $this;
}

/**
* Get insideDiameterFractionInnerHoseImperial - Inside Diameter (Fraction) - (Inner Hose)
* @return float|null
*/
public function getInsideDiameterFractionInnerHoseImperial(): ?float
{
	$data = $this->insideDiameterFractionInnerHoseImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("insideDiameterFractionInnerHoseImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("insideDiameterFractionInnerHoseImperial");
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
* Set insideDiameterFractionInnerHoseImperial - Inside Diameter (Fraction) - (Inner Hose)
* @param float|null $insideDiameterFractionInnerHoseImperial
* @return $this
*/
public function setInsideDiameterFractionInnerHoseImperial (?float $insideDiameterFractionInnerHoseImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("insideDiameterFractionInnerHoseImperial");
	$this->insideDiameterFractionInnerHoseImperial = $fd->preSetData($this, $insideDiameterFractionInnerHoseImperial);
	return $this;
}

/**
* Get outsideDiameterImperial - Outside Diameter (in)
* @return float|null
*/
public function getOutsideDiameterImperial(): ?float
{
	$data = $this->outsideDiameterImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("outsideDiameterImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("outsideDiameterImperial");
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
* Set outsideDiameterImperial - Outside Diameter (in)
* @param float|null $outsideDiameterImperial
* @return $this
*/
public function setOutsideDiameterImperial (?float $outsideDiameterImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("outsideDiameterImperial");
	$this->outsideDiameterImperial = $fd->preSetData($this, $outsideDiameterImperial);
	return $this;
}

/**
* Get insideDiameterImperial - Inside Diameter (in)
* @return float|null
*/
public function getInsideDiameterImperial(): ?float
{
	$data = $this->insideDiameterImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("insideDiameterImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("insideDiameterImperial");
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
* Set insideDiameterImperial - Inside Diameter (in)
* @param float|null $insideDiameterImperial
* @return $this
*/
public function setInsideDiameterImperial (?float $insideDiameterImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("insideDiameterImperial");
	$this->insideDiameterImperial = $fd->preSetData($this, $insideDiameterImperial);
	return $this;
}

/**
* Get vacuumImperial - Vacuum (in)
* @return float|null
*/
public function getVacuumImperial(): ?float
{
	$data = $this->vacuumImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("vacuumImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("vacuumImperial");
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
* Set vacuumImperial - Vacuum (in)
* @param float|null $vacuumImperial
* @return $this
*/
public function setVacuumImperial (?float $vacuumImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("vacuumImperial");
	$this->vacuumImperial = $fd->preSetData($this, $vacuumImperial);
	return $this;
}

/**
* Get tubeGaugeImperial - Tube Gauge (in)  / Wall Thickness
* @return float|null
*/
public function getTubeGaugeImperial(): ?float
{
	$data = $this->tubeGaugeImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("tubeGaugeImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("tubeGaugeImperial");
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
* Set tubeGaugeImperial - Tube Gauge (in)  / Wall Thickness
* @param float|null $tubeGaugeImperial
* @return $this
*/
public function setTubeGaugeImperial (?float $tubeGaugeImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("tubeGaugeImperial");
	$this->tubeGaugeImperial = $fd->preSetData($this, $tubeGaugeImperial);
	return $this;
}

/**
* Get bendRadiusImperial - Bend Radius (in)
* @return float|null
*/
public function getBendRadiusImperial(): ?float
{
	$data = $this->bendRadiusImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("bendRadiusImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("bendRadiusImperial");
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
* Set bendRadiusImperial - Bend Radius (in)
* @param float|null $bendRadiusImperial
* @return $this
*/
public function setBendRadiusImperial (?float $bendRadiusImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("bendRadiusImperial");
	$this->bendRadiusImperial = $fd->preSetData($this, $bendRadiusImperial);
	return $this;
}

/**
* Get outsideDiameterInnerHoseImperial - Outside Diameter (in) - (Inner Hose)
* @return float|null
*/
public function getOutsideDiameterInnerHoseImperial(): ?float
{
	$data = $this->outsideDiameterInnerHoseImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("outsideDiameterInnerHoseImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("outsideDiameterInnerHoseImperial");
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
* Set outsideDiameterInnerHoseImperial - Outside Diameter (in) - (Inner Hose)
* @param float|null $outsideDiameterInnerHoseImperial
* @return $this
*/
public function setOutsideDiameterInnerHoseImperial (?float $outsideDiameterInnerHoseImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("outsideDiameterInnerHoseImperial");
	$this->outsideDiameterInnerHoseImperial = $fd->preSetData($this, $outsideDiameterInnerHoseImperial);
	return $this;
}

/**
* Get insideDiameterInnerHoseImperial - Inside Diameter (in) - (Inner Hose)
* @return float|null
*/
public function getInsideDiameterInnerHoseImperial(): ?float
{
	$data = $this->insideDiameterInnerHoseImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("insideDiameterInnerHoseImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("insideDiameterInnerHoseImperial");
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
* Set insideDiameterInnerHoseImperial - Inside Diameter (in) - (Inner Hose)
* @param float|null $insideDiameterInnerHoseImperial
* @return $this
*/
public function setInsideDiameterInnerHoseImperial (?float $insideDiameterInnerHoseImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("insideDiameterInnerHoseImperial");
	$this->insideDiameterInnerHoseImperial = $fd->preSetData($this, $insideDiameterInnerHoseImperial);
	return $this;
}

/**
* Get insideDiameterFractionImperial - Inside Diameter (Fraction)
* @return float|null
*/
public function getInsideDiameterFractionImperial(): ?float
{
	$data = $this->insideDiameterFractionImperial;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("insideDiameterFractionImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("insideDiameterFractionImperial");
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
* Set insideDiameterFractionImperial - Inside Diameter (Fraction)
* @param float|null $insideDiameterFractionImperial
* @return $this
*/
public function setInsideDiameterFractionImperial (?float $insideDiameterFractionImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("insideDiameterFractionImperial");
	$this->insideDiameterFractionImperial = $fd->preSetData($this, $insideDiameterFractionImperial);
	return $this;
}

/**
* Get minimumBurstPressureMpa - Minimum Burst Pressure (MPa)
* @return float|null
*/
public function getMinimumBurstPressureMpa(): ?float
{
	$data = $this->minimumBurstPressureMpa;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("minimumBurstPressureMpa")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("minimumBurstPressureMpa");
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
* Set minimumBurstPressureMpa - Minimum Burst Pressure (MPa)
* @param float|null $minimumBurstPressureMpa
* @return $this
*/
public function setMinimumBurstPressureMpa (?float $minimumBurstPressureMpa): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("minimumBurstPressureMpa");
	$this->minimumBurstPressureMpa = $fd->preSetData($this, $minimumBurstPressureMpa);
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
* Get workingPressureBar - Working Pressure (bar)
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
* Set workingPressureBar - Working Pressure (bar)
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
* Get minimumBurstPressurePsi - Minimum Burst Pressure (PSI)
* @return float|null
*/
public function getMinimumBurstPressurePsi(): ?float
{
	$data = $this->minimumBurstPressurePsi;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("minimumBurstPressurePsi")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("minimumBurstPressurePsi");
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
* Set minimumBurstPressurePsi - Minimum Burst Pressure (PSI)
* @param float|null $minimumBurstPressurePsi
* @return $this
*/
public function setMinimumBurstPressurePsi (?float $minimumBurstPressurePsi): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("minimumBurstPressurePsi");
	$this->minimumBurstPressurePsi = $fd->preSetData($this, $minimumBurstPressurePsi);
	return $this;
}

/**
* Get workingPressurePsi - Working Pressure (PSI)
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
* Set workingPressurePsi - Working Pressure (PSI)
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
* Get hoseDashSizeHyd - Hose Dash Size (HYD)
* @return float|null
*/
public function getHoseDashSizeHyd(): ?float
{
	$data = $this->hoseDashSizeHyd;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("hoseDashSizeHyd")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("hoseDashSizeHyd");
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
* Set hoseDashSizeHyd - Hose Dash Size (HYD)
* @param float|null $hoseDashSizeHyd
* @return $this
*/
public function setHoseDashSizeHyd (?float $hoseDashSizeHyd): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("hoseDashSizeHyd");
	$this->hoseDashSizeHyd = $fd->preSetData($this, $hoseDashSizeHyd);
	return $this;
}

/**
* Get negativePositiveTolerance - Negative / PositiveTolerance
* @return string|null
*/
public function getNegativePositiveTolerance(): ?string
{
	$data = $this->negativePositiveTolerance;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("negativePositiveTolerance")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("negativePositiveTolerance");
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
* Set negativePositiveTolerance - Negative / PositiveTolerance
* @param string|null $negativePositiveTolerance
* @return $this
*/
public function setNegativePositiveTolerance (?string $negativePositiveTolerance): static
{
	$this->negativePositiveTolerance = $negativePositiveTolerance;

	return $this;
}

/**
* Get ratingsFlexibility - Flexibility
* @return string|null
*/
public function getRatingsFlexibility(): ?string
{
	$data = $this->ratingsFlexibility;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("ratingsFlexibility")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("ratingsFlexibility");
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
* Set ratingsFlexibility - Flexibility
* @param string|null $ratingsFlexibility
* @return $this
*/
public function setRatingsFlexibility (?string $ratingsFlexibility): static
{
	$this->ratingsFlexibility = $ratingsFlexibility;

	return $this;
}

/**
* Get temperatureRatings - Temperature Ratings / Applications
* @return string|null
*/
public function getTemperatureRatings(): ?string
{
	$data = $this->temperatureRatings;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("temperatureRatings")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("temperatureRatings");
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
* Set temperatureRatings - Temperature Ratings / Applications
* @param string|null $temperatureRatings
* @return $this
*/
public function setTemperatureRatings (?string $temperatureRatings): static
{
	$this->temperatureRatings = $temperatureRatings;

	return $this;
}

/**
* Get notesTemperature - Notes Temperature
* @return string|null
*/
public function getNotesTemperature(): ?string
{
	$data = $this->notesTemperature;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("notesTemperature")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("notesTemperature");
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
* Set notesTemperature - Notes Temperature
* @param string|null $notesTemperature
* @return $this
*/
public function setNotesTemperature (?string $notesTemperature): static
{
	$this->notesTemperature = $notesTemperature;

	return $this;
}

/**
* Get isJustTemporarily - just "temporarily"
* @return bool|null
*/
public function getIsJustTemporarily(): ?bool
{
	$data = $this->isJustTemporarily;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("isJustTemporarily")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("isJustTemporarily");
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
* Set isJustTemporarily - just "temporarily"
* @param bool|null $isJustTemporarily
* @return $this
*/
public function setIsJustTemporarily (?bool $isJustTemporarily): static
{
	$this->isJustTemporarily = $isJustTemporarily;

	return $this;
}

/**
* Get temperatureMax - Temperature (max)
* @return \Pimcore\Model\DataObject\Data\QuantityValueRange|null
*/
public function getTemperatureMax(): ?\Pimcore\Model\DataObject\Data\QuantityValueRange
{
	$data = $this->temperatureMax;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("temperatureMax")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("temperatureMax");
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
* Set temperatureMax - Temperature (max)
* @param \Pimcore\Model\DataObject\Data\QuantityValueRange|null $temperatureMax
* @return $this
*/
public function setTemperatureMax (?\Pimcore\Model\DataObject\Data\QuantityValueRange $temperatureMax): static
{
	$this->temperatureMax = $temperatureMax;

	return $this;
}

/**
* Get temporaryUntilC - Temporary until (°C)
* @return float|null
*/
public function getTemporaryUntilC(): ?float
{
	$data = $this->temporaryUntilC;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("temporaryUntilC")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("temporaryUntilC");
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
* Set temporaryUntilC - Temporary until (°C)
* @param float|null $temporaryUntilC
* @return $this
*/
public function setTemporaryUntilC (?float $temporaryUntilC): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("temporaryUntilC");
	$this->temporaryUntilC = $fd->preSetData($this, $temporaryUntilC);
	return $this;
}

/**
* Get dampableUntil1C - Dampable until 1 (°C)
* @return float|null
*/
public function getDampableUntil1C(): ?float
{
	$data = $this->dampableUntil1C;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("dampableUntil1C")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("dampableUntil1C");
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
* Set dampableUntil1C - Dampable until 1 (°C)
* @param float|null $dampableUntil1C
* @return $this
*/
public function setDampableUntil1C (?float $dampableUntil1C): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("dampableUntil1C");
	$this->dampableUntil1C = $fd->preSetData($this, $dampableUntil1C);
	return $this;
}

/**
* Get dampableUntil2C - Dampable until 2 (°C)
* @return float|null
*/
public function getDampableUntil2C(): ?float
{
	$data = $this->dampableUntil2C;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("dampableUntil2C")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("dampableUntil2C");
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
* Set dampableUntil2C - Dampable until 2 (°C)
* @param float|null $dampableUntil2C
* @return $this
*/
public function setDampableUntil2C (?float $dampableUntil2C): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("dampableUntil2C");
	$this->dampableUntil2C = $fd->preSetData($this, $dampableUntil2C);
	return $this;
}

/**
* Get pressureUntil - Pressure Until
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getPressureUntil(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->pressureUntil;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("pressureUntil")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("pressureUntil");
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
* Set pressureUntil - Pressure Until
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $pressureUntil
* @return $this
*/
public function setPressureUntil (?\Pimcore\Model\DataObject\Data\QuantityValue $pressureUntil): static
{
	$this->pressureUntil = $pressureUntil;

	return $this;
}

/**
* Get temperatureMin - Temperature (min)
* @return \Pimcore\Model\DataObject\Data\QuantityValueRange|null
*/
public function getTemperatureMin(): ?\Pimcore\Model\DataObject\Data\QuantityValueRange
{
	$data = $this->temperatureMin;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("temperatureMin")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("temperatureMin");
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
* Set temperatureMin - Temperature (min)
* @param \Pimcore\Model\DataObject\Data\QuantityValueRange|null $temperatureMin
* @return $this
*/
public function setTemperatureMin (?\Pimcore\Model\DataObject\Data\QuantityValueRange $temperatureMin): static
{
	$this->temperatureMin = $temperatureMin;

	return $this;
}

/**
* Get temporaryUntilT - Temporary until (t)
* @return float|null
*/
public function getTemporaryUntilT(): ?float
{
	$data = $this->temporaryUntilT;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("temporaryUntilT")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("temporaryUntilT");
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
* Set temporaryUntilT - Temporary until (t)
* @param float|null $temporaryUntilT
* @return $this
*/
public function setTemporaryUntilT (?float $temporaryUntilT): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("temporaryUntilT");
	$this->temporaryUntilT = $fd->preSetData($this, $temporaryUntilT);
	return $this;
}

/**
* Get dampableUntil1T - Dampable until 1 (t)
* @return float|null
*/
public function getDampableUntil1T(): ?float
{
	$data = $this->dampableUntil1T;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("dampableUntil1T")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("dampableUntil1T");
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
* Set dampableUntil1T - Dampable until 1 (t)
* @param float|null $dampableUntil1T
* @return $this
*/
public function setDampableUntil1T (?float $dampableUntil1T): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("dampableUntil1T");
	$this->dampableUntil1T = $fd->preSetData($this, $dampableUntil1T);
	return $this;
}

/**
* Get dampableUntil2T - Dampable until 2 (°C)
* @return float|null
*/
public function getDampableUntil2T(): ?float
{
	$data = $this->dampableUntil2T;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("dampableUntil2T")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("dampableUntil2T");
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
* Set dampableUntil2T - Dampable until 2 (°C)
* @param float|null $dampableUntil2T
* @return $this
*/
public function setDampableUntil2T (?float $dampableUntil2T): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("dampableUntil2T");
	$this->dampableUntil2T = $fd->preSetData($this, $dampableUntil2T);
	return $this;
}

/**
* Get isOnlyOpenSystem - Only Open System
* @return bool|null
*/
public function getIsOnlyOpenSystem(): ?bool
{
	$data = $this->isOnlyOpenSystem;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("isOnlyOpenSystem")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("isOnlyOpenSystem");
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
* Set isOnlyOpenSystem - Only Open System
* @param bool|null $isOnlyOpenSystem
* @return $this
*/
public function setIsOnlyOpenSystem (?bool $isOnlyOpenSystem): static
{
	$this->isOnlyOpenSystem = $isOnlyOpenSystem;

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
* Get headlineWeb - Headline (Web)
* @return string|null
*/
public function getHeadlineWeb(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("headlineWeb", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get flowMediumStabilityFlag - Flow Medium - Stability Flag
* @return string|null
*/
public function getFlowMediumStabilityFlag(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("flowMediumStabilityFlag", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get supplementaryDeclarations - Supplementary Declarations
* @return string|null
*/
public function getSupplementaryDeclarations(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("supplementaryDeclarations", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get easyPack - Easy Pack
* @return string|null
*/
public function getEasyPack(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("easyPack", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get methodOfCalculation - Method of Calculation
* @return string|null
*/
public function getMethodOfCalculation(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("methodOfCalculation", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get flameRetardant - Flame Retardant
* @return string|null
*/
public function getFlameRetardant(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("flameRetardant", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get declarationsResistanceToChlorine - Resistance to: Chlorine
* @return string|null
*/
public function getDeclarationsResistanceToChlorine(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("declarationsResistanceToChlorine", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get declarationsResistanceToCrushing - Resistance to: Crushing
* @return string|null
*/
public function getDeclarationsResistanceToCrushing(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("declarationsResistanceToCrushing", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get declarationsAntiUv - Anti UV
* @return string|null
*/
public function getDeclarationsAntiUv(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("declarationsAntiUv", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get declarationsResistanceToAbrasion - Resistance to: Abrasion
* @return string|null
*/
public function getDeclarationsResistanceToAbrasion(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("declarationsResistanceToAbrasion", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get declarationsResistanceToMould - Resistance to: Mould
* @return string|null
*/
public function getDeclarationsResistanceToMould(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("declarationsResistanceToMould", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get declarationsFlexibility - Flexibility
* @return string|null
*/
public function getDeclarationsFlexibility(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("declarationsFlexibility", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get conductive - Conductive
* @return string|null
*/
public function getConductive(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("conductive", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get caution - Caution
* @return string|null
*/
public function getCaution(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("caution", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get atex - ATEX
* @return string|null
*/
public function getAtex(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("atex", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get antistatic - Antistatic
* @return string|null
*/
public function getAntistatic(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("antistatic", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get siliconFree - Silicon Free
* @return string|null
*/
public function getSiliconFree(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("siliconFree", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get phtalateFree - Phtalate Free
* @return string|null
*/
public function getPhtalateFree(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("phtalateFree", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get forFood2 - For Food 2
* @return string|null
*/
public function getForFood2(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("forFood2", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get flameRetardant2 - Flame Retardant  2
* @return string|null
*/
public function getFlameRetardant2(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("flameRetardant2", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get declarationsResistanceToTear - Resistance to: Tear / Tearing
* @return string|null
*/
public function getDeclarationsResistanceToTear(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("declarationsResistanceToTear", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get declarationsResistanceToPerforation - Resistance to: Perforation
* @return string|null
*/
public function getDeclarationsResistanceToPerforation(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("declarationsResistanceToPerforation", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get declarationsSmoothSurface - Smooth surface
* @return string|null
*/
public function getDeclarationsSmoothSurface(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("declarationsSmoothSurface", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get declarationsResistanceToOzone - Resistance to: Ozone
* @return string|null
*/
public function getDeclarationsResistanceToOzone(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("declarationsResistanceToOzone", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get resistanceToChemicals - Resistance to: Chemicals
* @return string|null
*/
public function getResistanceToChemicals(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("resistanceToChemicals", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get resistanceToHydrolysis - Resistance To Hydrolysis
* @return string|null
*/
public function getResistanceToHydrolysis(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("resistanceToHydrolysis", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get resistanceToMicrorganisms - Resistance to: Microrganisms
* @return string|null
*/
public function getResistanceToMicrorganisms(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("resistanceToMicrorganisms", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get wasteWater - Waste water
* @return string|null
*/
public function getWasteWater(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("wasteWater", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get trgsHomologation - TRGS Homologation
* @return string|null
*/
public function getTrgsHomologation(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("trgsHomologation", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get compressionLoad - Compression Load
* @return string|null
*/
public function getCompressionLoad(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("compressionLoad", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get calibratedDiameters - Calibrated Diameters
* @return string|null
*/
public function getCalibratedDiameters(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("calibratedDiameters", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get puType - PU Type
* @return string|null
*/
public function getPuType(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("puType", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get ophtalateFree - O-Phtalate Free
* @return string|null
*/
public function getOphtalateFree(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("ophtalateFree", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get halogenFree - Halogen Free
* @return string|null
*/
public function getHalogenFree(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("halogenFree", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get forFood - For Food
* @return string|null
*/
public function getForFood(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("forFood", $language);
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
* Set headlineWeb - Headline (Web)
* @param string|null $headlineWeb
* @return $this
*/
public function setHeadlineWeb (?string $headlineWeb, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("headlineWeb", $headlineWeb, $language, !$isEqual);

	return $this;
}

/**
* Set flowMediumStabilityFlag - Flow Medium - Stability Flag
* @param string|null $flowMediumStabilityFlag
* @return $this
*/
public function setFlowMediumStabilityFlag (?string $flowMediumStabilityFlag, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("flowMediumStabilityFlag", $flowMediumStabilityFlag, $language, !$isEqual);

	return $this;
}

/**
* Set supplementaryDeclarations - Supplementary Declarations
* @param string|null $supplementaryDeclarations
* @return $this
*/
public function setSupplementaryDeclarations (?string $supplementaryDeclarations, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("supplementaryDeclarations", $supplementaryDeclarations, $language, !$isEqual);

	return $this;
}

/**
* Set easyPack - Easy Pack
* @param string|null $easyPack
* @return $this
*/
public function setEasyPack (?string $easyPack, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("easyPack", $easyPack, $language, !$isEqual);

	return $this;
}

/**
* Set methodOfCalculation - Method of Calculation
* @param string|null $methodOfCalculation
* @return $this
*/
public function setMethodOfCalculation (?string $methodOfCalculation, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("methodOfCalculation", $methodOfCalculation, $language, !$isEqual);

	return $this;
}

/**
* Set flameRetardant - Flame Retardant
* @param string|null $flameRetardant
* @return $this
*/
public function setFlameRetardant (?string $flameRetardant, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("flameRetardant", $flameRetardant, $language, !$isEqual);

	return $this;
}

/**
* Set declarationsResistanceToChlorine - Resistance to: Chlorine
* @param string|null $declarationsResistanceToChlorine
* @return $this
*/
public function setDeclarationsResistanceToChlorine (?string $declarationsResistanceToChlorine, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("declarationsResistanceToChlorine", $declarationsResistanceToChlorine, $language, !$isEqual);

	return $this;
}

/**
* Set declarationsResistanceToCrushing - Resistance to: Crushing
* @param string|null $declarationsResistanceToCrushing
* @return $this
*/
public function setDeclarationsResistanceToCrushing (?string $declarationsResistanceToCrushing, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("declarationsResistanceToCrushing", $declarationsResistanceToCrushing, $language, !$isEqual);

	return $this;
}

/**
* Set declarationsAntiUv - Anti UV
* @param string|null $declarationsAntiUv
* @return $this
*/
public function setDeclarationsAntiUv (?string $declarationsAntiUv, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("declarationsAntiUv", $declarationsAntiUv, $language, !$isEqual);

	return $this;
}

/**
* Set declarationsResistanceToAbrasion - Resistance to: Abrasion
* @param string|null $declarationsResistanceToAbrasion
* @return $this
*/
public function setDeclarationsResistanceToAbrasion (?string $declarationsResistanceToAbrasion, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("declarationsResistanceToAbrasion", $declarationsResistanceToAbrasion, $language, !$isEqual);

	return $this;
}

/**
* Set declarationsResistanceToMould - Resistance to: Mould
* @param string|null $declarationsResistanceToMould
* @return $this
*/
public function setDeclarationsResistanceToMould (?string $declarationsResistanceToMould, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("declarationsResistanceToMould", $declarationsResistanceToMould, $language, !$isEqual);

	return $this;
}

/**
* Set declarationsFlexibility - Flexibility
* @param string|null $declarationsFlexibility
* @return $this
*/
public function setDeclarationsFlexibility (?string $declarationsFlexibility, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("declarationsFlexibility", $declarationsFlexibility, $language, !$isEqual);

	return $this;
}

/**
* Set conductive - Conductive
* @param string|null $conductive
* @return $this
*/
public function setConductive (?string $conductive, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("conductive", $conductive, $language, !$isEqual);

	return $this;
}

/**
* Set caution - Caution
* @param string|null $caution
* @return $this
*/
public function setCaution (?string $caution, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("caution", $caution, $language, !$isEqual);

	return $this;
}

/**
* Set atex - ATEX
* @param string|null $atex
* @return $this
*/
public function setAtex (?string $atex, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("atex", $atex, $language, !$isEqual);

	return $this;
}

/**
* Set antistatic - Antistatic
* @param string|null $antistatic
* @return $this
*/
public function setAntistatic (?string $antistatic, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("antistatic", $antistatic, $language, !$isEqual);

	return $this;
}

/**
* Set siliconFree - Silicon Free
* @param string|null $siliconFree
* @return $this
*/
public function setSiliconFree (?string $siliconFree, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("siliconFree", $siliconFree, $language, !$isEqual);

	return $this;
}

/**
* Set phtalateFree - Phtalate Free
* @param string|null $phtalateFree
* @return $this
*/
public function setPhtalateFree (?string $phtalateFree, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("phtalateFree", $phtalateFree, $language, !$isEqual);

	return $this;
}

/**
* Set forFood2 - For Food 2
* @param string|null $forFood2
* @return $this
*/
public function setForFood2 (?string $forFood2, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("forFood2", $forFood2, $language, !$isEqual);

	return $this;
}

/**
* Set flameRetardant2 - Flame Retardant  2
* @param string|null $flameRetardant2
* @return $this
*/
public function setFlameRetardant2 (?string $flameRetardant2, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("flameRetardant2", $flameRetardant2, $language, !$isEqual);

	return $this;
}

/**
* Set declarationsResistanceToTear - Resistance to: Tear / Tearing
* @param string|null $declarationsResistanceToTear
* @return $this
*/
public function setDeclarationsResistanceToTear (?string $declarationsResistanceToTear, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("declarationsResistanceToTear", $declarationsResistanceToTear, $language, !$isEqual);

	return $this;
}

/**
* Set declarationsResistanceToPerforation - Resistance to: Perforation
* @param string|null $declarationsResistanceToPerforation
* @return $this
*/
public function setDeclarationsResistanceToPerforation (?string $declarationsResistanceToPerforation, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("declarationsResistanceToPerforation", $declarationsResistanceToPerforation, $language, !$isEqual);

	return $this;
}

/**
* Set declarationsSmoothSurface - Smooth surface
* @param string|null $declarationsSmoothSurface
* @return $this
*/
public function setDeclarationsSmoothSurface (?string $declarationsSmoothSurface, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("declarationsSmoothSurface", $declarationsSmoothSurface, $language, !$isEqual);

	return $this;
}

/**
* Set declarationsResistanceToOzone - Resistance to: Ozone
* @param string|null $declarationsResistanceToOzone
* @return $this
*/
public function setDeclarationsResistanceToOzone (?string $declarationsResistanceToOzone, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("declarationsResistanceToOzone", $declarationsResistanceToOzone, $language, !$isEqual);

	return $this;
}

/**
* Set resistanceToChemicals - Resistance to: Chemicals
* @param string|null $resistanceToChemicals
* @return $this
*/
public function setResistanceToChemicals (?string $resistanceToChemicals, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("resistanceToChemicals", $resistanceToChemicals, $language, !$isEqual);

	return $this;
}

/**
* Set resistanceToHydrolysis - Resistance To Hydrolysis
* @param string|null $resistanceToHydrolysis
* @return $this
*/
public function setResistanceToHydrolysis (?string $resistanceToHydrolysis, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("resistanceToHydrolysis", $resistanceToHydrolysis, $language, !$isEqual);

	return $this;
}

/**
* Set resistanceToMicrorganisms - Resistance to: Microrganisms
* @param string|null $resistanceToMicrorganisms
* @return $this
*/
public function setResistanceToMicrorganisms (?string $resistanceToMicrorganisms, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("resistanceToMicrorganisms", $resistanceToMicrorganisms, $language, !$isEqual);

	return $this;
}

/**
* Set wasteWater - Waste water
* @param string|null $wasteWater
* @return $this
*/
public function setWasteWater (?string $wasteWater, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("wasteWater", $wasteWater, $language, !$isEqual);

	return $this;
}

/**
* Set trgsHomologation - TRGS Homologation
* @param string|null $trgsHomologation
* @return $this
*/
public function setTrgsHomologation (?string $trgsHomologation, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("trgsHomologation", $trgsHomologation, $language, !$isEqual);

	return $this;
}

/**
* Set compressionLoad - Compression Load
* @param string|null $compressionLoad
* @return $this
*/
public function setCompressionLoad (?string $compressionLoad, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("compressionLoad", $compressionLoad, $language, !$isEqual);

	return $this;
}

/**
* Set calibratedDiameters - Calibrated Diameters
* @param string|null $calibratedDiameters
* @return $this
*/
public function setCalibratedDiameters (?string $calibratedDiameters, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("calibratedDiameters", $calibratedDiameters, $language, !$isEqual);

	return $this;
}

/**
* Set puType - PU Type
* @param string|null $puType
* @return $this
*/
public function setPuType (?string $puType, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("puType", $puType, $language, !$isEqual);

	return $this;
}

/**
* Set ophtalateFree - O-Phtalate Free
* @param string|null $ophtalateFree
* @return $this
*/
public function setOphtalateFree (?string $ophtalateFree, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("ophtalateFree", $ophtalateFree, $language, !$isEqual);

	return $this;
}

/**
* Set halogenFree - Halogen Free
* @param string|null $halogenFree
* @return $this
*/
public function setHalogenFree (?string $halogenFree, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("halogenFree", $halogenFree, $language, !$isEqual);

	return $this;
}

/**
* Set forFood - For Food
* @param string|null $forFood
* @return $this
*/
public function setForFood (?string $forFood, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("forFood", $forFood, $language, !$isEqual);

	return $this;
}

/**
* Get ratingsResistanceToAbrasion - Resistance to: Abrasion
* @return string|null
*/
public function getRatingsResistanceToAbrasion(): ?string
{
	$data = $this->ratingsResistanceToAbrasion;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("ratingsResistanceToAbrasion")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("ratingsResistanceToAbrasion");
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
* Set ratingsResistanceToAbrasion - Resistance to: Abrasion
* @param string|null $ratingsResistanceToAbrasion
* @return $this
*/
public function setRatingsResistanceToAbrasion (?string $ratingsResistanceToAbrasion): static
{
	$this->ratingsResistanceToAbrasion = $ratingsResistanceToAbrasion;

	return $this;
}

/**
* Get ratingsResistanceToTear - Resistance to: Tear / Tearing
* @return string|null
*/
public function getRatingsResistanceToTear(): ?string
{
	$data = $this->ratingsResistanceToTear;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("ratingsResistanceToTear")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("ratingsResistanceToTear");
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
* Set ratingsResistanceToTear - Resistance to: Tear / Tearing
* @param string|null $ratingsResistanceToTear
* @return $this
*/
public function setRatingsResistanceToTear (?string $ratingsResistanceToTear): static
{
	$this->ratingsResistanceToTear = $ratingsResistanceToTear;

	return $this;
}

/**
* Get ratingsAntiUv - Anti UV
* @return string|null
*/
public function getRatingsAntiUv(): ?string
{
	$data = $this->ratingsAntiUv;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("ratingsAntiUv")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("ratingsAntiUv");
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
* Set ratingsAntiUv - Anti UV
* @param string|null $ratingsAntiUv
* @return $this
*/
public function setRatingsAntiUv (?string $ratingsAntiUv): static
{
	$this->ratingsAntiUv = $ratingsAntiUv;

	return $this;
}

/**
* Get ratingsResistanceToChlorine - Resistance to: Chlorine
* @return string|null
*/
public function getRatingsResistanceToChlorine(): ?string
{
	$data = $this->ratingsResistanceToChlorine;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("ratingsResistanceToChlorine")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("ratingsResistanceToChlorine");
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
* Set ratingsResistanceToChlorine - Resistance to: Chlorine
* @param string|null $ratingsResistanceToChlorine
* @return $this
*/
public function setRatingsResistanceToChlorine (?string $ratingsResistanceToChlorine): static
{
	$this->ratingsResistanceToChlorine = $ratingsResistanceToChlorine;

	return $this;
}

/**
* Get ratingsResistanceToCrushing - Resistance to: Crushing
* @return string|null
*/
public function getRatingsResistanceToCrushing(): ?string
{
	$data = $this->ratingsResistanceToCrushing;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("ratingsResistanceToCrushing")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("ratingsResistanceToCrushing");
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
* Set ratingsResistanceToCrushing - Resistance to: Crushing
* @param string|null $ratingsResistanceToCrushing
* @return $this
*/
public function setRatingsResistanceToCrushing (?string $ratingsResistanceToCrushing): static
{
	$this->ratingsResistanceToCrushing = $ratingsResistanceToCrushing;

	return $this;
}

/**
* Get ratingsResistanceToMould - Resistance to: Mould
* @return string|null
*/
public function getRatingsResistanceToMould(): ?string
{
	$data = $this->ratingsResistanceToMould;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("ratingsResistanceToMould")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("ratingsResistanceToMould");
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
* Set ratingsResistanceToMould - Resistance to: Mould
* @param string|null $ratingsResistanceToMould
* @return $this
*/
public function setRatingsResistanceToMould (?string $ratingsResistanceToMould): static
{
	$this->ratingsResistanceToMould = $ratingsResistanceToMould;

	return $this;
}

/**
* Get ratingsResistanceToPerforation - Resistance to: Perforation
* @return string|null
*/
public function getRatingsResistanceToPerforation(): ?string
{
	$data = $this->ratingsResistanceToPerforation;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("ratingsResistanceToPerforation")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("ratingsResistanceToPerforation");
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
* Set ratingsResistanceToPerforation - Resistance to: Perforation
* @param string|null $ratingsResistanceToPerforation
* @return $this
*/
public function setRatingsResistanceToPerforation (?string $ratingsResistanceToPerforation): static
{
	$this->ratingsResistanceToPerforation = $ratingsResistanceToPerforation;

	return $this;
}

/**
* Get ratingsSmoothSurface - Smooth Surface
* @return string|null
*/
public function getRatingsSmoothSurface(): ?string
{
	$data = $this->ratingsSmoothSurface;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("ratingsSmoothSurface")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("ratingsSmoothSurface");
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
* Set ratingsSmoothSurface - Smooth Surface
* @param string|null $ratingsSmoothSurface
* @return $this
*/
public function setRatingsSmoothSurface (?string $ratingsSmoothSurface): static
{
	$this->ratingsSmoothSurface = $ratingsSmoothSurface;

	return $this;
}

/**
* Get ratingsResistanceToOzone - Resistance to: Ozone
* @return string|null
*/
public function getRatingsResistanceToOzone(): ?string
{
	$data = $this->ratingsResistanceToOzone;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("ratingsResistanceToOzone")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("ratingsResistanceToOzone");
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
* Set ratingsResistanceToOzone - Resistance to: Ozone
* @param string|null $ratingsResistanceToOzone
* @return $this
*/
public function setRatingsResistanceToOzone (?string $ratingsResistanceToOzone): static
{
	$this->ratingsResistanceToOzone = $ratingsResistanceToOzone;

	return $this;
}

}

