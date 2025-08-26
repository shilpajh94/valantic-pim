<?php

namespace Pimcore\Model\DataObject\UniPrDssBellowCompoundMaterial;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrDssBellowCompoundMaterial|false current()
 * @method DataObject\UniPrDssBellowCompoundMaterial[] load()
 * @method DataObject\UniPrDssBellowCompoundMaterial[] getData()
 * @method DataObject\UniPrDssBellowCompoundMaterial[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UNI_PR_DSS_ML_BCM";
protected $className = "UniPrDssBellowCompoundMaterial";


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
