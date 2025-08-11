<?php

namespace Pimcore\Model\DataObject\UniPrRollingLobePistonMaterialDss;

use Pimcore\Model;
use Pimcore\Model\DataObject;

/**
 * @method DataObject\UniPrRollingLobePistonMaterialDss|false current()
 * @method DataObject\UniPrRollingLobePistonMaterialDss[] load()
 * @method DataObject\UniPrRollingLobePistonMaterialDss[] getData()
 * @method DataObject\UniPrRollingLobePistonMaterialDss[] getObjects()
 */

class Listing extends DataObject\Listing\Concrete
{
protected $classId = "54";
protected $className = "UniPrRollingLobePistonMaterialDss";


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
