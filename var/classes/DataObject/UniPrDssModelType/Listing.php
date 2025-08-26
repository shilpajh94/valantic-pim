<?php

namespace Pimcore\Model\DataObject\UniPrDssModelType;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrDssModelType|false current()
 * @method DataObject\UniPrDssModelType[] load()
 * @method DataObject\UniPrDssModelType[] getData()
 * @method DataObject\UniPrDssModelType[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UNI_PR_DSS_ML_MT";
protected $className = "UniPrDssModelType";


/**
* Filter by name (Model Type name)
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
