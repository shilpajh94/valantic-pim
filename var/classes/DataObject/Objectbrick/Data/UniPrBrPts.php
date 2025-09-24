<?php

/**
 * Fields Summary:
 * - material [manyToOneRelation]
 * - reinforcement [manyToOneRelation]
 * - color [manyToOneRelation]
 * - fabricType [manyToOneRelation]
 * - fabricColor [manyToOneRelation]
 * - beltHardness [numeric]
 * - beltTeethType [manyToOneRelation]
 * - beltType [manyToOneRelation]
 * - localizedfields [localizedfields]
 * -- quality [input]
 * -- performance [input]
 * -- staticConductive [input]
 * - temperatureC [numericRange]
 * - temperatureF [numericRange]
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
public const FIELD_BELT_HARDNESS = 'beltHardness';
public const FIELD_BELT_TEETH_TYPE = 'beltTeethType';
public const FIELD_BELT_TYPE = 'beltType';
public const FIELD_QUALITY = 'quality';
public const FIELD_PERFORMANCE = 'performance';
public const FIELD_STATIC_CONDUCTIVE = 'staticConductive';
public const FIELD_TEMPERATURE_C = 'temperatureC';
public const FIELD_TEMPERATURE_F = 'temperatureF';
public const FIELD_HEAT_OIL_RESISTANT = 'heatOilResistant';

protected string $type = "UniPrBrPts";
protected $material;
protected $reinforcement;
protected $color;
protected $fabricType;
protected $fabricColor;
protected $beltHardness;
protected $beltTeethType;
protected $beltType;
protected $localizedfields;
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
* Get material - Material
* @return \Pimcore\Model\DataObject\UniPrPtsMaterial|null
*/
public function getMaterial(): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getDefinition()->getFieldDefinition("material")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("material")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("material");
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
* Set material - Material
* @param \Pimcore\Model\DataObject\UniPrPtsMaterial|null $material
* @return $this
*/
public function setMaterial (?\Pimcore\Model\Element\AbstractElement $material): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("material");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getMaterial();
		});
	}
	else {
		$currentData = $this->getMaterial();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $material);
	if (!$isEqual) {
		$this->markFieldDirty("material", true);
	}
	$this->material = $fd->preSetData($this, $material);
	return $this;
}

/**
* Get reinforcement - Reinforcement
* @return \Pimcore\Model\DataObject\UniPrPtsReinforcement|null
*/
public function getReinforcement(): ?\Pimcore\Model\Element\AbstractElement
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
* @param \Pimcore\Model\DataObject\UniPrPtsReinforcement|null $reinforcement
* @return $this
*/
public function setReinforcement (?\Pimcore\Model\Element\AbstractElement $reinforcement): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
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
* Get color - Color
* @return \Pimcore\Model\DataObject\UniPrPtsColor|null
*/
public function getColor(): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getDefinition()->getFieldDefinition("color")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("color")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("color");
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
* Set color - Color
* @param \Pimcore\Model\DataObject\UniPrPtsColor|null $color
* @return $this
*/
public function setColor (?\Pimcore\Model\Element\AbstractElement $color): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("color");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getColor();
		});
	}
	else {
		$currentData = $this->getColor();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $color);
	if (!$isEqual) {
		$this->markFieldDirty("color", true);
	}
	$this->color = $fd->preSetData($this, $color);
	return $this;
}

/**
* Get fabricType - Fabric Type
* @return \Pimcore\Model\DataObject\UniPrPtsFabricType|null
*/
public function getFabricType(): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getDefinition()->getFieldDefinition("fabricType")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("fabricType")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("fabricType");
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
* Set fabricType - Fabric Type
* @param \Pimcore\Model\DataObject\UniPrPtsFabricType|null $fabricType
* @return $this
*/
public function setFabricType (?\Pimcore\Model\Element\AbstractElement $fabricType): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("fabricType");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getFabricType();
		});
	}
	else {
		$currentData = $this->getFabricType();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $fabricType);
	if (!$isEqual) {
		$this->markFieldDirty("fabricType", true);
	}
	$this->fabricType = $fd->preSetData($this, $fabricType);
	return $this;
}

/**
* Get fabricColor - Fabric Color
* @return \Pimcore\Model\DataObject\UniPrPtsFabricColor|null
*/
public function getFabricColor(): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getDefinition()->getFieldDefinition("fabricColor")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("fabricColor")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("fabricColor");
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
* Set fabricColor - Fabric Color
* @param \Pimcore\Model\DataObject\UniPrPtsFabricColor|null $fabricColor
* @return $this
*/
public function setFabricColor (?\Pimcore\Model\Element\AbstractElement $fabricColor): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("fabricColor");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getFabricColor();
		});
	}
	else {
		$currentData = $this->getFabricColor();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $fabricColor);
	if (!$isEqual) {
		$this->markFieldDirty("fabricColor", true);
	}
	$this->fabricColor = $fd->preSetData($this, $fabricColor);
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
* Get beltType - Belt Type
* @return \Pimcore\Model\DataObject\UniPrPtsBeltType|null
*/
public function getBeltType(): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getDefinition()->getFieldDefinition("beltType")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("beltType")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("beltType");
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
* Set beltType - Belt Type
* @param \Pimcore\Model\DataObject\UniPrPtsBeltType|null $beltType
* @return $this
*/
public function setBeltType (?\Pimcore\Model\Element\AbstractElement $beltType): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("beltType");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getBeltType();
		});
	}
	else {
		$currentData = $this->getBeltType();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $beltType);
	if (!$isEqual) {
		$this->markFieldDirty("beltType", true);
	}
	$this->beltType = $fd->preSetData($this, $beltType);
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
* Get temperatureC - Temperature (°C)
* @return \Pimcore\Model\DataObject\Data\NumericRange|null
*/
public function getTemperatureC(): ?\Pimcore\Model\DataObject\Data\NumericRange
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
* Set temperatureC - Temperature (°C)
* @param \Pimcore\Model\DataObject\Data\NumericRange|null $temperatureC
* @return $this
*/
public function setTemperatureC (?\Pimcore\Model\DataObject\Data\NumericRange $temperatureC): static
{
	$this->temperatureC = $temperatureC;

	return $this;
}

/**
* Get temperatureF - Temperature (°F)
* @return \Pimcore\Model\DataObject\Data\NumericRange|null
*/
public function getTemperatureF(): ?\Pimcore\Model\DataObject\Data\NumericRange
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
* Set temperatureF - Temperature (°F)
* @param \Pimcore\Model\DataObject\Data\NumericRange|null $temperatureF
* @return $this
*/
public function setTemperatureF (?\Pimcore\Model\DataObject\Data\NumericRange $temperatureF): static
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

