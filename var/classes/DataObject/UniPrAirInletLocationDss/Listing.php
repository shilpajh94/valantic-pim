<?php

namespace Pimcore\Model\DataObject\UniPrAirInletLocationDss;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrAirInletLocationDss|false current()
 * @method DataObject\UniPrAirInletLocationDss[] load()
 * @method DataObject\UniPrAirInletLocationDss[] getData()
 * @method DataObject\UniPrAirInletLocationDss[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "53";
protected $className = "UniPrAirInletLocationDss";


/**
* Filter by name (Air Inlet Location name)
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
