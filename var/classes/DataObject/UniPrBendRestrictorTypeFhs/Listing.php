<?php

namespace Pimcore\Model\DataObject\UniPrBendRestrictorTypeFhs;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrBendRestrictorTypeFhs|false current()
 * @method DataObject\UniPrBendRestrictorTypeFhs[] load()
 * @method DataObject\UniPrBendRestrictorTypeFhs[] getData()
 * @method DataObject\UniPrBendRestrictorTypeFhs[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UniPrBendRestTypeFhs";
protected $className = "UniPrBendRestrictorTypeFhs";


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
