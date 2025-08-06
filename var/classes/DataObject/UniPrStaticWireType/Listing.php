<?php

namespace Pimcore\Model\DataObject\UniPrStaticWireType;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrStaticWireType|false current()
 * @method DataObject\UniPrStaticWireType[] load()
 * @method DataObject\UniPrStaticWireType[] getData()
 * @method DataObject\UniPrStaticWireType[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UniPrStaticWireType";
protected $className = "UniPrStaticWireType";


/**
* Filter by staticWireType (Static Wire Type)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByStaticWireType ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("staticWireType")->addListingFilter($this, $data, $operator);
	return $this;
}



}
