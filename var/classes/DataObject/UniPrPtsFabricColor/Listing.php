<?php

namespace Pimcore\Model\DataObject\UniPrPtsFabricColor;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrPtsFabricColor|false current()
 * @method DataObject\UniPrPtsFabricColor[] load()
 * @method DataObject\UniPrPtsFabricColor[] getData()
 * @method DataObject\UniPrPtsFabricColor[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UNI_PR_PTS_ML_FC";
protected $className = "UniPrPtsFabricColor";


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
