<?php

namespace Pimcore\Model\DataObject\UniPrDssRollingLobePistonMaterial;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrDssRollingLobePistonMaterial|false current()
 * @method DataObject\UniPrDssRollingLobePistonMaterial[] load()
 * @method DataObject\UniPrDssRollingLobePistonMaterial[] getData()
 * @method DataObject\UniPrDssRollingLobePistonMaterial[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "UNI_PR_DSS_ML_RLP";
protected $className = "UniPrDssRollingLobePistonMaterial";


/**
* Filter by name (Rolling Lobe - Piston Material name)
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
