<?php

/**
 * Fields Summary:
 * - localizedfields [localizedfields]
 * -- material [manyToOneRelation]
 * -- reinforcement [manyToOneRelation]
 * -- color [manyToOneRelation]
 * -- fabricType [manyToOneRelation]
 * -- fabricColor [manyToOneRelation]
 * -- beltType [manyToOneRelation]
 * -- quality [input]
 * -- performance [input]
 * -- staticConductive [input]
 * - beltHardness [numeric]
 * - beltTeethType [manyToOneRelation]
 * - temperatureC [quantityValueRange]
 * - temperatureF [quantityValueRange]
 * - heatOilResistant [checkbox]
 */

namespace Pimcore\Model\DataObject\Objectbrick\Data;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;


class UniPrBrPts extends \App\Model\DataObject\UniProductManagement\Objectbrick\AbstractUniPrBrand
{
public const FIELD_MATERIAL = 'material';
public const FIELD_REINFORCEMENT = 'reinforcement';
public const FIELD_COLOR = 'color';
public const FIELD_FABRIC_TYPE = 'fabricType';
public const FIELD_FABRIC_COLOR = 'fabricColor';
public const FIELD_BELT_TYPE = 'beltType';
public const FIELD_QUALITY = 'quality';
public const FIELD_PERFORMANCE = 'performance';
public const FIELD_STATIC_CONDUCTIVE = 'staticConductive';
public const FIELD_BELT_HARDNESS = 'beltHardness';
public const FIELD_BELT_TEETH_TYPE = 'beltTeethType';
public const FIELD_TEMPERATURE_C = 'temperatureC';
public const FIELD_TEMPERATURE_F = 'temperatureF';
public const FIELD_HEAT_OIL_RESISTANT = 'heatOilResistant';

protected string $type = "UniPrBrPts";
protected $localizedfields;
protected $beltHardness;
protected $beltTeethType;
protected $temperatureC;
protected $temperatureF;
protected $heatOilResistant;


/**
* UniPrBrPts constructor.
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
* Get material - Material
* @return \Pimcore\Model\DataObject\UniPrPtsMaterial|null
*/
public function getMaterial(?string $language = null): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getLocalizedfields()->getLocalizedValue("material", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get reinforcement - Reinforcement
* @return \Pimcore\Model\DataObject\UniPrPtsReinforcement|null
*/
public function getReinforcement(?string $language = null): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getLocalizedfields()->getLocalizedValue("reinforcement", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get color - Color
* @return \Pimcore\Model\DataObject\UniPrPtsColor|null
*/
public function getColor(?string $language = null): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getLocalizedfields()->getLocalizedValue("color", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get fabricType - Fabric Type
* @return \Pimcore\Model\DataObject\UniPrPtsFabricType|null
*/
public function getFabricType(?string $language = null): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getLocalizedfields()->getLocalizedValue("fabricType", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get fabricColor - Fabric Color
* @return \Pimcore\Model\DataObject\UniPrPtsFabricColor|null
*/
public function getFabricColor(?string $language = null): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getLocalizedfields()->getLocalizedValue("fabricColor", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get beltType - Belt Type
* @return \Pimcore\Model\DataObject\UniPrPtsBeltType|null
*/
public function getBeltType(?string $language = null): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getLocalizedfields()->getLocalizedValue("beltType", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get quality - Quality
* @return string|null
*/
public function getQuality(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("quality", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get performance - Performance
* @return string|null
*/
public function getPerformance(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("performance", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get staticConductive - Static Conductive
* @return string|null
*/
public function getStaticConductive(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("staticConductive", $language);
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
* Set material - Material
* @param \Pimcore\Model\DataObject\UniPrPtsMaterial|null $material
* @return $this
*/
public function setMaterial (?\Pimcore\Model\Element\AbstractElement $material, ?string $language = null): static
{
	$fd = $this->getDefinition()->getFieldDefinition("localizedfields")->getFieldDefinition("material");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getMaterial($language);
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $material);
	if (!$isEqual) {
		$this->markFieldDirty("material", true);
	}
	$this->getLocalizedfields()->setLocalizedValue("material", $material, $language, !$isEqual);

	return $this;
}

/**
* Set reinforcement - Reinforcement
* @param \Pimcore\Model\DataObject\UniPrPtsReinforcement|null $reinforcement
* @return $this
*/
public function setReinforcement (?\Pimcore\Model\Element\AbstractElement $reinforcement, ?string $language = null): static
{
	$fd = $this->getDefinition()->getFieldDefinition("localizedfields")->getFieldDefinition("reinforcement");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getReinforcement($language);
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $reinforcement);
	if (!$isEqual) {
		$this->markFieldDirty("reinforcement", true);
	}
	$this->getLocalizedfields()->setLocalizedValue("reinforcement", $reinforcement, $language, !$isEqual);

	return $this;
}

/**
* Set color - Color
* @param \Pimcore\Model\DataObject\UniPrPtsColor|null $color
* @return $this
*/
public function setColor (?\Pimcore\Model\Element\AbstractElement $color, ?string $language = null): static
{
	$fd = $this->getDefinition()->getFieldDefinition("localizedfields")->getFieldDefinition("color");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getColor($language);
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $color);
	if (!$isEqual) {
		$this->markFieldDirty("color", true);
	}
	$this->getLocalizedfields()->setLocalizedValue("color", $color, $language, !$isEqual);

	return $this;
}

/**
* Set fabricType - Fabric Type
* @param \Pimcore\Model\DataObject\UniPrPtsFabricType|null $fabricType
* @return $this
*/
public function setFabricType (?\Pimcore\Model\Element\AbstractElement $fabricType, ?string $language = null): static
{
	$fd = $this->getDefinition()->getFieldDefinition("localizedfields")->getFieldDefinition("fabricType");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getFabricType($language);
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $fabricType);
	if (!$isEqual) {
		$this->markFieldDirty("fabricType", true);
	}
	$this->getLocalizedfields()->setLocalizedValue("fabricType", $fabricType, $language, !$isEqual);

	return $this;
}

/**
* Set fabricColor - Fabric Color
* @param \Pimcore\Model\DataObject\UniPrPtsFabricColor|null $fabricColor
* @return $this
*/
public function setFabricColor (?\Pimcore\Model\Element\AbstractElement $fabricColor, ?string $language = null): static
{
	$fd = $this->getDefinition()->getFieldDefinition("localizedfields")->getFieldDefinition("fabricColor");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getFabricColor($language);
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $fabricColor);
	if (!$isEqual) {
		$this->markFieldDirty("fabricColor", true);
	}
	$this->getLocalizedfields()->setLocalizedValue("fabricColor", $fabricColor, $language, !$isEqual);

	return $this;
}

/**
* Set beltType - Belt Type
* @param \Pimcore\Model\DataObject\UniPrPtsBeltType|null $beltType
* @return $this
*/
public function setBeltType (?\Pimcore\Model\Element\AbstractElement $beltType, ?string $language = null): static
{
	$fd = $this->getDefinition()->getFieldDefinition("localizedfields")->getFieldDefinition("beltType");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getBeltType($language);
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $beltType);
	if (!$isEqual) {
		$this->markFieldDirty("beltType", true);
	}
	$this->getLocalizedfields()->setLocalizedValue("beltType", $beltType, $language, !$isEqual);

	return $this;
}

/**
* Set quality - Quality
* @param string|null $quality
* @return $this
*/
public function setQuality (?string $quality, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("quality", $quality, $language, !$isEqual);

	return $this;
}

/**
* Set performance - Performance
* @param string|null $performance
* @return $this
*/
public function setPerformance (?string $performance, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("performance", $performance, $language, !$isEqual);

	return $this;
}

/**
* Set staticConductive - Static Conductive
* @param string|null $staticConductive
* @return $this
*/
public function setStaticConductive (?string $staticConductive, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("staticConductive", $staticConductive, $language, !$isEqual);

	return $this;
}

/**
* Get beltHardness - Belt Hardness
* @return float|null
*/
public function getBeltHardness(): ?float
{
	$data = $this->beltHardness;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("beltHardness")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("beltHardness");
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
* Set beltHardness - Belt Hardness
* @param float|null $beltHardness
* @return $this
*/
public function setBeltHardness (?float $beltHardness): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getDefinition()->getFieldDefinition("beltHardness");
	$this->beltHardness = $fd->preSetData($this, $beltHardness);
	return $this;
}

/**
* Get beltTeethType - Belt Teeth Type
* @return \Pimcore\Model\DataObject\UniPrPtsBeltTeethType|null
*/
public function getBeltTeethType(): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getDefinition()->getFieldDefinition("beltTeethType")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("beltTeethType")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("beltTeethType");
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
* Set beltTeethType - Belt Teeth Type
* @param \Pimcore\Model\DataObject\UniPrPtsBeltTeethType|null $beltTeethType
* @return $this
*/
public function setBeltTeethType (?\Pimcore\Model\Element\AbstractElement $beltTeethType): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("beltTeethType");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getBeltTeethType();
		});
	}
	else {
		$currentData = $this->getBeltTeethType();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $beltTeethType);
	if (!$isEqual) {
		$this->markFieldDirty("beltTeethType", true);
	}
	$this->beltTeethType = $fd->preSetData($this, $beltTeethType);
	return $this;
}

/**
* Get temperatureC - Temperature C
* @return \Pimcore\Model\DataObject\Data\QuantityValueRange|null
*/
public function getTemperatureC(): ?\Pimcore\Model\DataObject\Data\QuantityValueRange
{
	$data = $this->temperatureC;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("temperatureC")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("temperatureC");
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
* Set temperatureC - Temperature C
* @param \Pimcore\Model\DataObject\Data\QuantityValueRange|null $temperatureC
* @return $this
*/
public function setTemperatureC (?\Pimcore\Model\DataObject\Data\QuantityValueRange $temperatureC): static
{
	$this->temperatureC = $temperatureC;

	return $this;
}

/**
* Get temperatureF - Temperature F
* @return \Pimcore\Model\DataObject\Data\QuantityValueRange|null
*/
public function getTemperatureF(): ?\Pimcore\Model\DataObject\Data\QuantityValueRange
{
	$data = $this->temperatureF;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("temperatureF")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("temperatureF");
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
* Set temperatureF - Temperature F
* @param \Pimcore\Model\DataObject\Data\QuantityValueRange|null $temperatureF
* @return $this
*/
public function setTemperatureF (?\Pimcore\Model\DataObject\Data\QuantityValueRange $temperatureF): static
{
	$this->temperatureF = $temperatureF;

	return $this;
}

/**
* Get heatOilResistant - Heat & Oil Resistant
* @return bool|null
*/
public function getHeatOilResistant(): ?bool
{
	$data = $this->heatOilResistant;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("heatOilResistant")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("heatOilResistant");
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
* Set heatOilResistant - Heat & Oil Resistant
* @param bool|null $heatOilResistant
* @return $this
*/
public function setHeatOilResistant (?bool $heatOilResistant): static
{
	$this->heatOilResistant = $heatOilResistant;

	return $this;
}

}

