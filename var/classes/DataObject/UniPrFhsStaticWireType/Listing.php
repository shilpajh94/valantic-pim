<?php

namespace Pimcore\Model\DataObject\UniPrFhsStaticWireType;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrFhsStaticWireType|false current()
 * @method DataObject\UniPrFhsStaticWireType[] load()
 * @method DataObject\UniPrFhsStaticWireType[] getData()
 * @method DataObject\UniPrFhsStaticWireType[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UNI_PR_FHS_ML_SWT";
protected $className = "UniPrFhsStaticWireType";


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
