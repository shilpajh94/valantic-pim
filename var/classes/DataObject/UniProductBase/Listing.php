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
* Filter by productBrandName (Product Brand Name)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByProductBrandName ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("productBrandName")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by masterBrand (Master Brand)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByMasterBrand ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("masterBrand")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by productFamily (Product Family)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByProductFamily ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("productFamily")->addListingFilter($this, $data, $operator);
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
* Filter by productSubCategory (Product Sub Category)
* @param mixed $data
* @param string $operator SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByProductSubCategory ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("productSubCategory")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by productCategory (Product Category  )
* @param mixed $data
* @param string $operator SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByProductCategory ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("productCategory")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by b2bSubCategory (B2b Sub Category)
* @param mixed $data
* @param string $operator SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByB2bSubCategory ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("b2bSubCategory")->addListingFilter($this, $data, $operator);
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
* Filter by unitOfMeasure (Unit of Measure (UOM))
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByUnitOfMeasure ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("unitOfMeasure")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by weight (Weight (metric / imperial))
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByWeight ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("weight")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by featuresAndBenefits (Features And Benefits)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByFeaturesAndBenefits ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("featuresAndBenefits")->addListingFilter($this, $data, $operator);
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
* Filter by hazardousSubstanceClassification (Hazardous Substance Classification  )
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByHazardousSubstanceClassification ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("hazardousSubstanceClassification")->addListingFilter($this, $data, $operator);
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
* Filter by Disclaimer (Disclaimer)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByDisclaimer ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("Disclaimer")->addListingFilter($this, $data, $operator);
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
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
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
* Filter by industrialStandards (Industrial Standards  )
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



}
