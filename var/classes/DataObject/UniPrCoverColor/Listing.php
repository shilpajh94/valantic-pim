<?php

namespace Pimcore\Model\DataObject\UniPrCoverColor;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrCoverColor|false current()
 * @method DataObject\UniPrCoverColor[] load()
 * @method DataObject\UniPrCoverColor[] getData()
 * @method DataObject\UniPrCoverColor[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UniPrCoverColor";
protected $className = "UniPrCoverColor";


/**
* Filter by coverColor (Cover Color)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByCoverColor ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("coverColor")->addListingFilter($this, $data, $operator);
	return $this;
}



}
