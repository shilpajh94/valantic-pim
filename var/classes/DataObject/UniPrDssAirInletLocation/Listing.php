<?php

namespace Pimcore\Model\DataObject\UniPrDssAirInletLocation;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrDssAirInletLocation|false current()
 * @method DataObject\UniPrDssAirInletLocation[] load()
 * @method DataObject\UniPrDssAirInletLocation[] getData()
 * @method DataObject\UniPrDssAirInletLocation[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UNI_PR_DSS_ML_AIL";
protected $className = "UniPrDssAirInletLocation";


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
