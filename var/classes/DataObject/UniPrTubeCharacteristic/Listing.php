<?php

namespace Pimcore\Model\DataObject\UniPrTubeCharacteristic;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrTubeCharacteristic|false current()
 * @method DataObject\UniPrTubeCharacteristic[] load()
 * @method DataObject\UniPrTubeCharacteristic[] getData()
 * @method DataObject\UniPrTubeCharacteristic[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UniPrTubeCharacteristic";
protected $className = "UniPrTubeCharacteristic";


/**
* Filter by tubeCharacteristic (Tube Characteristic)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByTubeCharacteristic ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("tubeCharacteristic")->addListingFilter($this, $data, $operator);
	return $this;
}



}
