<?php

/**
 * Inheritance: no
 * Variants: no
 *
 * Fields Summary:
 * - brandData [objectbricks]
 * - skeletonData [objectbricks]
 * - productBrandName [input]
 * - masterBrand [select]
 * - productFamily [input]
 * - productDesign [input]
 * - localizedfields [localizedfields]
 * -- productSubCategory [manyToOneRelation]
 * -- productCategory [manyToOneRelation]
 * -- b2bSubCategory [manyToManyObjectRelation]
 * -- sapDescription [input]
 * -- sapDescriptionLanguage [select]
 * -- PlantProduced [select]
 * -- unitOfMeasure [quantityValue]
 * -- weight [numeric]
 * -- marketingDescriptionLong [wysiwyg]
 * -- MarketingDescriptionShort [wysiwyg]
 * -- featuresAndBenefits [select]
 * -- productDescriptionShort [textarea]
 * -- productDescriptionLong [textarea]
 * -- productDescriptionExtended [wysiwyg]
 * -- productMarking1 [textarea]
 * -- ProductMarking2 [textarea]
 * -- Applications [textarea]
 * -- hazardousSubstanceClassification [multiselect]
 * -- REACH [select]
 * -- prop65 [select]
 * -- roHS [select]
 * -- gprs [select]
 * -- legalText [textarea]
 * -- Disclaimer [textarea]
 * -- completenessPercentage [input]
 * -- emptyFieldsBrand [textarea]
 * -- emptyFieldsSkeleton [textarea]
 * -- emptyFieldsFinishedGood [textarea]
 * - sapMaterialNumber [input]
 * - partNumber [input]
 * - oldMaterialNumber [input]
 * - eanCode [input]
 * - countryOfOrigin [country]
 * - tariffCodes [numeric]
 * - ghpFullCode [input]
 * - skeletonPimInternalHierarchyCode [calculatedValue]
 * - hierarchySearchData [calculatedValue]
 * - weightMetric [quantityValue]
 * - weightImperial [quantityValue]
 * - technicalProductGroupSpecific [objectbricks]
 * - regionalAvailability [manyToManyObjectRelation]
 * - regions [calculatedValue]
 * - competitorCrossReference [fieldcollections]
 * - customerReferernce [fieldcollections]
 * - oemCrossReference [fieldcollections]
 * - industrialStandards [multiselect]
 * - agencyCompliance [multiselect]
 * - b2bFlag [checkbox]
 * - b2cFlag [checkbox]
 * - printedCatalogueFlag [checkbox]
 * - virtualCatalogueFlag [checkbox]
 * - internalCategories [manyToManyObjectRelation]
 */

namespace Pimcore\Model\DataObject;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

/**
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing getList(array $config = [])
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByProductBrandName(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByMasterBrand(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByProductFamily(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByProductDesign(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByLocalizedfields(string $field, mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByProductSubCategory(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByProductCategory(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByB2bSubCategory(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getBySapDescription(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getBySapDescriptionLanguage(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByPlantProduced(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByUnitOfMeasure(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByWeight(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByMarketingDescriptionLong(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByMarketingDescriptionShort(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByFeaturesAndBenefits(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByProductDescriptionShort(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByProductDescriptionLong(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByProductDescriptionExtended(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByProductMarking1(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByProductMarking2(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByApplications(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByHazardousSubstanceClassification(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByREACH(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByProp65(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByRoHS(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByGprs(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByLegalText(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByDisclaimer(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByCompletenessPercentage(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByEmptyFieldsBrand(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByEmptyFieldsSkeleton(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByEmptyFieldsFinishedGood(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getBySapMaterialNumber(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByPartNumber(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByOldMaterialNumber(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByEanCode(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByCountryOfOrigin(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByTariffCodes(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByGhpFullCode(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByRegionalAvailability(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByIndustrialStandards(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByAgencyCompliance(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByB2bFlag(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByB2cFlag(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByPrintedCatalogueFlag(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByVirtualCatalogueFlag(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByInternalCategories(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
*/

class UniProductBase extends \App\Model\DataObject\AbstractUniProductBase
{
public const FIELD_BRAND_DATA = 'brandData';
public const FIELD_SKELETON_DATA = 'skeletonData';
public const FIELD_PRODUCT_BRAND_NAME = 'productBrandName';
public const FIELD_MASTER_BRAND = 'masterBrand';
public const FIELD_PRODUCT_FAMILY = 'productFamily';
public const FIELD_PRODUCT_DESIGN = 'productDesign';
public const FIELD_PRODUCT_SUB_CATEGORY = 'productSubCategory';
public const FIELD_PRODUCT_CATEGORY = 'productCategory';
public const FIELD_B2B_SUB_CATEGORY = 'b2bSubCategory';
public const FIELD_SAP_DESCRIPTION = 'sapDescription';
public const FIELD_SAP_DESCRIPTION_LANGUAGE = 'sapDescriptionLanguage';
public const FIELD_PLANT_PRODUCED = 'PlantProduced';
public const FIELD_UNIT_OF_MEASURE = 'unitOfMeasure';
public const FIELD_WEIGHT = 'weight';
public const FIELD_MARKETING_DESCRIPTION_LONG = 'marketingDescriptionLong';
public const FIELD_MARKETING_DESCRIPTION_SHORT = 'MarketingDescriptionShort';
public const FIELD_FEATURES_AND_BENEFITS = 'featuresAndBenefits';
public const FIELD_PRODUCT_DESCRIPTION_SHORT = 'productDescriptionShort';
public const FIELD_PRODUCT_DESCRIPTION_LONG = 'productDescriptionLong';
public const FIELD_PRODUCT_DESCRIPTION_EXTENDED = 'productDescriptionExtended';
public const FIELD_PRODUCT_MARKING1 = 'productMarking1';
public const FIELD_PRODUCT_MARKING2 = 'ProductMarking2';
public const FIELD_APPLICATIONS = 'Applications';
public const FIELD_HAZARDOUS_SUBSTANCE_CLASSIFICATION = 'hazardousSubstanceClassification';
public const FIELD_REACH = 'REACH';
public const FIELD_PROP65 = 'prop65';
public const FIELD_RO_HS = 'roHS';
public const FIELD_GPRS = 'gprs';
public const FIELD_LEGAL_TEXT = 'legalText';
public const FIELD_DISCLAIMER = 'Disclaimer';
public const FIELD_COMPLETENESS_PERCENTAGE = 'completenessPercentage';
public const FIELD_EMPTY_FIELDS_BRAND = 'emptyFieldsBrand';
public const FIELD_EMPTY_FIELDS_SKELETON = 'emptyFieldsSkeleton';
public const FIELD_EMPTY_FIELDS_FINISHED_GOOD = 'emptyFieldsFinishedGood';
public const FIELD_SAP_MATERIAL_NUMBER = 'sapMaterialNumber';
public const FIELD_PART_NUMBER = 'partNumber';
public const FIELD_OLD_MATERIAL_NUMBER = 'oldMaterialNumber';
public const FIELD_EAN_CODE = 'eanCode';
public const FIELD_COUNTRY_OF_ORIGIN = 'countryOfOrigin';
public const FIELD_TARIFF_CODES = 'tariffCodes';
public const FIELD_GHP_FULL_CODE = 'ghpFullCode';
public const FIELD_SKELETON_PIM_INTERNAL_HIERARCHY_CODE = 'skeletonPimInternalHierarchyCode';
public const FIELD_HIERARCHY_SEARCH_DATA = 'hierarchySearchData';
public const FIELD_WEIGHT_METRIC = 'weightMetric';
public const FIELD_WEIGHT_IMPERIAL = 'weightImperial';
public const FIELD_TECHNICAL_PRODUCT_GROUP_SPECIFIC = 'technicalProductGroupSpecific';
public const FIELD_REGIONAL_AVAILABILITY = 'regionalAvailability';
public const FIELD_REGIONS = 'regions';
public const FIELD_COMPETITOR_CROSS_REFERENCE = 'competitorCrossReference';
public const FIELD_CUSTOMER_REFERERNCE = 'customerReferernce';
public const FIELD_OEM_CROSS_REFERENCE = 'oemCrossReference';
public const FIELD_INDUSTRIAL_STANDARDS = 'industrialStandards';
public const FIELD_AGENCY_COMPLIANCE = 'agencyCompliance';
public const FIELD_B2B_FLAG = 'b2bFlag';
public const FIELD_B2C_FLAG = 'b2cFlag';
public const FIELD_PRINTED_CATALOGUE_FLAG = 'printedCatalogueFlag';
public const FIELD_VIRTUAL_CATALOGUE_FLAG = 'virtualCatalogueFlag';
public const FIELD_INTERNAL_CATEGORIES = 'internalCategories';

protected $classId = "UNI_PR";
protected $className = "UniProductBase";
protected $brandData;
protected $skeletonData;
protected $productBrandName;
protected $masterBrand;
protected $productFamily;
protected $productDesign;
protected $localizedfields;
protected $sapMaterialNumber;
protected $partNumber;
protected $oldMaterialNumber;
protected $eanCode;
protected $countryOfOrigin;
protected $tariffCodes;
protected $ghpFullCode;
protected $weightMetric;
protected $weightImperial;
protected $technicalProductGroupSpecific;
protected $regionalAvailability;
protected $competitorCrossReference;
protected $customerReferernce;
protected $oemCrossReference;
protected $industrialStandards;
protected $agencyCompliance;
protected $b2bFlag;
protected $b2cFlag;
protected $printedCatalogueFlag;
protected $virtualCatalogueFlag;
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
* Get masterBrand - Master Brand
* @return string|null
*/
public function getMasterBrand(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("masterBrand");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->masterBrand;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set masterBrand - Master Brand
* @param string|null $masterBrand
* @return $this
*/
public function setMasterBrand(?string $masterBrand): static
{
	$this->markFieldDirty("masterBrand", true);

	$this->masterBrand = $masterBrand;

	return $this;
}

/**
* Get productFamily - Product Family
* @return string|null
*/
public function getProductFamily(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("productFamily");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->productFamily;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set productFamily - Product Family
* @param string|null $productFamily
* @return $this
*/
public function setProductFamily(?string $productFamily): static
{
	$this->markFieldDirty("productFamily", true);

	$this->productFamily = $productFamily;

	return $this;
}

/**
* Get productDesign - Product Design Name
* @return string|null
*/
public function getProductDesign(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("productDesign");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->productDesign;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set productDesign - Product Design Name
* @param string|null $productDesign
* @return $this
*/
public function setProductDesign(?string $productDesign): static
{
	$this->markFieldDirty("productDesign", true);

	$this->productDesign = $productDesign;

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
* @return 
*/
public function getProductSubCategory(?string $language = null): ?\Pimcore\Model\Element\AbstractElement
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
* Get productCategory - Product Category  
* @return 
*/
public function getProductCategory(?string $language = null): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getLocalizedfields()->getLocalizedValue("productCategory", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("productCategory");
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
* Get b2bSubCategory - B2b Sub Category
* @return \Pimcore\Model\DataObject\AbstractObject[]
*/
public function getB2bSubCategory(?string $language = null): array
{
	$data = $this->getLocalizedfields()->getLocalizedValue("b2bSubCategory", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("b2bSubCategory");
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
* Get PlantProduced - Plant Produced
* @return string|null
*/
public function getPlantProduced(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("PlantProduced", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("PlantProduced");
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
* Get unitOfMeasure - Unit of Measure (UOM)
* @return \Pimcore\Model\DataObject\Data\QuantityValue|null
*/
public function getUnitOfMeasure(?string $language = null): ?\Pimcore\Model\DataObject\Data\QuantityValue
{
	$data = $this->getLocalizedfields()->getLocalizedValue("unitOfMeasure", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("unitOfMeasure");
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
* Get weight - Weight (metric / imperial)
* @return float|null
*/
public function getWeight(?string $language = null): ?float
{
	$data = $this->getLocalizedfields()->getLocalizedValue("weight", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("weight");
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
* Get marketingDescriptionLong - Marketing Description - Long
* @return string|null
*/
public function getMarketingDescriptionLong(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("marketingDescriptionLong", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("marketingDescriptionLong");
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
* Get MarketingDescriptionShort - Marketing Description - Short
* @return string|null
*/
public function getMarketingDescriptionShort(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("MarketingDescriptionShort", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("MarketingDescriptionShort");
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
* Get featuresAndBenefits - Features And Benefits
* @return string|null
*/
public function getFeaturesAndBenefits(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("featuresAndBenefits", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("featuresAndBenefits");
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
* Get ProductMarking2 - Product Marking - 2
* @return string|null
*/
public function getProductMarking2(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("ProductMarking2", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("ProductMarking2");
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
* Get Applications - Applications
* @return string|null
*/
public function getApplications(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("Applications", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Applications");
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
* Get hazardousSubstanceClassification - Hazardous Substance Classification  
* @return string[]|null
*/
public function getHazardousSubstanceClassification(?string $language = null): ?array
{
	$data = $this->getLocalizedfields()->getLocalizedValue("hazardousSubstanceClassification", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("hazardousSubstanceClassification");
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
* Get REACH - REACH  
* @return string|null
*/
public function getREACH(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("REACH", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("REACH");
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
* Get prop65 - Prop65
* @return string|null
*/
public function getProp65(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("prop65", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("prop65");
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
* Get roHS - RoHS
* @return string|null
*/
public function getRoHS(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("roHS", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("roHS");
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
* Get gprs - GPRS
* @return string|null
*/
public function getGprs(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("gprs", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("gprs");
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
* Get legalText - Legal Text
* @return string|null
*/
public function getLegalText(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("legalText", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("legalText");
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
* Get Disclaimer - Disclaimer
* @return string|null
*/
public function getDisclaimer(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("Disclaimer", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("Disclaimer");
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
* @param  $productSubCategory
* @return $this
*/
public function setProductSubCategory (?\Pimcore\Model\Element\AbstractElement $productSubCategory, ?string $language = null): static
{
	$fd = $this->getClass()->getFieldDefinition("localizedfields")->getFieldDefinition("productSubCategory");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getProductSubCategory($language);
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $productSubCategory);
	if (!$isEqual) {
		$this->markFieldDirty("productSubCategory", true);
	}
	$this->getLocalizedfields()->setLocalizedValue("productSubCategory", $productSubCategory, $language, !$isEqual);

	return $this;
}

/**
* Set productCategory - Product Category  
* @param  $productCategory
* @return $this
*/
public function setProductCategory (?\Pimcore\Model\Element\AbstractElement $productCategory, ?string $language = null): static
{
	$fd = $this->getClass()->getFieldDefinition("localizedfields")->getFieldDefinition("productCategory");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getProductCategory($language);
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $productCategory);
	if (!$isEqual) {
		$this->markFieldDirty("productCategory", true);
	}
	$this->getLocalizedfields()->setLocalizedValue("productCategory", $productCategory, $language, !$isEqual);

	return $this;
}

/**
* Set b2bSubCategory - B2b Sub Category
* @param \Pimcore\Model\DataObject\AbstractObject[] $b2bSubCategory
* @return $this
*/
public function setB2bSubCategory (?array $b2bSubCategory, ?string $language = null): static
{
	$fd = $this->getClass()->getFieldDefinition("localizedfields")->getFieldDefinition("b2bSubCategory");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getB2bSubCategory($language);
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $b2bSubCategory);
	if (!$isEqual) {
		$this->markFieldDirty("b2bSubCategory", true);
	}
	$this->getLocalizedfields()->setLocalizedValue("b2bSubCategory", $b2bSubCategory, $language, !$isEqual);

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
* Set PlantProduced - Plant Produced
* @param string|null $PlantProduced
* @return $this
*/
public function setPlantProduced (?string $PlantProduced, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("PlantProduced", $PlantProduced, $language, !$isEqual);

	return $this;
}

/**
* Set unitOfMeasure - Unit of Measure (UOM)
* @param \Pimcore\Model\DataObject\Data\QuantityValue|null $unitOfMeasure
* @return $this
*/
public function setUnitOfMeasure (?\Pimcore\Model\DataObject\Data\QuantityValue $unitOfMeasure, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("unitOfMeasure", $unitOfMeasure, $language, !$isEqual);

	return $this;
}

/**
* Set weight - Weight (metric / imperial)
* @param float|null $weight
* @return $this
*/
public function setWeight (?float $weight, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("weight", $weight, $language, !$isEqual);

	return $this;
}

/**
* Set marketingDescriptionLong - Marketing Description - Long
* @param string|null $marketingDescriptionLong
* @return $this
*/
public function setMarketingDescriptionLong (?string $marketingDescriptionLong, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("marketingDescriptionLong", $marketingDescriptionLong, $language, !$isEqual);

	return $this;
}

/**
* Set MarketingDescriptionShort - Marketing Description - Short
* @param string|null $MarketingDescriptionShort
* @return $this
*/
public function setMarketingDescriptionShort (?string $MarketingDescriptionShort, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("MarketingDescriptionShort", $MarketingDescriptionShort, $language, !$isEqual);

	return $this;
}

/**
* Set featuresAndBenefits - Features And Benefits
* @param string|null $featuresAndBenefits
* @return $this
*/
public function setFeaturesAndBenefits (?string $featuresAndBenefits, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("featuresAndBenefits", $featuresAndBenefits, $language, !$isEqual);

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
* Set ProductMarking2 - Product Marking - 2
* @param string|null $ProductMarking2
* @return $this
*/
public function setProductMarking2 (?string $ProductMarking2, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("ProductMarking2", $ProductMarking2, $language, !$isEqual);

	return $this;
}

/**
* Set Applications - Applications
* @param string|null $Applications
* @return $this
*/
public function setApplications (?string $Applications, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("Applications", $Applications, $language, !$isEqual);

	return $this;
}

/**
* Set hazardousSubstanceClassification - Hazardous Substance Classification  
* @param string[]|null $hazardousSubstanceClassification
* @return $this
*/
public function setHazardousSubstanceClassification (?array $hazardousSubstanceClassification, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("hazardousSubstanceClassification", $hazardousSubstanceClassification, $language, !$isEqual);

	return $this;
}

/**
* Set REACH - REACH  
* @param string|null $REACH
* @return $this
*/
public function setREACH (?string $REACH, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("REACH", $REACH, $language, !$isEqual);

	return $this;
}

/**
* Set prop65 - Prop65
* @param string|null $prop65
* @return $this
*/
public function setProp65 (?string $prop65, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("prop65", $prop65, $language, !$isEqual);

	return $this;
}

/**
* Set roHS - RoHS
* @param string|null $roHS
* @return $this
*/
public function setRoHS (?string $roHS, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("roHS", $roHS, $language, !$isEqual);

	return $this;
}

/**
* Set gprs - GPRS
* @param string|null $gprs
* @return $this
*/
public function setGprs (?string $gprs, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("gprs", $gprs, $language, !$isEqual);

	return $this;
}

/**
* Set legalText - Legal Text
* @param string|null $legalText
* @return $this
*/
public function setLegalText (?string $legalText, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("legalText", $legalText, $language, !$isEqual);

	return $this;
}

/**
* Set Disclaimer - Disclaimer
* @param string|null $Disclaimer
* @return $this
*/
public function setDisclaimer (?string $Disclaimer, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("Disclaimer", $Disclaimer, $language, !$isEqual);

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
* Get countryOfOrigin - Country Of Origin
* @return string|null
*/
public function getCountryOfOrigin(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("countryOfOrigin");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->countryOfOrigin;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set countryOfOrigin - Country Of Origin
* @param string|null $countryOfOrigin
* @return $this
*/
public function setCountryOfOrigin(?string $countryOfOrigin): static
{
	$this->markFieldDirty("countryOfOrigin", true);

	$this->countryOfOrigin = $countryOfOrigin;

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
public function getCustomerReferernce(): ?\Pimcore\Model\DataObject\Fieldcollection
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("customerReferernce");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("customerReferernce")->preGetData($this);
	return $data;
}

/**
* Set customerReferernce - customerReferernce
* @param \Pimcore\Model\DataObject\Fieldcollection|null $customerReferernce
* @return $this
*/
public function setCustomerReferernce(?\Pimcore\Model\DataObject\Fieldcollection $customerReferernce): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Fieldcollections $fd */
	$fd = $this->getClass()->getFieldDefinition("customerReferernce");
	$this->customerReferernce = $fd->preSetData($this, $customerReferernce);
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
* Get industrialStandards - Industrial Standards  
* @return string[]|null
*/
public function getIndustrialStandards(): ?array
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("industrialStandards");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->industrialStandards;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set industrialStandards - Industrial Standards  
* @param string[]|null $industrialStandards
* @return $this
*/
public function setIndustrialStandards(?array $industrialStandards): static
{
	$this->markFieldDirty("industrialStandards", true);

	$this->industrialStandards = $industrialStandards;

	return $this;
}

/**
* Get agencyCompliance - Agency Compliance
* @return string[]|null
*/
public function getAgencyCompliance(): ?array
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("agencyCompliance");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->agencyCompliance;

	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Set agencyCompliance - Agency Compliance
* @param string[]|null $agencyCompliance
* @return $this
*/
public function setAgencyCompliance(?array $agencyCompliance): static
{
	$this->markFieldDirty("agencyCompliance", true);

	$this->agencyCompliance = $agencyCompliance;

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

