<?php

namespace Pimcore\Model\DataObject\UniPrPtsMaterialType;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrPtsMaterialType|false current()
 * @method DataObject\UniPrPtsMaterialType[] load()
 * @method DataObject\UniPrPtsMaterialType[] getData()
 * @method DataObject\UniPrPtsMaterialType[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UNI_PR_PTS_ML_MT";
protected $className = "UniPrPtsMaterialType";


/**
* Filter by name (Material type)
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
