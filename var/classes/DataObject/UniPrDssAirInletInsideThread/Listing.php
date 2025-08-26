<?php

namespace Pimcore\Model\DataObject\UniPrDssAirInletInsideThread;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrDssAirInletInsideThread|false current()
 * @method DataObject\UniPrDssAirInletInsideThread[] load()
 * @method DataObject\UniPrDssAirInletInsideThread[] getData()
 * @method DataObject\UniPrDssAirInletInsideThread[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UNI_PR_DSS_ML_AI";
protected $className = "UniPrDssAirInletInsideThread";


/**
* Filter by name (Air Inlet Inside Thread type)
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
