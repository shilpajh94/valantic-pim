<?php

namespace Pimcore\Model\DataObject\UniPrHazardousSubstanceClassification;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrHazardousSubstanceClassification|false current()
 * @method DataObject\UniPrHazardousSubstanceClassification[] load()
 * @method DataObject\UniPrHazardousSubstanceClassification[] getData()
 * @method DataObject\UniPrHazardousSubstanceClassification[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UNI_PR_ML_HSC";
protected $className = "UniPrHazardousSubstanceClassification";


/**
* Filter by name (Hazardous Substance Classification name)
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
