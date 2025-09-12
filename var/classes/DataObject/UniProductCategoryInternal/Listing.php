<?php

namespace Pimcore\Model\DataObject\UniProductCategoryInternal;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniProductCategoryInternal|false current()
 * @method DataObject\UniProductCategoryInternal[] load()
 * @method DataObject\UniProductCategoryInternal[] getData()
 * @method DataObject\UniProductCategoryInternal[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UNI_PRCI";
protected $className = "UniProductCategoryInternal";


/**
* Filter by name (Name)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByName ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("name")->addListingFilter($this, $data, $operator);
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
* Filter by categoryLevel (Category Level)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByCategoryLevel ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("categoryLevel")->addListingFilter($this, $data, $operator);
	return $this;
}

/**
* Filter by assignedUser (Assigned User)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByAssignedUser ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("assignedUser")->addListingFilter($this, $data, $operator);
	return $this;
}



}
