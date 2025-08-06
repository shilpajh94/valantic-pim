<?php

/**
 * Fields Summary:
 * - negativePositiveTolerance [select]
 * - hoseDashSizeHyd [numeric]
 * - vacuumMm [quantityValue]
 * - tubeGaugeMm [quantityValue]
 * - bendRadiusMm [quantityValue]
 * - outsideDiameterMmInnerHose [quantityValue]
 * - insideDiameterMmInnerHose [quantityValue]
 * - outsideDiameterMm [quantityValue]
 * - insideDiameterMm [quantityValue]
 * - tubeGaugeIn [quantityValue]
 * - outsideDiameterIn [quantityValue]
 * - bendRadiusIn [quantityValue]
 * - outsideDiameterInInnerHose [quantityValue]
 * - insideDiameterInInnerHose [quantityValue]
 * - insideDiameterIn [quantityValue]
 * - vacuumIn [quantityValue]
 * - insideDiameterFractionInnerHose [quantityValue]
 * - insideDiameterFraction [quantityValue]
 * - minimumBurstPressurePsi [quantityValue]
 * - minimumBurstPressureMpa [quantityValue]
 * - workingPressureMpa [quantityValue]
 * - workingPressureBar [quantityValue]
 * - workingPressurePsi [quantityValue]
 * - localizedfields [localizedfields]
 * -- declarationsAbrasionResistance [input]
 * -- declarationsAntiUv [input]
 * -- antistatic [input]
 * -- atex [input]
 * -- calibratedDiameters [input]
 * -- caution [textarea]
 * -- chemicalResistance [input]
 * -- declarationsChlorineResistance [input]
 * -- compressionLoad [textarea]
 * -- conductive [textarea]
 * -- declarationsCrushingResistance [select]
 * -- easyPack [input]
 * -- flameRetardant [textarea]
 * -- flameRetardant2 [textarea]
 * -- declarationsFlexibility [textarea]
 * -- forFood [textarea]
 * -- forFood2 [textarea]
 * -- halogenFree [input]
 * -- resistanceToHydrolysis [textarea]
 * -- methodOfCalculation [textarea]
 * -- resistanceToMicrorganisms [select]
 * -- declarationsMouldResistance [input]
 * -- ophtalateFree [input]
 * -- declarationsOzoneResistance [input]
 * -- declarationsPerforationResistance [select]
 * -- phtalateFree [input]
 * -- puType [input]
 * -- siliconFree [input]
 * -- declarationsSmoothSurface [input]
 * -- declarationsTearResistance [select]
 * -- trgsHomologation [input]
 * -- wasteWater [input]
 * -- supplementaryDeclarations [input]
 * -- flowMediumStabilityFlag [input]
 * -- headlineWeb [input]
 * - ratingsAbrasionResistance [select]
 * - ratingsAntiUv [select]
 * - ratingsChlorineResistance [select]
 * - ratingsCrushingResistance [select]
 * - ratingsFlexibility [select]
 * - ratingsMouldResistance [select]
 * - ratingsOzoneResistance [select]
 * - ratingsPerforationResistance [select]
 * - ratingsSmoothSurface [select]
 * - ratingsTearResistance [select]
 * - pressureUntil [quantityValue]
 * - dampableUntil2T [quantityValue]
 * - dampableUntil2C [quantityValue]
 * - dampableUntil1C [quantityValue]
 * - dampableUntil1T [quantityValue]
 * - justTemporarily [checkbox]
 * - temporaryUntilT [quantityValue]
 * - temporaryUntil [quantityValue]
 * - temperatureMin [quantityValue]
 * - temperatureMax [quantityValue]
 * - onlyOpenSystem [checkbox]
 * - notesTemperature [input]
 */

namespace Pimcore\Model\DataObject\Objectbrick\Data;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;


class UniPrSkeleFhs extends \App\Model\DataObject\UniProductManagement\Objectbrick\AbstractUniPrSkeleton
{
public const FIELD_NEGATIVE_POSITIVE_TOLERANCE = 'negativePositiveTolerance';
public const FIELD_HOSE_DASH_SIZE_HYD = 'hoseDashSizeHyd';
public const FIELD_VACUUM_MM = 'vacuumMm';
public const FIELD_TUBE_GAUGE_MM = 'tubeGaugeMm';
public const FIELD_BEND_RADIUS_MM = 'bendRadiusMm';
public const FIELD_OUTSIDE_DIAMETER_MM_INNER_HOSE = 'outsideDiameterMmInnerHose';
public const FIELD_INSIDE_DIAMETER_MM_INNER_HOSE = 'insideDiameterMmInnerHose';
public const FIELD_OUTSIDE_DIAMETER_MM = 'outsideDiameterMm';
public const FIELD_INSIDE_DIAMETER_MM = 'insideDiameterMm';
public const FIELD_TUBE_GAUGE_IN = 'tubeGaugeIn';
public const FIELD_OUTSIDE_DIAMETER_IN = 'outsideDiameterIn';
public const FIELD_BEND_RADIUS_IN = 'bendRadiusIn';
public const FIELD_OUTSIDE_DIAMETER_IN_INNER_HOSE = 'outsideDiameterInInnerHose';
public const FIELD_INSIDE_DIAMETER_IN_INNER_HOSE = 'insideDiameterInInnerHose';
public const FIELD_INSIDE_DIAMETER_IN = 'insideDiameterIn';
public const FIELD_VACUUM_IN = 'vacuumIn';
public const FIELD_INSIDE_DIAMETER_FRACTION_INNER_HOSE = 'insideDiameterFractionInnerHose';
public const FIELD_INSIDE_DIAMETER_FRACTION = 'insideDiameterFraction';
public const FIELD_MINIMUM_BURST_PRESSURE_PSI = 'minimumBurstPressurePsi';
public const FIELD_MINIMUM_BURST_PRESSURE_MPA = 'minimumBurstPressureMpa';
public const FIELD_WORKING_PRESSURE_MPA = 'workingPressureMpa';
public const FIELD_WORKING_PRESSURE_BAR = 'workingPressureBar';
public const FIELD_WORKING_PRESSURE_PSI = 'workingPressurePsi';
public const FIELD_DECLARATIONS_ABRASION_RESISTANCE = 'declarationsAbrasionResistance';
public const FIELD_DECLARATIONS_ANTI_UV = 'declarationsAntiUv';
public const FIELD_ANTISTATIC = 'antistatic';
public const FIELD_ATEX = 'atex';
public const FIELD_CALIBRATED_DIAMETERS = 'calibratedDiameters';
public const FIELD_CAUTION = 'caution';
public const FIELD_CHEMICAL_RESISTANCE = 'chemicalResistance';
public const FIELD_DECLARATIONS_CHLORINE_RESISTANCE = 'declarationsChlorineResistance';
public const FIELD_COMPRESSION_LOAD = 'compressionLoad';
public const FIELD_CONDUCTIVE = 'conductive';
public const FIELD_DECLARATIONS_CRUSHING_RESISTANCE = 'declarationsCrushingResistance';
public const FIELD_EASY_PACK = 'easyPack';
public const FIELD_FLAME_RETARDANT = 'flameRetardant';
public const FIELD_FLAME_RETARDANT2 = 'flameRetardant2';
public const FIELD_DECLARATIONS_FLEXIBILITY = 'declarationsFlexibility';
public const FIELD_FOR_FOOD = 'forFood';
public const FIELD_FOR_FOOD2 = 'forFood2';
public const FIELD_HALOGEN_FREE = 'halogenFree';
public const FIELD_RESISTANCE_TO_HYDROLYSIS = 'resistanceToHydrolysis';
public const FIELD_METHOD_OF_CALCULATION = 'methodOfCalculation';
public const FIELD_RESISTANCE_TO_MICRORGANISMS = 'resistanceToMicrorganisms';
public const FIELD_DECLARATIONS_MOULD_RESISTANCE = 'declarationsMouldResistance';
public const FIELD_OPHTALATE_FREE = 'ophtalateFree';
public const FIELD_DECLARATIONS_OZONE_RESISTANCE = 'declarationsOzoneResistance';
public const FIELD_DECLARATIONS_PERFORATION_RESISTANCE = 'declarationsPerforationResistance';
public const FIELD_PHTALATE_FREE = 'phtalateFree';
public const FIELD_PU_TYPE = 'puType';
public const FIELD_SILICON_FREE = 'siliconFree';
public const FIELD_DECLARATIONS_SMOOTH_SURFACE = 'declarationsSmoothSurface';
public const FIELD_DECLARATIONS_TEAR_RESISTANCE = 'declarationsTearResistance';
public const FIELD_TRGS_HOMOLOGATION = 'trgsHomologation';
public const FIELD_WASTE_WATER = 'wasteWater';
public const FIELD_SUPPLEMENTARY_DECLARATIONS = 'supplementaryDeclarations';
public const FIELD_FLOW_MEDIUM_STABILITY_FLAG = 'flowMediumStabilityFlag';
public const FIELD_HEADLINE_WEB = 'headlineWeb';
public const FIELD_RATINGS_ABRASION_RESISTANCE = 'ratingsAbrasionResistance';
public const FIELD_RATINGS_ANTI_UV = 'ratingsAntiUv';
public const FIELD_RATINGS_CHLORINE_RESISTANCE = 'ratingsChlorineResistance';
public const FIELD_RATINGS_CRUSHING_RESISTANCE = 'ratingsCrushingResistance';
public const FIELD_RATINGS_FLEXIBILITY = 'ratingsFlexibility';
public const FIELD_RATINGS_MOULD_RESISTANCE = 'ratingsMouldResistance';
public const FIELD_RATINGS_OZONE_RESISTANCE = 'ratingsOzoneResistance';
public const FIELD_RATINGS_PERFORATION_RESISTANCE = 'ratingsPerforationResistance';
public const FIELD_RATINGS_SMOOTH_SURFACE = 'ratingsSmoothSurface';
public const FIELD_RATINGS_TEAR_RESISTANCE = 'ratingsTearResistance';
public const FIELD_PRESSURE_UNTIL = 'pressureUntil';
public const FIELD_DAMPABLE_UNTIL2_T = 'dampableUntil2T';
public const FIELD_DAMPABLE_UNTIL2_C = 'dampableUntil2C';
public const FIELD_DAMPABLE_UNTIL1_C = 'dampableUntil1C';
public const FIELD_DAMPABLE_UNTIL1_T = 'dampableUntil1T';
public const FIELD_JUST_TEMPORARILY = 'justTemporarily';
public const FIELD_TEMPORARY_UNTIL_T = 'temporaryUntilT';
public const FIELD_TEMPORARY_UNTIL = 'temporaryUntil';
public const FIELD_TEMPERATURE_MIN = 'temperatureMin';
public const FIELD_TEMPERATURE_MAX = 'temperatureMax';
public const FIELD_ONLY_OPEN_SYSTEM = 'onlyOpenSystem';
public const FIELD_NOTES_TEMPERATURE = 'notesTemperature';

protected string $type = "UniPrSkeleFhs";
protected $negativePositiveTolerance;
protected $hoseDashSizeHyd;
protected $vacuumMm;
protected $tubeGaugeMm;
protected $bendRadiusMm;
protected $outsideDiameterMmInnerHose;
protected $insideDiameterMmInnerHose;
protected $outsideDiameterMm;
protected $insideDiameterMm;
protected $tubeGaugeIn;
protected $outsideDiameterIn;
protected $bendRadiusIn;
protected $outsideDiameterInInnerHose;
protected $insideDiameterInInnerHose;
protected $insideDiameterIn;
protected $vacuumIn;
protected $insideDiameterFractionInnerHose;
protected $insideDiameterFraction;
protected $minimumBurstPressurePsi;
protected $minimumBurstPressureMpa;
protected $workingPressureMpa;
protected $workingPressureBar;
protected $workingPressurePsi;
protected $localizedfields;
protected $ratingsAbrasionResistance;
protected $ratingsAntiUv;
protected $ratingsChlorineResistance;
protected $ratingsCrushingResistance;
protected $ratingsFlexibility;
protected $ratingsMouldResistance;
protected $ratingsOzoneResistance;
protected $ratingsPerforationResistance;
protected $ratingsSmoothSurface;
protected $ratingsTearResistance;
protected $pressureUntil;
protected $dampableUntil2T;
protected $dampableUntil2C;
protected $dampableUntil1C;
protected $dampableUntil1T;
protected $justTemporarily;
protected $temporaryUntilT;
protected $temporaryUntil;
protected $temperatureMin;
protected $temperatureMax;
protected $onlyOpenSystem;
protected $notesTemperature;


/**
* UniPrSkeleFhs constructor.
* @param DataObject\Concrete $object
*/
public function __construct(DataObject\Concrete $object)
{
	parent::__construct($object);
	$this->markFieldDirty("_self");
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
* Get vacuumMm - Vacuum  (mm)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getVacuumMm(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->vacuumMm;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("vacuumMm")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("vacuumMm");
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
* Set vacuumMm - Vacuum  (mm)
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $vacuumMm
* @return $this
*/
public function setVacuumMm (?\Pimcore\Model\DataObject\Data\QuantityValue $vacuumMm): static
{
	$this->vacuumMm = $vacuumMm;

	return $this;
}

/**
* Get tubeGaugeMm - Tube Gauge (mm) / Wall Thickness
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getTubeGaugeMm(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->tubeGaugeMm;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("tubeGaugeMm")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("tubeGaugeMm");
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
* Set tubeGaugeMm - Tube Gauge (mm) / Wall Thickness
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $tubeGaugeMm
* @return $this
*/
public function setTubeGaugeMm (?\Pimcore\Model\DataObject\Data\QuantityValue $tubeGaugeMm): static
{
	$this->tubeGaugeMm = $tubeGaugeMm;

	return $this;
}

/**
* Get bendRadiusMm - Bend Radius (mm)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getBendRadiusMm(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->bendRadiusMm;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("bendRadiusMm")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("bendRadiusMm");
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
* Set bendRadiusMm - Bend Radius (mm)
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $bendRadiusMm
* @return $this
*/
public function setBendRadiusMm (?\Pimcore\Model\DataObject\Data\QuantityValue $bendRadiusMm): static
{
	$this->bendRadiusMm = $bendRadiusMm;

	return $this;
}

/**
* Get outsideDiameterMmInnerHose - Outside Diameter (mm)-(Inner Hose)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getOutsideDiameterMmInnerHose(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->outsideDiameterMmInnerHose;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("outsideDiameterMmInnerHose")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("outsideDiameterMmInnerHose");
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
* Set outsideDiameterMmInnerHose - Outside Diameter (mm)-(Inner Hose)
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $outsideDiameterMmInnerHose
* @return $this
*/
public function setOutsideDiameterMmInnerHose (?\Pimcore\Model\DataObject\Data\QuantityValue $outsideDiameterMmInnerHose): static
{
	$this->outsideDiameterMmInnerHose = $outsideDiameterMmInnerHose;

	return $this;
}

/**
* Get insideDiameterMmInnerHose - Inside Diameter (mm ) - ( Inner Hose )
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getInsideDiameterMmInnerHose(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->insideDiameterMmInnerHose;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("insideDiameterMmInnerHose")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("insideDiameterMmInnerHose");
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
* Set insideDiameterMmInnerHose - Inside Diameter (mm ) - ( Inner Hose )
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $insideDiameterMmInnerHose
* @return $this
*/
public function setInsideDiameterMmInnerHose (?\Pimcore\Model\DataObject\Data\QuantityValue $insideDiameterMmInnerHose): static
{
	$this->insideDiameterMmInnerHose = $insideDiameterMmInnerHose;

	return $this;
}

/**
* Get outsideDiameterMm - Outside Diameter (mm)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getOutsideDiameterMm(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->outsideDiameterMm;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("outsideDiameterMm")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("outsideDiameterMm");
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
* Set outsideDiameterMm - Outside Diameter (mm)
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $outsideDiameterMm
* @return $this
*/
public function setOutsideDiameterMm (?\Pimcore\Model\DataObject\Data\QuantityValue $outsideDiameterMm): static
{
	$this->outsideDiameterMm = $outsideDiameterMm;

	return $this;
}

/**
* Get insideDiameterMm - Inside Diameter Mm
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getInsideDiameterMm(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->insideDiameterMm;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("insideDiameterMm")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("insideDiameterMm");
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
* Set insideDiameterMm - Inside Diameter Mm
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $insideDiameterMm
* @return $this
*/
public function setInsideDiameterMm (?\Pimcore\Model\DataObject\Data\QuantityValue $insideDiameterMm): static
{
	$this->insideDiameterMm = $insideDiameterMm;

	return $this;
}

/**
* Get tubeGaugeIn - Tube Gauge (in )  / Wall Thickness
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getTubeGaugeIn(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->tubeGaugeIn;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("tubeGaugeIn")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("tubeGaugeIn");
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
* Set tubeGaugeIn - Tube Gauge (in )  / Wall Thickness
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $tubeGaugeIn
* @return $this
*/
public function setTubeGaugeIn (?\Pimcore\Model\DataObject\Data\QuantityValue $tubeGaugeIn): static
{
	$this->tubeGaugeIn = $tubeGaugeIn;

	return $this;
}

/**
* Get outsideDiameterIn - Outside Diameter (in)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getOutsideDiameterIn(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->outsideDiameterIn;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("outsideDiameterIn")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("outsideDiameterIn");
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
* Set outsideDiameterIn - Outside Diameter (in)
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $outsideDiameterIn
* @return $this
*/
public function setOutsideDiameterIn (?\Pimcore\Model\DataObject\Data\QuantityValue $outsideDiameterIn): static
{
	$this->outsideDiameterIn = $outsideDiameterIn;

	return $this;
}

/**
* Get bendRadiusIn - Bend Radius (in)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getBendRadiusIn(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->bendRadiusIn;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("bendRadiusIn")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("bendRadiusIn");
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
* Set bendRadiusIn - Bend Radius (in)
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $bendRadiusIn
* @return $this
*/
public function setBendRadiusIn (?\Pimcore\Model\DataObject\Data\QuantityValue $bendRadiusIn): static
{
	$this->bendRadiusIn = $bendRadiusIn;

	return $this;
}

/**
* Get outsideDiameterInInnerHose - Outside Diameter(in) - (Inner Hose)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getOutsideDiameterInInnerHose(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->outsideDiameterInInnerHose;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("outsideDiameterInInnerHose")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("outsideDiameterInInnerHose");
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
* Set outsideDiameterInInnerHose - Outside Diameter(in) - (Inner Hose)
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $outsideDiameterInInnerHose
* @return $this
*/
public function setOutsideDiameterInInnerHose (?\Pimcore\Model\DataObject\Data\QuantityValue $outsideDiameterInInnerHose): static
{
	$this->outsideDiameterInInnerHose = $outsideDiameterInInnerHose;

	return $this;
}

/**
* Get insideDiameterInInnerHose - Inside Diameter (in)-(Inner Hose)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getInsideDiameterInInnerHose(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->insideDiameterInInnerHose;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("insideDiameterInInnerHose")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("insideDiameterInInnerHose");
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
* Set insideDiameterInInnerHose - Inside Diameter (in)-(Inner Hose)
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $insideDiameterInInnerHose
* @return $this
*/
public function setInsideDiameterInInnerHose (?\Pimcore\Model\DataObject\Data\QuantityValue $insideDiameterInInnerHose): static
{
	$this->insideDiameterInInnerHose = $insideDiameterInInnerHose;

	return $this;
}

/**
* Get insideDiameterIn - Inside Diameter In
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getInsideDiameterIn(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->insideDiameterIn;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("insideDiameterIn")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("insideDiameterIn");
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
* Set insideDiameterIn - Inside Diameter In
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $insideDiameterIn
* @return $this
*/
public function setInsideDiameterIn (?\Pimcore\Model\DataObject\Data\QuantityValue $insideDiameterIn): static
{
	$this->insideDiameterIn = $insideDiameterIn;

	return $this;
}

/**
* Get vacuumIn - Vacuum In
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getVacuumIn(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->vacuumIn;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("vacuumIn")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("vacuumIn");
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
* Set vacuumIn - Vacuum In
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $vacuumIn
* @return $this
*/
public function setVacuumIn (?\Pimcore\Model\DataObject\Data\QuantityValue $vacuumIn): static
{
	$this->vacuumIn = $vacuumIn;

	return $this;
}

/**
* Get insideDiameterFractionInnerHose - Inside Diameter Fraction Inner Hose
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getInsideDiameterFractionInnerHose(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->insideDiameterFractionInnerHose;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("insideDiameterFractionInnerHose")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("insideDiameterFractionInnerHose");
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
* Set insideDiameterFractionInnerHose - Inside Diameter Fraction Inner Hose
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $insideDiameterFractionInnerHose
* @return $this
*/
public function setInsideDiameterFractionInnerHose (?\Pimcore\Model\DataObject\Data\QuantityValue $insideDiameterFractionInnerHose): static
{
	$this->insideDiameterFractionInnerHose = $insideDiameterFractionInnerHose;

	return $this;
}

/**
* Get insideDiameterFraction - Inside Diameter (Fraction)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getInsideDiameterFraction(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->insideDiameterFraction;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("insideDiameterFraction")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("insideDiameterFraction");
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
* Set insideDiameterFraction - Inside Diameter (Fraction)
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $insideDiameterFraction
* @return $this
*/
public function setInsideDiameterFraction (?\Pimcore\Model\DataObject\Data\QuantityValue $insideDiameterFraction): static
{
	$this->insideDiameterFraction = $insideDiameterFraction;

	return $this;
}

/**
* Get minimumBurstPressurePsi - Minimum Burst Pressure Psi
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getMinimumBurstPressurePsi(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* Set minimumBurstPressurePsi - Minimum Burst Pressure Psi
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $minimumBurstPressurePsi
* @return $this
*/
public function setMinimumBurstPressurePsi (?\Pimcore\Model\DataObject\Data\QuantityValue $minimumBurstPressurePsi): static
{
	$this->minimumBurstPressurePsi = $minimumBurstPressurePsi;

	return $this;
}

/**
* Get minimumBurstPressureMpa - Minimum Burst Pressure (MPa)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getMinimumBurstPressureMpa(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $minimumBurstPressureMpa
* @return $this
*/
public function setMinimumBurstPressureMpa (?\Pimcore\Model\DataObject\Data\QuantityValue $minimumBurstPressureMpa): static
{
	$this->minimumBurstPressureMpa = $minimumBurstPressureMpa;

	return $this;
}

/**
* Get workingPressureMpa - Working Pressure Mpa
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getWorkingPressureMpa(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* Set workingPressureMpa - Working Pressure Mpa
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $workingPressureMpa
* @return $this
*/
public function setWorkingPressureMpa (?\Pimcore\Model\DataObject\Data\QuantityValue $workingPressureMpa): static
{
	$this->workingPressureMpa = $workingPressureMpa;

	return $this;
}

/**
* Get workingPressureBar - Working Pressure ( BAR )
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getWorkingPressureBar(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* Set workingPressureBar - Working Pressure ( BAR )
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $workingPressureBar
* @return $this
*/
public function setWorkingPressureBar (?\Pimcore\Model\DataObject\Data\QuantityValue $workingPressureBar): static
{
	$this->workingPressureBar = $workingPressureBar;

	return $this;
}

/**
* Get workingPressurePsi - Working Pressure (PSI)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getWorkingPressurePsi(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $workingPressurePsi
* @return $this
*/
public function setWorkingPressurePsi (?\Pimcore\Model\DataObject\Data\QuantityValue $workingPressurePsi): static
{
	$this->workingPressurePsi = $workingPressurePsi;

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
* Get declarationsAbrasionResistance - Resistance to: Abrasion
* @return string|null
*/
public function getDeclarationsAbrasionResistance(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("declarationsAbrasionResistance", $language);
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
* Get chemicalResistance - Chemical Resistance
* @return string|null
*/
public function getChemicalResistance(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("chemicalResistance", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get declarationsChlorineResistance - Chlorine Resistance
* @return string|null
*/
public function getDeclarationsChlorineResistance(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("declarationsChlorineResistance", $language);
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
* Get declarationsCrushingResistance - Crushing Resistance
* @return string|null
*/
public function getDeclarationsCrushingResistance(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("declarationsCrushingResistance", $language);
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
* Get methodOfCalculation - Method Of Calculation
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
* Get declarationsMouldResistance - Mould Resistance
* @return string|null
*/
public function getDeclarationsMouldResistance(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("declarationsMouldResistance", $language);
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
* Get declarationsOzoneResistance - Ozone Resistance
* @return string|null
*/
public function getDeclarationsOzoneResistance(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("declarationsOzoneResistance", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get declarationsPerforationResistance - Perforation Resistance
* @return string|null
*/
public function getDeclarationsPerforationResistance(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("declarationsPerforationResistance", $language);
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
* Get declarationsTearResistance - Tear Resistance
* @return string|null
*/
public function getDeclarationsTearResistance(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("declarationsTearResistance", $language);
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
* Set declarationsAbrasionResistance - Resistance to: Abrasion
* @param string|null $declarationsAbrasionResistance
* @return $this
*/
public function setDeclarationsAbrasionResistance (?string $declarationsAbrasionResistance, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("declarationsAbrasionResistance", $declarationsAbrasionResistance, $language, !$isEqual);

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
* Set chemicalResistance - Chemical Resistance
* @param string|null $chemicalResistance
* @return $this
*/
public function setChemicalResistance (?string $chemicalResistance, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("chemicalResistance", $chemicalResistance, $language, !$isEqual);

	return $this;
}

/**
* Set declarationsChlorineResistance - Chlorine Resistance
* @param string|null $declarationsChlorineResistance
* @return $this
*/
public function setDeclarationsChlorineResistance (?string $declarationsChlorineResistance, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("declarationsChlorineResistance", $declarationsChlorineResistance, $language, !$isEqual);

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
* Set declarationsCrushingResistance - Crushing Resistance
* @param string|null $declarationsCrushingResistance
* @return $this
*/
public function setDeclarationsCrushingResistance (?string $declarationsCrushingResistance, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("declarationsCrushingResistance", $declarationsCrushingResistance, $language, !$isEqual);

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
* Set methodOfCalculation - Method Of Calculation
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
* Set declarationsMouldResistance - Mould Resistance
* @param string|null $declarationsMouldResistance
* @return $this
*/
public function setDeclarationsMouldResistance (?string $declarationsMouldResistance, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("declarationsMouldResistance", $declarationsMouldResistance, $language, !$isEqual);

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
* Set declarationsOzoneResistance - Ozone Resistance
* @param string|null $declarationsOzoneResistance
* @return $this
*/
public function setDeclarationsOzoneResistance (?string $declarationsOzoneResistance, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("declarationsOzoneResistance", $declarationsOzoneResistance, $language, !$isEqual);

	return $this;
}

/**
* Set declarationsPerforationResistance - Perforation Resistance
* @param string|null $declarationsPerforationResistance
* @return $this
*/
public function setDeclarationsPerforationResistance (?string $declarationsPerforationResistance, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("declarationsPerforationResistance", $declarationsPerforationResistance, $language, !$isEqual);

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
* Set declarationsTearResistance - Tear Resistance
* @param string|null $declarationsTearResistance
* @return $this
*/
public function setDeclarationsTearResistance (?string $declarationsTearResistance, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("declarationsTearResistance", $declarationsTearResistance, $language, !$isEqual);

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
* Get ratingsAbrasionResistance - Resistance to: Abrasion
* @return string|null
*/
public function getRatingsAbrasionResistance(): ?string
{
	$data = $this->ratingsAbrasionResistance;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("ratingsAbrasionResistance")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("ratingsAbrasionResistance");
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
* Set ratingsAbrasionResistance - Resistance to: Abrasion
* @param string|null $ratingsAbrasionResistance
* @return $this
*/
public function setRatingsAbrasionResistance (?string $ratingsAbrasionResistance): static
{
	$this->ratingsAbrasionResistance = $ratingsAbrasionResistance;

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
* Get ratingsChlorineResistance - Resistance to: Chlorine
* @return string|null
*/
public function getRatingsChlorineResistance(): ?string
{
	$data = $this->ratingsChlorineResistance;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("ratingsChlorineResistance")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("ratingsChlorineResistance");
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
* Set ratingsChlorineResistance - Resistance to: Chlorine
* @param string|null $ratingsChlorineResistance
* @return $this
*/
public function setRatingsChlorineResistance (?string $ratingsChlorineResistance): static
{
	$this->ratingsChlorineResistance = $ratingsChlorineResistance;

	return $this;
}

/**
* Get ratingsCrushingResistance - Resistance to: Crushing
* @return string|null
*/
public function getRatingsCrushingResistance(): ?string
{
	$data = $this->ratingsCrushingResistance;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("ratingsCrushingResistance")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("ratingsCrushingResistance");
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
* Set ratingsCrushingResistance - Resistance to: Crushing
* @param string|null $ratingsCrushingResistance
* @return $this
*/
public function setRatingsCrushingResistance (?string $ratingsCrushingResistance): static
{
	$this->ratingsCrushingResistance = $ratingsCrushingResistance;

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
* Get ratingsMouldResistance - Resistance to: Mould
* @return string|null
*/
public function getRatingsMouldResistance(): ?string
{
	$data = $this->ratingsMouldResistance;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("ratingsMouldResistance")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("ratingsMouldResistance");
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
* Set ratingsMouldResistance - Resistance to: Mould
* @param string|null $ratingsMouldResistance
* @return $this
*/
public function setRatingsMouldResistance (?string $ratingsMouldResistance): static
{
	$this->ratingsMouldResistance = $ratingsMouldResistance;

	return $this;
}

/**
* Get ratingsOzoneResistance - Resistance to: Ozone
* @return string|null
*/
public function getRatingsOzoneResistance(): ?string
{
	$data = $this->ratingsOzoneResistance;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("ratingsOzoneResistance")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("ratingsOzoneResistance");
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
* Set ratingsOzoneResistance - Resistance to: Ozone
* @param string|null $ratingsOzoneResistance
* @return $this
*/
public function setRatingsOzoneResistance (?string $ratingsOzoneResistance): static
{
	$this->ratingsOzoneResistance = $ratingsOzoneResistance;

	return $this;
}

/**
* Get ratingsPerforationResistance - Resistance to: Perforation
* @return string|null
*/
public function getRatingsPerforationResistance(): ?string
{
	$data = $this->ratingsPerforationResistance;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("ratingsPerforationResistance")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("ratingsPerforationResistance");
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
* Set ratingsPerforationResistance - Resistance to: Perforation
* @param string|null $ratingsPerforationResistance
* @return $this
*/
public function setRatingsPerforationResistance (?string $ratingsPerforationResistance): static
{
	$this->ratingsPerforationResistance = $ratingsPerforationResistance;

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
* Get ratingsTearResistance - Tear Resistance
* @return string|null
*/
public function getRatingsTearResistance(): ?string
{
	$data = $this->ratingsTearResistance;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("ratingsTearResistance")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("ratingsTearResistance");
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
* Set ratingsTearResistance - Tear Resistance
* @param string|null $ratingsTearResistance
* @return $this
*/
public function setRatingsTearResistance (?string $ratingsTearResistance): static
{
	$this->ratingsTearResistance = $ratingsTearResistance;

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
* Get dampableUntil2T - Dampable until 2 (°C)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getDampableUntil2T(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $dampableUntil2T
* @return $this
*/
public function setDampableUntil2T (?\Pimcore\Model\DataObject\Data\QuantityValue $dampableUntil2T): static
{
	$this->dampableUntil2T = $dampableUntil2T;

	return $this;
}

/**
* Get dampableUntil2C - Dampable until 2 (°C)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getDampableUntil2C(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $dampableUntil2C
* @return $this
*/
public function setDampableUntil2C (?\Pimcore\Model\DataObject\Data\QuantityValue $dampableUntil2C): static
{
	$this->dampableUntil2C = $dampableUntil2C;

	return $this;
}

/**
* Get dampableUntil1C - Dampable until 1 (°C)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getDampableUntil1C(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $dampableUntil1C
* @return $this
*/
public function setDampableUntil1C (?\Pimcore\Model\DataObject\Data\QuantityValue $dampableUntil1C): static
{
	$this->dampableUntil1C = $dampableUntil1C;

	return $this;
}

/**
* Get dampableUntil1T - Dampable until 1 (t)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getDampableUntil1T(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $dampableUntil1T
* @return $this
*/
public function setDampableUntil1T (?\Pimcore\Model\DataObject\Data\QuantityValue $dampableUntil1T): static
{
	$this->dampableUntil1T = $dampableUntil1T;

	return $this;
}

/**
* Get justTemporarily - just "temporarily"
* @return bool|null
*/
public function getJustTemporarily(): ?bool
{
	$data = $this->justTemporarily;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("justTemporarily")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("justTemporarily");
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
* Set justTemporarily - just "temporarily"
* @param bool|null $justTemporarily
* @return $this
*/
public function setJustTemporarily (?bool $justTemporarily): static
{
	$this->justTemporarily = $justTemporarily;

	return $this;
}

/**
* Get temporaryUntilT - Temporary until (t)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getTemporaryUntilT(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $temporaryUntilT
* @return $this
*/
public function setTemporaryUntilT (?\Pimcore\Model\DataObject\Data\QuantityValue $temporaryUntilT): static
{
	$this->temporaryUntilT = $temporaryUntilT;

	return $this;
}

/**
* Get temporaryUntil - Temporary until (°C)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getTemporaryUntil(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->temporaryUntil;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("temporaryUntil")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("temporaryUntil");
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
* Set temporaryUntil - Temporary until (°C)
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $temporaryUntil
* @return $this
*/
public function setTemporaryUntil (?\Pimcore\Model\DataObject\Data\QuantityValue $temporaryUntil): static
{
	$this->temporaryUntil = $temporaryUntil;

	return $this;
}

/**
* Get temperatureMin - Temperature (min)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getTemperatureMin(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $temperatureMin
* @return $this
*/
public function setTemperatureMin (?\Pimcore\Model\DataObject\Data\QuantityValue $temperatureMin): static
{
	$this->temperatureMin = $temperatureMin;

	return $this;
}

/**
* Get temperatureMax - Temperature (max)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getTemperatureMax(): ?\Pimcore\Model\DataObject\Data\QuantityValue
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
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $temperatureMax
* @return $this
*/
public function setTemperatureMax (?\Pimcore\Model\DataObject\Data\QuantityValue $temperatureMax): static
{
	$this->temperatureMax = $temperatureMax;

	return $this;
}

/**
* Get onlyOpenSystem - Only Open System
* @return bool|null
*/
public function getOnlyOpenSystem(): ?bool
{
	$data = $this->onlyOpenSystem;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("onlyOpenSystem")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("onlyOpenSystem");
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
* Set onlyOpenSystem - Only Open System
* @param bool|null $onlyOpenSystem
* @return $this
*/
public function setOnlyOpenSystem (?bool $onlyOpenSystem): static
{
	$this->onlyOpenSystem = $onlyOpenSystem;

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

}

