<?php

namespace Pimcore\Model\DataObject\UniPrTubeMaterial;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrTubeMaterial|false current()
 * @method DataObject\UniPrTubeMaterial[] load()
 * @method DataObject\UniPrTubeMaterial[] getData()
 * @method DataObject\UniPrTubeMaterial[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UniPrTubeMaterial";
protected $className = "UniPrTubeMaterial";


/**
* Filter by tubeMaterial (Tube Material)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByTubeMaterial ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("tubeMaterial")->addListingFilter($this, $data, $operator);
	return $this;
}



}
