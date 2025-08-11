<?php

namespace Pimcore\Model\DataObject\UniPrAirInletDss;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrAirInletDss|false current()
 * @method DataObject\UniPrAirInletDss[] load()
 * @method DataObject\UniPrAirInletDss[] getData()
 * @method DataObject\UniPrAirInletDss[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "55";
protected $className = "UniPrAirInletDss";


/**
* Filter by name (Air Inlet type)
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
