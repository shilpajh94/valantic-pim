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
* Filter by productSubCategory (Product Sub Category)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByProductSubCategory ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("productSubCategory")->addListingFilter($this, $data, $operator);
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
