<?php

namespace Pimcore\Model\DataObject\UniPrFhsFittingType;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrFhsFittingType|false current()
 * @method DataObject\UniPrFhsFittingType[] load()
 * @method DataObject\UniPrFhsFittingType[] getData()
 * @method DataObject\UniPrFhsFittingType[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UNI_PR_FHS_ML_FT";
protected $className = "UniPrFhsFittingType";


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
