<?php

namespace Pimcore\Model\DataObject\UniPrPtsBeltTeethType;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrPtsBeltTeethType|false current()
 * @method DataObject\UniPrPtsBeltTeethType[] load()
 * @method DataObject\UniPrPtsBeltTeethType[] getData()
 * @method DataObject\UniPrPtsBeltTeethType[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UNI_PR_PTS_ML_BTT";
protected $className = "UniPrPtsBeltTeethType";


/**
* Filter by name (Belt teeth type name)
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
