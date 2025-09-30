<?php

namespace Pimcore\Model\DataObject\UniPrCompetitorCrossReference;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrCompetitorCrossReference|false current()
 * @method DataObject\UniPrCompetitorCrossReference[] load()
 * @method DataObject\UniPrCompetitorCrossReference[] getData()
 * @method DataObject\UniPrCompetitorCrossReference[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UNI_PR_ML_CCR";
protected $className = "UniPrCompetitorCrossReference";


/**
* Filter by name (Competitor name)
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
