<?php

namespace Pimcore\Model\DataObject\UniProductCategoryExternal;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniProductCategoryExternal|false current()
 * @method DataObject\UniProductCategoryExternal[] load()
 * @method DataObject\UniProductCategoryExternal[] getData()
 * @method DataObject\UniProductCategoryExternal[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UNI_PR_CAT_EXT";
protected $className = "UniProductCategoryExternal";


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
