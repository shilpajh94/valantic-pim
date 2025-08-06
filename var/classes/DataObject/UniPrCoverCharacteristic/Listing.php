<?php

namespace Pimcore\Model\DataObject\UniPrCoverCharacteristic;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrCoverCharacteristic|false current()
 * @method DataObject\UniPrCoverCharacteristic[] load()
 * @method DataObject\UniPrCoverCharacteristic[] getData()
 * @method DataObject\UniPrCoverCharacteristic[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UniPrCoverCharac";
protected $className = "UniPrCoverCharacteristic";


/**
* Filter by coverCharacteristic (Cover Characteristic)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByCoverCharacteristic ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("coverCharacteristic")->addListingFilter($this, $data, $operator);
	return $this;
}



}
