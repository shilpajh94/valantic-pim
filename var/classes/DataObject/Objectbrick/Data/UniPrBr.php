<?php

/**
 * Fields Summary:
 * - industrialStandards [multiselect]
 * - agencyCompliance [multiselect]
 * - b2bSubCategory [manyToManyObjectRelation]
 * - localizedfields [localizedfields]
 * -- hazardousSubstanceClassification [multiselect]
 * -- featuresAndBenefits [multiselect]
 * -- reach [select]
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
public const FIELD_INDUSTRIAL_STANDARDS = 'industrialStandards';
public const FIELD_AGENCY_COMPLIANCE = 'agencyCompliance';
public const FIELD_B2B_SUB_CATEGORY = 'b2bSubCategory';
public const FIELD_HAZARDOUS_SUBSTANCE_CLASSIFICATION = 'hazardousSubstanceClassification';
public const FIELD_FEATURES_AND_BENEFITS = 'featuresAndBenefits';
public const FIELD_REACH = 'reach';
public const FIELD_LEGAL_TEXT = 'legalText';
public const FIELD_DISCLAIMER = 'disclaimer';
public const FIELD_MARKETING_DESCRIPTION_SHORT = 'marketingDescriptionShort';
public const FIELD_MARKETING_DESCRIPTION_LONG = 'marketingDescriptionLong';

protected string $type = "UniPrBr";
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
* @return \Pimcore\Model\DataObject\AbstractObject[]
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
* @param \Pimcore\Model\DataObject\AbstractObject[] $b2bSubCategory
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

