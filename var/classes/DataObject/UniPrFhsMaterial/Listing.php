<?php

namespace Pimcore\Model\DataObject\UniPrFhsMaterial;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrFhsMaterial|false current()
 * @method DataObject\UniPrFhsMaterial[] load()
 * @method DataObject\UniPrFhsMaterial[] getData()
 * @method DataObject\UniPrFhsMaterial[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UNI_PR_FHS_ML_MA";
protected $className = "UniPrFhsMaterial";


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
