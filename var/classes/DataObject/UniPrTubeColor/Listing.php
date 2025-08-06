<?php

namespace Pimcore\Model\DataObject\UniPrTubeColor;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrTubeColor|false current()
 * @method DataObject\UniPrTubeColor[] load()
 * @method DataObject\UniPrTubeColor[] getData()
 * @method DataObject\UniPrTubeColor[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UniPrTubeColor";
protected $className = "UniPrTubeColor";


/**
* Filter by tubeColor (Tube Color)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByTubeColor ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("tubeColor")->addListingFilter($this, $data, $operator);
	return $this;
}



}
