<?php

namespace Pimcore\Model\DataObject\UniPrOemCrossReference;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrOemCrossReference|false current()
 * @method DataObject\UniPrOemCrossReference[] load()
 * @method DataObject\UniPrOemCrossReference[] getData()
 * @method DataObject\UniPrOemCrossReference[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UNI_PR_ML_OCR";
protected $className = "UniPrOemCrossReference";


/**
* Filter by oem (OEM  )
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByOem ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("oem")->addListingFilter($this, $data, $operator);
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
