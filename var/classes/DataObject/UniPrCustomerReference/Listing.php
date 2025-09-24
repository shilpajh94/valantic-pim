<?php

namespace Pimcore\Model\DataObject\UniPrCustomerReference;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrCustomerReference|false current()
 * @method DataObject\UniPrCustomerReference[] load()
 * @method DataObject\UniPrCustomerReference[] getData()
 * @method DataObject\UniPrCustomerReference[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UNI_PR_ML_CR";
protected $className = "UniPrCustomerReference";


/**
* Filter by customer (Customer)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByCustomer ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("customer")->addListingFilter($this, $data, $operator);
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



}
