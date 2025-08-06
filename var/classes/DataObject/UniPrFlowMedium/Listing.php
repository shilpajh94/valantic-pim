<?php

namespace Pimcore\Model\DataObject\UniPrFlowMedium;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrFlowMedium|false current()
 * @method DataObject\UniPrFlowMedium[] load()
 * @method DataObject\UniPrFlowMedium[] getData()
 * @method DataObject\UniPrFlowMedium[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UniPrFlowMedium";
protected $className = "UniPrFlowMedium";


/**
* Filter by flowMedium (Flow Medium)
* @param string|int|float|array|Model\Element\ElementInterface $data  comparison data, can be scalar or array (if operator is e.g. "IN (?)")
* @param string $operator  SQL comparison operator, e.g. =, <, >= etc. You can use "?" as placeholder, e.g. "IN (?)"
* @return $this
*/
public function filterByFlowMedium ($data, $operator = '='): static
{
	$this->getClass()->getFieldDefinition("flowMedium")->addListingFilter($this, $data, $operator);
	return $this;
}



}
