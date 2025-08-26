<?php

namespace Pimcore\Model\DataObject\UniPrFhsReinforcement;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrFhsReinforcement|false current()
 * @method DataObject\UniPrFhsReinforcement[] load()
 * @method DataObject\UniPrFhsReinforcement[] getData()
 * @method DataObject\UniPrFhsReinforcement[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UNI_PR_FHS_ML_RFT";
protected $className = "UniPrFhsReinforcement";


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
