<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - brandData [objectbricks]
 * - skeletonData [objectbricks]
 * - fullProductName [input]
 * - sapMaterialNumber [input]
 * - partNumber [input]
 * - oldMaterialNumber [input]
 * - weightMetric [numeric]
 * - weightImperial [numeric]
 * - tariffCodes [numeric]
 * - countryOfOrigin [manyToOneRelation]
 * - eanCode [input]
 * - externalId [input]
 * - stccCode [input]
 * - localizedfields [localizedfields]
 * -- sapDescription [input]
 * -- sapDescriptionLanguage [select]
 * -- plantProduced [select]
 * -- productDescriptionShort [textarea]
 * -- productDescriptionLong [textarea]
 * -- productMarking1 [textarea]
 * -- productMarking2 [textarea]
 * -- productDescriptionExtended [wysiwyg]
 * -- completenessPercentage [input]
 * -- emptyFieldsBrand [textarea]
 * -- emptyFieldsSkeleton [textarea]
 * -- emptyFieldsFinishedGood [textarea]
 * - productGroupSpecific [objectbricks]
 * - competitorCrossReference [fieldcollections]
 * - customerReference [fieldcollections]
 * - oemCrossReference [fieldcollections]
 * - prop65 [select]
 * - roHS [select]
 * - gprs [select]
 * - prop65Certificate [manyToOneRelation]
 * - rohsCertificate [manyToOneRelation]
 * - gprsCertificate [manyToOneRelation]
 * - b2bFlag [checkbox]
 * - b2cFlag [checkbox]
 * - printedCatalogueFlag [checkbox]
 * - virtualCatalogueFlag [checkbox]
 * - customerPortalFlag [checkbox]
 * - regionalAvailability [manyToManyObjectRelation]
 * - regions [calculatedValue]
 * - internalCategories [manyToManyObjectRelation]
 * - ghpFullCode [input]
 * - skeletonPimInternalHierarchyCode [calculatedValue]
 * - hierarchySearchData [calculatedValue]
 * - approvalState [input]
 */

namespace Pimcore\Model\DataObject;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

/**
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing getList(array $config = [])
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByFullProductName(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getBySapMaterialNumber(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByPartNumber(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByOldMaterialNumber(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByWeightMetric(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByWeightImperial(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByTariffCodes(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByCountryOfOrigin(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByEanCode(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByExternalId(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByStccCode(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByLocalizedfields(string $field, mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getBySapDescription(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getBySapDescriptionLanguage(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByPlantProduced(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByProductDescriptionShort(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByProductDescriptionLong(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByProductMarking1(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByProductMarking2(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByProductDescriptionExtended(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByCompletenessPercentage(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByEmptyFieldsBrand(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByEmptyFieldsSkeleton(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByEmptyFieldsFinishedGood(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByProp65(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByRoHS(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByGprs(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByProp65Certificate(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByRohsCertificate(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByGprsCertificate(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByB2bFlag(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByB2cFlag(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByPrintedCatalogueFlag(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByVirtualCatalogueFlag(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByCustomerPortalFlag(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByRegionalAvailability(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByInternalCategories(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByGhpFullCode(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByApprovalState(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
*/

class UniProductBase extends \App\Model\DataObject\AbstractUniProductBase
{
public const FIELD_BRAND_DATA = 'brandData';
public const FIELD_SKELETON_DATA = 'skeletonData';
public const FIELD_FULL_PRODUCT_NAME = 'fullProductName';
public const FIELD_SAP_MATERIAL_NUMBER = 'sapMaterialNumber';
public const FIELD_PART_NUMBER = 'partNumber';
public const FIELD_OLD_MATERIAL_NUMBER = 'oldMaterialNumber';
public const FIELD_WEIGHT_METRIC = 'weightMetric';
public const FIELD_WEIGHT_IMPERIAL = 'weightImperial';
public const FIELD_TARIFF_CODES = 'tariffCodes';
public const FIELD_COUNTRY_OF_ORIGIN = 'countryOfOrigin';
public const FIELD_EAN_CODE = 'eanCode';
public const FIELD_EXTERNAL_ID = 'externalId';
public const FIELD_STCC_CODE = 'stccCode';
public const FIELD_SAP_DESCRIPTION = 'sapDescription';
public const FIELD_SAP_DESCRIPTION_LANGUAGE = 'sapDescriptionLanguage';
public const FIELD_PLANT_PRODUCED = 'plantProduced';
public const FIELD_PRODUCT_DESCRIPTION_SHORT = 'productDescriptionShort';
public const FIELD_PRODUCT_DESCRIPTION_LONG = 'productDescriptionLong';
public const FIELD_PRODUCT_MARKING1 = 'productMarking1';
public const FIELD_PRODUCT_MARKING2 = 'productMarking2';
public const FIELD_PRODUCT_DESCRIPTION_EXTENDED = 'productDescriptionExtended';
public const FIELD_COMPLETENESS_PERCENTAGE = 'completenessPercentage';
public const FIELD_EMPTY_FIELDS_BRAND = 'emptyFieldsBrand';
public const FIELD_EMPTY_FIELDS_SKELETON = 'emptyFieldsSkeleton';
public const FIELD_EMPTY_FIELDS_FINISHED_GOOD = 'emptyFieldsFinishedGood';
public const FIELD_PRODUCT_GROUP_SPECIFIC = 'productGroupSpecific';
public const FIELD_COMPETITOR_CROSS_REFERENCE = 'competitorCrossReference';
public const FIELD_CUSTOMER_REFERENCE = 'customerReference';
public const FIELD_OEM_CROSS_REFERENCE = 'oemCrossReference';
public const FIELD_PROP65 = 'prop65';
public const FIELD_RO_HS = 'roHS';
public const FIELD_GPRS = 'gprs';
public const FIELD_PROP65_CERTIFICATE = 'prop65Certificate';
public const FIELD_ROHS_CERTIFICATE = 'rohsCertificate';
public const FIELD_GPRS_CERTIFICATE = 'gprsCertificate';
public const FIELD_B2B_FLAG = 'b2bFlag';
public const FIELD_B2C_FLAG = 'b2cFlag';
public const FIELD_PRINTED_CATALOGUE_FLAG = 'printedCatalogueFlag';
public const FIELD_VIRTUAL_CATALOGUE_FLAG = 'virtualCatalogueFlag';
public const FIELD_CUSTOMER_PORTAL_FLAG = 'customerPortalFlag';
public const FIELD_REGIONAL_AVAILABILITY = 'regionalAvailability';
public const FIELD_REGIONS = 'regions';
public const FIELD_INTERNAL_CATEGORIES = 'internalCategories';
public const FIELD_GHP_FULL_CODE = 'ghpFullCode';
public const FIELD_SKELETON_PIM_INTERNAL_HIERARCHY_CODE = 'skeletonPimInternalHierarchyCode';
public const FIELD_HIERARCHY_SEARCH_DATA = 'hierarchySearchData';
public const FIELD_APPROVAL_STATE = 'approvalState';

protected $classId = "UNI_PR";
protected $className = "UniProductBase";
protected $brandData;
protected $skeletonData;
protected $fullProductName;
protected $sapMaterialNumber;
protected $partNumber;
protected $oldMaterialNumber;
protected $weightMetric;
protected $weightImperial;
protected $tariffCodes;
protected $countryOfOrigin;
protected $eanCode;
protected $externalId;
protected $stccCode;
protected $localizedfields;
protected $productGroupSpecific;
protected $competitorCrossReference;
protected $customerReference;
protected $oemCrossReference;
protected $prop65;
protected $roHS;
protected $gprs;
protected $prop65Certificate;
protected $rohsCertificate;
protected $gprsCertificate;
protected $b2bFlag;
protected $b2cFlag;
protected $printedCatalogueFlag;
protected $virtualCatalogueFlag;
protected $customerPortalFlag;
protected $regionalAvailability;
protected $internalCategories;
protected $ghpFullCode;
protected $approvalState;


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
* Get fullProductName - Full Product Name
* @return string|null
*/
public function getFullProductName(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("fullProductName");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->fullProductName;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set fullProductName - Full Product Name
* @param string|null $fullProductName
* @return $this
*/
public function setFullProductName(?string $fullProductName): static
{
	$this->markFieldDirty("fullProductName", true);

	$this->fullProductName = $fullProductName;

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
* Get partNumber - Part Number
* @return string|null
*/
public function getPartNumber(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("partNumber");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->partNumber;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set partNumber - Part Number
* @param string|null $partNumber
* @return $this
*/
public function setPartNumber(?string $partNumber): static
{
	$this->markFieldDirty("partNumber", true);

	$this->partNumber = $partNumber;

	return $this;
}

/**
* Get oldMaterialNumber - Old Material Number
* @return string|null
*/
public function getOldMaterialNumber(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("oldMaterialNumber");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->oldMaterialNumber;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set oldMaterialNumber - Old Material Number
* @param string|null $oldMaterialNumber
* @return $this
*/
public function setOldMaterialNumber(?string $oldMaterialNumber): static
{
	$this->markFieldDirty("oldMaterialNumber", true);

	$this->oldMaterialNumber = $oldMaterialNumber;

	return $this;
}

/**
* Get weightMetric - Weight (kg)
* @return float|null
*/
public function getWeightMetric(): ?float
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
* Set weightMetric - Weight (kg)
* @param float|null $weightMetric
* @return $this
*/
public function setWeightMetric(?float $weightMetric): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getClass()->getFieldDefinition("weightMetric");
	$this->weightMetric = $fd->preSetData($this, $weightMetric);
	return $this;
}

/**
* Get weightImperial - Weight (lbs)
* @return float|null
*/
public function getWeightImperial(): ?float
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
* Set weightImperial - Weight (lbs)
* @param float|null $weightImperial
* @return $this
*/
public function setWeightImperial(?float $weightImperial): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getClass()->getFieldDefinition("weightImperial");
	$this->weightImperial = $fd->preSetData($this, $weightImperial);
	return $this;
}

/**
* Get tariffCodes - Tariff Codes
* @return float|null
*/
public function getTariffCodes(): ?float
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("tariffCodes");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->tariffCodes;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set tariffCodes - Tariff Codes
* @param float|null $tariffCodes
* @return $this
*/
public function setTariffCodes(?float $tariffCodes): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric $fd */
	$fd = $this->getClass()->getFieldDefinition("tariffCodes");
	$this->tariffCodes = $fd->preSetData($this, $tariffCodes);
	return $this;
}

/**
* Get countryOfOrigin - Country Of Origin
* @return \Pimcore\Model\DataObject\UniPrCountry|null
*/
public function getCountryOfOrigin(): ?\Pimcore\Model\Element\AbstractElement
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("countryOfOrigin");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("countryOfOrigin")->preGetData($this);

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set countryOfOrigin - Country Of Origin
* @param \Pimcore\Model\DataObject\UniPrCountry|null $countryOfOrigin
* @return $this
*/
public function setCountryOfOrigin(?\Pimcore\Model\Element\AbstractElement $countryOfOrigin): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getClass()->getFieldDefinition("countryOfOrigin");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getCountryOfOrigin();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $countryOfOrigin);
	if (!$isEqual) {
		$this->markFieldDirty("countryOfOrigin", true);
	}
	$this->countryOfOrigin = $fd->preSetData($this, $countryOfOrigin);
	return $this;
}

/**
* Get eanCode - EAN / UPC Code
* @return string|null
*/
public function getEanCode(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("eanCode");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->eanCode;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set eanCode - EAN / UPC Code
* @param string|null $eanCode
* @return $this
*/
public function setEanCode(?string $eanCode): static
{
	$this->markFieldDirty("eanCode", true);

	$this->eanCode = $eanCode;

	return $this;
}

/**
* Get externalId - External ID
* @return string|null
*/
public function getExternalId(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("externalId");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->externalId;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set externalId - External ID
* @param string|null $externalId
* @return $this
*/
public function setExternalId(?string $externalId): static
{
	$this->markFieldDirty("externalId", true);

	$this->externalId = $externalId;

	return $this;
}

/**
* Get stccCode - Standard Transportation Commodity Code (STCC)
* @return string|null
*/
public function getStccCode(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("stccCode");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->stccCode;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set stccCode - Standard Transportation Commodity Code (STCC)
* @param string|null $stccCode
* @return $this
*/
public function setStccCode(?string $stccCode): static
{
	$this->markFieldDirty("stccCode", true);

	$this->stccCode = $stccCode;

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
* Get sapDescriptionLanguage - SAP  Description Language
* @return string|null
*/
public function getSapDescriptionLanguage(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("sapDescriptionLanguage", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("sapDescriptionLanguage");
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
* Get plantProduced - Plant Produced
* @return string|null
*/
public function getPlantProduced(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("plantProduced", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("plantProduced");
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
* Get productDescriptionShort - Product Description  - Short
* @return string|null
*/
public function getProductDescriptionShort(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("productDescriptionShort", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("productDescriptionShort");
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
* Get productDescriptionLong - Product Description - Long
* @return string|null
*/
public function getProductDescriptionLong(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("productDescriptionLong", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("productDescriptionLong");
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
* Get productMarking1 - Product Marking - 1
* @return string|null
*/
public function getProductMarking1(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("productMarking1", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("productMarking1");
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
* Get productMarking2 - Product Marking - 2
* @return string|null
*/
public function getProductMarking2(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("productMarking2", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("productMarking2");
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
* Get productDescriptionExtended - Product Description - Extended
* @return string|null
*/
public function getProductDescriptionExtended(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("productDescriptionExtended", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("productDescriptionExtended");
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
* Set sapDescriptionLanguage - SAP  Description Language
* @param string|null $sapDescriptionLanguage
* @return $this
*/
public function setSapDescriptionLanguage (?string $sapDescriptionLanguage, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("sapDescriptionLanguage", $sapDescriptionLanguage, $language, !$isEqual);

	return $this;
}

/**
* Set plantProduced - Plant Produced
* @param string|null $plantProduced
* @return $this
*/
public function setPlantProduced (?string $plantProduced, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("plantProduced", $plantProduced, $language, !$isEqual);

	return $this;
}

/**
* Set productDescriptionShort - Product Description  - Short
* @param string|null $productDescriptionShort
* @return $this
*/
public function setProductDescriptionShort (?string $productDescriptionShort, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("productDescriptionShort", $productDescriptionShort, $language, !$isEqual);

	return $this;
}

/**
* Set productDescriptionLong - Product Description - Long
* @param string|null $productDescriptionLong
* @return $this
*/
public function setProductDescriptionLong (?string $productDescriptionLong, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("productDescriptionLong", $productDescriptionLong, $language, !$isEqual);

	return $this;
}

/**
* Set productMarking1 - Product Marking - 1
* @param string|null $productMarking1
* @return $this
*/
public function setProductMarking1 (?string $productMarking1, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("productMarking1", $productMarking1, $language, !$isEqual);

	return $this;
}

/**
* Set productMarking2 - Product Marking - 2
* @param string|null $productMarking2
* @return $this
*/
public function setProductMarking2 (?string $productMarking2, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("productMarking2", $productMarking2, $language, !$isEqual);

	return $this;
}

/**
* Set productDescriptionExtended - Product Description - Extended
* @param string|null $productDescriptionExtended
* @return $this
*/
public function setProductDescriptionExtended (?string $productDescriptionExtended, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("productDescriptionExtended", $productDescriptionExtended, $language, !$isEqual);

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
* @return \Pimcore\Model\DataObject\UniProductBase\ProductGroupSpecific
*/
public function getProductGroupSpecific(): ?\Pimcore\Model\DataObject\Objectbrick
{
	$data = $this->productGroupSpecific;
	if (!$data) {
		if (\Pimcore\Tool::classExists("\\Pimcore\\Model\\DataObject\\UniProductBase\\ProductGroupSpecific")) {
			$data = new \Pimcore\Model\DataObject\UniProductBase\ProductGroupSpecific($this, "productGroupSpecific");
			$this->productGroupSpecific = $data;
		} else {
			return null;
		}
	}
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("productGroupSpecific");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	return $data;
}

/**
* Set productGroupSpecific - Product Group Specific Data
* @param \Pimcore\Model\DataObject\Objectbrick|null $productGroupSpecific
* @return $this
*/
public function setProductGroupSpecific(?\Pimcore\Model\DataObject\Objectbrick $productGroupSpecific): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks $fd */
	$fd = $this->getClass()->getFieldDefinition("productGroupSpecific");
	$this->productGroupSpecific = $fd->preSetData($this, $productGroupSpecific);
	return $this;
}

/**
* @return \Pimcore\Model\DataObject\Fieldcollection|null
*/
public function getCompetitorCrossReference(): ?\Pimcore\Model\DataObject\Fieldcollection
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("competitorCrossReference");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("competitorCrossReference")->preGetData($this);
	return $data;
}

/**
* Set competitorCrossReference - Competitor Cross Reference
* @param \Pimcore\Model\DataObject\Fieldcollection|null $competitorCrossReference
* @return $this
*/
public function setCompetitorCrossReference(?\Pimcore\Model\DataObject\Fieldcollection $competitorCrossReference): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Fieldcollections $fd */
	$fd = $this->getClass()->getFieldDefinition("competitorCrossReference");
	$this->competitorCrossReference = $fd->preSetData($this, $competitorCrossReference);
	return $this;
}

/**
* @return \Pimcore\Model\DataObject\Fieldcollection|null
*/
public function getCustomerReference(): ?\Pimcore\Model\DataObject\Fieldcollection
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("customerReference");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("customerReference")->preGetData($this);
	return $data;
}

/**
* Set customerReference - Customer Reference
* @param \Pimcore\Model\DataObject\Fieldcollection|null $customerReference
* @return $this
*/
public function setCustomerReference(?\Pimcore\Model\DataObject\Fieldcollection $customerReference): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Fieldcollections $fd */
	$fd = $this->getClass()->getFieldDefinition("customerReference");
	$this->customerReference = $fd->preSetData($this, $customerReference);
	return $this;
}

/**
* @return \Pimcore\Model\DataObject\Fieldcollection|null
*/
public function getOemCrossReference(): ?\Pimcore\Model\DataObject\Fieldcollection
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("oemCrossReference");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("oemCrossReference")->preGetData($this);
	return $data;
}

/**
* Set oemCrossReference - OE / OEM Cross Reference
* @param \Pimcore\Model\DataObject\Fieldcollection|null $oemCrossReference
* @return $this
*/
public function setOemCrossReference(?\Pimcore\Model\DataObject\Fieldcollection $oemCrossReference): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Fieldcollections $fd */
	$fd = $this->getClass()->getFieldDefinition("oemCrossReference");
	$this->oemCrossReference = $fd->preSetData($this, $oemCrossReference);
	return $this;
}

/**
* Get prop65 - Prop65
* @return string|null
*/
public function getProp65(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("prop65");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->prop65;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set prop65 - Prop65
* @param string|null $prop65
* @return $this
*/
public function setProp65(?string $prop65): static
{
	$this->markFieldDirty("prop65", true);

	$this->prop65 = $prop65;

	return $this;
}

/**
* Get roHS - RoHS
* @return string|null
*/
public function getRoHS(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("roHS");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->roHS;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set roHS - RoHS
* @param string|null $roHS
* @return $this
*/
public function setRoHS(?string $roHS): static
{
	$this->markFieldDirty("roHS", true);

	$this->roHS = $roHS;

	return $this;
}

/**
* Get gprs - GPRS
* @return string|null
*/
public function getGprs(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("gprs");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->gprs;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set gprs - GPRS
* @param string|null $gprs
* @return $this
*/
public function setGprs(?string $gprs): static
{
	$this->markFieldDirty("gprs", true);

	$this->gprs = $gprs;

	return $this;
}

/**
* Get prop65Certificate - Prop65 Certificate
* @return \Pimcore\Model\Asset\Document|null
*/
public function getProp65Certificate(): ?\Pimcore\Model\Element\AbstractElement
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("prop65Certificate");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("prop65Certificate")->preGetData($this);

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set prop65Certificate - Prop65 Certificate
* @param \Pimcore\Model\Asset\Document|null $prop65Certificate
* @return $this
*/
public function setProp65Certificate(?\Pimcore\Model\Element\AbstractElement $prop65Certificate): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getClass()->getFieldDefinition("prop65Certificate");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getProp65Certificate();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $prop65Certificate);
	if (!$isEqual) {
		$this->markFieldDirty("prop65Certificate", true);
	}
	$this->prop65Certificate = $fd->preSetData($this, $prop65Certificate);
	return $this;
}

/**
* Get rohsCertificate - RoHS Certificate
* @return \Pimcore\Model\Asset\Document|null
*/
public function getRohsCertificate(): ?\Pimcore\Model\Element\AbstractElement
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("rohsCertificate");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("rohsCertificate")->preGetData($this);

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set rohsCertificate - RoHS Certificate
* @param \Pimcore\Model\Asset\Document|null $rohsCertificate
* @return $this
*/
public function setRohsCertificate(?\Pimcore\Model\Element\AbstractElement $rohsCertificate): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getClass()->getFieldDefinition("rohsCertificate");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getRohsCertificate();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $rohsCertificate);
	if (!$isEqual) {
		$this->markFieldDirty("rohsCertificate", true);
	}
	$this->rohsCertificate = $fd->preSetData($this, $rohsCertificate);
	return $this;
}

/**
* Get gprsCertificate - GPRS Certificate
* @return \Pimcore\Model\Asset\Document|null
*/
public function getGprsCertificate(): ?\Pimcore\Model\Element\AbstractElement
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("gprsCertificate");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("gprsCertificate")->preGetData($this);

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set gprsCertificate - GPRS Certificate
* @param \Pimcore\Model\Asset\Document|null $gprsCertificate
* @return $this
*/
public function setGprsCertificate(?\Pimcore\Model\Element\AbstractElement $gprsCertificate): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getClass()->getFieldDefinition("gprsCertificate");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getGprsCertificate();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $gprsCertificate);
	if (!$isEqual) {
		$this->markFieldDirty("gprsCertificate", true);
	}
	$this->gprsCertificate = $fd->preSetData($this, $gprsCertificate);
	return $this;
}

/**
* Get b2bFlag - B2B Flag
* @return bool|null
*/
public function getB2bFlag(): ?bool
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("b2bFlag");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->b2bFlag;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set b2bFlag - B2B Flag
* @param bool|null $b2bFlag
* @return $this
*/
public function setB2bFlag(?bool $b2bFlag): static
{
	$this->markFieldDirty("b2bFlag", true);

	$this->b2bFlag = $b2bFlag;

	return $this;
}

/**
* Get b2cFlag - B2C Flag
* @return bool|null
*/
public function getB2cFlag(): ?bool
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("b2cFlag");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->b2cFlag;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set b2cFlag - B2C Flag
* @param bool|null $b2cFlag
* @return $this
*/
public function setB2cFlag(?bool $b2cFlag): static
{
	$this->markFieldDirty("b2cFlag", true);

	$this->b2cFlag = $b2cFlag;

	return $this;
}

/**
* Get printedCatalogueFlag - Printed Catalogue Flag
* @return bool|null
*/
public function getPrintedCatalogueFlag(): ?bool
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("printedCatalogueFlag");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->printedCatalogueFlag;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set printedCatalogueFlag - Printed Catalogue Flag
* @param bool|null $printedCatalogueFlag
* @return $this
*/
public function setPrintedCatalogueFlag(?bool $printedCatalogueFlag): static
{
	$this->markFieldDirty("printedCatalogueFlag", true);

	$this->printedCatalogueFlag = $printedCatalogueFlag;

	return $this;
}

/**
* Get virtualCatalogueFlag - Virtual Catalogue Flag
* @return bool|null
*/
public function getVirtualCatalogueFlag(): ?bool
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("virtualCatalogueFlag");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->virtualCatalogueFlag;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set virtualCatalogueFlag - Virtual Catalogue Flag
* @param bool|null $virtualCatalogueFlag
* @return $this
*/
public function setVirtualCatalogueFlag(?bool $virtualCatalogueFlag): static
{
	$this->markFieldDirty("virtualCatalogueFlag", true);

	$this->virtualCatalogueFlag = $virtualCatalogueFlag;

	return $this;
}

/**
* Get customerPortalFlag - Customer Portal Flag
* @return bool|null
*/
public function getCustomerPortalFlag(): ?bool
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("customerPortalFlag");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->customerPortalFlag;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set customerPortalFlag - Customer Portal Flag
* @param bool|null $customerPortalFlag
* @return $this
*/
public function setCustomerPortalFlag(?bool $customerPortalFlag): static
{
	$this->markFieldDirty("customerPortalFlag", true);

	$this->customerPortalFlag = $customerPortalFlag;

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
* Get approvalState - Approval State
* @return string|null
*/
public function getApprovalState(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("approvalState");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->approvalState;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set approvalState - Approval State
* @param string|null $approvalState
* @return $this
*/
public function setApprovalState(?string $approvalState): static
{
	$this->markFieldDirty("approvalState", true);

	$this->approvalState = $approvalState;

	return $this;
}

}

