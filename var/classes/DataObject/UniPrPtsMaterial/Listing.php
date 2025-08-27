<?php

namespace Pimcore\Model\DataObject\UniPrPtsMaterial;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrPtsMaterial|false current()
 * @method DataObject\UniPrPtsMaterial[] load()
 * @method DataObject\UniPrPtsMaterial[] getData()
 * @method DataObject\UniPrPtsMaterial[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UNI_PR_PTS_ML_M";
protected $className = "UniPrPtsMaterial";


/**
* Filter by name (Material name)
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
