<?php

/**
 * Inheritance: yes
 * Variants: no
 *
 * Fields Summary:
 * - corporateBrand [input]
 * - productGroupBrand [select]
 * - productName [input]
 * - productNameVariant [input]
 * - productNameSubVariant [input]
 * - productDesign [input]
 * - productDesignCode [input]
 * - industrialStandards [multiselect]
 * - agencyCompliance [multiselect]
 * - b2bSubCategory [input]
 * - reach [select]
 * - reachCertificate [manyToOneRelation]
 * - hazardousSubstanceClassification [manyToOneRelation]
 * - featuresAndBenefits [manyToOneRelation]
 * - localizedfields [localizedfields]
 * -- legalText [textarea]
 * -- disclaimer [textarea]
 * -- marketingDescriptionShort [wysiwyg]
 * -- marketingDescriptionLong [wysiwyg]
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
 * - brandProductGroupSpecific [objectbricks]
 * - skeletonProductGroupSpecific [objectbricks]
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
 * - finishedGoodProductGroupSpecific [objectbricks]
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
 * - mainImage [image]
 * - internalCategories [manyToManyObjectRelation]
 * - ghpCode [input]
 * - ghpFullCode [input]
 * - hierarchyLevel [select]
 * - hierarchyLevelDescription [input]
 * - level [calculatedValue]
 * - skeletonPimInternalHierarchyCode [calculatedValue]
 * - approvalState [input]
 */

namespace Pimcore\Model\DataObject;

use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;

/**
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing getList(array $config = [])
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByCorporateBrand(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByProductGroupBrand(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByProductName(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByProductNameVariant(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByProductNameSubVariant(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByProductDesign(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByProductDesignCode(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByIndustrialStandards(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByAgencyCompliance(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByB2bSubCategory(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByReach(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByReachCertificate(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByHazardousSubstanceClassification(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByFeaturesAndBenefits(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByLocalizedfields(string $field, mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByLegalText(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByDisclaimer(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByMarketingDescriptionShort(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByMarketingDescriptionLong(mixed $value, ?string $locale = null, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
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
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByMainImage(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByInternalCategories(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByGhpCode(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByGhpFullCode(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByHierarchyLevel(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByHierarchyLevelDescription(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
* @method static \Pimcore\Model\DataObject\UniProductBase\Listing|\Pimcore\Model\DataObject\UniProductBase|null getByApprovalState(mixed $value, ?int $limit = null, int $offset = 0, ?array $objectTypes = null)
*/

class UniProductBase extends \App\Model\DataObject\AbstractUniProductBase
{
public const FIELD_CORPORATE_BRAND = 'corporateBrand';
public const FIELD_PRODUCT_GROUP_BRAND = 'productGroupBrand';
public const FIELD_PRODUCT_NAME = 'productName';
public const FIELD_PRODUCT_NAME_VARIANT = 'productNameVariant';
public const FIELD_PRODUCT_NAME_SUB_VARIANT = 'productNameSubVariant';
public const FIELD_PRODUCT_DESIGN = 'productDesign';
public const FIELD_PRODUCT_DESIGN_CODE = 'productDesignCode';
public const FIELD_INDUSTRIAL_STANDARDS = 'industrialStandards';
public const FIELD_AGENCY_COMPLIANCE = 'agencyCompliance';
public const FIELD_B2B_SUB_CATEGORY = 'b2bSubCategory';
public const FIELD_REACH = 'reach';
public const FIELD_REACH_CERTIFICATE = 'reachCertificate';
public const FIELD_HAZARDOUS_SUBSTANCE_CLASSIFICATION = 'hazardousSubstanceClassification';
public const FIELD_FEATURES_AND_BENEFITS = 'featuresAndBenefits';
public const FIELD_LEGAL_TEXT = 'legalText';
public const FIELD_DISCLAIMER = 'disclaimer';
public const FIELD_MARKETING_DESCRIPTION_SHORT = 'marketingDescriptionShort';
public const FIELD_MARKETING_DESCRIPTION_LONG = 'marketingDescriptionLong';
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
public const FIELD_BRAND_PRODUCT_GROUP_SPECIFIC = 'brandProductGroupSpecific';
public const FIELD_SKELETON_PRODUCT_GROUP_SPECIFIC = 'skeletonProductGroupSpecific';
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
public const FIELD_FINISHED_GOOD_PRODUCT_GROUP_SPECIFIC = 'finishedGoodProductGroupSpecific';
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
public const FIELD_MAIN_IMAGE = 'mainImage';
public const FIELD_INTERNAL_CATEGORIES = 'internalCategories';
public const FIELD_GHP_CODE = 'ghpCode';
public const FIELD_GHP_FULL_CODE = 'ghpFullCode';
public const FIELD_HIERARCHY_LEVEL = 'hierarchyLevel';
public const FIELD_HIERARCHY_LEVEL_DESCRIPTION = 'hierarchyLevelDescription';
public const FIELD_LEVEL = 'level';
public const FIELD_SKELETON_PIM_INTERNAL_HIERARCHY_CODE = 'skeletonPimInternalHierarchyCode';
public const FIELD_APPROVAL_STATE = 'approvalState';

protected $classId = "UNI_PR";
protected $className = "UniProductBase";
protected $corporateBrand;
protected $productGroupBrand;
protected $productName;
protected $productNameVariant;
protected $productNameSubVariant;
protected $productDesign;
protected $productDesignCode;
protected $industrialStandards;
protected $agencyCompliance;
protected $b2bSubCategory;
protected $reach;
protected $reachCertificate;
protected $hazardousSubstanceClassification;
protected $featuresAndBenefits;
protected $localizedfields;
protected $brandProductGroupSpecific;
protected $skeletonProductGroupSpecific;
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
protected $finishedGoodProductGroupSpecific;
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
protected $mainImage;
protected $internalCategories;
protected $ghpCode;
protected $ghpFullCode;
protected $hierarchyLevel;
protected $hierarchyLevelDescription;
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
* Get corporateBrand - Corporate Brand
* @return string|null
*/
public function getCorporateBrand(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("corporateBrand");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->corporateBrand;

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("corporateBrand")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("corporateBrand");
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
* Set corporateBrand - Corporate Brand
* @param string|null $corporateBrand
* @return $this
*/
public function setCorporateBrand(?string $corporateBrand): static
{
	$this->markFieldDirty("corporateBrand", true);

	$this->corporateBrand = $corporateBrand;

	return $this;
}

/**
* Get productGroupBrand - Product Group Brand
* @return string|null
*/
public function getProductGroupBrand(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("productGroupBrand");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->productGroupBrand;

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("productGroupBrand")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("productGroupBrand");
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
* Set productGroupBrand - Product Group Brand
* @param string|null $productGroupBrand
* @return $this
*/
public function setProductGroupBrand(?string $productGroupBrand): static
{
	$this->markFieldDirty("productGroupBrand", true);

	$this->productGroupBrand = $productGroupBrand;

	return $this;
}

/**
* Get productName - Product Name
* @return string|null
*/
public function getProductName(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("productName");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->productName;

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("productName")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("productName");
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
* Set productName - Product Name
* @param string|null $productName
* @return $this
*/
public function setProductName(?string $productName): static
{
	$this->markFieldDirty("productName", true);

	$this->productName = $productName;

	return $this;
}

/**
* Get productNameVariant - Product Name Variant
* @return string|null
*/
public function getProductNameVariant(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("productNameVariant");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->productNameVariant;

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("productNameVariant")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("productNameVariant");
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
* Set productNameVariant - Product Name Variant
* @param string|null $productNameVariant
* @return $this
*/
public function setProductNameVariant(?string $productNameVariant): static
{
	$this->markFieldDirty("productNameVariant", true);

	$this->productNameVariant = $productNameVariant;

	return $this;
}

/**
* Get productNameSubVariant - Product Name Sub Variant
* @return string|null
*/
public function getProductNameSubVariant(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("productNameSubVariant");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->productNameSubVariant;

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("productNameSubVariant")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("productNameSubVariant");
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
* Set productNameSubVariant - Product Name Sub Variant
* @param string|null $productNameSubVariant
* @return $this
*/
public function setProductNameSubVariant(?string $productNameSubVariant): static
{
	$this->markFieldDirty("productNameSubVariant", true);

	$this->productNameSubVariant = $productNameSubVariant;

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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("productDesign")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("productDesign");
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
* Get productDesignCode - Product Design Code
* @return string|null
*/
public function getProductDesignCode(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("productDesignCode");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->productDesignCode;

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("productDesignCode")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("productDesignCode");
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
* Set productDesignCode - Product Design Code
* @param string|null $productDesignCode
* @return $this
*/
public function setProductDesignCode(?string $productDesignCode): static
{
	$this->markFieldDirty("productDesignCode", true);

	$this->productDesignCode = $productDesignCode;

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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("industrialStandards")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("industrialStandards");
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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("agencyCompliance")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("agencyCompliance");
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
* Get b2bSubCategory - B2b Sub Category
* @return string|null
*/
public function getB2bSubCategory(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("b2bSubCategory");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->b2bSubCategory;

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("b2bSubCategory")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("b2bSubCategory");
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
* Set b2bSubCategory - B2b Sub Category
* @param string|null $b2bSubCategory
* @return $this
*/
public function setB2bSubCategory(?string $b2bSubCategory): static
{
	$this->markFieldDirty("b2bSubCategory", true);

	$this->b2bSubCategory = $b2bSubCategory;

	return $this;
}

/**
* Get reach - REACH  
* @return string|null
*/
public function getReach(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("reach");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->reach;

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("reach")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("reach");
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
* Set reach - REACH  
* @param string|null $reach
* @return $this
*/
public function setReach(?string $reach): static
{
	$this->markFieldDirty("reach", true);

	$this->reach = $reach;

	return $this;
}

/**
* Get reachCertificate - REACH Certificate
* @return \Pimcore\Model\Asset\Document|null
*/
public function getReachCertificate(): ?\Pimcore\Model\Element\AbstractElement
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("reachCertificate");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("reachCertificate")->preGetData($this);

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("reachCertificate")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("reachCertificate");
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
* Set reachCertificate - REACH Certificate
* @param \Pimcore\Model\Asset\Document|null $reachCertificate
* @return $this
*/
public function setReachCertificate(?\Pimcore\Model\Element\AbstractElement $reachCertificate): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getClass()->getFieldDefinition("reachCertificate");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
		return $this->getReachCertificate();
	});
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $reachCertificate);
	if (!$isEqual) {
		$this->markFieldDirty("reachCertificate", true);
	}
	$this->reachCertificate = $fd->preSetData($this, $reachCertificate);
	return $this;
}

/**
* Get hazardousSubstanceClassification - Hazardous Substance Classification
* @return \Pimcore\Model\DataObject\UniPrHazardousSubstanceClassification|null
*/
public function getHazardousSubstanceClassification(): ?\Pimcore\Model\Element\AbstractElement
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("hazardousSubstanceClassification");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("hazardousSubstanceClassification")->preGetData($this);

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("hazardousSubstanceClassification")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("hazardousSubstanceClassification");
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
* Set hazardousSubstanceClassification - Hazardous Substance Classification
* @param \Pimcore\Model\DataObject\UniPrHazardousSubstanceClassification|null $hazardousSubstanceClassification
* @return $this
*/
public function setHazardousSubstanceClassification(?\Pimcore\Model\Element\AbstractElement $hazardousSubstanceClassification): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getClass()->getFieldDefinition("hazardousSubstanceClassification");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
		return $this->getHazardousSubstanceClassification();
	});
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $hazardousSubstanceClassification);
	if (!$isEqual) {
		$this->markFieldDirty("hazardousSubstanceClassification", true);
	}
	$this->hazardousSubstanceClassification = $fd->preSetData($this, $hazardousSubstanceClassification);
	return $this;
}

/**
* Get featuresAndBenefits - Features And Benefits
* @return \Pimcore\Model\DataObject\UniPrFeaturesAndBenefits|null
*/
public function getFeaturesAndBenefits(): ?\Pimcore\Model\Element\AbstractElement
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("featuresAndBenefits");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->getClass()->getFieldDefinition("featuresAndBenefits")->preGetData($this);

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("featuresAndBenefits")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("featuresAndBenefits");
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
* Set featuresAndBenefits - Features And Benefits
* @param \Pimcore\Model\DataObject\UniPrFeaturesAndBenefits|null $featuresAndBenefits
* @return $this
*/
public function setFeaturesAndBenefits(?\Pimcore\Model\Element\AbstractElement $featuresAndBenefits): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation $fd */
	$fd = $this->getClass()->getFieldDefinition("featuresAndBenefits");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
		return $this->getFeaturesAndBenefits();
	});
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $featuresAndBenefits);
	if (!$isEqual) {
		$this->markFieldDirty("featuresAndBenefits", true);
	}
	$this->featuresAndBenefits = $fd->preSetData($this, $featuresAndBenefits);
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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("localizedfields")->isEmpty($data)) {
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
* Get disclaimer - Disclaimer
* @return string|null
*/
public function getDisclaimer(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("disclaimer", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("disclaimer");
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
* Get marketingDescriptionShort - Marketing Description - Short
* @return string|null
*/
public function getMarketingDescriptionShort(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("marketingDescriptionShort", $language);
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("marketingDescriptionShort");
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
	$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
		return $this->getLocalizedfields();
	});
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$this->markFieldDirty("localizedfields", true);
	$this->markFieldDirty("localizedfields", true);

	$this->localizedfields = $localizedfields;

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
* Set disclaimer - Disclaimer
* @param string|null $disclaimer
* @return $this
*/
public function setDisclaimer (?string $disclaimer, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("disclaimer", $disclaimer, $language, !$isEqual);

	return $this;
}

/**
* Set marketingDescriptionShort - Marketing Description - Short
* @param string|null $marketingDescriptionShort
* @return $this
*/
public function setMarketingDescriptionShort (?string $marketingDescriptionShort, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("marketingDescriptionShort", $marketingDescriptionShort, $language, !$isEqual);

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
* @return \Pimcore\Model\DataObject\UniProductBase\BrandProductGroupSpecific
*/
public function getBrandProductGroupSpecific(): ?\Pimcore\Model\DataObject\Objectbrick
{
	$data = $this->brandProductGroupSpecific;
	if (!$data) {
		if (\Pimcore\Tool::classExists("\\Pimcore\\Model\\DataObject\\UniProductBase\\BrandProductGroupSpecific")) {
			$data = new \Pimcore\Model\DataObject\UniProductBase\BrandProductGroupSpecific($this, "brandProductGroupSpecific");
			$this->brandProductGroupSpecific = $data;
		} else {
			return null;
		}
	}
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("brandProductGroupSpecific");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	return $data;
}

/**
* Set brandProductGroupSpecific - Product Group Specific Data
* @param \Pimcore\Model\DataObject\Objectbrick|null $brandProductGroupSpecific
* @return $this
*/
public function setBrandProductGroupSpecific(?\Pimcore\Model\DataObject\Objectbrick $brandProductGroupSpecific): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks $fd */
	$fd = $this->getClass()->getFieldDefinition("brandProductGroupSpecific");
	$this->brandProductGroupSpecific = $fd->preSetData($this, $brandProductGroupSpecific);
	return $this;
}

/**
* @return \Pimcore\Model\DataObject\UniProductBase\SkeletonProductGroupSpecific
*/
public function getSkeletonProductGroupSpecific(): ?\Pimcore\Model\DataObject\Objectbrick
{
	$data = $this->skeletonProductGroupSpecific;
	if (!$data) {
		if (\Pimcore\Tool::classExists("\\Pimcore\\Model\\DataObject\\UniProductBase\\SkeletonProductGroupSpecific")) {
			$data = new \Pimcore\Model\DataObject\UniProductBase\SkeletonProductGroupSpecific($this, "skeletonProductGroupSpecific");
			$this->skeletonProductGroupSpecific = $data;
		} else {
			return null;
		}
	}
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("skeletonProductGroupSpecific");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	return $data;
}

/**
* Set skeletonProductGroupSpecific - Product Group Specific Data
* @param \Pimcore\Model\DataObject\Objectbrick|null $skeletonProductGroupSpecific
* @return $this
*/
public function setSkeletonProductGroupSpecific(?\Pimcore\Model\DataObject\Objectbrick $skeletonProductGroupSpecific): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks $fd */
	$fd = $this->getClass()->getFieldDefinition("skeletonProductGroupSpecific");
	$this->skeletonProductGroupSpecific = $fd->preSetData($this, $skeletonProductGroupSpecific);
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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("fullProductName")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("fullProductName");
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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("sapMaterialNumber")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("sapMaterialNumber");
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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("partNumber")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("partNumber");
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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("oldMaterialNumber")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("oldMaterialNumber");
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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("weightMetric")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("weightMetric");
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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("weightImperial")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("weightImperial");
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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("tariffCodes")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("tariffCodes");
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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("countryOfOrigin")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("countryOfOrigin");
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
	$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
		return $this->getCountryOfOrigin();
	});
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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("eanCode")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("eanCode");
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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("externalId")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("externalId");
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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("stccCode")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("stccCode");
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
* @return \Pimcore\Model\DataObject\UniProductBase\FinishedGoodProductGroupSpecific
*/
public function getFinishedGoodProductGroupSpecific(): ?\Pimcore\Model\DataObject\Objectbrick
{
	$data = $this->finishedGoodProductGroupSpecific;
	if (!$data) {
		if (\Pimcore\Tool::classExists("\\Pimcore\\Model\\DataObject\\UniProductBase\\FinishedGoodProductGroupSpecific")) {
			$data = new \Pimcore\Model\DataObject\UniProductBase\FinishedGoodProductGroupSpecific($this, "finishedGoodProductGroupSpecific");
			$this->finishedGoodProductGroupSpecific = $data;
		} else {
			return null;
		}
	}
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("finishedGoodProductGroupSpecific");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	return $data;
}

/**
* Set finishedGoodProductGroupSpecific - Product Group Specific Data
* @param \Pimcore\Model\DataObject\Objectbrick|null $finishedGoodProductGroupSpecific
* @return $this
*/
public function setFinishedGoodProductGroupSpecific(?\Pimcore\Model\DataObject\Objectbrick $finishedGoodProductGroupSpecific): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\Objectbricks $fd */
	$fd = $this->getClass()->getFieldDefinition("finishedGoodProductGroupSpecific");
	$this->finishedGoodProductGroupSpecific = $fd->preSetData($this, $finishedGoodProductGroupSpecific);
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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("prop65")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("prop65");
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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("roHS")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("roHS");
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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("gprs")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("gprs");
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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("prop65Certificate")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("prop65Certificate");
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
	$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
		return $this->getProp65Certificate();
	});
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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("rohsCertificate")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("rohsCertificate");
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
	$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
		return $this->getRohsCertificate();
	});
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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("gprsCertificate")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("gprsCertificate");
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
	$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
		return $this->getGprsCertificate();
	});
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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("b2bFlag")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("b2bFlag");
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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("b2cFlag")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("b2cFlag");
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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("printedCatalogueFlag")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("printedCatalogueFlag");
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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("virtualCatalogueFlag")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("virtualCatalogueFlag");
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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("customerPortalFlag")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("customerPortalFlag");
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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("regionalAvailability")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("regionalAvailability");
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
	$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
		return $this->getRegionalAvailability();
	});
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
* Get mainImage - Main Image
* @return \Pimcore\Model\Asset\Image|null
*/
public function getMainImage(): ?\Pimcore\Model\Asset\Image
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("mainImage");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->mainImage;

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("mainImage")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("mainImage");
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
* Set mainImage - Main Image
* @param \Pimcore\Model\Asset\Image|null $mainImage
* @return $this
*/
public function setMainImage(?\Pimcore\Model\Asset\Image $mainImage): static
{
	$this->markFieldDirty("mainImage", true);

	$this->mainImage = $mainImage;

	return $this;
}

/**
* Get internalCategories - Internal Categories
* @return \Pimcore\Model\DataObject\UniProductCategoryInternal[]|\Pimcore\Model\DataObject\UniProductBase[]
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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("internalCategories")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("internalCategories");
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
* Set internalCategories - Internal Categories
* @param \Pimcore\Model\DataObject\UniProductCategoryInternal[]|\Pimcore\Model\DataObject\UniProductBase[] $internalCategories
* @return $this
*/
public function setInternalCategories(?array $internalCategories): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation $fd */
	$fd = $this->getClass()->getFieldDefinition("internalCategories");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
		return $this->getInternalCategories();
	});
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $internalCategories);
	if (!$isEqual) {
		$this->markFieldDirty("internalCategories", true);
	}
	$this->internalCategories = $fd->preSetData($this, $internalCategories);
	return $this;
}

/**
* Get ghpCode - Product Hierarchy Code (GHP)
* @return string|null
*/
public function getGhpCode(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("ghpCode");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->ghpCode;

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("ghpCode")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("ghpCode");
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
* Set ghpCode - Product Hierarchy Code (GHP)
* @param string|null $ghpCode
* @return $this
*/
public function setGhpCode(?string $ghpCode): static
{
	$this->markFieldDirty("ghpCode", true);

	$this->ghpCode = $ghpCode;

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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("ghpFullCode")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("ghpFullCode");
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
* Get hierarchyLevel - Hierarchy Level
* @return string|null
*/
public function getHierarchyLevel(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("hierarchyLevel");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->hierarchyLevel;

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("hierarchyLevel")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("hierarchyLevel");
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
* Set hierarchyLevel - Hierarchy Level
* @param string|null $hierarchyLevel
* @return $this
*/
public function setHierarchyLevel(?string $hierarchyLevel): static
{
	$this->markFieldDirty("hierarchyLevel", true);

	$this->hierarchyLevel = $hierarchyLevel;

	return $this;
}

/**
* Get hierarchyLevelDescription - Hierarchy Level Description
* @return string|null
*/
public function getHierarchyLevelDescription(): ?string
{
	if ($this instanceof PreGetValueHookInterface && !\Pimcore::inAdmin()) {
		$preValue = $this->preGetValue("hierarchyLevelDescription");
		if ($preValue !== null) {
			return $preValue;
		}
	}

	$data = $this->hierarchyLevelDescription;

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("hierarchyLevelDescription")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("hierarchyLevelDescription");
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
* Set hierarchyLevelDescription - Hierarchy Level Description
* @param string|null $hierarchyLevelDescription
* @return $this
*/
public function setHierarchyLevelDescription(?string $hierarchyLevelDescription): static
{
	$this->markFieldDirty("hierarchyLevelDescription", true);

	$this->hierarchyLevelDescription = $hierarchyLevelDescription;

	return $this;
}

/**
* Get level - Level
* @return mixed
*/
public function getLevel(): mixed
{
	$data = new \Pimcore\Model\DataObject\Data\CalculatedValue('level');
	$data->setContextualData("object", null, null, null);
	$object = $this;
	$data = \Pimcore\Model\DataObject\Service::getCalculatedFieldValue($object, $data);

	return $data;
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

	if (\Pimcore\Model\DataObject::doGetInheritedValues() && $this->getClass()->getFieldDefinition("approvalState")->isEmpty($data)) {
		try {
			return $this->getValueFromParent("approvalState");
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

