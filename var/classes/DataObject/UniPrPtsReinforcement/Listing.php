<?php

namespace Pimcore\Model\DataObject\UniPrPtsReinforcement;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrPtsReinforcement|false current()
 * @method DataObject\UniPrPtsReinforcement[] load()
 * @method DataObject\UniPrPtsReinforcement[] getData()
 * @method DataObject\UniPrPtsReinforcement[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UNI_PR_PTS_ML_R";
protected $className = "UniPrPtsReinforcement";


/**
* Filter by name (Reinforcement Type name)
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
