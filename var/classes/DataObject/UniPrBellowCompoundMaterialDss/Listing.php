<?php

namespace Pimcore\Model\DataObject\UniPrBellowCompoundMaterialDss;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrBellowCompoundMaterialDss|false current()
 * @method DataObject\UniPrBellowCompoundMaterialDss[] load()
 * @method DataObject\UniPrBellowCompoundMaterialDss[] getData()
 * @method DataObject\UniPrBellowCompoundMaterialDss[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "51";
protected $className = "UniPrBellowCompoundMaterialDss";


/**
* Filter by name (Bellow compound material name)
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
