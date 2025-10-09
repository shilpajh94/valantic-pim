<?php

namespace Pimcore\Model\DataObject\UniProductBase;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniProductBase|false current()
 * @method DataObject\UniProductBase[] load()
 * @method DataObject\UniProductBase[] getData()
 * @method DataObject\UniProductBase[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UNI_PR";
protected $className = "UniProductBase";


/**
* Filter by corporateBrand (Corporate Brand)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByCorporateBrand ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("corporateBrand")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by productGroupBrand (Product Group Brand)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByProductGroupBrand ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("productGroupBrand")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by productName (Product Name)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByProductName ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("productName")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by productNameVariant (Product Name Variant)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByProductNameVariant ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("productNameVariant")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by productNameSubVariant (Product Name Sub Variant)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByProductNameSubVariant ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("productNameSubVariant")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by productDesign (Product Design Name)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByProductDesign ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("productDesign")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by productDesignCode (Product Design Code)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByProductDesignCode ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("productDesignCode")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by industrialStandards (Industrial Standards)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByIndustrialStandards ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("industrialStandards")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by agencyCompliance (Agency Compliance)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByAgencyCompliance ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("agencyCompliance")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by b2bSubCategory (B2b Sub Category)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByB2bSubCategory ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("b2bSubCategory")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by reach (REACH  )
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByReach ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("reach")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by reachCertificate (REACH Certificate)
* @param mixed $data
* @param string $operator SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByReachCertificate ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("reachCertificate")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by hazardousSubstanceClassification (Hazardous Substance Classification)
* @param mixed $data
* @param string $operator SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByHazardousSubstanceClassification ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("hazardousSubstanceClassification")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by featuresAndBenefits (Features And Benefits)
* @param mixed $data
* @param string $operator SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByFeaturesAndBenefits ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("featuresAndBenefits")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by legalText (Legal Text)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByLegalText ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("legalText")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by disclaimer (Disclaimer)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByDisclaimer ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("disclaimer")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by marketingDescriptionShort (Marketing Description - Short)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByMarketingDescriptionShort ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("marketingDescriptionShort")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by marketingDescriptionLong (Marketing Description - Long)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByMarketingDescriptionLong ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("marketingDescriptionLong")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by sapDescription (SAP Description)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterBySapDescription ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("sapDescription")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by sapDescriptionLanguage (SAP  Description Language)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterBySapDescriptionLanguage ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("sapDescriptionLanguage")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by plantProduced (Plant Produced)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByPlantProduced ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("plantProduced")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by productDescriptionShort (Product Description  - Short)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByProductDescriptionShort ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("productDescriptionShort")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by productDescriptionLong (Product Description - Long)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByProductDescriptionLong ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("productDescriptionLong")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by productMarking1 (Product Marking - 1)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByProductMarking1 ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("productMarking1")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by productMarking2 (Product Marking - 2)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByProductMarking2 ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("productMarking2")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by productDescriptionExtended (Product Description - Extended)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByProductDescriptionExtended ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("productDescriptionExtended")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by completenessPercentage (Completeness Percentage)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByCompletenessPercentage ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("completenessPercentage")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by emptyFieldsBrand (Empty Fields Brand)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByEmptyFieldsBrand ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("emptyFieldsBrand")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by emptyFieldsSkeleton (Empty Fields Skeleton)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByEmptyFieldsSkeleton ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("emptyFieldsSkeleton")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by emptyFieldsFinishedGood (Empty Fields Finished Good)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByEmptyFieldsFinishedGood ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("emptyFieldsFinishedGood")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by fullProductName (Full Product Name)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByFullProductName ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("fullProductName")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by sapMaterialNumber (SAP Material Number)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterBySapMaterialNumber ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("sapMaterialNumber")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by partNumber (Part Number)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByPartNumber ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("partNumber")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by oldMaterialNumber (Old Material Number)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByOldMaterialNumber ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("oldMaterialNumber")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by weightMetric (Weight (kg))
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByWeightMetric ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("weightMetric")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by weightImperial (Weight (lbs))
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByWeightImperial ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("weightImperial")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by tariffCodes (Tariff Codes)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByTariffCodes ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("tariffCodes")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by countryOfOrigin (Country Of Origin)
* @param mixed $data
* @param string $operator SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByCountryOfOrigin ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("countryOfOrigin")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by eanCode (EAN / UPC Code)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByEanCode ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("eanCode")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by externalId (External ID)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByExternalId ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("externalId")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by stccCode (Standard Transportation Commodity Code (STCC))
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByStccCode ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("stccCode")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by prop65 (Prop65)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByProp65 ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("prop65")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by roHS (RoHS)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByRoHS ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("roHS")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by gprs (GPRS)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByGprs ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("gprs")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by prop65Certificate (Prop65 Certificate)
* @param mixed $data
* @param string $operator SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByProp65Certificate ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("prop65Certificate")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by rohsCertificate (RoHS Certificate)
* @param mixed $data
* @param string $operator SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByRohsCertificate ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("rohsCertificate")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by gprsCertificate (GPRS Certificate)
* @param mixed $data
* @param string $operator SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByGprsCertificate ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("gprsCertificate")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by b2bFlag (B2B Flag)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByB2bFlag ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("b2bFlag")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by b2cFlag (B2C Flag)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByB2cFlag ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("b2cFlag")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by printedCatalogueFlag (Printed Catalogue Flag)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByPrintedCatalogueFlag ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("printedCatalogueFlag")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by virtualCatalogueFlag (Virtual Catalogue Flag)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByVirtualCatalogueFlag ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("virtualCatalogueFlag")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by customerPortalFlag (Customer Portal Flag)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByCustomerPortalFlag ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("customerPortalFlag")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by regionalAvailability (Available in)
* @param mixed $data
* @param string $operator SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByRegionalAvailability ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("regionalAvailability")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by internalCategories (Internal Categories)
* @param mixed $data
* @param string $operator SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByInternalCategories ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("internalCategories")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by ghpCode (Product Hierarchy Code (GHP))
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByGhpCode ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("ghpCode")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by ghpFullCode (Product Hierarchy Full Code (GHP))
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByGhpFullCode ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("ghpFullCode")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by hierarchyLevel (Hierarchy Level)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByHierarchyLevel ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("hierarchyLevel")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by hierarchyLevelDescription (Hierarchy Level Description)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByHierarchyLevelDescription ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("hierarchyLevelDescription")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by approvalState (Approval State)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByApprovalState ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("approvalState")->addListingFilter($this, $data, $operator);
	return $this;
}



}
