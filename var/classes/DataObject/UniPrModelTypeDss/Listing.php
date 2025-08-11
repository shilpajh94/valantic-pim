<?php

namespace Pimcore\Model\DataObject\UniPrModelTypeDss;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrModelTypeDss|false current()
 * @method DataObject\UniPrModelTypeDss[] load()
 * @method DataObject\UniPrModelTypeDss[] getData()
 * @method DataObject\UniPrModelTypeDss[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "50";
protected $className = "UniPrModelTypeDss";


/**
* Filter by name (Model Type name)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByName ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("name")->addListingFilter($this, $data, $operator);
	return $this;
}



}
