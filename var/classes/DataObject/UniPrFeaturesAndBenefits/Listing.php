<?php

namespace Pimcore\Model\DataObject\UniPrFeaturesAndBenefits;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrFeaturesAndBenefits|false current()
 * @method DataObject\UniPrFeaturesAndBenefits[] load()
 * @method DataObject\UniPrFeaturesAndBenefits[] getData()
 * @method DataObject\UniPrFeaturesAndBenefits[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UNI_PR_ML_FAB";
protected $className = "UniPrFeaturesAndBenefits";


/**
* Filter by name (Features And Benefits name)
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
