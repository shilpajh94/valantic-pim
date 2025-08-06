<?php

namespace Pimcore\Model\DataObject\UniPrCoverMaterial;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrCoverMaterial|false current()
 * @method DataObject\UniPrCoverMaterial[] load()
 * @method DataObject\UniPrCoverMaterial[] getData()
 * @method DataObject\UniPrCoverMaterial[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UniPrCoverMaterial";
protected $className = "UniPrCoverMaterial";


/**
* Filter by coverMaterial (Cover Material)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByCoverMaterial ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("coverMaterial")->addListingFilter($this, $data, $operator);
	return $this;
}



}
