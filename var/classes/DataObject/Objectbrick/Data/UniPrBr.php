<?php

/**
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
 * - b2bSubCategory [manyToManyObjectRelation]
 * - localizedfields [localizedfields]
 * -- reach [select]
 * -- hazardousSubstanceClassification [multiselect]
 * -- featuresAndBenefits [multiselect]
 * -- reachCertificates [manyToOneRelation]
 * -- legalText [textarea]
 * -- disclaimer [textarea]
 * -- marketingDescriptionShort [wysiwyg]
 * -- marketingDescriptionLong [wysiwyg]
 */

namespace Pimcore\Model\DataObject\Objectbrick\Data;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Exception\InheritanceParentNotFoundException;
use Pimcore\Model\DataObject\PreGetValueHookInterface;


class UniPrBr extends \App\Model\DataObject\UniProductManagement\Objectbrick\AbstractUniPrBrand
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
public const FIELD_HAZARDOUS_SUBSTANCE_CLASSIFICATION = 'hazardousSubstanceClassification';
public const FIELD_FEATURES_AND_BENEFITS = 'featuresAndBenefits';
public const FIELD_REACH_CERTIFICATES = 'reachCertificates';
public const FIELD_LEGAL_TEXT = 'legalText';
public const FIELD_DISCLAIMER = 'disclaimer';
public const FIELD_MARKETING_DESCRIPTION_SHORT = 'marketingDescriptionShort';
public const FIELD_MARKETING_DESCRIPTION_LONG = 'marketingDescriptionLong';

protected string $type = "UniPrBr";
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
protected $localizedfields;


/**
* UniPrBr constructor.
* @param DataObject\Concrete $object
*/
public function __construct(DataObject\Concrete $object)
{
	parent::__construct($object);
	$this->markFieldDirty("_self");
}


/**
* Get corporateBrand - Corporate Brand
* @return string|null
*/
public function getCorporateBrand(): ?string
{
	$data = $this->corporateBrand;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("corporateBrand")->isEmpty($data)) {
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
public function setCorporateBrand (?string $corporateBrand): static
{
	$this->corporateBrand = $corporateBrand;

	return $this;
}

/**
* Get productGroupBrand - Product Group Brand
* @return string|null
*/
public function getProductGroupBrand(): ?string
{
	$data = $this->productGroupBrand;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("productGroupBrand")->isEmpty($data)) {
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
public function setProductGroupBrand (?string $productGroupBrand): static
{
	$this->productGroupBrand = $productGroupBrand;

	return $this;
}

/**
* Get productName - Product Name
* @return string|null
*/
public function getProductName(): ?string
{
	$data = $this->productName;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("productName")->isEmpty($data)) {
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
public function setProductName (?string $productName): static
{
	$this->productName = $productName;

	return $this;
}

/**
* Get productNameVariant - Product Name Variant
* @return string|null
*/
public function getProductNameVariant(): ?string
{
	$data = $this->productNameVariant;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("productNameVariant")->isEmpty($data)) {
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
public function setProductNameVariant (?string $productNameVariant): static
{
	$this->productNameVariant = $productNameVariant;

	return $this;
}

/**
* Get productNameSubVariant - Product Name Sub Variant
* @return string|null
*/
public function getProductNameSubVariant(): ?string
{
	$data = $this->productNameSubVariant;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("productNameSubVariant")->isEmpty($data)) {
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
public function setProductNameSubVariant (?string $productNameSubVariant): static
{
	$this->productNameSubVariant = $productNameSubVariant;

	return $this;
}

/**
* Get productDesign - Product Design Name
* @return string|null
*/
public function getProductDesign(): ?string
{
	$data = $this->productDesign;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("productDesign")->isEmpty($data)) {
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
public function setProductDesign (?string $productDesign): static
{
	$this->productDesign = $productDesign;

	return $this;
}

/**
* Get productDesignCode - Product Design Code
* @return string|null
*/
public function getProductDesignCode(): ?string
{
	$data = $this->productDesignCode;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("productDesignCode")->isEmpty($data)) {
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
public function setProductDesignCode (?string $productDesignCode): static
{
	$this->productDesignCode = $productDesignCode;

	return $this;
}

/**
* Get industrialStandards - Industrial Standards
* @return string[]|null
*/
public function getIndustrialStandards(): ?array
{
	$data = $this->industrialStandards;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("industrialStandards")->isEmpty($data)) {
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
public function setIndustrialStandards (?array $industrialStandards): static
{
	$this->industrialStandards = $industrialStandards;

	return $this;
}

/**
* Get agencyCompliance - Agency Compliance
* @return string[]|null
*/
public function getAgencyCompliance(): ?array
{
	$data = $this->agencyCompliance;
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("agencyCompliance")->isEmpty($data)) {
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
public function setAgencyCompliance (?array $agencyCompliance): static
{
	$this->agencyCompliance = $agencyCompliance;

	return $this;
}

/**
* Get b2bSubCategory - B2b Sub Category
* @return \Pimcore\Model\DataObject\UniProductCategoryExternal[]
*/
public function getB2bSubCategory(): array
{
	$data = $this->getDefinition()->getFieldDefinition("b2bSubCategory")->preGetData($this);
	if(\Pimcore\Model\DataObject::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("b2bSubCategory")->isEmpty($data)) {
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
* @param \Pimcore\Model\DataObject\UniProductCategoryExternal[] $b2bSubCategory
* @return $this
*/
public function setB2bSubCategory (?array $b2bSubCategory): static
{
	/** @var \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToManyObjectRelation $fd */
	$fd = $this->getDefinition()->getFieldDefinition("b2bSubCategory");
	$class = $this->getObject() ? $this->getObject()->getClass() : null;
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	if ($class && $class->getAllowInherit()) {
		$currentData = \Pimcore\Model\DataObject\Service::useInheritedValues(false, function() {
			return $this->getB2bSubCategory();
		});
	}
	else {
		$currentData = $this->getB2bSubCategory();
	}	
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $b2bSubCategory);
	if (!$isEqual) {
		$this->markFieldDirty("b2bSubCategory", true);
	}
	$this->b2bSubCategory = $fd->preSetData($this, $b2bSubCategory);
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
* Get reach - REACH  
* @return string|null
*/
public function getReach(?string $language = null): ?string
{
	$data = $this->getLocalizedfields()->getLocalizedValue("reach", $language);
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
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get featuresAndBenefits - Features And Benefits
* @return string[]|null
*/
public function getFeaturesAndBenefits(?string $language = null): ?array
{
	$data = $this->getLocalizedfields()->getLocalizedValue("featuresAndBenefits", $language);
	if ($data instanceof \Pimcore\Model\DataObject\Data\EncryptedField) {
		return $data->getPlain();
	}

	return $data;
}

/**
* Get reachCertificates - REACH Certificates
* @return \Pimcore\Model\Asset\Text|\Pimcore\Model\Asset\Document|null
*/
public function getReachCertificates(?string $language = null): ?\Pimcore\Model\Element\AbstractElement
{
	$data = $this->getLocalizedfields()->getLocalizedValue("reachCertificates", $language);
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
* Set reach - REACH  
* @param string|null $reach
* @return $this
*/
public function setReach (?string $reach, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("reach", $reach, $language, !$isEqual);

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
* Set featuresAndBenefits - Features And Benefits
* @param string[]|null $featuresAndBenefits
* @return $this
*/
public function setFeaturesAndBenefits (?array $featuresAndBenefits, ?string $language = null): static
{
	$isEqual = false;
	$this->getLocalizedfields()->setLocalizedValue("featuresAndBenefits", $featuresAndBenefits, $language, !$isEqual);

	return $this;
}

/**
* Set reachCertificates - REACH Certificates
* @param \Pimcore\Model\Asset\Text|\Pimcore\Model\Asset\Document|null $reachCertificates
* @return $this
*/
public function setReachCertificates (?\Pimcore\Model\Element\AbstractElement $reachCertificates, ?string $language = null): static
{
	$fd = $this->getDefinition()->getFieldDefinition("localizedfields")->getFieldDefinition("reachCertificates");
	$hideUnpublished = \Pimcore\Model\DataObject\Concrete::getHideUnpublished();
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished(false);
	$currentData = $this->getReachCertificates($language);
	\Pimcore\Model\DataObject\Concrete::setHideUnpublished($hideUnpublished);
	$isEqual = $fd->isEqual($currentData, $reachCertificates);
	if (!$isEqual) {
		$this->markFieldDirty("reachCertificates", true);
	}
	$this->getLocalizedfields()->setLocalizedValue("reachCertificates", $reachCertificates, $language, !$isEqual);

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

}

