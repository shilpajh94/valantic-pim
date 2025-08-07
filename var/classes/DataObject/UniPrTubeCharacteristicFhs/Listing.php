<?php

namespace Pimcore\Model\DataObject\UniPrTubeCharacteristicFhs;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrTubeCharacteristicFhs|false current()
 * @method DataObject\UniPrTubeCharacteristicFhs[] load()
 * @method DataObject\UniPrTubeCharacteristicFhs[] getData()
 * @method DataObject\UniPrTubeCharacteristicFhs[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UniPrTubeCharcFhs";
protected $className = "UniPrTubeCharacteristicFhs";


/**
* Filter by name (Name)
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
