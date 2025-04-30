<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - brandData [objectbricks]
 * - skeletonData [objectbricks]
 * - productBrandName [input]
 * - localizedfields [localizedfields]
 * -- productSubCategory [input]
 * -- sapDescription [input]
 * -- completenessPercentage [input]
 * -- emptyFieldsBrand [textarea]
 * -- emptyFieldsSkeleton [textarea]
 * -- emptyFieldsFinishedGood [textarea]
 * - sapMaterialNumber [input]
 * - ghpFullCode [input]
 * - skeletonPimInternalHierarchyCode [calculatedValue]
 * - hierarchySearchData [calculatedValue]
 * - weightMetric [quantityValue]
 * - weightImperial [quantityValue]
 * - technicalProductGroupSpecific [objectbricks]
 * - regionalAvailability [manyToManyObjectRelation]
 * - regions [calculatedValue]
 * - internalCategories [manyToManyObjectRelation]
 */

namespace Pimcore\Model\DataObject;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

/**
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing getList(array $config = [])
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByProductBrandName(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByLocalizedfields(string $field, mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByProductSubCategory(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getBySapDescription(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByCompletenessPercentage(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByEmptyFieldsBrand(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByEmptyFieldsSkeleton(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByEmptyFieldsFinishedGood(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getBySapMaterialNumber(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByGhpFullCode(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByRegionalAvailability(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByInternalCategories(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
*/

class UniProductBase extends \App\Model\DataObject\AbstractUniProductBase
{
public const FIELD_BRAND_DATA = 'brandData';
public const FIELD_SKELETON_DATA = 'skeletonData';
public const FIELD_PRODUCT_BRAND_NAME = 'productBrandName';
public const FIELD_PRODUCT_SUB_CATEGORY = 'productSubCategory';
public const FIELD_SAP_DESCRIPTION = 'sapDescription';
public const FIELD_COMPLETENESS_PERCENTAGE = 'completenessPercentage';
public const FIELD_EMPTY_FIELDS_BRAND = 'emptyFieldsBrand';
public const FIELD_EMPTY_FIELDS_SKELETON = 'emptyFieldsSkeleton';
public const FIELD_EMPTY_FIELDS_FINISHED_GOOD = 'emptyFieldsFinishedGood';
public const FIELD_SAP_MATERIAL_NUMBER = 'sapMaterialNumber';
public const FIELD_GHP_FULL_CODE = 'ghpFullCode';
public const FIELD_SKELETON_PIM_INTERNAL_HIERARCHY_CODE = 'skeletonPimInternalHierarchyCode';
public const FIELD_HIERARCHY_SEARCH_DATA = 'hierarchySearchData';
public const FIELD_WEIGHT_METRIC = 'weightMetric';
public const FIELD_WEIGHT_IMPERIAL = 'weightImperial';
public const FIELD_TECHNICAL_PRODUCT_GROUP_SPECIFIC = 'technicalProductGroupSpecific';
public const FIELD_REGIONAL_AVAILABILITY = 'regionalAvailability';
public const FIELD_REGIONS = 'regions';
public const FIELD_INTERNAL_CATEGORIES = 'internalCategories';

protected $classId = "UNI_PR";
protected $className = "UniProductBase";
protected $brandData;
protected $skeletonData;
protected $productBrandName;
protected $localizedfields;
protected $sapMaterialNumber;
protected $ghpFullCode;
protected $weightMetric;
protected $weightImperial;
protected $technicalProductGroupSpecific;
protected $regionalAvailability;
protected $internalCategories;


/**
* @param array $values
* @return static
*/
public static function create(array $values = []): static
{
	$object = new static();
	$object->setValues($values);
	return $object;
}

/**
* @return \Pimcore\Model\DataObject\UniProductBase\BrandData
*/
public function getBrandData(): ?\Pimcore\Model\DataObject\Objectbrick
{
	$data = $this->brandData;
	if (!$data) {
		if (\Pimcore\Tool::classExists("\\Pimcore\\Model\\DataObject\\UniProductBase\\BrandData")) {
			$data = new \Pimcore\Model\DataObject\UniProductBase\BrandData($this, "brandData");
			$this->brandData = $data;
		} else {
			return null;
		}
	}
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("brandData");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	return $data;
}

/**
* Set brandData - 
* @param \Pimcore\Model\DataObject\Objectbrick|null $brandData
* @return $this
*/
public function setBrandData(?\Pimcore\Model\DataObject\Objectbrick $brandData): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks $fd */
	$fd = $this->getClass()->getFieldDefinition("brandData");
	$this->brandData = $fd->preSetData($this, $brandData);
	return $this;
}

/**
* @return \Pimcore\Model\DataObject\UniProductBase\SkeletonData
*/
public function getSkeletonData(): ?\Pimcore\Model\DataObject\Objectbrick
{
	$data = $this->skeletonData;
	if (!$data) {
		if (\Pimcore\Tool::classExists("\\Pimcore\\Model\\DataObject\\UniProductBase\\SkeletonData")) {
			$data = new \Pimcore\Model\DataObject\UniProductBase\SkeletonData($this, "skeletonData");
			$this->skeletonData = $data;
		} else {
			return null;
		}
	}
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("skeletonData");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	return $data;
}

/**
* Set skeletonData - 
* @param \Pimcore\Model\DataObject\Objectbrick|null $skeletonData
* @return $this
*/
public function setSkeletonData(?\Pimcore\Model\DataObject\Objectbrick $skeletonData): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks $fd */
	$fd = $this->getClass()->getFieldDefinition("skeletonData");
	$this->skeletonData = $fd->preSetData($this, $skeletonData);
	return $this;
}

/**
* Get productBrandName - Product Brand Name
* @return string|null
*/
public function getProductBrandName(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("productBrandName");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->productBrandName;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set productBrandName - Product Brand Name
* @param string|null $productBrandName
* @return $this
*/
public function setProductBrandName(?string $productBrandName): static
{
	$this->markFieldDirty("productBrandName", true);

	$this->productBrandName = $productBrandName;

	return $this;
}

/**
* Get localizedfields - 
* @return \Pimcore\Model\DataObject\Localizedfield|null
*/
public function getLocalizedfields(): ?\Pimcore\Model\DataObject\Localizedfield
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("localizedfields");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("localizedfields")->preGetData($this);

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get productSubCategory - Product Sub Category
* @return string|null
*/
public function getProductSubCategory(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("productSubCategory", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("productSubCategory");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get sapDescription - SAP Description
* @return string|null
*/
public function getSapDescription(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("sapDescription", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("sapDescription");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get completenessPercentage - Completeness Percentage
* @return string|null
*/
public function getCompletenessPercentage(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("completenessPercentage", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("completenessPercentage");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get emptyFieldsBrand - Empty Fields Brand
* @return string|null
*/
public function getEmptyFieldsBrand(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("emptyFieldsBrand", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("emptyFieldsBrand");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get emptyFieldsSkeleton - Empty Fields Skeleton
* @return string|null
*/
public function getEmptyFieldsSkeleton(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("emptyFieldsSkeleton", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("emptyFieldsSkeleton");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get emptyFieldsFinishedGood - Empty Fields Finished Good
* @return string|null
*/
public function getEmptyFieldsFinishedGood(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("emptyFieldsFinishedGood", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("emptyFieldsFinishedGood");
		if ($preValue !== null) {
			return $preValue;
		}
	}

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
public function setLocalizedfields(?\Pimcore\Model\DataObject\Localizedfield $localizedfields): static
{
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getLocalizedfields();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$this->markFieldDirty("localizedfields", true);
	$this->markFieldDirty("localizedfields", true);

	$this->localizedfields = $localizedfields;

	return $this;
}

/**
* Set productSubCategory - Product Sub Category
* @param string|null $productSubCategory
* @return $this
*/
public function setProductSubCategory (?string $productSubCategory, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("productSubCategory", $productSubCategory, $language, !$isEqual);

	return $this;
}

/**
* Set sapDescription - SAP Description
* @param string|null $sapDescription
* @return $this
*/
public function setSapDescription (?string $sapDescription, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("sapDescription", $sapDescription, $language, !$isEqual);

	return $this;
}

/**
* Set completenessPercentage - Completeness Percentage
* @param string|null $completenessPercentage
* @return $this
*/
public function setCompletenessPercentage (?string $completenessPercentage, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("completenessPercentage", $completenessPercentage, $language, !$isEqual);

	return $this;
}

/**
* Set emptyFieldsBrand - Empty Fields Brand
* @param string|null $emptyFieldsBrand
* @return $this
*/
public function setEmptyFieldsBrand (?string $emptyFieldsBrand, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("emptyFieldsBrand", $emptyFieldsBrand, $language, !$isEqual);

	return $this;
}

/**
* Set emptyFieldsSkeleton - Empty Fields Skeleton
* @param string|null $emptyFieldsSkeleton
* @return $this
*/
public function setEmptyFieldsSkeleton (?string $emptyFieldsSkeleton, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("emptyFieldsSkeleton", $emptyFieldsSkeleton, $language, !$isEqual);

	return $this;
}

/**
* Set emptyFieldsFinishedGood - Empty Fields Finished Good
* @param string|null $emptyFieldsFinishedGood
* @return $this
*/
public function setEmptyFieldsFinishedGood (?string $emptyFieldsFinishedGood, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("emptyFieldsFinishedGood", $emptyFieldsFinishedGood, $language, !$isEqual);

	return $this;
}

/**
* Get sapMaterialNumber - SAP Material Number
* @return string|null
*/
public function getSapMaterialNumber(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("sapMaterialNumber");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->sapMaterialNumber;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set sapMaterialNumber - SAP Material Number
* @param string|null $sapMaterialNumber
* @return $this
*/
public function setSapMaterialNumber(?string $sapMaterialNumber): static
{
	$this->markFieldDirty("sapMaterialNumber", true);

	$this->sapMaterialNumber = $sapMaterialNumber;

	return $this;
}

/**
* Get ghpFullCode - Product Hierarchy Full Code (GHP)
* @return string|null
*/
public function getGhpFullCode(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("ghpFullCode");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->ghpFullCode;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set ghpFullCode - Product Hierarchy Full Code (GHP)
* @param string|null $ghpFullCode
* @return $this
*/
public function setGhpFullCode(?string $ghpFullCode): static
{
	$this->markFieldDirty("ghpFullCode", true);

	$this->ghpFullCode = $ghpFullCode;

	return $this;
}

/**
* Get skeletonPimInternalHierarchyCode - Skeleton PIM Internal Hierarchy Code
* @return mixed
*/
public function getSkeletonPimInternalHierarchyCode(): mixed
{
	$data = new \Pimcore\Model\DataObject\Data\CalculatedValue('skeletonPimInternalHierarchyCode');
	$data->setContextualData("object", null, null, null);
	$object = $this;
	$data = \Pimcore\Model\DataObject\Service::getCalculatedFieldValue($object, $data);

	return $data;
}

/**
* Get hierarchySearchData - Hierarchy Search Data
* @return mixed
*/
public function getHierarchySearchData(): mixed
{
	$data = new \Pimcore\Model\DataObject\Data\CalculatedValue('hierarchySearchData');
	$data->setContextualData("object", null, null, null);
	$object = $this;
	$data = \Pimcore\Model\DataObject\Service::getCalculatedFieldValue($object, $data);

	return $data;
}

/**
* Get weightMetric - Weight (Metric)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getWeightMetric(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("weightMetric");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->weightMetric;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set weightMetric - Weight (Metric)
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $weightMetric
* @return $this
*/
public function setWeightMetric(?\Pimcore\Model\DataObject\Data\QuantityValue $weightMetric): static
{
	$this->markFieldDirty("weightMetric", true);

	$this->weightMetric = $weightMetric;

	return $this;
}

/**
* Get weightImperial - Weight (Imperial)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getWeightImperial(): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("weightImperial");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->weightImperial;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set weightImperial - Weight (Imperial)
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $weightImperial
* @return $this
*/
public function setWeightImperial(?\Pimcore\Model\DataObject\Data\QuantityValue $weightImperial): static
{
	$this->markFieldDirty("weightImperial", true);

	$this->weightImperial = $weightImperial;

	return $this;
}

/**
* @return \Pimcore\Model\DataObject\UniProductBase\TechnicalProductGroupSpecific
*/
public function getTechnicalProductGroupSpecific(): ?\Pimcore\Model\DataObject\Objectbrick
{
	$data = $this->technicalProductGroupSpecific;
	if (!$data) {
		if (\Pimcore\Tool::classExists("\\Pimcore\\Model\\DataObject\\UniProductBase\\TechnicalProductGroupSpecific")) {
			$data = new \Pimcore\Model\DataObject\UniProductBase\TechnicalProductGroupSpecific($this, "technicalProductGroupSpecific");
			$this->technicalProductGroupSpecific = $data;
		} else {
			return null;
		}
	}
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("technicalProductGroupSpecific");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	return $data;
}

/**
* Set technicalProductGroupSpecific - 
* @param \Pimcore\Model\DataObject\Objectbrick|null $technicalProductGroupSpecific
* @return $this
*/
public function setTechnicalProductGroupSpecific(?\Pimcore\Model\DataObject\Objectbrick $technicalProductGroupSpecific): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks $fd */
	$fd = $this->getClass()->getFieldDefinition("technicalProductGroupSpecific");
	$this->technicalProductGroupSpecific = $fd->preSetData($this, $technicalProductGroupSpecific);
	return $this;
}

/**
* Get regionalAvailability - Available in
* @return \Pimcore\Model\DataObject\UniRegion[]
*/
public function getRegionalAvailability(): array
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("regionalAvailability");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("regionalAvailability")->preGetData($this);

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set regionalAvailability - Available in
* @param \Pimcore\Model\DataObject\UniRegion[] $regionalAvailability
* @return $this
*/
public function setRegionalAvailability(?array $regionalAvailability): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation $fd */
	$fd = $this->getClass()->getFieldDefinition("regionalAvailability");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getRegionalAvailability();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $regionalAvailability);
	if (!$isEqual) {
		$this->markFieldDirty("regionalAvailability", true);
	}
	$this->regionalAvailability = $fd->preSetData($this, $regionalAvailability);
	return $this;
}

/**
* Get regions - Regions
* @return mixed
*/
public function getRegions(): mixed
{
	$data = new \Pimcore\Model\DataObject\Data\CalculatedValue('regions');
	$data->setContextualData("object", null, null, null);
	$object = $this;
	$data = \Pimcore\Model\DataObject\Service::getCalculatedFieldValue($object, $data);

	return $data;
}

/**
* Get internalCategories - Internal Categories
* @return \Pimcore\Model\DataObject\UniProductCategoryInternal[]
*/
public function getInternalCategories(): array
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("internalCategories");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("internalCategories")->preGetData($this);

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set internalCategories - Internal Categories
* @param \Pimcore\Model\DataObject\UniProductCategoryInternal[] $internalCategories
* @return $this
*/
public function setInternalCategories(?array $internalCategories): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation $fd */
	$fd = $this->getClass()->getFieldDefinition("internalCategories");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getInternalCategories();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $internalCategories);
	if (!$isEqual) {
		$this->markFieldDirty("internalCategories", true);
	}
	$this->internalCategories = $fd->preSetData($this, $internalCategories);
	return $this;
}

}

