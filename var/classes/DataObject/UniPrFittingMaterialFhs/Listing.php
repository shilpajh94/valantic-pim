<?php

namespace Pimcore\Model\DataObject\UniPrFittingMaterialFhs;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrFittingMaterialFhs|false current()
 * @method DataObject\UniPrFittingMaterialFhs[] load()
 * @method DataObject\UniPrFittingMaterialFhs[] getData()
 * @method DataObject\UniPrFittingMaterialFhs[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UniPrFittingMaterFhs";
protected $className = "UniPrFittingMaterialFhs";


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
