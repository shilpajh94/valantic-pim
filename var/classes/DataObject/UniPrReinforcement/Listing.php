<?php

namespace Pimcore\Model\DataObject\UniPrReinforcement;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrReinforcement|false current()
 * @method DataObject\UniPrReinforcement[] load()
 * @method DataObject\UniPrReinforcement[] getData()
 * @method DataObject\UniPrReinforcement[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UniPrReinforcement";
protected $className = "UniPrReinforcement";


/**
* Filter by reinforcement (Reinforcement)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByReinforcement ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("reinforcement")->addListingFilter($this, $data, $operator);
	return $this;
}



}
